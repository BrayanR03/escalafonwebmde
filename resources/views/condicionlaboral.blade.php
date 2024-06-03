
<div class="condicionlaboral">
    <h2>Gestión de Condición Laboral</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Condicion Laboral:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre de la condición laboral">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre de la Condicion Laboral:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre de la condicion laboral">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de Condición Laboral -->
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
                <td>Condicion Laboral A</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <!-- Más filas de instituciones aquí -->
        </tbody>
    </table>
</div>
