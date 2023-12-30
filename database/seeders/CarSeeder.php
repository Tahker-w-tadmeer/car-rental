<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Office::factory()->count(20)->create();

        Car::factory()->count(200)->create();
    }
}
