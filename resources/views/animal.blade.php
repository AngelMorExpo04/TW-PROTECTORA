<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal" style="padding-top: 100px;">
        @include('layouts.sidebar')

        <main class="repo-container">
            <!-- Cabecera del Repositorio -->
            <div class="repo-header">
                <h2><span class="texto-gris">GuauHub / Explorar Repositorios /</span> Max_v2</h2>
            </div>

            <!-- Todo el contenido dentro de un único README box -->
            <div class="readme-box readme-box-perro">
                <div class="readme-content">

                    <!-- Foto del animal -->
                    <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=800&auto=format&fit=crop" alt="Perro Beagle" class="repo-image repo-image-top">

                    <!-- Barra verde con README y Stars -->
                    <div class="readme-banner">
                        <strong>📖 README.md</strong>
                        <span class="readme-stars">⭐ Star 12</span>
                    </div>

                    <!-- Descripción principal -->
                    <h1>Hi there 👋, I'm Max!</h1>
                    <p>Soy un Beagle con mucha energía compilada. Fui rescatado y ahora busco un equipo de desarrollo (familia) estable donde pueda hacer *deploy* de mi amor a diario.</p>

                    <!-- Skills y Dependencias en 2 columnas -->
                    <div class="text-columns">
                        <div class="col-break">
                            <h3 class="mt-0">🛠 Skills &amp; Hobbies</h3>
                            <ul class="lista-skills">
                                <li>🏃‍♂️ <strong>Paseos largos:</strong> Requiere al menos 2h al día.</li>
                                <li>🐕 <strong>Socialización:</strong> Compatible con otros perros.</li>
                                <li>🦴 <strong>Garbage Collection:</strong> Come cualquier miga.</li>
                            </ul>
                        </div>
                        <div class="col-break">
                            <h3 class="mt-0">⚠️ Dependencias</h3>
                            <p>Necesito una casa con zonas verdes o humanos muy activos. No soy compatible con gatos (conflicto de versiones).</p>
                        </div>
                    </div>

                    <!-- Separador -->
                    <hr class="readme-hr">

                    <!-- Metadatos en 2 columnas (About, Issues, Releases, Contributors) -->
                    <div class="repo-meta-grid">

                        <div class="meta-section">
                            <h3>About</h3>
                            <p>Beagle macho, tamaño mediano. Ideal para desarrolladores que necesiten salir a correr después de programar.</p>
                            <div class="etiquetas etiquetas-sidebar">
                                <span class="etiqueta">🐶 Perro</span>
                                <span class="etiqueta">🟢 Activo</span>
                            </div>
                        </div>

                        <div class="meta-section">
                            <h3>🐛 Issues (Estado de Salud)</h3>
                            <ul class="no-bullets">
                                <li><span class="check-ok">✓</span> Vacunación al día</li>
                                <li><span class="check-ok">✓</span> Microchip instalado</li>
                                <li><span class="check-ok">✓</span> Castrado</li>
                                <li><span class="check-warn">⚠</span> Leve alergia al pollo</li>
                            </ul>
                        </div>

                        <div class="meta-section">
                            <h3>🏷️ Releases (Historial)</h3>
                            <p><strong>v1.0 (Nacimiento):</strong><br> 15 Abril 2022</p>
                            <p><strong>v2.0 (Llegada al Refugio):</strong><br> 10 Enero 2024</p>
                        </div>

                        <div class="meta-section">
                            <h3>🤝 Contributors (Padrinos)</h3>
                            <p>3 padrinos actuales</p>
                        </div>

                    </div>

                    <!-- Botón de adopción al final, centrado -->
                    <div class="adoptar-cta">
                        <a href="/adopcion" class="btn-adoptar-repo">
                            🍴 Fork &amp; Pull Request (Adoptar)
                        </a>
                    </div>

                </div>
            </div>

        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
