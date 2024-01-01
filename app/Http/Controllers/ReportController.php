<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function show()
    {

        $cars=
            collect(DB::select("
        select cars.*
        ,car_types.type_name
        ,models.id as model_id
        ,models.name as model_name
        ,brands.name as brand_name
        ,offices.name as office_name
        ,cities.name as city_name
        ,r.total_price as total_price
        from cars
        join models on cars.model_id = models.id
        join brands on brands.id = models.brand_id
        join offices on cars.office_id = offices.id
        join cities on offices.city_id = cities.id
        join car_types on cars.type_id = car_types.id
        join rentals r on cars.id = r.car_id
        order by cities.id, offices.id, cars.price_per_day desc
        "))
        ->map(fn($car)=>(array)$car)
            ->mapInto(Car::class)
        ;
        return view('report',compact('cars'));
    }
}
