<?php

namespace Database\Seeders\RolePermission;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignSeeder extends Seeder
{
    public function run(){
        $user = User::where('email','admin@test.com')->first();
        $role = Role::findByName('SuperAdmin');
        $user->assignRole($role);
    }
}
