<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins&family=Roboto+Mono&family=Tourney&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/style_gestion1.css">


</head>

<script type="text/javascript">
	   function ConfirmDelete()
       {
		   var respuesta = confirm("¿Esta seguro que desea Eliminar el Registro?");
		   
		     if(respuesta == true){
				 return true;
			 }
		     else{
				 return false;
			 }
		   
	   }
    </script>
    
    
	<body>
<!-- header --><!-- //header -->
<!--banner--><!-- contact -->
	<div class="login">
		<div class="container">
  <form method="post" action="insertar.php">
   <fieldset>
   <legend>
   <h2>Gestión de Actividades</h2></legend>  
   
   <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
   
   <table width="636" border="0">
      <tr>
      </tr>
	  <td class="tdclass">ID: </td>
        <td>
		<label for="cid"></label>
		 <input class="inputmod" name="cid" type="text" id="cid" size="35">
		</td>
      <tr>
        <td class="tdclass">ACTIVIDAD: </td>
       <td>
	   <label for="cactividad"></label>
		 <input class="inputmod" name="cactividad" type="text" id="cactividad" size="35" required>
	   </td>
      </tr>
      <tr>
        <td class="tdclass">DESCRIPCIÓN: </td>
	   <td>
	   <label for="cdescripcion"></label>
		<input class="inputmod" name="cdescripcion" type="text" id="cdescripcion" size="35">
	   </td>
      </tr>
      <tr>
      <td class="tdclass">ENLACE: </td>
	 
	  <td>
	  <label for="enlace"></label>
	  <input class="inputmod" name="enlace" type="text" id="enlace" size="35">
	  </td>
      </tr>
      <tr>
      </tr>
      <tr>
        <td>	<input class="boton "type="submit" value="Añadir actividad"></td> 
		<td>
		</td>
      </tr>
	
    </table> 
</form>
            
           

	</div>
	</div>

<!-- footer --><!-- //footer -->


</body>


</html>