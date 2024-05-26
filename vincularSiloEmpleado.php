<!DOCTYPE html>
<?php
    session_start();
    include("conexion.php");
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vinculos.css">
    <title>vincular silo empleados</title>
</head>
<body>
<form action="vinculo.php" method="POST">
            <h2>Vincular silo Empleado</h2><br><br>
            <label>Silos disponibles <select name="siloDisponibles">
            <option value="vacio">-</option >
            <?php
                $consultasilo = "SELECT idSilo FROM silos WHERE estado='inactivo'";
                $resultadosilo = mysqli_query($conexion,$consultasilo);
                while ($fila = mysqli_fetch_array($resultadosilo))
                {   
                    $idSilo = $fila["idSilo"];
                    echo"<option value='$idSilo'>$idSilo</option>";
                }
            ?>
            </select></label><br><br>
            <label>Empleados disponibles <select name="empleadosDisponibles">
            <option value="vacio">-</option>
            <?php
                $consultaempleado = "SELECT idEmpleado FROM empleados WHERE estado='inactivo'";
                $resultadoempleado = mysqli_query($conexion,$consultaempleado);
                while ($fila = mysqli_fetch_array($resultadoempleado))
                {   
                    $idempleado = $fila["idEmpleado"];
                    $consulta = "SELECT nombre FROM empleados WHERE idEmpleado='$idempleado'";
                    $resultado = mysqli_query($conexion,$consulta);
                    $fila = mysqli_fetch_array($resultado);
                    echo"<option value='$idempleado'>$idempleado",' este id corresponde al empleado ',$fila['nombre'],"</option>";
                }
            ?>
            </select></label><br><br>
            <input type="submit" value="ENVIAR">
            <br><br>
            <a href='tablaEmpleado.php' class='vuelta'>Volver a Tabla empleados</a>
</form>
</body>
</html>