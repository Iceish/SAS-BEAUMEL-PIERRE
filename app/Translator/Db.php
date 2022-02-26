<?php

namespace App\Translator;

use App\Models\Language;
use App\Models\LanguageLine;

class Db implements TranslationLoader
{
    protected static Language|null|string $lang = null;

    public function loadTranslations(string $locale, string $group): array
    {
        if(self::$lang === null){
            self::$lang = (Language::where('code',$locale)->first() ?? "none");
        }
        if(self::$lang === "none")return [];
        else return LanguageLine::getTranslationsForGroup(self::$lang, $group);
    }
}
