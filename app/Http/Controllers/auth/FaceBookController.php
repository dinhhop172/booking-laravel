<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Services\SocialAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            dd($user);
            $saveUser = Account::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);

            Auth::guard('account')->loginUsingId($saveUser->id);

            return redirect()->route('/');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
