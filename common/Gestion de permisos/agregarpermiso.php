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
   <h2>Gestión de Permisos</h2></legend>  
   
   <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
   <table width="636" border="0">
      <input class="inputmod"name="cid" type="text" id="cid" size="45"  hidden="true" value="<?php echo $fila['id_usuario'];?>"/>
      <tr>
      </tr>
      <tr>
      <td class="tdclass">ACTIVIDAD: </td>
	  <td>
	  <label for="cid"></label>
					<select  id="cid" name="cid">
					<option value="0">Seleccione:</option>
					<?php
					$consulta="SELECT * FROM actividades";
					$resultado = mysqli_query($con,$consulta) or die(mysqli_error($con));
					while ($fila = mysqli_fetch_array($resultado)) {
					echo '<option value="'.$fila['id_actividad'].'">'.$fila['actividad'].'</option>';
					}
					?>
				</select>
	  </td>
      </tr>
       <tr>
        <td class="tdclass">PERFIL: </td>
        <td>
		
		<label for="crol"></label>
					<select  id="crol" name="crol">
					<option value="0">Seleccione:</option>
					<?php
					$consulta="SELECT * FROM roles";
					$resultado = mysqli_query($con,$consulta) or die(mysqli_error($con));
					while ($fila = mysqli_fetch_array($resultado)) {
					echo '<option value="'.$fila['id_rol'].'">'.$fila['nombre'].'</option>';
					}
					?>
				</select>
		</td>
      </tr>
	  <tr>
        
      <tr>
        <td>	<input class="boton "type="submit" value="Enviar"></td> 
		<td>
		</td>
      </tr>
    </table>
        </div>
			
			</form>
            
           

	</div>
	</div>

<!-- footer --><!-- //footer -->


</body>


</html>