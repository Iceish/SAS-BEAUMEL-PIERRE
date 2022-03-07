<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TicketsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:tickets.list', ['only' => ['index','show']]);
        $this->middleware('permission:tickets.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $tickets = Ticket::paginate(10);
        return view("web.dashboard.sections.tickets.index",compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param Ticket $ticket
     * @return Application|Factory|View
     */
    public function show(Ticket $ticket): Application|Factory|View
    {
        return view("web.dashboard.sections.tickets.show",compact('ticket'));
    }

    /**
     * Remove the specified client from storage.
     *
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        try{
            $ticket->delete();
            return redirect()->route("dashboard.tickets.index")->with('success',__("messages.ticket.delete.success"));
        }catch (Exception){
            return redirect()->back()->withErrors(__("messages.ticket.delete.success"));
        }
    }

}
