<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kilometraje;
use Illuminate\Support\Facades\Gate;

class KilometrajeController extends Controller
{
    public function index(){
        abort_if(Gate::denies('kilometraje_index'), 403);
        $kilometrajes = Kilometraje::all();
        return view ('kilometraje.index')->with(['kilometrajes'=>$kilometrajes]);
    }

    public function edit(Kilometraje $kilometraje)
    {
        return view('kilometraje.edit', compact('kilometraje'));
    }

    public function update(Request $request, Kilometraje $kilometraje)
    {
        $request -> validate([
            'costo' => 'required|numeric'
        ]);
        $query = Kilometraje::find($kilometraje->id);
        $query->costo = $request->costo;
        $query->save();
        return redirect()->route('kilometrajes.index');

    }

    public function create(){
        return view('kilometraje.create');
    }

    public function store(Request $request){
        $request -> validate([
            'costo'=> 'required'
        ]);
        $save = Kilometraje::create(array(
            'costo' => $request->input('costo'),
        ));
        return redirect()->route('kilometrajes.index');
    }
}