<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Customers;
use App\Models\Outlet;
use Illuminate\Http\Request;

class PointCollectionController extends Controller
{
    public function index(Request $request){
        $outlet = Outlet::where('id', 1)->get();

        return response()->json([
            'status' => 1,
            'message' => '',
            'data' => [
                'outlet' => $outlet
            ]
        ], 200);
    }

    public function pointsCollection(Request $request){

        $request->validate([
            'spending'      => 'required',
            'points'        => 'required',
            'phoneNumber'   => 'required',
        ]);
        
        $spending       = $request->spending;
        $points         = $request->points;
        $phoneNumber    = $request->phoneNumber;

        $customer = Customers::where('phoneNumber', $phoneNumber)
            ->first();

        $outlet = Outlet::where('id', 1)->first();
        
        if($customer){
            Collection::create([
                'brandId'           => $outlet->brandId,
                'extension'         => 'MY',
                'outletName'        => $outlet->name,
                'outletId'          => $outlet->id,
                'points'            => $points,
                'spending'          => $spending,
                'phoneNumber'       => $phoneNumber
            ]);
        } 

    }

}
