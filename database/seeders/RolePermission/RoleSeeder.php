<?php

namespace Database\Seeders\RolePermission;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(){
        Role::firstOrCreate(['name' => 'SuperAdmin']);
    }
}
