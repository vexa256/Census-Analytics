<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Conduct  surveys on the household ' . $HouseholdName . ' |  the field agent is ' . Auth::user()->name, $Msg = null) !!} </div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Parish', $Icon = 'fa-plus') }}
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                <th>Females</th>
                <th>Males</th>
                <th>Primary Eduction </th>
                <th>High School Education</th>
                <th>Tertiary Education</th>
                <th>Christian</th>
                <th>Moslem</th>
                <th>Indigenous Religion</th>
                <th>Un Employed</th>
                <th>Employed</th>
                <th>Married</th>
                <th>Divorced</th>
                <th>Not Married</th>
                <th>Deaths</th>
                <th>Recent Births</th>
                <th>Below Five Years</th>
                <th>Below Eighteen Years</th>
                <th>Below Thirty Five Years</th>
                <th>Below Forty Five Years</th>
                <th>Above Forty Five Years</th>


            </tr>
        </thead>
        <tbody class="">
            @isset($Surveys)
                @foreach ($Surveys as $data)
                    <tr>
                        {{-- <td>{{ $data->SubmittedBy }}</td> --}}
                        <td>{{ $data->Females }}</td>
                        <td>{{ $data->Males }}</td>
                        <td>{{ $data->PrimarySchoolEduction }}</td>
                        <td>{{ $data->HighSchoolEduction }}</td>
                        <td>{{ $data->TertiaryEducation }}</td>
                        <td>{{ $data->Christian }}</td>
                        <td>{{ $data->Moslem }}</td>
                        <td>{{ $data->IndigenousReligion }}</td>
                        <td>{{ $data->UnEmployed }}</td>
                        <td>{{ $data->Employed }}</td>
                        <td>{{ $data->Married }}</td>
                        <td>{{ $data->Divorced }}</td>
                        <td>{{ $data->NotMarried }}</td>
                        <td>{{ $data->Deaths }}</td>
                        <td>{{ $data->RecentBirths }}</td>
                        <td>{{ $data->BelowFiveYears }}</td>
                        <td>{{ $data->BelowEighteenYears }}</td>
                        <td>{{ $data->BelowThirtyFiveYears }}</td>
                        <td>{{ $data->BelowFortyFiveYears }}</td>
                        <td>{{ $data->AboveFortyFiveYears }}</td>



                    </tr>
                @endforeach @endisset
            </tbody>
        </table>
    </div>


    @include('Survey.NewSurvey')
