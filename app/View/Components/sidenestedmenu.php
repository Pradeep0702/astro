<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidenestedmenu extends Component
{
    public $title;
    public $icon;

    public function __construct($title,$icon)
    {
        $this->title = $title;
        $this->icon = $icon;     
        
    }

   
    public function render(): View|Closure|string
    {
        return view('components.sidenestedmenu');
    }
}
