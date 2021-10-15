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
        <title>Listado de usuarios</title>
    
    
    
  
    
<body>
<form class="formlista" method="get" action="eliminar.php" target="iframedash">

		
<p class="listauser">Lista de usuarios:
<select  id="cusuario" name="cusuario" class="listaseleccion" >
        <option value="0">Seleccione:</option>
                

        <?php
        
        $consulta="SELECT * FROM usuarios";
        $resultado = mysqli_query($con,$consulta) or die(mysqli_error($con));
       
        while ($fila = mysqli_fetch_array($resultado)) {
          echo '<option value="'.$fila['usuario'].'">'.$fila['usuario'].'</option>';
        }
        ?>
 
                  
      </select>
      
        <input class="boton" type="submit" value="Borrar">    
        <form>
                    <a href="./gestion-usuarios.php">
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
