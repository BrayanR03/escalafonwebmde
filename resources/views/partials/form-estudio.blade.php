
@csrf
<div class="form-container-estudio">
    <!-- Cuadro de descripción, institución y nivel de estudios -->
    <div class="form-cuadro-estudio">
        <!-- Descripción del Estudio -->
        <form action="{{route('estudios.store')}}" method="POST">
            @csrf
            <div class="form-group-estudio">
                <input type="text" name="idEstudio" placeholder="ID ESTUDIO" id="idEstudio" readonly>
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
            <input  class="idTrabajador" placeholder="ID TRABAJADOR" id="idTrabajador" name="idTrabajador" type="text" readonly>
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
            <button>{{$btnText}}</button>
            {{-- <br><input id="btn-guardar-estudio" type="submit" value="Guardar" class="btn-guardar">&nbsp;<a class="cancelar-actualizacion" href="{{route('estudios.index')}}">Cancelar</a><br> --}}
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