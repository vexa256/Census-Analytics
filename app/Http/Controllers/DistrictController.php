<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;

class DistrictController extends Controller
{
    public function MgtDistricts(Type $var = null)
    {
        $FormEngine = new FormEngine;

        $rem = [

            'id',
            'created_at',
            'updated_at',
            'DID',
        ];

        $Districts = DB::table('districts')->get();
        $data = [

            "Page" => "Districts.MgtDistricts",
            "Title" => "Manage all supported Districts",
            "Desc" => "District Settings",
            "Districts" => $Districts,
            "rem" => $rem,
            "Form" => $FormEngine->Form('districts'),
        ];

        return view('scrn', $data);
    }
}