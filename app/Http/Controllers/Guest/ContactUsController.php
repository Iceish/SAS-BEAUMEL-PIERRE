<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\Ticket;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function store(StoreContactUsRequest$request): RedirectResponse
    {
        $validated=$request->validated();

        try{
            Ticket::create($validated);
            return redirect()->route('contactus.create')->with("success",__("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.ticket',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.ticket',1)]))->withInput();
        }

    }

    public function create(): Factory|View|Application
    {
        return view("web.static.sections.contactus.show");
    }
}
