@extends('layouts.admin')
@section('contenido')
    <center>
        <h1>Detalle Producto</h1>
        <br>
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            @csrf
            <tr>
                <td class="table-primary">Imagen:</td>
                <td class="table-primary"><img src="{{ asset('imagenes/'.$producto->imagen) }}" class="card-img-top mx-auto"
                    style="height: 100px; width: 100px;display: block;"></td>
            </tr>
            <tr>
                <td class="table-primary">Codigo:</td>
                <td class="table-primary">{{ $producto->codigo }}</td>
            </tr>
            <tr>
                <td class="table-primary">Descripcion:</td>
                <td class="table-primary">{{ $producto->descripcion }}</td>
            </tr>
            <tr>
                <td class="table-primary">Unidad:</td>
                <td class="table-primary">{{ $producto->unidad }}</td>
            </tr>
            <tr>
                <td class="table-primary">Materiales:</td>
                <td class="table-primary">{{ $producto->materiales }}</td>
            </tr>
            
                @foreach($tallas as $talla)
                    @if($talla->id_prenda = $producto->id)
                    <tr>
                    <td class="table-primary">Talla:</td>
                    <td class="table-primary">{{ $talla->talla }}</td>
                    </tr>
                    @endif

                @endforeach
            
            <tr>
                <td class="table-primary">Precio:</td>
                <td class="table-primary">{{ $producto->precio }}</td>
            </tr>
            <tr>
                <td class="table-primary">Sexo:</td>
                <td class="table-primary">{{ $producto->sexo }}</td>
            </tr>
            <tr>
                <td class="table-primary">Categoria:</td>
                @foreach($categorias as $categoria)
                    @if($producto->id_categoria == $categoria->id)
                        <td class="table-primary">{{ $categoria->categoria }}</td>
                    @endif
                @endforeach
            </tr>

            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="{{ url('productos/') }}">
                        <center><button class="btn btn-primary">Regresar</button></center>
                    </a><br>
                </td>
            </tr>
        </table>
    </center>
@endsection
