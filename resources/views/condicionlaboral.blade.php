@extends('layout')
@section('title','Condicion Laboral')
@section('content')
<div class="condicionlaboral">
    <h2>Gestión de Condición Laboral</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('condicionlaboral.search')}}" method="GET">
        <label for="search">Buscar Condicion Laboral:</label>
        <input type="text" id="search" autocomplete="off" name="search" placeholder="Ingrese descripcion de la condición laboral">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('condicionlaboral.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Descripcion de la Condicion Laboral:</label>
        <input type="text" id="Descripcion" autocomplete="off" name="Descripcion" placeholder="Ingrese la descripcion de la condicion laboral">
        @include('partials.validation-errors')<br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Condicion Laboral</h4>
            <form id="editform" action="{{route('condicionlaboral.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID CONDICION LABORAL:</label>
                <input type="text" name="idCondicionLaboral" id="idCondicionLaboral"  readonly>
                <label >DESCRIPCION:</label>
                <input type="text" name="Nombre-modal-condicionlaboral" id="Nombre-modal-condicionlaboral" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>

    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR CONDICION LABORAL</h4>
            <form id="editform" action="{{route('condicionlaboral.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar la Condicion Laboral?</p><input type="text" id="DescripcionCondicionLaboralEliminar" class="DescripcionCondicionLaboralEliminar"  readonly>
                <input type="text" id="idCondicionLaboralEliminar" name="idCondicionLaboralEliminar" class="idCondicionLaboralEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>


    <!-- Tabla de Condición Laboral -->
    @if ($condicionlaboral)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($condicionlaboral as $condicionlaboral)
            <tr>
                <td>{{$condicionlaboral->idCondicionLaboral}}</td>
                <td>{{$condicionlaboral->Descripcion}}</td>
                <td>
                    <a class="editar-btn-condicionlaboral" href="{{route('condicionlaboral.edit',$condicionlaboral)}}" data-id="{{$condicionlaboral->idCondicionLaboral}}" data-nombre="{{$condicionlaboral->Descripcion}}">Editar</a> |
                    <a href="#" class="eliminar-btn-condicionlaboral" data-id="{{$condicionlaboral->idCondicionLaboral}}" data-nombre="{{$condicionlaboral->Descripcion}}">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de instituciones aquí -->
        </tbody>
    </table>
    
    @endif
    </div>
    
@endsection
