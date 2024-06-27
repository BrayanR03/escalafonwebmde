@csrf
            <div class="form-group-estudio">
                <input type="text" name="idEstudio" value="{{$estudios->idEstudios}}" placeholder="ID ESTUDIO" id="idEstudio" readonly>
                <label for="descripcion">Descripción del Estudio:</label>
                <input type="text" required id="Descripcion" value="{{old('Descripcion',$estudios->Descripcion)}}" autocomplete="off" name="Descripcion" placeholder="Ingrese la descripción del estudio">
            </div>
            
            <!-- Combo de Institución -->
            <div class="form-group-estudio-institucion">
                <label for="institucion">Institución:</label>
                @if ($instituciones)
                <select id="idInstitucion" name="idInstitucion">
                    <option value="">Seleccionar</option>
                    @foreach ($instituciones as $instituciones)
                    <option value="{{$instituciones->idInstitucion}}" {{(old('idInstitucion',$estudios->idInstitucion)==$instituciones->idInstitucion)?'selected':''}}>
                        {{$instituciones->Nombre}}</option>
                    @endforeach
                </select>
                @endif                        
            </div>
            <input  class="idTrabajador" value="{{old('idTrabajador',$estudios->idTrabajador)}}" placeholder="ID TRABAJADOR" id="idTrabajador" name="idTrabajador" type="text" readonly>
            <!-- Combo de Nivel de Estudios -->
            <div class="form-group-estudio-nivel">
                <label for="nivelestudios">Nivel de Estudios:</label>
                @if ($nivelestudios)
                    <select id="idNivelEstudios" name="idNivelEstudios">
                        <option value="">Seleccionar</option>
                        @foreach ($nivelestudios as $nivelestudios)
                            <option value="{{$nivelestudios->idNivelEstudios}}" {{(old('idNivelEstudios',$estudios->idNivelEstudios)==$nivelestudios->idNivelEstudios)?'selected':''}}>
                                {{$nivelestudios->Descripcion}}</option>
                        @endforeach
                    </select>
                @endif
                    
            </div>
            
            <!-- Botón de guardar -->
            @include('partials.validation-errors')<br>
            <button class="btn-guardar-estudio">{{$btnText}}</button>
            <a class="btn-guardar-estudio" href="{{route('estudios.index')}}">Regresar</a>
            {{-- <br><input id="btn-guardar-estudio" type="submit" value="Guardar" class="btn-guardar">&nbsp;<a class="cancelar-actualizacion" href="{{route('estudios.index')}}">Cancelar</a><br> --}}
