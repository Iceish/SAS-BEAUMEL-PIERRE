<?php

namespace App\View\Components\Generic;

use Illuminate\View\Component;

class Role extends Component{

    public mixed $permissions;
    public string $category;

    public function __construct(mixed $permissions,string $category)
    {
        $this->permissions = $permissions->keyBy('name');
        $this->category = $category;
    }

    public function render()
    {
        return view('components.generic.role');
    }
}
