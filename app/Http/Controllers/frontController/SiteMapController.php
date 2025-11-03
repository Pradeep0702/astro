<?php

namespace App\Http\Controllers\frontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\ServiceModel;

class SiteMapController extends Controller
{
    public $perpage = 500;

    public function index()
    {
        $content = view('sitemap/index');
        return response($content, 200)
                ->header('Content-Type', 'application/xml');
    }

    public function serviceSitemap(){
        $sitemapurls = ServiceModel::get(); 
        $xmlContent = view('sitemap/service-sitemap-url',compact('sitemapurls'));
        if(count($sitemapurls) != 0){
            return response($xmlContent, 200)->header('Content-Type', 'application/xml');
        }else{
            abort(404);
        }         
    }


    public function blogsitemap()
    {
        $blogdatas = BlogModel::get();
        if(count($blogdatas) != 0){
            $xmlContent = view('sitemap/blog-sitemap-url',compact('blogdatas'));
            return response($xmlContent, 200)->header('Content-Type', 'application/xml');
        }else{
            abort(404);
        }  
    }
}
