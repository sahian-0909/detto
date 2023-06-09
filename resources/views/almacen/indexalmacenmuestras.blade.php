@extends('layouts.admin')
@section('titulo', 'Almacen Muestras')
@section('contenido')
    <div class="container-fluid px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-0">Listado del Almacen de Muestras</h4>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <form action="{{ url('almacen/muestras') }}" method="GET">
                    <div class="btn-group">
                        <a href="{{url('almacen/')}}" class="btn btn-info btn-sm mb-3 mx-2 rounded">General</a>
                        <a href="{{url('almacen/corridas')}}" class="btn btn-secondary btn-sm mb-3 mx-2 rounded">Corridas</a>
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
                        
                        <button type="submit" class="btn btn-info btn-sm mb-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>

                </form>
            </div>
            <br>
            <div class="d-md-flex justify-content-md-end">
                <a button type="button" class="btn btn-success btn-sm"
                    href="{{ url('almacen/nuevo/') }}">Agregar</button></a>
            </div>

            <br>
            <div class="table-responsive">
                <table class="table text-center align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Folio</th>
                            <th scope="col">Empleado</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Dia Salida</th>
                            <th scope="col">Estatus</th>
                            <th scope="col" colspan=3>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($almacenes as $almacen)
                            <tr>
                                <td class="table-primary">{{ $almacen->id }}</td>
                                @foreach ($empleados as $empleado)
                                    @if ($almacen->id_empleado == $empleado->id)
                                        <td class="table-primary">{{ $empleado->nombres }}</td>
                                        <td class="table-primary">{{ $empleado->puesto }}</td>
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
                                @endif
                                @if ($almacen->entregado == 1)
                                    <td class="table-primary">Entregado</td>
                                @endif


                                <td class="table-primary">
                                    <a button type="button" class="btn btn-info btn-sm"
                                        href="{{ url('almacen/detalles/' . $almacen->id) }}">Detalle</button></a>
                                    <a button type="button" class="btn btn-danger btn-sm"
                                        href="{{ url('almacen/eliminar/' . $almacen->id) }}">Borrar</button></a>
                                    <a button type="button" class="btn btn-success btn-sm"
                                        href="{{ url('almacen/entrega/' . $almacen->id) }}">Entregar</button></a>
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
    </div>
@endsection
