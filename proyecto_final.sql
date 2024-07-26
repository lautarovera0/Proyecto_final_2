-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2024 a las 00:19:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(500) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `precio_producto` decimal(10,0) NOT NULL,
  `marca_producto` varchar(500) NOT NULL,
  `imagen_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `stock_producto`, `precio_producto`, `marca_producto`, `imagen_url`) VALUES
(1, 'NOTEBOOK GAMER', 1, '1500000', 'ASUS', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWscqZ45_R4W607Qs1v-EMOTikvWMcer0l6g&s'),
(2, 'NOTEBOOK OFFICE', 2, '700000', 'SAMSUNG', 'https://samsungar.vtexassets.com/arquivos/ids/188933-800-auto?width=800&height=auto&aspect=true'),
(5, 'MACBOOK', 1, '2000000', 'APPLE', 'https://d2ihpvt6nd5q28.cloudfront.net/wp-content/uploads/2022/08/mbp-spacegray-gallery1-202206.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
