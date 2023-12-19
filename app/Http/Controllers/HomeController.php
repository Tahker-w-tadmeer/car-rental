<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() {
        return viewWithLayout("welcome", "basic", [
            "title" => "Home",
        ]);
    }

}
