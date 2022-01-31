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
            'licence_plate' => $this->faker->licencePlate(),
            'revision_date' => $this->faker->date(),
            'available' => $this->faker->boolean(),
        ];
    }
}

