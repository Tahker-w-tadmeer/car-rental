<?php

namespace Database\Factories;

use App\Models\CarType;
use App\Models\Model;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $modelId = Model::query()->inRandomOrder()->first()->id;
        $officeId = Office::query()->inRandomOrder()->first()->id;
        $typeId = CarType::query()->inRandomOrder()->first()->id;

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
