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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);
            $model = new Model();
            $user_from_db = $model->execute("select email,password from users where email='$email'");

            if ($user_from_db[0]['email'] == $email && password_verify($password, $user_from_db[0]['password'])) {
                if ($remember) {
                    setcookie('email', $email, time() + 60 * 60 * 24 * 7);
                    setcookie('password', $password, time() + 60 * 60 * 24 * 7);
                }
                $_SESSION['email'] = $email;
                header('Location: /');
            } else {
                echo "wrong email or password";
            }

        }
    }
}