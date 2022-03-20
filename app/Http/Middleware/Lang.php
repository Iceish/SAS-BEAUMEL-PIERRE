<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Str;

class Lang
{
    public function handle($request, Closure $next)
    {
        $preferredLang = $request->getPreferredLanguage();
        $lang = Str::of($preferredLang)->split('/_/')[0];
        App::setLocale($lang);

        return $next($request);
    }
}
