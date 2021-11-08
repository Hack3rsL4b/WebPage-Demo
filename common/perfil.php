<?php
    include_once("../php/conexion.php");
    include_once("../php/obtener-usuario.php");
    $con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
    mysqli_set_charset($con, "utf8");
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <title>Perfil</title>
</head>



<body>
<?php
    $id1 = isset($_GET['id']) ? $_GET['id'] : '';
    $consulta = "SELECT * FROM $bd.usuarios WHERE id_usuario = '$id1'";
    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
?>
    <div class="flexperfil">
        <dic class="gridperfil">
            <div class="img-perfil">
                <div class="opacidad">
                    <div class="perfil-imgnom">
                        <p class="perfil-nombre">
                            <?php echo $nombre_usuario ?>
                        </p>

                        <div class="fotoperfil">

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contenedor-perfil">
            
                <form action="perfil.php" method="post">
                <label for="cid"></label>
                <input name="cid" type="text" id="cid" size="45"  hidden="true" value="<?php echo $id_usuario?>"/>

                    <div class="perfil-g2">
                        <div class="perfil-gnombre perfil-g">
                            <label for="cnombre">Nombre</label>
                            <input id="cnombre" required name="cnombre" value="<?php echo $nombre ?>" class="campo-inputp" type="text">
                        </div>

                        <div class="perfil-gapellido perfil-g">
                            <label for="capellido">Apellido</label>
                            <input id="capellido" required name="capellido" value="<?php echo $apellido;?>" class="campo-inputp" type="text">
                        </div>

                        <div class="perfil-gusuario perfil-g">
                            <label for="cuser">Usuario</label>
                            <input id="cuser" required name="cuser" value="<?php echo $usuariob;?>" class="campo-inputp" type="text">
                        </div>

                        <div class="perfil-gcon perfil-g">
                            <label for="cclave">Contraseña</label>
                            <input id="cclave" required name="cclave" value="<?php echo $contraseniab;?>" class="campo-inputp" type="text">
                        </div>

                        <div class="perfil-gemail perfil-g">
                            <label for="cemail">Email</label>
                            <input id="cemail" required name="cemail" value="<?php echo $email;?>" class="campo-inputp" type="text">
                        </div>

                        <div class="perfil-gtel perfil-g">
                            <label for="ctel">Telefono</label>
                            <input id="ctel" required name="ctel" value="<?php echo $telefono;?>" class="campo-inputp" type="number">
                        </div>
                    </div>
                    <div class="perfil-boton-enviar">
                        <input type="submit" value="Actualizar" class="perfil-enviar" name="actualizar">
                    </div>
                
                    
                </form>
               
            </div>
        </dic>
    </div>
    



</body>
<?php
//1. Crear el proceso de actualización de los ddatos
//2. Toma los datos provenientes del Formulario y posteriormente los asigna a los campos de tabla en la Base de Datos
  $id1 = isset($_POST['cid']) ? $_POST['cid'] : '';
  $usuario = isset($_POST['cuser']) ? $_POST['cuser'] : '';
  $nclave = isset($_POST['cclave']) ? $_POST['cclave'] : '';
  $nnombre = isset($_POST['cnombre']) ? $_POST['cnombre'] : '';
  $napellido = isset($_POST['capellido']) ? $_POST['capellido'] : '';
  $ntelefono = isset($_POST['ctel']) ? $_POST['ctel'] : '';
  $nemail = isset($_POST['cemail']) ? $_POST['cemail'] : '';
     	
	
    if( $nnombre !=null && $napellido !=null && $usuario !=null && $nclave !=null&& $ntelefono !=null&& $nemail !=null){  
            
    $modificar="UPDATE $bd.usuarios SET  usuario = '$usuario',contrasenia = '$nclave', nombre='$nnombre', apellido = '$napellido',
    telefono = '$ntelefono', email = '$nemail'  WHERE id_usuario='$id1'";
    $resultado= mysqli_query($con, $modificar);

    header("location: ../common/perfil.php?id=$id1");	
    }

    mysqli_close($con);
?>
</html>