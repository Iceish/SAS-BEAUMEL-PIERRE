<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['VAT' => "mixed"])]
    public function definition()
    {
        return [
            'VAT' => $this->faker->vatPercent(),   // VAT: vatPercent / ex: 44.25 / Creation faker: app/Faker/Economy.php
        ];
    }
}
