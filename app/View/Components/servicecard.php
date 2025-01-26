<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class servicecard extends Component
{
    public $title;
    public $href;
    public $image;
    
    public function __construct($title,$href,$image)
    {
        $this->title = $title;
        $this->href = $href;
        $this->image = $image;   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.servicecard');
    }
}
