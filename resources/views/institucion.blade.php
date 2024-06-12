@extends('layout')
@section('title','Instituciones')
@section('content')
<div class="instituciones">
    <h2>Gestión de Instituciones</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('institucion.search')}}" method="GET">
        <label for="search">Buscar Institución:</label>
        <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese nombre de institución">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('institucion.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Nombre de la Institución:</label>
        <input type="text" id="Nombre" autocomplete="off" name="Nombre" placeholder="Ingrese el nombre de la institución">
        @include('partials.validation-errors')<br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Institucion</h4>
            <form id="editform" action="{{route('institucion.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID INSTITUCION:</label>
                <input type="text" name="idInstitucion" id="idInstitucion"  readonly>
                <label >NOMBRE:</label>
                <input type="text" name="Nombre-modal-institucion" id="Nombre-modal-institucion" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR INSTITUCION</h4>
            <form id="editform" action="{{route('institucion.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar la Institucion?</p><input type="text" id="NombreInstitucionEliminar" class="NombreInstitucionEliminar" readonly>
                <input type="text" id="idInstitucionEliminar" name="idInstitucionEliminar" class="idInstitucionEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>



    @if ($institucion)
        <!-- Tabla de instituciones -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institucion as $institucion)
            <tr>
                <td>{{$institucion->idInstitucion}}</td>
                <td>{{$institucion->Nombre}}</td>
                <td>
                    <a class="editar-btn-institucion" href="{{route('institucion.edit',$institucion)}}" data-id="{{$institucion->idInstitucion}}" data-nombre="{{$institucion->Nombre}}">Editar</a>
                    <a class="eliminar-btn-institucion" data-id="{{$institucion->idInstitucion}}" data-nombre="{{$institucion->Nombre}}" href="#">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de instituciones aquí -->
        </tbody>
    </table>    
    @endif
    
</div>

@endsection
    