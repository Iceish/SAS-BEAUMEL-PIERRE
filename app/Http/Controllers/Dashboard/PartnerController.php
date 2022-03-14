<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Language;
use App\Models\Partner;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:partners.list',['only ' => ['index','show']]);
        $this->middleware('permission:partners.create',['only' => ['create','store']]);
        $this->middleware('permission:partners.edit',['only' => ['edit','update']]);
        $this->middleware('permission:partners.delete',['only' => ['destroy']]);
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
        $partners = Partner::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.partners.index",
            compact("partners")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.partners.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePartnerRequest $request
     * @return RedirectResponse
     */
    public function store(StorePartnerRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            Partner::create($validated);
            return redirect()->route("dashboard.partners.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.partner',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.partner',1)]))->withInput();
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
        return view("web.dashboard.sections.partners.show",
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
        $partner = $partner->with('language')->first();
        $languages = Language::all();
        return view("web.dashboard.sections.partners.edit",
            compact("partner"),
            compact("languages")
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
            return redirect()->route("dashboard.partners.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.partner',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.partner',1)]))->withInput();
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
            return redirect()->route("dashboard.partners.index")->with('success',__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.partner',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.partner',1)]));
        }

    }
}
