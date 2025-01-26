<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::guard('admin_login')->user()->role != 'admin'){
             abort(401);            
         }
         
         return $next($request);
    }
}
