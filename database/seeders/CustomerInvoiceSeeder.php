<?php

namespace Database\Seeders;

use App\Models\CustomerInvoice;
use Illuminate\Database\Seeder;

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
            ->count(10)
            ->create();
    }
}
