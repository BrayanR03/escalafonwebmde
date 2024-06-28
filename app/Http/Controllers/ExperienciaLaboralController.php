<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienciaLaboral;
use App\Models\Institucion;
use App\Models\Cargo;
use App\Models\Trabajador;
use App\Http\Requests\CreateExperienciaLaboralRequest;
class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituciones=Institucion::get();
        // dd($instituciones);
        $cargos=Cargo::get();
        // $trabajadores=Trabajador::get();
        $experiencias=ExperienciaLaboral::paginate(10);
        return view('experiencia',compact('instituciones','cargos','experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituciones=Institucion::get();
        $cargos=Cargo::get();
        return view('experiencia.create',compact('instituciones','cargos'),[
            'experiencias'=>new ExperienciaLaboral
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExperienciaLaboralRequest $request)
    {
        // dd($request);
        $experiencias=new ExperienciaLaboral($request->validated());
        $experiencias->save();
        return redirect()->route('experiencias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = $request->input('search');
        $trabajador=Trabajador::where('Dni',$query)->first();
        // dd($trabajador);
        $experiencias=ExperienciaLaboral::where('idTrabajador',$trabajador->idTrabajador)->paginate(10);
        if($experiencias->isEmpty()){
            $experiencias=[];
        }        
        $instituciones = Institucion::get();
        $cargos = Cargo::get();        
        return view('experiencia', compact('experiencias','instituciones', 'cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExperienciaLaboral $experiencia)
    {
        $instituciones=Institucion::get();
        $cargos=Cargo::get();
        return view('experiencia.edit',compact('instituciones','cargos'),[
            'experiencias'=>$experiencia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateExperienciaLaboralRequest $request, ExperienciaLaboral $experiencia)
    {
        $experiencia->update($request->validated());
        return redirect()->route('experiencias.index')->with('success','Experiencia del Trabajador Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idexperiencia=$request->input('idExperienciaEliminar');
        $experiencia=ExperienciaLaboral::where('idExperiencia',$idexperiencia);
        if ($experiencia) {
            $experiencia->delete();
            return redirect()->route('experiencias.index')->with('success','Experiencia Laboral del Trabajador Eliminado Correctamente');
        }else{
            return redirect()->route('experiencias.index')->with('success','No se encontro la Experiencia Laboral');
        }
    }
}
