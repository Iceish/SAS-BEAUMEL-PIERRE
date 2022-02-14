<?php

use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesUsersTable extends Migration
{
    /**
     * Run the migrations.
     * Allows to migrate the vehicles_users table in database
     * @return void
     * Create with the command « php artisan make:migration create_name_of_table_table »
     * Fill up() with the attributes of the table
     * Migrate tables with the command « php artisan migrate»
     */
    public function up()
    {
        Schema::create('vehicles_users', function (Blueprint $table) {
            $table->id();
            $table->text('reason');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignIdFor(Vehicle::class)->references('id')->on('vehicles')->onDelete("cascade");;
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete("cascade");;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles_users');
    }
}
