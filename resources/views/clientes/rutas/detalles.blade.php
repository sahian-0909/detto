@extends('layouts.admin')
@section('titulo', 'Rutas de visitas')
@section('contenido')
<form action="{{url('rutas/actualizar/'.$ruta->id_ruta)}}" method="post">
    @csrf
    @method('put')
    <div class="row">
        <h3 class="fs-4 mb-3">Detalles de ruta: {{ $ruta->id_ruta }} - {{ $ruta->nombre_ruta }}</h3>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="nombreRuta" class="form-label">Nombre de la Ruta (opcional)</label>
            <input type="text" class="form-control" name="nombreRuta" id="nombreRuta" value="{{ $ruta->nombre_ruta }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="origenRuta" class="form-label">Lugar de Origen*</label>
            <input type="text" class="form-control" name="origenRuta" id="origenRuta" value="{{ $ruta->lugar_origen }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="domOrigen" class="form-label">Domicilio de Origen*</label>
            <input type="text" class="form-control" name="domOrigen" id="domOrigen" value="{{ $ruta->direccion_origen }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="destinoRuta" class="form-label">Lugar de Destino*</label>
            <input type="text" class="form-control" name="destinoRuta" id="destinoRuta" value="{{ $ruta->lugar_destino }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="domDest" class="form-label">Domicilio de Destino*</label>
            <input type="text" class="form-control" name="domDest" id="domDest" value="{{ $ruta->direccion_destino }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="kmRuta" class="form-label">Kilometraje Aproximado*</label>
            <input type="number" class="form-control" name="kmRuta" id="kmRuta" step="2" value="{{ $ruta->kilometraje }}">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <input type="submit" value="Actualizar" class="btn btn-success">
        </div>
        <div class="col-4">
            <a href="{{url('rutas/')}}" class="btn btn-warning">Regresar</a>
        </div>
    </div>
</form>
@endsection