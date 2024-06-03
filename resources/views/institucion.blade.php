@extends('layout')
@section('content')
<div class="instituciones">
    <h2>Gestión de Instituciones</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Institución:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre de institución">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre de la Institución:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre de la institución">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de instituciones -->
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
                <td>Institución A</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <!-- Más filas de instituciones aquí -->
        </tbody>
    </table>
</div>

@endsection
    