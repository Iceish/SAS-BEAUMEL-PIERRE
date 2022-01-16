<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VitrineController extends Controller
{
    public function home(): Factory|View|Application
    {
        return view("Vitrine.home");
    }

    public function about(): Factory|View|Application
    {
        return view("Vitrine.about");
    }

    public function clients(): Factory|View|Application
    {
        return view("Vitrine.clients");
    }

    public function partners(): Factory|View|Application
    {
        return view("Vitrine.partners");
    }
}
