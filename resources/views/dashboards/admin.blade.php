<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - FitPro</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="dashboard-body">

    <header class="dashboard-header bg-red-600">
        <h1>Panel de Administración</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </header>

    <main class="dashboard-content">
        <h2 class="text-3xl">Bienvenido, Administrador {{ Auth::user()->name }}</h2>
        <p>Tu rol es: <span class="badge badge-admin">{{ Auth::user()->role }}</span></p>
        <p>Desde aquí podrás gestionar usuarios, membresías y finanzas.</p>
        <!-- Menú de navegación (se implementará más adelante) -->
        <nav class="role-menu">
            <a href="#" class="menu-item">Gestión de Usuarios</a>
            <a href="#" class="menu-item">Reportes Financieros</a>
        </nav>
    </main>

</body>
</html>