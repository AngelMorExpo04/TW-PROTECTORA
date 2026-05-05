<header>
    <!-- 1. ZONA DEL LOGO Y TÍTULO -->
    <div class="zona-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Protectora" class="logo-cabecera">
        <h1>GuauHub</h1>
    </div>

    <!-- 2. BOTÓN HAMBURGUESA -->
    <button class="btn-menu" id="btnMenu">☰</button>

    <!-- 3. MENÚ DE NAVEGACIÓN DESPLEGABLE -->
    <nav id="menuNavegacion">
        <a href="/">README</a>
        <a href="/catalogo">Explorar Repositorios</a>
        <a href="/contacto">Soporte</a>
        
        <!-- ZONA DE USUARIO (Ahora está DENTRO del menú) -->
        <div class="zona-usuario">
            <a href="#" class="btn-login">Iniciar Sesión</a>
            <a href="#" class="btn-registro">Registrarse</a>
        </div>
    </nav>
</header>

<!-- MODALES DE SESIÓN Y REGISTRO -->
<div id="modalLogin" class="modal-overlay">
    <div class="modal-content modal-verde">
        <button class="btn-cerrar-modal" id="cerrarLogin">&times;</button>
        <h2>Iniciar Sesión</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="login-user">Nombre de usuario</label>
                <input type="text" id="login-user" name="login-user" required>
            </div>
            <div class="form-group">
                <label for="login-pass">Contraseña</label>
                <input type="password" id="login-pass" name="login-pass" required>
            </div>
            <button type="submit" class="btn-submit-modal">Entrar</button>
        </form>
    </div>
</div>

<div id="modalRegistro" class="modal-overlay">
    <div class="modal-content modal-negro">
        <button class="btn-cerrar-modal" id="cerrarRegistro">&times;</button>
        <h2>Registrarse</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="reg-nombre">Nombre y apellidos</label>
                <input type="text" id="reg-nombre" name="reg-nombre" required>
            </div>
            <div class="form-group">
                <label for="reg-user">Nombre de usuario</label>
                <input type="text" id="reg-user" name="reg-user" required>
            </div>
            <div class="form-group">
                <label for="reg-email">Correo</label>
                <input type="email" id="reg-email" name="reg-email" required>
            </div>
            <div class="form-group">
                <label for="reg-tipo">Tipo de cuenta (Para pruebas)</label>
                <select id="reg-tipo" name="tipo_usuario" required>
                    <option value="normal">Adoptante (Normal)</option>
                    <option value="voluntario">Voluntario / Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reg-pass">Contraseña</label>
                <input type="password" id="reg-pass" name="reg-pass" required>
            </div>
            <div class="form-group">
                <label for="reg-pass2">Contraseña de nuevo</label>
                <input type="password" id="reg-pass2" name="reg-pass2" required>
            </div>
            <button type="submit" class="btn-submit-modal btn-submit-registro">Crear cuenta</button>
        </form>
    </div>
</div>

<!-- SCRIPT para abrir/cerrar el menú en móvil y modales -->
<script>
    // Cuando el documento esté listo, le damos la orden al botón
    document.addEventListener('DOMContentLoaded', function() {
        // --- Menú Móvil ---
        const boton = document.getElementById('btnMenu');
        const menu = document.getElementById('menuNavegacion');

        boton.addEventListener('click', function() {
            // Activa o desactiva la clase "activo" (que en CSS lo hace visible)
            menu.classList.toggle('activo');
        });

        // --- Modales ---
        const modalLogin = document.getElementById('modalLogin');
        const modalRegistro = document.getElementById('modalRegistro');
        
        // Seleccionamos todos los botones por si hay varios (ej. móvil vs desktop)
        const btnLoginElements = document.querySelectorAll('.btn-login');
        const btnRegistroElements = document.querySelectorAll('.btn-registro');
        
        const cerrarLogin = document.getElementById('cerrarLogin');
        const cerrarRegistro = document.getElementById('cerrarRegistro');

        // Abrir Iniciar Sesión
        btnLoginElements.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                modalLogin.classList.add('activo');
            });
        });

        // Abrir Registro
        btnRegistroElements.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                modalRegistro.classList.add('activo');
            });
        });

        // Cerrar modales con la X
        cerrarLogin.addEventListener('click', () => modalLogin.classList.remove('activo'));
        cerrarRegistro.addEventListener('click', () => modalRegistro.classList.remove('activo'));

        // Cerrar al hacer clic en el fondo gris por fuera
        window.addEventListener('click', function(e) {
            if (e.target === modalLogin) {
                modalLogin.classList.remove('activo');
            }
            if (e.target === modalRegistro) {
                modalRegistro.classList.remove('activo');
            }
        });
    });
</script>