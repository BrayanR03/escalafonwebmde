<?php

namespace App\Http\Controllers;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use App\Models\Trabajador;
class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimientos=Movimiento::where('idTrabajador',$trabajador->idTrabajador)->paginate(10);
        if(!$movimientos){
            $movimientos=[];
        }           
        return view('movimientos');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = $request->input('search');
        $trabajador=Trabajador::where('Dni',$query)->first();
        // dd($trabajador);
        // dd($trabajador);
        $movimientos=Movimiento::where('idTrabajador',$trabajador->idTrabajador)->paginate(10);
        if(!$movimientos){
            $movimientos=[];
        }        
        // $instituciones = Institucion::get();
        // $nivelestudios = NivelEstudio::get();        
        return view('movimientos', compact('movimientos'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
