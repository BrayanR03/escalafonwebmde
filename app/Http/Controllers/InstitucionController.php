<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institucion;
use App\Http\Requests\CreateInstitucionRequest;
class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institucion=Institucion::get();
        return view('institucion',compact('institucion'));
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
    public function store(CreateInstitucionRequest $request)
    {
        $institucion=new Institucion($request->validated());
        $institucion->save();
        return redirect()->route('institucion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $institucion=Institucion::where('Nombre','LIKE','%'.$query.'%')->get();
        if ($institucion->isEmpty()) {
            $institucion=[];
        }
        return view('institucion',compact('institucion'));
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
        $nombre=$request->input('Nombre-modal-institucion');
        $idinstitucion=$request->input('idInstitucion');
        Institucion::where('idInstitucion',$idinstitucion)->update([
            'Nombre'=>$nombre
        ]);

        return redirect()->route('institucion.index')->with('success','Institucion Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idinstitucion=$request->input('idInstitucionEliminar');
        $institucion=Institucion::find($idinstitucion);
        if ($institucion) {
            $institucion->delete();
            return redirect()->route('institucion.index')->with('success','Institucion Eliminada Correctamente');
        } else {
            return redirect()->route('institucion.index')->with('success','No se Encontro la Institucion');
            # code...
        }
        
    }
}
