@isset($Counties)
    @foreach ($Counties as $data)
        {{ UpdateModalHeader($Title = 'Update the selected record', $ModalID = $data->id) }}
        <form action="{{ route('MassUpdate') }}" class=""
            method="POST">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="counties">

                <div class="mt-3  mb-3 col-md-12  ">
                    <label id="label" for="" class=" required form-label">Select
                        District
                        Where the County Belongs</label>
                    <select required name="DID" class="form-select  "
                        data-control="select2" data-placeholder="Select an option">
                        <option value="{{ $data->DID }}">
                            {{ $data->DistrictName }}</option>
                        @isset($Counties)
                            @foreach ($Counties as $dis)
                                <option value="{{ $dis->DID }}">
                                    {{ $dis->DistrictName }}</option>
                            @endforeach
                        @endisset

                    </select>

                </div>



                {{ RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'counties') }}
            </div>


            {{ UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
