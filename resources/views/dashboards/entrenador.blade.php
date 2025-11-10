<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Entrenador - FitPro</title>
    <link href="{{ asset('css/entrenador.css') }}" rel="stylesheet">
</head>
<body class="dashboard-body">

    <header class="caja1">
        <h1 class="titulo">Panel del Entrenador</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Cerrar Sesión</button>
        </form>
    </header>

    <div class="contenedor">

        <aside class="sidebar">
            <button class="btn-sidebar">Crear Rutina</button>
            <button class="btn-sidebar" id="btnMostrarRutinas">Mis Rutinas</button>
        </aside>

        <main class="contenido">

            <section class="seccion">
                <h2>Crear nueva rutina</h2>

                <label>Nombre de la rutina</label>
                <input type="text" id="nombreRutina" placeholder="Ej: Full Body 45'">

                <div class="fila">
                    <div>
                        <label>Nivel de dificultad</label>
                        <input type="text" id="dificultad" placeholder="Intermedio">
                    </div>
                    <div>
                        <label>Duración (min)</label>
                        <input type="number" id="duracion" placeholder="45">
                    </div>
                    <div>
                        <label>Grupo muscular</label>
                        <input type="text" id="grupoMuscular" placeholder="Full Body">
                    </div>
                </div>

                <label>Descripción</label>
                <textarea id="descripcion">- 3 series por ejercicio • Descanso 60s • Enfocado en fuerza y resistencia</textarea>

                <div class="fila">
                    <button class="btn-guardar" id="btnGuardar">Guardar rutina</button>
                    <button class="btn-limpiar" id="btnLimpiar">Limpiar</button>
                </div>
            </section>

            <section class="seccion" id="misRutinas">
                <h3>Mis rutinas</h3>

                <div id="listaRutinas">
                    <div class="rutina">
                        <div>
                            <strong>Full Body 45'</strong>
                            <p>Intermedio • 45 min • Full Body</p>
                        </div>
                        <button class="btn-editar">Editar</button>
                        <button class="btn-eliminar">Eliminar</button>
                    </div>

                    <div class="rutina">
                        <div>
                            <strong>Cardio HIIT 30'</strong>
                            <p>Avanzado • 30 min • Cardio</p>
                        </div>
                        <button class="btn-editar">Editar</button>
                        <button class="btn-eliminar">Eliminar</button>
                    </div>

                    <div class="rutina">
                        <div>
                            <strong>Fuerza Pierna 60'</strong>
                            <p>Intermedio • 60 min • Pierna</p>
                        </div>
                        <button class="btn-editar">Editar</button>
                        <button class="btn-eliminar">Eliminar</button>
                    </div>
                </div>

            </section>

        </main>

    </div>

    <script>
    // Actualiza botones editar/eliminar
    function actualizarBotones() {
        const editarBtns = document.querySelectorAll('.btn-editar');
        const eliminarBtns = document.querySelectorAll('.btn-eliminar');

        editarBtns.forEach(btn => {
            btn.onclick = () => {
                const rutina = btn.closest('.rutina');
                const nombreElem = rutina.querySelector('strong');
                const detalleElem = rutina.querySelector('p');

                const nuevoNombre = prompt('Edita el nombre de la rutina:', nombreElem.textContent);
                if (!nuevoNombre) return;

                const nuevoDetalle = prompt('Edita los detalles de la rutina (ej: Intermedio • 45 min • Full Body):', detalleElem.textContent);
                if (!nuevoDetalle) return;

                nombreElem.textContent = nuevoNombre;
                detalleElem.textContent = nuevoDetalle;
            };
        });

        eliminarBtns.forEach(btn => {
            btn.onclick = () => {
                const rutina = btn.closest('.rutina');
                const confirmacion = confirm('¿Estás seguro de eliminar esta rutina?');
                if(confirmacion) rutina.remove();
            };
        });
    }

    // inicializa botones
    actualizarBotones();

    // guardar rutinas
    const btnGuardar = document.getElementById('btnGuardar');
    btnGuardar.addEventListener('click', () => {
        const nombre = document.getElementById('nombreRutina').value.trim();
        const dificultad = document.getElementById('dificultad').value.trim();
        const duracion = document.getElementById('duracion').value.trim();
        const grupo = document.getElementById('grupoMuscular').value.trim();

        if (!nombre || !dificultad || !duracion || !grupo) {
            alert('Por favor, completa todos los campos.');
            return;
        }

        const lista = document.getElementById('listaRutinas');

        const nuevaRutina = document.createElement('div');
        nuevaRutina.classList.add('rutina');
        nuevaRutina.innerHTML = `
            <div>
                <strong>${nombre}</strong>
                <p>${dificultad} • ${duracion} min • ${grupo}</p>
            </div>
            <button class="btn-editar">Editar</button>
            <button class="btn-eliminar">Eliminar</button>
        `;
        lista.appendChild(nuevaRutina);

        document.getElementById('nombreRutina').value = '';
        document.getElementById('dificultad').value = '';
        document.getElementById('duracion').value = '';
        document.getElementById('grupoMuscular').value = '';

        actualizarBotones();
    });

    // Limpiar campos
    const btnLimpiar = document.getElementById('btnLimpiar');
    btnLimpiar.addEventListener('click', () => {
        document.getElementById('nombreRutina').value = '';
        document.getElementById('dificultad').value = '';
        document.getElementById('duracion').value = '';
        document.getElementById('grupoMuscular').value = '';
    });

    // mostrar
    const btnMostrarRutinas = document.getElementById('btnMostrarRutinas');
    const seccionRutinas = document.getElementById('misRutinas');

    seccionRutinas.style.display = 'none';

    btnMostrarRutinas.addEventListener('click', () => {
        if(seccionRutinas.style.display === 'none' || seccionRutinas.style.display === '') {
            seccionRutinas.style.display = 'block';
        } else {
            seccionRutinas.style.display = 'none';
        }
    });
    </script>

</body>
</html>