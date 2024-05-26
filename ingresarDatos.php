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
    session_start();
    $gas= mysqli_real_escape_string($conexion, $_POST['Gas']);
    $temperatura= mysqli_real_escape_string($conexion, $_POST['Temperatura']);
    $humedad= mysqli_real_escape_string($conexion, $_POST['Humedad']);
    date_default_timezone_set("UTC");
    $fecha= date("Y/m/j");
    $idSiloEmpleado = $_SESSION['idSiloEmpleado'];
    $sql_insert = "INSERT INTO registro (idSiloEmpleado,fecha,temperatura,humedad,gas)
    VALUES ('$idSiloEmpleado','$fecha','$temperatura','$humedad','$gas');";
    $query= mysqli_query($conexion,$sql_insert);
    header("Location:index.php");
?>