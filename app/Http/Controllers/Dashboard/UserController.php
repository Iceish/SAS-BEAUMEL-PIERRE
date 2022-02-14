<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
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
     * Display a listing of user.
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
     * Show the form for creating a new user.
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
     * Store a newly created user in storage and assign roles.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->only(['email','name','password']);
        $validatedRole = $request->only(['roles_id']);
        $validatedRole = $validatedRole['roles_id'] ?? ['roles_id'=>[]];
        $saRole = Role::whereIn("name",["SuperAdmin"])->first();

        $user = User::create($validated);
        try{
            $user->save();
            foreach ($validatedRole as $keyRole=>$bool){
                $role = Role::whereIn("id",[$keyRole])->first();
                if($keyRole != $saRole->id){
                    if($bool){
                        $user->assignRole($role->name);
                    }
                }
            }
            return redirect()->route("dashboard.users.index")->with("success",__("messages.user.create.success",['user'=>$user->name]));
        }catch (Exception){
            return redirect()->route("dashboard.users.index")->with("errors",__("messages.user.create.failed",['user'=>$user->name]));

        }
    }

    /**
     * Display the specified user.
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
     * Show the form for editing the specified user.
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
     * Update the specified user in storage and update roles.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validatedRole = $request->only(['roles_id']);
        $validatedRole = $validatedRole['roles_id'] ?? ['roles_id'=>[]];
        $validated = $request->only(['email','name','password']);
        $saRole = Role::whereIn("name",["SuperAdmin"])->first();
        try{
            $user->update($validated);
            foreach ($validatedRole as $keyRole=>$bool){
                $role = Role::whereIn("id",[$keyRole])->first();
                if($keyRole != $saRole->id){
                    if($bool){
                        $user->assignRole($role->name);
                    }else{
                        $user->removeRole($role->name);
                    }
                }
            }
            return redirect()->route('dashboard.users.index')->with('success',__('messages.user.update.success',['user'=>$user->name]));
        }catch (Exception){
            return redirect()->route('dashboard.users.index')->with('errors',__('messages.user.update.failed',['user'=>$user->name]));
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        try{
            $user->delete();
            return redirect()->route('dashboard.users.index')->with('success',__('messages.user.delete.success',['user'=>$user->name]));
        }catch (Exception){
            return redirect()->route('dashboard.users.index')->with('errors',__('messages.user.delete.failed',['user'=>$user->name]));
        }
    }
}
