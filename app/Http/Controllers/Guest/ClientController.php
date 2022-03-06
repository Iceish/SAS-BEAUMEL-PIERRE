<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
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
}
