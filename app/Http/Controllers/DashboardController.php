<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $cars = collect(DB::select('Select cars.* from cars
        join models on cars.model_id = models.id
        join offices on cars.office_id = offices.id
        join car_types on cars.type_id = car_types.id
        order by cars.id asc
        '))
            ->map(fn($car) => (array)$car)
            ->mapInto(Car::class);

        return view("dashboard", compact('cars'));
    }

    public function rent($id)
    {

        $selectedCar = collect(DB::select('Select cars.*,m.name,ct.type_name,o.name as office_name,c.name as city_name from cars
              join carRentel.models m on m.id = cars.model_id
              join carRentel.car_types ct on cars.type_id = ct.id
              join carRentel.offices o on cars.office_id = o.id
              join carRentel.cities c on c.id = o.city_id
              where cars.id = ?', [$id]))
            ->map(fn($selectedCar) => (array)$selectedCar)
            ->mapInto(Car::class);


        $rent = collect(DB::select('Select rentals.* from rentals where car_id = ?', [$id]))
            ->map(fn($rent) => (array)$rent)
            ->mapInto(Rental::class);


        return view("rent.car_details", [
            'selectedCar' => $selectedCar,
            'rent' => $rent

        ]);


    }
}
