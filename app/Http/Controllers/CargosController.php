<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Http\Requests\CreateCargosRequest;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos=Cargo::get();
        return view('cargos',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCargosRequest $request)
    {
        $cargos=new Cargo($request->validated());
        $cargos->save();
        return redirect()->route('cargos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $cargos=Cargo::where('Nombre','LIKE','%'.$query.'%')->get();

        if($cargos->isEmpty()){
            $cargos=[];
        }
        return view('cargos',compact('cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $nombre=$request->input('Nombre-modal-cargo');
        $idcargo=$request->input('idCargo');

        Cargo::where('idCargo',$idcargo)->update([
            'Nombre'=>$nombre
        ]);
        return redirect()->route('cargos.index')->with('success','Cargo Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idcargo=$request->input('idCargoEliminar');
        $cargo=Cargo::find($idcargo);
        if ($cargo) {
            $cargo->delete();
            return redirect()->route('cargos.index')->with('success','Cargo Eliminado Correctamente');
        } else {
            return redirect()->route('cargos.index')->with('success','No se encontro el cargo');
        }
        
    }
}
