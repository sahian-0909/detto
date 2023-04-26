@extends('layouts.admin')
@section('titulo', 'Cotizaciones')
@section('contenido')
@foreach ($cotizacion as $cotizacion)
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Detalles de Cotización</h3>
    </div>
    <div class="col-3">
        <a href="{{url('cotizaciones/comprobante/'.$cotizacion->folio)}}" class="btn btn-outline-danger">Descargar Comprobante</a>
    </div>
</div>
<div class="row my-1">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <p><b>{{$cotizacion->nombre_compania}}</b></p>
            <b>Representante:</b> {{$cotizacion->nombre_contacto}} | Telefono: {{$cotizacion->telefono_contacto}} | Correo: {{ $cotizacion->correo_contacto}}
            <p><b>Datos de Domicilio:</b> {{$cotizacion->domicilio_compania}} 
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <p><b>Detto Uniformes S.A de C.V</b></p>
            <b>Fecha/Hora de Elaboración:</b> {{$cotizacion->fecha_creacion}} <br>
            <b>Elaborado por:</b> {{$cotizacion->name}} {{$cotizacion->app}} <br>
            <b>Autorizado: </b> @if($cotizacion->autorizado == 0 ) No @else Si @endif <br>
            @can('autorizar')
                <b>Ganancias: </b> ${{$cotizacion->ganancias}}
            @endcan
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
                        <th scope="col">Cantidad</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Costo Unitario</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Importe</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($detalles as $detalle)
                    <tr class="text-center">
                        <td>{{ $detalle->codigo }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>{{ $detalle->unidad }}</td>
                        <td>{{ $detalle->descripcion }}, {{ $detalle->materiales }}, {{ $detalle->bordados }} Bordados, {{ $detalle->bolsas }} Bolsas, {{ $detalle->cintas }} Cintas Reflejantes</td>
                        <td>$ {{ $detalle->precio}}</td>
                        <td>$ {{ $detalle->costo_unitario}}</td>
                        <td>% {{ $detalle->descuento }}</td>
                        <td>$ {{ $detalle->importe}} MXN</td>
                    </tr>                    
                    @endforeach
                    <tr>
                        <th colspan="6"></th>
                        <th>Subtotal:</th>
                        <th>$ {{$cotizacion->subtotal}}</th>
                    </tr>
                    <tr>
                        <th colspan="6"></th>
                        <th>Descuento</th>
                        <th>$ {{$cotizacion->descuento}}</th>
                    </tr>
                    <tr>
                        <th colspan="6"></th>
                        <th>I.V.A 16%</th>
                        <th>$ {{$cotizacion->impuestos}}</th>
                    </tr>
                    <tr>
                        <th colspan="6"></th>
                        <th>Total:</th>
                        <th>$ {{$cotizacion->total}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
@endsection
