<?php

use App\Models\Ckeditor;
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
        Schema::create('ckeditor_language', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Language::class)->references('id')->on('languages')->onDelete("cascade");
            $table->foreignIdFor(Ckeditor::class)->references('id')->on('ckeditor')->onDelete("cascade");
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
        Schema::dropIfExists('ckeditor_language');
    }
};
