<!DOCTYPE html>
<?php
    session_start();
   // var_dump($_SESSION);die;
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/cereal1.png">
    <title>Silos</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><?php echo"Bienvenido ",$_SESSION['nombreUsuario']?></li>
                <?php if($_SESSION['estado'] == "administrador")
                {
                    echo"<li><a href='tablaEmpleado.php'>Tabla Empleados</a></li>";
                    echo"<li><a href='registrarUsuario.php'>Registrar Usuario</a></li>";
                    echo"<li><a href='registrarSilo.php'>Registrar Silo</a></li>";

                }
                else{
                    echo"<li>Su silo es el numero</li> ",$_SESSION['idSilo'];
                    date_default_timezone_set('UTC');
                }
                ?>
                <li class='vuelta'>
                    <a href="tablaSilo.php">Tabla Silos</a>
                </li>
                <li class='vuelta'>
                    <a href="cerrarSesion.php">Cerrar Sesion</a>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    if($_SESSION['estado'] == "empleado")
        echo "<Form action='ingresarDatos.php' method='POST'>
        <h2 class='login'>Ingrese las mediciones correspondientes</h2>
            <div class='container'>
                <div class='formulario__grupo' id='grupo__Temperatura'>
                TEMPERATURA
                    <input type='number' class='form_input' name='Temperatura' placeholder='Temperatura'>
                </div>
                <div class='formulario__grupo' id='grupo__Humedad'>
                HUMEDAD
                    <input type='number' class='form_input' name='Humedad' placeholder='Humedad'>
                </div>
                <div class='formulario__grupo' id='grupo__Gas'>
                GAS
                <input type='number' class='form_input' name='Gas' placeholder='Gas'>
                </div>
                <button type='submit'>ENVIAR</button>
            </div>
    </Form>";
    ?>
</body>
</html>