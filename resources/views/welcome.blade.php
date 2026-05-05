<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de Animales - Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <!-- La cabecera flota sobre toda la página -->
    @include('layouts.header')

    <!-- La foto empezará desde arriba del todo -->
    <div class="seccion-portada" style="padding-top: 100px;">
        <div class="contenido-portada">
            <h2>Dales una segunda oportunidad </h2>
        </div>
    </div>
    <div class="contenedor-principal">
        
        @include('layouts.sidebar')

        <!-- ZONA CENTRAL -->
        <main>
            <h2>Bienvenido a GuauHub</h2>
            <p>Donde el mundo construye software... digo, ¡donde los animales rescatan a sus humanos! Únete a la mayor comunidad de código abierto de adopción responsable.</p>
            
            <div class="caja-destacada">
                <h3>¡Haz Fork de tu nuevo mejor amigo!</h3>
                <p>Aquí el Estudiante 1 listará los repositorios (animales) más destacados que buscan un merge definitivo en una familia.</p>
                <a href="/catalogo" class="btn-principal">
                    Explorar repositorios públicos 👉
                </a>
            </div>
        </main>

    </div>

    <!-- INCLUIMOS EL PIE DE PÁGINA -->
    @include('layouts.footer')

    <!-- El script del menú lateral ya está incluido dentro de layouts.sidebar -->
</body>
</html>