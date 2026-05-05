<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        .contacto-container {
            padding-top: 120px;
            max-width: 800px;
            margin: 0 auto;
            min-height: 80vh;
            padding-bottom: 50px;
        }
        .form-contacto {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .form-contacto .form-group {
            margin-bottom: 20px;
        }
        .form-contacto input, .form-contacto textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            font-family: inherit;
        }
        .form-contacto textarea {
            resize: vertical;
            min-height: 150px;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal">
        @include('layouts.sidebar')

        <main class="contacto-container" style="flex: 1;">
            <h1>Soporte (Contacto)</h1>
            <p>¿Tienes dudas sobre cómo hacer un fork a alguno de nuestros animales o sobre el proceso de adopción (Pull Request)? ¡Abre un ticket de soporte enviándonos este formulario!</p>

            <div class="form-contacto">
                <form action="#" method="POST">
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
                    
                    <button type="submit" class="btn-principal" style="width: 100%;">Enviar Ticket de Soporte</button>
                </form>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
