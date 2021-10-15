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
        <link rel="stylesheet" href="../../css/style_gestion1.css">
        <title>Perfiles</title>

    </head>
<body>
        <?php
         
         $id1 = isset($_GET['id']) ? $_GET['id'] : '';
         
		 
		 $consulta="SELECT * FROM $bd.actividades WHERE id_actividad = '$id1'";
		
         $resultado = mysqli_query($con,$consulta) or die(mysql_error());
		       
        ?>
        <div class="container"> 
            
            
         
                <?php
                while($fila = mysqli_fetch_array($resultado)){
					
                ?>
                
  <form id="form1" name="form1" method="post" action="modificar.php">
  <fieldset>
  <legend><h2><center>
    <p>Modificar actividades</p>
    
  </center></h2></legend>
    <center>
      
      <table width="636" border="0">
      <input class="inputmod" name="cid" type="text" id="cid" size="45"  hidden="true" value="<?php echo $fila['id_actividad'];?>"/>
      <tr>
      <td class="tdclass">ID: </td>
        <td><label for="cid"></label>
        <input class="inputmod" name="cid" type="text" id="cid" size="45" value="<?php echo $fila['id_actividad'];?>"disabled/></td>
      </tr>
       <tr>
        <td class="tdclass">ACTIVIDAD: </td>
        <td><label for="cactividad"></label>
        <input class="inputmod" name="cactividad" type="text" id="cactividad" size="45" value="<?php echo $fila['actividad'];?>" /></td>
      </tr>
      <tr>
        <td class="tdclass">DESCRIPCIÓN: </td>
        <td><label for="cdescripcion"></label>
        <input class="inputmod"  name="cdescripcion" type="text" id="cdescripcion" size="45" value="<?php echo $fila['descripcion'];?>" /></td>
      </tr>
      <tr>
        <td class="tdclass">ENLACE: </td>
        <td><label for="cenlace"></label>
        <input class="inputmod" name="cenlace" type="text" id="cenlace" size="45" value="<?php echo $fila['enlace'];?>" /></td>
      </tr>
      <tr>
        <td><input class="boton" type="submit" name="actualizar" id="button" value="Actualizar" /></td> 
       <td>

       </td>
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
  $nactividad = isset($_POST['cactividad']) ? $_POST['cactividad'] : '';
  $ndescripcion = isset($_POST['cdescripcion']) ? $_POST['cdescripcion'] : '';
  $nenlace = isset($_POST['cenlace']) ? $_POST['cenlace'] : '';
 
     	
	
if( $id1 !=null && $nactividad !=null && $ndescripcion !=null && $nenlace !=null){  
		 
$modificar="UPDATE $bd.actividades SET  actividad = '$nactividad', descripcion='$ndescripcion', 
enlace = '$nenlace'  WHERE id_actividad='$id1'";
$resultado= mysqli_query($con, $modificar);


header("location:../gestion-actividades.php");	
}

mysqli_close($con);

?>

  
    </body>
</html>
