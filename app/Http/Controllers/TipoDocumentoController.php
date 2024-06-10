<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTipoDocumentoRequest;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipodocumento=TipoDocumento::get();
        return view('tipodocumento',compact('tipodocumento'));
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
    public function store(CreateTipoDocumentoRequest $request)
    {
        $tipodocumento=new TipoDocumento($request->validated());
        $tipodocumento->save();
        return redirect()->route('tipodocumento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $tipodocumento=TipoDocumento::where('Descripcion','LIKE','%'.$query.'%')->get();
        if($tipodocumento->isEmpty()){
            $tipodocumento=[];
        }
        return view('tipodocumento',compact('tipodocumento'));
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
        $descripcion=$request->input('Nombre-modal-tipodocumento');
        $idtipodocumento=$request->input('idTipoDoc');
        TipoDocumento::where('idTipoDoc',$idtipodocumento)->update([
            'Descripcion'=>$descripcion
        ]);
        return redirect()->route('tipodocumento.index')->with('success','Tipo Documento Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idtipodocumento=$request->input('idTipoDocumentoEliminar');
        $tipodocumento=TipoDocumento::find($idtipodocumento);
        if ($tipodocumento) {
            $tipodocumento->delete();
            return redirect()->route('tipodocumento.index')->with('success','Tipo Documento Eliminado Correctamente');

        } else {
            return redirect()->route('tipodocumento.index')->with('success','No se encontro el tipo de documento');
        }
        
    }
}
