-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2025 a las 08:43:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `groundsound`
--
CREATE DATABASE IF NOT EXISTS `groundsound` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `groundsound`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_galeria`
--

CREATE TABLE `foto_galeria` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `fecha_subida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `foto_galeria`
--

INSERT INTO `foto_galeria` (`id`, `id_usuario`, `nombre`, `foto`, `fecha_subida`) VALUES
(1, 1, 'Foto de prueba', NULL, '2021-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_producto`
--

CREATE TABLE `foto_producto` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `foto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `foto_producto`
--

INSERT INTO `foto_producto` (`id`, `id_producto`, `nombre`, `foto`) VALUES
(1, 1, 'Foto de prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `detalles`, `precio`) VALUES
(1, 'Producto de prueba', 'Descripción de prueba', 'Detalles de prueba', 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido1` text DEFAULT NULL,
  `apellido2` text DEFAULT NULL,
  `correo_electronico` text DEFAULT NULL,
  `clave` text DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `codigo_postal` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `img_perfil` blob DEFAULT NULL,
  `rol` enum('admin','editor','usuario') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido1`, `apellido2`, `correo_electronico`, `clave`, `fecha_nac`, `pais`, `codigo_postal`, `telefono`, `img_perfil`, `rol`) VALUES
(1, 'Pepe', 'García', 'Pérez', 'pepe@gmail', '1234', '1990-01-01', 'España', '28001', '666666666', NULL, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id_producto`, `id_usuario`, `fecha`, `valoracion`, `comentario`) VALUES
(1, 1, '2021-01-01 00:00:00', 5, 'Comentario de prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foto_galeria`
--
ALTER TABLE `foto_galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_4` (`id_usuario`);

--
-- Indices de la tabla `foto_producto`
--
ALTER TABLE `foto_producto`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_3` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`) USING HASH;

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id_producto`,`id_usuario`,`fecha`),
  ADD KEY `fk_2` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foto_galeria`
--
ALTER TABLE `foto_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `foto_producto`
--
ALTER TABLE `foto_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foto_galeria`
--
ALTER TABLE `foto_galeria`
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `foto_producto`
--
ALTER TABLE `foto_producto`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
