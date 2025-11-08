<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Gimnasio FitPro</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="page-body login-page-bg">

    <div class="login-container">
        <h2 class="login-title">Acceso de Empleados y Miembros</h2>
        <p class="login-subtitle">Ingresa tus credenciales para acceder a tu panel.</p>

        <!-- Manejo de Errores de Sesión -->
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" required class="form-input">
            </div>
            
            <div class="form-group form-checkbox">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox-input">
                <label for="remember" class="form-checkbox-label">Recordarme</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    Iniciar Sesión
                </button>
            </div>
        </form>

        <div class="login-links">
            <a href="{{ route('welcome') }}" class="link-secondary">&larr; Volver a la página principal</a>
        </div>
    </div>

</body>
</html>