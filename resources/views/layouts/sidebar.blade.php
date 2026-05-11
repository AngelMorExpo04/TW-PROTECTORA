<!-- CHECKBOX OCULTO PARA EL MENÚ LATERAL -->
<input type="checkbox" id="toggle-sidebar" class="css-toggle d-none">

<!-- MENÚ LATERAL -->
<aside id="menuLateral">
    <!-- Botón de la huella que sobresale -->
    <label for="toggle-sidebar" id="btnHuella" class="btn-huella" title="Abrir/Cerrar menú"><img src="{{ asset('img/huella.png') }}" alt="Abrir menú" class="w-25-auto cursor-pointer"></label>
    
    <div class="contenido-aside">
        @guest
            <!-- Si no ha iniciado sesión -->
            <h3 class="mt-0">Tu Dashboard</h3>
            <p class="sidebar-p-small">
                Inicia sesión para darle <b>Star</b> a tus repositorios de animales favoritos y hacer seguimiento de tus <b>Pull Requests</b> (adopciones).
            </p>
        @endguest

        @auth
            <!-- Opciones exclusivas para Usuario Normal -->
            @if(Auth::user()->role === 'user')
                <h3 class="mt-0">Tus Repositorios</h3>
                <ul>
                    <li><a href="/mis-favoritos"><img src="{{ asset('img/star-green.png') }}" alt="star" class="img-star-inline"> Repositorios Starred</a></li>
                    <li><a href="/mis-solicitudes"><img src="{{ asset('img/pr-green.png') }}" alt="pr" class="img-sidebar-large"> Mis Pull Requests</a></li>
                    <li><a href="/perfil"><img src="{{ asset('img/settings-green.png') }}" alt="settings" class="img-star-inline"> Settings</a></li>
                </ul>
            @endif

            <!-- Opciones exclusivas de Voluntarios/Administradores -->
            @if(Auth::user()->role === 'voluntario' || Auth::user()->role === 'admin')
                <h3 class="mt-0">Organización (Admin)</h3>
                <ul>
                    <li><a href="/animales/gestion" class="enlace-admin"><span style="color: #4A7C59; font-weight: bold; font-size: 2rem; margin-right: 8px; vertical-align: middle; line-height: 1;">+</span> Nuevo Repo</a></li>
                    <li><a href="/panel-salud" class="enlace-admin"><img src="{{ asset('img/health-green.png') }}" alt="health" class="img-star-inline" style="width: 25px; height: 25px;"> Issues Sanitarios </a></li>
                    <li><a href="/solicitudes-pendientes" class="enlace-admin"><img src="{{ asset('img/mailbox-green.png') }}" alt="mailbox" class="img-star-inline" style="width: 25px; height: 25px;"> Merge Requests</a></li>
                    <li><a href="/perfil"><img src="{{ asset('img/settings-green.png') }}" alt="settings" class="img-star-inline"> Settings</a></li>
                </ul>
            @endif
        @endauth
    </div>
</aside>
