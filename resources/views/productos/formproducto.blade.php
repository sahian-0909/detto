@extends('layouts.admin')
@section('contenido')
    <div class="container">
        <title>Agregar Producto</title>
        <h1>Agregar un Producto</h1><br>
        <form action="{{ url('productos/salvarProducto') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="codigo" id="codigo">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="producto" class="form-label">Producto</label>
                    <input type="text" class="form-control" name="producto" id="producto">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="unidad" class="form-label">Unidad</label>
                    <input type="text" class="form-control" name="unidad" id="unidad">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="materiales" class="form-label">Materiales</label>
                    <input type="text" class="form-control" name="materiales" id="materiales">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="materiales" class="form-label">Categoria:</label>
                    <select class="form-select mb-3" aria-label="id_categoria" name="id_categoria" id="id_categoria">
                        <option value="0">Selecciona una categoria:</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="sexo" class="form-label">Sexo</label>
                    <input type="text" class="form-control" name="sexo" id="sexo">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" name="color" id="color">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
    </div>
@endsection
