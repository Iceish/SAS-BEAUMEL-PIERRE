<?php

namespace Database\Seeders\Translation\Lines;

use App\Models\Language;
use App\Models\LanguageLine;
use Illuminate\Database\Seeder;

class Fr extends Seeder
{
    private Language $lang;

    public function __construct()
    {
        $this->lang = Language::firstOrNew(
            [
                'name' => 'français',
                'code' => 'fr'
            ]
        );
        $this->lang->save();
    }

    public function run()
    {
        $this->validation();
    }

    private function validation()
    {
        $group = ['group' => 'validation'];

        LanguageLine::create(array_merge($group,['key' => 'custom.email.unique']))->setTranslation($this->lang,'L\'email est déjà utilisé.');
    }
}
