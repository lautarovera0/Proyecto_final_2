<?php


$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_final");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        table {
            background-color: #ffffff;
        }
        thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-add {
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .btn-back {
            background-color: #6c757d;
            color: #ffffff;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Administración de Productos</h2>
        <a href="agregar_producto.php" class="btn btn-add mb-3">Agregar Nuevo Producto</a>
        <a href="index.php" class="btn btn-back mb-3">Volver a la tienda</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_producto'] . "</td>";
                        echo "<td>" . $row['nombre_producto'] . "</td>";
                        echo "<td>" . $row['stock_producto'] . "</td>";
                        echo "<td>$" . number_format($row['precio_producto'], 2) . "</td>";
                        echo "<td>" . $row['marca_producto'] . "</td>";
                        echo "<td>
                                <a href='editar_producto.php?id_producto=" . $row['id_producto'] . "' class='btn btn-edit btn-sm'>Editar</a>
                                <a href='eliminar_producto.php?id_producto=" . $row['id_producto'] . "' class='btn btn-delete btn-sm'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No hay productos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

