<?php

namespace Database\Seeders;

use App\Models\ProviderInvoice;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class ProviderInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory ProviderInvoiceFactory
     * @return void
     */
    public function run()
    {
        ProviderInvoice::factory()
            ->count(10)
            ->create();
    }
}
