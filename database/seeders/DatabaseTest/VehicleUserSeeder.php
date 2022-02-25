<?php

namespace Database\Seeders\DatabaseTest;

use App\Models\User;
use App\Models\Vehicle;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class VehicleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory VehicleUserFactory
     * @return void
     */
    public function run()
    {
        DB::table('vehicles_users')->insert([
            'reason' => Str::random(),
            'start_date' => DateTime::date(),
            'end_date' => DateTime::date(),
            'vehicle_id' => Vehicle::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);
    }
}

