<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
                Permission::create(['name' => "$permissionsGroupName.$permission"]);
            }
        }

        $role = Role::create(['name' => 'SuperAdmin']);
        $user = User::factory()->create([
            'email' => 'test@test.com',
        ]);

        $user->assignRole($role);
    }
}
