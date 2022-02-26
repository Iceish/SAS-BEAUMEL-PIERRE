<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory ProviderFactory
     * @return void
     */
    public function run()
    {
        Provider::factory()
            ->count(400)
            ->create();
    }
}
