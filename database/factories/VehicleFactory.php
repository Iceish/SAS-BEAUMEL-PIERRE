<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'licence_plate' => $this->faker->licencePlate(),
            'revision_date' => $this->faker->date(),
            'available' => $this->faker->boolean(),
        ];
    }
}

