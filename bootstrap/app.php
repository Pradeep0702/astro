<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\PreventMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleCheck;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('AuthCheck', [
            AuthMiddleware::class,          
        ]); 
        $middleware->appendToGroup('PreventBack', [
            PreventMiddleware::class,          
        ]); 
        
        $middleware->appendToGroup('RoleCheck', [
            RoleCheck::class,          
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {  
    })->create();
