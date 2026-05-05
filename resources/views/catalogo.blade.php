<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar Repositorios - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        /* Estilos específicos para la página de catálogo */
        .catalogo-container {
            padding-top: 120px; /* Espacio para el header fijo */
            max-width: 1200px;
            margin: 0 auto;
            min-height: 80vh;
            padding-bottom: 50px;
        }
        .filtros-catalogo {
            margin-bottom: 30px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .grid-animales {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        .card-animal {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card-animal:hover {
            transform: translateY(-5px);
        }
        .card-animal img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .card-info {
            padding: 20px;
        }
        .card-info h3 {
            margin-top: 0;
            color: #1a1a1a;
        }
        .etiquetas {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .etiqueta {
            background: #e9ecef;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            color: #555;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>Explorar Repositorios (Animales en Adopción)</h1>
            <p>Busca entre nuestros repositorios públicos y haz Fork del animal que mejor encaje con tu estilo de vida.</p>

            <div class="filtros-catalogo">
                <strong>Filtros rápidos:</strong>
                <a href="?tipo=perros" class="btn-principal" style="padding: 8px 15px; margin-top: 0; background: #333;">🐶 Perros</a>
                <a href="?tipo=gatos" class="btn-principal" style="padding: 8px 15px; margin-top: 0; background: #333;">🐱 Gatos</a>
                <a href="/catalogo" class="btn-principal" style="padding: 8px 15px; margin-top: 0; background: #888;">Todos</a>
            </div>

            <div class="grid-animales">
                <!-- Ejemplo de Animal 1 -->
                <div class="card-animal">
                    <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=600&auto=format&fit=crop" alt="Perro Beagle">
                    <div class="card-info">
                        <h3>Max (v2.0)</h3>
                        <div class="etiquetas">
                            <span class="etiqueta">🐶 Perro</span>
                            <span class="etiqueta">🟢 Activo</span>
                            <span class="etiqueta">🎂 2 años</span>
                        </div>
                        <p>Beagle muy enérgico. Ideal para desarrolladores que necesiten salir a correr después de programar.</p>
                        <a href="/animal/max" class="btn-principal" style="width: 100%; text-align: center; box-sizing: border-box;">Ver detalles de la rama</a>
                    </div>
                </div>

                <!-- Ejemplo de Animal 2 -->
                <div class="card-animal">
                    <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=600&auto=format&fit=crop" alt="Gato Naranja">
                    <div class="card-info">
                        <h3>Garfield_Dev</h3>
                        <div class="etiquetas">
                            <span class="etiqueta">🐱 Gato</span>
                            <span class="etiqueta">💤 Dormilón</span>
                            <span class="etiqueta">🎂 4 años</span>
                        </div>
                        <p>Gato tranquilo, experto en dormir sobre el teclado mientras intentas hacer push a producción.</p>
                        <a href="/animal/garfield" class="btn-principal" style="width: 100%; text-align: center; box-sizing: border-box;">Ver detalles de la rama</a>
                    </div>
                </div>

                <!-- Ejemplo de Animal 3 -->
                <div class="card-animal">
                    <img src="https://images.unsplash.com/photo-1537151608804-ea6d11540eb1?q=80&w=600&auto=format&fit=crop" alt="Husky">
                    <div class="card-info">
                        <h3>Snow_Master</h3>
                        <div class="etiquetas">
                            <span class="etiqueta">🐶 Perro</span>
                            <span class="etiqueta">❄️ Frío</span>
                            <span class="etiqueta">🎂 1 año</span>
                        </div>
                        <p>Husky siberiano. Requiere sistemas de refrigeración avanzados y paseos largos.</p>
                        <a href="/animal/snow" class="btn-principal" style="width: 100%; text-align: center; box-sizing: border-box;">Ver detalles de la rama</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
