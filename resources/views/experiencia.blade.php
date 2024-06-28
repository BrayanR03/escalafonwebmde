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
            <form class="search-form" action="{{route('experiencias.search')}}" method="GET">
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
                            <td>{{$experiencia->trabajador->apellidoscompletos=$experiencia->trabajador->ApellidoPaterno.' '.$experiencia->trabajador->ApellidoMaterno.', '.$experiencia->trabajador->Nombres}}</td>
                            <td hidden>{{$experiencia->idInstitucion}}</td>
                            <td>{{$experiencia->institucion->Nombre}}</td>
                            <td>
                                <a href="{{route('experiencias.edit',$experiencia)}}">Editar</a>
                                <a href="" class="eliminar-btn-experiencia" data-id="{{$experiencia->idExperiencia}}"
                                    data-trabajador="{{$experiencia->trabajador->ApellidoPaterno.' '.$experiencia->trabajador->ApellidoMaterno.', '.$experiencia->trabajador->Nombres}}"
                                    data-institucion="{{$experiencia->institucion->Nombre}}" data-cargo="{{$experiencia->cargo->Nombre}}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            {{$experiencias->links()}}
            <a href="{{route('experiencias.create')}}" class="btn-nueva-experiencia">Registrar Nueva Experiencia</a>
        </div>
        <section class="modal-eliminar">
            <div class="modal__container_eliminar">
                <h4 class="modal__title">ELIMINAR EXPERIENCIA LABORAL DEL TRABAJADOR</h4>
                <form id="editform" action="{{route('experiencias.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p>¿Deseas Eliminar La Experiencia del Trabajador?</p><br>
                    <input type="text" id="NombreTrabajadorEliminar" class="NombreTrabajadorEliminar" readonly>
                    <input type="text" id="InstitucionTrabajadorEliminar" class="InstitucionTrabajadorEliminar" readonly>
                    <input type="text" id="CargoTrabajadorEliminar" class="CargoTrabajadorEliminar" readonly>
                    <input type="text" id="idExperienciaEliminar" name="idExperienciaEliminar" class="idExperienciaEliminar" hidden readonly>
                    <button class="modal__eliminar">CONFIRMAR</button>
                    <button class="modal__close__eliminar">CANCELAR</button>
                </form>
            </div>
        </section>


    </div>
@endsection