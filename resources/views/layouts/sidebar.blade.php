<!-- CHECKBOX OCULTO PARA EL MENÚ LATERAL -->
<input type="checkbox" id="toggle-sidebar" class="css-toggle" style="display:none;">

<!-- MENÚ LATERAL -->
<aside id="menuLateral">
    <!-- Botón de la huella que sobresale -->
    <label for="toggle-sidebar" id="btnHuella" class="btn-huella" title="Abrir/Cerrar menú"><img src="{{ asset('img/huella.png') }}" alt="Abrir menú" style="width: 25px; height: auto; cursor:pointer;"></label>
    
    <div class="contenido-aside">
        @guest
            <!-- Si no ha iniciado sesión -->
            <h3 style="margin-top: 0;">Tu Dashboard</h3>
            <p style="font-size: 0.95rem; color: #555; line-height: 1.5; margin-bottom: 0;">
                Inicia sesión para darle <b>Star</b> a tus repositorios de animales favoritos y hacer seguimiento de tus <b>Pull Requests</b> (adopciones).
            </p>
        @endguest

        @auth
            <!-- Opciones exclusivas para Usuario Normal -->
            @if(Auth::user()->role === 'user')
                <h3 style="margin-top: 0;">Tus Repositorios</h3>
                <ul>
                    <li><a href="/mis-favoritos">⭐ Repositorios Starred</a></li>
                    <li><a href="/mis-solicitudes">🔄 Mis Pull Requests (Trámites)</a></li>
                    <li><a href="/perfil">⚙️ Settings</a></li>
                </ul>
            @endif

            <!-- Opciones exclusivas de Voluntarios/Administradores -->
            @if(Auth::user()->role === 'voluntario' || Auth::user()->role === 'admin')
                <h3 style="color: #b30000; margin-top: 0;">Organización (Admin)</h3>
                <ul>
                    <li><a href="/animales/gestion" class="enlace-admin">➕ Nuevo Repo (Alta Animal)</a></li>
                    <li><a href="/panel-salud" class="enlace-admin">🐛 Issues Sanitarios (Salud)</a></li>
                    <li><a href="/solicitudes-pendientes" class="enlace-admin">📬 Merge Requests (Adopciones)</a></li>
                </ul>
            @endif
        @endauth
    </div>
</aside>
