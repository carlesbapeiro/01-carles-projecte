-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2021 a las 19:55:34
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
(3, 'Maquinaria lleugera'),
(4, 'Fems'),
(7, 'Reg'),
(8, 'Llavors'),
(9, 'Utils'),
(10, 'Hogar'),
(11, 'Altres');

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
(20, 'Una bolsa de fem', 5, 'Fem', 0, 'MOV60184b83d702d.jpg', 1, 4),
(21, 'Funciona perfectament pero perd oli', 999, 'Tractor de segona ma', 0, 'MOV60184be637320.jpeg', 1, 1),
(22, 'Venc pot d\'herbicida molt barat!', 250, 'herbicida', 0, 'MOV60184c27abb3e.jpg', 1, 2),
(23, 'Esta nova', 25, 'Maquina Herbicida', 0, 'MOV60184c63b646f.jpg', 1, 3),
(24, 'Ruixa que dona gust', 10, 'Ruixadora', 0, 'MOV60184d22f19a1.jpg', 7, 10),
(25, 'No l\'he gastada 30 metros', 30, 'Goma Goteo', 0, 'MOV60184d7906138.jpg', 7, 7),
(26, 'Es venen en pack de 50', 250, 'Llavors Targongers', 0, 'MOV60184da6a3285.jpg', 7, 8),
(27, 'Va molt rapid i s\'oblida de mirar el codi. Es un poc despistat', 404, 'Rotovator', 0, 'MOV60184e02ad210.jpg', 7, 11);

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
(7, 'superadmin', '$2y$12$WwhOX429S95Q/S/XePvgZeZA5aSUSH3nj6r6dHIfaEFnXeaiYtc/6', 'ROLE_SUPERADMIN', 'superadmin@gmail.com', 'PTN6014047bc47e7.jpeg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
