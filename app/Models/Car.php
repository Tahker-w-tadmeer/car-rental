<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public static string $imagePath = "public/images";

    protected $casts = [
        'return_date' => 'date',
        'pickup_date' => 'date',
        'reserved_at' => 'datetime',
        'picked_up_at' => 'timestamp',
        'returned_at' => 'timestamp',
    ];

    public function image() : Attribute
    {
        return Attribute::get(
            function ($image) {
                if (!$image || !Storage::exists(self::$imagePath . "/$image")) {
                    return asset("images/car.png");
                }

                return (self::$imagePath . "/$image");
            },
        );
    }

    public function isActive() : bool
    {
        return $this->status == "Active";
    }

    public function getStatus(Carbon $start, Carbon $end)
    {
        // Write in SQL
        $result = DB::select("SELECT count(*) FROM rentals WHERE car_id=? AND (pickup_date BETWEEN ? AND ? OR return_date BETWEEN ? AND ?) LIMIT 1", [
            $this->id,
            $start,
            $end,
            $start,
            $end,
        ]);

        dd($result);
    }
}
