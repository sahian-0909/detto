@extends('layouts.admin')
@section('titulo', 'Detalles del Viatico')
@section('contenido')

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="cliente_id" class="form-label">Cliente</label>
                @foreach($clientes as $user)
                @if($user->id_cliente === $viatico->cliente_id)
                <input value="{{ old('nombre_compania', $user->nombre_compania) }}" type="text"  class="form-control" name="nombre_compania" id="nombre_compania" disabled>
                @endif
                @endforeach
            </select>
        </div>
        @if ($errors->has('cliente_id'))
            <span class="error text-danger" for="input-cliente_id">{{ $errors->first('cliente_id') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="cliente_id" class="form-label">Empleado</label>
                <input value="{{ old('name', $viatico->user->name) }}" type="text"  class="form-control" name="user" id="name" disabled>
            </select>
        </div>
        @if ($errors->has('cliente_id'))
            <span class="error text-danger" for="input-cliente_id">{{ $errors->first('cliente_id') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="km" class="form-label">Kilometros que recorrio</label>
            <input value="{{ old('km', $viatico->km) }}" type="text" class="form-control" name="km" id="km" disabled>
            @if ($errors->has('km'))
                <span class="error text-danger" for="input-km">{{ $errors->first('km') }}</span>
            @endif
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="costo" class="form-label">Total</label>
            <input type="text" value="$ {{$viatico->total}}" class="form-control" name="costo" id="costo" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="km" class="form-label">Fecha</label>
            <input value="{{\Carbon\Carbon::parse($viatico->fecha)->format('d M y')}}" type="text" class="form-control" name="km" id="km"disabled>
            @if ($errors->has('km'))
                <span class="error text-danger" for="input-km">{{ $errors->first('km') }}</span>
            @endif
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="costo" class="form-label">Costo del kilometraje</label>
            @foreach ($kilometrajes as $kilometraje)
            <input type="text" value="$ {{$kilometraje->costo}}" class="form-control" name="costo" id="costo" disabled>
            @endforeach
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="comentarios" class="form-label">Comentarios </label>
            <input value="{{ old('comentarios', $viatico->comentarios) }}" class="form-control" name="comentarios" disabled></input>
        </div>
        @if ($errors->has('comentarios'))
                <span class="error text-danger" for="input-comentarios">{{ $errors->first('comentarios') }}</span>
            @endif
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        </div>
    </div>
    
@endsection