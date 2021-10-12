<?php
include_once("../php/conexion.php");
include_once("../php/obtener-usuario.php");

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
        <!-- Consulta que permite seleccionar Los Nombres y Apellidos del Cliente -->
		<?php
        
        
            
    
        $consulta="SELECT a.actividad AS actividad,
        p.actividad AS  pactividad, 
        p.rol AS rol 
        FROM actividades AS a inner join permisos AS p on a.id_actividad = p.actividad;";
       $resultado = mysqli_query($con,$consulta) or die(mysql_error());
        

				   
        ?>
 <div class="container"> 
    <div class="search">
        
        <table align="center" width="429" border="0">
          <tr>
            <td width="664"><form class="form">
              <input name="txtbuscar" type="text" class="form-control" title="Ingresar la actividad o ID." size="40" placeholder="Ingresar el Nombre o ID">
              <input type="submit" value="Buscar">     
          </form>
            </td>     
          </tr>
        </table>
        
      </div>
         
  <!-- Consulta que permite seleccionar Los Datos de la venta -->
  <?php
        $buscar = isset($_GET['txtbuscar']) ? $_GET['txtbuscar'] : '';
    
    if($buscar!=null){
    $consulta="SELECT * FROM $bd.actividades WHERE id LIKE"."'%".$buscar."%' OR actividad LIKE"."'%".$buscar."%' ";
        
    
    $resultado = mysqli_query($con,$consulta) or die(mysql_error());
    }else{
               
             }		   
      ?>
        
          
          
          
          
<hr>
<div class="tablecontainer">
<div class="headertools">
<div class="tools">
<ul>
    <li>
 
    <a class=”material-icons-round” href="./Gestion de permisos/agregarpermiso.php" target="iframedash">añadir</a>
    
    </li>
    <li>
        
    <a href="./Gestion de permisos/modificarpermiso.php" class="btn btn-warning btn-sm"  target="iframedash">Modificar</a>  

    </li>
    <li>
   
        <a class=”material-icons-round” href="./Gestion de permisos/eliminarpermiso.php" target="iframedash">eliminar</a>
        
    </li>
   
</ul>
    </div>
    
    </div>
    <table class="datatable">
        <thead>
        <tr>
        
        <th class="text-center">ACTIVIDAD</th>              
        <th class="text-center">N° ACTIVIDAD</th>
        <th class="text-center">ROL</th>
        
         </tr>
        </thead>

        <tbody>
        <?php
                while($fila = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                   
                    <td><?php echo $fila['actividad'];?></td>
                    <td><?php echo $fila['pactividad'];?></td>  
                    <td><?php echo $fila['rol'];?></td>  
                                                       
               </tr>
                <?php 
				}
				
				 mysqli_close($con);  
			    ?>    

        </tbody>
    </table>
   <div class="footer-tools">
       <div class="list-items">
       </div>
       <div class="pages">
       </div>
   </div>
</div>
    
</div> 
        
    </body>

</html>