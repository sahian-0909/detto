<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria as CategoriasModel;

class CategoriaController extends Controller
{
    public function indexCategoria(){
        $categorias = CategoriasModel::all();
        return view ('categorias.indexcategorias')->with(['categorias'=>$categorias]);
    }

    public function salvarCategoria(Request $request){
        $request -> validate([
            'categoria'=> 'required'
        ]);
        $al = CategoriasModel::create(array(
            'categoria' => $request->input('categoria'),
        ));
        return redirect()->route('indexCategoria');
    }

    public function detalleCategoria($id){
        $categoria = CategoriasModel::find($id);
        return view ('categorias.detalleCategoria')->with(['categoria'=>$categoria]);
    }
    public function borrarCategoria(CategoriasModel $id){
        $id->delete();
        return redirect()->route('indexCategoria');
    }
    
    public function editarCategoria(CategoriasModel $id){
        return view('categorias.editarcategoria')-> with(['categoria'=> $id]); 
    }

    public function agregarCategoria(){
        return view('categorias.formcategoria');
    }

    public function actualizarCategoria(CategoriasModel $id,Request $request){
        $request -> validate([
            'categoria' => 'required'
        ]);
        $query = CategoriasModel::find($id->id);
        $query->categoria = $request->categoria;
        $query->save();
        return redirect()->route('detalleCategoria',['id'=>$id->id]);
    }
}
