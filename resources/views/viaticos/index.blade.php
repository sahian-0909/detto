@extends('layouts.admin')
@section('title','Gestión de viaticos')
@section('contenido')
                @forelse ($user as $role)
                    @if($role->id === 1)
                    <form action="{{ route('viaticos.buscar')}}" method="GET" name="buscar">
                        <div class="row my-1">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <label for="user_id" class="form-label">Búsqueda por empleado:</label>
                                <select class="form-select" name="user_id" id="user_id">
                                    <option value="">Seleccione el empleado</option>
                                    @foreach ($empleados as $empleado)
                                    <option value="{{$empleado->id}}">{{$empleado->name}} {{$empleado->app}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <span class="error text-danger" for="input-user_id">{{ $errors->first('user_id') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <label for="estatus" class="form-label">Búsqueda por estatus de pago:</label>
                                <select class="form-select" name="estatus" id="estatus">
                                    <option value="">Seleccione el estatus</option>
                                    <option value="PAGADO">PAGADO</option>
                                    <option value="PENDIENTE">PENDIENTE</option>
                                </select>
                                @if ($errors->has('estatus'))
                                    <span class="error text-danger" for="input-estatus">{{ $errors->first('estatus') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <br>
                                <input type="submit" value="Buscar" class="btn btn-info col-lg-4">
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('viaticos.buscarfecha')}}" method="GET" name="buscar">
                        <div class="row my-1">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                Fecha inicial<input type="date" name="fi" class="form-control">
                                @if ($errors->has('fi'))
                                    <span class="error text-danger" for="input-fi">{{ $errors->first('fi') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                Fecha final<input type="date" name="ff" class="form-control">
                                @if ($errors->has('ff'))
                                    <span class="error text-danger" for="input-ff">{{ $errors->first('ff') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                <br>
                                <input type="submit" value="Buscar" class="btn btn-info col-lg-4">
                            </div>
                        </div>
                    </form>
                    <div class="row my-1">
                        <div class="col-4">
                            <h3 class="fs-4 mb-3">Tabla General de Viaticos</h3>
                        </div>
                        <div class="col-1">
                            <a href="{{route('viaticos.create')}}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                                <div class="col-6">
                                                    <h4 class="card-title">Viaticos</h4>
                                                </div>
                                                <div class="col-6">
                                                    <h4 class="card-title">Pagos pendientes: {{$pendientes}}</h4>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fecha</th>
                                                        <th>Empleado</th>
                                                        <th>Km</th>
                                                        <th>Total</th>
                                                        <th>Estatus</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                @foreach($viaticos_admin as $viatico)
                                                <tbody>
                                                        <tr>
                                                        <td>{{$viatico->id}}</td>
                                                        <td>
                                                            {{\Carbon\Carbon::parse($viatico->fecha)->format('d M y h:i a')}}
                                                        </td>
                                                        <td>
                                                            {{$viatico->user->name}} {{$viatico->user->ap_pat}} {{$viatico->user->ap_mat}}
                                                        </td>
                                                        <td>{{$viatico->km}} KM</td>
                                                        <td>$ {{$viatico->total}}</td>
                                                        @if ($viatico->estatus == 'PAGADO')
                                                        <td>
                                                            <a class="jsgrid-button btn btn-success" href="{{route('change.status.viaticos', $viatico)}}">
                                                                Pagado <i class="fas fa-check"></i>
                                                            </a>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <a class="jsgrid-button btn btn-danger" href="{{route('change.status.viaticos', $viatico)}}">
                                                                Pendiente <i class="fas fa-times"></i>
                                                            </a>
                                                        </td>
                                                        @endif
                                                        <td>
                                                            <a class="jsgrid-button btn btn-info" href="{{route('viaticos.show', $viatico)}}">
                                                            <i class="fas fa-clock"></i>
                                                            </a>
                                                        </td>
                                                        </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer mr-auto">
                                        {{ $viaticos_admin->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @else
                    <div class="row my-1">
                            <div class="col-9">
                                <h3 class="fs-4 mb-3">Mis Viaticos</h3>
                            </div>
                            <div class="col-1">
                                <a href="{{route('viaticos.create')}}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title">Viaticos</h4>
                                            </div>

                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fecha</th>
                                                            <th>Cliente</th>
                                                            <th>KM</th>
                                                            <th>Total</th>
                                                            <th>Estatus</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    @php($num=1)
                                                    @foreach($viaticos as $viatico)
                                                    @if($id_user === $viatico->user->id)
                                                    <tbody>
                                                            
                                                            <td>{{$num++}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($viatico->fecha)->format('d M y h:i a')}}
                                                            </td>
                                                            @foreach($clientes as $client)
                                                            @if($client->id_cliente === $viatico->cliente_id)
                                                            <td>
                                                                {{$client->nombre_compania}}
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                            <td>{{$viatico->km}} KM</td>
                                                            <td>$ {{$viatico->total}}</td>
                                                            @if ($viatico->estatus == 'PAGADO')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success">
                                                                    Pagado
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger">
                                                                    Pendiente
                                                                </a>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <a class="jsgrid-button btn btn-info" href="{{route('viaticos.show', $viatico)}}">
                                                                <i class="fas fa-clock"></i>
                                                                </a>
                                                            </td>
                                                    </tbody>
                                                    @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @empty
                    <span class="badge badge-danger">No roles</span>
                @endforelse
@endsection

