<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('haspermission');
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('admin/bookings/index', compact('bookings'));
    }

    public function create()
    {
        return view('admin/bookings/create');
    }

    public function edit()
    {
        
        return view('admin/bookings/edit');
    }

    public function destroy()
    {
        return 'xoa booking';
    }
}
