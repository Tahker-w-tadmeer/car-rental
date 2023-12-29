<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function check_cars_entered(){
        $num=DB::select("select * from cars");
        if ($num>0)
            return true;
        return false;
    }
    public function create()
    {
        if(! $this->check_cars_entered()){
            return view("cars.create_new", [
           "title" => "Create a new car",
        ]);
        }
        $brands_models=DB::select("SELECT brands.`name`,models.`name`from brands join models
             on brands.id = models.brand_id;");
        return view("cars.create", [
            "title" => "Create a new car",
        ],compact($brands_models));
    }
}
