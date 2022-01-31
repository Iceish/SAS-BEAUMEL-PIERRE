<?php

use App\Faker\Vehicle;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vehicle::class)->references('id')->on('vehicles');
            $table->foreignIdFor(User::class)->references('id')->on('users');
            $table->text('reason');
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles_has_users');
    }
}
