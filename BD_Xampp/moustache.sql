-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221125.2e001c186a
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 17:57:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moustache`
--
CREATE DATABASE IF NOT EXISTS `moustache` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moustache`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservasbarba`
--

CREATE TABLE `reservasbarba` (
  `IDReserva` varchar(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `fechaReserva` datetime NOT NULL,
  `NombreReserva` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservasbarba`
--

INSERT INTO `reservasbarba` (`IDReserva`, `UserID`, `fechaReserva`, `NombreReserva`) VALUES
('202305111700', 0, '2023-05-11 17:00:00', NULL),
('202305111830', 0, '2023-05-11 18:30:00', 'Hola'),
('202305161000', 0, '2023-05-16 10:00:00', 'Toni'),
('202305171100', 12, '2023-05-17 11:00:00', NULL),
('202305180930', 0, '2023-05-18 09:30:00', 'a'),
('202305181000', 0, '2023-05-18 10:00:00', 'a'),
('202305181030', 0, '2023-05-18 10:30:00', 'a'),
('202305181100', 0, '2023-05-18 11:00:00', 'a'),
('202305181130', 0, '2023-05-18 11:30:00', 'a'),
('202305181200', 0, '2023-05-18 12:00:00', 'a'),
('202305181230', 0, '2023-05-18 12:30:00', 'a'),
('202305181300', 0, '2023-05-18 13:00:00', 'a'),
('202305181600', 0, '2023-05-18 16:00:00', 'a'),
('202305181630', 0, '2023-05-18 16:30:00', 'a'),
('202305181700', 0, '2023-05-18 17:00:00', 'a'),
('202305181730', 0, '2023-05-18 17:30:00', 'a'),
('202305181800', 0, '2023-05-18 18:00:00', 'a'),
('202305181830', 0, '2023-05-18 18:30:00', 'a'),
('202305181900', 0, '2023-05-18 19:00:00', 'a'),
('202305181930', 0, '2023-05-18 19:30:00', 'a'),
('202305190930', 0, '2023-05-19 09:30:00', 'Noel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaspelo`
--

CREATE TABLE `reservaspelo` (
  `IDReserva` varchar(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `fechaReserva` datetime NOT NULL,
  `NombreReserva` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaspelo`
--

INSERT INTO `reservaspelo` (`IDReserva`, `UserID`, `fechaReserva`, `NombreReserva`) VALUES
('202305090930', 0, '2023-05-09 09:30:00', NULL),
('202305100930', 0, '2023-05-10 09:30:00', NULL),
('202305101015', 12, '2023-05-10 10:15:00', NULL),
('202305101100', 0, '2023-05-10 11:00:00', NULL),
('202305101600', 12, '2023-05-10 16:00:00', NULL),
('202305110930', 0, '2023-05-11 09:30:00', NULL),
('202305111815', 0, '2023-05-11 18:15:00', 'Noel'),
('202305111900', 0, '2023-05-11 19:00:00', 'Noel'),
('202305121645', 0, '2023-05-12 16:45:00', 'Noel'),
('202305131145', 0, '2023-05-13 11:45:00', NULL),
('202305131230', 0, '2023-05-13 12:30:00', 'Noel'),
('202305160930', 0, '2023-05-16 09:30:00', 'Noel'),
('202305161015', 0, '2023-05-16 10:15:00', 'a'),
('202305171015', 0, '2023-05-17 10:15:00', 'Toni'),
('202305171100', 12, '2023-05-17 11:00:00', NULL),
('202305171730', 0, '2023-05-17 17:30:00', 'Noel'),
('202305180930', 0, '2023-05-18 09:30:00', 'a'),
('202305181015', 0, '2023-05-18 10:15:00', 'a'),
('202305181100', 0, '2023-05-18 11:00:00', 'a'),
('202305181145', 0, '2023-05-18 11:45:00', 'a'),
('202305181230', 0, '2023-05-18 12:30:00', 'a'),
('202305181600', 0, '2023-05-18 16:00:00', 'a'),
('202305181645', 0, '2023-05-18 16:45:00', 'a'),
('202305181730', 0, '2023-05-18 17:30:00', 'a'),
('202305181815', 0, '2023-05-18 18:15:00', 'a'),
('202305181900', 0, '2023-05-18 19:00:00', 'a'),
('202305270930', 0, '2023-05-27 09:30:00', NULL),
('202305271100', 13, '2023-05-27 11:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `name`, `surname`, `email`, `password`) VALUES
(0, 'Admin', 'Moustache', 'noel@gmail.com', 'c1f3270666a17ea7ac53fca4170b55181081db37fdd7b30350138b34c36b59a8'),
(12, 'Delia', 'Soria', 'delia@gmail.com', 'c1f3270666a17ea7ac53fca4170b55181081db37fdd7b30350138b34c36b59a8'),
(13, 'Manual de usuario', 'Moustache', 'ejemplo@gmail.com', 'c1f3270666a17ea7ac53fca4170b55181081db37fdd7b30350138b34c36b59a8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservasbarba`
--
ALTER TABLE `reservasbarba`
  ADD PRIMARY KEY (`IDReserva`),
  ADD KEY `reservasbarba_ibfk_1` (`UserID`);

--
-- Indices de la tabla `reservaspelo`
--
ALTER TABLE `reservaspelo`
  ADD PRIMARY KEY (`IDReserva`),
  ADD KEY `reservaspelo_ibfk_1` (`UserID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservasbarba`
--
ALTER TABLE `reservasbarba`
  ADD CONSTRAINT `reservasbarba_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservaspelo`
--
ALTER TABLE `reservaspelo`
  ADD CONSTRAINT `reservaspelo_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
