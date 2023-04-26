@extends('layouts.admin')
@section('titulo', 'Almacen')
@section('contenido')
<div class="container-fluid px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Listado del Almacen</h4>
            <a button type="button" class="btn btn-success btn-sm"
                href="{{ url('almacen/nuevo/') }}">Agregar</button></a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Folio</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Autorizacion</th>
                        <th scope="col">Dia Salida</th>
                        <th scope="col">Comentarios Cliente</th>
                        <th scope="col" colspan=3>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $almacen)
                    <tr>
                        <td class="table-primary">{{ $almacen->id }}</td>
                        @foreach ($empleados as $empleado)   
                            @if ($almacen->id_empleado == $empleado->id)
                            <td class="table-primary">{{$empleado->nombres}}</td>    
                            @endif
                        @endforeach
                        @foreach ($clientes as $cliente)   
                            @if ($almacen->id_cliente == $cliente->id_cliente)
                            <td class="table-primary">{{$cliente->nombre_compania}}</td>    
                            @endif
                        @endforeach
                        <td class="table-primary">{{ $almacen->id_autorizacion }}</td>
                        <td class="table-primary">{{ $almacen->dia_salida }}</td>
                        <td class="table-primary">{{ $almacen->comentarios }}</td>
                        <td class="table-primary">
                            @can('almacen_show')
                            <a button type="button" class="btn btn-info btn-sm"
                                href="{{url('almacen/detalles/'. $almacen->id)}}">Detalle</button></a>
                                @endcan
                                @can('almacen_destroy')
                            <a button type="button" class="btn btn-danger btn-sm"
                                href="{{url('almacen/eliminar/'. $almacen->id)}}">Borrar</button></a>
                                @endcan
                            <a button type="button" class="btn btn-success btn-sm" href="{{url('almacen/entrega/'. $almacen->id)}}">Entregar</button></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
