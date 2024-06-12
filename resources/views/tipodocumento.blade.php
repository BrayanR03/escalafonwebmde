@extends('layout')
@section('title','Tipo Documento')
@section('content')
<div class="tipodocumento">
    <h2>Gestión de Tipo Documento</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('tipodocumento.search')}}" method="GET">
        <label for="search">Buscar Tipo Documento:</label>
            <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese la descripcion del Tipo Documento">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('tipodocumento.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Descripcion del Tipo Documento:</label>
        <input type="text" id="Descripcion" autocomplete="off" name="Descripcion" placeholder="Ingrese la descripcion del Tipo Documento">
        @include('partials.validation-errors')<br>
        <input type="submit" value="Guardar">
    </form>


    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Tipo Documento</h4>
            <form id="editform" action="{{route('tipodocumento.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID TIPO DOCUMENTO:</label>
                <input type="text" name="idTipoDoc" id="idTipoDoc"  readonly>
                <label >DESCRIPCION:</label>
                <input type="text" name="Nombre-modal-tipodocumento" id="Nombre-modal-tipodocumento" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR TIPO DOCUMENTO</h4>
            <form id="editform" action="{{route('tipodocumento.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Tipo de Documento?</p><input type="text" id="DescripcionTipoDocumentoEliminar" class="NombreAreaEliminar" readonly>
                <input type="text" id="idTipoDocumentoEliminar" name="idTipoDocumentoEliminar" class="idTipoDocumentoEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>



    <!-- Tabla de Tipo Documento -->
    @if ($tipodocumento)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipodocumento as $tipodocumento)
            <tr>
                <td>{{$tipodocumento->idTipoDoc}}</td>
                <td>{{$tipodocumento->Descripcion}}</td>
                <td>
                    <a class="editar-btn-tipodocumento" href="{{route('tipodocumento.edit',$tipodocumento)}}" data-id="{{$tipodocumento->idTipoDoc}}" data-nombre="{{$tipodocumento->Descripcion}}" >Editar</a> 
                    <a href="#" class="eliminar-btn-tipodocumento" data-id="{{$tipodocumento->idTipoDoc}}" data-nombre="{{$tipodocumento->Descripcion}}">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de tipo documento aquí -->
        </tbody>
    </table>    
    @endif
    
</div>
    
@endsection
