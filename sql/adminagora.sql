-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 18-02-2015 a les 17:21:24
-- Versió del servidor: 5.5.41
-- Versió de PHP : 5.4.37-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `adminagora`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_services`
--

CREATE TABLE IF NOT EXISTS `agoraportal_services` (
  `serviceId` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(150) NOT NULL,
  `URL` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `hasDB` tinyint(4) NOT NULL DEFAULT '1',
  `version` varchar(15) NOT NULL,
  `tablesPrefix` varchar(10) NOT NULL DEFAULT '',
  `defaultDiskSpace` bigint(20) NOT NULL DEFAULT '0',
  `serverFolder` varchar(100) NOT NULL DEFAULT '',
  `allowedClients` longtext NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `agoraportal_services`
--

INSERT INTO `agoraportal_services` (`serviceId`, `serviceName`, `URL`, `description`, `hasDB`, `version`, `tablesPrefix`, `defaultDiskSpace`, `serverFolder`, `allowedClients`) VALUES
(1, 'intranet', 'intranet', 'Intranet i web de centre', 1, '128', '', 200, '../../zkdata/', ''),
(2, 'moodle', '', '', 0, '', '', 0, '', ''),
(3, 'marsupial', '', 'Integració de materials d''editorials amb el Moodle. Activar aquest servei implica canviar el domini agora.xtec.cat per agora.educat1x1cat.cat. Això pot provocar problemes en els enllaços dels cursos existents.', 1, '', '', 0, '', ''),
(4, 'moodle2', 'moodle2', 'Entorn Virtual d''Aprenentatge (nova versió)', 1, '', '', 500, '../../moodledata2/', ''),
(5, 'nodes', '', 'Web de centre fet amb WordPress', 1, '3.9.1', '', 500, '', 'cap');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
