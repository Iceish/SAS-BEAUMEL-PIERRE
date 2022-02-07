<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory ProductFactory
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(10)
            ->create();
    }
}
