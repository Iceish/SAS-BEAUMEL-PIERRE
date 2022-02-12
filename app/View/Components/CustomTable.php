<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomTable extends Component
{
    public $contentName;
    public $content;
    public $keys;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contentName, $content, $keys)
    {
        $this->contentName = $contentName;
        $this->content = $content->items();
        $this->keys = array_map(function ($val){
            return explode('/', $val);
        }, explode(" ",$keys));

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-table');
    }
}
