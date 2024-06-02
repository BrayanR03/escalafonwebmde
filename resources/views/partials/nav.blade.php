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
            <button id="home-btn" class="header-button">SISTEMA DE GESTIÓN DE ESCALAFÓN</button>
            <label >Usuario: Administrador</label>
            <a href="#">Cerrar Sesión</a>
        </div>
        <div class="sidebar">
            <button id="movimientos-btn">Movimientos</button>
            <button id="nivelestudios-btn">Nivel de Estudios</button>
            <button id="institucion-btn">Institución</button>
            <button id="estudios-btn">Estudios</button>
            <button id="experiencia-btn">Experiencia Laboral</button>
            <button id="trabajadores-btn">Trabajadores</button>
        </div>
        <div class="main">
            <div class="top-nav">
                <button id="tipodocumento-btn">Tipo Documento</button>
                <button id="tipomovimiento-btn">Tipo Movimiento</button>
                <button id="condicionlaboral-btn">Condición Laboral</button>
                <button id="cargos-btn">Cargos</button>
                <button id="areas-btn">Áreas</button>
            </div> 
            <div class="content" id="content">
                <div class="logo">
                    LOGO MUNICIPALIDAD
                    <br>
                    SISTEMA DE GESTIÓN DE ESCALAFÓN
                </div>
            </div>
        </div>
        <div class="footer">
            MUNICIPALIDAD DISTRITAL DE LA ESPERANZA - 2024  
        </div>
    </div>
    
</body>
</html>
