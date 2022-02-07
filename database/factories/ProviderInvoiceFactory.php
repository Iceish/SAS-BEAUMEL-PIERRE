<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderInvoiceFactory extends Factory
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
            'provider_id' => Provider::all()->random()->id,    // provider_id: id / ex: 4
        ];
    }
}

