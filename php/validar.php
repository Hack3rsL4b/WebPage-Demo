<?php
include_once('conexion.php');

if (!isset($_POST['ilogin'])) {

    //1. Crear conexión a la Base de Datos
    $con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
    mysqli_set_charset($con, "utf8");

    //Recoger datos Variables de Usuario
    $vusuario = $_POST['usuario'];
    $vcontrasenia = $_POST['contrasenia'];

    if (empty($vusuario) || empty($vcontrasenia)) {
        return_login();
        exit();
    }

    //VALIDANDO EXISTENCIA DEL USUARIO
    $consulta = "SELECT * FROM $bd.usuarios WHERE usuario = '$vusuario' and contrasenia = '$vcontrasenia';";
    $resultado = mysqli_query($con, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $id = $fila['id_usuario'];
        $usuario = $fila['usuario'];
        $contrasenia = $fila['contrasenia'];
        $estado = $fila['estado'];
        $perfil = $fila['roles_id_rol'];

        session_start();
        $_SESSION['id']=  $id ;
        header("location: ../common/dashboard.php?id=$id");
    }

    if ($usuario != $vusuario || $contrasenia != $vcontrasenia || $estado != 'ACTIVO') {
        return_login();
        exit();
    }

    mysqli_close($con);
}

function return_login()
{
    header("location: ../common/inicio-sesion.php");
}
