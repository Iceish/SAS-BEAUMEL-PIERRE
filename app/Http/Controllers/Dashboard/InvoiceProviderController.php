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
        $file = $request->only("file")['file'];
        try{
            $path = $file->store("images");
            $validated["path"] = $path;
            $providerInvoice = new ProviderInvoice($validated);
            $providerInvoice->save();
            return redirect()->route("dashboard.invoices.providers.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }catch (Exception $e){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']))->withInput();
        }
    }

    /**
     * Display the specified provider invoice.
     *
     * @param int $providerInvoice_id
     * @return Application|Factory|View
     */
    public function show(int $providerInvoice_id): View|Factory|Application
    {
        $providerInvoice = ProviderInvoice::find($providerInvoice_id);
        return view("web.dashboard.sections.invoices.provider.show",
            compact("providerInvoice"),
        );
    }

    /**
     * Show the form for editing the specified provider invoice.
     *
     * @param int $providerInvoice_id
     * @return Application|Factory|View
     */
    public function edit(int $providerInvoice_id): View|Factory|Application
    {
        $providers = Provider::all();
        $providerInvoice = ProviderInvoice::find($providerInvoice_id);
        return view("web.dashboard.sections.invoices.provider.edit",
            compact("providerInvoice"),
            compact('providers')
        );
    }

    /**
     * Update the specified provider invoice in storage.
     *
     * @param UpdateProviderInvoiceRequest $request
     * @param int $providerInvoice_id
     * @return RedirectResponse
     */
    public function update(UpdateProviderInvoiceRequest $request,int $providerInvoice_id): RedirectResponse
    {
        $validated = $request->except("file");
        $file = $request->only("file");
        try{
            $providerInvoice = ProviderInvoice::find($providerInvoice_id);
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
     * @param int $providerInvoice_id
     * @return RedirectResponse
     */
    public function destroy(int $providerInvoice_id): RedirectResponse
    {
        try{
            $providerInvoice = ProviderInvoice::find($providerInvoice_id);
            Storage::delete($providerInvoice->path);
            $providerInvoice->delete();
            return redirect()->route("web.dashboard.sections.invoices.provider.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.invoice',1).' ('.trans_choice('custom/words.provider',1).')']));
        }
    }
}
