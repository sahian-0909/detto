<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen as AlmacenModel;
use App\Models\Cliente as ClientesModel;
use App\Models\User as EmpleadosModel;
use App\Models\Producto as Prendas;
use App\Models\detalleal as Detalle;
use App\Models\Categoria as Categorias;
use App\Models\Tallas as TallasModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AlmacenController extends Controller {
    
    public function listAlmacen(Request $request){
        abort_if(Gate::denies('almacen_index'), 403);
        $empleado = $request->empleado;
        $estatus = $request->estatus;
        $fecha = $request->fecha;
        if ($empleado != '') {
            $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                ->paginate(15);
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                    ->where('entregado', '=', $estatus)
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                        ->where('entregado', '=', $estatus)
                        ->where('dia_salida', '=', $fecha)
                        ->paginate(15);
                }
            }
        } else {
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                        ->where('dia_salida', '=', $fecha)
                        ->paginate(15);
                }
            } else {
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('dia_salida', 'LIKE', '%' . $fecha . '%')
                        ->paginate(15);
                } else {
                    $almacenes = AlmacenModel::paginate(15);
                }
            }
        }
        $clientes = ClientesModel::paginate(15);
        $empleados = EmpleadosModel::paginate(15);
        return view('almacen/indexalmacen')->with(['almacenes' => $almacenes])->with(['clientes' => $clientes])->with(['empleados' => $empleados]);
    }

    public function createAlmacen(){
        $folio = \DB::select('SELECT MAX(folio) as folio FROM tb_almacen');
        $clientes = ClientesModel::all();
        $prendas = Prendas::all();
        $categorias = Categorias::all();
        $tallas = TallasModel::all();
        return view('almacen/formalmacen')->with(['clientes' => $clientes])->with(['prendas' => $prendas])->with(['categorias' => $categorias])->with(['folio' => $folio])->with(['tallas' => $tallas]);
    }

    public function storeAlmacen (Request $request){
        //dd($request);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d');
        $almacen = new AlmacenModel;
        $almacen->id_empleado = request('id_empleado');
        $almacen->id_cliente = request('id_cliente');
        $almacen->autorizado = request('autorizado');
        $almacen->comentarios = request('comentarios');
        $almacen->entregado = 0;
        $almacen->tipo = request('tip_entrega');
        if ($request->filled('dia_salida')) {
            $almacen->dia_salida = request('dia_salida');
        } else {
            $almacen->dia_salida = $fecha;
        }
        $almacen->save();

        $folio = $request->get('folio');
        $id_prenda = $request->get('id_prenda');
        $tip_prenda = $request->get('tip_prenda');
        $producto = $request->get('producto');
        $color = $request->get('color');
        $codigo = $request->get('codigo');
        $tallas = $request->get('tallas');

        $cont = 0;
        while ($cont < count($id_prenda)) {
            $detalle = new Detalle;
            $detalle->folio = $folio;
            $detalle->id_prenda = $id_prenda[$cont];
            $detalle->tip_prenda = $tip_prenda[$cont];
            $detalle->producto = $producto[$cont];
            $detalle->color = $color[$cont];
            $detalle->codigo = $codigo[$cont];
            $detalle->tallas = $tallas[$cont];
            $detalle->devolucion = 0;
            $detalle->comentarios = '';
            $detalle->save();
            $cont = $cont + 1;
        }
        return redirect()->to('almacen/');
    }

    public function showAlmacen($id) {
        $almacen = AlmacenModel::join('users', 'tb_almacen.id_empleado', '=', 'users.id')
            ->join('clientes', 'tb_almacen.id_cliente', '=', 'clientes.id_cliente')
            ->select('clientes.*', 'tb_almacen.folio', 'tb_almacen.tipo', 'tb_almacen.entregado', 'tb_almacen.autorizado', 'users.name')
            ->where('tb_almacen.folio', '=', $id)
            ->get();
        $detalles = AlmacenModel::join('tb_detalleal', 'tb_almacen.folio', '=', 'tb_detalleal.folio')
        ->join('productos', 'tb_detalleal.id_prenda', '=', 'productos.id')
        ->select('tb_detalleal.*', 'productos.*')
        ->where('tb_almacen.folio', '=', $id)
        ->get();
        return view('almacen/detalle')->with(['almacen' => $almacen, 'detalles' => $detalles]);
    }

    public function updateAlmacen(Request $request, $id) {
        //dd($request);
        $almacen = AlmacenModel::find($id);
        $almacen->id_empleado = $request->get('id_empleado');
        $almacen->id_cliente = $request->get('id_cliente');
        $almacen->id_autorizacion = $request->get('id_autorizacion');
        $almacen->dia_salida = $request->get('dia_salida');
        $almacen->dia_entrada = $request->get('dia_entrada');
        $almacen->comentarios = $request->get('comentarios');
        $almacen->update();
        return redirect()->to('almacen/');
    }

    public function editarAlmacen(AlmacenModel $id){
        $almacenes = AlmacenModel::all();
        $clientes = ClientesModel::all();
        return view('almacen/editar')->with(['almacen' => $id])->with(['almacenes' => $almacenes])->with(['clientes' => $clientes]);
    }

    public function deleteAlmacen(AlmacenModel $id){
        abort_if(Gate::denies('almacen_destroy'), 403);
        $id->delete();
        return redirect()->to('almacen/');
    }

    public function infoPrenda(Request $request){
        $id_prenda = $request->get('id_prenda');
        $prenda = Prendas::where('id', '=', $id_prenda)->get();
        $tallas = TallasModel::where('id_prenda', '=', $id_prenda)->get();
        //dd($prenda);
        return view("almacen/datosprenda")->with(['prendas' => $prenda])->with(['tallas' => $tallas]);
    }

    public function infoCategoria(){
        $categorias = Categorias::all();
        //dd($cliente);
        return view("almacen/datos_categoria")->with(['categorias' => $categorias]);
    }

    public function infoProducto(Request $request){
        $id_categoria = $request->get('id_categoria');
        $prendas = Prendas::where('id_categoria', '=', $id_categoria)->get();
        //dd($prenda);
        return view("almacen/datos_producto")->with(['prendas' => $prendas]);
    }
    public function infoDiseno(){
        $prendas = Prendas::where('id_categoria', '=', '4')->get();
        //dd($prenda);
        return view("almacen/datos_producto")->with(['prendas' => $prendas]);
        //return view("almacen/datos_diseno");
    }

    public function infoEntrega(){
        return view("almacen/datos_entrega");
    }

    public function infoEntrega2(){
        return view("almacen/datos_entrega2");
    }

    public function entregaAlmacen($id){
        $almacen = AlmacenModel::join('users', 'tb_almacen.id_empleado', '=', 'users.id')
            ->join('clientes', 'tb_almacen.id_cliente', '=', 'clientes.id_cliente')
            ->select('clientes.*', 'tb_almacen.folio as folio', 'tb_almacen.tipo', 'users.name')
            ->where('tb_almacen.folio', '=', $id)
            ->get();
        $detalles = AlmacenModel::join('tb_detalleal', 'tb_almacen.folio', '=', 'tb_detalleal.folio')
            ->join('productos', 'tb_detalleal.id_prenda', '=', 'productos.id')
            ->select('tb_detalleal.folio AS id_detalle', 'productos.*')
            ->where('tb_almacen.folio', '=', $id)
            ->get();
        return view('almacen/entrega')->with(['almacen' => $almacen, 'detalles' => $detalles]);
    }
    public function devolucionPrendas(Request $request, $id) {
        //dd($request);
        $almacen = AlmacenModel::find($id);
        $almacen->entregado = $request->get('estatus');
        $almacen->update();

        $id_detalle = $request->get('id_detalle');
        $devolucion = $request->get('devolucion');
        $comentarios = $request->get('comentariosEntrega');
        $folio = $request->get('folio');

        $cont = 0;
        while($cont < count($id_detalle)){
            $detalle = Detalle::find($id_detalle[$cont]);
            $detalle->devolucion = $devolucion[$cont];
            $detalle->comentarios = $comentarios[$cont];
            $detalle->update();
            $cont = $cont + 1;
        }

        return redirect()->route('detalleMuestrario',['id'=>$folio]);
    }

    public function muestras(Request $request) {
        $empleado = $request->empleado;
        $estatus = $request->estatus;
        $fecha = $request->fecha;
        if ($empleado != '') {
            $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                ->where('tipo', '=', "Muestra")
                ->paginate(15);
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                    ->where('entregado', '=', $estatus)
                    ->where('tipo', '=', "Muestra")
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                        ->where('entregado', '=', $estatus)
                        ->where('dia_salida', '=', $fecha)
                        ->where('tipo', '=', "Muestra")
                        ->paginate(15);
                }
            }
        } else {
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                    ->where('tipo', '=', "Muestra")
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                        ->where('tipo', '=', "Muestra")
                        ->where('dia_salida', '=', $fecha)
                        ->paginate(15);
                }
            } else {
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('dia_salida', 'LIKE', '%' . $fecha . '%')
                        ->where('tipo', '=', "Muestra")
                        ->paginate(15);
                } else {
                    $almacenes = AlmacenModel::where('tipo', '=', "Muestra")->paginate(15);
                }
            }
        }
        //$almacenes = AlmacenModel::paginate(15);
        $clientes = ClientesModel::paginate(15);
        $empleados = EmpleadosModel::paginate(15);
        return view('almacen/indexalmacenmuestras')->with(['almacenes' => $almacenes])->with(['clientes' => $clientes])->with(['empleados' => $empleados]);
    }

    public function corridas(Request $request) {
        $empleado = $request->empleado;
        $estatus = $request->estatus;
        $fecha = $request->fecha;
        if ($empleado != '') {
            $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                ->where('tipo', '=', "Corrida")
                ->paginate(15);
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                    ->where('entregado', '=', $estatus)
                    ->where('tipo', '=', "Corrida")
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('id_empleado', 'LIKE', '%' . $empleado . '%')
                        ->where('entregado', '=', $estatus)
                        ->where('dia_salida', '=', $fecha)
                        ->where('tipo', '=', "Corrida")
                        ->paginate(15);
                }
            }
        } else {
            if ($estatus != '') {
                $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                    ->where('tipo', '=', "Corrida")
                    ->paginate(15);
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('entregado', '=', $estatus)
                        ->where('tipo', '=', "Corrida")
                        ->where('dia_salida', '=', $fecha)
                        ->paginate(15);
                }
            } else {
                if ($fecha != '') {
                    $almacenes = AlmacenModel::where('dia_salida', 'LIKE', '%' . $fecha . '%')
                        ->where('tipo', '=', "Corrida")
                        ->paginate(15);
                } else {
                    $almacenes = AlmacenModel::where('tipo', '=', "Corrida")->paginate(15);
                }
            }
        }
        //$almacenes = AlmacenModel::paginate(15);
        $clientes = ClientesModel::paginate(15);
        $empleados = EmpleadosModel::paginate(15);
        return view('almacen/indexalmacencorrida')->with(['almacenes' => $almacenes])->with(['clientes' => $clientes])->with(['empleados' => $empleados]);
    }

    public function autorizar(Request $request, $id){
        $autorizacion = AlmacenModel::find($id);
        $autorizacion->autorizado = 1;
        $autorizacion->update();
        return redirect()->route('detalleMuestrario',['id'=>$id]);
    }
}
