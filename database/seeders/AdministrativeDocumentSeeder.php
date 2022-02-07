<?php

namespace Database\Seeders;

use App\Models\AdministrativeDocument;
use Illuminate\Database\Seeder;

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
