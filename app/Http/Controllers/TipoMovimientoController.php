<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoMovimiento;
use App\Http\Requests\CreateTipoMovimientoRequest;
class TipoMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipomovimiento=TipoMovimiento::get();
        return view('tipomovimiento',compact('tipomovimiento'));
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
    public function store(CreateTipoMovimientoRequest $request)
    {
        $tipomovimiento=new TipoMovimiento($request->validated());
        $tipomovimiento->save();
        return redirect()->route('tipomovimiento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query=$request->input('search');
        $tipomovimiento=TipoMovimiento::where('Descripcion','LIKE','%'.$query.'%')->get();
        
        if ($tipomovimiento->isEmpty()) {
            $tipomovimiento=[];
        }
        return view('tipomovimiento',compact('tipomovimiento'));
        
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
        $descripcion=$request->input('Nombre-modal-tipomovimiento');
        $idtipomovimiento=$request->input('idTipoMov');
        TipoMovimiento::where('idTipoMov',$idtipomovimiento)->update([
            'Descripcion'=>$descripcion
        ]);
        return redirect()->route('tipomovimiento.index')->with('success','Tipo Movimiento Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idtipomovimiento=$request->input('idTipoMovimientoEliminar');
        $tipomovimiento=TipoMovimiento::find($idtipomovimiento);
        if ($tipomovimiento) {
            $tipomovimiento->delete();
            return redirect()->route('tipomovimiento.index')->with('success','Tipo Movimiento Eliminado Correctamente');
        } else {
            return redirect()->route('tipomovimiento.index')->with('No se encontro el tipo de movimiento');
        }
        
    }
}
