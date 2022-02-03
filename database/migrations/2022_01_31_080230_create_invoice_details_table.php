<?php

use App\Models\CustomerInvoice;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('transport');
            $table->float('VAT');
            $table->unsignedInteger('quantity');
            $table->foreignIdFor(Product::class)->references('id')->on('products');
            $table->foreignIdFor(CustomerInvoice::class)->references('id')->on('customer_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
