<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Recepcionista - FitPro</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="dashboard-body">

    <header class="dashboard-header bg-blue-600">
        <h1>Panel de Recepción</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </header>

    <main class="dashboard-content">
        <h2 class="text-3xl">Bienvenido(a), Recepcionista {{ Auth::user()->name }}</h2>
        <p>Tu rol es: <span class="badge badge-receptionist">{{ Auth::user()->role }}</span></p>
        <p>Tu enfoque está en el registro y la atención a los miembros.</p>
        <nav class="role-menu">
            <a href="#" class="menu-item">Registro de Nuevos Miembros</a>
            <a href="#" class="menu-item">Chequeo de Ingreso</a>
        </nav>
    </main>
    <a href="{{ route('recepcionista.contactos') }}" 
        style="
            display:inline-block;
            padding: 12px 20px;
            background:#00796b;
            color:white;
            border-radius:8px;
            text-decoration:none;
            font-weight:600;
            ">
        Ver Contactos
    </a>


</body>
</html>