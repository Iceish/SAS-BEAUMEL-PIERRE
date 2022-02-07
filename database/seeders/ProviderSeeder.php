<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory ProviderFactory
     * @return void
     */
    public function run()
    {
        Provider::factory()
            ->count(10)
            ->create();
    }
}
