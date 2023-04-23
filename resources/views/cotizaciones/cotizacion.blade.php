@extends('layouts.admin')
@section('titulo', 'Cotizaciones')
@section('contenido')
<div class="row my-1">
    <div class="col-12">
        <h3 class="fs-4 mb-3">Nueva Cotización</h3>
    </div>
    <hr>
</div>
<form action="{{ url('cotizaciones/registrar') }}" method="post">
    @csrf
    <div class="row my-1">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label for="folioCot" class="form-label">Folio de cotización</label>            
            @foreach ($folio as $folio)
                <input type="text" id="folioCot" name="folioCot" value="{{$folio->folio + 1}}"
            class="form-control"readonly>
            @endforeach
            <input type="hidden" name="idEmpleado" value="{{ Auth::user()->id }}">
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label for="ganancias" class="form-label">Margen de Ganancias</label>
            <select name="ganancias" id="mganancias" class="form-select">
                <option value="0">Margen 0%</option>
                <option value="25">Margen 25%</option>
                <option value="30">Margen 30%</option>
                <option value="35">Margen 35%</option>
                <option value="40">Margen 40%</option>
                <option value="45">Margen 45%</option>
                <option value="50">Margen 50%</option>
            </select>
        </div>        
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="idCliente" class="form-label">Clientes:</label>
                <input class="form-control" list="datalistClientes" id="idCliente" name="idCliente" placeholder="-- Selecciona un Cliente --">
                <datalist id="datalistClientes">
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $clientes)
                    <option value="{{$clientes->id_cliente}}"> {{$clientes->nombre_compania}}</option>
                    @endforeach
                </datalist>
            </div>
        </div>    
    </div>
    <div class="row my-1" id="info_cliente"></div>
    <div class="row my-1">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="Categorias" class="form-label">Categoria:</label>
                <select name="" id="id_categoria" class="form-select">
                    <option value="">Selecciona un cliente</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}"> {{$categoria->categoria}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="PidPrenda" class="form-label">Prendas:</label>
                <div id="select_prendas"></div>
            </div>
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
                    <th class="text-white">% Descuento</th>
                    <th class="text-white">Cantidad</th>
                    {{-- <th class="text-white">% Desc.</th> --}}
                    <th class="text-white">Importe</th>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="3"></th>
                        <th>Subtotal</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" placeholder="00.00" name="subtotal"
                                    id="subtotal" readonly>
                                <span id="ssubtotal"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>                    
                        <th>Descuento Total:</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" name="subdesc" id="desctotal" readonly>
                                <span id="sdesctotal"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th>Ganancias</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" placeholder="00.00" name="resto" id="ganancias" readonly>
                                <span id="sganancias"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th>I.V.A 16%</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" name="impuestos" placeholder="0" id="impuestos">
                                <span id="simpuestos"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th>Total</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" placeholder="00.00" name="total" id="total" readonly>
                                <span id="stotal"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th>Anticipo 60% </th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" placeholder="00.00" name="anticipo" id="anticipo" readonly>
                                <span id="santicipo"></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3"></th>
                        <th>Resto 40%</th>
                        <th>
                            <div class="input-group">
                                <input type="hidden" class="form-control-sm" placeholder="00.00" name="resto" id="resto" readonly>
                                <span id="sresto"></span>
                            </div>
                        </th>
                    </tr>
                </tfoot>
                <tbody>
        
                </tbody>
            </table>
        </div>    
    </div>
    <div class="row my-1">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                <a href="{{url('ventas')}}" class="btn btn-outline-danger">Cancelar y Regresar</a>
            </div>
        </div>
    </div>
</form>

