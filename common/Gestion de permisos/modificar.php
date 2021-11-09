<?php
include_once("../../php/conexion.php");
include_once("../../php/obtener-usuario.php");

$con = mysqli_connect($host, $usuario, $clave, $bd) or die('Fallo la conexion');
mysqli_set_charset($con, "utf8");


?>



<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../../css/style_gestion1.css">
  <title>Permisos</title>

</head>

<body>
  <?php

  $idact = isset($_GET['cid']) ? $_GET['cid'] : '';


  $consulta = "SELECT * FROM $bd.permisos WHERE actividad = '$idact'";

  $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

  ?>
  <div class="container">



    <?php
    while ($fila = mysqli_fetch_array($resultado)) {

    ?>

      <form id="form1" name="form1" method="post" action="modificar.php">
        <h2>Modificar usuarios</h2>

        <table width="636">
          <input class="inputmod" name="cid" type="text" id="cid" size="45" hidden="true" value="<?php echo $fila['actividad']; ?>" />
          <tr>

            <td>ACTIVIDAD: </td>
            <td><label for="cactividad"></label>
              <input class="inputmod" name="cactividad" type="text" id="cactividad" size="45" value="<?php echo $fila['actividad']; ?>" />
            </td>
          </tr>
          <tr>
            <td>ROL: </td>
            <td><label for="crol"></label>
              <label for="crol"></label>
              <select class="listaseleccion" id="crol" name="crol">
                <option value="0">Seleccione:</option>
                <?php
                $consulta = "SELECT * FROM roles";
                $resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));
                while ($fila = mysqli_fetch_array($resultado)) {
                  echo '<option value="' . $fila['id_rol'] . '">' . $fila['nombre'] . '</option>';
                }
                ?>
          </tr>
          <tr>
            <td><input class="boton" type="submit" name="actualizar" id="button" value="Actualizar" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </form>
    <?php
    }
    ?>

    </table>

  </div>
  <?php
  //1. Crear el proceso de actualización de los ddatos
  //2. Toma los datos provenientes del Formulario y posteriormente los asigna a los campos de tabla en la Base de Datos


  $nactividad = isset($_POST['cactividad']) ? $_POST['cactividad'] : '';
  $nrol = isset($_POST['crol']) ? $_POST['crol'] : '';

  if ($nactividad != null && $nrol != null) {

    $modificar = "UPDATE $bd.permisos SET  actividad = '$nactividad', rol='$nrol'  WHERE actividad='$nactividad'";
    $resultado = mysqli_query($con, $modificar);


    header("location:../gestion-actividades.php");
  }

  mysqli_close($con);

  ?>

</body>

</html>