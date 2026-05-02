<header>
    <div class="zona-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Protectora" class="logo-cabecera">
        <h1>GuauHub</h1>
    </div>
    
    <!-- Botón Hamburguesa (solo visible en móvil) -->
    <button class="btn-menu" id="btnMenu">☰</button>

    <!-- Menú de navegación (le ponemos un ID para buscarlo en JavaScript) -->
    <nav id="menuNavegacion">
        <a href="/">Inicio</a>
        <a href="/catalogo">Catálogo de Animales</a>
        <a href="/contacto">Contacto</a>

        <!-- LÓGICA DE USUARIOS -->
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-perfil">
                    Mi Perfil ({{ Auth::user()->name }})
                </a>
            @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrarse</a>
                @endif
            @endauth
        @endif
    </nav>
</header>

<!-- SCRIPT para abrir/cerrar el menú en móvil -->
<script>
    // Cuando el documento esté listo, le damos la orden al botón
    document.addEventListener('DOMContentLoaded', function() {
        const boton = document.getElementById('btnMenu');
        const menu = document.getElementById('menuNavegacion');

        boton.addEventListener('click', function() {
            // Activa o desactiva la clase "activo" (que en CSS lo hace visible)
            menu.classList.toggle('activo');
        });
    });
</script>