<?php

namespace App\Http\Controllers\frontController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontCityController extends Controller
{
    public function index($cityurl){
     return view('city');       
    }
}
