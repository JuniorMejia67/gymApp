<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador - FitPro</title>
    <link href="{{ asset('css/administrador.css') }}" rel="stylesheet">
</head>
<body class="dashboard-body">


    <!--<div class="sidebar">
        <div class="logo">
        <h2>SUPERADMIN</h2>
        </div>
        <ul class="menu">
            <li onclick="navigate('PANEL.html')">⚙️ Panel de Configuración</li>
            <li onclick="navigate('USUARIO.html')">👥 Gestión de Usuarios</li>
            <li onclick="navigate('FINANZA.html')">💰 Finanzas y Pagos</li>
            <li onclick="navigate('RECEPTIONIST.html')">🧾 Recepcionista</li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </div>

    <div class="main">
        <div class="welcome-section">
            <h1>Bienvenido al Panel de Administrador</h1>
        </div>
    </div>
    -->

    <div class="contenedor">

    <!-- Barra lateral -->
        <div class="menu">
            <div>
                <span>Panel Admin</span>
                <ul style="list-style:none; padding:0;">
                    <li class="activo" onclick="mostrarSeccion('agregar-usuario', this)">Agregar usuario</li>
                    <li onclick="mostrarSeccion('finanzas', this)">Finanzas</li>
                    <li><a href="{{ route('recepcionista.dashboard') }}" style="color:white; text-decoration:none;">Recepcionista</a></li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
            </form>
        </div>

    <!-- Contenido principal -->
        <div class="panel">

            <!-- Mensajes -->
            @if(session('success'))
                <p style="color:green">{{ session('success') }}</p>
            @endif

            <!-- Agregar Usuario -->
            <div id="agregar-usuario" class="seccion">
                <h2>Agregar usuario</h2>
                <form action="{{ route('admin.storeUser') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nombre" required style="width:100%; padding:8px; margin-bottom:10px;">
                    <input type="email" name="email" placeholder="Correo" required style="width:100%; padding:8px; margin-bottom:10px;">
                    <input type="password" name="password" placeholder="Contraseña" required style="width:100%; padding:8px; margin-bottom:10px;">
                    <input type="text" name="phone" placeholder="Teléfono" style="width:100%; padding:8px; margin-bottom:10px;">
                    <select name="role" style="width:100%; padding:8px; margin-bottom:15px;">
                        <option value="">Seleccione rol...</option>
                        <option value="administrador">Administrador</option>
                        <option value="recepcionista">Recepcionista</option>
                        <option value="entrenador">Entrenador</option>
                    </select>
                    <button type="submit" style="padding:10px 15px; background:#00796b; color:white; border:none; border-radius:6px;">
                        Guardar usuario
                    </button>
                </form>
            </div>

            <!-- Finanzas -->
            <div id="finanzas" class="seccion" style="margin-top:40px;">
                <h2>Finanzas</h2>
                <form method="GET">
                    <label>Fecha inicio:</label>
                    <input type="date" name="fecha_inicio" value="{{ $fechaInicio->format('Y-m-d') }}">
                    <label>Fecha fin:</label>
                    <input type="date" name="fecha_fin" value="{{ $fechaFin->format('Y-m-d') }}">
                    <button type="submit">Filtrar</button>
                </form>

                <table border="1" style="margin-top:20px; border-collapse:collapse; width:50%;">
                    <tr>
                        <th>Membresía</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Mensual</td>
                        <td>${{ $totales['Mensual'] }}</td>
                    </tr>
                    <tr>
                        <td>Trimestral</td>
                        <td>${{ $totales['Trimestral'] }}</td>
                    </tr>
                    <tr>
                        <td>Anual</td>
                        <td>${{ $totales['Anual'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>${{ $totales['Total'] }}</strong></td>
                    </tr>
                </table>

                <h3>Usuarios registrados en el rango</h3>
                <table border="1" style="border-collapse:collapse; width:80%;">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Teléfono</th>
                        <th>Fecha de registro</th>
                        <th>Tipo de membresía</th>
                    </tr>
                    @foreach($usuarios as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td>{{ $u->phone ?? 'No registrado' }}</td>
                            <td>{{ $u->created_at->format('Y-m-d') }}</td>
                            <td>{{ $u->membership_type ?? 'No registrado' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

    <script>
    function mostrarSeccion(id, elemento) {
        document.querySelectorAll('.seccion').forEach(s => s.style.display = 'none');
        document.getElementById(id).style.display = 'block';

        document.querySelectorAll('.menu li').forEach(li => li.classList.remove('activo'));
        elemento.classList.add('activo');
    }
    </script>


</body>
</html>