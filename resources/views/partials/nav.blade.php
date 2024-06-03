<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('styles.css')}}">
</head>
<script src={{asset('scripts.js')}}></script>
<body>
    <div class="container">
        <div class="header">
            <a id="home-btn" href="{{route('inicio')}}" class="header-button">SISTEMA DE GESTIÓN DE ESCALAFÓN</a>
            <label >Usuario: Administrador</label>
            <a class="cerrar-sesion" href="#">Cerrar Sesión</a>
        </div>
        <div class="sidebar">
            <a class="movimientos-btn" href="#">Movimientos</a>
            <a class="nivelestudios-btn" href="{{route('nivelestudios.index')}}">Nivel de Estudios</a>
            <a class="institucion-btn" href="{{route('institucion.index')}}">Institución</a>
            <a class="estudios-btn" href="#">Estudios</a>
            <a class="experiencia-btn" href="#">Experiencia Laboral</a>
            <a class="trabajadores-btn" href="#">Trabajadores</a>
        </div>
        <div class="main">
            <div class="top-nav">
                <a class="tipodocumento-btn" href="{{route('tipodocumento.index')}}">Tipo Documento</a>
                <a class="tipomovimiento-btn" href="{{route('tipomovimiento.index')}}">Tipo Movimiento</a>
                <a class="condicionlaboral-btn" href="{{route('condicionlaboral.index')}}">Condición Laboral</a>
                <a class="cargos-btn" href="{{route('cargos.index')}}">Cargos</a>
                <a class="areas-btn" href="{{route('areas.index')}}">Areas</a>

            </div> 
            
    
</body>

</html>
