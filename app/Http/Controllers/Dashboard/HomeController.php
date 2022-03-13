<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function home() : View
    {
        $superadmin = User::role('superadmin')->get();
        return view("web.dashboard.sections.home.index", compact('superadmin'));
    }
}
