<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrabajadoresRequest;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use Illuminate\Support\Facades\DB;
use App\Models\CondicionLaboral;
class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $condicionlaboral=CondicionLaboral::get();
        $condicionlaboralmodal=CondicionLaboral::get();
        $trabajadores=Trabajador::with('condicionlaboral')->get();
        return view('trabajadores',compact('condicionlaboralmodal','condicionlaboral','trabajadores'));
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
    public function store(CreateTrabajadoresRequest $request)
    {
        $trabajadores=new Trabajador($request->validated());
        $trabajadores->save();
        return redirect()->route('trabajadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $condicionlaboral=CondicionLaboral::get();
        $condicionlaboralmodal=CondicionLaboral::get();
        $query=$request->input('search');
        $trabajadores = Trabajador::with('condicionLaboral')
        ->where('Dni', 'LIKE', '%' . $query . '%')
        ->orWhere('ApellidoPaterno', 'LIKE', '%' . $query . '%')
        ->get();
        if($trabajadores->isEmpty()){
            $trabajadores=[];
        }
        return view('trabajadores',compact('condicionlaboralmodal','condicionlaboral','trabajadores'));
    }

    public function buscarTrabajador(Request $request){

        $busqueda=$request->input('search');

        $trabajador=Trabajador::where('Dni',$busqueda)
        ->orWhere('ApellidoPaterno',$busqueda)
        ->first();
        dd($trabajador);
        if($trabajador){
            return response()->json([
                'idTrabajador'=>$trabajador->idTrabajador,
                'Nombres'=>$trabajador->Nombres,
                'Apellidos'=>$trabajador->ApellidoPaterno .', '. $trabajador->ApellidoMaterno
            ]);
        }else{
            return view('estudios');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idTrabajador)
    {

        // $trabajador = Trabajador::findOrFail($idTrabajador);
        // $condicionLaboralActual = $trabajador->idCondicionLaboral; // Obtener la condición laboral actual del trabajador

        // // Obtener todas las condiciones laborales para llenar el select
        // $condicionesLaborales = CondicionLaboral::all(); // Asumiendo que tienes un modelo CondicionLaboral
        
        // return response()->json([
        //     'trabajador' => $trabajador,
        //     'condicionesLaborales' => $condicionesLaborales,
        //     'condicionLaboralActual' => $condicionLaboralActual,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $apellidopaterno=$request->input('Paterno-modal-trabajador');
        $apellidomaterno=$request->input('Materno-modal-trabajador');
        $nombres=$request->input('Nombres-modal-trabajador');
        $dni=$request->input('Dni-modal-trabajador');
        $sexo=$request->input('Sexo-modal-trabajador');
        $fechanacimiento=$request->input('FechaNacimiento-modal-trabajador');
        $condicionlaboral=$request->input('idCondicionLaboral-modal-trabajador');
        $idtrabajador=$request->input('idTrabajador');
        Trabajador::where('idTrabajador',$idtrabajador)->update([
            'ApellidoPaterno'=>$apellidopaterno,
            'ApellidoMaterno'=>$apellidomaterno,
            'Nombres'=>$nombres,
            'Dni'=>$dni,
            'Sexo'=>$sexo,
            'FechaNacimiento'=>$fechanacimiento,
            'idCondicionLaboral'=>$condicionlaboral
        ]);

        return redirect()->route('trabajadores.index')->with('success','Trabajador Actualizado Correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idtrabajador=$request->input('idTrabajadorEliminar');
        $trabajador=Trabajador::find($idtrabajador);
        if ($trabajador) {
            $trabajador->delete();
            return redirect()->route('trabajadores.index')->with('success','Trabajador Eliminado Correctamente');
        } else {
            return redirect()->route('trabajadores.index')->with('success','No se encontro el trabajador');
            
        }
        
    }
}
