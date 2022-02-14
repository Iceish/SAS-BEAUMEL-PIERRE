<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),                      // name: name / ex: Travis Wehner
            'email' => $this->faker->unique()->safeEmail(),      // email: safeEmail / ex: leonie.thompson@example.org
            'postal_code' => $this->faker->frenchPostalCode(),   // postal_code: frenchPostalCode / ex: 44981 / Creation faker: app/Faker/Geography.php
            'city' => $this->faker->city(),                      // city: city / ex: North Antwon
            'address' => $this->faker->address(),                // address: address / ex: 78919 Isai Key East Alysa, VA
        ];
    }
}
