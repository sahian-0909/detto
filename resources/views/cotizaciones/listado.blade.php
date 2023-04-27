@extends('layouts.admin')
@section('titulo', 'Cotizaciones')
@section('contenido')
<div class="row my-1">
    <div class="col-4">
        <h3 class="fs-4 mb-3">Historial de Cotizaciones</h3>
    </div>
</div>
<div class="row my-1 ">
    <form action="{{ url('cotizaciones') }}" method="get">
        <div class="input-group mb-3">
            <select name="id_cliente" id="" class="form-select" aria-describedby="button-addon2">
                <option value="">Buscar por cliente</option>
                @foreach ($client as $client)
                <option value="{{ $client->id_cliente }}"> {{ $client->nombre_compania }}</option>
                @endforeach
            </select>
            <select name="id_empleado" id="" class="form-select" aria-describedby="button-addon2">
                <option value="">Buscar por empleado</option>
                @foreach ($user as $user)
                <option value="{{ $user->id }}"> {{ $user->name }}</option>
                @endforeach
            </select>
            <select name="estatus" id="" class="form-select" aria-describedby="button-addon2">
                <option value="">Buscar por estatus</option>
                <option value="1">Autorizado</option>
                <option value="0">No autorizado</option>
            </select>
            {{-- <input type="text" class="form-control form-control" placeholder="Recipient's username" aria-label="Recipient's username" > --}}
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        {{-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label for="">Cliente</label>
            <select name="id_cliente" id="" class="form-select form-select-sm">
                @foreach ($client as $client)
                <option value="{{ $client->id_cliente }}"> {{ $client->nombre_compania }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label for="">Empleado</label>
            <select name="id_empleado" id="" class="form-select form-select-sm ">
                @foreach ($user as $user)
                <option value="{{ $user->id }}"> {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-secondary">Buscar</button> --}}
    </form>
</div>
<div class="row my-1">
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
                        @foreach($clientes as $cliente)
                        @if($cotizacion->id_cliente == $cliente->id_cliente)
                        <td>{{ $cliente->nombre_compania }}</td>
                        @endif
                        @endforeach
                        @foreach ($usuarios as $user)
                        @if($cotizacion->id_empleado == $user->id)
                        <td>{{ $user->name }}</td>
                        @endif
                        @endforeach
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
                                <a href="{{ url('cotizaciones/detalles/'. $cotizacion->folio) }}"
                                    class="btn btn-sm btn-secondary">Detalles</a>
                                <input type="hidden" name="autorizar" value="{{ Auth::user()->id }}">
                                @can('autorizar')
                                <input type="submit" value="Autorizar" class="btn btn-sm btn-success">
                                @endcan
                            </form>
                            @else
                            <a href="{{ url('cotizaciones/detalles/'. $cotizacion->folio) }}"
                                class="btn btn-sm btn-secondary">Detalles</a>
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
