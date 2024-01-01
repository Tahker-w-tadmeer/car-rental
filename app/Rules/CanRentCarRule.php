<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CanRentCarRule implements ValidationRule
{

    public function __construct(
        protected $carId,
        protected Carbon $start,
        protected Carbon $end
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $start = $this->start->format("Y-m-d");
        $end = $this->end->format("Y-m-d");
        $rentals = collect(DB::select(
            "SELECT count(*) as count from rentals
            where rentals.car_id = ? and
            ((rentals.pickup_date <= ? and rentals.return_date >= ?) or
            (rentals.pickup_date <= ? and rentals.return_date >= ?) or
            (rentals.pickup_date >= ? and rentals.return_date <= ?))",
            [
                $this->carId,
                $start,
                $start,
                $end,
                $end,
                $start,
                $end,
            ]
        ))->first();

        if($rentals->count > 0) {
            $fail("This car is already rented for the selected period");
        }
    }
}
