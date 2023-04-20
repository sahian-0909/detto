@extends('layouts.admin')
@section('contenido')
    <center>
        <h1>Detalle Categoria</h1>
        <br>
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            @csrf
            <tr>
                <td class="table-primary">Categoria:</td>
                <td class="table-primary">{{ $categoria->categoria }}</td>

            </tr>

            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="{{ route('indexCategoria') }}">
                        <center><button class="btn btn-primary">Regresar</button></center>
                    </a><br>
                </td>
            </tr>
        </table>
    </center>
@endsection
