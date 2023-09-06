-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2023 a las 16:34:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(10, 'Evento2', '', '#f561f0', '#FFFFFF', '2023-08-23 10:30:00', '2023-08-23 10:30:00'),
(11, 'Evento2', '', '#2f24c6', '#FFFFFF', '2023-08-25 21:30:00', '2023-08-25 21:30:00'),
(12, 'Evento2', '', '#14b2bd', '#FFFFFF', '2023-08-02 12:15:00', '2023-08-02 12:15:00'),
(14, 'Evento2', '', '#9cda16', '#FFFFFF', '2023-08-05 01:10:00', '2023-08-05 01:10:00'),
(16, 'fasfsaf', '', '#075f09', '#FFFFFF', '2023-08-10 13:29:00', '2023-08-10 13:29:00'),
(17, 'Día de la independencia', 'Vivamos todos estas fiestas patrias y gritemos ¡Viva México!', '#39a24e', '#FFFFFF', '2023-09-15 11:15:00', '2023-09-15 11:15:00'),
(18, 'Auditoría interna', 'Evaluación general de todos los procesos y estructuras dentro de una empresa', '#ff0000', '#FFFFFF', '2023-09-04 13:29:00', '2023-09-04 13:29:00'),
(19, 'Auditoría interna', 'análisis o evaluación general de todos los procesos y estructuras dentro de una empresa', '#e21296', '#FFFFFF', '2023-09-07 15:36:00', '2023-09-07 15:36:00'),
(20, 'Auditoría interna', 'análisis o evaluación general de todos los procesos y estructuras dentro de una empresa', '#341bee', '#FFFFFF', '2023-09-18 05:04:00', '2023-09-18 05:04:00'),
(21, 'Auditoría interna', 'análisis o evaluación general de todos los procesos y estructuras dentro de una empresa', '#b1f005', '#FFFFFF', '2023-09-12 13:13:00', '2023-09-12 13:13:00'),
(22, 'Auditoría interna', 'análisis o evaluación general de todos los procesos y estructuras dentro de una empresa', '#66cdf0', '#FFFFFF', '2023-09-22 14:15:00', '2023-09-22 14:15:00'),
(23, 'Capacitacion', '', '#ff0000', '#FFFFFF', '2023-09-25 16:11:00', '2023-09-25 16:11:00'),
(24, 'Capacitacion', '', '#ff0000', '#FFFFFF', '2023-09-27 16:11:00', '2023-09-27 16:11:00'),
(25, 'Capacitacion', '', '#ff0000', '#FFFFFF', '2023-09-29 16:11:00', '2023-09-29 16:11:00'),
(26, 'Capacitacion', '', '#000000', '#FFFFFF', '2023-09-12 15:20:00', '2023-09-12 15:20:00'),
(28, 'Capacitacion', '', '#000000', '#FFFFFF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Capacitacion', '', '#000000', '#FFFFFF', '2023-09-13 15:20:00', '2023-09-13 15:20:00'),
(30, 'Capacitacion', '', '#000000', '#FFFFFF', '2023-09-14 15:20:00', '2023-09-14 15:20:00'),
(31, 'Conferencia General ', '', '#00aaff', '#FFFFFF', '2023-09-01 11:45:00', '2023-09-01 11:45:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
