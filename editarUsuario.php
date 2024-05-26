<?php
session_start();
if(empty($_SESSION['nombreUsuario'])){
    header("Location:index.php");
}
else{
    if($_SESSION['estado'] != "administrador")
    {
        header("Location:index.php");
    }
}
include('conexion.php');
if(isset($_POST['update'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $contra = $_POST['contra'];
    $id = $_POST['id'];
    $sql = "UPDATE empleados SET nombre='{$nombre}',apellido='{$apellido}',dni='{$dni}',telefono='{$telefono}',direccion='{$direccion}',contra='{$contra}' WHERE idEmpleado=" . $_POST['id'];
    if($conexion->query($sql) === TRUE){
        echo "<script>alert('Usuario actualizado con exito');</script>";
        $sql = "SELECT * FROM empleados WHERE idEmpleado={$id}";
        $result = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_assoc($result);
    }
}   
else{
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $sql = "SELECT * FROM empleados WHERE idEmpleado={$id}";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="css/editar.css">
    <title>Editar usuario</title>
</head>
<body>
    <section>
        <form action='editarUsuario.php' method='POST'>
            <h1 class="titular">Editar usuario</h1><br>
            <input type='hidden' name="id" value="<?php echo $id; ?>">
            <input type='hidden' name="update" value="TRUE">
            <label>NOMBRE</label><br><input type='text' placeholder='NOMBRE' name='nombre' value="<?php echo $row["nombre"]; ?>" required><br>
            <label>APELLIDO</label><br><input type='text' placeholder='APELLIDO' name='apellido' value="<?php echo $row["apellido"]; ?>" required><br>
            <label>DNI</label><br><input type='text' placeholder='DNI' name='dni' value="<?php echo $row["dni"]; ?>" required><br>
            <label>TELEFONO</label><br><input type='text' placeholder='TELEFONO' name='telefono' value="<?php echo $row["telefono"]; ?>" required><br>
            <label>DIRECCION</label><br><input type='text' placeholder='DIRECCION' name='direccion' value="<?php echo $row["direccion"]; ?>" required><br>
            <label>CONTRASEÑA</label><br><input type='text' placeholder='CONTRASEÑA' name='contra'  value="<?php echo $row["contra"]; ?>" required><br><br>
            <input type='submit' class="vuelta" name='btn_enviar' value='ENVIAR'><br><br>
            <a href='tablaEmpleado.php' >Volver</a>

        </form>
    </section>
    <footer>
</body>
</html>
