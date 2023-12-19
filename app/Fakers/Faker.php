<?php

namespace App\Fakers;

use App\DB;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Fakecar;

abstract class Faker
{
    protected string $table;
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    abstract public function attributes() : array;

    public function create(int $count = 1) : \mysqli_result|bool
    {
        $count = max($count, 1);

        $rows = [];
        $keys = [];
        for($i = 0; $i < $count; $i++) {
            $attributes = $this->attributes();
            if ($i === 0) {
                $keys = array_keys($attributes);
            }
            $rows[] = array_values($attributes);
        }
        $keyCount = count($keys);
        $rows = array_merge(...$rows);

        $sql = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES ";
        $sql .= str_repeat("(" . rtrim(str_repeat("?,", $keyCount), ",") . "),", $count);
        $sql = rtrim($sql, ",");

        $db = new DB();
        return $db->execute($sql, $rows);
    }
}