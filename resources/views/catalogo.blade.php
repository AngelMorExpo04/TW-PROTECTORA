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
                <!-- Ejemplo de Animal 1 - PERRO -->
                <div class="card-animal card-perro">
                    <div class="card-animal-inner">
                        <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=600&auto=format&fit=crop" alt="Perro Beagle">
                        <div class="card-info">
                            <h3>Max (v2.0)</h3>
                            <div class="etiquetas">
                                <span class="etiqueta">🐶 Perro</span>
                                <span class="etiqueta">🟢 Activo</span>
                                <span class="etiqueta">🎂 2 años</span>
                            </div>
                            <p>Beagle muy enérgico. Ideal para desarrolladores que necesiten salir a correr después de programar.</p>
                            <a href="/animal" class="btn-catalogo">Ver detalles de la rama</a>
                        </div>
                    </div>
                </div>

                <!-- Ejemplo de Animal 2 - GATO -->
                <div class="card-animal card-gato">
                    <div class="card-animal-inner">
                        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=600&auto=format&fit=crop" alt="Gato Naranja">
                        <div class="card-info">
                            <h3>Garfield_Dev</h3>
                            <div class="etiquetas">
                                <span class="etiqueta">🐱 Gato</span>
                                <span class="etiqueta">💤 Dormilón</span>
                                <span class="etiqueta">🎂 4 años</span>
                            </div>
                            <p>Gato tranquilo, experto en dormir sobre el teclado mientras intentas hacer push a producción.</p>
                            <a href="/animal" class="btn-catalogo">Ver detalles de la rama</a>
                        </div>
                    </div>
                </div>

                <!-- Ejemplo de Animal 3 - PERRO -->
                <div class="card-animal card-perro">
                    <div class="card-animal-inner">
                        <img src="https://images.unsplash.com/photo-1605568427561-40dd23c2acea?q=80&w=600&auto=format&fit=crop" alt="Husky">
                        <div class="card-info">
                            <h3>Snow_Master</h3>
                            <div class="etiquetas">
                                <span class="etiqueta">🐶 Perro</span>
                                <span class="etiqueta">❄️ Frío</span>
                                <span class="etiqueta">🎂 1 año</span>
                            </div>
                            <p>Husky siberiano. Requiere sistemas de refrigeración avanzados y paseos largos.</p>
                            <a href="/animal" class="btn-catalogo">Ver detalles de la rama</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
