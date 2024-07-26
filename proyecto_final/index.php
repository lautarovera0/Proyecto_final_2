<?php

$conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_final");


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notebooks Rio Gallegos</title>
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
        .product-card {
            border: 1px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .product-card-body {
            padding: 15px;
        }
        .btn-buy {
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-buy:hover {
            background-color: #218838;
        }
        .btn-admin {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-admin:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Notebooks Rio Gallegos</h1>
        <a href="login.php" class="btn btn-admin mb-3 float-right">Administración</a>
        <div class="row">
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='product-card'>";
                    echo "<img src='" . htmlspecialchars($row['imagen_url']) . "' alt='" . htmlspecialchars($row['nombre_producto']) . "'>";
                    echo "<div class='product-card-body'>";
                    echo "<h5>" . htmlspecialchars($row['nombre_producto']) . "</h5>";
                    echo "<p>Stock: " . htmlspecialchars($row['stock_producto']) . "</p>";
                    echo "<p>Precio: $" . number_format($row['precio_producto'], 2) . "</p>";
                    echo "<p>Marca: " . htmlspecialchars($row['marca_producto']) . "</p>";
                    echo "<a href='#' class='btn btn-buy btn-block'>Comprar</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='col-12 text-center'>No hay productos disponibles.</div>";
            }

            
            mysqli_close($conexion);
            ?>
        </div>
    </div>
</body>
</html>
