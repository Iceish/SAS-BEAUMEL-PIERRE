<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     * Allows to migrate the password_resets table in database
     * @return void
     * Create with the command « php artisan make:migration create_name_of_table_table »
     * Fill up() with the attributes of the table
     * Migrate tables with the command « php artisan migrate»
     */
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->primary()->references('id')->on('users');
            $table->dropColumn("email");
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
