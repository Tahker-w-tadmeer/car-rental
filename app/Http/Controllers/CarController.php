<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create()
    {
        return view("cars.create", [
            "title" => "Create a new car",
        ]);
    }
}
