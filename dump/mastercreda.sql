-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 12:55:39
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu11`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bpges_queued_items`
--

CREATE TABLE IF NOT EXISTS `wp_bpges_queued_items` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `type` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recorded` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bpges_subscriptions`
--

CREATE TABLE IF NOT EXISTS `wp_bpges_subscriptions` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `type` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_bpges_subscriptions`
--

INSERT INTO `wp_bpges_subscriptions` (`id`, `user_id`, `group_id`, `type`) VALUES
(1, 1, 14, 'dig'),
(2, 1, 21, 'dig'),
(3, 1, 22, 'dig'),
(4, 1, 23, 'dig'),
(5, 1, 24, 'dig'),
(6, 1, 25, 'dig'),
(7, 1, 26, 'dig'),
(8, 1, 27, 'dig'),
(9, 1, 28, 'dig'),
(10, 1, 30, 'dig'),
(11, 1, 31, 'dig'),
(12, 1, 33, 'dig');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `component` varchar(75) NOT NULL,
  `type` varchar(75) NOT NULL,
  `action` text NOT NULL,
  `content` longtext NOT NULL,
  `primary_link` text NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `secondary_item_id` bigint(20) DEFAULT NULL,
  `date_recorded` datetime NOT NULL,
  `hide_sitewide` tinyint(1) DEFAULT '0',
  `mptt_left` int(11) NOT NULL DEFAULT '0',
  `mptt_right` int(11) NOT NULL DEFAULT '0',
  `is_spam` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2017-02-23 12:22:47', 0, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2016-05-31 10:48:31', 0, 0, 0, 0),
(34, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/educacio-emocional/">Educació emocional</a>', 'Un gran vídeo per reflexionar...\n\nhttps://www.youtube.com/watch?v=wSNYYThX5-g', 'https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/', 14, 0, '2014-09-22 14:36:27', 0, 0, 0, 0),
(47, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/educacio-emocional/">Educació emocional</a>', 'Bon dia Noders! Avui us compartim un inquietant curtmetratge que ens ha de fer reflexionar sobre l’individualisme… és molt xulo… i fins i tot va guanyar un Oscar!\n\nhttps://www.youtube.com/watch?v=pRUGRPKRAWs', 'https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/', 14, 0, '2014-09-22 15:59:20', 0, 0, 0, 0),
(62, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastercreda/docs/eap-professionals-adscrits/">EAP – Professionals adscrits</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercreda/docs/eap-professionals-adscrits/', 0, 732, '2015-11-30 15:56:03', 1, 0, 0, 0),
(66, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" rel="nofollow">admin</a> ha iniciat <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/chromebooks-vs-notebooks/">Chromebooks vs Notebooks</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/">TAC</a>', 'Algun centre està fent servir Chromebooks? Què recomaneu? ', 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/chromebooks-vs-notebooks/', 21, 1156, '2015-11-30 17:04:03', 0, 0, 0, 0),
(67, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" rel="nofollow">admin</a> ha iniciat <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/model-de-portatil-eso/">Model de portatil (ESO)</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/">TAC</a>', 'Quin model de portàtil recomaneu? Tenim un presupost de 200 € màxim per alumne.', 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/model-de-portatil-eso/', 21, 1157, '2015-11-30 17:05:19', 0, 0, 0, 0),
(69, 1, 'groups', 'bbp_reply_create', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" rel="nofollow">admin</a> respostes al tema <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/model-de-portatil-eso/">Model de portatil (ESO)</a> en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/">TAC</a>', '&nbsp;\n\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/4026203944800.jpg"><img class="alignnone  wp-image-1158" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/4026203944800.jpg" alt="4026203944800" width="219" height="219" /></a>\n\n&nbsp;\n\nNosaltres fem servir el Toshiba NB-XXXX. Ens va molt bé, pocs problemes de manteniment. Resistents.\n\n	Tamaño Pantalla10,1" (25,65 cm) LED\n	ProcesadorIntel® Atom™ N2600\n	RAM1 GB DDR3 800 MHz\n	Disco Duro320 GB sATA 5400 rpm\n', 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/model-de-portatil-eso/#post-1159', 21, 1159, '2015-11-30 17:14:32', 0, 0, 0, 0),
(70, 1, 'groups', 'bbp_topic_create', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" rel="nofollow">admin</a> ha iniciat <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/google-apps-per-educacio/">Google Apps per educació</a> tema en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/">TAC</a>', 'En què consisteix exactament? Marc, em vas dir que vosaltres estaveu molt contents... pots explicar-nos una mica com funciona? És gratuït?', 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/google-apps-per-educacio/', 21, 1160, '2015-11-30 17:16:41', 0, 0, 0, 0),
(75, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/caps-destudi-900168039/">Caps d&#039;estudi</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/', 26, 0, '2015-11-30 17:35:06', 1, 0, 0, 0),
(79, 1, 'groups', 'bbp_reply_create', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" rel="nofollow">admin</a> respostes al tema <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/google-apps-per-educacio/">Google Apps per educació</a> en el fòrum <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/">TAC</a>', 'Necessites un domini propi però, a part d''això, no té cap cost pel centre', 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/tac/forum/topic/google-apps-per-educacio/#post-1170', 21, 1170, '2015-11-30 18:06:26', 0, 0, 0, 0),
(83, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastercreda/docs/distribucio-de-professionals-per-centres/">Distribució de professionals per centres</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercreda/docs/distribucio-de-professionals-per-centres/', 0, 739, '2015-12-01 11:16:09', 1, 0, 0, 0),
(88, 1, 'groups', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastercreda/docs/organitzacio-interna-del-servei-educatiu/">Organització interna del Servei Educatiu</a> al node <a href="https://pwc-int.educacio.intranet/agora/mastercreda/nodes/servei-educatiu/">Servei educatiu</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercreda/docs/organitzacio-interna-del-servei-educatiu/', 31, 765, '2015-12-02 10:57:40', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(5, 34, '_oembed_d82c712e85b3a7c1789399a52e78e1fa', '<iframe width="500" height="281" src="https://www.youtube.com/embed/wSNYYThX5-g?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(12, 47, '_oembed_e1f6f3206fbb446ab592be1d774601f3', '<iframe width="500" height="375" src="https://www.youtube.com/embed/pRUGRPKRAWs?feature=oembed" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_friends`
--

CREATE TABLE IF NOT EXISTS `wp_bp_friends` (
`id` bigint(20) NOT NULL,
  `initiator_user_id` bigint(20) NOT NULL,
  `friend_user_id` bigint(20) NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT '0',
  `is_limited` tinyint(1) DEFAULT '0',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups` (
`id` bigint(20) NOT NULL,
  `creator_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'public',
  `enable_forum` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`, `parent_id`) VALUES
(14, 1, 'Educació emocional', 'educacio-emocional', 'Node dedicat a l''''educació emocional', 'public', 1, '2014-09-22 14:12:19', 0),
(21, 1, 'TAC', 'tac', 'Node de coordinació dels seminaris TAC', 'public', 1, '2015-11-30 16:49:22', 0),
(22, 1, 'Educació física', 'educacio-fisica', 'Especialistes d\\''educació física: \r\ncoordinació jornades esportives, \r\njocs tradicionals (intercentres)', 'public', 1, '2015-11-30 17:23:47', 0),
(23, 1, 'English', 'english', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'public', 1, '2015-11-30 17:26:42', 0),
(24, 1, 'Matemàtiques', 'matematiques', 'Especialistes matemàtiques: coordinació Olimpíades, \r\nfires, jornades matemàtiques (intercentres)', 'public', 1, '2015-11-30 17:28:49', 0),
(25, 1, 'Música', 'musica-1302543516', 'Especialistes música: jornades de danses, cantates... (intercentres)', 'public', 1, '2015-11-30 17:32:27', 0),
(26, 1, 'Caps d’estudis', 'caps-destudi-900168039', 'Node intercentres de Caps d\\''estudis', 'private', 1, '2015-11-30 17:33:59', 0),
(27, 1, 'Directors', 'directors', 'Node intercentres de Directors de centre. \r\nDifusió de continguts, compartir experiències.\r\nCoordinació activitats conjuntes a nivell de municipi.', 'public', 1, '2015-11-30 17:38:04', 0),
(28, 1, 'Primària-Secundària', 'primaria-secundaria', 'Elaboració de materials, traspàs d\\''informació...', 'private', 1, '2015-11-30 17:40:53', 0),
(30, 1, 'Contes intercentres', 'contes-intercentres', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'public', 1, '2015-11-30 17:55:33', 0),
(31, 1, 'Servei educatiu', 'servei-educatiu', 'Node per la coordinació dels integrants del Servei educatiu', 'private', 1, '2015-12-01 17:06:23', 0),
(33, 1, 'Formadors', 'formadors', 'Node de comunicació entre formadors i el servei educatiu', 'private', 1, '2015-12-02 10:56:43', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_groupmeta` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(92, 14, 'total_member_count', '1'),
(93, 14, 'last_activity', '2014-09-22 15:59:20'),
(94, 14, 'ass_default_subscription', 'dig'),
(95, 14, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(96, 14, 'invite_status', 'admins'),
(97, 14, 'forum_id', 'a:1:{i:0;i:203;}'),
(98, 14, '_bbp_forum_enabled_203', '1'),
(137, 1, 'last_activity', '2015-11-30 12:22:47'),
(138, 21, 'total_member_count', '1'),
(139, 21, 'last_activity', '2015-12-02 11:00:35'),
(140, 21, 'ass_default_subscription', 'dig'),
(141, 21, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(142, 21, 'invite_status', 'members'),
(143, 21, 'forum_id', 'a:1:{i:0;i:1147;}'),
(144, 21, '_bbp_forum_enabled_1147', '1'),
(145, 22, 'total_member_count', '1'),
(146, 22, 'last_activity', '2015-11-30 17:23:47'),
(147, 22, 'ass_default_subscription', 'dig'),
(148, 22, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(149, 22, 'invite_status', 'members'),
(150, 22, 'forum_id', 'a:1:{i:0;i:1161;}'),
(151, 22, '_bbp_forum_enabled_1161', '1'),
(152, 23, 'total_member_count', '1'),
(153, 23, 'last_activity', '2015-11-30 17:26:42'),
(154, 23, 'ass_default_subscription', 'dig'),
(155, 23, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(156, 23, 'invite_status', 'members'),
(157, 23, 'forum_id', 'a:1:{i:0;i:1162;}'),
(158, 23, '_bbp_forum_enabled_1162', '1'),
(159, 24, 'total_member_count', '1'),
(160, 24, 'last_activity', '2015-11-30 17:28:49'),
(161, 24, 'ass_default_subscription', 'dig'),
(162, 24, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(163, 24, 'invite_status', 'members'),
(164, 24, 'forum_id', 'a:1:{i:0;i:1163;}'),
(165, 24, '_bbp_forum_enabled_1163', '1'),
(166, 25, 'total_member_count', '1'),
(167, 25, 'last_activity', '2015-11-30 17:32:27'),
(168, 25, 'ass_default_subscription', 'dig'),
(169, 25, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(170, 25, 'invite_status', 'members'),
(171, 25, 'forum_id', 'a:1:{i:0;i:1164;}'),
(172, 25, '_bbp_forum_enabled_1164', '1'),
(173, 26, 'total_member_count', '1'),
(174, 26, 'last_activity', '2015-11-30 17:33:59'),
(175, 26, 'ass_default_subscription', 'dig'),
(176, 26, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(177, 26, 'invite_status', 'members'),
(178, 26, 'forum_id', 'a:1:{i:0;i:1165;}'),
(179, 26, '_bbp_forum_enabled_1165', '1'),
(180, 27, 'total_member_count', '1'),
(181, 27, 'last_activity', '2015-11-30 17:38:04'),
(182, 27, 'ass_default_subscription', 'dig'),
(183, 27, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(184, 27, 'invite_status', 'members'),
(185, 27, 'forum_id', 'a:1:{i:0;i:1166;}'),
(186, 27, '_bbp_forum_enabled_1166', '1'),
(187, 28, 'total_member_count', '1'),
(188, 28, 'last_activity', '2015-11-30 17:40:53'),
(189, 28, 'ass_default_subscription', 'dig'),
(190, 28, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(191, 28, 'invite_status', 'members'),
(192, 28, 'forum_id', 'a:1:{i:0;i:1167;}'),
(193, 28, '_bbp_forum_enabled_1167', '1'),
(201, 30, 'total_member_count', '1'),
(202, 30, 'last_activity', '2015-11-30 17:55:33'),
(203, 30, 'ass_default_subscription', 'dig'),
(204, 30, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(205, 30, 'invite_status', 'members'),
(206, 30, 'forum_id', 'a:1:{i:0;i:1169;}'),
(207, 30, '_bbp_forum_enabled_1169', '1'),
(208, 31, 'total_member_count', '1'),
(209, 31, 'last_activity', '2015-12-02 11:04:57'),
(210, 31, 'invite_status', 'members'),
(211, 31, 'ass_default_subscription', 'dig'),
(212, 31, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(213, 31, 'forum_id', 'a:1:{i:0;i:1242;}'),
(214, 31, '_bbp_forum_enabled_1242', '1'),
(222, 33, 'total_member_count', '1'),
(223, 33, 'last_activity', '2016-06-02 15:02:53'),
(224, 33, 'ass_default_subscription', 'dig'),
(225, 33, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(226, 33, 'invite_status', 'mods'),
(227, 33, 'forum_id', 'a:1:{i:0;i:1256;}'),
(228, 33, '_bbp_forum_enabled_1256', '1');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_members`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_members` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `inviter_id` bigint(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_mod` tinyint(1) NOT NULL DEFAULT '0',
  `user_title` varchar(100) NOT NULL,
  `date_modified` datetime NOT NULL,
  `comments` longtext NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `invite_sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(19, 14, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 14:13:54', '', 1, 0, 0),
(27, 21, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:08:27', '', 1, 0, 0),
(28, 22, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:23:40', '', 1, 0, 0),
(29, 23, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:26:38', '', 1, 0, 0),
(30, 24, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:28:45', '', 1, 0, 0),
(31, 25, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:32:22', '', 1, 0, 0),
(32, 26, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:33:42', '', 1, 0, 0),
(33, 27, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:35:25', '', 1, 0, 0),
(34, 28, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:40:43', '', 1, 0, 0),
(36, 30, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:55:26', '', 1, 0, 0),
(37, 31, 1, 0, 1, 0, 'Administrador/a del node', '2015-12-01 17:06:13', '', 1, 0, 0),
(39, 33, 1, 0, 1, 0, 'Administrador/a del node', '2015-12-02 10:56:28', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_messages`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_messages` (
`id` bigint(20) NOT NULL,
  `thread_id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_meta` (
`id` bigint(20) NOT NULL,
  `message_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_notices`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_notices` (
`id` bigint(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `date_sent` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_messages_recipients`
--

CREATE TABLE IF NOT EXISTS `wp_bp_messages_recipients` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `thread_id` bigint(20) NOT NULL,
  `unread_count` int(10) NOT NULL DEFAULT '0',
  `sender_only` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_contents`
--

CREATE TABLE IF NOT EXISTS `wp_bp_mod_contents` (
`content_id` bigint(20) unsigned NOT NULL,
  `item_type` varchar(42) NOT NULL DEFAULT '',
  `item_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_id2` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_url` varchar(250) NOT NULL DEFAULT '',
  `status` enum('new','warned','ignored','moderated','edited','deleted') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_mod_flags`
--

CREATE TABLE IF NOT EXISTS `wp_bp_mod_flags` (
`flag_id` bigint(20) unsigned NOT NULL,
  `content_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `reporter_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications`
--

CREATE TABLE IF NOT EXISTS `wp_bp_notifications` (
`id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `secondary_item_id` bigint(20) DEFAULT NULL,
  `component_name` varchar(75) NOT NULL,
  `component_action` varchar(75) NOT NULL,
  `date_notified` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_notifications`
--

INSERT INTO `wp_bp_notifications` (`id`, `user_id`, `item_id`, `secondary_item_id`, `component_name`, `component_action`, `date_notified`, `is_new`) VALUES
(72, 1, 163, -1, 'social_articles', 'new_article163', '2014-11-18 12:06:46', 1),
(73, 1, 163, -1, 'social_articles', 'new_article163', '2014-11-18 12:07:23', 1),
(74, 1, 163, -1, 'social_articles', 'new_article163', '2014-12-01 12:22:10', 1),
(75, 1, 163, -1, 'social_articles', 'new_article163', '2015-02-24 11:45:24', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_notifications_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_notifications_meta` (
`id` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_data`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_data` (
`id` bigint(20) unsigned NOT NULL,
  `field_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `value` longtext NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_data`
--

INSERT INTO `wp_bp_xprofile_data` (`id`, `field_id`, `user_id`, `value`, `last_updated`) VALUES
(1, 1, 2, 'xtecadmin', '2015-10-27 10:48:13'),
(2, 1, 1, 'admin', '2016-04-04 08:19:17');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_fields`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_fields` (
`id` bigint(20) unsigned NOT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL,
  `type` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_default_option` tinyint(1) NOT NULL DEFAULT '0',
  `field_order` bigint(20) NOT NULL DEFAULT '0',
  `option_order` bigint(20) NOT NULL DEFAULT '0',
  `order_by` varchar(15) NOT NULL DEFAULT '',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_fields`
--

INSERT INTO `wp_bp_xprofile_fields` (`id`, `group_id`, `parent_id`, `type`, `name`, `description`, `is_required`, `is_default_option`, `field_order`, `option_order`, `order_by`, `can_delete`) VALUES
(1, 1, 0, 'textbox', 'Name', '', 1, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_groups`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_groups` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` mediumtext NOT NULL,
  `group_order` bigint(20) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_xprofile_groups`
--

INSERT INTO `wp_bp_xprofile_groups` (`id`, `name`, `description`, `group_order`, `can_delete`) VALUES
(1, 'Base', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_xprofile_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_xprofile_meta` (
`id` bigint(20) NOT NULL,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(150) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
`comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_blocked_emails`
--

CREATE TABLE IF NOT EXISTS `wp_ig_blocked_emails` (
  `id` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_campaigns`
--

CREATE TABLE IF NOT EXISTS `wp_ig_campaigns` (
`id` int(10) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence_ids` text COLLATE utf8mb4_unicode_ci,
  `categories` text COLLATE utf8mb4_unicode_ci,
  `list_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_template_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_campaigns`
--

INSERT INTO `wp_ig_campaigns` (`id`, `slug`, `name`, `type`, `from_name`, `from_email`, `reply_to_name`, `reply_to_email`, `sequence_ids`, `categories`, `list_ids`, `base_template_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '####Portada## ##', '1', 389, 1, '2019-04-17 07:27:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_contacts`
--

CREATE TABLE IF NOT EXISTS `wp_ig_contacts` (
`id` int(10) NOT NULL,
  `wp_user_id` int(10) NOT NULL DEFAULT '0',
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `is_disposable` tinyint(1) DEFAULT '0',
  `is_rolebased` tinyint(1) DEFAULT '0',
  `is_webmail` tinyint(1) DEFAULT '0',
  `is_deliverable` tinyint(1) DEFAULT '0',
  `is_sendsafely` tinyint(1) DEFAULT '0',
  `meta` longtext CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_contacts`
--

INSERT INTO `wp_ig_contacts` (`id`, `wp_user_id`, `first_name`, `last_name`, `email`, `source`, `form_id`, `status`, `unsubscribed`, `hash`, `created_at`, `updated_at`, `is_verified`, `is_disposable`, `is_rolebased`, `is_webmail`, `is_deliverable`, `is_sendsafely`, `meta`) VALUES
(1, 0, 'Admin', '', 'a8000011@xtec.cat', 'Migrated', 0, 'verified', 0, 'nfowag-kyqwje-thmfbl-alqysh-alembt', '2016-04-05 11:56:33', '2019-04-17 07:27:50', 1, 0, 0, 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_contacts_ips`
--

CREATE TABLE IF NOT EXISTS `wp_ig_contacts_ips` (
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_forms`
--

CREATE TABLE IF NOT EXISTS `wp_ig_forms` (
`id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `settings` longtext COLLATE utf8mb4_unicode_ci,
  `styles` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `af_id` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_forms`
--

INSERT INTO `wp_ig_forms` (`id`, `name`, `body`, `settings`, `styles`, `created_at`, `updated_at`, `deleted_at`, `af_id`) VALUES
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-04-17 07:27:51', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_lists`
--

CREATE TABLE IF NOT EXISTS `wp_ig_lists` (
`id` int(10) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_lists`
--

INSERT INTO `wp_ig_lists` (`id`, `slug`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'portada', 'Portada', '2019-04-17 07:27:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_lists_contacts`
--

CREATE TABLE IF NOT EXISTS `wp_ig_lists_contacts` (
`id` int(10) NOT NULL,
  `list_id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optin_type` tinyint(4) NOT NULL,
  `subscribed_at` datetime DEFAULT NULL,
  `subscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_at` datetime DEFAULT NULL,
  `unsubscribed_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_lists_contacts`
--

INSERT INTO `wp_ig_lists_contacts` (`id`, `list_id`, `contact_id`, `status`, `optin_type`, `subscribed_at`, `subscribed_ip`, `unsubscribed_at`, `unsubscribed_ip`) VALUES
(1, 1, 1, 'subscribed', 2, '2016-04-05 11:56:33', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_mailing_queue`
--

CREATE TABLE IF NOT EXISTS `wp_ig_mailing_queue` (
`id` int(10) NOT NULL,
  `hash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime DEFAULT NULL,
  `finish_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_ig_sending_queue`
--

CREATE TABLE IF NOT EXISTS `wp_ig_sending_queue` (
`id` int(10) NOT NULL,
  `mailing_queue_id` int(10) NOT NULL DEFAULT '0',
  `mailing_queue_hash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` int(10) NOT NULL DEFAULT '0',
  `contact_id` int(10) NOT NULL DEFAULT '0',
  `contact_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` longtext COLLATE utf8mb4_unicode_ci,
  `opened` int(1) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `opened_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB AUTO_INCREMENT=12717 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/mastercreda/', 'yes'),
(2, 'blogname', 'Màster CREDA', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000011@xtec.cat', 'yes'),
(6, 'start_of_week', '1', 'yes'),
(7, 'use_balanceTags', '', 'yes'),
(8, 'use_smilies', '1', 'yes'),
(9, 'require_name_email', '1', 'yes'),
(10, 'comments_notify', '1', 'yes'),
(11, 'posts_per_rss', '10', 'yes'),
(12, 'rss_use_excerpt', '0', 'yes'),
(13, 'mailserver_url', 'mail.example.com', 'yes'),
(14, 'mailserver_login', 'login@example.com', 'yes'),
(15, 'mailserver_pass', 'password', 'yes'),
(16, 'mailserver_port', '110', 'yes'),
(17, 'default_category', '1', 'yes'),
(18, 'default_comment_status', 'open', 'yes'),
(19, 'default_ping_status', 'closed', 'yes'),
(20, 'default_pingback_flag', '', 'yes'),
(21, 'posts_per_page', '10', 'yes'),
(22, 'date_format', 'd/m/Y', 'yes'),
(23, 'time_format', 'G:i', 'yes'),
(24, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y G:i', 'yes'),
(25, 'comment_moderation', '', 'yes'),
(26, 'moderation_notify', '1', 'yes'),
(27, 'permalink_structure', '/%category%/%postname%/', 'yes'),
(29, 'hack_file', '0', 'yes'),
(30, 'blog_charset', 'UTF-8', 'yes'),
(31, 'moderation_keys', '', 'no'),
(32, 'active_plugins', 'a:33:{i:0;s:25:"add-to-any/add-to-any.php";i:1;s:42:"bbpress-enable-tinymce-visual-tab/init.php";i:2;s:19:"bbpress/bbpress.php";i:3;s:37:"blogger-importer/blogger-importer.php";i:4;s:33:"buddypress-activity-plus/bpfb.php";i:5;s:26:"buddypress-docs/loader.php";i:6;s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";i:7;s:34:"buddypress-like/bp-like-loader.php";i:8;s:24:"buddypress/bp-loader.php";i:9;s:39:"disable-gutenberg/disable-gutenberg.php";i:10;s:39:"email-subscribers/email-subscribers.php";i:11;s:41:"enllacos-educatius/enllacos-educatius.php";i:12;s:43:"google-analyticator/google-analyticator.php";i:13;s:49:"google-calendar-events/google-calendar-events.php";i:14;s:27:"grup-classe/grup_classe.php";i:15;s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";i:16;s:31:"invite-anyone/invite-anyone.php";i:17;s:69:"pending-submission-notifications/pending-submission-notifications.php";i:18;s:27:"private-bp-pages/loader.php";i:19;s:25:"slideshare/slideshare.php";i:20;s:44:"slideshow-jquery-image-gallery/slideshow.php";i:21;s:27:"socialmedia/socialmedia.php";i:22;s:30:"table-of-contents-plus/toc.php";i:23;s:37:"tinymce-advanced/tinymce-advanced.php";i:24;s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";i:25;s:41:"wordpress-importer/wordpress-importer.php";i:26;s:42:"wordpress-social-login/wp-social-login.php";i:27;s:33:"wordpress-telegram/wptelegram.php";i:28;s:29:"wp-recaptcha/wp-recaptcha.php";i:29;s:29:"xtec-booking/xtec-booking.php";i:30;s:35:"xtec-ldap-login/xtec-ldap-login.php";i:31;s:23:"xtec-mail/xtec-mail.php";i:32;s:25:"xtec-stats/xtec-stats.php";}', 'yes'),
(33, 'home', 'https://pwc-int.educacio.intranet/agora/mastercreda/', 'yes'),
(34, 'category_base', '/categoria', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(37, 'comment_max_links', '3', 'yes'),
(38, 'gmt_offset', '', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'reactor', 'yes'),
(42, 'stylesheet', 'reactor-serveis-educatius', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'contributor', 'yes'),
(49, 'db_version', '44719', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '0', 'yes'),
(54, 'show_on_front', 'page', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{s:12:"_multiwidget";i:1;i:1;a:0:{}}', 'yes'),
(80, 'widget_text', 'a:26:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:4:"text";s:431:"<a class="twitter-timeline" href="https://twitter.com/sealtemporda" data-widget-id="671724820325916673">Tweets por el @sealtemporda.</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";s:0:"";}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";s:0:"";}i:34;a:4:{s:5:"title";s:8:"Contacte";s:4:"text";s:100:"<i class="fa fa-phone"></i>   555 456 789\r\n<i class="fa fa-envelope-o"></i>    se-XXXXXXXX@xtec.cat ";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"63";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"82";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"548";}i:4;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"80";}}}}i:42;a:4:{s:5:"title";s:0:"";s:4:"text";s:347:"El servei educatiu està subscrit a totes les revistes educatives que es publiquen a Catalunya.\r\n\r\nPodeu fer la reserva afegint un comentari en aquesta mateixa pàgina. El període de préstec habitual és de 15 dies, prorrogable. \r\n\r\n<img src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/revistes2.jpg">\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}}}}i:44;a:4:{s:5:"title";s:8:"Contacte";s:4:"text";s:100:"<i class="fa fa-phone"></i>   555 456 789\r\n<i class="fa fa-envelope-o"></i>    se-XXXXXXXX@xtec.cat ";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"906";}}}}i:54;a:4:{s:5:"title";s:19:"Fonètica-Fonologia";s:4:"text";s:333:"Jocs, apps, documents, contes... que animaran les produccions orals inicials, us ajudaran a treballar la consciència fonològica i a generalitzar els diferents sons.\r\n\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/parla_r.jpg">\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"266";}}}}i:56;a:4:{s:5:"title";s:12:"Morfosintaxi";s:4:"text";s:374:"Recursos per treballar la morfologia nominal i verbal (estructura interna dels mots), l’estructuració de les frases i els diferents elements gramaticals (regles combinatòries dels sintagmes en frases).\r\n\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/est_frase.jpg">\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"267";}}}}i:58;a:4:{s:5:"title";s:6:"Lèxic";s:4:"text";s:271:"Recursos per tal d''adquirir vocabulari dins d''un context, categoritzar i generalitzar el lèxic après.\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/vocabulari.jpg">\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"268";}}}}i:60;a:4:{s:5:"title";s:15:"Lectoescriptura";s:4:"text";s:287:"En aquest espai hi trobareu recursos relacionats amb la comprensió lectora, la narració i l’expressió escrita.\r\n\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/contes_log.jpg">\r\n</div>\r\n";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"269";}}}}i:68;a:4:{s:5:"title";s:19:"Recursos didàctics";s:4:"text";s:225:"En aquest apartat podeu veure el recull de recursos pensats pels  professionals del CREDA.\r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/logopeda.jpg">\r\n<ul>\r\n";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"281";}}}}i:72;a:4:{s:5:"title";s:13:"Professionals";s:4:"text";s:235:"Apartat que recull totes les noticies i recursos d''interès per els professionals (logopedes, EAPs i docents)\r\n\r\n<img width="250px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/tutoria.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"264";}}}}i:74;a:4:{s:5:"title";s:9:"Famílies";s:4:"text";s:193:"Informacions per les famílies amb infants atesos pel CREDA.\r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/family_llegint.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:3:"271";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:3:"294";s:12:"has_children";b:0;}}}}i:76;a:4:{s:5:"title";s:7:"Alumnes";s:4:"text";s:268:"Activitats, esdeveniments o recursos destinats a l''alumnat que atén el CREDA. També s''hi poden veure mostres de treball i projectes fets per l''alumnat. \r\n\r\n<img src=https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/jugantacasa.jpg>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:3:"272";s:12:"has_children";b:0;}}}}i:82;a:4:{s:5:"title";s:9:"Formació";s:4:"text";s:246:"Aquí trobareu cursos de formació, jornades, seminaris, tallers, etc orientats als professionals (CREDA, EAP i docents)\r\n\r\n<img width="250px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/tutoria.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"288";}}}}i:84;a:3:{s:5:"title";s:13:"Recursos per ";s:4:"text";s:0:"";s:6:"filter";b:0;}i:86;a:4:{s:5:"title";s:27:"Recursos per a les families";s:4:"text";s:320:"Recursos especialment indicats per les famílies que vulguin Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. \r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/family_llegint.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"290";}}}}i:88;a:4:{s:5:"title";s:4:"Apps";s:4:"text";s:458:"<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/apps.jpg">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. \r\n\r\n<a target="_blank" href="http://toolbox.mobileworldcapital.com/"><img src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/toolbox.png"></a>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"289";}}}}i:90;a:4:{s:5:"title";s:17:"Llengua de signes";s:4:"text";s:273:"Espai on podreu trobar recursos relacionats amb la llengua de signes catalana (LSC) i el suport signat.\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/lleng_signes.jpg">\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"296";}}}}i:92;a:4:{s:5:"title";s:24:"Recursos per els alumnes";s:4:"text";s:458:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus viverra auctor quam, at bibendum justo finibus et. Integer faucibus mollis ante, ac imperdiet turpis rhoncus non. Duis nec eleifend sem. \r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/nen_recurs.jpg">\r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/nen_lleg.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"292";}}}}i:94;a:4:{s:5:"title";s:10:"Audiologia";s:4:"text";s:313:"Conjunt de programari, pàgines web i recursos relacionats amb les pèrdues auditives, les ajudes tècniques i el treball de les habilitats auditives.\r\n\r\n<div style="text-align:center"><img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/implant.jpg"></div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"297";}}}}i:96;a:4:{s:5:"title";s:12:"Comunicació";s:4:"text";s:351:"Recursos per aprendre a usar la llengua, a establir les primeres comunicacions o, si ja se''n sap una mica, aprendre a comunicar-se millor i en situacions més complexes o compromeses.\r\n\r\n<div style="text-align:center">\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/narracio.jpg">\r\n</div>";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"298";}}}}i:98;a:4:{s:5:"title";s:5:"Guies";s:4:"text";s:221:"Recull de guies sobre la pèrdua auditiva o el llenguatge destinades als professionals del CREDA.\r\n<img width="250px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/tutoria.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8432";}}}}i:100;a:4:{s:5:"title";s:9:"Famílies";s:4:"text";s:193:"Informacions per les famílies amb infants atesos pel CREDA.\r\n\r\n<img width="200px" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/family_llegint.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:3:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8173";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8175";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8424";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;i:102;a:4:{s:5:"title";s:8:"El CREDA";s:4:"text";s:231:"Aquí trobareu tota la informació sobre el CREDA, la seva localització i horaris entre altres dades d''interès.\r\n\r\n<img src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/equipdirectiu.jpg">";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:8:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"797";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"306";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8527";s:12:"has_children";b:0;}i:3;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"608";s:12:"has_children";b:0;}i:4;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"318";s:12:"has_children";b:0;}i:5;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8429";s:12:"has_children";b:0;}i:6;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8140";s:12:"has_children";b:0;}i:7;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:12:"Carregant...";s:12:"has_children";b:0;}}}}}', 'yes'),
(81, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', 'Europe/Madrid', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '9', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '27916', 'yes'),
(89, 'wp_user_roles', 'a:11:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:70:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:43:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:21:"delete_pages_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:20:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;s:45:"slideshow-jquery-image-gallery-add-slideshows";b:1;s:46:"slideshow-jquery-image-gallery-edit-slideshows";b:1;s:48:"slideshow-jquery-image-gallery-delete-slideshows";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:12:"delete_pages";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:8:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:21:"delete_pages_bookings";b:1;s:12:"delete_pages";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:13:"bbp_keymaster";a:2:{s:4:"name";s:9:"Keymaster";s:12:"capabilities";a:29:{s:9:"keep_gate";b:1;s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:18:"edit_others_forums";b:1;s:13:"delete_forums";b:1;s:20:"delete_others_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:13:"bbp_spectator";a:2:{s:4:"name";s:9:"Spectator";s:12:"capabilities";a:1:{s:8:"spectate";b:1;}}s:11:"bbp_blocked";a:2:{s:4:"name";s:7:"Blocked";s:12:"capabilities";a:28:{s:8:"spectate";b:0;s:11:"participate";b:0;s:8:"moderate";b:0;s:8:"throttle";b:0;s:10:"view_trash";b:0;s:14:"publish_forums";b:0;s:11:"edit_forums";b:0;s:18:"edit_others_forums";b:0;s:13:"delete_forums";b:0;s:20:"delete_others_forums";b:0;s:19:"read_private_forums";b:0;s:18:"read_hidden_forums";b:0;s:14:"publish_topics";b:0;s:11:"edit_topics";b:0;s:18:"edit_others_topics";b:0;s:13:"delete_topics";b:0;s:20:"delete_others_topics";b:0;s:19:"read_private_topics";b:0;s:15:"publish_replies";b:0;s:12:"edit_replies";b:0;s:19:"edit_others_replies";b:0;s:14:"delete_replies";b:0;s:21:"delete_others_replies";b:0;s:20:"read_private_replies";b:0;s:17:"manage_topic_tags";b:0;s:15:"edit_topic_tags";b:0;s:17:"delete_topic_tags";b:0;s:17:"assign_topic_tags";b:0;}}s:13:"bbp_moderator";a:2:{s:4:"name";s:9:"Moderator";s:12:"capabilities";a:25:{s:8:"spectate";b:1;s:11:"participate";b:1;s:8:"moderate";b:1;s:8:"throttle";b:1;s:10:"view_trash";b:1;s:14:"publish_forums";b:1;s:11:"edit_forums";b:1;s:19:"read_private_forums";b:1;s:18:"read_hidden_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:18:"edit_others_topics";b:1;s:13:"delete_topics";b:1;s:20:"delete_others_topics";b:1;s:19:"read_private_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:19:"edit_others_replies";b:1;s:14:"delete_replies";b:1;s:21:"delete_others_replies";b:1;s:20:"read_private_replies";b:1;s:17:"manage_topic_tags";b:1;s:15:"edit_topic_tags";b:1;s:17:"delete_topic_tags";b:1;s:17:"assign_topic_tags";b:1;}}s:15:"bbp_participant";a:2:{s:4:"name";s:11:"Participant";s:12:"capabilities";a:8:{s:8:"spectate";b:1;s:11:"participate";b:1;s:19:"read_private_forums";b:1;s:14:"publish_topics";b:1;s:11:"edit_topics";b:1;s:15:"publish_replies";b:1;s:12:"edit_replies";b:1;s:17:"assign_topic_tags";b:1;}}s:12:"xtec_teacher";a:2:{s:4:"name";s:9:"Professor";s:12:"capabilities";a:13:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:12:"upload_files";b:1;s:12:"delete_pages";b:1;s:21:"delete_pages_bookings";b:1;s:19:"edit_posts_bookings";b:1;s:21:"delete_posts_bookings";b:1;s:22:"publish_posts_bookings";b:1;s:29:"edit_published_posts_bookings";b:1;s:31:"delete_published_posts_bookings";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:4:{s:5:"title";s:16:"Articles recents";s:6:"number";i:5;s:7:"exclude";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:3:{s:5:"title";s:18:"Comentaris recents";s:6:"number";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:21:{i:0;s:7:"text-34";i:1;s:7:"text-94";i:2;s:7:"text-54";i:3;s:7:"text-56";i:4;s:7:"text-58";i:5;s:7:"text-60";i:6;s:7:"text-72";i:7;s:7:"text-90";i:8;s:7:"text-96";i:9;s:12:"gce_widget-8";i:10;s:7:"text-86";i:11;s:7:"text-74";i:12;s:11:"nav_menu-22";i:13;s:7:"text-82";i:14;s:7:"text-68";i:15;s:7:"text-76";i:16;s:11:"nav_menu-30";i:17;s:14:"xtec_widget-10";i:18;s:7:"text-88";i:19;s:7:"text-92";i:20;s:11:"nav_menu-36";}s:7:"sidebar";a:18:{i:0;s:10:"nav_menu-8";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:11:"tag_cloud-3";i:6;s:10:"archives-2";i:7;s:32:"bp_core_recently_active_widget-2";i:8;s:7:"text-42";i:9;s:7:"text-44";i:10;s:11:"tag_cloud-5";i:11;s:13:"xtec_widget-8";i:12;s:7:"text-98";i:13;s:8:"text-100";i:14;s:11:"nav_menu-20";i:15;s:11:"nav_menu-32";i:16;s:8:"text-102";i:17;s:11:"nav_menu-42";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:5:{i:0;s:20:"logo_centre_widget-5";i:1;s:12:"gce_widget-2";i:2;s:13:"xtec_widget-2";i:3;s:6:"text-2";i:4;s:19:"email-subscribers-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";i:2;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:7:{i:1537436620;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537436626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537438363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537457653;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1556178330;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"2ad01c89830641162da760bdfb5dc3a7";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"zfjvrg-enpljg-lxzysh-qgihzf-kqgepo";}s:8:"interval";i:900;}}}i:1556178379;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(118, 'recently_activated', 'a:0:{}', 'yes'),
(123, '_bbp_db_version', '250', 'yes'),
(124, 'bp-deactivated-components', 'a:0:{}', 'yes'),
(125, 'bb-config-location', '/dades/agora/html/wordpress/bb-config.php', 'yes'),
(126, 'bp-xprofile-base-group-name', 'Base', 'yes'),
(127, 'bp-xprofile-fullname-field-name', 'Name', 'yes'),
(128, 'bp-blogs-first-install', '', 'yes'),
(129, 'bp-disable-profile-sync', '0', 'yes'),
(130, 'hide-loggedout-adminbar', '0', 'yes'),
(131, 'bp-disable-avatar-uploads', '0', 'yes'),
(132, 'bp-disable-account-deletion', '1', 'yes'),
(133, 'bp-disable-blogforum-comments', '1', 'yes'),
(134, '_bp_theme_package_id', 'legacy', 'yes'),
(135, 'bp_restrict_group_creation', '1', 'yes'),
(136, '_bp_enable_akismet', '1', 'yes'),
(137, '_bp_enable_heartbeat_refresh', '1', 'yes'),
(138, '_bp_force_buddybar', '', 'yes'),
(139, '_bp_retain_bp_default', '', 'yes'),
(140, 'widget_bp_core_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(141, 'widget_bp_core_members_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(142, 'widget_bp_core_whos_online_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(143, 'widget_bp_core_recently_active_widget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:17:"Han entrat fa poc";s:11:"max_members";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(144, 'widget_bp_groups_widget', 'a:3:{i:1;a:0:{}i:2;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:2:"16";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(145, 'widget_bp_messages_sitewide_notices_widget', '', 'yes'),
(150, 'registration', '0', 'yes'),
(151, 'bp-active-components', 'a:8:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:7:"friends";s:1:"1";s:8:"messages";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}', 'yes'),
(152, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:16;s:8:"register";i:8570;s:8:"activate";i:8568;}', 'yes'),
(153, '_bp_db_version', '11105', 'yes'),
(157, 'bp_docs_attachment_protection', '1', 'yes'),
(158, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(159, 'ass_weekly_digest', '4', 'yes'),
(160, 'bp_like_db_version', '43', 'yes'),
(161, 'bp_like_settings', 'a:8:{s:17:"likers_visibility";N;s:23:"post_to_activity_stream";N;s:12:"show_excerpt";N;s:14:"excerpt_length";s:3:"140";s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:33:"<i class="fa fa-thumbs-o-up"></i>";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:31:"<i class="fa fa-thumbs-up"></i>";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:34:"Indica que aquest element m''agrada";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:37:"Indica que aquest element no m''agrada";}s:10:"view_likes";a:2:{s:7:"default";s:19:"Mostra els m''agrada";s:6:"custom";s:19:"Mostra els m''agrada";}s:10:"hide_likes";a:2:{s:7:"default";s:18:"Amaga els m''agrada";s:6:"custom";s:18:"Amaga els m''agrada";}s:12:"update_likes";a:2:{s:7:"default";s:23:"Actualitza els m''agrada";s:6:"custom";s:23:"Actualitza els m''agrada";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:31:""M''agrada" d''enviaments de blog";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";s:6:"custom";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";s:6:"custom";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";s:6:"custom";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";s:6:"custom";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:13:"T''ha agradat.";s:6:"custom";s:13:"T''ha agradat.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:41:"A tu i a %count% altra persona us agrada.";s:6:"custom";s:41:"A tu i a %count% altra persona us agrada.";}s:26:"you_and_username_like_this";a:2:{s:7:"default";s:22:"A tu i a %s us agrada.";s:6:"custom";s:22:"A tu i a %s us agrada.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:41:"A tu i a %count% persones més us agrada.";s:6:"custom";s:41:"A tu i a %count% persones més us agrada.";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:36:"%count% persona li ha agradat això.";s:6:"custom";s:36:"%count% persona li ha agradat això.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:38:"%count% persones els ha agradat això.";s:6:"custom";s:38:"%count% persones els ha agradat això.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:38:"i %count% persona li ha agradat això.";s:6:"custom";s:38:"i %count% persona li ha agradat això.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:40:"i %count% persones els ha agradat això.";s:6:"custom";s:40:"i %count% persones els ha agradat això.";}s:13:"two_like_this";a:2:{s:7:"default";s:25:"%s i %s els agrada això.";s:6:"custom";s:25:"%s i %s els agrada això.";}s:14:"one_likes_this";a:2:{s:7:"default";s:20:"%s els agrada això.";s:6:"custom";s:20:"%s els agrada això.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";s:6:"custom";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";s:6:"custom";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";}}s:13:"translate_nag";N;s:14:"name_or_avatar";N;s:17:"remove_fav_button";N;}', 'yes'),
(162, 'bp_moderation_options', 'a:6:{s:14:"unflagged_text";s:9:"Inadequat";s:12:"flagged_text";s:16:"No és inadequat";s:12:"active_types";a:1:{s:16:"activity_comment";s:2:"on";}s:17:"warning_threshold";i:5;s:15:"warning_forward";s:17:"a8000007@xtec.cat";s:15:"warning_message";s:297:"Several user reported one of your content as inappropriate.\r\nYou can see the content in the page: %CONTENTURL%.\r\nYou posted this content with the account "%AUTHORNAME%".\r\n\r\nA community moderator will soon review and moderate this content if necessary.\r\n--------------------\r\n[%SITENAME%] %SITEURL%";}', 'yes'),
(163, 'bp_moderation_db_version', '-100', 'yes'),
(166, 'gce_general', 'a:7:{s:10:"stylesheet";s:0:"";s:10:"javascript";b:0;s:7:"loading";s:12:"Carregant...";s:5:"error";s:40:"Calendari no disponible en aquest moment";s:6:"fields";b:1;s:14:"old_stylesheet";b:0;s:13:"save_settings";b:1;}', 'yes'),
(167, 'invite_anyone', 'a:22:{s:11:"max_invites";i:5;s:23:"allow_email_invitations";s:3:"all";s:23:"message_is_customizable";s:3:"yes";s:23:"subject_is_customizable";s:2:"no";s:28:"can_send_group_invites_email";s:3:"yes";s:24:"bypass_registration_lock";s:3:"yes";s:7:"version";s:5:"1.4.0";s:23:"email_visibility_toggle";s:5:"limit";s:18:"email_since_toggle";b:0;s:10:"days_since";s:1:"0";s:17:"email_role_toggle";s:3:"yes";s:12:"minimum_role";s:13:"Administrator";s:22:"email_blacklist_toggle";b:0;s:15:"email_blacklist";s:0:"";s:23:"group_invites_can_admin";s:6:"anyone";s:29:"group_invites_can_group_admin";s:6:"anyone";s:27:"group_invites_can_group_mod";s:6:"anyone";s:30:"group_invites_can_group_member";s:5:"noone";s:32:"group_invites_enable_create_step";s:3:"yes";s:19:"cloudsponge_enabled";s:3:"off";s:26:"email_limit_invites_toggle";b:0;s:22:"limit_invites_per_user";s:2:"10";}', 'yes'),
(168, 'invite_anyone_db_version', '1.4.0', 'yes'),
(169, 'slideshow-plugin-updated-from-v1-x-x-to-v2-0-1', 'updated', 'yes'),
(170, 'slideshow-plugin-updated-from-v2-to-v2-1-20', 'updated', 'yes'),
(171, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22', 'updated', 'yes'),
(172, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23', 'updated', 'yes'),
(173, 'slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0', 'updated', 'yes'),
(174, 'slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8', 'updated', 'yes'),
(175, 'slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12', 'updated', 'yes'),
(176, 'slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16', 'updated', 'yes'),
(177, 'slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17', 'updated', 'yes'),
(178, 'slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20', 'updated', 'yes'),
(179, 'slideshow-jquery-image-gallery-plugin-version', '2.3.1', 'yes'),
(180, 'social_articles_options', 'a:6:{s:13:"post_per_page";s:2:"10";s:14:"excerpt_length";s:2:"30";s:8:"workflow";s:8:"approval";s:16:"bp_notifications";s:4:"true";s:20:"allow_author_adition";s:4:"true";s:21:"allow_author_deletion";s:4:"true";}', 'yes'),
(182, 'wsl_database_migration_version', '4', 'yes'),
(183, 'wsl_components_core_enabled', '1', 'yes'),
(184, 'wsl_components_networks_enabled', '1', 'yes'),
(185, 'wsl_components_login-widget_enabled', '1', 'yes'),
(186, 'wsl_components_bouncer_enabled', '1', 'yes'),
(187, 'wsl_components_diagnostics_enabled', '1', 'yes'),
(188, 'wsl_settings_welcome_panel_enabled', '1', 'yes'),
(189, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/mastercreda/', 'yes'),
(190, 'wsl_settings_connect_with_label', 'Entra amb:', 'yes'),
(191, 'wsl_settings_use_popup', '2', 'yes'),
(192, 'wsl_settings_widget_display', '1', 'yes'),
(193, 'wsl_settings_authentication_widget_css', '#wp-social-login-connect-with {font-weight: bold;}\r\n#wp-social-login-connect-options {padding:10px;}\r\n#wp-social-login-connect-options a {text-decoration: none;}\r\n#wp-social-login-connect-options img {border:0 none;}\r\n.wsl_connect_with_provider {}', 'yes'),
(194, 'wsl_settings_bouncer_registration_enabled', '1', 'yes'),
(195, 'wsl_settings_bouncer_authentication_enabled', '1', 'yes'),
(196, 'wsl_settings_bouncer_linking_accounts_enabled', '2', 'yes'),
(197, 'wsl_settings_bouncer_profile_completion_require_email', '2', 'yes'),
(198, 'wsl_settings_bouncer_profile_completion_change_email', '2', 'yes'),
(199, 'wsl_settings_bouncer_profile_completion_change_username', '2', 'yes'),
(200, 'wsl_settings_bouncer_profile_completion_text_notice', 'Almost there, we just need to check a couple of things', 'yes'),
(201, 'wsl_settings_bouncer_profile_completion_text_submit_button', 'Continue', 'yes'),
(202, 'wsl_settings_bouncer_profile_completion_text_email', 'E-mail', 'yes'),
(203, 'wsl_settings_bouncer_profile_completion_text_username', 'Username', 'yes'),
(204, 'wsl_settings_bouncer_profile_completion_text_email_invalid', 'E-mail is not valid!', 'yes'),
(205, 'wsl_settings_bouncer_profile_completion_text_username_invalid', 'Username is not valid!', 'yes'),
(206, 'wsl_settings_bouncer_profile_completion_text_email_exists', 'That E-mail is already registered!', 'yes'),
(207, 'wsl_settings_bouncer_profile_completion_text_username_exists', 'That Username is already registered!', 'yes'),
(208, 'wsl_settings_bouncer_profile_completion_text_connected_with', 'You are now connected via', 'yes'),
(209, 'wsl_settings_bouncer_new_users_moderation_level', '1', 'yes'),
(210, 'wsl_settings_bouncer_new_users_membership_default_role', 'default', 'yes'),
(211, 'wsl_settings_bouncer_new_users_restrict_domain_enabled', '2', 'yes'),
(212, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', 'El domini de la vostra adreça de correu electrònic no està autoritzat a entrar', 'yes'),
(213, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(214, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', 'No teniu autorització per entrar (no esteu a la llista d''admesos)', 'yes'),
(215, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(216, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', '', 'yes'),
(217, 'wsl_settings_contacts_import_facebook', '2', 'yes'),
(218, 'wsl_settings_contacts_import_google', '2', 'yes'),
(219, 'wsl_settings_contacts_import_twitter', '2', 'yes'),
(220, 'wsl_settings_contacts_import_live', '2', 'yes'),
(221, 'wsl_settings_contacts_import_linkedin', '2', 'yes'),
(222, 'wsl_settings_Google_enabled', '1', 'yes'),
(223, 'wsl_settings_Moodle_enabled', '0', 'yes'),
(225, 'xtec_mail_idapp', 'AGORA', 'yes'),
(226, 'xtec_mail_replyto', 'agora-noreply@xtec.cat', 'yes'),
(227, 'xtec_mail_sender', 'educacio', 'yes'),
(228, 'xtec_mail_log', '0', 'yes'),
(229, 'xtec_mail_debug', '0', 'yes'),
(230, 'xtec_mail_logpath', '', 'yes'),
(231, 'theme_mods_twentyfourteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1410515298;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(232, 'current_theme', 'NODES SERVEIS EDUCATIUS', 'yes'),
(233, 'theme_mods_reactor-primaria-1', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:2;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1447247596;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:5:{i:0;s:18:"bp_groups_widget-4";i:1;s:10:"archives-4";i:2;s:24:"bp_core_friends_widget-4";i:3;s:24:"bp_core_friends_widget-2";i:4;s:7:"text-23";}s:9:"categoria";a:20:{i:0;s:10:"nav_menu-2";i:1;s:10:"nav_menu-3";i:2;s:10:"nav_menu-4";i:3;s:10:"nav_menu-5";i:4;s:6:"text-3";i:5;s:20:"grup_classe_widget-2";i:6;s:20:"grup_classe_widget-3";i:7;s:20:"grup_classe_widget-4";i:8;s:20:"grup_classe_widget-5";i:9;s:20:"grup_classe_widget-6";i:10;s:20:"grup_classe_widget-7";i:11;s:20:"grup_classe_widget-9";i:12;s:21:"grup_classe_widget-10";i:13;s:21:"grup_classe_widget-11";i:14;s:21:"grup_classe_widget-12";i:15;s:21:"grup_classe_widget-13";i:16;s:21:"grup_classe_widget-14";i:17;s:20:"grup_classe_widget-8";i:18;s:7:"text-17";i:19;s:7:"text-18";}s:7:"sidebar";a:9:{i:0;s:10:"nav_menu-8";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:11:"tag_cloud-3";i:6;s:10:"archives-2";i:7;s:32:"bp_core_recently_active_widget-2";i:8;s:10:"nav_menu-6";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:4:{i:0;s:20:"logo_centre_widget-2";i:1;s:12:"gce_widget-2";i:2;s:6:"text-2";i:3;s:13:"xtec_widget-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";i:2;s:20:"logo_centre_widget-3";}}}}', 'yes'),
(234, 'theme_switched', '', 'yes'),
(236, 'widget_pages', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(237, 'widget_calendar', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(238, 'widget_tag_cloud', 'a:4:{i:1;a:0:{}i:3;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;i:5;a:3:{s:5:"title";s:9:"Etiquetes";s:8:"taxonomy";s:11:"bp_docs_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}}}}}', 'yes'),
(239, 'widget_nav_menu', 'a:9:{i:1;a:0:{}i:8;a:2:{s:8:"nav_menu";i:61;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";s:12:"has_children";b:0;}i:3;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";s:12:"has_children";b:0;}i:4;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:5:"front";s:12:"has_children";b:0;}i:5;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;i:20;a:2:{s:8:"nav_menu";i:278;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8173";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8175";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:0:"";s:12:"has_children";b:0;}i:3;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:0:"";s:12:"has_children";b:0;}i:4;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:5:"front";s:12:"has_children";b:0;}i:5;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8424";s:12:"has_children";b:0;}}}}i:22;a:2:{s:8:"nav_menu";i:278;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:3:"294";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:3:"271";s:12:"has_children";b:0;}}}}i:30;a:3:{s:5:"title";s:14:"Professionals ";s:8:"nav_menu";i:293;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:9:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"288";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"281";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"297";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"298";}i:4;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"269";}i:5;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"267";}i:6;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"296";}i:7;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"268";}i:8;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"266";}}}}i:32;a:3:{s:5:"title";s:13:"Professionals";s:8:"nav_menu";i:293;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8432";}}}}i:36;a:2:{s:8:"nav_menu";i:293;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"264";}}}}i:42;a:2:{s:8:"nav_menu";i:263;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:7:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"797";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8429";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"306";s:12:"has_children";b:0;}i:3;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8140";s:12:"has_children";b:0;}i:4;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"608";s:12:"has_children";b:0;}i:5;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"318";s:12:"has_children";b:0;}i:6;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:4:"8527";s:12:"has_children";b:0;}}}}}', 'yes'),
(240, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(247, 'widget_gce_widget', 'a:3:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:1038;}i:8;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:1038;}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"Destacat";s:11:"slideshowId";s:3:"202";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_xtec_widget', 'a:5:{i:1;a:0:{}i:2;a:27:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:2:"on";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:2:"on";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:2:"on";s:8:"ampa_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercreda/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";s:10:"moodle_url";s:58:"https://pwc-int.educacio.intranet/agora/mastercreda/moodle";}s:12:"_multiwidget";s:1:"1";i:8;a:28:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:0:"";s:4:"xtec";s:0:"";s:6:"edu365";s:0:"";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:2:"on";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:2:"on";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:2:"on";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercreda/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:58:"https://pwc-int.educacio.intranet/agora/mastercreda/moodle";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:8:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"434";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"541";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:4:"1314";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"420";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"448";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"548";}i:6;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"572";}i:7;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"416";}}}}i:10;a:28:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:0:"";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:2:"on";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercreda/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:58:"https://pwc-int.educacio.intranet/agora/mastercreda/moodle";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"288";}}}}}', 'yes'),
(251, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;i:5;a:0:{}}', 'yes'),
(252, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:95:"https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/creda1.png";s:16:"nomCanonicCentre";s:13:"CREDA L''Arany";s:14:"direccioCentre";s:16:"Via Augusta, 202";s:8:"cpCentre";s:21:"08021 Abella de xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:13:"paleta_colors";s:5:"blaus";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:3:"273";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"66";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";s:1:"1";s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:96:"https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/favicon.ico";s:11:"logo_inline";s:1:"1";s:14:"contacteCentre";s:68:"https://pwc-int.educacio.intranet/agora/mastercreda/linstitut/on-som";s:12:"correuCentre";s:0:"";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:16:{s:5:"icon1";s:10:"admin-home";s:10:"link_icon1";s:0:"";s:11:"title_icon1";s:5:"Inici";s:5:"icon2";s:11:"admin-users";s:10:"link_icon2";s:48:"http://srvcnpbs.xtec.cat/cse/gestcreda/login.php";s:11:"title_icon2";s:9:"GestCREDA";s:5:"icon3";s:4:"book";s:10:"link_icon3";s:55:"http://xtec.gencat.cat/ca/projectes/biblioteca/epergam/";s:11:"title_icon3";s:8:"ePèrgam";s:5:"icon4";s:9:"portfolio";s:10:"link_icon4";s:19:"categoria/recursos/";s:11:"title_icon4";s:8:"recursos";s:5:"icon5";s:6:"groups";s:10:"link_icon5";s:9:"activitat";s:11:"title_icon5";s:8:"intranet";s:14:"show_text_icon";s:2:"si";}', 'yes'),
(308, 'widget_bp_core_friends_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(353, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(484, 'bpfb', 'a:5:{s:5:"theme";s:3:"new";s:9:"alignment";s:4:"left";s:12:"oembed_width";i:450;s:20:"thumbnail_size_width";i:450;s:21:"thumbnail_size_height";i:450;}', 'yes'),
(745, 'bphelp-my-redirect-slug', 'wp-login.php', 'yes'),
(947, 'gce_settings_general', 'a:2:{s:13:"save_settings";i:1;s:14:"always_enqueue";i:1;}', 'yes'),
(950, 'gce_cpt_setup', '1', 'yes'),
(1027, 'bp-docs-slug', 'docs', 'yes'),
(1028, 'bp-docs-excerpt-length', '0', 'yes'),
(1029, 'bp-docs-user-tab-name', 'Documents', 'yes'),
(1030, 'bp-docs-tab-name', 'Documents', 'yes'),
(1031, 'bp-docs-enable-attachments', 'yes', 'yes'),
(1105, 'ga_version', '6.4.7.3', 'yes'),
(1106, 'ga_status', 'disabled', 'yes'),
(1107, 'ga_disable_gasites', 'disabled', 'yes'),
(1108, 'ga_analytic_snippet', 'enabled', 'yes'),
(1109, 'ga_uid', 'UA-XXXXXXXX-X', 'yes'),
(1110, 'ga_admin_status', 'enabled', 'yes'),
(1111, 'ga_admin_disable_DimentionIndex', '', 'yes'),
(1112, 'ga_admin_disable', 'remove', 'yes'),
(1113, 'ga_admin_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(1114, 'ga_dashboard_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(1115, 'key_ga_show_ad', '1', 'yes'),
(1116, 'ga_adsense', '', 'yes'),
(1117, 'ga_extra', '', 'yes'),
(1118, 'ga_extra_after', '', 'yes'),
(1119, 'ga_event', 'enabled', 'yes'),
(1120, 'ga_outbound', 'enabled', 'yes'),
(1121, 'ga_outbound_prefix', 'outgoing', 'yes'),
(1122, 'ga_enhanced_link_attr', 'disabled', 'yes'),
(1123, 'ga_downloads', '', 'yes'),
(1124, 'ga_downloads_prefix', 'download', 'yes'),
(1125, 'ga_widgets', 'enabled', 'yes'),
(1126, 'ga_annon', '', 'yes'),
(1127, 'ga_defaults', 'yes', 'yes'),
(1128, 'ga_google_token', '', 'yes'),
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercreda/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";s:1:"1";}', 'yes'),
(1177, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(1280, 'WPLANG', 'ca', 'yes'),
(1281, 'db_upgraded', '', 'yes'),
(1294, 'widget_grup_classe_widget', 'a:1:{s:12:"_multiwidget";s:1:"1";}', 'yes'),
(1342, 'bpfb_plugin', 'a:1:{s:9:"installed";i:1;}', 'yes'),
(1416, 'wsl_components_users_enabled', '1', 'yes'),
(1439, 'bp_disable_blogforum_comments', '1', 'yes'),
(1662, 'wsl_settings_Google_app_id', '', 'yes'),
(1663, 'wsl_settings_Google_app_secret', '', 'yes'),
(1664, 'wsl_settings_Moodle_app_id', '', 'yes'),
(1665, 'wsl_settings_Moodle_app_secret', '', 'yes'),
(1666, 'wsl_settings_Moodle_url', '', 'yes'),
(1837, 'widget_xtec_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2283, 'addtoany_options', 'a:33:{s:8:"position";s:6:"bottom";s:30:"display_in_posts_on_front_page";s:2:"-1";s:33:"display_in_posts_on_archive_pages";s:1:"1";s:19:"display_in_excerpts";s:2:"-1";s:16:"display_in_posts";s:1:"1";s:16:"display_in_pages";s:1:"1";s:15:"display_in_feed";s:2:"-1";s:10:"show_title";s:2:"-1";s:7:"onclick";s:2:"-1";s:9:"icon_size";s:2:"25";s:6:"button";s:4:"NONE";s:13:"button_custom";s:0:"";s:6:"header";s:0:"";s:23:"additional_js_variables";s:0:"";s:12:"custom_icons";s:2:"-1";s:16:"custom_icons_url";s:1:"/";s:17:"custom_icons_type";s:3:"png";s:10:"inline_css";s:1:"1";s:5:"cache";s:2:"-1";s:20:"display_in_cpt_forum";s:2:"-1";s:20:"display_in_cpt_topic";s:2:"-1";s:20:"display_in_cpt_reply";s:2:"-1";s:21:"display_in_cpt_bp_doc";s:2:"-1";s:23:"display_in_cpt_gce_feed";s:2:"-1";s:11:"button_text";s:10:"Comparteix";s:24:"special_facebook_options";a:1:{s:10:"show_count";s:2:"-1";}s:23:"special_twitter_options";a:1:{s:10:"show_count";s:2:"-1";}s:15:"active_services";a:4:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:8:"whatsapp";i:3;s:12:"google_gmail";}s:29:"special_facebook_like_options";a:1:{s:4:"verb";s:4:"like";}s:29:"special_twitter_tweet_options";a:1:{s:10:"show_count";s:2:"-1";}s:30:"special_google_plusone_options";a:1:{s:10:"show_count";s:2:"-1";}s:33:"special_google_plus_share_options";a:1:{s:10:"show_count";s:2:"-1";}s:29:"special_pinterest_pin_options";a:1:{s:10:"show_count";s:2:"-1";}}', 'yes'),
(2307, 'nodesbox_name', 'Màster CREDA', 'yes'),
(2427, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2428, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2434, 'common_css', '', 'yes'),
(2486, 'theme_mods_reactor-serveis-educatius', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:145;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
(2487, 'recaptcha_options', 'a:5:{s:8:"site_key";s:40:"6LddJgoTAAAAAFCT6LwNkKU2YR2qNMG7fQgIXse8";s:6:"secret";s:40:"6LddJgoTAAAAAKs-yBghGgTZmAB1oPLQlldWYKAh";s:14:"comments_theme";s:8:"standard";s:18:"recaptcha_language";s:2:"ca";s:17:"no_response_error";s:58:"<strong>ERROR</strong>: Please fill in the reCAPTCHA form.";}', 'yes'),
(2676, 'category_82', 'a:1:{s:13:"articles_fila";s:1:"3";}', 'yes'),
(2681, 'category_80', 'a:1:{s:13:"articles_fila";s:1:"3";}', 'yes'),
(2768, 'category_71', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(2847, '_bbp_edit_lock', '30', 'yes'),
(2848, '_bbp_throttle_time', '10', 'yes'),
(2849, '_bbp_allow_anonymous', '0', 'yes'),
(2850, '_bbp_allow_global_access', '1', 'yes'),
(2851, '_bbp_default_role', 'bbp_participant', 'yes'),
(2852, '_bbp_allow_revisions', '1', 'yes'),
(2853, '_bbp_enable_favorites', '1', 'yes'),
(2854, '_bbp_enable_subscriptions', '1', 'yes'),
(2855, '_bbp_allow_topic_tags', '1', 'yes'),
(2856, '_bbp_allow_search', '1', 'yes'),
(2857, '_bbp_use_wp_editor', '1', 'yes'),
(2858, '_bbp_use_autoembed', '1', 'yes'),
(2859, '_bbp_thread_replies_depth', '3', 'yes'),
(2860, '_bbp_allow_threaded_replies', '1', 'yes'),
(2861, '_bbp_topics_per_page', '15', 'yes'),
(2862, '_bbp_replies_per_page', '15', 'yes'),
(2863, '_bbp_topics_per_rss_page', '25', 'yes'),
(2864, '_bbp_replies_per_rss_page', '25', 'yes'),
(2865, '_bbp_root_slug', 'forums', 'yes'),
(2866, '_bbp_include_root', '1', 'yes'),
(2867, '_bbp_show_on_root', 'forums', 'yes'),
(2868, '_bbp_forum_slug', 'forum', 'yes'),
(2869, '_bbp_topic_slug', 'topic', 'yes'),
(2870, '_bbp_topic_tag_slug', 'topic-tag', 'yes'),
(2871, '_bbp_view_slug', 'view', 'yes'),
(2872, '_bbp_reply_slug', 'reply', 'yes'),
(2873, '_bbp_search_slug', 'search', 'yes'),
(2874, '_bbp_user_slug', 'users', 'yes'),
(2875, '_bbp_topic_archive_slug', 'topics', 'yes'),
(2876, '_bbp_reply_archive_slug', 'replies', 'yes'),
(2877, '_bbp_user_favs_slug', 'favorites', 'yes'),
(2878, '_bbp_user_subs_slug', 'subscriptions', 'yes'),
(2879, '_bbp_enable_group_forums', '1', 'yes'),
(2880, '_bbp_group_forums_root_id', '0', 'yes'),
(2881, 'ja_bbpress_tinymce_full', '0', 'yes'),
(2882, 'ja_bbpress_tinymce_media', '1', 'yes'),
(2922, 'category_81', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(2924, 'category_69', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(2926, 'category_73', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(3047, 'category_79', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(3262, '_bbp_private_forums', 'a:19:{i:0;i:1256;i:1;i:1255;i:2;i:1242;i:3;i:1167;i:4;i:1165;i:5;i:1120;i:6;i:768;i:7;i:179;i:8;i:178;i:9;i:177;i:10;i:176;i:11;i:175;i:12;i:174;i:13;i:173;i:14;i:172;i:15;i:171;i:16;i:170;i:17;i:115;i:18;i:113;}', 'yes'),
(3263, '_bbp_hidden_forums', 'a:19:{i:0;i:1256;i:1;i:1255;i:2;i:1242;i:3;i:1167;i:4;i:1165;i:5;i:1120;i:6;i:768;i:7;i:179;i:8;i:178;i:9;i:177;i:10;i:176;i:11;i:175;i:12;i:174;i:13;i:173;i:14;i:172;i:15;i:171;i:16;i:170;i:17;i:115;i:18;i:113;}', 'yes'),
(3449, 'bp-disable-group-cover-image-uploads', '1', 'yes'),
(3450, 'bp-disable-cover-image-uploads', '1', 'yes'),
(3451, 'ga_analyticator_global_notification', '1', 'yes'),
(3453, 'xtec-stats-visits', '0', 'yes'),
(3454, 'xtec-stats-include-admin', 'on', 'yes'),
(3648, 'category_153', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(3694, 'category_156', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(3723, 'bp_docs_associated_item_children', 'a:0:{}', 'yes'),
(3784, 'email-subscribers', '2.9', 'yes'),
(3791, 'widget_email-subscribers', 'a:3:{i:1;a:0:{}i:2;a:4:{s:8:"es_title";s:22:"Subscripció de correu";s:7:"es_desc";s:35:"T''avisarem si hi ha notícies noves";s:7:"es_name";s:3:"YES";s:8:"es_group";s:7:"Portada";}s:12:"_multiwidget";i:1;}', 'yes'),
(3880, 'xtec_ldap_host', 'xoidpro.educacio.intranet', 'yes'),
(3881, 'xtec_ldap_port', '389', 'yes'),
(3882, 'xtec_ldap_version', '3', 'yes'),
(3883, 'xtec_ldap_base_dn', 'cn=users,dc=xtec,dc=cat', 'yes'),
(3884, 'xtec_ldap_login_type', 'LDAP', 'yes'),
(4144, 'category_271', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4236, 'category_76', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4275, 'category_265', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4299, 'category_280', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4323, 'category_282', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4325, 'category_283', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4389, 'category_264', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4396, 'category_284', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4557, 'category_291', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4559, 'category_292', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4562, 'category_290', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4619, 'category_285', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4623, 'category_288', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(4792, 'category_295', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5356, 'category_266', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5414, 'category_267', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5416, 'category_268', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5422, 'category_269', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5446, 'category_297', 'a:2:{s:13:"articles_fila";s:0:"";s:5:"image";s:0:"";}', 'yes'),
(5506, 'category_children', 'a:3:{i:281;a:8:{i:0;i:266;i:1;i:267;i:2;i:268;i:3;i:269;i:4;i:289;i:5;i:296;i:6;i:297;i:7;i:298;}i:264;a:1:{i:0;i:288;}i:271;a:1:{i:0;i:294;}}', 'yes'),
(5755, 'finished_splitting_shared_terms', '1', 'yes'),
(5756, 'site_icon', '0', 'yes'),
(5757, 'medium_large_size_w', '768', 'yes'),
(5758, 'medium_large_size_h', '0', 'yes'),
(5779, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(5942, 'rewrite_rules', 'a:321:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:66:"index.php?taxonomy=calendar_feed&term=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:66:"index.php?taxonomy=calendar_feed&term=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:60:"index.php?taxonomy=calendar_feed&term=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:67:"index.php?taxonomy=calendar_feed&term=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:49:"index.php?taxonomy=calendar_feed&term=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:66:"index.php?taxonomy=calendar_type&term=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:66:"index.php?taxonomy=calendar_type&term=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:60:"index.php?taxonomy=calendar_type&term=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:67:"index.php?taxonomy=calendar_type&term=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:49:"index.php?taxonomy=calendar_type&term=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_member_type&term=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_member_type&term=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_member_type&term=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_member_type&term=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:50:"index.php?taxonomy=bp_member_type&term=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:74:"index.php?taxonomy=bp_docs_doc_in_folder&term=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:74:"index.php?taxonomy=bp_docs_doc_in_folder&term=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:68:"index.php?taxonomy=bp_docs_doc_in_folder&term=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:75:"index.php?taxonomy=bp_docs_doc_in_folder&term=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:57:"index.php?taxonomy=bp_docs_doc_in_folder&term=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:37:"slideshow/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:47:"slideshow/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:67:"slideshow/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"slideshow/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"slideshow/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:43:"slideshow/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:26:"slideshow/([^/]+)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:30:"slideshow/([^/]+)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:50:"slideshow/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:45:"slideshow/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:38:"slideshow/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:45:"slideshow/([^/]+)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:34:"slideshow/([^/]+)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:26:"slideshow/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:36:"slideshow/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:56:"slideshow/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"slideshow/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"slideshow/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:32:"slideshow/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(5943, 'es_c_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(5944, 'es_c_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a ###COUNT### de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: ###UNIQUE### \nHora d''inici: ###STARTTIME### \nHora de finalització: ###ENDTIME### \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(6218, 'bp-plugin-enabled-post-home', '1', 'yes'),
(6737, 'calendar_feed_children', 'a:0:{}', 'yes'),
(6738, 'calendar_type_children', 'a:0:{}', 'yes'),
(6739, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(6740, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(6745, 'simple-calendar_version', '3.1.9', 'yes'),
(6762, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(7662, 'bp-emails-unsubscribe-salt', 'ZyFkakxqWWVtYFtOQCQkTCB+c1FdZXUwbzVbWikrX2E2NXNxak1CK25RWGZ+e3lFbnc3JTtaIFJQfHhMQl8kcA==', 'yes'),
(7663, '_bp_ignore_deprecated_code', '', 'yes'),
(8608, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12236, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12237, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12238, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12239, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12240, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12583, 'wptelegram_ver', '2.0.9', 'yes'),
(12584, 'widget_email-subscribers-form', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12587, 'ig_es_from_name', 'Màster CREDA', 'no'),
(12588, 'ig_es_from_email', 'a8000011@xtec.cat', 'no'),
(12589, 'ig_es_admin_new_contact_email_subject', 'One more contact joins our tribe!', 'no'),
(12590, 'ig_es_admin_new_contact_email_content', 'Hi,\r\n\r\nYour friendly Email Subscribers notification bot here!\r\n\r\n{{NAME}} ({{EMAIL}}) joined our tribe just now.\r\n\r\nWhich list/s? {{LIST}}\r\n\r\nIf you know this person, or if they are an influencer, you may want to reach out to them personally!\r\n\r\nLater...', 'no'),
(12591, 'ig_es_admin_emails', 'a8000011@xtec.cat', 'no'),
(12592, 'ig_es_confirmation_mail_subject', 'Thanks!', 'no'),
(12593, 'ig_es_confirmation_mail_content', 'Hi {{NAME}},\r\n\r\nJust one more step before we share the awesomeness from {{SITENAME}}!\r\n\r\nPlease confirm your subscription by clicking on this link:\r\n\r\n{{LINK}}\r\n\r\nThanks!', 'no'),
(12594, 'ig_es_enable_welcome_email', 'yes', 'no'),
(12595, 'ig_es_welcome_email_subject', 'Welcome to {{SITENAME}}', 'no'),
(12596, 'ig_es_welcome_email_content', 'Hi {{NAME}},\r\n\r\nJust wanted to send you a quick note...\r\n\r\nThank you for joining the awesome {{SITENAME}} tribe.\r\n\r\nOnly valuable emails from me, promise!\r\n\r\nThanks!', 'no'),
(12597, 'ig_es_enable_cron_admin_email', 'Hi Admin,\r\n\r\nCron URL has been triggered successfully on {{DATE}} for the email ''{{SUBJECT}}''. And it sent email to {{COUNT}} recipient(s).\r\n\r\nBest,\r\nMàster CREDA', 'no'),
(12598, 'ig_es_cron_admin_email', 'Hi Admin,\r\n\r\nCron URL has been triggered successfully on {{DATE}} for the email ''{{SUBJECT}}''. And it sent email to {{COUNT}} recipient(s).\r\n\r\nBest,\r\nMàster CREDA', 'no'),
(12599, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/mastercreda/?es=cron&guid=zfjvrg-enpljg-lxzysh-qgihzf-kqgepo', 'no'),
(12600, 'ig_es_hourly_email_send_limit', '300', 'no'),
(12601, 'ig_es_sent_report_subject', 'Your email has been sent', 'no'),
(12602, 'ig_es_sent_report_content', 'Hi Admin,\n\nEmail has been sent successfully to {{COUNT}} email(s). Please find the details below:\n\nUnique ID: {{UNIQUE}}\nStart Time: {{STARTTIME}}\nEnd Time: {{ENDTIME}}\nFor more information, login to your dashboard and go to Reports menu in Email Subscribers.\n\nThank You.', 'no'),
(12603, 'ig_es_unsubscribe_link', 'https://pwc-int.educacio.intranet/agora/mastercreda/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'no'),
(12604, 'ig_es_optin_link', 'https://pwc-int.educacio.intranet/agora/mastercreda/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'no'),
(12605, 'ig_es_unsubscribe_link_content', 'I''d be sad to see you go. But if you want to, you can unsubscribe from here: {{UNSUBSCRIBE-LINK}}', 'no'),
(12606, 'ig_es_email_type', 'wp_mail_html', 'no'),
(12607, 'ig_es_notify_admin', 'no', 'no'),
(12608, 'ig_es_optin_type', 'double_opt_in', 'no'),
(12609, 'ig_es_subscription_error_messsage', 'Hmm.. Something''s amiss..\r\n\r\nCould not complete your request. That email address  is probably already subscribed. Or worse blocked!!\r\n\r\nPlease try again after some time - or contact us if the problem persists.\r\n\r\n', 'no'),
(12610, 'ig_es_subscription_success_message', 'You have been successfully subscribed.', 'no'),
(12611, 'ig_es_unsubscribe_error_message', 'Urrgh.. Something''s wrong..\r\n\r\nAre you sure that email address is on our file? There was some problem in completing your request.\r\n\r\nPlease try again after some time - or contact us if the problem persists.\r\n\r\n', 'no'),
(12612, 'ig_es_unsubscribe_success_message', '<h2>Unsubscribed.</h2><p>You will no longer hear from us. ☹️ Sorry to see you go!</p>', 'no'),
(12613, 'ig_es_post_image_size', 'thumbnail', 'no'),
(12615, 'ig_es_current_version_date_details', '', 'no'),
(12616, 'ig_es_enable_captcha', '', 'no'),
(12617, 'ig_es_roles_and_capabilities', '', 'no'),
(12618, 'ig_es_sample_data_imported', 'no', 'no'),
(12619, 'ig_es_default_subscriber_imported', 'no', 'no'),
(12620, 'ig_es_set_widget', '', 'no'),
(12621, 'ig_es_sync_wp_users', '', 'no'),
(12622, 'ig_es_blocked_domains', 'mail.ru', 'no'),
(12623, 'ig_es_db_version', '4.0.9', 'yes'),
(12626, 'ig_admin_notices', 'a:0:{}', 'yes'),
(12629, 'wp_page_for_privacy_policy', '0', 'yes'),
(12630, 'show_comments_cookies_opt_in', '1', 'yes'),
(12636, '_ges_installed_before_39', '1', 'yes'),
(12637, '_ges_39_subscriptions_table_created', '1', 'yes'),
(12638, '_ges_39_queued_items_table_created', '1', 'yes'),
(12639, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(12649, '_ges_39_subscriptions_migrated', '1', 'yes'),
(12651, '_ges_39_digest_queue_migrated', '1', 'yes'),
(12652, 'can_compress_scripts', '1', 'no'),
(12674, 'acui_columns', 'a:0:{}', 'yes'),
(12675, 'acui_mail_subject', 'Benvinguts a Màster CREDA', 'yes'),
(12676, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(12677, 'acui_mail_template_id', '0', 'yes'),
(12678, 'acui_mail_attachment_id', '0', 'yes'),
(12679, 'acui_enable_email_templates', '', 'yes'),
(12680, 'acui_cron_activated', '', 'yes'),
(12681, 'acui_cron_send_mail', '', 'yes'),
(12682, 'acui_cron_send_mail_updated', '', 'yes'),
(12683, 'acui_cron_delete_users', '', 'yes'),
(12684, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(12685, 'acui_cron_change_role_not_present', '', 'yes'),
(12686, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(12687, 'acui_cron_path_to_file', '', 'yes'),
(12688, 'acui_cron_path_to_move', '', 'yes'),
(12689, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(12690, 'acui_cron_period', '', 'yes'),
(12691, 'acui_cron_role', '', 'yes'),
(12692, 'acui_cron_update_roles_existing_users', '', 'yes'),
(12693, 'acui_cron_log', '', 'yes'),
(12694, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(12695, 'acui_frontend_send_mail', '', 'yes'),
(12696, 'acui_frontend_send_mail_updated', '', 'yes'),
(12697, 'acui_frontend_delete_users', '', 'yes'),
(12698, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(12699, 'acui_frontend_change_role_not_present', '', 'yes'),
(12700, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(12701, 'acui_frontend_role', '', 'yes'),
(12702, 'acui_manually_send_mail', '', 'yes'),
(12703, 'acui_manually_send_mail_updated', '', 'yes'),
(12704, 'acui_automatic_wordpress_email', '', 'yes'),
(12705, 'acui_show_profile_fields', '', 'yes'),
(12706, 'acui_settings', 'wordpress', 'yes'),
(12707, 'acui_mail_from', '', 'yes'),
(12708, 'acui_mail_from_name', '', 'yes'),
(12709, 'acui_mailer', 'smtp', 'yes'),
(12710, 'acui_mail_set_return_path', 'false', 'yes'),
(12711, 'acui_smtp_host', 'localhost', 'yes'),
(12712, 'acui_smtp_port', '25', 'yes'),
(12713, 'acui_smtp_ssl', 'none', 'yes'),
(12714, 'acui_smtp_auth', '', 'yes'),
(12715, 'acui_smtp_user', '', 'yes'),
(12716, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=6714 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1438071219:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(7, 9, '_edit_lock', '1459761968:2'),
(8, 9, '_edit_last', '2'),
(9, 9, '_wp_page_template', 'page-templates/front-page.php'),
(10, 9, '_rawhtml_settings', '0,0,0,0'),
(11, 9, '_template_layout', '2c-l'),
(16, 13, '_edit_lock', '1464344476:1'),
(17, 13, '_edit_last', '2'),
(18, 13, '_wp_page_template', 'page-templates/front-page.php'),
(19, 13, '_rawhtml_settings', '0,0,0,0'),
(20, 13, '_template_layout', '2c-l'),
(74, 32, '_wp_attached_file', '2014/09/exemple1.png'),
(75, 32, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:20:"2014/09/exemple1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple1-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(76, 33, '_wp_attached_file', '2014/09/exemple1b.png'),
(77, 33, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:21:"2014/09/exemple1b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple1b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple1b-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple1b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple1b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(78, 34, '_wp_attached_file', '2014/09/exemple2b.png'),
(79, 34, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:21:"2014/09/exemple2b.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple2b-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(80, 35, '_wp_attached_file', '2014/09/exemple3.png'),
(81, 35, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:20:"2014/09/exemple3.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple3-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple3-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple3-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple3-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(82, 36, '_wp_attached_file', '2014/09/exemple3b.png'),
(83, 36, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:21:"2014/09/exemple3b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple3b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple3b-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple3b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple3b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(84, 37, '_wp_attached_file', '2014/09/exemple2.png'),
(85, 37, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:20:"2014/09/exemple2.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"exemple2-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(406, 107, '_edit_lock', '1459958758:1'),
(407, 107, '_edit_last', '1'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:5:"false";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:8:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:10:"Benvinguts";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1225";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Selecció_999(184)";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8250";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Selecció_999(185)";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8249";}i:4;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Selecció_999(183)";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8251";}i:5;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=ai0k880q9m0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:4:"nena";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8248";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:14:"Adreça mostra";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:116:"Si genereu una imatge com aquesta, podeu amagar la fitxa de la barra lateral. Us recomanem: https://buffer.com/pablo";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1236";}i:8;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:108:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Prova a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}}'),
(437, 113, '_bbp_reply_count', '0'),
(438, 113, '_bbp_topic_count', '0'),
(439, 113, '_bbp_topic_count_hidden', '0'),
(440, 113, '_bbp_total_reply_count', '0'),
(441, 113, '_bbp_total_topic_count', '0'),
(442, 113, '_bbp_last_topic_id', '0'),
(443, 113, '_bbp_last_reply_id', '0'),
(444, 113, '_bbp_last_active_id', '0'),
(445, 113, '_bbp_last_active_time', '0'),
(446, 113, '_bbp_forum_subforum_count', '0'),
(447, 113, '_bbp_group_ids', 'a:0:{}'),
(450, 115, '_bbp_reply_count', '0'),
(451, 115, '_bbp_topic_count', '0'),
(452, 115, '_bbp_topic_count_hidden', '0'),
(453, 115, '_bbp_total_reply_count', '0'),
(454, 115, '_bbp_total_topic_count', '0'),
(455, 115, '_bbp_last_topic_id', '0'),
(456, 115, '_bbp_last_reply_id', '0'),
(457, 115, '_bbp_last_active_id', '0'),
(458, 115, '_bbp_last_active_time', '0'),
(459, 115, '_bbp_forum_subforum_count', '0'),
(460, 115, '_bbp_group_ids', 'a:0:{}'),
(509, 131, '_wp_attached_file', '2014/09/primersauxilis.jpg'),
(510, 131, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:26:"2014/09/primersauxilis.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"primersauxilis-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"primersauxilis-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"primersauxilis-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"primersauxilis-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(540, 141, '_wp_attached_file', '2014/09/cicles.png'),
(541, 141, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:796;s:6:"height";i:302;s:4:"file";s:18:"2014/09/cicles.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"cicles-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"cicles-300x113.png";s:5:"width";i:300;s:6:"height";i:113;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"cicles-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"cicles-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(570, 146, '_wp_attached_file', '2014/09/gimnas.png'),
(571, 146, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:876;s:6:"height";i:275;s:4:"file";s:18:"2014/09/gimnas.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"gimnas-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"gimnas-300x94.png";s:5:"width";i:300;s:6:"height";i:94;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"gimnas-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"gimnas-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(581, 148, '_edit_lock', '1448965345:1'),
(582, 148, '_edit_last', '1'),
(583, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(584, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(585, 148, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(594, 146, '_edit_lock', '1411134657:1'),
(595, 146, '_wp_attachment_image_alt', 'Photo by Anna Armstrong'),
(596, 146, '_edit_last', '1'),
(607, 154, '_wp_attached_file', '2014/09/Xesc_Arbona.png'),
(608, 154, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:772;s:6:"height";i:222;s:4:"file";s:23:"2014/09/Xesc_Arbona.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"Xesc_Arbona-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"Xesc_Arbona-300x86.png";s:5:"width";i:300;s:6:"height";i:86;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"Xesc_Arbona-300x222.png";s:5:"width";i:300;s:6:"height";i:222;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"Xesc_Arbona-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(609, 154, '_edit_lock', '1411137527:1'),
(610, 154, '_wp_attachment_image_alt', 'Photo by Xesc Arbona'),
(611, 154, '_edit_last', '1'),
(659, 168, '_wp_attached_file', '2014/09/classe.png'),
(660, 168, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:261;s:4:"file";s:18:"2014/09/classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"classe-300x97.png";s:5:"width";i:300;s:6:"height";i:97;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(664, 170, '_bbp_reply_count', '0'),
(665, 170, '_bbp_topic_count', '0'),
(666, 170, '_bbp_topic_count_hidden', '0'),
(667, 170, '_bbp_total_reply_count', '0'),
(668, 170, '_bbp_total_topic_count', '0'),
(669, 170, '_bbp_last_topic_id', '0'),
(670, 170, '_bbp_last_reply_id', '0'),
(671, 170, '_bbp_last_active_id', '0'),
(672, 170, '_bbp_last_active_time', '0'),
(673, 170, '_bbp_forum_subforum_count', '0'),
(674, 170, '_bbp_group_ids', 'a:0:{}'),
(675, 171, '_bbp_reply_count', '0'),
(676, 171, '_bbp_topic_count', '0'),
(677, 171, '_bbp_topic_count_hidden', '0'),
(678, 171, '_bbp_total_reply_count', '0'),
(679, 171, '_bbp_total_topic_count', '0'),
(680, 171, '_bbp_last_topic_id', '0'),
(681, 171, '_bbp_last_reply_id', '0'),
(682, 171, '_bbp_last_active_id', '0'),
(683, 171, '_bbp_last_active_time', '0'),
(684, 171, '_bbp_forum_subforum_count', '0'),
(685, 171, '_bbp_group_ids', 'a:0:{}'),
(686, 172, '_bbp_reply_count', '0'),
(687, 172, '_bbp_topic_count', '0'),
(688, 172, '_bbp_topic_count_hidden', '0'),
(689, 172, '_bbp_total_reply_count', '0'),
(690, 172, '_bbp_total_topic_count', '0'),
(691, 172, '_bbp_last_topic_id', '0'),
(692, 172, '_bbp_last_reply_id', '0'),
(693, 172, '_bbp_last_active_id', '0'),
(694, 172, '_bbp_last_active_time', '0'),
(695, 172, '_bbp_forum_subforum_count', '0'),
(696, 172, '_bbp_group_ids', 'a:0:{}'),
(697, 173, '_bbp_reply_count', '0'),
(698, 173, '_bbp_topic_count', '0'),
(699, 173, '_bbp_topic_count_hidden', '0'),
(700, 173, '_bbp_total_reply_count', '0'),
(701, 173, '_bbp_total_topic_count', '0'),
(702, 173, '_bbp_last_topic_id', '0'),
(703, 173, '_bbp_last_reply_id', '0'),
(704, 173, '_bbp_last_active_id', '0'),
(705, 173, '_bbp_last_active_time', '0'),
(706, 173, '_bbp_forum_subforum_count', '0'),
(707, 173, '_bbp_group_ids', 'a:0:{}'),
(708, 174, '_bbp_reply_count', '0'),
(709, 174, '_bbp_topic_count', '0'),
(710, 174, '_bbp_topic_count_hidden', '0'),
(711, 174, '_bbp_total_reply_count', '0'),
(712, 174, '_bbp_total_topic_count', '0'),
(713, 174, '_bbp_last_topic_id', '0'),
(714, 174, '_bbp_last_reply_id', '0'),
(715, 174, '_bbp_last_active_id', '0'),
(716, 174, '_bbp_last_active_time', '0'),
(717, 174, '_bbp_forum_subforum_count', '0'),
(718, 174, '_bbp_group_ids', 'a:0:{}'),
(719, 175, '_bbp_reply_count', '0'),
(720, 175, '_bbp_topic_count', '0'),
(721, 175, '_bbp_topic_count_hidden', '0'),
(722, 175, '_bbp_total_reply_count', '0'),
(723, 175, '_bbp_total_topic_count', '0'),
(724, 175, '_bbp_last_topic_id', '0'),
(725, 175, '_bbp_last_reply_id', '0'),
(726, 175, '_bbp_last_active_id', '0'),
(727, 175, '_bbp_last_active_time', '0'),
(728, 175, '_bbp_forum_subforum_count', '0'),
(729, 175, '_bbp_group_ids', 'a:0:{}'),
(730, 176, '_bbp_reply_count', '0'),
(731, 176, '_bbp_topic_count', '0'),
(732, 176, '_bbp_topic_count_hidden', '0'),
(733, 176, '_bbp_total_reply_count', '0'),
(734, 176, '_bbp_total_topic_count', '0'),
(735, 176, '_bbp_last_topic_id', '0'),
(736, 176, '_bbp_last_reply_id', '0'),
(737, 176, '_bbp_last_active_id', '0'),
(738, 176, '_bbp_last_active_time', '0'),
(739, 176, '_bbp_forum_subforum_count', '0'),
(740, 176, '_bbp_group_ids', 'a:0:{}'),
(741, 177, '_bbp_reply_count', '0'),
(742, 177, '_bbp_topic_count', '0'),
(743, 177, '_bbp_topic_count_hidden', '0'),
(744, 177, '_bbp_total_reply_count', '0'),
(745, 177, '_bbp_total_topic_count', '0'),
(746, 177, '_bbp_last_topic_id', '0'),
(747, 177, '_bbp_last_reply_id', '0'),
(748, 177, '_bbp_last_active_id', '0'),
(749, 177, '_bbp_last_active_time', '0'),
(750, 177, '_bbp_forum_subforum_count', '0'),
(751, 177, '_bbp_group_ids', 'a:0:{}'),
(752, 178, '_bbp_reply_count', '0'),
(753, 178, '_bbp_topic_count', '0'),
(754, 178, '_bbp_topic_count_hidden', '0'),
(755, 178, '_bbp_total_reply_count', '0'),
(756, 178, '_bbp_total_topic_count', '0'),
(757, 178, '_bbp_last_topic_id', '0'),
(758, 178, '_bbp_last_reply_id', '0'),
(759, 178, '_bbp_last_active_id', '0'),
(760, 178, '_bbp_last_active_time', '0'),
(761, 178, '_bbp_forum_subforum_count', '0'),
(762, 178, '_bbp_group_ids', 'a:0:{}'),
(763, 179, '_bbp_reply_count', '0'),
(764, 179, '_bbp_topic_count', '0'),
(765, 179, '_bbp_topic_count_hidden', '0'),
(766, 179, '_bbp_total_reply_count', '0'),
(767, 179, '_bbp_total_topic_count', '0'),
(768, 179, '_bbp_last_topic_id', '0'),
(769, 179, '_bbp_last_reply_id', '0'),
(770, 179, '_bbp_last_active_id', '0'),
(771, 179, '_bbp_last_active_time', '0'),
(772, 179, '_bbp_forum_subforum_count', '0'),
(773, 179, '_bbp_group_ids', 'a:0:{}'),
(806, 185, '_wp_attached_file', '2014/09/ampa.png'),
(807, 185, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:315;s:6:"height";i:126;s:4:"file";s:16:"2014/09/ampa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"ampa-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"ampa-300x120.png";s:5:"width";i:300;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"ampa-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"ampa-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(897, 202, '_edit_lock', '1444398364:1'),
(898, 202, '_edit_last', '1'),
(899, 203, '_bbp_reply_count', '0'),
(900, 203, '_bbp_topic_count', '0'),
(901, 203, '_bbp_topic_count_hidden', '0'),
(902, 203, '_bbp_total_reply_count', '0'),
(903, 203, '_bbp_total_topic_count', '0'),
(904, 203, '_bbp_last_topic_id', '0'),
(905, 203, '_bbp_last_reply_id', '0'),
(906, 203, '_bbp_last_active_id', '0'),
(907, 203, '_bbp_last_active_time', '0'),
(908, 203, '_bbp_forum_subforum_count', '0'),
(909, 203, '_bbp_group_ids', 'a:1:{i:0;i:14;}'),
(910, 204, '_bbp_reply_count', '0'),
(911, 204, '_bbp_topic_count', '0'),
(912, 204, '_bbp_topic_count_hidden', '0'),
(913, 204, '_bbp_total_reply_count', '0'),
(914, 204, '_bbp_total_topic_count', '0'),
(915, 204, '_bbp_last_topic_id', '0'),
(916, 204, '_bbp_last_reply_id', '0'),
(917, 204, '_bbp_last_active_id', '0'),
(918, 204, '_bbp_last_active_time', '0'),
(919, 204, '_bbp_forum_subforum_count', '0'),
(920, 204, '_bbp_group_ids', 'a:0:{}'),
(921, 205, '_bbp_reply_count', '0'),
(922, 205, '_bbp_topic_count', '0'),
(923, 205, '_bbp_topic_count_hidden', '0'),
(924, 205, '_bbp_total_reply_count', '0'),
(925, 205, '_bbp_total_topic_count', '0'),
(926, 205, '_bbp_last_topic_id', '0'),
(927, 205, '_bbp_last_reply_id', '0'),
(928, 205, '_bbp_last_active_id', '0'),
(929, 205, '_bbp_last_active_time', '0'),
(930, 205, '_bbp_forum_subforum_count', '0'),
(931, 205, '_bbp_group_ids', 'a:0:{}'),
(952, 202, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:7:"natural";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(953, 202, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(954, 202, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"215";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:94:"<br><br>\r\nAquí podeu posar els missatges, vídeos o fotos destacades que vagin sortint al mur";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:3:{s:7:"videoId";s:11:"wSNYYThX5-g";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
(955, 209, '_bbp_reply_count', '0'),
(956, 209, '_bbp_topic_count', '1'),
(957, 209, '_bbp_topic_count_hidden', '0'),
(958, 209, '_bbp_total_reply_count', '0'),
(959, 209, '_bbp_total_topic_count', '1'),
(960, 209, '_bbp_last_topic_id', '211'),
(961, 209, '_bbp_last_reply_id', '211'),
(962, 209, '_bbp_last_active_id', '211'),
(963, 209, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(964, 209, '_bbp_forum_subforum_count', '0'),
(965, 209, '_bbp_group_ids', 'a:0:{}'),
(966, 210, '_wp_attached_file', '2014/09/granota.png'),
(967, 210, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1193;s:6:"height";i:843;s:4:"file";s:19:"2014/09/granota.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"granota-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:19:"granota-300x211.png";s:5:"width";i:300;s:6:"height";i:211;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:20:"granota-1024x723.png";s:5:"width";i:1024;s:6:"height";i:723;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"granota-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"granota-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(968, 210, '_edit_lock', '1411398724:1'),
(969, 210, '_edit_last', '1'),
(970, 211, '_bbp_forum_id', '209'),
(971, 211, '_bbp_topic_id', '211'),
(972, 211, '_bbp_author_ip', '10.155.7.35'),
(973, 211, '_bbp_last_active_id', '211'),
(974, 211, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(975, 211, '_bbp_reply_count', '0'),
(976, 211, '_bbp_reply_count_hidden', '0'),
(977, 211, '_bbp_voice_count', '1'),
(978, 211, '_bbp_activity_id', '40'),
(985, 215, '_wp_attached_file', '2014/09/screeshot.png'),
(986, 215, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:524;s:6:"height";i:392;s:4:"file";s:21:"2014/09/screeshot.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"screeshot-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"screeshot-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"screeshot-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"screeshot-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1126, 234, '_wp_attached_file', 'bp-attachments/233/Exemple.docx'),
(1138, 239, '_wp_attached_file', 'bp-attachments/238/Selecció_713.png'),
(1139, 239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:310;s:6:"height";i:126;s:4:"file";s:36:"bp-attachments/238/Selecció_713.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_713-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_713-300x121.png";s:5:"width";i:300;s:6:"height";i:121;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_713-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_713-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1474447296:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', ''),
(1298, 255, '_wp_attached_file', '2015/01/foto-classe.png'),
(1299, 255, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1317, 248, 'gce_paging_widget', '1'),
(1372, 5, '_edit_lock', '1464344496:1'),
(1373, 6, '_edit_lock', '1438071217:2'),
(1374, 16, '_edit_lock', '1438071218:2'),
(1415, 202, 'picasa_album', ''),
(1416, 202, 'googlephotos_album', ''),
(1417, 289, '_menu_item_type', 'post_type'),
(1418, 289, '_menu_item_menu_item_parent', '0'),
(1419, 289, '_menu_item_object_id', '5'),
(1420, 289, '_menu_item_object', 'page'),
(1421, 289, '_menu_item_target', ''),
(1422, 289, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1423, 289, '_menu_item_xfn', ''),
(1424, 289, '_menu_item_url', ''),
(1593, 324, '_wp_attached_file', '2015/11/recursos-educadors-llapisos2.png'),
(1594, 324, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:875;s:6:"height";i:255;s:4:"file";s:40:"2015/11/recursos-educadors-llapisos2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:40:"recursos-educadors-llapisos2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:39:"recursos-educadors-llapisos2-300x87.png";s:5:"width";i:300;s:6:"height";i:87;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:40:"recursos-educadors-llapisos2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:40:"recursos-educadors-llapisos2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1595, 107, 'picasa_album', ''),
(1596, 107, 'googlephotos_album', ''),
(1665, 146, '_wp_attachment_image_alt', 'Photo by Anna Armstrong'),
(1666, 146, '_edit_last', '1'),
(1667, 154, '_wp_attachment_image_alt', 'Photo by Xesc Arbona'),
(1668, 154, '_edit_last', '1'),
(1669, 210, '_edit_last', '1'),
(1672, 339, '_wp_attached_file', '2015/11/tartu.png'),
(1673, 339, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:511;s:6:"height";i:300;s:4:"file";s:17:"2015/11/tartu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"tartu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"tartu-300x176.png";s:5:"width";i:300;s:6:"height";i:176;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"tartu-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"tartu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1676, 354, '_wp_attached_file', '2015/11/eap1.png'),
(1677, 354, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:197;s:6:"height";i:113;s:4:"file";s:16:"2015/11/eap1.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"eap1-150x113.png";s:5:"width";i:150;s:6:"height";i:113;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1678, 355, '_wp_attached_file', '2015/11/eap2.png'),
(1679, 355, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:254;s:6:"height";i:114;s:4:"file";s:16:"2015/11/eap2.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"eap2-150x114.png";s:5:"width";i:150;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"eap2-200x114.png";s:5:"width";i:200;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1690, 372, '_wp_attached_file', '2015/11/OX253EDR6R-1.jpg'),
(1691, 372, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:5086;s:6:"height";i:2779;s:4:"file";s:24:"2015/11/OX253EDR6R-1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"OX253EDR6R-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x164.jpg";s:5:"width";i:300;s:6:"height";i:164;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:25:"OX253EDR6R-1-1024x560.jpg";s:5:"width";i:1024;s:6:"height";i:560;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"OX253EDR6R-1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";d:4;s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T3i";s:7:"caption";s:0:"";s:17:"created_timestamp";i:1415245685;s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"55";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:6:"0.0125";s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1710, 507, '_wp_attached_file', '2015/11/modalitats-2015-16.pdf'),
(1718, 543, '_wp_attached_file', '2015/11/bagicon.png'),
(1719, 543, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:166;s:6:"height";i:165;s:4:"file";s:19:"2015/11/bagicon.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"bagicon-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"bagicon-166x150.png";s:5:"width";i:166;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1726, 570, '_wp_attached_file', '2015/11/jocsvernell.jpg'),
(1727, 570, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:200;s:6:"height";i:104;s:4:"file";s:23:"2015/11/jocsvernell.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"jocsvernell-150x104.jpg";s:5:"width";i:150;s:6:"height";i:104;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"jocsvernell-200x104.jpg";s:5:"width";i:200;s:6:"height";i:104;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1737, 604, '_wp_attached_file', '2015/11/puzzle.png'),
(1738, 604, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:401;s:6:"height";i:236;s:4:"file";s:18:"2015/11/puzzle.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"puzzle-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"puzzle-300x177.png";s:5:"width";i:300;s:6:"height";i:177;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"puzzle-300x236.png";s:5:"width";i:300;s:6:"height";i:236;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"puzzle-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1753, 656, '_wp_attached_file', '2015/11/formador.png'),
(1754, 656, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:313;s:6:"height";i:204;s:4:"file";s:20:"2015/11/formador.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"formador-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"formador-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"formador-300x204.png";s:5:"width";i:300;s:6:"height";i:204;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"formador-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1755, 659, '_wp_attached_file', '2015/11/calendari.jpg'),
(1756, 659, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:555;s:6:"height";i:431;s:4:"file";s:21:"2015/11/calendari.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"calendari-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"calendari-300x233.jpg";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"calendari-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"calendari-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1770, 782, '_wp_attached_file', '2015/11/2015-11-28_1804.png'),
(1771, 782, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:753;s:6:"height";i:453;s:4:"file";s:27:"2015/11/2015-11-28_1804.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"2015-11-28_1804-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"2015-11-28_1804-300x180.png";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"2015-11-28_1804-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"2015-11-28_1804-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1772, 782, '_wp_attachment_image_alt', 'monestir de cellers'),
(1791, 875, '_wp_attached_file', '2015/11/microscopi.pdf'),
(1793, 884, '_wp_attached_file', '2015/11/tablets.png'),
(1794, 884, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:358;s:6:"height";i:264;s:4:"file";s:19:"2015/11/tablets.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"tablets-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:19:"tablets-300x221.png";s:5:"width";i:300;s:6:"height";i:221;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"tablets-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"tablets-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1795, 885, '_wp_attached_file', '2015/11/asus-memo-pad.jpg'),
(1796, 885, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:680;s:6:"height";i:445;s:4:"file";s:25:"2015/11/asus-memo-pad.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"asus-memo-pad-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"asus-memo-pad-300x196.jpg";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"asus-memo-pad-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"asus-memo-pad-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1797, 887, '_wp_attached_file', '2015/11/tablets1.png'),
(1798, 887, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:358;s:6:"height";i:264;s:4:"file";s:20:"2015/11/tablets1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"tablets1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"tablets1-300x221.png";s:5:"width";i:300;s:6:"height";i:221;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"tablets1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"tablets1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1799, 888, '_wp_attached_file', '2015/11/favicon.ico'),
(1842, 1027, '_wp_attached_file', '2015/11/ed2.png'),
(1843, 1027, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:292;s:6:"height";i:213;s:4:"file";s:15:"2015/11/ed2.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:15:"ed2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:15:"ed2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1844, 1032, '_wp_attached_file', '2015/11/films1.png'),
(1845, 1032, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:798;s:6:"height";i:449;s:4:"file";s:18:"2015/11/films1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"films1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"films1-300x169.png";s:5:"width";i:300;s:6:"height";i:169;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"films1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"films1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1923, 113, '_bbp_reply_count', '0'),
(1924, 113, '_bbp_topic_count', '0'),
(1925, 113, '_bbp_topic_count_hidden', '0'),
(1926, 113, '_bbp_total_reply_count', '0'),
(1927, 113, '_bbp_total_topic_count', '0'),
(1928, 113, '_bbp_last_topic_id', '0'),
(1929, 113, '_bbp_last_reply_id', '0'),
(1930, 113, '_bbp_last_active_id', '0'),
(1931, 113, '_bbp_last_active_time', '0'),
(1932, 113, '_bbp_forum_subforum_count', '0'),
(1933, 113, '_bbp_group_ids', 'a:0:{}'),
(1934, 115, '_bbp_reply_count', '0'),
(1935, 115, '_bbp_topic_count', '0'),
(1936, 115, '_bbp_topic_count_hidden', '0'),
(1937, 115, '_bbp_total_reply_count', '0'),
(1938, 115, '_bbp_total_topic_count', '0'),
(1939, 115, '_bbp_last_topic_id', '0'),
(1940, 115, '_bbp_last_reply_id', '0'),
(1941, 115, '_bbp_last_active_id', '0'),
(1942, 115, '_bbp_last_active_time', '0'),
(1943, 115, '_bbp_forum_subforum_count', '0'),
(1944, 115, '_bbp_group_ids', 'a:0:{}'),
(1945, 170, '_bbp_reply_count', '0'),
(1946, 170, '_bbp_topic_count', '0'),
(1947, 170, '_bbp_topic_count_hidden', '0'),
(1948, 170, '_bbp_total_reply_count', '0'),
(1949, 170, '_bbp_total_topic_count', '0'),
(1950, 170, '_bbp_last_topic_id', '0'),
(1951, 170, '_bbp_last_reply_id', '0'),
(1952, 170, '_bbp_last_active_id', '0'),
(1953, 170, '_bbp_last_active_time', '0'),
(1954, 170, '_bbp_forum_subforum_count', '0'),
(1955, 170, '_bbp_group_ids', 'a:0:{}'),
(1956, 171, '_bbp_reply_count', '0'),
(1957, 171, '_bbp_topic_count', '0'),
(1958, 171, '_bbp_topic_count_hidden', '0'),
(1959, 171, '_bbp_total_reply_count', '0'),
(1960, 171, '_bbp_total_topic_count', '0'),
(1961, 171, '_bbp_last_topic_id', '0'),
(1962, 171, '_bbp_last_reply_id', '0'),
(1963, 171, '_bbp_last_active_id', '0'),
(1964, 171, '_bbp_last_active_time', '0'),
(1965, 171, '_bbp_forum_subforum_count', '0'),
(1966, 171, '_bbp_group_ids', 'a:0:{}'),
(1967, 172, '_bbp_reply_count', '0'),
(1968, 172, '_bbp_topic_count', '0'),
(1969, 172, '_bbp_topic_count_hidden', '0'),
(1970, 172, '_bbp_total_reply_count', '0'),
(1971, 172, '_bbp_total_topic_count', '0'),
(1972, 172, '_bbp_last_topic_id', '0'),
(1973, 172, '_bbp_last_reply_id', '0'),
(1974, 172, '_bbp_last_active_id', '0'),
(1975, 172, '_bbp_last_active_time', '0'),
(1976, 172, '_bbp_forum_subforum_count', '0'),
(1977, 172, '_bbp_group_ids', 'a:0:{}'),
(1978, 173, '_bbp_reply_count', '0'),
(1979, 173, '_bbp_topic_count', '0'),
(1980, 173, '_bbp_topic_count_hidden', '0'),
(1981, 173, '_bbp_total_reply_count', '0'),
(1982, 173, '_bbp_total_topic_count', '0'),
(1983, 173, '_bbp_last_topic_id', '0'),
(1984, 173, '_bbp_last_reply_id', '0'),
(1985, 173, '_bbp_last_active_id', '0'),
(1986, 173, '_bbp_last_active_time', '0'),
(1987, 173, '_bbp_forum_subforum_count', '0'),
(1988, 173, '_bbp_group_ids', 'a:0:{}'),
(1989, 174, '_bbp_reply_count', '0'),
(1990, 174, '_bbp_topic_count', '0'),
(1991, 174, '_bbp_topic_count_hidden', '0'),
(1992, 174, '_bbp_total_reply_count', '0'),
(1993, 174, '_bbp_total_topic_count', '0'),
(1994, 174, '_bbp_last_topic_id', '0'),
(1995, 174, '_bbp_last_reply_id', '0'),
(1996, 174, '_bbp_last_active_id', '0'),
(1997, 174, '_bbp_last_active_time', '0'),
(1998, 174, '_bbp_forum_subforum_count', '0'),
(1999, 174, '_bbp_group_ids', 'a:0:{}'),
(2000, 175, '_bbp_reply_count', '0'),
(2001, 175, '_bbp_topic_count', '0'),
(2002, 175, '_bbp_topic_count_hidden', '0'),
(2003, 175, '_bbp_total_reply_count', '0'),
(2004, 175, '_bbp_total_topic_count', '0'),
(2005, 175, '_bbp_last_topic_id', '0'),
(2006, 175, '_bbp_last_reply_id', '0'),
(2007, 175, '_bbp_last_active_id', '0');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2008, 175, '_bbp_last_active_time', '0'),
(2009, 175, '_bbp_forum_subforum_count', '0'),
(2010, 175, '_bbp_group_ids', 'a:0:{}'),
(2011, 176, '_bbp_reply_count', '0'),
(2012, 176, '_bbp_topic_count', '0'),
(2013, 176, '_bbp_topic_count_hidden', '0'),
(2014, 176, '_bbp_total_reply_count', '0'),
(2015, 176, '_bbp_total_topic_count', '0'),
(2016, 176, '_bbp_last_topic_id', '0'),
(2017, 176, '_bbp_last_reply_id', '0'),
(2018, 176, '_bbp_last_active_id', '0'),
(2019, 176, '_bbp_last_active_time', '0'),
(2020, 176, '_bbp_forum_subforum_count', '0'),
(2021, 176, '_bbp_group_ids', 'a:0:{}'),
(2022, 177, '_bbp_reply_count', '0'),
(2023, 177, '_bbp_topic_count', '0'),
(2024, 177, '_bbp_topic_count_hidden', '0'),
(2025, 177, '_bbp_total_reply_count', '0'),
(2026, 177, '_bbp_total_topic_count', '0'),
(2027, 177, '_bbp_last_topic_id', '0'),
(2028, 177, '_bbp_last_reply_id', '0'),
(2029, 177, '_bbp_last_active_id', '0'),
(2030, 177, '_bbp_last_active_time', '0'),
(2031, 177, '_bbp_forum_subforum_count', '0'),
(2032, 177, '_bbp_group_ids', 'a:0:{}'),
(2033, 178, '_bbp_reply_count', '0'),
(2034, 178, '_bbp_topic_count', '0'),
(2035, 178, '_bbp_topic_count_hidden', '0'),
(2036, 178, '_bbp_total_reply_count', '0'),
(2037, 178, '_bbp_total_topic_count', '0'),
(2038, 178, '_bbp_last_topic_id', '0'),
(2039, 178, '_bbp_last_reply_id', '0'),
(2040, 178, '_bbp_last_active_id', '0'),
(2041, 178, '_bbp_last_active_time', '0'),
(2042, 178, '_bbp_forum_subforum_count', '0'),
(2043, 178, '_bbp_group_ids', 'a:0:{}'),
(2078, 179, '_bbp_reply_count', '0'),
(2079, 179, '_bbp_topic_count', '0'),
(2080, 179, '_bbp_topic_count_hidden', '0'),
(2081, 179, '_bbp_total_reply_count', '0'),
(2082, 179, '_bbp_total_topic_count', '0'),
(2083, 179, '_bbp_last_topic_id', '0'),
(2084, 179, '_bbp_last_reply_id', '0'),
(2085, 179, '_bbp_last_active_id', '0'),
(2086, 179, '_bbp_last_active_time', '0'),
(2087, 179, '_bbp_forum_subforum_count', '0'),
(2088, 179, '_bbp_group_ids', 'a:0:{}'),
(2089, 203, '_bbp_reply_count', '0'),
(2090, 203, '_bbp_topic_count', '0'),
(2091, 203, '_bbp_topic_count_hidden', '0'),
(2092, 203, '_bbp_total_reply_count', '0'),
(2093, 203, '_bbp_total_topic_count', '0'),
(2094, 203, '_bbp_last_topic_id', '0'),
(2095, 203, '_bbp_last_reply_id', '0'),
(2096, 203, '_bbp_last_active_id', '0'),
(2097, 203, '_bbp_last_active_time', '0'),
(2098, 203, '_bbp_forum_subforum_count', '0'),
(2099, 203, '_bbp_group_ids', 'a:1:{i:0;i:14;}'),
(2100, 204, '_bbp_reply_count', '0'),
(2101, 204, '_bbp_topic_count', '0'),
(2102, 204, '_bbp_topic_count_hidden', '0'),
(2103, 204, '_bbp_total_reply_count', '0'),
(2104, 204, '_bbp_total_topic_count', '0'),
(2105, 204, '_bbp_last_topic_id', '0'),
(2106, 204, '_bbp_last_reply_id', '0'),
(2107, 204, '_bbp_last_active_id', '0'),
(2108, 204, '_bbp_last_active_time', '0'),
(2109, 204, '_bbp_forum_subforum_count', '0'),
(2110, 204, '_bbp_group_ids', 'a:0:{}'),
(2111, 205, '_bbp_reply_count', '0'),
(2112, 205, '_bbp_topic_count', '0'),
(2113, 205, '_bbp_topic_count_hidden', '0'),
(2114, 205, '_bbp_total_reply_count', '0'),
(2115, 205, '_bbp_total_topic_count', '0'),
(2116, 205, '_bbp_last_topic_id', '0'),
(2117, 205, '_bbp_last_reply_id', '0'),
(2118, 205, '_bbp_last_active_id', '0'),
(2119, 205, '_bbp_last_active_time', '0'),
(2120, 205, '_bbp_forum_subforum_count', '0'),
(2121, 205, '_bbp_group_ids', 'a:0:{}'),
(2122, 209, '_bbp_reply_count', '0'),
(2123, 209, '_bbp_topic_count', '1'),
(2124, 209, '_bbp_topic_count_hidden', '0'),
(2125, 209, '_bbp_total_reply_count', '0'),
(2126, 209, '_bbp_total_topic_count', '1'),
(2127, 209, '_bbp_last_topic_id', '211'),
(2128, 209, '_bbp_last_reply_id', '211'),
(2129, 209, '_bbp_last_active_id', '211'),
(2130, 209, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(2131, 209, '_bbp_forum_subforum_count', '0'),
(2132, 209, '_bbp_group_ids', 'a:0:{}'),
(2136, 1038, 'gce_retrieve_max', '25'),
(2139, 1038, 'old_gce_id', '1'),
(2142, 1038, 'gce_list_max_num', '7'),
(2143, 1038, 'gce_list_max_length', 'days'),
(2144, 1038, 'gce_feed_start_interval', 'months'),
(2145, 1038, 'gce_feed_end_interval', 'years'),
(2146, 1038, 'gce_widget_paging_interval', '604800'),
(2147, 1038, 'gce_paging_widget', '1'),
(2148, 1038, '_edit_last', '2'),
(2150, 1038, '_wp_old_slug', 'institut-larany'),
(2156, 248, 'gce_list_max_num', '7'),
(2157, 248, 'gce_list_max_length', 'days'),
(2159, 248, 'gce_feed_start_interval', 'months'),
(2161, 248, 'gce_feed_end_interval', 'years'),
(2171, 248, '_edit_last', '2'),
(2175, 248, 'gce_widget_paging_interval', ''),
(2181, 248, 'gce_paging_widget', '1'),
(2254, 768, '_bbp_reply_count', '0'),
(2255, 768, '_bbp_topic_count', '0'),
(2256, 768, '_bbp_topic_count_hidden', '0'),
(2257, 768, '_bbp_total_reply_count', '0'),
(2258, 768, '_bbp_total_topic_count', '0'),
(2259, 768, '_bbp_last_topic_id', '0'),
(2260, 768, '_bbp_last_reply_id', '0'),
(2261, 768, '_bbp_last_active_id', '0'),
(2262, 768, '_bbp_last_active_time', '0'),
(2263, 768, '_bbp_forum_subforum_count', '0'),
(2264, 768, '_bbp_group_ids', 'a:1:{i:0;i:20;}'),
(2420, 1063, '_menu_item_type', 'custom'),
(2421, 1063, '_menu_item_menu_item_parent', '0'),
(2422, 1063, '_menu_item_object_id', '1063'),
(2423, 1063, '_menu_item_object', 'custom'),
(2424, 1063, '_menu_item_target', ''),
(2425, 1063, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2426, 1063, '_menu_item_xfn', ''),
(2427, 1063, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/mastercreda/el-creda/que-es/'),
(2492, 7, '_edit_last', '1'),
(2493, 7, '_wp_page_template', 'default'),
(2494, 7, '_rawhtml_settings', '0,0,0,0'),
(2495, 7, '_template_layout', '2c-l'),
(2496, 7, 'gce_paging_widget', '1'),
(2497, 7, 'gce_widget_paging_interval', '604800'),
(2498, 7, 'gce_paging', ''),
(2499, 9, '_edit_last', '1'),
(2500, 9, '_wp_page_template', 'page-templates/front-page.php'),
(2501, 9, '_rawhtml_settings', '0,0,0,0'),
(2502, 9, '_template_layout', '2c-l'),
(2503, 13, '_edit_last', '1'),
(2504, 13, '_wp_page_template', 'page-templates/front-page.php'),
(2505, 13, '_rawhtml_settings', '0,0,0,0'),
(2506, 13, '_template_layout', '2c-l'),
(2507, 306, '_edit_last', '1'),
(2508, 306, '_wp_page_template', 'default'),
(2509, 306, '_template_layout', '2c-l'),
(2510, 306, 'sharing_disabled', '1'),
(2511, 318, '_edit_last', '1'),
(2512, 318, '_wp_page_template', 'default'),
(2513, 318, '_template_layout', '2c-l'),
(2514, 318, 'sharing_disabled', '1'),
(2656, 608, '_edit_last', '1'),
(2657, 608, '_wp_page_template', 'default'),
(2658, 608, '_template_layout', '2c-l'),
(2659, 608, 'sharing_disabled', '1'),
(2660, 797, '_edit_last', '1'),
(2661, 797, '_wp_page_template', 'default'),
(2662, 797, '_template_layout', '2c-l'),
(2663, 806, '_edit_last', '2'),
(2664, 806, '_wp_page_template', 'page-templates/side-menu.php'),
(2665, 806, '_template_layout', '2c-l'),
(2993, 1028, '_edit_last', '1'),
(2994, 1028, '_amaga_titol', ''),
(2995, 1028, '_amaga_metadata', ''),
(2996, 1028, '_bloc_html', ''),
(2997, 1028, '_original_size', 'on'),
(2998, 1028, '_entry_icon', 'noicon'),
(2999, 1028, '_thumbnail_id', '1032'),
(3006, 31, '_edit_last', '1'),
(3007, 31, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3008, 31, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3009, 31, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Gimnàs";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Aules polivalents";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"33";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:12:"Sala d''actes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(3016, 148, '_edit_last', '1'),
(3017, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3018, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3019, 148, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(3020, 202, '_edit_last', '1'),
(3021, 202, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:7:"natural";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3022, 202, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3023, 202, 'slides', ''),
(3024, 202, 'picasa_album', ''),
(3025, 202, 'googlephotos_album', ''),
(3026, 211, '_bbp_forum_id', '209'),
(3027, 211, '_bbp_topic_id', '211'),
(3028, 211, '_bbp_author_ip', '10.155.7.35'),
(3029, 211, '_bbp_last_active_id', '211'),
(3030, 211, '_bbp_last_active_time', '2014-09-22 15:11:13'),
(3031, 211, '_bbp_reply_count', '0'),
(3032, 211, '_bbp_reply_count_hidden', '0'),
(3033, 211, '_bbp_voice_count', '1'),
(3034, 211, '_bbp_activity_id', '40'),
(3035, 364, '_edit_last', '1'),
(3036, 364, 'picasa_album', ''),
(3037, 364, 'googlephotos_album', ''),
(3038, 364, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:2";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:4:"true";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3039, 364, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3040, 364, 'slides', 'a:2:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:5:"pablo";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"366";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"pablo (1)";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"365";}}'),
(3041, 456, '_edit_last', '1'),
(3042, 456, 'picasa_album', ''),
(3043, 456, 'googlephotos_album', ''),
(3044, 456, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:2";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:5:"false";s:15:"hideDescription";s:5:"false";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:4:"true";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3045, 456, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3046, 456, 'slides', 'a:4:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"matesman";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:499:"https://aplicacions.ensenyament.gencat.cat/pls/soloas/pk_for_mod_ins.p_for_exhaustiu_activitat?p_header=Selecci%F3^pk_for_mod_ins.p_for_form_cons_act?p_excloure_crp_rec=T*Llista%20d%27activitats^pk_for_mod_ins.p_for_cons_activitats?p_crp=A13%26p_crp_txt=Vall%E8s%20Oriental%20I.%20Granollers%26p_totes=S%26p_inici=1%26p_excloure_crp_rec=T*Detall%20d%27activitat^pk_for_mod_ins.p_for_detall_activitat?p_codi=A130101A13%26p_curs=2015-2016%26p_es_inscr=S&p_codi=A130101A13&p_curs=2015-2016&p_es_inscr=S";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1238";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:11:"scratchdaty";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:27:"http://day.scratch.mit.edu/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1240";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:10:"nodesxarxa";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:27:"http://agora.xtec.cat/nodes";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1241";}i:4;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:11:"Eduhackaton";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:42:"Jornada de cocreació educativa (20.02.16)";s:3:"url";s:33:"http://blocs.xtec.cat/eduhackaton";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"460";}}'),
(3065, 647, '_edit_last', '1'),
(3066, 647, 'picasa_album', 'https://picasaweb.google.com/data/feed/base/user/109713929054540431255/albumid/6221832513744834993?alt=rss&kind=photo&hl=es'),
(3067, 647, 'googlephotos_album', ''),
(3068, 647, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:2";s:6:"height";s:3:"300";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:4:"true";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:4:"true";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3069, 647, 'styleSettings', 'a:1:{s:5:"style";s:46:"slideshow-jquery-image-gallery-custom-styles_2";}'),
(3070, 647, 'slides', 'a:0:{}'),
(3094, 1077, '_menu_item_type', 'post_type'),
(3095, 1077, '_menu_item_menu_item_parent', '0'),
(3096, 1077, '_menu_item_object_id', '6'),
(3097, 1077, '_menu_item_object', 'page'),
(3098, 1077, '_menu_item_target', ''),
(3099, 1077, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3100, 1077, '_menu_item_xfn', ''),
(3101, 1077, '_menu_item_url', ''),
(3102, 1078, '_menu_item_type', 'post_type'),
(3103, 1078, '_menu_item_menu_item_parent', '0'),
(3104, 1078, '_menu_item_object_id', '16'),
(3105, 1078, '_menu_item_object', 'page'),
(3106, 1078, '_menu_item_target', ''),
(3107, 1078, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3108, 1078, '_menu_item_xfn', ''),
(3109, 1078, '_menu_item_url', ''),
(3110, 1079, '_menu_item_type', 'post_type'),
(3111, 1079, '_menu_item_menu_item_parent', '1063'),
(3112, 1079, '_menu_item_object_id', '318'),
(3113, 1079, '_menu_item_object', 'page'),
(3114, 1079, '_menu_item_target', ''),
(3115, 1079, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3116, 1079, '_menu_item_xfn', ''),
(3117, 1079, '_menu_item_url', ''),
(3118, 1080, '_menu_item_type', 'post_type'),
(3119, 1080, '_menu_item_menu_item_parent', '1063'),
(3120, 1080, '_menu_item_object_id', '306'),
(3121, 1080, '_menu_item_object', 'page'),
(3122, 1080, '_menu_item_target', ''),
(3123, 1080, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3124, 1080, '_menu_item_xfn', ''),
(3125, 1080, '_menu_item_url', ''),
(3174, 1087, '_menu_item_type', 'post_type'),
(3175, 1087, '_menu_item_menu_item_parent', '1063'),
(3176, 1087, '_menu_item_object_id', '608'),
(3177, 1087, '_menu_item_object', 'page'),
(3178, 1087, '_menu_item_target', ''),
(3179, 1087, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3180, 1087, '_menu_item_xfn', ''),
(3181, 1087, '_menu_item_url', ''),
(3182, 1088, '_menu_item_type', 'post_type'),
(3183, 1088, '_menu_item_menu_item_parent', '1063'),
(3184, 1088, '_menu_item_object_id', '797'),
(3185, 1088, '_menu_item_object', 'page'),
(3186, 1088, '_menu_item_target', ''),
(3187, 1088, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3188, 1088, '_menu_item_xfn', ''),
(3189, 1088, '_menu_item_url', ''),
(3204, 306, '_edit_lock', '1464689093:1'),
(3228, 1038, '_edit_lock', '1474447198:2'),
(3231, 60, 'gce_paging_widget', '1'),
(3232, 60, 'gce_widget_paging_interval', '604800'),
(3233, 60, 'gce_paging', ''),
(3275, 1120, '_bbp_reply_count', '0'),
(3276, 1120, '_bbp_topic_count', '0'),
(3277, 1120, '_bbp_topic_count_hidden', '0'),
(3278, 1120, '_bbp_total_reply_count', '0'),
(3279, 1120, '_bbp_total_topic_count', '0'),
(3280, 1120, '_bbp_last_topic_id', '0'),
(3281, 1120, '_bbp_last_reply_id', '0'),
(3282, 1120, '_bbp_last_active_id', '0'),
(3283, 1120, '_bbp_last_active_time', '0'),
(3284, 1120, '_bbp_forum_subforum_count', '0'),
(3285, 1120, '_bbp_group_ids', 'a:0:{}'),
(3304, 1133, '_wp_attached_file', '2015/11/nodesweb.png'),
(3305, 1133, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:601;s:6:"height";i:420;s:4:"file";s:20:"2015/11/nodesweb.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"nodesweb-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"nodesweb-300x210.png";s:5:"width";i:300;s:6:"height";i:210;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"nodesweb-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"nodesweb-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3317, 1140, '_wp_attached_file', '2015/11/semtac.png'),
(3318, 1140, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:160;s:6:"height";i:212;s:4:"file";s:18:"2015/11/semtac.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"semtac-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"semtac-160x150.png";s:5:"width";i:160;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3319, 1140, '_edit_lock', '1449128709:2'),
(3339, 1147, '_bbp_reply_count', '1'),
(3340, 1147, '_bbp_topic_count', '1'),
(3341, 1147, '_bbp_topic_count_hidden', '2'),
(3342, 1147, '_bbp_total_reply_count', '1'),
(3343, 1147, '_bbp_total_topic_count', '1'),
(3344, 1147, '_bbp_last_topic_id', '1160'),
(3345, 1147, '_bbp_last_reply_id', '1160'),
(3346, 1147, '_bbp_last_active_id', '1160'),
(3347, 1147, '_bbp_last_active_time', '2015-11-30 18:16:41'),
(3348, 1147, '_bbp_forum_subforum_count', '0'),
(3349, 1147, '_bbp_group_ids', 'a:1:{i:0;i:21;}'),
(3384, 1156, '_bbp_forum_id', '1147'),
(3385, 1156, '_bbp_topic_id', '1156'),
(3386, 1156, '_bbp_author_ip', '10.155.7.35'),
(3387, 1156, '_bbp_last_active_id', '1156'),
(3388, 1156, '_bbp_last_active_time', '2015-11-30 18:04:03'),
(3389, 1156, '_bbp_reply_count', '0'),
(3390, 1156, '_bbp_reply_count_hidden', '0'),
(3391, 1156, '_bbp_voice_count', '1'),
(3392, 1156, '_bbp_activity_id', '66'),
(3393, 1157, '_bbp_forum_id', '1147'),
(3394, 1157, '_bbp_topic_id', '1157'),
(3395, 1157, '_bbp_author_ip', '10.155.7.35'),
(3396, 1157, '_bbp_last_active_id', '1157'),
(3397, 1157, '_bbp_last_active_time', '2015-11-30 18:14:32'),
(3398, 1157, '_bbp_reply_count', '0'),
(3399, 1157, '_bbp_reply_count_hidden', '1'),
(3400, 1157, '_bbp_voice_count', '1'),
(3401, 1157, '_bbp_activity_id', '67'),
(3402, 1158, '_wp_attached_file', '2015/11/4026203944800.jpg'),
(3403, 1158, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:500;s:6:"height";i:500;s:4:"file";s:25:"2015/11/4026203944800.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"4026203944800-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"4026203944800-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"4026203944800-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"4026203944800-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3407, 1157, '_bbp_last_reply_id', '1159'),
(3409, 1160, '_bbp_forum_id', '1147'),
(3410, 1160, '_bbp_topic_id', '1160'),
(3411, 1160, '_bbp_author_ip', '10.155.7.35'),
(3412, 1160, '_bbp_last_active_id', '1170'),
(3413, 1160, '_bbp_last_active_time', '2015-11-30 19:06:26'),
(3414, 1160, '_bbp_reply_count', '1'),
(3415, 1160, '_bbp_reply_count_hidden', '0'),
(3416, 1160, '_bbp_voice_count', '1'),
(3417, 1160, '_bbp_activity_id', '70'),
(3418, 1161, '_bbp_reply_count', '0'),
(3419, 1161, '_bbp_topic_count', '0'),
(3420, 1161, '_bbp_topic_count_hidden', '0'),
(3421, 1161, '_bbp_total_reply_count', '0'),
(3422, 1161, '_bbp_total_topic_count', '0'),
(3423, 1161, '_bbp_last_topic_id', '0'),
(3424, 1161, '_bbp_last_reply_id', '0'),
(3425, 1161, '_bbp_last_active_id', '0'),
(3426, 1161, '_bbp_last_active_time', '0'),
(3427, 1161, '_bbp_forum_subforum_count', '0'),
(3428, 1161, '_bbp_group_ids', 'a:1:{i:0;i:22;}'),
(3429, 1162, '_bbp_reply_count', '0'),
(3430, 1162, '_bbp_topic_count', '0'),
(3431, 1162, '_bbp_topic_count_hidden', '0'),
(3432, 1162, '_bbp_total_reply_count', '0'),
(3433, 1162, '_bbp_total_topic_count', '0'),
(3434, 1162, '_bbp_last_topic_id', '0'),
(3435, 1162, '_bbp_last_reply_id', '0'),
(3436, 1162, '_bbp_last_active_id', '0'),
(3437, 1162, '_bbp_last_active_time', '0'),
(3438, 1162, '_bbp_forum_subforum_count', '0'),
(3439, 1162, '_bbp_group_ids', 'a:1:{i:0;i:23;}'),
(3440, 1163, '_bbp_reply_count', '0'),
(3441, 1163, '_bbp_topic_count', '0'),
(3442, 1163, '_bbp_topic_count_hidden', '0'),
(3443, 1163, '_bbp_total_reply_count', '0'),
(3444, 1163, '_bbp_total_topic_count', '0'),
(3445, 1163, '_bbp_last_topic_id', '0'),
(3446, 1163, '_bbp_last_reply_id', '0'),
(3447, 1163, '_bbp_last_active_id', '0'),
(3448, 1163, '_bbp_last_active_time', '0'),
(3449, 1163, '_bbp_forum_subforum_count', '0'),
(3450, 1163, '_bbp_group_ids', 'a:1:{i:0;i:24;}'),
(3451, 1164, '_bbp_reply_count', '0'),
(3452, 1164, '_bbp_topic_count', '0'),
(3453, 1164, '_bbp_topic_count_hidden', '0'),
(3454, 1164, '_bbp_total_reply_count', '0'),
(3455, 1164, '_bbp_total_topic_count', '0'),
(3456, 1164, '_bbp_last_topic_id', '0'),
(3457, 1164, '_bbp_last_reply_id', '0'),
(3458, 1164, '_bbp_last_active_id', '0'),
(3459, 1164, '_bbp_last_active_time', '0'),
(3460, 1164, '_bbp_forum_subforum_count', '0'),
(3461, 1164, '_bbp_group_ids', 'a:1:{i:0;i:25;}'),
(3462, 1165, '_bbp_reply_count', '0'),
(3463, 1165, '_bbp_topic_count', '0'),
(3464, 1165, '_bbp_topic_count_hidden', '0'),
(3465, 1165, '_bbp_total_reply_count', '0'),
(3466, 1165, '_bbp_total_topic_count', '0'),
(3467, 1165, '_bbp_last_topic_id', '0'),
(3468, 1165, '_bbp_last_reply_id', '0'),
(3469, 1165, '_bbp_last_active_id', '0'),
(3470, 1165, '_bbp_last_active_time', '0'),
(3471, 1165, '_bbp_forum_subforum_count', '0'),
(3472, 1165, '_bbp_group_ids', 'a:1:{i:0;i:26;}'),
(3473, 1166, '_bbp_reply_count', '0'),
(3474, 1166, '_bbp_topic_count', '0'),
(3475, 1166, '_bbp_topic_count_hidden', '0'),
(3476, 1166, '_bbp_total_reply_count', '0'),
(3477, 1166, '_bbp_total_topic_count', '0'),
(3478, 1166, '_bbp_last_topic_id', '0'),
(3479, 1166, '_bbp_last_reply_id', '0'),
(3480, 1166, '_bbp_last_active_id', '0'),
(3481, 1166, '_bbp_last_active_time', '0'),
(3482, 1166, '_bbp_forum_subforum_count', '0'),
(3483, 1166, '_bbp_group_ids', 'a:1:{i:0;i:27;}'),
(3484, 1167, '_bbp_reply_count', '0'),
(3485, 1167, '_bbp_topic_count', '0'),
(3486, 1167, '_bbp_topic_count_hidden', '0'),
(3487, 1167, '_bbp_total_reply_count', '0'),
(3488, 1167, '_bbp_total_topic_count', '0'),
(3489, 1167, '_bbp_last_topic_id', '0'),
(3490, 1167, '_bbp_last_reply_id', '0'),
(3491, 1167, '_bbp_last_active_id', '0'),
(3492, 1167, '_bbp_last_active_time', '0'),
(3493, 1167, '_bbp_forum_subforum_count', '0'),
(3494, 1167, '_bbp_group_ids', 'a:1:{i:0;i:28;}'),
(3495, 1168, '_bbp_reply_count', '0'),
(3496, 1168, '_bbp_topic_count', '0'),
(3497, 1168, '_bbp_topic_count_hidden', '0'),
(3498, 1168, '_bbp_total_reply_count', '0'),
(3499, 1168, '_bbp_total_topic_count', '0'),
(3500, 1168, '_bbp_last_topic_id', '0'),
(3501, 1168, '_bbp_last_reply_id', '0'),
(3502, 1168, '_bbp_last_active_id', '0'),
(3503, 1168, '_bbp_last_active_time', '0'),
(3504, 1168, '_bbp_forum_subforum_count', '0'),
(3505, 1168, '_bbp_group_ids', 'a:0:{}'),
(3506, 1169, '_bbp_reply_count', '0'),
(3507, 1169, '_bbp_topic_count', '0'),
(3508, 1169, '_bbp_topic_count_hidden', '0'),
(3509, 1169, '_bbp_total_reply_count', '0'),
(3510, 1169, '_bbp_total_topic_count', '0'),
(3511, 1169, '_bbp_last_topic_id', '0'),
(3512, 1169, '_bbp_last_reply_id', '0'),
(3513, 1169, '_bbp_last_active_id', '0'),
(3514, 1169, '_bbp_last_active_time', '0'),
(3515, 1169, '_bbp_forum_subforum_count', '0'),
(3516, 1169, '_bbp_group_ids', 'a:1:{i:0;i:30;}'),
(3517, 1170, '_bbp_forum_id', '1147'),
(3518, 1170, '_bbp_topic_id', '1160'),
(3519, 1170, '_bbp_author_ip', '10.155.7.35'),
(3520, 1160, '_bbp_last_reply_id', '1170'),
(3521, 1170, '_bbp_activity_id', '79'),
(3537, 1194, '_wp_attached_file', '2015/12/biblioturu.png'),
(3538, 1194, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:382;s:6:"height";i:357;s:4:"file";s:22:"2015/12/biblioturu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"biblioturu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"biblioturu-300x280.png";s:5:"width";i:300;s:6:"height";i:280;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"biblioturu-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"biblioturu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3665, 1224, '_wp_attached_file', '2015/12/favicon.ico'),
(3666, 1225, '_wp_attached_file', '2015/12/SEAltPenedes.jpg'),
(3667, 1225, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:359;s:6:"height";i:269;s:4:"file";s:24:"2015/12/SEAltPenedes.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"SEAltPenedes-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"SEAltPenedes-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"SEAltPenedes-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"SEAltPenedes-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3684, 1236, '_wp_attached_file', '2015/12/semostra.png'),
(3685, 1236, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:512;s:4:"file";s:20:"2015/12/semostra.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"semostra-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"semostra-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:21:"semostra-1024x512.png";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"semostra-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"semostra-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3686, 1237, '_wp_attached_file', '2015/12/fulles_p.jpg'),
(3687, 1237, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:560;s:4:"file";s:20:"2015/12/fulles_p.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"fulles_p-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"fulles_p-300x164.jpg";s:5:"width";i:300;s:6:"height";i:164;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"fulles_p-1024x560.jpg";s:5:"width";i:1024;s:6:"height";i:560;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"fulles_p-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"fulles_p-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";d:4;s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T3i";s:7:"caption";s:0:"";s:17:"created_timestamp";i:1415245685;s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"55";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:6:"0.0125";s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3688, 456, '_edit_lock', '1448989057:1'),
(3689, 1238, '_wp_attached_file', '2015/12/matesman.png'),
(3690, 1238, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:512;s:4:"file";s:20:"2015/12/matesman.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"matesman-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"matesman-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:21:"matesman-1024x512.png";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"matesman-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"matesman-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3691, 1239, '_wp_attached_file', '2015/12/scratchday.png'),
(3692, 1239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:391;s:6:"height";i:188;s:4:"file";s:22:"2015/12/scratchday.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"scratchday-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"scratchday-300x144.png";s:5:"width";i:300;s:6:"height";i:144;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"scratchday-300x188.png";s:5:"width";i:300;s:6:"height";i:188;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"scratchday-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3693, 1240, '_wp_attached_file', '2015/12/scratchdaty.png'),
(3694, 1240, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:512;s:4:"file";s:23:"2015/12/scratchdaty.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"scratchdaty-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"scratchdaty-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:24:"scratchdaty-1024x512.png";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"scratchdaty-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"scratchdaty-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3695, 1241, '_wp_attached_file', '2015/12/nodesxarxa.png'),
(3696, 1241, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:512;s:4:"file";s:22:"2015/12/nodesxarxa.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"nodesxarxa-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"nodesxarxa-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:23:"nodesxarxa-1024x512.png";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"nodesxarxa-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"nodesxarxa-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3697, 1242, '_bbp_reply_count', '0'),
(3698, 1242, '_bbp_topic_count', '0'),
(3699, 1242, '_bbp_topic_count_hidden', '0'),
(3700, 1242, '_bbp_total_reply_count', '0'),
(3701, 1242, '_bbp_total_topic_count', '0'),
(3702, 1242, '_bbp_last_topic_id', '0'),
(3703, 1242, '_bbp_last_reply_id', '0'),
(3704, 1242, '_bbp_last_active_id', '0'),
(3705, 1242, '_bbp_last_active_time', '0'),
(3706, 1242, '_bbp_forum_subforum_count', '0'),
(3707, 1242, '_bbp_group_ids', 'a:1:{i:0;i:31;}'),
(3713, 1245, '_wp_attached_file', '2015/12/turunadal.jpg'),
(3714, 1245, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:736;s:6:"height";i:520;s:4:"file";s:21:"2015/12/turunadal.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"turunadal-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"turunadal-300x212.jpg";s:5:"width";i:300;s:6:"height";i:212;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"turunadal-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"turunadal-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3715, 1246, '_wp_attached_file', '2015/12/nadal.png'),
(3716, 1246, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:625;s:6:"height";i:430;s:4:"file";s:17:"2015/12/nadal.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"nadal-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"nadal-300x206.png";s:5:"width";i:300;s:6:"height";i:206;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"nadal-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"nadal-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3719, 1255, '_bbp_reply_count', '0'),
(3720, 1255, '_bbp_topic_count', '0'),
(3721, 1255, '_bbp_topic_count_hidden', '0'),
(3722, 1255, '_bbp_total_reply_count', '0'),
(3723, 1255, '_bbp_total_topic_count', '0'),
(3724, 1255, '_bbp_last_topic_id', '0'),
(3725, 1255, '_bbp_last_reply_id', '0'),
(3726, 1255, '_bbp_last_active_id', '0'),
(3727, 1255, '_bbp_last_active_time', '0'),
(3728, 1255, '_bbp_forum_subforum_count', '0'),
(3729, 1255, '_bbp_group_ids', 'a:0:{}'),
(3730, 1256, '_bbp_reply_count', '0'),
(3731, 1256, '_bbp_topic_count', '0'),
(3732, 1256, '_bbp_topic_count_hidden', '0'),
(3733, 1256, '_bbp_total_reply_count', '0'),
(3734, 1256, '_bbp_total_topic_count', '0'),
(3735, 1256, '_bbp_last_topic_id', '0'),
(3736, 1256, '_bbp_last_reply_id', '0'),
(3737, 1256, '_bbp_last_active_id', '0'),
(3738, 1256, '_bbp_last_active_time', '0'),
(3739, 1256, '_bbp_forum_subforum_count', '0'),
(3740, 1256, '_bbp_group_ids', 'a:1:{i:0;i:33;}'),
(3750, 1257, '_wp_attached_file', '2015/11/mapa.png'),
(3751, 1257, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:760;s:6:"height";i:477;s:4:"file";s:16:"2015/11/mapa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"mapa-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"mapa-300x188.png";s:5:"width";i:300;s:6:"height";i:188;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"mapa-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"mapa-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3755, 608, '_edit_lock', '1464689128:1'),
(3756, 797, '_edit_lock', '1464688709:1'),
(3757, 318, '_edit_lock', '1464689142:1'),
(4015, 5666, '_wp_attached_file', '2015/01/lecturadigital.png'),
(4016, 5666, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:520;s:6:"height";i:318;s:4:"file";s:26:"2015/01/lecturadigital.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"lecturadigital-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"lecturadigital-300x183.png";s:5:"width";i:300;s:6:"height";i:183;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"lecturadigital-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"lecturadigital-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4025, 5668, '_wp_attached_file', '2015/01/PFabra.png'),
(4026, 5668, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:520;s:6:"height";i:311;s:4:"file";s:18:"2015/01/PFabra.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"PFabra-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"PFabra-300x179.png";s:5:"width";i:300;s:6:"height";i:179;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"PFabra-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"PFabra-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4057, 6536, '_edit_last', '1'),
(4058, 6536, '_thumbnail_id', '8082'),
(4059, 6536, '_amaga_titol', ''),
(4060, 6536, '_amaga_metadata', ''),
(4061, 6536, '_bloc_html', ''),
(4062, 6536, '_original_size', 'on'),
(4063, 6536, '_entry_icon', 'noicon'),
(4097, 8066, '_wp_attached_file', '2016/03/1apsc932015.jpg'),
(4098, 8066, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:600;s:6:"height";i:448;s:4:"file";s:23:"2016/03/1apsc932015.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"1apsc932015-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"1apsc932015-300x224.jpg";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"1apsc932015-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"1apsc932015-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4109, 6639, '_thumbnail_id', '8077'),
(4110, 6639, '_amaga_titol', ''),
(4111, 6639, '_amaga_metadata', ''),
(4112, 6639, '_bloc_html', ''),
(4113, 6639, '_original_size', 'on'),
(4114, 6639, '_entry_icon', 'noicon'),
(4170, 8071, '_wp_attached_file', '2016/02/saloensenyament2016-1024x299.png');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(4171, 8071, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:299;s:4:"file";s:40:"2016/02/saloensenyament2016-1024x299.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:40:"saloensenyament2016-1024x299-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:39:"saloensenyament2016-1024x299-300x88.png";s:5:"width";i:300;s:6:"height";i:88;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:41:"saloensenyament2016-1024x299-1024x299.png";s:5:"width";i:1024;s:6:"height";i:299;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:40:"saloensenyament2016-1024x299-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:40:"saloensenyament2016-1024x299-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4175, 8073, '_wp_attached_file', '2016/02/1alogo-itworld-edu-web.png'),
(4176, 8073, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:190;s:6:"height";i:137;s:4:"file";s:34:"2016/02/1alogo-itworld-edu-web.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"1alogo-itworld-edu-web-150x137.png";s:5:"width";i:150;s:6:"height";i:137;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4180, 8075, '_wp_attached_file', '2016/02/1congresbaixllob.jpg'),
(4181, 8075, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:594;s:6:"height";i:363;s:4:"file";s:28:"2016/02/1congresbaixllob.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"1congresbaixllob-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"1congresbaixllob-300x183.jpg";s:5:"width";i:300;s:6:"height";i:183;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"1congresbaixllob-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"1congresbaixllob-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:1;}}'),
(4185, 6639, '_edit_lock', '1459776790:1'),
(4186, 8077, '_wp_attached_file', '2016/01/1pedagogiasocialcongresgirona.jpg'),
(4187, 8077, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:943;s:6:"height";i:400;s:4:"file";s:41:"2016/01/1pedagogiasocialcongresgirona.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:41:"1pedagogiasocialcongresgirona-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:41:"1pedagogiasocialcongresgirona-300x127.jpg";s:5:"width";i:300;s:6:"height";i:127;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:41:"1pedagogiasocialcongresgirona-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:41:"1pedagogiasocialcongresgirona-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4188, 6639, '_edit_last', '1'),
(4192, 8079, '_wp_attached_file', '2016/01/1marcllenguesvives.jpg'),
(4193, 8079, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:658;s:6:"height";i:278;s:4:"file";s:30:"2016/01/1marcllenguesvives.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:30:"1marcllenguesvives-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:30:"1marcllenguesvives-300x127.jpg";s:5:"width";i:300;s:6:"height";i:127;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:30:"1marcllenguesvives-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:30:"1marcllenguesvives-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4203, 6536, '_edit_lock', '1459962567:1'),
(4204, 8082, '_wp_attached_file', '2016/01/curs-educació-fisica-incl.-1-1024x338.jpg'),
(4205, 8082, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:338;s:4:"file";s:50:"2016/01/curs-educació-fisica-incl.-1-1024x338.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:49:"curs-educació-fisica-incl.-1-1024x338-300x99.jpg";s:5:"width";i:300;s:6:"height";i:99;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:51:"curs-educació-fisica-incl.-1-1024x338-1024x338.jpg";s:5:"width";i:1024;s:6:"height";i:338;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4225, 8086, '_wp_attached_file', '2014/06/trobadainfantil.png'),
(4226, 8086, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:520;s:6:"height";i:280;s:4:"file";s:27:"2014/06/trobadainfantil.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"trobadainfantil-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"trobadainfantil-300x162.png";s:5:"width";i:300;s:6:"height";i:162;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"trobadainfantil-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"trobadainfantil-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4302, 6536, '_wp_old_slug', 'workshop-dinclusio-dinfants-amb-discapacitat-motriu-dorigen-neurologic-a-les-sessions-deducacio-fisica-a-lescola-ordinaria-2'),
(4307, 1157, '_bbp_pre_spammed_replies', 'a:1:{i:0;i:1159;}'),
(4308, 1157, '_bbp_spam_meta_status', 'publish'),
(4309, 1156, '_bbp_spam_meta_status', 'publish'),
(4329, 806, '_edit_lock', '1459512968:2'),
(4332, 797, 'sharing_disabled', '1'),
(4333, 8140, '_edit_lock', '1464689113:1'),
(4334, 8140, '_edit_last', '1'),
(4335, 8140, '_wp_page_template', 'default'),
(4336, 8140, '_template_layout', '2c-l'),
(4337, 8142, '_menu_item_type', 'post_type'),
(4338, 8142, '_menu_item_menu_item_parent', '1063'),
(4339, 8142, '_menu_item_object_id', '8140'),
(4340, 8142, '_menu_item_object', 'page'),
(4341, 8142, '_menu_item_target', ''),
(4342, 8142, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4343, 8142, '_menu_item_xfn', ''),
(4344, 8142, '_menu_item_url', ''),
(4382, 8140, 'sharing_disabled', '1'),
(4401, 8153, '_edit_lock', '1459761953:2'),
(4402, 8153, '_edit_last', '2'),
(4403, 8153, '_oembed_407039ed4f0db2de506ad238d5a7bc4b', '{{unknown}}'),
(4404, 8153, '_oembed_d31fc3f64cb788151931c15c48383f68', '{{unknown}}'),
(4405, 8153, '_wp_page_template', 'default'),
(4406, 8153, '_template_layout', '2c-l'),
(4416, 8156, '_wp_attached_file', '2016/04/creda.png'),
(4417, 8156, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:272;s:6:"height";i:206;s:4:"file";s:17:"2016/04/creda.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"creda-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"creda-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4418, 8157, '_wp_attached_file', '2016/04/creda1.png'),
(4419, 8157, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:219;s:6:"height";i:151;s:4:"file";s:18:"2016/04/creda1.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"creda1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"creda1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4429, 8159, '_menu_item_type', 'taxonomy'),
(4430, 8159, '_menu_item_menu_item_parent', '8375'),
(4431, 8159, '_menu_item_object_id', '266'),
(4432, 8159, '_menu_item_object', 'category'),
(4433, 8159, '_menu_item_target', ''),
(4434, 8159, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4435, 8159, '_menu_item_xfn', ''),
(4436, 8159, '_menu_item_url', ''),
(4447, 8161, '_menu_item_type', 'taxonomy'),
(4448, 8161, '_menu_item_menu_item_parent', '8375'),
(4449, 8161, '_menu_item_object_id', '267'),
(4450, 8161, '_menu_item_object', 'category'),
(4451, 8161, '_menu_item_target', ''),
(4452, 8161, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4453, 8161, '_menu_item_xfn', ''),
(4454, 8161, '_menu_item_url', ''),
(4456, 8162, '_menu_item_type', 'taxonomy'),
(4457, 8162, '_menu_item_menu_item_parent', '8375'),
(4458, 8162, '_menu_item_object_id', '269'),
(4459, 8162, '_menu_item_object', 'category'),
(4460, 8162, '_menu_item_target', ''),
(4461, 8162, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4462, 8162, '_menu_item_xfn', ''),
(4463, 8162, '_menu_item_url', ''),
(4465, 8163, '_menu_item_type', 'taxonomy'),
(4466, 8163, '_menu_item_menu_item_parent', '8375'),
(4467, 8163, '_menu_item_object_id', '268'),
(4468, 8163, '_menu_item_object', 'category'),
(4469, 8163, '_menu_item_target', ''),
(4470, 8163, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4471, 8163, '_menu_item_xfn', ''),
(4472, 8163, '_menu_item_url', ''),
(4488, 8166, '_menu_item_type', 'taxonomy'),
(4489, 8166, '_menu_item_menu_item_parent', '0'),
(4490, 8166, '_menu_item_object_id', '266'),
(4491, 8166, '_menu_item_object', 'category'),
(4492, 8166, '_menu_item_target', ''),
(4493, 8166, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4494, 8166, '_menu_item_xfn', ''),
(4495, 8166, '_menu_item_url', ''),
(4497, 8167, '_menu_item_type', 'taxonomy'),
(4498, 8167, '_menu_item_menu_item_parent', '0'),
(4499, 8167, '_menu_item_object_id', '267'),
(4500, 8167, '_menu_item_object', 'category'),
(4501, 8167, '_menu_item_target', ''),
(4502, 8167, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4503, 8167, '_menu_item_xfn', ''),
(4504, 8167, '_menu_item_url', ''),
(4506, 8168, '_menu_item_type', 'taxonomy'),
(4507, 8168, '_menu_item_menu_item_parent', '0'),
(4508, 8168, '_menu_item_object_id', '268'),
(4509, 8168, '_menu_item_object', 'category'),
(4510, 8168, '_menu_item_target', ''),
(4511, 8168, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4512, 8168, '_menu_item_xfn', ''),
(4513, 8168, '_menu_item_url', ''),
(4515, 8169, '_menu_item_type', 'taxonomy'),
(4516, 8169, '_menu_item_menu_item_parent', '0'),
(4517, 8169, '_menu_item_object_id', '269'),
(4518, 8169, '_menu_item_object', 'category'),
(4519, 8169, '_menu_item_target', ''),
(4520, 8169, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4521, 8169, '_menu_item_xfn', ''),
(4522, 8169, '_menu_item_url', ''),
(4533, 8171, '_edit_lock', '1459769306:1'),
(4534, 8171, '_edit_last', '1'),
(4535, 8171, '_wp_page_template', 'default'),
(4536, 8171, '_template_layout', '2c-l'),
(4537, 8171, 'sharing_disabled', '1'),
(4538, 8173, '_edit_lock', '1463491066:1'),
(4539, 8173, '_edit_last', '1'),
(4540, 8173, '_wp_page_template', 'default'),
(4541, 8173, '_template_layout', '2c-l'),
(4542, 8175, '_edit_lock', '1462872841:1'),
(4543, 8175, '_edit_last', '1'),
(4544, 8175, '_wp_page_template', 'default'),
(4545, 8175, '_template_layout', '2c-l'),
(4546, 8175, 'sharing_disabled', '1'),
(4547, 8179, '_menu_item_type', 'post_type'),
(4548, 8179, '_menu_item_menu_item_parent', '8236'),
(4549, 8179, '_menu_item_object_id', '8175'),
(4550, 8179, '_menu_item_object', 'page'),
(4551, 8179, '_menu_item_target', ''),
(4552, 8179, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4553, 8179, '_menu_item_xfn', ''),
(4554, 8179, '_menu_item_url', ''),
(4556, 8180, '_menu_item_type', 'post_type'),
(4557, 8180, '_menu_item_menu_item_parent', '8236'),
(4558, 8180, '_menu_item_object_id', '8173'),
(4559, 8180, '_menu_item_object', 'page'),
(4560, 8180, '_menu_item_target', ''),
(4561, 8180, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4562, 8180, '_menu_item_xfn', ''),
(4563, 8180, '_menu_item_url', ''),
(4574, 8173, 'sharing_disabled', '1'),
(4575, 8182, '_wp_attached_file', '2016/04/menorca_jmeler.jpg'),
(4576, 8182, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:450;s:6:"height";i:300;s:4:"file";s:26:"2016/04/menorca_jmeler.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"menorca_jmeler-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"menorca_jmeler-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"menorca_jmeler-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"menorca_jmeler-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4586, 8188, '_menu_item_type', 'post_type'),
(4587, 8188, '_menu_item_menu_item_parent', '0'),
(4588, 8188, '_menu_item_object_id', '8175'),
(4589, 8188, '_menu_item_object', 'page'),
(4590, 8188, '_menu_item_target', ''),
(4591, 8188, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4592, 8188, '_menu_item_xfn', ''),
(4593, 8188, '_menu_item_url', ''),
(4595, 8189, '_menu_item_type', 'post_type'),
(4596, 8189, '_menu_item_menu_item_parent', '0'),
(4597, 8189, '_menu_item_object_id', '8173'),
(4598, 8189, '_menu_item_object', 'page'),
(4599, 8189, '_menu_item_target', ''),
(4600, 8189, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4601, 8189, '_menu_item_xfn', ''),
(4602, 8189, '_menu_item_url', ''),
(4640, 8194, '_edit_lock', '1460014866:1'),
(4641, 8194, '_edit_last', '1'),
(4642, 8194, '_oembed_9efa345731fee1f2f4558f7829b5250e', '<iframe width="500" height="281" src="https://www.youtube.com/embed/RcOAlq3IxNM?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(4643, 8194, '_oembed_time_9efa345731fee1f2f4558f7829b5250e', '1460015007'),
(4644, 8195, '_wp_attached_file', '2016/04/Selecció_999181.png'),
(4645, 8195, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:439;s:6:"height";i:220;s:4:"file";s:28:"2016/04/Selecció_999181.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999181-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999181-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999181-300x220.png";s:5:"width";i:300;s:6:"height";i:220;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999181-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4646, 8194, '_thumbnail_id', '8195'),
(4649, 8194, '_amaga_titol', ''),
(4650, 8194, '_amaga_metadata', ''),
(4651, 8194, '_bloc_html', ''),
(4652, 8194, '_original_size', ''),
(4653, 8194, '_entry_icon', 'noicon'),
(4663, 8198, '_menu_item_type', 'post_type'),
(4664, 8198, '_menu_item_menu_item_parent', '8237'),
(4665, 8198, '_menu_item_object_id', '8194'),
(4666, 8198, '_menu_item_object', 'post'),
(4667, 8198, '_menu_item_target', ''),
(4668, 8198, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4669, 8198, '_menu_item_xfn', ''),
(4670, 8198, '_menu_item_url', ''),
(4676, 8200, '_edit_lock', '1459960876:1'),
(4677, 8200, '_edit_last', '1'),
(4678, 8201, '_wp_attached_file', '2016/04/Selecció_999182.png'),
(4679, 8201, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:492;s:6:"height";i:281;s:4:"file";s:28:"2016/04/Selecció_999182.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999182-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999182-300x171.png";s:5:"width";i:300;s:6:"height";i:171;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999182-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999182-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4680, 8200, '_thumbnail_id', '8201'),
(4683, 8200, '_amaga_titol', ''),
(4684, 8200, '_amaga_metadata', ''),
(4685, 8200, '_bloc_html', ''),
(4686, 8200, '_original_size', ''),
(4687, 8200, '_entry_icon', 'noicon'),
(4723, 8206, '_edit_lock', '1464342462:1'),
(4724, 8206, '_edit_last', '1'),
(4727, 8206, '_amaga_titol', ''),
(4728, 8206, '_amaga_metadata', ''),
(4729, 8206, '_bloc_html', ''),
(4730, 8206, '_original_size', ''),
(4731, 8206, '_entry_icon', 'noicon'),
(4732, 8208, '_menu_item_type', 'post_type'),
(4733, 8208, '_menu_item_menu_item_parent', '8237'),
(4734, 8208, '_menu_item_object_id', '8206'),
(4735, 8208, '_menu_item_object', 'post'),
(4736, 8208, '_menu_item_target', ''),
(4737, 8208, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4738, 8208, '_menu_item_xfn', ''),
(4739, 8208, '_menu_item_url', ''),
(4741, 8209, '_edit_lock', '1459962301:1'),
(4742, 8209, '_edit_last', '1'),
(4745, 8209, '_amaga_titol', ''),
(4746, 8209, '_amaga_metadata', ''),
(4747, 8209, '_bloc_html', ''),
(4748, 8209, '_original_size', ''),
(4749, 8209, '_entry_icon', 'noicon'),
(4754, 8213, '_menu_item_type', 'post_type'),
(4755, 8213, '_menu_item_menu_item_parent', '8237'),
(4756, 8213, '_menu_item_object_id', '8209'),
(4757, 8213, '_menu_item_object', 'post'),
(4758, 8213, '_menu_item_target', ''),
(4759, 8213, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4760, 8213, '_menu_item_xfn', ''),
(4761, 8213, '_menu_item_url', ''),
(4953, 8236, '_menu_item_type', 'taxonomy'),
(4954, 8236, '_menu_item_menu_item_parent', '0'),
(4955, 8236, '_menu_item_object_id', '271'),
(4956, 8236, '_menu_item_object', 'category'),
(4957, 8236, '_menu_item_target', ''),
(4958, 8236, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4959, 8236, '_menu_item_xfn', ''),
(4960, 8236, '_menu_item_url', ''),
(4962, 8237, '_menu_item_type', 'taxonomy'),
(4963, 8237, '_menu_item_menu_item_parent', '0'),
(4964, 8237, '_menu_item_object_id', '272'),
(4965, 8237, '_menu_item_object', 'category'),
(4966, 8237, '_menu_item_target', ''),
(4967, 8237, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4968, 8237, '_menu_item_xfn', ''),
(4969, 8237, '_menu_item_url', ''),
(4971, 8238, '_menu_item_type', 'taxonomy'),
(4972, 8238, '_menu_item_menu_item_parent', '0'),
(4973, 8238, '_menu_item_object_id', '264'),
(4974, 8238, '_menu_item_object', 'category'),
(4975, 8238, '_menu_item_target', ''),
(4976, 8238, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4977, 8238, '_menu_item_xfn', ''),
(4978, 8238, '_menu_item_url', ''),
(4980, 8239, '_edit_lock', '1459854145:1'),
(4981, 8239, '_edit_last', '1'),
(4982, 8240, '_wp_attached_file', '2016/04/f.png'),
(4983, 8240, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:558;s:6:"height";i:396;s:4:"file";s:13:"2016/04/f.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:13:"f-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:13:"f-300x213.png";s:5:"width";i:300;s:6:"height";i:213;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:13:"f-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:13:"f-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4984, 8239, '_thumbnail_id', '8240'),
(4987, 8239, '_amaga_titol', ''),
(4988, 8239, '_amaga_metadata', ''),
(4989, 8239, '_bloc_html', ''),
(4990, 8239, '_original_size', 'on'),
(4991, 8239, '_entry_icon', 'noicon'),
(4994, 8242, '_wp_attached_file', '2016/04/prof.png'),
(4995, 8242, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:300;s:4:"file";s:16:"2016/04/prof.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"prof-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"prof-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"prof-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"prof-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4996, 8242, '_edit_lock', '1459854285:1'),
(4997, 8242, '_edit_last', '1'),
(4998, 8243, '_wp_attached_file', '2016/04/tutoria.jpg'),
(4999, 8243, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:300;s:4:"file";s:19:"2016/04/tutoria.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"tutoria-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"tutoria-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"tutoria-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"tutoria-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5000, 8244, '_wp_attached_file', '2016/04/equipdirectiu.jpg'),
(5001, 8244, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:300;s:4:"file";s:25:"2016/04/equipdirectiu.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"equipdirectiu-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"equipdirectiu-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"equipdirectiu-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"equipdirectiu-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5002, 8245, '_edit_lock', '1459855337:1'),
(5003, 8245, '_edit_last', '1'),
(5004, 8246, '_wp_attached_file', '2016/04/logosonscatala.png'),
(5005, 8246, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:199;s:6:"height";i:104;s:4:"file";s:26:"2016/04/logosonscatala.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"logosonscatala-150x104.png";s:5:"width";i:150;s:6:"height";i:104;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5006, 8245, '_thumbnail_id', '8246'),
(5009, 8245, '_amaga_titol', ''),
(5010, 8245, '_amaga_metadata', ''),
(5011, 8245, '_bloc_html', ''),
(5012, 8245, '_original_size', 'on'),
(5013, 8245, '_entry_icon', 'noicon'),
(5016, 8248, '_wp_attached_file', '2016/04/nena.jpg'),
(5017, 8248, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:903;s:6:"height";i:768;s:4:"file";s:16:"2016/04/nena.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"nena-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"nena-300x255.jpg";s:5:"width";i:300;s:6:"height";i:255;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"nena-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"nena-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5018, 8249, '_wp_attached_file', '2016/04/Selecció_999185.png'),
(5019, 8249, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:620;s:6:"height";i:505;s:4:"file";s:28:"2016/04/Selecció_999185.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999185-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999185-300x244.png";s:5:"width";i:300;s:6:"height";i:244;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999185-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999185-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5020, 8250, '_wp_attached_file', '2016/04/Selecció_999184.png'),
(5021, 8250, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:391;s:6:"height";i:276;s:4:"file";s:28:"2016/04/Selecció_999184.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999184-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999184-300x212.png";s:5:"width";i:300;s:6:"height";i:212;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999184-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999184-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5022, 8251, '_wp_attached_file', '2016/04/Selecció_999183.png'),
(5023, 8251, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:658;s:6:"height";i:395;s:4:"file";s:28:"2016/04/Selecció_999183.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999183-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999183-300x180.png";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999183-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999183-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5033, 8253, '_oembed_27a4f63c76937790d5c9efb099c30244', '<iframe src="https://player.vimeo.com/video/63820597" width="500" height="281" frameborder="0" title="Paraules des del silenci" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),
(5034, 8253, '_oembed_time_27a4f63c76937790d5c9efb099c30244', '1462791906'),
(5035, 8253, '_edit_lock', '1462791764:1'),
(5036, 8253, '_edit_last', '1'),
(5037, 8254, '_wp_attached_file', '2016/04/Selecció_999186.png'),
(5038, 8254, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:490;s:6:"height";i:274;s:4:"file";s:28:"2016/04/Selecció_999186.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999186-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999186-300x168.png";s:5:"width";i:300;s:6:"height";i:168;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999186-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999186-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5039, 8253, '_thumbnail_id', '8254'),
(5042, 8253, '_amaga_titol', ''),
(5043, 8253, '_amaga_metadata', ''),
(5044, 8253, '_bloc_html', 'on'),
(5045, 8253, '_original_size', ''),
(5046, 8253, '_entry_icon', 'noicon'),
(5063, 8257, '_edit_lock', '1460475277:2'),
(5064, 8257, '_edit_last', '2'),
(5065, 8258, '_wp_attached_file', '2016/04/15.jpg'),
(5066, 8258, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:629;s:6:"height";i:192;s:4:"file";s:14:"2016/04/15.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:14:"15-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:13:"15-300x92.jpg";s:5:"width";i:300;s:6:"height";i:92;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:14:"15-300x192.jpg";s:5:"width";i:300;s:6:"height";i:192;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:14:"15-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5067, 8257, '_thumbnail_id', '8258'),
(5070, 8257, '_amaga_titol', ''),
(5071, 8257, '_amaga_metadata', ''),
(5072, 8257, '_bloc_html', ''),
(5073, 8257, '_original_size', ''),
(5074, 8257, '_entry_icon', 'noicon'),
(5077, 8260, '_edit_lock', '1462791786:1'),
(5078, 8260, '_edit_last', '1'),
(5081, 8260, '_amaga_titol', ''),
(5082, 8260, '_amaga_metadata', ''),
(5083, 8260, '_bloc_html', ''),
(5084, 8260, '_original_size', ''),
(5085, 8260, '_entry_icon', 'noicon'),
(5086, 8260, '_oembed_dbce0a3965cf94c50345a79f167f8f19', '{{unknown}}'),
(5087, 8262, '_wp_attached_file', '2016/04/Selecció_999187.png'),
(5088, 8262, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:416;s:6:"height";i:311;s:4:"file";s:28:"2016/04/Selecció_999187.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999187-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999187-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999187-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999187-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5089, 8260, '_thumbnail_id', '8262'),
(5092, 8260, '_oembed_63f60f4d51023200e6d3db12e141ed42', '{{unknown}}'),
(5097, 8264, '_edit_lock', '1459934766:1'),
(5098, 8264, '_edit_last', '1'),
(5101, 8264, '_amaga_titol', ''),
(5102, 8264, '_amaga_metadata', ''),
(5103, 8264, '_bloc_html', ''),
(5104, 8264, '_original_size', ''),
(5105, 8264, '_entry_icon', 'noicon'),
(5110, 8266, '_wp_attached_file', '2016/04/15-1.jpg'),
(5111, 8266, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:300;s:6:"height";i:252;s:4:"file";s:16:"2016/04/15-1.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"15-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"15-1-300x252.jpg";s:5:"width";i:300;s:6:"height";i:252;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"15-1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"15-1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5112, 8264, '_thumbnail_id', '8266'),
(5117, 8268, '_edit_lock', '1459935114:1'),
(5118, 8268, '_edit_last', '1'),
(5119, 8269, '_wp_attached_file', '2016/04/Selecció_999188.png'),
(5120, 8269, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:798;s:6:"height";i:281;s:4:"file";s:28:"2016/04/Selecció_999188.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999188-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999188-300x106.png";s:5:"width";i:300;s:6:"height";i:106;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999188-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999188-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5121, 8268, '_thumbnail_id', '8269'),
(5124, 8268, '_amaga_titol', ''),
(5125, 8268, '_amaga_metadata', ''),
(5126, 8268, '_bloc_html', ''),
(5127, 8268, '_original_size', ''),
(5128, 8268, '_entry_icon', 'noicon'),
(5133, 8268, 'sharing_disabled', '1'),
(5276, 8286, '_menu_item_type', 'taxonomy'),
(5277, 8286, '_menu_item_menu_item_parent', '8238'),
(5278, 8286, '_menu_item_object_id', '288'),
(5279, 8286, '_menu_item_object', 'category'),
(5280, 8286, '_menu_item_target', ''),
(5281, 8286, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5282, 8286, '_menu_item_xfn', ''),
(5283, 8286, '_menu_item_url', ''),
(5285, 8287, '_menu_item_type', 'taxonomy'),
(5286, 8287, '_menu_item_menu_item_parent', '0'),
(5287, 8287, '_menu_item_object_id', '288'),
(5288, 8287, '_menu_item_object', 'category'),
(5289, 8287, '_menu_item_target', ''),
(5290, 8287, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5291, 8287, '_menu_item_xfn', ''),
(5292, 8287, '_menu_item_url', ''),
(5294, 8288, '_edit_lock', '1460475215:2'),
(5295, 8288, '_edit_last', '2'),
(5296, 8289, '_wp_attached_file', '2016/04/Selecció_999189.png'),
(5297, 8289, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:536;s:6:"height";i:308;s:4:"file";s:28:"2016/04/Selecció_999189.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999189-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999189-300x172.png";s:5:"width";i:300;s:6:"height";i:172;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999189-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999189-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5298, 8288, '_thumbnail_id', '8289'),
(5301, 8288, '_amaga_titol', ''),
(5302, 8288, '_amaga_metadata', ''),
(5303, 8288, '_bloc_html', ''),
(5304, 8288, '_original_size', 'on'),
(5305, 8288, '_entry_icon', 'noicon'),
(5308, 8288, 'sharing_disabled', '1'),
(5313, 8291, '_wp_attached_file', '2016/04/Selecció_999190.png'),
(5314, 8291, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:635;s:6:"height";i:263;s:4:"file";s:28:"2016/04/Selecció_999190.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999190-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999190-300x124.png";s:5:"width";i:300;s:6:"height";i:124;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999190-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999190-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5315, 8291, '_edit_lock', '1459952525:1'),
(5316, 8291, '_edit_last', '1'),
(5317, 8292, '_oembed_051078fff8ab2be1ca4f92612629a1e8', '<iframe src="https://player.vimeo.com/video/42025032" width="500" height="400" frameborder="0" title="FRASE A 2 MANS" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),
(5318, 8292, '_oembed_time_051078fff8ab2be1ca4f92612629a1e8', '1459952762'),
(5319, 8292, '_edit_lock', '1459953398:1'),
(5320, 8293, '_wp_attached_file', '2016/04/lloro.jpg'),
(5321, 8293, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:528;s:6:"height";i:397;s:4:"file";s:17:"2016/04/lloro.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"lloro-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:17:"lloro-300x226.jpg";s:5:"width";i:300;s:6:"height";i:226;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"lloro-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"lloro-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5322, 8292, '_thumbnail_id', '8293'),
(5323, 8292, '_edit_last', '1'),
(5324, 8292, '_amaga_titol', ''),
(5325, 8292, '_amaga_metadata', ''),
(5326, 8292, '_bloc_html', ''),
(5327, 8292, '_original_size', ''),
(5328, 8292, '_entry_icon', 'noicon'),
(5331, 8295, '_edit_lock', '1459958163:1'),
(5332, 8295, '_edit_last', '1'),
(5333, 8296, '_wp_attached_file', '2016/04/frasellarga1.jpg'),
(5334, 8296, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:490;s:6:"height";i:146;s:4:"file";s:24:"2016/04/frasellarga1.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"frasellarga1-150x146.jpg";s:5:"width";i:150;s:6:"height";i:146;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"frasellarga1-300x89.jpg";s:5:"width";i:300;s:6:"height";i:89;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"frasellarga1-300x146.jpg";s:5:"width";i:300;s:6:"height";i:146;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"frasellarga1-200x146.jpg";s:5:"width";i:200;s:6:"height";i:146;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5335, 8295, '_thumbnail_id', '8296'),
(5338, 8295, '_amaga_titol', ''),
(5339, 8295, '_amaga_metadata', ''),
(5340, 8295, '_bloc_html', ''),
(5341, 8295, '_original_size', ''),
(5342, 8295, '_entry_icon', 'noicon'),
(5345, 8299, '_oembed_99879c47d720647c426ca4f6f7a0106f', '{{unknown}}'),
(5346, 8299, '_oembed_ecf023cb423e97132760f0245c8f4b3a', '{{unknown}}'),
(5347, 8299, '_edit_lock', '1459958131:1'),
(5348, 8299, '_edit_last', '1'),
(5351, 8299, '_amaga_titol', ''),
(5352, 8299, '_amaga_metadata', ''),
(5353, 8299, '_bloc_html', 'on'),
(5354, 8299, '_original_size', ''),
(5355, 8299, '_entry_icon', 'noicon'),
(5366, 8301, '_edit_lock', '1459953684:1'),
(5367, 8301, '_edit_last', '1'),
(5368, 8302, '_wp_attached_file', '2016/04/rimes2.jpg'),
(5369, 8302, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:526;s:6:"height";i:139;s:4:"file";s:18:"2016/04/rimes2.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"rimes2-150x139.jpg";s:5:"width";i:150;s:6:"height";i:139;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:17:"rimes2-300x79.jpg";s:5:"width";i:300;s:6:"height";i:79;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"rimes2-300x139.jpg";s:5:"width";i:300;s:6:"height";i:139;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"rimes2-200x139.jpg";s:5:"width";i:200;s:6:"height";i:139;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5370, 8301, '_thumbnail_id', '8302'),
(5371, 8303, '_wp_attached_file', '2016/04/rimes.jpg'),
(5372, 8303, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:531;s:6:"height";i:381;s:4:"file";s:17:"2016/04/rimes.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"rimes-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:17:"rimes-300x215.jpg";s:5:"width";i:300;s:6:"height";i:215;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"rimes-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"rimes-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5375, 8301, '_amaga_titol', ''),
(5376, 8301, '_amaga_metadata', ''),
(5377, 8301, '_bloc_html', ''),
(5378, 8301, '_original_size', ''),
(5379, 8301, '_entry_icon', 'noicon'),
(5384, 8306, '_edit_lock', '1459953834:1'),
(5385, 8306, '_edit_last', '1'),
(5386, 8307, '_wp_attached_file', '2016/04/Confeti-lecto.jpg'),
(5387, 8307, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:960;s:6:"height";i:720;s:4:"file";s:25:"2016/04/Confeti-lecto.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Confeti-lecto-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"Confeti-lecto-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Confeti-lecto-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Confeti-lecto-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5388, 8306, '_thumbnail_id', '8307'),
(5391, 8306, '_amaga_titol', ''),
(5392, 8306, '_amaga_metadata', ''),
(5393, 8306, '_bloc_html', ''),
(5394, 8306, '_original_size', 'on'),
(5395, 8306, '_entry_icon', 'noicon'),
(5402, 8309, '_oembed_afb3a119fb7b611bb544efa688c2c1f4', '{{unknown}}'),
(5403, 8309, '_oembed_a177281ca4bb4dbf9153a3b470cc08cc', '{{unknown}}'),
(5404, 8309, '_edit_lock', '1460474916:2'),
(5405, 8309, '_edit_last', '2'),
(5406, 8310, '_wp_attached_file', '2016/04/salutacions_presentacions_LSC.jpg'),
(5407, 8310, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1500;s:6:"height";i:1028;s:4:"file";s:41:"2016/04/salutacions_presentacions_LSC.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:41:"salutacions_presentacions_LSC-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:41:"salutacions_presentacions_LSC-300x206.jpg";s:5:"width";i:300;s:6:"height";i:206;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:42:"salutacions_presentacions_LSC-1024x702.jpg";s:5:"width";i:1024;s:6:"height";i:702;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:41:"salutacions_presentacions_LSC-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:41:"salutacions_presentacions_LSC-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:1;}}'),
(5408, 8309, '_thumbnail_id', '8310'),
(5411, 8309, '_amaga_titol', ''),
(5412, 8309, '_amaga_metadata', ''),
(5413, 8309, '_bloc_html', ''),
(5414, 8309, '_original_size', ''),
(5415, 8309, '_entry_icon', 'noicon'),
(5422, 8312, '_wp_attached_file', '2016/04/rr.jpg'),
(5423, 8312, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:720;s:6:"height";i:527;s:4:"file";s:14:"2016/04/rr.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:14:"rr-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:14:"rr-300x220.jpg";s:5:"width";i:300;s:6:"height";i:220;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:14:"rr-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:14:"rr-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5424, 8312, '_edit_lock', '1459954572:1');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(5425, 8313, '_wp_attached_file', '2016/04/Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233.png'),
(5426, 8313, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:300;s:6:"height";i:233;s:4:"file";s:65:"2016/04/Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:65:"Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:65:"Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233-300x233.png";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:65:"Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233-300x233.png";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:65:"Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5427, 8313, '_edit_lock', '1459954827:1'),
(5428, 8314, '_wp_attached_file', '2016/04/Selecció_999192.png'),
(5429, 8314, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:308;s:6:"height";i:319;s:4:"file";s:28:"2016/04/Selecció_999192.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999192-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999192-290x300.png";s:5:"width";i:290;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999192-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999192-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5430, 8314, '_edit_lock', '1459954993:1'),
(5431, 8315, '_wp_attached_file', '2016/04/Selecció_999193.png'),
(5432, 8315, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:673;s:6:"height";i:397;s:4:"file";s:28:"2016/04/Selecció_999193.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999193-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999193-300x177.png";s:5:"width";i:300;s:6:"height";i:177;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999193-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999193-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5433, 8315, '_edit_lock', '1459954992:1'),
(5434, 8316, '_edit_lock', '1459959941:1'),
(5435, 8316, '_edit_last', '1'),
(5436, 8317, '_wp_attached_file', '2016/04/CONTE06.jpg'),
(5437, 8317, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:705;s:6:"height";i:497;s:4:"file";s:19:"2016/04/CONTE06.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"CONTE06-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"CONTE06-300x211.jpg";s:5:"width";i:300;s:6:"height";i:211;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"CONTE06-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"CONTE06-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5438, 8318, '_wp_attached_file', '2016/04/Selecció_999195.png'),
(5439, 8318, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:396;s:6:"height";i:187;s:4:"file";s:28:"2016/04/Selecció_999195.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999195-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999195-300x142.png";s:5:"width";i:300;s:6:"height";i:142;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999195-300x187.png";s:5:"width";i:300;s:6:"height";i:187;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999195-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5440, 8316, '_thumbnail_id', '8318'),
(5443, 8316, '_amaga_titol', ''),
(5444, 8316, '_amaga_metadata', ''),
(5445, 8316, '_bloc_html', ''),
(5446, 8316, '_original_size', ''),
(5447, 8316, '_entry_icon', 'noicon'),
(5448, 8320, '_edit_lock', '1459955557:1'),
(5449, 8320, '_edit_last', '1'),
(5450, 8321, '_wp_attached_file', '2016/04/Selecció_999194.png'),
(5451, 8321, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:402;s:6:"height";i:114;s:4:"file";s:28:"2016/04/Selecció_999194.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999194-150x114.png";s:5:"width";i:150;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"Selecció_999194-300x85.png";s:5:"width";i:300;s:6:"height";i:85;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999194-300x114.png";s:5:"width";i:300;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999194-200x114.png";s:5:"width";i:200;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5452, 8320, '_thumbnail_id', '8321'),
(5455, 8320, '_amaga_titol', ''),
(5456, 8320, '_amaga_metadata', ''),
(5457, 8320, '_bloc_html', ''),
(5458, 8320, '_original_size', ''),
(5459, 8320, '_entry_icon', 'noicon'),
(5468, 8325, '_wp_attached_file', '2016/04/Selecció_999197.png'),
(5469, 8325, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:632;s:6:"height";i:260;s:4:"file";s:28:"2016/04/Selecció_999197.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999197-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999197-300x123.png";s:5:"width";i:300;s:6:"height";i:123;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999197-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999197-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5470, 8325, '_edit_lock', '1459956107:1'),
(5471, 8326, '_thumbnail_id', '8325'),
(5472, 8326, '_edit_lock', '1459956198:1'),
(5473, 8326, '_edit_last', '1'),
(5476, 8326, '_amaga_titol', ''),
(5477, 8326, '_amaga_metadata', ''),
(5478, 8326, '_bloc_html', ''),
(5479, 8326, '_original_size', 'on'),
(5480, 8326, '_entry_icon', 'noicon'),
(5483, 8328, '_wp_attached_file', '2016/04/Selecció_999199.png'),
(5484, 8328, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:237;s:6:"height";i:111;s:4:"file";s:28:"2016/04/Selecció_999199.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999199-150x111.png";s:5:"width";i:150;s:6:"height";i:111;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999199-200x111.png";s:5:"width";i:200;s:6:"height";i:111;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5485, 8329, '_edit_lock', '1459957513:1'),
(5486, 8329, '_edit_last', '1'),
(5487, 8330, '_wp_attached_file', '2016/04/Selecció_999200.png'),
(5488, 8330, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:266;s:6:"height";i:213;s:4:"file";s:28:"2016/04/Selecció_999200.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999200-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999200-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5489, 8329, '_thumbnail_id', '8330'),
(5492, 8329, '_amaga_titol', ''),
(5493, 8329, '_amaga_metadata', ''),
(5494, 8329, '_bloc_html', ''),
(5495, 8329, '_original_size', ''),
(5496, 8329, '_entry_icon', 'noicon'),
(5499, 8334, '_wp_attached_file', '2016/04/Selecció_999202.png'),
(5500, 8334, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:509;s:6:"height";i:353;s:4:"file";s:28:"2016/04/Selecció_999202.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999202-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999202-300x208.png";s:5:"width";i:300;s:6:"height";i:208;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999202-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999202-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5501, 8333, '_edit_lock', '1459957334:1'),
(5502, 8333, '_edit_last', '1'),
(5505, 8333, '_amaga_titol', ''),
(5506, 8333, '_amaga_metadata', ''),
(5507, 8333, '_bloc_html', ''),
(5508, 8333, '_original_size', ''),
(5509, 8333, '_entry_icon', 'noicon'),
(5512, 8333, '_thumbnail_id', '8334'),
(5517, 8336, '_edit_lock', '1459959551:1'),
(5518, 8336, '_edit_last', '1'),
(5521, 8336, '_amaga_titol', ''),
(5522, 8336, '_amaga_metadata', ''),
(5523, 8336, '_bloc_html', ''),
(5524, 8336, '_original_size', 'on'),
(5525, 8336, '_entry_icon', 'noicon'),
(5526, 8338, '_wp_attached_file', '2016/04/la_rateta.gif'),
(5527, 8338, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:250;s:6:"height";i:250;s:4:"file";s:21:"2016/04/la_rateta.gif";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"la_rateta-150x150.gif";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/gif";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"la_rateta-250x250.gif";s:5:"width";i:250;s:6:"height";i:250;s:9:"mime-type";s:9:"image/gif";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"la_rateta-200x150.gif";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/gif";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5528, 8336, '_thumbnail_id', '8338'),
(5569, 8351, '_wp_attached_file', '2016/04/Selecció_999203.png'),
(5570, 8351, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:476;s:6:"height";i:223;s:4:"file";s:28:"2016/04/Selecció_999203.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999203-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999203-300x141.png";s:5:"width";i:300;s:6:"height";i:141;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999203-300x223.png";s:5:"width";i:300;s:6:"height";i:223;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999203-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5571, 8352, '_thumbnail_id', '8351'),
(5572, 8352, '_edit_lock', '1459958116:1'),
(5573, 8352, '_edit_last', '1'),
(5576, 8352, '_amaga_titol', ''),
(5577, 8352, '_amaga_metadata', ''),
(5578, 8352, '_bloc_html', ''),
(5579, 8352, '_original_size', 'on'),
(5580, 8352, '_entry_icon', 'noicon'),
(5597, 8360, '_wp_attached_file', '2016/04/Lámina-infantil.jpg'),
(5598, 8360, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1600;s:6:"height";i:1195;s:4:"file";s:28:"2016/04/Lámina-infantil.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Lámina-infantil-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"Lámina-infantil-300x224.jpg";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:29:"Lámina-infantil-1024x765.jpg";s:5:"width";i:1024;s:6:"height";i:765;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Lámina-infantil-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Lámina-infantil-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5599, 8359, '_thumbnail_id', '8360'),
(5600, 8359, '_edit_lock', '1462791223:1'),
(5601, 8359, '_edit_last', '1'),
(5604, 8359, '_amaga_titol', ''),
(5605, 8359, '_amaga_metadata', ''),
(5606, 8359, '_bloc_html', ''),
(5607, 8359, '_original_size', ''),
(5608, 8359, '_entry_icon', 'noicon'),
(5611, 8362, '_edit_lock', '1462791732:1'),
(5612, 8362, '_edit_last', '1'),
(5613, 8363, '_wp_attached_file', '2016/04/Selecció_999204.png'),
(5614, 8363, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:529;s:6:"height";i:526;s:4:"file";s:28:"2016/04/Selecció_999204.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999204-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999204-300x298.png";s:5:"width";i:300;s:6:"height";i:298;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999204-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999204-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5615, 8362, '_thumbnail_id', '8363'),
(5618, 8362, '_amaga_titol', ''),
(5619, 8362, '_amaga_metadata', ''),
(5620, 8362, '_bloc_html', ''),
(5621, 8362, '_original_size', ''),
(5622, 8362, '_entry_icon', 'noicon'),
(5627, 8366, '_edit_lock', '1459959483:1'),
(5628, 8366, '_edit_last', '1'),
(5629, 8367, '_wp_attached_file', '2016/04/pol_02temps.jpg'),
(5630, 8367, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:550;s:6:"height";i:408;s:4:"file";s:23:"2016/04/pol_02temps.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"pol_02temps-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"pol_02temps-300x223.jpg";s:5:"width";i:300;s:6:"height";i:223;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"pol_02temps-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"pol_02temps-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5631, 8366, '_thumbnail_id', '8367'),
(5634, 8366, '_amaga_titol', ''),
(5635, 8366, '_amaga_metadata', ''),
(5636, 8366, '_bloc_html', ''),
(5637, 8366, '_original_size', ''),
(5638, 8366, '_entry_icon', 'noicon'),
(5670, 8372, '_wp_attached_file', '2016/04/Selecció_999205.png'),
(5671, 8372, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:260;s:6:"height";i:184;s:4:"file";s:28:"2016/04/Selecció_999205.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999205-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999205-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5672, 8372, '_edit_lock', '1459961353:1'),
(5693, 8375, '_menu_item_type', 'taxonomy'),
(5694, 8375, '_menu_item_menu_item_parent', '8238'),
(5695, 8375, '_menu_item_object_id', '281'),
(5696, 8375, '_menu_item_object', 'category'),
(5697, 8375, '_menu_item_target', ''),
(5698, 8375, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5699, 8375, '_menu_item_xfn', ''),
(5700, 8375, '_menu_item_url', ''),
(5704, 8376, '_menu_item_type', 'taxonomy'),
(5705, 8376, '_menu_item_menu_item_parent', '0'),
(5706, 8376, '_menu_item_object_id', '281'),
(5707, 8376, '_menu_item_object', 'category'),
(5708, 8376, '_menu_item_target', ''),
(5709, 8376, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5710, 8376, '_menu_item_xfn', ''),
(5711, 8376, '_menu_item_url', ''),
(5713, 8377, '_edit_lock', '1464342497:1'),
(5714, 8377, '_edit_last', '1'),
(5717, 8377, '_amaga_titol', ''),
(5718, 8377, '_amaga_metadata', ''),
(5719, 8377, '_bloc_html', ''),
(5720, 8377, '_original_size', ''),
(5721, 8377, '_entry_icon', 'noicon'),
(5722, 8377, '_thumbnail_id', '8195'),
(5725, 8379, '_wp_attached_file', '2016/04/1EWG.png'),
(5726, 8379, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:600;s:4:"file";s:16:"2016/04/1EWG.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"1EWG-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"1EWG-300x176.png";s:5:"width";i:300;s:6:"height";i:176;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:17:"1EWG-1024x600.png";s:5:"width";i:1024;s:6:"height";i:600;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"1EWG-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"1EWG-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5727, 8209, '_thumbnail_id', '8379'),
(5730, 8206, '_thumbnail_id', '32'),
(5735, 1028, '_edit_lock', '1459962536:1'),
(5740, 8383, '_wp_attached_file', '2016/04/kids-tablet-brands.jpeg'),
(5741, 8383, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:600;s:6:"height";i:316;s:4:"file";s:31:"2016/04/kids-tablet-brands.jpeg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:31:"kids-tablet-brands-150x150.jpeg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:31:"kids-tablet-brands-300x158.jpeg";s:5:"width";i:300;s:6:"height";i:158;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:31:"kids-tablet-brands-300x250.jpeg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:31:"kids-tablet-brands-200x150.jpeg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5742, 8383, '_edit_lock', '1459963353:1'),
(5743, 8384, '_wp_attached_file', '2016/04/toolbox.png'),
(5744, 8384, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:135;s:6:"height";i:47;s:4:"file";s:19:"2016/04/toolbox.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5745, 8385, '_edit_lock', '1459963584:1'),
(5746, 8385, '_edit_last', '1'),
(5749, 8385, '_amaga_titol', ''),
(5750, 8385, '_amaga_metadata', ''),
(5751, 8385, '_bloc_html', ''),
(5752, 8385, '_original_size', ''),
(5753, 8385, '_entry_icon', 'noicon'),
(5756, 8387, '_wp_attached_file', '2016/04/emo.png'),
(5757, 8387, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:300;s:6:"height";i:300;s:4:"file";s:15:"2016/04/emo.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:15:"emo-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:15:"emo-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:15:"emo-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5758, 8385, '_thumbnail_id', '8387'),
(5763, 8389, '_edit_lock', '1459963760:1'),
(5764, 8389, '_edit_last', '1'),
(5765, 8390, '_wp_attached_file', '2016/04/jose.png'),
(5766, 8390, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:452;s:6:"height";i:296;s:4:"file";s:16:"2016/04/jose.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"jose-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"jose-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"jose-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"jose-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5767, 8389, '_thumbnail_id', '8390'),
(5770, 8389, '_amaga_titol', ''),
(5771, 8389, '_amaga_metadata', ''),
(5772, 8389, '_bloc_html', ''),
(5773, 8389, '_original_size', ''),
(5774, 8389, '_entry_icon', 'noicon'),
(5775, 8392, '_edit_lock', '1460014547:1'),
(5776, 8393, '_wp_attached_file', '2016/04/Selecció_999206.png'),
(5777, 8393, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:507;s:6:"height";i:301;s:4:"file";s:28:"2016/04/Selecció_999206.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999206-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999206-300x178.png";s:5:"width";i:300;s:6:"height";i:178;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999206-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999206-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5778, 8392, '_thumbnail_id', '8393'),
(5779, 8392, '_edit_last', '1'),
(5782, 8392, '_amaga_titol', ''),
(5783, 8392, '_amaga_metadata', ''),
(5784, 8392, '_bloc_html', ''),
(5785, 8392, '_original_size', 'on'),
(5786, 8392, '_entry_icon', 'noicon'),
(5813, 8400, '_menu_item_type', 'taxonomy'),
(5814, 8400, '_menu_item_menu_item_parent', '8236'),
(5815, 8400, '_menu_item_object_id', '294'),
(5816, 8400, '_menu_item_object', 'category'),
(5817, 8400, '_menu_item_target', ''),
(5818, 8400, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5819, 8400, '_menu_item_xfn', ''),
(5820, 8400, '_menu_item_url', ''),
(5848, 8405, '_menu_item_type', 'taxonomy'),
(5849, 8405, '_menu_item_menu_item_parent', '8375'),
(5850, 8405, '_menu_item_object_id', '296'),
(5851, 8405, '_menu_item_object', 'category'),
(5852, 8405, '_menu_item_target', ''),
(5853, 8405, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5854, 8405, '_menu_item_xfn', ''),
(5855, 8405, '_menu_item_url', ''),
(5857, 8406, '_menu_item_type', 'taxonomy'),
(5858, 8406, '_menu_item_menu_item_parent', '0'),
(5859, 8406, '_menu_item_object_id', '296'),
(5860, 8406, '_menu_item_object', 'category'),
(5861, 8406, '_menu_item_target', ''),
(5862, 8406, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5863, 8406, '_menu_item_xfn', ''),
(5864, 8406, '_menu_item_url', ''),
(5875, 8408, '_wp_attached_file', '2016/04/parla_r.jpg'),
(5876, 8408, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:19:"2016/04/parla_r.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"parla_r-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"parla_r-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"parla_r-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"parla_r-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5877, 8409, '_wp_attached_file', '2016/04/nen_recurs.jpg'),
(5878, 8409, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:22:"2016/04/nen_recurs.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"nen_recurs-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:22:"nen_recurs-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"nen_recurs-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"nen_recurs-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5879, 8410, '_wp_attached_file', '2016/04/nen_lleg.jpg'),
(5880, 8410, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:20:"2016/04/nen_lleg.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"nen_lleg-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"nen_lleg-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"nen_lleg-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"nen_lleg-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5881, 8411, '_wp_attached_file', '2016/04/narracio.jpg'),
(5882, 8411, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:20:"2016/04/narracio.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"narracio-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"narracio-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"narracio-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"narracio-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5883, 8412, '_wp_attached_file', '2016/04/logopeda.jpg'),
(5884, 8412, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:20:"2016/04/logopeda.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"logopeda-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"logopeda-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"logopeda-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"logopeda-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5885, 8413, '_wp_attached_file', '2016/04/family_llegint.jpg'),
(5886, 8413, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:26:"2016/04/family_llegint.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"family_llegint-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"family_llegint-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"family_llegint-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"family_llegint-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5887, 8414, '_wp_attached_file', '2016/04/est_frase.jpg'),
(5888, 8414, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:21:"2016/04/est_frase.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"est_frase-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"est_frase-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"est_frase-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"est_frase-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5889, 8415, '_wp_attached_file', '2016/04/contes_log.jpg'),
(5890, 8415, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:22:"2016/04/contes_log.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"contes_log-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:22:"contes_log-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"contes_log-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"contes_log-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5893, 8417, '_wp_attached_file', '2016/04/adult_material.jpg'),
(5894, 8417, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:26:"2016/04/adult_material.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"adult_material-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"adult_material-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"adult_material-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"adult_material-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5905, 8418, '_wp_attached_file', '2016/04/Marc_actuació_CREDA_99.pdf'),
(5923, 8424, '_edit_lock', '1463490920:1'),
(5924, 8424, '_edit_last', '1'),
(5925, 8424, '_wp_page_template', 'default'),
(5926, 8424, '_template_layout', '2c-l'),
(5936, 8429, '_edit_lock', '1464691493:1'),
(5937, 8429, '_edit_last', '1'),
(5938, 8429, '_wp_page_template', 'default'),
(5939, 8429, '_template_layout', '2c-l'),
(5940, 8431, '_menu_item_type', 'post_type'),
(5941, 8431, '_menu_item_menu_item_parent', '1063'),
(5942, 8431, '_menu_item_object_id', '8429'),
(5943, 8431, '_menu_item_object', 'page'),
(5944, 8431, '_menu_item_target', ''),
(5945, 8431, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5946, 8431, '_menu_item_xfn', ''),
(5947, 8431, '_menu_item_url', ''),
(5949, 8432, '_edit_lock', '1462872127:1'),
(5950, 8432, '_edit_last', '1'),
(5951, 8432, '_wp_page_template', 'default'),
(5952, 8432, '_template_layout', '2c-l'),
(5953, 8434, '_menu_item_type', 'post_type'),
(5954, 8434, '_menu_item_menu_item_parent', '8238'),
(5955, 8434, '_menu_item_object_id', '8432'),
(5956, 8434, '_menu_item_object', 'page'),
(5957, 8434, '_menu_item_target', ''),
(5958, 8434, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5959, 8434, '_menu_item_xfn', ''),
(5960, 8434, '_menu_item_url', ''),
(5962, 8438, '_wp_attached_file', '2016/04/sords_profunds.png'),
(5963, 8438, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:508;s:6:"height";i:474;s:4:"file";s:26:"2016/04/sords_profunds.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"sords_profunds-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"sords_profunds-300x280.png";s:5:"width";i:300;s:6:"height";i:280;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"sords_profunds-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"sords_profunds-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5974, 8443, '_wp_attached_file', '2016/05/lleng_signes.jpg'),
(5975, 8443, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:500;s:6:"height";i:500;s:4:"file";s:24:"2016/05/lleng_signes.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"lleng_signes-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"lleng_signes-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"lleng_signes-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"lleng_signes-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5976, 8444, '_wp_attached_file', '2016/05/vocabulari.jpg'),
(5977, 8444, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:500;s:6:"height";i:500;s:4:"file";s:22:"2016/05/vocabulari.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"vocabulari-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:22:"vocabulari-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"vocabulari-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"vocabulari-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(5978, 8445, '_menu_item_type', 'taxonomy'),
(5979, 8445, '_menu_item_menu_item_parent', '8375'),
(5980, 8445, '_menu_item_object_id', '297'),
(5981, 8445, '_menu_item_object', 'category'),
(5982, 8445, '_menu_item_target', ''),
(5983, 8445, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5984, 8445, '_menu_item_xfn', ''),
(5985, 8445, '_menu_item_url', ''),
(5987, 8446, '_menu_item_type', 'taxonomy'),
(5988, 8446, '_menu_item_menu_item_parent', '0'),
(5989, 8446, '_menu_item_object_id', '297'),
(5990, 8446, '_menu_item_object', 'category'),
(5991, 8446, '_menu_item_target', ''),
(5992, 8446, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5993, 8446, '_menu_item_xfn', ''),
(5994, 8446, '_menu_item_url', ''),
(5996, 8447, '_wp_attached_file', '2016/05/apps.jpg'),
(5997, 8447, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:500;s:6:"height";i:500;s:4:"file";s:16:"2016/05/apps.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"apps-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"apps-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"apps-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"apps-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6109, 8483, '_menu_item_type', 'taxonomy'),
(6110, 8483, '_menu_item_menu_item_parent', '8375'),
(6111, 8483, '_menu_item_object_id', '298'),
(6112, 8483, '_menu_item_object', 'category'),
(6113, 8483, '_menu_item_target', ''),
(6114, 8483, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6115, 8483, '_menu_item_xfn', ''),
(6116, 8483, '_menu_item_url', ''),
(6118, 8484, '_menu_item_type', 'taxonomy'),
(6119, 8484, '_menu_item_menu_item_parent', '0'),
(6120, 8484, '_menu_item_object_id', '298'),
(6121, 8484, '_menu_item_object', 'category'),
(6122, 8484, '_menu_item_target', ''),
(6123, 8484, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6124, 8484, '_menu_item_xfn', ''),
(6125, 8484, '_menu_item_url', ''),
(6127, 8485, '_wp_attached_file', '2016/05/jugantacasa.jpg'),
(6128, 8485, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:500;s:6:"height";i:500;s:4:"file";s:23:"2016/05/jugantacasa.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"jugantacasa-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"jugantacasa-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"jugantacasa-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"jugantacasa-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6135, 8487, '_menu_item_type', 'post_type'),
(6136, 8487, '_menu_item_menu_item_parent', '0'),
(6137, 8487, '_menu_item_object_id', '8432'),
(6138, 8487, '_menu_item_object', 'page'),
(6139, 8487, '_menu_item_target', ''),
(6140, 8487, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6141, 8487, '_menu_item_xfn', ''),
(6142, 8487, '_menu_item_url', ''),
(6180, 8493, '_menu_item_type', 'taxonomy'),
(6181, 8493, '_menu_item_menu_item_parent', '8376'),
(6182, 8493, '_menu_item_object_id', '297'),
(6183, 8493, '_menu_item_object', 'category'),
(6184, 8493, '_menu_item_target', ''),
(6185, 8493, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6186, 8493, '_menu_item_xfn', ''),
(6187, 8493, '_menu_item_url', ''),
(6189, 8494, '_menu_item_type', 'taxonomy'),
(6190, 8494, '_menu_item_menu_item_parent', '8376'),
(6191, 8494, '_menu_item_object_id', '298'),
(6192, 8494, '_menu_item_object', 'category'),
(6193, 8494, '_menu_item_target', ''),
(6194, 8494, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6195, 8494, '_menu_item_xfn', ''),
(6196, 8494, '_menu_item_url', ''),
(6198, 8495, '_menu_item_type', 'taxonomy'),
(6199, 8495, '_menu_item_menu_item_parent', '8376'),
(6200, 8495, '_menu_item_object_id', '266'),
(6201, 8495, '_menu_item_object', 'category'),
(6202, 8495, '_menu_item_target', ''),
(6203, 8495, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6204, 8495, '_menu_item_xfn', ''),
(6205, 8495, '_menu_item_url', ''),
(6207, 8496, '_menu_item_type', 'taxonomy'),
(6208, 8496, '_menu_item_menu_item_parent', '8376'),
(6209, 8496, '_menu_item_object_id', '269'),
(6210, 8496, '_menu_item_object', 'category'),
(6211, 8496, '_menu_item_target', ''),
(6212, 8496, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6213, 8496, '_menu_item_xfn', ''),
(6214, 8496, '_menu_item_url', ''),
(6216, 8497, '_menu_item_type', 'taxonomy'),
(6217, 8497, '_menu_item_menu_item_parent', '8376'),
(6218, 8497, '_menu_item_object_id', '268'),
(6219, 8497, '_menu_item_object', 'category'),
(6220, 8497, '_menu_item_target', ''),
(6221, 8497, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6222, 8497, '_menu_item_xfn', ''),
(6223, 8497, '_menu_item_url', ''),
(6225, 8498, '_menu_item_type', 'taxonomy'),
(6226, 8498, '_menu_item_menu_item_parent', '8376'),
(6227, 8498, '_menu_item_object_id', '296'),
(6228, 8498, '_menu_item_object', 'category'),
(6229, 8498, '_menu_item_target', ''),
(6230, 8498, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6231, 8498, '_menu_item_xfn', ''),
(6232, 8498, '_menu_item_url', ''),
(6234, 8499, '_menu_item_type', 'taxonomy'),
(6235, 8499, '_menu_item_menu_item_parent', '8376'),
(6236, 8499, '_menu_item_object_id', '267'),
(6237, 8499, '_menu_item_object', 'category'),
(6238, 8499, '_menu_item_target', ''),
(6239, 8499, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6240, 8499, '_menu_item_xfn', ''),
(6241, 8499, '_menu_item_url', ''),
(6243, 8500, '_menu_item_type', 'taxonomy'),
(6244, 8500, '_menu_item_menu_item_parent', '0'),
(6245, 8500, '_menu_item_object_id', '294'),
(6246, 8500, '_menu_item_object', 'category'),
(6247, 8500, '_menu_item_target', ''),
(6248, 8500, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6249, 8500, '_menu_item_xfn', ''),
(6250, 8500, '_menu_item_url', ''),
(6304, 8504, '_wp_attached_file', '2016/04/perdua-auditiva.png'),
(6305, 8504, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:388;s:6:"height";i:326;s:4:"file";s:27:"2016/04/perdua-auditiva.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"perdua-auditiva-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"perdua-auditiva-300x252.png";s:5:"width";i:300;s:6:"height";i:252;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"perdua-auditiva-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"perdua-auditiva-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6306, 8505, '_wp_attached_file', '2016/04/guia_tartamudesa.png'),
(6307, 8505, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:629;s:6:"height";i:631;s:4:"file";s:28:"2016/04/guia_tartamudesa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"guia_tartamudesa-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"guia_tartamudesa-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"guia_tartamudesa-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"guia_tartamudesa-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6308, 8507, '_wp_attached_file', '2016/04/guia_sordceguesa.png'),
(6309, 8507, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:628;s:6:"height";i:630;s:4:"file";s:28:"2016/04/guia_sordceguesa.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"guia_sordceguesa-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"guia_sordceguesa-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"guia_sordceguesa-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"guia_sordceguesa-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6310, 8512, '_wp_attached_file', '2016/05/hipoacusia.png');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(6311, 8512, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:633;s:6:"height";i:625;s:4:"file";s:22:"2016/05/hipoacusia.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"hipoacusia-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"hipoacusia-300x296.png";s:5:"width";i:300;s:6:"height";i:296;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"hipoacusia-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"hipoacusia-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6312, 8516, '_wp_attached_file', '2016/05/llenguatge_escola.png'),
(6313, 8516, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:482;s:6:"height";i:445;s:4:"file";s:29:"2016/05/llenguatge_escola.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:29:"llenguatge_escola-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:29:"llenguatge_escola-300x277.png";s:5:"width";i:300;s:6:"height";i:277;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:29:"llenguatge_escola-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:29:"llenguatge_escola-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6314, 8519, '_wp_attached_file', '2016/04/ORIENTACIONS_FAMILIA_1.pdf'),
(6315, 8520, '_wp_attached_file', '2016/04/aprendre_respirar_bufar_mocar.pdf'),
(6316, 8527, '_edit_lock', '1464689881:1'),
(6317, 8527, '_edit_last', '1'),
(6318, 8527, '_wp_page_template', 'default'),
(6319, 8527, '_template_layout', '2c-l'),
(6320, 8549, '_wp_attached_file', '2016/05/implant.jpg'),
(6321, 8549, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:400;s:4:"file";s:19:"2016/05/implant.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"implant-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"implant-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"implant-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"implant-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(6322, 8551, '_menu_item_type', 'post_type'),
(6323, 8551, '_menu_item_menu_item_parent', '8189'),
(6324, 8551, '_menu_item_object_id', '8424'),
(6325, 8551, '_menu_item_object', 'page'),
(6326, 8551, '_menu_item_target', ''),
(6327, 8551, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6328, 8551, '_menu_item_xfn', ''),
(6329, 8551, '_menu_item_url', ''),
(6331, 8552, '_menu_item_type', 'post_type'),
(6332, 8552, '_menu_item_menu_item_parent', '8180'),
(6333, 8552, '_menu_item_object_id', '8424'),
(6334, 8552, '_menu_item_object', 'page'),
(6335, 8552, '_menu_item_target', ''),
(6336, 8552, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6337, 8552, '_menu_item_xfn', ''),
(6338, 8552, '_menu_item_url', ''),
(6342, 8558, '_menu_item_type', 'post_type'),
(6343, 8558, '_menu_item_menu_item_parent', '0'),
(6344, 8558, '_menu_item_object_id', '806'),
(6345, 8558, '_menu_item_object', 'page'),
(6346, 8558, '_menu_item_target', ''),
(6347, 8558, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6348, 8558, '_menu_item_xfn', ''),
(6349, 8558, '_menu_item_url', ''),
(6351, 8559, '_menu_item_type', 'post_type'),
(6352, 8559, '_menu_item_menu_item_parent', '8558'),
(6353, 8559, '_menu_item_object_id', '797'),
(6354, 8559, '_menu_item_object', 'page'),
(6355, 8559, '_menu_item_target', ''),
(6356, 8559, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6357, 8559, '_menu_item_xfn', ''),
(6358, 8559, '_menu_item_url', ''),
(6360, 8560, '_menu_item_type', 'post_type'),
(6361, 8560, '_menu_item_menu_item_parent', '8558'),
(6362, 8560, '_menu_item_object_id', '8429'),
(6363, 8560, '_menu_item_object', 'page'),
(6364, 8560, '_menu_item_target', ''),
(6365, 8560, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6366, 8560, '_menu_item_xfn', ''),
(6367, 8560, '_menu_item_url', ''),
(6369, 8561, '_menu_item_type', 'post_type'),
(6370, 8561, '_menu_item_menu_item_parent', '8558'),
(6371, 8561, '_menu_item_object_id', '306'),
(6372, 8561, '_menu_item_object', 'page'),
(6373, 8561, '_menu_item_target', ''),
(6374, 8561, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6375, 8561, '_menu_item_xfn', ''),
(6376, 8561, '_menu_item_url', ''),
(6378, 8562, '_menu_item_type', 'post_type'),
(6379, 8562, '_menu_item_menu_item_parent', '8558'),
(6380, 8562, '_menu_item_object_id', '8140'),
(6381, 8562, '_menu_item_object', 'page'),
(6382, 8562, '_menu_item_target', ''),
(6383, 8562, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6384, 8562, '_menu_item_xfn', ''),
(6385, 8562, '_menu_item_url', ''),
(6387, 8563, '_menu_item_type', 'post_type'),
(6388, 8563, '_menu_item_menu_item_parent', '8558'),
(6389, 8563, '_menu_item_object_id', '608'),
(6390, 8563, '_menu_item_object', 'page'),
(6391, 8563, '_menu_item_target', ''),
(6392, 8563, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6393, 8563, '_menu_item_xfn', ''),
(6394, 8563, '_menu_item_url', ''),
(6396, 8564, '_menu_item_type', 'post_type'),
(6397, 8564, '_menu_item_menu_item_parent', '8558'),
(6398, 8564, '_menu_item_object_id', '318'),
(6399, 8564, '_menu_item_object', 'page'),
(6400, 8564, '_menu_item_target', ''),
(6401, 8564, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6402, 8564, '_menu_item_xfn', ''),
(6403, 8564, '_menu_item_url', ''),
(6405, 8565, '_menu_item_type', 'post_type'),
(6406, 8565, '_menu_item_menu_item_parent', '8558'),
(6407, 8565, '_menu_item_object_id', '8527'),
(6408, 8565, '_menu_item_object', 'page'),
(6409, 8565, '_menu_item_target', ''),
(6410, 8565, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6411, 8565, '_menu_item_xfn', ''),
(6412, 8565, '_menu_item_url', ''),
(6414, 8566, '_menu_item_type', 'post_type'),
(6415, 8566, '_menu_item_menu_item_parent', '1063'),
(6416, 8566, '_menu_item_object_id', '8527'),
(6417, 8566, '_menu_item_object', 'page'),
(6418, 8566, '_menu_item_target', ''),
(6419, 8566, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6420, 8566, '_menu_item_xfn', ''),
(6421, 8566, '_menu_item_url', ''),
(6423, 8429, 'sharing_disabled', '1'),
(6424, 8568, '_edit_lock', '1464773493:2'),
(6425, 8568, '_edit_last', '2'),
(6426, 8568, '_wp_page_template', 'default'),
(6427, 8568, '_template_layout', '2c-l'),
(6428, 8570, '_edit_lock', '1464877919:2'),
(6429, 8570, '_edit_last', '2'),
(6430, 8570, '_wp_page_template', 'default'),
(6431, 8570, '_template_layout', '2c-l'),
(6539, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(6540, 248, '_default_calendar_list_range_type', 'daily'),
(6541, 248, '_default_calendar_list_range_span', '7'),
(6542, 248, '_calendar_begins', 'today'),
(6543, 248, '_feed_earliest_event_date', 'months_before'),
(6544, 248, '_feed_earliest_event_date_range', '1'),
(6545, 248, '_feed_latest_event_date', 'years_after'),
(6546, 248, '_feed_latest_event_date_range', '1'),
(6547, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(6548, 248, '_default_calendar_expand_multi_day_events', 'no'),
(6549, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(6550, 248, '_google_events_max_results', '2500'),
(6551, 248, '_google_events_recurring', 'show'),
(6552, 248, '_calendar_date_format_setting', 'use_site'),
(6553, 248, '_calendar_time_format_setting', 'use_site'),
(6554, 248, '_calendar_datetime_separator', '@'),
(6555, 248, '_calendar_week_starts_on_setting', 'use_site'),
(6556, 248, '_feed_cache_user_unit', '3600'),
(6557, 248, '_feed_cache_user_amount', '1'),
(6558, 248, '_feed_cache', '3600'),
(6559, 248, '_calendar_version', '3.1.2'),
(6560, 1038, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(6561, 1038, '_default_calendar_list_range_type', 'events'),
(6562, 1038, '_default_calendar_list_range_span', '1'),
(6563, 1038, '_calendar_begins', 'today'),
(6564, 1038, '_feed_earliest_event_date', 'months_before'),
(6565, 1038, '_feed_earliest_event_date_range', '1'),
(6566, 1038, '_feed_latest_event_date', 'years_after'),
(6567, 1038, '_feed_latest_event_date_range', '1'),
(6568, 1038, '_default_calendar_event_bubble_trigger', 'hover'),
(6569, 1038, '_default_calendar_expand_multi_day_events', 'no'),
(6570, 1038, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(6571, 1038, '_google_events_max_results', '2500'),
(6572, 1038, '_google_events_recurring', 'show'),
(6573, 1038, '_calendar_date_format_setting', 'use_site'),
(6574, 1038, '_calendar_time_format_setting', 'use_site'),
(6575, 1038, '_calendar_datetime_separator', '@'),
(6576, 1038, '_calendar_week_starts_on_setting', 'use_site'),
(6577, 1038, '_feed_cache_user_unit', '60'),
(6578, 1038, '_feed_cache_user_amount', '5'),
(6579, 1038, '_feed_cache', '300'),
(6580, 1038, '_calendar_version', '3.1.2'),
(6659, 248, '_calendar_begins_nth', '1'),
(6660, 248, '_calendar_begins_custom_date', ''),
(6661, 248, '_calendar_is_static', 'no'),
(6662, 248, '_no_events_message', ''),
(6663, 248, '_event_formatting', 'preserve_linebreaks'),
(6664, 248, '_poweredby', 'no'),
(6665, 248, '_feed_timezone_setting', 'use_site'),
(6666, 248, '_feed_timezone', 'Europe/Madrid'),
(6667, 248, '_calendar_date_format', 'l, d F Y'),
(6668, 248, '_calendar_date_format_php', 'd/m/Y'),
(6669, 248, '_calendar_time_format', 'G:i a'),
(6670, 248, '_calendar_time_format_php', 'G:i'),
(6671, 248, '_calendar_week_starts_on', '0'),
(6672, 248, '_google_events_search_query', ''),
(6673, 248, '_grouped_calendars_source', 'ids'),
(6674, 248, '_grouped_calendars_ids', ''),
(6675, 248, '_grouped_calendars_category', ''),
(6676, 248, '_default_calendar_style_theme', 'light'),
(6677, 248, '_default_calendar_style_today', '#1e73be'),
(6678, 248, '_default_calendar_style_days_events', '#000000'),
(6679, 248, '_default_calendar_list_header', 'no'),
(6680, 248, '_default_calendar_compact_list', 'no'),
(6681, 248, '_default_calendar_limit_visible_events', 'no'),
(6682, 248, '_default_calendar_visible_events', '3'),
(6683, 248, '_default_calendar_trim_titles', 'no'),
(6684, 248, '_default_calendar_trim_titles_chars', '20'),
(6685, 1038, '_calendar_begins_nth', '1'),
(6686, 1038, '_calendar_begins_custom_date', ''),
(6687, 1038, '_calendar_is_static', 'no'),
(6688, 1038, '_no_events_message', ''),
(6689, 1038, '_event_formatting', 'preserve_linebreaks'),
(6690, 1038, '_poweredby', 'no'),
(6691, 1038, '_feed_timezone_setting', 'use_site'),
(6692, 1038, '_feed_timezone', 'Europe/Madrid'),
(6693, 1038, '_calendar_date_format', 'l, d F Y'),
(6694, 1038, '_calendar_date_format_php', 'd/m/Y'),
(6695, 1038, '_calendar_time_format', 'G:i a'),
(6696, 1038, '_calendar_time_format_php', 'G:i'),
(6697, 1038, '_calendar_week_starts_on', '0'),
(6698, 1038, '_google_events_search_query', ''),
(6699, 1038, '_grouped_calendars_source', 'ids'),
(6700, 1038, '_grouped_calendars_ids', ''),
(6701, 1038, '_grouped_calendars_category', ''),
(6702, 1038, '_default_calendar_style_theme', 'light'),
(6703, 1038, '_default_calendar_style_today', '#1e73be'),
(6704, 1038, '_default_calendar_style_days_events', '#000000'),
(6705, 1038, '_default_calendar_list_header', 'no'),
(6706, 1038, '_default_calendar_compact_list', 'no'),
(6707, 1038, '_default_calendar_limit_visible_events', 'no'),
(6708, 1038, '_default_calendar_visible_events', '3'),
(6709, 1038, '_default_calendar_trim_titles', 'no'),
(6710, 1038, '_default_calendar_trim_titles_chars', '20'),
(6711, 8593, 'es_template_type', 'newsletter'),
(6712, 8594, 'es_template_type', 'post_notification'),
(6713, 107, 'album_extension', '');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
`ID` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8600 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-17 11:31:22', '2017-01-17 10:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-12 10:15:01', '2014-09-12 10:15:01', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=9', 0, 'page', '', 0),
(13, 1, '2014-09-12 11:05:02', '2014-09-12 11:05:02', 'Pàgina d''avís', 'Avís', '', 'publish', 'closed', 'closed', '', 'avis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=13', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/nodes/', 0, 'page', '', 0),
(31, 1, '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&amp;p=31', 0, 'slideshow', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2016-04-06 18:08:08', '2016-04-06 17:08:08', '', 8206, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2016-04-04 10:27:22', '2016-04-04 09:27:22', '', 8153, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2016-04-06 17:08:20', '2016-04-06 16:08:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-socials', 0, 'forum', '', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(146, 1, '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 'gimnas', '', 'inherit', 'open', 'open', '', 'gimnas', '', '', '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/gimnas.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple ', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2014-09-19 16:08:04', '2014-09-19 16:08:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(154, 1, '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 'Xesc_Arbona', '', 'inherit', 'open', 'open', '', 'xesc_arbona', '', '', '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/Xesc_Arbona.png', 0, 'attachment', 'image/png', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/dep-informatica', 0, 'forum', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2015-10-09 12:57:53', '2015-10-09 11:57:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/fotografia', 0, 'forum', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/papiroflexia', 0, 'forum', '', 0),
(210, 1, '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 'granota', '', 'inherit', 'open', 'open', '', 'granota', '', '', '2014-09-22 15:10:09', '2014-09-22 15:10:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/granota.png', 0, 'attachment', 'image/png', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2015-12-02 15:39:31', '2015-12-02 14:39:31', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(234, 1, '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 'Exemple', '', 'inherit', 'open', 'open', '', 'exemple-2', '', '', '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/bp-attachments/233/Exemple.docx', 0, 'attachment', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0),
(239, 1, '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 'Selecció_713', '', 'inherit', 'open', 'open', '', 'seleccio_713', '', '', '2015-12-02 15:41:08', '2015-12-02 14:41:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/bp-attachments/238/Selecció_713.png', 0, 'attachment', 'image/png', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<strong>[title]</strong>\r\n[when]\r\n[location]\r\n<div>[description]</div>\r\n[link newwindow="yes"]Més detalls...[/link]', 'Agenda d''exemple', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2016-09-21 10:41:34', '2016-09-21 08:41:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(255, 1, '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(289, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', '', 'Mur general', '', 'publish', 'open', 'open', '', '289', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=289', 1, 'nav_menu_item', '', 0),
(306, 1, '2015-11-24 18:02:44', '2015-11-24 17:02:44', 'Cada CREDA està format per un equip multidisciplinar:\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl in felis scelerisque consectetur et in purus. Donec vitae massa id sem placerat elementum. Nunc ultrices mauris augue, quis posuere leo tempor in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus a vulputate lectus. Praesent et urna dolor. Pellentesque sollicitudin justo non nisi finibus, eget scelerisque ante consectetur. Proin scelerisque dui quis dolor imperdiet porttitor. Morbi neque mi, molestie quis justo sit amet, condimentum faucibus felis. Praesent sit amet erat eget risus faucibus tempus at eget lectus. Proin molestie felis sem, vel tempor nisi volutpat in. Ut sapien velit, pharetra vitae porttitor ut, fringilla at enim. Vivamus a malesuada mauris.\r\n\r\n<img class=" size-full wp-image-185 alignright" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/ampa.png" alt="ampa" width="315" height="126" />Vivamus sagittis justo non nisl bibendum convallis. Nulla condimentum nisi ultrices, scelerisque nunc a, egestas ligula. Mauris sed dui hendrerit, pharetra lectus sit amet, euismod urna. Aenean ante massa, malesuada quis viverra a, fermentum at enim. Ut egestas ante ac enim vehicula, et pulvinar mauris sagittis. Cras leo libero, tempor et nunc vitae, sodales porta ligula. Cras viverra a augue ut placerat. Praesent hendrerit ex non luctus scelerisque. Mauris est sem, egestas eget euismod ut, ultrices in ligula. Cras feugiat tellus sed diam dignissim, nec commodo neque iaculis. Morbi vitae varius massa. Ut quis dolor a libero auctor mattis vel quis nisl. Suspendisse congue mi est, id consequat felis placerat efficitur.\r\n\r\nPodeu consultar els <a href="https://pwc-int.educacio.intranet/agora/mastercreda/docs/distribucio-de-professionals-per-centres/">professionals assignats al vostre centre</a>.', 'Equip', '', 'publish', 'closed', 'closed', '', 'equip', '', '', '2016-05-31 11:07:15', '2016-05-31 10:07:15', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=306', 28, 'page', '', 0),
(318, 1, '2015-11-24 18:18:24', '2015-11-24 17:18:24', '<strong>CREDA L''Arany\r\n</strong>Plaça de la Vila, 14\r\n01234 Abella de Xerta\r\ntel. 01234567\r\ncreda-larany@xtec.cat\r\n<h4><strong>Subseus</strong></h4>\r\n<div style="float: left; padding: 10px;">\r\n\r\n<strong><strong>Subseu L''Arany1</strong></strong>\r\n\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\ntel. 01234567\r\n<a href="#">Enllaç\r\n</a>creda-larany1@xtec.cat\r\n\r\n</div>\r\n<div style="float: left; padding: 10px;">\r\n\r\n<strong><strong>Subseu L''Arany2</strong></strong>\r\n\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\ntel. 01234567\r\n<a href="#">Enllaç\r\n</a>creda-larany2@xtec.cat\r\n\r\n</div>\r\n<div style="float: left; padding: 10px;">\r\n\r\n<strong><strong>Subseu L''Arany3</strong></strong>\r\n\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta\r\ntel. 01234567\r\n<a href="#">Enllaç\r\n</a>creda-larany1@xtec.cat\r\n\r\n</div>\r\n<div style="clear: both;"><strong>\r\n</strong><iframe src="http://www.instamaps.cat/geocatweb/visor.html?businessid=f623ab36c9dc28b7c159b350b279e99e&amp;id=1697256&amp;title=Centres-del-SEZ-del-Pla-de-lEstany&amp;embed=1" width="90%" height="500" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></div>\r\n<div style="clear: both;"></div>\r\n<div style="clear: both;"><strong> </strong></div>\r\n<div style="clear: both;">\r\n\r\n<strong>Com arribar-hi:</strong>\r\n\r\n</div>\r\n<ul>\r\n	<li>Per tren: Estació Abella centre de la línia 1</li>\r\n	<li>Per bus: Línies L3 i L5</li>\r\n</ul>', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2016-05-31 11:08:03', '2016-05-31 10:08:03', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=318', 50, 'page', '', 0),
(324, 1, '2015-11-11 16:25:26', '2015-11-11 15:25:26', '', 'recursos-educadors-llapisos2', '', 'inherit', 'open', 'open', '', 'recursos-educadors-llapisos2', '', '', '2015-11-11 16:25:26', '2015-11-11 15:25:26', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/recursos-educadors-llapisos2.png', 0, 'attachment', 'image/png', 0),
(339, 1, '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 'tartu', '', 'inherit', 'open', 'open', '', 'tartu', '', '', '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/tartu.png', 0, 'attachment', 'image/png', 0),
(354, 1, '2015-11-24 22:58:37', '2015-11-24 21:58:37', '', 'eap1', '', 'inherit', 'open', 'open', '', 'eap1', '', '', '2015-11-24 22:58:37', '2015-11-24 21:58:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/eap1.png', 0, 'attachment', 'image/png', 0),
(355, 1, '2015-11-24 22:58:49', '2015-11-24 21:58:49', '', 'eap2', '', 'inherit', 'open', 'open', '', 'eap2', '', '', '2016-04-04 12:19:55', '2016-04-04 11:19:55', '', 8175, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/eap2.png', 0, 'attachment', 'image/png', 0),
(364, 1, '2015-11-25 09:25:29', '2015-11-25 08:25:29', '', 'Notícies', '', 'publish', 'closed', 'closed', '', 'noticies', '', '', '2015-11-25 09:25:29', '2015-11-25 08:25:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&amp;p=364', 0, 'slideshow', '', 0),
(372, 1, '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 'OX253EDR6R (1)', '', 'inherit', 'open', 'open', '', 'ox253edr6r-1', '', '', '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/OX253EDR6R-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(456, 1, '2015-11-25 17:36:08', '2015-11-25 16:36:08', '', 'Activitats de zona destacades', '', 'publish', 'closed', 'closed', '', 'activitats-de-zona-destacades', '', '', '2015-12-01 17:59:57', '2015-12-01 16:59:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&#038;p=456', 0, 'slideshow', '', 0),
(507, 1, '2015-11-25 23:54:06', '2015-11-25 22:54:06', '', 'modalitats 2015-16', '', 'inherit', 'open', 'open', '', 'modalitats-2015-16', '', '', '2015-11-25 23:54:06', '2015-11-25 22:54:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/modalitats-2015-16.pdf', 0, 'attachment', 'application/pdf', 0),
(543, 1, '2015-11-26 17:38:46', '2015-11-26 16:38:46', '', 'bagicon', '', 'inherit', 'open', 'open', '', 'bagicon', '', '', '2015-11-26 17:38:46', '2015-11-26 16:38:46', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/bagicon.png', 0, 'attachment', 'image/png', 0),
(570, 1, '2015-11-26 21:26:21', '2015-11-26 20:26:21', '', 'jocsvernell', '', 'inherit', 'open', 'open', '', 'jocsvernell', '', '', '2015-11-26 21:26:21', '2015-11-26 20:26:21', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/jocsvernell.jpg', 0, 'attachment', 'image/jpeg', 0),
(604, 1, '2015-11-27 00:34:49', '2015-11-26 23:34:49', '', 'puzzle', '', 'inherit', 'open', 'open', '', 'puzzle', '', '', '2015-11-27 00:34:49', '2015-11-26 23:34:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/puzzle.png', 0, 'attachment', 'image/png', 0),
(608, 1, '2015-11-27 10:04:51', '2015-11-27 09:04:51', 'De dilluns a divendres\r\n<ul>\r\n	<li>Matí: de<strong> 9</strong> a <strong>14 </strong>h</li>\r\n	<li>Tarda: de<strong> 16</strong> a <strong>18</strong> h</li>\r\n</ul>\r\nHorari intensiu, de <strong>9</strong> a <strong>15</strong> h:\r\n<ul>\r\n	<li>22 de desembre</li>\r\n	<li>Del 6 de juny al 15 de juliol</li>\r\n</ul>\r\nEl nostre CREDA romandrà tancat al públic, a part dels períodes de vacances escolars i dels dies de festes laborals oficials a Catalunya, els següents dies de festa local i de lliure disposició, acordats pel Consell Escolar Municipal de XXXXXX:\r\n<ul>\r\n	<li>30 d''octubre de 2015 (festa de lliure disposició)</li>\r\n	<li>7 de desembre de 2015 (festa de lliure disposició)</li>\r\n	<li>5 de febrer de 2016 (festa de lliure disposició)</li>\r\n	<li>8 de febrer de 2016 (festa de lliure disposició)</li>\r\n	<li>29 d''abril de 2016 (festa de lliure disposició)</li>\r\n	<li>16 de maig de 2016 (festa local)</li>\r\n</ul>', 'Horari i calendari', '', 'publish', 'closed', 'closed', '', 'horari-i-calendari', '', '', '2016-05-31 11:07:50', '2016-05-31 10:07:50', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=608', 40, 'page', '', 0),
(647, 1, '2015-11-27 15:08:32', '2015-11-27 14:08:32', '', 'SC:Juguem sense barreres', '', 'publish', 'closed', 'closed', '', 'scjuguem-sense-barreres', '', '', '2015-11-27 15:08:32', '2015-11-27 14:08:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?post_type=slideshow&amp;p=647', 0, 'slideshow', '', 0),
(656, 1, '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 'formador', '', 'inherit', 'open', 'open', '', 'formador', '', '', '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/formador.png', 0, 'attachment', 'image/png', 0),
(659, 1, '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 'calendari', '', 'inherit', 'open', 'open', '', 'calendari', '', '', '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 608, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/calendari.jpg', 0, 'attachment', 'image/jpeg', 0),
(768, 1, '2015-11-28 12:16:14', '2015-11-28 11:16:14', 'Node d&#039;organització interna', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu', '', '', '2015-11-28 12:16:14', '2015-11-28 11:16:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/servei-educatiu/', 0, 'forum', '', 0),
(782, 1, '2015-11-28 18:06:43', '2015-11-28 17:06:43', '', 'monestir de cellers', '', 'inherit', 'open', 'open', '', '2015-11-28_1804', '', '', '2015-11-28 18:06:43', '2015-11-28 17:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/2015-11-28_1804.png', 0, 'attachment', 'image/png', 0),
(797, 1, '2015-11-28 21:06:57', '2015-11-28 20:06:57', 'Els CREDA són serveis de suport als centres educatius en l’adequació a la resposta educativa davant les necessitats que interfereixen en el desenvolupament personal, social i curricular de l’alumnat amb dèficit auditiu, trastorn específic del llenguatge i/o la comunicació. La seva intervenció es concreta en tres grans àmbits: alumnat i famílies; centres i professorat; zona educativa.\r\n\r\nEs tracta d’un model d’atenció a l’alumnat amb necessitats educatives especials i al seu entorn propi de Catalunya. Actualment hi ha 10 CREDA, cadascun amb una zona d’actuació àmplia, generalment coincideix amb un Servei Territorial.\r\n\r\n<strong>Destinataris</strong>\r\n<ul>\r\n	<li>Infants i joves amb pèrdua auditiva (0-18a), i llurs famílies.</li>\r\n	<li>Alumnat amb greus trastorns del llenguatge i/o la comunicació (3-12a), i llurs famílies.</li>\r\n	<li>Centres i professorat de l’alumnat amb greus dificultats d’audició, llenguatge i/o comunicació.</li>\r\n	<li>Professorat especialitzat (MALL) de la zona educativa de l’alumnat amb greus dificultats d’audició i/o llenguatge.</li>\r\n</ul>\r\n<strong>Objectius</strong>\r\n<ul>\r\n	<li>Realitzar la valoració i seguiment del procés evolutiu audiològic, comunicatiu i lingüístic de l’infant amb sordesa.</li>\r\n	<li>Realitzar la valoració i seguiment de les necessitats psicolingüístiques i educatives de l’alumnat amb greus trastorns de llenguatge i/o comunicació.</li>\r\n	<li>Proporcionar atenció logopèdica específica a l’alumnat amb greus trastorns de l’audició, el llenguatge i/o la comunicació.</li>\r\n	<li>Orientar i assessorar a les famílies de l’alumnat amb greus trastorns de l’audició, el llenguatge i/o la comunicació.</li>\r\n	<li>Proporcionar suport i assessorament als centres i al professorat de l’alumnat amb greus dificultats d’audició, llenguatge i/o comunicació.</li>\r\n	<li>Posar a disposició de la comunitat educativa materials, recursos, assessorament i formació especialitzada per a l’adequació de la tasca docent a les necessitats especials de l’alumnat amb dificultats d’audició, llenguatge i/o comunicació.</li>\r\n</ul>\r\n<strong>Accés</strong>\r\n\r\nDerivats per l’EAP de la zona a través d’un full protocol·litzat de demanda amb les dades pertinents per valorar la idoneïtat i característiques de l’alumnat pel que es sol·licita atenció logopèdica.\r\nEl infants de 0 a 3 anys amb diagnòstic de pèrdua auditiva (ORL) la família, el CDIAP o l’EAP poden accedir directament al CREDA.\r\n\r\n<strong>Professionals</strong>\r\n<ul>\r\n	<li>Logopedes</li>\r\n	<li>Psicopedagogs/es especialitzats en audició, llenguatge i comunicació</li>\r\n	<li>Audioprotetistes especialitzats en audiopròtesi infantil i juvenil</li>\r\n</ul>\r\nVes al <a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Marc_actuaci%C3%B3_CREDA_99.pdf" target="_blank">marc d''actuació</a>.', 'Què és', '', 'publish', 'closed', 'closed', '', 'que-es', '', '', '2016-05-31 11:00:49', '2016-05-31 10:00:49', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=797', 10, 'page', '', 0),
(806, 1, '2015-11-28 21:29:55', '2015-11-28 20:29:55', 'Els <strong>serveis educatius</strong> del Departament d''Ensenyament donen suport i assessorament als centres educatius públics i privats concertats de nivells educatius no universitaris. Cada servei educatiu està format per un equip multidisciplinar que ofereix els següents serveis:\r\n<ul>\r\n	<li>Suport i assessorament en estratègies organitzatives, didàctiques i metodològiques per a l’assoliment de les <strong>competències bàsiques.</strong></li>\r\n	<li>Suport en la <strong>tutoria i l’orientació</strong> educativa.</li>\r\n	<li><strong>Detecció precoç</strong> de les dificultats d’aprenentatge, socials, motrius i fer avaluacions psicopedagògiques.</li>\r\n	<li>Assessorament sobre el procés d’escolarització en <strong>necessitats educatives específiques i especials</strong> (NEE).</li>\r\n	<li>Assessorament sobre <strong>adaptacions curriculars individuals</strong> (CI).</li>\r\n	<li>Suport en la <strong>prevenció de l’abandonament escolar</strong> prematur.</li>\r\n	<li>Suport en el tractament integrat de <strong>llengua i continguts</strong>.</li>\r\n	<li>Planificació i gestió del catàleg de <strong>formació del professorat</strong> de la zona.</li>\r\n	<li>Suport i assessorament en didàctica, <strong>innovació</strong> i/o <strong>planificació</strong>: plans de millora, TAC, suport a la lectura…</li>\r\n	<li><strong>Servei de préstec</strong> de maquinari, vídeos i textos especialitzats en temes educatius.</li>\r\n	<li>Suport a <strong>projectes internacionals</strong> pel desenvolupament del <strong>plurilingüisme</strong> i de les <strong>competències comunicatives</strong> dels alumnes.</li>\r\n</ul>\r\nL''àmbit d''actuació del servei educatiu és la comarca del XXXXXXX, a més d''algunes poblacions de comarques veïnes que, per motius diversos (pertanyença a una ZER o a una zona d''inspecció), s''integren al territori.\r\n<h4>Qui pot fer la demanda dels serveis?</h4>\r\n<ul>\r\n	<li>Els centres, mitjançant els seus equips de direcció.</li>\r\n	<li>Col·lectius de docents, d’especialitat, de nivell, d’interessos, etc.</li>\r\n	<li>Els docents directament.</li>\r\n	<li>Altres entitats vinculades a l’Educació.</li>\r\n</ul>\r\n<h4>Com es fa la demanda?</h4>\r\nTrucant al telèfon <strong>000 000 000</strong> o enviant un correu electrònic a <strong>se-xxxxxxx@xtec.cat</strong>\r\n<h4></h4>', 'El CREDA', '', 'publish', 'closed', 'closed', '', 'el-creda', '', '', '2016-04-01 13:18:30', '2016-04-01 12:18:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=806', 0, 'page', '', 0),
(875, 1, '2015-11-29 12:32:26', '2015-11-29 11:32:26', '', 'microscopi', '', 'inherit', 'open', 'open', '', 'microscopi-2', '', '', '2015-11-29 12:32:26', '2015-11-29 11:32:26', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/microscopi.pdf', 0, 'attachment', 'application/pdf', 0),
(884, 1, '2015-11-29 14:03:19', '2015-11-29 13:03:19', '', 'tablets', '', 'inherit', 'open', 'open', '', 'tablets', '', '', '2015-11-29 14:03:19', '2015-11-29 13:03:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/tablets.png', 0, 'attachment', 'image/png', 0),
(885, 1, '2015-11-29 14:07:27', '2015-11-29 13:07:27', '', 'asus-memo-pad', '', 'inherit', 'open', 'open', '', 'asus-memo-pad', '', '', '2015-11-29 14:07:27', '2015-11-29 13:07:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/asus-memo-pad.jpg', 0, 'attachment', 'image/jpeg', 0),
(887, 1, '2015-11-29 14:09:35', '2015-11-29 13:09:35', '', 'tablets', '', 'inherit', 'open', 'open', '', 'tablets-2', '', '', '2015-11-29 14:09:35', '2015-11-29 13:09:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/tablets1.png', 0, 'attachment', 'image/png', 0),
(888, 1, '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon', '', '', '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(1027, 1, '2015-11-30 01:48:29', '2015-11-30 00:48:29', '', 'ed2', '', 'inherit', 'open', 'open', '', 'ed2', '', '', '2015-11-30 01:48:29', '2015-11-30 00:48:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/ed2.png', 0, 'attachment', 'image/png', 0),
(1028, 1, '2015-11-30 01:53:09', '2015-11-30 00:53:09', '<ul>\r\n	<li>8 millas, de Hanson, Curtis; [direcció] Universal. V791.437 RAT</li>\r\n	<li>21 gramos, de González Iñárritu, Alejandro; [direcció]; Penn, Sean; Del Toro, Benicio; Watts, Naomi; [actors]. Universal. V791.437 GON</li>\r\n	<li>A cualquier otro lugar de Wang, Wayne; [direcció]. 20 Century Fox. V791.437 WAN</li>\r\n	<li>A.I. Inteligencia artificial, de Spielberg, Steven; [director i guionista]. Warner Home Video. V791.437 SPI</li>\r\n	<li>Amelie, de Jeunet, Jean-Pierre; [direcció]. Manga films. V791.43 JEU</li>\r\n	<li>American History X, de Kaye, Toni; [direcció]. Columbia Tristar Home Video. V791.437 KAY</li>\r\n	<li>Antz, de Darnell, Eric; Johson, Tim; [direcció]. DreamWorks and PDI Pictures, 2000. V087.1 DAR</li>\r\n	<li>Bailando con lobos, de Costner, Kevin; [director i intèrpret]. Filmax Home Video. V791.437 COS</li>\r\n	<li>Barrio, de León de Aranoa; [director]. Sogepaq. V791.437 LEO</li>\r\n	<li>Cadena de favores, Leder, Mimi; [director]. Warner Bross. V791.437 LED</li>\r\n	<li>Carros de fuego, de Hugh, Hudson; [director]. Fox Video. V791.437 HUD</li>\r\n	<li>Ciudadano Kane, de Welles; Orson; [direcció]. Manga films. V791.437 WEL</li>\r\n	<li>Cometas en el cielo, de Forster, Marc; [director]; Dream works pictures, 2008. V791.437 FOR</li>\r\n	<li>Como una imagen, de Jaoui, Agnès; [director]. Vértigo. V791.437JAO</li>\r\n	<li>Cobardes, Corbacho, José; Cruz, Juan; [direcció i guió]; Filmax, 2008. V791.437 COR</li>\r\n	<li>Crazy, de Vallée, Jean-Marc; [direcció]; Cameo, 2005. V791.437 VAL</li>\r\n	<li>Crazy in love (locos de amor), Nass, Peter; [direcció]; Filmax, 2008. V791.437 NAS</li>\r\n	<li>Dersu Uzala, de Kurosawwa, Akira; [director]. Divisa Home Video. V791.437 KUR</li>\r\n	<li>Descubriendo a Forrester, de Van Sant, Gus; [direcció]. Columbia Tristar 2000 V791.437 GUS</li>\r\n	<li>El bosque animado, de Cuerda, José Luis; [director]. Suevia Films. V791.437 CUE</li>\r\n	<li>El camino a casa, de Yimou, Zhang; [direcció]. Columbia Pictures, 1999. V791.437 YIM</li>\r\n	<li>El club de los poetas muertos, de Weir, Peter; [direcció]. Touchstone Home Video. V791.437 WEI</li>\r\n</ul>', 'Cinema i valors', 'Recull de pel·lícules la temàtica de les quals afavoreix el treball dels valors amb els alumnes, facilitant el desvetllament d''actituds vivències i compromisos en relació als diferents valors cívics i morals que sustenten la democràcia i el nostre sistema de convivència: diàleg, justícia, respecte, solidaritat, participació... \r\n', 'publish', 'open', 'open', '', 'cinema-i-valors', '', '', '2016-04-06 18:11:17', '2016-04-06 17:11:17', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=1028', 0, 'post', '', 0),
(1032, 1, '2015-11-30 02:04:24', '2015-11-30 01:04:24', '', 'films', '', 'inherit', 'open', 'open', '', 'films-2', '', '', '2015-11-30 02:04:24', '2015-11-30 01:04:24', '', 1028, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/films1.png', 0, 'attachment', 'image/png', 0),
(1038, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<strong>[title]</strong>\r\n[when]\r\n[location]\r\n<div>[description]</div>\r\n[link newwindow="yes"]Més detalls...[/link]', 'Calendari d''exemple', '', 'publish', 'closed', 'closed', '', 'se', '', '', '2016-09-21 10:41:11', '2016-09-21 08:41:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/gce_feed/institut-larany', 0, 'calendar', '', 0),
(1063, 1, '2015-11-30 09:50:51', '2015-11-30 08:50:51', '', 'El CREDA', '', 'publish', 'open', 'closed', '', 'el-servei-educatiu-2', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/el-servei-educatiu-2/', 1, 'nav_menu_item', '', 0),
(1077, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1077', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1077/', 3, 'nav_menu_item', '', 0),
(1078, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1078', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1078/', 2, 'nav_menu_item', '', 0),
(1079, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'closed', '', '1079', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1079/', 7, 'nav_menu_item', '', 0),
(1080, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'closed', '', '1080', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1080/', 4, 'nav_menu_item', '', 0),
(1087, 1, '2015-11-30 09:50:59', '2015-11-30 08:50:59', ' ', '', '', 'publish', 'open', 'closed', '', '1087', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1087/', 6, 'nav_menu_item', '', 0),
(1088, 1, '2015-11-30 09:50:59', '2015-11-30 08:50:59', ' ', '', '', 'publish', 'open', 'closed', '', '1088', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/1088/', 2, 'nav_menu_item', '', 0),
(1120, 1, '2015-11-30 13:18:34', '2015-11-30 12:18:34', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors', '', '', '2015-11-30 13:18:34', '2015-11-30 12:18:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/formadors/', 0, 'forum', '', 0),
(1133, 1, '2015-11-30 14:11:22', '2015-11-30 13:11:22', '', 'nodesweb', '', 'inherit', 'open', 'open', '', 'nodesweb', '', '', '2015-11-30 14:11:22', '2015-11-30 13:11:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/nodesweb.png', 0, 'attachment', 'image/png', 0),
(1140, 1, '2015-11-30 14:31:47', '2015-11-30 13:31:47', '', 'semtac', '', 'inherit', 'open', 'open', '', 'semtac', '', '', '2015-11-30 14:31:47', '2015-11-30 13:31:47', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/semtac.png', 0, 'attachment', 'image/png', 0),
(1147, 1, '2015-11-30 17:49:23', '2015-11-30 16:49:23', 'Node de coordinació dels seminaris TAC', 'TAC', '', 'publish', 'closed', 'open', '', 'tac', '', '', '2015-11-30 17:49:23', '2015-11-30 16:49:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/tac/', 0, 'forum', '', 0),
(1156, 1, '2015-11-30 18:04:03', '2015-11-30 17:04:03', 'Algun centre està fent servir Chromebooks? Què recomaneu? ', 'Chromebooks vs Notebooks', '', 'spam', 'closed', 'open', '', 'chromebooks-vs-notebooks', '', '', '2016-03-17 13:58:39', '2016-03-17 12:58:39', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/topic/chromebooks-vs-notebooks/', 0, 'topic', '', 0),
(1157, 1, '2015-11-30 18:05:19', '2015-11-30 17:05:19', 'Quin model de portàtil recomaneu? Tenim un presupost de 200 € màxim per alumne.', 'Model de portatil (ESO)', '', 'spam', 'closed', 'open', '', 'model-de-portatil-eso', '', '', '2016-03-17 13:58:29', '2016-03-17 12:58:29', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/topic/model-de-portatil-eso/', 0, 'topic', '', 0),
(1158, 1, '2015-11-30 18:13:20', '2015-11-30 17:13:20', '', '4026203944800', '', 'inherit', 'open', 'open', '', '4026203944800', '', '', '2015-11-30 18:13:20', '2015-11-30 17:13:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/4026203944800.jpg', 0, 'attachment', 'image/jpeg', 0),
(1160, 1, '2015-11-30 18:16:41', '2015-11-30 17:16:41', 'En què consisteix exactament? Marc, em vas dir que vosaltres estaveu molt contents... pots explicar-nos una mica com funciona? És gratuït?', 'Google Apps per educació', '', 'publish', 'closed', 'open', '', 'google-apps-per-educacio', '', '', '2015-11-30 18:16:41', '2015-11-30 17:16:41', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/topic/google-apps-per-educacio/', 0, 'topic', '', 0),
(1161, 1, '2015-11-30 18:23:49', '2015-11-30 17:23:49', 'Especialistes d&#039;educació física: coordinació jornades esportives, jocs tradicionals (intercentres)', 'Educació física', '', 'publish', 'closed', 'open', '', 'educacio-fisica', '', '', '2015-11-30 18:23:49', '2015-11-30 17:23:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/educacio-fisica/', 0, 'forum', '', 0),
(1162, 1, '2015-11-30 18:26:44', '2015-11-30 17:26:44', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'English', '', 'publish', 'closed', 'open', '', 'english', '', '', '2015-11-30 18:26:44', '2015-11-30 17:26:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/english/', 0, 'forum', '', 0),
(1163, 1, '2015-11-30 18:28:51', '2015-11-30 17:28:51', 'Especialistes matemàtiques: coordinació Olimpíades, fires, jornades matemàtiques (intercentres)', 'Matemàtiques', '', 'publish', 'closed', 'open', '', 'matematiques', '', '', '2015-11-30 18:28:51', '2015-11-30 17:28:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/matematiques/', 0, 'forum', '', 0),
(1164, 1, '2015-11-30 18:32:30', '2015-11-30 17:32:30', 'Especialistes música: jornades de danses, cantates... (intercentres)', 'Música', '', 'publish', 'closed', 'open', '', 'musica', '', '', '2015-11-30 18:32:30', '2015-11-30 17:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/musica/', 0, 'forum', '', 0),
(1165, 1, '2015-11-30 18:34:03', '2015-11-30 17:34:03', 'Node intercentres de Caps d&#039;estudis', 'Caps d&#039;estudi', '', 'private', 'closed', 'open', '', 'caps-destudi', '', '', '2015-11-30 18:34:03', '2015-11-30 17:34:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/caps-destudi/', 0, 'forum', '', 0),
(1166, 1, '2015-11-30 18:38:06', '2015-11-30 17:38:06', 'Node intercentres de Directors de centre', 'Directors', '', 'publish', 'closed', 'open', '', 'directors', '', '', '2015-11-30 18:38:06', '2015-11-30 17:38:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/directors/', 0, 'forum', '', 0),
(1167, 1, '2015-11-30 18:40:55', '2015-11-30 17:40:55', 'Elaboració de materials, traspàs d&#039;informació...', 'Primària-secundària', '', 'private', 'closed', 'open', '', 'primaria-secundaria', '', '', '2015-11-30 18:40:55', '2015-11-30 17:40:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/primaria-secundaria/', 0, 'forum', '', 0),
(1168, 1, '2015-11-30 18:49:49', '2015-11-30 17:49:49', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes col·laboratius', '', 'publish', 'closed', 'open', '', 'contes-col%c2%b7laboratius', '', '', '2015-11-30 18:49:49', '2015-11-30 17:49:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/contes-col%c2%b7laboratius/', 0, 'forum', '', 0),
(1169, 1, '2015-11-30 18:55:35', '2015-11-30 17:55:35', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes intercentres', '', 'publish', 'closed', 'open', '', 'contes-intercentres', '', '', '2015-11-30 18:55:35', '2015-11-30 17:55:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/contes-intercentres/', 0, 'forum', '', 0),
(1170, 1, '2015-11-30 19:06:26', '2015-11-30 18:06:26', 'Necessites un domini propi però, a part d''això, no té cap cost pel centre', '', '', 'publish', 'closed', 'open', '', '1170', '', '', '2015-11-30 19:06:26', '2015-11-30 18:06:26', '', 1160, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/reply/1170/', 1, 'reply', '', 0),
(1194, 1, '2015-12-01 09:52:07', '2015-12-01 08:52:07', '', 'biblioturu', '', 'inherit', 'open', 'open', '', 'biblioturu', '', '', '2015-12-01 09:52:07', '2015-12-01 08:52:07', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/biblioturu.png', 0, 'attachment', 'image/png', 0),
(1224, 1, '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon-2', '', '', '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(1225, 1, '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 'SEAltPenedes', '', 'inherit', 'open', 'open', '', 'sealtpenedes', '', '', '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/SEAltPenedes.jpg', 0, 'attachment', 'image/jpeg', 0),
(1236, 1, '2015-12-01 17:10:48', '2015-12-01 16:10:48', '', 'semostra', '', 'inherit', 'open', 'open', '', 'semostra', '', '', '2015-12-01 17:10:48', '2015-12-01 16:10:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/semostra.png', 0, 'attachment', 'image/png', 0),
(1237, 1, '2015-12-01 17:27:49', '2015-12-01 16:27:49', '', 'fulles_p', '', 'inherit', 'open', 'open', '', 'fulles_p', '', '', '2015-12-01 17:27:49', '2015-12-01 16:27:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/fulles_p.jpg', 0, 'attachment', 'image/jpeg', 0),
(1238, 1, '2015-12-01 17:44:37', '2015-12-01 16:44:37', '', 'matesman', '', 'inherit', 'open', 'open', '', 'matesman', '', '', '2015-12-01 17:44:37', '2015-12-01 16:44:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/matesman.png', 0, 'attachment', 'image/png', 0),
(1239, 1, '2015-12-01 17:48:15', '2015-12-01 16:48:15', '', 'scratchday', '', 'inherit', 'open', 'open', '', 'scratchday-2', '', '', '2015-12-01 17:48:15', '2015-12-01 16:48:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/scratchday.png', 0, 'attachment', 'image/png', 0),
(1240, 1, '2015-12-01 17:48:28', '2015-12-01 16:48:28', '', 'scratchdaty', '', 'inherit', 'open', 'open', '', 'scratchdaty', '', '', '2015-12-01 17:48:28', '2015-12-01 16:48:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/scratchdaty.png', 0, 'attachment', 'image/png', 0),
(1241, 1, '2015-12-01 17:54:12', '2015-12-01 16:54:12', '', 'nodesxarxa', '', 'inherit', 'open', 'open', '', 'nodesxarxa', '', '', '2015-12-01 17:54:12', '2015-12-01 16:54:12', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/nodesxarxa.png', 0, 'attachment', 'image/png', 0),
(1242, 1, '2015-12-01 18:06:25', '2015-12-01 17:06:25', 'Node per la coordinació dels serveis educatius', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu-2', '', '', '2015-12-01 18:06:25', '2015-12-01 17:06:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/servei-educatiu-2/', 0, 'forum', '', 0),
(1245, 1, '2015-12-01 18:18:50', '2015-12-01 17:18:50', '', 'turunadal', '', 'inherit', 'open', 'open', '', 'turunadal', '', '', '2015-12-01 18:18:50', '2015-12-01 17:18:50', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/turunadal.jpg', 0, 'attachment', 'image/jpeg', 0),
(1246, 1, '2015-12-02 10:44:20', '2015-12-02 09:44:20', '', 'nadal', '', 'inherit', 'open', 'open', '', 'nadal', '', '', '2015-12-02 10:44:20', '2015-12-02 09:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/12/nadal.png', 0, 'attachment', 'image/png', 0),
(1255, 1, '2015-12-02 11:54:55', '2015-12-02 10:54:55', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-2', '', '', '2015-12-02 11:54:55', '2015-12-02 10:54:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/formadors-2/', 0, 'forum', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1256, 1, '2015-12-02 11:56:45', '2015-12-02 10:56:45', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-3', '', '', '2015-12-02 11:56:45', '2015-12-02 10:56:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/forums/forum/formadors-3/', 0, 'forum', '', 0),
(1257, 1, '2015-12-02 12:11:37', '2015-12-02 11:11:37', '', 'mapa', '', 'inherit', 'open', 'open', '', 'mapa', '', '', '2015-12-02 12:11:37', '2015-12-02 11:11:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/mapa.png', 0, 'attachment', 'image/png', 0),
(5666, 1, '2016-03-15 17:54:10', '2016-03-15 16:54:10', '', 'lecturadigital', '', 'inherit', 'open', 'open', '', 'lecturadigital', '', '', '2016-03-15 17:54:10', '2016-03-15 16:54:10', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/01/lecturadigital.png', 0, 'attachment', 'image/png', 0),
(5668, 1, '2016-03-15 17:54:39', '2016-03-15 16:54:39', '', 'PFabra', '', 'inherit', 'open', 'open', '', 'pfabra', '', '', '2016-03-15 17:54:39', '2016-03-15 16:54:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/01/PFabra.png', 0, 'attachment', 'image/png', 0),
(6536, 1, '2016-01-14 17:56:30', '2016-01-14 16:56:30', '<a href="http://serveiseducatius.xtec.cat/se-baixllobregat6/wp-content/uploads/usu778/2016/01/curs-educació-fisica-incl.-1.jpg"><img class="alignnone size-large wp-image-6524" src="http://serveiseducatius.xtec.cat/se-baixllobregat6/wp-content/uploads/usu778/2016/01/curs-educació-fisica-incl.-1-1024x338.jpg" alt="curs-educació-fisica-incl.-1" width="1024" height="338" /></a>\r\n\r\n&nbsp;\r\n\r\nAquest taller formatiu s''adreça a fisioterapeutes, mestres i professors d’Educació Física d’escoles ordinàries que tenen algun alumne amb discapacitat física d’origen neurològic a les seves aules. L’objectiu d’aquesta formació és conèixer la filosofia de l’escola inclusiva i dotar de recursos teòrics i pràctics per tal d’ajudar a aplicar estratègies metodològiques que afavoreixin la inclusió de l’infant amb una discapacitat neurològica. Es tracta de modificar els jocs, els esports i les sessions d’educació física tradicional i fer-los aptes i divertits per a tothom.\r\n\r\n<strong>NÚMERO MÀXIM PERSONES INSCRITES</strong>: 30\r\n\r\n<strong>PROFESSORAT:  </strong>Jordi Finestres Alberola I  Carles Yepes Baldó (MestreS d’educació física).\r\n\r\n<strong>DATES: </strong>15 i 22 de febrer\r\n\r\n<strong>HORARI: </strong>de 17:30 a 19:30\r\n\r\n<strong>LLOC:  </strong>Escola Sant Josep Travessera de Barcelona, 78-82. Sant Vicenç dels Horts.\r\n<iframe src="https://www.google.com/maps/d/embed?mid=zOvrvwNsVUCg.kBGbAoel-Ynk&amp;hl=es" width="640" height="480"></iframe>\r\n\r\n<strong>INSCRIPCIONS:</strong> Cal clicar <strong><a href="https://aplicacions.ensenyament.gencat.cat/pls/soloas/pk_for_mod_ins.p_for_detall_activitat?p_header=Llista%20d%27activitats^pk_for_mod_ins.p_for_cons_activitats?p_crp=307%26p_any=2015-2016%26p_totes=S%26p_inici=41%26p_excloure_crp_rec=T&amp;p_codi=3070441307&amp;p_curs=2015-2016&amp;p_excloure_crp_rec=T" target="_blank">AQUÍ</a></strong> i tramitar-ho abans del 11 de febrer de 2016.\r\n\r\n<u></u><strong><u>Objectiu:</u></strong>\r\n\r\n<strong>Introduir els participants en </strong><strong>els fonaments teoricopràctics que els capacitin per impartir activitat física  inclusives en la qual pugui participar qualsevol persona, independentment de les seves habilitats motrius o cognitives i amb discapacitat  o sense.</strong>\r\n<ul>\r\n	<li>Donant a conèixer estratègies i estructures de sessió que facilitin la inclusió de les persones amb discapacitat en les sessions d’educació física en grups ordinaris.</li>\r\n</ul>\r\n<ul>\r\n	<li>Creant unitats didàctiques on tots els estudiats tinguin cabuda</li>\r\n</ul>\r\n<ul>\r\n	<li>Facilitant un marc de reflexió sobre la inclusió i normalització social mitjançant l''educació física.</li>\r\n</ul>\r\n<strong><u>Continguts:</u></strong>\r\n<ol>\r\n	<li>Coneixement de la discapacitat motriu</li>\r\n	<li>Coneixement de diferents metodologies per facilitar la inclusió</li>\r\n</ol>\r\n<strong>Per a les pràctiques de les dues sessions </strong>cal portar roba esportiva i sabatilles esportives.\r\n\r\n<strong><u>Estructura del curs</u></strong>\r\n\r\nEl curs constarà de 2 sessions de 2 hores que es distribuiran en part pràctica, 90% i teòric el 10%\r\n\r\n<strong>Part pràctica </strong>\r\n<ul>\r\n	<li>Estratègies i recursos en les sessions d’educació física</li>\r\n	<li>Estructura d’una sessió d’un grup/classe per arribar a tots els infants segons la diversitat de capacitats i el seu desenvolupament motor.</li>\r\n	<li>Realització de transferències terapèutiques usuàries de cadira de rodes i altres ortesis.</li>\r\n	<li>Estructura d’una programació d’educació física inclusiva</li>\r\n</ul>\r\n<strong>Part teòrica </strong>\r\n\r\nReflexió i posada en comú de la pràctica realitzada amb tots els participants.\r\n\r\n<strong>Objectius </strong>\r\n<ul>\r\n	<li>Conèixer la discapacitat motriu</li>\r\n	<li>Conèixer diferents transferències esportives dels infants amb discapacitat en diferents espais.</li>\r\n	<li>Aprendre adaptacions i orientacions didàctiques que facilitin la participació de tothom</li>\r\n</ul>\r\n<table style="height: 893px;" width="933">\r\n<tbody>\r\n<tr>\r\n<td colspan="3" width="576"><strong>1a. SESSIÓ,  dia 15 de febrer de 2016</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>17:30 a 18:00</strong></td>\r\n<td width="389">Presentació</td>\r\n<td width="95">Teoria</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>18:00 a 18:30</strong></td>\r\n<td width="389">Jocs de ritme i moviment</td>\r\n<td width="95">Pràctica</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>18:30a 19:00</strong></td>\r\n<td width="389">Transferències terapèutiques esportives amb alumnes amb gran discapacitat</td>\r\n<td width="95">Pràctica</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>19:00 a 19:30</strong></td>\r\n<td width="389">Playing together (pensa, comparteix i actua)</td>\r\n<td width="95"><strong>Pràctica</strong></td>\r\n</tr>\r\n<tr>\r\n<td colspan="3" width="576"><strong>2a. SESSIÓ,  dia 22 de febrer de 2016</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>17:30 a 18:00</strong></td>\r\n<td width="389">Jocs motrius per a tots</td>\r\n<td width="95">Pràctic</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>18:00 a 18:30</strong></td>\r\n<td width="389">Atletisme col·lectiu</td>\r\n<td width="95">Pràctic</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>18:30 a 19:00 </strong></td>\r\n<td width="389">Acrosport</td>\r\n<td width="95">Pràctic</td>\r\n</tr>\r\n<tr>\r\n<td width="92"><strong>19:00 a 19:30</strong></td>\r\n<td width="389">Avaluació i reflexió dels tallers</td>\r\n<td width="95">Pràctic</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong> </strong>', 'Workshop d’inclusió', '', 'publish', 'open', 'open', '', 'workshop-dinclusio', '', '', '2016-04-06 18:11:48', '2016-04-06 17:11:48', '', 0, 'http://serveiseducatius.xtec.cat/se-baixllobregat6/?p=6536', 0, 'post', '', 0),
(6639, 1, '2016-01-20 11:12:17', '2016-01-20 10:12:17', '<div><a href="http://serveiseducatius.xtec.cat/se-baixllobregat6/wp-content/uploads/usu778/2016/01/1pedagogiasocialcongresgirona.jpg"><img class="alignleft wp-image-6640" src="http://serveiseducatius.xtec.cat/se-baixllobregat6/wp-content/uploads/usu778/2016/01/1pedagogiasocialcongresgirona.jpg" alt="1pedagogiasocialcongresgirona" width="520" height="221" /></a></div>\r\n<div></div>\r\n<div></div>\r\n<div>L''estratègia europea per a la joventut atorga rellevància al disseny de polítiques i estratègies d''intervenció basades en evidències concretes, experiència i coneixement sobre la situació dels i les joves, el seu benestar, la seva qualitat de vida i les oportunitats per a prendre part activa en la societat. En aquest congrés pretenem centrar l''atenció en aquelles aportacions i experiències que tenen com a protagonistes o destinataris preferents els i les joves. El sistema econòmic i financer en els darrers anys ha posat en una situació molt difícil a aquest col·lectiu, un dels més afectats i que més ha patit les conseqüències dels retrocessos en polítiques socials. La seva situació s''associa a precarietat, provisionalitat i incertesa.\r\nLa pedagogia social com a disciplina acadèmica ha projectat la seva reflexió i les seves accions cap a múltiples programes i serveis socials. En les últimes dècades ha evidenciat l''oportunitat —i en ocasions la necessitat— d''estendre la reflexió pedagògica cap a contextos diferents d’aquells que s’havien considerat com a típics o propis de la pedagogia. D''aquesta manera, la pedagogia social s’ha introduït en àmbits com el lleure, els mitjans de comunicació, el món del treball, el sector cultural, la salut, l''urbanisme, etc.</div>\r\n<div></div>\r\n<div>Davant d''aquesta situació el <strong>Congrés Internacional-XXIX Seminari Interuniversitari</strong> de Pedagogia Social proposa reflexionar i formular propostes concretes que permetin avançar en la reflexió sobre la joventut, els programes i serveis que s’hi adrecen i el seu paper en les transformacions socials. Es vol debatre quins han de ser els mitjans i recursos que ens permetin oferir als i a les joves les millors condicions per al seu apoderament. Justament quan aquesta idea adquireix més presència en els documents programàtics dels governs, institucions i serveis, és quan sembla que el col·lectiu dels i les joves queda més desprotegit i allunyat dels espais i processos que simbolitzen el poder en la nostra societat, i entre els més evidents el treball i l''habitatge. Quines implicacions comporta assumir com a repte l''empoderament juvenil? Quines transformacions socials requereix i quines pot provocar? Quines polítiques de joventut i programes socioeducatius ens poden ajudar a promoure’l? Amb quina formació i amb quin tipus de professionals comptem per a fer-ho?</div>\r\n<div></div>\r\n<div>Aquestes i altres qüestions relacionades amb la joventut, la pedagogia social i les transformacions socials seran motiu de reflexió i anàlisi des de diferents perspectives i enfocaments durant aquest congrés.</div>\r\n<div></div>\r\n<div></div>\r\n<div>|<a href="http://eventum.upf.edu/event_detail/2141/detail/congres-pedagogia-social-joventut-i-transformacions-socials.html" target="_blank">ACCÉS AL WEB DEL CONGRÉS INTERNACIONAL</a>|</div>', 'Pedagogia social, joventut i transformacions social', '', 'publish', 'open', 'open', '', 'pedagogia-social-joventut-i-transformacions-social-congres-internacional', '', '', '2016-04-04 14:35:31', '2016-04-04 13:35:31', '', 0, 'http://serveiseducatius.xtec.cat/se-baixllobregat6/?p=6639', 0, 'post', '', 0),
(8066, 1, '2016-03-15 18:09:35', '2016-03-15 17:09:35', '', '1apsc932015', '', 'inherit', 'open', 'open', '', '1apsc932015', '', '', '2016-03-15 18:09:35', '2016-03-15 17:09:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/03/1apsc932015.jpg', 0, 'attachment', 'image/jpeg', 0),
(8071, 1, '2016-03-15 18:21:14', '2016-03-15 17:21:14', '', 'saloensenyament2016-1024x299', '', 'inherit', 'open', 'open', '', 'saloensenyament2016-1024x299', '', '', '2016-03-15 18:21:14', '2016-03-15 17:21:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/02/saloensenyament2016-1024x299.png', 0, 'attachment', 'image/png', 0),
(8073, 1, '2016-03-15 18:21:52', '2016-03-15 17:21:52', '', '1alogo-itworld-edu-web', '', 'inherit', 'open', 'open', '', '1alogo-itworld-edu-web', '', '', '2016-03-15 18:21:52', '2016-03-15 17:21:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/02/1alogo-itworld-edu-web.png', 0, 'attachment', 'image/png', 0),
(8075, 1, '2016-03-15 18:22:28', '2016-03-15 17:22:28', '', '1congresbaixllob', '', 'inherit', 'open', 'open', '', '1congresbaixllob', '', '', '2016-03-15 18:22:28', '2016-03-15 17:22:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/02/1congresbaixllob.jpg', 0, 'attachment', 'image/jpeg', 0),
(8077, 1, '2016-03-15 18:23:01', '2016-03-15 17:23:01', '', '1pedagogiasocialcongresgirona', '', 'inherit', 'open', 'open', '', '1pedagogiasocialcongresgirona', '', '', '2016-03-15 18:23:01', '2016-03-15 17:23:01', '', 6639, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/01/1pedagogiasocialcongresgirona.jpg', 0, 'attachment', 'image/jpeg', 0),
(8079, 1, '2016-03-15 18:23:33', '2016-03-15 17:23:33', '', '1marcllenguesvives', '', 'inherit', 'open', 'open', '', '1marcllenguesvives', '', '', '2016-03-15 18:23:33', '2016-03-15 17:23:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/01/1marcllenguesvives.jpg', 0, 'attachment', 'image/jpeg', 0),
(8082, 1, '2016-03-16 10:06:35', '2016-03-16 09:06:35', '', 'curs-educació-fisica-incl.-1-1024x338', '', 'inherit', 'open', 'open', '', 'curs-educacio-fisica-incl-1-1024x338', '', '', '2016-03-16 10:06:35', '2016-03-16 09:06:35', '', 6536, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/01/curs-educació-fisica-incl.-1-1024x338.jpg', 0, 'attachment', 'image/jpeg', 0),
(8086, 1, '2016-03-16 10:08:04', '2016-03-16 09:08:04', '', 'trobadainfantil', '', 'inherit', 'open', 'open', '', 'trobadainfantil', '', '', '2016-03-16 10:08:04', '2016-03-16 09:08:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/06/trobadainfantil.png', 0, 'attachment', 'image/png', 0),
(8140, 1, '2016-04-01 14:00:46', '2016-04-01 13:00:46', 'El nostre equip multidisciplinar ofereix els serveis que trobareu a continuació:\r\n<ul>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Atenció logopèdica a alumnes amb deficiencia auditiva o amb transtorn de llenguatge.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Exploració psicolingüística dels alumnes atesos pel CREDA.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Acolliment familiar per a pares d''alumnes amb deficiencia auditiva.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Assessoraments al centres escolars on hi hagi matriculats alumnes amb pèrdua auditiva o amb trastorn de llenguatge.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Col·laboració amb l''EAP per decidir si un alumne és creditor d''atenció del CREDA.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Valoració audiològica dels alumnes amb sospita o amb diagnòstic de pèrdua auditiva.</span></li>\r\n	<li><span style="font-family: Arial,Helvetica,sans-serif; font-size: medium;">Revisions audioprotètiques de tots els alumnes amb prótesis auditives, estiguin o no atesos pel servei de logopèdia.</span></li>\r\n</ul>\r\n&nbsp;', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2016-05-31 11:07:34', '2016-05-31 10:07:34', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8140', 30, 'page', '', 0),
(8142, 1, '2016-04-01 14:01:50', '2016-04-01 13:01:50', ' ', '', '', 'publish', 'open', 'closed', '', '8142', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8142', 5, 'nav_menu_item', '', 0),
(8153, 1, '2016-04-04 10:27:55', '2016-04-04 09:27:55', '<img class="  wp-image-36 alignright" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple3b.png" alt="exemple3b" width="271" height="203" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl in felis scelerisque consectetur et in purus. Donec vitae massa id sem placerat elementum. Nunc ultrices mauris augue, quis posuere leo tempor in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus a vulputate lectus. Praesent et urna dolor. Pellentesque sollicitudin justo non nisi finibus, eget scelerisque ante consectetur. Proin scelerisque dui quis dolor imperdiet porttitor. Morbi neque mi, molestie quis justo sit amet, condimentum faucibus felis. Praesent sit amet erat eget risus faucibus tempus at eget lectus. Proin molestie felis sem, vel tempor nisi volutpat in. Ut sapien velit, pharetra vitae porttitor ut, fringilla at enim. Vivamus a malesuada mauris.\r\n\r\nVivamus sagittis justo non nisl bibendum convallis. Nulla condimentum nisi ultrices, scelerisque nunc a, egestas ligula. Mauris sed dui hendrerit, pharetra lectus sit amet, euismod urna. Aenean ante massa, malesuada quis viverra a, fermentum at enim. Ut egestas ante ac enim vehicula, et pulvinar mauris sagittis. Cras leo libero, tempor et nunc vitae, sodales porta ligula. Cras viverra a augue ut placerat. Praesent hendrerit ex non luctus scelerisque. Mauris est sem, egestas eget euismod ut, ultrices in ligula. Cras feugiat tellus sed diam dignissim, nec commodo neque iaculis. Morbi vitae varius massa. Ut quis dolor a libero auctor mattis vel quis nisl. Suspendisse congue mi est, id consequat felis placerat efficitur.\r\n\r\n&nbsp;', 'Marc d''actuació', '', 'publish', 'closed', 'closed', '', 'marc-dactuacio', '', '', '2016-04-04 10:27:55', '2016-04-04 09:27:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8153', 0, 'page', '', 0),
(8156, 1, '2016-04-04 11:02:23', '2016-04-04 10:02:23', '', 'creda', '', 'inherit', 'open', 'open', '', 'creda', '', '', '2016-04-04 11:02:23', '2016-04-04 10:02:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/creda.png', 0, 'attachment', 'image/png', 0),
(8157, 1, '2016-04-04 11:05:26', '2016-04-04 10:05:26', '', 'creda', '', 'inherit', 'open', 'open', '', 'creda-2', '', '', '2016-04-04 11:05:26', '2016-04-04 10:05:26', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/creda1.png', 0, 'attachment', 'image/png', 0),
(8159, 1, '2016-04-04 11:10:46', '2016-04-04 10:10:46', ' ', '', '', 'publish', 'open', 'closed', '', '8159', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8159', 15, 'nav_menu_item', '', 0),
(8161, 1, '2016-04-04 11:10:46', '2016-04-04 10:10:46', ' ', '', '', 'publish', 'open', 'closed', '', '8161', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8161', 17, 'nav_menu_item', '', 0),
(8162, 1, '2016-04-04 11:10:46', '2016-04-04 10:10:46', ' ', '', '', 'publish', 'open', 'closed', '', '8162', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8162', 18, 'nav_menu_item', '', 0),
(8163, 1, '2016-04-04 11:10:46', '2016-04-04 10:10:46', ' ', '', '', 'publish', 'open', 'closed', '', '8163', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8163', 16, 'nav_menu_item', '', 0),
(8166, 1, '2016-04-04 12:10:37', '2016-04-04 11:10:37', ' ', '', '', 'publish', 'open', 'open', '', '8166', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8166', 3, 'nav_menu_item', '', 0),
(8167, 1, '2016-04-04 12:10:37', '2016-04-04 11:10:37', ' ', '', '', 'publish', 'open', 'open', '', '8167', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8167', 5, 'nav_menu_item', '', 0),
(8168, 1, '2016-04-04 12:10:37', '2016-04-04 11:10:37', ' ', '', '', 'publish', 'open', 'open', '', '8168', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8168', 4, 'nav_menu_item', '', 0),
(8169, 1, '2016-04-04 12:10:37', '2016-04-04 11:10:37', ' ', '', '', 'publish', 'open', 'open', '', '8169', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8169', 6, 'nav_menu_item', '', 0),
(8171, 1, '2016-04-04 12:17:03', '2016-04-04 11:17:03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl in felis scelerisque consectetur et in purus. Donec vitae massa id sem placerat elementum. Nunc ultrices mauris augue, quis posuere leo tempor in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus a vulputate lectus. Praesent et urna dolor.\r\n<ol>\r\n	<li><a href="#">Pellentesque sollicitudin</a> justo non nisi finibus, eget scelerisque ante consectetur.</li>\r\n	<li><a href="#">Proin scelerisque</a> dui quis dolor imperdiet porttitor.</li>\r\n	<li><a href="#">Morbi neque</a> mi, molestie quis justo sit amet, condimentum faucibus felis.</li>\r\n	<li><a href="#">Praesent sit amet erat</a> eget risus faucibus tempus at eget lectus. Proin molestie felis sem, vel tempor nisi volutpat in. Ut sapien velit, pharetra vitae porttitor ut, fringilla at enim. Vivamus a malesuada mauris.</li>\r\n</ol>\r\nVivamus sagittis justo non nisl bibendum convallis. Nulla condimentum nisi ultrices, scelerisque nunc a, egestas ligula. Mauris sed dui hendrerit, pharetra lectus sit amet, euismod urna. Aenean ante massa, malesuada quis viverra a, fermentum at enim. Ut egestas ante ac enim vehicula, et pulvinar mauris sagittis. Cras leo libero, tempor et nunc vitae, sodales porta ligula. Cras viverra a augue ut placerat. Praesent hendrerit ex non luctus scelerisque. Mauris est sem, egestas eget euismod ut, ultrices in ligula. Cras feugiat tellus sed diam dignissim, nec commodo neque iaculis. Morbi vitae varius massa. Ut quis dolor a libero auctor mattis vel quis nisl. Suspendiss<img class=" size-full wp-image-355 alignright" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2015/11/eap2.png" alt="eap2" width="254" height="114" />e congue mi est, id consequat felis placerat efficitur.', 'Famílies', '', 'publish', 'closed', 'closed', '', 'families', '', '', '2016-04-04 12:30:49', '2016-04-04 11:30:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8171', 0, 'page', '', 0),
(8173, 1, '2016-04-04 12:18:41', '2016-04-04 11:18:41', '<strong>Com se seleccionen els alumnes que s''atenen al CREDA?</strong>\r\n\r\nEls EAP dels Serveis Educatius de cada zona deriven els alumnes a través d''un protocol que inclou:\r\n<ul>\r\n	<li>una mostra escrita del llenguatge oral de l''alumne</li>\r\n	<li>un recull de dades sobre l''escolarització i les capacitats de l''alumne.</li>\r\n</ul>\r\nEls psicopedagogs del CREDA i de l''EAP prioritzen, de totes les demandes rebudes, els alumnes que s''atendran el curs vinent, segons la gravetat del cas i la disponibilitat del servei.\r\n\r\nAl llarg del curs la detecció d''alumnes amb sordesa pregona pot fer variar el pla d''actuació d''alguna logopeda. Aquests alumnes es prioritzen per sobre de tots els altres i s''atenen des del mateix moment de la seva detecció.\r\n\r\nEl infants de 0 a 3 anys amb diagnòstic de pèrdua auditiva (ORL) la família, el CDIAP o l’EAP poden accedir directament al CREDA.\r\n\r\n&nbsp;\r\n\r\n<strong>Quins models d''escolarització poden escollir els pares?</strong>\r\n\r\nEls pares dels alumnes amb sordesa poden optar per dos models d’escolarització que fan referència a l’aprenentatge de la llengua i l’accés a l’aprenentatge en modalitat oral o bilingüe. Veieu la pàgina <a href="https://pwc-int.educacio.intranet/agora/mastercreda/families/orientacions/modalitats-descolaritzacio/">modalitats d''escolarització</a>.\r\n\r\n&nbsp;\r\n\r\n<strong>Orientacions per al treball a casa</strong>\r\n\r\nA continuació hi trobareu informació sobre possibles actuacions per fer a casa:\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/ORIENTACIONS_FAMILIA_1.pdf">Pautes sobre com ajudar a desenvolupar les habilitats auditives</a>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/aprendre_respirar_bufar_mocar.pdf">Aprendre a respirar, bufar i mocar-se</a>', 'Orientacions i informació', '', 'publish', 'closed', 'closed', '', 'orientacions', '', '', '2016-05-17 14:20:00', '2016-05-17 13:20:00', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8173', 0, 'page', '', 0),
(8175, 1, '2016-04-04 12:18:56', '2016-04-04 11:18:56', 'A continuació hi podreu trobar diverses guies per famílies que us poden interessar:\r\n\r\n<a href="http://treballiaferssocials.gencat.cat/web/.content/01departament/08publicacions/ambits_tematics/discapacitat/12sordsprofunds/sords_profunds.pdf" target="_blank"><img class=" wp-image-8438 alignleft" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/sords_profunds.png" alt="sords_profunds" width="150" height="140" /></a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n<a href="http://treballiaferssocials.gencat.cat/web/.content/01departament/08publicacions/ambits_tematics/discapacitat/12sordsprofunds/sords_profunds.pdf">\r\nSords profunds però hi sentim i parlem</a>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/perdua-auditiva.png"><img class=" wp-image-8504 size-thumbnail alignleft" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/perdua-auditiva-150x150.png" alt="perdua auditiva" width="150" height="150" /></a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n<a href="http://www.hsjdbcn.org/polymitaImages/public/consells/2015/2015_02_18_consell_perdua_auditiva_HSJD_CREDAV_cat.pdf">\r\nEl meu fill té una pèrdua auditiva. Informació per a les famílies</a>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_tartamudesa.png"><img class=" wp-image-8505 size-thumbnail alignleft" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_tartamudesa-150x150.png" alt="guia_tartamudesa" width="150" height="150" /></a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n<a href="http://ensenyament.gencat.cat/web/.content/home/departament/publicacions/colleccions/guia-families/tartamudesa/guia_famil_fills_tartamudesa.pdf">\r\nGuia per a famílies d''infants amb tartamudesa</a>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_sordceguesa.png"><img class=" wp-image-8507 size-thumbnail alignleft" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_sordceguesa-150x150.png" alt="guia_sordceguesa" width="150" height="150" /></a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n<a href="http://ensenyament.gencat.cat/web/.content/home/departament/publicacions/colleccions/guia-families/sordesa/guia_famil_fills_sordceguesa.pdf">Guia per a famílies d''infants amb sordesa o sordceguesa</a>', 'Guies', '', 'publish', 'closed', 'closed', '', 'guies', '', '', '2016-05-10 10:36:22', '2016-05-10 09:36:22', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8175', 0, 'page', '', 0),
(8179, 1, '2016-04-04 12:24:25', '2016-04-04 11:24:25', ' ', '', '', 'publish', 'open', 'closed', '', '8179', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8179', 23, 'nav_menu_item', '', 0),
(8180, 1, '2016-04-04 12:24:25', '2016-04-04 11:24:25', ' ', '', '', 'publish', 'open', 'closed', '', '8180', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8180', 21, 'nav_menu_item', '', 0),
(8182, 1, '2016-04-04 12:29:44', '2016-04-04 11:29:44', '', 'menorca_jmeler', '', 'inherit', 'open', 'open', '', 'menorca_jmeler', '', '', '2016-04-04 12:29:44', '2016-04-04 11:29:44', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/menorca_jmeler.jpg', 0, 'attachment', 'image/jpeg', 0),
(8188, 1, '2016-04-04 12:38:33', '2016-04-04 11:38:33', ' ', '', '', 'publish', 'open', 'open', '', '8188', '', '', '2016-05-17 14:24:36', '2016-05-17 13:24:36', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8188', 3, 'nav_menu_item', '', 0),
(8189, 1, '2016-04-04 12:38:33', '2016-04-04 11:38:33', ' ', '', '', 'publish', 'open', 'open', '', '8189', '', '', '2016-05-17 14:24:36', '2016-05-17 13:24:36', '', 8171, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8189', 1, 'nav_menu_item', '', 0),
(8194, 1, '2016-04-04 13:32:46', '2016-04-04 12:32:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl in felis scelerisque consectetur et in purus. Donec vitae massa id sem placerat elementum.\r\n\r\nhttps://www.youtube.com/watch?v=RcOAlq3IxNM\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et nisl in felis scelerisque consectetur et in purus. Donec vitae massa id sem placerat elementum.', 'Festa de nadal', '', 'publish', 'open', 'open', '', 'festa-de-nadal', '', '', '2016-04-07 08:43:25', '2016-04-07 07:43:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8194', 0, 'post', '', 0),
(8195, 1, '2016-04-04 13:32:19', '2016-04-04 12:32:19', '', 'Selecció_999(181)', '', 'inherit', 'open', 'open', '', 'seleccio_999181', '', '', '2016-04-04 13:32:19', '2016-04-04 12:32:19', '', 8194, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999181.png', 0, 'attachment', 'image/png', 0),
(8198, 1, '2016-04-04 13:33:40', '2016-04-04 12:33:40', ' ', '', '', 'publish', 'open', 'closed', '', '8198', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8198', 27, 'nav_menu_item', '', 0),
(8200, 1, '2016-04-06 16:00:16', '2016-04-06 15:00:16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'L''orella que no xiulava', 'Us recomanem el llibre infantil "L''orella que no xiulava", escrit per una logopeda del CREDAC Pere Barnils, la Carme Roig, juntament amb la Carme Mundet i la Carme Comas. \r\n', 'publish', 'open', 'open', '', 'lorella-que-no-xiulava', '', '', '2016-05-09 09:13:25', '2016-05-09 08:13:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8200', 0, 'post', '', 0),
(8201, 1, '2016-04-04 13:39:13', '2016-04-04 12:39:13', '', 'Selecció_999(182)', '', 'inherit', 'open', 'open', '', 'seleccio_999182', '', '', '2016-04-04 13:39:13', '2016-04-04 12:39:13', '', 8200, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999182.png', 0, 'attachment', 'image/png', 0),
(8206, 1, '2016-04-04 14:31:02', '2016-04-04 13:31:02', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple1b.png"><img class="alignnone size-full wp-image-33" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2014/09/exemple1b.png" alt="exemple1b" width="350" height="250" /></a>', 'Trobada d''inici de curs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. ', 'publish', 'open', 'open', '', 'trobada-dinici-de-curs', '', '', '2016-04-07 08:43:41', '2016-04-07 07:43:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8206', 0, 'post', '', 0),
(8208, 1, '2016-04-04 14:31:48', '2016-04-04 13:31:48', '', 'Trobada d''inici de curs', '', 'publish', 'open', 'closed', '', 'trobada-dinici-de-curs', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8208', 26, 'nav_menu_item', '', 0),
(8209, 1, '2016-04-04 14:32:16', '2016-04-04 13:32:16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. Morbi consequat erat dui, in feugiat est consectetur vitae. Praesent vel sapien eleifend, condimentum turpis non, sodales dolor. In malesuada ipsum massa, vel scelerisque augue rutrum ac. Pellentesque consectetur aliquet lacinia. Nam condimentum sapien non lectus fringilla, ac feugiat nunc egestas.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/1EWG.png"><img class="alignnone size-large wp-image-8379" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/1EWG-1024x600.png" alt="1EWG" width="1024" height="600" /></a>\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.', 'Creació d''avatars', '', 'publish', 'open', 'open', '', 'creacio-davatars', '', '', '2016-04-06 18:07:21', '2016-04-06 17:07:21', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8209', 0, 'post', '', 0),
(8213, 1, '2016-04-05 08:35:27', '2016-04-05 07:35:27', '', 'Creació d''avatars', '', 'publish', 'open', 'closed', '', 'creacio-davatars', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8213', 28, 'nav_menu_item', '', 0),
(8236, 1, '2016-04-05 09:26:59', '2016-04-05 08:26:59', '', 'FAMÍLIES', '', 'publish', 'open', 'closed', '', 'families-2', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8236', 20, 'nav_menu_item', '', 0),
(8237, 1, '2016-04-05 09:28:11', '2016-04-05 08:28:11', '', 'ALUMNES', '', 'publish', 'open', 'closed', '', 'alumnes-2', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8237', 25, 'nav_menu_item', '', 0),
(8238, 1, '2016-04-05 09:29:31', '2016-04-05 08:29:31', '', 'PROFESSIONALS', '', 'publish', 'open', 'closed', '', 'professionals-2', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8238', 9, 'nav_menu_item', '', 0),
(8239, 1, '2016-04-05 12:04:40', '2016-04-05 11:04:40', 'Hem trobat al Blog de la <a href="http://natibergada.cat/" target="_blank">Nati Bergadà</a> un recull de contes per treballar els següents valors:\r\nAprendre a ser i a pensar (Autoconeixement, autoestima, les emocions, el diàleg, habilitats de reflexió…)\r\nAprendre a actuar de manera autònoma i coherent (Autonomia, cultura de l’esforç, responsabilitat…)\r\nAprendre a conviure (Empatia, habilitats socials, cooperació, solidaritat, altruisme, amistat, resolució de conflictes, mediació, tolerància i respecte, convivència…)\r\nAprendre a ser ciutadans responsables en un món global (Justícia, igualtat, llibertat, equitat, no discriminació…)\r\n\r\nTrobem molt interessant el recull i creiem que molts els podem trobar a les biblioteques de les escoles, ja que molts són coneguts.\r\n\r\nGràcies Nati!', '60 contes per treballar els valors', '', 'publish', 'open', 'open', '', '60-contes-per-treballar-els-valors', '', '', '2016-05-09 09:13:25', '2016-05-09 08:13:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8239', 0, 'post', '', 0),
(8240, 1, '2016-04-05 12:03:49', '2016-04-05 11:03:49', '', 'f', '', 'inherit', 'open', 'open', '', 'f', '', '', '2016-04-05 12:03:49', '2016-04-05 11:03:49', '', 8239, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/f.png', 0, 'attachment', 'image/png', 0),
(8242, 1, '2016-04-05 12:07:00', '2016-04-05 11:07:00', '', 'prof', '', 'inherit', 'open', 'open', '', 'prof', '', '', '2016-04-05 12:07:07', '2016-04-05 11:07:07', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/prof.png', 0, 'attachment', 'image/png', 0),
(8243, 1, '2016-04-05 12:08:54', '2016-04-05 11:08:54', '', 'tutoria', '', 'inherit', 'open', 'open', '', 'tutoria', '', '', '2016-04-05 12:08:54', '2016-04-05 11:08:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/tutoria.jpg', 0, 'attachment', 'image/jpeg', 0),
(8244, 1, '2016-04-05 12:10:19', '2016-04-05 11:10:19', '', 'equipdirectiu', '', 'inherit', 'open', 'open', '', 'equipdirectiu', '', '', '2016-04-05 12:10:19', '2016-04-05 11:10:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/equipdirectiu.jpg', 0, 'attachment', 'image/jpeg', 0),
(8245, 1, '2016-04-05 12:24:00', '2016-04-05 11:24:00', 'Us recomanem aquesta <a href="http://www.ub.edu/sonscatala/ca" target="_blank">adreça</a> d''internet on podreu trobar un conjunt de recursos i materials que s’han elaborat per assolir els objectius següents:\r\n<ul>\r\n	<li>Facilitar l’ensenyament de la fonètica i la fonologia catalanes en totes aquelles assignatures de l’ensenyament superior, de l’ensenyament secundari i d’altres ensenyaments que tenen aquesta disciplina per objecte d’estudi o mitjà de treball.</li>\r\n	<li>Afavorir que l’alumnat pugui aprendre aquesta disciplina de manera autònoma, d’acord amb les directrius de l’Espai Europeu d’Educació Superior.</li>\r\n	<li>Millorar l’ensenyament del català com a llengua estrangera.</li>\r\n</ul>', 'Els sons del català', '', 'publish', 'open', 'open', '', 'els-sons-del-catala', '', '', '2016-04-06 10:56:39', '2016-04-06 09:56:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8245', 0, 'post', '', 0),
(8246, 1, '2016-04-05 12:23:26', '2016-04-05 11:23:26', '', 'logosonscatala', '', 'inherit', 'open', 'open', '', 'logosonscatala', '', '', '2016-04-05 12:23:26', '2016-04-05 11:23:26', '', 8245, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/logosonscatala.png', 0, 'attachment', 'image/png', 0),
(8248, 1, '2016-04-05 12:31:22', '2016-04-05 11:31:22', '', 'nena', '', 'inherit', 'open', 'open', '', 'nena', '', '', '2016-04-05 12:31:22', '2016-04-05 11:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/nena.jpg', 0, 'attachment', 'image/jpeg', 0),
(8249, 1, '2016-04-05 12:31:37', '2016-04-05 11:31:37', '', 'Selecció_999(185)', '', 'inherit', 'open', 'open', '', 'seleccio_999185', '', '', '2016-04-05 12:31:37', '2016-04-05 11:31:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999185.png', 0, 'attachment', 'image/png', 0),
(8250, 1, '2016-04-05 12:31:38', '2016-04-05 11:31:38', '', 'Selecció_999(184)', '', 'inherit', 'open', 'open', '', 'seleccio_999184', '', '', '2016-04-05 12:31:38', '2016-04-05 11:31:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999184.png', 0, 'attachment', 'image/png', 0),
(8251, 1, '2016-04-05 12:31:38', '2016-04-05 11:31:38', '', 'Selecció_999(183)', '', 'inherit', 'open', 'open', '', 'seleccio_999183', '', '', '2016-04-05 12:31:38', '2016-04-05 11:31:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999183.png', 0, 'attachment', 'image/png', 0),
(8253, 1, '2016-04-06 10:40:13', '2016-04-06 09:40:13', 'https://vimeo.com/63820597\r\n\r\nUs volem presentar un vídeo anomenat: "Paraules des del silenci", on surt una ex-alumna del CREDA Jordi Perelló. És prou interessant.', 'Paraules des del silenci', '', 'publish', 'open', 'open', '', 'paraules-des-del-silenci', '', '\nhttps://vimeo.com/63820597', '2016-05-09 12:05:04', '2016-05-09 11:05:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8253', 0, 'post', '', 0),
(8254, 1, '2016-04-05 12:40:10', '2016-04-05 11:40:10', '', 'Selecció_999(186)', '', 'inherit', 'open', 'open', '', 'seleccio_999186', '', '', '2016-04-05 12:40:10', '2016-04-05 11:40:10', '', 8253, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999186.png', 0, 'attachment', 'image/png', 0),
(8257, 1, '2016-04-07 10:55:46', '2016-04-07 09:55:46', 'Amb motiu de la celebració del dia 6 de març, dia europeu de la logopèdia, la FUB organitza una jornada de formació amb el títol: "Atenció compartida".\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15.jpg"><img class="alignnone size-full wp-image-8258" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15.jpg" alt="15" width="629" height="192" /></a>\r\n\r\n<a href="http://efc.fub.edu/index.php?action=curs&amp;name=atenci-compartida&amp;id=2013LOGJOR_&amp;lang=ca">Més informació</a>', 'Jornada FUB Atenció Compartida', '', 'publish', 'open', 'open', '', '6-de-marc-dia-europeu-de-la-logopedia-jornada-fub-atencio-compartida', '', '', '2016-04-12 16:36:58', '2016-04-12 15:36:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8257', 0, 'post', '', 0),
(8258, 1, '2016-04-06 08:58:37', '2016-04-06 07:58:37', '', '15', '', 'inherit', 'open', 'open', '', '15', '', '', '2016-04-06 08:58:37', '2016-04-06 07:58:37', '', 8257, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15.jpg', 0, 'attachment', 'image/jpeg', 0),
(8260, 1, '2016-04-06 09:01:36', '2016-04-06 08:01:36', 'Amb data d''ahir dia 8 de maig, al diari electrònic d''ABC, va sortir publicada una notícia en la que es parla de com la neurociència pot ajudar a diagnosticar de manera efectiva i localitzada els trastorns de llenguatge, detectant les parts afectades. En Víctor Acosta explica aquest fet i les perspectives que hi ha respecte al tema.\r\n\r\nUs deixem aquí la notícia:\r\n\r\n<a href="http://www.abc.es/agencias/noticia.asp?noticia=1162350">http://www.abc.es/agencias/noticia.asp?noticia=1162350</a>', 'La neurociencia cognitiva ayudará a solucionar trastornos del habla', '', 'publish', 'open', 'open', '', 'noticia-la-neurociencia-cognitiva-ayudara-a-solucionar-trastornos-del-habla', '', '', '2016-05-09 12:05:28', '2016-05-09 11:05:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8260', 0, 'post', '', 0),
(8262, 1, '2016-04-06 09:02:43', '2016-04-06 08:02:43', '', 'Selecció_999(187)', '', 'inherit', 'open', 'open', '', 'seleccio_999187', '', '', '2016-04-06 09:02:43', '2016-04-06 08:02:43', '', 8260, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999187.png', 0, 'attachment', 'image/png', 0),
(8264, 1, '2016-04-06 09:06:58', '2016-04-06 08:06:58', 'Us recordem que el dia <strong>20 de març</strong>, dintre dels SEUminaris del Màster en Dificultats de l''Aprenentatge i Trastorns del llenguatge, l''Anna López impartirà un seminari sobre Dislèxia de manera gratuïta a la Seu de la UOC de Sant Feliu de Llobregat.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15-1.jpg"><img class="alignnone size-full wp-image-8266" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15-1.jpg" alt="15 (1)" width="300" height="252" /></a>\r\n\r\nPer més informació: <a href="http://territori.blogs.uoc.edu/2013/01/seuminaris/">http://territori.blogs.uoc.edu/2013/01/seuminaris/</a>', 'SEUminaris del Màster en Dificultats de l’Aprenentatge i Trastorns del Llenguatge', '', 'publish', 'open', 'open', '', 'seuminaris-del-master-en-dificultats-de-laprenentatge-i-trastorns-del-llenguatge', '', '', '2016-04-06 10:28:24', '2016-04-06 09:28:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8264', 0, 'post', '', 0),
(8266, 1, '2016-04-06 09:09:26', '2016-04-06 08:09:26', '', '15 (1)', '', 'inherit', 'open', 'open', '', '15-1', '', '', '2016-04-06 09:09:26', '2016-04-06 08:09:26', '', 8264, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/15-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(8268, 1, '2016-04-06 09:15:17', '2016-04-06 08:15:17', 'Tal i com es va quedar en el grup de treball creat pel Servei d''Atenció a la Diversitat i Inclusió del Departament d''Ensenyament, "Ús de dispositius mòbils per a la inclusió educativa", es proposa fer una tanda de presentacions d''experiències que s''han fet durant aquest curs amb les tauletes.\r\n<ul>\r\n	<li>Data: 21 d''abril</li>\r\n	<li>Horari: de 17:30h a 19h.</li>\r\n	<li>Lloc: Sala 0C00 (planta baixa) del Departament d''Ensenyament (Via Augusta, 202 de Barcelona).</li>\r\n</ul>\r\nEs presentaran les experiències del centres següents:\r\n\r\n<strong>ESC Angels Anglada de Figueres (Montse Blasi)</strong>\r\n<ul>\r\n	<li>"Som protagonistes del nostre còmic" (3r i 4t primària)</li>\r\n	<li>"Avatars per a superar reptes" (4t, 5è, 6è)</li>\r\n</ul>\r\n<strong> CEE Josep Sol de Santa Coloma (Carme Real)</strong>\r\n<ul>\r\n	<li>"Joc d’endevinalles" (diferents nivells)</li>\r\n</ul>\r\n<strong>ESC A. Armengol de Sabadell (Pedro Fàbrega)</strong>\r\n<ul>\r\n	<li>"Devorallibres" (5è primària)</li>\r\n	<li>Aula d''acollida</li>\r\n	<li>Exp. oral (P4)</li>\r\n</ul>\r\n<strong>INS Ventura i Gassol de Badalona (Jordi Busquets)</strong>\r\n<ul>\r\n	<li>"Laboratori de Ciències" (4t ESO)</li>\r\n</ul>\r\nSi us interessa podeu fer la inscripció i podeu passar l''enllaç a qualsevol professional, ja que és una activitat oberta.\r\n\r\nPodeu trobar moltes experències amb dispositius mòbils en el blog\r\n\r\n<a href="http://blocs.xtec.cat/mobilsperlainclusio/">http://blocs.xtec.cat/mobilsperlainclusio/</a>', 'Dispositius mòbils per a la inclusió educativa', '', 'publish', 'open', 'open', '', 'dispositius-mobils-per-a-la-inclusio-educativa', '', '', '2016-04-06 10:34:13', '2016-04-06 09:34:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8268', 0, 'post', '', 0),
(8269, 1, '2016-04-06 09:15:14', '2016-04-06 08:15:14', '', 'Selecció_999(188)', '', 'inherit', 'open', 'open', '', 'seleccio_999188', '', '', '2016-04-06 09:15:14', '2016-04-06 08:15:14', '', 8268, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999188.png', 0, 'attachment', 'image/png', 0),
(8286, 1, '2016-04-06 13:30:02', '2016-04-06 12:30:02', ' ', '', '', 'publish', 'open', 'closed', '', '8286', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 264, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8286', 11, 'nav_menu_item', '', 0),
(8287, 1, '2016-04-06 13:31:21', '2016-04-06 12:31:21', ' ', '', '', 'publish', 'open', 'open', '', '8287', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 264, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8287', 2, 'nav_menu_item', '', 0),
(8288, 1, '2016-04-07 07:57:00', '2016-04-07 06:57:00', 'El joc que hem preparat <strong>consisteix en mirar el dibuix inicial del cartró, esbrinar per quina lletra comença i buscar i col·locar darrera les imatges que comencin per la mateixa lletra.</strong>\r\n\r\nElla ens explica a través d’un correu que quan treballa aquest material amb les nens només els dóna 4 o 6 artrons cada dos nens amb les imatges que necessitaran.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999189.png"><img class=" size-full wp-image-8289 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999189.png" alt="Selecció_999(189)" width="536" height="308" /></a>\r\n\r\n&nbsp;', 'Comença per...', '', 'publish', 'open', 'open', '', 'comenca-per', '', '', '2016-04-07 08:31:54', '2016-04-07 07:31:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8288', 0, 'post', '', 0),
(8289, 1, '2016-04-06 14:56:19', '2016-04-06 13:56:19', '', 'Selecció_999(189)', '', 'inherit', 'open', 'open', '', 'seleccio_999189', '', '', '2016-04-06 14:56:19', '2016-04-06 13:56:19', '', 8288, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999189.png', 0, 'attachment', 'image/png', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8291, 1, '2016-04-06 15:24:18', '2016-04-06 14:24:18', '', 'Selecció_999(190)', '', 'inherit', 'open', 'open', '', 'seleccio_999190', '', '', '2016-04-06 15:24:27', '2016-04-06 14:24:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999190.png', 0, 'attachment', 'image/png', 0),
(8292, 1, '2016-04-06 08:29:47', '2016-04-06 07:29:47', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec magna est. Pellentesque sed libero erat. Integer quis eleifend libero. Suspendisse gravida quis justo vel eleifend. Proin faucibus, metus ac consectetur mattis, mauris ante ultricies velit, non viverra libero arcu non odio. Nunc quis ante nisl. Quisque mollis cursus elit, quis varius tortor. Nulla ullamcorper ex tortor, vel facilisis ante sodales vitae. Proin bibendum semper orci eu ullamcorper.\r\n\r\n&nbsp;\r\n\r\nhttps://vimeo.com/42025032\r\n\r\nAenean id sagittis augue. Nullam volutpat viverra magna, at mollis ex varius at. Nam tempus mauris eget lacus tempus convallis sit amet eu nisl. In lacinia enim et elit auctor bibendum. Fusce ac urna posuere, facilisis orci et, euismod eros. Sed a lectus ac odio elementum malesuada ut quis magna. Suspendisse a nisi a dolor tristique fermentum. Vivamus non laoreet tellus, non congue ex. Vestibulum efficitur blandit justo, a tincidunt massa fringilla eu. Ut nec vestibulum nisi. Praesent nisl sapien, venenatis non libero sed, scelerisque dignissim turpis.', 'Escriptura de frases a dues mans', '', 'publish', 'open', 'open', '', 'escriptura-de-frases-a-dues-mans', '', '\nhttps://vimeo.com/42025032', '2016-04-06 15:38:59', '2016-04-06 14:38:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8292', 0, 'post', '', 0),
(8293, 1, '2016-04-06 15:27:54', '2016-04-06 14:27:54', '', 'lloro', '', 'inherit', 'open', 'open', '', 'lloro', '', '', '2016-04-06 15:27:54', '2016-04-06 14:27:54', '', 8292, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/lloro.jpg', 0, 'attachment', 'image/jpeg', 0),
(8295, 1, '2016-04-06 10:32:17', '2016-04-06 09:32:17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n&nbsp;', 'La llibreta de frases', '', 'publish', 'open', 'open', '', 'la-llibreta-de-frases', '', '', '2016-04-06 16:49:03', '2016-04-06 15:49:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8295', 0, 'post', '', 0),
(8296, 1, '2016-04-06 15:31:28', '2016-04-06 14:31:28', '', 'frasellarga1', '', 'inherit', 'open', 'open', '', 'frasellarga1', '', '', '2016-04-06 15:31:28', '2016-04-06 14:31:28', '', 8295, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/frasellarga1.jpg', 0, 'attachment', 'image/jpeg', 0),
(8299, 1, '2016-04-02 15:37:24', '2016-04-02 14:37:24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. \r\n\r\n<div style="text-align: center;">\r\n<div style="margin: 8px 0px 4px;"><a href="http://www.calameo.com/books/000143470ab9817d1efd2" target="_blank">Dòmino gramatical</a></div>\r\n<iframe style="margin: 0 auto;" src="//v.calameo.com/?bkcode=000143470ab9817d1efd2" width="300" height="194" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>\r\n<div style="margin: 4px 0px 8px;"><a href="http://www.calameo.com/">Publish at Calameo</a></div>\r\n</div>', 'Dòmino gramatical', '', 'publish', 'open', 'open', '', 'domino-gramatical', '', '', '2016-04-06 16:57:52', '2016-04-06 15:57:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8299', 0, 'post', '', 0),
(8301, 1, '2016-04-06 15:42:43', '2016-04-06 14:42:43', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/rimes.jpg"><img class="alignnone size-full wp-image-8303" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/rimes.jpg" alt="rimes" width="531" height="381" /></a>\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Noves làmines fonòlogiques per treballar les rimes', '', 'publish', 'open', 'open', '', 'noves-lamines-fono', '', '', '2016-04-06 15:43:46', '2016-04-06 14:43:46', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8301', 0, 'post', '', 0),
(8302, 1, '2016-04-06 15:41:51', '2016-04-06 14:41:51', '', 'rimes2', '', 'inherit', 'open', 'open', '', 'rimes2', '', '', '2016-04-06 15:41:51', '2016-04-06 14:41:51', '', 8301, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/rimes2.jpg', 0, 'attachment', 'image/jpeg', 0),
(8303, 1, '2016-04-06 15:42:20', '2016-04-06 14:42:20', '', 'rimes', '', 'inherit', 'open', 'open', '', 'rimes', '', '', '2016-04-06 15:42:20', '2016-04-06 14:42:20', '', 8301, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/rimes.jpg', 0, 'attachment', 'image/jpeg', 0),
(8306, 1, '2016-01-06 15:45:35', '2016-01-06 14:45:35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Treball de lectoescriptura confegint i lletrejant', '', 'publish', 'open', 'open', '', 'treball-de-lectoescriptura-confegint-i-lletrejant', '', '', '2016-04-06 15:46:15', '2016-04-06 14:46:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8306', 0, 'post', '', 0),
(8307, 1, '2016-04-06 15:45:19', '2016-04-06 14:45:19', '', 'Confeti + lecto', '', 'inherit', 'open', 'open', '', 'confeti-lecto', '', '', '2016-04-06 15:45:19', '2016-04-06 14:45:19', '', 8306, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Confeti-lecto.jpg', 0, 'attachment', 'image/jpeg', 0),
(8309, 1, '2016-04-06 15:48:56', '2016-04-06 14:48:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/salutacions_presentacions_LSC.jpg"><img class="alignnone size-large wp-image-8310" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/salutacions_presentacions_LSC-1024x702.jpg" alt="salutacions_presentacions_LSC" width="1024" height="702" /></a>Sed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Nous projectes de lèxic i gramàtica de la LSC', '', 'publish', 'open', 'open', '', 'nous-projectes-de-lexic-i-gramatica-de-la-lsc', '', '', '2016-04-12 16:30:57', '2016-04-12 15:30:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8309', 0, 'post', '', 0),
(8310, 1, '2016-04-06 15:48:39', '2016-04-06 14:48:39', '', 'salutacions_presentacions_LSC', '', 'inherit', 'open', 'open', '', 'salutacions_presentacions_lsc', '', '', '2016-04-06 15:48:39', '2016-04-06 14:48:39', '', 8309, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/salutacions_presentacions_LSC.jpg', 0, 'attachment', 'image/jpeg', 0),
(8312, 1, '2016-04-06 15:56:06', '2016-04-06 14:56:06', '', 'rr', '', 'inherit', 'open', 'open', '', 'rr', '', '', '2016-04-06 15:56:06', '2016-04-06 14:56:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/rr.jpg', 0, 'attachment', 'image/jpeg', 0),
(8313, 1, '2016-04-06 15:58:41', '2016-04-06 14:58:41', '', 'Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233', '', 'inherit', 'open', 'open', '', 'captura-de-pantalla-2014-03-24-a-las-20-02-47-300x233', '', '', '2016-04-06 15:58:41', '2016-04-06 14:58:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Captura-de-pantalla-2014-03-24-a-las-20.02.47-300x233.png', 0, 'attachment', 'image/png', 0),
(8314, 1, '2016-04-06 16:02:33', '2016-04-06 15:02:33', '', 'Selecció_999(192)', '', 'inherit', 'open', 'open', '', 'seleccio_999192', '', '', '2016-04-06 16:02:33', '2016-04-06 15:02:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999192.png', 0, 'attachment', 'image/png', 0),
(8315, 1, '2016-04-06 16:04:17', '2016-04-06 15:04:17', '', 'Selecció_999(193)', '', 'inherit', 'open', 'open', '', 'seleccio_999193', '', '', '2016-04-06 16:04:17', '2016-04-06 15:04:17', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999193.png', 0, 'attachment', 'image/png', 0),
(8316, 1, '2016-04-06 16:09:41', '2016-04-06 15:09:41', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/CONTE06.jpg"><img class="alignnone size-full wp-image-8317" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/CONTE06.jpg" alt="CONTE06" width="705" height="497" /></a>\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Control de les emocions a través d''un conte', '', 'publish', 'open', 'open', '', 'control-de-les-emocions-a-traves-dun-conte', '', '', '2016-05-09 09:13:25', '2016-05-09 08:13:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8316', 0, 'post', '', 0),
(8317, 1, '2016-04-06 16:08:27', '2016-04-06 15:08:27', '', 'CONTE06', '', 'inherit', 'open', 'open', '', 'conte06', '', '', '2016-04-06 16:08:27', '2016-04-06 15:08:27', '', 8316, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/CONTE06.jpg', 0, 'attachment', 'image/jpeg', 0),
(8318, 1, '2016-04-06 16:09:24', '2016-04-06 15:09:24', '', 'Selecció_999(195)', '', 'inherit', 'open', 'open', '', 'seleccio_999195', '', '', '2016-04-06 16:09:24', '2016-04-06 15:09:24', '', 8316, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999195.png', 0, 'attachment', 'image/png', 0),
(8320, 1, '2016-04-06 16:14:42', '2016-04-06 15:14:42', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999194.png"><img class=" size-full wp-image-8321 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999194.png" alt="Selecció_999(194)" width="402" height="114" /></a>\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Errors amagats en els contes populars: millora de l''atenció i la compresió lectora', '', 'publish', 'open', 'open', '', 'troba-els-errors-amagats-en-els-contes-populars-millora-de-latencio-i-la-compresio-lectora', '', '', '2016-05-09 09:13:24', '2016-05-09 08:13:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8320', 0, 'post', '', 0),
(8321, 1, '2016-04-06 16:14:17', '2016-04-06 15:14:17', '', 'Selecció_999(194)', '', 'inherit', 'open', 'open', '', 'seleccio_999194', '', '', '2016-04-06 16:14:17', '2016-04-06 15:14:17', '', 8320, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999194.png', 0, 'attachment', 'image/png', 0),
(8325, 1, '2016-04-06 16:23:30', '2016-04-06 15:23:30', '', 'Selecció_999(197)', '', 'inherit', 'open', 'open', '', 'seleccio_999197', '', '', '2016-04-06 16:24:47', '2016-04-06 15:24:47', '', 8326, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999197.png', 0, 'attachment', 'image/png', 0),
(8326, 1, '2016-04-06 16:25:11', '2016-04-06 15:25:11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999197.png"><img class="alignnone size-full wp-image-8325" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999197.png" alt="Selecció_999(197)" width="632" height="260" /></a>\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Bingo de lletres: Els mitjans de transport', '', 'publish', 'open', 'open', '', 'bingo-de-lletres-els-mitjans-de-transport', '', '', '2016-04-06 16:25:39', '2016-04-06 15:25:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8326', 0, 'post', '', 0),
(8328, 1, '2016-04-06 16:28:28', '2016-04-06 15:28:28', '', 'Selecció_999(199)', '', 'inherit', 'open', 'open', '', 'seleccio_999199', '', '', '2016-04-06 16:28:28', '2016-04-06 15:28:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999199.png', 0, 'attachment', 'image/png', 0),
(8329, 1, '2016-04-06 16:32:04', '2016-04-06 15:32:04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999200.png"><img class=" size-full wp-image-8330 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999200.png" alt="Selecció_999(200)" width="266" height="213" /></a>\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Treball sistemàtic de vocabulari a l''aula', '', 'publish', 'open', 'open', '', 'treball-sistematic-de-vocabulari-a-laula', '', '', '2016-04-06 16:47:35', '2016-04-06 15:47:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8329', 0, 'post', '', 0),
(8330, 1, '2016-04-06 16:31:25', '2016-04-06 15:31:25', '', 'Selecció_999(200)', '', 'inherit', 'open', 'open', '', 'seleccio_999200', '', '', '2016-04-06 16:31:25', '2016-04-06 15:31:25', '', 8329, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999200.png', 0, 'attachment', 'image/png', 0),
(8333, 1, '2016-04-06 16:40:10', '2016-04-06 15:40:10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999202.png"><img class="alignnone size-full wp-image-8334" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999202.png" alt="Selecció_999(202)" width="509" height="353" /></a>', 'Comprensió lectora i expresió escrita: les vacances d''estiu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. ', 'publish', 'open', 'open', '', 'comprensio-lectora-i-expresio-escrita-les-vacances-destiu', '', '', '2016-04-06 16:44:35', '2016-04-06 15:44:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8333', 0, 'post', '', 0),
(8334, 1, '2016-04-06 16:39:16', '2016-04-06 15:39:16', '', 'Selecció_999(202)', '', 'inherit', 'open', 'open', '', 'seleccio_999202', '', '', '2016-04-06 16:39:16', '2016-04-06 15:39:16', '', 8333, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999202.png', 0, 'attachment', 'image/png', 0),
(8336, 1, '2016-04-06 17:20:54', '2016-04-06 16:20:54', '<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/la_rateta.gif"><img class=" size-full wp-image-8338 alignright" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/la_rateta.gif" alt="la_rateta" width="250" height="250" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et ultrices urna. Nunc mollis vulputate bibendum. Vestibulum in tincidunt neque. Sed convallis nunc ipsum, sed vehicula magna elementum ut. Donec maximus nunc ex, ut auctor neque venenatis non. Maecenas cursus lorem vitae efficitur faucibus. Donec turpis neque, tincidunt ac libero at, hendrerit iaculis mi. Vestibulum iaculis justo at bibendum fermentum.\r\n\r\nSed sagittis feugiat ipsum, eget maximus ipsum. Curabitur tortor nisi, euismod a lacinia sollicitudin, malesuada sed arcu. Morbi eu orci purus. Donec blandit mi ipsum, sit amet egestas quam rutrum id. Morbi ut velit ac erat tincidunt feugiat. Donec ut imperdiet sem. Nullam commodo dapibus dui ac varius.', 'Lectura expressiva a través d''un conte popular', '', 'publish', 'open', 'open', '', 'lectura-expressiva-a-traves-dun-conte-popular', '', '', '2016-04-06 17:21:32', '2016-04-06 16:21:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8336', 0, 'post', '', 0),
(8338, 1, '2016-04-06 16:43:37', '2016-04-06 15:43:37', '', 'la_rateta', '', 'inherit', 'open', 'open', '', 'la_rateta', '', '', '2016-04-06 16:43:37', '2016-04-06 15:43:37', '', 8336, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/la_rateta.gif', 0, 'attachment', 'image/gif', 0),
(8351, 1, '2016-04-06 16:53:26', '2016-04-06 15:53:26', '', 'Selecció_999(203)', '', 'inherit', 'open', 'open', '', 'seleccio_999203', '', '', '2016-04-06 16:55:41', '2016-04-06 15:55:41', '', 8352, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999203.png', 0, 'attachment', 'image/png', 0),
(8352, 1, '2016-04-06 16:55:21', '2016-04-06 15:55:21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. \r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999203.png"><img class=" size-full wp-image-8351 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999203.png" alt="Selecció_999(203)" width="476" height="223" /></a>\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.\r\n\r\n&nbsp;', 'Projecte: El món et parla', '', 'publish', 'open', 'open', '', 'projecte-el-mon-et-parla', '', '', '2016-04-06 16:57:38', '2016-04-06 15:57:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8352', 0, 'post', '', 0),
(8359, 1, '2016-05-06 17:12:30', '2016-05-06 16:12:30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. Morbi consequat erat dui, in feugiat est consectetur vitae. Praesent vel sapien eleifend, condimentum turpis non, sodales dolor. In malesuada ipsum massa, vel scelerisque augue rutrum ac. Pellentesque consectetur aliquet lacinia. Nam condimentum sapien non lectus fringilla, ac feugiat nunc egestas.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Lámina-infantil.jpg"><img class="alignnone size-large wp-image-8360" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Lámina-infantil-1024x765.jpg" alt="Lámina infantil" width="1024" height="765" /></a>\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.', 'Treball amb làmina "Mans a l''obra"', '', 'publish', 'open', 'open', '', 'treball-amb-lamina-mans-a-lobra', '', '', '2016-05-09 11:56:04', '2016-05-09 10:56:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8359', 0, 'post', '', 0),
(8360, 1, '2016-04-06 17:11:13', '2016-04-06 16:11:13', '', 'Lámina infantil', '', 'inherit', 'open', 'open', '', 'lamina-infantil', '', '', '2016-04-06 17:11:13', '2016-04-06 16:11:13', '', 8359, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Lámina-infantil.jpg', 0, 'attachment', 'image/jpeg', 0),
(8362, 1, '2016-04-07 10:52:43', '2016-04-07 09:52:43', '&nbsp;\r\n\r\n<img class="  wp-image-8363 alignright" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999204.png" alt="Selecció_999(204)" width="188" height="187" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. Morbi consequat erat dui, in feugiat est consectetur vitae. Praesent vel sapien eleifend, condimentum turpis non, sodales dolor. In malesuada ipsum massa, vel scelerisque augue rutrum ac. Pellentesque consectetur aliquet lacinia. Nam condimentum sapien non lectus fringilla, ac feugiat nunc egestas.\r\n\r\n&nbsp;\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.\r\n\r\n&nbsp;', 'Narració amb Story Cubes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. ', 'publish', 'open', 'open', '', 'story-cubes', '', '', '2016-05-09 12:04:33', '2016-05-09 11:04:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8362', 0, 'post', '', 0),
(8363, 1, '2016-04-06 17:16:59', '2016-04-06 16:16:59', '', 'Selecció_999(204)', '', 'inherit', 'open', 'open', '', 'seleccio_999204', '', '', '2016-04-06 17:16:59', '2016-04-06 16:16:59', '', 8362, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999204.png', 0, 'attachment', 'image/png', 0),
(8366, 1, '2016-04-06 17:20:24', '2016-04-06 16:20:24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. Morbi consequat erat dui, in feugiat est consectetur vitae. Praesent vel sapien eleifend, condimentum turpis non, sodales dolor. In malesuada ipsum massa, vel scelerisque augue rutrum ac. Pellentesque consectetur aliquet lacinia. Nam condimentum sapien non lectus fringilla, ac feugiat nunc egestas.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/pol_02temps.jpg"><img class="alignnone  wp-image-8367" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/pol_02temps.jpg" alt="pol_02temps" width="340" height="252" /></a>\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.\r\n\r\n&nbsp;', '"Narratio", app per treballar la narració', '', 'publish', 'open', 'open', '', 'narratio-app-per-treballar-la-narracio', '', '', '2016-04-06 17:20:24', '2016-04-06 16:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8366', 0, 'post', '', 0),
(8367, 1, '2016-04-06 17:20:04', '2016-04-06 16:20:04', '', 'pol_02temps', '', 'inherit', 'open', 'open', '', 'pol_02temps', '', '', '2016-04-06 17:20:04', '2016-04-06 16:20:04', '', 8366, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/pol_02temps.jpg', 0, 'attachment', 'image/jpeg', 0),
(8372, 1, '2016-04-06 17:26:18', '2016-04-06 16:26:18', '', 'Selecció_999(205)', '', 'inherit', 'open', 'open', '', 'seleccio_999205', '', '', '2016-04-06 17:26:18', '2016-04-06 16:26:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999205.png', 0, 'attachment', 'image/png', 0),
(8375, 1, '2016-04-06 17:36:17', '2016-04-06 16:36:17', '', 'Recursos didàctics', '', 'publish', 'open', 'closed', '', '8375', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8375', 12, 'nav_menu_item', '', 0),
(8376, 1, '2016-04-06 17:48:28', '2016-04-06 16:48:28', '', 'Recursos didàctics', '', 'publish', 'open', 'open', '', '8376', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8376', 3, 'nav_menu_item', '', 0),
(8377, 1, '2016-04-06 18:05:01', '2016-04-06 17:05:01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nibh elit, facilisis vitae tellus at, dapibus convallis purus. Vivamus vel tincidunt mauris. Vivamus non dolor libero. Morbi suscipit convallis odio, id volutpat mi varius in. Quisque velit felis, facilisis quis arcu id, finibus gravida diam. Morbi consequat erat dui, in feugiat est consectetur vitae. Praesent vel sapien eleifend, condimentum turpis non, sodales dolor. In malesuada ipsum massa, vel scelerisque augue rutrum ac. Pellentesque consectetur aliquet lacinia. Nam condimentum sapien non lectus fringilla, ac feugiat nunc egestas.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999181.png"><img class="alignnone size-full wp-image-8195" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999181.png" alt="Selecció_999(181)" width="439" height="220" /></a>\r\n\r\nSed pulvinar ullamcorper lobortis. Curabitur id nulla a mauris lobortis hendrerit. Sed hendrerit dictum viverra. Duis est ante, consequat vel ex ac, faucibus eleifend mi. Nam non massa arcu. Curabitur id efficitur neque. Vivamus molestie orci vulputate, dapibus risus tempus, elementum ipsum. Cras ultricies sapien non pulvinar imperdiet. Quisque sed dignissim nisl. Fusce metus erat, sagittis id nisl ut, iaculis lobortis quam.', 'Trobada d''infants amb pèrdua auditiva', '', 'publish', 'open', 'open', '', 'trobada-dinfants-amb-perdua-auditiva', '', '', '2016-04-06 18:05:33', '2016-04-06 17:05:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8377', 0, 'post', '', 0),
(8379, 1, '2016-04-06 18:07:15', '2016-04-06 17:07:15', '', '1EWG', '', 'inherit', 'open', 'open', '', '1ewg', '', '', '2016-04-06 18:07:15', '2016-04-06 17:07:15', '', 8209, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/1EWG.png', 0, 'attachment', 'image/png', 0),
(8383, 1, '2016-04-06 18:19:19', '2016-04-06 17:19:19', '', 'kids-tablet-brands', '', 'inherit', 'open', 'open', '', 'kids-tablet-brands', '', '', '2016-04-06 18:19:19', '2016-04-06 17:19:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/kids-tablet-brands.jpeg', 0, 'attachment', 'image/jpeg', 0),
(8384, 1, '2016-04-06 18:21:51', '2016-04-06 17:21:51', '', 'toolbox', '', 'inherit', 'open', 'open', '', 'toolbox', '', '', '2016-04-06 18:21:51', '2016-04-06 17:21:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/toolbox.png', 0, 'attachment', 'image/png', 0),
(8385, 1, '2016-04-06 18:27:08', '2016-04-06 17:27:08', '<blockquote><a href="http://toolbox.mobileworldcapital.com/app/autimo/492"><img class="alignnone" src="http://toolbox.mobileworldcapital.com/AppsImages/Icons/com.auticiel.autimo/thumb/YYOZAa3JAJI8F-VsUz7POKAK-c53DKga6knglGDHS4lsO8mXTusTJl85jVvqRzMV7w=w300" alt="" width="300" height="300" /></a>\r\n\r\nJoc per treballar les emocions a partir d''imatges reals. Aplicació dirigida a nens que tenen dificultats per reconèixer emocions.</blockquote>\r\nOrigen: <em><a href="http://toolbox.mobileworldcapital.com/app/autimo/492">Autimo -Découvre les émotions! a toolbox</a></em>', 'Autimo - Découvre les émotions!', '', 'publish', 'open', 'open', '', 'autimo-decouvre-les-emotions', '', '', '2016-04-06 18:28:46', '2016-04-06 17:28:46', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8385', 0, 'post', '', 0),
(8387, 1, '2016-04-06 18:28:29', '2016-04-06 17:28:29', '', 'emo', '', 'inherit', 'open', 'open', '', 'emo', '', '', '2016-04-06 18:28:29', '2016-04-06 17:28:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/emo.png', 0, 'attachment', 'image/png', 0),
(8389, 1, '2016-04-06 18:31:41', '2016-04-06 17:31:41', '<a href="http://toolbox.mobileworldcapital.com/app/jos-aprende/557"><img class="alignnone size-full" src="http://toolbox.mobileworldcapital.com/AppsImages/Screenshots/Thumb/com.orange.joseaprende/lh3.googleusercontent.comgSr59ujzZN3iy363H-ICBZUIEOKXcFBbaK7fdOz3LBOG7DC5ws4cCdDgpZ569C-M6-QD%20.png" alt="" /></a><a href="http://toolbox.mobileworldcapital.com/app/jos-aprende/557"><img class="alignnone size-full" src="http://toolbox.mobileworldcapital.com/AppsImages/Screenshots/Thumb/com.orange.joseaprende/lh3.googleusercontent.comp03_mt-wB6ToGe9ZzcJT_1tue29uDsQAmmvaNJnR1nJnQUZfnt-eZOBv0bCdMZzaqjM%20.png" alt="" /></a>\r\n<blockquote>Col·lecció de contes interactius adaptats a pictogrames. El protagonista de la història guia el nen en el procés d''aprenentatge i treball d''hàbits i emocions.</blockquote>\r\nOrigen: <em><a href="http://toolbox.mobileworldcapital.com/app/jos-aprende/557">José Aprende | apps | Google Play | Toolbox | mSchools</a></em>', 'José aprende', 'Col·lecció de contes interactius adaptats a pictogrames. El protagonista de la història guia el nen en el procés d''aprenentatge i treball d''hàbits i emocions.', 'publish', 'open', 'open', '', 'jose-aprende', '', '', '2016-05-09 09:13:24', '2016-05-09 08:13:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8389', 0, 'post', '', 0),
(8390, 1, '2016-04-06 18:31:31', '2016-04-06 17:31:31', '', 'jose', '', 'inherit', 'open', 'open', '', 'jose', '', '', '2016-04-06 18:31:31', '2016-04-06 17:31:31', '', 8389, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/jose.png', 0, 'attachment', 'image/png', 0),
(8392, 1, '2016-04-06 18:35:04', '2016-04-06 17:35:04', 'Tellagami permet crear personatges virtuals (avatars) que podem fer parlar amb la nostra veu o bé podem fer que transformin en veu el text que introduïm. Podem editar el personatge com home o dona i donar-li característiques (cara, cabell, ulls...) El resultat es pot exportar com a vídeo.\r\n\r\n<a href="http://toolbox.mobileworldcapital.com/app/tellagami/30"><img class="alignnone size-full" src="http://toolbox.mobileworldcapital.com/AppsImages/Screenshots/Thumb/com.tellagami.Tellagami/lh3.ggpht.comNvBTsnXLRz4AnJCfQlBux9MT8XGL683Gua-czUTGS7mRsJJkgWWN9COA_M8eQ853ywM%20.png" alt="" /></a><a href="http://toolbox.mobileworldcapital.com/app/tellagami/30"><img class="alignnone size-full" src="http://toolbox.mobileworldcapital.com/AppsImages/Screenshots/Thumb/com.tellagami.Tellagami/lh3.ggpht.comolWKdyhU6zC8uXTNoohx_VVg-hhKv3kbKmph7xomOyeS9_lfVihOF6z9VmFeKtw8y1A%20.png" alt="" /></a>\r\n<blockquote>Tellagami permet crear personatges virtuals (avatars) que podem fer parlar amb la nostraveu o bé podem fer que transformin en veu el text que introduïm. Podem editarel personatge com home o dona i donar-li característiques (cara, cabell,ulls...) El resultat es pot exportar com a vídeo.</blockquote>\r\nOrigen: <em><a href="http://toolbox.mobileworldcapital.com/app/tellagami/30">Tellagami | apps | Google Play | Toolbox | mSchools</a></em>', 'Creació d''avatars amb Tellagami', 'Tellagami permet crear personatges virtuals (avatars) que podem fer parlar amb la nostra veu o bé podem fer que transformin en veu el text que introduïm. ', 'publish', 'open', 'open', '', 'tellagami', '', '', '2016-04-07 08:38:07', '2016-04-07 07:38:07', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8392', 0, 'post', '', 0),
(8393, 1, '2016-04-06 18:34:53', '2016-04-06 17:34:53', '', 'Selecció_999(206)', '', 'inherit', 'open', 'open', '', 'seleccio_999206', '', '', '2016-04-06 18:34:53', '2016-04-06 17:34:53', '', 8392, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Selecció_999206.png', 0, 'attachment', 'image/png', 0),
(8400, 1, '2016-04-07 08:43:01', '2016-04-07 07:43:01', ' ', '', '', 'publish', 'open', 'closed', '', '8400', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 271, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8400', 24, 'nav_menu_item', '', 0),
(8405, 1, '2016-04-12 12:52:12', '2016-04-12 11:52:12', ' ', '', '', 'publish', 'open', 'closed', '', '8405', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8405', 19, 'nav_menu_item', '', 0),
(8406, 1, '2016-04-12 12:52:33', '2016-04-12 11:52:33', ' ', '', '', 'publish', 'open', 'open', '', '8406', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8406', 7, 'nav_menu_item', '', 0),
(8408, 1, '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 'parla_r', '', 'inherit', 'open', 'open', '', 'parla_r', '', '', '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/parla_r.jpg', 0, 'attachment', 'image/jpeg', 0),
(8409, 1, '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 'nen_recurs', '', 'inherit', 'open', 'open', '', 'nen_recurs', '', '', '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/nen_recurs.jpg', 0, 'attachment', 'image/jpeg', 0),
(8410, 1, '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 'nen_lleg', '', 'inherit', 'open', 'open', '', 'nen_lleg', '', '', '2016-04-12 16:06:35', '2016-04-12 15:06:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/nen_lleg.jpg', 0, 'attachment', 'image/jpeg', 0),
(8411, 1, '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 'narracio', '', 'inherit', 'open', 'open', '', 'narracio', '', '', '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/narracio.jpg', 0, 'attachment', 'image/jpeg', 0),
(8412, 1, '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 'logopeda', '', 'inherit', 'open', 'open', '', 'logopeda', '', '', '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/logopeda.jpg', 0, 'attachment', 'image/jpeg', 0),
(8413, 1, '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 'family_llegint', '', 'inherit', 'open', 'open', '', 'family_llegint', '', '', '2016-04-12 16:06:36', '2016-04-12 15:06:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/family_llegint.jpg', 0, 'attachment', 'image/jpeg', 0),
(8414, 1, '2016-04-12 16:06:37', '2016-04-12 15:06:37', '', 'est_frase', '', 'inherit', 'open', 'open', '', 'est_frase', '', '', '2016-04-12 16:06:37', '2016-04-12 15:06:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/est_frase.jpg', 0, 'attachment', 'image/jpeg', 0),
(8415, 1, '2016-04-12 16:06:37', '2016-04-12 15:06:37', '', 'contes_log', '', 'inherit', 'open', 'open', '', 'contes_log', '', '', '2016-04-12 16:06:37', '2016-04-12 15:06:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/contes_log.jpg', 0, 'attachment', 'image/jpeg', 0),
(8417, 1, '2016-04-12 16:06:38', '2016-04-12 15:06:38', '', 'adult_material', '', 'inherit', 'open', 'open', '', 'adult_material', '', '', '2016-04-12 16:06:38', '2016-04-12 15:06:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/adult_material.jpg', 0, 'attachment', 'image/jpeg', 0),
(8418, 1, '2016-04-13 10:23:09', '2016-04-13 09:23:09', '', 'Marc_actuació_CREDA_99', '', 'inherit', 'open', 'open', '', 'marc_actuacio_creda_99', '', '', '2016-04-13 10:23:09', '2016-04-13 09:23:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/Marc_actuació_CREDA_99.pdf', 0, 'attachment', 'application/pdf', 0),
(8424, 1, '2016-05-03 08:39:41', '2016-05-03 07:39:41', 'Els pares dels alumnes amb sordesa poden optar per dos models d’escolarització que fan referència a l’aprenentatge de la llengua i l’accés a l’aprenentatge en modalitat oral o bilingüe.\r\n<ul>\r\n	<li><strong>Modalitat educativa bilingüe</strong>: Fa referència al projecte educatiu de centre en el qual coexisteixen la llengua de signes catalana com a matèria d’estudi i la llengua vehicular en la comunicació i l’accés al currículum escolar, i les llengües orals i escrites oficials, que també són objecte d’aprenentatge.</li>\r\n</ul>\r\n<ul>\r\n	<li><strong>Modalitat educativa oral</strong>: Treballa en l’aprenentatge i desenvolupament exclusiu de la llengua oral parlada i escrita (català i castellà) i emfasitza l’educació de les restes auditives i la protetització primerenca.</li>\r\n</ul>', 'Modalitats d''escolarització', '', 'publish', 'closed', 'closed', '', 'modalitats-descolaritzacio', '', '', '2016-05-17 14:17:39', '2016-05-17 13:17:39', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8424', 15, 'page', '', 0),
(8429, 1, '2016-05-03 08:44:33', '2016-05-03 07:44:33', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque iaculis, eros eu dictum egestas, arcu magna tristique nulla, at suscipit orci risus eget nisl. Proin non diam accumsan, iaculis urna volutpat, tristique sem. Sed ut luctus magna. Vestibulum porta iaculis feugiat. Aliquam porttitor bibendum tellus. Maecenas vel eros sit amet turpis elementum congue a sed dui. Suspendisse potenti. Aliquam et risus viverra, interdum libero et, feugiat urna.\r\n\r\n&nbsp;\r\n\r\nQuisque non tortor interdum, ullamcorper felis eu, pretium libero. Pellentesque pulvinar nunc non nisi ultricies, at iaculis sapien aliquam. Morbi mattis magna vel nunc vulputate lacinia. Sed leo libero, convallis at dui vitae, condimentum vehicula eros. Integer in dictum lorem. Pellentesque venenatis ante eget pretium tincidunt. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc felis lacus, semper a eleifend ac, interdum vel dui.\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Història', '', 'publish', 'closed', 'closed', '', 'historia', '', '', '2016-05-31 11:47:15', '2016-05-31 10:47:15', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8429', 25, 'page', '', 0),
(8431, 1, '2016-05-03 08:45:49', '2016-05-03 07:45:49', ' ', '', '', 'publish', 'open', 'closed', '', '8431', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8431', 3, 'nav_menu_item', '', 0),
(8432, 1, '2016-05-03 08:51:23', '2016-05-03 07:51:23', '<img class=" wp-image-8512" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/hipoacusia-150x150.png" alt="hipoacusia" width="158" height="158" />\r\n\r\n<a href="http://www.xtec.cat/serveis/creda/a8925251/documents/Protocol%20hipoacuneonat.pdf">Protocol per a la detecció precoç, el diagnòstic, el tractament i el seguiment de la hipoacúsia neonatal</a>\r\n\r\n<img class=" wp-image-8516 size-thumbnail" src="https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/llenguatge_escola-150x150.png" alt="llenguatge_escola" width="150" height="150" />\r\n\r\n<a href="http://ensenyament.gencat.cat/web/.content/home/departament/publicacions/monografies/us-llenguatge-escola/lus_llenguatge_lescola.pdf">L''ús del llenguatge a l''escola. Propostes d''intervenció per a l''alumnat amb dificultats de comunicació i llenguatge</a>', 'Guies', '', 'publish', 'closed', 'closed', '', 'guies', '', '', '2016-05-10 10:24:29', '2016-05-10 09:24:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8432', 0, 'page', '', 0),
(8434, 1, '2016-05-03 08:53:08', '2016-05-03 07:53:08', ' ', '', '', 'publish', 'open', 'closed', '', '8434', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8434', 10, 'nav_menu_item', '', 0),
(8438, 1, '2016-05-04 08:59:10', '2016-05-04 07:59:10', '', 'sords_profunds', '', 'inherit', 'open', 'open', '', 'sords_profunds', '', '', '2016-05-04 08:59:10', '2016-05-04 07:59:10', '', 8175, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/sords_profunds.png', 0, 'attachment', 'image/png', 0),
(8443, 1, '2016-05-09 09:16:21', '2016-05-09 08:16:21', '', 'lleng_signes', '', 'inherit', 'open', 'open', '', 'lleng_signes', '', '', '2016-05-09 09:16:21', '2016-05-09 08:16:21', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/lleng_signes.jpg', 0, 'attachment', 'image/jpeg', 0),
(8444, 1, '2016-05-09 09:17:54', '2016-05-09 08:17:54', '', 'vocabulari', '', 'inherit', 'open', 'open', '', 'vocabulari', '', '', '2016-05-09 09:17:54', '2016-05-09 08:17:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/vocabulari.jpg', 0, 'attachment', 'image/jpeg', 0),
(8445, 1, '2016-05-09 09:33:18', '2016-05-09 08:33:18', 'Conjunt de programari, pàgines web i recursos relacionats amb les pèrdues auditives, les ajudes tècniques i el treball de les habilitats auditives.', '', '', 'publish', 'open', 'closed', '', '8445', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8445', 14, 'nav_menu_item', '', 0),
(8446, 1, '2016-05-09 09:34:26', '2016-05-09 08:34:26', 'Conjunt de programari, pàgines web i recursos relacionats amb les pèrdues auditives, les ajudes tècniques i el treball de les habilitats auditives.', '', '', 'publish', 'open', 'open', '', '8446', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8446', 2, 'nav_menu_item', '', 0),
(8447, 1, '2016-05-09 10:15:36', '2016-05-09 09:15:36', '', 'apps', '', 'inherit', 'open', 'open', '', 'apps', '', '', '2016-05-09 10:15:36', '2016-05-09 09:15:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/apps.jpg', 0, 'attachment', 'image/jpeg', 0),
(8483, 1, '2016-05-09 12:00:56', '2016-05-09 11:00:56', ' ', '', '', 'publish', 'open', 'closed', '', '8483', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8483', 13, 'nav_menu_item', '', 0),
(8484, 1, '2016-05-09 12:01:53', '2016-05-09 11:01:53', ' ', '', '', 'publish', 'open', 'open', '', '8484', '', '', '2016-05-09 12:27:00', '2016-05-09 11:27:00', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8484', 1, 'nav_menu_item', '', 0),
(8485, 1, '2016-05-09 12:02:41', '2016-05-09 11:02:41', '', 'jugantacasa', '', 'inherit', 'open', 'open', '', 'jugantacasa', '', '', '2016-05-09 12:02:41', '2016-05-09 11:02:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/jugantacasa.jpg', 0, 'attachment', 'image/jpeg', 0),
(8487, 1, '2016-05-09 12:33:42', '2016-05-09 11:33:42', ' ', '', '', 'publish', 'open', 'open', '', '8487', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8487', 1, 'nav_menu_item', '', 0),
(8493, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8493', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8493', 5, 'nav_menu_item', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8494, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8494', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8494', 4, 'nav_menu_item', '', 0),
(8495, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8495', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8495', 6, 'nav_menu_item', '', 0),
(8496, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8496', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8496', 9, 'nav_menu_item', '', 0),
(8497, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8497', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8497', 7, 'nav_menu_item', '', 0),
(8498, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8498', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8498', 10, 'nav_menu_item', '', 0),
(8499, 1, '2016-05-09 13:14:03', '2016-05-09 12:14:03', ' ', '', '', 'publish', 'open', 'open', '', '8499', '', '', '2016-05-09 13:14:03', '2016-05-09 12:14:03', '', 281, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8499', 8, 'nav_menu_item', '', 0),
(8500, 1, '2016-05-09 13:35:29', '2016-05-09 12:35:29', ' ', '', '', 'publish', 'open', 'open', '', '8500', '', '', '2016-05-17 14:24:36', '2016-05-17 13:24:36', '', 271, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8500', 4, 'nav_menu_item', '', 0),
(8504, 1, '2016-05-10 07:20:42', '2016-05-10 06:20:42', '', 'perdua auditiva', '', 'inherit', 'open', 'open', '', 'perdua-auditiva', '', '', '2016-05-10 07:20:42', '2016-05-10 06:20:42', '', 8175, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/perdua-auditiva.png', 0, 'attachment', 'image/png', 0),
(8505, 1, '2016-05-10 07:23:00', '2016-05-10 06:23:00', '', 'guia_tartamudesa', '', 'inherit', 'open', 'open', '', 'guia_tartamudesa', '', '', '2016-05-10 07:23:00', '2016-05-10 06:23:00', '', 8175, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_tartamudesa.png', 0, 'attachment', 'image/png', 0),
(8507, 1, '2016-05-10 07:31:44', '2016-05-10 06:31:44', '', 'guia_sordceguesa', '', 'inherit', 'open', 'open', '', 'guia_sordceguesa', '', '', '2016-05-10 07:31:44', '2016-05-10 06:31:44', '', 8175, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/guia_sordceguesa.png', 0, 'attachment', 'image/png', 0),
(8512, 1, '2016-05-10 08:14:04', '2016-05-10 07:14:04', '', 'hipoacusia', '', 'inherit', 'open', 'open', '', 'hipoacusia', '', '', '2016-05-10 08:14:04', '2016-05-10 07:14:04', '', 8432, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/hipoacusia.png', 0, 'attachment', 'image/png', 0),
(8516, 1, '2016-05-10 08:35:20', '2016-05-10 07:35:20', '', 'llenguatge_escola', '', 'inherit', 'open', 'open', '', 'llenguatge_escola', '', '', '2016-05-10 08:35:20', '2016-05-10 07:35:20', '', 8432, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/llenguatge_escola.png', 0, 'attachment', 'image/png', 0),
(8519, 1, '2016-05-10 08:44:24', '2016-05-10 07:44:24', '', 'ORIENTACIONS_FAMILIA_1', '', 'inherit', 'open', 'open', '', 'orientacions_familia_1', '', '', '2016-05-10 08:44:24', '2016-05-10 07:44:24', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/ORIENTACIONS_FAMILIA_1.pdf', 0, 'attachment', 'application/pdf', 0),
(8520, 1, '2016-05-10 08:44:56', '2016-05-10 07:44:56', '', 'aprendre_respirar_bufar_mocar', '', 'inherit', 'open', 'open', '', 'aprendre_respirar_bufar_mocar', '', '', '2016-05-10 08:44:56', '2016-05-10 07:44:56', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/04/aprendre_respirar_bufar_mocar.pdf', 0, 'attachment', 'application/pdf', 0),
(8527, 1, '2016-05-10 08:52:07', '2016-05-10 07:52:07', '<iframe src="http://srvcnpbs.xtec.cat/cse/adreces/SEIlist.php?x_Tipus_SEI=CREDA" width="100%" height="800px" scrolling="no"></iframe>', 'Altres CREDA', '', 'publish', 'closed', 'closed', '', 'altres-creda', '', '', '2016-05-31 11:20:19', '2016-05-31 10:20:19', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8527', 80, 'page', '', 0),
(8549, 1, '2016-05-10 10:30:40', '2016-05-10 09:30:40', '', 'implant', '', 'inherit', 'open', 'open', '', 'implant', '', '', '2016-05-10 10:30:40', '2016-05-10 09:30:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/wp-content/uploads/usu11/2016/05/implant.jpg', 0, 'attachment', 'image/jpeg', 0),
(8551, 1, '2016-05-17 14:05:37', '2016-05-17 13:05:37', '', 'Modalitats d''escolarització', '', 'publish', 'open', 'open', '', 'modalitats-descolaritzacio-2', '', '', '2016-05-17 14:24:36', '2016-05-17 13:24:36', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8551', 2, 'nav_menu_item', '', 0),
(8552, 1, '2016-05-17 14:10:21', '2016-05-17 13:10:21', '', 'Modalitats d''escolarització', '', 'publish', 'open', 'closed', '', 'modalitats-descolaritzacio-3', '', '', '2016-05-31 11:19:58', '2016-05-31 10:19:58', '', 8173, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8552', 22, 'nav_menu_item', '', 0),
(8558, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8558', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8558', 1, 'nav_menu_item', '', 0),
(8559, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8559', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8559', 2, 'nav_menu_item', '', 0),
(8560, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8560', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8560', 3, 'nav_menu_item', '', 0),
(8561, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8561', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8561', 4, 'nav_menu_item', '', 0),
(8562, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8562', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8562', 5, 'nav_menu_item', '', 0),
(8563, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8563', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8563', 6, 'nav_menu_item', '', 0),
(8564, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8564', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8564', 7, 'nav_menu_item', '', 0),
(8565, 1, '2016-05-31 11:08:55', '2016-05-31 10:08:55', ' ', '', '', 'publish', 'closed', 'closed', '', '8565', '', '', '2016-05-31 11:08:55', '2016-05-31 10:08:55', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8565', 8, 'nav_menu_item', '', 0),
(8566, 1, '2016-05-31 11:19:57', '2016-05-31 10:19:57', ' ', '', '', 'publish', 'closed', 'closed', '', '8566', '', '', '2016-05-31 11:19:57', '2016-05-31 10:19:57', '', 806, 'https://pwc-int.educacio.intranet/agora/mastercreda/?p=8566', 8, 'nav_menu_item', '', 0),
(8568, 1, '2016-06-01 10:24:30', '2016-06-01 09:24:30', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-06-01 10:24:30', '2016-06-01 09:24:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8568', 0, 'page', '', 0),
(8570, 1, '2016-06-01 10:25:14', '2016-06-01 09:25:14', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-06-01 10:25:14', '2016-06-01 09:25:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/?page_id=8570', 0, 'page', '', 0),
(8577, 1, '2016-07-04 11:32:29', '2016-07-04 10:32:29', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-07-04 11:32:29', '2016-07-04 10:32:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(8578, 1, '2016-07-04 11:32:29', '2016-07-04 10:32:29', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-07-04 11:32:29', '2016-07-04 10:32:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(8579, 1, '2016-07-04 11:32:29', '2016-07-04 10:32:29', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-07-04 11:32:29', '2016-07-04 10:32:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(8580, 1, '2016-07-04 11:32:29', '2016-07-04 10:32:29', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-07-04 11:32:29', '2016-07-04 10:32:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(8581, 1, '2016-07-04 11:32:29', '2016-07-04 10:32:29', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-07-04 11:32:29', '2016-07-04 10:32:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(8582, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(8583, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(8584, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(8585, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(8586, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(8587, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(8588, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0),
(8589, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0),
(8590, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(8591, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(8592, 1, '2016-07-04 11:32:30', '2016-07-04 10:32:30', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-07-04 11:32:30', '2016-07-04 10:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(8593, 0, '2019-04-25 09:45:30', '2019-04-25 07:45:30', '<strong style="color: #990000">What can you achieve using Email Subscribers?</strong><p>Add subscription forms on website, send HTML newsletters &amp; automatically notify subscribers about new blog posts once it is published. You can also Import or Export subscribers from any list to Email Subscribers.</p> <strong style="color: #990000">Plugin Features</strong><ol> <li>Send notification emails to subscribers when new blog posts are published.</li> <li>Subscribe form available with 3 options to setup.</li> <li>Double Opt-In and Single Opt-In support.</li> <li>Email notification to admin when a new user signs up (Optional).</li> <li>Automatic welcome email to subscriber.</li> <li>Auto add unsubscribe link in the email.</li> <li>Import/Export subscriber emails to migrate to any lists.</li> <li>Default WordPress editor to create emails.</li> </ol> <strong>Thanks &amp; Regards,</strong><br>Admin', 'Welcome To Email Subscribers', '', 'publish', 'closed', 'closed', '', 'welcome-to-email-subscribers', '', '', '2019-04-25 09:45:30', '2019-04-25 07:45:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/welcome-to-email-subscribers/', 0, 'es_template', '', 0),
(8594, 0, '2019-04-25 09:45:30', '2019-04-25 07:45:30', 'Hello {{NAME}},\r\n\r\nWe have published a new blog article on our website : {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n\r\nYou can view it from this link : {{POSTLINK}}\r\n\r\nThanks &amp; Regards,\r\nAdmin\r\n\r\nYou received this email because in the past you have provided us your email address : {{EMAIL}} to receive notifications when new updates are posted.', 'New Post Published - {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'new-post-published-posttitle', '', '', '2019-04-25 09:45:30', '2019-04-25 07:45:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/new-post-published-posttitle/', 0, 'es_template', '', 0),
(8595, 0, '2019-04-25 09:45:30', '2019-04-25 07:45:30', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-04-25 09:45:30', '2019-04-25 07:45:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(8596, 2, '2019-04-25 09:46:22', '2019-04-25 07:46:22', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-04-25 09:46:22', '2019-04-25 07:46:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(8597, 2, '2019-04-25 09:46:22', '2019-04-25 07:46:22', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-04-25 09:46:22', '2019-04-25 07:46:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(8598, 2, '2019-04-25 09:46:22', '2019-04-25 07:46:22', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-04-25 09:46:22', '2019-04-25 07:46:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(8599, 2, '2019-04-25 09:46:22', '2019-04-25 07:46:22', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-04-25 09:46:22', '2019-04-25 07:46:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercreda/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_signups`
--

CREATE TABLE IF NOT EXISTS `wp_signups` (
`signup_id` bigint(20) NOT NULL,
  `domain` varchar(200) NOT NULL DEFAULT '',
  `path` varchar(100) NOT NULL DEFAULT '',
  `title` longtext NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(50) NOT NULL DEFAULT '',
  `meta` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_stats`
--

CREATE TABLE IF NOT EXISTS `wp_stats` (
`stat_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `ip` varchar(15) NOT NULL,
  `ipForward` varchar(15) NOT NULL,
  `ipClient` varchar(15) NOT NULL,
  `userAgent` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_termmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
`term_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(33, 'educació emocional', 'educacio-emocional', 0),
(34, 'papiroflexia', 'papiroflexia', 0),
(35, 'granota', 'granota', 0),
(36, 'nivel senzill', 'nivel-senzill', 0),
(46, 'Professorat', 'bp_docs_associated_group_1', 0),
(47, 'bp_docs_access_anyone', 'bp_docs_access_anyone', 0),
(51, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(53, 'Fotografia', 'bp_docs_associated_group_17', 0),
(61, 'MenuNodes', 'menunodes', 0),
(120, 'bp_docs_access_group_member_20', 'bp_docs_access_group_member_20', 0),
(121, 'bp_docs_access_loggedin', 'bp_docs_access_loggedin', 0),
(140, 'Servei educatiu', 'bp_docs_associated_group_20', 0),
(145, 'MenuSuperior', 'menusuperior', 0),
(149, 'Formadors', 'bp_docs_associated_group_33', 0),
(150, 'bp_docs_access_group_member_33', 'bp_docs_access_group_member_33', 0),
(151, 'Servei educatiu', 'bp_docs_associated_group_31', 0),
(152, 'bp_docs_access_group_member_31', 'bp_docs_access_group_member_31', 0),
(255, 'ITWorldEdu', 'itworldedu', 0),
(263, 'menuCREDA', 'menucreda', 0),
(264, 'Professionals', 'professionals', 0),
(266, 'Fonètica-Fonologia', 'fonetica-fonologia', 0),
(267, 'Morfosintaxi', 'morfosintaxi', 0),
(268, 'Lèxic', 'lexic', 0),
(269, 'Lectoescriptura', 'lectoescriptura', 0),
(271, 'Famílies', 'families', 0),
(272, 'Alumnes', 'alumnes', 0),
(273, 'Portada', 'portada', 0),
(274, 'Menu Recursos Professionals', 'menu-recursos-professionals', 0),
(278, 'Menu Famílies', 'menu-families', 0),
(279, 'CREDAC Pere Barnils', 'credac-pere-barnils', 0),
(281, 'Recursos', 'recursos', 0),
(287, 'Als mitjans', 'als-mitjans', 0),
(288, 'Formació', 'formacio', 0),
(289, 'Apps', 'apps', 0),
(293, 'menuProfessionals', 'menuprofessionals', 0),
(294, 'Esdeveniments', 'esdeveniments-families', 0),
(296, 'Llengua de signes', 'llengua-de-signes', 0),
(297, 'Audiologia', 'audiologia', 0),
(298, 'Comunicació', 'comunicacio', 0),
(300, 'activity-comment', 'activity-comment', 0),
(301, 'activity-comment-author', 'activity-comment-author', 0),
(302, 'activity-at-message', 'activity-at-message', 0),
(303, 'groups-at-message', 'groups-at-message', 0),
(304, 'core-user-registration', 'core-user-registration', 0),
(305, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(306, 'friends-request', 'friends-request', 0),
(307, 'friends-request-accepted', 'friends-request-accepted', 0),
(308, 'groups-details-updated', 'groups-details-updated', 0),
(309, 'groups-invitation', 'groups-invitation', 0),
(310, 'groups-member-promoted', 'groups-member-promoted', 0),
(311, 'groups-membership-request', 'groups-membership-request', 0),
(312, 'messages-unread', 'messages-unread', 0),
(313, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(314, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(315, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(316, 'google', 'google', 0),
(317, 'default-calendar', 'default-calendar', 0),
(318, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(319, 'bp-ges-single', 'bp-ges-single', 0),
(320, 'bp-ges-digest', 'bp-ges-digest', 0),
(321, 'bp-ges-notice', 'bp-ges-notice', 0),
(322, 'bp-ges-welcome', 'bp-ges-welcome', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(211, 38, 0),
(211, 39, 0),
(211, 40, 0),
(248, 320, 0),
(248, 321, 0),
(289, 65, 0),
(1028, 273, 0),
(1028, 277, 0),
(1028, 285, 0),
(1038, 320, 0),
(1038, 321, 0),
(1063, 149, 0),
(1077, 65, 0),
(1078, 65, 0),
(1079, 149, 0),
(1080, 149, 0),
(1087, 149, 0),
(1088, 149, 0),
(6536, 277, 0),
(6536, 292, 0),
(6639, 1, 0),
(6639, 277, 0),
(8142, 149, 0),
(8159, 149, 0),
(8161, 149, 0),
(8162, 149, 0),
(8163, 149, 0),
(8166, 278, 0),
(8167, 278, 0),
(8168, 278, 0),
(8169, 278, 0),
(8179, 149, 0),
(8180, 149, 0),
(8188, 282, 0),
(8189, 282, 0),
(8194, 276, 0),
(8194, 298, 0),
(8198, 149, 0),
(8200, 273, 0),
(8200, 283, 0),
(8200, 285, 0),
(8206, 276, 0),
(8206, 298, 0),
(8208, 149, 0),
(8209, 276, 0),
(8213, 149, 0),
(8236, 149, 0),
(8237, 149, 0),
(8238, 149, 0),
(8239, 268, 0),
(8239, 273, 0),
(8239, 285, 0),
(8245, 268, 0),
(8245, 270, 0),
(8245, 277, 0),
(8253, 276, 0),
(8253, 277, 0),
(8253, 301, 0),
(8257, 268, 0),
(8257, 277, 0),
(8257, 292, 0),
(8260, 277, 0),
(8260, 291, 0),
(8260, 302, 0),
(8264, 268, 0),
(8264, 277, 0),
(8264, 292, 0),
(8268, 268, 0),
(8268, 277, 0),
(8268, 292, 0),
(8268, 293, 0),
(8286, 149, 0),
(8287, 297, 0),
(8288, 270, 0),
(8288, 277, 0),
(8292, 268, 0),
(8292, 271, 0),
(8292, 277, 0),
(8295, 271, 0),
(8295, 277, 0),
(8299, 271, 0),
(8301, 268, 0),
(8301, 270, 0),
(8306, 1, 0),
(8306, 268, 0),
(8306, 270, 0),
(8306, 285, 0),
(8309, 268, 0),
(8309, 272, 0),
(8309, 300, 0),
(8316, 273, 0),
(8320, 273, 0),
(8326, 272, 0),
(8326, 277, 0),
(8329, 272, 0),
(8333, 273, 0),
(8336, 273, 0),
(8352, 271, 0),
(8359, 272, 0),
(8359, 277, 0),
(8362, 273, 0),
(8362, 277, 0),
(8362, 302, 0),
(8366, 273, 0),
(8375, 149, 0),
(8376, 297, 0),
(8377, 276, 0),
(8385, 293, 0),
(8389, 273, 0),
(8389, 293, 0),
(8392, 293, 0),
(8400, 149, 0),
(8405, 149, 0),
(8406, 278, 0),
(8431, 149, 0),
(8434, 149, 0),
(8445, 149, 0),
(8446, 278, 0),
(8483, 149, 0),
(8484, 278, 0),
(8487, 297, 0),
(8493, 297, 0),
(8494, 297, 0),
(8495, 297, 0),
(8496, 297, 0),
(8497, 297, 0),
(8498, 297, 0),
(8499, 297, 0),
(8500, 282, 0),
(8551, 282, 0),
(8552, 149, 0),
(8558, 267, 0),
(8559, 267, 0),
(8560, 267, 0),
(8561, 267, 0),
(8562, 267, 0),
(8563, 267, 0),
(8564, 267, 0),
(8565, 267, 0),
(8566, 149, 0),
(8577, 304, 0),
(8578, 305, 0),
(8579, 306, 0),
(8580, 307, 0),
(8581, 308, 0),
(8582, 309, 0),
(8583, 310, 0),
(8584, 311, 0),
(8585, 312, 0),
(8586, 313, 0),
(8587, 314, 0),
(8588, 315, 0),
(8589, 316, 0),
(8590, 317, 0),
(8591, 318, 0),
(8592, 319, 0),
(8595, 322, 0),
(8596, 323, 0),
(8597, 324, 0),
(8598, 325, 0),
(8599, 326, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
`term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(37, 33, 'topic-tag', '', 0, 0),
(38, 34, 'topic-tag', '', 0, 1),
(39, 35, 'topic-tag', '', 0, 1),
(40, 36, 'topic-tag', '', 0, 1),
(50, 46, 'bp_docs_associated_item', 'Document associat al node Professorat', 0, 0),
(51, 47, 'bp_docs_access', '', 0, 0),
(55, 51, 'bp_docs_access', '', 0, 0),
(57, 53, 'bp_docs_associated_item', 'Document associat al node Fotografia', 0, 0),
(65, 61, 'nav_menu', '', 0, 3),
(124, 120, 'bp_docs_access', '', 0, 0),
(125, 121, 'bp_docs_access', '', 0, 0),
(144, 140, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(149, 145, 'nav_menu', '', 0, 28),
(153, 149, 'bp_docs_associated_item', 'Document associat al node Formadors', 0, 0),
(154, 150, 'bp_docs_access', '', 0, 0),
(155, 151, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(156, 152, 'bp_docs_access', '', 0, 0),
(259, 255, 'post_tag', '', 0, 0),
(267, 263, 'nav_menu', '', 0, 8),
(268, 264, 'category', '', 0, 9),
(270, 266, 'category', '', 281, 4),
(271, 267, 'category', '', 281, 4),
(272, 268, 'category', '', 281, 4),
(273, 269, 'category', '', 281, 10),
(275, 271, 'category', '', 0, 0),
(276, 272, 'category', '', 0, 5),
(277, 273, 'category', '', 0, 15),
(278, 274, 'nav_menu', '', 0, 7),
(282, 278, 'nav_menu', '', 0, 4),
(283, 279, 'post_tag', '', 0, 1),
(285, 281, 'category', '', 0, 4),
(291, 287, 'category', '', 0, 1),
(292, 288, 'category', '', 264, 4),
(293, 289, 'category', '', 281, 4),
(297, 293, 'nav_menu', '', 0, 10),
(298, 294, 'category', '', 271, 2),
(300, 296, 'category', '', 281, 1),
(301, 297, 'category', '', 281, 1),
(302, 298, 'category', '', 281, 2),
(304, 300, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(305, 301, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(306, 302, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(307, 303, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(308, 304, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(309, 305, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(310, 306, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(311, 307, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(312, 308, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(313, 309, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(314, 310, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(315, 311, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(316, 312, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(317, 313, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(318, 314, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(319, 315, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(320, 316, 'calendar_feed', '', 0, 2),
(321, 317, 'calendar_type', '', 0, 2),
(322, 318, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(323, 319, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(324, 320, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(325, 321, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(326, 322, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'admin'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:2:{s:13:"administrator";b:1;s:13:"bbp_keymaster";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw'),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(15, 2, 'first_name', ''),
(16, 2, 'last_name', ''),
(17, 2, 'nickname', 'xtecadmin'),
(18, 2, 'description', ''),
(19, 2, 'rich_editing', 'true'),
(20, 2, 'comment_shortcuts', 'false'),
(21, 2, 'admin_color', 'sunrise'),
(22, 2, 'use_ssl', '0'),
(23, 2, 'show_admin_bar_front', 'true'),
(24, 2, 'wp_capabilities', 'a:2:{s:13:"administrator";b:1;s:13:"bbp_keymaster";b:1;}'),
(25, 2, 'wp_user_level', '10'),
(26, 2, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw,addtoany_settings_pointer,wp496_privacy'),
(27, 2, 'wp_dashboard_quick_press_last_post_id', '4'),
(28, 2, 'last_activity', '2019-05-13 12:46:19'),
(29, 2, 'closedpostboxes_slideshow', 'a:1:{i:2;s:5:"style";}'),
(30, 2, 'metaboxhidden_slideshow', 'a:2:{i:3;s:7:"slugdiv";i:4;s:5:"style";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '274'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&hidetb=1&wplink=1&posts_list_mode=list'),
(41, 2, 'wp_user-settings-time', '1459513106'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '0'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:2:{i:3;a:1:{i:0;i:5;}i:21;a:5:{i:0;i:66;i:1;i:67;i:2;i:69;i:3;i:70;i:4;i:79;}}}'),
(48, 1, 'last_activity', '2016-05-31 10:48:31'),
(49, 1, 'total_group_count', '12'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'libraryContent=browse&advImgDetails=hide&editor=tinymce&hidetb=1&posts_list_mode=list&wplink=1'),
(53, 1, 'wp_user-settings-time', '1463490821'),
(56, 1, 'nav_menu_recently_edited', '145'),
(57, 1, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:10:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:9:"add-forum";i:2;s:12:"add-gce_feed";i:3;s:12:"add-post_tag";i:4;s:15:"add-post_format";i:5;s:15:"add-ia_invitees";i:6;s:21:"add-ia_invited_groups";i:7;s:27:"add-bp_docs_associated_item";i:8;s:18:"add-bp_docs_access";i:9;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:32:"submitdiv,,slides-list,,,,,,,,,,";s:6:"normal";s:16:"slugdiv,settings";s:8:"advanced";s:0:"";}'),
(63, 1, 'screen_layout_slideshow', '2'),
(64, 1, 'ass_digest_items', 'a:1:{s:3:"dig";a:12:{i:2;a:1:{i:0;i:11;}i:1;a:5:{i:0;i:12;i:1;i:49;i:2;i:50;i:3;i:52;i:4;i:54;}i:5;a:1:{i:0;i:15;}i:9;a:1:{i:0;i:20;}i:14;a:4:{i:0;i:27;i:1;i:34;i:2;i:44;i:3;i:47;}i:15;a:2:{i:0;i:29;i:1;i:43;}i:16;a:1:{i:0;i:31;}i:17;a:4:{i:0;i:33;i:1;i:42;i:2;i:45;i:3;i:55;}i:18;a:1:{i:0;i:38;}i:19;a:1:{i:0;i:41;}i:33;a:13:{i:0;i:87;i:1;i:89;i:2;i:90;i:3;i:91;i:4;i:92;i:5;i:93;i:6;i:94;i:7;i:96;i:8;i:97;i:9;i:98;i:10;i:99;i:11;i:100;i:12;i:102;}i:31;a:2:{i:0;i:88;i:1;i:95;}}}'),
(66, 2, 'closedpostboxes_gce_feed', 'a:1:{i:0;s:21:"gce_feed_sidebar_help";}'),
(67, 2, 'metaboxhidden_gce_feed', 'a:1:{i:0;s:7:"slugdiv";}'),
(68, 1, 'closedpostboxes_gce_feed', 'a:0:{}'),
(69, 1, 'metaboxhidden_gce_feed', 'a:2:{i:0;s:24:"gce_display_options_meta";i:1;s:7:"slugdiv";}'),
(70, 2, 'bp_docs_count', '0'),
(73, 2, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(74, 2, 'metaboxhidden_post', 'a:5:{i:0;s:12:"revisionsdiv";i:1;s:16:"commentstatusdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";}'),
(75, 2, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(76, 2, 'metaboxhidden_page', 'a:2:{i:0;s:7:"slugdiv";i:1;s:9:"authordiv";}'),
(77, 2, 'closedpostboxes_page', 'a:0:{}'),
(168, 2, 'closedpostboxes_post', 'a:0:{}'),
(170, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(171, 1, 'metaboxhidden_page', 'a:3:{i:0;s:16:"commentstatusdiv";i:1;s:11:"commentsdiv";i:2;s:7:"slugdiv";}'),
(172, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(177, 1, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(178, 1, 'metaboxhidden_post', 'a:8:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:9:"formatdiv";i:4;s:11:"layout_meta";i:5;s:12:"revisionsdiv";i:6;s:7:"slugdiv";i:7;s:11:"ping_status";}'),
(180, 1, 'bp_docs_count', '24'),
(189, 1, 'session_tokens', 'a:1:{s:64:"3ecec766d463161d49f286bf33e4c84e2095226b26ed633be0023bf7b6586c48";a:4:{s:10:"expiration";i:1464861595;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1464688795;}}'),
(190, 1, 'closedpostboxes_nav-menus', 'a:0:{}'),
(194, 2, 'session_tokens', 'a:1:{s:64:"d89dd0b18a61f4a0d92a29773ec1ce3c4172377e7e11797fa16611dbf1cedb7f";a:4:{s:10:"expiration";i:1557917179;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557744379;}}');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BTCjgItZ8iX7Bapw9PlMhUcg18wju61', 'admin', 'a8000011@xtec.cat', '', '0000-00-00 00:00:00', '', 0, 'admin'),
(2, 'xtecadmin', '$P$BrDd03fo/ffyCrEyPh6brdrEvXBAZo/', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wsluserscontacts`
--

CREATE TABLE IF NOT EXISTS `wp_wsluserscontacts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wslusersprofiles`
--

CREATE TABLE IF NOT EXISTS `wp_wslusersprofiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `object_sha` varchar(45) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `language` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `birthday` int(11) NOT NULL,
  `birthmonth` int(11) NOT NULL,
  `birthyear` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(75) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(75) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_bpges_queued_items`
--
ALTER TABLE `wp_bpges_queued_items`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_group_activity_type` (`user_id`,`group_id`,`activity_id`,`type`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`), ADD KEY `activity_id` (`activity_id`), ADD KEY `user_group_type_date` (`user_id`,`type`,`date_recorded`);

--
-- Indexes for table `wp_bpges_subscriptions`
--
ALTER TABLE `wp_bpges_subscriptions`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`), ADD KEY `user_type` (`user_id`,`type`);

--
-- Indexes for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
 ADD PRIMARY KEY (`id`), ADD KEY `date_recorded` (`date_recorded`), ADD KEY `user_id` (`user_id`), ADD KEY `item_id` (`item_id`), ADD KEY `secondary_item_id` (`secondary_item_id`), ADD KEY `component` (`component`), ADD KEY `type` (`type`), ADD KEY `mptt_left` (`mptt_left`), ADD KEY `mptt_right` (`mptt_right`), ADD KEY `hide_sitewide` (`hide_sitewide`), ADD KEY `is_spam` (`is_spam`);

--
-- Indexes for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `activity_id` (`activity_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
 ADD PRIMARY KEY (`id`), ADD KEY `initiator_user_id` (`initiator_user_id`), ADD KEY `friend_user_id` (`friend_user_id`);

--
-- Indexes for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `creator_id` (`creator_id`), ADD KEY `status` (`status`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `is_admin` (`is_admin`), ADD KEY `is_mod` (`is_mod`), ADD KEY `user_id` (`user_id`), ADD KEY `inviter_id` (`inviter_id`), ADD KEY `is_confirmed` (`is_confirmed`);

--
-- Indexes for table `wp_bp_messages_messages`
--
ALTER TABLE `wp_bp_messages_messages`
 ADD PRIMARY KEY (`id`), ADD KEY `sender_id` (`sender_id`), ADD KEY `thread_id` (`thread_id`);

--
-- Indexes for table `wp_bp_messages_meta`
--
ALTER TABLE `wp_bp_messages_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `message_id` (`message_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_messages_notices`
--
ALTER TABLE `wp_bp_messages_notices`
 ADD PRIMARY KEY (`id`), ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `wp_bp_messages_recipients`
--
ALTER TABLE `wp_bp_messages_recipients`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `thread_id` (`thread_id`), ADD KEY `is_deleted` (`is_deleted`), ADD KEY `sender_only` (`sender_only`), ADD KEY `unread_count` (`unread_count`);

--
-- Indexes for table `wp_bp_mod_contents`
--
ALTER TABLE `wp_bp_mod_contents`
 ADD PRIMARY KEY (`content_id`), ADD KEY `item_type` (`item_type`), ADD KEY `item_id` (`item_id`), ADD KEY `item_id2` (`item_id2`), ADD KEY `item_author` (`item_author`), ADD KEY `item_date` (`item_date`), ADD KEY `status` (`status`);

--
-- Indexes for table `wp_bp_mod_flags`
--
ALTER TABLE `wp_bp_mod_flags`
 ADD PRIMARY KEY (`flag_id`), ADD KEY `content_id` (`content_id`), ADD KEY `reporter_id` (`reporter_id`), ADD KEY `date` (`date`);

--
-- Indexes for table `wp_bp_notifications`
--
ALTER TABLE `wp_bp_notifications`
 ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `secondary_item_id` (`secondary_item_id`), ADD KEY `user_id` (`user_id`), ADD KEY `is_new` (`is_new`), ADD KEY `component_name` (`component_name`), ADD KEY `component_action` (`component_action`), ADD KEY `useritem` (`user_id`,`is_new`);

--
-- Indexes for table `wp_bp_notifications_meta`
--
ALTER TABLE `wp_bp_notifications_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `notification_id` (`notification_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_bp_xprofile_data`
--
ALTER TABLE `wp_bp_xprofile_data`
 ADD PRIMARY KEY (`id`), ADD KEY `field_id` (`field_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_bp_xprofile_fields`
--
ALTER TABLE `wp_bp_xprofile_fields`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `field_order` (`field_order`), ADD KEY `can_delete` (`can_delete`), ADD KEY `is_required` (`is_required`);

--
-- Indexes for table `wp_bp_xprofile_groups`
--
ALTER TABLE `wp_bp_xprofile_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `can_delete` (`can_delete`);

--
-- Indexes for table `wp_bp_xprofile_meta`
--
ALTER TABLE `wp_bp_xprofile_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `object_id` (`object_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
 ADD PRIMARY KEY (`comment_ID`), ADD KEY `comment_post_ID` (`comment_post_ID`), ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`), ADD KEY `comment_date_gmt` (`comment_date_gmt`), ADD KEY `comment_parent` (`comment_parent`), ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_ig_blocked_emails`
--
ALTER TABLE `wp_ig_blocked_emails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_campaigns`
--
ALTER TABLE `wp_ig_campaigns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_contacts`
--
ALTER TABLE `wp_ig_contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_contacts_ips`
--
ALTER TABLE `wp_ig_contacts_ips`
 ADD PRIMARY KEY (`created_on`,`ip`), ADD KEY `ip` (`ip`);

--
-- Indexes for table `wp_ig_forms`
--
ALTER TABLE `wp_ig_forms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_lists`
--
ALTER TABLE `wp_ig_lists`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_lists_contacts`
--
ALTER TABLE `wp_ig_lists_contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_mailing_queue`
--
ALTER TABLE `wp_ig_mailing_queue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_ig_sending_queue`
--
ALTER TABLE `wp_ig_sending_queue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `post_id` (`post_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
 ADD PRIMARY KEY (`ID`), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`), ADD KEY `post_name` (`post_name`(191));

--
-- Indexes for table `wp_signups`
--
ALTER TABLE `wp_signups`
 ADD PRIMARY KEY (`signup_id`), ADD KEY `activation_key` (`activation_key`), ADD KEY `user_email` (`user_email`), ADD KEY `user_login_email` (`user_login`,`user_email`), ADD KEY `domain_path` (`domain`,`path`);

--
-- Indexes for table `wp_stats`
--
ALTER TABLE `wp_stats`
 ADD PRIMARY KEY (`stat_id`), ADD KEY `uid` (`uid`), ADD KEY `ip` (`ip`), ADD KEY `ipForward` (`ipForward`), ADD KEY `ipClient` (`ipClient`), ADD KEY `userAgent` (`userAgent`), ADD KEY `isadmin` (`isadmin`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `term_id` (`term_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
 ADD PRIMARY KEY (`term_id`), ADD KEY `name` (`name`(191)), ADD KEY `slug` (`slug`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
 ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`), ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
 ADD PRIMARY KEY (`term_taxonomy_id`), ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`), ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
 ADD PRIMARY KEY (`umeta_id`), ADD KEY `user_id` (`user_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`), ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `provider` (`provider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_bpges_queued_items`
--
ALTER TABLE `wp_bpges_queued_items`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bpges_subscriptions`
--
ALTER TABLE `wp_bpges_subscriptions`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `wp_bp_messages_messages`
--
ALTER TABLE `wp_bp_messages_messages`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_meta`
--
ALTER TABLE `wp_bp_messages_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_notices`
--
ALTER TABLE `wp_bp_messages_notices`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_messages_recipients`
--
ALTER TABLE `wp_bp_messages_recipients`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_mod_contents`
--
ALTER TABLE `wp_bp_mod_contents`
MODIFY `content_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_mod_flags`
--
ALTER TABLE `wp_bp_mod_flags`
MODIFY `flag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_notifications`
--
ALTER TABLE `wp_bp_notifications`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `wp_bp_notifications_meta`
--
ALTER TABLE `wp_bp_notifications_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_data`
--
ALTER TABLE `wp_bp_xprofile_data`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_fields`
--
ALTER TABLE `wp_bp_xprofile_fields`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_groups`
--
ALTER TABLE `wp_bp_xprofile_groups`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_bp_xprofile_meta`
--
ALTER TABLE `wp_bp_xprofile_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_ig_campaigns`
--
ALTER TABLE `wp_ig_campaigns`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_contacts`
--
ALTER TABLE `wp_ig_contacts`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_forms`
--
ALTER TABLE `wp_ig_forms`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_lists`
--
ALTER TABLE `wp_ig_lists`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_lists_contacts`
--
ALTER TABLE `wp_ig_lists_contacts`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_ig_mailing_queue`
--
ALTER TABLE `wp_ig_mailing_queue`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_ig_sending_queue`
--
ALTER TABLE `wp_ig_sending_queue`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12717;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6713;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8600;
--
-- AUTO_INCREMENT for table `wp_signups`
--
ALTER TABLE `wp_signups`
MODIFY `signup_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_stats`
--
ALTER TABLE `wp_stats`
MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=323;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_wsluserscontacts`
--
ALTER TABLE `wp_wsluserscontacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
