<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Requests Pendientes - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="catalogo-container">
            <h1>Merge Requests Pendientes</h1>
            <p>Revisa las solicitudes de adopción abiertas. Puedes aprobar (merge) o rechazar (close) cada Pull Request.</p>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-error" style="background: #f8d7da; color: #721c24; padding: 12px 18px; border-radius: 8px; margin-bottom: 18px; border: 1px solid #f5c6cb;">
                    {{ session('error') }}
                </div>
            @endif

            @if($solicitudes->isEmpty())
                <div class="empty-state">
                    <p>No hay Pull Requests pendientes de revisión. ¡Todo al día!</p>
                </div>
            @else
                <div class="solicitudes-list">
                    @foreach($solicitudes as $solicitud)
                    <div class="solicitud-card">
                        <div class="solicitud-header">
                            <div class="solicitud-animal-info">
                                @if($solicitud->animal)
                                    <img src="{{ $solicitud->animal->image_path }}" alt="{{ $solicitud->animal->name }}" class="animal-mini-thumb">
                                @endif
                                <div>
                                    <h3>
                                        PR: Adopción de {{ $solicitud->animal->name ?? 'Animal eliminado' }}
                                    </h3>
                                    <span class="status-badge status-pending">Pending review</span>
                                    <br>
                                    <small style="color: #8b949e;">
                                        Abierta por <strong>{{ $solicitud->user->username ?? 'Usuario desconocido' }}</strong>
                                        el {{ $solicitud->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="solicitud-content">
                            <div class="application-text-box">
                                {{ $solicitud->application_text }}
                            </div>
                        </div>

                        <div class="form-actions mt-2" style="display: flex; gap: 10px; padding: 0 20px 20px;">
                            <!-- Botón Aceptar (Merge) -->
                            <form action="{{ route('admin.solicitudes.action', $solicitud->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="btn-principal btn-github-green btn-small" onclick="return confirm('¿Seguro que quieres APROBAR esta solicitud? El animal será eliminado del catálogo.')">
                                    ✓ Merge (Aprobar)
                                </button>
                            </form>

                            <!-- Botón Rechazar (Close) -->
                            <form action="{{ route('admin.solicitudes.action', $solicitud->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="btn-secundario btn-small" style="background: #da3633; color: white; border: none;" onclick="return confirm('¿Seguro que quieres RECHAZAR esta solicitud?')">
                                    ✕ Close (Rechazar)
                                </button>
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
