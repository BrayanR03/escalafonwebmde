<?php

namespace App\Http\Controllers;
use App\Models\Estudio;
use App\Models\Institucion;
use App\Models\NivelEstudio;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEstudiosRequest;

class EstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudios=Estudio::paginate(5);
        $instituciones = Institucion::get();
        $nivelestudios = NivelEstudio::get();
        //$trabajadores = [];
        
        return view('estudios', compact('estudios','instituciones', 'nivelestudios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $instituciones = Institucion::get();
        $nivelestudios = NivelEstudio::get();
        return view('estudios.create',compact('instituciones','nivelestudios'),[
            'estudios'=>new Estudio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEstudiosRequest $request)
    {
        //$estudios->idTrabajador=$request->input('idTrabajador');
        //dd($estudios);
        $estudios=new Estudio($request->validated());
        $estudios->save();
        return redirect()->route('estudios.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = $request->input('search');
        $trabajador=Trabajador::where('Dni',$query)->first();
        // dd($trabajador);
        $estudios=Estudio::where('idTrabajador',$trabajador->idTrabajador)->paginate(5);
        if($estudios->isEmpty()){
            $estudios=[];
        }        
        $instituciones = Institucion::get();
        $nivelestudios = NivelEstudio::get();        
        return view('estudios', compact('estudios','instituciones', 'nivelestudios'));
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
