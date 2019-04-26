-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2019 a las 22:26:06
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

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
(223, 'Esther Sanchez', 'Doctor1', 'Doctor1', 'Enfermera2', '2019-03-14 11:02:00', '2019-03-14 17:04:00', NULL, NULL, 'Terminada', 'Servicio Medico2', '10', '#6D6E71', '2019-03-13 11:0:24', 'Cliente de muestra7', NULL),
(224, 'Consuelo Bonilla', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-14 11:30:00', '2019-03-14 17:09:00', NULL, NULL, 'Terminada', 'Servicio Medico2', '7', '#6D6E71', '2019-03-13 11:5:59', 'Cliente de muestra6', NULL),
(225, 'Esteban Perez', 'Doctor1', '', 'Enfermera2', '2019-03-14 17:00:00', '2019-03-14 18:00:00', NULL, NULL, 'Confirmado', 'Servicio Medico1', '12', '#04879c', '2019-03-13 16:0:56', 'Cliente de muestra2', NULL),
(227, 'Consuelo Sanchez', 'Doctor1', '', 'Enfermera1', '2019-03-13 16:30:00', '2019-03-13 16:40:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '12', '#6D6E71', '2019-03-13 16:28:19', 'Cliente de muestra4', '16:28:44'),
(228, 'Esteban Perez', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-14 11:00:00', '2019-03-14 12:00:00', NULL, NULL, 'Generado', 'Servicio Medico1', '5', '#bd05e5', '2019-03-13 19:28:8', 'Cliente de muestra2', NULL),
(229, 'Olivia Campos', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-13 19:40:00', '2019-03-13 20:28:00', NULL, NULL, 'Terminada', 'Servicio Medico5', '3', '#6D6E71', '2019-03-13 19:29:37', 'Cliente de muestra8', '19:32:19'),
(231, 'Josefina Landarte', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-22 19:00:00', '2019-03-22 13:30:00', NULL, NULL, 'Terminada', 'Servicio Medico4', '6', '#6D6E71', '2019-03-13 19:52:16', 'Cliente de muestra5', '09:27:33'),
(232, 'Veonica Aparicio', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-22 22:00:00', '2019-03-22 23:00:00', NULL, NULL, 'Generado', 'Servicio Medico1', '15', '#bd05e5', '2019-03-13 21:15:45', 'Cliente de muestra15', NULL),
(233, 'Josefina Landarte', 'Doctor1', 'Doctor2', 'Enfermera1', '2019-03-15 09:57:00', '2019-03-15 10:03:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '10', '#6D6E71', '2019-03-13 22:0:8', 'Cliente de muestra5', '09:56:27'),
(236, 'Alma Ruiz', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-14 16:00:00', '2019-03-14 17:03:00', NULL, NULL, 'Terminada', 'Servicio Medico2', '9', '#6D6E71', '2019-03-14 15:57:15', 'Cliente de muestra12', '16:39:15'),
(238, 'Alma Ruiz', 'Doctor1', 'Doctor2', 'Enfermera1', '2019-03-14 17:00:00', '2019-03-14 18:00:00', NULL, NULL, 'Generado', 'Servicio Medico4', '12', '#bd05e5', '2019-03-14 16:36:46', 'Cliente de muestra12', NULL),
(239, 'Griselda Ramirez', 'Doctor1', 'Doctor3', 'Enfermera1', '2019-03-22 15:00:00', '2019-03-22 16:00:00', NULL, NULL, 'Consulta', 'Servicio Medico3', '10', '#f0671f', '2019-03-14 18:38:41', 'Cliente de muestra14', '13:33:18'),
(240, 'Alma Ruiz', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-20 19:00:00', '2019-03-20 20:00:00', NULL, NULL, 'Generado', 'Servicio Medico1', '11', '#bd05e5', '2019-03-14 18:39:19', 'Cliente de muestra12', NULL),
(241, 'Viviana Palacios', 'Doctor1', 'Doctor1', 'Enfermera1', '2019-03-15 12:00:00', '2019-03-15 11:16:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '1', '#6D6E71', '2019-03-15 11:10:10', 'Cliente de muestra3', '11:10:35'),
(242, 'Esteban Perez', 'Doctor3', '', 'Enfermera2', '2019-03-22 11:00:00', '2019-03-22 12:00:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '5', '#f0671f', '2019-03-19 10:33:22', 'Cliente de muestra2', '13:8:13'),
(243, 'Consuelo Sanchez', 'Doctor2', 'Doctor3', 'Enfermera2', '2019-03-22 13:00:00', '2019-03-22 14:00:00', NULL, NULL, 'Generado', 'Servicio Medico2', '10', '#bd05e5', '2019-03-22 12:54:58', 'Cliente de muestra4', NULL),
(245, 'Consuelo Bonilla', 'Doctor1', '', 'Enfermera1', '2019-03-28 13:00:00', '2019-03-28 13:51:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '2', '#6D6E71', '2019-03-25 12:50:16', 'Cliente de muestra6', '12:50:22'),
(247, 'Claudia Cortes', 'Doctor1', '', 'Enfermera2', '2019-03-28 17:00:00', '2019-03-28 18:00:00', NULL, NULL, 'Consulta', 'Servicio Medico2', '9', '#f0671f', '2019-03-25 16:31:22', 'Cliente de muestra9', '16:31:29'),
(248, 'Consuelo Sanchez', 'Doctor1', 'Doctor2', 'Enfermera1', '2019-03-28 14:00:00', '2019-03-28 15:00:00', NULL, NULL, 'Generado', 'Servicio Medico1', '8', '#ef8cf9', '2019-03-26 13:3:8', 'Cliente de muestra4', NULL),
(249, 'Olivia Campos', 'Doctor1', '', 'Enfermera1', '2019-03-28 18:00:00', '2019-03-28 18:42:00', NULL, NULL, 'Terminada', 'Servicio Medico1', '2', '#6D6E71', '2019-03-28 17:25:45', 'Cliente de muestra8', '17:25:52');

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
('BDP1030', 'TADALAFIL/DAPOXETINA 2.5-10/30 MG 10/CAP', '', 525, '525', 1, 525, 204, 'ANTONIO MENESES'),
('BDT2030', 'DAPOXETINA/TADALAFIL 30/20 10/CAP', '', 585, '585', 1, 585, 204, 'ANTONIO MENESES'),
('SERV-PAGO', 'SERVICIOS DE FACTURACION', '', 500, '0', 2, 1000, 205, 'ANTONIO MENESES'),
('ALS.1', 'ANASTRAZOL 0.1 MG', '', 600, '599', 2, 1200, 205, 'ANTONIO MENESES'),
('ALS.1', 'ANASTRAZOL 0.1 MG', 'obs1', 599, '599', 3, 1797, 207, 'PEPE PECAS'),
('CT100', 'TESTOSTERONA 100 MG', '', 499, '499', 3, 1497, 207, 'PEPE PECAS'),
('AA-01', 'HONORARIOS MEDICOS', '', 2000, '1000', 3, 6000, 192, 'AMERICO'),
('ABRAFLEXFIN', 'ESPONJA SOFTBACK FINO GRANO DE 320 A 400', 'obs', 50, '50', 1, 50, 197, 'AMERICO'),
('TUERCAHEXCL8', 'TUERCA HEXAGONAL CL8 8PZ, 8,12,10,16', 'obs', 0, '0', 1, 0, 197, 'AMERICO'),
('AA-01', 'HONORARIOS MEDICOS', 'obs', 1500, '1000', 1, 1500, 197, 'AMERICO'),
('AA-02', 'PRODUCTO 1', 'obs', 100, '100', 1, 100, 198, 'Juan Carlos'),
('AA-03', 'PRODUCTO 2', 'obs 2', 100, '100', 1, 100, 198, 'Juan Carlos'),
('AA-01', 'HONORARIOS MEDICOS', 'ob', 2000, '1000', 1, 2000, 198, 'Juan Carlos'),
('ABRAZINOX', 'ABRAZADERA SERIE PESADA INOX. 25-40MM', 'obs', 60, '60', 1, 60, 199, 'LEONARDO SOTO'),
('ALIBCACIGC', 'ALICATE DE MONTAJE CURVO BOCA CIGÜEÑA', 'obs', 200, '200', 1, 200, 199, 'LEONARDO SOTO'),
('CAMIS-CHI-CAF', 'CAMISA CABALLERO CHICA CAFE', 'obs', 0, '0', 1, 0, 200, 'Luis Perez'),
('AA-03', 'PRODUCTO 2', 'obs', 100, '100', 1, 100, 200, 'Luis Perez'),
('AA-01', 'HONORARIOS MEDICOS', 'obs', 2500, '1000', 1, 2500, 200, 'Luis Perez'),
('Hon-Med01', 'Honorarios Medicos', 'fhgfgh', 2000, '2000', 1, 2000, 212, 'Consuelo Sanchez'),
('Apli3', 'Aplicacion Serv3', '', 300, '300', 2, 600, 212, 'Consuelo Sanchez'),
('Apli4', 'Aplicacion Serv4', '', 400, '300', 3, 1200, 212, 'Consuelo Sanchez'),
('Serv3', 'Servicio Medico3', '', 200, '200', 2, 400, 213, 'Consuelo Bonilla'),
('Serv3', 'Servicio Medico3', '', 200, '200', 2, 400, 213, 'Consuelo Bonilla'),
('Apli3', 'Aplicacion Serv3', '', 600, '300', 3, 1800, 213, 'Consuelo Bonilla'),
('Kit2', 'Kit de P/S-2', '', 0, '0', 1, 0, 211, 'Esteban Perez'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 1, 300, 218, 'Consuelo Bonilla'),
('Kit1', 'Kit de P/S-1', 'fwsfsfs', 1000, '1000', 2, 2000, 221, 'Consuelo Bonilla'),
('Kit1', 'Kit de P/S-1', '', 1000, '1000', 1, 1000, 222, 'Consuelo Bonilla'),
('Prod1', 'Producto Medico1', '', 100, '100', 1, 100, 227, 'Consuelo Sanchez'),
('Apli1', 'Aplicacion Serv1', '', 5, '300', 1, 5, 227, 'Consuelo Sanchez'),
('Apli1', 'Aplicacion Serv1', 'obs de part', 300, '300', 1, 300, 229, 'Olivia Campos'),
('Kit1', 'Kit de P/S-1', 'obs', 1000, '1000', 1, 1000, 229, 'Olivia Campos'),
('Hon-Med01', 'Honorarios Medicos', 'obs del doc', 2500, '2000', 1, 2500, 229, 'Olivia Campos'),
('Apli1', 'Aplicacion Serv1', '1', 300, '300', 1, 300, 223, 'Esther Sanchez'),
('Serv1', 'Servicio Medico1', '1', 200, '200', 100, 20000, 224, 'Consuelo Bonilla'),
('Kit2', 'Kit de P/S-2', '', 0, '0', 90, 0, 224, 'Consuelo Bonilla'),
('Kit1', 'Kit de P/S-1', 'obs1', 1000, '1000', 2, 2000, 233, 'Josefina Landarte'),
('Apli2', 'Aplicacion Serv2', 'obs 2', 300, '300', 3, 900, 233, 'Josefina Landarte'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 1, 2000, 233, 'Josefina Landarte'),
('Apli1', 'Aplicacion Serv1', '', 300, '300', 1, 300, 241, 'Viviana Palacios'),
('Prod2', 'Producto Medico1', '', 100, '100', 1, 100, 241, 'Viviana Palacios'),
('Kit1', 'Kit de P/S-1', '', 1000, '1000', 3, 3000, 241, 'Viviana Palacios'),
('Hon-Med01', 'Honorarios Medicos', 'ok', 5000, '2000', 3, 15000, 241, 'Viviana Palacios'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 1, 300, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 1, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 1, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 300, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 1, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 300, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 300, 235, 'Esteban Perez'),
('Apli1', 'Aplicacion Serv1', 'OBS', 300, '300', 300, 300, 235, 'Esteban Perez'),
('Prod2', 'Producto Medico1', '', 100, '100', 1, 100, 231, 'Josefina Landarte'),
('Serv1', 'Servicio Medico1', '', 200, '200', 1, 200, 231, 'Josefina Landarte'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 2, 600, 245, 'Consuelo Bonilla'),
('Hon-Med01', 'Honorarios Medicos', 'mis honorarios', 2000, '2000', 1, 2000, 247, 'Claudia Cortes'),
('Apli2', 'Aplicacion Serv2', '', 300, '300', 2, 600, 249, 'Olivia Campos'),
('Hon-Med01', 'Honorarios Medicos', '', 2000, '2000', 2, 4000, 249, 'Olivia Campos');

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
  `comision` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`, `nombre`, `apellidoM`, `apellidoP`, `rfc`, `correo`, `telefono1`, `telefono2`, `tipo`, `direccion`, `colonia`, `numero_exterior`, `numero_interior`, `delegacion`, `estado`, `codigo_postal`, `comision`) VALUES
(3, 'Admin1', 'pass', 'adm', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', ''),
(37, 'Recepcion1', 'pass', 'Recepcion1', '', '', '', '', 0, 0, 'R', '', '', 0, 0, '', '', '', ''),
(38, 'Doctor1', 'pass', 'Doctor1', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', ''),
(39, 'Enfermera1', 'pass', 'Enfermera1', '', '', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', ''),
(40, 'admin2', 'pass', 'administrador2', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', ''),
(41, 'Enfermera2', 'pass', 'Enfermera2', '', '', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', ''),
(42, 'Doctor2', 'pass', 'Doctor2', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', ''),
(43, 'recepcion3', 'pass', 'recepcion', '', '', '', '', 0, 0, 'R', '', '', 0, 0, '', '', '', ''),
(44, 'admin0', 'qwerty', 'admin0', '', '', '', '', 0, 0, 'A', '', '', 0, 0, '', '', '', ''),
(45, 'Doctor3', 'pass', 'Doctor3', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', ''),
(46, 'Doctor4', 'pass', 'Doctor4', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', ''),
(47, 'Doctor5', 'pass', 'Doctor5', '', '', '', '', 0, 0, 'D', '', '', 0, 0, '', '', '', ''),
(48, 'Enfermera3', 'pass', 'Enfermera3', '', '', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', ''),
(49, 'Enfermera4', 'pass', 'Enfermera4', '', '', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', ''),
(50, 'Enfermera5', 'pass', 'Enfermera5', '', '', '', '', 0, 0, 'E', '', '', 0, 0, '', '', '', ''),
(51, 'Residente1', 'pass', 'Residente1', '', '', '', '', 0, 0, 'S', '', '', 0, 0, '', '', '', ''),
(52, 'petra', 'petra', 'petra', '', 'petrinzki', '', '', 0, 0, 'R', '', '', 0, 0, '', '', '', '20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
