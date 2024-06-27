@extends('layout')
@section('title','Registrar Trabajador')
@section('content')
    <div class="form-container-trabajador">
        <h2>Registrar Trabajador</h2>
        <div class="form-columns-trabajador">
            <div class="form-cuadro-trabajador">
                <form action="{{route('trabajadores.store',$trabajadores)}}" method="post">
                    @include('partials.form-trabajador',['btnText'=>'Registrar'])
                </form>
            </div>
        </div>
    </div>
@endsection