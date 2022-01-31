<?php

namespace Database\Factories;

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
            'totalTTC' => $this->faker->price(),
            'payment_date' => $this->faker->date(),
            'payment_mode' => $this->faker->paymentMode(),
        ];
    }
}

