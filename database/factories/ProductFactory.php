<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),                            // name: word / ex: commodi
            'quantity' => $this->faker->numberBetween(1,20),  // quantity: numberBetween / ex: 2
            'image_path' => $this->faker->filePath(),                  // image_path: filePath / ex: C:\Users\adrie\AppData\Local\Temp\fak98F8.tmp
            'price' => $this->faker->price(max:999999.99),             // price: price / ex: 3030.75 / Creation faker: app/Faker/Economy.php
        ];
    }
}

