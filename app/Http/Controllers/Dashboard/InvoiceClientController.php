<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreCustomerInvoiceRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Models\CustomerInvoice;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class InvoiceClientController extends Controller
{
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

        $customerInvoices = CustomerInvoice::with('client')
            ->whereLike(["client.email","client.name","payment_mode"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.invoices.client.index",
            compact("customerInvoices")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $customerInvoice = CustomerInvoice::all();
        return view("web.dashboard.sections.invoices.client.create",
            compact("customerInvoice")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerInvoiceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCustomerInvoiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $customerInvoice = CustomerInvoice::create($validated);
        try{
            CustomerInvoice::create($validated);
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("success",__("messages.customerInvoice.create.success"));
        }catch (Exception){
            return redirect()->back()->with("errors",__("messages.customerInvoice.create.failed"))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param CustomerInvoice $customerInvoice
     * @return Application|Factory|View
     */
    public function show(CustomerInvoice $customerInvoice): View|Factory|Application
    {
        $customerInvoice->load('client');
        return view("web.dashboard.sections.invoices.client.show",
            compact("customerInvoice")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CustomerInvoice $customerInvoice
     * @return Application|Factory|View
     */
    public function edit(CustomerInvoice $customerInvoice): View|Factory|Application
    {
        return view("web.dashboard.sections.invoices.client.edit",
            compact("customerInvoice")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerInvoiceRequest $request
     * @param CustomerInvoice $customer
     * @return RedirectResponse
     */
    public function update(UpdateCustomerInvoiceRequest $request,CustomerInvoice $customer): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $customer->update($validated);
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("success",__("messages.customerInvoice.update.success"));
        }catch (Exception){
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with("errors",__("messages.customerInvoice.update.failed"));
            return redirect()->back()->with("errors",__("messages.customerInvoice.update.failed"))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustomerInvoice $customer
     * @return RedirectResponse
     */
    public function destroy(CustomerInvoice $customer): RedirectResponse
    {
        try{
            $customer->delete();
            return redirect()->route("web.dashboard.sections.invoices.client.index")->with('success',__("messages.customerInvoice.delete.success"));
        }catch (Exception){
            return redirect()->back()->with('errors',__("messages.customerInvoice.delete.failed"));
        }
    }
}
