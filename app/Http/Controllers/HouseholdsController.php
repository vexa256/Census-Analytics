<?php

namespace App\Http\Controllers;

class HouseholdsController extends Controller
{
    public function NewHousehold(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
            'HouseHoldName' => 'required|unique:households',
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
            'created' => $request->created_at,

        ]);

        return redirect()->back()->with('status', 'The household  was created successfully');
    }

    public function MgtHouseHolds(Type $var = null)
    {
        $HouseHolds = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->join('parishes AS P', 'P.SID', 'S.SID')
            ->join('villages AS V', 'V.PID', 'P.PID')
            ->join('households AS H', 'H.VID', 'V.VID')
            ->select('D.DID', 'C.CID', 'S.SID', 'P.PID', 'V.VID', 'H.*')
            ->get();

        $data = [

            "Page" => "Households.MgtVillages",
            "Title" => "Manage all supported Village",
            "Desc" => "Village Settings",
            "Parishes" => $Parishes,
            "Villages" => $Villages,
            "rem" => $rem,
            "Form" => $FormEngine->Form('villages'),
        ];

        return view('scrn', $data);
    }
}