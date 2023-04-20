<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto as ProductosModel;
use App\Models\Categoria as CategoriasModel;

class ProductoController extends Controller
{
    public function indexProducto(){
        $productos = ProductosModel::all();
        return view ('productos/indexproductos')->with(['productos'=>$productos]);
    }

    public function agregarProducto(){
        $categorias = CategoriasModel::all();
        return view('productos/formproducto')-> with(['categorias'=>$categorias]);
    }

    public function salvarProducto(Request $request){
        $request -> validate([
            'codigo'=> 'required',
            'producto'=> 'required',
            'descripcion'=> 'required',
            'unidad'=> 'required',
            'materiales'=> 'required',
            'talla'=> 'required',
            'precio'=> 'required',
            'sexo'=> 'required',
            'color'=> 'required',
            'id_categoria'=> 'required',
        ]);
        if($request->hasfile('imagen')){
            $imagen = $request->file('imagen');
            $destinationPath =('imagenes');
            $filename =time().'-'.$imagen->getClientOriginalName();
            $uploadSuccess= $request->file('imagen')->move($destinationPath,$filename);
        }
        $al = ProductosModel::create(array(
            'codigo' => $request->input('codigo'),
            'producto' => $request->input('producto'),
            'descripcion' => $request->input('descripcion'),
            'unidad' => $request->input('unidad'),
            'materiales' => $request->input('materiales'),
            'talla' => $request->input('talla'),
            'precio' => $request->input('precio'),
            'sexo' => $request->input('sexo'),
            'color' => $request->input('color'),
            'imagen' => $filename,
            'id_categoria' => $request->input('id_categoria'),
        ));
        return redirect()->to('productos/');
    }

    public function detalleProducto($id){
        $producto = ProductosModel::find($id);
        $categorias = CategoriasModel::all();
        return view ('productos/detalleproducto')->with(['producto'=>$producto])->with(['categorias'=>$categorias]);
    }

    public function borrarProducto(ProductosModel $id){
        $id->delete();
        return redirect()->route('productos/');
    }

    public function editarProducto(ProductosModel $id){
        $categorias = CategoriasModel::all();
        return view('productos/editarproducto')->with(['producto'=> $id])->with(['categorias'=>$categorias]); 
    }

    public function actualizarProducto(ProductosModel $id,Request $request){
        $request -> validate([
            'codigo'=> 'required',
            'producto'=> 'required',
            'descripcion'=> 'required',
            'unidad'=> 'required',
            'materiales'=> 'required',
            'talla'=> 'required',
            'precio'=> 'required',
            'sexo'=> 'required',
            'color'=> 'required',
            'id_categoria'=> 'required',
        ]);
        $query = ProductosModel::find($id->id);
        $query->codigo = $request->codigo;
        $query->producto = $request->producto;
        $query->descripcion = $request->descripcion;
        $query->unidad = $request->unidad;
        $query->materiales = $request->materiales;
        $query->talla = $request->talla;
        $query->precio = $request->precio;
        $query->sexo = $request->sexo;
        $query->color = $request->color;
        //$query->imagen = $request->imagen;
        $query->id_categoria = $request->id_categoria;
        $query->update();
        return redirect()->route('detalleProducto',['id'=>$id->id]);
    }
}