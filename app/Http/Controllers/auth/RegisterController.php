<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Mail\VerifyUser;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store(RegisterRequest $request)
    {
        $now = date("Y-m-d H:i:s");
        $number_time_now = strtotime($now) + 86400;
        $code = bin2hex($number_time_now);

        $newAccount = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'roles' => 'user',
            'verification_code' => $code
        ]);
        if($newAccount == true){
            Mail::to($newAccount->email)->send(new VerifyUser($newAccount));
            return redirect()->route('auth.login')->with('succRegis', 'Register successfully, please check your email to verify your account');
        }
        return redirect()->back()->with('error', 'Error')->withInput();
    }

}
