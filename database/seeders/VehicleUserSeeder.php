<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleUser;
use Faker\Provider\DateTime;
use Faker\Provider\Text;
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

