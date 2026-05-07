<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Pull Request (Adopción) - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="pr-container">
            <div class="pr-header">
                <h2>Abrir una Pull Request (Solicitud de Adopción)</h2>
                <div class="pr-compare">
                    <span class="branch-badge base-branch">base: tu-casa</span>
                    <span class="compare-arrow">←</span>
                    <span class="branch-badge compare-branch">compare: GuauHub/Max_v2</span>
                </div>
            </div>

            <div class="pr-layout">
                <div class="pr-form-box">
                    <form action="/adopcion" method="POST">
                        @csrf
                        <input type="hidden" name="animal_id" value="{{ $animal->id ?? '' }}">
                        <div class="form-group">
                            <label for="titulo">Título de la Pull Request</label>
                            <input type="text" id="titulo" name="titulo" value="Solicitud de adopción para {{ $animal->name ?? 'Max' }}" readonly class="input-readonly">
                        </div>

                        <div class="form-group">
                            <label for="application_text">Write (Justificación de la adopción y contexto)</label>
                            <textarea id="application_text" name="application_text" placeholder="Explica tu experiencia, entorno de despliegue (vivienda) y por qué eres el candidato ideal para hacer merge de este repositorio en tu vida..." required class="textarea-readme"></textarea>
                            <small class="text-muted-small">Mínimo 50 caracteres recomendados. Detalla tu nivel de seniority y entorno. Soporta Markdown.</small>
                        </div>

                        <div class="form-check-group">
                            <label class="checkbox-container">
                                <input type="checkbox" required>
                                He leído y acepto los requisitos de adopción (Documentation).
                            </label>
                            <label class="checkbox-container">
                                <input type="checkbox" required>
                                Estoy de acuerdo en pasar una entrevista de pre-adopción (Code Review).
                            </label>
                        </div>
                        
                        <div class="pr-actions">
                            <button type="submit" class="btn-principal btn-github-green">Create Pull Request</button>
                            <a href="/animal/{{ $animal->id ?? '' }}" class="btn-secundario">Cancel</a>
                        </div>
                    </form>
                </div>

                <div class="pr-sidebar">
                    <div class="sidebar-section">
                        <h3>Reviewers</h3>
                        <p class="sidebar-p-small">El equipo de voluntarios de GuauHub revisará esta PR.</p>
                    </div>
                    <div class="sidebar-section">
                        <h3>Assignees</h3>
                        <p>No one assigned</p>
                    </div>
                    <div class="sidebar-section">
                        <h3>Labels</h3>
                        <span class="etiqueta etiqueta-blue">Adopción</span>
                        <span class="etiqueta etiqueta-green">Perro</span>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
