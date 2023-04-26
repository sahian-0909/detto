<br>
@foreach ($prendas as $prenda)
<div class="row">
    <div class="row">
        <div >
            <center>
            <img src="{{ asset('imagenes/productoDetto.jpg') }}" alt="Imagen" width="100px" height="100px">
            </center>
        </div>
    </div>
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Talla: </label>
        <select class="form-select mb-3" aria-label="talla" name="talla" id="talla">
            <option value="0">Selecciona una talla:</option>
            @foreach ($tallas as $talla)
                <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Nombre: </label>
        <input type="text" class="form-control" id="producto" value="{{$prenda->producto}}" readonly>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Descripcion: </label>
        <input type="text" class="form-control" id="descripcion" value="{{$prenda->descripcion}}" readonly>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Color: </label>
        <input type="text" class="form-control" id="color" value="{{$prenda->color}}" readonly>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Codigo: </label>
        <input type="text" class="form-control" id="codigo" value="{{$prenda->codigo}}" readonly>
    </div>
</div>    

@endforeach
<script type="text/javascript">
    $(document).ready(function () {
        var tip_salida = $('#tip_entrega').val();
        $('#cantidad').keyup(function () {
            var comentario = $('#comentario').val();
        });
        if(tip_salida == "Muestra"){
            $('#talla').prop("disabled", true);
            $('#talla').val("Pieza");
        }else{
            $('#talla').prop("disabled", false);
        }
        
    });

</script>
