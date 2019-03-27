-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 23:50:19
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
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin,
  `doctor` text COLLATE utf8_bin,
  `doctor_asignado` text COLLATE utf8_bin,
  `enfermera` text COLLATE utf8_bin,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `materiales` text COLLATE utf8_bin,
  `duracion` time DEFAULT NULL,
  `estatus` text COLLATE utf8_bin,
  `servicio` text COLLATE utf8_bin,
  `cubiculo` text COLLATE utf8_bin,
  `color` varchar(255) COLLATE utf8_bin NOT NULL,
  `hora_agr` text COLLATE utf8_bin NOT NULL,
  `razon_social` text COLLATE utf8_bin,
  `tiempo_espera` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `title`, `doctor`, `doctor_asignado`, `enfermera`, `start`, `end`, `materiales`, `duracion`, `estatus`, `servicio`, `cubiculo`, `color`, `hora_agr`, `razon_social`, `tiempo_espera`) VALUES
(147, 'ZULEMA', 'doctor2', 'perez', 'enfermera1', '2019-02-22 17:22:00', '2019-02-22 18:00:00', NULL, NULL, 'Consulta', 'PAQUETERIA', '12', '#00ACEE', '2019-02-22 16:19:42', 'ZULEMA YAZMIN MORALES RODRIGUEZ', NULL),
(148, 'PEPE PECAS', 'doctor2', '', 'enfermera1', '2019-03-14 17:00:00', '2019-03-14 18:00:00', NULL, NULL, 'Terminada', '', '', '#6D6E71', '2019-02-22 16:32:18', 'Francisco Salado Morales', NULL),
(149, 'ANTONIO MENESES', 'doctor2', '', 'enfermera1', '2019-02-23 18:00:00', '2019-02-23 19:00:00', NULL, NULL, 'Consulta', 'SERVICIOS DE FACTURACION', '', '#00ACEE', '2019-02-22 17:4:28', 'SCHWEIZER BIOCHEMIE S.A DE C.V', NULL),
(199, 'PEPE PECAS', 'doctor2', '', 'enfermera1', '2019-03-08 18:00:00', '2019-03-08 19:00:00', NULL, NULL, 'Consulta', 'SERVICIOS DE FACTURACION', '2', '#f0671f', '2019-03-7 17:52:55', 'Francisco Salado Morales', NULL),
(205, 'ANTONIO MENESES', 'doctor2', '', 'enfermera1', '2019-03-11 10:00:00', '2019-03-11 10:30:00', NULL, NULL, 'Terminada', 'SERVICIOS DE FACTURACION', '2', '#6D6E71', '2019-03-11 9:43:30', 'SCHWEIZER BIOCHEMIE S.A DE C.V', '9:43:47'),
(206, 'ANTONIO MENESES', 'doctor2', '', 'enfermera1', '2019-03-12 18:00:00', '2019-03-12 18:30:00', NULL, NULL, 'Espera', 'SERVICIOS DE FACTURACION', '3', '#0c6f0f', '2019-03-11 10:3:36', 'SCHWEIZER BIOCHEMIE S.A DE C.V', NULL),
(207, 'PEPE PECAS', 'doctor2', '', 'enfermera1', '2019-03-11 11:00:00', '2019-03-11 12:00:00', NULL, NULL, 'Terminada', 'SERVICIOS DE FACTURACION', '2', '#6D6E71', '2019-03-11 10:4:12', 'SCHWEIZER BIOCHEMIE S.A DE C.V', NULL),
(241, 'ANTONIO MENESES', 'doctor2', '', 'enfermera1', '2019-03-12 17:00:00', '2019-03-12 17:47:00', NULL, NULL, 'Terminada', 'PAQUETERIA', '6', '#6D6E71', '2019-03-12 17:45:0', 'SCHWEIZER BIOCHEMIE S.A DE C.V', NULL),
(265, 'Esther Sanchez', 'doctor2', '', 'enfermera1', '2019-03-23 12:00:00', '2019-03-23 13:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '8', '#ef8cf9', '2019-03-14 11:59:18', 'Cliente de muestra9', NULL),
(274, 'Claudia Cortes', 'doctor2', '', 'enfermera1', '2019-03-22 17:00:00', '2019-03-22 13:31:00', NULL, NULL, 'Terminada', 'Servicio Medico2', '7', '#6D6E71', '2019-03-14 16:59:35', 'Cliente de muestra9', '16:59:41'),
(282, 'Claudia Cortes', 'doctor2', '', 'enfermera2', '2019-03-15 13:00:00', '2019-03-15 16:00:00', NULL, NULL, 'Espera', 'Servicio Medico2', '5', '#0c6f0f', '2019-03-15 9:47:55', 'Cliente de muestra9', '09:48:53'),
(283, 'Claudia Cortes', 'doctor2', '', 'enfermera2', '2019-03-15 09:50:00', '2019-03-15 11:00:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '5', '#f0671f', '2019-03-15 9:47:55', 'Cliente de muestra9', '10:20:36'),
(286, 'Claudia Cortes', 'doctor2', '', 'enfermera2', '2019-03-15 09:50:00', '2019-03-15 11:00:00', NULL, NULL, 'Confirmado', 'Servicio Medico2', '5', '#04879c', '2019-03-15 9:47:55', 'Cliente de muestra9', NULL),
(287, 'Claudia Cortes', 'doctor2', '', 'enfermera2', '2019-03-15 09:50:00', '2019-03-15 11:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '5', '#ef8cf9', '2019-03-15 9:47:55', 'Cliente de muestra9', NULL),
(288, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-23 09:50:00', '2019-03-23 11:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '5', '#ef8cf9', '2019-03-15 9:47:55', 'Cliente de muestra9', NULL),
(289, 'Claudia Cortes', 'doctor2', '', 'enfermera2', '2019-03-15 09:50:00', '2019-03-15 11:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '5', '#ef8cf9', '2019-03-15 9:47:55', 'Cliente de muestra9', NULL),
(290, 'Consuelo Sanchez', 'doctor2', '', 'enfermera1', '2019-03-28 09:00:00', '2019-03-28 10:00:00', NULL, NULL, 'Confirmado', 'Servicio Medico2', '12', '#04879c', '2019-03-19 11:49:44', 'Cliente de muestra4', NULL),
(291, 'Consuelo Bonilla', 'doctor3', '', 'enfermera2', '2019-03-21 12:00:00', '2019-03-21 13:00:00', NULL, NULL, 'Espera', 'Servicio Medico2', '3', '#0c6f0f', '2019-03-19 11:59:35', 'testing', '15:55:22'),
(319, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-22 18:00:00', '2019-03-22 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(320, 'Consuelo Bonilla', 'doctor2', 'doctor2', 'enfermera2', '2019-03-22 17:00:00', '2019-03-22 18:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '7', '#bd05e5', '2019-03-21 16:58:7', 'testing', NULL),
(321, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(322, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(323, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(328, 'Claudia Cortes', 'doctor2', '', 'enfermera1', '2019-03-25 13:00:00', '2019-03-25 14:00:00', NULL, NULL, 'Consulta', 'Servicio Medico1', '5', '#f0671f', '2019-03-25 12:40:43', 'Cliente de muestra9', '12:40:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
