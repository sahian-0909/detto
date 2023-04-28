@extends('layouts.admin')
@section('titulo', 'Almacen')
@section('contenido')
<div class="row my-1">
    <form action="{{ url('almacen/') }}" method="GET">
        <div class="btn-group">
            <select class="form-select mb-3 mx-2" aria-label="empleado" name="empleado" id="empleado">
                <option value="">Selecciona un empleado:</option>
                @foreach ($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->nombres }} {{ $empleado->app }}
                    {{ $empleado->apm }}</option>
                @endforeach
            </select>
            <select class="form-select mb-3 mx-2" aria-label="estatus" name="estatus" id="estatus">
                <option value="">Selecciona un estatus:</option>
                <option value="1">Entregado</option>
                <option value="0">Pendiente</option>
            </select>
            <input type="date" class="form-control mb-3 mx-2" name="fecha" id="fecha">

            <button type="submit" class="btn btn-info btn-sm mb-3"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>
</div>
<div class="row my-1">
    <div class="col-4">
        <a href="{{url('almacen/corridas')}}" class="btn btn-info btn-sm mb-3 mx-2 rounded">Corridas</a>
    </div>    
    <div class="col-4">
        <a href="{{url('almacen/muestras')}}" class="btn btn-secondary btn-sm mb-3 mx-2 rounded">Muestras</a>
    </div>
    <div class="col-4">
        <a button type="button" class="btn btn-success btn-sm mb-3" href="{{ url('almacen/nuevo/') }}">Agregar</button></a>
    </div>
</div>    
<div class="row-my-1">
    <div class="table-responsive">
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="table-info">
                    <th scope="col">Folio</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Dia Salida</th>
                    <th scope="col">Estatus</th>
                    <th scope="col" colspan=3>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($almacenes as $almacen)
                <tr>
                    <td class="table-primary">{{ $almacen->folio }}</td>
                    @foreach ($empleados as $empleado)
                    @if ($almacen->id_empleado == $empleado->id)
                    <td class="table-primary">{{ $empleado->name }}</td>
                    @endif
                    @endforeach
                    @foreach ($clientes as $cliente)
                    @if ($almacen->id_cliente == $cliente->id_cliente)
                    <td class="table-primary">{{ $cliente->nombre_compania }}</td>
                    @endif
                    @endforeach
                    <td class="table-primary">{{ $almacen->dia_salida }}</td>
                    @if ($almacen->entregado == 0)
                    <td class="table-primary">Pendiente</td>
                    @else
                    <td class="table-primary">Entregado</td>
                    @endif
                    <td class="table-primary">
                        <form action="{{ url('almacen/autorizar/'.$almacen->folio) }}" method="post">
                            @csrf
                            @method('put')
                            <a href="{{ url('almacen/detalles/'. $almacen->folio) }}"
                                class="btn btn-sm btn-secondary">Detalles</a>
                            <input type="hidden" name="autorizar" value="{{ Auth::user()->id }}">
                            @if($almacen->entregado == 0)
                            <a button type="button" class="btn btn-success btn-sm"
                                href="{{ url('almacen/entrega/' . $almacen->folio) }}">Entregar</button></a>
                            @endif
                            @if($almacen->autorizado == 0)
                            @can('autorizar')
                            <input type="submit" value="Autorizar" class="btn btn-sm btn-success">
                            @endcan
                            @endif
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <center>
        <div class="card-body">
            {{ $almacenes->links() }}
        </div>
    </center>
</div>
@endsection
