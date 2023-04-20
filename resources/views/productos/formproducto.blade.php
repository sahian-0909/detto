@extends('layouts.admin')
@section('contenido')
<div class="container">
    <title>Agregar Producto</title>    
        <h1>Agregar un Producto</h1><br>
        <form action="{{url('productos/salvarProducto')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Codigo:</span>
                <input type="text" class="form-control" placeholder="codigo" aria-label="codigo"
                aria-describedby="basic-addon1" name="codigo"  id="codigo">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Producto:</span>
                <input type="text" class="form-control" placeholder="producto" aria-label="producto"
                aria-describedby="basic-addon1" name="producto"  id="producto">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Descripcion:</span>
                <input type="text" class="form-control" placeholder="descripcion" aria-label="descripcion"
                aria-describedby="basic-addon1" name="descripcion"  id="descripcion">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Unidad:</span>
                <input type="text" class="form-control" placeholder="unidad" aria-label="unidad"
                aria-describedby="basic-addon1" name="unidad"  id="unidad">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Materiales:</span>
                <input type="text" class="form-control" placeholder="materiales" aria-label="materiales"
                aria-describedby="basic-addon1" name="materiales"  id="materiales">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Talla:</span>
                <input type="text" class="form-control" placeholder="talla" aria-label="talla"
                aria-describedby="basic-addon1" name="talla"  id="talla">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Precio:</span>
                <input type="text" class="form-control" placeholder="precio" aria-label="precio"
                aria-describedby="basic-addon1" name="precio"  id="precio">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Sexo:</span>
                <input type="text" class="form-control" placeholder="sexo" aria-label="sexo"
                aria-describedby="basic-addon1" name="sexo"  id="sexo">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Color:</span>
                <input type="text" class="form-control" placeholder="color" aria-label="color"
                aria-describedby="basic-addon1" name="color"  id="color" >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Imagen:</span>
                <input type="file" class="form-control" name="imagen"  id="imagen">
            </div>
            <div class="input-group mb-3">
                <select class="form-select mb-3" aria-label="id_categoria" name="id_categoria" id="id_categoria">
                    <option value="0">Selecciona una categoria:</option>
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
</div>
@endsection