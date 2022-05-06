<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Manage all the parishes that will be analyzed', $Msg = null) !!} </div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Parish', $Icon = 'fa-plus') }}
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Parish </th>
                <th>Sub County </th>
                <th>County </th>
                <th>District</th>

                <th class="bg-dark text-light">Update </th>
                <th class="bg-danger text-light">Delete </th>
            </tr>
        </thead>
        <tbody class="">
            @isset($Parishes)
                @foreach ($Parishes as $data)
                    <tr>
                        <td>{{ $data->ParishName }}</td>
                        <td>{{ $data->SubCountyName }}</td>
                        <td>{{ $data->CountyName }}</td>
                        <td>{{ $data->DistrictName }}</td>


                        <td>

                            <a data-bs-toggle="modal"
                                class="btn shadow-lg btn-warning btn-sm admin"
                                href="#Update{{ $data->id }}">

                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>

                            {!! ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'parishes']),
        'label' => '<i class="fas fa-trash"></i>',
        'class' => 'btn btn-danger btn-sm deleteConfirm admin',
    ],
) !!}

                        </td>
                    </tr>
                @endforeach @endisset
            </tbody>
        </table>
    </div>

    @include('Parishes.NewParish')
    @include('Parishes.UpdateParishes')
