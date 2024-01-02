<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
        'pickup_date' => 'date',
        'picked_up_at' => 'datetime',
        'return_date' => 'date',
        'returned_at' => 'datetime',
        'reserved_at' => 'datetime',
    ];
    public function car() : BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
