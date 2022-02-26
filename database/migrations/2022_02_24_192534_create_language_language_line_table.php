<?php

use App\Models\Language;
use App\Models\LanguageLine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLanguageLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_language_line', function (Blueprint $table) {
            $table->foreignIdFor(LanguageLine::class)->references('id')->on('language_lines')->onDelete("cascade");;
            $table->foreignIdFor(Language::class)->references('id')->on('languages')->onDelete("cascade");
            $table->string('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_language_lines');
    }
};
