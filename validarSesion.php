<?php
include("conexion.php");
$nom_usuario = mysqli_real_escape_string($conexion,$_POST["usuario"]);
$contra =mysqli_real_escape_string($conexion,$_POST["password"]);
$consulta = "SELECT * FROM empleados WHERE nombre='$nom_usuario' and contra='$contra' and estado = 'empleado' or nombre='$nom_usuario' and contra='$contra' and estado = 'administrador'";
$resultado = mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
    $fila=mysqli_fetch_assoc($resultado);
    session_start();
    $id = $fila['idEmpleado'];
    $_SESSION['idUsuario'] = $id;
    $_SESSION['nombreUsuario'] = $fila['nombre'];
    $_SESSION['estado'] = $fila['estado'];
    $consulta = "SELECT * FROM siloempleado WHERE  idEmpleado = '$id' AND fecha_desasignado IS NULL";
    $resultado = mysqli_query($conexion,$consulta);
    $fila=mysqli_fetch_assoc($resultado);
    $_SESSION['idSilo'] = $fila['idSilo'];
    $_SESSION['idSiloEmpleado'] = $fila['idSiloEmpleado'];
    header("location:index.php");
}
else{
    header("location:iniciarSesion.php");
}
?>
