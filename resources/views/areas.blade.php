@extends('layout')
@section('title','Areas')
@section('content')
<div class="areas">
    <h2>Gestión de Áreas</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('areas.search')}}" method="GET">
        <label for="search">Buscar Area:</label>
        <input type="text" id="search" name="search" placeholder="Ingrese nombre del área">
        <input type="submit" value="Buscar">
    </form>


    <!-- Formulario de registro y actualización -->
    
    <form action="{{route('areas.store')}}" method="POST">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label >Nombre del Área:</label>
        <input type="text" id="Nombre" name="Nombre"  placeholder="Ingrese el nombre del Área">
        @include('partials.validation-errors') <br>
        <input type="submit" value="Guardar">
    </form>

    
    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Área</h4>
            <form id="editform" action="{{route('areas.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID AREA:</label>
                <input type="text" name="idArea" id="idArea"  readonly>
                <label >NOMBRE AREA:</label>
                <input type="text" name="Nombre-modal" id="Nombre-modal" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR ÁREA</h4>
            <form id="editform" action="{{route('areas.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Área?</p><input type="text" id="NombreAreaEliminar" class="NombreAreaEliminar" readonly>
                <input type="text" id="idAreaEliminar" name="idAreaEliminar" class="idAreaEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>



    <!-- Tabla de Area -->
    @if ($areas)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $areas)
            <tr>
                    <td>{{$areas->idArea}}</td>
                    <td>{{$areas->Nombre}}</td>
                
                    <td>
                        <!--<a href="#" class="editar-btn-area">Editar</a>--> 
                        <a href="{{route('areas.edit',$areas)}}" class="editar-btn-area" data-id="{{ $areas->idArea }}" data-nombre="{{ $areas->Nombre }}">Editar</a> 
                        <a href="#" class="eliminar-btn-area" data-id="{{ $areas->idArea }} " data-nombre="{{ $areas->Nombre }}">Eliminar</a>
                    </td>
                
            </tr>
            
            @endforeach
            
            <!-- Más filas de Areas aquí -->
        </tbody>
    </table>
    @endif
    
</div>
    
@endsection
