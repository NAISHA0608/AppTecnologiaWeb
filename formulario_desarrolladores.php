<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Desarrolladores</title>
    <link rel="stylesheet" href="estilos_formulario.css">
</head>
<body>
    <h1>Información de Desarrolladores</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="nombre_institucion">Nombre de la Institución:</label>
            <input type="text" id="nombre_institucion" name="nombre_institucion" value="Escuela Superior Politécnica de Chimborazo" readonly>
        </div>
        <div class="form-group">
            <label for="pao">PAO:</label>
            <input type="number" id="pao" name="pao" value="5" readonly>
        </div>
        <div class="form-group">
            <label for="carrera">Carrera:</label>
            <input type="text" id="carrera" name="carrera" value="Tecnologías de la Información" readonly>
        </div>
        <div class="form-group">
            <label for="autores">Autores:</label>
            <textarea id="autores" name="autores" readonly>
                Jefferson Guaman
                Cosme Guerrero
                Naisha Ayoví
                Nathalia Cerda
                Jaime Cerda
            </textarea>
        </div>
        <div class="form-group">
            <label for="periodo_academico">Período Académico:</label>
            <input type="text" id="periodo_academico" name="periodo_academico" value="Octubre 2023 - Marzo 2024" readonly>
        </div>

        <!-- Botón "Volver al Carrito" -->
        <div class="boton-volver-carrito">
            <button type="submit" formaction="carrito.php">Volver al Carrito</button>
        </div>
    </form>
</body>
</html>
