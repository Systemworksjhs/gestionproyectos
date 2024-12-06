-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2022 a las 08:13:05
-- Versión del servidor: 8.0.22
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agro_tic_narino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_Categoria` int NOT NULL,
  `nombre_Categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_Categoria`, `nombre_Categoria`) VALUES
(31, 'Hortalizas'),
(34, 'Leguminozas'),
(37, 'Cereales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Convocatoria'),
(4, 'Educativa'),
(5, 'Capacitación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `post_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `email`, `post_id`, `created_at`, `status`) VALUES
(1, 'Sebastian Bladimir Delgado Marcillo', 'Muy buena iniciativa', '1@narino.gov.co', 7, '2022-07-11 21:37:19', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `subregion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `name`, `subregion`) VALUES
(1, 'Alban San Jose', 11),
(2, 'Aldana', 8),
(3, 'Ancuya', 7),
(4, 'Arboleda Berruecos', 3),
(5, 'Barbacoas', 13),
(6, 'Belen', 11),
(7, 'Buesaco', 3),
(8, 'Chachagui', 1),
(9, 'Colon Genova', 11),
(10, 'Consaca', 7),
(11, 'Contadero', 8),
(12, 'Cordoba', 8),
(13, 'Cuaspud Carlosama', 8),
(14, 'Cumbal', 8),
(15, 'Cumbitara', 4),
(16, 'El Charco', 12),
(17, 'El Peñol', 2),
(18, 'El Rosario', 4),
(19, 'El Tablon de Gomez', 11),
(20, 'El Tambo', 2),
(21, 'Francisco Pizarro Salahonda', 9),
(22, 'Funes', 8),
(23, 'Guachucal', 8),
(24, 'Guaitarilla', 5),
(25, 'Gualmatan', 8),
(26, 'Iles', 8),
(27, 'Imues', 5),
(28, 'Ipiales', 8),
(29, 'La Cruz', 11),
(30, 'La Florida', 1),
(31, 'La Llanada', 2),
(32, 'La Tola', 12),
(33, 'La Union', 3),
(34, 'Leiva', 4),
(35, 'Linares', 7),
(36, 'Los Andes Sotomayor', 2),
(37, 'Magui Payan', 13),
(38, 'Mallama Piedrancha', 10),
(39, 'Mosquera', 12),
(40, 'Nariño', 1),
(41, 'Olaya Herrera Bocas de Satinga', 12),
(42, 'Ospina', 5),
(43, 'Policarpa', 4),
(44, 'Potosi', 8),
(45, 'Providencia', 6),
(46, 'Puerres', 8),
(47, 'Pupiales', 8),
(48, 'Ricaurte', 10),
(49, 'Roberto Payan', 13),
(50, 'Samaniego', 6),
(51, 'San Bernardo', 11),
(52, 'San Lorenzo', 3),
(53, 'San Pablo', 11),
(54, 'San Pedro de Cartago', 3),
(55, 'Sandona', 7),
(56, 'Santa Barbara Iscuande', 12),
(57, 'Santa Cruz Guachaves', 6),
(58, 'Sapuyes', 5),
(59, 'Taminango', 4),
(60, 'Tangua', 1),
(61, 'Tumaco', 9),
(62, 'Tuquerres', 5),
(63, 'Yacuanquer', 1),
(64, 'San Juan de Pasto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `brief` varchar(511) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `title`, `brief`, `content`, `image`, `created_at`, `status`, `category_id`) VALUES
(7, 'Noticia 1  Plataforma Agrotic', 'Introducción a la noticia 1 de Agrotic Nariño', 'Este es el contenido general de la noticia 1', NULL, '2022-07-11 19:05:40', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_dpto_narino`
--

CREATE TABLE `productos_dpto_narino` (
  `id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `municipioId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_dpto_narino`
--

INSERT INTO `productos_dpto_narino` (`id`, `nombre`, `municipioId`) VALUES
(1, 'Aceituna', 1),
(2, 'Arandanos', 1),
(3, 'Arveja', 1),
(4, 'Brocoli', 1),
(5, 'Cereza', 1),
(6, 'Fresa', 1),
(7, 'Haba', 1),
(8, 'Lenteja', 1),
(9, 'Limón', 1),
(10, 'Lulo', 1),
(11, 'Mora', 1),
(12, 'Papa amarilla', 1),
(13, 'Pera', 1),
(14, 'Pimenton', 1),
(15, 'Piña', 1),
(16, 'Sandia', 1),
(17, 'Ulloco', 1),
(18, 'Aceituna', 2),
(19, 'Cereza', 2),
(20, 'Fresa', 2),
(21, 'Haba', 2),
(22, 'Legumbres', 2),
(23, 'Limón', 2),
(24, 'Mango', 2),
(25, 'Manzana', 2),
(26, 'Papa amarilla', 2),
(27, 'Pera', 2),
(28, 'Piña', 2),
(29, 'Sandia', 2),
(30, 'Trigo', 2),
(31, 'Zanahoria', 2),
(32, 'Arveja', 3),
(33, 'Cereza', 3),
(34, 'Fresa', 3),
(35, 'Guayaba', 3),
(36, 'Haba', 3),
(37, 'Limón', 3),
(38, 'Manzana', 3),
(39, 'Melocoton', 3),
(40, 'Mora', 3),
(41, 'Naranja', 3),
(42, 'Papa amarilla', 3),
(43, 'Papayuela', 3),
(44, 'Pera', 3),
(45, 'Piña', 3),
(46, 'Sandia', 3),
(47, 'Toronja', 3),
(48, 'Zanahoria', 3),
(49, 'Caña', 4),
(50, 'Cereza', 4),
(51, 'Fresa', 4),
(52, 'Guayaba', 4),
(53, 'Haba', 4),
(54, 'Limón', 4),
(55, 'Lulo', 4),
(56, 'Manzana', 4),
(57, 'Melocoton', 4),
(58, 'Pera', 4),
(59, 'Piña', 4),
(60, 'Sandia', 4),
(61, 'Tomate', 4),
(62, 'Ulloco', 4),
(63, 'Yuca', 4),
(64, 'Zanahoria', 4),
(65, 'Aceituna', 5),
(66, 'Brocoli', 5),
(67, 'Cereza', 5),
(68, 'Ciruela', 5),
(69, 'Coliflor', 5),
(70, 'Fresa', 5),
(71, 'Haba', 5),
(72, 'Higo', 5),
(73, 'Lechuga', 5),
(74, 'Legumbres', 5),
(75, 'Maracuya', 5),
(76, 'Mora', 5),
(77, 'Pera', 5),
(78, 'Piña', 5),
(79, 'Sandia', 5),
(80, 'Toronja', 5),
(81, 'Uchuva', 5),
(82, 'Arveja', 6),
(83, 'Cebolla', 6),
(84, 'Cereza', 6),
(85, 'Coliflor', 6),
(86, 'Fresa', 6),
(87, 'Haba', 6),
(88, 'Lulo', 6),
(89, 'Maracuya', 6),
(90, 'Mora', 6),
(91, 'Pera', 6),
(92, 'Pimenton', 6),
(93, 'Piña', 6),
(94, 'Sandia', 6),
(95, 'Tomate de carne', 6),
(96, 'Ulloco', 6),
(97, 'Arandanos', 7),
(98, 'Arveja', 7),
(99, 'Caña', 7),
(100, 'Cereza', 7),
(101, 'Coliflor', 7),
(102, 'Fresa', 7),
(103, 'Guayaba', 7),
(104, 'Haba', 7),
(105, 'Lechuga', 7),
(106, 'Legumbres', 7),
(107, 'Lulo', 7),
(108, 'Mango', 7),
(109, 'Manzana', 7),
(110, 'Maracuya', 7),
(111, 'Melocoton', 7),
(112, 'Mora', 7),
(113, 'Papayuela', 7),
(114, 'Pera', 7),
(115, 'Piña', 7),
(116, 'Repollo', 7),
(117, 'Sandia', 7),
(118, 'Tomate', 7),
(119, 'Toronja', 7),
(120, 'Yuca', 7),
(121, 'Caña', 8),
(122, 'Cereza', 8),
(123, 'Fresa', 8),
(124, 'Haba', 8),
(125, 'Legumbres', 8),
(126, 'Lulo', 8),
(127, 'Mango', 8),
(128, 'Papayuela', 8),
(129, 'Pera', 8),
(130, 'Piña', 8),
(131, 'Sandia', 8),
(132, 'Tomate', 8),
(133, 'Ulloco', 8),
(134, 'Cebolla', 9),
(135, 'Cereza', 9),
(136, 'Ciruela', 9),
(137, 'Coliflor', 9),
(138, 'Fresa', 9),
(139, 'Haba', 9),
(140, 'Mora', 9),
(141, 'Papa amarilla', 9),
(142, 'Pera', 9),
(143, 'Pimenton', 9),
(144, 'Piña', 9),
(145, 'Sandia', 9),
(146, 'Tomate de carne', 9),
(147, 'Ulloco', 9),
(148, 'Café', 10),
(149, 'Cereza', 10),
(150, 'Ciruela', 10),
(151, 'Fresa', 10),
(152, 'Haba', 10),
(153, 'Limón', 10),
(154, 'Mandarina', 10),
(155, 'Mango', 10),
(156, 'Manzana', 10),
(157, 'Melocoton', 10),
(158, 'Mora', 10),
(159, 'Naranja', 10),
(160, 'Papa amarilla', 10),
(161, 'Papayuela', 10),
(162, 'Pera', 10),
(163, 'Sandia', 10),
(164, 'Toronja', 10),
(165, 'Ulloco', 10),
(166, 'Zanahoria', 10),
(167, 'Cebolla', 11),
(168, 'Cereza', 11),
(169, 'Ciruela', 11),
(170, 'Ciruela', 11),
(171, 'Fresa', 11),
(172, 'Frijol', 11),
(173, 'Haba', 11),
(174, 'Higo', 11),
(175, 'Lenteja', 11),
(176, 'Limón', 11),
(177, 'Mango', 11),
(178, 'Maracuya', 11),
(179, 'Mora', 11),
(180, 'Papa amarilla', 11),
(181, 'Pera', 11),
(182, 'Pimenton', 11),
(183, 'Piña', 11),
(184, 'Repollo', 11),
(185, 'Sandia', 11),
(186, 'Uchuva', 11),
(187, 'Ulloco', 11),
(188, 'Zanahoria', 11),
(189, 'Cebolla', 12),
(190, 'Cereza', 12),
(191, 'Ciruela', 12),
(192, 'Ciruela', 12),
(193, 'Fresa', 12),
(194, 'Haba', 12),
(195, 'Limón', 12),
(196, 'Mango', 12),
(197, 'Maracuya', 12),
(198, 'Mora', 12),
(199, 'Pera', 12),
(200, 'Piña', 12),
(201, 'Remolacha', 12),
(202, 'Repollo', 12),
(203, 'Sandia', 12),
(204, 'Tomate de carne', 12),
(205, 'Trigo', 12),
(206, 'Uchuva', 12),
(207, 'Uchuva', 12),
(208, 'Ulloco', 12),
(209, 'Zanahoria', 12),
(210, 'Cereza', 13),
(211, 'Fresa', 13),
(212, 'Guayaba', 13),
(213, 'Haba', 13),
(214, 'Limón', 13),
(215, 'Mango', 13),
(216, 'Manzana', 13),
(217, 'Melocoton', 13),
(218, 'Pera', 13),
(219, 'Piña', 13),
(220, 'Sandia', 13),
(221, 'Yuca', 13),
(222, 'Zanahoria', 13),
(223, 'Aceituna', 14),
(224, 'Cebolla', 14),
(225, 'Cereza', 14),
(226, 'Fresa', 14),
(227, 'Frijol', 14),
(228, 'Guayaba', 14),
(229, 'Haba', 14),
(230, 'Mango', 14),
(231, 'Manzana', 14),
(232, 'Mora', 14),
(233, 'Pera', 14),
(234, 'Piña', 14),
(235, 'Plátano', 14),
(236, 'Sandia', 14),
(237, 'Toronja', 14),
(238, 'Uchuva', 14),
(239, 'Yuca', 14),
(240, 'Arveja', 15),
(241, 'Cereza', 15),
(242, 'Fresa', 15),
(243, 'Guayaba', 15),
(244, 'Haba', 15),
(245, 'Limón', 15),
(246, 'Mandarina', 15),
(247, 'Mora', 15),
(248, 'Papa amarilla', 15),
(249, 'Pera', 15),
(250, 'Sandia', 15),
(251, 'Toronja', 15),
(252, 'Uchuva', 15),
(253, 'Yuca', 15),
(254, 'Zanahoria', 15),
(255, 'Ajo', 16),
(256, 'Brocoli', 16),
(257, 'Cereza', 16),
(258, 'Coco', 16),
(259, 'Fresa', 16),
(260, 'Haba', 16),
(261, 'Legumbres', 16),
(262, 'Mora', 16),
(263, 'Pera', 16),
(264, 'Piña', 16),
(265, 'Sandia', 16),
(266, 'Uchuva', 16),
(267, 'Aguacate', 17),
(268, 'Cereza', 17),
(269, 'Fresa', 17),
(270, 'Guayaba', 17),
(271, 'Haba', 17),
(272, 'Legumbres', 17),
(273, 'Manzana', 17),
(274, 'Papa amarilla', 17),
(275, 'Pera', 17),
(276, 'Piña', 17),
(277, 'Sandia', 17),
(278, 'Zanahoria', 17),
(279, 'Arveja', 18),
(280, 'Cereza', 18),
(281, 'Fresa', 18),
(282, 'Haba', 18),
(283, 'Limón', 18),
(284, 'Mora', 18),
(285, 'Papa amarilla', 18),
(286, 'Pera', 18),
(287, 'Piña', 18),
(288, 'Repollo', 18),
(289, 'Sandia', 18),
(290, 'Uchuva', 18),
(291, 'Ulloco', 18),
(292, 'Zanahoria', 18),
(293, 'Aceituna', 19),
(294, 'Arandanos', 19),
(295, 'Arveja', 19),
(296, 'Cereza', 19),
(297, 'Fresa', 19),
(298, 'Haba', 19),
(299, 'Limón', 19),
(300, 'Mora', 19),
(301, 'Papa amarilla', 19),
(302, 'Papayuela', 19),
(303, 'Pera', 19),
(304, 'Piña', 19),
(305, 'Repollo', 19),
(306, 'Sandia', 19),
(307, 'Ulloco', 19),
(308, 'Zanahoria', 19),
(309, 'Cereza', 20),
(310, 'Coliflor', 20),
(311, 'Fresa', 20),
(312, 'Guayaba', 20),
(313, 'Haba', 20),
(314, 'Limón', 20),
(315, 'Limón', 20),
(316, 'Manzana', 20),
(317, 'Maracuya', 20),
(318, 'Melocoton', 20),
(319, 'Mora', 20),
(320, 'Papayuela', 20),
(321, 'Pera', 20),
(322, 'Piña', 20),
(323, 'Sandia', 20),
(324, 'Tomate', 20),
(325, 'Tomate de carne', 20),
(326, 'Trigo', 20),
(327, 'Zanahoria', 20),
(328, 'Brocoli', 21),
(329, 'Cereza', 21),
(330, 'Coliflor', 21),
(331, 'Fresa', 21),
(332, 'Haba', 21),
(333, 'Higo', 21),
(334, 'Legumbres', 21),
(335, 'Maracuya', 21),
(336, 'Mora', 21),
(337, 'Papa amarilla', 21),
(338, 'Pera', 21),
(339, 'Piña', 21),
(340, 'Sandia', 21),
(341, 'Tomate de carne', 21),
(342, 'Arveja', 22),
(343, 'Cereza', 22),
(344, 'Ciruela', 22),
(345, 'Coliflor', 22),
(346, 'Fresa', 22),
(347, 'Haba', 22),
(348, 'Higo', 22),
(349, 'Limón', 22),
(350, 'Mango', 22),
(351, 'Mora', 22),
(352, 'Papa amarilla', 22),
(353, 'Pera', 22),
(354, 'Piña', 22),
(355, 'Remolacha', 22),
(356, 'Sandia', 22),
(357, 'Tomate de carne', 22),
(358, 'Zanahoria', 22),
(359, 'Aceituna', 23),
(360, 'Arandanos', 23),
(361, 'Cereza', 23),
(362, 'Coliflor', 23),
(363, 'Fresa', 23),
(364, 'Haba', 23),
(365, 'Limón', 23),
(366, 'Mango', 23),
(367, 'Maracuya', 23),
(368, 'Melocoton', 23),
(369, 'Mora', 23),
(370, 'Papayuela', 23),
(371, 'Pera', 23),
(372, 'Piña', 23),
(373, 'Plátano', 23),
(374, 'Repollo', 23),
(375, 'Sandia', 23),
(376, 'Toronja', 23),
(377, 'Trigo', 23),
(378, 'Zanahoria', 23),
(379, 'Arandanos', 24),
(380, 'Cereza', 24),
(381, 'Ciruela', 24),
(382, 'Coliflor', 24),
(383, 'Fresa', 24),
(384, 'Haba', 24),
(385, 'Limón', 24),
(386, 'Mango', 24),
(387, 'Manzana', 24),
(388, 'Mora', 24),
(389, 'Papa amarilla', 24),
(390, 'Pera', 24),
(391, 'Piña', 24),
(392, 'Sandia', 24),
(393, 'Zanahoria', 24),
(394, 'Arandanos', 25),
(395, 'Cebolla', 25),
(396, 'Cereza', 25),
(397, 'Ciruela', 25),
(398, 'Fresa', 25),
(399, 'Frijol', 25),
(400, 'Haba', 25),
(401, 'Higo', 25),
(402, 'Lenteja', 25),
(403, 'Limón', 25),
(404, 'Mango', 25),
(405, 'Papa amarilla', 25),
(406, 'Pera', 25),
(407, 'Piña', 25),
(408, 'Repollo', 25),
(409, 'Sandia', 25),
(410, 'Tomate de carne', 25),
(411, 'Uchuva', 25),
(412, 'Zanahoria', 25),
(413, 'Arandanos', 26),
(414, 'Cebolla', 26),
(415, 'Cebolla', 26),
(416, 'Cereza', 26),
(417, 'Ciruela', 26),
(418, 'Fresa', 26),
(419, 'Haba', 26),
(420, 'Higo', 26),
(421, 'Lenteja', 26),
(422, 'Limón', 26),
(423, 'Lulo', 26),
(424, 'Mango', 26),
(425, 'Maracuya', 26),
(426, 'Mora', 26),
(427, 'Pera', 26),
(428, 'Piña', 26),
(429, 'Repollo', 26),
(430, 'Sandia', 26),
(431, 'Uchuva', 26),
(432, 'Uchuva', 26),
(433, 'Ulloco', 26),
(434, 'Zanahoria', 26),
(435, 'Arandanos', 27),
(436, 'Arveja', 27),
(437, 'Cereza', 27),
(438, 'Haba', 27),
(439, 'Lechuga', 27),
(440, 'Limón', 27),
(441, 'Lulo', 27),
(442, 'Mango', 27),
(443, 'Mora', 27),
(444, 'Papa amarilla', 27),
(445, 'Pera', 27),
(446, 'Piña', 27),
(447, 'Sandia', 27),
(448, 'Uchuva', 27),
(449, 'Ulloco', 27),
(450, 'Zanahoria', 27),
(451, 'Aceituna', 28),
(452, 'Brocoli', 28),
(453, 'Cereza', 28),
(454, 'Ciruela', 28),
(455, 'Haba', 28),
(456, 'Mango', 28),
(457, 'Mora', 28),
(458, 'Papayuela', 28),
(459, 'Pera', 28),
(460, 'Piña', 28),
(461, 'Sandia', 28),
(462, 'Tomate de carne', 28),
(463, 'Ulloco', 28),
(464, 'Zanahoria', 28),
(465, 'Aceituna', 29),
(466, 'Arandanos', 29),
(467, 'Arveja', 29),
(468, 'Cebolla', 29),
(469, 'Cereza', 29),
(470, 'Ciruela', 29),
(471, 'Coliflor', 29),
(472, 'Fresa', 29),
(473, 'Guayaba', 29),
(474, 'Haba', 29),
(475, 'Lechuga', 29),
(476, 'Limón', 29),
(477, 'Lulo', 29),
(478, 'Mora', 29),
(479, 'Papa amarilla', 29),
(480, 'Pera', 29),
(481, 'Pimenton', 29),
(482, 'Piña', 29),
(483, 'Sandia', 29),
(484, 'Zanahoria', 29),
(485, 'Aceituna', 30),
(486, 'Aceituna', 30),
(487, 'Cereza', 30),
(488, 'Ciruela', 30),
(489, 'Coco', 30),
(490, 'Fresa', 30),
(491, 'Haba', 30),
(492, 'Mango', 30),
(493, 'Melocoton', 30),
(494, 'Mora', 30),
(495, 'Papa amarilla', 30),
(496, 'Papayuela', 30),
(497, 'Pera', 30),
(498, 'Pimenton', 30),
(499, 'Piña', 30),
(500, 'Sandia', 30),
(501, 'Tomate de carne', 30),
(502, 'Ulloco', 30),
(503, 'Aguacate', 31),
(504, 'Cereza', 31),
(505, 'Fresa', 31),
(506, 'Haba', 31),
(507, 'Mora', 31),
(508, 'Papa amarilla', 31),
(509, 'Pera', 31),
(510, 'Pimenton', 31),
(511, 'Piña', 31),
(512, 'Sandia', 31),
(513, 'Tomate', 31),
(514, 'Ulloco', 31),
(515, 'Brocoli', 32),
(516, 'Cereza', 32),
(517, 'Fresa', 32),
(518, 'Haba', 32),
(519, 'Legumbres', 32),
(520, 'Mora', 32),
(521, 'Papa amarilla', 32),
(522, 'Pera', 32),
(523, 'Pimenton', 32),
(524, 'Piña', 32),
(525, 'Sandia', 32),
(526, 'Cereza', 33),
(527, 'Ciruela', 33),
(528, 'Coco', 33),
(529, 'Fresa', 33),
(530, 'Guayaba', 33),
(531, 'Haba', 33),
(532, 'Habichuela', 33),
(533, 'Lechuga', 33),
(534, 'Legumbres', 33),
(535, 'Limón', 33),
(536, 'Lulo', 33),
(537, 'Manzana', 33),
(538, 'Papa amarilla', 33),
(539, 'Papayuela', 33),
(540, 'Pera', 33),
(541, 'Pimenton', 33),
(542, 'Piña', 33),
(543, 'Sandia', 33),
(544, 'Tomate', 33),
(545, 'Ulloco', 33),
(546, 'Yuca', 33),
(547, 'Zanahoria', 33),
(548, 'Arandanos', 34),
(549, 'Cereza', 34),
(550, 'Fresa', 34),
(551, 'Haba', 34),
(552, 'Legumbres', 34),
(553, 'Papa amarilla', 34),
(554, 'Pera', 34),
(555, 'Piña', 34),
(556, 'Sandia', 34),
(557, 'Uchuva', 34),
(558, 'Arveja', 35),
(559, 'Cereza', 35),
(560, 'Ciruela', 35),
(561, 'Fresa', 35),
(562, 'Haba', 35),
(563, 'Limón', 35),
(564, 'Manzana', 35),
(565, 'Melocoton', 35),
(566, 'Mora', 35),
(567, 'Naranja', 35),
(568, 'Papa amarilla', 35),
(569, 'Pera', 35),
(570, 'Piña', 35),
(571, 'Sandia', 35),
(572, 'Zanahoria', 35),
(573, 'Arveja', 36),
(574, 'Cereza', 36),
(575, 'Fresa', 36),
(576, 'Guayaba', 36),
(577, 'Haba', 36),
(578, 'Limón', 36),
(579, 'Manzana', 36),
(580, 'Manzana', 36),
(581, 'Mora', 36),
(582, 'Papa amarilla', 36),
(583, 'Papaya', 36),
(584, 'Pera', 36),
(585, 'Piña', 36),
(586, 'Repollo', 36),
(587, 'Sandia', 36),
(588, 'Tomate de carne', 36),
(589, 'Uchuva', 36),
(590, 'Zanahoria', 36),
(591, 'Fresa', 37),
(592, 'Higo', 37),
(593, 'Melocoton', 37),
(594, 'Mora', 37),
(595, 'Piña', 37),
(596, 'Tomate de carne', 37),
(597, 'Cereza', 38),
(598, 'Ciruela', 38),
(599, 'Fresa', 38),
(600, 'Haba', 38),
(601, 'Maracuya', 38),
(602, 'Melocoton', 38),
(603, 'Mora', 38),
(604, 'Pera', 38),
(605, 'Piña', 38),
(606, 'Repollo', 38),
(607, 'Sandia', 38),
(608, 'Ulloco', 38),
(609, 'Brocoli', 39),
(610, 'Cereza', 39),
(611, 'Fresa', 39),
(612, 'Haba', 39),
(613, 'Legumbres', 39),
(614, 'Maracuya', 39),
(615, 'Mora', 39),
(616, 'Papa amarilla', 39),
(617, 'Pera', 39),
(618, 'Piña', 39),
(619, 'Sandia', 39),
(620, 'Cereza', 40),
(621, 'Fresa', 40),
(622, 'Haba', 40),
(623, 'Higo', 40),
(624, 'Legumbres', 40),
(625, 'Limón', 40),
(626, 'Mandarina', 40),
(627, 'Mango', 40),
(628, 'Papa amarilla', 40),
(629, 'Pera', 40),
(630, 'Piña', 40),
(631, 'Sandia', 40),
(632, 'Ulloco', 40),
(633, 'Zanahoria', 40),
(634, 'Brocoli', 41),
(635, 'Cereza', 41),
(636, 'Fresa', 41),
(637, 'Haba', 41),
(638, 'Legumbres', 41),
(639, 'Mora', 41),
(640, 'Papa amarilla', 41),
(641, 'Pera', 41),
(642, 'Piña', 41),
(643, 'Sandia', 41),
(644, 'Ulloco', 41),
(645, 'Ajo', 42),
(646, 'Cereza', 42),
(647, 'Coliflor', 42),
(648, 'Fresa', 42),
(649, 'Guayaba', 42),
(650, 'Haba', 42),
(651, 'Legumbres', 42),
(652, 'Mango', 42),
(653, 'Papa amarilla', 42),
(654, 'Papaya', 42),
(655, 'Pera', 42),
(656, 'Piña', 42),
(657, 'Sandia', 42),
(658, 'Tomate de carne', 42),
(659, 'Uchuva', 42),
(660, 'Cereza', 43),
(661, 'Fresa', 43),
(662, 'Guayaba', 43),
(663, 'Haba', 43),
(664, 'Legumbres', 43),
(665, 'Limón', 43),
(666, 'Papa amarilla', 43),
(667, 'Pera', 43),
(668, 'Piña', 43),
(669, 'Repollo', 43),
(670, 'Sandia', 43),
(671, 'Uchuva', 43),
(672, 'Zanahoria', 43),
(673, 'Cebolla', 44),
(674, 'Cereza', 44),
(675, 'Ciruela', 44),
(676, 'Fresa', 44),
(677, 'Frijol', 44),
(678, 'Haba', 44),
(679, 'Limón', 44),
(680, 'Mango', 44),
(681, 'Papa amarilla', 44),
(682, 'Pera', 44),
(683, 'Piña', 44),
(684, 'Plátano', 44),
(685, 'Remolacha', 44),
(686, 'Sandia', 44),
(687, 'Tomate de carne', 44),
(688, 'Uchuva', 44),
(689, 'Zanahoria', 44),
(690, 'Arveja', 45),
(691, 'Cereza', 45),
(692, 'Fresa', 45),
(693, 'Haba', 45),
(694, 'Limón', 45),
(695, 'Mandarina', 45),
(696, 'Melocoton', 45),
(697, 'Papa amarilla', 45),
(698, 'Pera', 45),
(699, 'Piña', 45),
(700, 'Sandia', 45),
(701, 'Zanahoria', 45),
(702, 'Cereza', 46),
(703, 'Fresa', 46),
(704, 'Haba', 46),
(705, 'Legumbres', 46),
(706, 'Limón', 46),
(707, 'Mango', 46),
(708, 'Maracuya', 46),
(709, 'Papa amarilla', 46),
(710, 'Pera', 46),
(711, 'Piña', 46),
(712, 'Remolacha', 46),
(713, 'Sandia', 46),
(714, 'Tomate de carne', 46),
(715, 'Toronja', 46),
(716, 'Uchuva', 46),
(717, 'Zanahoria', 46),
(718, 'Cebolla', 47),
(719, 'Cereza', 47),
(720, 'Ciruela', 47),
(721, 'Fresa', 47),
(722, 'Haba', 47),
(723, 'Lechuga', 47),
(724, 'Legumbres', 47),
(725, 'Lenteja', 47),
(726, 'Limón', 47),
(727, 'Mango', 47),
(728, 'Maracuya', 47),
(729, 'Mora', 47),
(730, 'Papa amarilla', 47),
(731, 'Pera', 47),
(732, 'Piña', 47),
(733, 'Sandia', 47),
(734, 'Tomate de carne', 47),
(735, 'Uchuva', 47),
(736, 'Zanahoria', 47),
(737, 'Ajo', 48),
(738, 'Cereza', 48),
(739, 'Fresa', 48),
(740, 'Haba', 48),
(741, 'Lechuga', 48),
(742, 'Melocoton', 48),
(743, 'Mora', 48),
(744, 'Pera', 48),
(745, 'Piña', 48),
(746, 'Sandia', 48),
(747, 'Uchuva', 48),
(748, 'Uchuva', 48),
(749, 'Ulloco', 48),
(750, 'Brocoli', 49),
(751, 'Cereza', 49),
(752, 'Fresa', 49),
(753, 'Haba', 49),
(754, 'Higo', 49),
(755, 'Legumbres', 49),
(756, 'Melocoton', 49),
(757, 'Mora', 49),
(758, 'Pera', 49),
(759, 'Piña', 49),
(760, 'Sandia', 49),
(761, 'Uchuva', 49),
(762, 'Café', 50),
(763, 'Fresa', 50),
(764, 'Lechuga', 50),
(765, 'Legumbres', 50),
(766, 'Manzana', 50),
(767, 'Maracuya', 50),
(768, 'Melocoton', 50),
(769, 'Mora', 50),
(770, 'Papa amarilla', 50),
(771, 'Piña', 50),
(772, 'Uchuva', 50),
(773, 'Aceituna', 51),
(774, 'Arandanos', 51),
(775, 'Arveja', 51),
(776, 'Caña', 51),
(777, 'Cereza', 51),
(778, 'Fresa', 51),
(779, 'Guayaba', 51),
(780, 'Haba', 51),
(781, 'Limón', 51),
(782, 'Mandarina', 51),
(783, 'Maracuya', 51),
(784, 'Papayuela', 51),
(785, 'Pera', 51),
(786, 'Pimenton', 51),
(787, 'Piña', 51),
(788, 'Sandia', 51),
(789, 'Uchuva', 51),
(790, 'Yuca', 51),
(791, 'Zanahoria', 51),
(792, 'Aceituna', 52),
(793, 'Cereza', 52),
(794, 'Fresa', 52),
(795, 'Haba', 52),
(796, 'Melocoton', 52),
(797, 'Mora', 52),
(798, 'Pera', 52),
(799, 'Piña', 52),
(800, 'Sandia', 52),
(801, 'Aceituna', 53),
(802, 'Arandanos', 53),
(803, 'Cebolla', 53),
(804, 'Cereza', 53),
(805, 'Coliflor', 53),
(806, 'Fresa', 53),
(807, 'Haba', 53),
(808, 'Limón', 53),
(809, 'Lulo', 53),
(810, 'Mora', 53),
(811, 'Pera', 53),
(812, 'Pimenton', 53),
(813, 'Piña', 53),
(814, 'Repollo', 53),
(815, 'Sandia', 53),
(816, 'Tomate de carne', 53),
(817, 'Zanahoria', 53),
(818, 'Aceituna', 54),
(819, 'Arandanos', 54),
(820, 'Cereza', 54),
(821, 'Coco', 54),
(822, 'Fresa', 54),
(823, 'Haba', 54),
(824, 'Legumbres', 54),
(825, 'Manzana', 54),
(826, 'Melocoton', 54),
(827, 'Mora', 54),
(828, 'Pera', 54),
(829, 'Pimenton', 54),
(830, 'Piña', 54),
(831, 'Repollo', 54),
(832, 'Sandia', 54),
(833, 'Tomate', 54),
(834, 'Ulloco', 54),
(835, 'Arveja', 55),
(836, 'Cereza', 55),
(837, 'Fresa', 55),
(838, 'Haba', 55),
(839, 'Lulo', 55),
(840, 'Manzana', 55),
(841, 'Melocoton', 55),
(842, 'Mora', 55),
(843, 'Papa amarilla', 55),
(844, 'Pera', 55),
(845, 'Piña', 55),
(846, 'Sandia', 55),
(847, 'Tomate', 55),
(848, 'Tomate de carne', 55),
(849, 'Toronja', 55),
(850, 'Ulloco', 55),
(851, 'Brocoli', 56),
(852, 'Cereza', 56),
(853, 'Fresa', 56),
(854, 'Haba', 56),
(855, 'Legumbres', 56),
(856, 'Mora', 56),
(857, 'Papa amarilla', 56),
(858, 'Pera', 56),
(859, 'Piña', 56),
(860, 'Sandia', 56),
(861, 'Arveja', 57),
(862, 'Cereza', 57),
(863, 'Haba', 57),
(864, 'Legumbres', 57),
(865, 'Mandarina', 57),
(866, 'Manzana', 57),
(867, 'Papa amarilla', 57),
(868, 'Pera', 57),
(869, 'Piña', 57),
(870, 'Sandia', 57),
(871, 'Cereza', 58),
(872, 'Fresa', 58),
(873, 'Guayaba', 58),
(874, 'Haba', 58),
(875, 'Lechuga', 58),
(876, 'Mango', 58),
(877, 'Melocoton', 58),
(878, 'Papa amarilla', 58),
(879, 'Pera', 58),
(880, 'Piña', 58),
(881, 'Sandia', 58),
(882, 'Ulloco', 58),
(883, 'Caña', 59),
(884, 'Cereza', 59),
(885, 'Fresa', 59),
(886, 'Guayaba', 59),
(887, 'Haba', 59),
(888, 'Legumbres', 59),
(889, 'Limón', 59),
(890, 'Lulo', 59),
(891, 'Mora', 59),
(892, 'Papa amarilla', 59),
(893, 'Pera', 59),
(894, 'Piña', 59),
(895, 'Sandia', 59),
(896, 'Uchuva', 59),
(897, 'Ulloco', 59),
(898, 'Yuca', 59),
(899, 'Zanahoria', 59),
(900, 'Arveja', 60),
(901, 'Café', 60),
(902, 'Cereza', 60),
(903, 'Coco', 60),
(904, 'Fresa', 60),
(905, 'Frijol', 60),
(906, 'Haba', 60),
(907, 'Lechuga', 60),
(908, 'Limón', 60),
(909, 'Mango', 60),
(910, 'Maracuya', 60),
(911, 'Mora', 60),
(912, 'Papayuela', 60),
(913, 'Pera', 60),
(914, 'Piña', 60),
(915, 'Sandia', 60),
(916, 'Uchuva', 60),
(917, 'Uchuva', 60),
(918, 'Zanahoria', 60),
(919, 'Brocoli', 61),
(920, 'Guayaba', 61),
(921, 'Higo', 61),
(922, 'Papaya', 61),
(923, 'Papayuela', 61),
(924, 'Piña', 61),
(925, 'Uchuva', 61),
(926, 'Ajo', 62),
(927, 'Arandanos', 62),
(928, 'Brocoli', 62),
(929, 'Cereza', 62),
(930, 'Fresa', 62),
(931, 'Guayaba', 62),
(932, 'Guayaba', 62),
(933, 'Haba', 62),
(934, 'Lechuga', 62),
(935, 'Lulo', 62),
(936, 'Mango', 62),
(937, 'Papa', 62),
(938, 'Papaya', 62),
(939, 'Pera', 62),
(940, 'Piña', 62),
(941, 'Sandia', 62),
(942, 'Tomate de carne', 62),
(943, 'Uchuva', 62),
(944, 'Ulloco', 62),
(945, 'Arandanos', 63),
(946, 'Arveja', 63),
(947, 'Cereza', 63),
(948, 'Fresa', 63),
(949, 'Haba', 63),
(950, 'Maíz', 63),
(951, 'Mango', 63),
(952, 'Mora', 63),
(953, 'Papa amarilla', 63),
(954, 'Pera', 63),
(955, 'Piña', 63),
(956, 'Sandia', 63),
(957, 'Cebada', 64),
(958, 'Cereza', 64),
(959, 'Guayaba', 64),
(960, 'Haba', 64),
(961, 'Legumbres', 64),
(962, 'Madarina', 64),
(963, 'Mango', 64),
(964, 'Mora', 64),
(965, 'Papayuela', 64),
(966, 'Pera', 64),
(967, 'Piña', 64),
(968, 'Sandia', 64),
(969, 'Tomate de carne', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_plazas`
--

CREATE TABLE `productos_plazas` (
  `id_Producto` int NOT NULL,
  `nombre_Producto` varchar(60) NOT NULL,
  `clase` varchar(60) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `unit_of_measurement` varchar(20) NOT NULL,
  `estado` int DEFAULT NULL,
  `fecha_Creacion` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_plazas`
--

INSERT INTO `productos_plazas` (`id_Producto`, `nombre_Producto`, `clase`, `imagen`, `price`, `unit_of_measurement`, `estado`, `fecha_Creacion`, `date_update`) VALUES
(32, 'Cereza', 'Frutas', 'carousel-producto-5.jpg', 123, 'Onzas', 1, NULL, NULL),
(33, 'Naranjas', 'Frutas', 'carousel-producto-6.jpg', 2000, 'Gramos', 1, NULL, NULL),
(34, 'Fresas', 'Frutas', 'carousel-producto-8.jpg', 1000, 'Kilogramos', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text_botton` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url_botton` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `style_botton` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int NOT NULL,
  `order_slider` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `url_image`, `text_botton`, `url_botton`, `style_botton`, `status`, `order_slider`, `created_at`) VALUES
(1, 'Prueba 1 con el slider', 'EL resto es muy grande con el slider 1. mi primer slider programado', 'slider-1.png', 'Ver ahora', 's1_Conectado', 'warning', 1, 1, '2021-07-12 17:08:08'),
(2, 'Prueba 2 con el slider 2', 'EL resto es muy grande con el slider 2. mi primer slider programado', 'slider-2.png\r\n', 'Atrévete!', 's2_Seguro', 'warning', 1, 2, '2021-07-06 17:08:16'),
(3, 'Prueba real Slider 3', 'A tráves de este, terminamos la programación crud.\r\n\r\nSliderfinla', 'slider-3.png', 'Visítanos!', 'www.narino.gov.co', 'info', 1, 3, '2021-07-04 17:08:25'),
(7, 'Prueba real Slider 4', 'A través de éste, terminamos la programación crud.\r\n\r\nSlider finalsi está... ', 'slider-4.png', 'Compártelo!', 'www.narino.gov.co', 'danger', 1, 4, '2021-07-12 17:08:35'),
(8, 'Prueba real Slider 5', 'Final final no va más, terminamos la programación crud.\r\n\r\nSlider final', 'slider-5.png', 'Ver ahora!', 'www.narino.gov.co', 'info', 1, 4, '2021-07-20 17:08:48'),
(22, 'Por fin Listo todo OK slider', 'Por fin, esto se ha complicado un poquitillo, pero lo he logrado', 'slider-6.png', 'Visítanos', 'www.narino.gov.co', 'success', 1, 1, '2021-07-22 17:47:02'),
(27, 'Cambio variables', 'Se ajustan las nuevas variablae para administrar todo el Admin', 'slide_4.jpg', 'Ver ahora!', 'Cambio variables', 'warning', 1, 1, '2021-07-24 10:16:15'),
(28, 'r43r34r3rr34r34r34', 'r43r4r r4r43r34', 'universo.jpg', 'Ver ahora!', '', 'info', 0, 1, '2021-08-26 08:05:25'),
(29, 'r43r34r3rr34r34r34', 'r43r4r r4r43r34', 'universo.jpg', 'Ver ahora!', '', 'info', 0, 1, '2021-08-26 08:05:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1',
  `kind` int DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `image`, `status`, `kind`, `created_at`) VALUES
(1, 'Administrator', 'Web Master', 'admin', '1@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2022-07-09 11:45:13'),
(2, 'Sebastian', 'Delgado', 'superadmin', '2@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, 1, 1, '2022-07-08 11:45:13'),
(3, 'Duvan', 'Muñoz', 'administrator', '3@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, 1, 1, '2022-07-08 11:45:13'),
(4, 'Diana Carolina', 'Guerrero Acosta', 'dianaguerrero', '4@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, 1, 1, '2022-07-08 11:45:13'),
(5, 'Mauricio Arbey', 'Fajardo Figueroa', 'mauriciofajardo', '5@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2022-07-08 11:45:13'),
(6, 'Edgar Fernando', 'Parra Ortega', 'edgarparra', '6@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, 1, 1, '2022-07-08 11:45:13'),
(8, 'Wilson Alirio', 'Ruales Mendez', 'wilsonruales', '7@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, 1, 1, '2022-07-08 11:45:13'),
(9, 'Andrea Lorena', 'Burbano Mesías', 'andreaburbano', '8@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, 1, 1, '2022-07-08 11:45:13'),
(10, 'Isabella', 'Montenegro López', 'isabellamontenegro', '9@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2022-07-08 11:45:13'),
(11, 'Ginna Natalia', 'Barragán Yaqueno', 'ginnabarragan', '10@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', NULL, 1, 1, '2022-07-08 11:45:13'),
(13, 'Soany Karola', 'Eraso grisales', 'soanyeraso', '11@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, 1, 1, '2022-07-08 11:45:13'),
(14, 'Uno', 'Dos', 'trestres', 'cuatro@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', NULL, 0, 1, '2022-07-10 11:19:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `ultima_session` datetime DEFAULT NULL,
  `activacion` int NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int DEFAULT '0',
  `id_tipo` int NOT NULL,
  `identificacion` varchar(13) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `productos_dpto_narino`
--
ALTER TABLE `productos_dpto_narino`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_plazas`
--
ALTER TABLE `productos_plazas`
  ADD PRIMARY KEY (`id_Producto`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_Categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos_dpto_narino`
--
ALTER TABLE `productos_dpto_narino`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- AUTO_INCREMENT de la tabla `productos_plazas`
--
ALTER TABLE `productos_plazas`
  MODIFY `id_Producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
