-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 23:50:58
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` text COLLATE utf8_bin,
  `contraseña` text COLLATE utf8_bin,
  `nombre` text COLLATE utf8_bin,
  `apellidoM` text COLLATE utf8_bin,
  `apellidoP` text COLLATE utf8_bin,
  `rfc` text COLLATE utf8_bin,
  `correo` text COLLATE utf8_bin,
  `telefono1` int(20) DEFAULT NULL,
  `telefono2` int(20) DEFAULT NULL,
  `tipo` text COLLATE utf8_bin,
  `direccion` text COLLATE utf8_bin,
  `colonia` text COLLATE utf8_bin,
  `numero_exterior` int(20) DEFAULT NULL,
  `numero_interior` int(20) DEFAULT NULL,
  `delegacion` text COLLATE utf8_bin,
  `estado` text COLLATE utf8_bin,
  `codigo_postal` text COLLATE utf8_bin,
  `comision` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`, `nombre`, `apellidoM`, `apellidoP`, `rfc`, `correo`, `telefono1`, `telefono2`, `tipo`, `direccion`, `colonia`, `numero_exterior`, `numero_interior`, `delegacion`, `estado`, `codigo_postal`, `comision`) VALUES
(1, 'doctorperez', 'pass', 'doctorjuan', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', NULL),
(2, 'recepcion1', 'pass', 'l', '', '', '', '', 0, 0, 'R', '', '', 0, 0, '', '', '', NULL),
(3, 'admin1', 'pass', '', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', NULL),
(4, 'Maximiliano', 'doctor', 'perez', 'materno', 'xx0x0x0x0xxx', 'correo', '45896532', 2147483647, 0, 'D', 'colonia', '64', 14, 0, 'edomex', '15020', 'nose', NULL),
(5, 'DOCTOR2', 'doctor', 'doctor2', 'materno', 'xx0x0x0x0xxx', 'correo', '45896532', 2147483647, 0, 'D', 'colonia', '64', 14, 0, 'edomex', '15020', 'nose', NULL),
(6, 'DOCTOR3', 'doctor3', 'doctor3', 'materno', 'xx0x0x0x0xxx', 'correo', '45896532', 2147483647, 0, 'D', 'colonia', '64', 14, 0, 'edomex', '15020', 'nose', NULL),
(7, 'DOCTOR4', 'doctor4', 'doctor4', 'materno', 'xx0x0x0x0xxx', 'correo', '45896532', 2147483647, 0, 'D', 'colonia', '64', 14, 0, 'edomex', '15020', 'nose', NULL),
(8, 'enfermera1', 'pass', 'enfermera1', 'APE', 'APE2', 'X01X0000X', 'DADADADA', 45789562, 265984787, 'E', 'S/M', 'SSASA', 64, 48, 'FDSDSF', 'FDSFDS', '15020', NULL),
(9, 'enfermera2', 'pass', 'enfermera2', 'APE', 'APE2', 'X01X0000X', 'DADADADA', 45789562, 265984787, 'E', 'S/M', 'SSASA', 64, 48, 'FDSDSF', 'FDSFDS', '15020', '15'),
(10, 'enfermera3', 'pass', 'enfermera3', 'APE', 'APE2', 'X01X0000X', 'DADADADA', 45789562, 265984787, 'E', 'S/M', 'SSASA', 64, 48, 'FDSDSF', 'FDSFDS', '15020', NULL),
(11, 'doc5', 'doc5', 'doc5', 'doc5', 'doc5', 'doc5', 'doc5@ddd.com', 4578, 4589, 'D', '45', 'doc5', 65, 54, 'doc5', 'doc5', '15202', NULL),
(12, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 589652, 15489562, 'A', '71', 'admin2', 56, 48, 'admin2', 'admin2', '15489', NULL),
(13, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 'admin2', 589652, 15489562, 'A', '71', 'admin2', 56, 48, 'admin2', 'admin2', '15489', NULL),
(15, 'test', '45', '22', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', NULL),
(16, 'resident', 'evil', 'claire', '', 'redfield', '', '', 0, 0, 'S', '', '', 0, 0, '', '', '', ''),
(20, 'test', 'test', 'set', '', 'tes', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', '5'),
(21, 'Residente1', 'pass', 'residente', '', '', '', '', 0, 0, 'S', '', '', 0, 0, '', '', '', ''),
(22, 'Residente2', 'pass', 'Juan', '', '', '', '', 0, 0, 'S', '', '', 0, 0, '', '', '', ''),
(23, 'a', 'a', 'a', 'a', 'a', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', 'iuhoiuhg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
