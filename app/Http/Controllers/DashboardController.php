<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = "Select cars.*,
       car_types.type_name, models.id as model_id,
       models.name as model_name, brands.name as brand_name,
       models.brand_id,
       offices.id as office_id,
       offices.name as office_name,
       cities.id as city_id,
       cities.name as city_name
        from cars
        join models on cars.model_id = models.id
        join brands on brands.id = models.brand_id
        join offices on cars.office_id = offices.id
        join cities on offices.city_id = cities.id
        join car_types on cars.type_id = car_types.id
        ";




        $query .= "order by cars.price_per_day desc";
        $cars = collect(DB::select($query))
            ->map(fn($car) => [
                "id" => $car->id,
                "name" => $car->brand_name . " " . $car->model_name,
                "status" => $car->status,
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
                "plate_id" => $car->plate_id,
                "transmission" => $car->transmission,
                "fuel" => $car->fuel,
                "price_per_day" => $car->price_per_day,
                "office" => [
                    "id" => $car->office_id,
                    "name" => $car->office_name,
                    "city" => [
                        "id" => $car->city_id,
                        "name" => $car->city_name,
                    ],
                ],
                "image" => $car->image,
                "mileage" => $car->mileage,
                "color" => $car->color,
            ])
            ->mapInto(Car::class)
            ->collect()
            ->groupBy([
                fn($car) => $car->office['city']["name"],
                fn($car) => $car->office["name"],
            ]);

        return view("dashboard", [
            "cars" => $cars,
        ]);
    }
}
