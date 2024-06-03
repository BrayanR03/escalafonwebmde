@extends('layout')
@section('content')
<div class="areas">
    <h2>Gestión de Áreas</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Area:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre del área">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre del Área:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del Área">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de Area -->
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
                <td>Area A</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <!-- Más filas de Areas aquí -->
        </tbody>
    </table>
</div>


    
@endsection
