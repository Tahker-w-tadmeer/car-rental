<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $cars = collect(DB::select('Select cars.*, car_types.type_name, models.id as model_id, models.name as model_name, brands.name as brand_name, models.brand_id, offices.name as office_name from cars
        join models on cars.model_id = models.id
        join brands on brands.id = models.brand_id
        join offices on cars.office_id = offices.id
        join car_types on cars.type_id = car_types.id
        order by cars.price_per_day desc
        '))
            ->map(fn($car) => [
                "id" => $car->id,
                "name" => $car->brand_name . " " . $car->model_name,
                "model" => [
                    "id" => $car->model_id,
                    "name" => $car->model_name,
                    "brand" => [
                        "id" => $car->brand_id,
                        "name" => $car->brand_name,
                    ],
                ],
                "year" => $car->year,
                "type" => $car->type_name,
                "category" => $car->category,
                "price_per_day" => $car->price_per_day,
                "office" => $car->office_name,
                "image" => $car->image,
                "mileage" => $car->mileage,
                "color" => $car->color,
                "status" => $car->status,
            ])
            ->mapInto(Car::class);

        return view("dashboard", compact('cars'));
    }

    public function rent($id)
    {
        $selectedCar = collect(DB::select('Select cars.*,m.name,ct.type_name,o.name as office_name,c.name as city_name from cars
              join models m on m.id = cars.model_id
              join car_types ct on cars.type_id = ct.id
              join offices o on cars.office_id = o.id
              join cities c on c.id = o.city_id
              where cars.id = ?', [$id]))
            ->map(fn($selectedCar) => (array)$selectedCar)
            ->mapInto(Car::class);


        $rent = collect(DB::select('Select rentals.* from rentals where car_id = ?', [$id]))
            ->map(fn($rent) => (array)$rent)
            ->mapInto(Rental::class);


        return view("rent.car_details", [
            'selectedCar' => $selectedCar,
            'rent' => $rent

        ]);
    }
}
