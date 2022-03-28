<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreClientInvoiceRequest;
use App\Http\Requests\UpdateClientInvoiceRequest;
use App\Models\Client;
use App\Models\ClientInvoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use DB;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Storage;

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

        $clientInvoices = ClientInvoice::with('clients')
            ->whereLike(["client.email","client.name"],$searchText)
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
        $clients = Client::all();
        return view("web.dashboard.sections.invoices.client.create",
            compact("clients")
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
        $validated = $request->except("file");
        $file = $request->only("file")['file'];
        try{
            $path = $file->store("images");
            $validated["path"] = $path;
            $providerInvoice = new ClientInvoice($validated);
            $providerInvoice->save();
            return redirect()->route("dashboard.invoices.client.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception $e){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $clientInvoice_id
     * @return Application|Factory|View
     */
    public function show(int $clientInvoice_id): View|Factory|Application
    {
        $clientInvoice = ClientInvoice::find($clientInvoice_id);
        return view("web.dashboard.sections.invoices.client.show",
            compact("clientInvoice"),
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $clientInvoice_id
     * @return Application|Factory|View
     */
    public function edit(int $clientInvoice_id): View|Factory|Application
    {
        $clients = Client::all();
        $clientInvoice = ClientInvoice::find($clientInvoice_id);
        return view("web.dashboard.sections.invoices.client.edit",
            compact("clientInvoice"),
            compact('clients')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClientInvoiceRequest $request
     * @param int $clientInvoice_id
     * @return RedirectResponse
     */
    public function update(UpdateClientInvoiceRequest $request, int $clientInvoice_id): RedirectResponse
    {
        $validated = $request->except("file");
        $file = $request->only("file");
        try{
            $providerInvoice = ClientInvoice::find($clientInvoice_id);
            $path = $file->store("images");
            $validated["path"] = $path;
            $providerInvoice->update($validated);
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $clientInvoice_id
     * @return RedirectResponse
     */
    public function destroy(int $clientInvoice_id): RedirectResponse
    {
        try{
            $clientInvoice = ClientInvoice::find($clientInvoice_id);
            Storage::delete($clientInvoice->path);
            $clientInvoice->delete();
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.client',1).')']));
        }
    }
}
