<?php
session_start();

// Incluir el archivo que contiene la clase Producto
include_once('Producto.php');

// Crear una instancia de la conexión a la base de datos
$conexion = new ConexionBD();
$producto = new Producto($conexion);

if (isset($_POST['agregar_producto'])) {
    // Verificar si se han proporcionado todos los datos del producto
    if (!empty($_POST['nombre_producto']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['id_categoria'])) {
        $nombreProducto = $_POST['nombre_producto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $idCategoria = $_POST['id_categoria'];
        $producto->agregarProducto($nombreProducto, $descripcion, $precio, $idCategoria);
    }
    // Redirigir a la página de administración después de agregar el producto
    header("Location: admin_productos.php");
    exit();
}

if (isset($_POST['editar_producto'])) {
    // Verificar si se han proporcionado todos los datos del producto y su ID correspondiente
    if (!empty($_POST['nombre_producto']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['id_categoria']) && !empty($_POST['id_producto'])) {
        $idProducto = $_POST['id_producto'];
        $nombreProducto = $_POST['nombre_producto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $idCategoria = $_POST['id_categoria'];
        $producto->editarProducto($idProducto, $nombreProducto, $descripcion, $precio, $idCategoria);
    }
    // Redirigir a la página de administración después de editar el producto
    header("Location: admin_productos.php");
    exit();
}

if (isset($_POST['eliminar_producto'])) {
    // Verificar si se ha proporcionado un ID de producto
    if (!empty($_POST['id_producto'])) {
        $idProducto = $_POST['id_producto'];
        $producto->eliminarProducto($idProducto);
    }
    // Redirigir a la página de administración después de eliminar el producto
    header("Location: admin_productos.php");
    exit();
}
?>

