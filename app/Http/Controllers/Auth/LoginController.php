<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function loginView(): Application|Factory|View|RedirectResponse
    {
        if(Auth::check()){
            return redirect()->route("dashboard.home");
        }
        return view("auth.login");
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if($request->has("remember")){
            $remember = true;
        }else{
            $remember = false;
        }

        if (Auth::attempt($validated,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'failed' => __("auth.failed"),
        ]);
    }



}
