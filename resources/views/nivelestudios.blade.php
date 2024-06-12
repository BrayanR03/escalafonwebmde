@extends('layout')
@section('title','Nivel Estudios')
@section('content')
<div class="nivelestudios">
    <h2>Gestión de Nivel Estudios</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('nivelestudio.search')}}" method="GET">
        <label for="search">Buscar Nivel Estudios:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese la descripcion del Nivel de Estudios">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('nivelestudio.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Descripcion del Nivel de Estudios:</label>
        <input type="text" id="Descripcion" name="Descripcion" placeholder="Ingrese la descripcion del Nivel de Estudios">
        @include('partials.validation-errors')<br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Nivel Estudio</h4>
            <form id="editform" action="{{route('nivelestudio.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID NIVEL ESTUDIO:</label>
                <input type="text" name="idNivelEstudio" id="idNivelEstudio"  readonly>
                <label >DESCRIPCION:</label>
                <input type="text" name="Nombre-modal-nivelestudio" id="Nombre-modal-nivelestudio" >
                <button class="modal__close">Cerrar</button>                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR NIVEL ESTUDIO</h4>
            <form id="editform" action="{{route('nivelestudio.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Nivel de Estudio?</p><input type="text" id="DescripcionNivelEstudioEliminar" class="NombreAreaEliminar" readonly>
                <input type="text" id="idNivelEstudioEliminar" name="idNivelEstudioEliminar" class="idNivelEstudioEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>


    @if ($nivelestudio)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nivelestudio as $nivelestudio)
            <tr>
                <td>{{$nivelestudio->idNivelEstudios}}</td>
                <td>{{$nivelestudio->Descripcion}}</td>
                <td>
                    <a class="editar-btn-nivelestudio" data-id="{{$nivelestudio->idNivelEstudios}}" data-nombre="{{$nivelestudio->Descripcion}}" href="{{route('nivelestudio.edit',$nivelestudio)}}">Editar</a>
                    <a class="eliminar-btn-nivelestudio" data-id="{{$nivelestudio->idNivelEstudios}}" data-nombre="{{$nivelestudio->Descripcion}}" href="#">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de tipo documento aquí -->
        </tbody>
    </table>
    
    @else
        <p>No hay datos para mostrar</p>
    @endif
    <!-- Tabla de Nivel de Estudios -->
    </div>
    
@endsection
