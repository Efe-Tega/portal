<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarSubmenu extends Component
{
    public $id;
    public $title;

    public $routes;
    public $icon;

    public function __construct($id, $title, $icon = null, $routes = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->routes = $routes;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.sidebar-submenu');
    }
}
