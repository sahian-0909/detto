<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente as Clientes;
use App\Models\Producto as Prendas;
use App\Models\Cotizacion;
use App\Models\Categoria as Categorias;
use App\Models\Detalles;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class CotizacionesController extends Controller {

    public function listCotizacion() {
        abort_if(Gate::denies('cotizacion_index'), 403);
        $cotizaciones = Cotizacion::join('users', 'cotizacions.id_empleado', '=', 'users.id')
                    ->join('clientes', 'cotizacions.id_cliente', '=', 'clientes.id_cliente')
                    ->select('cotizacions.folio', 'cotizacions.autizado', 'users.name', 'cotizacions.total', 'cotizacions.tipo', 'clientes.nombre_compania', 'cotizacions.created_at')
                    ->paginate(15);
        //return response()->json(['cotizaciones' => $cotizaciones]);
        return view('cotizaciones/listado')->with(['cotizaciones' => $cotizaciones]);
    }
    
    public function showCotizacion($id) {
        $cotizacion = Cotizacion::join('users', 'cotizacions.id_empleado', '=', 'users.id')
                    ->join('clientes', 'cotizacions.id_cliente', '=', 'clientes.id_cliente')
                    ->select('clientes.*', 'cotizacions.folio', 'cotizacions.tipo', 'cotizacions.subtotal', 'cotizacions.ganancias', 'cotizacions.descuento', 'cotizacions.impuestos', 'cotizacions.total', 'cotizacions.created_at AS fecha_creacion', 'users.name')
                    ->where('cotizacions.folio', '=', $id)
                    ->get();
        $detalles = Cotizacion::join('detalles', 'cotizacions.folio', '=', 'detalles.folio')
                    ->join('productos', 'detalles.id_prenda', '=', 'productos.id')
                    ->select('detalles.*', 'productos.*')
                    ->where('cotizacions.folio', '=', $id)
                    ->get();
        //return response()->json(['cotizacion' => $cotizacion, 'detalles' => $detalles]);
        return view('cotizaciones/detalles')->with(['cotizacion' => $cotizacion, 'detalles' => $detalles]);
    }

    public function formCotizacion() {
        $clientes = Clientes::all();
        $categorias = Categorias::all();
        $folio = \DB::select('SELECT MAX(folio) as folio FROM cotizacions');
        return view('cotizaciones/cotizacion')
            ->with([
                'clientes' => $clientes,
                'categorias' => $categorias,
                'folio'     => $folio,
            ]);
    }

    public function infoCliente(Request $request){
        $id_cliente = $request->get('id_cliente');
        $cliente = Clientes::findOrFail($id_cliente);
        //dd($cliente);
        return view("cotizaciones/datos_cliente")->with(['cliente'=> $cliente]);
    }

    public function select_Prendas(Request $request){
        $id_categoria = $request->get('id_categoria');
        $prenda = Prendas::where('id_categoria', '=', $id_categoria)->get();
        //dd($prenda);
        return view("cotizaciones/select_prendas")->with(['prendas'=> $prenda]);
    }

    public function infoPrenda(Request $request){
        $id_prenda = $request->get('id_prenda');
        $prenda = Prendas::where('id', '=', $id_prenda)->get();
        //dd($prenda);
        return view("cotizaciones/datos_prenda")->with(['prendas'=> $prenda]);
    }

    public function registrarCotizacion(Request $request) {
        //dd($request);
        $request -> validate([
            'subtotal'=> 'required',
            'ganancias'=> 'required',
            'impuestos'=> 'required',
            'total'=> 'required'
        ]);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $cotizacion = new Cotizacion;
        $cotizacion->id_empleado = request('idEmpleado');
        $cotizacion->id_cliente = request('idCliente');
        $cotizacion->tipo = 'Precotización';
        $cotizacion->subtotal = request('subtotal');
        $cotizacion->descuento = request('subdesc');
        $cotizacion->impuestos = request('impuestos');
        $cotizacion->total = request('total');
        $cotizacion->anticipo = request('anticipo');
        $cotizacion->resto = request('resto');
        $cotizacion->ganancias = request('ganancias');
        $cotizacion->created_at = $fecha;
        $cotizacion->updated_at = $fecha;
        $cotizacion->save();

        $folio = $request->get('folioCot');
        $id_prenda = $request->get('id_prenda');
        $comentariosPrenda = $request->get("comentariosPrenda");
        $descuento = $request->get('porcentaje');
        $cantidad = $request->get('cantidad');
        $importe = $request->get('importe');
        $cont = 0;
        while($cont < count($id_prenda)){
            $detalles = new Detalles;
            $detalles->folio = $request->get('folioCot');
            $detalles->id_prenda = $id_prenda[$cont];
            $detalles->costo_unitario = 200;
            if(isset($comentariosPrenda[$cont])) {
                $detalles->comentariosPrenda = $comentariosPrenda[$cont];
            } else {
                $detalles->comentariosPrenda = '';
            }
            $detalles->cantidad = $cantidad[$cont];
            $detalles->descuento = $descuento[$cont];
            $detalles->importe = $importe[$cont];
            $cotizacion->created_at = $fecha;
            $cotizacion->updated_at = $fecha;
            $detalles->save();
            $cont = $cont+1;
        }

        return redirect()->route('detalleCotizacion',['id'=>$folio]);
    }

    public function autorizar(Request $request, $id){
        $autorizacion = Cotizacion::find($id);
        $autorizacion->autizado = true;
        $autorizacion->id_autorizacion = $request->get('id_autorizacion');
        $autorizacion->tipo = 'Cotización';
        $autorizacion->update();
        return redirect()->route('detalleCotizacion',['id'=>$id]);
    }

    public function comprobanteCotizacion($id){
        $cotizacion = Cotizacion::join('users', 'cotizacions.id_empleado', '=', 'users.id')
                    ->join('clientes', 'cotizacions.id_cliente', '=', 'clientes.id_cliente')
                    ->select('clientes.*', 'cotizacions.folio', 'cotizacions.tipo', 'cotizacions.subtotal', 'cotizacions.descuento', 'cotizacions.impuestos', 'cotizacions.total', 'cotizacions.created_at AS fecha_creacion', 'users.name')
                    ->where('cotizacions.folio', '=', $id)
                    ->get();
        $detalles = Cotizacion::join('detalles', 'cotizacions.folio', '=', 'detalles.folio')
                    ->join('productos', 'detalles.id_prenda', '=', 'productos.id')
                    ->select('detalles.*', 'productos.*')
                    ->where('cotizacions.folio', '=', $id)
                    ->get();
        $pdf = Pdf::loadView('cotizaciones/comprobante', compact('cotizacion', 'detalles'));

        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d');
        return $pdf->stream('Comprobante_Cotización_' . $fecha . '.pdf');
    }
}
