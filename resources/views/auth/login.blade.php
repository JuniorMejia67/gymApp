<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Gimnasio FitPro</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body class="page-body login-page-bg">

    <div class="login-container">
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-logo">
            <img src="{{ asset('imagenes/logo_w.png') }}" alt="logo" class="login-logo">
        </div> 
        <form method="POST" action="{{ route('login.attempt') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus class="form-input">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Contraseña" required class="form-input">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">
                    Iniciar Sesión
                </button>
            </div>
        </form>

    </div>

</body>
</html>