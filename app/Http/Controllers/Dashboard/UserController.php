<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): Application|Factory|View
    {
        $validated = $request->validated();

        $searchText = $validated["search"] ?? "";
        $users = User::query()
            ->whereLike(["email","name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.users.index",[
            "users"=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view("web.dashboard.sections.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->save();
        return redirect()->route("dashboard.users.index")->with("message","Success");
    }

    /**
     * Display the specified resource.
     *
     * @param int $user_id
     * @return Application|Factory|View
     */
    public function show(int $user_id): View|Factory|Application
    {
        $user = User::find($user_id);
        return view("web.dashboard.sections.users.show",[
            "user"=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $user_id
     * @return Application|Factory|View
     */
    public function edit(int $user_id): Application|Factory|View
    {
        $user = User::find($user_id);
        return view("web.dashboard.sections.users.show",[
            "user"=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $user_id
     * @return Response
     */
    public function update(Request $request, int $user_id): Response
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $user_id
     * @return RedirectResponse
     */
    public function destroy(int $user_id): RedirectResponse
    {
        User::destroy($user_id);
        return redirect()->route("Dashboard.Users.View")->with('message',__("messages.user.delete.success"));
    }
}
