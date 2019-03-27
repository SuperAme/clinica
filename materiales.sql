-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2019 a las 00:52:44
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
