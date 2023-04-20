@extends('layouts.admin')
@section('titulo', 'Clientes')
@section('contenido')
<form action="{{url('clientes/registrar')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="nombre_compania" class="form-label">Nombre de la compañía</label>
            <input type="text" class="form-control" name="nombre_compania" id="nombre_compania">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="razon_social" class="form-label">Razón social</label>
            <input type="text" class="form-control" name="razon_social" id="razon_social">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="nombre_contacto" class="form-label">Nombre del contacto* </label>
            <input type="text" class="form-control" name="nombre_contacto" id="nombre_contacto">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="puesto_contacto" class="form-label">Puesto del contacto* </label>
            <input type="text" class="form-control" name="puesto_contacto" id="puesto_contacto">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="correo_compania" class="form-label">Correo de la compañía</label>
            <input type="email" class="form-control" name="correo_compania" id="correo_compania">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="correo_contacto" class="form-label">Correo del contacto* </label>
            <input type="email" class="form-control" name="correo_contacto" id="correo_contacto">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telefono_compania" class="form-label">No. Teléfono de la compañía</label>
            <input type="tel" class="form-control" name="telefono_compania" id="telefono_compania">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telefono_contacto" class="form-label">No. Teléfono del contacto* </label>
            <input type="tel" class="form-control" name="telefono_contacto" id="telefono_contacto">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="domicilio_compania" class="form-label">Domicilio del cliente* </label>
            <textarea id="my-domComp" class="form-control" name="domicilio_compania" rows="2"></textarea>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="fotoCliente" class="form-label">Foto del Cliente </label>
            <input type="file" name="fotoCliente" id="" class="form-control">
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