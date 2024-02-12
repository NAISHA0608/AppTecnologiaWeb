<?php
session_start();

// Obtener el ID del producto a agregar al carrito
$idProducto = $_POST['id_producto'];

// Agregar el ID del producto al carrito (simplemente lo almacenamos en una sesión por simplicidad)
$_SESSION['carrito'][] = $idProducto;

// Redirigir de vuelta a la página del carrito
header("Location: carrito.php");
exit();
?>
