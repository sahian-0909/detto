<br>
@foreach ($prendas as $prenda)
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <label>Prenda: </label>
        <input type="text" class="form-control" id="prenda" value="{{$prenda->descripcion}}, Talla: {{$prenda->talla}}, Color: {{$prenda->color}}, Sexo: {{$prenda->sexo}}">
    </div>
</div>
<div class="row">
    <table>
        <tr>
            <td align="center">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <img src="{{asset('imagenes/'.$prenda->imagen)}}" height="200px" alt="" style="border: 2px solid #9B3030">
                </div>
            </td>
            <td>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>Precio: </label>
                    <input type="number" class="form-control" id="precio" value="{{$prenda->precio}}">
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>% Descuento: </label>
                    <input type="number" class="form-control" id="porcentaje" value="0">
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>Cantidad: </label>
                    <input type="number" class="form-control" id="cantidad" value="0">
                </div>    
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <label>Importe: </label>
                    <input type="text" class="form-control" id="importe" value="0" readonly>
                    <input type="hidden" class="form-control" id="descuento" value="0" readonly>
                </div>
            </td>
        </tr>
    </table>    
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <label>Comentarios: </label>
        <textarea name="comentariosPrenda" id="comentariosPrenda" cols="30" rows="2" class="form-control"></textarea>
    </div>
</div>
@endforeach
<script type="text/javascript">
    $(document).ready(function () {
        $('#cantidad').keyup(function () {
            var precio = $('#precio').val(); //obtiene el costo del producto
            var cantidad = $('#cantidad').val(); //obtiene la cantidad
            var porcentaje = $('#porcentaje').val();
            //var bordados = $("#bordados").val();
            //var extras = ((bordados * 25));
            //var costo = parseFloat(precio) + parseFloat(extras)
            var subimporte = precio * cantidad;
            var descuento = (subimporte * porcentaje)/100;
            var importe = subimporte - descuento;
            //$("#costo_unitario").val(costo);
            $("#descuento").val(descuento);
            $("#importe").val(importe);
        });
    });

</script>
