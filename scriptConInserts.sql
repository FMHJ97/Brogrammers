-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2025 a las 19:40:00
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `imagen` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `categoria` enum('ropa','accesorio','musica') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `imagen`, `descripcion`, `precio`, `categoria`) VALUES
(1, 'Camiseta Blanca GroundSound (Black Logo)', 'camiseta_blanca_01.png', 'Descripción de prueba', 14.00, 'ropa'),
(2, 'Camiseta Negra GroundSound (Neon Logo)', 'camiseta_negra_02.png', 'asd', 16.00, 'ropa'),
(3, 'Mechero Zippo de Gasolina (Recargable)', 'mechero.png', 'asd', 15.00, 'accesorio'),
(4, 'GroundSound Festival 2024 (Vinilo - Disco)', 'vinilo_groundsound_2024.png', 'asd', 32.80, 'musica'),
(5, 'Camiseta Negra GroundSound (Trinity Logo)', 'camiseta_negra_03.png', 'asd', 22.00, 'ropa'),
(6, 'GroundSound Festival 2023 (Vinilo - Disco)', 'vinilo_groundsound_2023.png', 'asd', 28.40, 'musica'),
(7, 'Camiseta GroundSound Blanca (Neon Logo)', 'camiseta_blanca_02.png', 'asd', 12.00, 'ropa'),
(8, 'Gorra GroundSound (Golden Dream)', 'gorra.png', 'asd', 18.50, 'accesorio'),
(9, 'Camiseta Negra GroundSound (White Logo)', 'camiseta_negra_01.png', 'asd', 16.00, 'ropa');

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
  `newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `rol` enum('admin','editor','usuario') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido1`, `apellido2`, `correo_electronico`, `clave`, `fecha_nac`, `pais`, `codigo_postal`, `telefono`, `img_perfil`, `newsletter`, `rol`) VALUES
(1, 'Pepe', 'García', 'Pérez', 'pepe@gmail', '$2y$10$alKKoNpJhb6PlE6kfBfUK.DEP7pJKVn8xB/.XmPoHpDapKTk2V/Qq', '1990-01-01', 'España', '28001', '666666666', NULL, 0, 'admin');

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
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foto_galeria`
--
ALTER TABLE `foto_galeria`
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

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
