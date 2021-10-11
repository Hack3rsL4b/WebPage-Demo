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

    <?php
    include_once("../php/conexion.php");
    include_once("../php/obtener-usuario.php");

    $pwd = isset($_GET['pwd']) ? $_GET['pwd'] : '';

    $consulta = "SELECT
    $bd.actividades.id_actividad AS id,
    $bd.actividades.actividad AS actividad,
    $bd.actividades.enlace AS enlace
    FROM
    $bd.usuarios,
    $bd.actividades,
    $bd.roles,
    $bd.permisos
    WHERE
    $bd.permisos.rol = $bd.roles.id_rol AND
    $bd.permisos.actividad = $bd.actividades.id_actividad AND
    $bd.roles.id_rol = $bd.usuarios.roles_id_rol AND
    $bd.usuarios.contrasenia = '$pwd';";

    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

    ?>

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
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                $destino = $fila['enlace'] . '?id=' . $fila['id'];
                $actividad = $fila['actividad'];
            ?>
                <li>
                    <a href="<?php echo $destino ?>" target="contenedor">
                        <i class=''></i>
                        <span class="nombrelogo"><?php echo $actividad ?></span>
                    </a>
                    <ul class="submenu ">
                        <li><a href="#" class="nombrelogo"><?php echo $actividad ?></a></li>
                    </ul>
                </li>
            <?php
            }
            mysqli_close($con);
            ?>

            <li>
                <div class="perfil">
                    <div class="perfil-contenido">
                        <img src="../img/perfil.png" alt="img perfil" class="imgperfil">
                    </div>

                    <div class="perfil-info">
                        <div class="nombre-perfil"><?php echo $nombre_usuario ?></div>
                        <div class="rol"><?php echo $rol ?></div>
                    </div>
                    <a href="../php/cerrar.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>

    <div class="home">
        <a href="#" class="boton continua-foro">Continúa al Foro</a>

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