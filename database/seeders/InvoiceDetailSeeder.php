<?php

namespace Database\Seeders;

use App\Models\InvoiceDetail;
use Illuminate\Database\Seeder;

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
            ->count(10)
            ->create();
    }
}
