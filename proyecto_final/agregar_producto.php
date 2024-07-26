<?php

$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_final");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $stock = intval($_POST['stock']);
    $precio = floatval($_POST['precio']);
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $imagen_url = mysqli_real_escape_string($conexion, $_POST['imagen_url']);

    $query = "INSERT INTO productos (nombre_producto, stock_producto, precio_producto, marca_producto, imagen_url)
              VALUES ('$nombre', $stock, $precio, '$marca', '$imagen_url')";
    if (mysqli_query($conexion, $query)) {
        echo "<p class='text-success'>Producto agregado correctamente.</p>";
    } else {
        echo "<p class='text-danger'>Error al agregar el producto: " . mysqli_error($conexion) . "</p>";
    }
}


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Agregar Producto</h2>
        <form action="agregar_producto.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen_url">URL de Imagen:</label>
                <input type="text" id="imagen_url" name="imagen_url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
        <a href="admin_productos.php" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</body>
</html>
