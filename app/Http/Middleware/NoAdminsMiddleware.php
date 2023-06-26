<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NoAdminsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
