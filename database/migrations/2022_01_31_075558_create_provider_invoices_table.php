<?php

use App\Models\Provider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     * Allows to migrate the provider_invoices table in database
     * @return void
     * Create with the command « php artisan make:migration create_name_of_table_table »
     * Fill up() with the attributes of the table
     * Migrate tables with the command « php artisan migrate»
     */
    public function up()
    {
        Schema::create('provider_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->date('date');
            $table->foreignIdFor(Provider::class)->references('id')->on('providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_invoices');
    }
}
