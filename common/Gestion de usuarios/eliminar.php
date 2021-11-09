<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");

$usuario = isset($_GET['cusuario']) ? $_GET['cusuario'] : '';

if ($usuario != null) {

    $eliminar = "DELETE FROM $bd.usuarios WHERE usuario='$usuario';";
    $resultado = mysqli_query($con, $eliminar);

    header("location:../gestion-usuarios.php");
}

mysqli_close($con);
