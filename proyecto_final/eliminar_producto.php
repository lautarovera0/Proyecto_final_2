<?php
$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_final");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$id_producto = isset($_GET['id_producto']) ? intval($_GET['id_producto']) : 0;

if ($id_producto <= 0) {
    die("ID de producto inválido.");
}

$query = "DELETE FROM productos WHERE id_producto=$id_producto";
if (mysqli_query($conexion, $query)) {
    echo "<p class='text-success'>Producto eliminado correctamente.</p>";
} else {
    echo "<p class='text-danger'>Error al eliminar el producto: " . mysqli_error($conexion) . "</p>";
}


mysqli_close($conexion);


header("Location: admin_productos.php");
exit();
?>
