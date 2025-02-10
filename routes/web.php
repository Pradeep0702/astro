<?php

use App\Http\Controllers\frontController\HomeController;
use App\Http\Controllers\frontController\ServicefrontController;
use App\Http\Controllers\frontController\frontCityController;
use App\Http\Controllers\backcontroller\DashboardController;
use App\Http\Controllers\backcontroller\AuthController;
use App\Http\Controllers\backcontroller\BlogcategoryController;
use App\Http\Controllers\backcontroller\BlogController;
use App\Http\Controllers\backcontroller\TestimonialController;
use App\Http\Controllers\backcontroller\JobResumeController;
use App\Http\Controllers\backcontroller\CareerController;
use App\Http\Controllers\backcontroller\ContactController;
use App\Http\Controllers\backcontroller\WorkcategoryController;
use App\Http\Controllers\backcontroller\WorkController;
use App\Http\Controllers\backcontroller\AdminuserController;
use App\Http\Controllers\backcontroller\BussinesscontactController;
use App\Http\Controllers\backcontroller\ServiceCategoryController;
use App\Http\Controllers\backcontroller\ServiceController;
use App\Http\Controllers\backController\CitypageController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('front.index');
Route::get('/career',[HomeController::class,'career'])->name('front.career');
Route::get('/work',[HomeController::class,'work'])->name('front.work');
Route::get('/blog',[HomeController::class,'blog'])->name('front.blog');
Route::get('/contact',[HomeController::class,'contact'])->name('front.contact');

Route::get('/test/web-development',[HomeController::class,'webdevelopment'])->name('front.webdevelopment');
// Route::get('/digital-marketing',[HomeController::class,'digitalmarketing'])->name('front.digitalmarketing');
// Route::get('/social-media-marketing',[HomeController::class,'smm'])->name('front.smm');
// Route::get('/app-development',[HomeController::class,'ad'])->name('front.ad');
// Route::get('/ui-ux-design',[HomeController::class,'uiux'])->name('front.uiux');
// Route::get('/graphic-design',[HomeController::class,'gd'])->name('front.gd');
// Route::get('/search-engine-optimization',[HomeController::class,'seo'])->name('front.seo');
// Route::get('/search-engine-marketing',[HomeController::class,'sem'])->name('front.sem');
// Route::get('/branding-packaging',[HomeController::class,'ba'])->name('front.ba');
// Route::get('/google-my-bussiness',[HomeController::class,'gmb'])->name('front.gmb');
// Route::get('/advertisement',[HomeController::class,'a'])->name('front.a');
// Route::get('/e-commerce-development',[HomeController::class,'ecd'])->name('front.ecd');
// Route::get('/logo-design',[HomeController::class,'l'])->name('front.l');
// Route::get('/print-media',[HomeController::class,'pm'])->name('front.pm');
// Route::get('/digital-banners',[HomeController::class,'db'])->name('front.db');
// Route::get('/motion-graphics',[HomeController::class,'mg'])->name('front.mg');

