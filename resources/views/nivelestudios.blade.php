@extends('layout')
@section('title','Nivel Estudios')
@section('content')
<div class="nivelestudios">
    <h2>Gestión de Nivel Estudios</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Nivel Estudios:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese nombre del Nivel de Estudios">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre del Nivel de Estudios:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del Nivel de Estudios">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de Nivel de Estudios -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Nivel de Estudios A</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <!-- Más filas de tipo documento aquí -->
        </tbody>
    </table>
</div>
    
@endsection
