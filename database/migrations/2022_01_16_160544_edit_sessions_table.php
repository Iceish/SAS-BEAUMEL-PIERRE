<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSessionsTable extends Migration
{
    /**
     * Run the migrations.
     * Allows to migrate the sessions table in database
     * @return void
     * Create with the command « php artisan make:migration create_name_of_table_table »
     * Fill up() with the attributes of the table
     * Migrate tables with the command « php artisan migrate»
     */
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign("user_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
