<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['checkUserMiddleware' => \App\Http\Middleware\CheckgodRole::class]);
        $middleware->alias(['protectDefaultRoles' => \App\Http\Middleware\ProtectDefaultRoles::class]);
        $middleware->alias(['checkAdminCreateUser'=> \App\Http\Middleware\CheckAdminCreateUser::class]);
        $middleware->alias(['checkRol'=> \App\Http\Middleware\CheckRole::class]);
        $middleware->alias(['restrict.home'=> \App\Http\Middleware\RestrictToHome::class]);
        
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
