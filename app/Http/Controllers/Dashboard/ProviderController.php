<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Provider;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:provider.list', ['only' => ['index','show']]);
        $this->middleware('permission:provider.create', ['only' => ['create','store']]);
        $this->middleware('permission:provider.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:provider.delete', ['only' => ['destroy']]);
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

        $providers = Provider::whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.providers.index",
            compact("providers")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.providers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProviderRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProviderRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            Provider::create($validated);
            return redirect()->route("dashboard.providers.index")->with("success",__("messages.provider.create.success"));
        }catch (Exception){
            return redirect()->back()->withErrors(__("messages.provider.create.failed"))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Provider $provider
     * @return Application|Factory|View
     */
    public function show(Provider $provider): Application|Factory|View
    {
        return view("web.dashboard.sections.providers.show",
            compact("provider")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Provider $provider
     * @return Application|Factory|View
     */
    public function edit(Provider $provider): Application|Factory|View
    {
        return view("web.dashboard.sections.providers.edit",
            compact('provider')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProviderRequest $request
     * @param Provider $provider
     * @return RedirectResponse
     */
    public function update(UpdateProviderRequest $request, Provider $provider): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $provider->update($validated);
            return redirect()->route("dashboard.providers.index")->with("success",__("messages.provider.update.success"));
        }catch (Exception){
            return redirect()->back()->withErrors(__("messages.provider.update.failed"))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Provider $provider
     * @return RedirectResponse
     */
    public function destroy(Provider $provider): RedirectResponse
    {
        try{
            $provider->delete();
            return redirect()->route("dashboard.providers.index")->with('success',__("messages.provider.delete.success"));
        }catch (Exception){
            return redirect()->back()->withErrors(__("messages.provider.delete.success"));
        }
    }
}
