<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GuestController extends Controller
{
    public function home(): Factory|View|Application
    {
        return view("web.static.sections.home.show");
    }

    public function about(): Factory|View|Application
    {
        return view("web.static.sections.about.show");
    }

    public function clients(): Factory|View|Application
    {
        return view("web.static.sections.clients.show");
    }

    public function partners(): Factory|View|Application
    {
        return view("web.static.sections.partners.show");
    }
}
