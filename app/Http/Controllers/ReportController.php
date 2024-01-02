<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        $startDate = $request->get("start_date");
        $endDate = $request->get("end_date");
        $cars = collect(
            DB::select(Car::cardSQL() . " where pickup_date >=  ?  AND return_date <= ? order by pickup_date asc",
            [$startDate, $endDate])
        )->map(fn($car) => (array)$car)
            ->mapInto(Car::class);


        return view("report", ["cars" => $cars]);
    }

}
