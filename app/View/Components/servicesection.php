<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class servicesection extends Component
{
   
    public $headertitle;
    public $title;
    public $p;
    public $imgsection;
    public $order;
    public $order2;

    public function __construct($headertitle,$title,$p,$imgsection,$order,$order2)
    {
         $this->headertitle = $headertitle;
         $this->title = $title;
         $this->p = $p;
         $this->imgsection = $imgsection; 
         $this->order = $order; 
         $this->order2= $order2; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.servicesection');
    }
}
