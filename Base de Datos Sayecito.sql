-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2022 a las 17:02:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sayecito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos`
--

CREATE TABLE `apartamentos` (
  `PISO` smallint(3) NOT NULL,
  `APARTAMENTO` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CEDULA` int(10) NOT NULL,
  `NOMBRE` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `APELLIDO` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CORREOA` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CORREOB` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TELEFONOCA` bigint(15) NOT NULL,
  `TELEFONOCE` bigint(15) NOT NULL,
  `ALICUOTA` decimal(20,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`PISO`, `APARTAMENTO`, `CEDULA`, `NOMBRE`, `APELLIDO`, `CORREOA`, `CORREOB`, `TELEFONOCA`, `TELEFONOCE`, `ALICUOTA`) VALUES
(0, 'CONS', 0, 'Zoraida ', 'Suarez', '', '', 0, 4264138219, '2.57900'),
(1, '11', 0, 'Ingrid ', 'Gonzalez', 'yaliciaarmas@yahoo.com', '', 4711960, 4242100183, '2.57900'),
(1, '12', 0, 'Morella', 'Fernandez', 'dialina.nogueira@gmail.com', '', 4439450, 0, '2.57900'),
(1, '13', 0, 'Humberto', 'Gonzalez', 'humbertog39@gmail.com', 'humbertog39@gmail.com', 4428635, 4140311513, '2.57900'),
(1, '14', 0, 'Hipolito', 'Fernandes', 'leonardo.fabio1989@gmail.com', 'leonardo.fabio1989@gmail.com', 0, 4242074604, '2.57900'),
(2, '21', 0, 'Yelitza', 'Valecillos', 'yelitzavalecillos@hotmail.com', 'yelitzavalecillos@hotmail.com', 4430586, 4141361834, '2.57900'),
(2, '22', 0, 'Javier', 'Bravo', 'astridnuevo@gmail.com', '', 4420778, 4142479734, '2.57900'),
(2, '23', 0, 'Ansaldo', 'Camera', 'cameraansaldo@gmail.com', 'cameraansaldo@gmail.com', 44330947, 4142870093, '2.57900'),
(2, '24', 0, 'Nancy', 'Briceño', 'ee@gmail.com', 'ee@gmail.com', 3053365325, 3053365325, '2.57900'),
(3, '31', 0, '', '', '', '', 0, 0, '2.57900'),
(3, '32', 0, '', '', '', '', 0, 0, '2.57900'),
(3, '33', 0, '', '', '', '', 0, 0, '2.57900'),
(3, '34', 0, '', '', '', '', 0, 0, '2.57900'),
(4, '41', 0, '', '', '', '', 0, 0, '2.57900'),
(4, '42', 0, '', '', '', '', 0, 0, '2.57900'),
(4, '43', 0, '', '', '', '', 0, 0, '2.57900'),
(4, '44', 0, '', '', '', '', 0, 0, '2.57900'),
(5, '51', 0, '', '', '', '', 0, 0, '2.57900'),
(5, '52', 0, '', '', '', '', 0, 0, '2.57900'),
(5, '53', 0, 'xxx', '53', 'FGHG', 'FGHG', 0, 0, '2.57900'),
(5, '54', 0, '', '', '', '', 0, 0, '2.57900'),
(6, '61', 0, '', '', '', '', 0, 0, '2.57900'),
(6, '62', 0, '', '', '', '', 0, 0, '2.57900'),
(6, '63', 0, '', '', '', '', 0, 0, '2.57900'),
(6, '64', 0, '', '', '', '', 0, 0, '2.57900'),
(7, '71', 0, '', '', '', '', 0, 0, '2.57900'),
(7, '72', 0, '', '', '', '', 0, 0, '2.57900'),
(7, '73', 0, '', '', '', '', 0, 0, '2.57900'),
(7, '74', 0, '', '', '', '', 0, 0, '2.57900'),
(8, '81', 3718104, 'Luis Ernesto', 'Gomez Diaz', 'luisegd160354@gmail.com', 'luisegd160354@hotmail.com', 4168217371, 4169062098, '2.57900'),
(8, '82', 0, 'Henny', 'Lopenza', 'rjghjwrhj', 'hgrh', 0, 4141378610, '2.57900'),
(8, '83', 0, '', '', '', '', 0, 0, '2.57900'),
(8, '84', 0, '', '', '', '', 0, 0, '2.57900'),
(9, '91', 0, '', '', '', '', 0, 0, '2.57900'),
(9, '92', 0, '', '', '', '', 0, 0, '2.57900'),
(9, '93', 0, '', '', '', '', 0, 0, '2.57900'),
(9, '94', 0, '', '', '', '', 0, 0, '2.57900'),
(10, 'PH1', 0, '', '', '', '', 0, 0, '4.28640'),
(10, 'PH2', 6821253, 'Susana', 'Sadovnik', 'susysdiaz@hotmail.com', 'susysdiaz@gmail.com', 4436437, 4141314661, '4.28640');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcionfacturas`
--

