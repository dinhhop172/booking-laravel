<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasPermission
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
        
        // if(auth()->guard('account')->user()->hasPermissions($permissions)){
        //     return $next($request);
        // }
        // abort(Response::HTTP_FORBIDDEN, 'This action is unauthorized.');

        $staff_id = auth()->guard('account')->user()->id;
        $routeName = $request->route()->getName();

        $permissions = DB::table('account_permission')
            ->join('accounts', 'account_permission.account_id', '=', 'accounts.id')
            ->join('permissions', 'account_permission.permission_id', '=', 'permissions.id')
            ->select('permissions.*')
            ->where('account_permission.account_id', $staff_id)
            ->get();

        foreach($permissions as $permission){
            if($permission->route_name == $routeName){
                return $next($request);
            }
        }
        abort(Response::HTTP_FORBIDDEN, 'This action is unauthorized.');
    }
}
