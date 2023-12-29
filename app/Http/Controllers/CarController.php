<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function create()
    {
        return view("cars.create", [
            "title" => "Create a new car",
        ]);
    }

    public function show($car)
    {
        $car = DB::select('Select * from cars where id = ? limit 1', [$car]);
        if(!isset($car[0])) {
            abort(404);
        }

        $car = new Car((array) $car[0]);

        return view("cars.show", [
            "title" => "Show a car",
        ]);
    }
}
