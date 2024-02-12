<?php
session_start();

// Incluir el archivo que contiene la clase Producto
include_once('Producto.php');

// Crear una instancia de la clase Producto
$producto = new Producto(new ConexionBD());

// Obtener todos los productos disponibles
$productos = $producto->listarProductos();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Obtener los productos en el carrito
$productosEnCarrito = array();
$total = 0;
foreach ($_SESSION['carrito'] as $idProducto) {
    // Obtener información del producto por su ID
    $productoEnCarrito = $producto->obtenerProductoPorId($idProducto);
    if ($productoEnCarrito) {
        $productosEnCarrito[] = $productoEnCarrito;
        $total += $productoEnCarrito['precio'];
    }
}

// Verificar si el total supera los $2000 y aplicar el descuento si es necesario
if ($total > 2000) {
    $descuento = $total * 0.20; // Calcular el descuento del 20%
    $totalConDescuento = $total - $descuento;
}

// Verificar si se ha enviado un ID de producto para eliminar del carrito
if (isset($_POST['eliminar_id'])) {
    $idEliminar = $_POST['eliminar_id'];
    // Buscar el índice del producto en el carrito
    $indiceEliminar = array_search($idEliminar, $_SESSION['carrito']);
    // Eliminar el producto del carrito
    if ($indiceEliminar !== false) {
        unset($_SESSION['carrito'][$indiceEliminar]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="estilos_carrito.css">
</head>
<body>
    <h1>Carrito de Compras</h1>

    <div class="botones-container">
        <form action="admin.php" method="post">
            <button type="submit" class="administrar-carrito-button">Administrar carrito</button><br>
        </form>
        <form action="formulario_desarrolladores.php" method="post">
            <button type="submit" class="desarrolladores-button">Desarrolladores</button><br>
        </form>
        <form action="index.php" method="post">
            <button type="submit" class="cerrar-sesion-button">Cerrar sesión</button>
        </form>
    </div>


    <!-- Tabla para mostrar los productos disponibles -->
    <h2>Productos Disponibles</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acción</th>
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
                    <form action="agregar_al_carrito.php" method="post">
                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                        <button type="submit">Agregar al carrito</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Tabla para mostrar los productos en el carrito -->
    <h2>Productos en el Carrito</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productosEnCarrito as $producto): ?>
            <tr>
                <td><?php echo $producto['id_producto']; ?></td>
                <td><?php echo $producto['nombre_producto']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['nombre_categoria']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="eliminar_id" value="<?php echo $producto['id_producto']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Mostrar el precio total -->
    <p>Total: <?php echo $total; ?></p>
    <!-- Mostrar el descuento si corresponde -->
    <?php if (isset($descuento)): ?>
        <p>Su compra supera los $2000, se le ha aplicado un descuento del 20% ($<?php echo $descuento; ?>).</p>
        <p>Total con descuento: $<?php echo $totalConDescuento; ?></p>
    <?php endif; ?>

    <script>
    document.querySelector('.cerrar-sesion-button').addEventListener('click', function() {
        alert('Cerrando sesión...');
        setTimeout(function() {
            window.location.href = 'index.php'; // Redirecciona al inicio de sesión
        }, 2000); // Espera 2 segundos antes de redireccionar
    });
    </script>


</body>
</html>



