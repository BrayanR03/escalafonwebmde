@extends('layout')
@section('title','Trabajadores')
@section('content')
<div class="trabajadores">
    <h2>Gestión de Trabajadores</h2>
    @if (session('success'))
        <div class="alert">
            {{session('success')}}
        </div>
    @endif
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="" method="GET">
        <label for="search">Buscar Trabajador:</label>
        <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese nombre o DNI del trabajador">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" autocomplete="off" name="apellido_paterno" placeholder="Ingrese el apellido paterno">
            </div>
            <div class="form-group">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" autocomplete="off" name="apellido_materno" placeholder="Ingrese el apellido materno">
            </div>
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" autocomplete="off" name="nombres" placeholder="Ingrese los nombres">
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" autocomplete="off" name="dni" placeholder="Ingrese el DNI">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa">
            </div>
            <div class="form-group">
                @if ($condicionlaboral)
                <label for="condicion_laboral">Condición Laboral:</label>
                <select id="condicion_laboral" name="condicion_laboral">
                    <option value="">Seleccionar</option>
                    @foreach ($condicionlaboral as $condicionlaboral)
                        <option value="{{$condicionlaboral->idCondicionLaboral}}">{{$condicionlaboral->Descripcion}}</option>
                    @endforeach
                </select>
                @endif
            </div>
        </div>
        @include('partials.validation-errors') <br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Trabajador</h4>
            <form id="editform" action="" method="post">
                @csrf
                @method('PATCH')
                <label>ID Trabajador:</label>
                <input type="text" name="idTrabajador" id="idTrabajador" readonly>
                <label>Nombres:</label>
                <input type="text" name="Nombre-modal-trabajador" id="Nombre-modal-trabajador">
                <button class="modal__close">Cerrar</button>
                <button class="modal__actualizar">Actualizar</button>
            </form>
        </div>
    </section>

    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR TRABAJADOR</h4>
            <form id="editform" action="" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar al Trabajador?</p>
                <input type="text" id="NombreTrabajadorEliminar" class="NombreTrabajadorEliminar" readonly>
                <input type="text" id="idTrabajadorEliminar" name="idTrabajadorEliminar" class="idTrabajadorEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>

    <!-- Tabla de Trabajadores -->
    @if ($trabajadores)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>DNI</th>
                <th>Sexo</th>
                <th>Fecha de Nacimiento</th>
                <th>Condición Laboral</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trabajadores as $trabajadores)
            <tr>
                <td>{{$trabajadores->idTrabajador}}</td>
                <td>{{$trabajadores->ApellidoPaterno}}</td>
                <td>{{$trabajadores->ApellidoMaterno}}</td>
                <td>{{$trabajadores->Nombres}}</td>
                <td>{{$trabajadores->Dni}}</td>
                <td>{{$trabajadores->Sexo}}</td>
                <td>{{$trabajadores->FechaNacimiento}}</td>
                <td>{{$trabajadores->idCondicionLaboral}}</td>
                <td>
                    <a href="#">Editar</a> 
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>    
    @endif
    
</div>
@endsection
