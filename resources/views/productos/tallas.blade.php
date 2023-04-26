@extends('layouts.admin')
@section('contenido')
    <div class="container">
        <title>Agregar Producto</title>
        <h1>Agregar un Producto</h1><br>
        <form action="{{ url('productos/salvarTalla') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" id="id_prenda" name="id_prenda" value="{{ $producto->id }}">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="codigo" class="form-label">Talla:</label>
                    <input type="text" class="form-control" name="talla" id="talla">
                </div>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
    </div>
@endsection
