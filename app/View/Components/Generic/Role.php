<?php

namespace App\View\Components\Generic;

use Illuminate\View\Component;

class Role extends Component{

    public mixed $permissions;
    public string $category;
    public mixed $role;

    public function __construct(mixed $permissions,string $category, mixed $role = null)
    {
        $this->permissions = $permissions->keyBy('name');
        $this->category = $category;
        $this->role = $role ? $role : new \Spatie\Permission\Models\Role();
    }

    public function render()
    {
        return view('components.generic.role');
    }
}
