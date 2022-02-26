<?php

namespace Database\Seeders\DatabaseTest;

use App\Models\Partner;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory PartnerFactory
     * @return void
     */
    public function run()
    {
        Partner::factory()
            ->count(500)
            ->create();
    }
}
