<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:partner.list',['only ' => ['index','show']]);
        $this->middleware('permission:partner.create',['only' => ['create','store']]);
        $this->middleware('permission:parter.edit',['only' => ['edit','update']]);
        $this->middleware('permission:partner.delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): View|Factory|Application
    {
        $validated= $request->validated();

        $searchText = $validated["search"] ?? "";
        $partner = Partner::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.partner.index",
            compact("partner")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.partner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StorePartnerRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $partner = Partner::create($validated);
        try{
            $partner->save();
            return redirect()->route("dashboard.partner.index")->with("success",__("messages.partner.create.success",['partner'=>$partner]));
        }catch (\Exception){
            return redirect()->route("dashboard.partner.index")->with("errors",__("messages.partner.create",['partner'=>$partner]));
        }
    }

    /**
     * Display the specified resource.
     *
     *
     * @param Partner $partner
     * @return Application|Factory|View
     */
    public function show(Partner $partner): View|Factory|Application
    {
        return view("web.dashboard.sections.partner.show",
            compact("partner")
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return Application|Factory|View
     */
    public function edit(Partner $partner): View|Factory|Application
    {
        return view("web.dashboard.sections.partner.edit",
             compact($partner)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePartnerRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(UpdatePartnerRequest $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $partner->update($validated);
            return redirect()->route("dashboard.partner.index")->with("success",__("messages.partner.update.success", ['partner'=>$partner]));
        }catch (\Exception){
            return redirect()->route("dashboard.partner.index")->with("errors",__("messages.partner.update.success", ['partner'=>$partner]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        try{
            $partner->delete();
            return redirect()->route("dashboard.partner.index")->with('success',__("messages.partner.delete.success",['partner'=>$partner]));
        }catch (\Exception){
            return redirect()->route("dashboard.partner.index")->with('errors',__("messages.partner.delete.success",['partner'=>$partner]));
        }

    }
}