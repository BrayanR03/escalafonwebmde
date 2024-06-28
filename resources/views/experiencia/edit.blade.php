@extends('layout')
@section('title','Editar Experiencia Laboral')
@section('content')
<div class="form-container-experiencia">
    <h2>Editar Experiencia Laboral</h2>
    <div class="form-columns-experiencia">
        <!-- Cuadro de descripción, institución y nivel de estudios -->
        <div class="form-cuadro-experiencia">
            <!-- Descripción del Estudio -->
            <form action="{{route('experiencias.update',$experiencias)}}" method="POST">
                @method('PATCH')
                @include('partials.form-experiencia',['btnText'=>'Actualizar'])
                {{-- <br><input id="btn-guardar-estudio" type="submit" value="Guardar" class="btn-guardar">&nbsp;<a class="cancelar-actualizacion" href="{{route('estudios.index')}}">Cancelar</a><br> --}}
            </form>
        </div>
        
        <!-- Cuadro de búsqueda del trabajador -->
        <div class="trabajador-cuadro-estudio">
            <!-- Formulario de búsqueda de trabajadores -->
            <form class="search-form-estudio" action="{{route('buscarTrabajador')}}" id="search-form-estudio" name="search-form-estudio" method="GET">
                <label for="search">Buscar Trabajador:</label>
                <input type="text" class="search input-buscar-trabajador-estudios"  id="search" autocomplete="off" required name="search" placeholder="Ingrese DNI del trabajador">
                <input class="buscar-trabajador-estudio" type="submit" value="Buscar">
            </form>
            
            <!-- Información del trabajador -->
            <div class="trabajador-info-estudio">
                <div class="form-group">
                    {{-- <label for="idTrabajador">ID Trabajador:</label> --}}
                    {{-- <input type="text" class="idTrabajador" id="idTrabajador" value="" autocomplete="off" name="idTrabajador" placeholder="ID del trabajador" readonly> --}}
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="input-buscar-trabajador-estudios" required id="Nombres" autocomplete="off" name="Nombres" value="{{old('Nombres',$experiencias->trabajador->Nombres)}}" placeholder="Nombres del trabajador" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="input-buscar-trabajador-estudios" required id="Apellidos" autocomplete="off" name="Apellidos" value="{{old('apellidoscompletos',$experiencias->trabajador->ApellidoPaterno.' '.$experiencias->trabajador->ApellidoMaterno)}}" placeholder="Apellidos del trabajador" readonly>
                </div>
            </div>
        </div>
    </div>
            
</div>
@endsection
