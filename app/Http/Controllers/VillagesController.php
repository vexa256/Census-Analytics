<?php

namespace App\Http\Controllers;

use DB;

class VillagesController extends Controller
{
    public function MgtVillages(Type $var = null)
    {
        $FormEngine = new FormEngine;

        $rem = [

            'id',
            'created_at',
            'updated_at',
            'CID',
            'DID',
            'SID',
            'PID',
            'VID',
        ];

        $Parishes = DB::table('parishes')->get();

        $Villages = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->join('parishes AS P', 'P.SID', 'S.SID')
            ->join('villages AS V', 'V.PID', 'P.PID')
            ->select('D.DistrictName', 'C.CountyName', 'S.SubCountyName', 'P.ParishName', 'V.*')
            ->get();

        // dd($Parishes);

        $data = [

            "Page" => "Villages.MgtVillages",
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