<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Language;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:clients.list', ['only' => ['index','show']]);
        $this->middleware('permission:clients.create', ['only' => ['create','store']]);
        $this->middleware('permission:clients.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:clients.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the clients.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): Application|Factory|View
    {
        $validated= $request->validated();
        $searchText = $validated["search"] ?? "";

        $clients = Client::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.clients.index",
            compact("clients")
        );
    }

    /**
     * Show the form for creating a new client.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view("web.dashboard.sections.clients.create");
    }

    /**
     * Store a newly created client in storage.
     *
     * @param StoreClientRequest $request
     * @return RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            Client::create($validated);
            return redirect()->route("dashboard.clients.index")->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.client',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.client',1)]))->withInput();
        }
    }

    /**
     * Display the specified client.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client): View|Factory|Application
    {
        return view("web.dashboard.sections.clients.show",
            compact("client")
        );
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client): Application|Factory|View
    {
        $client = $client->with('language')->first();
        $languages = Language::all();
        return view("web.dashboard.sections.clients.edit",
            compact("client"),
            compact("languages")
        );
    }

    /**
     * Update the specified client in storage.
     *
     * @param UpdateClientRequest $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $client->update($validated);
            return redirect()->route("dashboard.clients.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.client',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.client',1)]));
        }
    }

    /**
     * Remove the specified client from storage.
     *
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        try{
            $client->delete();
            return redirect()->route("dashboard.clients.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.client',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.client',1)]));
        }
    }
}
