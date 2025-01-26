<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class reviewcard extends Component
{
     

    public function __construct( public $image , public $para , public $name , public $company)
    {
         $this->image = $image;
         $this->para = $para;
         $this->name = $name;
         $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reviewcard');
    }
}
