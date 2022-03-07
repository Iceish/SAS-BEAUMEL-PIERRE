<?php

namespace App\View\Components\Generic;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use \Spatie\Permission\Models\Role as RoleS;

class Role extends Component{

    public mixed $permissions;
    public string $category;
    public mixed $role;

    public function __construct(mixed $permissions,string $category, mixed $role = null)
    {
        $this->permissions = $permissions->keyBy('name');
        $this->category = $category;
        $this->role = $role ?: new RoleS();
    }

    public function render(): View|Factory|Htmlable|\Closure|string|Application
    {
        return view('components.generic.role');
    }
}
