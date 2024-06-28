<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienciaLaboral;
use App\Models\Institucion;
use App\Models\Cargo;
use App\Models\Trabajador;
class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituciones=Institucion::get();
        $cargos=Cargo::get();
        $trabajadores=Trabajador::get();
        $experiencias=ExperienciaLaboral::paginate(10);
        return view('experiencia',compact('instituciones','cargos','trabajadores','experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experiencia.create',[
            'experiencias'=>new ExperienciaLaboral
        ]);
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
    public function show(string $id)
    {
        //
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
