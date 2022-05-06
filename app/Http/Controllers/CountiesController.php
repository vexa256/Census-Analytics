<?php

namespace App\Http\Controllers;

use DB;

class CountiesController extends Controller
{
    public function MgtCounties(Type $var = null)
    {
        $FormEngine = new FormEngine;

        $rem = [

            'id',
            'created_at',
            'updated_at',
            'CID',
            'DID',
        ];

        $Districts = DB::table('districts')->get();

        $Counties = DB::table('counties AS C')
            ->join('Districts AS D', 'D.DID', 'C.DID')
            ->select('D.DistrictName', 'C.*')
            ->get();

        // dd($Counties);

        $data = [

            "Page" => "Counties.MgtCounties",
            "Title" => "Manage all supported Counties",
            "Desc" => "District Settings",
            "Counties" => $Counties,
            "Districts" => $Districts,
            "rem" => $rem,
            "Form" => $FormEngine->Form('counties'),
        ];

        return view('scrn', $data);
    }
}