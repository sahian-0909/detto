@extends('layouts.admin')
@section('contenido')
    <div class="container">
        <title>Actualizar Registro</title>
        <h1>Actualizar un Registro</h1><br>
        <form action="{{ url('almacen/entregar/'. $almacen->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="id_empleado" class="form-label">Empleado</label>
                    <input type="text" class="form-control" name="id_empleado" id="id_empleado" value="{{ $almacen->id_empleado }}" readonly>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="id_autorizacion" class="form-label">Autorizacion</label>
                    <input type="text" class="form-control" name="id_autorizacion" id="id_autorizacion" value="{{ $almacen->id_autorizacion }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <input class="form-control" list="datalistClientes" name="id_cliente" id="id_cliente" placeholder="-- Selecciona un Cliente --" value="{{ $almacen->id_cliente }}" readonly>
                    <datalist id="datalistClientes">
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $clientes)
                        <option value="{{$clientes->id_cliente}}"> {{$clientes->nombre_compania}}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="comentarios" class="form-label">Comentarios</label>
                    <input type="text" class="form-control" name="comentarios" id="comentarios" value="{{ $almacen->comentarios }}" readonly>
                </div>
            </div>
            <div class="row my-1" id="info_cliente"></div>
            <div class="row my-1">
            <br>
            <div class="row-1">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="dia_entrada" class="form-label">Dia entrada</label>
                    <input type="date" class="form-control" name="dia_salida" id="dia_salida" value="{{ $almacen->dia_salida }}" readonly>
                </div>
                <br>
            </div>
            <br>
            <div class="row-1">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <select class="form-select" aria-label="entregado" name="entregado" id="entregado" >
                        <option value="">Entregado</option>
                        <option value="0">No entregado</option>
                        <option value="1">Entregado</option>
                    </select>
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
