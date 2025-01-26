<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class accodian extends Component
{
   
    public function __construct(public $q , public $ans , public $id)
    {
        $this->q = $q;
        $this->ans = $ans;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accodian');
    }
}
