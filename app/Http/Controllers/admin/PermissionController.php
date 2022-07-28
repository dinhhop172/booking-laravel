<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $staffs = Account::where('roles', 'staff')->orderBy('id', 'DESC')->get();
        return view('admin/permissions/index', compact('staffs'));
    }

    public function edit($id)
    {
        $staff = Account::findOrFail($id)->get();
        return view('admin/permissions/edit', compact('staff'));
    }
}
