<?php
include_once('conexion.php');


//1. Crear conexión a la Base de Datos
$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");
$pamd = 1; //Perfil Administrador $pcli=2; //Perfil Cliente
if (isset($_POST['login'])) {
    //Recoger datos Variables de Usuario
    $usuario = $_POST['cusuario'];
    $pass = $_POST['cclave'];
    //VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
    if (empty($usuario) | empty($pass)) {
        header("Location:./");
        exit();
    }
    //VALIDANDO EXISTENCIA DEL USUARIO
    $consulta = "SELECT * from usuarios where usuario = '$usuario' and clave = '$pass' and id_estado=1";
    $resultado = mysqli_query($con, $consulta);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usu = $fila['usuario'];
        $clav = $fila['clave'];
        $perfil = $fila['id_perfil'];
    }
    //Valida Usuario y/Contraseña no coincidentes
    if (($usu != $usuario) | ($clav != $pass)) {
        header("Location:./");
        exit();
    }
    //Valida perfil del Administrador
    if ($perfil == $pamd) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:indexAdministrador.php");
    }
    //Valida perfil Cliente
    else if ($perfil == $pcli) {
        session_start();
        $_SESSION['clave'] = $pass;
        header("Location:indexCliente.php");
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
