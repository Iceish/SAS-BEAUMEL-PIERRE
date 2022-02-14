<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(SearchRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("web.dashboard.sections.partner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePartnerRequest $request): \Illuminate\Http\RedirectResponse
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
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Partner $partner): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("web.dashboard.sections.partner.show",
            compact("partner")
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Partner $partner): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("web.dashboard.sections.partner.edit",
             compact($partner)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePartnerRequest $request, Partner $partner): \Illuminate\Http\RedirectResponse
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
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Partner $partner): \Illuminate\Http\RedirectResponse
    {
        try{
            $partner->delete();
            return redirect()->route("dashboard.partner.index")->with('success',__("messages.partner.delete.success",['partner'=>$partner]));
        }catch (\Exception){
            return redirect()->route("dashboard.partner.index")->with('errors',__("messages.partner.delete.success",['partner'=>$partner]));
        }

    }
}
