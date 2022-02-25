<?php

namespace Database\Seeders\Translation;

use Database\Seeders\Translation\Lines\Fr;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run(){

        $this->call(Fr::class);
        $this->call(LanguageSeeder::class);
    }
}
