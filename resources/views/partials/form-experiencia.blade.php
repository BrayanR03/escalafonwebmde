@csrf
            <div class="form-group-experiencia">
                <input type="text" name="idExperienciaLaboral" value="{{$experiencias->idEstudios}}" placeholder="ID EXPERIENCIA LABORAL" id="idExperienciaLaboral" readonly>
                
                <div class="form-group">
                    <label for="FechaInicio">Fecha Inicio:</label>
                    <input type="date" required id="FechaInicio" value="{{old('FechaInicio',$experiencias->FechaInicio)}}" autocomplete="off" name="FechaInicio" placeholder="dd/mm/aaaa">
                </div>
                <div class="form-group">
                    <label for="FechaFin">Fecha Fin:</label>
                    <input type="date" required id="FechaFin" value="{{old('FechaFin',$experiencias->FechaFin)}}" autocomplete="off" name="FechaFin" placeholder="dd/mm/aaaa">
                </div>
            </div>
            
            <!-- Combo de Institución -->
            <div class="form-group-experiencia-institucion">
                <label for="institucion">Institución:</label>
                @if ($instituciones)
                <select id="idInstitucion" name="idInstitucion">
                    <option value="">Seleccionar</option>
                    @foreach ($instituciones as $instituciones)
                    <option value="{{$instituciones->idInstitucion}}" {{(old('idInstitucion',$experiencias->idInstitucion)==$instituciones->idInstitucion)?'selected':''}}>
                        {{$instituciones->Nombre}}</option>
                    @endforeach
                </select>
                @endif                        
            </div>
            <input  class="idTrabajador" value="{{old('idTrabajador',$experiencias->idTrabajador)}}" placeholder="ID TRABAJADOR" id="idTrabajador" name="idTrabajador" type="text" readonly>
            <!-- Combo de Nivel de Estudios -->
            <div class="form-group-experiencia-cargo">
                <label for="cargos">Cargos:</label>
                @if ($cargos)
                    <select id="idCargo" name="idCargo">
                        <option value="">Seleccionar</option>
                        @foreach ($cargos as $cargos)
                            <option value="{{$cargos->idCargo}}" {{(old('idCargo',$experiencias->idCargo)==$cargos->idCargo)?'selected':''}}>
                                {{$cargos->Nombre}}</option>
                        @endforeach
                    </select>
                @endif
                    
            </div>
            
            <!-- Botón de guardar -->
            @include('partials.validation-errors')<br>
            <button class="btn-guardar-estudio">{{$btnText}}</button>
            <a class="btn-guardar-estudio" href="{{route('experiencias.index')}}">Regresar</a>
            {{-- <br><input id="btn-guardar-estudio" type="submit" value="Guardar" class="btn-guardar">&nbsp;<a class="cancelar-actualizacion" href="{{route('estudios.index')}}">Cancelar</a><br> --}}
