<?php

use App\Models\Language;
use App\Models\Partner;
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
        Schema::create('partner_language', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Language::class)->references('id')->on('languages')->onDelete("cascade");
            $table->foreignIdFor(Partner::class)->references('id')->on('partners')->onDelete("cascade");
            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_language');
    }
};
