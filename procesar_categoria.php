<?php
session_start();

include('Categoria.php');

$conexion = new ConexionBD();
$categoria = new Categoria($conexion);

if (isset($_POST['agregar_categoria'])) {
    // Verificar si se ha proporcionado un nombre de categoría
    if (!empty($_POST['nombre_categoria'])) {
        $nombreCategoria = $_POST['nombre_categoria'];
        $categoria->agregarCategoria($nombreCategoria);
    }
    // Redirigir a la página de administración después de agregar la categoría
    header("Location: admin_categorias.php");
    exit();
}

if (isset($_POST['editar_categoria'])) {
    // Verificar si se ha proporcionado un nombre de categoría y un ID de categoría
    if (!empty($_POST['nombre_categoria']) && !empty($_POST['id_categoria'])) {
        $nombreCategoria = $_POST['nombre_categoria'];
        $idCategoria = $_POST['id_categoria'];
        $categoria->editarCategoria($idCategoria, $nombreCategoria);
    }
    // Redirigir a la página de administración después de editar la categoría
    header("Location: admin_categorias.php");
    exit();
}

if (isset($_POST['eliminar_categoria'])) {
    // Verificar si se ha proporcionado un ID de categoría
    if (!empty($_POST['id_categoria'])) {
        $idCategoria = $_POST['id_categoria'];
        $categoria->eliminarCategoria($idCategoria);
    }
    // Redirigir a la página de administración después de eliminar la categoría
    header("Location: admin_categorias.php");
    exit();
}
?>

