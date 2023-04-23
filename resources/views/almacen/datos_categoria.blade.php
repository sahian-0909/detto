<br>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <select class="form-select mb-3" aria-label="id_categoria" name="id_categoria" id="id_categoria">
            <option value="0">Selecciona una categoria:</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row my-1" id="info_producto">
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_categoria").change(function() {
            var id_categoria = $("#id_categoria").val();
            //alert(materia);
            if (id_categoria == 0) {
                $("#info_producto").empty();
            } else {
                $("#info_producto").load("{{ route('info_producto') }}?id_categoria=" + id_categoria);
            }
        });
    });
</script>
