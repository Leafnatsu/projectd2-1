<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class isAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
    public function handle(Request $request, Closure $next): Response
    {

        $auth = Auth::user();

        if($auth->isAdmin == 1)
        {
            return $next($request);
        }else{
            // alert()->info('แจ้งเตือน', 'คุณไม่มีสิทธิเข้าหน้านี้');
            return redirect()->route('default');
        }

    }

}
