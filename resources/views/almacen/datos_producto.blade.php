
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label for="">Prenda</label>
        <select class="form-select mb-3" aria-label="id_prenda" name="id_prenda" id="id_prenda">
            <option value="0">Selecciona una prenda:</option>
            @foreach ($prendas as $prenda)
                <option value="{{ $prenda->id }}">{{ $prenda->producto }}, T:{{$prenda->talla}}</option>
            @endforeach
        </select>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#id_prenda").change(function() {
            var id_prenda = $("#id_prenda").val();
            //alert(materia);
            if (id_prenda == 0) {
                $("#info_prenda").empty();
            } else {
                $("#info_prenda").load("{{ route('infoprenda') }}?id_prenda=" + id_prenda).css({"border": "2px solid #9B3030", "padding": "10px", "border-radius": "25px"});
            }
        });
    });
</script>
