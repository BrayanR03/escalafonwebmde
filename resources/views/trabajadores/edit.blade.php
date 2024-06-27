@extends('layout')
@section('title','Editar Trabajadores')
@section('content')
<div class="form-container-trabajador">
    <h2>Editar Trabajador</h2>
    <div class="form-columns-trabajador">
        <div class="form-cuadro-trabajador">
            <form action="" method="post">
                @method('PATCH')
                @include('partials.validation-errors')
                @include('partials.form-trabajador',['btnText'=>'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection