
<div class="tipomovimiento">
    <h2>Gestión de Tipo Movimiento</h2>
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Tipo Movimiento:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese nombre del Tipo Movimiento">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre del Tipo Movimiento:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del Tipo Movimiento">
        <input type="submit" value="Guardar">
    </form>

    <!-- Tabla de Tipo Movimiento -->
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
                <td>Tipo Movimiento A</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <!-- Más filas de tipo movimiento aquí -->
        </tbody>
    </table>
</div>
