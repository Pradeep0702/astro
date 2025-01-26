<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogcard extends Component
{
    
    public $image;
    public $title;
    public $cat;
    public $des;
    public $url;
    public $date;

    public function __construct($image,$title,$cat,$des,$url,$date)
    {
         $this->image = $image;
         $this->title = $title;
         $this->cat = $cat;
         $this->des = $des;
         $this->url = $url;
         $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blogcard');
    }
}
