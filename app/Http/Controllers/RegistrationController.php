<?php

namespace App\Http\Controllers;

use App\DB;

class RegistrationController extends Controller
{
    public function show()
    {
        return viewWithLayout("register", "basic", [
            "title" => "Register",
        ]);
    }

    public function store()
    {
        if (! isset($_POST["email"]) || ! isset($_POST["password"])) {
            return response("/register", 401)->setResponse([
                "error" => "Email and Password are required",
            ]);
        }

        if ($_POST['password'] !== $_POST['confirm_password']) {
            return response("/register", 401)->setResponse([
                "error" => "Password and Password Confirmation must be the same",
            ]);
        }

        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model = new DB();
        $exists = $model->execute("select id from user where email=? limit 1", [$email])->num_rows;
        if ($exists > 0) {
            return response("/register", 401)->setResponse([
                "error" => "Email already exists",
            ]);
        }
        $model->execute("insert into user (first_name, last_name, phone, email, password) values(?, ?, ?, ?, ?)", [
            $first_name,
            $last_name,
            $phone,
            $email,
            $password,
        ]);

        $_SESSION["id"] = $model->execute("Select id from user where email=?", [$email])->fetch_column();

        return response("/dashboard");

    }
}
