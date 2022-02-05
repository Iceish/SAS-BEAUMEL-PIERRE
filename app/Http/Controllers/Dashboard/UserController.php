<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users.list', ['only' => ['index','show']]);
        $this->middleware('permission:users.create', ['only' => ['create','store']]);
        $this->middleware('permission:users.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users.delete', ['only' => ['destroy']]);
    }
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
        return view("web.dashboard.sections.users.index",
            compact("users")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $roles = Role::all()->whereNotIn("name",["SuperAdmin"]);
        return view("web.dashboard.sections.users.create",
            compact("roles")
        );
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
        User::create($validated)->save();
        return redirect()->route("dashboard.users.index")->with("success",__("messages.user.create.success"));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user): View|Factory|Application
    {
        $roles = Role::all()->whereNotIn("name",["SuperAdmin"]);
        return view("web.dashboard.sections.users.show",
            compact("user"),
            compact("roles")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user): Application|Factory|View
    {
        $roles = Role::all()->whereNotIn("name",["SuperAdmin"]);
        return view("web.dashboard.sections.users.edit",
            compact("user"),
            compact("roles")
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $user->update($validated);
        return redirect()->route("dashboard.users.index")->with("success",__("messages.user.update.success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route("Dashboard.Users.View")->with('message',__("messages.user.delete.success"));
    }
}
