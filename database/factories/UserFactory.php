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
