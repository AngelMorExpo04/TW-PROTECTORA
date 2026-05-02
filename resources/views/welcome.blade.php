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
        
        <!-- MENÚ LATERAL -->
        <aside>
            <h3>Filtros y Ayuda</h3>
            <ul>
                <li><a href="/catalogo?tipo=perros">🐶 Ver Perros</a></li>
                <li><a href="/catalogo?tipo=gatos">🐱 Ver Gatos</a></li>
                <li><a href="/contacto">📞 Sobre nosotros</a></li>
                
                @auth
                    @if(Auth::user()->tipo_usuario === 'voluntario' || Auth::user()->tipo_usuario === 'admin')
                        <li><hr></li>
                        <li><a href="/panel-voluntariado" class="enlace-admin">⚙️ Gestión (Voluntario)</a></li>
                    @endif
                @endauth
            </ul>
        </aside>

        <!-- ZONA CENTRAL -->
        <main>
            <h2>Bienvenido a nuestra Protectora</h2>
            <p>Nuestra misión principal es fomentar la adopción responsable y llevar un control sanitario de los animales rescatados.</p>
            
            <div class="caja-destacada">
                <h3>¡Encuentra a tu nuevo mejor amigo!</h3>
                <p>Aquí el Estudiante 1 pondrá un pequeño resumen o fotos destacadas de los animales disponibles.</p>
                <a href="/catalogo" class="btn-principal">
                    Ir al Catálogo de Adopción 👉
                </a>
            </div>
        </main>

    </div>

    <!-- INCLUIMOS EL PIE DE PÁGINA -->
    @include('layouts.footer')

</body>
</html>