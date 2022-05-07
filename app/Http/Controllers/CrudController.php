<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    public function DeleteData($id, $TableName)
    {

        DB::table($TableName)->where('id', $id)->delete();

        return redirect()->back()
            ->with('status',
                'The selected record was deleted successfully');
    }

    public function SaveData($request)
    {
        DB::table($request->TableName)->insert(
            $request->except([
                '_token',
                'TableName',
                'id',
            ])
        );

    }

    public function MassInsert(Request $request)
    {if ($request->TableName == "users") {

        $validated = $request->validate([
            '*' => 'required',
            "email" => 'unique:users',
        ]);

        DB::table($request->TableName)->insert(
            $request->except([
                '_token',
                'TableName',
                'id',
            ])
        );

        DB::table($request->TableName)->where('uuid', $request->uuid)
            ->update([

                'password' =>
                \Hash::make($request->password),

            ]);

        //  $this->SaveData($request);

        return redirect()->back()->with('status', 'The new user account has been created successfully');

    } elseif ($request->TableName == 'districts') {
        $validated = $request->validate([
            '*' => 'required',
            'DistrictName' => 'required|unique:districts',
        ]);

        $this->SaveData($request);

        return redirect()->back()->with('status', 'The record was created successfully');

    } elseif ($request->TableName == 'parishes') {
        $validated = $request->validate([
            '*' => 'required',
            'ParishName' => 'required|unique:parishes',
        ]);

        $this->SaveData($request);

        return redirect()->back()->with('status', 'The record was created successfully');

    } elseif ($request->TableName == 'sub_counties') {
        $validated = $request->validate([
            '*' => 'required',
            'SubCountyName' => 'required|unique:sub_counties',
        ]);

        $this->SaveData($request);

        return redirect()->back()->with('status', 'The record was created successfully');

    } elseif ($request->TableName == 'counties') {
        $validated = $request->validate([
            '*' => 'required',
            'CountyName' => 'required|unique:counties',
        ]);

        $this->SaveData($request);

        return redirect()->back()->with('status', 'The record was created successfully');
    } else {
        $validated = $request->validate([
            '*' => 'required',
        ]);

        $this->SaveData($request);

        return redirect()->back()->with('status', 'The record was created successfully');
    }

    }

    public function MassUpdate(Request $request)
    {
        $validated = $this->validate($request, [
            '*' => 'required',
        ]);

        DB::table($request->TableName)->where('id', $request->id)

            ->update($request->except([
                '_token',
                'TableName',
                'id',
            ]));

        return redirect()->back()->with('status', 'The selected record was updated successfully');

    }
}