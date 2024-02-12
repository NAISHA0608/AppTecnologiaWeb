<?php
session_start();

// Incluir el archivo que contiene la clase Categoria y Producto
include_once('Categoria.php');
include_once('Producto.php');

// Crear una instancia de la conexión a la base de datos
$conexion = new ConexionBD();

// Crear una instancia de la clase Categoria
$categoria = new Categoria($conexion);
// Obtener todas las categorías
$categorias = $categoria->listarCategorias();

// Crear una instancia de la clase Producto
$producto = new Producto($conexion);

// Obtener todos los productos
$productos = $producto->listarProductos();

// Variable para almacenar los datos del producto a editar
$productoEditar = null;

// Verificar si se ha enviado un ID de producto para editar
if (isset($_POST['editar_producto'])) {
    $idProductoEditar = $_POST['id_producto'];
    $productoEditar = $producto->obtenerProductoPorId($idProductoEditar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>
    <link rel="stylesheet" href="estilos_admin_productos.css">
</head>
<body>
    <h1>Administración de Productos</h1>

    <!-- Formulario para agregar producto -->
    <h2>Agregar Producto</h2>
    <form action="procesar_producto.php" method="post">
        <input type="text" name="nombre_producto" placeholder="Nombre del producto">
        <input type="text" name="descripcion" placeholder="Descripción">
        <input type="number" name="precio" placeholder="Precio">
        <select name="id_categoria">
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="agregar_producto">Agregar</button>
    </form>

    <!-- Tabla para mostrar los productos -->
    <h2>Lista de Productos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id_producto']; ?></td>
                <td><?php echo $producto['nombre_producto']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['nombre_categoria']; ?></td>
                <td>
                    <!-- Botones para editar y eliminar producto -->
                    <form action="admin_productos.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                        <button type="submit" name="editar_producto">Editar</button>
                    </form>
                    <form action="procesar_producto.php" method="post" style="display: inline-block;">
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                        <button type="submit" name="eliminar_producto">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para editar producto -->
    <?php if ($productoEditar): ?>
    <h2>Editar Producto</h2>
    <form action="procesar_producto.php" method="post">
        <input type="hidden" name="id_producto" value="<?php echo $productoEditar['id_producto']; ?>">
        <input type="text" name="nombre_producto" placeholder="Nombre del producto" value="<?php echo $productoEditar['nombre_producto']; ?>">
        <input type="text" name="descripcion" placeholder="Descripción" value="<?php echo $productoEditar['descripcion']; ?>">
        <input type="number" name="precio" placeholder="Precio" value="<?php echo $productoEditar['precio']; ?>">
        <select name="id_categoria">
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id_categoria']; ?>" <?php if ($categoria['id_categoria'] == $productoEditar['id_categoria']) echo 'selected'; ?>><?php echo $categoria['nombre_categoria']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="editar_producto">Actualizar</button>
    </form>
    <?php endif; ?>

    <!-- Botón para volver al panel de administración -->
    <br><br><br>
    <form action="admin.php" method="post">
        <button type="submit">Volver al Panel</button>
    </form>

    <!-- <br> -->
    <!-- <a href="cerrar_sesion.php">Cerrar Sesión</a> -->
</body>
</html>

