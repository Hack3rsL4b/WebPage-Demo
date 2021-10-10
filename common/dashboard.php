<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins&family=Roboto+Mono&family=Tourney&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/icon.png">
    <title>Hack3rs L4b</title>
</head>

<body>
    
    <header>
        <div class="header">
            <div class="logo">
                <a href="index.html">
                    <img src="../img/iconNoBackground.png" alt="ImagenLogo" class="ilogo">
                    <h1 class="nombre">Hack3rs <span>L4b</span></h1s>
                </a>
            </div>

            <div class="inciarsesion">
                <a href="./inicio-sesion.php" class="registro">Registrate</a>
                <a href="./inicio-sesion.php" class="inicio">Iniciar Sesión</a>
            </div>
        </div>
    </header>

    <div class="barra ">
        <ul class="linknav">
            <li>
                <div class="linkicon">
                    <a href="#" class="opc">
                        <i class='bx bx-question-mark'></i>
                        <p class="nombrelogo ">Quiénes Somos</p>
                    </a>
                    <i class='bx bx-chevron-down flecha'></i>
                </div>
                <ul class="submenu">
                    <li><a href="#" class="nombrelogo">¿Quiénes Somos?</a></li>
                    <li><a href="#">Misión</a></li>
                    <li><a href="#">Visión</a></li>
                    <li><a href="#">Líneas de investigación</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user-check'></i>
                    <span class="nombrelogo">Postúlate</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Postúlate</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-calendar-event'></i>
                    <span class="nombrelogo">Eventos</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Eventos</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-open'></i>
                    <span class="nombrelogo">Proyectos</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Proyectos</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-photo-album'></i>
                    <span class="nombrelogo">Galería</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Galería</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="nombrelogo">Integrantes</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Integrantes</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-link'></i>
                    <span class="nombrelogo">Enlaces</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Enlaces</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-contact' style='color:#fffcfa'></i>
                    <span class="nombrelogo">Contacto</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Contacto</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-message-square-dots'></i>
                    <span class="nombrelogo">Foro</span>
                </a>
                <ul class="submenu ">
                    <li><a href="#" class="nombrelogo">Foro</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="home">
        <a href="#" class="continua-foro boton">Continúa al Foro</a>

        <div class="cuerpo">
            <span class="welcome">Bienvenidos al</span>
            <h2 class="title-home">Semillero de investigación de Seguridad Informática</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis laboriosam consequatur odit, alias eaque doloribus. Nobis velit veritatis ullam quo nulla mollitia perspiciatis in earum eligendi ipsum, autem ipsam quae! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, dignissimos quo. Eligendi labore ut nostrum fugit eum quibusdam quaerat amet nemo deleniti autem cum voluptates eveniet temporibus, excepturi pariatur porro!</p>
            <a href="#" class="boton conoce-mas">Conoce más</a>
        </div>
    </div>

    <div class="redes">
        <div class="pictures">
            <a href="#" class="logotipos"><i class='bx bxl-facebook-circle' style='color:#ffffff'></i></a>
            <a href="#" class="logotipos"><i class='bx bx-envelope' style='color:#ffffff'></i></a>
            <a href="#" class="logotipos"><i class='bx bxl-youtube' style='color:#ffffff'></i></a>
            <a href="https://github.com/Hack3rsL4b" target="_blank" class="logotipos"><i class='bx bxl-github' style='color:#ffffff'></i></a>
        </div>
        <div class="line">

        </div>
    </div>

    <script>
        let arrow = document.querySelectorAll(".flecha");
        console.log(arrow);
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                console.log(arrowParent);
                arrowParent.classList.toggle('showMenu');
            });
        }
    </script>

</body>

</html>