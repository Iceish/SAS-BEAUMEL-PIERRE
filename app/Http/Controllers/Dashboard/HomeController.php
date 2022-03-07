<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function home() : View
    {
        return view("web.dashboard.sections.home.index");
    }
}
