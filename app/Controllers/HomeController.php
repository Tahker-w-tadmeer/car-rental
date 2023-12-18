<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index() {
        return View::make("welcome", [
            "title" => "Home",
        ]);
    }
}