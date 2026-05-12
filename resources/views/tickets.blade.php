<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets de Soporte - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="contacto-container">
            <h1>Tickets de Soporte</h1>
            
            <div class="table-container">
                <table class="tabla-admin">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Asunto</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td data-label="Nombre">{{ $ticket->nombre }}</td>
                            <td data-label="Email">{{ $ticket->email }}</td>
                            <td data-label="Asunto">{{ $ticket->asunto }}</td>
                            <td data-label="Mensaje">{{ $ticket->mensaje }}</td>
                            <td data-label="Fecha">{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>