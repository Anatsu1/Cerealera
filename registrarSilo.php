<!DOCTYPE html>
<?php
    session_start();
    if(empty($_SESSION['nombreUsuario'])){
    header("Location:iniciarSesion.php");
    }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>registrar usuario</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/registrarsilo.css">
</head>
<body>
	<main>
		<form action="validarSilo.php" method="POST" class="formulario" id="formulario">
			<label>Ingrese la capacidad</label><input type="number" name="capacidad">
			<br><br>
			<input type="submit" value="ENVIAR" class="vuelta">
			<br>
			<a href="index.php" class="vuelta">VOLVER</a>

		</form>
	</main>
	<script src="js/formulario.js"></script>
</body>
</html>