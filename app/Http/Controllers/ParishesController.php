<?php

namespace App\Http\Controllers;

use DB;

class ParishesController extends Controller
{
    public function MgtParishes(Type $var = null)
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
        ];

        $SubCounties = DB::table('sub_counties')->get();

        $Parishes = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->join('sub_counties AS S', 'S.CID', 'C.CID')
            ->join('parishes AS P', 'P.SID', 'S.SID')
            ->select('D.DistrictName', 'C.CountyName', 'S.SubCountyName', 'P.*')
            ->get();

        // dd($SubCounties);

        $data = [

            "Page" => "Parishes.MgtParishes",
            "Title" => "Manage all supported Parishes",
            "Desc" => "Parish Settings",
            "SubCounties" => $SubCounties,
            "Parishes" => $Parishes,
            "rem" => $rem,
            "Form" => $FormEngine->Form('parishes'),
        ];

        return view('scrn', $data);
    }
}