<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pull Requests - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <meta name="referrer" content="no-referrer">

</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>Mis Pull Requests</h1>
            <p>Aquí puedes ver y gestionar tus solicitudes de adopción activas (Pull Requests abiertas).</p>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($solicitudes->isEmpty())
                <div class="empty-state">
                    <p>No tienes ninguna Pull Request abierta. ¡Explora los repositorios y abre una!</p>
                    <a href="/catalogo" class="btn-principal">Explorar Repositorios</a>
                </div>
            @else
                <div class="solicitudes-list">
                    @foreach($solicitudes as $solicitud)
                    <div class="solicitud-card">
                        <!-- Checkbox invisible para controlar el estado de edición -->
                        <input type="checkbox" id="edit-toggle-{{ $solicitud->id }}" class="edit-toggle d-none">
                        
                        <div class="solicitud-header">
                            <div class="solicitud-animal-info">
                                <img src="{{ $solicitud->animal->image_path }}" alt="{{ $solicitud->animal->name }}" class="animal-mini-thumb">
                                <div>
                                    <h3>Solicitud para {{ $solicitud->animal->name }}</h3>
                                    <span class="status-badge status-{{ $solicitud->status }}">
                                        {{ ucfirst($solicitud->status) }}
                                    </span>
                                </div>
                            </div>
                            <!-- El botón ahora es un label que activa el checkbox -->
                            <label for="edit-toggle-{{ $solicitud->id }}" class="btn-edit-pr cursor-pointer">Editar Descripción</label>
                        </div>

                        <!-- Vista normal -->
                        <div class="solicitud-content">
                            <div class="application-text-box">
                                {{ $solicitud->application_text }}
                            </div>
                        </div>

                        <!-- Vista edición (Se muestra con el checkbox:checked) -->
                        <div class="solicitud-edit-form">
                            <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
                                @csrf
                                <textarea name="application_text" class="textarea-readme" required>{{ $solicitud->application_text }}</textarea>
                                <div class="form-actions mt-2">
                                    <button type="submit" class="btn-principal btn-github-green btn-small">Save Changes</button>
                                    <!-- El botón cancelar también es un label que desactiva el checkbox -->
                                    <label for="edit-toggle-{{ $solicitud->id }}" class="btn-secundario btn-small cursor-pointer">Cancel</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
