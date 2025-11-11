<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>

    <div class="container">
        <h1>Bienvenido, {{ $user->name }}</h1>

        <div class="info">
            <label>Correo electrónico:</label>
            <p>{{ $user->email }}</p>

            <label>Teléfono:</label>
            <p>{{ $user->phone ?? 'No registrado' }}</p>

            <label>Tipo de membresía:</label>
            <p>{{ $user->membership_type ?? 'No asignada' }}</p>

            <label>Inicio de membresía:</label>
            <p>{{ $user->membership_start_date ? \Carbon\Carbon::parse($user->membership_start_date)->format('d/m/Y') : 'No registrado' }}</p>

            <label>Fecha de registro:</label>
            <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </div>

</body>
</html>






</body>
</html>