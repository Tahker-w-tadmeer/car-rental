<?php

namespace App\Controllers;

use App\Model;
use App\View;

class LoginController
{
    public function show() {
        $model = new Model();
        $cities = $model->execute("SELECT * FROM city")->fetch_all(MYSQLI_ASSOC);

        return View::make("login", [
            "title" => "Login",
            "cities" => $cities
        ]);
    }

    public function store()
    {

    }
}