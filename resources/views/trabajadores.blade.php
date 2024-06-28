@extends('layout')
@section('title','Trabajadores')
@section('content')
<div class="trabajadores">
    <h2>Gestión de Trabajadores</h2><br>
    @if (session('success'))
        <div class="alert">
            {{session('success')}}
        </div>
    @endif
    
    <!-- Formulario de búsqueda -->
    <div class="search-container">
        <form class="search-form" action="{{route('trabajadores.search')}}" method="GET">
            <label for="search">Buscar Trabajador:</label><br><br>
            <input type="text" required id="search" autocomplete="off" name="search" placeholder="Ingrese nombre o DNI del trabajador">
            <input type="submit" value="Buscar">
        </form>
    </div>
    

    <!-- Tabla de Trabajadores -->
    <div class="results-container">
        <h3>Listado de Trabajadores</h3><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Sexo</th>
                <th>Fecha de Nacimiento</th>
                <th hidden>ID Condicion Laboral</th>
                <th>Condición Laboral</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @if ($trabajadores->count())
        <tbody>
            @foreach ($trabajadores as $trabajadore)
            <tr>
                <td>{{$trabajadore->idTrabajador}}</td>
                <td>{{$trabajadore->ApellidoPaterno}}</td>
                <td>{{$trabajadore->ApellidoMaterno}}</td>
                <td>{{$trabajadore->Nombres}}</td>
                <td>{{$trabajadore->Dni}}</td>
                <td>{{$trabajadore->Sexo}}</td>
                <td>{{$trabajadore->FechaNacimiento}}</td>
                <td hidden>{{$trabajadore->condicionLaboral->idCondicionLaboral}}</td>
                <td>{{$trabajadore->condicionLaboral->Descripcion}}</td>
                <td>
                    <a href="{{route('trabajadores.edit',$trabajadore)}}" >Editar</a> 
                    <a href="" class="eliminar-btn-trabajador" data-id="{{$trabajadore->idTrabajador}}" data-apellidos="{{$trabajadore->ApellidoPaterno.' '.$trabajadore->ApellidoMaterno}}"
                        {{-- data-nombres="{{$trabajadore->Nombres}}" >Eliminar</a> --}}
                        {{-- OMITIMOS LA OPCION ELIMINAR, PORQUE NO DESEAMOS ELIMINAR UN TRABAJADOR, ADEMAS, ESTE TRBAJADOR ESTA ASOCIADO A ESTUDIOS,
                        LO CUALES DEBEN SER ELIMINADOS PRIMEROS, PARA ELIMINAR ESTE TRABAJADOR--}}
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    {{$trabajadores->links()}}
    <a href="{{route('trabajadores.create')}}" class="btn-nuevo-trabajador">Registrar Nuevo Trabajador</a>    
    </div>
    
    
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR TRABAJADOR</h4>
            <form id="editform" action="{{route('trabajadores.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar al Trabajador?</p>
                <input type="text" id="NombreTrabajadorEliminar" class="NombreTrabajadorEliminar" readonly>
                <input type="text" id="idTrabajadorEliminar" name="idTrabajadorEliminar" class="idTrabajadorEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>
    
</div>
@endsection
