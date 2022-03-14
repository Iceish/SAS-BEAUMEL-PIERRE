<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use PHPUnit\Framework\Exception;
use function __;
use function redirect;
use function view;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(): Application|Factory|View
    {
        $user = Auth()->user();
        return view("web.dashboard.sections.profile.edit",
            compact('user')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $user = Auth()->user();

        $validated = $request->validated();
        try{
            $user->update($validated);
            return redirect()->back()->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.profile',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.profile',1)]))->withInput();
        }
    }


}
