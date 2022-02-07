<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProviderInvoiceRequest;
use App\Models\ProviderInvoice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function view;

class ProviderInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view("web.dashboard.sections.providerInvoice.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("web.dashboard.sections.providerInvoice.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        ProviderInvoice::create($validated)->save();
        return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.create.success"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view("web.dashboard.sections.providerInvoice.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view("web.dashboard.sections.providerInvoice.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProviderInvoiceRequest $request,ProviderInvoice $provider)
    {
        $validated = $request->validated();
        $provider->update($validated);
        return redirect()->route("dashboard.providerInvoice.index")->with("success",__("messages.providerInvoice.update.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ProviderInvoice $provider)
    {
        $provider->delete();
        return redirect()->route("Dashboard.providerInvoice.View")->with('message',__("messages.providerInvoice.delete.success"));
    }
}
