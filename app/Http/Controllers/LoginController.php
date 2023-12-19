<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function show()
    {
        return view("login", [
            "title" => "Login",
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect("/");
    }

    public function check()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = DB::select("select id, email, password from users where email=? limit 1", [$email]);
        if(count($user) == 0) {
            return redirect("/login")->withErrors([
                "email" => "Wrong Email or Password",
            ]);
        }
        $user = $user[0];

        if (! password_verify($password, $user->password)) {
            return redirect("/login")
                ->withInput(['email' => $email])
                ->withErrors([
                "email" => "Wrong Email or Password",
            ]);
        }

        auth()->loginUsingId($user->id);
        return redirect("/dashboard");
    }
}
