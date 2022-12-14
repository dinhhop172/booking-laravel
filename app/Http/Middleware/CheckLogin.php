<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::guard('account')->check()) {
        //     return $next($request);
        // }
        // return redirect()->route('auth.login');
        if(Auth::guard('account')->check()) {
            if((Auth::guard('account')->user()->roles == 'admin' && Auth::guard('account')->user()->email_verified_at != null) || Auth::guard('account')->user()->roles == 'staff'){
                return $next($request);
            }
            return redirect('auth/verify-admin');
        }
        return redirect('auth/verify-admin');
        
    }
}
