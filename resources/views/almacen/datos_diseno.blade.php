<br>
<input type="hidden" class="form-control" id="id_prenda" value="9999">
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <select class="form-select" aria-label="tip_entrega" name="tip_entrega" id="tip_entrega">
            <option value="">Selecciona el tipo de entrega:</option>
            <option value="Muestra">Muestra</option>
            <option value="Corrida">Corrida</option>
        </select>
    </div>
</div>
<br>
<div class="row my-1" id="info_entrega"></div>
<div class="row my-1" id="info_entrega2"></div>
<script>
    $(document).ready(function() {
            $("#tip_entrega").change(function() {
                var tip_entrega = $("#tip_entrega").val();
                //alert(materia);
                if (tip_entrega == "Muestra") {
                    $("#info_entrega").empty();
                    $("#info_entrega2").load("{{ route('info_entrega2')}}");
                } else {
                    $("#info_entrega2").empty();
                    $("#info_entrega").load("{{ route('info_entrega')}}");
                }
            });
        });
</script>