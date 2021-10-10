<?php
include_once("conexion.php");


if (isset($_POST['signup'])) {
    $con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
    mysqli_set_charset($con, "utf8");

    $vusuario = $_POST['iusuario'];
    $vcontrasenia = $_POST['icontrasenia'];
    $vnombre = $_POST['inombre'];
    $vemail = $_POST['iemail'];
    $vtelefono = $_POST['itel'];

    //3. Insertar campos en la Base de Datos 

    $inserta = "INSERT INTO usuarios (usuario,contrasena, nombre, telefono, email) VALUES ('$uusuario','$ucontrasena','$unombre','$utelefono','$uemail');";
    $resultado = mysqli_query($con, $inserta);

    header("location:Inicio_de_sesion.php");

    mysqli_close($con);
}
