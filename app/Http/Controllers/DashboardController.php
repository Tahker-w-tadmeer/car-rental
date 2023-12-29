<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $cars = collect(DB::select('Select * from cars'))
            ->map(fn($car) => (array) $car)
            ->mapInto(Car::class);

        return view("dashboard", compact('cars'));
    }
}
