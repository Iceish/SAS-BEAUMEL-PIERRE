<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Partner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InvoiceController extends Controller
{
    function __construct(){

    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): View|Factory|Application
    {
        $validated= $request->validated();

        $searchText = $validated["search"] ?? "";

        return view("web.dashboard.sections.invoices.index");
    }
}
