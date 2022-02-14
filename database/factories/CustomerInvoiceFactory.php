<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
class CustomerInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'totalTTC' => $this->faker->price(max:999999.99),     // totalTTC: price / ex: 489146.34 / Creation faker: app/Faker/Economy.php
            'payment_date' => $this->faker->date(),               // payment_date: date / ex: 2013-02-27
            'payment_mode' => $this->faker->paymentMode(),        // payment_mode: paymentMode / ex: cash / Creation faker: app/Faker/Economy.php
            'client_id' => Client::all()->random()->id,           // client_id: id reference to the table Client / ex: 3
        ];
    }
}

