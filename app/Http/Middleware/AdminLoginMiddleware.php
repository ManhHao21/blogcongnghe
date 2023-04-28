<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 0 ){
                return $next($request);
            }
            return redirect() ->route('admin.charAt')->with('msg','truy cập không hợp lệ');
        }
        return redirect() ->route('admin.login')->with('msg','truy cập không hợp lệ');
    }
}
