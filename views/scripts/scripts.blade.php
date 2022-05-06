<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script defer
src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}">
</script>
<script defer
src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}">
</script>
<script defer src="{{ asset('assets/editor/summernote-lite.min.js') }}">
</script>
<script defer src="{{ asset('js/custom.js') }}"></script>
@include('not.not')
@isset($chart)
    <script src="{{ asset('js/Chart.js') }}" charset=" utf-8"></script>
    {!! $chart->script() !!}
@endisset
</body>

</html>