{{-- Funciones Jquery --}}
<script>
    $(document).ready(function () {
        //Funciones para mostrar los datos del clientes y el formulario para las prendas
        $("#idCliente").change(function () {
            var cliente = $("#idCliente").val();
            //alert(materia);
            if (cliente == 0) {
                $("#info_cliente").empty();
            } else {
                $("#info_cliente").load("{{ route('info_cliente') }}?id_cliente=" + cliente).css({"border": "2px solid #9B3030", "padding": "10px", "border-radius": "25px"});
            }
        });
        $("#id_categoria").change(function () {
            var id_categoria = $("#id_categoria").val();            
            //alert(materia);
            if (id_categoria == 0) {
                $("#id_categoria").empty();
                $("#select_prendas").html("Debes de seleccionar una categoria")
            } else {
                $("#select_prendas").load("{{ route('select_prendas') }}?id_categoria=" + id_categoria);
            }
        });
        $("#PidPrenda").change(function () {
            var prenda = $("#PidPrenda").val();            
            //alert(materia);
            if (prenda == 0) {
                $("#info_prenda").empty();
            } else {
                $("#info_prenda").load("{{ route('info_prenda') }}?id_prenda=" + prenda).css({"border": "2px solid #9B3030", "padding": "10px", "border-radius": "25px"});
            }
        });
        //Función para boton de agregar al carrito de cotizaciones
        $('#bt_add').click(function () {
            agregar();
        });
    });
    //Procedimiento para agregar al carrito
    var cont = 0;
    subtotal = 0;
    descuentos = 0;
    importes = [];
    subt = [];
    porcdesc = [];

    function limpiar() {
        $("#PidPrenda").val("");
    }

    function evaluar() {
        if (subtotal > 0) {
            $("#guardar").show()
        } else {
            $("#guardar").hide()
        }
    }

    function eliminar(index) {
        subtotal = subtotal - importes[index];
        $("#subtotal").val(subtotal);
        $("#fila" + index).remove();
        evaluar();
    }

    function agregar() {
        id_prenda = $('#PidPrenda').val();
        //prenda = $('#prenda').val();
        precio = $('#precio').val();
        prenda = $('#prenda').val();
        comentariosPrenda = $('#comentariosPrenda').val();
        //bordados = $('#bordados').val();
        //tallas = $('#tallas').val();
        //color= $('#color').val();
        costo= $('#costo_unitario').val();
        cantidad = $('#cantidad').val();
        importe = $('#importe').val();
        descuento = $("#descuento").val();
        porcentaje = $("#porcentaje").val();
        margen = $("#mganancias").val();
        if (id_prenda != "" && cantidad != "" && precio != "" && importe != "") {
            subt[cont] = parseFloat(importe); //de cada producto, multiplica la cantidad por su precio
            importes[cont] = subt[cont]; //del subtotal le resta es descuento
            subtotal = subtotal + importes[cont]; // suma todos los importes de la venta
            ganancias =  Math.round( (subtotal * margen)/100 );
            descuentos = parseFloat(descuentos) + parseFloat(descuento); //suma el descuento de cada producto
            impuestos = ((subtotal * 16) / 100);
            total =  Math.round( subtotal + impuestos + ganancias);
            anticipo = Math.round( (total * 60)/100 );
            resto = Math.round( (total * 40)/100 );            
            var fila = '<tr class="selected" id="fila' + 
                cont +'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar(' + 
                cont + ');">X</button></td> <td> <input type="hidden" name="id_prenda[]" value="' + 
                id_prenda + '">' + prenda + ' ' + comentariosPrenda + ' <input type="hidden" name="comentariosPrenda[]" value="' + 
                comentariosPrenda +'"></td>' + 
                '<td> ' + porcentaje +' <input type="hidden" name="porcentaje[]" value="' + porcentaje + '"></td>' +
                '<td> ' + cantidad + ' <input type="hidden" name="cantidad[]" value="' + cantidad + '"></td>' +
                '<td> ' + importe + ' <input type="hidden" name="importe[]" value="' + importe + '"></td></tr>';
            cont++;
            limpiar();
            $("#subtotal").val(subtotal);
            $("#desctotal").val(descuentos);
            $("#impuestos").val(impuestos);
            $("#total").val(total)
            $("#anticipo").val(anticipo)
            $("#resto").val(resto)
            $("#ganancias").val(ganancias);
            $("#ssubtotal").text("$ " + subtotal);
            $("#sdesctotal").text("$ " + descuentos);
            $("#simpuestos").text("$ " + impuestos);
            $("#stotal").text("$ " + total)
            $("#santicipo").text("$ " + anticipo);
            $("#sresto").text("$ " + resto);
            $("#sganancias").text("$ " + ganancias);
            evaluar();
            $("#detalles").append(fila);
            //$("#info_prenda").empty();
            $("#id_producto").val(0);
        } else {
            alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
        }
    }

</script>
@endsection
