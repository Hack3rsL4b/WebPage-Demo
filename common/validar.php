<?php
include_once('conexion.php');

if (isset($_POST['login'])) {

//1. Crear conexión a la Base de Datos
$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");

    //Recoger datos Variables de Usuario
    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    //VALIDANDO EXISTENCIA DEL USUARIO
    $consulta = "SELECT * from usuarios where usuario = '$usuario' and contrasena = '$pass' ";

    $resultado = mysqli_query($con, $consulta);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usu = $fila['usuario'];
        $clav = $fila['contrasena'];
        $perfil = $fila['roles_id_rol'];
    }

    if (($usu != $usuario) | ($clav != $pass)) {
        header("Location: Inicio_de_sesion.php");
        exit();
    }
    if ($perfil == 1) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:indexAdmin.php");
    }

    else if ($perfil == 3) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:indexUsuario.php");
    }
    else if ($perfil == 2) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:Inicio_de_sesion.php");
    } else {
        header("Location:Inicio_de_sesion.php");
        exit();
    }

    mysqli_close($con);
}
    
    ?>
