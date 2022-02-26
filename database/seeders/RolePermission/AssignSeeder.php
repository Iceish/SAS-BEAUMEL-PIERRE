<?php

namespace Database\Seeders\RolePermission;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignSeeder extends Seeder
{
    public function run(){
        $user = User::find(1);
        $role = Role::findByName('SuperAdmin');
        $user->assignRole($role);
    }
}
