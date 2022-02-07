<?php

namespace Database\Factories;

use App\Models\CustomerInvoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transport' => $this->faker->word(),
            'VAT' => $this->faker->vatPercent(),
            'quantity' => $this->faker->randomFloat(),
            'product_id' => Product::all()->random()->id,
            'customer_invoice_id' => CustomerInvoice::all()->random()->id,
        ];
    }
}

