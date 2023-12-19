<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index() {
        if(! isLoggedIn()) {
            return response("/login");
        }

        return view("dashboard");
    }

}
