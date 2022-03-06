<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Partner;
use App\Models\Ticket;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        $clients = Client::with(['language' => function($q){
                $q->where('code',app()->getLocale());
            }])
            ->whereRelation('language','content','!=','')
            ->limit(5)
            ->get();
        return view("web.static.sections.clients.show",
            compact('clients')
        );
    }

    public function partners(): Factory|View|Application
    {
        $partners = Partner::with(['language' => function($q){
            $q->where('code',app()->getLocale());
        }])
            ->whereRelation('language','content','!=','')
            ->limit(5)
            ->get();
        return view("web.static.sections.partners.show",
            compact('partners')
        );
    }




}
