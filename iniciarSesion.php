<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>iniciar Sesion</title>
</head>
<body>
<form action="validarSesion.php" method="POST">
        <h2 class="login">Loguearse</h2>
        <div class="container">
            <div class="grupo">
                <label class="form_label" >Nombre</label>
                <input type="text" name="usuario" required class="form_input">
            </div>

            <div class="grupo">
                <label class="form_label">Contraseña</label>
                <input type="password" name="password" required class="form_input">
            </div>
                <button type="submit">Enviar</button>
         </div>
    </form>
</body>
</html>