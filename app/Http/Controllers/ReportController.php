<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        $startDate = $request->get("start");
        $endDate = $request->get("end");
        $cars = collect(
            DB::select(Car::cardSQL() . " where pickup_date >=  ?  AND return_date <= ? order by pickup_date asc",
            [$startDate, $endDate])
        )->map(fn($car) => (array)$car)
            ->mapInto(Car::class);


        return view("report", ["cars" => $cars]);
    }

    public function payments(Request $request)
    {
        $startDate = $request->get("start");
        $endDate = $request->get("end");
        $payments =
            collect(DB::select("Select sum(total_price) as all_price, date (rentals.reserved_at) as reserved_at
            from rentals
           where reserved_at between ? and ?
           group by date (rentals.reserved_at)
         ", [$startDate, $endDate]))
        ->map(fn($payment) => [
            "price" => $payment->all_price,
            "date" => $payment->reserved_at,
        ])
        ;

        return view("payment", ["payments" => $payments]);
    }

}
