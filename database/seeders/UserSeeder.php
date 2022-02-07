<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            ->count(2)
            ->create();
    }
}
