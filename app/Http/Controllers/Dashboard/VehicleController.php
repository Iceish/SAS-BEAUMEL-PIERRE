<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VehicleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:vehicles.list', ['only' => ['index','show']]);
        $this->middleware('permission:vehicles.create', ['only' => ['create','store']]);
        $this->middleware('permission:vehicles.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:vehicles.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): Application|Factory|View
    {
        $validated= $request->validated();
        $searchText = $validated["search"] ?? null;

        $vehicles = Vehicle::query()
            ->whereLike(["licence_plate"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.vehicles.index",
            compact("vehicles")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view("web.dashboard.sections.vehicles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVehicleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreVehicleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try {
            Vehicle::create($validated);
            return redirect()->route("dashboard.vehicles.index")->with("success", __("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.vehicle',1)]));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.vehicle',1)]))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return Application|Factory|View
     */
    public function show(Vehicle $vehicle): View|Factory|Application
    {
        $vehicle->available = (bool)$vehicle->available;
        return view("web.dashboard.sections.vehicles.show",
            compact("vehicle")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vehicle $vehicle
     * @return Application|Factory|View
     */
    public function edit(Vehicle $vehicle): Application|Factory|View
    {
        return view("web.dashboard.sections.vehicles.edit",
            compact('vehicle')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVehicleRequest $request
     * @param Vehicle $vehicle
     * @return RedirectResponse
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $vehicle->update($validated);
            return redirect()->route("dashboard.vehicles.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.vehicle',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.vehicle',1)]))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicle $vehicle
     * @return RedirectResponse
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        try{
            $vehicle->delete();
            return redirect()->route("dashboard.vehicles.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.vehicle',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.vehicle',1)]));
        }
    }
}
