<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsGroups = [
            "users" =>  ["index","create","edit","delete","show"],
            "dashboard" =>  ["index"],
            "invoice" =>  ["index","create","edit","delete","show"],
        ];

        foreach ($permissionsGroups as $permissionsGroupName=>$permissions){
            foreach($permissions as $permission){
                Permission::create(['name' => "${$permissionsGroupName}${$permission}"]);
            }
        }

        $role = Role::create(['name' => 'SuperAdmin']);
        $user = User::factory()->create([
            'email' => 'rmurat.murat@gmail.com',
        ]);

        $user->assignRole($role);
    }
}
