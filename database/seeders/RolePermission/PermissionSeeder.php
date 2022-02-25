<?php

namespace Database\Seeders\RolePermission;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(){
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsGroups = [
            "users" =>  ["list","create","edit","delete"],
            "dashboard" =>  ["index"],
            "invoice" =>  ["list","create","edit","delete"],
            "partners" =>  ["list","create","edit","delete"],
            "clients" =>  ["list","create","edit","delete"],
            "providers" =>  ["list","create","edit","delete"],
            "vehicles" =>  ["list","create","edit","delete"],
            "roles" =>  ["list","create","edit","delete"],
        ];

        foreach ($permissionsGroups as $permissionsGroupName=>$permissions){
            foreach($permissions as $permission){
                Permission::firstOrCreate(['name' => "$permissionsGroupName.$permission"]);
            }
        }
    }
}
