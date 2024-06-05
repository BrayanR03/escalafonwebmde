@extends('layout')
@section('title','Areas')
@section('content')
<div class="areas">
    <h2>Gestión de Áreas</h2>
    
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
        <input type="text" id="Nombre" name="Nombre" required placeholder="Ingrese el nombre del Área">
        @include('partials.validation-errors') <br>
        <input type="submit" value="Guardar">
    </form>
    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Área</h4>
            <form id="edit-area-form" data-action="{{ route('areas.update', ':id') }}" method="post">
                @csrf
                @method('PATCH')
                <label>ID AREA:</label>
                <input type="text" name="idArea" id="idArea" readonly>
                <label>NOMBRE AREA:</label>
                <input type="text" name="Nombre" id="Nombre-modal">
                <a href="#" class="modal__close">Cerrar Modal</a>
                <button class="modal__actualizar">Actualizar</button>
            </form>
        </div>
    </section>
    
    <!--
    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Área</h4>
            <form action="{{route('areas.update',$areas)}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID AREA:</label>
                <input type="text" name="idArea" id="idArea">
                <label >NOMBRE AREA:</label>
                <input type="text" name="Nombre-modal" id="Nombre-modal">
                <a href="#" class="modal__close">Cerrar Modal</a>
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>-->


    <!--<section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Área</h4>
            <label >ID AREA:</label>
            <input type="text" name="idArea" id="idArea">
            <label >NOMBRE AREA:</label>
            <input type="text" name="Nombre" id="Nombre">
            <a href="#" class="modal__close">Cerrar Modal</a>
            <a href="#" class="modal__actualizar">Actualizar</a>
        </div>
    </section>-->

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
                        <a href="#" class="editar-btn-area" data-id="{{ $areas->idArea }}" data-nombre="{{ $areas->Nombre }}">Editar</a> 
                        <a href="#">Eliminar</a>
                    </td>
                
            </tr>
            
            @endforeach
            
            <!-- Más filas de Areas aquí -->
        </tbody>
    </table>
    @endif
    
</div>
    
@endsection
