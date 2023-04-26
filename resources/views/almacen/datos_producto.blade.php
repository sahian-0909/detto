<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <select class="form-select mb-3" aria-label="id_prenda" name="id_prenda" id="id_prenda">
            <option value="0">Selecciona un producto:</option>
            @foreach ($prendas as $prenda)
                <option value="{{ $prenda->id }}">{{ $prenda->producto }}</option>
            @endforeach
        </select>
    </div>
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
