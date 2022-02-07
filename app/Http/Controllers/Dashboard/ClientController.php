<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): Application|Factory|View
    {
        $validated= $request->validated();
        $searchText = $validated["search"] ?? "";

        $client = Client::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.client.index",
            compact("client")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view("web.dashboard.sections.client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientRequest $request
     * @return RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $client = Client::create($validated);
        try{
            $client->save();
            return redirect()->route("dashboard.client.index")->with("success",__("messages.client.create.success",['client'=>$client]));
        }catch (Exception){
            return redirect()->route("dashboard.client.index")->with("errors",__("messages.client.create.failed",['client'=>$client]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client): View|Factory|Application
    {
        return view("web.dashboard.sections.client.show",
            compact("client")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client): Application|Factory|View
    {
        return view("web.dashboard.sections.client.edit",
            compact($client)
        );
    }

    /**
     * Update the specified resource in storage.
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
            return redirect()->route("dashboard.client.index")->with("success",__("messages.client.update.success",['client'=>$client]));
        }catch (Exception){
            return redirect()->route("dashboard.client.index")->with("errors",__("messages.client.update.success",['client'=>$client]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        try{
            $client->delete();
            return redirect()->route("dashboard.client.index")->with('success',__("messages.client.delete.success",['client'=>$client]));
        }catch (Exception){
            return redirect()->route("dashboard.client.index")->with('errors',__("messages.client.delete.success",['client'=>$client]));
        }
    }
}
