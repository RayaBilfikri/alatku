<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectToRegister
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/register');
        }

        return $next($request);
    }
}