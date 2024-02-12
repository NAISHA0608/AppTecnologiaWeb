<?php
session_start();

// Incluir el archivo que contiene la clase Categoria
include_once('Categoria.php');

// Crear una instancia de la conexión a la base de datos
$conexion = new ConexionBD();

// Crear una instancia de la clase Categoria
$categoria = new Categoria($conexion);

// Obtener todas las categorías
$categorias = $categoria->listarCategorias();

// Variable para almacenar los datos de la categoría a editar
$categoriaEditar = null;

// Verificar si se ha enviado un ID de categoría para editar
if (isset($_POST['editar_categoria'])) {
    $idCategoriaEditar = $_POST['id_categoria'];
    $categoriaEditar = $categoria->obtenerCategoriaPorId($idCategoriaEditar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Categorías</title>
    <link rel="stylesheet" href="estilos_admin_categorias.css">
</head>
<body>
    <h1>Administración de Categorías</h1>

    <!-- Formulario para agregar categoría -->
    <h2>Agregar Categoría</h2>
    <form action="procesar_categoria.php" method="post">
        <input type="text" name="nombre_categoria" placeholder="Nombre de la categoría">
        <button type="submit" name="agregar_categoria">Agregar</button>
    </form>

    <!-- Tabla para mostrar las categorías -->
    <h2>Lista de Categorías</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?php echo $categoria['id_categoria']; ?></td>
                <td><?php echo $categoria['nombre_categoria']; ?></td>
                <td>
                    <!-- Botones para editar y eliminar categoría -->
                    <form action="admin_categorias.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
                        <button type="submit" name="editar_categoria">Editar</button>
                    </form>
                    <form action="procesar_categoria.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
                        <button type="submit" name="eliminar_categoria">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para editar categoría -->
    <?php if ($categoriaEditar): ?>
    <h2>Editar Categoría</h2>
    <form action="procesar_categoria.php" method="post">
        <input type="hidden" name="id_categoria" value="<?php echo $categoriaEditar['id_categoria']; ?>">
        <input type="text" name="nombre_categoria" placeholder="Nombre de la categoría" value="<?php echo $categoriaEditar['nombre_categoria']; ?>">
        <button type="submit" name="editar_categoria">Actualizar</button>
    </form>
    <?php endif; ?><br><br><br>


    <!-- Botón para volver al panel -->
    
    <form action="admin.php" method="post">
        <button type="submit">volver al panel</button>
    </form>

    <!-- <br> -->
    <!-- <a href="cerrar_sesion.php">Cerrar Sesión</a> -->
</body>
</html>
