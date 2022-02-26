<?php

namespace Database\Seeders;

use Database\Seeders\RolePermission\RolePermissionSeeder;
use Database\Seeders\Translation\TranslationSeeder;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Adds in database the datasets
     * @return void
     */
    public function run()
    {
        $this->call(TranslationSeeder::class);
        $this->call(RolePermissionSeeder::class);

    }
}
