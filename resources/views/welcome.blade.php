<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protectora de Animales - Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <!-- La cabecera flota sobre toda la página -->
    @include('layouts.header')

    <!-- La foto empezará desde arriba del todo -->
    <div class="seccion-portada pt-100">
        <div class="contenido-portada">
            <h2>Dales una segunda oportunidad </h2>
        </div>
    </div>
    <div class="contenedor-principal">
        
        @include('layouts.sidebar')

        <!-- ZONA CENTRAL -->
        <main class="inicio-container">
            <!-- CABECERA DINÁMICA -->
            <section class="hero-intro">
                <div class="hero-text-overlap">
                    <h1>Un refugio diseñado por y para el futuro</h1>
                    <p class="big-text">
                        GuauHub nace de la unión de tres apasionados de la informática que decidieron aplicar sus conocimientos para transformar la vida de cientos de animales. No somos una protectora convencional; somos un equipo que cree que la tecnología puede ser el puente definitivo entre un animal que lo ha perdido todo y una familia que lo está buscando.
                    </p>
                    <p class="secondary-text">
                        Nuestra misión es profesionalizar la adopción, aportando la transparencia y la eficiencia que el mundo digital nos permite, sin perder nunca el cariño y el contacto humano que cada uno de nuestros residentes necesita.
                    </p>
                </div>
                <div class="hero-image-container">
                    <img src="{{ asset('img/hero-founders.png') }}" alt="Equipo GuauHub" class="hero-img-overlap">
                </div>
            </section>


            <!-- SECCIÓN: POR QUÉ GUAUHUB (DISEÑO INVERTIDO) -->
            <section class="razones-overlap-container">
                <div class="razon-image-container">
                    <img src="{{ asset('img/trust-mission.png') }}" alt="Confianza" class="razon-img-overlap">
                </div>
                <div class="razon-text-overlap">
                    <h2>¿Por qué confiar en nosotros?</h2>
                    <p>Elegir GuauHub significa apostar por una adopción inteligente y responsable. Hemos analizado los fallos comunes en las protectoras tradicionales para ofrecer una plataforma donde la información es clara, el seguimiento es real y el compromiso es total.</p>
                    <ul class="lista-limpia">
                        <li><strong>Transparencia absoluta</strong>: Cada ficha contiene el historial completo del animal, sin sorpresas.</li>
                        <li><strong>Seguridad en el proceso</strong>: Utilizamos protocolos rigurosos para asegurar que el perro y la familia sean el "match" perfecto.</li>
                        <li><strong>Soporte post-adopción</strong>: No desaparecemos tras la firma; te acompañamos en la integración de tu nuevo compañero.</li>
                    </ul>
                </div>
            </section>

            <!-- CTA FINAL -->
            <div class="caja-destacada final-cta-overlap">
                <h2>¿Estás listo para empezar tu historia?</h2>
                <p>Nuestros "repositorios" están llenos de vida esperando a ser descubiertos. Explora, pregunta y, si sientes la conexión, inicia el proceso de adopción hoy mismo.</p>
                <div class="botones-flex">
                    <a href="/catalogo" class="btn-principal-grande">Ver todos los animales</a>
                    <a href="/contacto" class="btn-outline-oscuro">Contactar con el equipo</a>
                </div>
            </div>
        </main>

    </div>

    <!-- INCLUIMOS EL PIE DE PÁGINA -->
    @include('layouts.footer')

    <!-- El script del menú lateral ya está incluido dentro de layouts.sidebar -->
</body>
</html>