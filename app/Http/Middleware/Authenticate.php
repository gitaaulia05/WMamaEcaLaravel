<?php
namespace App\Http\Middleware;


use Closure;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate 
{
    public function handle($request, Closure $next, ...$guards): Response
    {
        // Make sure Auth::check() is working as expected
        if (!Auth::check()) {
            \Log::info('User not authenticated, redirecting to login');
            return redirect()->route('login'); // Correct redirect
        }
        
        \Log::info('User authenticated, proceeding to next middleware');
        return $next($request);
    }
}
