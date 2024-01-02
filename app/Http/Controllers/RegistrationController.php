<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function show()
    {
        $cities = collect(DB::select("select name from cities"))
            ->map(fn($city) => $city->name)
        ;
        return view("register", [
            "title" => "Register",
            "city" => $cities,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "fname" => "required",
            "lname" => "required",
            "phone" => "required",
            "email" => "required|email",
            "password" => "required|confirmed",
            "city" => "required",
        ]);

        $first_name = $request->get('fname');
        $last_name = $request->get('lname');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $city = $request->get('city');
        $password = bcrypt($request->get('password'));

        $exists = DB::select("select id from users where email=?", [$email]);
        if (count($exists) > 0) {
            return back()
                ->withInput($request->all())
                ->withErrors([
                "email" => "Email already exists",
            ]);
        }

        DB::insert("insert into users (first_name, last_name, phone, email, password,city_id) values(?, ?, ?, ?, ?,?)", [
            $first_name,
            $last_name,
            $phone,
            $email,
            $password,
            $city
        ]);

        $userId = DB::select("Select id from users where email=? limit 1", [$email])[0]->id;
        auth()->loginUsingId($userId);

        return redirect("/dashboard");

    }
}
