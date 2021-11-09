<?php
include_once('conexion.php');

session_start();
$session_pwd = $_SESSION['id'];

if (!isset($session_pwd)) {
   header("location: ../");
}

$con = mysqli_connect($host, $usuario, $clave, $bd) or die("Falló la conexión");
mysqli_set_charset($con, "utf8");

$query = "SELECT 
$bd.usuarios.id_usuario AS id,
$bd.usuarios.foto_usuario AS fotoperfil,
$bd.usuarios.nombre AS nombre,
$bd.usuarios.apellido AS apellido, 
$bd.usuarios.contrasenia AS contrasenia, 
$bd.usuarios.usuario AS usuario, 
$bd.usuarios.usuario AS usuario, 
$bd.usuarios.email AS email, 
$bd.usuarios.telefono AS telefono, 
$bd.roles.nombre AS rol 
FROM 
$bd.usuarios, 
$bd.roles 
WHERE 
$bd.usuarios.id_usuario = '$session_pwd' AND 
$bd.usuarios.roles_id_rol = $bd.roles.id_rol;";
$result = mysqli_query($con, $query);

while ($fila = mysqli_fetch_assoc($result)) {
    $id_usuario=$fila['id'];
    $fotoperfil=$fila['fotoperfil'];
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $usuariob = $fila['usuario'];
    $contraseniab = $fila['contrasenia'];
    $telefono = $fila['telefono'];
    $email = $fila['email'];
    $rol = $fila['rol'];
}
$nombre_usuario = $nombre . " " . $apellido;

