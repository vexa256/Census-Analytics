<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;
use Illuminate\Http\Request;

class HouseholdsController extends Controller
{
    public function NewHousehold(Request $request)
    {

        $validated = $request->validate([
            '*' => 'required',
            'HouseholdName' => 'required|unique:households',
        ]);

        $VID = $request->VID;

        $VillageProperties = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->join('parishes AS P', 'P.SID', 'S.SID')
            ->join('villages AS V', 'V.PID', 'P.PID')
            ->where('V.VID', '=', $VID)
            ->select('D.DID', 'C.CID', 'S.SID', 'P.PID', 'V.VID')
            ->first();

        DB::table('households')->insert([

            'VID' => $VillageProperties->VID,
            'SID' => $VillageProperties->SID,
            'CID' => $VillageProperties->CID,
            'DID' => $VillageProperties->DID,
            'PID' => $VillageProperties->PID,
            'HID' => $request->HID,
            'householdName' => $request->HouseholdName,
            'created_at' => $request->created_at,

        ]);

        return redirect()->back()->with('status', 'The household  was created successfully');
    }

    public function MgtHouseHolds(Type $var = null)
    {

        $rem = [

            'id',
            'created_at',
            'updated_at',
            'CID',
            'DID',
            'SID',
            'PID',
            'VID',
            'HID',
        ];
        $Villages = DB::table('villages')->get();

        $FormEngine = new FormEngine;
        $HouseHolds = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->join('parishes AS P', 'P.SID', 'S.SID')
            ->join('villages AS V', 'V.PID', 'P.PID')
            ->join('households AS H', 'H.VID', 'V.VID')
            ->select('D.DistrictName', 'C.CountyName', 'S.SubCountyName', 'P.ParishName', 'V.VillageName', 'H.*')
            ->get();

        $data = [

            "Page" => "Households.MgtHouseholds",
            "Title" => "Manage all supported Households",
            "Desc" => "Households Settings",
            "HouseHolds" => $HouseHolds,
            "Villages" => $Villages,
            "rem" => $rem,
            "Form" => $FormEngine->Form('households'),
        ];

        return view('scrn', $data);
    }
}