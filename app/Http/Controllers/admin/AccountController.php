<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('roles', 'staff')->orWhere('roles', 'user')->orderBy('id', 'DESC')->get();
        return view('admin/users/index', compact('accounts'));
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function edit()
    {
        $staff_id = auth()->guard('account')->user()->id;
        $test = DB::table('account_permission')
            ->join('accounts', 'account_permission.account_id', '=', 'accounts.id')
            ->join('permissions', 'account_permission.permission_id', '=', 'permissions.id')
            ->select('permissions.*')
            ->where('account_permission.account_id', $staff_id)
            ->get();
        return view('admin/users/edit', compact('test'));
    }

    public function destroy()
    {
        return 'xoa tai khoan';
    }
}
