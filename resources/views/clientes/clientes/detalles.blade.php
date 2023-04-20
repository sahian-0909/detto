@extends('layouts.admin')
@section('titulo', 'Clientes')
@section('contenido')
<form action="{{url('clientes/actualizar/'.$cliente->id_cliente)}}" method="post">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="nombreComp" class="form-label">Nombre de la compañía</label>
            <input type="text" class="form-control" name="nombreComp" id="nombreComp" value="{{ $cliente->nombre_compania }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="rsComp" class="form-label">Razón social</label>
            <input type="text" class="form-control" name="rsComp" id="rsComp" value="{{ $cliente->razon_social }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="nombreCont" class="form-label">Nombre del contacto* </label>
            <input type="text" class="form-control" name="nombreCont" id="nombreCont" value="{{ $cliente->nombre_contacto }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="ceoCont" class="form-label">Puesto del contacto* </label>
            <input type="text" class="form-control" name="ceoCont" id="ceoCont" value="{{ $cliente->puesto_contacto }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="emailComp" class="form-label">Correo de la compañía</label>
            <input type="email" class="form-control" name="emailComp" id="emailComp" value="{{ $cliente->correo_compania }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="emailCont" class="form-label">Correo del contacto* </label>
            <input type="email" class="form-control" name="emailCont" id="emailCont" value="{{ $cliente->correo_contacto }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telComp" class="form-label">No. Teléfono de la compañía</label>
            <input type="tel" class="form-control" name="telComp" id="telComp" value="{{ $cliente->telefono_compania }}">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telCont" class="form-label">No. Teléfono del contacto* </label>
            <input type="tel" class="form-control" name="telCont" id="telCont" value="{{ $cliente->telefono_contacto }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="domComp" class="form-label">Domicilio del cliente* </label>
            <textarea id="my-domComp" class="form-control" name="domComp" rows="2">{{ $cliente->domicilio_compania }}</textarea>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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