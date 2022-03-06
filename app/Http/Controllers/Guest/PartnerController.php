<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PartnerController extends Controller
{
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
