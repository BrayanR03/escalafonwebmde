@extends('layout')
@section('title','Cargos')
@section('content')
<div class="cargos">
    <h2>Gestión de Cargos</h2>
    @if (session('success'))
        <div class="alert">
            {{session('success')}}
        </div>
    @endif
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('cargos.search')}}" method="GET">
        <label for="search">Buscar Cargo:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre del cargo">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('cargos.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre del Cargo:</label>
        <input type="text" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del Cargo">
        @include('partials.validation-errors') <br>
        <input type="submit" value="Guardar">
    </form>


    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Cargo</h4>
            <form id="editform" action="{{route('cargos.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID CARGO:</label>
                <input type="text" name="idCargo" id="idCargo"  readonly>
                <label >NOMBRE CARGO:</label>
                <input type="text" name="Nombre-modal-cargo" id="Nombre-modal-cargo" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>

    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR CARGO</h4>
            <form id="editform" action="{{route('cargos.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Cargo?</p><input type="text" id="NombreCargoEliminar" class="NombreCargoEliminar" class="NombreCargoEliminar" readonly>
                <input type="text" id="idCargoEliminar" name="idCargoEliminar" class="idCargoEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>

    <!-- Tabla de Cargos -->
    @if ($cargos)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargos)
            <tr>
                <td>{{$cargos->idCargo}}</td>
                <td>{{$cargos->Nombre}}</td>
                <td>
                    <a href="{{route('cargos.edit',$cargos)}}" class="editar-btn-cargos" data-id="{{$cargos->idCargo}}" data-nombre="{{$cargos->Nombre}}">Editar</a> |
                    <a href="#" class="eliminar-btn-cargos" data-id="{{$cargos->idCargo}}" data-nombre="{{$cargos->Nombre}}">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de instituciones aquí -->
        </tbody>
    </table>            
    @endif
    
</div>
    
@endsection
