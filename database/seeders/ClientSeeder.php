<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory ClientFactory
     * @return void
     */
    public function run()
    {
        Client::factory()
            ->count(10)
            ->create();
    }
}
