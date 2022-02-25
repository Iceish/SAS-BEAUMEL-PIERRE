<?php

namespace App\Translator;

use Exception;
use Illuminate\Translation\FileLoader;

class TranslationLoaderManager extends FileLoader
{
    /**
     * Load the messages for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    public function load($locale, $group, $namespace = null): array
    {
        try {
            $fileTranslations = parent::load($locale, $group, $namespace);

            if (!is_null($namespace) && $namespace !== '*') {
                return $fileTranslations;
            }

            $loaderTranslations = new Db();
            $loaderTranslations = $loaderTranslations->loadTranslations($locale, $group);
            return array_replace_recursive($fileTranslations, $loaderTranslations);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
