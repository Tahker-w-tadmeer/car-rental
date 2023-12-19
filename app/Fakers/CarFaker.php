<?php

namespace App\Fakers;

use App\DB;

class CarFaker extends Faker
{
    protected string $table = "car";

    public function attributes() : array
    {
        $modelId = (new DB)->execute("SELECT id FROM model order by RAND() limit 1")->fetch_column();
        $officeId = (new DB)->execute("SELECT id FROM office order by RAND() limit 1")->fetch_column();
        $typeId = (new DB)->execute("SELECT id FROM car_type order by RAND() limit 1")->fetch_column();

        return [
            "model_id" => $modelId,
            "year" => $this->faker->year(),
            "plate_id" => $this->faker->numerify('###-###'),
            "color" => $this->faker->randomElement(["white", "black", "red", "blue", "green", "silver", "orange", "purple", "gold", "brown", "gray"]),
            "office_id" => $officeId,
            "image" => "",
            "mileage" => $this->faker->numberBetween(0, 100000),
            "type_id" => $typeId,
            "category" => $this->faker->randomElement(["Gas", "Hybrid", "Electric"]),
            "status" => $this->faker->randomElement([...array_fill(0, 10, "Active"), "Out of Service"]),
            "price_per_day" => $this->faker->numberBetween(10, 200),
        ];
    }
}