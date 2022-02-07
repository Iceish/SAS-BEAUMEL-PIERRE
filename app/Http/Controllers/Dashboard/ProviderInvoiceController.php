<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderInvoiceRequest;
use App\Http\Requests\UpdateProviderInvoiceRequest;
use App\Models\ProviderInvoice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use function view;

class ProviderInvoiceController extends Controller
{
    /**
     * Display a listing of provider invoice.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $providerInvoices = ProviderInvoice::all();
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
        return view("web.dashboard.sections.providerInvoice.create");
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
        $providerInvoice =  ProviderInvoice::create($validated);

        try{
            $providerInvoice->save();
            return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.create.success",["providerInvoice"=>$providerInvoice]));
        }catch (Exception){
            return redirect()->route("dashboard.providerInvoice.index")->with("errors",__("messages.providerInvoice.create.failed",["providerInvoice"=>$providerInvoice]));
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
            return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.update.success",["providerInvoice"=>$providerInvoice]));
        }catch (Exception){
            return redirect()->route("dashboard.providerInvoice.index")->with("errors",__("messages.providerInvoice.update.failed",["providerInvoice"=>$providerInvoice]));
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
            return redirect()->route("Dashboard.providerInvoice.index")->with('success',__("messages.providerInvoice.delete.success",["providerInvoice"=>$providerInvoice]));
        }catch (Exception){
            return redirect()->route("dashboard.providerInvoice.index")->with('errors',__("messages.providerInvoice.delete.failed",["providerInvoice"=>$providerInvoice]));
        }
    }
}
