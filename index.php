<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>INICIO SESION</title>
	<link rel="stylesheet" href="estilos_login.css">

</head>
<body>
	<main>
		<nav>
		<h1>INICIO DE SESION</h1> 
		</nav>
		<form action="modelo.php" method="POST">
			<label for="correo">Correo electronico:</label>
			<input type="text" name="correo" required="falta de llenar este campo" ><br>
			<br>
			<br>
			<label for="password">Pasword:</label>
			<input type="password" name="password" required="falta de llenar este campo" ><br>
			<input type="hidden" name="operacion" value="iniciarsesion"><br>
			<br>
			<button type="submit">ingresar</button>
			<h4><a href="registro.php">registrarse</h4>
		</form>
	</main>
</body>
</html>
