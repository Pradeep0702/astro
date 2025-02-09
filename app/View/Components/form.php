<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    
    public $labelname;
    public $name;
    public $danger;

    public function __construct($labelname,$name,$danger=true)
    {
        $this->labelname = $labelname;
        $this->name = $name;
        $this->danger = $danger;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
