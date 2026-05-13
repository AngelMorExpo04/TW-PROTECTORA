<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar Repositorios - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>Explorar Repositorios (Animales en Adopción)</h1>
            <p>Busca entre nuestros repositorios públicos y haz Fork del animal que mejor encaje con tu estilo de vida.</p>

            <div class="filtros-catalogo">
                <strong>Filtros rápidos:</strong>
                <a href="?tipo=perros" class="btn-filtro btn-filtro-perros"> Perros</a>
                <a href="?tipo=gatos" class="btn-filtro btn-filtro-gatos"> Gatos</a>
                <a href="/catalogo" class="btn-filtro btn-filtro-todos">Todos</a>
            </div>

            <div class="grid-animales">
                @foreach($animales as $animal)
                <div class="card-animal card-{{ strtolower($animal->species) }}">
                    <div class="card-animal-inner">
                        <div class="repo-image-wrapper">
                            <img src="{{ $animal->image_path }}" alt="{{ $animal->name }}">
                            @auth
                                @if(Auth::user()->role === 'user')
                                <form action="{{ route('favoritos.toggle', $animal->id) }}" method="POST" class="fav-star-container">
                                    @csrf
                                    <button type="submit" class="btn-star-fav {{ Auth::user()->favorites->contains($animal->id) ? 'is-favorite' : '' }}" title="Guardar en favoritos"></button>
                                </form>
                                @endif
                            @endauth
                        </div>
                        <div class="card-info">
                            <h3>{{ $animal->name }}</h3>
                            <div class="etiquetas">
                                <span class="etiqueta">{{ strtolower($animal->species) == 'perro' ? '🐶' : '🐱' }} {{ $animal->species }}</span>
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
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
