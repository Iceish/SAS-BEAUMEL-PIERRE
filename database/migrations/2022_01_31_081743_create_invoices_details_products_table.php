<?php

use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesDetailsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_details_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(InvoiceDetail::class)->references('id')->on('invoice_details');
            $table->foreignIdFor(Product::class)->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_details_has_products');
    }
}
