<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'totalTTC' => $this->faker->price(max:999999.99),
            'payment_date' => $this->faker->date(),
            'payment_mode' => $this->faker->paymentMode(),
            'client_id' => Client::all()->random()->id,
        ];
    }
}

