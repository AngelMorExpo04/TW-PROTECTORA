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

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="repo-container">
            <!-- Cabecera del Repositorio -->
            <div class="repo-header">
                <h2>
                    <span class="texto-gris">
                        <a href="/" class="breadcrumb-link">GuauHub</a> / 
                        <a href="/catalogo" class="breadcrumb-link">Explorar Repositorios</a> /
                    </span> 
                    {{ $animal->name }}
                </h2>
            </div>

            <!-- Todo el contenido dentro de un único README box -->
            <div class="readme-box readme-box-{{ strtolower($animal->species) }}">
                <div class="readme-content">

                    <!-- Foto del animal -->
                    <div class="repo-image-wrapper">
                        <img src="{{ $animal->image_path }}" alt="{{ $animal->name }}" class="repo-image repo-image-top">
                        @auth
                            @if(Auth::user()->role === 'user')
                            <form action="{{ route('favoritos.toggle', $animal->id) }}" method="POST" class="fav-star-container fav-star-details">
                                @csrf
                                <button type="submit" class="btn-star-fav {{ Auth::user()->favorites->contains($animal->id) ? 'is-favorite' : '' }}" title="Guardar en favoritos"></button>
                            </form>
                            @endif
                        @endauth
                    </div>

                    <!-- Barra verde con README y Stars -->
                    <div class="readme-banner">
                        <strong>📖 README.md</strong>
                    </div>

                    <!-- Descripción principal -->
                    <h1>Hi there 👋, I'm {{ $animal->name }}!</h1>
                    <p>{{ $animal->description }}</p>

                    <!-- Separador -->
                    <hr class="readme-hr">

                    <!-- Metadatos en 2 columnas (About, Issues, Releases) -->
                    <div class="repo-meta-grid">

                        <div class="meta-section">
                            <h3>About</h3>
                            <p>{{ $animal->breed ?? 'Mestizo' }}.</p>
                            <div class="etiquetas etiquetas-sidebar">
                                <span class="etiqueta">{{ strtolower($animal->species) == 'perro' ? '🐶' : '🐱' }} {{ $animal->species }}</span>
                                <span class="etiqueta">{{ $animal->sex == 'male' ? 'Macho' : 'Hembra' }}</span>
                                <span class="etiqueta">
                                    @if($animal->status == 'adopted')
                                        🔴 Adoptado
                                    @elseif($animal->adoptionRequests->count() > 0 || $animal->status == 'in_process')
                                        🟡 Pendiente
                                    @else
                                        🟢 Disponible
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="meta-section">
                            <h3>🐛 Issues (Estado de Salud)</h3>
                            <ul class="issues-list">
                                @foreach(explode('.', $animal->health_status) as $issue)
                                    @if(trim($issue))
                                        <li>{{ trim($issue) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>


                        <div class="meta-section">
                            <h3>🏷️ Releases (Historial)</h3>
                            <p><strong>Nacimiento:</strong><br> {{ \Carbon\Carbon::parse($animal->birth_date)->format('d M Y') }}</p>
                            <p><strong>Edad:</strong><br> {{ \Carbon\Carbon::parse($animal->birth_date)->age }} años</p>
                        </div>

                    </div>

                    <!-- Botón de adopción/edición al final, centrado -->
                    <div class="adoptar-cta">
                        @auth
                            @if(Auth::user()->role === 'voluntario')
                                <a href="{{ route('animal.edit', $animal->id) }}" class="btn-adoptar-repo btn-editar-repo">
                                    ⚙️ Edit Repository (Editar)
                                </a>
                            @else
                                <a href="/adopcion/{{ $animal->id }}" class="btn-adoptar-repo">
                                    Pull Request (Adoptar)
                                </a>
                            @endif
                        @else
                            <a href="/adopcion/{{ $animal->id }}" class="btn-adoptar-repo">
                                Pull Request (Adoptar)
                            </a>
                        @endauth
                    </div>

                </div>
            </div>

        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
