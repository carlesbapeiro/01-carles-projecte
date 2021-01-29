-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2021 a las 20:46:12
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `01-carles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nom`) VALUES
(1, 'Tractors'),
(2, 'Quimics'),
(3, 'Maquinaria lleguera'),
(4, 'Fems'),
(5, 'asdf'),
(6, 'asdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producte`
--

CREATE TABLE `producte` (
  `id` int(11) NOT NULL,
  `descripcio` varchar(500) NOT NULL,
  `preu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `valoracio` int(5) NOT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `usuari_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producte`
--

INSERT INTO `producte` (`id`, `descripcio`, `preu`, `nom`, `valoracio`, `poster`, `usuari_id`, `categoria_id`) VALUES
(1, 'soc un desastre', 21, 'yo', 0, '1.jpg', 1, 1),
(2, 'asdf', 2, 'hola2', 0, '1.jpg', 1, 2),
(6, 'ASDF', 12, 'carles', 0, 'ud4act3.jpg', 2, 4),
(7, 'aaaaaaa', 123, 'aaaaaa', 0, 'MOV6012e25ac1e92.jpg', 2, 4),
(8, 'aaaaa', 123, 'aaaaa', 0, 'MOV6012e26432c0f.jpg', 2, 2),
(9, 'qwerqwerqwer', 123, 'qwerqwerqw', 0, 'MOV6012e272c9796.jpg', 2, 1),
(10, 'asdfasdfasfd', 123, 'asdfasdf', 0, 'MOV6012e27fb6860.jpg', 2, 3),
(11, 'asdfasdf', 123, 'carles', 0, 'MOV6012e2907cd7c.jpg', 2, 4),
(12, 'dfdfdfdfdf', 12, 'sdfdfdfdfd', 0, 'MOV6012e29cadf84.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `mail`, `foto`) VALUES
(1, 'user', '$2y$12$WwuLC3wp64RDz0He8f8LqeYd1cw8zBfYrpz2TTG.bc/PIpJ7y543q', 'ROLE_USER', 'carles@gmail.com', '1.jpg'),
(2, 'admin', '$2y$12$cfWCU2JgmOfI42/UukroA.Sm0fODRWlqfpfoVTUXVZaLDHQvAF7iS', 'ROLE_ADMIN', 'admin@gmail.com', '1.jpg'),
(7, 'superadmin', '$2y$12$WwhOX429S95Q/S/XePvgZeZA5aSUSH3nj6r6dHIfaEFnXeaiYtc/6', 'ROLE_SUPERADMIN', 'superadmin@gmail.com', 'PTN6010627d145b2.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_USERNAME` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
