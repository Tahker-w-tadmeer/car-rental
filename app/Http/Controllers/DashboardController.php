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
        where 1=1
        ";

        if($request->has("search")) {
            $search = $request->get("search");

            collect(str_getcsv($search, " ", '"'))
                ->filter()
                ->each(function ($term) use(&$query) {
                    $query .= " and (cars.plate_id like '$term%' or
                    brands.name like '$term%' or
                    models.name like '$term%' or
                    offices.name like '%$term%' or
                    cities.name like '%$term%' or
                    car_types.type_name like '$term%' or
                    cars.color like '%$term%' or
                    cars.transmission like '%$term%' or
                    cars.fuel like '%$term%' or
                    cars.year like '%$term%')";
                });
        }

        if($request->has("transmission")) {
            $transmission = $request->get("transmission");

            if(in_array($transmission, ["Manual", "Automatic"])) {
                $query .= " and cars.transmission = '$transmission'";
            }
        }

        if($request->has("office")) {
            $office = $request->get("office");

            if($office !== "all")
                $query .= " and cars.office_id = '$office'";
        }

        if($request->has("type")) {
            $type = $request->get("type");

            if($type !== "all")
                $query .= " and cars.type_id = '$type'";
        }

        if($request->has("min_price") && $request->has("max_price")) {
            $min_price = $request->get("min_price");
            $max_price = $request->get("max_price");

            $query .= " and cars.price_per_day between $min_price and $max_price ";
        }

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

        $query = "Select offices.id, CONCAT(cities.name, ' - ', offices.name) as name from offices join cities on offices.city_id = cities.id";

        $offices = ["all" => "All"] + collect(DB::select($query))
            ->pluck("name", "id")->all();

        $query = "Select id, type_name from car_types";

        $types = ["all" => "All"] + collect(DB::select($query))
                ->pluck("type_name", "id")->all();

        $range = DB::select("select min(price_per_day) as min, max(price_per_day) as max from cars")[0];

        return view("dashboard", [
            "cars" => $cars,
            "offices" => $offices,
            "types" => $types,
            "range" => $range,
        ]);
    }
}
