<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function view(Rental $rental)
    {
        $car = collect(DB::select(Car::cardSQL() . " where car_id = ?", [$rental->car_id]))->first();


        return view("payments.view", [
            "title" => "Pay for rental",
            "rental" => $rental,
            "car" => new Car((array) $car),
        ]);
    }

    public function pay(Rental $rental)
    {
        $rental->paid_at = now();
        $rental->save();

        session()->flash("success", "Payment successful!");

        return redirect()->route("profile");
    }
}
