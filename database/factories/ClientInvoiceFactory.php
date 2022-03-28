<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class ClientInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => $this->faker->filePath(),                // path: filePath / ex: C:\Users\adrie\AppData\Local\Temp\fakEF2D.tmp
            'date' => $this->faker->date(),                    // date: date / ex: 1977-09-23
            'client_id' => Client::all()->random()->id,    // client_id: id / ex: 4
        ];
    }
}

