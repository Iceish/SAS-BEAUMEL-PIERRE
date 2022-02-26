<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory VehicleFactory
     * @return void
     */
    public function run()
    {
        Vehicle::factory()
            ->count(20)
            ->create();
    }
}
