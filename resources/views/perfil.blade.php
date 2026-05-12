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

    <div class="contenedor-principal pt-100">
        @include('layouts.sidebar')
        
        <main class="catalogo-container">
            <div class="seccion-label">Ajustes Públicos</div>
            <h1>Perfil de Usuario</h1>
            
            <div class="settings-form-container">
                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    
                    <div class="settings-group">
                        <label for="name">Nombre Público</label>
                        <input type="text" id="name" name="name" class="settings-input" value="{{ old('name', Auth::user()->name) }}" required>
                        <p class="settings-info-text">Tu nombre real o el que quieras que otros usuarios vean.</p>
                    </div>

                    <div class="settings-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" id="username" name="username" class="settings-input" value="{{ old('username', Auth::user()->username) }}" required>
                        <p class="settings-info-text">Este es el identificador único de tu cuenta (@username).</p>
                    </div>

                    <div class="settings-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="settings-input" value="{{ old('email', Auth::user()->email) }}" required>
                        <p class="settings-info-text">Usado para notificaciones y recuperación de cuenta.</p>
                    </div>

                    <div class="pt-section">
                        <button type="submit" class="btn-save-settings">Guardar Cambios</button>
                    </div>
                </form>

                <div class="mt-separator">
                    <div class="seccion-label text-danger-github">Seguridad</div>
                    <h1>Cambiar Contraseña</h1>
                    
                    <form action="{{ route('perfil.password') }}" method="POST">
                        @csrf
                        
                        <div class="settings-group">
                            <label for="current_password">Contraseña Actual</label>
                            <input type="password" id="current_password" name="current_password" class="settings-input" required>
                            <p class="settings-info-text">Por seguridad, confirma tu identidad antes de cambiar la contraseña.</p>
                        </div>

                        <div class="settings-group">
                            <label for="new_password">Nueva Contraseña</label>
                            <input type="password" id="new_password" name="new_password" class="settings-input" required>
                            <p class="settings-info-text">Mínimo 8 caracteres.</p>
                        </div>

                        <div class="settings-group">
                            <label for="new_password_confirmation">Confirmar Nueva Contraseña</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="settings-input" required>
                        </div>

                        <div class="pt-section">
                            <button type="submit" class="btn-save-settings btn-black-github">Actualizar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    @include('layouts.footer')

</body>
</html>
