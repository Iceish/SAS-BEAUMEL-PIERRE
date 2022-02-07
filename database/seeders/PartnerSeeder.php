<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

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
            ->count(10)
            ->create();
    }
}
