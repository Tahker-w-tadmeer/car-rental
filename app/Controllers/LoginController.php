<?php

namespace App\Controllers;

use App\DB;
use App\View;

class LoginController
{
    public function show()
    {
        return viewWithLayout("login", "basic", [
            "title" => "Login",
        ]);
    }

    public function logout()
    {
        return logout();
    }

    public function check()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $model = new DB();
        $user_from_db = $model->execute("select id, email, password from user where email=? limit 1", [$email])->fetch_assoc();

        if (! password_verify($password, $user_from_db['password'])) {
            return response("/login", 401)->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }

        $_SESSION["id"] = $user_from_db["id"];
        return response("/dashboard");
    }
}