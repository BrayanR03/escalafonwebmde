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

    public function update(Request $request){
        $nombre=$request->input('Nombre-modal');
        $idarea=$request->input('idArea');
        //dd($nombre);
        Area::where('idArea',$idarea)->update([
            'Nombre'=>$nombre
        ]);
    
        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente');;

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
    public function edit(Area $areas)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(CreateAreasRequest $request, Area $area)
    {
        if ($request->hasFile('image')) {
            Storage::delete($areas->image);
            $area->fill($request->validated());
            $area->image=$request->file('image')->store('images');
            $area->save();
        } else {
            $area->update(array_filter($request->validated()));
        }
        return redirect()->route('areas.index',$area);
    }
*/
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idarea=$request->input('idAreaEliminar');
        $area=Area::find($idarea);
        if ($area) {
            $area->delete();
            return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente');;
        } else {
            
            return redirect()->route('areas.index')->with('error', 'No se encontro el área');;
        }
        
    }
}
