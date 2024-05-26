<?php
    include("conexion.php");

    if(!$conexion)
    {
        echo 'Error en la conexion';
    }
    else
    {
        echo 'Conectado a la base de datos <br>';
    }

    //para prevenir mysql injection
    $silo= mysqli_real_escape_string($conexion, $_POST['siloDisponibles']);
    $empleado= mysqli_real_escape_string($conexion, $_POST['empleadosDisponibles']);
    $sqlEmpleado = "UPDATE empleados SET estado='empleado' WHERE idEmpleado='$empleado'";
    $queryEmpleado= mysqli_query($conexion,$sqlEmpleado);
    $sqlSilo = "UPDATE silos SET estado='activo' WHERE idSilo='$silo'";
    $querySilo= mysqli_query($conexion,$sqlSilo);
    date_default_timezone_set("UTC");
    $fecha= date("Y/m/j");
    $sql_insert = "INSERT INTO siloempleado (idSilo,idEmpleado,fecha_asignado)
    VALUES ('$silo','$empleado','$fecha');";
    $query= mysqli_query($conexion,$sql_insert);
    header('Location:tablaEmpleado.php');
?>