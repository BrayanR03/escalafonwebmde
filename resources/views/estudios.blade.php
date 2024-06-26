@extends('layout')
@section('title', 'Estudios')
@section('content')
<div class="estudios">
    <h2>Gestión de Estudios</h2><br>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenedor de búsqueda -->
    <div class="search-container">
        <form class="search-form" action="{{route('estudios.search')}}" method="GET">
            <label for="search">Buscar Estudios del Trabajador:</label><br>
            <br><input type="text" id="search" required autocomplete="off" name="search" placeholder="Ingrese DNI del Trabajador">
            <input type="submit" value="Buscar Estudio">
        </form>
    </div>

    <!-- Contenedor de resultados -->
    <div class="results-container">
        <h3>Registro de Estudios</h3><br>
        <table>
            <thead>
                <tr>
                    <th>ID Estudio</th>
                    <th hidden>ID Trabajador</th>
                    <th>Trabajador</th>
                    <th>Descripción</th>
                    <th hidden>ID Nivel Estudios</th>
                    <th>Nivel de Estudios</th>
                    <th hidden>ID Institucion</th>
                    <th>Institución</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            @if ($estudios->count())
            <tbody>
                @foreach ($estudios as $estudio)
                    <tr>
                        <td>{{$estudio->idEstudios}}</td>
                        <td hidden>{{$estudio->trabajador->idTrabajador}}</td>
                        <td hidden>{{$estudio->trabajador->ApellidoPaterno.' '.$estudio->ApellidoMaterno}}</td>
                        <td hidden>{{$estudio->trabajador->Nombres}}</td>
                        <td>{{$estudio->trabajador->ApellidoPaterno.' '.$estudio->trabajador->ApellidoMaterno.', '.$estudio->trabajador->Nombres}}</td>
                        <td>{{$estudio->Descripcion}}</td>
                        <td hidden>{{$estudio->nivelestudios->idNivelEstudios}}</td>
                        <td>{{$estudio->nivelestudios->Descripcion}}</td>
                        <td hidden>{{$estudio->institucion->idInstitucion}}</td>
                        <td>{{$estudio->institucion->Nombre}}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="editarEstudio(this)">Editar</a> 
                            <a href="">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        
        <!-- Paginación -->
        {{$estudios->links()}}

        <!-- Botón para registrar nuevo estudio -->
        <a href="{{ route('estudios.create') }}" class="btn-nuevo-estudio">Registrar Nuevo Estudio</a>
    </div>
</div>

<!-- Modal para editar estudio -->
{{-- <section class="modal">
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
</section> --}}

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
