<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class abutton extends Component
{
    public string $name;
    public string $type;
    public string $route;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $type, $route) 
    {
        $this->name = $name;
        $this->type = $type;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.abutton');
    }
}
