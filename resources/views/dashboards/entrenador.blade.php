<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Entrenador - FitPro</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="dashboard-body">

    <header class="dashboard-header bg-green-600">
        <h1>Panel de Entrenadores</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </header>

    <main class="dashboard-content">
        <h2 class="text-3xl">Bienvenido(a), Entrenador(a) {{ Auth::user()->name }}</h2>
        <p>Tu rol es: <span class="badge badge-coach">{{ Auth::user()->role }}</span></p>
        <p>Consulta tus rutinas asignadas y el progreso de tus clientes.</p>
        <nav class="role-menu">
            <a href="#" class="menu-item">Miembros Asignados</a>
            <a href="#" class="menu-item">Creación de Rutinas</a>
        </nav>
    </main>

</body>
</html>