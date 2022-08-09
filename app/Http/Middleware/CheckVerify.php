<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVerify
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
        if(auth()->guard('account')->check()){
            if(auth()->guard('account')->user()->email_verified_at != null){
                if(auth()->guard('account')->user()->roles == 'admin' || auth()->guard('account')->user()->roles == 'staff'){
                    return redirect('admin/dashboards');
                }
                if(auth()->guard('account')->user()->roles == 'user'){
                    return redirect('/');
                }
                return redirect('admin/dashboards');
            }elseif(auth()->guard('account')->user()->roles == 'user'){
                return redirect('/');
            }
            return $next($request);
        }
        return redirect('auth/login');
    }
}
