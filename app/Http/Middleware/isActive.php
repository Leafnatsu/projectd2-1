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

        if (
            Auth::user()->isActive == 1
        ){
            return $next($request);
        }else{
            Auth::logout();
            toast('บัญชีของคุณถูกปิดการใช้งาน','error');
            return redirect()->route('login');
        }

    }
}