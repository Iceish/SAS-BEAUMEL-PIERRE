<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use App\Models\Camera;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CameraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:cameras.list', ['only' => ['index','show']]);
        $this->middleware('permission:cameras.create', ['only' => ['create','store']]);
        $this->middleware('permission:cameras.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:cameras.delete', ['only' => ['destroy']]);
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

        $cameras = Camera::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.cameras.index",
            compact("cameras")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.cameras.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCameraRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCameraRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            Camera::create($validated);
            return redirect()->route("dashboard.cameras.index")->with("success",__("messages.camera.create.success"));
        }catch (Exception){
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Camera $camera
     * @return Application|Factory|View
     */
    public function show(Camera $camera): View|Factory|Application
    {
        return view("web.dashboard.sections.cameras.show",
            compact("camera")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Camera $camera
     * @return Application|Factory|View
     */
    public function edit(Camera $camera): View|Factory|Application
    {
        return view("web.dashboard.sections.clients.edit",
            compact("camera"),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCameraRequest $request
     * @param Camera $camera
     * @return RedirectResponse
     */
    public function update(UpdateCameraRequest $request, Camera $camera): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $camera->update($validated);
            return redirect()->route("dashboard.cameras.index")->with("success",__("messages.client.update.success"));
        }catch (Exception){
            return redirect()->back()->with("errors",__("messages.camera.update.success"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Camera $camera
     * @return RedirectResponse
     */
    public function destroy(Camera $camera): RedirectResponse
    {
        try{
            $camera->delete();
            return redirect()->route("dashboard.cameras.index")->with('success',__("messages.camera.delete.success"));
        }catch (Exception){
            return redirect()->back()->with('errors',__("messages.camera.delete.success"));
        }
    }
}
