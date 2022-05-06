@isset($Villages)
    @foreach ($Villages as $data)
        {{ UpdateModalHeader($Title = 'Update the selected record', $ModalID = $data->id) }}
        <form action="{{ route('MassUpdate') }}" method="POST">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="villages">

                <div class="mt-3  mb-3 col-md-12  ">
                    <label id="label" for="" class=" required form-label">Select
                        the Parish
                        Where the Village Belongs</label>
                    <select required name="PID" class="form-select  "
                        data-control="select2" data-placeholder="Select an option">
                        <option value="{{ $data->PID }}">
                            {{ $data->ParishName }}</option>

                        @isset($Parishes)
                            @foreach ($Parishes as $c)
                                <option value="{{ $c->PID }}">
                                    {{ $c->ParishName }}</option>
                            @endforeach
                        @endisset

                    </select>

                </div>


                {{ RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'villages') }}
            </div>


            {{ UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
