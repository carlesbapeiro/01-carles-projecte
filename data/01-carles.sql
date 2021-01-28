-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 28-01-2021 a les 13:35:07
-- Versió del servidor: 10.4.14-MariaDB
-- Versió de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `01-carles`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `categoria`
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
-- Estructura de la taula `producte`
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
-- Bolcament de dades per a la taula `producte`
--

INSERT INTO `producte` (`id`, `descripcio`, `preu`, `nom`, `valoracio`, `poster`, `usuari_id`, `categoria_id`) VALUES
(1, 'soc un desastre', 21, 'yo', 0, '1.jpg', 1, 1),
(2, 'asdf', 2, 'hola2', 0, '1.jpg', 1, 2),
(6, 'ASDF', 12, 'carles', 0, 'ud4act3.jpg', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de la taula `user`
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
-- Bolcament de dades per a la taula `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `mail`, `foto`) VALUES
(1, 'user', '$2y$12$WwuLC3wp64RDz0He8f8LqeYd1cw8zBfYrpz2TTG.bc/PIpJ7y543q', 'ROLE_USER', 'carles@gmail.com', '1.jpg'),
(2, 'admin', '$2y$12$cfWCU2JgmOfI42/UukroA.Sm0fODRWlqfpfoVTUXVZaLDHQvAF7iS', 'ROLE_ADMIN', 'admin@gmail.com', '1.jpg'),
(7, 'superadmin', '$2y$12$WwhOX429S95Q/S/XePvgZeZA5aSUSH3nj6r6dHIfaEFnXeaiYtc/6', 'ROLE_SUPERADMIN', 'superadmin@gmail.com', 'PTN6010627d145b2.jpg');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_USERNAME` (`username`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `producte`
--
ALTER TABLE `producte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
