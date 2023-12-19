<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ElModel;

class Model extends ElModel
{
    use HasFactory;
    public $timestamps = false;
}
