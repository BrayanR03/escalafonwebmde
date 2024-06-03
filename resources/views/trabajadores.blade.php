@extends('layout')
@section('title','Trabajadores')
@section('content')
<div class="workers-info">
    <div>
        <label for="trabajador-id">Trabajador ID:</label>
        <input type="text" id="trabajador-id">
    </div>
    <div>
        <label for="condicion-laboral">Condición Laboral:</label>
        <select id="condicion-laboral">
            <option value="permanente">Permanente</option>
            <option value="temporal">Temporal</option>
            <option value="contratado">Contratado</option>
        </select>
    </div>
    <div>
        <label for="apellido-paterno">Apellido Paterno:</label>
        <input type="text" id="apellido-paterno">
    </div>
    <div>
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres">
    </div>
    <div>
        <label for="apellido-materno">Apellido Materno:</label>
        <input type="text" id="apellido-materno">
    </div>
    <div class="gender-container">
        <label>Sexo:</label>
        <input type="checkbox" id="sexo-m" name="sexo" value="M">
        <label for="sexo-m">M</label>
        <input type="checkbox" id="sexo-f" name="sexo" value="F">
        <label for="sexo-f">F</label>
    </div>
    <div>
        <label for="dni">Dni:</label>
        <input type="text" id="dni">
    </div>
    <div>
        <label for="fecha-nacimiento">Fecha Nacimiento:</label>
        <input type="text" id="fecha-nacimiento">
    </div>
    <div>
        <button>REGISTRAR</button>
    </div>
    <div>
        <button>ACTUALIZAR</button>
    </div>
</div>
    
@endsection
