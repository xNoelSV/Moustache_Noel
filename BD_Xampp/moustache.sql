-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221125.2e001c186a
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 15:29:34
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
  `fechaReserva` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservasbarba`
--

INSERT INTO `reservasbarba` (`IDReserva`, `UserID`, `fechaReserva`) VALUES
('202304251230', 0, '2023-04-25 12:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaspelo`
--

CREATE TABLE `reservaspelo` (
  `IDReserva` varchar(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `fechaReserva` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaspelo`
--

INSERT INTO `reservaspelo` (`IDReserva`, `UserID`, `fechaReserva`) VALUES
('202304261645', 0, '2023-04-26 16:45:00'),
('202304270930', 0, '2023-04-27 09:30:00'),
('202304271230', 0, '2023-04-27 12:30:00'),
('202304291345', 0, '2023-04-29 13:45:00'),
('202305281145', 0, '2023-05-28 11:45:00');

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
(0, 'Noel', 'Sariñena Varela', 'noel@gmail.com', 'c1f3270666a17ea7ac53fca4170b55181081db37fdd7b30350138b34c36b59a8'),
(12, 'Delia', 'Soria', 'delia@gmail.com', 'c1f3270666a17ea7ac53fca4170b55181081db37fdd7b30350138b34c36b59a8');

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
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
