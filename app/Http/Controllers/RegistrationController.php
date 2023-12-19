<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function show()
    {
        return view("register", [
            "title" => "Register",
        ]);
    }

    public function store(Request $request)
    {
        if (! isset($_POST["email"]) || ! isset($_POST["password"])) {
            return back()->withErrors([
                "email" => "Email and Password are required",
            ]);
        }

        if ($_POST['password'] !== $_POST['confirm_password']) {
            return back()->withErrors([
                "password" => "Password and Password Confirmation must be the same",
            ]);
        }

        $first_name = $request->get('fname');
        $last_name = $request->get('lname');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));

        $exists = DB::select("select id from users where email=?", [$email]);
        if (count($exists) > 0) {
            return back()->withErrors([
                "email" => "Email already exists",
            ]);
        }

        DB::insert("insert into users (first_name, last_name, phone, email, password) values(?, ?, ?, ?, ?)", [
            $first_name,
            $last_name,
            $phone,
            $email,
            $password,
        ]);

        $userId = DB::select("Select id from users where email=? limit 1", [$email])[0]->id;
        auth()->loginUsingId($userId);

        return redirect("/dashboard");

    }
}
