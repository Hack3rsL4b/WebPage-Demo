<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

//1. Crear conexi�n a la Base de Datos

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

//2. Tomar los campos provenientes del Formulario

$vidact = $_POST['cid'];
$vrol = $_POST['crol'];
	   
 if( $vidact !=null && $vrol !=null ){  
 
//3. Insertar campos en la Base de Datos 

$inserta = "INSERT INTO $bd.permisos (actividad,rol) 
VALUES ('$vidact','$vrol');";
           $resultado = mysqli_query($con, $inserta);
echo json_encode ($resultado);

header("location:../gestion-permisos.php");

}


mysqli_close($con);
