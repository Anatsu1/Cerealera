<!DOCTYPE html>
<?php
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
    $tablaNormal = TRUE;
    $consultaArmada = FALSE;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tablasilo.css">
    <title>Tabla Silo</title>
</head>
<body>
    <?php
    include("conexion.php");
    if (isset($_POST['porsilo'])){
        $numerosilo = $_POST['numerosilo'];
        if($numerosilo != "todos"){
            $tablaNormal = FALSE;
            $idSilo = $_POST['numerosilo'];
            $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado WHERE silos.idSilo='$idSilo';";
            $resultado = mysqli_query($conexion,$consulta);
            echo "<div class='tabla'><div class='fila'><div class='columna'>Usuario</div><div class='columna'>idSilo</div><div class='columna'>idSiloEmpleado</div><div class='columna'>idRegistro</div><div class='columna'>Fecha</div><div class='columna'>Temperatura</div><div class='columna'>Humedad</div><div class='columna'>Gas</div></div>";
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<div class='fila'><div class='columna'>".$fila['nombre']."</div>";
                echo "<div class='columna'>".$fila['idSilo']. "</div>";
                echo "<div class='columna'>".$fila['idSiloEmpleado']. "</div>";
                echo "<div class='columna'>".$fila['idRegistro']. "</div>";
                echo "<div class='columna'>".$fila['fecha']. "</div>";
                echo "<div class='columna'>".$fila['temperatura']. "</div>";
                echo "<div class='columna'>".$fila['humedad']. "</div>";
                echo "<div class='columna'>".$fila['gas']. "</div></div>";
            }
        }
    }
    elseif(isset($_POST['fecha'])){
            $desde = $_POST['desde'];
            $hasta = $_POST['hasta'];
            $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado WHERE fecha BETWEEN '$desde' AND '$hasta';";
            $consultaArmada = TRUE;
    }
    elseif(isset($_POST['promedio'])){
        if($_POST['opcion'] != "definir"){
        $contador = 0;
        $acumuladoropcion = 0;
        $promopcion = 0;
        $opcion = $_POST['opcion'];
        $consultaprom = "SELECT * FROM registro";
        $resultadoprom = mysqli_query($conexion,$consultaprom);
        while ($fila = mysqli_fetch_array($resultadoprom))
        {
            $acumuladoropcion = $acumuladoropcion + $fila[$opcion];
            $contador = $contador + 1;
        }
        $promopcion = $acumuladoropcion / $contador;
        echo '<script>alert("',$opcion,' promedio es de: ',$promopcion,'");</script>';
        }
        else{
            echo '<script>alert("Seleccione una opcion en la lista de Opciones");</script>';
        }
    }
    elseif(isset($_POST['maximo'])){
        if($_POST['opcion'] != "definir"){
        $maxopcion = 0;
        $tablaNormal = FALSE;
        $opcion = $_POST['opcion'];
        $consultamax = "SELECT * FROM registro";
        $resultadomax = mysqli_query($conexion,$consultamax);
        while ($fila = mysqli_fetch_array($resultadomax))
        {
            if($maxopcion < $fila[$opcion]){
                $maxopcion = $fila[$opcion];
            }
        }
        $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado WHERE $opcion = $maxopcion";
        $resultado = mysqli_query($conexion,$consulta);
        echo "<div class='tabla'><div class='fila2'><div class='columna'>ID registro</div><div class='columna'>Nombre</div><div class='columna'>idSilo</div><div class='columna'>ID SiloEmpleados</div><div class='columna'>Fecha</div><div class='columna'>",$opcion,"</div></div>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<div class='fila2'><div class='columna2'>".$fila['idRegistro']."</div>";
            echo "<div class='columna2'>".$fila['nombre']. "</div>";
            echo "<div class='columna'>".$fila['idSilo']. "</div>";
            echo "<div class='columna'>".$fila['idSiloEmpleado']. "</div>";
            echo "<div class='columna2'>".$fila['fecha']. "</div>";
            echo "<div class='columna2'>".$fila[$opcion]. "</div></div>";
        }   
    }
        else{
            echo '<script>alert("Seleccione una opcion en la lista de Opciones");</script>';
        }
    }
    elseif(isset($_POST['minimo'])){
        if($_POST['opcion'] != "definir"){
        $minopcion = 1000;
        $tablaNormal = FALSE;
        $opcion = $_POST['opcion'];
        $consultamin = "SELECT * FROM registro";
        $resultadomin = mysqli_query($conexion,$consultamin);
        while ($fila = mysqli_fetch_array($resultadomin))
        {
            if($minopcion > $fila[$opcion]){
                $minopcion = $fila[$opcion];
            }

        }
        $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado WHERE $opcion = $minopcion";
        $resultado = mysqli_query($conexion,$consulta);
        echo "<div class='tabla'><div class='fila2'><div class='columna'>ID registro</div><div class='columna'>Nombre</div><div class='columna'>idSilo</div><div class='columna'>ID SiloEmpleados</div><div class='columna'>Fecha</div><div class='columna'>",$opcion,"</div></div>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<div class='fila2'><div class='columna2'>".$fila['idRegistro']."</div>";
            echo "<div class='columna2'>".$fila['nombre']. "</div>";
            echo "<div class='columna'>".$fila['idSilo']. "</div>";
            echo "<div class='columna'>".$fila['idSiloEmpleado']. "</div>";
            echo "<div class='columna2'>".$fila['fecha']. "</div>";
            echo "<div class='columna2'>".$fila[$opcion]. "</div></div>";
        }      
        }
        else{
            echo '<script>alert("Seleccione una opcion en la lista de Opciones");</script>';
        }
    }
    elseif(isset($_POST['reset'])){
        header("Location:tablaSilo.php");
    }
    if($tablaNormal == TRUE){
        if ($consultaArmada == FALSE)
        {
            if($_SESSION['estado'] == "administrador"){
                $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado;";
            }

            else{
                $idSiloEmpleado = $_SESSION['idSiloEmpleado'];
                $consulta = "SELECT empleados.nombre, silos.idSilo, registro.*, siloempleado.idSiloEmpleado FROM siloempleado JOIN empleados ON empleados.idEmpleado = siloempleado.idEmpleado JOIN silos ON silos.idSilo = siloempleado.idSilo JOIN registro ON registro.idSiloEmpleado= siloempleado.idSiloEmpleado WHERE siloempleado.idSiloEmpleado = '$idSiloEmpleado';";
            }
        }
        $resultado = mysqli_query($conexion,$consulta);
        echo "<div class='tabla'><div class='fila'><div class='columna'>Usuario</div><div class='columna'>idSilo</div><div class='columna'>idSiloEmpleado</div><div class='columna'>idRegistro</div><div class='columna'>Fecha</div><div class='columna'>Temperatura</div><div class='columna'>Humedad</div><div class='columna'>Gas</div></div>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<div class='fila'><div class='columna'>".$fila['nombre']."</div>";
            echo "<div class='columna'>".$fila['idSilo']. "</div>";
            echo "<div class='columna'>".$fila['idSiloEmpleado']. "</div>";
            echo "<div class='columna'>".$fila['idRegistro']. "</div>";
            echo "<div class='columna'>".$fila['fecha']. "</div>";
            echo "<div class='columna'>".$fila['temperatura']. "</div>";
            echo "<div class='columna'>".$fila['humedad']. "</div>";
            echo "<div class='columna'>".$fila['gas']. "</div></div>";
        }
        echo "</div><br>";
    }
