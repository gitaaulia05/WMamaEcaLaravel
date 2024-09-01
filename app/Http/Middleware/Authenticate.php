<?php
namespace App\Http\Middleware;


use Closure;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate 
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        return route('login');
        
    }
}
