@extends('layouts.admin')
@section('contenido')
    <center>
        <h1>Detalle Registro</h1>
        <br>
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            @csrf
            <tr>
                <td class="table-primary">Empleado:</td>
                @foreach ($users as $user)
                    @if ($almacenes->id_empleado == $user->id)
                        <td class="table-primary">{{ $user->nombres }}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td class="table-primary">Cliente:</td>
                @foreach ($clientes as $cliente)
                    @if ($almacenes->id_cliente == $cliente->id_cliente)
                        <td class="table-primary">{{ $cliente->nombre_compania }}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td class="table-primary">Autorizacion:</td>
                <td class="table-primary">{{ $almacenes->id_autorizacion }}</td>
            </tr>
            <tr>
                <td class="table-primary">Dia salida:</td>
                <td class="table-primary">{{ $almacenes->dia_salida }}</td>
            </tr>
            <tr>
                <td class="table-primary">Dia entrada:</td>
                <td class="table-primary">{{ $almacenes->dia_entrada }}</td>
            </tr>
            <tr>
                <td class="table-primary">Comentarios Cliente:</td>
                <td class="table-primary">{{ $almacenes->comentarios }}</td>
            </tr>
            @foreach ($detalles as $detalle)
                <tr>
                    <td class="table-primary">Producto:</td>
                    <td class="table-primary">{{ $detalle->producto }}</td>
                </tr>
                <tr>
                    <td class="table-primary">Color:</td>
                    <td class="table-primary">{{ $detalle->color }}</td>
                </tr>
                <tr>
                    <td class="table-primary">Color:</td>
                    <td class="table-primary">{{ $detalle->codigo }}</td>
                </tr>
                <tr>
                    <td class="table-primary">Tipo Entrega:</td>
                    <td class="table-primary">{{ $detalle->tip_entrega }}</td>
                </tr>
                <tr>
                    <td class="table-primary">Tallas:</td>
                    <td class="table-primary">{{ $detalle->tallas }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="{{ url('almacen/') }}">
                        <center><button class="btn btn-primary">Regresar</button></center>
                    </a><br>
                </td>
            </tr>
        </table>
    </center>
@endsection
