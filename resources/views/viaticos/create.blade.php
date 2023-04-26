@extends('layouts.admin')
@section('titulo', 'Viaticos')
@section('contenido')
<form action="{{route('viaticos.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="cliente_id" class="form-label">Cliente que visitará</label>
            <select class="form-select" name="cliente_id" id="cliente_id">
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->id_cliente}}">{{$cliente->nombre_compania}}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('cliente_id'))
            <span class="error text-danger" for="input-cliente_id">{{ $errors->first('cliente_id') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <label for="km" class="form-label">Kilometros a recorrer</label>
            <input type="text" class="form-control" name="km" id="km">
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
    
    <div class="row mb-4">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <label for="comentarios" class="form-label">Comentarios </label>
            <textarea id="my-domComp" class="form-control" name="comentarios" rows="2"></textarea>
        </div>
        @if ($errors->has('comentarios'))
                <span class="error text-danger" for="input-comentarios">{{ $errors->first('comentarios') }}</span>
            @endif
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
