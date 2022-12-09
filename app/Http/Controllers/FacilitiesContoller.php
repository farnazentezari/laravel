<?php

namespace App\Http\Controllers;
use App\Models\Facilities;
use Illuminate\Http\Request;

class FacilitiesContoller extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        'hotelID' => 'required',
        ]);
        
        $facility = Facilities::create($request->all());
        return [
        "status" => "success",
        "data" => $facility
        ];
    }
    public function update(Request $request,Facilities $facility)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $facility->update($request->all());

        return [
            "status" => "success",
            "msg" => "Facilities updated successfully",
            "data" => $facility
        ];
    }
    public function destroy(Request $request,Facilities $facility)
    {
        $facility->delete();
        return [
            "status" => "success",
            "data" => $facility,
            "msg" => "Facilities deleted successfully"
        ];
    }
}
