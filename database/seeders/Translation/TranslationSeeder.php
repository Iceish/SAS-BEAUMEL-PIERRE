<?php

namespace Database\Seeders\Translation;

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run(){

        $this->call(LanguageLinesSeeder::class);
        $this->call(LanguageSeeder::class);
    }
}
