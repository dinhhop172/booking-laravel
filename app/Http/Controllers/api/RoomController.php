<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = Room::create($request->all());
        return response()->json($room);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());
        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json($room);
    }

    public function test($id)
    {
        $room = Room::where('id', $id)->first();
        // return (RoomResource::collection($room));
        return (new RoomResource($room));
    }
    
    // {
    //     "data": {
    //         "id": 1,
    //         "name": "Room 1",
    //         "price": 1000,
    //         "status": 1
    //     }
    // }

    // {
    //     "data": [
    //         {
    //             "id": 1,
    //             "name": "Room 1",
    //             "price": 1000,
    //             "status": 1
    //         },
    //         {
    //             "id": 2,
    //             "name": "Room 2",
    //             "price": 2000,
    //             "status": 1
    //         },
    //         {
    //             "id": 3,
    //             "name": "Room 3",
    //             "price": 1000,
    //             "status": 1
    //         }
    //     ]
    // }
}
