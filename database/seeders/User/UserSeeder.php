<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(){
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'root',
        ]);
    }
}
