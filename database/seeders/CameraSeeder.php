<?php

namespace Database\Seeders;

use App\Models\Camera;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory CameraFactory
     * @return void
     */
    public function run()
    {
        Camera::factory()
            ->count(10)
            ->create();
    }
}
