<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function subLogin(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::guard('account')->attempt($credentials, $remember)) {
            if($remember){
                Cookie::queue('adminmail', $credentials['email'], 3600);
                Cookie::queue('adminpwd', $credentials['password'], 3600);
            }else{
                Cookie::queue('adminmail', $credentials['email'], -3600);
                Cookie::queue('adminpwd', $credentials['password'], -3600);
            }
            if(Auth::guard('account')->user()->roles == 'admin'){
                return redirect()->route('admin.dashboards.index');
            }elseif(Auth::guard('account')->user()->roles == 'staff'){
                return redirect()->route('admin.dashboards.index');
            }elseif(Auth::guard('account')->user()->roles == 'user'){
                return redirect('/');
            }
        }else{
            return redirect()->back()->with('error', 'These credentials do not match our records.')->withInput();
        }
        
    }

    public function logout()
    {
        Auth::guard('account')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

}
