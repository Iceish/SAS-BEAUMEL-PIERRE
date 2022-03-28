<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMeRequest;
use App\Http\Requests\UpdateSettingsRequest;
use DB;
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
    public function edit(): Factory|View|Application
    {
        return view('web.dashboard.sections.settings.edit');
    }

    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $settings = DB::table('settings')->first();
            $settings->update($validated);
            return redirect()->route('dashboard.settings.update')->with('success',__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.setting',1)]));
        }catch (Exception)
        {
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.setting',1)]))->withInput();
        }
    }
}
