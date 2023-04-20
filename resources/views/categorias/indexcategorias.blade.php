@extends('layouts.admin')
@section('titulo', 'Prendas')
@section('contenido')
<div class="container-fluid px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Listado de Categorias</h4>
            <a button type="button" class="btn btn-success btn-sm"
                href="{{ route('agregarCategoria') }}">Agregar</button></a>
            <a button type="button" class="btn btn-info btn-sm"
                href="{{ url('productos/') }}">Prendas</button></a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Id</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" colspan=3>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td class="table-primary">{{ $categoria->id }}</td>
                        <td class="table-primary">{{ $categoria->categoria }}</td>
                        <td class="table-primary"><a button type="button" class="btn btn-info btn-sm"
                                href="{{ route('detalleCategoria', ['id' => $categoria->id]) }}">Detalle</button></a>
                        </td>
                        <td class="table-primary"><a button type="button" class="btn btn-warning btn-sm"
                                href="{{ route('editarCategoria', ['id' => $categoria->id]) }}">Editar</button></a>
                        </td>
                        <td class="table-primary"><a button type="button" class="btn btn-danger btn-sm"
                                href="{{ route('borrarCategoria', ['id' => $categoria->id]) }}">Borrar</button></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
