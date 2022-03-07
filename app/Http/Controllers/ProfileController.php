<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Framework\Exception;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index( ): Application|Factory|View
    {
        $profile= \App\Models\Profile::paginate(10);
        return view('web.dashboard.sections.profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.profile.create");
    }


    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function show(Profile $profile): View|Factory|Application
    {
        return view("web.dashboard.sections.profile.show",
            compact("profile")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @return Application|Factory|View
     */
    public function edit(Profile $profile): Application|Factory|View
    {
        return view("web.dashboard.sections.profile.edit",
            compact($profile)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @param \App\Models\Profile $profile
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request,\App\Models\Profile $profile): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $profile->update($validated);
            return redirect()->route("dashboard.profile.index")->with("success",__("messages.profile.update.success"));
        }catch (Exception){
            return redirect()->back()->withInput();
        }
    }


}
