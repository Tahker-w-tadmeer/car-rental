<?php

namespace App\Models;

class User extends Model
{
    protected array $hidden = ["password"];

    public function isAdmin() : bool
    {
        return $this->type === "Admin";
    }
}