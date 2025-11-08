<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Miembro - FitPro</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="dashboard-body">

    <header class="dashboard-header bg-purple-600">
        <h1>Panel de Miembro</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </header>

    <main class="dashboard-content">
        <h2 class="text-3xl">Bienvenido(a), {{ Auth::user()->name }}</h2>
        <p>Tu rol es: <span class="badge badge-member">{{ Auth::user()->role }}</span></p>
        <p>Revisa tu plan de entrenamiento y el estado de tu membresía.</p>
        <div class="user-info-box">
            <p><strong>Tipo de Membresía:</strong> {{ Auth::user()->membership_type ?? 'No definido' }}</p>
            <p><strong>Fecha de Ingreso:</strong> {{ Auth::user()->membership_start_date ?? 'No definido' }}</p>
        </div>
    </main>

</body>
</html>