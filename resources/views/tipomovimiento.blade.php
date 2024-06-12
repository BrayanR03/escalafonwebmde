@extends('layout')
@section('title','Tipo Movimiento')
@section('content')
<div class="tipomovimiento">
    <h2>Gestión de Tipo Movimiento</h2>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulario de búsqueda -->
    <form class="search-form" action="{{route('tipomovimiento.search')}}" method="GET">
        <label for="search">Buscar Tipo Movimiento:</label>
            <input type="text" id="search" name="search" placeholder="Ingrese la descripcion Tipo Movimiento">
        <input type="submit" value="Buscar">
    </form>

    <!-- Formulario de registro y actualización -->
    <form action="{{route('tipomovimiento.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="nombre">Descripcion del Tipo Movimiento:</label>
        <input type="text" id="Descripcion" name="Descripcion" placeholder="Ingrese la descripcion del Tipo Movimiento">
        @include('partials.validation-errors')<br>
        <input type="submit" value="Guardar">
    </form>

    <section class="modal">
        <div class="modal__container">
            <h4 class="modal__title">Editar Tipo Movimiento</h4>
            <form id="editform" action="{{route('tipomovimiento.update')}}" method="post">
                @csrf
                @method('PATCH')
                <label >ID TIPO MOVIMIENTO:</label>
                <input type="text" name="idTipoMov" id="idTipoMov"  readonly>
                <label >DESCRIPCION:</label>
                <input type="text" name="Nombre-modal-tipomovimiento" id="Nombre-modal-tipomovimiento" >
                <button class="modal__close">Cerrar</button>
                
                <button class="modal__actualizar">Actualizar</button>
            </form>
            
        </div>
    </section>
    <section class="modal-eliminar">
        <div class="modal__container_eliminar">
            <h4 class="modal__title">ELIMINAR TIPO MOVIMIENTO</h4>
            <form id="editform" action="{{route('tipomovimiento.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <p>¿Deseas Eliminar el Tipo de Movimiento?</p><input type="text" id="DescripcionTipoMovimientoEliminar" class="NombreAreaEliminar" readonly>
                <input type="text" id="idTipoMovimientoEliminar" name="idTipoMovimientoEliminar" class="idTipoMovimientoEliminar" readonly style="display: none">
                <button class="modal__eliminar">CONFIRMAR</button>
                <button class="modal__close__eliminar">CANCELAR</button>
            </form>
        </div>
    </section>


    <!-- Tabla de Tipo Movimiento -->
    @if ($tipomovimiento)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipomovimiento as $tipomovimiento)
            <tr>
                <td>{{$tipomovimiento->idTipoMov}}</td>
                <td>{{$tipomovimiento->Descripcion}}</td>
                <td>
                    <a class="editar-btn-tipomovimiento" href="{{route('tipomovimiento.edit',$tipomovimiento)}}" data-id="{{$tipomovimiento->idTipoMov}}" data-nombre="{{$tipomovimiento->Descripcion}}">Editar</a> 
                    <a href="#" class="eliminar-btn-tipomovimiento" data-id="{{$tipomovimiento->idTipoMov}}" data-nombre="{{$tipomovimiento->Descripcion}}">Eliminar</a>
                </td>
            </tr>    
            @endforeach
            
            <!-- Más filas de tipo movimiento aquí -->
        </tbody>
    </table>    
    @endif
    
</div>
    
@endsection
