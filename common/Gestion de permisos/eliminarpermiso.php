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
        <title>Listado de permisos</title>
 
    
    
  
    
<body>
<form class="formlista"  method="get" action="eliminar.php" target="iframedash">

		
<p  class="listauser" >Permisos:
<select  id="cid" name="cid" class="listaseleccion" >
        <option value="0">Seleccione:</option>
                

        <?php
        
        $consulta="SELECT a.actividad AS actividad,
        p.actividad AS  pactividad, 
        p.rol AS rol 
        FROM actividades AS a inner join permisos AS p on a.id_actividad = p.actividad;";
        $resultado = mysqli_query($con,$consulta) or die(mysqli_error($con));
       
        while ($fila = mysqli_fetch_array($resultado)) {
          echo '<option value="'.$fila['pactividad'].'">'.$fila['actividad'].$fila['rol'].'</option>';
        }
        ?>
 
                  
      </select>
      
      <input class="boton" type="submit" value="Borrar">    
        <form>
                    <a href="../gestion-usuarios.php">
                        <input class="boton" type="submit"value="Atrás">
                    </a>
                </form>                        
                <?php 
				
				 mysqli_close($con);  
			    ?>           

      
</div> 
      </form>   
    </body>
</html>
