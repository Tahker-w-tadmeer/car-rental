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
            DB::select(
                Car::cardSQL() . " where (pickup_date between ? and ?) or (return_date between ? and ?) order by pickup_date asc",
            [$startDate, $endDate, $startDate, $endDate])
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
        if($startDate && $endDate) {
            while ($date->lessThanOrEqualTo(Carbon::parse($endDate))) {
                $paymentsWithZero[$date->format("Y-m-d")] = $payments[$date->format("Y-m-d")] ?? [
                    "price" => 0,
                    "date" => $date->copy()->format("Y-m-d"),
                    "count" => 0,
                ];
                $date->addDay();
            }
        }

        $paymentsWithZero = collect($paymentsWithZero)
            ->map(fn($p) => [
                "price" => $p["price"],
                "date" => Carbon::parse($p["date"]),
                "count" => $p["count"],
            ]);

        return view("payment", ["payments" => $paymentsWithZero]);
    }

    public function status(Request $request)
    {
        $request->validate([
            "date" => "date",
        ]);

        $date = $request->date("date");

        $rentedCarsIds = collect(DB::select("select cars.id from cars
                left join rentals on rentals.car_id = cars.id
                where rentals.pickup_date <= ? and rentals.return_date >= ?
                group by cars.id
            ", [$date, $date]))
            ->pluck("id")
            ->all();

        $cars = collect(
            DB::select("select cars.*, models.name as model_name, brands.name as brand_name from cars
                left join rentals on rentals.car_id = cars.id
                left join models on models.id = cars.model_id
                left join brands on brands.id = models.brand_id
                left join offices on offices.id = cars.office_id
                group by cars.id
            ")
        )->map(function ($car) use($rentedCarsIds) {
            $car = (array)$car;

            if(in_array($car["id"], $rentedCarsIds)) {
                $car["status"] = "Rented";
            }

            $car["name"] = $car["model_name"] . " " . $car["brand_name"];

            return $car;
        })
            ->mapInto(Car::class);


        return view("status", ["cars" => $cars]);
    }
}
