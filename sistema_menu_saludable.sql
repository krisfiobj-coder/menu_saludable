-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2026 a las 03:42:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_menu_saludable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_platillos`
--

CREATE TABLE `catalogo_platillos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `ingredientes` text NOT NULL,
  `calorias` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo_platillos`
--

INSERT INTO `catalogo_platillos` (`id`, `nombre`, `categoria`, `ingredientes`, `calorias`, `imagen`) VALUES
(1, 'Ensalada Mediterránea con Pollo', 'Almuerzo', 'Espinaca, pechuga a la plancha, garbanzos, queso feta, aceitunas y aderezo de limón', 420, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(2, 'Ensalada Antiinflamatoria de Salmón', 'Cena', 'Rúcula, salmón a la plancha, camote asado, remolacha y nueces', 480, 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&auto=format&fit=crop'),
(3, 'Ensalada Proteica de Atún y Huevo', 'Almuerzo', 'Lechuga romana, atún en agua, huevo duro, tomates cherry y maíz', 390, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(4, 'Bowl Tex-Mex Saludable', 'Almuerzo', 'Mezcla de verdes, pollo en cubos, frijoles negros, maíz dulce y aguacate', 450, NULL),
(5, 'Bowl de Quinoa y Aguacate', 'Cena', 'Quinoa cocida, espinaca baby, aguacate, semillas de girasol y pepino', 360, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(6, 'Smoothie Bowl Verde Energético', 'Desayuno', 'Espinaca, manzana verde, leche de almendras, semillas de chía y plátano', 280, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(7, 'Pancakes de Avena y Plátano', 'Desayuno', 'Avena molida, plátano, clara de huevo y canela con frutos rojos', 310, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(8, 'Snack Crujiente de Manzana y Almendras', 'Snack', 'Lajas de manzana verde, mantequilla de almendras y semillas de calabaza', 200, 'https://images.unsplash.com/photo-1568721774095-4d4d830629a4?w=300&auto=format&fit=crop'),
(9, 'Pancakes de Avena y Banano', 'Desayuno', 'Avena molida, banano, claras de huevo, canela y frutos rojos', 320, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(10, 'Omeyette de Espinaca y Queso Feta', 'Desayuno', '2 huevos, espinaca fresca, tomates cherry, queso feta y tostada integral', 350, 'https://images.unsplash.com/photo-1510629954389-c1e0da47d414?w=300&auto=format&fit=crop'),
(11, 'Bowl de Yogurt Griego y Granola', 'Desayuno', 'Yogurt griego natural, granola artesanal, miel y semillas de chía', 290, 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=300&auto=format&fit=crop'),
(12, 'Ensalada Mediterránea de Atún', 'Almuerzo', 'Atún en agua, hojas verdes, tomate cherry, aceitunas negras y aguacate', 410, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(13, 'Ensalada Mixta con Queso Fresco', 'Almuerzo', 'Lechuga romana, tomate, maíz dulce, huevo duro, queso fresco y pechuga de pollo', 430, 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&auto=format&fit=crop'),
(14, 'Bowl Cítrico de Langostinos', 'Almuerzo', 'Langostinos a la parrilla, mix de verdes, gajos de naranja, aguacate y semillas de girasol', 380, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=300&auto=format&fit=crop'),
(15, 'Bowl Verde de Quinoa y Brotes', 'Cena', 'Vegetales de estación, brotes, pepino, aguacate y vinagreta de limón', 340, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(16, 'Ensalada Antiinflamatoria de Salmón', 'Cena', 'Rúcula, salmón a la plancha, camote asado, remolacha y nueces', 460, 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&auto=format&fit=crop'),
(17, 'Tazones de Garbanzos Rostizados', 'Cena', 'Garbanzos especiados, espinaca, pepino, pimentón asado y aderezo de tahini', 370, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(18, 'Snack de Manzana y Mantequilla de Almendras', 'Snack', 'Rodajas de manzana verde, mantequilla de almendras y semillas de calabaza', 210, 'https://images.unsplash.com/photo-1568721774095-4d4d830629a4?w=300&auto=format&fit=crop'),
(19, 'Waffles Integrales de Fruta', 'Desayuno', 'Waffles de avena, fresas, arándanos y miel de maple pura', 340, 'https://images.unsplash.com/photo-1562376552-0d160a2f238d?w=300&auto=format&fit=crop'),
(20, 'Tostadas de Aguacate y Huevo Poché', 'Desayuno', 'Pan de masa madre, aguacate triturado, huevo poché y semillas de sésamo', 360, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(21, 'Parrillada de Vegetales y Pollo', 'Almuerzo', 'Pechuga a las hierbas, calabacín, pimientos asados y papas rústicas', 450, 'https://images.unsplash.com/photo-1544025162-d76694265947?w=300&auto=format&fit=crop'),
(22, 'Tacos Saludables de Salmón', 'Almuerzo', 'Tortillas de maíz, salmón al sartén, pico de gallo y salsa de yogur', 420, 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=300&auto=format&fit=crop'),
(23, 'Pizza Fit con Base de Coliflor', 'Cena', 'Masa de coliflor, salsa de tomate casera, queso bajo en grasa y albahaca', 380, 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=300&auto=format&fit=crop'),
(24, 'Poke Bowl de Atún y Mango', 'Cena', 'Atún fresco, arroz integral, edamame, mango en cubos y pepino', 410, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=300&auto=format&fit=crop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `platillo` varchar(100) NOT NULL,
  `ingredientes` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `calorias` int(11) NOT NULL DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `dia`, `categoria`, `platillo`, `ingredientes`, `fecha_registro`, `calorias`, `imagen`) VALUES
(23, 'Lunes', 'Desayuno', 'Bowl de Yogurt Griego y Granola', 'Yogurt griego natural, granola artesanal, miel y semillas de chía', '2026-10-23 04:21:07', 290, 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=300&auto=format&fit=crop'),
(24, 'Lunes', 'Almuerzo', 'Bowl Cítrico de Langostinos', 'Langostinos a la parrilla, mix de verdes, gajos de naranja, aguacate y semillas de girasol', '2026-10-23 04:21:17', 380, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=300&auto=format&fit=crop'),
(25, 'Lunes', 'Cena', 'Bowl de Quinoa y Aguacate', 'Quinoa cocida, espinaca baby, aguacate, semillas de girasol y pepino', '2026-10-23 04:21:30', 360, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(26, 'Martes', 'Desayuno', 'Omeyette de Espinaca y Queso Feta', '2 huevos, espinaca fresca, tomates cherry, queso feta y tostada integral', '2026-10-23 04:21:46', 350, 'https://images.unsplash.com/photo-1510629954389-c1e0da47d414?w=300&auto=format&fit=crop'),
(27, 'Martes', 'Almuerzo', 'Bowl Tex-Mex Saludable', 'Mezcla de verdes, pollo en cubos, frijoles negros, maíz dulce y aguacate', '2026-10-23 04:21:59', 450, NULL),
(28, 'Martes', 'Cena', 'Bowl Verde de Quinoa y Brotes', 'Vegetales de estación, brotes, pepino, aguacate y vinagreta de limón', '2026-10-23 04:22:08', 340, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(29, 'Miércoles', 'Desayuno', 'Pancakes de Avena y Banano', 'Avena molida, banano, claras de huevo, canela y frutos rojos', '2026-10-23 04:22:30', 320, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(30, 'Miércoles', 'Almuerzo', 'Ensalada Mediterránea con Pollo', 'Espinaca, pechuga a la plancha, garbanzos, queso feta, aceitunas y aderezo de limón', '2026-10-23 04:22:41', 420, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(33, 'Miércoles', 'Cena', 'Ensalada Antiinflamatoria de Salmón', 'Rúcula, salmón a la plancha, camote asado, remolacha y nueces', '2026-10-23 04:24:14', 480, 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&auto=format&fit=crop'),
(34, 'Jueves', 'Desayuno', 'Pancakes de Avena y Plátano', 'Avena molida, plátano, clara de huevo y canela con frutos rojos', '2026-10-23 04:24:38', 310, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(35, 'Jueves', 'Almuerzo', 'Ensalada Mixta con Queso Fresco', 'Lechuga romana, tomate, maíz dulce, huevo duro, queso fresco y pechuga de pollo', '2026-10-23 04:25:19', 430, 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&auto=format&fit=crop'),
(36, 'Jueves', 'Cena', 'Ensalada Antiinflamatoria de Salmón', 'Rúcula, salmón a la plancha, camote asado, remolacha y nueces', '2026-10-23 04:25:31', 460, 'https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=300&auto=format&fit=crop'),
(37, 'Viernes', 'Desayuno', 'Smoothie Bowl Verde Energético', 'Espinaca, manzana verde, leche de almendras, semillas de chía y plátano', '2026-10-23 04:25:47', 280, 'https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?w=300&auto=format&fit=crop'),
(40, 'Viernes', 'Almuerzo', 'Ensalada Proteica de Atún y Huevo', 'Lechuga romana, atún en agua, huevo duro, tomates cherry y maíz', '2026-10-23 04:27:43', 390, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(41, 'Viernes', 'Cena', 'Tazones de Garbanzos Rostizados', 'Garbanzos especiados, espinaca, pepino, pimentón asado y aderezo de tahini', '2026-10-23 04:27:56', 370, 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&auto=format&fit=crop'),
(44, 'Sábado', 'Desayuno', 'Tostadas de Aguacate y Huevo Poché', 'Pan de masa madre, aguacate triturado, huevo poché y semillas de sésamo', '2026-10-23 04:30:33', 360, 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=300&auto=format&fit=crop'),
(45, 'Sábado', 'Almuerzo', 'Parrillada de Vegetales y Pollo', 'Pechuga a las hierbas, calabacín, pimientos asados y papas rústicas', '2026-10-23 04:30:48', 450, 'https://images.unsplash.com/photo-1544025162-d76694265947?w=300&auto=format&fit=crop'),
(46, 'Sábado', 'Snack', 'Snack Crujiente de Manzana y Almendras', 'Lajas de manzana verde, mantequilla de almendras y semillas de calabaza', '2026-10-23 04:30:59', 200, 'https://images.unsplash.com/photo-1568721774095-4d4d830629a4?w=300&auto=format&fit=crop'),
(47, 'Sábado', 'Cena', 'Poke Bowl de Atún y Mango', 'Atún fresco, arroz integral, edamame, mango en cubos y pepino', '2026-10-23 04:31:22', 410, 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=300&auto=format&fit=crop'),
(48, 'Domingo', 'Desayuno', 'Waffles Integrales de Fruta', 'Waffles de avena, fresas, arándanos y miel de maple pura', '2026-10-23 04:31:48', 340, 'https://images.unsplash.com/photo-1562376552-0d160a2f238d?w=300&auto=format&fit=crop'),
(49, 'Domingo', 'Almuerzo', 'Tacos Saludables de Salmón', 'Tortillas de maíz, salmón al sartén, pico de gallo y salsa de yogur', '2026-10-23 04:31:56', 420, 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=300&auto=format&fit=crop'),
(50, 'Domingo', 'Snack', 'Snack de Manzana y Mantequilla de Almendras', 'Rodajas de manzana verde, mantequilla de almendras y semillas de calabaza', '2026-10-23 04:32:03', 210, 'https://images.unsplash.com/photo-1568721774095-4d4d830629a4?w=300&auto=format&fit=crop'),
(51, 'Domingo', 'Cena', 'Pizza Fit con Base de Coliflor', 'Masa de coliflor, salsa de tomate casera, queso bajo en grasa y albahaca', '2026-10-23 04:32:15', 380, 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=300&auto=format&fit=crop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1e84a2mK2.S2V4vI9R5lO6pXW4y9Cq.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo_platillos`
--
ALTER TABLE `catalogo_platillos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo_platillos`
--
ALTER TABLE `catalogo_platillos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
