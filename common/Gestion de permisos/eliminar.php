<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");


?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Perfiles</title>
    <style type="text/css">
    #apDiv1 {
	position:absolute;
	left:268px;
	top:469px;
	width:99px;
	height:29px;
	z-index:1;
 
}

body{
    <?php

$idact = isset($_GET['cid']) ? $_GET['cid'] : '';
		 
		 if($usuario !=null){  
		 
		 $eliminar ="DELETE FROM $bd.permisos WHERE actividad='$idact';";
         $resultado = mysqli_query($con, $eliminar);
         
		header("location:../gestion-permisos.php");
        }
		 
		  mysqli_close($con);      
         
        ?>
    </body>
</html>
