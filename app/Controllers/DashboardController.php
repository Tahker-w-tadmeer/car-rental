<?php

namespace App\Controllers;

use App\View;

class DashboardController
{
    public function index() {
        if(! isLoggedIn()) {
            return response("/login");
        }

        return view("dashboard");
    }

}