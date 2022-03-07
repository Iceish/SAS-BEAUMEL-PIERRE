<?php

use App\Models\Client;
use App\Models\Language;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_language', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Language::class)->references('id')->on('languages')->onDelete("cascade");
            $table->foreignIdFor(Client::class)->references('id')->on('clients')->onDelete("cascade");
            $table->longText('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_language');
    }
};
