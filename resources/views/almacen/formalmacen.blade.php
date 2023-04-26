@extends('layouts.admin')
@section('titulo', 'Muestrario')
@section('contenido')
<div class="container">
    <div class="row my-1">
        <div class="col-12">
            <h3 class="fs-4 mb-3">Nueva Salida</h3>
        </div>
        <hr>
    </div>
    <form action="{{ url('almacen/registrar') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            @foreach ($folio as $folio)
            <input type="hidden" id="folio" name="folio" value="{{ $folio->folio + 1 }}" class="form-control" readonly>
            @endforeach
            <input type="hidden" id="id_empleado" name="id_empleado" value="1">
            <input type="hidden" id="autorizado" name="autorizado" value="0">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <label for="id_cliente" class="form-label">Tipo de salida:</label>
                <select class="form-select" aria-label="tip_entrega" name="tip_entrega" id="tip_entrega">
                    <option value="0">Selecciona el tipo de entrega:</option>
                    <option value="Muestra">Muestra</option>
                    <option value="Corrida">Corrida</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <label for="id_cliente" class="form-label">Cliente:</label>
                <input class="form-control" list="datalistClientes" name="id_cliente" id="id_cliente"
                    placeholder="-- Selecciona un Cliente --">
                <datalist id="datalistClientes">
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $clientes)
                    <option value="{{ $clientes->id_cliente }}"> {{ $clientes->nombre_compania }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <label for="comentarios" class="form-label">Comentarios Cliente:</label>
                <input type="text" class="form-control" name="comentarios" id="comentarios">
            </div>
        </div>
        <br>
        <div class="row my-1" id="info_cliente"></div>
        <div class="row my-1">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <label for="comentarios" class="form-label">Dia Salida:</label>
                    <input type="date" class="form-control" name="dia_salida" id="dia_salida">
                </div>
            </div>
        </div>
        <br>
        <div class="row my-1">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <select class="form-select" aria-label="tip_prenda" name="tip_prenda" id="tip_prenda">
                        <option value="">Selecciona el tipo de prenda:</option>
                        <option value="diseño">Diseño</option>
                        <option value="linea">Linea</option>
                    </select>
                </div>
                <br>
                <div class="row-1" id="info_categoria">
                </div>
            </div>
            <div class="row my-1" id="info_prenda"></div>
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="row my-1">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #9B3030">
                            <th class="text-white">Opciones</th>
                            <th class="text-white">Descripción</th>
                            <th class="text-white">Tipo Salida</th>
                            <th class="text-white">Tallas</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        <a href="{{ url('almacen/') }}" class="btn btn-outline-danger">Cancelar y Regresar</a>
                    </div>
                </div>
            </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#tip_prenda").change(function () {
            var tip_prenda = $("#tip_prenda").val();
            //alert(materia);
            if (tip_prenda == "diseño") {
                $("#info_categoria").load("{{ route('info_categoria') }}");
            } else {
                $("#info_categoria").load("{{ route('info_categoria') }}");
            }
        });
        $("#id_cliente").change(function () {
            var cliente = $("#id_cliente").val();
            //alert(materia);
            if (cliente == 0) {
                $("#info_cliente").empty();
            } else {
                $("#info_cliente").load("{{ route('info_cliente') }}?id_cliente=" + cliente).css({
                    "border": "2px solid #9B3030",
                    "padding": "10px",
                    "border-radius": "25px"
                });
            }
        });
        $('#bt_add').click(function () {
            agregar();
        });

        var cont = 0;

        function limpiar() {
            $("#id_prenda").val("");
        }

        function eliminar(index) {
            $("#fila" + index).remove();
        }

        function agregar() {
            id_prenda = $('#id_prenda').val();
            tip_entrega = $('#tip_entrega').val();
            tip_prenda = $('#tip_prenda').val();
            valtallas = $('#talla').val();
            tallas = $('#talla').find('option[value=' + valtallas + ']').text();
            producto = $('#producto').val();
            color = $('#color').val();
            codigo = $('#codigo').val();
            if (id_prenda != "") {
                var fila = '<tr class="selected" id="fila' + cont +
                    '"> <td> <button type="button" class="btn btn-warning" onclick="eliminar(' +
                    cont + ');">X</button></td> <td><input type="hidden" name="id_prenda[]" value="' +
                    id_prenda + '">' + producto + ', Color:' + color + ', Codigo:' + codigo + '</td>"' +
                    '<td>' +
                    tip_entrega + '<input type="hidden" name=tip_entrega value="' + tip_entrega +
                    '"></td>"' + '<td>' + tallas + '<input type="hidden" name=tallas[] value="' + tallas +
                    '"></td></tr>' + '<input type="hidden" name=tip_prenda[] value="' + tip_prenda + '">' +
                    '<input type="hidden" name=producto[] value="' + producto + '">' +
                    '<input type="hidden" name=color[] value="' + color + '">' +
                    '<input type="hidden" name=codigo[] value="' + codigo + '">';
                cont++;
                limpiar();
                $("#detalles").append(fila);
                $("#id_prenda").val(0);
            } else {
                alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
            }
        }
    });

</script>
@endsection
