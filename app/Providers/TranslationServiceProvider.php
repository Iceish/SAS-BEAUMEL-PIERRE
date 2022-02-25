<?php

namespace App\Providers;

use App\Translator\TranslationLoaderManager;
use Illuminate\Translation\TranslationServiceProvider as IlluminateTranslationServiceProvider;

class TranslationServiceProvider extends IlluminateTranslationServiceProvider
{
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationLoaderManager($app['files'], $app['path.lang']);
        });
    }
}
