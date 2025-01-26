<?php

namespace App\Http\Controllers\frontController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceModel;

class ServicefrontController extends Controller
{
    public function index($serviceurl){
        $singlepageddata = ServiceModel::where('menu_slug',$serviceurl)->first();
        if($singlepageddata){
            return view('service',compact('singlepageddata'));  
        }else{
            abort('404');
        }              
    }
}
