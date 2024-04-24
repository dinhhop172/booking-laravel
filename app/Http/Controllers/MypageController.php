<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Room;
use App\Repositories\Room\RoomRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    protected $roomRepositoryInterface;

    public function __construct(RoomRepositoryInterface $roomRepositoryInterface)
    {
        $this->roomRepositoryInterface = $roomRepositoryInterface;
    }

    public function index()
    {
        return view('my-page');
    }

    public function showAllRoom()
    {
        try {
            $data = $this->roomRepositoryInterface->getRoom();
            dd(app()->makeWith(Account::class, ['id' => 1]));
            // $user = $users->find([1, 2]);
            // $asd = $users->except([1, 2]);
            // $users = $users->diff(Account::whereIn('id', [1,3])->get());
            // $users = ($users->fresh('bookings'));
            // dd($users);
            return view('repositories.rooms.index', compact('data'));
        } catch (Exception $e) {
            throw $e;
        }
        
    }

    public function create()
    {
        return view('repositories.rooms.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->only(['name', 'price', 'status']);
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'status' => 'required|numeric'
            ]);
            if($this->roomRepositoryInterface->createRoom($data)){
                return redirect('test-room');
            }
            return back()->withInput();
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $data = $this->roomRepositoryInterface->editRoom($id);
        // return response()->json(['data' => $data]);
        return view('repositories.rooms.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = $request->only(['name', 'price', 'status']);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required|numeric'
        ]);
        $this->roomRepositoryInterface->updateRoom($id, $data);
        return back()->with('success', 'Updated successfully');
    }

    public function delete($id)
    {
        try {
            $this->roomRepositoryInterface->deleteRoo($id);
            return back();
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function inputAdsView()
    {
        return view('test.index');
    }
    public function inputAds()
    {
        dd(request()->all());
    }
}
