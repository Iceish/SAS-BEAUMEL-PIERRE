<?php

namespace Database\Seeders;

use App\Models\InvoiceDetail;
use Illuminate\Database\Seeder;

/**
 * The seeders are created with the command « php artisan make:seeder ModelNameSeeder »
 * Fill the run function with the given number of faults
 */
class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory InvoiceDetailFactory
     * @return void
     */
    public function run()
    {
        InvoiceDetail::factory()
            ->count(500)
            ->create();
    }
}
