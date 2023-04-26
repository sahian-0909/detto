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
                        <th scope="col">Tipo</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha de realizacion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($cotizaciones as $cotizacion)
                    <tr class="text-center">
                        <th scope="row">{{ $cotizacion->folio }}</th>
                        <td>{{ $cotizacion->nombre_compania }}</td>
                        <td>{{ $cotizacion->name }}</td>
                        <td>$ {{ $cotizacion->total }} MXN</td>
                        <td>{{ $cotizacion->tipo}}</td>
                        <td>
                            @if($cotizacion->autorizado == 0) Sin Autorización
                            @else Autorizado @endif
                        </td>
                        <td>{{ $cotizacion->created_at}}</td>
                        <td>
                            @if($cotizacion->autorizado == 0 )
                                <form action="{{ url('cotizaciones/autorizar/'.$cotizacion->folio) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <a href="{{ url('cotizaciones/detalles/'. $cotizacion->folio) }}" class="btn btn-sm btn-secondary">Detalles</a>
                                    <input type="hidden" name="autorizar" value="{{ Auth::user()->id }}">
                                    @can('autorizar')
                                        <input type="submit" value="Autorizar" class="btn btn-sm btn-success">
                                    @endcan
                                </form>
                            @else
                                <a href="{{ url('cotizaciones/detalles/'. $cotizacion->folio) }}" class="btn btn-sm btn-secondary">Detalles</a>
                            @endif
                        </td>
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{ $cotizaciones->links() }}
        </div>
    </div>
</div>

@endsection