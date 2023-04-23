@extends('layouts.admin')
@section('title','Gestión de viaticos')
@section('contenido')

                @forelse ($user as $role)
                    @if($role->id === 2)
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
                                        <div class="card-footer mr-auto">
                                            {{ $viaticos->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @else
                    <div class="row my-1">
                        <div class="col-9">
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
                                            <h4 class="card-title">Viaticos</h4>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fecha</th>
                                                        <th>Empleado</th>
                                                        <th>Total</th>
                                                        <th>Estatus</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                @foreach($viaticos as $viatico)
                                                <tbody>
                                                        
                                                        <td>{{$viatico->id}}</td>
                                                        <td>
                                                            {{\Carbon\Carbon::parse($viatico->fecha)->format('d M y h:i a')}}
                                                        </td>
                                                        <td>
                                                            {{$viatico->user->name}} {{$viatico->user->ap_pat}} {{$viatico->user->ap_mat}}
                                                        </td>
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
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer mr-auto">
                                        {{ $viaticos->links() }}
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

