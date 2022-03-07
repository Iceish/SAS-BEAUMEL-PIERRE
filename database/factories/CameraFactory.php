<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class CameraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'ip' => "string", 'username' => "string", 'password' => "string", 'place' => "string"])]
    public function definition()
    {
        return [
            'name' => $this->faker->name(),            // name: name / ex: Rossie Okuneva
            'ip' => $this->faker->ipv6(),              // ip: ipv6 / ex: b19b:b619:24db:4da1:3f7f:4f74:e860:5210
            'username' => $this->faker->userName(),   // user_name: userName / ex: alfonso05
            'password' => $this->faker->password(),    // password: password / ex: %6$x;B
            'place' => $this->faker->streetName(),     // place: streetName / ex: Tamia Street
        ];
    }
}

