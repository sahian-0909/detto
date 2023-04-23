<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de Cotizacion</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #E7E7E7;
            color: #212121;
            height: 75px;
            font-size: 12px;
            width: 90%;
        }

        .alert strong {
            color: #0479E0;
            font-size: 14px;
        }

        table {
            font-family:Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .thead {
            background-color: #0479E0;
            color: #FFFFFF;
        }
    </style>
</head>

<body>    
    @foreach ($cotizacion as $cotizacion)
    <table>
        <tr align="right">
            <td></td>
            <td bgcolor="#0479E0">
                <strong> <h3>Cotización  {{$cotizacion->folio}}</h3></strong>
            </td>
        </tr>
        <tr align="right">
            <td></td>
            <td>
                VICTOR VINICIO ALVAREZ MARTINEZ BACA <br>
                RFC: AAMV651022EKA <br>
                Tel: 722 616 8029 <br>
                Monterrey, Nuevo León, México
            </td>
        </tr>
        <tr>
            <td>
                <div class="alert">
                    <strong>Receptor</strong> <br>
                    {{$cotizacion->nombre_compania}} <br>
                    <b>Representante:</b> {{$cotizacion->nombre_contacto}} | Telefono:
                    {{$cotizacion->telefono_contacto}} | Correo: {{ $cotizacion->correo_contacto}} <br>
                    <b>Datos de Domicilio: {{$cotizacion->domicilio_compania}}
                </div>
            </td>
            <td>
                <div class="alert">
                    <strong>Detto Uniformes S.A de C.V</strong> <br>
                    <b>Fecha/Hora de Elaboración:</b> {{$cotizacion->fecha_creacion}} <br>
                    <b>Elaborado por:</b> {{$cotizacion->name}} {{$cotizacion->app}}
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <thead>
            <tr class="thead">
                <th scope="col" width="50">Cód.</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Unidad</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Descuento</th>
                <th scope="col">Importe</th>                        
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $detalle)
            <tr align="center">
                <td>{{ $detalle->codigo }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>{{ $detalle->unidad }}</td>
                <td>{{ $detalle->descripcion }}, {{ $detalle->materiales }}, {{ $detalle->bordados }} Bordados, {{ $detalle->bolsas }} Bolsas, {{ $detalle->cintas }} Cintas Reflejantes</td>
                <td>$ {{ $detalle->costo_unitario}}</td>
                <td>% {{ $detalle->descuento }}</td>
                <td>$ {{ $detalle->importe}}</td>
            </tr>
            <tr>
                <td colspan="7"><hr></td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4"></th>
                <th colspan="3">
                    <div class="alert">
                        <b>Subtotal: . . </b>$ {{$cotizacion->subtotal}} <br>
                        <b>Descuento: . . </b>$ {{$cotizacion->descuento}} <br>
                        <b>I.V.A 16%: . . </b>$ {{$cotizacion->impuestos}} <br>
                        <b>Total . . </b>$ {{$cotizacion->total}} <br>
                    </div>
                </th>
            </tr>
        </tbody>
        <tfoot  align="left">
            <tr>
                <th colspan="7">CONDICIONES COMERCIALES</th>
            </tr>
            <tr>
                <td colspan="7">
                    <ol>
                        <li>Tiempo de entrega: 4 a 5 semanas, despues de recibir anticipo, tallas completas y autorización de muestras</li>
                        <li>Forma de pago: 60% anticipo, 40% contra entrega</li>
                        <li>Todos nuestros productos generar el 16% del I.V.A</li>
                        <li>Incluye servicio adicional de toma de tallas y entrega personalizada</li>
                        <li>Es posible que exista diferencia de tonos entre lotes que no podamos controlar</li>
                        <li>No hay cambios ni devoluciones, si no se realizo la toma de tallas</li>
                        <li>Estos precios estan sujetos a cambio antes de la confirmación por escrito del pedido</li>
                        <li>Estos precios son hasta la talla WL 42 (Playeras, Batas, Sudaderas, Camisas) y talla 36 en pantaloes, en tallas superiores incrementa el precio</li>
                        <li>El flete no esta incluido</li>
                      </ol>
                </td>
            </tr>
        </tfoot>
    </table>
    @endforeach
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(480, 780, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
</body>

</html>
