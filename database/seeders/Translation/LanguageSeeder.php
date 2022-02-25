<?php

namespace Database\Seeders\Translation;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Adds in database the datasets created by the factory CameraFactory
     * @return void
     */
    public function run()
    {
        $this->lang();
    }

    public function lang(){
        Language::firstOrCreate([
            'name' => 'english',
            'code' => 'en'
        ]);
        Language::firstOrCreate([
            'name' => 'français',
            'code' => 'fr'
        ]);
    }
}
