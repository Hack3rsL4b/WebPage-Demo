<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

//1. Crear conexi�n a la Base de Datos

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

//2. Tomar los campos provenientes del Formulario

$vusuario = $_POST['cusuario'];
$vclave = $_POST['cclave'];
$vnombre = $_POST['cnombre'];
$vapellido = $_POST['capellido'];
$vtelefono = $_POST['ctelefono'];
$vemail = $_POST['cemail'];
$vestado = $_POST['cestado'];
$vperfil = $_POST['cperfil'];
             
		   
 if( $vnombre !=null && $vapellido !=null && $vusuario !=null && $vclave !=null && $vestado !=null&& $vperfil !=null){  
 
//3. Insertar campos en la Base de Datos 

$inserta = "INSERT INTO $bd.usuarios (usuario, contrasenia, nombre, apellido, telefono, email, estado, roles_id_rol) 
VALUES ('$vusuario','$vclave','$vnombre','$vapellido','$vtelefono','$vemail','$vestado','$vperfil');";
           $resultado = mysqli_query($con, $inserta);
echo json_encode ($resultado);

header("location:../gestion-usuarios.php");

}


mysqli_close($con);
?>

