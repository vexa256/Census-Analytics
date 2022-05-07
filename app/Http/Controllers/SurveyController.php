<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function SelectHousehold(Type $var = null)
    {

        $HouseHolds = DB::Table('households')->get();
        $data = [

            "Page" => "Survey.SelectHousehold",
            "Title" => "Select a household to attach survey to",
            "Desc" => "Household selection ",
            "Households" => $HouseHolds,
            // "Villages" => $Villages,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('households'),
        ];

        return view('scrn', $data);
    }

    public function AcceptHouseholdSelection(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
        ]);

        $id = $request->id;

        return redirect()->route('SurveyHousehold', ['id' => $id]);

    }

    public function SurveyHousehold($id)
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
            'Year',
            'HID',
            'VID',
            'SubmittedBy',
            'SurveyID',
        ];

        $HouseHold = DB::Table('households')
            ->where('id', '=', $id)
            ->first();

        $Surveys = DB::Table('surveys AS S')
            ->where('S.HID', $HouseHold->HID)
            ->join('households AS H', 'H.HID', 'S.HID')
            ->join('villages AS V', 'V.VID', 'H.VID')
            ->select('V.VillageName', 'S.*')
            ->where('S.SubmittedBy', \Auth::user()->email)
            ->get();

        $data = [

            "Page" => "Survey.Survey",
            "Title" => "Conduct a survey on the household " . $HouseHold->HouseholdName,
            "Desc" => "Household survey ",
            // "Households" => $HouseHolds,
            "Surveys" => $Surveys,
            "rem" => $rem,
            "HouseholdName" => $HouseHold->HouseholdName,
            "HID" => $HouseHold->HID,
            "Form" => $FormEngine->Form('surveys'),
        ];

        return view('scrn', $data);

    }

    public function SelectYear(Type $var = null)
    {

        $Years = DB::Table('surveys')->get();
        $data = [

            "Page" => "Reports.SelectYear",
            "Title" => "Select a yare to attach survey report to",
            "Desc" => "Survey Report Timeline Selection",
            "Years" => $Years,

        ];

        return view('scrn', $data);
    }

    public function AcceptYearSelect(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
        ]);

        $Year = $request->Year;

        return redirect()->route('CensusReport', ['Year' => $Year]);
    }

    public function CensusReport($Year)
    {

        $Stats = DB::Table('surveys AS S')
            ->where('S.Year', $Year)
            ->join('households AS H', 'H.HID', 'S.HID')
            ->join('districts AS D', 'D.DID', 'H.DID')
            ->join('counties AS C', 'C.CID', 'H.CID')
            ->join('sub_counties AS S', 'S.SID', 'H.SID')
            ->join('parishes AS P', 'P.PID', 'H.PID')
            ->join('villages AS V', 'V.VID', 'H.VID')
            ->select(

                'S.SurveyID',
                'D.DID',
                'C.CID',
                'S.SID',
                'P.PID',
                'V.VID',
            )
            ->get();

        $SurveyedDistricts = $Stats->unique('DID')->count('DID');
        $SurveyedCounties = $Stats->unique('CID')->count('CID');
        $SurveyedSubCounties = $Stats->unique('SID')->count('SID');
        $SurveyedParishes = $Stats->unique('PID')->count('PID');
        $SurveyedVillages = $Stats->unique('VID')->count('VID');
        $SurveyedHouseHolds = $Stats->unique('HID')->count('HID');

        $Census = DB::Table('surveys')
            ->where('Year', $Year)
            ->selectRaw('
            SUM(Females) AS TotalFemales,
            SUM(Males) AS TotalMales,
            SUM(PrimarySchoolEduction) AS TotalPrimarySchoolEduction,
            SUM(HighSchoolEduction) AS TotalHighSchoolEduction,
            SUM(TertiaryEducation) AS TotalTertiaryEducation,
            SUM(Christian) AS TotalChristian,
            SUM(Moslem) AS TotalMoslem,
            SUM(IndigenousReligion) AS TotalIndigenousReligion,
            SUM(UnEmployed) AS TotalUnEmployed,
            SUM(Employed) AS TotalEmployed,
            SUM(Married) AS TotalMarried,
            SUM(Divorced) AS TotalDivorced,
            SUM(NotMarried) AS TotalNotMarried,
            SUM(Deaths) AS TotalDeaths,
            SUM(RecentBirths) AS TotalRecentBirths,
            SUM(BelowFiveYears) AS TotalBelowFiveYears,
            SUM(BelowEighteenYears) AS TotalBelowEighteenYears,
            SUM(BelowThirtyFiveYears) AS TotalBelowThirtyFiveYears,
            SUM(BelowFortyFiveYears) AS TotalBelowFortyFiveYears,
            SUM(AboveFortyFiveYears) AS TotalAboveFortyFiveYears
                ')->get();

        $data = [

            "Page" => "Reports.Report",
            "Title" => "Census Report and Statistics For the Year " . $Year,
            "Desc" => "National Census Report",
            "SurveyedDistricts" => $SurveyedDistricts,
            "SurveyedCounties" => $SurveyedCounties,
            "SurveyedSubCounties" => $SurveyedSubCounties,
            "SurveyedParishes" => $SurveyedParishes,
            "SurveyedVillages" => $SurveyedVillages,
            "SurveyedHouseHolds" => $SurveyedHouseHolds,
            "Census" => $Census,

        ];

        return view('scrn', $data);

    }
}