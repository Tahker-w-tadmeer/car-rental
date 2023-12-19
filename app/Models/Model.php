<?php

namespace App\Models;

class Model
{
    protected array $hidden = [];

    protected array $attributes = [];

    public function __construct($object)
    {
        $this->attributes = $object;
    }

    public function __get($name)
    {
        return $this->{$name} ?? $this->attributes[$name] ?? null;
    }
}