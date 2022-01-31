<?php

namespace Database\Seeders;

use App\Models\AdministrativeDocument;
use Illuminate\Database\Seeder;

class AdministrativeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdministrativeDocument::factory()
            ->count(10)
            ->create();
    }
}
