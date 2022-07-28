<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store(RegisterRequest $request)
    {
        $newAccount = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'roles' => 'user'
        ]);
        if($newAccount == true){
            return redirect()->route('auth.login')->with('succRegis', 'Register successfully');
        }
        return redirect()->back()->with('error', 'Error')->withInput();

    }
}
