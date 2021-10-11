<?php
include_once('conexion.php');

session_start();
$session_pwd = $_SESSION['clave'];

if (!isset($session_pwd)) {
   header("location: ../");
}

$con = mysqli_connect($host, $usuario, $clave, $bd) or die("Falló la conexión");
mysqli_set_charset($con, "utf8");

$query = "SELECT 
$bd.usuarios.nombre AS nombre,
$bd.usuarios.apellido AS apellido, 
$bd.roles.nombre AS rol 
FROM 
$bd.usuarios, 
$bd.roles 
WHERE 
$bd.usuarios.contrasenia = '$session_pwd' AND 
$bd.usuarios.roles_id_rol = $bd.roles.id_rol;";
$result = mysqli_query($con, $query);

while ($fila = mysqli_fetch_assoc($result)) {
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $rol = $fila['rol'];
}
$nombre_usuario = $nombre . " " . $apellido;

