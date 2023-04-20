@extends('layouts.admin')
@section('titulo', 'Clientes')
@section('contenido')
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Listado de clientes</h3>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/nuevo')}}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>
    <div class="col-1">
        <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-download"></i></a>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i></a>
    </div>
</div>
<div class="row my-1">
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-sm text-center">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Compañia</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id_cliente }}</th>
                    <td>{{ $cliente->nombre_compania }}</td>
                    <td>{{ $cliente->nombre_contacto }}</td>
                    <td>{{ $cliente->telefono_contacto }}</td>
                    <td>
                        <a href="{{url('clientes/detalles/'. $cliente->id_cliente)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{url('clientes/eliminar/'. $cliente->id_cliente)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{url('clientes/activar/'. $cliente->id_cliente)}}" class="btn btn-secondary"><i class="fa-solid fa-check"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection