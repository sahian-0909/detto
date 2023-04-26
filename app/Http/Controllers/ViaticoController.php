<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Viatico;
use App\Models\Cliente;
use App\Models\Kilometraje;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ViaticoController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('viatico_index'), 403);
        $clientes = Cliente::get();
        $empleados = User::get();
        $user = Auth::user()->roles;
        $viaticos_admin = Viatico::paginate(15);
        $viaticos = Viatico::get();
        $empleados = User::get();
        $id_user = Auth::user()->id;
        $pendientes = Viatico::where('estatus', 'PENDIENTE')->count();
        return view('viaticos.index', compact('viaticos_admin', 'pendientes', 'empleados', 'user', 'viaticos', 'id_user', 'clientes'));
    }

    public function create()
    {
        $clientes = Cliente::get();
        $kilometrajes = Kilometraje::get();
        return view('viaticos.create', compact('clientes', 'kilometrajes'));
    }

    public function store(Request $request)
    {
        $kilometrajes = Kilometraje::get();
        foreach ($kilometrajes as $kilometraje) {
            $precio = $kilometraje->costo;
        }
        $request -> validate([
            'cliente_id' => 'required',
            'km' => 'required|numeric',
            'fecha' => 'date',
            'total' => 'numeric',
            'comentarios' => 'required|string',
        ]);
        $viatico = Viatico::create($request->all()+[
            'total' => (($request->km)*($precio)),
            'user_id'=>Auth::user()->id,
            'fecha' => Carbon::now('America/Mexico_City'),
        ]);

        return redirect()->route('viaticos.index')->with('success', 'Usuario actualizado correctamente');
        
    }

    public function show(Viatico $viatico)
    {
        $clientes = Cliente::get();
        $kilometrajes = Kilometraje::get();
        return view('viaticos.show', compact('clientes', 'kilometrajes', 'viatico'));
    }

    public function edit(Viatico $viatico)
    {
        $clientes = Cliente::get();
        $kilometrajes = Kilometraje::get();
        return view('viaticos.edit', compact('clientes', 'kilometrajes', 'viatico'));
    }

    public function update(Request $request, Viatico $viatico)
    {
        //
    }

    public function destroy(Viatico $viatico)
    {
        //
    }

    public function change_status(Viatico $viatico)
    {
        if ($viatico->estatus == 'PENDIENTE') {
            $viatico->update(['estatus'=>'PAGADO']);
            return redirect()->back();
        } else {
            $viatico->update(['estatus'=>'PENDIENTE']);
            return redirect()->back();
        } 
    }

    public function buscar(Request $request)
    {
        $user = Auth::user()->roles;
        $user_id = $request->get('user_id');
        $estatus = $request->get('estatus');
        $viaticos_admin = Viatico::where('user_id', $user_id)
            ->orwhere('estatus', $estatus)
            ->paginate(10);
        $empleados = User::get();
        $pendientes = Viatico::where('estatus', 'PENDIENTE')->count();
        return view('viaticos.index', compact('viaticos_admin', 'pendientes', 'empleados', 'user'));

    }
}

