<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - {{ $animal->name }} - GuauHub</title>
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
            background-color: #ffffff;
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
                        <a href="/animal/{{ $animal->id }}" class="breadcrumb-link">{{ $animal->name }}</a> /
                    </span> 
                    Settings
                </h2>
            </div>

            <div class="pr-layout">
                <div class="pr-form-box" style="width: 100%;">
                    <form action="{{ route('animal.update', $animal->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if($errors->any())
                            <div class="header-alert header-alert-error" style="margin-bottom: 20px;">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Repository Name (Nombre)</label>
                            <input type="text" name="name" value="{{ old('name', $animal->name) }}" required class="input-text">
                        </div>

                        <div style="display: flex; gap: 20px;">
                            <div class="form-group" style="flex: 1;">
                                <label>Species (Especie)</label>
                                <select name="species" required class="input-text">
                                    <option value="Perro" {{ old('species', $animal->species) == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ old('species', $animal->species) == 'Gato' ? 'selected' : '' }}>Gato</option>
                                </select>
                            </div>
                            <div class="form-group" style="flex: 1;">
                                <label>Sex (Sexo)</label>
                                <select name="sex" required class="input-text">
                                    <option value="male" {{ old('sex', $animal->sex) == 'male' ? 'selected' : '' }}>Macho</option>
                                    <option value="female" {{ old('sex', $animal->sex) == 'female' ? 'selected' : '' }}>Hembra</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Breed (Raza)</label>
                            <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}" class="input-text">
                        </div>

                        <div class="form-group">
                            <label>Birth Date (Fecha de Nacimiento)</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date', \Carbon\Carbon::parse($animal->birth_date)->format('Y-m-d')) }}" required class="input-text">
                        </div>

                        <div class="form-group">
                            <label>Status (Estado)</label>
                            <input type="text" value="{{ $animal->status == 'available' ? '🟢 Disponible' : ($animal->status == 'in_process' ? '🟡 En Proceso (Pendiente)' : '🔴 Adoptado') }}" class="input-text" readonly style="background-color: #d5d5d5 !important; color: #555 !important; cursor: not-allowed; border-color: #ccc !important;" title="El estado de adopción no se puede modificar manualmente">
                        </div>

                        <div class="form-group">
                            <label>Issues (Estado de Salud / Vacunas)</label>
                            <textarea name="health_status" rows="3" required class="textarea-readme">{{ old('health_status', $animal->health_status) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>README (Descripción)</label>
                            <textarea name="description" rows="5" required class="textarea-readme">{{ old('description', $animal->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image URL (Ruta de la Imagen)</label>
                            <input type="url" name="image_path" value="{{ old('image_path', $animal->image_path) }}" required class="input-text">
                            <div style="margin-top: 10px;">
                                <img src="{{ old('image_path', $animal->image_path) }}" alt="Preview" style="max-height: 150px; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                            </div>
                        </div>

                        <div class="pr-actions" style="margin-top: 20px; border-top: 1px solid #d0d7de; padding-top: 20px;">
                            <button type="submit" class="btn-principal btn-github-green">Save changes</button>
                            <a href="/animal/{{ $animal->id }}" class="btn-secundario">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
