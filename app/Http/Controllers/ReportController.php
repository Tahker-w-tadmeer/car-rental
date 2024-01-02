<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;
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
            collect(DB::select("Select sum(total_price) as total_price, date (rentals.reserved_at) as reserved_at, count(*) as count
            from rentals
           where reserved_at between ? and ?
           group by date (rentals.reserved_at)
         ", [$startDate, $endDate]))
        ->map(fn($payment) => [
            "price" => $payment->total_price,
            "date" => $payment->reserved_at,
            "count" => $payment->count,
        ])->keyBy("date");

        $paymentsWithZero = [];
        $date = Carbon::parse($startDate);
        while($date->lessThanOrEqualTo(Carbon::parse($endDate))) {
            $paymentsWithZero[$date->format("Y-m-d")] = $payments[$date->format("Y-m-d")] ?? [
                "price" => 0,
                "date" => $date->copy()->format("Y-m-d"),
                "count" => 0,
            ];
            $date->addDay();
        }

        $paymentsWithZero = collect($paymentsWithZero)
            ->map(fn($p) => [
                "price" => $p["price"],
                "date" => Carbon::parse($p["date"]),
                "count" => $p["count"],
            ]);

        return view("payment", ["payments" => $paymentsWithZero]);
    }

}
