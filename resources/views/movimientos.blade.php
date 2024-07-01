@extends('layout')
@section('title','Movimientos')
@section('content')
    <div class="movimientos">
        <h2>Gestión Movimientos</h2><br>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif


        <div class="search-container">
            <form class="serach-form" action="{{route('movimientos.search')}}" method="GET">
                <label for="search">Buscar Documentos del Trabajador:</label><br>
                <br><input class="search" type="text" id="search" required autocomplete="off" name="search" placeholder="Ingrese DNI del Trabajador">
                <input type="submit" value="Buscar Documento">
            </form>
        </div>
        {{-- @if (isset($trabajador))
            <h2>Documentos del Trabajador: {{$trabajador->Nombres}} {{$trabajador->ApellidoPaterno}}</h2>
        @endif --}}

        <!-- Contenedor de resultados -->
    <div class="results-container">
        <h3>Listado de Documentos del Trabajador</h3><br>
        <div class="form-group-movimiento-tipodoc">
            <label for="TipoDocumento">TipoDocumento</label>
            <select name="idTipoDoc" id="idTipoDoc">
                <option value="">Seleccionar</option>
                @foreach ($tipodocumento as $tipodocumento)
                    <option value="{{$tipodocumento->idTipoDoc}}">{{$tipodocumento->Descripcion}}</option>
                @endforeach
            </select>
        </div>
        @if ($movimientos)
        @foreach ($movimientos as $movimiento)
            
        <label for="">Trabajador</label>
        <input type="text" readonly class="NombreTrabajadorMov" name="Nombres" value="{{$movimiento->trabajador->ApellidoPaterno.' '.$movimiento->trabajador->ApellidoMaterno.', '.$movimiento->trabajador->Nombres}}">            
        @endforeach
        <table>
            <thead>
                <tr>
                    <th>Nro Documento</th>
                    <th>Nombre Documento</th>
                    <th hidden>Documento</th>
                    <th>Fecha Documento</th>
                    <th>Tipo Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr>
                        <td>{{$movimiento->NroDocumento}}</td>
                        <td>{{$movimiento->NombreDocumento}}</td>
                        <td hidden>{{$movimiento->FotoDocumento}}</td>
                        <td>{{$movimiento->FechaDocumento}}</td>
                        <td>{{$movimiento->tipodocumento->Descripcion}}</td>
                        <td>
                            <a href="{{route('movimientos.archivo',$movimiento->MovimientoID)}}">Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$movimientos->links()}}

        @else
        <table>
            <thead>
                <tr>
                    <th>Nro Documento</th>
                    <th>Nombre Documento</th>
                    <th hidden>Documento</th>
                    <th>Fecha Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" style="text-align: center">No hay documentos para mosrar</td>
                </tr>
            </tbody>
        </table>    
        @endif
        
        
        <!-- Paginación -->

        <!-- Botón para registrar nuevo estudio -->
        {{-- <a href="" class="btn-nuevo-movimiento">Registrar Nuevo Estudio</a> --}}
    </div>
    </div>
    
@endsection