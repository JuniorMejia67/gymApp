<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gimnasio FitPro</title>
    <!-- Aquí cargaremos nuestro CSS puro más adelante -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="page-body">

    <header class="main-header">
        <div class="logo">
            FitPro Gym
        </div>
        <nav class="main-nav">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Servicios</a>
            <a href="#" class="nav-link">Contacto</a>

            <!-- Botón de Inicio de Sesión -->
            <a href="{{ route('login') }}" class="btn btn-primary">
                Iniciar Sesión
            </a>
        </nav>
    </header>

    <main class="content-area">
        <section class="hero-section">
            <h1>Transforma tu Cuerpo y Mente</h1>
            <p>Descubre nuestras instalaciones de última generación, planes de entrenamiento personalizados y las mejores clases grupales. ¡Únete hoy!</p>
            <div class="features-grid">
                <div class="feature-item">
                    <h3>Clases</h3>
                    <p>Yoga, Spinning, Boxeo.</p>
                </div>
                <div class="feature-item">
                    <h3>Equipamiento</h3>
                    <p>Máquinas de cardio y pesas libres.</p>
                </div>
                <div class="feature-item">
                    <h3>Entrenadores</h3>
                    <p>Certificados y expertos.</p>
                </div>
            </div>
        </section>
        
        <!-- Aquí se mostrará un fragmento del contenido, como solicitaste -->
        <section class="about-section">
            <h2>Nuestra Filosofía</h2>
            <p>En FitPro, creemos que el fitness es un viaje personal. Te proporcionamos las herramientas y el soporte para alcanzar tus metas, sea cual sea tu nivel. Te invitamos a una prueba gratuita.</p>
        </section>

    </main>

    <footer class="main-footer">
        &copy; 2024 FitPro Gym. Todos los derechos reservados.
    </footer>

</body>
</html>