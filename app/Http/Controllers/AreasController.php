<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAreasRequest;
use App\Models\Area;
class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas=Area::get();
        return view('areas',compact('areas'));
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
    public function store(CreateAreasRequest $request)
    {
        $areas=new Area($request->validated());
        $areas->save();
        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
{
    $query = $request->input('search');

    // Realizar la búsqueda en la base de datos
    $areas = Area::where('Nombre', 'LIKE', '%' . $query . '%')->get();

    // Si no hay resultados, inicializar como un array vacío
    if ($areas->isEmpty()) {
        $areas = [];
    }

    return view('areas', compact('areas'));
}

    /*public function show($idArea)
    {
        $areas=Area::find($idArea);
        return view('areas',compact('areas'));
        #return view('areas',['areas'=>Area::find($idArea)]);
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        
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
