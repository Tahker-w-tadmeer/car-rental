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
            Car::cardSQL() . " where user_id=? and return_date >= current_timestamp()", [$user->id]))
            ->map(fn($car) => (array) $car)
            ->mapInto(Car::class);


        $rentHistory = collect(DB::select(
            Car::cardSQL() . " where user_id=? and return_date < current_timestamp()", [$user->id]))
            ->map(fn($car) => (array) $car)
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
            "name" => $car->name,
            "year" => $car->year,
            "type" => $car->type,
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
