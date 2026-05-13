<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <meta name="referrer" content="no-referrer">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="contacto-container">
            <h1>Soporte (Contacto)</h1>
            <p>¿Tienes dudas sobre cómo hacer un fork a alguno de nuestros animales o sobre el proceso de adopción (Pull Request)? ¡Abre un ticket de soporte enviándonos este formulario!</p>

            <div class="form-contacto">
                <form action="/contacto" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del desarrollador (Tú)</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Linus Torvalds">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required placeholder="correo@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto del Issue</label>
                        <input type="text" id="asunto" name="asunto" required placeholder="Duda sobre requisitos de adopción...">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Descripción detallada</label>
                        <textarea id="mensaje" name="mensaje" required placeholder="Escribe aquí tu duda..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-principal w-100">Enviar Ticket de Soporte</button>
                </form>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
