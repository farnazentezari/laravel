<?php

namespace App\Http\Controllers;
use App\Models\Prices;
use Illuminate\Http\Request;

class PricesContoller extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        'hotelID' => 'required',
        'roomID' => 'required',
        'adult' => 'required',
        'child' => 'required',
        'infant' => 'required',
        ]);
        
        $price = Prices::create($request->all());
        return [
        "status" => "success",
        "data" => $price
        ];
    }
    public function update(Request $request,Prices $price)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $price->update($request->all());

        return [
            "status" => "success",
            "msg" => "Prices updated successfully",
            "data" => $price
        ];
    }
    public function destroy(Request $request,Prices $price)
    {
        $price->delete();
        return [
            "status" => "success",
            "data" => $price,
            "msg" => "Prices deleted successfully"
        ];
    }
}
