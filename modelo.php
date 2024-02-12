<?php
include('usuario.php');
$conexion = new ConexionBD();
$usuario = new Usuario($conexion);

if (!empty($_POST["operacion"])) {
	$operacion=$_POST['operacion'];
	if($operacion=="registro"){
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];
	$password=$_POST['password'];
	$usuario->setNombre($nombre);
	$usuario->setCorreo($correo);
	$usuario->setPassword($password);
	$usuario->registroUsuario();
	header('Location: index.php');
	}elseif ($operacion=="iniciarsesion") {
	$correo=$_POST['correo'];
	$password=$_POST['password'];
	$usuario->setCorreo($correo);
	$usuario->setPassword($password);
	$usuario->iniciarSesion();
	}
}


?>  