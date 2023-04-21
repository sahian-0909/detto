<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Cliente;
use Illuminate\Support\Facades\Gate;

class ClientesController extends Controller
{
    //Clientes
    public function listClientes() {
        abort_if(Gate::denies('cliente_index'), 403);
        $clientes = Cliente::all()->where('activo', '=', '1');
        return view('clientes/clientes/listado')->with('clientes', $clientes);
    }

    public function listClientesArc() {
        $clientes = Cliente::all()->where('activo', '=', '0');
        return view('clientes/clientes/archivados')->with('clientes', $clientes);
    }    
    
    public function createCliente(){
        return view('clientes/clientes/nuevo');
    }

    public function storeCliente(Request $request) {
        //dd($request);
        if($request->hasfile('fotoCliente')){
            $imagen = $request->file('fotoCliente');
            $destinationPath =('imagenes/clientes');
            $filename =time().'-'.$imagen->getClientOriginalName();
            $uploadSuccess= $request->file('fotoCliente')->move($destinationPath,$filename);
        }

        $clientes = Cliente::create($request->all());
        /* $cliente = new Clientes;
        $cliente->nombre_compania = $request->get('nombreComp');
        $cliente->razon_social = $request->get('rsComp');
        $cliente->nombre_contacto = $request->get('nombreCont');
        $cliente->puesto_contacto = $request->get('ceoCont');
        $cliente->correo_compania = $request->get('emailComp');
        $cliente->correo_contacto = $request->get('emailCont');
        $cliente->telefono_compania = $request->get('telComp');
        $cliente->telefono_contacto = $request->get('telCont');
        $cliente->domicilio_compania = $request->get('domComp');        
        $cliente->fotoCliente = $request->get('fotoCliente');        
        $cliente->save(); */

        return redirect()->to('clientes');
    }

    public function js00(Request $request) {
        $id = $request->get('id');

        $cliente = Cliente::findOrFail($id);
        //dd($producto);
        return view("clientes/clientes/js_00")->with(["cliente" => $cliente]);
    }

    public function showCliente($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes/clientes/detalles')->with('cliente', $cliente);
    }

    public function updateCliente(Request $request, $id) {
        //dd($request);
        $cliente = Cliente::find($id);
        $cliente->nombre_compania = $request->get('nombreComp');
        $cliente->razon_social = $request->get('rsComp');
        $cliente->nombre_contacto = $request->get('nombreCont');
        $cliente->puesto_contacto = $request->get('ceoCont');
        $cliente->correo_compania = $request->get('emailComp');
        $cliente->correo_contacto = $request->get('emailCont');
        $cliente->telefono_compania = $request->get('telComp');
        $cliente->telefono_contacto = $request->get('telCont');
        $cliente->domicilio_compania = $request->get('domComp');
        $cliente->update();

        return redirect()->to('clientes');
    }

    public function deleteLCliente($id) {
        $cliente = Cliente::find($id);
        $cliente->activo = 0;
        $cliente->update();
        return redirect()->to('clientes');
    }

    public function activateCliente($id) {
        $cliente = Cliente::find($id);
        $cliente->activo = 1;
        $cliente->update();
        return redirect()->to('clientes');
    }

    public function deleteFCliente($id) {
        Cliente::destroy($id);
        return redirect()->to('clientes');
    }

    public function createPDFClientes(){
        $clientes = Cliente::all();
        $pdf = PDF::loadView('clientes/clientes/pdf', ['clientes' => $clientes]);
        return $pdf->stream();
        //return $pdf->download('Reporte_Clientes_Detto.pdf');
    }
}
