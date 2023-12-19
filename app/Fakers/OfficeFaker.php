<?php

namespace App\Fakers;

use App\DB;

class OfficeFaker extends Faker
{
    protected string $table = "office";

    public function attributes() : array
    {
        return [
            "city_id" => (new DB())->execute("Select id from city order by RAND() limit 1")->fetch_column(),
            "address" => $this->faker->address(),
            "phone" => $this->faker->phoneNumber(),
        ];
    }
}