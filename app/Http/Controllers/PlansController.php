<?php

namespace App\Http\Controllers;
use App\Models\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function store(Request $request){
        $request->validate([
        'title' => 'required',
        ]);
        
        $plan = Plans::create($request->all());
        return [
        "status" => "success",
        "data" => $plan
        ];
    }
    public function update(Request $request,Plans $plans)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $plans->update($request->all());

        return [
            "status" => "success",
            "msg" => "Plans updated successfully",
            "data" => $plans
        ];
    }
    public function destroy(Request $request,Plans $plans)
    {
        $plans->delete();
        return [
            "status" => "success",
            "data" => $plans,
            "msg" => "Plans deleted successfully"
        ];
    }
}
