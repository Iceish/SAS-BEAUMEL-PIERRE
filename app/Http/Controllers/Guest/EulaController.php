<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EulaController extends Controller
{
    public function eula(): Factory|View|Application
    {
        return view("web.static.sections.eula.show");
    }
}
