<?php

namespace App\Http\Controllers;

use App\Models\NivelEstudio;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNivelEstudioRequest;

class NivelEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nivelestudio=NivelEstudio::get();
        //dd($nivelestudio);
        return view('nivelestudios',compact('nivelestudio'));
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
    public function store(CreateNivelEstudioRequest $request)
    {
        $nivelestudio=new NivelEstudio($request->validated());
        $nivelestudio->save();
        return redirect()->route('nivelestudio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $nivelestudio=NivelEstudio::where('Descripcion','LIKE','%'.$query.'%')->get();
        if ($nivelestudio->isEmpty()) {
            $nivelestudio=[];
        }
        return view('nivelestudios',compact('nivelestudio'));
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
        $descripcion=$request->input('Nombre-modal-nivelestudio');
        $idnivelestudio=$request->input('idNivelEstudio');
        NivelEstudio::where('idNivelEstudios',$idnivelestudio)->update([
            'Descripcion'=>$descripcion
        ]);
        return redirect()->route('nivelestudio.index')->with('success','Nivel Estudio Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idnivelestudio=$request->input('idNivelEstudioEliminar');
        $nivelestudio=NivelEstudio::find($idnivelestudio);
        if ($nivelestudio) {
            $nivelestudio->delete();
            return redirect()->route('nivelestudio.index')->with('success','Nivel Estudio Eliminado Correctamente');
        } else {
            return redirect()->route('nivelestudio.index')->with('success','Nivel Estudio Eliminado Correctamente');
            
        }
        
    }
}
