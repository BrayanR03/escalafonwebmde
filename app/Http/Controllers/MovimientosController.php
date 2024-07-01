<?php

namespace App\Http\Controllers;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\TipoDocumento;
use finfo;
class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipodocumento=TipoDocumento::get();
        $movimientos=[];
        return view('movimientos',compact('tipodocumento','movimientos'));
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
        $tipodocumento=TipoDocumento::get();
        // dd($trabajador);
        // dd($trabajador);
        if ($trabajador) {           
        
        $movimientos=Movimiento::where('idTrabajador',$trabajador->idTrabajador)->paginate(10);
        // dd($movimientos);
            if(!$movimientos){
                $movimientos=[];
                return view('movimientos', compact('movimientos','tipodocumento'));
            }else{
                return view('movimientos', compact('movimientos','tipodocumento'));
            }        
        } else {
            return redirect()->route('movimientos.index')->with('success','No existe el trabajador');
        }
    }
    public function descargarArchivo($MovimientoID)
    {
        // Encuentra el documento por su ID
        $documentoMovimiento = Movimiento::find($MovimientoID);

        if (!$documentoMovimiento || !$documentoMovimiento->FotoDocumento) {
            // Maneja el caso cuando el documento no existe o no tiene archivo
            abort(404);
        }

        // Obtén el contenido del archivo
        $archivo = $documentoMovimiento->FotoDocumento;
        // Detecta el tipo MIME del archivo
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($archivo);

        $extension = $this->getExtensionFromMime($mimeType);
        // Crear una respuesta de descarga
        return response($archivo)
            ->header('Content-Type', $mimeType)
            ->header('Content-Disposition', 'attachment; filename="' . $documentoMovimiento->NombreDocumento. '.' . $extension . '"');
    }

    private function getExtensionFromMime($mimeType)
    {
        $mime_map = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'application/pdf' => 'pdf',
            'application/zip' => 'zip',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'text/plain' => 'txt',
            // Agrega más tipos MIME y sus extensiones correspondientes según sea necesario
        ];

        return isset($mime_map[$mimeType]) ? $mime_map[$mimeType] : 'bin';
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
