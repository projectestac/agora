-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 20-02-2015 a les 18:21:03
-- Versió del servidor: 5.1.63-log
-- Versió de PHP: 5.3.17

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
-- Estructura de la taula `admin_category`
--

CREATE TABLE IF NOT EXISTS `admin_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(254) NOT NULL,
  `sortorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `admin_category`
--

INSERT INTO `admin_category` (`cid`, `name`, `description`, `sortorder`) VALUES
(1, 'Sistema', 'Mòduls del nucli del Zikula', 1),
(2, 'Mòduls addicionals', 'Mòduls que no formen part del nucli del Zikula', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `admin_module`
--

CREATE TABLE IF NOT EXISTS `admin_module` (
  `amid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `sortorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`amid`),
  KEY `mid_cid` (`mid`,`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Bolcant dades de la taula `admin_module`
--

INSERT INTO `admin_module` (`amid`, `mid`, `cid`, `sortorder`) VALUES
(6, 9, 1, 0),
(12, 23, 5, 0),
(14, 5, 5, 0),
(17, 21, 1, 0),
(19, 6, 1, 0),
(21, 13, 1, 0),
(22, 7, 1, 0),
(26, 24, 5, 0),
(43, 34, 5, 0),
(46, 28, 5, 0),
(64, 64, 2, 0),
(65, 35, 2, 0),
(66, 16, 1, 0),
(67, 17, 1, 0),
(68, 10, 1, 0),
(69, 2, 1, 0),
(70, 14, 1, 0),
(71, 19, 1, 0),
(72, 12, 1, 0),
(73, 18, 1, 0),
(74, 11, 1, 0),
(75, 8, 1, 0),
(76, 1, 1, 0),
(77, 22, 1, 0),
(78, 15, 1, 0),
(79, 3, 1, 0),
(80, 26, 1, 0),
(81, 4, 2, 0),
(82, 20, 1, 0),
(83, 30, 2, 0),
(84, 32, 2, 0),
(85, 68, 2, 5),
(86, 69, 2, 6),
(87, 70, 2, 7),
(88, 71, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_clients`
--

CREATE TABLE IF NOT EXISTS `agoraportal_clients` (
  `clientId` int(10) NOT NULL AUTO_INCREMENT,
  `clientCode` varchar(15) NOT NULL DEFAULT '',
  `clientDNS` varchar(50) NOT NULL DEFAULT '',
  `clientOldDNS` varchar(50) NOT NULL DEFAULT '',
  `clientName` varchar(150) NOT NULL DEFAULT '',
  `clientAddress` varchar(150) NOT NULL DEFAULT '',
  `clientCity` varchar(50) NOT NULL DEFAULT '',
  `clientPC` varchar(5) NOT NULL DEFAULT '',
  `clientCountry` varchar(3) NOT NULL DEFAULT 'cat',
  `clientDescription` varchar(255) NOT NULL DEFAULT '',
  `clientState` tinyint(1) NOT NULL DEFAULT '0',
  `locationId` int(10) NOT NULL,
  `typeId` tinyint(1) NOT NULL DEFAULT '0',
  `noVisible` tinyint(1) NOT NULL DEFAULT '0',
  `extraFunc` varchar(15) NOT NULL DEFAULT '',
  `educat` tinyint(1) NOT NULL DEFAULT '0',
  `educatNetwork` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`clientId`),
  KEY `locationId` (`locationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `agoraportal_clients`
--

INSERT INTO `agoraportal_clients` (`clientId`, `clientCode`, `clientDNS`, `clientOldDNS`, `clientName`, `clientAddress`, `clientCity`, `clientPC`, `clientCountry`, `clientDescription`, `clientState`, `locationId`, `typeId`, `noVisible`, `extraFunc`, `educat`, `educatNetwork`) VALUES
(1, 'a8000001', 'usu1', '', 'Centre 1', 'Carrer sense número', 'Valldeneu Valldeneu Valldeneu Vilanova i la Geltrú', '00000', 'cat', '', 1, 10, 1, 0, '', 1, 0),
(2, 'a8000002', 'usu2', '', 'Centre 2', 'Carrer sense número', 'Valldeneu', '00000', 'cat', '', 1, 1, 2, 0, '', 0, 1),
(3, 'a8000003', 'usu3', '', 'Centre 3', 'Carrer sense número', 'Valldeneu', '00000', 'cat', '', 1, 5, 5, 0, '', 0, 1),
(4, 'a8000004', 'usu4', '', 'Centre 4', 'Carrer sense número', 'Valldeneu', '00000', 'cat', '', 1, 6, 4, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_clientType`
--

CREATE TABLE IF NOT EXISTS `agoraportal_clientType` (
  `typeId` int(10) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Bolcant dades de la taula `agoraportal_clientType`
--

INSERT INTO `agoraportal_clientType` (`typeId`, `typeName`) VALUES
(1, 'Escola'),
(2, 'Institut'),
(3, 'Institut-Escola'),
(4, 'Formació d''adults'),
(5, 'Servei educatiu'),
(6, 'Escola Oficial d''Idiomes'),
(7, 'Altres');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_client_managers`
--

CREATE TABLE IF NOT EXISTS `agoraportal_client_managers` (
  `managerId` int(10) NOT NULL AUTO_INCREMENT,
  `clientCode` varchar(15) NOT NULL DEFAULT '',
  `managerUName` varchar(15) NOT NULL DEFAULT '',
  `verifyCode` varchar(15) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`managerId`),
  KEY `clientCode` (`clientCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `agoraportal_client_managers`
--

INSERT INTO `agoraportal_client_managers` (`managerId`, `clientCode`, `managerUName`, `verifyCode`, `state`) VALUES
(1, 'a8000001', 'manager1', 'agora', 1),
(2, 'a8000002', 'manager2', 'agora', 1),
(3, 'a8000003', 'manager3', 'agora', 1),
(4, 'a8000004', 'manager4', 'agora', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_client_services`
--

CREATE TABLE IF NOT EXISTS `agoraportal_client_services` (
  `clientServiceId` int(10) NOT NULL AUTO_INCREMENT,
  `serviceId` int(10) NOT NULL,
  `clientId` int(10) NOT NULL,
  `serviceDB` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(15) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `activedId` int(10) NOT NULL DEFAULT '0',
  `contactName` varchar(150) NOT NULL DEFAULT '',
  `contactMail` varchar(30) NOT NULL DEFAULT '',
  `contactProfile` varchar(50) NOT NULL DEFAULT '',
  `lastVisit` varchar(25) NOT NULL DEFAULT '',
  `timeCreated` varchar(25) NOT NULL DEFAULT '',
  `observations` varchar(255) NOT NULL DEFAULT '',
  `annotations` varchar(255) NOT NULL DEFAULT '',
  `diskSpace` smallint(6) NOT NULL DEFAULT '0',
  `timeEdited` varchar(25) NOT NULL DEFAULT '',
  `timeRequested` varchar(25) NOT NULL DEFAULT '',
  `diskConsume` varchar(15) NOT NULL DEFAULT '',
  `dbHost` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`clientServiceId`),
  KEY `serviceId` (`serviceId`),
  KEY `clientId` (`clientId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Bolcant dades de la taula `agoraportal_client_services`
--

INSERT INTO `agoraportal_client_services` (`clientServiceId`, `serviceId`, `clientId`, `serviceDB`, `description`, `version`, `state`, `activedId`, `contactName`, `contactMail`, `contactProfile`, `lastVisit`, `timeCreated`, `observations`, `annotations`, `diskSpace`, `timeEdited`, `timeRequested`, `diskConsume`, `dbHost`) VALUES
(5, 1, 3, '', '', '', 1, 3, 'manager3', 'manager3@exemple.cat', 'Directora', '', '1417523646', '', '', 200, '1417523646', '1331127897', '352', 'localhost'),
(6, 4, 3, 'XE', '', '', 1, 3, 'manager3', 'manager3@exemple.cat', 'Directora', '', '1331127943', '', '', 5000, '1417524991', '1331127897', '4476', ''),
(7, 1, 4, '', '', '', 1, 4, 'manager4', 'manager4@exemple.cat', 'Cap d''estudis', '', '1417523682', '', '', 200, '1417523683', '1331215250', '352', 'localhost'),
(8, 4, 4, 'XE', '', '', 1, 4, 'manager4', 'manager4@exemple.cat', 'Cap d''estudis', '', '1331226348', '', '', 5000, '1417525007', '1331215250', '4444', ''),
(50, 4, 1, 'XE', '', '', 1, 1, 'manager1', 'manager1@exemple.cat', 'L''artístac', '', '1342518349', '', '', 5000, '1417524960', '1342439879', '19236', ''),
(52, 3, 3, '', '', '', 1, 1, 'manager3', 'manager3@exemple.cat', 'Coordinador/a d''informàtica', '', '1356023380', '', '', 0, '1356023380', '1356023315', '', ''),
(53, 4, 2, 'XE', '', '', 1, 2, 'manager2', 'manager2@exemple.cat', 'Coordinador/a d''informàtica', '', '1356025656', '', '', 5000, '1417524976', '1356024781', '7528', ''),
(54, 1, 1, '', '', '', 1, 1, 'manager1', 'manager1@exemple.cat', 'Cap d''estudis i Coordinador TAC', '', '1417523555', '', '', 200, '1417523555', '1390210210', '352', 'localhost'),
(55, 1, 2, '', '', '', 1, 2, 'manager2', 'manager2@exemple.cat', 'Referent TAC', '', '1417523601', '', '', 200, '1417523601', '1390212190', '352', 'localhost'),
(56, 5, 1, '', '', '', 1, 1, 'manager1', 'manager1@exemple.cat', 'Tècnic TAC', '', '1417523584', 'Maqueta primària', '', 5000, '1417523584', '1417523396', '11964', 'localhost'),
(57, 5, 2, '', '', '', 1, 2, 'manager2', 'manager2@exemple.cat', 'Tècnic TAC', '', '1417523629', 'Maqueta secundària', '', 5000, '1417523629', '1417523441', '16816', 'localhost'),
(58, 5, 3, '', '', '', 1, 3, 'manager3', 'manager3@exemple.cat', 'Tècnic TAC', '', '1417523666', 'Maqueta primària', '', 5000, '1417523666', '1417523474', '11964', 'localhost'),
(59, 5, 4, '', '', '', 1, 4, 'manager4', 'manager4@exemple.cat', 'Tècnic TAC', '', '1417523698', 'Maqueta secundària', '', 5000, '1417523699', '1417523508', '16816', 'localhost');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_intranet_stats_day`
--

CREATE TABLE IF NOT EXISTS `agoraportal_intranet_stats_day` (
  `clientcode` varchar(10) NOT NULL DEFAULT '',
  `clientDNS` varchar(50) NOT NULL DEFAULT '',
  `yearmonth` int(6) NOT NULL,
  `d1` int(10) DEFAULT '0',
  `d2` int(10) DEFAULT '0',
  `d3` int(10) DEFAULT '0',
  `d4` int(10) DEFAULT '0',
  `d5` int(10) DEFAULT '0',
  `d6` int(10) DEFAULT '0',
  `d7` int(10) DEFAULT '0',
  `d8` int(10) DEFAULT '0',
  `d9` int(10) DEFAULT '0',
  `d10` int(10) DEFAULT '0',
  `d11` int(10) DEFAULT '0',
  `d12` int(10) DEFAULT '0',
  `d13` int(10) DEFAULT '0',
  `d14` int(10) DEFAULT '0',
  `d15` int(10) DEFAULT '0',
  `d16` int(10) DEFAULT '0',
  `d17` int(10) DEFAULT '0',
  `d18` int(10) DEFAULT '0',
  `d19` int(10) DEFAULT '0',
  `d20` int(10) DEFAULT '0',
  `d21` int(10) DEFAULT '0',
  `d22` int(10) DEFAULT '0',
  `d23` int(10) DEFAULT '0',
  `d24` int(10) DEFAULT '0',
  `d25` int(10) DEFAULT '0',
  `d26` int(10) DEFAULT '0',
  `d27` int(10) DEFAULT '0',
  `d28` int(10) DEFAULT '0',
  `d29` int(10) DEFAULT '0',
  `d30` int(10) DEFAULT '0',
  `d31` int(10) DEFAULT '0',
  `total` int(10) DEFAULT '0',
  `users` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_intranet_stats_day`
--

INSERT INTO `agoraportal_intranet_stats_day` (`clientcode`, `clientDNS`, `yearmonth`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `total`, `users`) VALUES
('a8000001', 'usu1', 201205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000002', 'usu2', 201205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000003', 'usu3', 201205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000004', 'usu4', 201205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000001', 'usu1', 201207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000002', 'usu2', 201207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000003', 'usu3', 201207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000004', 'usu4', 201207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000001', 'usu1', 201208, 0, 0, 0, 0, 0, 0, 0, 29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 29, 11),
('a8000002', 'usu2', 201208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000003', 'usu3', 201208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000004', 'usu4', 201208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000001', 'usu1', 201210, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 11),
('a8000002', 'usu2', 201210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000003', 'usu3', 201210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000004', 'usu4', 201210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000001', 'usu1', 201209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000002', 'usu2', 201209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000003', 'usu3', 201209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000004', 'usu4', 201209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11),
('a8000001', 'usu1', 201412, 0, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11, 11),
('a8000002', 'usu2', 201412, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 11),
('a8000003', 'usu3', 201412, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 11),
('a8000004', 'usu4', 201412, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_location`
--

CREATE TABLE IF NOT EXISTS `agoraportal_location` (
  `locationId` int(10) NOT NULL AUTO_INCREMENT,
  `locationName` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`locationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Bolcant dades de la taula `agoraportal_location`
--

INSERT INTO `agoraportal_location` (`locationId`, `locationName`) VALUES
(1, 'Baix Llobregat'),
(2, 'Barcelona Comarques'),
(3, 'Catalunya Central'),
(4, 'Consorci d''Educació de Barcelona'),
(5, 'Girona'),
(6, 'Lleida'),
(7, 'Maresme-Vallès Oriental'),
(8, 'Tarragona'),
(9, 'Terres de l''Ebre'),
(10, 'Vallès Occidental');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_logs`
--

CREATE TABLE IF NOT EXISTS `agoraportal_logs` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `clientCode` varchar(15) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `uname` varchar(25) NOT NULL,
  `actionCode` tinyint(4) NOT NULL DEFAULT '0',
  `action` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`logId`),
  KEY `clientCode` (`clientCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Bolcant dades de la taula `agoraportal_logs`
--

INSERT INTO `agoraportal_logs` (`logId`, `clientCode`, `uid`, `uname`, `actionCode`, `action`, `time`) VALUES
(1, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338507412'),
(2, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338507423'),
(3, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338507442'),
(4, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338507554'),
(5, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338507579'),
(6, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338507613'),
(7, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338507871'),
(8, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338507882'),
(9, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338507901'),
(10, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338508687'),
(11, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338508709'),
(12, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338518114'),
(13, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338518133'),
(14, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338518217'),
(15, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338518394'),
(16, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338519007'),
(17, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338519214'),
(18, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338522795'),
(19, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338522796'),
(20, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338522847'),
(21, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338522873'),
(22, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338522895'),
(23, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338522895'),
(24, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338522958'),
(25, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338522967'),
(26, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338522980'),
(27, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338523000'),
(28, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338523018'),
(29, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338523019'),
(30, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1338523059'),
(31, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338523065'),
(32, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338523084'),
(33, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1338523108'),
(34, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338523806'),
(35, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524245'),
(36, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338524272'),
(37, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524288'),
(38, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524458'),
(39, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338524472'),
(40, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524489'),
(41, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524529'),
(42, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338524540'),
(43, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524554'),
(44, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524596'),
(45, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338524609'),
(46, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524625'),
(47, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524709'),
(48, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1338524720'),
(49, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524736'),
(50, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338524736'),
(51, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338524784'),
(52, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1338524790'),
(53, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338524795'),
(54, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338524810'),
(55, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1338524830'),
(56, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338524874'),
(57, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338524885'),
(58, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338524886'),
(59, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1338542426'),
(60, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle2', '1338542533'),
(61, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1338542583'),
(62, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338553462'),
(63, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1338553468'),
(64, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338553499'),
(65, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338553827'),
(66, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338554044'),
(67, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338554209'),
(68, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338554226'),
(69, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1338554775'),
(70, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1338554787'),
(71, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1338554806'),
(72, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1338555692'),
(73, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1338555693'),
(74, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1339756758'),
(75, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle2', '1339756970'),
(76, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1339757442'),
(77, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1341504662'),
(78, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1341505096'),
(79, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1341506727'),
(80, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1341506728'),
(81, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1341506867'),
(82, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei moodle', '1341506879'),
(83, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1341507849'),
(84, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1341507849'),
(85, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1341507857'),
(86, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1341507900'),
(87, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1341507905'),
(88, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1341507924'),
(89, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1341507941'),
(90, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1341507961'),
(91, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1341508661'),
(92, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1341508673'),
(93, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1341508689'),
(94, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1341509087'),
(95, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1341509102'),
(96, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1341509119'),
(97, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1341509305'),
(98, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1341509316'),
(99, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1341509330'),
(100, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1341998785'),
(101, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1341998801'),
(102, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1342002474'),
(103, 'a8000001', 0, 'manager1', 3, 'S\\''ha mogut el fitxer \\''backup-cdp-20120525-1223.zip\\'' de Moodle 1.9 a Moodle 2.x', '1342002508'),
(104, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1342174995'),
(105, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342174996'),
(106, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1342196547'),
(107, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1342196552'),
(108, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1342196557'),
(109, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1342196604'),
(110, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1342196629'),
(111, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1342196647'),
(112, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342196648'),
(113, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1342196660'),
(114, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342196660'),
(115, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1342197000'),
(116, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1342197012'),
(117, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1342197032'),
(118, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342197032'),
(119, 'a8000001', 0, 'admin', 2, 'S\\''ha desactivat el servei intranet', '1342197354'),
(120, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1342197374'),
(121, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342197374'),
(122, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1342439854'),
(123, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle2', '1342439859'),
(124, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1342439865'),
(125, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1342439879'),
(126, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle', '1342439899'),
(127, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1342439921'),
(128, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342439922'),
(129, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1342439940'),
(130, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342439941'),
(131, 'a8000001', 0, 'manager1', 3, 'S\\''ha mogut el fitxer \\''backup-cdp-20120716-1700.zip\\'' de Moodle 1.9 a Moodle 2.x', '1342450935'),
(132, 'a8000001', 0, 'admin', 2, 'S\\''ha desactivat el servei moodle2', '1342518332'),
(133, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1342518349'),
(134, 'a8000001', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1342518350'),
(135, 'a8000001', 0, 'admin', 2, 'S\\''ha denegat el servei moodle2', '1342518369'),
(136, 'a8000001', 0, 'admin', 2, 'S\\''ha denegat el servei moodle2', '1342518389'),
(137, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el fitxer \\''backup-cdp-20121029-1545.zip\\'' del repository \\''Fitxers\\'' de Moodle', '1351526586'),
(138, 'a8000001', 0, 'admin', 3, 'S\\''ha mogut el fitxer \\''backup-ma_0310_002_1.0-20120725-2038.zip\\'' de Moodle 1.9 a Moodle 2.x', '1351526596'),
(139, 'a8000002', 0, 'manager2', 1, 'S\\''ha fet la sol·licitud del servei marsupial', '1356023100'),
(140, 'a8000002', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei marsupial', '1356023122'),
(141, 'a8000003', 0, 'manager3', 1, 'S\\''ha fet la sol·licitud del servei marsupial', '1356023315'),
(142, 'a8000003', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei marsupial', '1356023380'),
(143, 'a8000002', 0, 'admin', 3, 'S\\''ha esborrat el servei marsupial', '1356024684'),
(144, 'a8000002', 0, 'manager2', 1, 'S\\''ha fet la sol·licitud del servei moodle2', '1356024781'),
(145, 'a8000002', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei moodle2', '1356025656'),
(146, 'a8000002', 0, 'admin', 2, 'S\\''ha connectat la intranet amb el Moodle', '1356025657'),
(147, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1390210187'),
(148, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1390210210'),
(149, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1390210245'),
(150, 'a8000002', 0, 'admin', 3, 'S\\''ha esborrat el servei intranet', '1390212172'),
(151, 'a8000002', 0, 'manager2', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1390212190'),
(152, 'a8000002', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1390212231'),
(153, 'a8000002', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1391001729'),
(154, 'a8000001', 0, 'admin', 3, 'S\\''ha esborrat el servei moodle', '1391001736'),
(155, 'a8000003', 0, 'admin', 2, 'S\\''ha donat de baixa el servei intranet', '1417523197'),
(156, 'a8000003', 0, 'admin', 2, 'S\\''ha donat de baixa el servei intranet', '1417523212'),
(157, 'a8000002', 0, 'admin', 2, 'S\\''ha donat de baixa el servei intranet', '1417523234'),
(158, 'a8000001', 0, 'admin', 2, 'S\\''ha donat de baixa el servei intranet', '1417523266'),
(159, 'a8000004', 0, 'admin', 2, 'S\\''ha donat de baixa el servei intranet', '1417523363'),
(160, 'a8000001', 0, 'manager1', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1417523397'),
(161, 'a8000002', 0, 'manager2', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1417523442'),
(162, 'a8000003', 0, 'manager3', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1417523474'),
(163, 'a8000004', 0, 'manager4', 1, 'S\\''ha fet la sol·licitud del servei intranet', '1417523509'),
(164, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1417523555'),
(165, 'a8000001', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei nodes', '1417523584'),
(166, 'a8000002', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1417523601'),
(167, 'a8000002', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei nodes', '1417523629'),
(168, 'a8000003', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1417523646'),
(169, 'a8000003', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei nodes', '1417523666'),
(170, 'a8000004', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei intranet', '1417523683'),
(171, 'a8000004', 0, 'admin', 2, 'S\\''ha aprovat la sol·licitud del servei nodes', '1417523698');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_modelTypes`
--

CREATE TABLE IF NOT EXISTS `agoraportal_modelTypes` (
  `modelTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `shortcode` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`modelTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Bolcant dades de la taula `agoraportal_modelTypes`
--

INSERT INTO `agoraportal_modelTypes` (`modelTypeId`, `shortcode`, `keyword`, `description`) VALUES
(1, 'pri', 'primaria', 'Maqueta per primària'),
(2, 'sec', 'secundaria', 'Maqueta per secundària'),
(3, 'cfa', 'adults', 'Maqueta per adults');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle2_stats_day`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle2_stats_day` (
  `clientcode` varchar(10) DEFAULT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `h0` int(11) DEFAULT '0',
  `h1` int(11) DEFAULT '0',
  `h2` int(11) DEFAULT '0',
  `h3` int(11) DEFAULT '0',
  `h4` int(11) DEFAULT '0',
  `h5` int(11) DEFAULT '0',
  `h6` int(11) DEFAULT '0',
  `h7` int(11) DEFAULT '0',
  `h8` int(11) DEFAULT '0',
  `h9` int(11) DEFAULT '0',
  `h10` int(11) DEFAULT '0',
  `h11` int(11) DEFAULT '0',
  `h12` int(11) DEFAULT '0',
  `h13` int(11) DEFAULT '0',
  `h14` int(11) DEFAULT '0',
  `h15` int(11) DEFAULT '0',
  `h16` int(11) DEFAULT '0',
  `h17` int(11) DEFAULT '0',
  `h18` int(11) DEFAULT '0',
  `h19` int(11) DEFAULT '0',
  `h20` int(11) DEFAULT '0',
  `h21` int(11) DEFAULT '0',
  `h22` int(11) DEFAULT '0',
  `h23` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `userstotal` int(11) DEFAULT '0',
  `usersnodelsus` int(11) DEFAULT '0',
  `usersactive` int(11) DEFAULT '0',
  `usersactivelast90days` int(11) DEFAULT '0',
  `usersactivelast30days` int(11) DEFAULT '0',
  `diskConsume` varchar(15) NOT NULL DEFAULT '0',
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle2_stats_day`
--

INSERT INTO `agoraportal_moodle2_stats_day` (`clientcode`, `clientDNS`, `date`, `h0`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`, `h20`, `h21`, `h22`, `h23`, `total`, `userstotal`, `usersnodelsus`, `usersactive`, `usersactivelast90days`, `usersactivelast30days`, `diskConsume`) VALUES
('a8000001', 'usu1', 20120515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 2, 1, 0, '0'),
('a8000001', 'usu1', 20120531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 2, 1, 0, '0'),
('a8000001', 'usu1', 20120709, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 2, 0, 0, '23'),
('a8000001', 'usu1', 20120722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 2, 0, 0, '23'),
('a8000001', 'usu1', 20120718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 2, 0, 0, '21784'),
('a8000001', 'usu1', 20120808, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 2, 4, 0, 0, 1, 0, 0, 0, 0, 0, 13, 4, 4, 3, 1, 1, '12044'),
('a8000001', 'usu1', 20121021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121002, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20121022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 4, 4, 3, 2, 1, '12796'),
('a8000001', 'usu1', 20120916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 3, 1, 0, '12796'),
('a8000001', 'usu1', 20141202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 27, 26, 2, 1, 1, '19236'),
('a8000002', 'usu2', 20141202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 2, 1, 1, '7528'),
('a8000003', 'usu3', 20141202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 2, 1, 1, '4476'),
('a8000004', 'usu4', 20141202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 2, 1, 1, '4444');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle2_stats_month`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle2_stats_month` (
  `clientcode` varchar(10) DEFAULT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `yearmonth` int(11) DEFAULT NULL,
  `usersactive` int(11) DEFAULT '0',
  `courses` int(11) DEFAULT '0',
  `activities` int(11) DEFAULT '0',
  `lastaccess` varchar(50) DEFAULT NULL,
  `lastaccess_date` varchar(50) DEFAULT NULL,
  `lastaccess_user` varchar(50) DEFAULT NULL,
  `total_access` int(11) DEFAULT '0',
  `usersactivelast30days` int(11) DEFAULT '0',
  `diskConsume` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle2_stats_month`
--

INSERT INTO `agoraportal_moodle2_stats_month` (`clientcode`, `clientDNS`, `yearmonth`, `usersactive`, `courses`, `activities`, `lastaccess`, `lastaccess_date`, `lastaccess_user`, `total_access`, `usersactivelast30days`, `diskConsume`) VALUES
('a8000001', 'usu1', 201205, 2, 2, 32, '1337958589', '25/05/2012 17:09:49', 'admin', 8, 0, '0'),
('a8000001', 'usu1', 201207, 2, 5, 41, '1342454731', '16/07/2012 18:05:31', 'admin', 29, 0, '21784'),
('a8000001', 'usu1', 201208, 3, 5, 17, '1344510834', '09/08/2012 13:13:54', 'admin', 0, 1, '12044'),
('a8000001', 'usu1', 201210, 3, 5, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 24, 1, '12796'),
('a8000001', 'usu1', 201209, 3, 3, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 70, 0, '12796'),
('a8000001', 'usu1', 201412, 2, 2, 11, '1389611971', '13/01/2014 12:19:31', 'admin', 3, 1, '19236'),
('a8000002', 'usu2', 201412, 2, 1, 0, '1357291215', '04/01/2013 10:20:15', 'admin', 0, 1, '7528'),
('a8000003', 'usu3', 201412, 2, 2, 0, '1389616146', '13/01/2014 13:29:06', 'admin', 0, 1, '4476'),
('a8000004', 'usu4', 201412, 2, 1, 0, '1389629684', '13/01/2014 17:14:44', 'admin', 3, 1, '4444');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle2_stats_week`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle2_stats_week` (
  `clientcode` varchar(10) DEFAULT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `date` bigint(20) DEFAULT NULL,
  `usersactive` int(11) DEFAULT '0',
  `courses` int(11) DEFAULT '0',
  `activities` int(11) DEFAULT '0',
  `lastaccess` varchar(50) DEFAULT NULL,
  `lastaccess_date` varchar(50) DEFAULT NULL,
  `lastaccess_user` varchar(50) DEFAULT NULL,
  `total_access` int(11) DEFAULT '0',
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle2_stats_week`
--

INSERT INTO `agoraportal_moodle2_stats_week` (`clientcode`, `clientDNS`, `date`, `usersactive`, `courses`, `activities`, `lastaccess`, `lastaccess_date`, `lastaccess_user`, `total_access`) VALUES
('a8000001', 'usu1', 20120716, 2, 3, 35, '1341491814', '05/07/2012 14:36:54', 'admin', 0),
('a8000001', 'usu1', 20121015, 3, 5, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 15),
('a8000001', 'usu1', 20121001, 3, 3, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 4),
('a8000001', 'usu1', 20121008, 3, 3, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 0),
('a8000001', 'usu1', 20120910, 3, 3, 15, '1350921929', '22/10/2012 18:05:29', 'admin', 11);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle_stats_day`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle_stats_day` (
  `clientcode` varchar(10) DEFAULT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `h0` int(11) DEFAULT '0',
  `h1` int(11) DEFAULT '0',
  `h2` int(11) DEFAULT '0',
  `h3` int(11) DEFAULT '0',
  `h4` int(11) DEFAULT '0',
  `h5` int(11) DEFAULT '0',
  `h6` int(11) DEFAULT '0',
  `h7` int(11) DEFAULT '0',
  `h8` int(11) DEFAULT '0',
  `h9` int(11) DEFAULT '0',
  `h10` int(11) DEFAULT '0',
  `h11` int(11) DEFAULT '0',
  `h12` int(11) DEFAULT '0',
  `h13` int(11) DEFAULT '0',
  `h14` int(11) DEFAULT '0',
  `h15` int(11) DEFAULT '0',
  `h16` int(11) DEFAULT '0',
  `h17` int(11) DEFAULT '0',
  `h18` int(11) DEFAULT '0',
  `h19` int(11) DEFAULT '0',
  `h20` int(11) DEFAULT '0',
  `h21` int(11) DEFAULT '0',
  `h22` int(11) DEFAULT '0',
  `h23` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `diskConsume` varchar(15) NOT NULL DEFAULT '0',
  `usersconfnodel` int(11) DEFAULT '0',
  `usersactive` int(11) DEFAULT '0',
  `usersactivelast90days` int(11) DEFAULT '0',
  `usersactivelast30days` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle_stats_day`
--

INSERT INTO `agoraportal_moodle_stats_day` (`clientcode`, `clientDNS`, `date`, `h0`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `h7`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`, `h20`, `h21`, `h22`, `h23`, `total`, `diskConsume`, `usersconfnodel`, `usersactive`, `usersactivelast90days`, `usersactivelast30days`) VALUES
('a8000001', 'usu1', 20120515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000002', 'usu2', 20120515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000003', 'usu3', 20120515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000004', 'usu4', 20120515, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000001', 'usu1', 20120531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000002', 'usu2', 20120531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000003', 'usu3', 20120531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000004', 'usu4', 20120531, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0),
('a8000002', 'usu2', 20120709, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000003', 'usu3', 20120709, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000004', 'usu4', 20120709, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000001', 'usu1', 20120722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0),
('a8000002', 'usu2', 20120722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000003', 'usu3', 20120722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000004', 'usu4', 20120722, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000001', 'usu1', 20120718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8208', 0, 0, 0, 0),
('a8000002', 'usu2', 20120718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000003', 'usu3', 20120718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000004', 'usu4', 20120718, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 0, 0, 0, 0),
('a8000001', 'usu1', 20120808, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '19752', 0, 0, 0, 0),
('a8000002', 'usu2', 20120808, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20120808, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20120808, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121001, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121002, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121002, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121002, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121002, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121003, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121004, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121005, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121006, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121007, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121008, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121009, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121010, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121011, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121013, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121014, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20121022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20121022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20121022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20121022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0),
('a8000001', 'usu1', 20120916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '107860', 0, 0, 0, 0),
('a8000002', 'usu2', 20120916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000003', 'usu3', 20120916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '68', 0, 0, 0, 0),
('a8000004', 'usu4', 20120916, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '72', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle_stats_month`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle_stats_month` (
  `clientcode` varchar(10) DEFAULT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `yearmonth` int(11) DEFAULT NULL,
  `users` int(11) DEFAULT '0',
  `courses` int(11) DEFAULT '0',
  `activities` int(11) DEFAULT '0',
  `lastaccess` varchar(50) DEFAULT NULL,
  `lastaccess_date` varchar(50) DEFAULT NULL,
  `lastaccess_user` varchar(50) DEFAULT NULL,
  `total_access` int(11) DEFAULT '0',
  `diskConsume` varchar(15) NOT NULL DEFAULT '0',
  `usersactivelast30days` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle_stats_month`
--

INSERT INTO `agoraportal_moodle_stats_month` (`clientcode`, `clientDNS`, `yearmonth`, `users`, `courses`, `activities`, `lastaccess`, `lastaccess_date`, `lastaccess_user`, `total_access`, `diskConsume`, `usersactivelast30days`) VALUES
('a8000001', 'usu1', 201205, 3, 2, 4, '1335286501', '24/04/2012 18:55:01', 'admin', 8, '0', 0),
('a8000002', 'usu2', 201205, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0, '0', 0),
('a8000003', 'usu3', 201205, 2, 1, 0, '1331049892', '06/03/2012 17:04:52', 'admin', 0, '0', 0),
('a8000004', 'usu4', 201205, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0, '0', 0),
('a8000002', 'usu2', 201207, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0, '4', 0),
('a8000003', 'usu3', 201207, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 2, '4', 0),
('a8000004', 'usu4', 201207, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0, '4', 0),
('a8000001', 'usu1', 201207, 3, 2, 5, '1342454881', '16/07/2012 18:08:01', 'admin', 29, '8208', 0),
('a8000001', 'usu1', 201208, 3, 2, 5, '1343727085', '31/07/2012 11:31:25', 'admin', 0, '19752', 0),
('a8000002', 'usu2', 201208, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0, '68', 0),
('a8000003', 'usu3', 201208, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0, '68', 0),
('a8000004', 'usu4', 201208, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0, '72', 0),
('a8000001', 'usu1', 201210, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 6, '107860', 0),
('a8000002', 'usu2', 201210, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0, '68', 0),
('a8000003', 'usu3', 201210, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 1, '68', 0),
('a8000004', 'usu4', 201210, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 3, '72', 0),
('a8000001', 'usu1', 201209, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 6, '107860', 0),
('a8000002', 'usu2', 201209, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0, '68', 0),
('a8000003', 'usu3', 201209, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0, '68', 0),
('a8000004', 'usu4', 201209, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0, '72', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_moodle_stats_week`
--

CREATE TABLE IF NOT EXISTS `agoraportal_moodle_stats_week` (
  `clientcode` varchar(10) NOT NULL DEFAULT '',
  `clientDNS` varchar(50) NOT NULL,
  `date` int(8) DEFAULT NULL,
  `users` int(10) DEFAULT '0',
  `courses` int(10) DEFAULT '0',
  `activities` int(10) DEFAULT '0',
  `lastaccess` varchar(50) DEFAULT '',
  `lastaccess_date` varchar(50) DEFAULT '',
  `lastaccess_user` varchar(50) DEFAULT '',
  `total_access` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_moodle_stats_week`
--

INSERT INTO `agoraportal_moodle_stats_week` (`clientcode`, `clientDNS`, `date`, `users`, `courses`, `activities`, `lastaccess`, `lastaccess_date`, `lastaccess_user`, `total_access`) VALUES
('a8000001', 'usu1', 20120716, 3, 2, 5, '1341491742', '05/07/2012 14:35:42', 'admin', 0),
('a8000002', 'usu2', 20120716, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0),
('a8000003', 'usu3', 20120716, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0),
('a8000004', 'usu4', 20120716, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0),
('a8000001', 'usu1', 20121015, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 4),
('a8000002', 'usu2', 20121015, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0),
('a8000003', 'usu3', 20121015, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0),
('a8000004', 'usu4', 20121015, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0),
('a8000001', 'usu1', 20121001, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 2),
('a8000002', 'usu2', 20121001, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0),
('a8000003', 'usu3', 20121001, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 1),
('a8000004', 'usu4', 20121001, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 3),
('a8000001', 'usu1', 20121008, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 0),
('a8000002', 'usu2', 20121008, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0),
('a8000003', 'usu3', 20121008, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0),
('a8000004', 'usu4', 20121008, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0),
('a8000001', 'usu1', 20120910, 3, 2, 5, '1348848542', '28/09/2012 18:09:02', 'admin', 0),
('a8000002', 'usu2', 20120910, 2, 1, 0, '1331049388', '06/03/2012 16:56:28', 'admin', 0),
('a8000003', 'usu3', 20120910, 2, 1, 0, '1341491586', '05/07/2012 14:33:06', 'admin', 0),
('a8000004', 'usu4', 20120910, 3, 1, 0, '1331050682', '06/03/2012 17:18:02', 'admin', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_mysql_comands`
--

CREATE TABLE IF NOT EXISTS `agoraportal_mysql_comands` (
  `comandId` int(10) NOT NULL AUTO_INCREMENT,
  `serviceId` int(10) NOT NULL,
  `comand` text NOT NULL,
  `description` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comandId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_nodes_stats_day`
--

CREATE TABLE IF NOT EXISTS `agoraportal_nodes_stats_day` (
  `clientcode` varchar(10) NOT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `userstotal` int(11) NOT NULL DEFAULT '0',
  `usersactive` int(11) NOT NULL DEFAULT '0',
  `usersactivelast30days` int(11) NOT NULL DEFAULT '0',
  `usersactivelast90days` int(11) NOT NULL DEFAULT '0',
  `diskConsume` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_nodes_stats_day`
--

INSERT INTO `agoraportal_nodes_stats_day` (`clientcode`, `clientDNS`, `date`, `total`, `posts`, `userstotal`, `usersactive`, `usersactivelast30days`, `usersactivelast90days`, `diskConsume`) VALUES
('a8000001', 'usu1', 20141202, 39, 0, 2, 2, 2, 2, 11964),
('a8000002', 'usu2', 20141202, 17, 0, 2, 2, 2, 2, 16816),
('a8000003', 'usu3', 20141202, 18, 0, 2, 2, 2, 2, 11964),
('a8000004', 'usu4', 20141202, 17, 0, 2, 2, 2, 2, 16816);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_nodes_stats_month`
--

CREATE TABLE IF NOT EXISTS `agoraportal_nodes_stats_month` (
  `clientcode` varchar(10) NOT NULL,
  `clientDNS` varchar(50) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `userstotal` int(11) NOT NULL DEFAULT '0',
  `usersactive` int(11) NOT NULL DEFAULT '0',
  `lastactivity` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `diskConsume` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_nodes_stats_month`
--

INSERT INTO `agoraportal_nodes_stats_month` (`clientcode`, `clientDNS`, `date`, `total`, `posts`, `userstotal`, `usersactive`, `lastactivity`, `diskConsume`) VALUES
('a8000001', 'usu1', 201412, 39, 118, 2, 2, '2014-12-02 13:32:21', 11964),
('a8000002', 'usu2', 201412, 17, 191, 2, 2, '2014-12-02 13:38:08', 16816),
('a8000003', 'usu3', 201412, 18, 118, 2, 2, '2014-12-02 13:39:42', 11964),
('a8000004', 'usu4', 201412, 17, 191, 2, 2, '2014-12-02 13:40:48', 16816);

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_queues`
--

CREATE TABLE IF NOT EXISTS `agoraportal_queues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operation` varchar(100) NOT NULL,
  `clientId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `priority` bigint(20) NOT NULL DEFAULT '0',
  `state` varchar(2) NOT NULL DEFAULT 'P',
  `timeCreated` bigint(20) DEFAULT NULL,
  `timeStart` bigint(20) DEFAULT NULL,
  `timeEnd` bigint(20) DEFAULT NULL,
  `params` varchar(255) NOT NULL,
  `logId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_queues_log`
--

CREATE TABLE IF NOT EXISTS `agoraportal_queues_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `timeModified` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_request`
--

CREATE TABLE IF NOT EXISTS `agoraportal_request` (
  `requestId` int(10) NOT NULL AUTO_INCREMENT,
  `requestTypeId` int(10) NOT NULL,
  `serviceId` int(10) NOT NULL,
  `clientId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `userComments` text NOT NULL,
  `adminComments` text NOT NULL,
  `privateNotes` text NOT NULL,
  `requestStateId` int(10) NOT NULL,
  `timeCreated` varchar(25) NOT NULL DEFAULT '',
  `timeClosed` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`requestId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `agoraportal_request`
--

INSERT INTO `agoraportal_request` (`requestId`, `requestTypeId`, `serviceId`, `clientId`, `userId`, `userComments`, `adminComments`, `privateNotes`, `requestStateId`, `timeCreated`, `timeClosed`) VALUES
(1, 2, 1, 1, 7, 'Prova', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '', 1, '1331553833', '1331554105'),
(2, 2, 2, 1, 7, 'Prova 2', '', '', 1, '1331554190', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_requestStates`
--

CREATE TABLE IF NOT EXISTS `agoraportal_requestStates` (
  `requestStateId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`requestStateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `agoraportal_requestStates`
--

INSERT INTO `agoraportal_requestStates` (`requestStateId`, `name`) VALUES
(1, 'Pendent'),
(2, 'En estudi'),
(3, 'Solucionada'),
(4, 'Denegada');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_requestTypes`
--

CREATE TABLE IF NOT EXISTS `agoraportal_requestTypes` (
  `requestTypeId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `userCommentsText` text NOT NULL,
  PRIMARY KEY (`requestTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Bolcant dades de la taula `agoraportal_requestTypes`
--

INSERT INTO `agoraportal_requestTypes` (`requestTypeId`, `name`, `description`, `userCommentsText`) VALUES
(1, 'Ampliació de quota', 'Si esteu exhaurint la quota podeu sol·licitar-ne l''ampliació. L''acceptació d''aquesta ampliació està subjecta a les condicions d''ús del servei i, en conseqüència, la seva sol·licitud no implica la seva concesió. Cada cas es valorarà individualment.', 'Indiqueu el motiu pel qual demaneu l''ampliació'),
(2, 'Restauració de la contrasenya d''admin', 'Si no recordeu la contrasenya de l''administrador/a predeterminat del servei, podeu demanar el seu canvi.', 'Observacions (opcional)');

-- --------------------------------------------------------

--
-- Estructura de la taula `agoraportal_requestTypesServices`
--

CREATE TABLE IF NOT EXISTS `agoraportal_requestTypesServices` (
  `requestTypeId` int(10) NOT NULL,
  `serviceId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `agoraportal_requestTypesServices`
--

INSERT INTO `agoraportal_requestTypesServices` (`requestTypeId`, `serviceId`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

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
  `defaultDiskSpace` bigint(20) NOT NULL DEFAULT '0',
  `allowedClients` longtext NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `agoraportal_services`
--

INSERT INTO `agoraportal_services` (`serviceId`, `serviceName`, `URL`, `description`, `hasDB`, `version`, `defaultDiskSpace`, `allowedClients`) VALUES
(1, 'intranet', 'intranet', 'Intranet i web de centre', 1, '128', 200, ''),
(2, 'moodle', 'copiaseg', 'Entorn Virtual d''Aprenentatge', 1, '1912', 500, 'cap'),
(3, 'marsupial', '', 'Integració de materials d''editorials amb el Moodle. Activar aquest servei implica canviar el domini agora.xtec.cat per agora.educat1x1cat.cat. Això pot provocar problemes en els enllaços dels cursos existents.', 0, '', 0, ''),
(4, 'moodle2', 'moodle', 'Entorn Virtual d''Aprenentatge (nova versió)', 1, '', 5000, ''),
(5, 'nodes', '', 'Web de centre fet amb WordPress', 1, '3.9.1', 5000, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bkey` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `url` longtext NOT NULL,
  `mid` int(11) NOT NULL DEFAULT '0',
  `filter` longtext NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `collapsable` int(11) NOT NULL DEFAULT '1',
  `defaultstate` int(11) NOT NULL DEFAULT '1',
  `refresh` int(11) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  `language` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `active_idx` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Bolcant dades de la taula `blocks`
--

INSERT INTO `blocks` (`bid`, `bkey`, `title`, `content`, `url`, `mid`, `filter`, `active`, `collapsable`, `defaultstate`, `refresh`, `last_update`, `language`, `description`) VALUES
(5, 'Messages', 'Admin messages', '', '', 8, 'a:0:{}', 0, 1, 1, 3600, '2011-01-26 13:08:55', '', ''),
(10, 'AgoraMenu', 'Menú', '', '', 64, 'a:0:{}', 1, 0, 1, 3600, '2012-05-09 15:47:34', '', ''),
(11, 'AgoraQuestion', 'Gestors', '', '', 64, 'a:0:{}', 1, 0, 1, 3600, '2012-05-09 15:47:34', '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `block_placements`
--

CREATE TABLE IF NOT EXISTS `block_placements` (
  `pid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL DEFAULT '0',
  `sortorder` int(11) NOT NULL DEFAULT '0',
  KEY `bid_pid_idx` (`bid`,`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `block_placements`
--

INSERT INTO `block_placements` (`pid`, `bid`, `sortorder`) VALUES
(3, 5, 0),
(4, 10, 0),
(3, 11, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `block_positions`
--

CREATE TABLE IF NOT EXISTS `block_positions` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `name_idx` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `block_positions`
--

INSERT INTO `block_positions` (`pid`, `name`, `description`) VALUES
(1, 'left', 'Left blocks'),
(2, 'right', 'Right blocks'),
(3, 'center', 'Centre blocks'),
(4, 'menu', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_category`
--

CREATE TABLE IF NOT EXISTS `categories_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `is_leaf` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `sort_value` int(11) NOT NULL DEFAULT '0',
  `display_name` text,
  `display_desc` text,
  `path` text,
  `ipath` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT 'A',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_parent` (`parent_id`),
  KEY `idx_categories_is_leaf` (`is_leaf`),
  KEY `idx_categories_name` (`name`),
  KEY `idx_categories_ipath` (`ipath`,`is_leaf`,`status`),
  KEY `idx_categories_status` (`status`),
  KEY `idx_categories_ipath_status` (`ipath`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Bolcant dades de la taula `categories_category`
--

INSERT INTO `categories_category` (`id`, `parent_id`, `is_locked`, `is_leaf`, `name`, `value`, `sort_value`, `display_name`, `display_desc`, `path`, `ipath`, `status`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
(1, 0, 1, 0, '__SYSTEM__', '', 0, 'b:0;', 'b:0;', '/__SYSTEM__', '/1', 'A', 'A', '2010-02-27 11:15:37', 2, '2010-02-27 11:15:37', 2),
(2, 1, 0, 0, 'Modules', '', 0, 'a:0:{}', 'a:1:{s:2:"en";s:0:"";}', '/__SYSTEM__/Modules', '/1/2', 'A', 'A', '2010-02-27 11:15:37', 2, '2010-02-27 11:15:37', 2),
(3, 1, 0, 0, 'General', '', 0, 'a:0:{}', 'a:1:{s:2:"en";s:0:"";}', '/__SYSTEM__/General', '/1/3', 'A', 'A', '2010-02-27 11:15:37', 2, '2010-02-27 11:15:37', 2),
(31, 1, 0, 0, 'Users', '', 0, 'a:0:{}', 'a:1:{s:2:"en";s:0:"";}', '/__SYSTEM__/Users', '/1/31', 'A', 'A', '2010-02-27 11:15:37', 2, '2010-02-27 11:15:37', 2),
(32, 2, 0, 0, 'Global', '', 0, 'a:0:{}', 'a:1:{s:2:"en";s:0:"";}', '/__SYSTEM__/Modules/Global', '/1/2/32', 'A', 'A', '2010-02-27 11:15:37', 2, '2010-02-27 11:15:37', 2),
(43, 2, 0, 0, 'FAQ', '', 0, 'a:0:{}', 'a:0:{}', '/__SYSTEM__/Modules/FAQ', '/1/2/43', 'A', 'A', '2011-06-20 10:47:17', 2, '2011-06-20 10:47:17', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_mapmeta`
--

CREATE TABLE IF NOT EXISTS `categories_mapmeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_mapmeta` (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_mapobj`
--

CREATE TABLE IF NOT EXISTS `categories_mapobj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(60) NOT NULL DEFAULT '',
  `tablename` varchar(60) NOT NULL,
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `obj_idcolumn` varchar(60) NOT NULL DEFAULT 'id',
  `reg_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  `reg_property` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_categories_mapobj` (`modname`,`tablename`,`obj_id`,`obj_idcolumn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `categories_registry`
--

CREATE TABLE IF NOT EXISTS `categories_registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(60) NOT NULL DEFAULT '',
  `tablename` varchar(60) NOT NULL DEFAULT '',
  `property` varchar(60) NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_registry` (`modname`,`tablename`,`property`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `Files`
--

CREATE TABLE IF NOT EXISTS `Files` (
  `fileId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL DEFAULT '0',
  `diskUse` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Bolcant dades de la taula `Files`
--

INSERT INTO `Files` (`fileId`, `userId`, `diskUse`) VALUES
(1, 2, 21274);

-- --------------------------------------------------------

--
-- Estructura de la taula `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gtype` tinyint(4) NOT NULL DEFAULT '0',
  `description` varchar(200) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `nbuser` int(11) NOT NULL DEFAULT '0',
  `nbumax` int(11) NOT NULL DEFAULT '0',
  `link` int(11) NOT NULL DEFAULT '0',
  `uidmaster` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Bolcant dades de la taula `groups`
--

INSERT INTO `groups` (`gid`, `name`, `gtype`, `description`, `prefix`, `state`, `nbuser`, `nbumax`, `link`, `uidmaster`) VALUES
(1, 'Users', 0, 'By default, all users are made members of this group.', 'usr', 0, 0, 0, 0, 0),
(2, 'Administrators', 0, 'By default, all administrators are made members of this group.', 'adm', 0, 0, 0, 0, 0),
(3, 'Clients', 0, '', '', 0, 0, 0, 0, 0),
(4, 'Managers', 0, '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `group_applications`
--

CREATE TABLE IF NOT EXISTS `group_applications` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `application` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `group_membership`
--

CREATE TABLE IF NOT EXISTS `group_membership` (
  `gid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  KEY `gid_uid` (`uid`,`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `group_membership`
--

INSERT INTO `group_membership` (`gid`, `uid`) VALUES
(1, 1),
(2, 2),
(1, 3),
(3, 3),
(1, 4),
(3, 4),
(1, 5),
(3, 5),
(1, 6),
(3, 6),
(1, 7),
(4, 7),
(1, 8),
(4, 8),
(1, 9),
(4, 9),
(1, 10),
(4, 10);

-- --------------------------------------------------------

--
-- Estructura de la taula `group_perms`
--

CREATE TABLE IF NOT EXISTS `group_perms` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL DEFAULT '0',
  `sequence` int(11) NOT NULL DEFAULT '0',
  `realm` int(11) NOT NULL DEFAULT '0',
  `component` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `bond` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `group_perms`
--

INSERT INTO `group_perms` (`pid`, `gid`, `sequence`, `realm`, `component`, `instance`, `level`, `bond`) VALUES
(1, 2, 0, 0, '.*', '.*', 800, 0),
(3, 1, 4, 0, '.*', '.*', 300, 0),
(5, 0, 5, 0, '.*', '.*', 200, 0),
(6, 3, 2, 0, 'Agoraportal::', '.*', 300, 0),
(7, 4, 1, 0, 'Agoraportal::', '.*', 600, 0),
(8, 1, 3, 0, 'Agoraportal::', '.*', 200, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `hooks`
--

CREATE TABLE IF NOT EXISTS `hooks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object` varchar(64) NOT NULL,
  `action` varchar(64) NOT NULL,
  `smodule` varchar(64) NOT NULL,
  `stype` varchar(64) NOT NULL,
  `tarea` varchar(64) NOT NULL,
  `tmodule` varchar(64) NOT NULL,
  `ttype` varchar(64) NOT NULL,
  `tfunc` varchar(64) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `smodule` (`smodule`),
  KEY `smodule_tmodule` (`smodule`,`tmodule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_area`
--

CREATE TABLE IF NOT EXISTS `hook_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `areatype` varchar(1) NOT NULL,
  `category` varchar(20) NOT NULL,
  `areaname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `areaidx` (`areaname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Bolcant dades de la taula `hook_area`
--

INSERT INTO `hook_area` (`id`, `owner`, `subowner`, `areatype`, `category`, `areaname`) VALUES
(1, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.user'),
(2, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.registration'),
(3, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.login_screen'),
(4, 'Users', NULL, 's', 'ui_hooks', 'subscriber.users.ui_hooks.login_block'),
(5, 'Blocks', NULL, 's', 'ui_hooks', 'subscriber.blocks.ui_hooks.htmlblock.content');

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_binding`
--

CREATE TABLE IF NOT EXISTS `hook_binding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sowner` varchar(40) NOT NULL,
  `subsowner` varchar(40) DEFAULT NULL,
  `powner` varchar(40) NOT NULL,
  `subpowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `pareaid` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `sortorder` smallint(6) NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`),
  KEY `sortidx` (`sareaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_provider`
--

CREATE TABLE IF NOT EXISTS `hook_provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `pareaid` int(11) NOT NULL,
  `hooktype` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `method` varchar(20) NOT NULL,
  `serviceid` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nameidx` (`pareaid`,`hooktype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_runtime`
--

CREATE TABLE IF NOT EXISTS `hook_runtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sowner` varchar(40) NOT NULL,
  `subsowner` varchar(40) DEFAULT NULL,
  `powner` varchar(40) NOT NULL,
  `subpowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `pareaid` int(11) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `classname` varchar(60) NOT NULL,
  `method` varchar(20) NOT NULL,
  `serviceid` varchar(60) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `hook_subscriber`
--

CREATE TABLE IF NOT EXISTS `hook_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(40) NOT NULL,
  `subowner` varchar(40) DEFAULT NULL,
  `sareaid` int(11) NOT NULL,
  `hooktype` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `myindex` (`eventname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Bolcant dades de la taula `hook_subscriber`
--

INSERT INTO `hook_subscriber` (`id`, `owner`, `subowner`, `sareaid`, `hooktype`, `category`, `eventname`) VALUES
(1, 'Users', NULL, 1, 'display_view', 'ui_hooks', 'users.ui_hooks.user.display_view'),
(2, 'Users', NULL, 1, 'form_edit', 'ui_hooks', 'users.ui_hooks.user.form_edit'),
(3, 'Users', NULL, 1, 'validate_edit', 'ui_hooks', 'users.ui_hooks.user.validate_edit'),
(4, 'Users', NULL, 1, 'process_edit', 'ui_hooks', 'users.ui_hooks.user.process_edit'),
(5, 'Users', NULL, 1, 'form_delete', 'ui_hooks', 'users.ui_hooks.user.form_delete'),
(6, 'Users', NULL, 1, 'validate_delete', 'ui_hooks', 'users.ui_hooks.user.validate_delete'),
(7, 'Users', NULL, 1, 'process_delete', 'ui_hooks', 'users.ui_hooks.user.process_delete'),
(8, 'Users', NULL, 2, 'display_view', 'ui_hooks', 'users.ui_hooks.registration.display_view'),
(9, 'Users', NULL, 2, 'form_edit', 'ui_hooks', 'users.ui_hooks.registration.form_edit'),
(10, 'Users', NULL, 2, 'validate_edit', 'ui_hooks', 'users.ui_hooks.registration.validate_edit'),
(11, 'Users', NULL, 2, 'process_edit', 'ui_hooks', 'users.ui_hooks.registration.process_edit'),
(12, 'Users', NULL, 2, 'form_delete', 'ui_hooks', 'users.ui_hooks.registration.form_delete'),
(13, 'Users', NULL, 2, 'validate_delete', 'ui_hooks', 'users.ui_hooks.registration.validate_delete'),
(14, 'Users', NULL, 2, 'process_delete', 'ui_hooks', 'users.ui_hooks.registration.process_delete'),
(15, 'Users', NULL, 3, 'form_edit', 'ui_hooks', 'users.ui_hooks.login_screen.form_edit'),
(16, 'Users', NULL, 3, 'validate_edit', 'ui_hooks', 'users.ui_hooks.login_screen.validate_edit'),
(17, 'Users', NULL, 3, 'process_edit', 'ui_hooks', 'users.ui_hooks.login_screen.process_edit'),
(18, 'Users', NULL, 4, 'form_edit', 'ui_hooks', 'users.ui_hooks.login_block.form_edit'),
(19, 'Users', NULL, 4, 'validate_edit', 'ui_hooks', 'users.ui_hooks.login_block.validate_edit'),
(20, 'Users', NULL, 4, 'process_edit', 'ui_hooks', 'users.ui_hooks.login_block.process_edit'),
(21, 'Blocks', NULL, 5, 'form_edit', 'ui_hooks', 'blocks.ui_hooks.htmlblock.content.form_edit');

-- --------------------------------------------------------

--
-- Estructura de la taula `IWmain`
--

CREATE TABLE IF NOT EXISTS `IWmain` (
  `iw_id` int(11) NOT NULL AUTO_INCREMENT,
  `iw_module` varchar(50) NOT NULL,
  `iw_name` varchar(50) NOT NULL,
  `iw_value` longtext NOT NULL,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_lifetime` varchar(20) NOT NULL DEFAULT '0',
  `iw_nult` tinyint(4) NOT NULL DEFAULT '0',
  `pn_obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `pn_cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_cr_uid` int(11) NOT NULL DEFAULT '0',
  `pn_lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pn_lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_id`),
  KEY `iw_module` (`iw_module`),
  KEY `iw_name` (`iw_name`),
  KEY `iw_uid` (`iw_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWmain_logs`
--

CREATE TABLE IF NOT EXISTS `IWmain_logs` (
  `iw_logId` int(11) NOT NULL AUTO_INCREMENT,
  `iw_moduleName` varchar(25) NOT NULL,
  `iw_actionType` tinyint(4) NOT NULL DEFAULT '0',
  `iw_visible` tinyint(4) NOT NULL DEFAULT '0',
  `iw_actionText` varchar(255) NOT NULL,
  `iw_logIp` varchar(15) NOT NULL,
  `iw_indexName` varchar(15) NOT NULL,
  `iw_indexValue` int(11) NOT NULL DEFAULT '0',
  `iw_indexName1` varchar(15) NOT NULL,
  `iw_indexValue1` int(11) NOT NULL DEFAULT '0',
  `iw_error` tinyint(4) NOT NULL DEFAULT '0',
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_logId`),
  KEY `iw_moduleName` (`iw_moduleName`),
  KEY `iw_visible` (`iw_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `IWstats`
--

CREATE TABLE IF NOT EXISTS `IWstats` (
  `iw_statsid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `iw_ip` varchar(15) NOT NULL,
  `iw_ipForward` varchar(15) NOT NULL DEFAULT '',
  `iw_ipClient` varchar(15) NOT NULL DEFAULT '',
  `iw_userAgent` varchar(255) NOT NULL DEFAULT '',
  `iw_moduleid` int(11) NOT NULL DEFAULT '0',
  `iw_params` varchar(100) NOT NULL,
  `iw_uid` int(11) NOT NULL DEFAULT '0',
  `iw_isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skipped` tinyint(4) NOT NULL DEFAULT '0',
  `iw_skippedModule` tinyint(4) NOT NULL DEFAULT '0',
  `iw_summarised` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_statsid`),
  KEY `iw_moduleid` (`iw_moduleid`),
  KEY `iw_uid` (`iw_uid`),
  KEY `iw_ip` (`iw_ip`),
  KEY `iw_isadmin` (`iw_isadmin`),
  KEY `iw_ipForward` (`iw_ipForward`),
  KEY `iw_ipClient` (`iw_ipClient`),
  KEY `iw_userAgent` (`iw_userAgent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Bolcant dades de la taula `IWstats`
--

INSERT INTO `IWstats` (`iw_statsid`, `iw_datetime`, `iw_ip`, `iw_ipForward`, `iw_ipClient`, `iw_userAgent`, `iw_moduleid`, `iw_params`, `iw_uid`, `iw_isadmin`, `iw_skipped`, `iw_skippedModule`, `iw_summarised`) VALUES
(1, '2015-02-20 18:20:22', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=main', 2, 1, 0, 0, 0),
(2, '2015-02-20 18:20:22', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=servicesList', 2, 1, 0, 0, 0),
(3, '2015-02-20 18:20:24', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=config', 2, 1, 0, 0, 0),
(4, '2015-02-20 18:20:27', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(5, '2015-02-20 18:20:35', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(6, '2015-02-20 18:20:35', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=config', 2, 1, 0, 0, 0),
(7, '2015-02-20 18:20:39', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(8, '2015-02-20 18:20:45', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(9, '2015-02-20 18:20:45', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=config', 2, 1, 0, 0, 0),
(10, '2015-02-20 18:20:49', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(11, '2015-02-20 18:20:56', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=addNewModelType', 2, 1, 0, 0, 0),
(12, '2015-02-20 18:20:56', '192.168.56.1', '', '', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 64, 'module=Agoraportal&type=admin&func=config', 2, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `IWstats_summary`
--

CREATE TABLE IF NOT EXISTS `IWstats_summary` (
  `iw_summaryid` int(11) NOT NULL AUTO_INCREMENT,
  `iw_datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `iw_nrecords` int(11) NOT NULL DEFAULT '0',
  `iw_registered` int(11) NOT NULL DEFAULT '0',
  `iw_modules` longtext NOT NULL,
  `iw_skipped` int(11) NOT NULL DEFAULT '0',
  `iw_skippedModule` int(11) NOT NULL DEFAULT '0',
  `iw_isadmin` int(11) NOT NULL DEFAULT '0',
  `iw_users` longtext NOT NULL,
  `iw_nips` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iw_summaryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `displayname` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `regid` int(11) NOT NULL DEFAULT '0',
  `directory` varchar(64) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '0',
  `official` tinyint(4) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `admin_capable` tinyint(4) NOT NULL DEFAULT '0',
  `user_capable` tinyint(4) NOT NULL DEFAULT '0',
  `profile_capable` tinyint(4) NOT NULL DEFAULT '0',
  `message_capable` tinyint(4) NOT NULL DEFAULT '0',
  `state` smallint(6) NOT NULL DEFAULT '0',
  `credits` varchar(255) NOT NULL,
  `changelog` varchar(255) NOT NULL,
  `help` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `securityschema` longtext NOT NULL,
  `capabilities` longtext NOT NULL,
  `core_min` varchar(9) NOT NULL,
  `core_max` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `mod_state` (`name`,`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Bolcant dades de la taula `modules`
--

INSERT INTO `modules` (`id`, `name`, `type`, `displayname`, `url`, `description`, `regid`, `directory`, `version`, `official`, `author`, `contact`, `admin_capable`, `user_capable`, `profile_capable`, `message_capable`, `state`, `credits`, `changelog`, `help`, `license`, `securityschema`, `capabilities`, `core_min`, `core_max`) VALUES
(1, 'Extensions', 3, 'Mòduls', 'extensions', 'Gestioneu els vostres mòduls i connectors.', 0, 'Extensions', '3.7.10', 1, 'Jim McDonald, Mark West', 'http://www.zikula.org', 1, 0, 0, 0, 3, '', '', '', '', 'a:1:{s:12:"Extensions::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(2, 'Theme', 3, 'Entorns visuals', 'entorn visual', 'Mòdul d''entorns visuals per a la gestió de l''aspecte del lloc, el renderitzat de les plantilles i la memòria cau.', 0, 'Theme', '3.4.2', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Theme::";s:12:"Theme name::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(4, 'Search', 3, 'Motor de cerca', 'cerca', 'Paràmetres del cercador intern del lloc.', 0, 'Search', '1.5.2', 1, 'Patrick Kellum', 'http://www.ctarl-ctarl.com', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:8:"Search::";s:13:"Module name::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(7, 'PageLock', 3, 'Gestor del bloqueig de pàgines', 'pagelock', 'Proporciona la capacitat de bloquejar pàgines quan s''estan utilitzant.', 0, 'PageLock', '1.1.1', 1, 'Jorn Wildt', 'http://www.elfisk.dk', 0, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:10:"PageLock::";s:2:"::";}', 'a:0:{}', '', ''),
(11, 'Blocks', 3, 'Blocs', 'blocs', 'Administració dels blocs i la seva posició.', 0, 'Blocks', '3.8.2', 1, 'Jim McDonald, Mark West', 'http://www.mcdee.net/, http://www.markwest.me.uk/', 1, 1, 0, 0, 3, '', '', '', '', 'a:4:{s:8:"Blocks::";s:30:"Block key:Block title:Block ID";s:16:"Blocks::position";s:26:"Position name::Position ID";s:23:"Menutree:menutreeblock:";s:26:"Block ID:Link Name:Link ID";s:19:"ExtendedMenublock::";s:17:"Block ID:Link ID:";}', 'a:3:{s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(12, 'Groups', 3, 'Grups', 'grups', 'Mòdul d''administració de grups d''usuaris', 0, 'Groups', '2.3.2', 1, 'Mark West, Franky Chestnut, Michael Halbook', 'http://www.markwest.me.uk/, http://dev.pnconcept.com, http://www.halbrooktech.com', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Groups::";s:10:"Group ID::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(14, 'Users', 3, 'Usuaris', 'usuaris', 'Proporciona una interfície per configurar i administrar els comptes dels usuaris. Incorpora totes les funcionalitats necessàries, però pot treballar estretament amb el mòdul de perfil.', 0, 'Users', '2.2.0', 1, 'Xiaoyu Huang, Drak', 'class007@sina.com, drak@zikula.org', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:2:{s:7:"Users::";s:14:"Uname::User ID";s:16:"Users::MailUsers";s:2:"::";}', 'a:4:{s:14:"authentication";a:1:{s:7:"version";s:3:"1.0";}s:15:"hook_subscriber";a:1:{s:7:"enabled";b:1;}s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', ''),
(15, 'Permissions', 3, 'Permisos', 'permisos', 'Gestió dels permisos d''usuari/ària.', 0, 'Permissions', '1.1.1', 1, 'Jim McDonald, M.Maes', 'http://www.mcdee.net/, http://www.mmaes.com', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:1:{s:13:"Permissions::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(16, 'SecurityCenter', 3, 'Seguretat', 'centredeseguretat', 'Administració i configuració de la seguretat del lloc.', 0, 'SecurityCenter', '1.4.4', 1, 'Mark West', 'http://www.markwest.me.uk', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:16:"SecurityCenter::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(17, 'Mailer', 3, 'Mailer', 'mailer', 'El mòdul Mailer, proporciona un API de correu i l''administració de la configuració del correu.', 0, 'Mailer', '1.3.2', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Mailer::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(18, 'Admin', 3, 'Tauler d''administració', 'adminpanel', 'Gestió del propi tauler d''administració.', 0, 'Admin', '1.9.1', 1, 'Mark West', 'http://www.markwest.me.uk/', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:7:"Admin::";s:38:"Admin Category name::Admin Category ID";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(19, 'Categories', 3, 'Categories', 'categories', 'Categoria d''administració.', 0, 'Categories', '1.2.1', 1, 'Robert Gasch', 'rgasch@gmail.com', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:20:"Categories::Category";s:40:"Category ID:Category Path:Category IPath";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(21, 'Errors', 3, 'Errors', 'errors', 'Mòdul de visualització d''errors.', 0, 'Errors', '1.1.1', 1, 'Brian Lindner <Furbo>', 'furbo@sigtauonline.com', 0, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:8:"Errors::";s:2:"::";}', 'a:1:{s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(22, 'Settings', 3, 'Paràmetres generals', 'Paràmetres', 'Interfície de configuració general del lloc.', 0, 'Settings', '2.9.7', 1, 'Simon Wunderlin', '', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"Settings::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(26, 'Legal', 2, 'Legal info manager', 'legalmod', 'Provides an interface for managing the site''s legal documents.', 0, 'Legal', '2.0.1', 1, 'Michael M. Wechsler', 'michael@thelaw.com', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/install.txt', 'pndocs/license.txt', 'a:8:{s:7:"Legal::";s:2:"::";s:18:"Legal::legalnotice";s:2:"::";s:17:"Legal::termsofuse";s:2:"::";s:20:"Legal::privacypolicy";s:2:"::";s:16:"Legal::agepolicy";s:2:"::";s:29:"Legal::accessibilitystatement";s:2:"::";s:30:"Legal::cancellationrightpolicy";s:2:"::";s:22:"Legal::tradeconditions";s:2:"::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99'),
(35, 'AuthLDAP', 2, 'AuthLDAP', 'AuthLDAP', 'Permet validar els centres per LDAP.', 0, 'AuthLDAP', '1.0.1', 1, 'Mike Goldfinger', 'MikeGoldfinger@linuxmail.org', 1, 0, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:10:"AuthLDAP::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(64, 'Agoraportal', 2, 'Agoraportal', 'Agoraportal', 'Administració dels serveis d''Àgora, petició d''espais nous i gestió per part dels centres.', 0, 'Agoraportal', '2.0.12', 0, 'Agora Development Team', 'agora@xtec.cat', 1, 1, 0, 0, 3, 'pndocs/credits.txt', 'pndocs/changelog.txt', 'pndocs/help.txt', 'pndocs/license.txt', 'a:1:{s:13:"Agoraportal::";s:2:"::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(68, 'XtecMailer', 2, 'Mailer XTEC', 'XtecMailer', 'Amplia les funcionalitats del mòdul Mailer per poder enviar correu electrònic utilitzant el servei web de la XTEC', 0, 'XtecMailer', '1.0.0', 0, '', '', 0, 0, 0, 0, 3, '', '', '', '', 'a:1:{s:12:"XtecMailer::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(69, 'IWmain', 2, 'Intraweb', 'IWmain', 'Mòdul principal del mòduls Intraweb. Els mòduls Intraweb necessiten aquest mòdul per poder funcionar.', 0, 'IWmain', '3.0.0', 0, '', '', 0, 0, 0, 0, 3, '', '', '', '', 'a:1:{s:8:"IWmain::";s:2:"::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(70, 'IWstats', 2, 'Estadístiques', 'IWstats', 'Mòdul d''estadístiques.', 0, 'IWstats', '3.0.1', 0, '', '', 0, 0, 0, 0, 3, '', '', '', '', 'a:1:{s:9:"IWstats::";s:2:"::";}', 'a:1:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}}', '', ''),
(71, 'Files', 2, 'Gestor de fitxers', 'fitxers', 'Gestió de fitxers per a llocs Zikula', 0, 'Files', '1.0.1', 0, '', '', 0, 0, 0, 0, 3, '', '', '', '', 'a:1:{s:7:"Files::";s:2:"::";}', 'a:2:{s:5:"admin";a:1:{s:7:"version";s:3:"1.0";}s:4:"user";a:1:{s:7:"version";s:3:"1.0";}}', '1.3.0', '1.3.99');

-- --------------------------------------------------------

--
-- Estructura de la taula `module_deps`
--

CREATE TABLE IF NOT EXISTS `module_deps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modid` int(11) NOT NULL DEFAULT '0',
  `modname` varchar(64) NOT NULL,
  `minversion` varchar(10) NOT NULL,
  `maxversion` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Bolcant dades de la taula `module_deps`
--

INSERT INTO `module_deps` (`id`, `modid`, `modname`, `minversion`, `maxversion`, `status`) VALUES
(8, 11, 'Scribite', '5.0.0', '', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `module_vars`
--

CREATE TABLE IF NOT EXISTS `module_vars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modname` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` longtext,
  PRIMARY KEY (`id`),
  KEY `mod_var` (`modname`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=860 ;

--
-- Bolcant dades de la taula `module_vars`
--

INSERT INTO `module_vars` (`id`, `modname`, `name`, `value`) VALUES
(1, 'Extensions', 'itemsperpage', 'i:25;'),
(3, 'Admin', 'modulesperrow', 's:1:"3";'),
(4, 'Admin', 'itemsperpage', 's:2:"15";'),
(5, 'Admin', 'defaultcategory', 's:1:"2";'),
(6, 'Admin', 'modulestylesheet', 's:11:"navtabs.css";'),
(7, 'Admin', 'admingraphic', 's:1:"1";'),
(8, 'Admin', 'startcategory', 's:1:"1";'),
(9, 'Admin', 'ignoreinstallercheck', 's:1:"1";'),
(10, 'Admin', 'admintheme', 's:0:"";'),
(11, 'Admin', 'displaynametype', 's:1:"1";'),
(12, 'Admin', 'moduledescription', 's:1:"1";'),
(13, 'Permissions', 'filter', 'i:1;'),
(14, 'Permissions', 'warnbar', 'i:1;'),
(15, 'Permissions', 'rowview', 'i:20;'),
(16, 'Permissions', 'rowedit', 'i:20;'),
(17, 'Permissions', 'lockadmin', 'i:1;'),
(18, 'Permissions', 'adminid', 'i:1;'),
(19, 'Groups', 'itemsperpage', 'i:25;'),
(20, 'Groups', 'defaultgroup', 'i:1;'),
(21, 'Groups', 'mailwarning', 's:1:"0";'),
(22, 'Groups', 'hideclosed', 's:1:"0";'),
(23, 'Blocks', 'collapseable', 's:1:"0";'),
(24, 'Users', 'itemsperpage', 's:2:"25";'),
(25, 'Users', 'accountdisplaygraphics', 's:1:"1";'),
(26, 'Users', 'accountitemsperpage', 's:2:"25";'),
(27, 'Users', 'accountitemsperrow', 's:1:"5";'),
(29, 'Users', 'changeemail', 's:1:"0";'),
(30, 'Users', 'reg_allowreg', 's:1:"1";'),
(31, 'Users', 'reg_verifyemail', 's:1:"0";'),
(32, 'Users', 'reg_Illegalusername', 's:97:"root, adm, linux, webmaster, admin, god, administrator, administrador, nobody, anonymous, anonimo";'),
(33, 'Users', 'reg_Illegaldomains', 's:0:"";'),
(34, 'Users', 'reg_Illegaluseragents', 's:0:"";'),
(35, 'Users', 'reg_noregreasons', 's:51:"Sorry! New user registration is currently disabled.";'),
(36, 'Users', 'reg_uniemail', 's:1:"1";'),
(37, 'Users', 'reg_notifyemail', 's:0:"";'),
(39, 'Users', 'userimg', 's:11:"images/menu";'),
(40, 'Users', 'avatarpath', 's:13:"images/avatar";'),
(42, 'Users', 'minpass', 's:1:"5";'),
(43, 'Users', 'anonymous', 's:5:"Guest";'),
(45, 'Users', 'loginviaoption', 's:1:"0";'),
(47, 'Users', 'moderation', 's:1:"0";'),
(48, 'Users', 'hash_method', 's:3:"md5";'),
(49, 'Users', 'login_redirect', 's:1:"1";'),
(50, 'Users', 'reg_question', 's:0:"";'),
(51, 'Users', 'reg_answer', 's:0:"";'),
(53, 'Theme', 'modulesnocache', 's:0:"";'),
(54, 'Theme', 'enablecache', 'b:1;'),
(55, 'Theme', 'compile_check', 'b:1;'),
(56, 'Theme', 'cache_lifetime', 'i:3600;'),
(57, 'Theme', 'force_compile', 'b:1;'),
(58, 'Theme', 'trimwhitespace', 'b:0;'),
(59, 'Theme', 'makelinks', 'b:0;'),
(60, 'Theme', 'maxsizeforlinks', 'i:30;'),
(61, 'Theme', 'itemsperpage', 'i:25;'),
(62, 'Theme', 'cssjscombine', 'b:1;'),
(63, 'Theme', 'cssjscompress', 'b:1;'),
(64, 'Theme', 'cssjsminify', 'b:1;'),
(65, 'Theme', 'cssjscombine_lifetime', 'i:3600;'),
(66, 'ZConfig', 'debug', 's:1:"0";'),
(67, 'ZConfig', 'sitename', 's:29:"Gestió dels serveis d''Àgora";'),
(68, 'ZConfig', 'slogan', 's:0:"";'),
(69, 'ZConfig', 'metakeywords', 's:30:"agora, portal, gestor, serveis";'),
(70, 'ZConfig', 'startdate', 's:7:"02/2010";'),
(71, 'ZConfig', 'adminmail', 's:14:"agora@xtec.cat";'),
(72, 'ZConfig', 'Default_Theme', 's:8:"IWportal";'),
(73, 'ZConfig', 'anonymous', 's:5:"Guest";'),
(74, 'ZConfig', 'timezone_offset', 's:1:"1";'),
(75, 'ZConfig', 'timezone_server', 's:1:"2";'),
(76, 'ZConfig', 'funtext', 's:1:"1";'),
(77, 'ZConfig', 'reportlevel', 's:1:"0";'),
(78, 'ZConfig', 'startpage', 's:11:"Agoraportal";'),
(79, 'ZConfig', 'Version_Num', 's:5:"1.3.9";'),
(80, 'ZConfig', 'Version_ID', 's:6:"Zikula";'),
(81, 'ZConfig', 'Version_Sub', 's:3:"vai";'),
(82, 'ZConfig', 'debug_sql', 's:1:"0";'),
(83, 'ZConfig', 'multilingual', 's:1:"0";'),
(84, 'ZConfig', 'useflags', 's:1:"0";'),
(85, 'ZConfig', 'theme_change', 'b:0;'),
(86, 'ZConfig', 'UseCompression', 's:1:"0";'),
(87, 'ZConfig', 'errordisplay', 'i:1;'),
(88, 'ZConfig', 'errorlog', 's:1:"0";'),
(89, 'ZConfig', 'errorlogtype', 's:1:"0";'),
(90, 'ZConfig', 'errormailto', 's:14:"me@example.com";'),
(91, 'ZConfig', 'siteoff', 's:1:"0";'),
(92, 'ZConfig', 'siteoffreason', 's:0:"";'),
(93, 'ZConfig', 'starttype', 's:4:"user";'),
(94, 'ZConfig', 'startfunc', 's:9:"sitesList";'),
(95, 'ZConfig', 'startargs', 's:0:"";'),
(96, 'ZConfig', 'entrypoint', 's:9:"index.php";'),
(97, 'ZConfig', 'language_detect', 's:1:"0";'),
(98, 'ZConfig', 'shorturls', 'b:0;'),
(99, 'ZConfig', 'shorturlstype', 's:1:"0";'),
(101, 'ZConfig', 'shorturlsseparator', 's:1:"-";'),
(102, 'ZConfig', 'shorturlsstripentrypoint', 'b:0;'),
(103, 'ZConfig', 'shorturlsdefaultmodule', 's:0:"";'),
(104, 'ZConfig', 'profilemodule', 's:0:"";'),
(105, 'ZConfig', 'messagemodule', 's:0:"";'),
(106, 'ZConfig', 'languageurl', 's:1:"0";'),
(107, 'ZConfig', 'ajaxtimeout', 'i:5000;'),
(108, 'ZConfig', 'permasearch', 's:161:"À,Á,Â,Ã,Å,à,á,â,ã,å,Ò,Ó,Ô,Õ,Ø,ò,ó,ô,õ,ø,È,É,Ê,Ë,è,é,ê,ë,Ç,ç,Ì,Í,Î,Ï,ì,í,î,ï,Ù,Ú,Û,ù,ú,û,ÿ,Ñ,ñ,ß,ä,Ä,ö,Ö,ü,Ü";'),
(109, 'ZConfig', 'permareplace', 's:114:"A,A,A,A,A,a,a,a,a,a,O,O,O,O,O,o,o,o,o,o,E,E,E,E,e,e,e,e,C,c,I,I,I,I,i,i,i,i,U,U,U,u,u,u,y,N,n,ss,ae,Ae,oe,Oe,ue,Ue";'),
(110, 'ZConfig', 'language', 's:3:"eng";'),
(111, 'ZConfig', 'locale', 's:2:"ca";'),
(112, 'ZConfig', 'language_i18n', 's:2:"ca";'),
(117, 'SecurityCenter', 'itemsperpage', 'i:10;'),
(118, 'ZConfig', 'enableanticracker', 'i:1;'),
(119, 'ZConfig', 'emailhackattempt', 'i:1;'),
(120, 'ZConfig', 'loghackattempttodb', 'i:1;'),
(121, 'ZConfig', 'onlysendsummarybyemail', 'i:1;'),
(122, 'ZConfig', 'updatecheck', 'i:1;'),
(123, 'ZConfig', 'updatefrequency', 'i:7;'),
(124, 'ZConfig', 'updatelastchecked', 'i:1424452705;'),
(125, 'ZConfig', 'updateversion', 's:5:"1.3.8";'),
(126, 'ZConfig', 'keyexpiry', 'i:0;'),
(127, 'ZConfig', 'sessionauthkeyua', 'i:0;'),
(128, 'ZConfig', 'secure_domain', 's:0:"";'),
(129, 'ZConfig', 'signcookies', 'i:1;'),
(130, 'ZConfig', 'signingkey', 's:40:"809f1f324a4997b6820c93af2dc6530e892bd758";'),
(131, 'ZConfig', 'seclevel', 's:3:"Low";'),
(132, 'ZConfig', 'secmeddays', 'i:7;'),
(133, 'ZConfig', 'secinactivemins', 'i:20;'),
(134, 'ZConfig', 'sessionstoretofile', 'i:0;'),
(135, 'ZConfig', 'sessionsavepath', 's:0:"";'),
(136, 'ZConfig', 'gc_probability', 'i:100;'),
(137, 'ZConfig', 'anonymoussessions', 'i:1;'),
(138, 'ZConfig', 'sessionrandregenerate', 'i:0;'),
(139, 'ZConfig', 'sessionregenerate', 'i:0;'),
(140, 'ZConfig', 'sessionregeneratefreq', 'i:10;'),
(141, 'ZConfig', 'sessionipcheck', 'i:0;'),
(142, 'ZConfig', 'sessionname', 's:4:"ZSID";'),
(143, 'ZConfig', 'filtergetvars', 's:1:"1";'),
(144, 'ZConfig', 'filterpostvars', 's:1:"1";'),
(145, 'ZConfig', 'filtercookievars', 's:1:"1";'),
(146, 'ZConfig', 'outputfilter', 's:1:"1";'),
(147, 'ZConfig', 'summarycontent', 's:1153:"For the attention of %sitename% administration staff:\r\n\r\nOn %date% at %time%, Zikula detected that somebody tried to interact with the site in a way that may have been intended compromise its security. This is not necessarily the case: it could have been caused by work you were doing on the site, or may have been due to some other reason. In any case, it was detected and blocked. \r\n\r\nThe suspicious activity was recognised in ''%filename%'' at line %linenumber%.\r\n\r\nType: %type%. \r\n\r\nAdditional information: %additionalinfo%.\r\n\r\nBelow is logged information that may help you identify what happened and who was responsible.\r\n\r\n=====================================\r\nInformation about the user:\r\n=====================================\r\nUser name:  %username%\r\nUser''s e-mail address: %useremail%\r\nUser''s real name: %userrealname%\r\n\r\n=====================================\r\nIP numbers (if this was a cracker, the IP numbers may not be the true point of origin)\r\n=====================================\r\nIP according to HTTP_CLIENT_IP: %httpclientip%\r\nIP according to REMOTE_ADDR: %remoteaddr%\r\nIP according to GetHostByName($REMOTE_ADDR): %gethostbyremoteaddr%";'),
(148, 'ZConfig', 'fullcontent', 's:1334:"=====================================\r\nInformation in the $_REQUEST array\r\n=====================================\r\n%requestarray%\r\n\r\n=====================================\r\nInformation in the $_GET array\r\n(variables that may have been in the URL string or in a ''GET''-type form)\r\n=====================================\r\n%getarray%\r\n\r\n=====================================\r\nInformation in the $_POST array\r\n(visible and invisible form elements)\r\n=====================================\r\n%postarray%\r\n\r\n=====================================\r\nBrowser information\r\n=====================================\r\n%browserinfo%\r\n\r\n=====================================\r\nInformation in the $_SERVER array\r\n=====================================\r\n%serverarray%\r\n\r\n=====================================\r\nInformation in the $_ENV array\r\n=====================================\r\n%envarray%\r\n\r\n=====================================\r\nInformation in the $_COOKIE array\r\n=====================================\r\n%cookiearray%\r\n\r\n=====================================\r\nInformation in the $_FILES array\r\n=====================================\r\n%filearray%\r\n\r\n=====================================\r\nInformation in the $_SESSION array\r\n(session information -- variables starting with PNSV are Zikula session variables)\r\n=====================================\r\n%sessionarray%";'),
(149, 'ZConfig', 'usehtaccessbans', 's:1:"0";'),
(150, 'ZConfig', 'extrapostprotection', 's:1:"0";'),
(151, 'ZConfig', 'extragetprotection', 's:1:"0";'),
(152, 'ZConfig', 'checkmultipost', 's:1:"0";'),
(153, 'ZConfig', 'maxmultipost', 'i:4;'),
(154, 'ZConfig', 'cpuloadmonitor', 's:1:"0";'),
(155, 'ZConfig', 'cpumaxload', 'd:10;'),
(156, 'ZConfig', 'ccisessionpath', 's:0:"";'),
(157, 'ZConfig', 'htaccessfilelocation', 's:9:".htaccess";'),
(158, 'ZConfig', 'nocookiebanthreshold', 'i:10;'),
(159, 'ZConfig', 'nocookiewarningthreshold', 'i:2;'),
(160, 'ZConfig', 'fastaccessbanthreshold', 'i:40;'),
(161, 'ZConfig', 'fastaccesswarnthreshold', 'i:10;'),
(162, 'ZConfig', 'javababble', 's:1:"0";'),
(163, 'ZConfig', 'javaencrypt', 's:1:"0";'),
(164, 'ZConfig', 'preservehead', 's:1:"0";'),
(165, 'ZConfig', 'filterarrays', 'i:1;'),
(166, 'ZConfig', 'htmlentities', 's:1:"1";'),
(167, 'ZConfig', 'AllowableHTML', 'a:83:{s:3:"!--";i:2;s:1:"a";i:2;s:4:"abbr";i:0;s:7:"acronym";i:0;s:7:"address";i:0;s:6:"applet";i:0;s:4:"area";i:0;s:1:"b";i:2;s:4:"base";i:0;s:8:"basefont";i:0;s:3:"bdo";i:0;s:3:"big";i:0;s:10:"blockquote";i:2;s:2:"br";i:2;s:6:"button";i:0;s:7:"caption";i:0;s:6:"center";i:2;s:4:"cite";i:0;s:4:"code";i:0;s:3:"col";i:0;s:8:"colgroup";i:0;s:3:"del";i:0;s:3:"dfn";i:0;s:3:"dir";i:0;s:3:"div";i:2;s:2:"dl";i:1;s:2:"dd";i:1;s:2:"dt";i:1;s:2:"em";i:2;s:5:"embed";i:0;s:8:"fieldset";i:0;s:4:"font";i:0;s:4:"form";i:0;s:2:"h1";i:1;s:2:"h2";i:1;s:2:"h3";i:1;s:2:"h4";i:1;s:2:"h5";i:1;s:2:"h6";i:1;s:2:"hr";i:2;s:1:"i";i:2;s:6:"iframe";i:0;s:3:"img";i:0;s:5:"input";i:0;s:3:"ins";i:0;s:3:"kbd";i:0;s:5:"label";i:0;s:6:"legend";i:0;s:2:"li";i:2;s:3:"map";i:0;s:7:"marquee";i:0;s:4:"menu";i:0;s:4:"nobr";i:0;s:6:"object";i:0;s:2:"ol";i:2;s:8:"optgroup";i:0;s:6:"option";i:0;s:1:"p";i:2;s:5:"param";i:0;s:3:"pre";i:2;s:1:"q";i:0;s:1:"s";i:0;s:4:"samp";i:0;s:6:"script";i:0;s:6:"select";i:0;s:5:"small";i:0;s:4:"span";i:0;s:6:"strike";i:0;s:6:"strong";i:2;s:3:"sub";i:0;s:3:"sup";i:0;s:5:"table";i:2;s:5:"tbody";i:0;s:2:"td";i:2;s:8:"textarea";i:0;s:5:"tfoot";i:0;s:2:"th";i:2;s:5:"thead";i:0;s:2:"tr";i:2;s:2:"tt";i:2;s:1:"u";i:0;s:2:"ul";i:2;s:3:"var";i:0;}'),
(168, 'Categories', 'userrootcat', 's:17:"/__SYSTEM__/Users";'),
(169, 'Categories', 'allowusercatedit', 's:1:"0";'),
(170, 'Categories', 'autocreateusercat', 's:1:"0";'),
(171, 'Categories', 'autocreateuserdefaultcat', 's:1:"0";'),
(172, 'Categories', 'userdefaultcatname', 's:7:"Default";'),
(176, 'Mailer', 'mailertype', 'i:5;'),
(177, 'Mailer', 'charset', 's:5:"utf-8";'),
(178, 'Mailer', 'encoding', 's:4:"8bit";'),
(179, 'Mailer', 'html', 'b:0;'),
(180, 'Mailer', 'wordwrap', 'i:50;'),
(181, 'Mailer', 'msmailheaders', 'b:0;'),
(182, 'Mailer', 'sendmailpath', 's:18:"/usr/sbin/sendmail";'),
(183, 'Mailer', 'smtpauth', 'b:0;'),
(184, 'Mailer', 'smtpserver', 's:9:"localhost";'),
(185, 'Mailer', 'smtpport', 'i:25;'),
(186, 'Mailer', 'smtptimeout', 'i:10;'),
(187, 'Mailer', 'smtpusername', 's:0:"";'),
(188, 'Mailer', 'smtppassword', 's:0:"";'),
(194, 'Search', 'itemsperpage', 'i:10;'),
(195, 'Search', 'limitsummary', 'i:255;'),
(196, 'ZConfig', 'log_last_rotate', 'i:1336499209;'),
(205, 'AuthPN', 'authmodules', 's:6:"AuthPN";'),
(258, 'AuthLDAP', 'authldap_serveradr', 's:13:"ldap.xtec.cat";'),
(259, 'AuthLDAP', 'authldap_basedn', 's:23:"ou=People,dc=xtec,dc=es";'),
(260, 'AuthLDAP', 'authldap_bindas', 's:0:"";'),
(261, 'AuthLDAP', 'authldap_bindpass', 's:0:"";'),
(262, 'AuthLDAP', 'authldap_searchdn', 's:13:"dc=xtec,dc=es";'),
(263, 'AuthLDAP', 'authldap_searchattr', 's:3:"uid";'),
(264, 'AuthLDAP', 'authldap_protocol', 's:1:"3";'),
(265, 'AuthLDAP', 'authldap_pnldap', 's:2:"pn";'),
(266, 'AuthLDAP', 'authldap_hash_method', 's:4:"none";'),
(745, 'Agoraportal', 'siteBaseURL', 's:19:"http://agora/agora/";'),
(746, 'Agoraportal', 'tempFolder', 's:0:"";'),
(747, 'Agoraportal', 'serveradr', 's:9:"127.0.0.1";'),
(748, 'Agoraportal', 'basedn', 's:13:"dc=foo,dc=bar";'),
(749, 'Agoraportal', 'bindas', 's:0:"";'),
(750, 'Agoraportal', 'bindpass', 's:0:"";'),
(751, 'Agoraportal', 'searchdn', 's:22:"ou=users,dc=foo,dc=bar";'),
(752, 'Agoraportal', 'serverport', 's:3:"389";'),
(753, 'Agoraportal', 'allowedUsersAdministration', 's:4:"none";'),
(754, 'Agoraportal', 'allowedAccessRequest', 'i:0;'),
(755, 'Agoraportal', 'sqlSecurityCode', 's:4:"****";'),
(756, 'Agoraportal', 'allowedIpsForCalcDisckConsume', 's:12:"192.168.56.1";'),
(757, 'Agoraportal', 'warningMailsTo', 's:16:"aginard@xtec.cat";'),
(758, 'Agoraportal', 'requestMailsTo', 's:0:"";'),
(759, 'Agoraportal', 'diskRequestThreshold', 's:2:"70";'),
(760, 'Agoraportal', 'clientsMailThreshold', 's:2:"85";'),
(761, 'Agoraportal', 'maxAbsFreeQuota', 's:4:"1000";'),
(762, 'Agoraportal', 'maxFreeQuotaForRequest', 's:4:"1000";'),
(763, 'Categories', 'EntityCategorySubclasses', 'a:0:{}'),
(764, '/EventHandlers', 'Extensions', 'a:2:{i:0;a:3:{s:9:"eventname";s:27:"controller.method_not_found";s:8:"callable";a:2:{i:0;s:17:"Extensions_HookUI";i:1;s:5:"hooks";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:27:"controller.method_not_found";s:8:"callable";a:2:{i:0;s:17:"Extensions_HookUI";i:1;s:14:"moduleservices";}s:6:"weight";i:10;}}'),
(765, 'ZConfig', 'idnnames', 'b:1;'),
(766, 'Legal', 'minimumAge', 's:1:"0";'),
(767, '/EventHandlers', 'Users', 'a:4:{i:0;a:3:{s:9:"eventname";s:19:"get.pending_content";s:8:"callable";a:2:{i:0;s:29:"Users_Listener_PendingContent";i:1;s:22:"pendingContentListener";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:15:"user.login.veto";s:8:"callable";a:2:{i:0;s:35:"Users_Listener_ForcedPasswordChange";i:1;s:28:"forcedPasswordChangeListener";}s:6:"weight";i:10;}i:2;a:3:{s:9:"eventname";s:21:"user.logout.succeeded";s:8:"callable";a:2:{i:0;s:34:"Users_Listener_ClearUsersNamespace";i:1;s:27:"clearUsersNamespaceListener";}s:6:"weight";i:10;}i:3;a:3:{s:9:"eventname";s:25:"frontcontroller.exception";s:8:"callable";a:2:{i:0;s:34:"Users_Listener_ClearUsersNamespace";i:1;s:27:"clearUsersNamespaceListener";}s:6:"weight";i:10;}}'),
(768, 'Users', 'chgemail_expiredays', 'i:0;'),
(769, 'Users', 'chgpass_expiredays', 'i:0;'),
(770, 'Users', 'reg_expiredays', 'i:0;'),
(771, 'Users', 'allowgravatars', 'b:1;'),
(772, 'Users', 'gravatarimage', 's:12:"gravatar.gif";'),
(773, 'Users', 'login_displayapproval', 'b:0;'),
(774, 'Users', 'login_displaydelete', 'b:0;'),
(775, 'Users', 'login_displayinactive', 'b:0;'),
(776, 'Users', 'login_displayverify', 'b:0;'),
(777, 'Users', 'use_password_strength_meter', 'b:0;'),
(778, 'Users', 'moderation_order', 'i:0;'),
(779, 'Users', 'reg_autologin', 'b:0;'),
(780, 'Groups', 'primaryadmingroup', 'i:2;'),
(781, 'Theme', 'render_cache', 'i:1;'),
(782, 'Theme', 'render_compile_check', 'b:1;'),
(783, 'Theme', 'render_expose_template', 'b:0;'),
(784, 'Theme', 'render_force_compile', 'b:1;'),
(785, 'Theme', 'render_lifetime', 'i:3600;'),
(786, 'ZConfig', 'defaultpagetitle', 's:29:"Gestió dels serveis d''Àgora";'),
(787, 'ZConfig', 'defaultmetadescription', 's:20:"gestor serveis agora";'),
(788, 'ZConfig', 'useids', 'i:0;'),
(789, 'ZConfig', 'idsmail', 'i:0;'),
(790, 'ZConfig', 'idsrulepath', 's:32:"config/phpids_zikula_default.xml";'),
(791, 'ZConfig', 'idssoftblock', 'i:1;'),
(792, 'ZConfig', 'idsfilter', 's:3:"xml";'),
(793, 'ZConfig', 'idsimpactthresholdone', 'i:1;'),
(794, 'ZConfig', 'idsimpactthresholdtwo', 'i:10;'),
(795, 'ZConfig', 'idsimpactthresholdthree', 'i:25;'),
(796, 'ZConfig', 'idsimpactthresholdfour', 'i:75;'),
(797, 'ZConfig', 'idsimpactmode', 'i:1;'),
(798, 'ZConfig', 'idshtmlfields', 'a:1:{i:0;s:14:"POST.__wysiwyg";}'),
(799, 'ZConfig', 'idsjsonfields', 'a:1:{i:0;s:15:"POST.__jsondata";}'),
(800, 'ZConfig', 'idsexceptions', 'a:12:{i:0;s:10:"GET.__utmz";i:1;s:10:"GET.__utmc";i:2;s:18:"REQUEST.linksorder";i:3;s:15:"POST.linksorder";i:4;s:19:"REQUEST.fullcontent";i:5;s:16:"POST.fullcontent";i:6;s:22:"REQUEST.summarycontent";i:7;s:19:"POST.summarycontent";i:8;s:19:"REQUEST.filter.page";i:9;s:16:"POST.filter.page";i:10;s:20:"REQUEST.filter.value";i:11;s:17:"POST.filter.value";}'),
(801, 'SecurityCenter', 'htmlpurifierConfig', 's:3914:"a:10:{s:4:"Attr";a:15:{s:14:"AllowedClasses";N;s:19:"AllowedFrameTargets";a:0:{}s:10:"AllowedRel";a:3:{s:8:"nofollow";b:1;s:11:"imageviewer";b:1;s:8:"lightbox";b:1;}s:10:"AllowedRev";a:0:{}s:13:"ClassUseCDATA";N;s:15:"DefaultImageAlt";N;s:19:"DefaultInvalidImage";s:0:"";s:22:"DefaultInvalidImageAlt";s:13:"Invalid image";s:14:"DefaultTextDir";s:3:"ltr";s:8:"EnableID";b:0;s:16:"ForbiddenClasses";a:0:{}s:11:"IDBlacklist";a:0:{}s:17:"IDBlacklistRegexp";N;s:8:"IDPrefix";s:0:"";s:13:"IDPrefixLocal";s:0:"";}s:10:"AutoFormat";a:10:{s:13:"AutoParagraph";b:0;s:6:"Custom";a:0:{}s:14:"DisplayLinkURI";b:0;s:7:"Linkify";b:0;s:22:"PurifierLinkify.DocURL";s:3:"#%s";s:15:"PurifierLinkify";b:0;s:33:"RemoveEmpty.RemoveNbsp.Exceptions";a:2:{s:2:"td";b:1;s:2:"th";b:1;}s:22:"RemoveEmpty.RemoveNbsp";b:0;s:11:"RemoveEmpty";b:0;s:28:"RemoveSpansWithoutAttributes";b:0;}s:3:"CSS";a:9:{s:14:"AllowImportant";b:0;s:11:"AllowTricky";b:0;s:12:"AllowedFonts";N;s:17:"AllowedProperties";N;s:13:"DefinitionRev";i:1;s:19:"ForbiddenProperties";a:0:{}s:12:"MaxImgLength";s:6:"1200px";s:11:"Proprietary";b:0;s:7:"Trusted";b:0;}s:5:"Cache";a:3:{s:14:"DefinitionImpl";s:10:"Serializer";s:14:"SerializerPath";N;s:21:"SerializerPermissions";i:493;}s:4:"Core";a:17:{s:17:"AggressivelyFixLt";b:1;s:13:"CollectErrors";b:0;s:13:"ColorKeywords";a:17:{s:6:"maroon";s:7:"#800000";s:3:"red";s:7:"#FF0000";s:6:"orange";s:7:"#FFA500";s:6:"yellow";s:7:"#FFFF00";s:5:"olive";s:7:"#808000";s:6:"purple";s:7:"#800080";s:7:"fuchsia";s:7:"#FF00FF";s:5:"white";s:7:"#FFFFFF";s:4:"lime";s:7:"#00FF00";s:5:"green";s:7:"#008000";s:4:"navy";s:7:"#000080";s:4:"blue";s:7:"#0000FF";s:4:"aqua";s:7:"#00FFFF";s:4:"teal";s:7:"#008080";s:5:"black";s:7:"#000000";s:6:"silver";s:7:"#C0C0C0";s:4:"gray";s:7:"#808080";}s:25:"ConvertDocumentToFragment";b:1;s:31:"DirectLexLineNumberSyncInterval";i:0;s:8:"Encoding";s:5:"utf-8";s:21:"EscapeInvalidChildren";b:0;s:17:"EscapeInvalidTags";b:0;s:24:"EscapeNonASCIICharacters";b:0;s:14:"HiddenElements";a:2:{s:6:"script";b:1;s:5:"style";b:1;}s:8:"Language";s:2:"en";s:9:"LexerImpl";N;s:19:"MaintainLineNumbers";N;s:17:"NormalizeNewlines";b:1;s:16:"RemoveInvalidImg";b:1;s:28:"RemoveProcessingInstructions";b:0;s:20:"RemoveScriptContents";N;}s:6:"Filter";a:6:{s:6:"Custom";a:0:{}s:27:"ExtractStyleBlocks.Escaping";b:1;s:24:"ExtractStyleBlocks.Scope";N;s:27:"ExtractStyleBlocks.TidyImpl";N;s:18:"ExtractStyleBlocks";b:0;s:7:"YouTube";b:0;}s:4:"HTML";a:26:{s:7:"Allowed";N;s:17:"AllowedAttributes";N;s:15:"AllowedElements";N;s:14:"AllowedModules";N;s:18:"Attr.Name.UseCDATA";b:0;s:12:"BlockWrapper";s:1:"p";s:11:"CoreModules";a:7:{s:9:"Structure";b:1;s:4:"Text";b:1;s:9:"Hypertext";b:1;s:4:"List";b:1;s:22:"NonXMLCommonAttributes";b:1;s:19:"XMLCommonAttributes";b:1;s:16:"CommonAttributes";b:1;}s:13:"CustomDoctype";N;s:12:"DefinitionID";N;s:13:"DefinitionRev";i:1;s:7:"Doctype";N;s:20:"FlashAllowFullScreen";b:0;s:19:"ForbiddenAttributes";a:0:{}s:17:"ForbiddenElements";a:0:{}s:12:"MaxImgLength";i:1200;s:8:"Nofollow";b:0;s:6:"Parent";s:3:"div";s:11:"Proprietary";b:0;s:9:"SafeEmbed";b:1;s:10:"SafeObject";b:1;s:6:"Strict";b:0;s:7:"TidyAdd";a:0:{}s:9:"TidyLevel";s:6:"medium";s:10:"TidyRemove";a:0:{}s:7:"Trusted";b:0;s:5:"XHTML";b:1;}s:6:"Output";a:6:{s:21:"CommentScriptContents";b:1;s:12:"FixInnerHTML";b:1;s:11:"FlashCompat";b:1;s:7:"Newline";N;s:8:"SortAttr";b:0;s:10:"TidyFormat";b:0;}s:4:"Test";a:1:{s:12:"ForceNoIconv";b:0;}s:3:"URI";a:16:{s:14:"AllowedSchemes";a:6:{s:4:"http";b:1;s:5:"https";b:1;s:6:"mailto";b:1;s:3:"ftp";b:1;s:4:"nntp";b:1;s:4:"news";b:1;}s:4:"Base";N;s:13:"DefaultScheme";s:4:"http";s:12:"DefinitionID";N;s:13:"DefinitionRev";i:1;s:7:"Disable";b:0;s:15:"DisableExternal";b:0;s:24:"DisableExternalResources";b:0;s:16:"DisableResources";b:0;s:4:"Host";N;s:13:"HostBlacklist";a:0:{}s:12:"MakeAbsolute";b:0;s:5:"Munge";N;s:14:"MungeResources";b:0;s:14:"MungeSecretKey";N;s:22:"OverrideAllowedSchemes";b:1;}}";'),
(802, 'ZConfig', 'sessioncsrftokenonetime', 'i:0;'),
(803, '/EventHandlers', 'AuthLDAP', 'a:2:{i:0;a:3:{s:9:"eventname";s:31:"module.users.ui.login.succeeded";s:8:"callable";a:2:{i:0;s:18:"AuthLDAP_Listeners";i:1;s:20:"loginSuccessListener";}s:6:"weight";i:10;}i:1;a:3:{s:9:"eventname";s:28:"module.users.ui.login.failed";s:8:"callable";a:2:{i:0;s:18:"AuthLDAP_Listeners";i:1;s:19:"tryAuthLDAPListener";}s:6:"weight";i:10;}}'),
(804, 'Legal', 'termsOfUseActive', 's:1:"1";'),
(805, 'Legal', 'privacyPolicyActive', 's:1:"1";'),
(806, 'Legal', 'accessibilityStatementActive', 's:1:"1";'),
(807, '/EventHandlers', 'Legal', 'a:2:{i:0;a:3:{s:9:"eventname";s:15:"user.login.veto";s:8:"callable";a:2:{i:0;s:29:"Legal_Listener_UsersLoginVeto";i:1;s:22:"acceptPoliciesListener";}s:6:"weight";i:10;}i:1;a:1:{s:9:"classname";s:29:"Legal_Listener_UsersUiHandler";}}'),
(808, 'Legal', 'legalNoticeActive', 'b:0;'),
(809, 'Legal', 'cancellationRightPolicyActive', 'b:0;'),
(810, 'Legal', 'tradeConditionsActive', 'b:0;'),
(811, 'Legal', 'legalNoticeUrl', 's:0:"";'),
(812, 'Legal', 'termsOfUseUrl', 's:0:"";'),
(813, 'Legal', 'privacyPolicyUrl', 's:0:"";'),
(814, 'Legal', 'accessibilityStatementUrl', 's:0:"";'),
(815, 'Legal', 'cancellationRightPolicyUrl', 's:0:"";'),
(816, 'Legal', 'tradeConditionsUrl', 's:0:"";'),
(817, 'XtecMailer', 'enabled', 'i:1;'),
(818, 'XtecMailer', 'idApp', 's:5:"AGORA";'),
(819, 'XtecMailer', 'replyAddress', 's:14:"agora@xtec.cat";'),
(820, 'XtecMailer', 'sender', 's:8:"educacio";'),
(821, 'XtecMailer', 'environment', 's:5:"LOCAL";'),
(822, 'XtecMailer', 'contenttype', 'i:2;'),
(823, 'XtecMailer', 'log', 'i:0;'),
(824, 'XtecMailer', 'debug', 'i:0;'),
(825, 'XtecMailer', 'logpath', 's:0:"";'),
(826, '/EventHandlers', 'XtecMailer', 'a:1:{i:0;a:3:{s:9:"eventname";s:29:"module.mailer.api.sendmessage";s:8:"callable";a:2:{i:0;s:20:"XtecMailer_Listeners";i:1;s:8:"sendMail";}s:6:"weight";i:10;}}'),
(827, 'systemplugin.imagine', 'version', 's:5:"1.0.0";'),
(828, 'systemplugin.imagine', 'thumb_dir', 's:20:"systemplugin.imagine";'),
(829, 'systemplugin.imagine', 'thumb_auto_cleanup', 'b:0;'),
(830, 'systemplugin.imagine', 'presets', 'a:1:{s:7:"default";C:27:"SystemPlugin_Imagine_Preset":178:{x:i:2;a:7:{s:5:"width";i:100;s:6:"height";i:100;s:4:"mode";N;s:9:"extension";N;s:8:"__module";N;s:9:"__imagine";N;s:16:"__transformation";N;};m:a:1:{s:7:"\0*\0name";s:7:"default";}}}'),
(831, 'Theme', 'enable_mobile_theme', 'b:0;'),
(832, 'Mailer', 'smtpsecuremethod', 's:0:"";'),
(833, 'IWmain', 'url', 's:31:"http://phobos.xtec.net/intraweb";'),
(834, 'IWmain', 'email', 's:17:"intraweb@xtec.cat";'),
(835, 'IWmain', 'documentRoot', 's:4:"data";'),
(836, 'IWmain', 'extensions', 's:35:"odt|ods|odp|zip|pdf|doc|jpg|gif|txt";'),
(837, 'IWmain', 'maxsize', 's:7:"1000000";'),
(838, 'IWmain', 'usersvarslife', 's:2:"60";'),
(839, 'IWmain', 'cronHeaderText', 's:68:"Text de l''encapçalament dels missatges automàtics amb les novetats";'),
(840, 'IWmain', 'cronFooterText', 's:25:"Text del peu del missatge";'),
(841, 'IWmain', 'showHideFiles', 's:1:"0";'),
(842, 'IWmain', 'captchaPrivateCode', 's:0:"";'),
(843, 'IWmain', 'captchaPublicCode', 's:0:"";'),
(844, 'IWmain', 'URLBase', 's:26:"http://agora/agora/portal/";'),
(845, 'IWstats', 'skippedIps', 's:0:"";'),
(846, 'IWstats', 'modulesSkipped', 's:0:"";'),
(847, 'IWstats', 'deleteFromDays', 'i:90;'),
(848, 'IWstats', 'keepDays', 'i:90;'),
(849, '/EventHandlers', 'IWstats', 'a:1:{i:0;a:3:{s:9:"eventname";s:13:"core.postinit";s:8:"callable";a:2:{i:0;s:17:"IWstats_Listeners";i:1;s:8:"coreinit";}s:6:"weight";i:10;}}'),
(850, 'Files', 'showHideFiles', 's:1:"0";'),
(851, 'Files', 'allowedExtensions', 's:36:"gif,png,jpg,jpeg,odt,doc,pdf,zip,txt";'),
(852, 'Files', 'defaultQuota', 's:1:"1";'),
(853, 'Files', 'groupsQuota', 's:0:"";'),
(854, 'Files', 'filesMaxSize', 's:7:"1000000";'),
(855, 'Files', 'maxWidth', 's:3:"250";'),
(856, 'Files', 'maxHeight', 's:3:"250";'),
(857, 'Files', 'editableExtensions', 's:32:"php,htm,html,htaccess,css,js,tpl";'),
(858, 'Files', 'usersFolder', 's:10:"usersFiles";'),
(859, 'Files', 'defaultPublic', 'i:0;');

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_attributes`
--

CREATE TABLE IF NOT EXISTS `objectdata_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(80) NOT NULL,
  `object_id` int(11) NOT NULL DEFAULT '0',
  `object_type` varchar(80) NOT NULL,
  `value` longtext NOT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Bolcant dades de la taula `objectdata_attributes`
--

INSERT INTO `objectdata_attributes` (`id`, `attribute_name`, `object_id`, `object_type`, `value`, `obj_status`, `cr_date`, `cr_uid`, `lu_date`, `lu_uid`) VALUES
(1, 'code', 5, 'categories_category', 'Y', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(2, 'code', 6, 'categories_category', 'N', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(3, 'code', 11, 'categories_category', 'P', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(4, 'code', 12, 'categories_category', 'C', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(5, 'code', 13, 'categories_category', 'A', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(6, 'code', 14, 'categories_category', 'O', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(7, 'code', 15, 'categories_category', 'R', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(8, 'code', 17, 'categories_category', 'M', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(9, 'code', 18, 'categories_category', 'F', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(10, 'code', 26, 'categories_category', 'A', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(11, 'code', 27, 'categories_category', 'I', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(12, 'code', 29, 'categories_category', 'P', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(13, 'code', 30, 'categories_category', 'A', 'A', '2010-02-27 11:15:37', 0, '2010-02-27 11:15:37', 0),
(14, '_Legal_termsOfUseAccepted', 3, 'users', '2012-03-05T13:01:43+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(15, '_Legal_privacyPolicyAccepted', 3, 'users', '2012-03-05T13:01:43+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(16, '_Legal_termsOfUseAccepted', 4, 'users', '2012-03-05T13:02:12+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(17, '_Legal_privacyPolicyAccepted', 4, 'users', '2012-03-05T13:02:12+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(18, '_Legal_termsOfUseAccepted', 5, 'users', '2012-03-05T13:02:36+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(19, '_Legal_privacyPolicyAccepted', 5, 'users', '2012-03-05T13:02:36+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(20, '_Legal_termsOfUseAccepted', 6, 'users', '2012-03-05T13:03:02+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(21, '_Legal_privacyPolicyAccepted', 6, 'users', '2012-03-05T13:03:02+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(22, '_Legal_termsOfUseAccepted', 7, 'users', '2012-06-21T13:36:53+0000', 'A', '2012-05-09 15:48:33', 2, '2012-06-21 15:36:53', 2),
(23, '_Legal_privacyPolicyAccepted', 7, 'users', '2012-06-21T13:36:53+0000', 'A', '2012-05-09 15:48:33', 2, '2012-06-21 15:36:53', 2),
(24, '_Legal_termsOfUseAccepted', 8, 'users', '2012-03-05T13:46:09+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(25, '_Legal_privacyPolicyAccepted', 8, 'users', '2012-03-05T13:46:09+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(26, '_Legal_termsOfUseAccepted', 9, 'users', '2012-03-05T13:46:45+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(27, '_Legal_privacyPolicyAccepted', 9, 'users', '2012-03-05T13:46:45+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(28, '_Legal_termsOfUseAccepted', 10, 'users', '2012-03-05T13:47:25+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2),
(29, '_Legal_privacyPolicyAccepted', 10, 'users', '2012-03-05T13:47:25+0000', 'A', '2012-05-09 15:48:33', 2, '2012-05-09 15:48:33', 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_log`
--

CREATE TABLE IF NOT EXISTS `objectdata_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(80) NOT NULL DEFAULT '',
  `object_id` int(11) NOT NULL DEFAULT '0',
  `op` varchar(16) NOT NULL DEFAULT '',
  `diff` text,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `objectdata_meta`
--

CREATE TABLE IF NOT EXISTS `objectdata_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(40) NOT NULL DEFAULT '',
  `tablename` varchar(40) NOT NULL DEFAULT '',
  `idcolumn` varchar(40) NOT NULL DEFAULT '',
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `permissions` varchar(255) DEFAULT NULL,
  `dc_title` varchar(80) DEFAULT NULL,
  `dc_author` varchar(80) DEFAULT NULL,
  `dc_subject` varchar(255) DEFAULT NULL,
  `dc_keywords` varchar(128) DEFAULT NULL,
  `dc_description` varchar(255) DEFAULT NULL,
  `dc_publisher` varchar(128) DEFAULT NULL,
  `dc_contributor` varchar(128) DEFAULT NULL,
  `dc_startdate` datetime DEFAULT '1970-01-01 00:00:00',
  `dc_enddate` datetime DEFAULT '1970-01-01 00:00:00',
  `dc_type` varchar(128) DEFAULT NULL,
  `dc_format` varchar(128) DEFAULT NULL,
  `dc_uri` varchar(255) DEFAULT NULL,
  `dc_source` varchar(128) DEFAULT NULL,
  `dc_language` varchar(32) DEFAULT NULL,
  `dc_relation` varchar(255) DEFAULT NULL,
  `dc_coverage` varchar(64) DEFAULT NULL,
  `dc_entity` varchar(64) DEFAULT NULL,
  `dc_comment` varchar(255) DEFAULT NULL,
  `dc_extra` varchar(255) DEFAULT NULL,
  `obj_status` varchar(1) NOT NULL DEFAULT 'A',
  `cr_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `cr_uid` int(11) NOT NULL DEFAULT '0',
  `lu_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `lu_uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `pagelock`
--

CREATE TABLE IF NOT EXISTS `pagelock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cdate` datetime NOT NULL,
  `edate` datetime NOT NULL,
  `session` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ipno` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `sc_intrusion`
--

CREATE TABLE IF NOT EXISTS `sc_intrusion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `tag` varchar(40) DEFAULT NULL,
  `value` longtext NOT NULL,
  `page` longtext NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(40) NOT NULL,
  `impact` int(11) NOT NULL DEFAULT '0',
  `filters` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `search_result`
--

CREATE TABLE IF NOT EXISTS `search_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` longtext,
  `module` varchar(100) DEFAULT NULL,
  `extra` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `found` datetime DEFAULT NULL,
  `sesid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `module` (`module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `search_stat`
--

CREATE TABLE IF NOT EXISTS `search_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search` varchar(50) NOT NULL,
  `scount` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `session_info`
--

CREATE TABLE IF NOT EXISTS `session_info` (
  `sessid` varchar(40) NOT NULL,
  `ipaddr` varchar(32) NOT NULL,
  `lastused` datetime DEFAULT '1970-01-01 00:00:00',
  `uid` int(11) DEFAULT '0',
  `remember` tinyint(4) NOT NULL DEFAULT '0',
  `vars` longtext NOT NULL,
  PRIMARY KEY (`sessid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `session_info`
--

INSERT INTO `session_info` (`sessid`, `ipaddr`, `lastused`, `uid`, `remember`, `vars`) VALUES
('s47d3lv90gv16tn9p252rle0208fuu4m', 'bb645a76287f3dbccf9f33841bcd11aa', '2015-02-20 18:20:56', 2, 0, '/|a:7:{s:4:"rand";a:0:{}s:9:"useragent";s:40:"f8a238d8e07e035567a350f98653611abdb4c5aa";s:3:"uid";s:1:"2";s:7:"_tokens";a:6:{s:23:"54e76c5e707572.08582402";a:2:{s:5:"token";s:92:"NTRlNzZjNWU3MDc1NzIuMDg1ODI0MDI6NTI3YzBjYjc5NmFmODBmOWEwNjBiZTA1NjlkYWEzMTM6MTQyNDQ1MjcwMg==";s:9:"timestamp";i:1424452702;}s:23:"54e76c69c9d529.50776437";a:2:{s:5:"token";s:92:"NTRlNzZjNjljOWQ1MjkuNTA3NzY0Mzc6ZjkxODFjMDg3YmYyNTZiODYwZjFjN2M5ZjMxNGM0MDg6MTQyNDQ1MjcxMw==";s:9:"timestamp";i:1424452713;}s:23:"54e76cd920d8f2.09029442";a:2:{s:5:"token";s:92:"NTRlNzZjZDkyMGQ4ZjIuMDkwMjk0NDI6YzBlOTBmOTM1MzczYmExYmIyZmYwM2M0NDY3ZWQzZjY6MTQyNDQ1MjgyNQ==";s:9:"timestamp";i:1424452825;}s:23:"54e76ce3747ec0.60750950";a:2:{s:5:"token";s:92:"NTRlNzZjZTM3NDdlYzAuNjA3NTA5NTA6NjE1MzBkMzMwZGQ5OGY5MGZkMTEyYjUyYjI4ZWVmM2I6MTQyNDQ1MjgzNQ==";s:9:"timestamp";i:1424452835;}s:23:"54e76ced59af13.14267490";a:2:{s:5:"token";s:92:"NTRlNzZjZWQ1OWFmMTMuMTQyNjc0OTA6ZWYzODY5NzFkNmE0ODFkZWIzZmYyNzM5NmNmNzBjNDE6MTQyNDQ1Mjg0NQ==";s:9:"timestamp";i:1424452845;}s:23:"54e76cf86d5dd3.17397425";a:2:{s:5:"token";s:92:"NTRlNzZjZjg2ZDVkZDMuMTczOTc0MjU6ZTQ4MzYzZDI4Y2ZjMjY1OTQzNDRhNzU4YjNjMDI1NGI6MTQyNDQ1Mjg1Ng==";s:9:"timestamp";i:1424452856;}}s:5:"state";N;s:4:"sort";s:4:"name";s:7:"sortdir";s:3:"ASC";}_zikula_messages|a:1:{s:6:"status";a:0:{}}Zikula_Users|a:1:{s:21:"authentication_method";a:2:{s:7:"modname";s:5:"Users";s:6:"method";s:5:"uname";}}');

-- --------------------------------------------------------

--
-- Estructura de la taula `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `displayname` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `regid` int(11) NOT NULL DEFAULT '0',
  `directory` varchar(64) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '0',
  `official` tinyint(4) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `user` tinyint(4) NOT NULL DEFAULT '0',
  `system` tinyint(4) NOT NULL DEFAULT '0',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `credits` varchar(255) NOT NULL,
  `changelog` varchar(255) NOT NULL,
  `help` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `xhtml` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Bolcant dades de la taula `themes`
--

INSERT INTO `themes` (`id`, `name`, `type`, `displayname`, `description`, `regid`, `directory`, `version`, `official`, `author`, `contact`, `admin`, `user`, `system`, `state`, `credits`, `changelog`, `help`, `license`, `xhtml`) VALUES
(1, 'SeaBreeze', 3, 'SeaBreeze', 'L''entorn visual SeaBreeze es va refer completament pel Zikula 1.0, amb nous colors i imatges.', 0, 'SeaBreeze', '3.2', 0, 'Carsten Volmer, Vanessa Haakenson, Mark West, Martin Andersen', '', 0, 1, 0, 1, '', '', '', '', 1),
(2, 'RSS', 3, 'RSS', 'The RSS theme is an auxiliary theme designed specially for outputting pages as an RSS feed.', 0, 'RSS', '1.0', 0, 'Mark West', '', 0, 0, 1, 1, 'docs/credits.txt', 'docs/changelog.txt', 'docs/help.txt', 'docs/license.txt', 0),
(4, 'Atom', 3, 'Àtom', 'Entorn visual auxiliar que genera pàgines en el format de sindicació Atom.', 0, 'Atom', '1.0', 0, 'Franz Skaaning', '', 0, 0, 1, 1, '', '', '', '', 0),
(6, 'Printer', 3, 'Impressora', 'L''entorn visual Printer és un entorn visual auxiliar dissenyat per mostrar les pàgines en un format adequat per a la impressió', 0, 'Printer', '2.0', 0, 'Mark West', '', 0, 0, 1, 1, '', '', '', '', 1),
(8, 'Andreas08', 3, 'Andreas08', 'Based on the theme Andreas08 by Andreas Viklund and extended for Zikula with the CSS Framework ''fluid960gs''.', 0, 'Andreas08', '2.0', 0, 'David Brucas, Mark West, Andreas Viklund', '', 1, 1, 0, 1, '', '', '', '', 1),
(9, 'IWportal', 3, 'Portal theme', 'Theme developed by the Intraweb project staff for the Agora service', 0, 'IWportal', '1.0', 0, 'Albert Bachiller, Pau Ferrer', 'aginard@xtec.cat', 1, 1, 1, 1, '', '', '', 'GNU/GPL', 1),
(10, 'Mobile', 3, 'Mobile', 'The mobile theme is an auxiliary theme designed specially for outputting pages in a mobile-friendly format.', 0, 'Mobile', '1.0', 0, '', '', 0, 0, 1, 1, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `userblocks`
--

CREATE TABLE IF NOT EXISTS `userblocks` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `bid` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `last_update` datetime DEFAULT NULL,
  KEY `bid_uid_idx` (`uid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_regdate` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `pass` varchar(138) NOT NULL,
  `ublockon` tinyint(4) NOT NULL DEFAULT '0',
  `ublock` longtext NOT NULL,
  `theme` varchar(255) NOT NULL,
  `activated` smallint(6) NOT NULL DEFAULT '0',
  `lastlogin` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `passreminder` varchar(255) NOT NULL,
  `approved_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `tz` varchar(30) NOT NULL,
  `locale` varchar(5) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `uname` (`uname`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Bolcant dades de la taula `users`
--

INSERT INTO `users` (`uid`, `uname`, `email`, `user_regdate`, `pass`, `ublockon`, `ublock`, `theme`, `activated`, `lastlogin`, `passreminder`, `approved_date`, `approved_by`, `tz`, `locale`) VALUES
(1, 'guest', '', '1970-01-01 00:00:00', '', 0, '', '', 1, '1970-01-01 00:00:00', '', '1970-01-01 00:00:00', 0, '', ''),
(2, 'admin', 'admin@agora.xtec.cat', '2010-03-02 10:33:02', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2015-02-20 17:18:22', '', '2010-03-02 10:33:02', 2, '', ''),
(3, 'a8000001', 'usu1@exemple.cat', '2012-03-05 13:01:43', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2012-03-05 13:01:43', 2, '', ''),
(4, 'a8000002', 'usu2@exemple.cat', '2012-03-05 13:02:12', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2012-03-05 13:02:12', 2, '', ''),
(5, 'a8000003', 'usu3@exemple.cat', '2012-03-05 13:02:36', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2012-03-05 13:02:36', 2, '', ''),
(6, 'a8000004', 'usu4@exemple.cat', '2012-03-05 13:03:02', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '1970-01-01 00:00:00', '', '2012-03-05 13:03:02', 2, '', ''),
(7, 'manager1', 'manager1@exemple.cat', '2012-03-05 13:19:20', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2014-12-02 12:29:39', 'Contrasenya definida per l''administrador/a.', '2012-03-05 13:19:20', 2, '', ''),
(8, 'manager2', 'manager2@exemple.cat', '2012-03-05 13:46:09', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2014-12-02 12:30:26', '', '2012-03-05 13:46:09', 2, '', ''),
(9, 'manager3', 'manager3@exemple.cat', '2012-03-05 13:46:45', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2014-12-02 12:30:57', '', '2012-03-05 13:46:45', 2, '', ''),
(10, 'manager4', 'manager4@exemple.cat', '2012-03-05 13:47:25', '1$$6142bfd56a583d891f0b1dcdbb2a9ef8', 0, '', '', 1, '2014-12-02 12:31:29', '', '2012-03-05 13:47:25', 2, '', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `users_verifychg`
--

CREATE TABLE IF NOT EXISTS `users_verifychg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `changetype` tinyint(4) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `newemail` varchar(60) NOT NULL,
  `verifycode` varchar(138) NOT NULL,
  `created_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de la taula `workflows`
--

CREATE TABLE IF NOT EXISTS `workflows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metaid` int(11) NOT NULL DEFAULT '0',
  `module` varchar(255) NOT NULL DEFAULT '',
  `schemaname` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `type` smallint(6) NOT NULL DEFAULT '1',
  `obj_table` varchar(40) NOT NULL DEFAULT '',
  `obj_idcolumn` varchar(40) NOT NULL DEFAULT '',
  `obj_id` int(11) NOT NULL DEFAULT '0',
  `busy` int(11) NOT NULL DEFAULT '0',
  `debug` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
