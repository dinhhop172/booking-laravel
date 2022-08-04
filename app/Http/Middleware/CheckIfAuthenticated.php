<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfAuthenticated
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
        if(Auth::guard('account')->check()) {
            if(Auth::guard('account')->user()->roles == 'admin' || Auth::guard('account')->user()->roles == 'staff'){
                return redirect()->route('admin.dashboards.index');
            }
            return redirect('/');
        }
        return $next($request);
    }
}
