<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

//1. Crear conexi�n a la Base de Datos

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");

//2. Tomar los campos provenientes del Formulario

$vidact = $_POST['cid'];
$vactividad = $_POST['cactividad'];
$vdescripcion = $_POST['cdescripcion'];
$venlace = $_POST['enlace'];

             
		   
 if( $vidact !=null && $vactividad !=null && $vdescripcion !=null && $venlace !=null){  
 
//3. Insertar campos en la Base de Datos 

$inserta = "INSERT INTO $bd.actividades (id_actividad,actividad,descripcion,enlace) 
VALUES ('$vidact','$vactividad','$vdescripcion','$venlace');";
           $resultado = mysqli_query($con, $inserta);
echo json_encode ($resultado);

header("location:../gestion-actividades.php");

}


mysqli_close($con);
?>

