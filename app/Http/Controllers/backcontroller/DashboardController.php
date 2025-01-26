<?php

namespace App\Http\Controllers\backcontroller;

use App\Http\Controllers\Controller;
use App\Models\BlogcategoryModel;
use App\Models\BlogModel;
use App\Models\CareerModel;
use App\Models\ContactModel;
use App\Models\JobResumeModel;
use App\Models\TestimonialModel;
use App\Models\WorkcategoryModel;
use App\Models\WorkModel;

class DashboardController extends Controller
{
    public function index(){  
       
        $testimonial= TestimonialModel::count();
        $career= CareerModel::count();
        $b_cat= BlogcategoryModel::count();
        $blog= BlogModel::count();
        $w_cat= WorkcategoryModel::count();
        $work= WorkModel::count();
        $contact= ContactModel::count();
        $resume= JobResumeModel::count();
        $pendingblogs= BlogModel::where('status','pending')
        ->count();

        return view('admin/dashboard/index',
        compact('testimonial',
        'career',
        'contact',
        'resume',
        'b_cat',
        'blog',
        'w_cat',
        'work',
        'pendingblogs'
      ));
    }
}
