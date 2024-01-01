<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarType;
use App\Models\Model;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $images = glob(__DIR__ . "/cars/*");
        $filename = null;
        if($this->faker->numberBetween(1, 4) != 1) { // 25% chance of no image
            $image = $images[array_rand($images)];
            $image = basename($image);
            $filename = Str::random(32);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $filename .= ".$extension";

            copy(__DIR__ . "/cars/$image", Storage::path(Car::$imagePath . "/$filename"));
        }

        return [
            "model_id" => $modelId,
            "year" => $this->faker->year(),
            "plate_id" => $this->faker->numerify('###-###'),
            "color" => $this->faker->randomElement(["white", "black", "red", "blue", "green", "silver", "orange", "purple", "gold", "brown", "gray"]),
            "office_id" => $officeId,
            "image" => $filename,
            "mileage" => $this->faker->numberBetween(0, 100000),
            "status" => ["Active", "Out of Service"][$this->faker->numberBetween(0, 5) == 0 ? 1 : 0],
            "type_id" => $typeId,
            "fuel" => $this->faker->randomElement(["Gas", "Hybrid", "Electric"]),
            "transmission" => $this->faker->randomElement(["Manual", "Automatic"]),
            "price_per_day" => $this->faker->numberBetween(10, 200),
        ];
    }
}
