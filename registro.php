<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro de Usuarios </title>
	<link rel="stylesheet" href="estilos_registro.css">
</head>
<body>
	<main>
		<nav>
		<h1>REGISTRO</h1> 
		</nav>
		<form action="modelo.php" method="POST">
			<label for="email">Nombre:</label>
			<input type="text" name="nombre" required="falta de llenar este campo"><br>
			<br>
			<label for="correo">Correo electronico:</label>
			<input type="e-mail" name="correo" required="falta de llenar este campo" ><br>
			<br>
			<br>
			<label for="password">Pasword:</label>
			<input type="password" name="password" required="falta de llenar este campo"><br>
			<input type="hidden" name="operacion" value="registro"><br>
			<br>
			<button type="submit">Enviar datos</button>
			<h4><a href="index.php">Regresar al Login</h4>
		</form>
	</main>
</body>
</html>
