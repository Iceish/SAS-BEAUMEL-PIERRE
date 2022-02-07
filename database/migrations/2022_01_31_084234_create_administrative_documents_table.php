<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     * Allows to migrate the administrative_documents table in database
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
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
        Schema::dropIfExists('administrative_documents');
    }
}
