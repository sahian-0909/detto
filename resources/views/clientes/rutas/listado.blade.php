@extends('layouts.admin')
@section('titulo', 'Rutas de visitas')
@section('contenido')
<div class="row my-1">
    <h3 class="fs-4 mb-3">Listado de rutas</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">KM</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rutas as $ruta)
                <tr>
                    <th scope="row">{{ $ruta->id_ruta }}</th>
                    <td>{{ $ruta->nombre_ruta }}</td>
                    <td>{{ $ruta->lugar_origen }}</td>
                    <td>{{ $ruta->lugar_destino }}</td>
                    <td>{{ $ruta->kilometraje }}</td>
                    <td>
                        <a href="{{url('rutas/detalles/'. $ruta->id_ruta)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{url('rutas/eliminar/'. $ruta->id_ruta)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection