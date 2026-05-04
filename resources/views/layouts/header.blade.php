<header>
    <!-- 1. ZONA DEL LOGO Y TÍTULO -->
    <div class="zona-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Protectora" class="logo-cabecera">
        <h1>GuauHub</h1>
    </div>

    <!-- 4. MENÚ DE NAVEGACIÓN DESPLEGABLE -->
    <nav id="menuNavegacion">
        <a href="/">Inicio</a>
        <a href="/catalogo">Repositorio de Mascotas</a>
        <a href="/contacto">Soporte</a>
    </nav>
    
    <!-- 2. ZONA DE USUARIO (Sacada del nav) -->
    <div class="zona-usuario">
        <a href="#" class="btn-login">Iniciar Sesión</a>
        <a href="#" class="btn-registro">Registrarse</a>
    </div>

    <!-- 3. BOTÓN HAMBURGUESA -->
    <button class="btn-menu" id="btnMenu">☰</button>
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