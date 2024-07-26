<?php
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_final");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$id_producto = isset($_GET['id_producto']) ? intval($_GET['id_producto']) : 0;

if ($id_producto <= 0) {
    die("ID de producto inválido.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $stock = intval($_POST['stock']);
    $precio = floatval($_POST['precio']);
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $imagen_url = mysqli_real_escape_string($conexion, $_POST['imagen_url']);

    $query = "UPDATE productos 
              SET nombre_producto='$nombre', 
                  stock_producto=$stock, 
                  precio_producto=$precio, 
                  marca_producto='$marca',
                  imagen_url='$imagen_url' 
              WHERE id_producto=$id_producto";

    if (mysqli_query($conexion, $query)) {
        echo "<p class='text-success'>Producto actualizado correctamente.</p>";
    } else {
        echo "<p class='text-danger'>Error al actualizar el producto: " . mysqli_error($conexion) . "</p>";
    }
}


$query = "SELECT * FROM productos WHERE id_producto=$id_producto";
$resultado = mysqli_query($conexion, $query);
$producto = mysqli_fetch_assoc($resultado);

if (!$producto) {
    die("Producto no encontrado.");
}


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Producto</h2>
        <form action="editar_producto.php?id_producto=<?php echo $id_producto; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="<?php echo htmlspecialchars($producto['stock_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" class="form-control" step="0.01" value="<?php echo htmlspecialchars($producto['precio_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" class="form-control" value="<?php echo htmlspecialchars($producto['marca_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen_url">URL de Imagen:</label>
                <input type="text" id="imagen_url" name="imagen_url" class="form-control" value="<?php echo htmlspecialchars($producto['imagen_url']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
        <a href="admin_productos.php" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</body>
</html>
