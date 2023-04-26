@extends('layouts.admin')
@section('titulo', 'Muestrario')
@section('contenido')
@foreach ($almacen as $almacen)
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Detalles de Salida</h3>
    </div>
</div>
<div class="row my-1">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <p><b>{{$almacen->nombre_compania}}</b></p>
            <b>Representante:</b> {{$almacen->nombre_contacto}} | Telefono: {{$almacen->telefono_contacto}} | Correo: {{ $almacen->correo_contacto}} <br>
            <b>Datos de Domicilio:</b> {{$almacen->domicilio_compania}} <br>
            <b>Estatus:</b> @if($almacen->entregado == 1) Entregado @else Prestados @endif
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <p><b>Detto Uniformes S.A de C.V</b></p>
            <b>Fecha/Hora de Elaboración:</b> {{$almacen->fecha_creacion}} <br>
            <b>Elaborado por:</b> {{$almacen->name}} {{$almacen->app}} <br>
            <b>Tipo de Salida</b> {{ $almacen->tipo}} <br>
            <b>Autorizado: </b> @if($almacen->autorizado == 0 ) No @else Si @endif <br>

        </div>
    </div>
</div>
<hr>
<div class="row my-1">
    <div class="col">
        <div class="table-responsive">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead class="text-center">
                    <tr>
                        <th scope="col" width="50">Cód.</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Comentarios</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($detalles as $detalle)
                    <tr class="text-center">
                        <td>{{ $detalle->codigo }}</td>
                        <td>{{ $detalle->unidad }}</td>
                        <td>{{ $detalle->descripcion }}</td>
                        @if( $detalle->devolucion == 0)
                            <td> Prestada </td>
                        @else 
                            <td> Entregada </td>
                        @endif
                        <td>{{$detalle->comentarios}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
@endsection
