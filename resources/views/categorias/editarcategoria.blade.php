@extends('layouts.admin')
@section('contenido')
<div class="container">
    <title>Agregar Categoria</title>
    <center>
        <h1>Agregar una Categoria</h1><br>
        <form action="{{route('actualizarCategoria',['id'=> $categoria->id])}}" method="POST">
            {{ csrf_field() }}
            {{@method_field('PUT')}}
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Agregar Categoria:</span>
                <input type="text" class="form-control" placeholder="categoria" aria-label="categoria"
                aria-describedby="basic-addon1" name="categoria"  id="categoria" value="{{ $categoria->categoria }}">
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Actualizar">
        </form>
    </center>
</div>
@endsection