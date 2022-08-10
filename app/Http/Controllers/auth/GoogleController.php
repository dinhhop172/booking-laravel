<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();

            // dd($user);
            $saveUser = Account::updateOrCreate([
                'google_id' => $user->getId(),
            ],[
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'roles' => 'user',
                'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);

            Auth::guard('account')->login($saveUser);

            return redirect('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
