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
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'show user']);

        $role = Role::create(['name' => 'SuperAdmin']);
        $user = User::factory()->create([
            'email' => 'rmurat.murat@gmail.com',
        ]);

        $user->assignRole($role);

    }
}
