@extends('layout')
@section('title','Areas')
@section('content')

<div class="areas">
    <h2>Gestión de Áreas</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('areas.search')}}" method="GET">
        <label for="search">Buscar Area:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre del área">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    
    <form action="{{route('areas.store')}}" method="POST">
        @include('partials.validation-errors')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="Nombre">Nombre del Área:</label>
        <input type="text" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del Área">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de Area -->
    @if ($areas)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $areas)
            <tr>
                    <td>{{$areas->idArea}}</td>
                    <td>{{$areas->Nombre}}</td>
                
                    <td>
                        <a href="#">Editar</a> |
                        <a href="#">Eliminar</a>
                    </td>
                
            </tr>
            @endforeach
            <!-- Más filas de Areas aquí -->
        </tbody>
    </table>    
    @endif
    
</div>


    
@endsection
