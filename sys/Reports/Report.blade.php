@include('Reports.Stats')

<div class="card-body pt-3 bg-light shadow-lg table-responsive">

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
            @isset($Census)
                @foreach ($Census as $data)
                    <tr>
                        {{-- <td>{{ $data->TotalSubmittedBy }}</td> --}}
                        <td>{{ $data->TotalFemales }}</td>
                        <td>{{ $data->TotalMales }}</td>
                        <td>{{ $data->TotalPrimarySchoolEduction }}</td>
                        <td>{{ $data->TotalHighSchoolEduction }}</td>
                        <td>{{ $data->TotalTertiaryEducation }}</td>
                        <td>{{ $data->TotalChristian }}</td>
                        <td>{{ $data->TotalMoslem }}</td>
                        <td>{{ $data->TotalIndigenousReligion }}</td>
                        <td>{{ $data->TotalUnEmployed }}</td>
                        <td>{{ $data->TotalEmployed }}</td>
                        <td>{{ $data->TotalMarried }}</td>
                        <td>{{ $data->TotalDivorced }}</td>
                        <td>{{ $data->TotalNotMarried }}</td>
                        <td>{{ $data->TotalDeaths }}</td>
                        <td>{{ $data->TotalRecentBirths }}</td>
                        <td>{{ $data->TotalBelowFiveYears }}</td>
                        <td>{{ $data->TotalBelowEighteenYears }}</td>
                        <td>{{ $data->TotalBelowThirtyFiveYears }}</td>
                        <td>{{ $data->TotalBelowFortyFiveYears }}</td>
                        <td>{{ $data->TotalAboveFortyFiveYears }}</td>



                    </tr>
                @endforeach @endisset
            </tbody>
        </table>
    </div>
