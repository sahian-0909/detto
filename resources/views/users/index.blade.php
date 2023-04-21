@extends('layouts.admin')
@section('titulo', 'Empleados')
@section('contenido')
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Listado de empleados</h3>
    </div>
    <div class="col-2">
      <a href="{{route('users.create')}}" class="btn btn-sm btn-success">Agregar</i></a>
    </div>
</div>
<div class="row my-1">
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                <tr class="text-center">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }} {{ $user->app }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        
                        <a href="{{route('users.edit', $user)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="fa-solid fa-trash"></i>
                                    </button>
                        </form>
                    </td>
                </tr>
                <tr id="{{ $user->id_user }}">
                    <td colspan="6">
                        <div id="info{{ $user->id_user }}"></div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection