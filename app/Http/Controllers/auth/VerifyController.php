<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function index()
    {
        return view('auth.form_press_code');
    }

    public function verify_admin(Request $request)
    {
        $infoAccount = Auth::guard('account')->user();
        $code = $request->verification_code;

        if($infoAccount->verification_code == $code){
            $infoAccount->verification_code = null;
            $infoAccount->email_verified_at = date('Y-m-d H:i:s');
            $infoAccount->save();
            return redirect()->route('admin.dashboards.index');
        }else{
            return redirect()->back()->with('error', 'Code is not correct');
        }
    }

    public function verify_user(Account $account, $token)
    {
        $now = date("Y-m-d H:i:s");
        (int)$time_exp = hex2bin($token);
        $number_time_now = strtotime($now);
        if($time_exp > $number_time_now){
            $account->email_verified_at = date('Y-m-d H:i:s');
            $account->save();
            auth()->guard('account')->login($account);
            return redirect('/')->with('success', 'Ban da xac thuc thanh cong');
        }else{
            return redirect('/')->with('error', 'Xac thuc khong thanh cong');
        }
    }

    public function test(Account $account, $token)
    {
        dd($account, $token);
    }

    public function testa()
    {
        $account = Account::with('bookings')->find(2);
        dd($account->permissions);
    }

}
