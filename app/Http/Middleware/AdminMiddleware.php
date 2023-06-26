<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // If the user is not an admin, redirect to the 'home' route with an error message
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
