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
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<main>
		<form action="validarRegistro.php" method="POST" class="formulario" id="formulario">
			<!-- Grupo: Nombre-->
			<div class="formulario__grupo" id="grupo__Nombre">
				<label for="Nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre" id="Nombre" placeholder="ingrese su Nombre">
				</div>
				<p class="formulario__input-error">el usuario tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Apellido-->
			<div class="formulario__grupo" id="grupo__Apellido">
				<label for="Apellido" class="formulario__label">Apellido</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Apellido" id="Apellido" placeholder="ingrese su Apellido">
				</div>
				<p class="formulario__input-error">el Nombre tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>
			<!-- Grupo: password-->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password" placeholder="ingrese su Contraseña">
				</div>
				<p class="formulario__input-error">el usuario tiene que ser de 4 a 16 digitos.</p>
			</div>
			<!-- Grupo: password2-->
			<div class="formulario__grupo" id="grupo__password2">
			<label for="password2" class="formulario__label">Repita su contraseña</label>
			<div class="formulario__grupo-input">
				<input type="password" class="formulario__input" name="password2" id="password2" placeholder="Repita su contraseña">
				<i class="formulario__validacion-estado		fa-solid fa-circle-xmark"></i>
			</div>
			<p class="formulario__input-error">La contraseña deben ser iguales</p>
			</div>
			<!-- Grupo: DNI-->
			<div class="formulario__grupo" id="grupo__DNI">
				<label for="DNI" class="formulario__label">DNI</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="DNI" id="DNI" placeholder="45064339">
				</div>
				<p class="formulario__input-error">el DNI debe de contener solamente numeros. no letras, simbolos ni espacios.</p>
			</div>
			<!-- Grupo: Direccion-->
			<div class="formulario__grupo" id="grupo__Direccion">
				<label for="Direccion" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Direccion" id="Direccion" placeholder="14-9999">
				</div>
				<p class="formulario__input-error">La direccion debe contener solamente numeros y guion medio. no simbolos ,letras ni espacios.por ejemplo 22-2222</p>
			</div>
			<!-- Grupo: Telefono-->
			<div class="formulario__grupo" id="grupo__Telefono">
				<label for="Telefono" class="formulario__label">Telefono</label>
				<div class="formulario__grupo-input">
					<input type="numeric" class="formulario__input" name="Telefono" id="Telefono" placeholder="ingrese su Telefono">
				</div>
				<p class="formulario__input-error">el usuario tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p>error: porfavor rellene el formulario correctamente</p>
				
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
					<button type="submit" class="formulario__btn">ENVIAR</button>
					<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
					<button  class="formulario__btn"><a href="index.php">VOLVER AL HOME</a></button>
			</div>
		</form>
	</main>

	<script src="js/formulario.js"></script>
</body>
</html>