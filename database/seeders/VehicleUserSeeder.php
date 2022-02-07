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

class VehicleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
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

