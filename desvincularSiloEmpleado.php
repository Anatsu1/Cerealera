<!DOCTYPE html>
<?php
    session_start();
    include("conexion.php");
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vinculos.css">
    <title>vincular silo empleados</title>
</head>
<body>
<form action="desvincular.php" method="POST">
            <h2>Vincular silo Empleado</h2><br><br>
            <label>Silos disponibles <select name="siloDisponibles">
            <option value="vacio">-</option>
            <?php
                $consultasilo = "SELECT idSilo FROM siloempleado WHERE fecha_desasignado IS NULL";
                $resultadosilo = mysqli_query($conexion,$consultasilo);
                while ($fila = mysqli_fetch_array($resultadosilo))
                {   
                    $idSilo = $fila["idSilo"];
                    $consultaempleado = "SELECT idEmpleado FROM siloempleado WHERE idSilo='$idSilo'";
                    $resultadoempleado = mysqli_query($conexion,$consultaempleado);
                    $filaEmpleado = mysqli_fetch_array($resultadoempleado);
                    $idEmpleado = $filaEmpleado["idEmpleado"];
                    echo"<option value='$idSilo'>$idSilo",'"Esta conectado con Empleado "',$idEmpleado,"</option>";
                }
            ?>
            </select></label><br><br>
            <label>Empleados disponibles <select name="empleadosDisponibles">
            <option value="vacio">-</option>
            <?php
                $consultaempleado = "SELECT idEmpleado FROM siloempleado WHERE fecha_desasignado IS NULL";
                $resultadoempleado = mysqli_query($conexion,$consultaempleado);
                while ($fila = mysqli_fetch_array($resultadoempleado))
                {   
                    $idempleado = $fila["idEmpleado"];
                    $consultasilo = "SELECT idSilo FROM siloempleado WHERE idEmpleado='$idempleado'";
                    $resultadosilo = mysqli_query($conexion,$consultasilo);
                    $filaSilo = mysqli_fetch_array($resultadosilo);
                    $idSilo = $filaSilo["idSilo"];
                    echo"<option value='$idempleado'>$idempleado",'"Esta conectado con Silo "',$idSilo,"</option>";
                }
            ?>
            </select></label><br><br>
            <input type="submit" value="ENVIAR"><br>
            <a href='tablaEmpleado.php' class='vuelta'>Volver a Tabla empleados</a>
</form>
</body>
</html>
