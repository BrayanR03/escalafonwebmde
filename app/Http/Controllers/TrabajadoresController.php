<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrabajadoresRequest;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\CondicionLaboral;
class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $condicionlaboral=CondicionLaboral::get();
        $trabajadores=Trabajador::with('condicionlaboral')->get();
        return view('trabajadores',compact('condicionlaboral','trabajadores'));
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
        $query=$request->input('search');
        $trabajadores = Trabajador::with('condicionLaboral')
        ->where('Dni', 'LIKE', '%' . $query . '%')
        ->orWhere('ApellidoPaterno', 'LIKE', '%' . $query . '%')
        ->get();
        if($trabajadores->isEmpty()){
            $trabajadores=[];
        }
        return view('trabajadores',compact('condicionlaboral','trabajadores'));
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
