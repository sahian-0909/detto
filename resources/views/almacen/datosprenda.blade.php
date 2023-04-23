<br>
@foreach ($prendas as $prenda)
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Nombre: </label>
        <input type="text" class="form-control" id="producto" value="{{$prenda->producto}}" readonly>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Imagen: </label>
        <input type="file" class="form-control" id="imagen_prenda" >
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <label>Descripcion: </label>
        <input type="text" class="form-control" id="descripcion" value="{{$prenda->descripcion}}" readonly>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-8 col-xs-12">
        <label>Color: </label>
        <input type="text" class="form-control" id="color" value="{{$prenda->color}}" readonly>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-8 col-xs-12">
        <label>Codigo: </label>
        <input type="text" class="form-control" id="codigo" value="{{$prenda->codigo}}" readonly>
    </div>
</div>    

@endforeach
<script type="text/javascript">
    $(document).ready(function () {
        $('#cantidad').keyup(function () {
            var comentario = $('#comentario').val();
        });
    });

</script>
