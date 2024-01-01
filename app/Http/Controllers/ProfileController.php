<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $carsCurrentlyRented = collect(DB::select(
            "select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price
                    ,brands.name as brand_name,models.name as model_name,car_types.type_name as type_name,plate_id,color,mileage,year,category,image
                    from rentals
                    join cars c on c.id = rentals.car_id
                    join models on c.model_id = models.id
                    join brands on brands.id = models.brand_id
                    join car_types on c.type_id = car_types.id
                    where user_id=? and return_date>= current_timestamp()", [$user->id]))
            ->map(fn($car) => $this->car($car))
            ->mapInto(Car::class);


        $rentHistory = collect(DB::select(
            "select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price
                    ,brands.name as brand_name,models.name as model_name,car_types.type_name as type_name,plate_id,color,mileage,year,category,image
                    from rentals
                    join cars c on c.id = rentals.car_id
                    join models on c.model_id = models.id
                    join brands on brands.id = models.brand_id
                    join car_types on c.type_id = car_types.id
                    where user_id=? and return_date< current_timestamp()", [$user->id]))
            ->map(fn($car) => $this->car($car))
            ->mapInto(Car::class);


        return view("user.profile", [
            "user" => $user,
            "carsCurrentlyRented" => $carsCurrentlyRented,
            "rentHistory" => $rentHistory,
        ]);
    }

    private function car($car) {
        return [
            "id" => $car->car_id,
            "name" => $car->brand_name . " " . $car->model_name,
            "year" => $car->year,
            "type" => $car->type_name,
            "fuel" => $car->fuel,
            "transmission" => $car->transmission,
            "image" => $car->image,
            "mileage" => $car->mileage,
            "plate_id" => $car->plate_id,
            "color" => $car->color,
            "reserved_at" => $car->reserved_at,
            "pickup_date" => $car->pickup_date,
            "picked_up_at" => $car->picked_up_at,
            "return_date" => $car->return_date,
            "returned_at" => $car->returned_at,
            "total_price" => $car->total_price,
        ];
    }
}
