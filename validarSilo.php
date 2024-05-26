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
    $capacidad= mysqli_real_escape_string($conexion, $_POST['capacidad']);
    $sql_insert = "INSERT INTO silos (estado,capacidad)
    VALUES ('inactivo','$capacidad');";
    $query= mysqli_query($conexion,$sql_insert);
    header('Location:index.php');
?>