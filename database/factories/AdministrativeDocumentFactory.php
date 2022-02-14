<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class AdministrativeDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),           // name: word / ex: animi
            'path' => $this->faker->filePath(),       // path: filePath / ex: C:\Users\adrie\AppData\Local\Temp\fakCE16.tmp
        ];
    }
}
