<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Eventos</title>
</head>

<body class="bodyenlaces">

    <div class="divintegrantes">
        <?php
        include_once("../php/conexion.php");

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        include_once("../php/obtener-usuario.php");

        $consulta = "SELECT
        $bd.enlances.id_enlace AS eid,
        $bd.enlances.Foto AS efoto,
        $bd.enlances.Nombre AS enombre,
        $bd.enlances.Descripcion AS edescripcion,
        $bd.enlances.Enlace AS enlace
        FROM
        $bd.enlances";

        $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
        ?>

        <h1 class="titulointegrantes">Enlaces de interés:</h1>
        &nbsp;
        <p class="textointegrantes">Aquí puedes encontrar noticias relacionadas a ciberseguridad</p>

    </div>

    <div class="enlaces-tlb">

        <table class="table_enl">
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                $eid = $fila['eid'];
                $efoto = $fila['efoto'];
                $enombre = $fila['enombre'];
                $edescripcion = $fila['edescripcion'];
                $enlace = $fila['enlace'];
            ?>
                <tr class="tr1">
                    <td class="td1">
                        <form id="integrante" name="integrante" class="campos-enlaces">


                            <li class="campo-enl-first">
                                <img class="img_enlaces" src="data:image/jpg;base64, <?php echo base64_encode($efoto); ?>" />

                            </li>
                            <li class="campo-enl-second">

                                <label class="campo__label_int" for="nombre"><?php echo $enombre ?> <?php echo $enombre ?></label>

                            </li>
                            <li class="campo-enl-third">

                                <label class="campo__label_int" for="semillero"><?php echo $edescripcion ?></label>

                            </li>
                            <li class="campo-enl-fourth">
                                <a class="campo__label_fh " href="<?php echo $enlace ?>" target="blank"> Leer más >></a>
                            </li>
                        </form>
                    </td>
                </tr>
            <?php
            }
            mysqli_close($con);
            ?>
        </table>

    </div>
</body>

</html>