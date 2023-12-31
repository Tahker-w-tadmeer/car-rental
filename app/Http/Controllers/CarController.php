<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            "categories" => ['Gas' => 'Gas', 'Electric' => 'Electric', 'Hybrid' => 'Hybrid'],
            "types" => collect(DB::select('Select * from car_types'))
                ->mapWithKeys(fn($type) => [$type->id => $type->type_name]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required|exists:models,id',
            'type_id' => 'required|exists:car_types,id',
            'category' => 'required|in:Gas,Electric,Hybrid',
            'plate_id' => 'required|unique:cars,plate_id',
            'price_per_day' => 'required|numeric|min:1',
            'mileage' => 'required|numeric|min:0|max:999999',
            'office_id' => 'required|exists:offices,id',
            'year' => 'required|numeric|min:1980|max:'. now()->addYear()->format("Y"),
            'color' => 'required|max:255',
            'image' => 'nullable|image',
        ]);

        if($request->hasFile('image')) {
            // TODO: upload image
        }

        DB::insert('INSERT INTO cars (model_id, category, color, mileage, type_id, plate_id, price_per_day, office_id, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->model_id,
            $request->category,
            $request->color,
            $request->mileage,
            $request->type_id,
            $request->plate_id,
            $request->price_per_day,
            $request->office_id,
            $request->year,
        ]);

        session()->flash('success', 'Car added successfully!');

        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $selectedCar = DB::select('Select cars.*,m.name,ct.type_name,o.name as office_name,c.name as city_name from cars
              join models m on m.id = cars.model_id
              join car_types ct on cars.type_id = ct.id
              join offices o on cars.office_id = o.id
              join cities c on c.id = o.city_id
              where cars.id = ? LIMIT 1', [$id]);
        if(!isset($selectedCar[0])) {
            abort(404);
        }

        $selectedCar = new Car((array) $selectedCar[0]);


        $rent = collect(DB::select('Select rentals.* from rentals where car_id = ?', [$id]))
            ->map(fn($rent) => (array)$rent)
            ->mapInto(Rental::class);

        return view("cars.show", [
            'car' => $selectedCar,
            'rent' => $rent
        ]);
    }

    public function rent(Request $request, $car)
    {
        $car = collect(DB::select("Select * from cars where id = ? LIMIT 1", [$car]))->firstOrFail();

        $request->validate([
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:pickup_date',
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

        return redirect()->route('dashboard');
    }
}
