<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Recepcionista - FitPro</title>
    <link href="/css/recepcionista.css" rel="stylesheet">
</head>

<body>
    
    <div class="contenedor">

        <div class="menu">
            <div><span>👤 Recepcionista</span>
                <ul>
                    <li class="activo" onclick="mostrarSeccion('gestion', this)">👥 Gestión de usuario</li>
                    <li onclick="mostrarSeccion('asistencia', this)">✅ Control de asistencia</li>
                    <li onclick="mostrarSeccion('registrar', this)">➕ Registrar cliente</li>
                </ul>
            </div>
            <div>
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
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="
                        display:inline-block;
                        padding: 12px 20px;
                        background:#00796b;
                        color:white;
                        border-radius:8px;
                        text-decoration:none;
                        font-weight:600;
                        ">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <!-- PANEL CONTENIDO -->
        <div class="panel">
            

            <!-- SECCIÓN 1 -->
            <div id="gestion" class="seccion">
                <h2>Gestión de usuarios</h2>

                <div style="margin-bottom:15px;">
                    <label>Filtrar por:</label>
                    <select id="filtro" style="padding:6px; border-radius:4px;">
                        <option value="dia">Hoy</option>
                        <option value="semana">Esta semana</option>
                        <option value="mes">Este mes</option>
                    </select>
                    <button onclick="cargarAsistencias()" 
                        style="padding:6px 10px; background:#00796b; color:white; border:none; border-radius:4px;">
                        Buscar
                    </button>
                </div>

                <table class="tabla" id="tablaAsistencias" border="1" style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Membresía</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td colspan="4" style="text-align:center;">Cargando...</td></tr>
                    </tbody>
                </table>

            </div>

            <!-- SECCIÓN 2 -->
            <div id="asistencia" class="seccion">
                <h2>Control de asistencia</h2>

                <!-- Mensajes -->
                @if(session('success'))
                    <p style="color:green">{{ session('success') }}</p>
                @endif
                @if(session('error'))
                    <p style="color:red">{{ session('error') }}</p>
                @endif

                <form action="{{ route('asistencia.registrar') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nombre del usuario" required
                        style="width: 60%; padding: 8px; margin-bottom: 10px;">
                    <button type="submit" 
                            style="padding:8px 12px; background:#00695c; color:white; border:none; border-radius:5px;">
                        Registrar asistencia
                    </button>
                </form>
            </div>


            <!-- SECCIÓN 3 -->
            <div id="registrar" class="seccion">
                <h2>Registrar nuevo cliente</h2>

                @if(session('success'))
                    <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
                @endif



                
                @if ($errors->any())
                    <div style="color:red; font-weight:bold;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif








                <form id="formRegistrarCliente" action="{{ route('recepcionista.storeCliente') }}" method="POST">
                    @csrf

                    <label>Nombre:</label>
                    <input type="text" name="name" required placeholder="Nombre" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Correo:</label>
                    <input type="email" name="email" required placeholder="Correo electrónico" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Contraseña:</label>
                    <input type="password" name="password" required placeholder="Contraseña" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Teléfono:</label>
                    <input type="text" name="phone" required placeholder="Teléfono" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Fecha de inicio de membresía:</label>
                    <input type="date" name="membership_start_date" required placeholder="Fecha de inicio de membresía" style="width:100%; padding:8px; margin-bottom:10px;">

                    <label>Tipo de membresía:</label>
                    <select name="membership_type" required style="width:100%; padding:8px; margin-bottom:15px;">
                        <option value="">Seleccione...</option>
                        <option value="Mensual">Mensual</option>
                        <option value="Trimestral">Trimestral</option>
                        <option value="Anual">Anual</option>
                    </select>

                    <button type="submit" style="padding:10px 15px; background:#00796b; color:white; border:none; border-radius:6px;">
                        Guardar cliente
                    </button>
                </form>
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
    <script>
    function cargarContactos() {
        // Ocultamos todas las secciones
        document.querySelectorAll('.seccion').forEach(s => s.style.display = 'none');

        // Mostramos el contenedor general del contenido
        document.getElementById('contenido-dinamico').style.display = 'block';

        // Hacemos la petición a la ruta de Laravel
        fetch("{{ route('recepcionista.contactos') }}")
            .then(res => res.text())
            .then(html => {
                document.getElementById('contenido-dinamico').innerHTML = html;
            });
    }
    </script>


</body>
    <script>
    function mostrarSeccion(id, elemento) {
        document.querySelectorAll('.seccion').forEach(s => s.style.display = 'none');
        document.getElementById(id).style.display = 'block';

        document.querySelectorAll('.menu li').forEach(li => li.classList.remove('activo'));
        elemento.classList.add('activo');
    }
    </script>
    <script>
    function cargarContactos() {
        // Ocultamos todas las secciones
        document.querySelectorAll('.seccion').forEach(s => s.style.display = 'none');

        // Mostramos el contenedor general del contenido
        document.getElementById('contenido-dinamico').style.display = 'block';

        // Hacemos la petición a la ruta de Laravel
        fetch("{{ route('recepcionista.contactos') }}")
            .then(res => res.text())
            .then(html => {
                document.getElementById('contenido-dinamico').innerHTML = html;
            });
    }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            cargarAsistencias(); // carga por defecto al abrir la página
        });

        function cargarAsistencias() {
            const filtro = document.getElementById('filtro').value;
            const tabla = document.querySelector('#tablaAsistencias tbody');
            tabla.innerHTML = `<tr><td colspan="4" style="text-align:center;">Cargando...</td></tr>`;

            fetch(`/asistencias/listar?filtro=${filtro}`)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        tabla.innerHTML = `<tr><td colspan="4" style="text-align:center;">Sin registros</td></tr>`;
                        return;
                    }

                    tabla.innerHTML = '';
                    data.forEach(a => {
                        const fecha = new Date(a.created_at);
                        const fila = `
                            <tr>
                                <td>${a.user.name}</td>
                                <td>${a.user.membership_type ?? 'Sin definir'}</td>
                                <td>${fecha.toLocaleDateString()}</td>
                                <td>${fecha.toLocaleTimeString()}</td>
                            </tr>
                        `;
                        tabla.innerHTML += fila;
                    });
                })
                .catch(err => {
                    console.error(err);
                    tabla.innerHTML = `<tr><td colspan="4" style="text-align:center;color:red;">Error al cargar datos</td></tr>`;
                });
        }
    </script>

</html>