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

  background: #EBE9E0;
}

    </style>
    </head>
<body>
        <?php
         
         $id1 = isset($_GET['id']) ? $_GET['id'] : '';
         
		 
		 $consulta="SELECT * FROM $bd.usuarios WHERE id_usuario = '$id1'";
		
         $resultado = mysqli_query($con,$consulta) or die(mysql_error());
		       
        ?>
        <div class="container"> 
            
            
         
                <?php
                while($fila = mysqli_fetch_array($resultado)){
					
                ?>
                
  <form id="form1" name="form1" method="post" action="modificar.php">
  <fieldset>
  <legend><h2><center>
    <p>Modificar usuarios</p>
    
  </center></h2></legend>
    <center>
      
      <table width="636" border="0">
      <input name="cid" type="text" id="cid" size="45"  hidden="true" value="<?php echo $fila['id_usuario'];?>"/>
      <tr>
      <td>ID: </td>
        <td><label for="cid"></label>
        <input name="cid" type="text" id="cid" size="45" value="<?php echo $fila['id_usuario'];?>" disabled /></td>
      </tr>
      <tr>
      <td>USUARIO: </td>
        <td><label for="cuser"></label>
        <input name="cuser" type="text" id="cuser" size="45" value="<?php echo $fila['usuario'];?>"  /></td>
      </tr>
       <tr>
        <td>CONTRASEÑA: </td>
        <td><label for="cclave"></label>
        <input name="cclave" type="text" id="cclave" size="45" value="<?php echo $fila['contrasenia'];?>" /></td>
      </tr>
      <tr>
        <td>NOMBRE: </td>
        <td><label for="cnombre"></label>
        <input name="cnombre" type="text" id="cnombre" size="45" value="<?php echo $fila['nombre'];?>" /></td>
      </tr>
      <tr>
        <td>APELLIDO: </td>
        <td><label for="capellido"></label>
        <input name="capellido" type="text" id="capellido" size="45" value="<?php echo $fila['apellido'];?>" /></td>
      </tr>
      <tr>
        <td>TELEFONO: </td>
        <td><label for="ctelefono"></label>
        <input name="ctelefono" type="text" id="ctelefono" size="45" value="<?php echo $fila['telefono'];?>" /></td>
      </tr>
      <tr>
        <td>EMAIL: </td>
        <td><label for="cemail"></label>
        <input name="cemail" type="text" id="cemail" size="45" value="<?php echo $fila['email'];?>" /></td>
      </tr>
      <tr>
      <td>ESTADO:
      <td><select name="cestado" required>
					<option value="ACTIVO">Activo</option> 
					<option value="INACTIVO">Inactivo</option>  
					</select></td>
          </td>
          <tr>   
        <td>PERFIL: </td>
        <td><label for="cperfil"></label>
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
      </tr>
      <tr>
        
      <tr>
        <td><input type="submit" name="actualizar" id="button" value="Actualizar" /></td> 
       
      </tr>
    </table>
      <p>&nbsp;</p>
    </center>
    </fieldset>
</form>   
            <?php 
				}			 
			    ?>           
               
          </table>
      
        </div>
 <?php
//1. Crear el proceso de actualización de los ddatos
//2. Toma los datos provenientes del Formulario y posteriormente los asigna a los campos de tabla en la Base de Datos

  $id1 = isset($_POST['cid']) ? $_POST['cid'] : '';
  $nusuario = isset($_POST['cuser']) ? $_POST['cuser'] : '';
  $nclave = isset($_POST['cclave']) ? $_POST['cclave'] : '';
  $nnombre = isset($_POST['cnombre']) ? $_POST['cnombre'] : '';
  $napellido = isset($_POST['capellido']) ? $_POST['capellido'] : '';
  $ntelefono = isset($_POST['ctelefono']) ? $_POST['ctelefono'] : '';
  $nemail = isset($_POST['cemail']) ? $_POST['cemail'] : '';
  $nestado = isset($_POST['cestado']) ? $_POST['cestado'] : '';
  $nperfil = isset($_POST['cperfil']) ? $_POST['cperfil'] : '';
     	
	
if( $nnombre !=null && $napellido !=null && $nusuario !=null && $nclave !=null){  
		 
$modificar="UPDATE $bd.usuarios SET  usuario = '$nusuario', contrasenia = '$nclave', nombre='$nnombre', apellido = '$napellido',
telefono = '$ntelefono', email = '$nemail', estado ='$nestado', roles_id_rol = '$nperfil'  WHERE id_usuario='$id1'";
$resultado= mysqli_query($con, $modificar);


header("location:../gestion-usuarios.php");	
}

mysqli_close($con);

?>

  
    </body>
</html>
