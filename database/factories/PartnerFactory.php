<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),                        // name: name / ex: Liza Purdy
            'email' => $this->faker->unique()->safeEmail(),        // email: safeEmail / ex: columbus95@example.net
            'postal_code' => $this->faker->frenchPostalCode(),     // postal_code: frenchPostalCode / ex: 02414 / Creation faker: app/Faker/Geography.php
            'city' => $this->faker->city(),                        // city: city / ex: Hansenmouth
            'address' => $this->faker->address(),                  // address: address / ex: 137 Hoeger Islands Lake Ashley, LA 03420-3294
        ];
    }
}
