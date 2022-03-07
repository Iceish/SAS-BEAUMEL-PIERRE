<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\Ticket;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactUsController extends Controller
{
    public function store(StoreContactUsRequest$request): RedirectResponse
    {
        $validated=$request->validated();
        try{
            Ticket::create($validated);
            return redirect()->back()->with("success",__("messages.tickets.create.success"));
        }catch (Exception){
            return redirect()->back()->withErrors($validated)->withInput();
        }

    }

    public function create(): Factory|View|Application
    {
        return view("web.static.sections.contactus.show");
    }
}
