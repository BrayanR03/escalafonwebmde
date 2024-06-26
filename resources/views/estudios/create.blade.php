@extends('layout')
@section('title','Registrar Estudio')
@section('content')
    <h2>Registrar Estudio</h2>
    <form action="{{route('estudios.store')}}">

    </form>
    @include('partials.form-estudio',['btnText'=>'Guardar'])
@endsection