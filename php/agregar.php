<?php
include_once("conexion.php");


if (isset($_POST['signup'])) {
    $con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
    mysqli_set_charset($con, "utf-8");

    $vusuario = $_POST['iusuario'];
    $vcontrasenia = $_POST['icontrasenia'];
    $vnombre = $_POST['inombre'];
    $vtelefono = $_POST['itel'];
    $vemail = $_POST['iemail'];

    $inserta = "INSERT INTO usuarios (usuario, contrasenia, nombre, telefono, email) VALUES ('$vusuario','$vcontrasenia','$vnombre','$vtelefono','$vemail');";
    $resultado = mysqli_query($con, $inserta);

    header("location: ../common/inicio-sesion.php");

    mysqli_close($con);
}
