@extends('layouts.admin')
@section('titulo', 'Clientes')
@section('contenido')
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        var close = '';
        var after = '';

        $("button").click(function () {
            $("#info" + close).text('');
            after = close;
            //console.log('*'+after);

            close = $(this).attr("id");

            var id = $(this).attr("id");
            //console.log(id);
            if (close == after) {
                $("#info" + after).text("");
                close = '';
            } else {
                //$("#info" + id).load("js00?id=" + id).css({ "background": "#OCE" });
                $("#info"+id).load("clientes/js00?id="+id).css({"background": "#OCE"});
            }
        })
    });
</script>
<div class="row my-1">
    <div class="col-9">
        <h3 class="fs-4 mb-3">Listado de clientes</h3>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/nuevo')}}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/pdf')}}" class="btn btn-sm btn-danger"><i class="fa-solid fa-download"></i></a>
    </div>
    <div class="col-1">
        <a href="{{url('clientes/archivados')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-clock"></i></a>
    </div>
</div>
<div class="row my-1">
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Compañia</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($clientes as $cliente)
                <tr class="text-center">
                    <th scope="row">{{ $cliente->id_cliente }}</th>
                    <td>{{ $cliente->nombre_compania }}</td>
                    <td>{{ $cliente->nombre_contacto }}</td>
                    <td>{{ $cliente->telefono_contacto }}</td>
                    <td>
                        <button type="button" class="btn btn-secondary" id="{{ $cliente->id_cliente }}"><i class="fa-solid fa-circle-info"></i></button>
                        {{-- <a href="{{url('clientes/detalles/'. $cliente->id_cliente)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{url('clientes/eliminar/'. $cliente->id_cliente)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{url('clientes/desactivar/'. $cliente->id_cliente)}}" class="btn btn-secondary"><i class="fa-solid fa-clock"></i></a> --}}
                    </td>
                </tr>
                <tr id="{{ $cliente->id_cliente }}">
                    <td colspan="6">
                        <div id="info{{ $cliente->id_cliente }}"></div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection