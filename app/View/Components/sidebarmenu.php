<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarmenu extends Component
{
    
    public $title;
    public $icon;
    public $innertitle;
    public $href;

    public function __construct($title,$icon,$innertitle,$href)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->innertitle = $innertitle;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebarmenu');
    }
}
