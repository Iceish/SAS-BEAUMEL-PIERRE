<?php

namespace Database\Seeders\DatabaseTest;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory UserFactory
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(80)
            ->create();
    }
}
