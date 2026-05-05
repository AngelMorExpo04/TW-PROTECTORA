<header>
    <!-- 1. ZONA DEL LOGO Y TÍTULO -->
    <div class="zona-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Protectora" class="logo-cabecera">
        <h1>GuauHub</h1>
    </div>

    <!-- 2. BOTÓN HAMBURGUESA Y CHECKBOX -->
    <input type="checkbox" id="toggle-menu" class="css-toggle" style="display:none;">
    <label for="toggle-menu" class="btn-menu" id="btnMenu">☰</label>

    <!-- 3. MENÚ DE NAVEGACIÓN DESPLEGABLE -->
    <nav id="menuNavegacion">
        <a href="/">README</a>
        <a href="/catalogo">Explorar Repositorios</a>
        <a href="/contacto">Soporte</a>
        
        <!-- ZONA DE USUARIO (Ahora está DENTRO del menú) -->
        <div class="zona-usuario">
            <label for="toggle-login" class="btn-login" style="cursor:pointer;">Iniciar Sesión</label>
            <label for="toggle-registro" class="btn-registro" style="cursor:pointer;">Registrarse</label>
        </div>
    </nav>
</header>

<!-- MODALES DE SESIÓN Y REGISTRO (SIN JAVASCRIPT) -->
<input type="checkbox" id="toggle-login" class="css-toggle" style="display:none;">
<div id="modalLogin" class="modal-overlay">
    <label for="toggle-login" class="modal-bg-close"></label>
    <div class="modal-content modal-verde">
        <label for="toggle-login" class="btn-cerrar-modal" id="cerrarLogin">&times;</label>
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

<input type="checkbox" id="toggle-registro" class="css-toggle" style="display:none;">
<div id="modalRegistro" class="modal-overlay">
    <label for="toggle-registro" class="modal-bg-close"></label>
    <div class="modal-content modal-negro">
        <label for="toggle-registro" class="btn-cerrar-modal" id="cerrarRegistro">&times;</label>
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