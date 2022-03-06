<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\Ticket;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(StoreContactUsRequest$request): \Illuminate\Http\RedirectResponse
    {
        $validated=$request->validated();

        try{
            Ticket::create($validated->all());

            return redirect()->route("tickets.index")->with("success",__("messages.tickets.create.success"));

        }catch (\Exception){
            return redirect()->back()->withErrors($validated)->withInput();
        }

    }

    public function create(): Factory|View|Application
    {
        return view("web.static.sections.contactus.show");
    }
}
