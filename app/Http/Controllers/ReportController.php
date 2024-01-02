<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        $startDate = $request->get("start_date");
        $endDate = $request->get("end_date");
        $cars = collect(DB::select("SELECT * , c.id as car_id, m.name as model_name, ct.type_name as type_name, b.name as brand_name
         FROM rentals
         join cars c on rentals.car_id = c.id
         join models m on c.model_id = m.id
         join carRentel.brands b on b.id = m.brand_id
         join car_types ct on c.type_id = ct.id
        where pickup_date >=  ?  AND return_date <= ? ",
            [$startDate, $endDate]))
        ->map(fn($car) => $this->car($car))
            ->mapInto(Car::class);
        return view("report", ["cars" => $cars]);
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
