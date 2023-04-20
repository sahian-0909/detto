@extends('layouts.admin')
@section('titulo', 'Rutas de visitas')
@section('contenido')
<form action="{{url('rutas/registrar')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="nombreRuta" class="form-label">Nombre de la Ruta (opcional)</label>
            <input type="text" class="form-control" name="nombreRuta" id="nombreRuta">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="origenRuta" class="form-label">Lugar de Origen*</label>
            <input type="text" class="form-control" name="origenRuta" id="origenRuta">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="domOrigen" class="form-label">Domicilio de Origen*</label>
            <input type="text" class="form-control" name="domOrigen" id="domOrigen">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="destinoRuta" class="form-label">Lugar de Destino*</label>
            <input type="text" class="form-control" name="destinoRuta" id="destinoRuta">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="domDest" class="form-label">Domicilio de Destino*</label>
            <input type="text" class="form-control" name="domDest" id="domDest">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="kmRuta" class="form-label">Kilometraje Aproximado*</label>
            <input type="number" class="form-control" name="kmRuta" id="kmRuta" step="2">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <input type="submit" value="Guardar Datos" class="btn btn-success">
        </div>
        <div class="col-4">
            <input type="reset" value="Cancelar Registro" class="btn btn-danger">
        </div>
    </div>
</form>
@endsection