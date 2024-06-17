@extends('layout')
@section('title', 'Estudios')
@section('content')
<div class="estudios">
    <h2>Gestión de Estudios</h2>
    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario de búsqueda de trabajadores -->
    <div class="trabajador-busqueda">
        <form class="search-form" action="" method="GET">
            <label for="search">Buscar Trabajador:</label>
            <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese DNI o Apellido del trabajador">
            <input type="submit" value="Buscar">
        </form>

        <!-- Información del trabajador -->
        <div class="trabajador-info">
            <div class="form-group">
                <label for="idTrabajador">ID Trabajador:</label>
                <input type="text" required id="idTrabajador" autocomplete="off" name="idTrabajador" placeholder="ID del trabajador" readonly>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" required id="Nombres" autocomplete="off" name="Nombres" placeholder="Nombres del trabajador" readonly>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" required id="Apellidos" autocomplete="off" name="Apellidos" placeholder="Apellidos del trabajador" readonly>
            </div>
        </div>
    </div>

    <!-- Formulario de registro y actualización de estudios -->
    <form action="" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="descripcion">Descripción del Estudio:</label>
                <input type="text" required id="Descripcion" autocomplete="off" name="Descripcion" placeholder="Ingrese la descripción del estudio">
            </div>
            <div class="form-group">
                <label for="nivel_estudios">Nivel de Estudios:</label>
                <select id="idNivelEstudios" name="idNivelEstudios">
                    <option value="">Seleccionar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="institucion">Institución:</label>
                <select id="idInstitucion" name="idInstitucion">
                    <option value="">Seleccionar</option>
                </select>
            </div>
        </div>
        @include('partials.validation-errors') <br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Estudio</h4>
            <form id="editform" action="" method="post">
                @csrf
                @method('PATCH')
                <label>ID Estudio:</label>
                <input type="text" name="idEstudio" id="idEstudio" readonly>
                <label>ID Trabajador:</label>
                <input type="text" name="idTrabajador-modal" id="idTrabajador-modal" readonly>
                <label>Descripción del Estudio:</label>
                <input type="text" name="Descripcion-modal" id="Descripcion-modal">
                <label for="nivel_estudios">Nivel de Estudios:</label>
                <select id="idNivelEstudios-modal" name="idNivelEstudios-modal">
                    <option value="">Seleccionar</option>
                </select>
                <label for="institucion">Institución:</label>
                <select id="idInstitucion-modal" name="idInstitucion-modal">
                    <option value="">Seleccionar</option>
                </select>
                <button class="modal__close">Cerrar</button>
                <button class="modal__actualizar">Actualizar</button>
            </form>
        </div>
    </section>

    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR ESTUDIO</h4>
            <form id="editform" action="" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Estudio?</p>
                <input type="text" id="DescripcionEstudioEliminar" class="DescripcionEstudioEliminar" readonly>
                <input type="text" id="idEstudioEliminar" name="idEstudioEliminar" class="idEstudioEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>

    <!-- Tabla de Estudios -->
    
    <table>
        <thead>
            <tr>
                <th>ID Estudio</th>
                <th>ID Trabajador</th>
                <th>Descripción</th>
                <th>Nivel de Estudios</th>
                <th>Institución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PR</td>
                <td>PRUEBA</td>
                <td>PRUEBA</td>
                <td>PRUEBA</td>
                <td>PRUEBA</td>
                <td>
                    <a href="" >Editar</a> 
                    <a href="" >Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
