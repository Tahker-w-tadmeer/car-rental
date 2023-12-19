<?php

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index() {
        return viewWithLayout("welcome", "basic", [
            "title" => "Home",
        ]);
    }

}