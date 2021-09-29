<?php
include_once('conexion.php');


//1. Crear conexión a la Base de Datos
$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");
$pamd = 1; //Perfil Administrador $pcli=2; //Perfil Cliente
if (isset($_POST['login'])) {
    //Recoger datos Variables de Usuario
    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    //VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
    if (empty($usuario) | empty($pass)) {
        header("Location:./../common/Inicio_de_sesion.html");
        exit();
    }
    //VALIDANDO EXISTENCIA DEL USUARIO
    $consulta = "SELECT * from usuarios where usuario = '$usuario' and clave = '$pass'";
    $resultado = mysqli_query($con, $consulta);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usu = $fila['usuario'];
        $clav = $fila['clave'];
        $perfil = $fila['roles_id_rol'];
    }
    //Valida Usuario y/Contraseña no coincidentes
    if (($usu != $usuario) | ($clav != $pass)) {
        header("Location:./Inicio_de_sesion.html");
        exit();
    }
    //Valida perfil del Administrador
    if ($perfil == 1) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:./indexAdmin.html");
    }
    //Valida perfil Cliente
    else if ($perfil == 3) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:./../common/indexUsuario.html");
    }
    //Valida perfil SperAdministrador
    else if ($perfil == $psadmon) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:indexAdministrador.php");
    } else {
        header("Location: ./");
        exit();
    }
}
mysqli_close($con);
