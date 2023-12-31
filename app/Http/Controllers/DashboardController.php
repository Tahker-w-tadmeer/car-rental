<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
            ])
            ->mapInto(Car::class);

        return view("dashboard", compact('cars'));
    }
}
