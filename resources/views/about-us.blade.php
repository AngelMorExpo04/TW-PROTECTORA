<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <meta name="referrer" content="no-referrer">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>About Us</h1>
            <p>Conoce a los desarrolladores detrás de GuauHub. Somos un equipo apasionado por la tecnología y el bienestar animal.</p>

            <div class="founders-clean-grid mt-4">
                <!-- Mantenedor 1 -->
                <div class="founder-item">
                    <div class="founder-circle">
                        <img src="{{ asset('img/founder1.png') }}" alt="Angel Moreno">
                    </div>
                    <div class="founder-info">
                        <h3>Angel Moreno</h3>
                        <div class="etiquetas etiquetas-center">
                            <span class="etiqueta"> Lead Maintainer</span>
                        </div>
                        <p>Desarrollador principal y arquitecto de la plataforma GuauHub.</p>
                        <p class="text-muted small">📧 angelmorexpo@gmail.com</p>
                    </div>
                </div>

                <!-- Mantenedor 2 -->
                <div class="founder-item">
                    <div class="founder-circle">
                        <img src="{{ asset('img/founder2.png') }}" alt="Pablo Ordoñez">
                    </div>
                    <div class="founder-info">
                        <h3>Pablo Ordoñez</h3>
                        <div class="etiquetas etiquetas-center">
                            <span class="etiqueta"> Backend Engineer</span>
                        </div>
                        <p>Encargado de la lógica de servidores, bases de datos y seguridad.</p>
                        <p class="text-muted small">📧 pablordgom@gmail.com</p>
                    </div>
                </div>

                <!-- Mantenedor 3 -->
                <div class="founder-item">
                    <div class="founder-circle">
                        <img src="{{ asset('img/founder3.png') }}" alt="Guillermo Moyano">
                    </div>
                    <div class="founder-info">
                        <h3>Guillermo Moyano</h3>
                        <div class="etiquetas etiquetas-center">
                            <span class="etiqueta"> UI/UX Designer</span>
                        </div>
                        <p>Responsable de la interfaz GitHub-style y la experiencia de usuario.</p>
                        <p class="text-muted small">📧 guillermomoyano@correo.ugr.es</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
