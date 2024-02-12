<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administración</title>
    <link rel="stylesheet" href="estilos_admin.css">
</head>
<body>
    <h1>Panel de administración</h1>

    <!-- Botón para administrar categorías -->
    <h2>Administrar Categorías</h2>
    <form action="admin_categorias.php" method="post">
        <button type="submit">Ir a Categorías</button>
    </form>

    <!-- Botón para administrar productos -->
    <h2>Administrar Productos</h2>
    <form action="admin_productos.php" method="post">
        <button type="submit">Ir a Productos</button>
    </form>

    <!-- Botón para volver al carrito -->
    <h2>Volver al carrito</h2>
    <form action="carrito.php" method="post">
        <button type="submit">Volver al carrito</button>
    </form>

    <!-- Botón para cerrar sesión -->
    <h2>Cerrar Sesión</h2>
    <form action="index.php" method="post">
        <button type="submit" class="cerrar-sesion-button">Cerrar Sesión</button>
    </form>

    <br>
   
    <!-- Script para simular el cierre de sesión -->
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








