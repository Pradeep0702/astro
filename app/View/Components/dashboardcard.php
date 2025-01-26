<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboardcard extends Component
{
    public $href;
    public $icon;
    public $name;
    public $count;
    
    public function __construct($href,$icon,$name,$count)
    { 
         $this->href = $href;
         $this->icon = $icon;
         $this->name = $name;
         $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboardcard');
    }
}
