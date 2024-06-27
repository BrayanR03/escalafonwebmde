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
                <th>Condición Laboral</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @if ($trabajadores->count())
        <tbody>
            @foreach ($trabajadores as $trabajador)
            <tr>
                <td>{{$trabajador->idTrabajador}}</td>
                <td>{{$trabajador->ApellidoPaterno}}</td>
                <td>{{$trabajador->ApellidoMaterno}}</td>
                <td>{{$trabajador->Nombres}}</td>
                <td>{{$trabajador->Dni}}</td>
                <td>{{$trabajador->Sexo}}</td>
                <td>{{$trabajador->FechaNacimiento}}</td>
                <td hidden>{{$trabajador->condicionLaboral->idCondicionLaboral}}</td>
                <td>{{$trabajador->condicionLaboral->Descripcion}}</td>
                <td>
                    <a href="{{route('trabajadores.edit',$trabajador)}}" >Editar</a> 
                    <a href="" >Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    {{$trabajadores->links()}}
    <a href="{{route('trabajadores.create')}}" class="btn-nuevo-trabajador">Registrar Nuevo Trabajador</a>    
    </div>
    
    
</div>
@endsection