?>
<?php
    if ($_SESSION['estado'] == "administrador"){
    echo"<form action='tablaSilo.php' method='POST'>
        <div class='flitro_todos'>
            <label>Filtrar por numero de Silo <select name='numerosilo'>
            <option value='todos'>Todos</option>
            
        </div>";
            $consultasilo = "SELECT idSilo FROM siloempleado WHERE fecha_desasignado IS NULL";
            $resultadosilo = mysqli_query($conexion,$consultasilo);
            while ($fila = mysqli_fetch_array($resultadosilo))
            {   
                $idSilo = $fila["idSilo"];
                echo"<option value='$idSilo'>$idSilo</option>";
            }
        echo "  
        </select></label><br>
        <input type='submit' value='SILOS' name='porsilo' class='botones'>
        <br><br>
        <div class='filtrar_fechas'>
            <label>Filtrar por fechas DESDE</label><input type='date' name='desde'><br>
            <label>Filtrar por fechas HASTA</label><input type='date' name='hasta'><br>
            <input type='submit' value='FECHAS' name='fecha' class='botones'>
        </div>
        <br><br>
        <div class='filtrar_opciones'>
            <label>Quiere filtrar por</label>
            <select name='opcion'>
            <option value='definir'>Opciones</option>
            <option value='temperatura'>Temperatura</option>
            <option value='humedad'>Humedad</option>
            <option value='gas'>Gas</option></select>  
        </div> 
        <div class='filtrar_maximo-minimo'>
            <input type='submit' value='Maximo' name='maximo' class='botones'><br>
            <input type='submit' value='Minimo' name='minimo' class='botones'><br><br>
            <label>Filtrar Promedio General</label><input type='submit' value='Promedio' name='promedio' class='botones'>
        </div>
        <input type='submit' value='RESET' name='reset' class='botones'>
        <br>
    </form>";}
    ?>
        <a href='index.php' class='vuelta'>Volver a Home</a>
        <a href='cerrarSesion.php' class='vuelta'>Cerrar Sesion</a>
</body>
</html>    