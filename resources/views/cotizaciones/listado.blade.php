@extends('layouts.admin')
@section('titulo', 'Cotizaciones')
@section('contenido')
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Historial de Cotizaciones</h3>
    </div>
    <div class="col-1">
        <a href="{{url('cotizaciones/cotizar')}}" class="btn btn-sm btn-success">Cotizar</a>
    </div>
   {{--  <div class="col-1">
        <a href="{{url('clientes/pdf')}}" class="btn btn-sm btn-danger"><i class="fa-solid fa-download"></i></a>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/archivados')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-clock"></i></a>
    </div> --}}
</div>
<div class="row my-1">
    <div class="col">
        <div class="table-responsive">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead class="text-center">
                    <tr>
                        <th scope="col" width="50">Folio</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($cotizaciones as $cotizacion)
                    <tr class="text-center">
                        <th scope="row">{{ $cotizacion->folio }}</th>
                        <td>{{ $cotizacion->nombre_compania }}</td>
                        <td>{{ $cotizacion->nombres }}</td>
                        <td>$ {{ $cotizacion->total }} MXN</td>
                        <td>{{ $cotizacion->tipo}}</td>
                        <td>{{ $cotizacion->created_at}}</td>
                        <td>
                            <a href="{{ url('cotizaciones/detalles/'. $cotizacion->folio) }}" class="btn btn-sm btn-secondary">Detalles</a>
                            {{-- <a href="" class="btn btn-sm btn-success">Autorizar</a> --}}
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
</div>

@endsection