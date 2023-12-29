<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $cars = collect(DB::select('Select * from cars
        join models on cars.model_id = models.id
        join offices on cars.office_id = offices.id
        join car_types on cars.type_id = car_types.id
        '))
            
            ->map(fn($car) => (array) $car)
            ->mapInto(Car::class)
            ;
            $cars = new Car();
            $cars = $cars->paginate(20);
        return view("dashboard", compact('cars'));
    }
}
