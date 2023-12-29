<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public static string $imagePath = "public/images";

    public function image() : Attribute
    {
        return Attribute::get(
            function($image) {
                if(!$image || !Storage::exists(self::$imagePath . "/$image")) {
                    return asset("images/car.png");
                }

                return Storage::get(self::$imagePath . "/$image");
            },
        );
    }
}
