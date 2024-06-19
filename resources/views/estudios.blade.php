@extends('layout')
@section('title', 'Estudios')
@section('content')
<div class="estudios">
    <h2>Gestión de Estudios</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Estudios:</label>
        <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese nombre de institución">
        <input type="submit" value="Buscar">
    </form>
    <!-- Formulario de Estudios -->
    <div class="form-container-estudio">
        <!-- Cuadro de descripción, institución y nivel de estudios -->
        <div class="form-cuadro-estudio">
            <!-- Descripción del Estudio -->
            <form action="" method="POST">
                @csrf
                <div class="form-group-estudio">
                    <label for="descripcion">Descripción del Estudio:</label>
                    <input type="text" required id="Descripcion" autocomplete="off" name="Descripcion" placeholder="Ingrese la descripción del estudio">
                </div>
                
                <!-- Combo de Institución -->
                <div class="form-group-estudio-institucion">
                    <label for="institucion">Institución:</label>
                    @if ($instituciones)
                    <select id="idInstitucion" name="idInstitucion">
                        <option value="">Seleccionar</option>
                        @foreach ($instituciones as $instituciones)
                            <option value="{{$instituciones->idInstitucion}}">{{$instituciones->Nombre}}</option>
                        @endforeach
                    </select>
                    @endif
                        
                </div>
                
                <!-- Combo de Nivel de Estudios -->
                <div class="form-group-estudio-nivel">
                    <label for="nivel_estudios">Nivel de Estudios:</label>
                    @if ($nivelestudios)
                        <select id="idNivelEstudios" name="idNivelEstudios">
                            <option value="">Seleccionar</option>
                            @foreach ($nivelestudios as $nivelestudios)
                                <option value="{{$nivelestudios->idNivelEstudio}}">{{$nivelestudios->Descripcion}}</option>
                            @endforeach
                        </select>
                    @endif
                        
                </div>
            </form>
        </div>
        
        <!-- Cuadro de búsqueda del trabajador -->
        <div class="trabajador-cuadro-estudio">
            <!-- Formulario de búsqueda de trabajadores -->
            <form class="search-form-estudio" action="{{route('trabajadores.search')}}" method="GET">
                <label for="search">Buscar Trabajador:</label>
                <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese DNI o Apellido del trabajador">
                <input type="submit" value="Buscar">
            </form>

            <!-- Información del trabajador -->
            <div class="trabajador-info-estudio">
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
    </div>
    
    <!-- Botón de guardar -->
    <input type="submit" value="Guardar" class="btn-guardar">
    
    <!-- Tabla de Estudios -->
    <br><table>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" >Editar</a> 
                        <a href="" >Eliminar</a>
                    </td>
                </tr>
        </tbody>
    </table>
</div>

<!-- Modal para editar estudio -->
<section class="modal">
    <div class="modal__container">
        <h4 class="modal__title">Editar Estudio</h4>
        <form id="editform" action="" method="post">
            @csrf
            @method('PATCH')
            <label>ID Estudio:</label>
            <input type="text" name="idEstudio" id="idEstudio" readonly>
            <label>Descripción:</label>
            <input type="text" name="Descripcion-modal-estudio" id="Descripcion-modal-estudio">
            <label>Nivel de Estudios:</label>
            <select id="idNivelEstudios-modal-estudio" name="idNivelEstudios-modal-estudio">
                <option value="">SELECCIONAR</option>
            </select>
            <label>Institución:</label>
            <select id="idInstitucion-modal-estudio" name="idInstitucion-modal-estudio">
                <option value="">SELECCIONAR</option>
            </select>
            <button class="modal__close">Cerrar</button>
            <button class="modal__actualizar">Actualizar</button>
        </form>
    </div>
</section>

<!-- Modal para eliminar estudio -->
<section class="modal-eliminar">
    <div class="modal__container_eliminar">
        <h4 class="modal__title">ELIMINAR ESTUDIO</h4>
        <form id="deleteform" action="" method="post">
            @csrf
            @method('DELETE')
            <p>¿Deseas eliminar el estudio?</p>
            <input type="text" id="DescripcionEstudioEliminar" class="DescripcionEstudioEliminar" readonly>
            <input type="text" id="idEstudioEliminar" name="idEstudioEliminar" class="idEstudioEliminar" readonly style="display: none">
            <button class="modal__eliminar">CONFIRMAR</button>
            <button class="modal__close__eliminar">CANCELAR</button>
        </form>
    </div>
</section>
@endsection
