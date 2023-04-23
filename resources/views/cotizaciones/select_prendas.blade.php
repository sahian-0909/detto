<select name="" id="PidPrenda" class="form-select">
    <option value="">Selecciona una prenda</option>
    @foreach ($prendas as $prendas)
    <option value="{{$prendas->id}}"> {{$prendas->producto}}</option>
    @endforeach
</select>
<script type="text/javascript">
    $(document).ready(function () {
        $("#PidPrenda").change(function () {
            var prenda = $("#PidPrenda").val();            
            //alert(materia);
            if (prenda == 0) {
                $("#info_prenda").empty();
            } else {
                $("#info_prenda").load("{{ route('info_prenda') }}?id_prenda=" + prenda).css({"border": "2px solid #9B3030", "padding": "10px", "border-radius": "25px"});
            }
        });
    });

</script>