CREATE TABLE `descripcionfacturas` (
  `CODIGOFACTURA` smallint(8) NOT NULL,
  `DESCRIPCIONFACTURA` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descripcionfacturas`
--

INSERT INTO `descripcionfacturas` (`CODIGOFACTURA`, `DESCRIPCIONFACTURA`) VALUES
(1, 'SUELDO TRABAJADORA RESIDENCIAL'),
(2, 'PROVISION PRESTACIONES SOCIALES'),
(3, 'SEGURO SOCIAL '),
(4, 'AHORRO HABITACIONAL '),
(5, 'BONO ALIMENTACION'),
(6, 'VACACIONES TRABAJADOR RESIDENCIAL'),
(7, 'AJUSTE DE SALARIO TRABAJADOR RESIDENCIAL'),
(8, 'AGUA (ESTIMADO)'),
(9, 'ELECTRICIDAD (ESTIMADO)'),
(10, 'MANTENIMIENTO DE ASCENSORES'),
(11, 'MANTENIMIENTO PUERTA ESTACIONAMIENTO '),
(12, 'MANTENIMIENTO SISTEMA HIDRONEUMATICO'),
(13, 'PRODUCTOS DE LIMPIEZA'),
(14, 'BOLSAS DE BASURA'),
(15, 'BOMBILLOS'),
(16, 'LIMPIEZA AREAS COMUNES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `MESFACTURACION` int(2) NOT NULL,
  `ANO` int(5) NOT NULL,
  `CODIGOFACTURACION` smallint(8) NOT NULL,
  `FECHAFACTURACION` date NOT NULL,
  `RIFFACTURACION` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NUMEROFACTURACION` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NOMBREFACTURACION` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPCIONFACTURACION` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MONTOFACTURACION` decimal(20,2) NOT NULL,
  `CIERREMES` int(1) NOT NULL,
  `CEDULAAUTORIZADO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`MESFACTURACION`, `ANO`, `CODIGOFACTURACION`, `FECHAFACTURACION`, `RIFFACTURACION`, `NUMEROFACTURACION`, `NOMBREFACTURACION`, `DESCRIPCIONFACTURACION`, `MONTOFACTURACION`, `CIERREMES`, `CEDULAAUTORIZADO`) VALUES
(1, 2021, 1, '2020-12-02', '11', '1', 'pago', 'sueldo conserje', '1000.00', 1, 3718104),
(2, 2021, 1, '2021-02-02', '1234', '1', 'SDGSSDF', 'ASFDSFDSF', '1000.00', 1, 3718104),
(3, 2021, 1, '2021-06-01', '1234', '1', 'ADFS', 'ASDFDS', '1000.00', 1, 3718104),
(3, 2021, 2, '2020-12-02', '1234', '1', 'LMLÑL', 'ÑLLK', '1000.00', 1, 3718104),
(12, 2020, 1, '2020-11-04', '1234', '1', 'pago', 'cancelacion sueldo', '1000.00', 1, 3718104);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`PISO`,`APARTAMENTO`);

--
-- Indices de la tabla `descripcionfacturas`
--
ALTER TABLE `descripcionfacturas`
  ADD PRIMARY KEY (`CODIGOFACTURA`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`MESFACTURACION`,`CODIGOFACTURACION`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
