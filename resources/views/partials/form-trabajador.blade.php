@csrf
<div class="form-group">
    <label for="ApellidoPaterno">Apellido Paterno:</label>
    <input type="text" required id="ApellidoPaterno" value="{{old('ApellidoPaterno',$trabajadore->ApellidoPaterno)}}" autocomplete="off" name="ApellidoPaterno" placeholder="Ingrese el apellido paterno">
</div>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno:</label>
    <input type="text" required id="ApellidoMaterno" autocomplete="off" name="ApellidoMaterno" value="{{old('ApellidoPaterno',$trabajadore->ApellidoMaterno)}}" placeholder="Ingrese el apellido materno">
</div>

<div class="form-group">
    <label for="Nombres">Nombres:</label>
    <input type="text" required id="Nombres" autocomplete="off" name="Nombres" placeholder="Ingrese los nombres" value="{{old('ApellidoMaterno',$trabajadore->Nombres)}}">
</div>

<div class="form-group">
    <label for="Dni">DNI:</label>
    <input type="text" required id="Dni" autocomplete="off" name="Dni" placeholder="Ingrese el DNI" value="{{old('Dni',$trabajadore->Dni)}}">
</div>

<div class="form-group">
    <label for="Sexo">Sexo:</label>
    <select id="Sexo" class="genero-trabajador" name="Sexo">
        @if ($trabajadore->Sexo=='M')
        <option selected value="M">Masculino</option>
        <option value="F">Femenino</option>
        @elseif($trabajadore->Sexo=='F')
        <option value="M">Masculino</option>
        <option selected value="F">Femenino</option>
        @else   
        <option selected value="">Seleccionar</option>     
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        @endif
    </select>
</div>

<div class="form-group">
    <label for="FechaNacimiento">Fecha de Nacimiento:</label>
    <input value="{{old('FechaNacimiento',$trabajadore->FechaNacimiento)}}" type="date" required id="FechaNacimiento" name="FechaNacimiento" placeholder="dd/mm/aaaa">
</div>

    <div class="form-group full-width">
        <label for="idCondicionLaboral">Condición Laboral:</label>
        @if ($condicionlaboral)
        <select class="condicion-laboral-trabajador" id="idCondicionLaboral" name="idCondicionLaboral">
            <option value="">Seleccionar</option>
            @foreach ($condicionlaboral as $condicionlaboral)
                <option value="{{ $condicionlaboral->idCondicionLaboral }}" {{(old('idCondicionLaboral',$trabajadore->idCondicionLaboral)==$condicionlaboral->idCondicionLaboral)?'selected':''}}>
                    {{ $condicionlaboral->Descripcion }}</option>
            @endforeach
        </select>
        @endif
    </div>

@include('partials.validation-errors')

<div class="form-group full-width">
    <button class="btn-guardar-trabajador">{{ $btnText }}</button>
</div>

<a class="btn-guardar-trabajador" href="{{route('trabajadores.index')}}">Regresar</a>

