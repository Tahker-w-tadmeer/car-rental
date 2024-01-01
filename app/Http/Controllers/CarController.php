<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Rules\CanRentCarRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarController extends Controller
{
    public function create()
    {
        $models = collect(DB::select(
            "SELECT models.id,
           brands.name as brand_name,
           models.`name`
            from models left join brands on brands.id = models.brand_id"
        ))
            ->mapWithKeys(fn($model) => [
                $model->id => "$model->brand_name $model->name"
            ]);

        return view("cars.create", [
            "title" => "Add a new car",
            "models" => $models,
            "offices" => collect(DB::select('Select offices.id, cities.name, offices.name as city_name from offices join cities on offices.city_id = cities.id'))
                ->mapWithKeys(fn($office) => [$office->id => $office->name . " - " . $office->city_name]),
            "types" => collect(DB::select('Select * from car_types'))
                ->mapWithKeys(fn($type) => [$type->id => $type->type_name]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:models,id',
            'type_id' => 'required|exists:car_types,id',
            'fuel' => 'required|in:Gas,Electric,Hybrid',
            'transmission' => 'required|in:Manual,Automatic',
            'plate_id' => 'required|unique:cars,plate_id',
            'price_per_day' => 'required|numeric|min:1',
            'mileage' => 'required|numeric|min:0|max:999999',
            'office_id' => 'required|exists:offices,id',
            'year' => 'required|numeric|min:1980|max:' . now()->addYear()->format("Y"),
            'color' => 'required|max:255',
            'image' => 'required|image',
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = Str::random(32) . "." . $request->file('image')->extension();

            $request->file('image')->storeAs(Car::$imagePath, $imageName);
        }

        DB::insert('INSERT INTO cars (model_id, fuel, transmission, color, mileage, type_id, plate_id, price_per_day, office_id, year,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)', [
            $request->model_id,
            $request->fuel,
            $request->transmission,
            $request->color,
            $request->mileage,
            $request->type_id,
            $request->plate_id,
            $request->price_per_day,
            $request->office_id,
            $request->year,
            $imageName,
        ]);

        session()->flash('success', 'Car added successfully!');

        return redirect()->route('cars.show', DB::getPdo()->lastInsertId());
    }

    public function show($id, Request $request)
    {
        $car = collect(DB::select(Car::cardSQL() . '
              where cars.id = ? LIMIT 1', [$id]))
            ->firstOrFail();

        $car = new Car((array)$car);

        $query = Car::cardSQL() . " where car_id = ? ";

        $bindings = [$id];
        if ($request->has("start") && $request->has("end")) {
            $start = $request->date("start");
            $end = $request->date("end");

            $query .= " and (pickup_date BETWEEN ? AND ? OR return_date BETWEEN ? AND ?)";

            $bindings = array_merge($bindings, [$start, $end, $start, $end]);
        }

        $query .= " group by rentals.user_id, rentals.id";

        $rentals = collect(DB::select($query, $bindings));

        return view("cars.show", [
            'car' => $car,
            'rent' => $rentals,
        ]);
    }

    public function rent(Request $request, $car)
    {
        $car = collect(DB::select("Select * from cars where id = ? LIMIT 1", [$car]))->firstOrFail();

        if($car->status !== "Active") {
            abort(403);
        }

        $request->validate([
            'pickup_date' => [
                'required',
                'date',
                'after_or_equal:today',
                new CanRentCarRule($car->id, $request->date('pickup_date'), $request->date('return_date')),
            ],
            'return_date' => ['required', 'date', 'after:pickup_date'],
        ]);

        $pickupDate = $request->date('pickup_date');
        $returnDate = $request->date('return_date');

        $days = $pickupDate->diffInDays($returnDate);
        $totalPrice = $days * $car->price_per_day;

        DB::insert('INSERT INTO rentals (user_id, car_id, pickup_date, return_date, total_price) VALUES (?, ?, ?, ?, ?)', [
            auth()->user()->id,
            $car->id,
            $pickupDate,
            $returnDate,
            $totalPrice,
        ]);

        session()->flash('success', 'Car rented successfully!');

        return redirect()->route('profile');
    }

    public function status(Request $request, $car)
    {
        if(! auth()->user()->isAdmin()) {
            abort(403);
        }

        $car = collect(DB::select("Select * from cars where id = ? LIMIT 1", [$car]))->firstOrFail();

        $request->validate([
            'status' => 'required|in:Active,Out of Service',
        ]);

        DB::update('UPDATE cars SET status = ? WHERE id = ?', [
            $request->status,
            $car->id,
        ]);

        session()->flash('success', 'Car status updated successfully!');

        return back();
    }
}
