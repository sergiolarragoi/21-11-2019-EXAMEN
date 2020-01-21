-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 11:59:21
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2aw3_agenda_ikasleak`
--
CREATE DATABASE IF NOT EXISTS `2aw3_agenda_ikasleak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2aw3_agenda_ikasleak`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllContacts` ()  NO SQL
SELECT * FROM contacts$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllGroups` ()  NO SQL
SELECT * FROM groups$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spContactByIdContact` (IN `pIdContact` INT)  NO SQL
SELECT * FROM `contacts` WHERE `idContact` = pIdContact$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spEmailsByIdContact` (IN `pIdContact` INT)  NO SQL
SELECT * FROM `emails` WHERE `idContact`=pIdContact$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGroupByIdContact` (IN `pIdContact` INT)  NO SQL
SELECT * FROM `contactsgroups` WHERE `idContact`=pIdContact$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `idContact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`idContact`, `name`, `surname`, `tel`) VALUES
(1, 'Xabier', 'Fernandez-Casa', '645545454'),
(3, 'Ane', 'Osa', '555224411'),
(4, 'Ane', 'Ruiz', '66778855'),
(5, 'Mick', 'Cook', '1122345'),
(6, 'Rose', 'Stuart', '22334433'),
(16, 'Nick', 'Anderson', '5698854552'),
(23, 'Iñaki', 'Nuñez', '675534231'),
(24, 'Ion Ander', 'Güebbo', '762523223'),
(28, 'Aitor', 'Ibañez', '78236478'),
(31, 'Clint', 'Eastwood', '347853498'),
(32, 'Miren', 'Muñoz', '89742');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactsgroups`
--

CREATE TABLE `contactsgroups` (
  `idContact` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactsgroups`
--

INSERT INTO `contactsgroups` (`idContact`, `idGroup`) VALUES
(1, 3),
(3, 1),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(16, 1),
(16, 2),
(16, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 2),
(28, 1),
(31, 2),
(32, 2),
(32, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `idEmail` int(11) NOT NULL,
  `idContact` int(11) DEFAULT NULL,
  `e_mail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`idEmail`, `idContact`, `e_mail`) VALUES
(27, 31, 'Clint@yahoho.es'),
(38, 23, 'nunez@hotmail.co'),
(39, 24, 'ion@ggg.vom'),
(40, 16, 'nick@gmail.com'),
(41, 16, 'nick@hotmail.com'),
(43, 28, 'aitor@hotmail.com'),
(47, 32, 'miren600@fpzornotza.com'),
(61, 6, 'rose@gmail.com'),
(62, 6, 'rose2@hotmail.com'),
(63, 1, 'xabier@gmail.com'),
(64, 4, 'ane@hotmail.com'),
(65, 3, 'ane@gmail.com'),
(66, 3, 'anebigarrena@gmail.com'),
(67, 3, 'nvbnvb'),
(68, 5, 'mick@gmail.com'),
(69, 5, 'mick2@zornotza.eus'),
(70, 5, 'mnm,n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL,
  `groupName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`idGroup`, `groupName`) VALUES
(1, 'Lagunak'),
(2, 'Familia'),
(3, 'Lana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContact`);

--
-- Indices de la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD PRIMARY KEY (`idContact`,`idGroup`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idEmail`),
  ADD KEY `fk_contactos` (`idContact`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD CONSTRAINT `contactsgroups_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`),
  ADD CONSTRAINT `contactsgroups_ibfk_2` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`),
  ADD CONSTRAINT `fk_contactos` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
