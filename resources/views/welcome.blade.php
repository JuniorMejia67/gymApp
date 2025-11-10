<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gimnasio FitPro</title>
    <!-- Aquí cargaremos nuestro CSS puro más adelante -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="contenedorInicio">   
            <header class="menu">
                <div class="logo">
                    <img src="{{ asset('imagenes/logo_w.png') }}" alt="World fitness" class="logo">
                </div>
                <nav class="main-nav">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Iniciar Sesión
                    </a>
                    <a href="#pruebaGratis">Unete Hoy</a>
                </nav>
            </header>
            <div class="contenido">
                <div class="contenidoIzquierdo">
                    <p>Transforma tu cuerpo y tu vida.</p>
                    <p>Entrena con entrenadores certificados, programas personalizados y el mejor equipamiento. Comienza hoy y alcanza tu mejor versión. </p>
                    <div>
                        <a href="#pruebaGratis">Unete Hoy</a>
                        <a href="#planesMembresias">Ver planes</a>
                        <span>✔ Equipamiento moderno</span> 
                        <span>✔ Entrenadores expertos</span>
                    </div>
                </div>
                <img src="{{ asset('imagenes/disciplina.jpg') }}" alt="disciplina" class="contenidoDerecho"></div>
            </div>

    </div>

    <div class="contenedor">
        <section class="caracteristicas">
            <span class="subtitulo">Por qué World Fitness?</span>
            <p class="descripcion">Un gimnasio de alto rendimiento</p>
            <div class="cards">
                <div class="card">
                    <p>Equipamiento</p>
                    <p>Máquinas de última generación y zona funcional amplia.</p>
                </div>
                <div class="card">
                    <p>Entrenadores</p>
                    <p>Equipo certificado en fuerza, cardio y rehabilitación.</p>
                </div>
                <div class="card">
                    <p>Programas</p>
                    <p>Planes personalizados para perder grasa, ganar masa o rendimiento.</p>
                </div>
            </div>
        </section>

        <section class="planes" id="planesMembresias">
            <h4 class="subtitulo">Planes y Membresías</h4>
            <p class="descripcion">Elige el plan que mejor se adapte a ti</p>
            <div class="planes-container">

                <div>
                    <h3>Básico</h3>
                    <p>Gimnasio libre • Acceso horario básico</p>
                    <p class="precio">$25<span>/mes</span></p>
                    <a href="#" class="btn">Comenzar</a>
                </div>

                <div>
                    <img src="{{ asset('imagenes/focus.jpg') }}" alt="Consistency">
                </div>

                <div>
                    <h3>Premium</h3>
                    <p>Entrenador personal, nutrición y App</p>
                    <p class="precio">$60<span>/mes</span></p>
                    <a href="#" class="btn btn-green">Comenzar</a>
                </div>

            </div>
        </section>

        <section id="entrenadores" class="entrenadores">
            <span>El mejor equipo</span>
            <p>Entrenadores Profesionales</p>

            <div class="contenedor-entrenadores">

                <div class="card-entrenador">
                    <img src="{{ asset('imagenes/hany.jpg') }}" alt="Hany Rambod" class="foto-entrenador">
                    <h4>Hany Rambod</h4>
                    <p class="especialidad">Especialista en fuerza</p>
                    <p class="detalle">Certificación internacional • 8 años experiencia</p>
                    <a href="#" class="btn-perfil">Ver perfil</a>
                </div>

                <div class="card-entrenador">
                    <img src="{{ asset('imagenes/andoni.jpg') }}" alt="Lucas Martinez" class="foto-entrenador">
                    <h4>Lucas Martinez</h4>
                    <p class="especialidad">Cardio & HIIT</p>
                    <p class="detalle">Especialista en rendimiento cardiovascular</p>
                    <a href="#" class="btn-perfil">Ver perfil</a>
                </div>

                <div class="card-entrenador">
                    <img src="{{ asset('imagenes/laura.jpg') }}" alt="Laura Méndez" class="foto-entrenador">
                    <h4>Laura Méndez</h4>
                    <p class="especialidad">Nutrición deportiva</p>
                    <p class="detalle">Planes nutricionales personalizados</p>
                    <a href="#" class="btn-perfil">Ver perfil</a>
                </div>

            </div>
        </section>


        <section id="testimonios" class="testimonios">
            <span>Resultados Reales</span>
            <p>Testimonios de clientes</p>

            <div class="contenedor-testimonios">
                
                <div class="testimonio-card">
                    <h4>Ana G.</h4>
                    <p>"Perdí 12 kg en 3 meses. El equipo me apoyó en todo el proceso."</p>
                    <span class="stars">★★★★★</span>
                </div>

                <div class="testimonio-card">
                    <h4>Jorge M.</h4>
                    <p>"Las clases HIIT me cambiaron la resistencia y energía."</p>
                    <span>★★★★★</span>
                </div>

                <div class="testimonio-card">
                    <h4>Lucía R.</h4>
                    <p>"Entrenador personalizado y plan de nutrición: resultados reales."</p>
                    <span class="stars">★★★★★</span>
                </div>
                <div class="testimonio-card">
                    <h4>Ana G.</h4>
                    <p>"Perdí 12 kg en 3 meses. El equipo me apoyó en todo el proceso."</p>
                    <span class="stars">★★★★★</span>
                </div>
                <div class="testimonio-card">
                    <h4>Ana G.</h4>
                    <p>"Perdí 12 kg en 3 meses. El equipo me apoyó en todo el proceso."</p>
                    <span class="stars">★★★★★</span>
                </div>

            </div>      
        </section>



        <section class="instalaciones">
            <p>Instalaciones</p>
            <p>Galería del Gimnasio</p>

            <div class="galeria">
                <div class="galeria-item">
                    <img src="{{ asset('imagenes/cafeteria.jpg') }}" alt="Cafeteria">
                    <p>Cafeteria</p>
                </div>

                <div class="galeria-item">
                    <img src="{{ asset('imagenes/maquinas.jpg') }}" alt="Máquinas">
                    <p>Maquinas</p>
                </div>

                <div class="galeria-item">
                    <img src="{{ asset('imagenes/grupales.jpg') }}" alt="Clases grupales" class="imagen">
                    <p>Clases grupales</p>
                </div>

                <div class="galeria-item">
                    <img src="{{ asset('imagenes/sauna.jpg') }}" alt="Sauna & Spa" class="imagen">
                    <p>Sauna & Spa</p>
                </div>
            </div>
        </section>




        <section class="contacto" id="pruebaGratis">
            <p>Prueba Gratis</p>
            <p>Contáctanos</p>

            <div class="contacto-flex">

                <div class="contacto-card formulario">
                    <form action="{{ route('contacto.guardar') }}" method="POST">
                        @csrf
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="">

                        <label>Teléfono</label>
                        <input type="text" name="telefono" placeholder="">

                        <label>Objetivo</label>
                        <input type="text" name="objetivo" placeholder="Ej: Bajar peso / Ganar masa / Mejorar resistencia">

                        <button type="submit" class="btn-enviar">Enviar</button>
                    </form>
                </div>

                <div class="contacto-card ubicacion">
                    <h4>Ubicación y horarios</h4>
                    <p>Av. Ayacucho • Tel: +591 12345678</p>

                    <p><strong>Horario</strong></p>
                    <p>Lun-Vie: 06:00-22:00 • Sáb: 08:00-20:00 • Dom: 09:00-14:00</p>

                    <div class="mapa">
                        <span>[Ver en el mapa]</span>
                    </div>
                </div>

            </div>
        </section>



        <section class="dudas-section">
            <div class="dudas-container">
                <p>Dudas Comunes</p>
                <p>Preguntas Frecuentes</p>

                <div class="dudas-box">
                    <div class="dudas-item">
                        <span>¿Hay contratos largos?</span>
                        <span>Ofrecemos planes mes a mes y descuentos por anualidad. Eres libre de cancelar cuando quieras.</span>
                    </div>

                    <div class="dudas-item">
                        <span>¿Puedo probar gratis?</span>
                        <span>Sí — solicita una prueba gratuita desde el formulario de contacto y te agendaremos una visita.</span>
                    </div>

                    <div class="dudas-item">
                        <span>¿Tienen entrenadores personales?</span>
                        <span>Sí, nuestro plan Premium incluye un entrenador personal, planes personalizados y seguimiento nutricional.</span>
                    </div>
                </div>
            </div>
        </section>






        <section class="cita">
            <div class="cita-izquierdo">
                <span>¿Listo para transformar tu vida?</span>
                <p>Regístrate hoy y recibe una evaluación gratuita</p>
            </div>

            <div class="cita-derecho">
                <a href="#pruebaGratis" class="cta-btn">Comenzar ahora</a>
            </div>
        </section>


        <footer class="footer">
            <div class="footer-container">
                <div class="footer-column">
                    <span>World Fitness</span>
                    <p>Av. Ayacucho, Ciudad Cochabamba</p>
                    <p>contacto@worldfitness.com</p>
                </div>

                <div class="footer-column">
                    <span>Horarios</span>
                    <p>Lun-Vie: 06:00-22:00</p>
                    <p>Sáb: 08:00-20:00</p>
                    <p>Dom: 09:00-14:00</p>
                </div>

                <div class="footer-column">
                    <span>Enlaces</span>
                    <ul>
                        <li><a href="#planesMembresias">Planes</a></li>
                        <li><a href="#entrenadores">Entrenadores</a></li>
                    </ul>
                </div>
            </div>

            <hr>

            <div class="footer-bottom">
                <p>© 2025 PowerFit · Todos los derechos reservados</p>
            </div>
        </footer>





    </div>




</body>
</html>