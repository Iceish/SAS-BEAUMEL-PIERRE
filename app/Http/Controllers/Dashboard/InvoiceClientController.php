<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreClientInvoiceRequest;
use App\Http\Requests\UpdateClientInvoiceRequest;
use App\Models\ClientInvoice;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InvoiceClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:clientInvoices.list', ['only' => ['index','show']]);
        $this->middleware('permission:clientInvoices.create', ['only' => ['create','store']]);
        $this->middleware('permission:clientInvoices.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:clientInvoices.delete', ['only' => ['destroy']]);
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

        $clientInvoices = ClientInvoice::with('client')
            ->whereLike(["client.email","client.name","payment_mode"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.invoices.client.index",
            compact("clientInvoices")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $clientInvoice = ClientInvoice::all();
        return view("web.dashboard.sections.invoices.client.create",
            compact("clientInvoice")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientInvoiceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreClientInvoiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            ClientInvoice::create($validated);
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ClientInvoice $clientInvoice
     * @return Application|Factory|View
     */
    public function show(ClientInvoice $clientInvoice): View|Factory|Application
    {
        $clientInvoice->load('client');
        return view("web.dashboard.sections.invoices.client.show",
            compact("clientInvoice")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClientInvoice $clientInvoice
     * @return Application|Factory|View
     */
    public function edit(ClientInvoice $clientInvoice): View|Factory|Application
    {
        return view("web.dashboard.sections.invoices.client.edit",
            compact("clientInvoice")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientInvoiceRequest $request
     * @param ClientInvoice $clientInvoice
     * @return RedirectResponse
     */
    public function update(UpdateClientInvoiceRequest $request, ClientInvoice $clientInvoice): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $clientInvoice->update($validated);
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClientInvoice $clientInvoice
     * @return RedirectResponse
     */
    public function destroy(ClientInvoice $clientInvoice): RedirectResponse
    {
        try{
            $clientInvoice->delete();
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }
    }
}
