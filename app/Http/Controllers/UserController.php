<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query = "Select * from users where 1=1";

        if($request->has("search")) {
            $search = $request->get("search");

            collect(str_getcsv($search, " ", '"'))
                ->filter()
                ->each(function ($term) use(&$query) {
                    $query .= " and (first_name like '$term%' or
                    last_name like '$term%' or
                    email like '$term%' or
                    phone like '$term%')";
                });
        }

        $query .= " order by id";

        $users = collect(DB::select($query))
            ->map(fn($user) => (array) $user)
            ->mapInto(User::class);


        return view("users.index", compact("users"));
    }

    public function show($user)
    {
        $user = collect(DB::select("Select * from users where id=?", [$user]))
            ->map(fn($user) => (array) $user)
            ->mapInto(User::class)
            ->firstOrFail();

        $cars = collect(DB::select(Car::cardSQL() . " where rentals.user_id=?", [$user->id]))
            ->map(fn($car) => (array) $car)
            ->mapInto(Car::class);


        return view("users.show", compact("user", "cars"));
    }
}
