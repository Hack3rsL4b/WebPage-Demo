<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");

$idact = isset($_GET['cid']) ? $_GET['cid'] : '';

if ($usuario != null) {

    $eliminar = "DELETE FROM $bd.actividades WHERE id_actividad = '$idact';";
    $resultado = mysqli_query($con, $eliminar);

    header("location:../gestion-actividades.php");
}

mysqli_close($con);
