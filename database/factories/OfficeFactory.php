<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Select id from city order by RAND() limit 1

        return [
            "name" => $this->faker->company(),
            "city_id" => City::query()->inRandomOrder()->first()->id,
            "address" => $this->faker->address(),
            "phone" => $this->faker->phoneNumber(),
        ];
    }
}
