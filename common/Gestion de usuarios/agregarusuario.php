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
    <link rel="stylesheet" href="../css/style_gestion.css">

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
   <h2>Gestión de Pefiles de Usuarios</h2></legend>     
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
				<p>USUARIO: 
				    <label for="cusuario"></label>
				    <input name="cusuario" type="text" id="cusuario" size="60">
				  </p>
				  <p>CONTRASEÑA:
				    <label for="cclave"></label>
				    <input name="cclave" type="text" id="cclave" size="35" required>
				  </p>
				  <p>NOMBRE:
				    <label for="cnombre"></label>
				    <input name="cnombre" type="text" id="cnombre" size="35">
				  </p>
				  <p>APELLIDO:
				    <label for="capellido"></label>
				    <input name="capellido" type="text" id="capellido" size="35">
				  </p>
				  <p>TELEFONO:
				    <label for="ctelefono"></label>
				    <input name="ctelefono" type="text" id="ctelefono" size="35">
				  </p>
				  <p>EMAIL:
				    <label for="cemail"></label>
				    <input name="cemail" type="text" id="cemail" size="35">
				  </p>
				
				  <p>ESTADO:
					<select name="cestado" required>
					<option value="ACTIVO">Activo</option> 
					<option value="INACTIVO">Inactivo</option>  
					</select>
				  </p>

				  <p>PERFIL:
				    <label for="cperfil"></label>
					<select  id="cperfil" name="cperfil">
					<option value="0">Seleccione:</option>
					<?php
					$consulta="SELECT * FROM roles";
					$resultado = mysqli_query($con,$consulta) or die(mysql_error());
					while ($fila = mysqli_fetch_array($resultado)) {
					echo '<option value="'.$fila['id_rol'].'">'.$fila['nombre'].'</option>';
					}
					?>
				</select>
				  </p>
				  <p>&nbsp;</p>
        </div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Enviar">
					</label>
					<p>&nbsp;</p>
</div>
			<div class="clearfix"> </div>
            </fieldset>
			</form>
            
           

	</div>
	</div>

<!-- footer --><!-- //footer -->


</body>


</html>