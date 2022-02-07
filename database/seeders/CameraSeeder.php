<?php

namespace Database\Seeders;

use App\Models\Camera;
use Illuminate\Database\Seeder;

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
