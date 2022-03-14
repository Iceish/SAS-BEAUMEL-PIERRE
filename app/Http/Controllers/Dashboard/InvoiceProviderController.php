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
use Illuminate\Support\Facades\Storage;
use function view;

class InvoiceProviderController extends Controller
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
        return view("web.dashboard.sections.invoices.provider.index",
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
        return view("web.dashboard.sections.invoices.provider.create",
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
        $validated = $request->except("file");
        $file = $request->only("file");
        try{
            $path = $file->store("images");
            $validated["path"] = $path;
            ProviderInvoice::create($validated);
            return redirect()->route("web.dashboard.sections.invoices.provider.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']))->withInput();
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
        return view("web.dashboard.sections.invoices.provider.show",
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
        return view("web.dashboard.sections.invoices.provider.edit",
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
        $validated = $request->except("file");
        $file = $request->only("file");
        try{
            $path = $file->store("images");
            $validated["path"] = $path;
            $providerInvoice->update($validated);
            return redirect()->route("web.dashboard.sections.invoices.provider.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']))->withInput();
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
            Storage::delete($providerInvoice->path);
            $providerInvoice->delete();
            return redirect()->route("web.dashboard.sections.invoices.provider.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }
    }
}
