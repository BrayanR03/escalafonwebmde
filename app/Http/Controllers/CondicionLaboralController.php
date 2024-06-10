<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCondicionLaboralRequest;
use App\Models\CondicionLaboral;
class CondicionLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $condicionlaboral=CondicionLaboral::get();
        return view('condicionlaboral',compact('condicionlaboral'));
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
    public function store(CreateCondicionLaboralRequest $request)
    {
        $condicionlaboral=new CondicionLaboral($request->validated());
        $condicionlaboral->save();
        return redirect()->route('condicionlaboral.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $condicionlaboral=CondicionLaboral::where('Descripcion','LIKE','%'.$query.'%')->get();
        if ($condicionlaboral->isEmpty()) {
            $condicionlaboral=[];
        }
        return view('condicionlaboral',compact('condicionlaboral'));
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
        $descripcion=$request->input('Nombre-modal-condicionlaboral');
        $idcondicionlaboral=$request->input('idCondicionLaboral');
        CondicionLaboral::where('idCondicionLaboral',$idcondicionlaboral)->update([
            'Descripcion'=>$descripcion
        ]);
        return redirect()->route('condicionlaboral.index')->with('success','La Condicion Laboral, se Actualizo Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idcondicionlaboral=$request->input('idCondicionLaboralEliminar');
        $condicionlaboral=CondicionLaboral::find($idcondicionlaboral);
        if ($condicionlaboral) {
            $condicionlaboral->delete();
            return redirect()->route('condicionlaboral.index')->with('success','Se Elimo la Condicion Laboral Correctamente');

        } else {
            return redirect()->route('condicionlaboral.index')->with('success','No se encontro la condicion laboral');
        }
        
    }
}
