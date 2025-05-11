<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuperadmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== 'superadmin') {
            return redirect('/');
        }

        return $next($request);
    }
}