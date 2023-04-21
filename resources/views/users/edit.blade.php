@extends('layouts.admin')
@section('titulo', 'Empleados')
@section('contenido')
<form action="{{route('users.update', $user)}}" method="post"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="username" class="form-label">Nombre de usuario* </label>
            <input type="text" value="{{ old('username', $user->username) }}" class="form-control" name="username" id="username">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="name" class="form-label">Nombre(s) del empleado * </label>
            <input type="text" value="{{ old('name', $user->name) }}" class="form-control" name="name" id="name">
        </div>
    </div>
    @if ($errors->has('username'))
        <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
    @endif
    @if ($errors->has('name'))
        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
    @endif
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="app" class="form-label">Apellido Paterno *</label>
            <input value="{{ old('app', $user->app) }}" type="text" class="form-control" name="app" id="app">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="apm" class="form-label">Apellido Materno </label>
            <input value="{{ old('apm', $user->apm) }}" type="text" class="form-control" name="apm" id="apm">
        </div>
    </div>
    @if ($errors->has('app'))
        <span class="error text-danger" for="input-app">{{ $errors->first('app') }}</span>
    @endif
    @if ($errors->has('apm'))
        <span class="error text-danger" for="input-apm">{{ $errors->first('apm') }}</span>
    @endif
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="email" class="form-label">Correo electrónico*</label>
            <input value="{{ old('email', $user->email) }}" type="email" class="form-control" value="{{ old('email', $user->email) }}" name="email" id="email">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="password" class="form-label">Contraseña* </label>
            <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla">
        </div>
    </div>
    @if ($errors->has('email'))
        <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
    @endif
    @if ($errors->has('password'))
        <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
    @endif
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="telefono" class="form-label">*Teléfono</label>
            <input value="{{ old('telefono', $user->telefono) }} "type="tel" class="form-control" name="telefono" id="telefono">
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            
    </div>
    @if ($errors->has('telefono'))
        <span class="error text-danger" for="input-telefono">{{ $errors->first('telefono') }}</span>
    @endif
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
                                                        <input class="form-check-input" type="checkbox"
                                                            name="roles[]"
                                                            value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}
                                                        >
                                                        <span class="form-check-sign">
                                                            <span class="check" value=""></span>
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
            @if ($errors->has('roles'))
        <span class="error text-danger" for="input-roles">{{ $errors->first('roles') }}</span>
    @endif
    <hr>
    <div class="row">
    <div class="col-2">
            
            </div>
        <div class="col-8">
            <input type="submit" value="Actualizar Datos" class="btn btn-success col-8">
        </div>
        <div class="col-2">
            
        </div>
    </div>
</form>
@endsection