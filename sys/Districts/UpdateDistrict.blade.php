@isset($Districts)
    @foreach ($Districts as $data)
        {{ UpdateModalHeader($Title = 'Update the selected record', $ModalID = $data->id) }}
        <form action="{{ route('MassUpdate') }}" class=""
            method="POST">
            @csrf

            <div class="row">
                <input type="hidden" name="id" value="{{ $data->id }}">

                <input type="hidden" name="TableName" value="districts">




                {{ RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'districts') }}
            </div>


            {{ UpdateModalFooter() }}

        </form>
    @endforeach
@endisset
