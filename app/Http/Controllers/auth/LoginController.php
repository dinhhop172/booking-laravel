<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Mail\VerifyAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function subLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;
        $code = substr(number_format(time() * rand(),0,'',''),0,6);
        
        if (Auth::guard('account')->attempt($credentials, $remember)) {
            $infoAccount = Auth::guard('account')->user();
            $code = substr(number_format(time() * rand(),0,'',''),0,6);

            if($remember){
                Cookie::queue('adminmail', $credentials['email'], 3600);
                Cookie::queue('adminpwd', $credentials['password'], 3600);

                if($infoAccount->roles == 'admin'){
                    $admin = Auth::guard('account')->user();
                    $admin->verification_code = $code;
                    $admin->save();
                    Mail::to($infoAccount->email)->send(new VerifyAdmin($code));
                    return redirect()->route('auth.view-verify-admin');

                }elseif($infoAccount->roles == 'staff'){
                    return redirect()->route('admin.dashboards.index');

                }elseif($infoAccount->roles == 'user'){
                    return redirect('/');
                }

            }else{
                Cookie::queue('adminmail', $credentials['email'], -3600);
                Cookie::queue('adminpwd', $credentials['password'], -3600);

                if(Auth::guard('account')->user()->roles == 'admin'){
                    $admin = Auth::guard('account')->user();
                    $admin->verification_code = $code;
                    $admin->save();
                    Mail::to($infoAccount->email)->send(new VerifyAdmin($code));

                    return redirect()->route('auth.view-verify-admin');
                }elseif($infoAccount->roles == 'staff'){
                    return redirect()->route('admin.dashboards.index');
                }elseif($infoAccount->roles == 'user'){
                    return redirect('/');
                }
            }
        }else{
            return redirect()->back()->with('error', 'These credentials do not match our records.')->withInput();
        }
    }

    public function logout()
    {
        if(Auth::guard('account')->check()){
            if(Auth::guard('account')->user()->roles == 'admin'){
                $infoAccount = Auth::guard('account')->user();
                if($infoAccount->email_verified_at != null){
                    $infoAccount->email_verified_at = null;
                    $infoAccount->save();
                }
            }
            
        }
        Auth::guard('account')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

}
