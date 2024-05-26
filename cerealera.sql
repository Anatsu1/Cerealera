-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2022 a las 02:31:08
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cerealera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado` enum('administrador','empleado','inactivo') DEFAULT NULL,
  `contra` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `apellido`, `dni`, `telefono`, `direccion`, `estado`, `contra`) VALUES
(1, 'empleado', '', '482292020', '2262920', '30 2932', 'empleado', '1234'),
(2, 'admin', '', '31222', '32131', '422123', 'administrador', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idRegistro` int(10) NOT NULL,
  `idSiloEmpleado` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `temperatura` float DEFAULT NULL,
  `humedad` float DEFAULT NULL,
  `gas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siloempleado`
--

CREATE TABLE `siloempleado` (
  `idSiloEmpleado` int(10) NOT NULL,
  `idSilo` int(10) DEFAULT NULL,
  `idEmpleado` int(10) DEFAULT NULL,
  `fecha_asignado` date NOT NULL,
  `fecha_desasignado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `siloempleado`
--
INSERT INTO `siloempleado` (`idSiloEmpleado`, `idSilo`, `idEmpleado`, `fecha_asignado`, `fecha_desasignado`) VALUES
(1, 1, 1, '2022-08-22');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silos`
--

CREATE TABLE `silos` (
  `idSilo` int(10) NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `capacidad` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `silos`
--

INSERT INTO `silos` (`idSilo`, `estado`, `capacidad`) VALUES
(1, 'activo', 500),
(2, 'activo', 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idRegistro`),
  ADD KEY `idSiloEmpleado` (`idSiloEmpleado`);

--
-- Indices de la tabla `siloempleado`
--
ALTER TABLE `siloempleado`
  ADD PRIMARY KEY (`idSiloEmpleado`),
  ADD KEY `idSilo` (`idSilo`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `silos`
--
ALTER TABLE `silos`
  ADD PRIMARY KEY (`idSilo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idRegistro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `siloempleado`
--
ALTER TABLE `siloempleado`
  MODIFY `idSiloEmpleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `silos`
--
ALTER TABLE `silos`
  MODIFY `idSilo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `idSiloEmpleado` FOREIGN KEY (`idSiloEmpleado`) REFERENCES `siloempleado` (`idSiloEmpleado`);

--
-- Filtros para la tabla `siloempleado`
--
ALTER TABLE `siloempleado`
  ADD CONSTRAINT `idEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`),
  ADD CONSTRAINT `idSilo` FOREIGN KEY (`idSilo`) REFERENCES `silos` (`idSilo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
