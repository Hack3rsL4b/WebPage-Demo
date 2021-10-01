<?php
include_once("conexion.php");

//1. Crear conexi�n a la Base de Datos
if (isset($_POST['signup'])) {
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

//2. Tomar los campos provenientes del Formulario


$unombre = $_POST['inombre'];
$uusuario = $_POST['iusuario'];
$uemail = $_POST['iemail'];
$utelefono = $_POST['itel'];
$ucontrasena = $_POST['icontrasena'];

//3. Insertar campos en la Base de Datos 

$inserta = "INSERT INTO usuarios (usuario,contrasena, nombre, telefono, email) VALUES ('$uusuario','$ucontrasena','$unombre','$utelefono','$uemail');";
           $resultado = mysqli_query($con, $inserta);

header("location:Inicio_de_sesion.php");

mysqli_close($con);
}
?>

