<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen as AlmacenModel;
use App\Models\Cliente as ClientesModel;
use App\Models\User as EmpleadosModel;
use App\Models\Producto as Prendas;
use App\Models\detalleal as Detalle;
use App\Models\Categoria as Categorias;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AlmacenController extends Controller {
    
    public function listAlmacen(){
        abort_if(Gate::denies('almacen_index'), 403);
        $almacenes = AlmacenModel::all();
        $clientes = ClientesModel::all();
        $empleados = EmpleadosModel::all(); 
        return view ('almacen/indexalmacen')->with(['almacenes'=>$almacenes])->with(['clientes'=>$clientes])->with(['empleados'=>$empleados]);
    }

    public function createAlmacen(){
        $folio = \DB::select('SELECT MAX(id) as folio FROM tb_almacen');
        $clientes = ClientesModel::all();
        $prendas = Prendas::all();
        $categorias = Categorias::all();
        return view('almacen/formalmacen')->with(['clientes'=>$clientes])->with(['prendas'=>$prendas])->with(['categorias'=>$categorias])->with(['folio'=>$folio]);
    }

    public function storeAlmacen (Request $request){
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $almacen = new AlmacenModel;
        $almacen->id_empleado = request('id_empleado');
        $almacen->id_autorizacion = request('id_autorizacion');
        $almacen->id_cliente = request('id_cliente');
        $almacen->comentarios = request('comentarios');
        $almacen->dia_salida = $fecha;
        $almacen->save();

        $folio = $request->get('folio');
        $id_prenda = $request->get('id_prenda');
        $tip_entrega = $request->get('tip_entrega');
        $tip_prenda = $request->get('tip_prenda');
        $producto = $request->get('producto');
        $color = $request->get('color');
        $codigo = $request->get('codigo');
        $tallas = $request->get('tallas');

        $cont = 0;
        while($cont < count($id_prenda)){
            $detalle = new Detalle;
            $detalle->folio = $folio;
            $detalle->id_prenda = $id_prenda[$cont];
            $detalle->tip_entrega = $tip_entrega[$cont];
            $detalle->tip_prenda = $tip_prenda[$cont];
            $detalle->producto = $producto[$cont];
            $detalle->color = $color[$cont];
            $detalle->codigo = $codigo[$cont];
            $detalle->tallas = $tallas[$cont];
            $detalle->save();
            $cont = $cont+1;
        }
        return redirect()->to('almacen/');
    }

    public function showAlmacen($id) {
        $folio= $id;
        $detalles = Detalle::where('folio', '=', $folio)->get();
        $almacenes = AlmacenModel::findOrFail($id);
        $users = EmpleadosModel::all();
        $clientes = ClientesModel::all();
        return view('almacen/detalle')->with('almacenes', $almacenes)->with('detalles', $detalles)->with('users', $users)->with('clientes', $clientes);
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
        return view('almacen/editar')->with(['almacen'=> $id])->with(['almacenes'=>$almacenes])->with(['clientes'=>$clientes]); 
    }

    public function deleteAlmacen(AlmacenModel $id){
        abort_if(Gate::denies('almacen_destroy'), 403);
        $id->delete();
        return redirect()->to('almacen/');
    }

    public function infoPrenda(Request $request){
        $id_prenda = $request->get('id_prenda');
        $prenda = Prendas::where('id', '=', $id_prenda)->get();
        //dd($prenda);
        return view("almacen/datosprenda")->with(['prendas'=> $prenda]);
    }

    public function infoCategoria(){
        $categorias = Categorias::all();
        //dd($cliente);
        return view("almacen/datos_categoria")->with(['categorias'=> $categorias]);
    }

    public function infoProducto(Request $request){
        $id_categoria = $request->get('id_categoria');
        $prendas = Prendas::where('id_categoria', '=', $id_categoria)->get();
        //dd($prenda);
        return view("almacen/datos_producto")->with(['prendas'=> $prendas]);
    }
    public function infoDiseno(){
        return view("almacen/datos_diseno");
    }

    public function infoEntrega(){
        return view("almacen/datos_entrega");
    }

    public function infoEntrega2(){
        return view("almacen/datos_entrega2");
    }

    public function entregaAlmacen(AlmacenModel $id){
        $almacenes = AlmacenModel::all();
        $clientes = ClientesModel::all();
        return view('almacen/entrega')->with(['almacen'=> $id])->with(['almacenes'=>$almacenes])->with(['clientes'=>$clientes]); 
    }
    public function entregarAlmacen(Request $request, $id) {
        //dd($request);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $almacen = AlmacenModel::find($id);
        $almacen->id_empleado = $request->get('id_empleado');
        $almacen->id_cliente = $request->get('id_cliente');
        $almacen->id_autorizacion = $request->get('id_autorizacion');
        $almacen->dia_entrada = $fecha;
        $almacen->entregado = $request->get('entregado');
        $almacen->comentarios = $request->get('comentarios');
        $almacen->update();
        return redirect()->to('almacen/');
    }
}
