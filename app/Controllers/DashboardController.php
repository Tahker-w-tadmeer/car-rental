<?php

namespace App\Controllers;

use App\View;

class DashboardController
{
    public function index() {
        return view("dashboard");
    }

}