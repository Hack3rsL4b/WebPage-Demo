

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Eventos</title>
</head>


<body class="bodyintegrantes">
<?php
    include_once("../php/conexion.php");

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    include_once("../php/obtener-usuario.php");

    $consulta = "SELECT
    $bd.integrantes.id_integrante AS eid,
    $bd.integrantes.programa AS eprograma,
    $bd.integrantes.descripcion AS edescripcion,
    $bd.usuarios.nombre AS enombre,
    $bd.usuarios.apellido AS eapellido,
    $bd.usuarios.foto_usuario AS fotoperfil
    FROM
    $bd.usuarios  INNER JOIN integrantes ON usuarios.id_usuario = integrantes.id_usuario;";

    

    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

    ?>




    <div class="divintegrantes">

    <h1 class="titulointegrantes">Integrantes del semillero:</h1>
    &nbsp;
    <p class="textointegrantes">Integrantes del semillero Segurinfo - H4ck3rs L4b de la Universidad de San Buenventura Sede Bogotá</p>

    </div>
	
    <div class="integrantes-tlb">
    <?php
                while ($fila = mysqli_fetch_array($resultado)) {
                    $eid = $fila['eid'];
                    $eprograma = $fila['eprograma'];
                    $edecripcion = $fila['edescripcion'];
                    $enombre = $fila['enombre'];
                    $eapellido = $fila['eapellido'];
                    $fotoperfil = $fila['fotoperfil'];
                ?>
    <table class="table_int">
    <tr>
    <td>
        <form id="integrante" name="integrante" class="campos-integrantes" >

            
                    <li class="campo-int-first">
                    <img class="img_integrantes" src= "data:image/jpg;base64, <?php echo base64_encode ($fotoperfil);?>"/>
                        
                    </li>
                    <li class="campo-int-second">
                        
                        
                        <label class="campo__label_int" for="nombre"><?php echo $enombre ?> <?php echo $eapellido ?></label>
                        
                    </li>
                    <li class="campo-int-third">
                
                    <label class="campo__label_int" for="semillero"><?php echo $eprograma ?></label>
                        
                    </li>
                    <li class="campo-int-fourth">
                        <label class="campo__label_int" for="información"><?php echo $edecripcion ?></label>
                        
                    </li>                       

                   

                </form>
    </td>
    </tr>

</table>
<?php
                }
                mysqli_close($con);
                ?>


    </div>

</body>

</html>