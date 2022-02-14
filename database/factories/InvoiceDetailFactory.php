<?php

namespace Database\Factories;

use App\Models\CustomerInvoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * The factories are created with the command « php artisan make:factory ModelNameFactory ».
 * Fill the definition function using the models
 */
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
            'transport' => $this->faker->word(),                            // transport: word / ex: saepe
            'VAT' => $this->faker->vatPercent(),                            // VAT: vatPercent / ex: 44.25 / Creation faker: app/Faker/Economy.php
            'quantity' => $this->faker->randomFloat(),                      // quantity: randomFloat / ex: 16
            'product_id' => Product::all()->random()->id,                   // product_id: id / ex: 1
            'customer_invoice_id' => CustomerInvoice::all()->random()->id,  // customer_invoice_id: id / ex: 3
        ];
    }
}

