@extends('layouts.admin')
@section('titulo', 'Kilometraje')
@section('contenido')
<form action="{{url('kilometrajes/'. $kilometraje->id)}}" method="POST">
    {{ csrf_field() }}
    {{@method_field('PUT')}}
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label for="costo" class="form-label">Precio de kilometraje</label>
            <input type="text" value="{{$kilometraje->costo}}" class="form-control" name="costo" id="costo">
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            @if ($errors->has('costo'))
                <span class="error text-danger" for="input-costo">{{ $errors->first('costo') }}</span>
            @endif
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        </div>
    </div>
    <br>
    <div class="row">
    <div class="col-4">
        </div>
        <div class="col-4">
            <input type="submit" value="Guardar " class="btn btn-success">
        </div>
        <div class="col-4">
            
        </div>
    </div>
</form>
@endsection