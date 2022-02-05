<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:roles.list', ['only' => ['index','show']]);
        $this->middleware('permission:roles.create', ['only' => ['create','store']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $roles = Role::all();
        return view("web.dashboard.sections.roles.index",
            compact("roles")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $permissions = Permission::all();
        return view("web.dashboard.sections.roles.create",
            compact("permissions")
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $role = Role::create(['name' => $validated["role_name"]]);

        $permissions = DB::table('permissions')->whereIn("id",$validated["permissions"])->whereNotIn("name",["SuperAdmin"])->get();
        foreach($permissions as $permission){
            $role->givePermissionTo($permission->name);
        }
        return redirect()->route("dashboard.roles.index")->with("");
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function show(Role $role): Application|Factory|View
    {
        return view("web.dashboard.sections.roles.show",
            compact("role"),
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role): Application|Factory|View
    {
        return view("web.dashboard.sections.roles.edit",
            compact("role"),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return Response
     */
    public function update(UpdateRoleRequest $request, Role $role): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     */
    public function destroy(Role $role): Response
    {
        //
    }
}
