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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Poppins&family=Roboto+Mono&family=Tourney&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style_gestion1.css">

    <title>Usuarios</title>
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
</head>    
    
<body>
        <!-- Consulta que permite seleccionar Los Nombres y Apellidos del Cliente -->
		<?php
      
        
		 $consulta="SELECT * FROM roles";
         $resultado = mysqli_query($con,$consulta) or die(mysql_error());
				   
        ?>
 <div class="container"> 
    <div class="search">
        
        <table align="center" width="429" border="0">
          <tr>
            <td width="664"><form class="form">
              <input name="txtbuscar" type="text" class="form-control" title="Ingresar el Nombre o el id." size="40" placeholder="Ingresar el Nombre o ID">
              <input class="boton"type="submit" value="Buscar rol">
              <form>
                    <a href="./gestion-usuarios.php">
                        <input class="boton" type="submit"value="Atrás">
                    </a>
                </form>
            </td>     
          </tr>
        </table>
        
      </div>
         
  <!-- Consulta que permite seleccionar Los Datos de la venta -->
  <?php
        $buscar = isset($_GET['txtbuscar']) ? $_GET['txtbuscar'] : '';
    
    if($buscar!=null){
    $consulta="SELECT * FROM $bd.roles WHERE id_rol LIKE"."'%".$buscar."%' OR nombre LIKE"."'%".$buscar."%' ";
        
    
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
 
  
    
    </li>
    <li>
        
    

    </li>
    <li>
   
       
    </li>
   
</ul>
    </div>
    
    </div>
    <table class="datatable">
        <thead>
        <tr>
        
        <th class="text-center">ID</th>              
        <th class="text-center">Nombre</th>
        <th class="text-center">DESCRIPCION</th>
        
         </tr>
        </thead>

        <tbody>
        <?php
                while($fila = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                   
                    <td><?php echo $fila['id_rol'];?></td>
                    <td><?php echo $fila['nombre'];?></td>  
                    <td><?php echo $fila['descripcion'];?></td>                                                          
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