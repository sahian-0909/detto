@extends('layouts.admin')
@section('titulo', 'Kilometraje')
@section('contenido')
<div class="container-fluid px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Kilometraje</h4>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="table-warning">
                        <th scope="col">Kilometraje</th>
                        <th scope="col">Precio</th>
                        <th scope="col" colspan=3>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kilometrajes as $kilometraje)
                    <tr>
                        <td class="table-primary">1 KM</td>
                        <td class="table-primary">{{ $kilometraje->costo }}</td>
                        <td class="table-primary"><a href="{{url('kilometrajes/'. $kilometraje->id .'/edit')}}" button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
