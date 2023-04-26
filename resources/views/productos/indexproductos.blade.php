@extends('layouts.admin')
@section('titulo', 'Prendas')
@section('contenido')
<div class="container-fluid  px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Listado de Prendas</h4>
            <a button type="button" class="btn btn-success btn-sm"
                href="{{ url('productos/agregar') }}">Agregar</button></a>
            <a button type="button" class="btn btn-info btn-sm"
                href="{{ url('indexCategoria') }}">Categorias</button></a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Color</th>
                        {{-- <th scope="col">Imagen</th> --}}
                        <th scope="col" colspan=3>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td class="table-primary">{{ $producto->codigo }}</td>
                        <td class="table-primary">{{ $producto->producto }}</td>
                        <td class="table-primary">{{ $producto->precio }}</td>
                        <td class="table-primary">{{ $producto->sexo }}</td>
                        <td class="table-primary">{{ $producto->color }}</td>
                        {{-- <td class="table-primary"><img src="{{ asset('imagenes/'.$producto->imagen) }}"
                        class="card-img-top mx-auto"
                        style="height: 100px; width: 100px;display: block;"></td> --}}
                        <td class="table-primary">
                            <a button type="button" class="btn btn-info btn-sm"
                                href="{{ url('productos/detalles', ['id' => $producto->id]) }}">Detalle</button></a>
                            <a button type="button" class="btn btn-warning btn-sm"
                                href="{{ url('productos/editar', ['id' => $producto->id]) }}">Editar</button></a>
                            <a button type="button" class="btn btn-danger btn-sm"
                                href="{{ url('productos/eliminar', ['id' => $producto->id]) }}">Borrar</button></a>
                            <a button type="button" class="btn btn-secondary btn-sm"
                                href="{{ url('productos/tallas', ['id' => $producto->id]) }}">Tallas</button></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
