<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'email' => "string", 'email_verified_at' => "\Illuminate\Support\Carbon", 'password' => "string", 'remember_token' => "string"])]
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),                    // name: name / ex: Prof. Emerald Lemke
            'email' => $this->faker->unique()->safeEmail(),    // email: safeEmail / ex: emie67@example.net
            'email_verified_at' => now(),                      // email_verified_at: now() / ex: 2022-02-07 08:11:26
            'password' => 'password',                          // password: password
            'remember_token' => Str::random(10),         // remember_token: Str::random(10) / ex: CyI10JkNlN
            'postal_code' => $this->faker->frenchPostalCode(),  // postal_code: frenchPostalCode / ex: 65131 / Creation faker: app/Faker/Geography.php
            'city' => $this->faker->city(),                     // city: city / ex: Port Henriette
            'address' => $this->faker->address(),               // address: address / ex: 927 Jalon Via Apt. 755 Port Nicholas, OR 84357
            'tel' => $this->faker->phoneNumber(),               // tel: tel / ex: 04 62 78 95 32
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
