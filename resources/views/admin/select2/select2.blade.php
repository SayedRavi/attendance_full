<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/select2/materialize_select2.min.js')}}"></script>
<script>
    $('.select2').select2({
        dropdownAutoWidth: true,
        width: '100%',
        allowClear: true,
        dropdownParent: $('#asset_modal')
    });
    $('.select2-selection__rendered').click(function(){
        setTimeout(()=>{
            $('.select2-search__field').addClass('browser-default');
        },100)
    });
</script>
