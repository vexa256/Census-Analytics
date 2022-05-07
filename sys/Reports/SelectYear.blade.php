<!--begin::Card body-->
<div class="card-body pt-3 bg-light table-responsive">
</div>
<div class="card-body shadow-lg pt-3 bg-light table-responsive">
    <div class="rowssss">
        <form action="{{ route('AcceptYearSelect') }}" method="POST">
            <div class="row">

                @csrf


                <div class="mb-3 col  py-5   my-5">
                    <label id="label" for=""
                        class="px-5   my-5 required form-label">Select
                        Year</label>
                    <select required name="Year"
                        class="form-select  py-5   my-5 form-select-solid"
                        data-control="select2"
                        data-placeholder="Select an option">
                        <option></option>
                        @isset($Years)

                            @foreach ($Years->unique('Year') as $data)
                                <option value="{{ $data->Year }}">
                                    {{ $data->Year }}
                                </option>
                            @endforeach
                        @endisset

                    </select>

                </div>
            </div>
            <div class="float-end my-3">
                <button class="btn btn-danger shadow-lg" type="submit">
                    Next
                </button>

            </div>

        </form>

    </div>


</div>
