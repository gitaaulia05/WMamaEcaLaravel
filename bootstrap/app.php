<?php


use App\Http\Middleware\cekUser;
use App\Http\Middleware\cekAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->group('web', [
            // \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);

        $middleware->alias([
            'is_admin' => \App\Http\Middleware\isAdmin::class,
            'Tanggal'=> \App\Http\Middleware\dateControl::class,
            'cekAdmin' => cekAdmin::class,
            'cekUser' => cekUser::class,
            
        ]);

        
        //    $middleware->append(Authenticate::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
