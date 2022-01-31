<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Client::create($validated)->save();
        return redirect()->route("dashboard.client.index")->with("success",__("messages.user.create.success"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return Application|Factory|View
     */
    public function show(Client $client)
    {
        return view("web.dashboard.sections.client.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return Application|Factory|View
     */
    public function edit(Client $client): Application|Factory|View
    {
        return view("web.dashboard.sections.client.show");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $validated = $request->validated();
        $client->update($validated);
        return redirect()->route("dashboard.users.index")->with("success",__("messages.user.update.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();
        return redirect()->route("Dashboard.Users.View")->with('message',__("messages.user.delete.success"));
    }
}