Route::get('/services',[HomeController::class,'services'])->name('front.services');
Route::get('/get-started',[HomeController::class,'getstarted'])->name('front.getstarted');
Route::post('/get-started/store',[BussinesscontactController::class,'store'])->name('front.getstarted.store');
Route::get('/privacy-policy',[HomeController::class,'pp'])->name('front.pp');
Route::post('contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('contact/getcountry',[ContactController::class,'getcountry'])->name('contact.getcountry');
Route::post('apply/store',[JobResumeController::class,'store'])->name('apply.store');
Route::get('/work/{workurl:slug}',[HomeController::class,'workurl'])->name('front.workurl');
Route::get('/blog/loadmore',[BlogController::class,'blogshow'])->name('front.blogshow');
Route::get('/blog',[HomeController::class,'blog'])->name('front.blog');
Route::get('/blog/{blogurl:slug}',[HomeController::class,'blogurl'])->name('front.blogurl');


// ===============================================================
// ====================== Admin Routes ===========================
// ===============================================================


 Route::group(['prefix'=>'admin','middleware'=>'PreventBack'],function(){

    Route::get('/',[AuthController::class,'index'])->name('back.auth');
    Route::post('/emailverify',[AuthController::class,'emailauth'])->name('back.emailauth');
    Route::post('/otpverify',[AuthController::class,'otpverify'])->name('back.otpverify');

    Route::group(['middleware'=>'AuthCheck'],function(){

        Route::get('/logout',[AuthController::class,'logout'])->name('back.logout');

        Route::get('/file',[AdminuserController::class,'fileshow'])->name('back.file');
        Route::post('/file/store',[AdminuserController::class,'filestore'])->name('back.filestore');


        Route::group(['middleware'=>'RoleCheck'],function(){
            Route::get('testimonial/getdata',[TestimonialController::class,'getdata'])->name('testimonial.getdata');
            Route::get('testimonial/status',[TestimonialController::class,'status'])->name('testimonial.status');
            Route::get('testimonial/delete',[TestimonialController::class,'delete'])->name('testimonial.delete');
            Route::resource('testimonial',TestimonialController::class)->only([
                'index', 'create','store','edit','update'
            ]);
            Route::get('career/getdata',[CareerController::class,'getdata'])->name('career.getdata');
            Route::get('career/delete',[CareerController::class,'delete'])->name('career.delete');
            Route::get('career/status',[CareerController::class,'status'])->name('career.status');
            Route::resource('career',CareerController::class)->only([
                'index', 'create','store','edit','update'
            ]);
            Route::get('job-resume',[JobResumeController::class,'index'])->name('jobresume.index');
            Route::get('job-resume/getdata',[JobResumeController::class,'getdata'])->name('jobresume.getdata');
            Route::get('job-resume/delete',[JobResumeController::class,'delete'])->name('jobresume.delete');
        
            Route::get('contact',[ContactController::class,'index'])->name('contact.index');
            Route::get('contact/getdata',[ContactController::class,'getdata'])->name('contact.getdata');
            Route::get('contact/delete',[ContactController::class,'delete'])->name('contact.delete');
        
            Route::get('blog-category/delete',[BlogcategoryController::class,'delete'])->name('blogcategory.delete');
            Route::get('blog-category/getdata',[BlogcategoryController::class,'getdata'])->name('blogcategory.getdata');
            Route::resource('blog-category',BlogcategoryController::class)->only([
                'index', 'create','store','edit','update'
            ]);
        
            Route::get('blog/accpectblog/{id}',[BlogController::class,'accpectblog'])->name('blog.accpectblog');
            Route::get('blog/blogview',[BlogController::class,'blogview'])->name('blog.blogview');
            Route::get('blog/pendingblogs',[BlogController::class,'pendingblogs'])->name('blog.pendingblogs');
        
            Route::get('work-category/order',[WorkcategoryController::class,'order'])->name('workcategory.order');
            Route::get('work-category/delete',[WorkcategoryController::class,'delete'])->name('workcategory.delete');
            Route::get('work-category/getdata',[WorkcategoryController::class,'getdata'])->name('workcategory.getdata');
            Route::resource('work-category',WorkcategoryController::class)->only([
                'index', 'create','store','edit','update'
            ]);
        
            Route::get('work/remove-img',[WorkController::class,'removeimg'])->name('work.removeimg');
            Route::get('work/delete',[WorkController::class,'delete'])->name('work.delete');
            Route::get('work/getimages',[WorkController::class,'getimages'])->name('work.getimages');
            Route::get('work/getdata',[WorkController::class,'getdata'])->name('work.getdata');
            Route::resource('work',WorkController::class)->only([
                'index', 'create','store','edit','update'
            ]);

            Route::get('admin-user/delete',[AdminuserController::class,'delete'])->name('adminuser.delete');
            Route::get('admin-user/status',[AdminuserController::class,'status'])->name('adminuser.status');
            Route::get('admin-user/getdata',[AdminuserController::class,'getdata'])->name('adminuser.getdata');
            Route::resource('admin-user',AdminuserController::class)->only([
                'index', 'create','store','edit','update'
            ]);
            
            Route::get('bussiness-contact',[BussinesscontactController::class,'index'])->name('b.index');
            Route::get('bussiness-contact/getdata',[BussinesscontactController::class,'getdata'])->name('b.getdata');
            Route::get('bussiness-contact/delete',[BussinesscontactController::class,'delete'])->name('b.delete');

            Route::get('/service/delete',[ServiceController::class,'delete'])->name('service.delete');
            Route::get('/service/getdata',[ServiceController::class,'getdata'])->name('service.getdata');
            Route::resource('service',ServiceController::class)->only([
                'index', 'create','store','edit','update'
             ]);
            
             Route::get('/service-category/delete',[ServiceCategoryController::class,'delete'])->name('service-category.delete');
             Route::get('/service-category/order',[ServiceCategoryController::class,'order'])->name('service-category.order');
             Route::get('/service-category/getdata',[ServiceCategoryController::class,'getdata'])->name('service-category.getdata');
             Route::resource('service-category',ServiceCategoryController::class)->only([
                'index', 'create','store','edit','update'
             ]);


             Route::get('/city-page/delete',[CitypageController::class,'delete'])->name('city-page.delete');
             Route::get('/city-page/getdata',[CitypageController::class,'getdata'])->name('city-page.getdata');
             Route::resource('city-page',CitypageController::class)->only([
                'index', 'create','store','edit','update'
             ]);


            });            

             Route::get('blog/delete',[BlogController::class,'delete'])->name('blog.delete');
             Route::get('dashboard',[DashboardController::class,'index'])->name('back.dashboard');
             Route::get('blog/getdata',[BlogController::class,'getdata'])->name('blog.getdata');
             Route::post('blog/upload',[BlogController::class,'uploadimage'])->name('blog.upload.image');
             Route::post('blog/delete-image',[BlogController::class,'deleteimg'])->name('blog.delete.image');
             Route::resource('blog',BlogController::class)->only([
                'index', 'create','store','edit','update'
             ]);
    });
 
});
Route::get('/{cityurl:slug}', [frontCityController::class,'index'])->name('front.city');
Route::get('/service/{serviceurl:slug}',[ServicefrontController::class,'index'])->name('front.serviceurl');










