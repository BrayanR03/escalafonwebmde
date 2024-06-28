@extends('layout')
@section('title','Experiencia Laboral')
@section('content')
    <div class="experiencia">
        <h2>Gestión de Experiencia</h2><br>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="search-container">
            <form class="search-form" action="" method="GET">
                <label for="search">Buscar Experiencia del Trabajador:</label><br>
                <br><input type="text" id="search" required autocomplete="off" name="search" placeholder="Ingrese DNI del Trabajador">
                <input type="submit" value="Buscar Experiencia">
            </form>
        </div>

        <div class="results-container">
            <h3>Listado de Trabajadores y Experiencias</h3><br>
            <table>
                <thead>
                    <tr>
                        <th>ID Experiencia</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th hidden>ID CARGO</th>
                        <th>Cargo</th>
                        <th hidden>ID Trabajador</th>
                        <th hidden>Nombre Trabajador</th>
                        <th hidden>Apellido Paterno Trabajador</th>
                        <th hidden>Apellido Materno Trabajador</th>
                        <th>Trabajador</th>
                        <th hidden>ID Institucion</th>
                        <th>Institucion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @if ($experiencias->count())                    
                <tbody>
                    @foreach ($experiencias as $experiencia)
                        <tr>
                            <td>{{$experiencia->idExperiencia}}</td>
                            <td>{{$experiencia->FechaInicio}}</td>
                            <td>{{$experiencia->FechaFin}}</td>
                            <td hidden>{{$experiencia->idCargo}}</td>
                            <td>{{$experiencia->cargo->Nombre}}</td>
                            <td hidden>{{$experiencia->idTrabajador}}</td>
                            <td hidden>{{$experiencia->trabajador->Nombres}}</td>
                            <td hidden>{{$experiencia->trabajador->ApellidoPaterno}}</td>
                            <td hidden>{{$experiencia->trabajador->ApellidoMaterno}}</td>
                            <td>{{$experiencia->trabajador->ApellidoPaterno.' '.$experiencia->trabajador->ApellidoMaterno.', '.$experiencia->trabajador->Nombres}}</td>
                            <td hidden>{{$experiencia->idInstitucion}}</td>
                            <td>{{$experiencia->institucion->Nombre}}</td>
                            <td>
                                <a href="">Editar</a>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            {{$experiencias->links()}}
            <a href="{{route('experiencias.create')}}" class="btn-nueva-experiencia">Registrar Nueva Experiencia</a>
        </div>



    </div>
@endsection