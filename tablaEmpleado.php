<!DOCTYPE html>
<?php
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
    elseif($_SESSION['estado'] != "administrador")
    {
        header("Location:iniciarSesion.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla.css">
    <title>Tabla Empleado</title>
</head>
<body>
    <?php
        include("conexion.php");
        $consulta = "SELECT * FROM empleados";
        $resultado = mysqli_query($conexion,$consulta);
        echo "<div class='titulo'>LISTADO DE EMPLEADOS</div>";
        echo "<div class='tabla'><div class='fila'><div class='columna'>ID Empleado:</div><div class='columna'>Nombre:</div><div class='columna'>Apellido:</div><div class='columna'>DNI:</div><div class='columna'>Telefono:</div><div class='columna'>Direccion:</div><div class='columna'>Estado:</div><div class='columna'>EDITAR:</div><div class='columna'>Silo A cargo:</div></div>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<div class='fila'><div class='columna'>".$fila['idEmpleado']. "</div>";
            echo "<div class='columna'>".$fila['nombre']. "</div>";
            echo "<div class='columna'>".$fila['apellido']. "</div>"; 
            echo "<div class='columna'>".$fila['dni']. "</div>"; 
            echo "<div class='columna'>".$fila['telefono']. "</div>"; 
            echo "<div class='columna'>".$fila['direccion']. "</div>"; 
            echo "<div class='columna'>".$fila['estado']. "</div>"; 
            echo "<div class='columna'><a href='editarUsuario.php?id=".$fila['idEmpleado']."'><img src='img/pencil.svg' style='width:30px'></a></div>";
            if($fila['estado'] != "administrador" && $fila['estado'] != "inactivo"){
                $idEmpleado = $fila['idEmpleado'];
                $consultaSilo = "SELECT idSilo FROM siloempleado WHERE idEmpleado = $idEmpleado";
                $resultadoSilo = mysqli_query($conexion,$consultaSilo);
                $idSilo = mysqli_fetch_array($resultadoSilo);
                echo "<div class='columna'>".$idSilo['idSilo']. "</div></div>";  
            }
            else{
                echo "<div class='columna'> silo no asignado</div></div>"; 
            }
        }
            echo "</div><br>";
            echo "<a href='vincularSiloEmpleado.php' class='vuelta'>Vincular Silo empleados</a>";
            echo "<a href='desvincularSiloEmpleado.php' class='vuelta'>Desvincular Silo empleados</a>";
            echo "<a href='index.php' class='vuelta'>Volver a Home</a>";
            echo "<a href='cerrarSesion.php' class='vuelta'>Cerrar Sesion</a>";
        ?>
</body>
</html>