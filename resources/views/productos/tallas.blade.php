@extends('layouts.admin')
@section('titulo', 'Prendas')
@section('contenido')
<div class="row my-1">
    <div class="col-12">
        <h3 class="fs-4 mb-3">Asignación de tallas</h3>
    </div>
    <hr>
</div>
<form action="{{ url('productos/salvarTalla') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="" class="form-label">Selecciona una Prenda</label>
            <select name="id_prenda" id="" class="form-select">
                @foreach ($producto as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="codigo" class="form-label">Talla:</label>
            <input type="text" class="form-control" name="talla" id="talla">
        </div>
    </div>
    <br>
    <input class="btn btn-success" type="submit" value="Agregar">
</form>

@endsection
