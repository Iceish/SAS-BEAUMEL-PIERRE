<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),                     // name: name / ex: Clemmie King
            'email' => $this->faker->unique()->safeEmail(),     // email: safeEmail / ex: pacocha.chadrick@example.org
            'postal_code' => $this->faker->frenchPostalCode(),  // postal_code: frenchPostalCode / ex: 65131 / Creation faker: app/Faker/Geography.php
            'city' => $this->faker->city(),                     // city: city / ex: Port Henriette
            'address' => $this->faker->address(),               // address: address / ex: 927 Jalon Via Apt. 755 Port Nicholas, OR 84357
        ];
    }
}
