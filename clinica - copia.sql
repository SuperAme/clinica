-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2019 a las 18:26:53
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
(290, 'Consuelo Sanchez', 'doctor4', 'doctor2', 'enfermera3', '2019-03-29 10:55:00', '2019-03-29 12:00:00', NULL, NULL, 'Confirmado', 'Servicio Medico3', '2', '#04879c', '2019-03-19 11:49:44', 'Cliente de muestra4', NULL),
(291, 'Consuelo Bonilla', 'doctor3', '', 'enfermera2', '2019-03-21 12:00:00', '2019-03-21 13:00:00', NULL, NULL, 'Espera', 'Servicio Medico2', '3', '#0c6f0f', '2019-03-19 11:59:35', 'testing', '15:55:22'),
(319, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-22 18:00:00', '2019-03-22 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(320, 'Consuelo Bonilla', 'doctor2', 'doctor2', 'enfermera2', '2019-03-22 17:00:00', '2019-03-22 18:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '7', '#bd05e5', '2019-03-21 16:58:7', 'testing', NULL),
(321, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(322, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(323, 'Claudia Cortes', 'doctor2', 'doctor2', 'enfermera2', '2019-03-21 18:00:00', '2019-03-21 18:30:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '11', '#f0671f', '2019-03-21 16:47:45', NULL, '16:47:51'),
(328, 'Claudia Cortes', 'doctor2', '', 'enfermera1', '2019-03-25 13:00:00', '2019-03-25 14:00:00', NULL, NULL, 'Consulta', 'Servicio Medico1', '5', '#f0671f', '2019-03-25 12:40:43', 'Cliente de muestra9', '12:40:48'),
(329, 'Alma Ruiz', 'doctor3', '', 'enfermera3', '2019-03-28 18:10:00', '2019-03-28 19:25:00', NULL, NULL, 'Generado', 'Servicio Medico1', '2', '#ef8cf9', '2019-03-28 9:31:58', 'Cliente de muestra12', NULL),
(330, 'Consuelo Sanchez', 'doctor2', '', 'enfermera1', '2019-03-28 17:15:00', '2019-03-28 18:15:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '8', '#6D6E71', '2019-03-28 9:32:23', 'Cliente de muestra4', '09:32:31'),
(331, 'Consuelo Bonilla', 'doctor3', '', 'enfermera1', '2019-04-29 15:00:00', '2019-04-29 16:00:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '10', '#f0671f', '2019-04-26 14:50:22', 'Cliente de muestra6', '15:59:34'),
(332, 'Guadalupe islas', 'doctor2', '', 'enfermera1', '2019-04-29 17:00:00', '2019-04-29 18:00:00', NULL, NULL, 'Espera', 'Servicio Medico1', '8', '#0c6f0f', '2019-04-26 16:25:35', 'Cliente de muestra11', '16:27:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `usuario` text COLLATE utf8_bin NOT NULL,
  `accion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`usuario`, `accion`) VALUES
(' admin1        ', 'nada'),
(' admin1        ', 'InsertÃ³ cita con folio , el dÃ­a 2019-03-20 16:55:10'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:47:45'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:47:48'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:47:51'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:54:19'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:54:28'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:55:39'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 16:57:24'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:0:59'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:10:9'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:10:15'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:11:20'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:15:4'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:42:18'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:31'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:34'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:36'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:38'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:41'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:42'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:44'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:43:47'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:53:16'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-21 17:57:1'),
(' admin1        ', 'Inserto cita del paciente Claudia Cortes, el dia 2019-03-22 17:12:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `clave` text COLLATE utf8_bin NOT NULL,
  `descrip` text COLLATE utf8_bin NOT NULL,
  `obs` text COLLATE utf8_bin NOT NULL,
  `precio` int(11) NOT NULL,
  `precio_sug` varchar(255) COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `paciente` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`clave`, `descrip`, `obs`, `precio`, `precio_sug`, `cantidad`, `subtotal`, `id_cita`, `paciente`) VALUES
('BDT1060', 'TADALAFIL/DAPOXETINA 2.5-10/60 MG 10/CAP', '', 640, '', 2, 1280, 199, 'PEPE PECAS'),
('BDP1030', 'TADALAFIL/DAPOXETINA 2.5-10/30 MG 10/CAP', '', 525, '525', 1, 525, 204, 'ANTONIO MENESES'),
('BDT2030', 'DAPOXETINA/TADALAFIL 30/20 10/CAP', '', 585, '585', 1, 585, 204, 'ANTONIO MENESES'),
('SERV-PAGO', 'SERVICIOS DE FACTURACION', '', 500, '0', 2, 1000, 205, 'ANTONIO MENESES'),
('ALS.1', 'ANASTRAZOL 0.1 MG', '', 600, '599', 2, 1200, 205, 'ANTONIO MENESES'),
('ALS.1', 'ANASTRAZOL 0.1 MG', 'obs1', 599, '599', 3, 1797, 207, 'PEPE PECAS'),
('CT100', 'TESTOSTERONA 100 MG', '', 499, '499', 3, 1497, 207, 'PEPE PECAS'),
('ALS.25', 'ANASTRAZOL 0.25 MG', 'hey', 699, '699', 5, 3495, 234, 'ANTONIO MENESES'),
('ALS.25', 'ANASTRAZOL 0.25 MG', '', 699, '699', 2, 1398, 219, 'ANTONIO MENESES'),
('BD60', 'DAPOXETINA 60 MG 10/CAP', '', 559, '559', 2, 1118, 235, 'ANTONIO MENESES'),
('BD30', 'DAPOXETINA 30 MG', '', 600, '499', 2, 1200, 235, 'ANTONIO MENESES'),
('ALS.1', 'ANASTRAZOL 0.1 MG', '', 599, '599', 1, 599, 240, 'ANTONIO MENESES'),
('SERV-PAGO', 'SERVICIOS DE FACTURACION', '', 0, '0', 2, 0, 240, 'ANTONIO MENESES'),
('BDP1030', 'TADALAFIL/DAPOXETINA 2.5-10/30 MG 10/CAP', '', 525, '525', 1, 525, 241, 'ANTONIO MENESES'),
('ALS.5', 'ANASTRAZOL 0.5 MG', '', 799, '799', 2, 1598, 241, 'ANTONIO MENESES'),
('CD50', 'DHEA 50 MG', '', 549, '549', 3, 1647, 241, 'ANTONIO MENESES'),
('BD60', 'DAPOXETINA 60 MG 10/CAP', '', 600, '559', 4, 2400, 241, 'ANTONIO MENESES'),
('KIT1', 'DESCR KIT 1', '', 500, '500', 3, 1500, 244, 'PEPE PECAS'),
('DC100', 'DHEA 51-100 MG/G', '', 600, '599', 2, 1200, 244, 'PEPE PECAS'),
('DC100', 'DHEA 51-100 MG/G', '', 600, '599', 2, 1200, 247, 'ANTONIO MENESES'),
('Hon-Med01', 'Honorarios Medicos', '', 3000, '2000', 2, 6000, 249, 'Claudia Cortes'),
('Apli1', 'Aplicacion Serv1', '', 600, '300', 2, 1200, 250, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 600, '300', 2, 1200, 251, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 2, 600, 252, 'Veonica Aparicio'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 1, 2000, 252, 'Veonica Aparicio'),
('Apli2', 'Aplicacion Serv2', '', 600, '300', 2, 1200, 264, 'Veonica Aparicio'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 1, 2000, 264, 'Veonica Aparicio'),
('Apli3', 'Aplicacion Serv3', '', 500, '300', 2, 1000, 256, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 350, '300', 2, 700, 257, 'Claudia Cortes'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 1, 2000, 257, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 700, '300', 40, 28000, 266, 'Claudia Cortes'),
('Kit1', 'Kit de P/S-1', '', 1000, '1000', 3, 3000, 267, 'Claudia Cortes'),
('Apli4', 'Aplicacion Serv4', '', 300, '300', 2, 600, 268, 'Claudia Cortes'),
('Kit2', 'Kit de P/S-2', '', 100, '0', 2, 200, 269, 'Claudia Cortes'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 2, 4000, 275, 'Claudia Cortes'),
('Apli3', 'Aplicacion Serv3', '', 300, '300', 2, 600, 275, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', 'ge', 300, '300', 2, 600, 276, 'Silvia Linares'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 1, 300, 277, 'Silvia Linares'),
('Apli3', 'Aplicacion Serv3', '', 300, '300', 2, 450, 278, 'Silvia Linares'),
('Apli4', 'Aplicacion Serv4', '', 300, '300', 3, 900, 279, 'Silvia Linares'),
('Apli3', 'Aplicacion Serv3', '', 300, '300', 2, 600, 280, 'Silvia Linares'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 2, 600, 274, 'Claudia Cortes'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 1, 2000, 324, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 1, 300, 325, 'Josefina Landarte'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 1, 300, 327, 'Claudia Cortes'),
('Prod4', 'Producto Medico4', '', 100, '100', 1, 100, 328, 'Claudia Cortes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempoconsulta`
--

CREATE TABLE `tiempoconsulta` (
  `id` int(10) NOT NULL,
  `idCita` int(10) NOT NULL,
  `duracion_servicio` text COLLATE utf8_bin NOT NULL,
  `hora_inicio` text COLLATE utf8_bin NOT NULL,
  `hora_fin` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(7, 'DOCTOR4', 'doctor4', 'doctor4', 'materno', 'xx0x0x0x0xxx', 'correo', '45896532', 2147483647, 0, 'D', 'colonia', '64', 14, 0, 'edomex', '15020', 'nose', '50'),
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
(23, 'a', 'a', 'a', 'a', 'a', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', 'iuhoiuhg'),
(24, 'te', 'te', 'te', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', ''),
(25, 'ame', 'pass', 'ame', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', '13'),
(26, 'testt', 'testt', 'testt', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiempoconsulta`
--
ALTER TABLE `tiempoconsulta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT de la tabla `tiempoconsulta`
--
ALTER TABLE `tiempoconsulta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
