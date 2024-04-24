<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('haspermission');
    }

    public function index()
    {
        $rooms = Room::all();
        return view('admin/rooms/index', compact('rooms'));
    }

    public function create()
    {
        return view('admin/rooms/create');
    }

    public function edit()
    {
        return view('admin/rooms/edit');
    }

    public function destroy()
    {
        return 'xoa room';
    }
}
