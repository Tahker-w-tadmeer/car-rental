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

//    public function create()
//    {
//        $this->execute("INSERT INTO car (name, model, year, price) VALUES (?, ?, ?, ?)", [
//            "name" => $this->faker->name,
//            "model" => $this->faker->name,
//            "year" => $this->faker->year,
//            "price" => $this->faker->randomNumber(5),
//        ]);
//    }
//
//    public function delete()
//    {
//        $this->execute("DELETE FROM car");
//    }
//
//    public function all()
//    {
//        return $this->execute("SELECT * FROM car")->fetch_all(MYSQLI_ASSOC);
//    }
//
//    public function find($id)
//    {
//        return $this->execute("SELECT * FROM car WHERE id=?", [$id])->fetch_assoc();
//    }
//
//    public function update($id)
//    {
//        $this->execute("UPDATE car SET name=?, model=?, year=?, price=? WHERE id=?", [
//            "name" => $this->faker->name,
//            "model" => $this->faker->name,
//            "year" => $this->faker->year,
//            "price" => $this->faker->randomNumber(5),
//            "id" => $id,
//        ]);
//    }
//
//    public function deleteById($id)
//    {
//        $this->execute("DELETE FROM car WHERE id=?", [$id]);
//    }
}