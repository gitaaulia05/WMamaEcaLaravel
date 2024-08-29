<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\isAdmin::class,
            'Tanggal'=> \App\Http\Middleware\dateControl::class,
            'guest' => RedirectIfAuthenticated::class,
            'auth.custom' => EnsureUserIsAuthenticated::class,
        ]);
        //    $middleware->append(Authenticate::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
