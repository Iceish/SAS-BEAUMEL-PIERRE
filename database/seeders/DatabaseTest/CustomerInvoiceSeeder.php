<?php

namespace Database\Seeders\DatabaseTest;

use App\Models\CustomerInvoice;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class CustomerInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory CustomerInvoiceFactory
     * @return void
     */
    public function run()
    {
        CustomerInvoice::factory()
            ->count(2000)
            ->create();
    }
}
