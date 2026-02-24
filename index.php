<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio web</title>
    <link rel="stylesheet" href="CSS/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <video autoplay muted loop id="videoFondo">
        <source src="img/vid fon.mp4" type="video/mp4">
    </video>


    <header>
        <div class="encabezadooo">
            <img src="img/IMG-20250918-WA0004.jpg" alt="logo">
            <h2>Ringo Sanchez</h2>

        </div>
        <nav class="menu">
            <a href="#Inicio">Inicio</a>
            <a href="#acerca-de">Acerca de</a>
            <a href="#Habilidades" id="skills-link">Habilidades</a>

            <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { 
        // El enlace solo es visible si está logueado
        echo '<a href="#portafolio" id="portafolio-link">Portafolio</a>';
    } 
    ?>

            <a href="#contacto">Contactos</a>
        </nav>
        <?php 
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { 
            // Si el usuario está logueado, muestra el botón de Cerrar Sesión
            echo '<a href="logout.php" class="btn-sesion">Cerrar Sesión</a>';
        } else {
            // Si no está logueado, muestra el botón de Iniciar Sesión
            echo '<a href="index2.php" class="btn-sesion">Iniciar Sesión</a>';
        }
        ?>
        <button class="hamburger-btn" id="hamburger-btn">
            <i class="bi bi-list"></i>
        </button>
    </header>
    <section id="Inicio">

        <div class="container">

            <div>
                <div id="overlayBlur">
                    <h1>!Bienvenidos a mi portafolio!</h1>
                    <p>En esta pagina encontraran todos los proyectos en los que he participado</p>
                    <p>ya sea en proyectos hechos 100% por mi o en proyectos para empresas</p>
                    <a href="#acerca-de" type="button" class="btn">+Info</a>
                </div>
            </div>


        </div>
        </div>
    </section>


    <section id="acerca-de" class="acerca-de">


        <img src="img/IMG-20250914-WA0024.jpg" class="foto">

        <div class="bio">
            <div id="overlayBlur">
                <h2 class="bio-titulo">Acerca de</h2>
                <div>
                    <p class="bio-texto">Soy un desarrollador de software con una sólida formación académica en
                        Ingeniería de Sistemas, donde cultivé mi pasión por la lógica de programación y la arquitectura
                        de datos. Mi experiencia se centra en el desarrollo Full Stack, especializándome en JavaScript,
                        Java y tecnologías web modernas. Me considero un profesional proactivo y mi mayor interés es la
                        optimización del rendimiento y la creación de soluciones escalables que resuelvan problemas
                        complejos de manera eficiente. Estoy constantemente explorando nuevas metodologías y
                        herramientas para mantener mis habilidades a la vanguardia de la industria.</p>
                </div>
            </div>
        </div>
    </section>



    <section id="Habilidades">
        <div id="overlayBlur">
            <h2 class="titulo-seccion">Habilidades</h2>
            <p class="descripcion-seccion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                cupiditate
                iste
                magni provident vero quo veniam accusantium minus facere voluptatem maiores incidunt, ipsum
                voluptates.
                Temporibus incidunt pariatur itaque deleniti veritatis.</p>
            <div class="Habilidades-container">
                <div class="habilidades">
                    <div class="titulo-habilidades">HTML y CSS <span class="contador-porcentaje"
                            id="html-percent">0%</span></div>
                    <div class="barra-habilidades">
                        <div class="llenar-habilidades" data-percentage="80"></div>
                    </div>
                </div>
                <div class="habilidades">
                    <div class="titulo-habilidades">JavaScript <span class="contador-porcentaje"
                            id="html-percent">0%</span></div>
                    <div class="barra-habilidades">
                        <div class="llenar-habilidades" data-percentage="90"></div>
                    </div>
                </div>
                <div class="habilidades">
                    <div class="titulo-habilidades">Java<span class="contador-porcentaje" id="html-percent">0%</span>
                    </div>
                    <div class="barra-habilidades">
                        <div class="llenar-habilidades" data-percentage="95"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php
    // PHP verifica si la sesión 'loggedin' está establecida y es verdadera
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    ?>

    <section id="portafolio">
        <div class="wrapper">
            <div class="box-area">
                <div class="box">
                    <img src="img/img1.png" class="imgen">
                    <div class="overlay">
                        <h3>Programacion web</h3>
                        <p>EP1. Caso práctico realizar la configuración de un
                            ambiente
                            de desarrollo web (VS Code) </p>
                        <a href="download.php?file=EP1 Instalacion y configuracion de VS Code.pdf">Descargar ahora</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/img2.png" class="imgen">
                    <div class="overlay">
                        <h3>Programacion web</h3>
                        <p>EP1 U2. Caso practico desarrollar un portafolio
                            web estático y responsiva</p>
                        <a href="download.php?file=Apps web-Ringo sanchez.rar">Descargar ahora</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/img3.png" class="imgen">
                    <div class="overlay">
                        <h3>Programacion web</h3>
                        <p> EP1. Reporte de instalación y configuración de servidor web</p>
                        <a href="download.php?file=EP1. Reporte de  instalación y configuración de servidor web.pdf">Descargar
                            ahora</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/img4.png" class="imgen">
                    <div class="overlay">
                        <h3>Ingenieria de requisitos</h3>
                        <p>EVIDENCIA UNIDAD II </p>
                        <a href="download.php?file=evidencia unidad 2.pdf">Descargar ahora</a>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </section>

    <?php
    } // Cierre de la condición 'if'
    ?>
    <section id="contacto">
        <div id="overlayBlur">
            <div class="contacto-formulario">
                <div class="ubicacion">
                    <h2 class="ubicacion-titulo">Ubicacion</h2>
                    <p class="sigueme-parrafo">Direccion: Calle rio humaya, poste #805</p>
                    <br>
                    <br>
                    <div class="Sigueme">
                        <h2 class="Sigueme-titulo">Sigueme</h2>
                    </div>
                    <div class="redes-sociales">
                        <a href="https://facebook.com/" target="_blank" rel="noopenernoreferrer">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/ringo_sanchez10/" target="_blank"
                            rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        <a href="https://x.com/" target="_blank" rel="noopenernoreferrer"><i
                                class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>

            <div class="formulario">
                <h2 class="titulo-contacto">Contacto</h2>
                <form action="https://formsubmit.co/230130075@upve.edu.mx" method="POST">
                    <input type="text" placeholder="Nombre" name="Nombre" required>
                    <input type="email" placeholder="Correo" name="Correo" required>
                    <input type="text" placeholder="Asunto" name="Asunto" required>
                    <textarea name="formulario-textarea" id="formulario-textarea"
                        placeholder="Escribe tu mensaje..."></textarea>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>

            </div>
        </div>
    </section>
    <script src="JavaScript/script.js"></script>
</body>

</html>