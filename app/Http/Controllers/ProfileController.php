<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Car;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
//        $user=DB::select("select users.first_name, last_name, phone, email, password,
//       rentals.car_id, reserved_at, pickup_date, picked_up_at, return_date, returned_at, total_price as rentel,
//        cars.year,category,plate_id,color,mileage as car
//   from rentals
//        inner join users on rentals.user_id=users.id
//           inner join cars on rentals.car_id=cars.id
//                where users.id=?",[$id]);

        $info =
            collect(DB::select("select users.*  from users where users.id=?", [$id]))
                ->map(fn($user) => [
                    "first_name" => $user->first_name,
                    "last_name" => $user->last_name,
                    "phone" => $user->phone,
                    "email" => $user->email,
                ]
                )
                ->mapInto(User::class);

        $cars_in_progress = collect(DB::select(
            "select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price
                    ,brands.name as brand_name,models.name as model_name,car_types.type_name as type_name,plate_id,color,mileage,year,category,image
                    from rentals
                    join carRentel.cars c on c.id = rentals.car_id
                    join models on c.model_id = models.id
                    join brands on brands.id = models.brand_id
                    join car_types on c.type_id = car_types.id
                    where user_id=? and returned_at>= current_timestamp()", [$id]))
            ->map(fn($car) => [
                "id" => $car->car_id,
                "name" => $car->brand_name . " " . $car->model_name,
                "year" => $car->year,
                "type" => $car->type_name,
                "category" => $car->category,
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

            ])
            ->mapInto(Car::class);


        $cars_history = collect(DB::select(
            "select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price
                    ,brands.name as brand_name,models.name as model_name,car_types.type_name as type_name,plate_id,color,mileage,year,category,image
                    from rentals
                    join carRentel.cars c on c.id = rentals.car_id
                    join models on c.model_id = models.id
                    join brands on brands.id = models.brand_id
                    join car_types on c.type_id = car_types.id
                    where user_id=? and returned_at< current_timestamp()", [$id]))
            ->map(fn($car) => [
                "id" => $car->car_id,
                "name" => $car->brand_name . " " . $car->model_name,
                "year" => $car->year,
                "type" => $car->type_name,
                "category" => $car->category,
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

            ])
            ->mapInto(Car::class);


        return view("user.profile", ["info" => $info, "cars_in_progress" => $cars_in_progress, "cars_history" => $cars_history]);

    }
}
