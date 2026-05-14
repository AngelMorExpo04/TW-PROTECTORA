<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Repository - GuauHub</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        .input-text, .textarea-readme {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 2px solid rgba(0, 0, 0, 0.15) !important;
            border-radius: 6px !important;
            background-color: #f1f1f1 !important;
            color: #333 !important;
            font-family: inherit;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .input-text:focus, .textarea-readme:focus {
            border-color: #4A7C59;
            background-color: #ffffff !important;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.3);
        }
        .form-group label {
            font-weight: bold;
            color: #333;
            margin-top: 15px;
            display: block;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')

        <main class="pr-container">
            <div class="pr-header">
                <h2>
                    <span class="texto-gris">
                        <a href="/" class="breadcrumb-link">GuauHub</a> / 
                        <a href="/catalogo" class="breadcrumb-link">Explorar Repositorios</a> /
                    </span> 
                    New Repository
                </h2>
            </div>

            <div class="pr-layout">
                <div class="pr-form-box" style="width: 100%;">
                    <form action="{{ route('admin.animales.store') }}" method="POST">
                        @csrf

                        @if($errors->any())
                            <div class="header-alert header-alert-error" style="margin-bottom: 20px;">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Repository Name (Nombre)</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="input-text">
                        </div>

                        <div style="display: flex; gap: 20px;">
                            <div class="form-group" style="flex: 1;">
                                <label>Species (Especie)</label>
                                <select name="species" required class="input-text">
                                    <option value="" disabled {{ old('species') ? '' : 'selected' }}>Selecciona especie</option>
                                    <option value="Perro" {{ old('species') == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ old('species') == 'Gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="Otro" {{ old('species') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label>Sex (Sexo)</label>
                                <select name="sex" required class="input-text">
                                    <option value="" disabled {{ old('sex') ? '' : 'selected' }}>Selecciona sexo</option>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Macho</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Hembra</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Breed (Raza)</label>
                            <input type="text" name="breed" value="{{ old('breed') }}" class="input-text" placeholder="Ej. Común Europeo">
                        </div>

                        <div class="form-group">
                            <label>Birth Date (Fecha de Nacimiento)</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" max="{{ date('Y-m-d') }}" required class="input-text">
                        </div>

                        <div class="form-group">
                            <label>Issues (Estado de Salud / Vacunas)</label>
                            <textarea name="health_status" rows="3" required class="textarea-readme">{{ old('health_status') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>README (Descripción)</label>
                            <textarea name="description" rows="5" required class="textarea-readme">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image URL (Ruta de la Imagen)</label>
                            <input type="url" name="image_path" value="{{ old('image_path') }}" required class="input-text" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>

                        <div class="pr-actions" style="margin-top: 20px; border-top: 1px solid #d0d7de; padding-top: 20px;">
                            <button type="submit" class="btn-principal btn-github-green">Create repository</button>
                            <a href="/catalogo" class="btn-secundario">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
