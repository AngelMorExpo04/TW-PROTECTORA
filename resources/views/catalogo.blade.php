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

    <div class="contenedor-principal" style="padding-top: 100px;">
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
                        <img src="{{ $animal->image_path }}" alt="{{ $animal->name }}">
                        <div class="card-info">
                            <h3>{{ $animal->name }}</h3>
                            <div class="etiquetas">
                                <span class="etiqueta">{{ strtolower($animal->species) == 'perro' ? '🐶' : '🐱' }} {{ $animal->species }}</span>
                                <span class="etiqueta">
                                    @if($animal->status == 'available')
                                        🟢 Disponible
                                    @elseif($animal->status == 'in_process')
                                        🟡 En proceso
                                    @else
                                        🔴 Adoptado
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
