<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['licence_plate' => "mixed", 'revision_date' => "string", 'available' => "bool"])]
    public function definition(): array
    {
        return [
            'licence_plate' => $this->faker->licencePlate(),     // licence_plate: licencePlate / ex: WR-002-KF / Creation faker: app/Faker/Vehicle.php
            'revision_date' => $this->faker->date(),             // revision_date: date / ex: 1972-09-30
            'available' => $this->faker->boolean(),              // available: boolean / ex: 0
        ];
    }
}

