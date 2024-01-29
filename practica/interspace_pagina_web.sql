-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-12-2023 a las 13:27:51
-- Versión del servidor: 10.6.16-MariaDB-cll-lve
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `interspace_pagina_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `destacado` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `precio` int(100) NOT NULL,
  `precio_desc` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `descripcion` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`destacado`, `id`, `nombre`, `precio`, `precio_desc`, `descuento`, `descripcion`) VALUES
(0, 1, 'Luna', 100000, 0, 0, '¡Prepárate para un increíble viaje a la Luna, donde descubrirás los secretos de nuestro satélite más cercano!'),
(0, 2, 'Marte', 120000, 0, 0, '¡Embárcate En Un Épico Viaje A Marte Y Descubre Un Mundo Rojo Lleno De Misterios Por Revelar!'),
(0, 3, 'Jupiter', 140000, 0, 0, '¡Viaja A Júpiter Y Sumérgete En La Grandeza De Este Gigante Gaseoso, Donde Los Misterios Del Cosmos Te Esperan!'),
(0, 4, 'Saturno', 160000, 0, 0, '¡Descubre Los Misterios De Saturno En Un Emocionante Viaje Espacial, Donde Sus Enigmáticos Anillos Y Su Majestuosidad Te Dejarán Sin Aliento!'),
(0, 5, 'Urano', 180000, 0, 0, '¡Zarpa Hacia Urano Y Adéntrate En Un Viaje Cósmico Único, Explorando Un Mundo Helado Y Fascinante En Los Confines Del Sistema Solar!'),
(0, 6, 'Neptuno', 180000, 0, 0, '¡Embarca En Un Emocionante Viaje A Neptuno Y Sumérgete En Las Profundidades Azules De Este Planeta Distante, Donde Secretos Cósmicos Te Esperan!'),
(1, 7, 'Estelaris', 200000, 0, 0, ''),
(1, 8, 'Aurorion', 200000, 0, 0, ''),
(1, 9, 'Crimsona', 200000, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `permisos` int(11) NOT NULL DEFAULT 0,
  `ID` int(11) NOT NULL,
  `nombre` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `correo` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrasena` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `genero` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido` varchar(254) NOT NULL,
  `dni` varchar(254) NOT NULL,
  `edad` varchar(254) NOT NULL,
  `codpostal` varchar(254) NOT NULL,
  `localidad` varchar(254) NOT NULL,
  `numtel` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`permisos`, `ID`, `nombre`, `correo`, `contrasena`, `genero`, `apellido`, `dni`, `edad`, `codpostal`, `localidad`, `numtel`) VALUES
(0, 27, 'pep', 'pep@hotmail.com', '$2y$10$VZTbBDlD5kTXTd5nGo8x6ecB13l5LIFv1zqxKC2sqjSAnXHfu8pg6', '', '', '', '', '', '', ''),
(0, 28, 'pep', 'pep@a.com', '$2y$10$y1Ylpc1LdlgtKyvfphMFMuFQrcQgq.jS9blm4QUMZuy7nIQ4k4Ody', '', '', '', '', '', '', ''),
(0, 29, '', '+++Q@2', '$2y$10$6.HElJOJzGzDABCKScuAheHF7GzcvqCSZlR4Xic2HyJ4lUNHtabaq', '', '', '', '', '', '', ''),
(0, 30, 'pepe4000', 'pepe4000@hotmail.com', '$2y$10$VaDsmNH6qMzv7AzUfVaQ7Osc/W8XFiz8hhs.aR6dtubzv9FjcrD3q', '', '', '', '', '', '', ''),
(0, 31, 'a', 'a@a.a', '$2y$10$jcpYrspMpGEK2cmcIQpCp.li1IR0WU06yzEqtgAYj7mesPF93I1di', '', '', '', '', '', '', ''),
(0, 32, '', 'pepe250@hotmail.com', '$2y$10$TE.PHGSVCJz9ugVsiMexI.w0tTEOo.dKGMBf.IyL4fc5Wfrw5cFmS', '', '', '', '', '', '', ''),
(0, 33, '', 'pepe400@hotmail.com', '$2y$10$nwovpH0ZM2RqcLRHI08XoeIqZUUQjES0cJDx0.SJtyc8Z/1n.xL0S', '', '', '', '', '', '', ''),
(0, 34, '', 'b@b.b', '$2y$10$lfIJsN6T7/yoRr9Qrjy2Vesw6.A4XigBfuD46o/8o8U1EoXL6zeW.', '', '', '', '', '', '', ''),
(1, 35, 'pep', 'pep@', '$2y$10$S6WiO61IU2rZ5lnvX7ZoMOkzfQjQ8wV3M1vNQwJ5.0XOH5tjO/KGW', '', '', '', '', '', '', ''),
(0, 36, 'pep', 'pep1@', '$2y$10$TXoWFRwsKEILDz8uwGoQcuYCzrLjMJBL9OAp8d.zbYxrY.prdQQ4S', '', '', '', '', '', '', ''),
(0, 37, 'pep11', 'pep11@', '$2y$10$kCKvyuxrluZPzt6UTYPV8uvx8qHsmK7Ge8KdY7U8WSjsXSGLJ2Ouq', '', '', '', '', '', '', ''),
(0, 38, '123', '123@', '$2y$10$hVpvyYsXq85SzKFMCWNKaeP/3a73KXMXj.oncTNMYv3iG4tuffuHq', '', '', '', '', '', '', ''),
(0, 39, 'jorge', 'pop@123', '$2y$10$uOQWBazB8G6pu/a9mzSzjuU52PVABEj4XW0mf4UxDIvxdRpntRGFq', '', '', '', '', '', '', ''),
(0, 40, 'pip', 'a@1234', '$2y$10$EAB7EW8L/3Lz5IrnMc8zk.XylR3kBKALJJIh.3sMFOtZDs7OS0tJO', 'femenino', '', '', '', '', '', ''),
(0, 41, 'pip', 'a@12345', '$2y$10$hTxbS2ysUo6li3Nmc8Jj5.lDfgOmQUXClnANLpZb3WJRoLJ62Z4fq', 'masculino', '', '', '', '', '', ''),
(0, 42, 'pip', 'a@123456', '$2y$10$tBqIjNM23nLkTOj8/GypievOgHXq/UnKkZOWy8CDKomdiIRv6AI1i', 'masculino', '', '', '', '', '', ''),
(0, 43, '123', 'asdasd@123', '$2y$10$a/mt/1D.exI6YfxzLgTkie.L1oZ96vqxYzJRePeJdptMR6UiWUS1C', 'femenino', '', '', '', '', '', ''),
(0, 44, '123', 'qwe@', '$2y$10$DBLQMUG2dO7ULbGnCJvCD.EMCUhxW/XK1w0W5KIX.CTPj5PnydR8a', 'femenino', '', '', '', '', '', ''),
(0, 45, '123131', 'jorgematiasangel@gmail.com', '$2y$10$.x1Ry8T4JoFJNDmlxmGPC.SSj6UD3C/kLFhxESBsaTFczWR53E/kG', 'masculino', '', '', '', '', '', ''),
(0, 46, 'pip', 'pip@', '$2y$10$.BCcs0xh/8C6/pt4NeR8MeYWfJKiIPVSDuiB3RXI/bSRZVxR.eOv2', 'masculino', 'asdasd', '', '', '', '', ''),
(1, 47, 'pop', 'pop@', '$2y$10$Z2jWMoRj2WTz5J6B2NRit.FUyUECyyIUir0X6Kd/Y9sb0Qnt5q8Qa', 'femenino', '', '12345', '11', '5017', 'siu', '548');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viaje paquete` (`id_paquete`),
  ADD KEY `usuario - venta` (`id_usuario`),
  ADD KEY `paquete - venta` (`id_paquete`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD CONSTRAINT `Suscripciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Suscripciones_ibfk_2` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
