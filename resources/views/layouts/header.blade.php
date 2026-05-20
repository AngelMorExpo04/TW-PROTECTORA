<header>
    <!-- 1. ZONA DEL LOGO Y TÍTULO -->
    <div class="zona-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Protectora" class="logo-cabecera">
        <h1>GuauHub</h1>
    </div>

    <!-- 2. BOTÓN HAMBURGUESA Y CHECKBOX -->
    <input type="checkbox" id="toggle-menu" class="css-toggle d-none">
    <label for="toggle-menu" class="btn-menu" id="btnMenu">☰</label>

    <!-- 3. MENÚ DE NAVEGACIÓN DESPLEGABLE -->
    <nav id="menuNavegacion">
        <a href="/">README</a>
        <a href="/catalogo">Explorar Repositorios</a>
        <a href="/contacto">Soporte</a>
        
        <!-- ZONA DE USUARIO (Ahora está DENTRO del menú) -->
        <div class="zona-usuario">
            @auth
                <span class="{{ (Auth::user()->role === 'voluntario' || Auth::user()->role === 'voluntario') ? 'username-admin' : 'username-header' }}">{{ Auth::user()->username }}</span>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-logout-red">Cerrar Sesión</button>
                </form>
            @else
                <label for="toggle-login" class="btn-login cursor-pointer">Iniciar Sesión</label>
                <label for="toggle-registro" class="btn-registro cursor-pointer">Registrarse</label>
            @endauth
        </div>
    </nav>
</header>

@if($errors->any())
    <div class="header-alert header-alert-error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(session('success'))
    <div class="header-alert header-alert-success">
        <p>{{ session('success') }}</p>
    </div> 
@endif

<!-- MODALES DE SESIÓN Y REGISTRO -->
<input type="checkbox" id="toggle-login" class="css-toggle d-none">
<div id="modalLogin" class="modal-overlay">
    <label for="toggle-login" class="modal-bg-close"></label>
    <div class="modal-content modal-verde">
        <label for="toggle-login" class="btn-cerrar-modal" id="cerrarLogin">&times;</label>
        <h2>Iniciar Sesión</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="login-user">Nombre de usuario</label>
                <input type="text" id="login-user" name="username" required>
            </div>
            <div class="form-group">
                <label for="login-pass">Contraseña</label>
                <input type="password" id="login-pass" name="password" required>
            </div>
            <button type="submit" class="btn-submit-modal">Entrar</button>
        </form>
    </div>
</div>

<input type="checkbox" id="toggle-registro" class="css-toggle d-none">
<div id="modalRegistro" class="modal-overlay">
    <label for="toggle-registro" class="modal-bg-close"></label>
    <div class="modal-content modal-negro">
        <label for="toggle-registro" class="btn-cerrar-modal" id="cerrarRegistro">&times;</label>
        <h2>Registrarse</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="reg-nombre">Nombre y apellidos</label>
                <input type="text" id="reg-nombre" name="name" required>
            </div>
            <div class="form-group">
                <label for="reg-user">Nombre de usuario</label>
                <input type="text" id="reg-user" name="username" required>
            </div>
            <div class="form-group">
                <label for="reg-email">Correo</label>
                <input type="email" id="reg-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="reg-tipo">Tipo de cuenta (Para pruebas)</label>
                <select id="reg-tipo" name="role" required>
                    <option value="user">Adoptante (Normal)</option>
                    <option value="voluntario">Voluntario / Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reg-pass">Contraseña</label>
                <input type="password" id="reg-pass" name="password" required>
            </div>
            <div class="form-group">
                <label for="reg-pass2">Contraseña de nuevo</label>
                <input type="password" id="reg-pass2" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-submit-modal btn-submit-registro">Crear cuenta</button>
        </form>
    </div>
</div>