<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Eventos</title>
</head>

<body>
    <?php
    include_once("../php/conexion.php");

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    include_once("../php/obtener-usuario.php");

    $consulta = "SELECT
    $bd.eventos.Id_evento AS eid,
    $bd.eventos.nombre AS enombre,
    $bd.eventos.descripcion AS edecripcion,
    $bd.eventos.ubicacion AS eubicacion,
    $bd.eventos.fecha_inicio AS efecha_inicio,
    $bd.eventos.fecha_fin AS efecha_fin,
    $bd.eventos.fecha_postulacion AS efecha_postulacion
    FROM
    $bd.eventos;";

    $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

    ?>
    <div class="flex-eventos">
        <div class="eventos-contenedor">
            <h2 class="titulo-eventos"> Próximos eventos</h2>
            <ul class="lista-eventos">
                <?php
                while ($fila = mysqli_fetch_array($resultado)) {
                    $eid = $fila['eid'];
                    $enombre = $fila['enombre'];
                    $edecripcion = $fila['edecripcion'];
                    $eubicacion = $fila['eubicacion'];
                    $efecha_inicio = $fila['efecha_inicio'];
                    $efecha_fin = $fila['efecha_fin'];
                    $efecha_postulacion = $fila['efecha_postulacion'];
                ?>
                    <li class="opc-lista-eventos">
                        <p> <span class="span-eventos"> Nombre:</span>  <?php echo $enombre ?> </p>
                        <p> <span class="span-eventos">Descripcion: </span>  <?php echo $edecripcion ?> </p>
                        <p> <span class="span-eventos"> Ubicación:</span>  <?php echo $eubicacion ?> </p>
                        <p> <span class="span-eventos"> Fecha Inicio:</span>  <?php echo $efecha_inicio ?> </p>
                        <p> <span class="span-eventos"> Fecha fin:</span>  <?php echo $efecha_fin ?> </p>
                        <p> <span class="span-eventos">Fecha fin postulación: </span>  <?php echo $efecha_postulacion ?> </p>
                    </li>
                <?php
                }
                mysqli_close($con);
                ?>
            </ul>
        </div>
    </div>
</body>

</html>