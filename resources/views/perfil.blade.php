<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="pt-100"></div>

    <div class="contenedor-principal">
        @include('layouts.sidebar')
        
        <main class="inicio-container">
            <div class="seccion-label">Mi Cuenta</div>
            <h1>Settings</h1>
            <p class="big-text">Página de ajustes en construcción.</p>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
