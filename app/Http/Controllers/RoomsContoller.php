<?php

namespace App\Http\Controllers;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomsContoller extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        'hotelID' => 'required',
        'services' => 'required',
        'facilities' => 'required',
        ]);
        
        $room = Rooms::create($request->all());
        return [
        "status" => "success",
        "data" => $room
        ];
    }
    public function update(Request $request,Rooms $room)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $room->update($request->all());

        return [
            "status" => "success",
            "msg" => "Rooms updated successfully",
            "data" => $room
        ];
    }
    public function destroy(Request $request,Rooms $room)
    {
        $room->delete();
        return [
            "status" => "success",
            "data" => $room,
            "msg" => "Rooms deleted successfully"
        ];
    }
}
