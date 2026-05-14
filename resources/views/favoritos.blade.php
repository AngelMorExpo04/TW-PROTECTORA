<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Favoritos - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>Mis Favoritos <img src="{{ asset('img/star-green.png') }}" alt="star" class="img-title-icon"></h1>
            <p>Aquí tienes los repositorios que has marcado como favoritos para seguir de cerca su desarrollo.</p>

            @if($animales->isEmpty())
                <div class="empty-state">
                    <p>Aún no tienes ningún animal en favoritos. ¡Explora el catálogo y dales una estrella!</p>
                    <a href="/catalogo" class="btn-principal">Ir al Catálogo</a>
                </div>
            @else
                <div class="grid-animales">
                    @foreach($animales as $animal)
                    <div class="card-animal card-{{ strtolower($animal->species) }}">
                        <div class="card-animal-inner">
                            <div class="repo-image-wrapper">
                                <img src="{{ $animal->image_path }}" alt="{{ $animal->name }}">
                                <form action="{{ route('favoritos.toggle', $animal->id) }}" method="POST" class="fav-star-container">
                                    @csrf
                                    <button type="submit" class="btn-star-fav is-favorite" title="Quitar de favoritos"></button>
                                </form>
                            </div>
                            <div class="card-info">
                                <h3>{{ $animal->name }}</h3>
                                <div class="etiquetas">
                                    <span class="etiqueta">{{ strtolower($animal->species) == 'perro' ? '🐶' : (strtolower($animal->species) == 'gato' ? '🐱' : '🐾') }} {{ $animal->species }}</span>
                                    <span class="etiqueta">
                                        @if($animal->status == 'adopted')
                                            🔴 Adoptado
                                        @elseif($animal->adoptionRequests->count() > 0 || $animal->status == 'in_process')
                                            🟡 Pendiente
                                        @else
                                            🟢 Disponible
                                        @endif
                                    </span>
                                    <span class="etiqueta">🎂 {{ \Carbon\Carbon::parse($animal->birth_date)->age }} años</span>
                                </div>
                                <p>{{ Str::limit($animal->description, 100) }}</p>
                                <a href="/animal/{{ $animal->id }}" class="btn-catalogo">Ver detalles de la rama</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
