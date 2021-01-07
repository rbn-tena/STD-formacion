-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2021 a las 14:30:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_dos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `pk` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `first_last_name` varchar(30) NOT NULL,
  `second_last_name` varchar(30) NOT NULL,
  `phone` int(9) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `schedule`
--

INSERT INTO `schedule` (`pk`, `name`, `first_last_name`, `second_last_name`, `phone`, `email`) VALUES
(2, 'pepe', 'apeu', 'aped', 987412365, 'asd@ñlk.poi'),
(3, 'ramon', 'ruiz', 'segundo', 257412365, 'asd@ñlk.poi'),
(4, 'aad', 'aaa', 'aaaa', 565656565, 'a@a.a'),
(5, 'yo', 'modificado', 'ese', 369874521, 'prueba@email.com'),
(13, 'modificado', 'nuevo', 'otro', 988745632, 'a@h.d'),
(14, 'prueba', 'primerpru', 'segunpru', 124753689, 'a@g.v');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
