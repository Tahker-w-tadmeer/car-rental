<?php

namespace App\Controllers;

use App\Model;
use App\View;

class LoginController
{
    public function show()
    {
        return View::make("login", [
            "title" => "Login",
        ]);
    }

    public function logout()
    {
        session_destroy();
        setcookie('email', '', time() - 3600);
        setcookie('password', '', time() - 3600);
        header('Location: /login');
    }

    public function check()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);
        $model = new Model();
        $user_from_db = $model->execute("select email, password from user where email=? limit 1", [$email])->fetch_assoc();

        if (! password_verify($password, $user_from_db['password'])) {
            return response("/login", 401)->setResponse([
                "error" => "Wrong Email or Password",
            ]);
        }

        $_SESSION["id"] = $user_from_db["id"];
        return response("/");
    }
}