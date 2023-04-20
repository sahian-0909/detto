@extends('layouts.admin')
@section('titulo', 'Empleados')
@section('contenido')
<form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="username" class="form-label">Nombre de usuario* </label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="name" class="form-label">Nombre(s) del empleado * </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="app" class="form-label">Apellido Paterno *</label>
            <input type="text" class="form-control" name="app" id="app">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="apm" class="form-label">Apellido Materno </label>
            <input type="text" class="form-control" name="apm" id="apm">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="email" class="form-label">Correo electrónico*</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="password" class="form-label">Contraseña* </label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telefono" class="form-label">*Teléfono</label>
            <input type="tel" class="form-control" name="telefono" id="telefono">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="sexo" class="form-label">Sexo:</label>
            <br>
            <input type="radio" name="sexo" value="FEMENINO" />
            <label>Femenino</label>
            <input type="radio" name="sexo" value="MASCULINO" />
            <label>Masculino</label>
        </div>
    </div>
    <div class="row">
                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table">
                                    <tbody>
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                            value="{{ $id }}"
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $role }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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