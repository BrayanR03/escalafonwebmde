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
    <form class="search-form" action="{{route('estudios.search')}}" method="GET">
        <label for="search">Buscar Estudios del Trabajador:</label><br>
        <input type="text" id="search" required autocomplete="off" name="search" placeholder="Ingrese DNI del Trabajador" >
        <input type="submit" value="Buscar Estudio ">
    </form>
    <!-- Formulario de Estudios -->
    <div class="form-container-estudio">
        <!-- Cuadro de descripción, institución y nivel de estudios -->
        <div class="form-cuadro-estudio">
            <!-- Descripción del Estudio -->
            <form action="{{route('estudios.store')}}" method="POST">
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
                        <option value="{{old('idInstitucion',$instituciones->idInstitucion)}}">{{$instituciones->Nombre}}</option>
                        @endforeach
                    </select>
                    @endif                        
                </div>
                <input hidden class="idTrabajador" id="idTrabajador" name="idTrabajador" type="text" readonly>
                <!-- Combo de Nivel de Estudios -->
                <div class="form-group-estudio-nivel">
                    <label for="nivelestudios">Nivel de Estudios:</label>
                    @if ($nivelestudios)
                        <select id="idNivelEstudios" name="idNivelEstudios">
                            <option value="">Seleccionar</option>
                            @foreach ($nivelestudios as $nivelestudios)
                                <option value="{{old('idNivelEstudios',$nivelestudios->idNivelEstudios)}}">{{$nivelestudios->Descripcion}}</option>
                            @endforeach
                        </select>
                    @endif
                        
                </div>
                
                <!-- Botón de guardar -->
                @include('partials.validation-errors')<br>
                <br><input type="submit" value="Guardar" class="btn-guardar"><br>
            </form>
        </div>
        
        <!-- Cuadro de búsqueda del trabajador -->
        <div class="trabajador-cuadro-estudio">
            <!-- Formulario de búsqueda de trabajadores -->
            <form class="search-form-estudio" action="{{route('buscarTrabajador')}}" id="search-form-estudio" name="search-form-estudio"  method="GET">
                <label for="search">Buscar Trabajador:</label>
                <input type="text" class="search"  id="search" autocomplete="off" required name="search" placeholder="Ingrese DNI del trabajador">
                <input type="submit" value="Buscar">
            </form>
            
            <!-- Información del trabajador -->
            <div class="trabajador-info-estudio">
                <div class="form-group">
                    {{-- <label for="idTrabajador">ID Trabajador:</label> --}}
                    {{-- <input type="text" class="idTrabajador" id="idTrabajador" value="" autocomplete="off" name="idTrabajador"  placeholder="ID del trabajador" readonly> --}}
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" required id="Nombres" autocomplete="off" name="Nombres" value=""  placeholder="Nombres del trabajador" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" required id="Apellidos" autocomplete="off" name="Apellidos" value="" placeholder="Apellidos del trabajador" readonly>
                </div>
            </div>                    
                       
        </div>
        
    </div>
    
    <!-- Tabla de Estudios -->
    <br><table>
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
                        <td>{{$estudio->trabajador->ApellidoPaterno.' '.$estudio->trabajador->ApellidoMaterno.', '.$estudio->trabajador->Nombres}}</td>
                        <td>{{$estudio->Descripcion}}</td>
                        <td hidden>{{$estudio->nivelestudios->idNivelEstudios}}</td>
                        <td>{{$estudio->nivelestudios->Descripcion}}</td>
                        <td hidden>{{$estudio->institucion->idInstitucion}}</td>
                        <td>{{$estudio->institucion->Nombre}}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="editarEstudio(
                            '{{$estudio->idEstudios}}',
                            '{{$estudio->Descripcion}}',
                            '{{$estudio->nivelestudios->idNivelEstudios}}',
                            '{{$estudio->institucion->idInstitucion}}',
                            '{{$estudio->trabajador->idTrabajador}}',
                            '{{$estudio->trabajador->Nombres}}',
                            '{{$estudio->trabajador->ApellidoPaterno.' '.$estudio->trabajador->ApellidoMaterno}}')" >Editar</a> 
                            <a href="" >Eliminar</a>
                        </td>
                </tr>
                @endforeach
        </tbody>
        @endif
    </table>
    {{$estudios->links()}}
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
