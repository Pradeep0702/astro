<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\AuthModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceCategoryModel;
use Illuminate\Support\Facades\View;
use App\Models\Service;
use Illuminate\Support\Facades\Route;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
