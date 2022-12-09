<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacities;
class CapacitiesContoller extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        'roomID' => 'required',
        ]);
        
        $capacity = Capacities::create($request->all());
        return [
        "status" => "success",
        "data" => $capacity
        ];
    }
    public function update(Request $request,Capacities $capacity)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $capacity->update($request->all());

        return [
            "status" => "success",
            "msg" => "Capacities updated successfully",
            "data" => $capacity
        ];
    }
    public function destroy(Request $request,Capacities $capacity)
    {
        $capacity->delete();
        return [
            "status" => "success",
            "data" => $capacity,
            "msg" => "Capacities deleted successfully"
        ];
    }
}
