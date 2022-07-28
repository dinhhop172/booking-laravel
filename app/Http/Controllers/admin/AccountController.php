<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('roles', 'staff')->orWhere('roles', 'user')->orderBy('id', 'DESC')->get();
        return view('admin/users/index', compact('accounts'));
    }
}
