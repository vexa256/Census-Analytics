@isset($SubCounties)
    @foreach ($SubCounties as $data)
        {{ UpdateModalHeader($Title = 'Update the selected record', $ModalID = $data->id) }}
        <form action="{{ route('MassUpdate') }}" class=""
            method="POST">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="sub_counties">

                <div class="mt-3  mb-3 col-md-12  ">
                    <label id="label" for="" class=" required form-label">Select
                        County
                        Where the Sub-County Belongs</label>
                    <select required name="CID" class="form-select  "
                        data-control="select2" data-placeholder="Select an option">
                        <option value="{{ $data->CID }}">
                            {{ $data->CountyName }}</option>

                        @isset($Counties)
                            @foreach ($Counties as $c)
                                <option value="{{ $c->CID }}">
                                    {{ $c->CountyName }}</option>
                            @endforeach
                        @endisset

                    </select>

                </div>


                {{ RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'sub_counties') }}
            </div>


            {{ UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
