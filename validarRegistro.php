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
    $nombre= mysqli_real_escape_string($conexion, $_POST['Nombre']);
    $apellido= mysqli_real_escape_string($conexion, $_POST['Apellido']);
    $dni= mysqli_real_escape_string($conexion, $_POST['DNI']);
    $direccion= mysqli_real_escape_string($conexion, $_POST['Direccion']);
    $telefono= mysqli_real_escape_string($conexion, $_POST['Telefono']);
    $contra= mysqli_real_escape_string($conexion, $_POST['password']);


    if($username == 'admin')
    {
        $estado = 'administrador';
    }
      
    $sql_verify = "SELECT nombre FROM empleados WHERE nombre = '$nombre'";
    $querys = mysqli_query($conexion,$sql_verify);
    if (mysqli_num_rows($querys) == 0){
        $sql_insert = "INSERT INTO empleados (nombre,apellido,dni,telefono,direccion,estado,contra)
        VALUES ('$nombre','$apellido','$dni','$telefono','$direccion','inactivo','$contra');";
        $query= mysqli_query($conexion,$sql_insert);
        header('Location:index.php');
    }
    else{
        header('Location:registrarUsuario.php');

    }
?>