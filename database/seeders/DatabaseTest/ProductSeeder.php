<?php

namespace Database\Seeders\DatabaseTest;

use App\Models\Product;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
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
