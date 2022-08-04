<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $staffs = Account::where('roles', 'staff')->orderBy('id', 'DESC')->get();
        return view('admin/permissions/index', compact('staffs'));
    }

    public function edit($id)
    {
        $staff = Account::findOrFail($id);
        $permissions = Permission::all();
        $permission_bookings = Permission::withNameBooking()->get();
        $permission_rooms = Permission::withNameRoom()->get();
        return view('admin/permissions/edit', compact('staff', 'id', 'permission_bookings', 'permission_rooms'));
    }

    public function store()
    {
        $data = request()->all();
        $staff_id = $data['staff_id'];
        $value_per = $data['value_per'];
        Account::findOrFail($staff_id)->permissions()->attach($value_per, ['status' => 1]);
        return 'success';
    }

    public function destroy()
    {
        $data = request()->all();
        $staff_id = $data['staff_id'];
        $value_per = $data['value_per'];
        Account::findOrFail($staff_id)->permissions()->detach($value_per);
        return 'success';
    }

    public function addShowList(Request $request, $id)
    {
        $staff = Account::findOrFail($id);
        $permission = 1;
        if($request->on == 'on'){
            $staff->permissions()->attach($permission);
            return redirect()->back();
        }else{
            $staff->permissions()->detach($permission);
            return redirect()->back();
        }
    }

    public function addEditList(Request $request, $id)
    {
        $staff = Account::findOrFail($id);
        $permission = 2;
        if($request->on == 'on'){
            $staff->permissions()->attach($permission);
            return redirect()->back();
        }else{
            $staff->permissions()->detach($permission);
            return redirect()->back();
        }
    }

    
}
