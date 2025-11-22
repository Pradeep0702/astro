<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('admin_login')->check()){
               return redirect()->route('back.dashboard');
        } 
         return $next($request);
    }
}
