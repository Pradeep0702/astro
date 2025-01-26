<?php

namespace App\Http\Controllers\frontController;
use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\CareerModel;
use App\Models\TestimonialModel;
use App\Models\WorkcategoryModel;
use App\Models\WorkModel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
     public function index(){
        $blogs = BlogModel::where('status','active')->limit(10)
        ->latest('created_at')->get();
        $testimonials = TestimonialModel::where('status','active')
        ->limit(10)->latest('created_at')->get();
        $works = WorkModel::get(['thumbnail_image','title','slug']);
        return view('index',compact('blogs','testimonials','works'));
     }
     public function blog(Request $request){
        return view('blog');
     }

     public function career(){
        $datas = CareerModel::where('status','active')->get();
        return view('career',compact('datas'));
     }
     public function work(){
        $datas = WorkcategoryModel::orderBy('order','ASC')->get();
        $catdatas = WorkModel::with('withdata')->get();
        return view('work',compact('datas','catdatas'));
     }   
     public function contact(){
        return view('contact');
     }
  
     public function getstarted(){
       return view('gs');
     }
    
     //  Work 
     public function workurl($workurl){
        $data = WorkModel::where('slug',$workurl)->first();
        if(!empty($data)){
        $next = WorkModel::where('id','>',$data->id)->orderBy('id', 'asc')->first(['slug']);
        $prev = WorkModel::where('id','<',$data->id)->orderBy('id', 'desc')->first(['slug']); 
        $video1 = $data->video1 != "" ? explode('1**1',$data->video1) : 'no';
        $video2 = $data->video2 != "" ? explode('1**1',$data->video2) : 'no';
        $video3 = $data->video3 != "" ? explode('1**1',$data->video3) : 'no';
        $video4 = $data->video4 != "" ? explode('1**1',$data->video4) : 'no';
        $video5 = $data->video5 != "" ? explode('1**1',$data->video5) : 'no';
        $video6 = $data->video6 != "" ? explode('1**1',$data->video6) : 'no'; 
        return view('workshow',compact('data','next','prev','video1','video2','video3','video4','video5','video6'));  
        }else{
            abort('404');
        }
        
     }

     //  Blog  
     public function blogurl($blogurl){        
        $count = BlogModel::where('slug',$blogurl)
        ->where('status','active')
        ->count();
        if($count == 1){
             $data = BlogModel::with('blogdata')->where('slug',$blogurl)->first();
             $cate_id = $data->blogdata->first()->id;
             $recentposts = BlogModel::with('blogdata')
             ->whereNot('status','pending')
             ->whereNot('slug',$blogurl)
             ->where('c_id',$cate_id)->latest('created_at')->get();                         
            return view('blogshow',compact('data','recentposts'));
        }else{
            abort('404');
        } 
     }
}
