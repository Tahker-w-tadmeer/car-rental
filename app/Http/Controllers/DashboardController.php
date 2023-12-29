<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $cars=DB::table('cars')->get();
        return view("dashboard",compact('cars'));
    }
}
