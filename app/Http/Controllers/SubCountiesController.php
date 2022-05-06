<?php

namespace App\Http\Controllers;

use DB;

class SubCountiesController extends Controller
{
    public function MgtSubCounties(Type $var = null)
    {
        $FormEngine = new FormEngine;

        $rem = [

            'id',
            'created_at',
            'updated_at',
            'CID',
            'DID',
            'SID',
        ];

        $Counties = DB::table('counties')->get();

        $SubCounties = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->select('D.DistrictName', 'C.CountyName', 'S.*')
            ->get();

        // dd($Counties);

        $data = [

            "Page" => "SubCounties.MgtSubCounties",
            "Title" => "Manage all supported Sub-Counties",
            "Desc" => "Sub County Settings",
            "Counties" => $Counties,
            "SubCounties" => $SubCounties,
            "rem" => $rem,
            "Form" => $FormEngine->Form('sub_counties'),
        ];

        return view('scrn', $data);
    }
}