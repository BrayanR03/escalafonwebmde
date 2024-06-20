<?php

namespace App\Http\Controllers;
use App\Models\Estudio;
use App\Models\Institucion;
use App\Models\NivelEstudio;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class EstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituciones=Institucion::get();
        $nivelestudios=NivelEstudio::get();
        $trabajadores=[];
        return view('estudios',compact('instituciones','nivelestudios','trabajadores'));
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
        $query=$request->input('search');
        $trabajadores = Trabajador::where('Dni', 'LIKE', '%' . $query . '%')
        ->orWhere('ApellidoPaterno', 'LIKE', '%' . $query . '%')
        ->get();
        if($trabajadores->isEmpty()){
            $trabajadores=[];
        }
        
        $instituciones=Institucion::get();
        $nivelestudios=NivelEstudio::get();
        // dd($trabajadores);
        return view('estudios',compact('instituciones','nivelestudios','trabajadores'));
        // return view('estudios',compact('trabajadores'));
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
