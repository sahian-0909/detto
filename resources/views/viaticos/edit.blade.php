@extends('layouts.admin')
@section('titulo', 'Viaticos')
@section('contenido')
<form action="{{route('viaticos.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="cliente_id" class="form-label">Cliente</label>
                <input type="text"  class="form-control" name="nombre_compania" id="nombre_compania" disabled>
            </select>
        </div>
        @if ($errors->has('cliente_id'))
            <span class="error text-danger" for="input-cliente_id">{{ $errors->first('cliente_id') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="km" class="form-label">Kilometros a recorrer</label>
            <input value="{{ old('km', $viatico->km) }}" type="text" class="form-control" name="km" id="km">
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
            <input value="{{ old('comentarios', $viatico->comentarios) }}" class="form-control" name="comentarios"></input>
        </div>
        @if ($errors->has('comentarios'))
                <span class="error text-danger" for="input-comentarios">{{ $errors->first('comentarios') }}</span>
            @endif
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="img" class="form-label">Compruebe el KM con una imagen </label>
            <input type="file" name="img" id="" class="form-control">
            @if ($errors->has('img'))
                <span class="error text-danger" for="input-img">{{ $errors->first('img') }}</span>
            @endif
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        </div>
    </div>
    <div class="row">
    <div class="col-2">
            
            </div>
        <div class="col-8">
            <input type="submit" value="Guardar Datos" class="btn btn-success col-8">
        </div>
        <div class="col-2">
            
        </div>
    </div>
</form>
@endsection
