<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

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
            ->count(10)
            ->create();
    }
}
