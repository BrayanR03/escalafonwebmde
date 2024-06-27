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
            <button class="btn-guardar-estudio">{{$btnText}}</button>
            {{-- <br><input id="btn-guardar-estudio" type="submit" value="Guardar" class="btn-guardar">&nbsp;<a class="cancelar-actualizacion" href="{{route('estudios.index')}}">Cancelar</a><br> --}}
