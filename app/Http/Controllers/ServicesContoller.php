<?php

namespace App\Http\Controllers;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesContoller extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        'hotelID' => 'required',
        ]);
        
        $service = Services::create($request->all());
        return [
        "status" => "success",
        "data" => $service
        ];
    }
    public function update(Request $request,Services $service)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $service->update($request->all());

        return [
            "status" => "success",
            "msg" => "Services updated successfully",
            "data" => $service
        ];
    }
    public function destroy(Request $request,Services $service)
    {
        $service->delete();
        return [
            "status" => "success",
            "data" => $service,
            "msg" => "Services deleted successfully"
        ];
    }
}
