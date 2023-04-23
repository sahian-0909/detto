@extends('layouts.admin')
@section('contenido')
    <div class="container">
        <title>Actualizar Registro</title>
        <h1>Actualizar un Registro</h1><br>
        <form action="{{ url('almacen/actualizar/'. $almacen->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row">
                <input type="hidden" id="id_empleado" name="id_empleado" value="2">
                <input type="hidden" id="id_autorizacion" name="id_autorizacion" value="2">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <input class="form-control" list="datalistClientes" name="id_cliente" id="id_cliente" placeholder="-- Selecciona un Cliente --">
                    <datalist id="datalistClientes">
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $clientes)
                        <option value="{{$clientes->id_cliente}}"> {{$clientes->nombre_compania}}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="comentarios" class="form-label">Comentarios</label>
                    <input type="text" class="form-control" name="comentarios" id="comentarios" value="{{ $almacen->comentarios }}">
                </div>
            </div>
            <div class="row my-1" id="info_cliente"></div>
            <div class="row my-1">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="dia_salida" class="form-label">Dia salida</label>
                    <input type="date" class="form-control" name="dia_salida" id="dia_salida" value="{{ $almacen->dia_salida }}">
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="dia_entrada" class="form-label">Dia entrada</label>
                    <input type="date" class="form-control" name="dia_entrada" id="dia_entrada" value="{{ $almacen->dia_entrada }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <input type="submit" value="Guardar Datos" class="btn btn-success">
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <input type="reset" value="Cancelar Registro" class="btn btn-danger">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#id_cliente").change(function () {
            var cliente = $("#id_cliente").val();
            //alert(materia);
            if (cliente == 0) {
                $("#info_cliente").empty();
            } else {
                $("#info_cliente").load("{{ route('info_cliente') }}?id_cliente=" + cliente).css({"border": "2px solid #9B3030", "padding": "10px", "border-radius": "25px"});
            }
        });    
        });
    </script>
@endsection
