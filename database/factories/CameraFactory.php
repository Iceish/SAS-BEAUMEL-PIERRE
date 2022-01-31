<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CameraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'ip' => $this->faker->ipv6(),
            'user_name' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'place' => $this->faker->streetName(),
        ];
    }
}

