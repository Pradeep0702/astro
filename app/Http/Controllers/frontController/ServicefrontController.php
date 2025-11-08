<?php

namespace App\Http\Controllers\frontController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceModel;
use App\Models\TestimonialModel;

class ServicefrontController extends Controller
{
    public function index($serviceurl){
        $testimonials = TestimonialModel::where('status','active')
        ->limit(10)->latest('created_at')->get();
        $singlepageddata = ServiceModel::where('menu_slug',$serviceurl)->first();
        if($singlepageddata){
            return view('service',compact('singlepageddata','testimonials'));  
        }else{
            abort('404');
        }              
    }
}
