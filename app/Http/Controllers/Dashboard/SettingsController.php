<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMeRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        return view('web.dashboard.sections.settings',
            compact('user')
        );
    }

    /**
     * @param UpdateMeRequest $request
     * @return RedirectResponse
     */
    public function edit(UpdateMeRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            Auth::user()->update($validated);
            return back()->with('success',__('messages.settings.user.update.success'));
        }catch (Exception){
            return back()->withErrors(__('messages.settings.user.update.error'));
        }
    }
}
