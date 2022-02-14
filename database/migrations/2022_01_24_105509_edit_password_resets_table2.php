<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditPasswordResetsTable2 extends Migration
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
            $table->dropForeign('password_resets_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
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
