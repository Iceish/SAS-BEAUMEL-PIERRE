<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreProviderInvoiceRequest;
use App\Http\Requests\UpdateProviderInvoiceRequest;
use App\Models\Provider;
use App\Models\ProviderInvoice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use function view;

class ProviderInvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:providerInvoices.list', ['only' => ['index','show']]);
        $this->middleware('permission:providerInvoices.create', ['only' => ['create','store']]);
        $this->middleware('permission:providerInvoices.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:providerInvoices.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of provider invoice.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): View|Factory|Application
    {
        $validated= $request->validated();
        $searchText = $validated["search"] ?? "";

        $providerInvoices = ProviderInvoice::with('provider')
            ->whereLike(["provider.email","provider.name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.providerInvoice.index",
            compact("providerInvoices")
        );
    }

    /**
     * Show the form for creating a new provider invoice.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $providers = Provider::all();
        return view("web.dashboard.sections.providerInvoice.create",
            compact("providers")
        );
    }

    /**
     * Store a newly created provider invoice in storage.
     *
     * @param StoreProviderInvoiceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProviderInvoiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            ProviderInvoice::create($validated);
            return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.create.success"));
        }catch (Exception){
            return redirect()->back()->with("errors",__("messages.providerInvoice.create.failed"))->withInput();
        }
    }

    /**
     * Display the specified provider invoice.
     *
     * @param ProviderInvoice $providerInvoice
     * @return Application|Factory|View
     */
    public function show(ProviderInvoice $providerInvoice): View|Factory|Application
    {
        return view("web.dashboard.sections.providerInvoice.show",
            compact("providerInvoice"),
        );
    }

    /**
     * Show the form for editing the specified provider invoice.
     *
     * @param ProviderInvoice $providerInvoice
     * @return Application|Factory|View
     */
    public function edit(ProviderInvoice $providerInvoice): View|Factory|Application
    {
        return view("web.dashboard.sections.providerInvoice.edit",
            compact("providerInvoice")
        );
    }

    /**
     * Update the specified provider invoice in storage.
     *
     * @param UpdateProviderInvoiceRequest $request
     * @param ProviderInvoice $providerInvoice
     * @return RedirectResponse
     */
    public function update(UpdateProviderInvoiceRequest $request,ProviderInvoice $providerInvoice): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $providerInvoice->update($validated);
            return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.update.success"));
        }catch (Exception){
            return redirect()->back()->with("errors",__("messages.providerInvoice.update.failed"))->withInput();
        }
    }

    /**
     * Remove the specified provider invoice from storage.
     *
     * @param ProviderInvoice $providerInvoice
     * @return RedirectResponse
     */
    public function destroy(ProviderInvoice $providerInvoice): RedirectResponse
    {
        try{
            $providerInvoice->delete();
            return redirect()->route("Dashboard.providerInvoice.index")->with('success',__("messages.providerInvoice.delete.success"));
        }catch (Exception){
            return redirect()->back()->with('errors',__("messages.providerInvoice.delete.failed"));
        }
    }
}
