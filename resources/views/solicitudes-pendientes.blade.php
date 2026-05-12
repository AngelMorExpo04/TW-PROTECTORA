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
                <div class="alert-error">
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
                                    <small class="text-muted">
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

                        <div class="form-actions mt-2 flex-gap-10">
                            <!-- Disparadores de Modales (Las etiquetas pueden estar en cualquier parte) -->
                            <label for="confirm-merge-{{ $solicitud->id }}" class="btn-principal btn-github-green btn-small cursor-pointer">
                                ✓ Merge
                            </label>

                            <label for="confirm-close-{{ $solicitud->id }}" class="btn-secundario btn-small cursor-pointer btn-danger-github">
                                ✕ Close
                            </label>

                            <!-- Formulario Oculto de Aprobación -->
                            <form id="form-approve-{{ $solicitud->id }}" action="{{ route('admin.solicitudes.action', $solicitud->id) }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                            </form>

                            <!-- Formulario Oculto de Rechazo -->
                            <form id="form-reject-{{ $solicitud->id }}" action="{{ route('admin.solicitudes.action', $solicitud->id) }}" method="POST" class="d-none">
                                @csrf
                                <input type="hidden" name="action" value="reject">
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>

    <!-- 
       ZONA DE MODALES (FUERA DE LOS CONTENEDORES) 
       Para que el 'fixed' sea respecto a la pantalla completa y el z-index 
       no esté limitado por los padres.
    -->
    @foreach($solicitudes as $solicitud)
        <!-- Modal Aprobar -->
        <input type="checkbox" id="confirm-merge-{{ $solicitud->id }}" class="modal-confirm-toggle d-none">
        <div class="modal-confirm-overlay">
            <div class="modal-confirm-content">
                <h2>¿Confirmar Merge?</h2>
                <p>¿Estás seguro de que quieres <strong>APROBAR</strong> esta solicitud? El animal será eliminado del catálogo definitivamente.</p>
                <div class="modal-confirm-actions">
                    <label for="confirm-merge-{{ $solicitud->id }}" class="btn-secundario cursor-pointer btn-modal-red">Cancelar</label>
                    <button type="submit" form="form-approve-{{ $solicitud->id }}" class="btn-principal">Confirmar Merge</button>
                </div>
            </div>
        </div>

        <!-- Modal Rechazar -->
        <input type="checkbox" id="confirm-close-{{ $solicitud->id }}" class="modal-confirm-toggle d-none">
        <div class="modal-confirm-overlay">
            <div class="modal-confirm-content modal-confirm-negro">
                <h2>¿Cerrar Pull Request?</h2>
                <p>¿Estás seguro de que quieres <strong>RECHAZAR</strong> esta solicitud? La petición se borrará pero el animal seguirá disponible.</p>
                <div class="modal-confirm-actions">
                    <label for="confirm-close-{{ $solicitud->id }}" class="btn-secundario cursor-pointer btn-modal-red">Cancelar</label>
                    <button type="submit" form="form-reject-{{ $solicitud->id }}" class="btn-secundario btn-danger-github">Confirmar Cierre</button>
                </div>
            </div>
        </div>
    @endforeach

    @include('layouts.footer')

</body>
</html>
