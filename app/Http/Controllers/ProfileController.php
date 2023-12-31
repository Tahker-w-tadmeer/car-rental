<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show($id){
        $info=DB::select("select first_name,last_name,email,phone from users where users.id='$id' ")[0];
        $cars_in_progress=DB::select("select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price from rentals where user_id='$id' and returned_at>= current_timestamp()");
        $cars_history=DB::select("select car_id,reserved_at,pickup_date,picked_up_at,return_date,returned_at,total_price from rentals where user_id='$id' and returned_at< current_timestamp()");
        return view("user.profile",compact('info','cars_in_progress','cars_history'));
    }
}
