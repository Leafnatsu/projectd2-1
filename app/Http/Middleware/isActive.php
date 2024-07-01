<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isActive
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->isActive) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['Your account has been disabled.']);
        }

        return $next($request);
    }
}