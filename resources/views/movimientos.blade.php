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
                <br><input type="text" id="search" required autocomplete="off" name="search" placeholder="Ingrese DNI del Trabajador">
                <input type="submit" value="Buscar Documento">
            </form>
        </div>
        {{-- @if (isset($trabajador))
            <h2>Documentos del Trabajador: {{$trabajador->Nombres}} {{$trabajador->ApellidoPaterno}}</h2>
        @endif --}}

        <!-- Contenedor de resultados -->
    <div class="results-container">
        <h3>Listado de Documentos del Trabajador</h3><br>
        <table>
            <thead>
                <tr>
                    <th>Nro Documento</th>
                    <th>Nombre Documento</th>
                    <th>Documento</th>
                    <th>Fecha Documento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            @if ($movimientos && $movimientos->count()>0)
            {{-- <p>{{$movimientos->trabajador->Nombres}}</p> --}}
            <tbody>
                @foreach ($movimientos as $movimiento)
                    <tr>
                        <td>{{$movimiento->NroDocumento}}</td>
                        <td>{{$movimiento->NombreDocumento}}</td>
                        <td>{{$movimiento->FotoDocumento}}</td>
                        <td>{{$movimiento->FechaDocumento}}</td>
                        <td>
                            {{-- <a href="javascript:void(0)" onclick="editarEstudio(this)">Editar</a>  --}}
                            <a href="">Descargar</a>
                            {{-- <a href="">Eliminar</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @else
            <tbody>
                <tr>
                    <td colspan="7" style="text-align: center">No hay documentos para mosrar</td>
                </tr>
            </tbody>
            @endif
        </table>
        
        <!-- Paginación -->
        {{$movimientos->links()}}

        <!-- Botón para registrar nuevo estudio -->
        {{-- <a href="" class="btn-nuevo-movimiento">Registrar Nuevo Estudio</a> --}}
    </div>
    </div>
@endsection