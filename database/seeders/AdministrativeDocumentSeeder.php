<?php

namespace Database\Seeders;

use App\Models\AdministrativeDocument;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class AdministrativeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory AdministrativeDocumentFactory
     * @return void
     */
    public function run()
    {
        AdministrativeDocument::factory()
            ->count(10)
            ->create();
    }
}
