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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
        $validated = $request->only(['email','name']);
        $validatedRole = $request->only(['roles']);
        $validatedRole = $validatedRole['roles'];
        $saRole = Role::whereIn("name",["SuperAdmin"])->first();
        $password = Str::random();
        $validated = Arr::add($validated,"password",$password);
        try{
            $user = User::create($validated);
            $user->save();
            foreach ($validatedRole as $keyRole=>$bool){
                $bool = $bool === "true";
                $role = Role::whereIn("id",[$keyRole])->first();
                if($keyRole != $saRole->id){
                    if($bool){
                        $user->assignRole($role->name);
                    }
                }
            }
            Mail::send('mail.create_user', ['user'=>$user,'password'=>$password], function($message) use($user){
                $message->to($user->email);
                $message->subject('User created');
            });
            return redirect()->route("dashboard.users.index")->with("success",__("messages.user.create.success"));
        }catch (Exception $e){
            return redirect()->back()->with("error",__('messages.user.create.failed'))->withInput();

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
        $validatedRole = $request->only(['roles']);
        $validatedRole = $validatedRole['roles'] ;
        $validated = $request->only(['email','name','password']);
        $saRole = Role::whereIn("name",["SuperAdmin"])->first();
        try{
            $user->update($validated);
            foreach ($validatedRole as $key=>$bool){
                $bool = $bool === "true";
                $role = Role::whereIn("id",[$key])->first();
                if($key === $saRole->id)continue;
                $bool ? $user->assignRole($role->name) : $user->removeRole($role->name);
            }
            return redirect()->route('dashboard.users.show',["user"=>$user])->with('success',__('messages.user.update.success'));
        }catch (Exception){
            return redirect()->back()->with('errors',__('messages.user.update.failed'))->withInput();
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
            return redirect()->route('dashboard.users.index')->with('success',__('messages.user.delete.success'));
        }catch (Exception){
            return redirect()->with('errors',__('messages.user.delete.failed'));
        }
    }
}
