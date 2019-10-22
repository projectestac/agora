-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 13:23:29
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu3`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:48:04', 0, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2017-03-15 12:29:29', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8;

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
(223, 33, 'last_activity', '2015-12-02 13:11:28'),
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
(2, 1, 1, 'admin', '2017-03-15 11:19:53');

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
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000003@xtec.cat', 'Admin', 'a8000003@xtec.cat', '', '####Portada## ##', '1', 8193, 1, '2019-05-13 07:45:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 0, 'Admin', '', 'a8000003@xtec.cat', 'Migrated', 0, 'verified', 0, 'vnewsd-osyjgw-tdaing-ivetlr-dhimne', '2016-03-16 11:43:07', '2019-05-13 07:45:02', 1, 0, 0, 0, 1, 1, '');

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
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-05-13 07:45:02', NULL, NULL, 0);

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
(1, 'portada', 'Portada', '2019-05-13 07:45:02', NULL, NULL);

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
(1, 1, 1, 'subscribed', 2, '2016-03-16 11:43:07', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_sending_queue`
--

INSERT INTO `wp_ig_sending_queue` (`id`, `mailing_queue_id`, `mailing_queue_hash`, `campaign_id`, `contact_id`, `contact_hash`, `email`, `status`, `links`, `opened`, `sent_at`, `opened_at`) VALUES
(1, 0, 'rnitgf-nbmyxs-crxvau-mkayir-euzbws', 0, 0, '', 'a.example@example.com', 'Sent', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'rnitgf-nbmyxs-crxvau-mkayir-euzbws', 0, 1, 'vnewsd-osyjgw-tdaing-ivetlr-dhimne', 'a8000003@xtec.cat', 'Sent', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4922 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/masterpro/', 'yes'),
(2, 'blogname', 'Màster Projectes', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000003@xtec.cat', 'yes'),
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
(33, 'home', 'https://pwc-int.educacio.intranet/agora/masterpro/', 'yes'),
(34, 'category_base', '/categoria', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(37, 'comment_max_links', '3', 'yes'),
(38, 'gmt_offset', '', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'reactor', 'yes'),
(42, 'stylesheet', 'reactor-projectes', 'yes'),
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
(80, 'widget_text', 'a:4:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:4:"text";s:431:"<a class="twitter-timeline" href="https://twitter.com/sealtemporda" data-widget-id="671724820325916673">Tweets por el @sealtemporda.</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";s:0:"";}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
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
(93, 'widget_archives', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:0:{}s:7:"sidebar";a:7:{i:0;s:10:"nav_menu-8";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:32:"bp_core_recently_active_widget-2";i:6;s:11:"tag_cloud-5";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:4:{i:0;s:20:"logo_centre_widget-5";i:1;s:12:"gce_widget-2";i:2;s:6:"text-2";i:3;s:24:"email-subscribers-form-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:2:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:13:{i:1464817420;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1464860626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1464862363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1488877457;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489574932;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489574941;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489574948;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489576229;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489577005;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1489577045;a:1:{s:8:"do_pings";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1557733502;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"c4ec7e8bf1c7b3180b52df34932b3da0";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"dnqiax-bkrnja-zcyfxq-woxbhy-hpqiyc";}s:8:"interval";i:900;}}}i:1557743893;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
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
(152, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:16;s:8:"register";i:8113;s:8:"activate";i:8111;}', 'yes'),
(153, '_bp_db_version', '11105', 'yes'),
(157, 'bp_docs_attachment_protection', '1', 'yes'),
(158, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(159, 'ass_weekly_digest', '4', 'yes'),
(160, 'bp_like_db_version', '43', 'yes'),
(161, 'bp_like_settings', 'a:7:{s:17:"likers_visibility";s:8:"show_all";s:23:"post_to_activity_stream";i:1;s:12:"show_excerpt";i:0;s:14:"excerpt_length";i:140;s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:4:"Like";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:6:"Unlike";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:14:"Like this item";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:16:"Unlike this item";}s:10:"view_likes";a:2:{s:7:"default";s:19:"Mostra els m''agrada";s:6:"custom";s:10:"View likes";}s:10:"hide_likes";a:2:{s:7:"default";s:18:"Amaga els m''agrada";s:6:"custom";s:10:"Hide likes";}s:12:"update_likes";a:2:{s:7:"default";s:23:"Actualitza els m''agrada";s:6:"custom";s:23:"Actualitza els m''agrada";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:15:"Blog Post Likes";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";s:6:"custom";s:42:"Sorry, you must be logged in to like that.";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";s:6:"custom";s:57:"%user% liked their own <a href="%permalink%">activity</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";s:6:"custom";s:50:"%user% liked an <a href="%permalink%">activity</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";s:6:"custom";s:58:"%user% liked %author%''s <a href="%permalink%">activity</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:67:"%user% liked their own blog post, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:60:"%user% liked an blog post, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:68:"%user% liked %author%''s blog post, <a href="%permalink%">%title%</a>";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:13:"T''ha agradat.";s:6:"custom";s:46:"You are the only person who likes this so far.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:41:"A tu i a %count% altra persona us agrada.";s:6:"custom";s:39:"You and %count% other person like this.";}s:26:"you_and_username_like_this";a:2:{s:7:"default";s:22:"A tu i a %s us agrada.";s:6:"custom";s:22:"A tu i a %s us agrada.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:41:"A tu i a %count% persones més us agrada.";s:6:"custom";s:38:"You and %count% other people like this";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:36:"%count% persona li ha agradat això.";s:6:"custom";s:26:"%count% person likes this.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:38:"%count% persones els ha agradat això.";s:6:"custom";s:25:"%count% people like this.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:38:"i %count% persona li ha agradat això.";s:6:"custom";s:35:"and %count% other person like this.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:40:"i %count% persones els ha agradat això.";s:6:"custom";s:35:"and %count% other people like this.";}s:13:"two_like_this";a:2:{s:7:"default";s:25:"%s i %s els agrada això.";s:6:"custom";s:25:"%s i %s els agrada això.";}s:14:"one_likes_this";a:2:{s:7:"default";s:20:"%s els agrada això.";s:6:"custom";s:20:"%s els agrada això.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";s:6:"custom";s:74:"None of your friends like this yet, but you and %count% other person does.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";s:6:"custom";s:72:"None of your friends like this yet, but you and %count% other people do.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";s:6:"custom";s:66:"None of your friends like this yet, but %count% other person does.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";s:6:"custom";s:64:"None of your friends like this yet, but %count% other people do.";}}s:14:"name_or_avatar";s:4:"name";s:17:"remove_fav_button";s:1:"0";}', 'yes'),
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
(189, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/masterpro/', 'yes'),
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
(238, 'widget_tag_cloud', 'a:3:{i:1;a:0:{}i:5;a:3:{s:5:"title";s:9:"Etiquetes";s:8:"taxonomy";s:11:"bp_docs_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(239, 'widget_nav_menu', 'a:3:{i:1;a:0:{}i:8;a:2:{s:8:"nav_menu";i:61;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"front";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(240, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_gce_widget', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:1038;}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"Destacat";s:11:"slideshowId";s:3:"202";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_xtec_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_logo_centre_widget', 'a:3:{i:1;a:0:{}i:5;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'reactor_options', 'a:24:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:90:"https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2017/03/logo.png";s:16:"nomCanonicCentre";s:17:"Màster Projectes";s:14:"direccioCentre";s:16:"Via Augusta, 202";s:8:"cpCentre";s:21:"08021 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:11:"emailCentre";s:66:"https://pwc-int.educacio.intranet/agora/masterpro/linstitut/on-som";s:13:"paleta_colors";s:5:"blaus";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:2:"29";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"66";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";s:1:"1";s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:93:"https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/12/favicon.ico";s:11:"logo_inline";s:1:"1";s:14:"logotipVisible";b:0;s:9:"midaBarra";s:2:"90";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:16:{s:5:"icon1";s:10:"admin-home";s:10:"link_icon1";s:0:"";s:11:"title_icon1";s:5:"Inici";s:5:"icon2";s:9:"portfolio";s:10:"link_icon2";s:8:"formacio";s:11:"title_icon2";s:9:"Formació";s:5:"icon3";s:8:"location";s:10:"link_icon3";s:78:"https://pwc-int.educacio.intranet/agora/masterpro/comunitat/centres-educatius/";s:11:"title_icon3";s:7:"centres";s:5:"icon4";s:18:"welcome-learn-more";s:10:"link_icon4";s:55:"http://odissea.xtec.cat/course/index.php?categoryid=428";s:11:"title_icon4";s:12:"aula virtual";s:5:"icon5";s:6:"groups";s:10:"link_icon5";s:9:"activitat";s:11:"title_icon5";s:8:"intranet";s:14:"show_text_icon";s:2:"si";}', 'yes'),
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
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:54:"https://pwc-int.educacio.intranet/agora/masterpro/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";s:1:"1";}', 'yes'),
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
(2307, 'nodesbox_name', 'Màster Projectes', 'yes'),
(2427, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2428, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2434, 'common_css', '', 'yes'),
(2486, 'theme_mods_reactor-serveis-educatius', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:145;}}', 'yes'),
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
(4494, 'finished_splitting_shared_terms', '1', 'yes'),
(4495, 'site_icon', '0', 'yes'),
(4496, 'medium_large_size_w', '768', 'yes'),
(4497, 'medium_large_size_h', '0', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(4601, 'rewrite_rules', 'a:362:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(4614, 'bp-emails-unsubscribe-salt', 'XyZSOUBpQV0rY0d9WTMoO2dmU3JOTEVQYDxedTRWQSUhJkAgTjM+YXl5PCo7PThjW10yQElyST5qKl0zaChgJg==', 'yes'),
(4615, '_bp_ignore_deprecated_code', '', 'yes'),
(4616, 'calendar_feed_children', 'a:0:{}', 'yes'),
(4617, 'calendar_type_children', 'a:0:{}', 'yes'),
(4618, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(4619, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(4626, 'simple-calendar_version', '3.1.9', 'yes'),
(4636, 'theme_mods_reactor-projectes', 'a:2:{s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:145;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
(4637, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(4691, 'category_children', 'a:0:{}', 'yes'),
(4718, 'calendar_category_children', 'a:0:{}', 'yes'),
(4729, 'xtec_principal_node', 'Selecciona el node de professor', 'yes'),
(4734, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4743, 'current_sa_email_subscribers_db_version', '3.2', 'yes'),
(4759, 'toc-options', 'a:43:{s:15:"fragment_prefix";s:1:"i";s:8:"position";i:2;s:5:"start";i:4;s:17:"show_heading_text";b:1;s:12:"heading_text";s:10:"Continguts";s:22:"auto_insert_post_types";a:1:{i:0;s:4:"page";}s:14:"show_heirarchy";b:1;s:12:"ordered_list";b:0;s:13:"smooth_scroll";b:1;s:20:"smooth_scroll_offset";i:40;s:10:"visibility";b:0;s:15:"visibility_show";s:4:"show";s:15:"visibility_hide";s:4:"hide";s:26:"visibility_hide_by_default";b:0;s:5:"width";s:4:"Auto";s:12:"width_custom";d:275;s:18:"width_custom_units";s:2:"px";s:8:"wrapping";i:2;s:9:"font_size";d:95;s:15:"font_size_units";s:1:"%";s:5:"theme";i:1;s:24:"custom_background_colour";s:7:"#f9f9f9";s:20:"custom_border_colour";s:7:"#aaaaaa";s:19:"custom_title_colour";s:1:"#";s:19:"custom_links_colour";s:1:"#";s:25:"custom_links_hover_colour";s:1:"#";s:27:"custom_links_visited_colour";s:1:"#";s:9:"lowercase";b:0;s:9:"hyphenate";b:0;s:14:"bullet_spacing";b:0;s:16:"include_homepage";b:0;s:11:"exclude_css";b:0;s:7:"exclude";s:0:"";s:14:"heading_levels";a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}s:13:"restrict_path";s:6:"/docs/";s:19:"css_container_class";s:0:"";s:25:"sitemap_show_page_listing";b:1;s:29:"sitemap_show_category_listing";b:1;s:20:"sitemap_heading_type";i:3;s:13:"sitemap_pages";s:5:"Pages";s:18:"sitemap_categories";s:10:"Categories";s:23:"show_toc_in_widget_only";b:0;s:34:"show_toc_in_widget_only_post_types";a:1:{i:0;s:4:"page";}}', 'yes'),
(4766, 'es_rm_notice_email_subscribers', 'no', 'yes'),
(4767, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4768, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4769, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4770, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4771, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(4774, 'wptelegram_ver', '2.0.9', 'yes'),
(4775, 'widget_email-subscribers-form', 'a:3:{i:1;a:0:{}i:2;a:2:{s:5:"title";s:22:"Subscripció de correu";s:7:"form_id";i:1;}s:12:"_multiwidget";i:1;}', 'yes'),
(4779, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/masterpro?es=cron&guid=dnqiax-bkrnja-zcyfxq-woxbhy-hpqiyc', 'yes'),
(4780, 'ig_admin_notices', 'a:0:{}', 'yes'),
(4783, 'ig_es_sync_wp_users', 's:4:"b:0;";', 'yes'),
(4785, 'ig_es_320_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4787, 'ig_es_327_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4788, 'ig_es_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(4789, 'ig_es_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(4790, 'ig_es_fromname', 'Admin', 'yes'),
(4791, 'ig_es_fromemail', 'a8000003@xtec.cat', 'yes'),
(4792, 'ig_es_emailtype', 'WP HTML MAIL', 'yes'),
(4793, 'ig_es_notifyadmin', 'YES', 'yes'),
(4794, 'ig_es_adminemail', 'a8000003@xtec.cat', 'yes'),
(4795, 'ig_es_admin_new_sub_subject', 'Màster Projectes Subscripci&oacute; nova de correu', 'yes'),
(4796, 'ig_es_admin_new_sub_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4797, 'ig_es_welcomeemail', 'YES', 'yes'),
(4798, 'ig_es_welcomesubject', 'Màster Projectes Benvingut al nostre butlletí', 'yes'),
(4799, 'ig_es_welcomecontent', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4800, 'ig_es_optintype', 'Double Opt In', 'yes'),
(4801, 'ig_es_confirmsubject', 'Màster Projectes confirmeu la subscripció', 'yes'),
(4802, 'ig_es_confirmcontent', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4803, 'ig_es_optinlink', 'https://pwc-int.educacio.intranet/agora/masterpro/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(4804, 'ig_es_unsublink', 'https://pwc-int.educacio.intranet/agora/masterpro/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(4805, 'ig_es_unsubcontent', 'Si no esteu interessats en rebre correus des de Màster Projectes <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(4806, 'ig_es_unsubtext', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(4807, 'ig_es_successmsg', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(4808, 'ig_es_suberror', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(4809, 'ig_es_unsuberror', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(4811, 'ig_es_330_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4813, 'es_template_migration_done', 'yes', 'yes'),
(4815, 'ig_es_340_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4817, 'ig_es_3516_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4818, 'ig_es_from_name', 'Admin', 'yes'),
(4819, 'ig_es_from_email', 'a8000003@xtec.cat', 'yes'),
(4820, 'ig_es_admin_new_contact_email_subject', 'Màster Projectes Subscripci&oacute; nova de correu', 'yes'),
(4821, 'ig_es_admin_new_contact_email_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4822, 'ig_es_admin_emails', 'a8000003@xtec.cat', 'yes'),
(4823, 'ig_es_confirmation_mail_subject', 'Màster Projectes confirmeu la subscripció', 'yes'),
(4824, 'ig_es_confirmation_mail_content', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4825, 'ig_es_enable_welcome_email', 'yes', 'yes'),
(4826, 'ig_es_welcome_email_subject', 'Màster Projectes Benvingut al nostre butlletí', 'yes'),
(4827, 'ig_es_welcome_email_content', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nMàster Projectes', 'yes'),
(4828, 'ig_es_sent_report_subject', 'Butlletí Informe enviament', 'yes'),
(4829, 'ig_es_sent_report_content', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(4830, 'ig_es_unsubscribe_link', 'https://pwc-int.educacio.intranet/agora/masterpro/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(4831, 'ig_es_optin_link', 'https://pwc-int.educacio.intranet/agora/masterpro/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(4832, 'ig_es_unsubscribe_link_content', 'Si no esteu interessats en rebre correus des de Màster Projectes <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(4833, 'ig_es_email_type', 'wp_html_mail', 'yes'),
(4834, 'ig_es_notify_admin', 'yes', 'yes'),
(4835, 'ig_es_optin_type', 'double_opt_in', 'yes'),
(4836, 'ig_es_subscription_error_messsage', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(4837, 'ig_es_subscription_success_message', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(4838, 'ig_es_unsubscribe_error_message', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(4839, 'ig_es_unsubscribe_success_message', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(4841, 'ig_es_400_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4843, 'ig_es_401_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4845, 'ig_es_402_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4847, 'ig_es_403_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4849, 'ig_es_405_db_updated_at', '2019-05-13 07:45:02', 'no'),
(4850, 'ig_es_db_version', '4.0.9', 'yes'),
(4853, 'wp_page_for_privacy_policy', '0', 'yes'),
(4854, 'show_comments_cookies_opt_in', '1', 'yes'),
(4860, '_ges_installed_before_39', '1', 'yes'),
(4861, '_ges_39_subscriptions_table_created', '1', 'yes'),
(4862, '_ges_39_queued_items_table_created', '1', 'yes'),
(4863, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(4873, '_ges_39_subscriptions_migrated', '1', 'yes'),
(4874, 'can_compress_scripts', '1', 'no'),
(4876, '_ges_39_digest_queue_migrated', '1', 'yes'),
(4879, 'acui_columns', 'a:0:{}', 'yes'),
(4880, 'acui_mail_subject', 'Benvinguts a Màster Projectes', 'yes'),
(4881, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(4882, 'acui_mail_template_id', '0', 'yes'),
(4883, 'acui_mail_attachment_id', '0', 'yes'),
(4884, 'acui_enable_email_templates', '', 'yes'),
(4885, 'acui_cron_activated', '', 'yes'),
(4886, 'acui_cron_send_mail', '', 'yes'),
(4887, 'acui_cron_send_mail_updated', '', 'yes'),
(4888, 'acui_cron_delete_users', '', 'yes'),
(4889, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(4890, 'acui_cron_change_role_not_present', '', 'yes'),
(4891, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(4892, 'acui_cron_path_to_file', '', 'yes'),
(4893, 'acui_cron_path_to_move', '', 'yes'),
(4894, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(4895, 'acui_cron_period', '', 'yes'),
(4896, 'acui_cron_role', '', 'yes'),
(4897, 'acui_cron_update_roles_existing_users', '', 'yes'),
(4898, 'acui_cron_log', '', 'yes'),
(4899, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(4900, 'acui_frontend_send_mail', '', 'yes'),
(4901, 'acui_frontend_send_mail_updated', '', 'yes'),
(4902, 'acui_frontend_delete_users', '', 'yes'),
(4903, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(4904, 'acui_frontend_change_role_not_present', '', 'yes'),
(4905, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(4906, 'acui_frontend_role', '', 'yes'),
(4907, 'acui_manually_send_mail', '', 'yes'),
(4908, 'acui_manually_send_mail_updated', '', 'yes'),
(4909, 'acui_automatic_wordpress_email', '', 'yes'),
(4910, 'acui_show_profile_fields', '', 'yes'),
(4911, 'acui_settings', 'wordpress', 'yes'),
(4912, 'acui_mail_from', '', 'yes'),
(4913, 'acui_mail_from_name', '', 'yes'),
(4914, 'acui_mailer', 'smtp', 'yes'),
(4915, 'acui_mail_set_return_path', 'false', 'yes'),
(4916, 'acui_smtp_host', 'localhost', 'yes'),
(4917, 'acui_smtp_port', '25', 'yes'),
(4918, 'acui_smtp_ssl', 'none', 'yes'),
(4919, 'acui_smtp_auth', '', 'yes'),
(4920, 'acui_smtp_user', '', 'yes'),
(4921, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=4800 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1438071219:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(7, 9, '_edit_lock', '1438071225:2'),
(8, 9, '_edit_last', '2'),
(9, 9, '_wp_page_template', 'page-templates/front-page.php'),
(10, 9, '_rawhtml_settings', '0,0,0,0'),
(11, 9, '_template_layout', '2c-l'),
(16, 13, '_edit_lock', '1438071222:2'),
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
(406, 107, '_edit_lock', '1489576461:2'),
(407, 107, '_edit_last', '2'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:5:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:10:"Benvinguts";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1225";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"Formació";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Oferta formativa";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"656";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:19:"Foto taller alumnes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"141";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:108:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Prova a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}i:9;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=sLOyKqtF-vs";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
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
(1138, 239, '_wp_attached_file', 'bp-attachments/238/Selecció_713.png'),
(1139, 239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:310;s:6:"height";i:126;s:4:"file";s:36:"bp-attachments/238/Selecció_713.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_713-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_713-300x121.png";s:5:"width";i:300;s:6:"height";i:121;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_713-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_713-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1448881210:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', ''),
(1298, 255, '_wp_attached_file', '2015/01/foto-classe.png'),
(1299, 255, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1317, 248, 'gce_paging_widget', '1'),
(1372, 5, '_edit_lock', '1438071038:2'),
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
(1595, 107, 'picasa_album', ''),
(1596, 107, 'googlephotos_album', ''),
(1665, 146, '_wp_attachment_image_alt', 'Photo by Anna Armstrong'),
(1666, 146, '_edit_last', '1'),
(1667, 154, '_wp_attachment_image_alt', 'Photo by Xesc Arbona'),
(1668, 154, '_edit_last', '1'),
(1670, 328, '_wp_attached_file', '2015/11/BN_SE1.png'),
(1671, 328, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1343;s:6:"height";i:798;s:4:"file";s:18:"2015/11/BN_SE1.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"BN_SE1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"BN_SE1-300x178.png";s:5:"width";i:300;s:6:"height";i:178;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:19:"BN_SE1-1024x608.png";s:5:"width";i:1024;s:6:"height";i:608;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"BN_SE1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"BN_SE1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1753, 656, '_wp_attached_file', '2015/11/formador.png'),
(1754, 656, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:313;s:6:"height";i:204;s:4:"file";s:20:"2015/11/formador.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"formador-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"formador-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"formador-300x204.png";s:5:"width";i:300;s:6:"height";i:204;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"formador-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1755, 659, '_wp_attached_file', '2015/11/calendari.jpg'),
(1756, 659, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:555;s:6:"height";i:431;s:4:"file";s:21:"2015/11/calendari.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"calendari-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"calendari-300x233.jpg";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"calendari-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"calendari-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1848, 510, 'bp_docs_last_editor', '1'),
(1849, 510, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1850, 510, 'bp_docs_revision_count', '3'),
(1851, 515, 'bp_docs_last_editor', '1'),
(1852, 515, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1853, 515, 'bp_docs_revision_count', '5'),
(1854, 518, 'bp_docs_last_editor', '1'),
(1855, 518, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1856, 518, 'bp_docs_revision_count', '2'),
(1857, 521, 'bp_docs_last_editor', '1'),
(1858, 521, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1859, 521, 'bp_docs_revision_count', '2'),
(1860, 524, 'bp_docs_last_editor', '1'),
(1861, 524, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1862, 524, 'bp_docs_revision_count', '3'),
(1863, 528, 'bp_docs_last_editor', '1'),
(1864, 528, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1865, 528, 'bp_docs_revision_count', '2'),
(1866, 531, 'bp_docs_last_editor', '1'),
(1867, 531, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1868, 531, 'bp_docs_revision_count', '4'),
(1869, 684, 'bp_docs_last_editor', '1'),
(1870, 684, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1871, 684, 'bp_docs_revision_count', '7'),
(1872, 684, '_edit_last', '1'),
(1873, 687, 'bp_docs_last_editor', '1'),
(1874, 687, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1875, 687, 'bp_docs_revision_count', '6'),
(1876, 689, 'bp_docs_last_editor', '1'),
(1877, 689, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1878, 689, 'bp_docs_revision_count', '1'),
(1879, 693, 'bp_docs_last_editor', '1'),
(1880, 693, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1881, 693, 'bp_docs_revision_count', '4'),
(1883, 697, 'bp_docs_last_editor', '1'),
(1884, 697, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1885, 697, 'bp_docs_revision_count', '5'),
(1886, 701, 'bp_docs_last_editor', '1'),
(1887, 701, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1888, 701, 'bp_docs_revision_count', '5'),
(1889, 704, 'bp_docs_last_editor', '1'),
(1890, 704, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1891, 704, 'bp_docs_revision_count', '8'),
(1892, 732, 'bp_docs_last_editor', '1'),
(1893, 732, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:8:"loggedin";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:8:"loggedin";}'),
(1894, 732, 'bp_docs_revision_count', '6'),
(1895, 732, '_edit_last', '1'),
(1896, 736, 'bp_docs_last_editor', '1'),
(1897, 736, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:8:"loggedin";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:8:"loggedin";}'),
(1898, 736, 'bp_docs_revision_count', '5'),
(1899, 739, 'bp_docs_last_editor', '1'),
(1900, 739, 'bp_docs_settings', 'a:5:{s:4:"read";s:8:"loggedin";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:8:"loggedin";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:8:"loggedin";}'),
(1901, 739, 'bp_docs_revision_count', '2'),
(1902, 765, 'bp_docs_last_editor', '1'),
(1903, 765, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1904, 765, 'bp_docs_revision_count', '8'),
(1905, 769, 'bp_docs_last_editor', '1'),
(1906, 769, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:8:"loggedin";}'),
(1907, 769, 'bp_docs_revision_count', '2'),
(1908, 879, 'bp_docs_last_editor', '1'),
(1909, 879, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1910, 879, 'bp_docs_revision_count', '2'),
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
(2007, 175, '_bbp_last_active_id', '0'),
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
(2064, 944, 'bp_docs_last_editor', '1'),
(2065, 944, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(2066, 944, 'bp_docs_revision_count', '4'),
(2067, 952, 'bp_docs_last_editor', '1'),
(2068, 952, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(2069, 952, 'bp_docs_revision_count', '2'),
(2070, 952, '_bp_docs_last_pinged', '1448826123:1'),
(2071, 956, 'bp_docs_last_editor', '1'),
(2072, 956, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(2073, 956, 'bp_docs_revision_count', '4'),
(2075, 982, 'bp_docs_last_editor', '1'),
(2076, 982, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(2077, 982, 'bp_docs_revision_count', '1'),
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
(2148, 1038, '_edit_last', '1'),
(2150, 1038, '_wp_old_slug', 'institut-larany'),
(2156, 248, 'gce_list_max_num', '7'),
(2157, 248, 'gce_list_max_length', 'days'),
(2159, 248, 'gce_feed_start_interval', 'months'),
(2161, 248, 'gce_feed_end_interval', 'years'),
(2171, 248, '_edit_last', '2'),
(2175, 248, 'gce_widget_paging_interval', ''),
(2181, 248, 'gce_paging_widget', '1'),
(2235, 602, '_edit_last', '2'),
(2236, 602, 'sharing_disabled', '1'),
(2239, 602, 'gce_paging_widget', '1'),
(2240, 602, 'gce_widget_paging_interval', '604800'),
(2248, 748, '_edit_last', '1'),
(2249, 748, 'sharing_disabled', '1'),
(2252, 748, 'gce_paging_widget', '1'),
(2253, 748, 'gce_widget_paging_interval', '604800'),
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
(2271, 882, '_edit_last', '1'),
(2274, 882, 'gce_paging_widget', '1'),
(2275, 882, 'gce_widget_paging_interval', '604800'),
(2284, 1046, '_menu_item_type', 'custom'),
(2285, 1046, '_menu_item_menu_item_parent', '0'),
(2286, 1046, '_menu_item_object_id', '1046'),
(2287, 1046, '_menu_item_object', 'custom'),
(2288, 1046, '_menu_item_target', ''),
(2289, 1046, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2290, 1046, '_menu_item_xfn', ''),
(2291, 1046, '_menu_item_url', '#'),
(2420, 1063, '_menu_item_type', 'custom'),
(2421, 1063, '_menu_item_menu_item_parent', '0'),
(2422, 1063, '_menu_item_object_id', '1063'),
(2423, 1063, '_menu_item_object', 'custom'),
(2424, 1063, '_menu_item_target', ''),
(2425, 1063, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2426, 1063, '_menu_item_xfn', ''),
(2427, 1063, '_menu_item_url', '#'),
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
(2507, 306, '_edit_last', '2'),
(2508, 306, '_wp_page_template', 'page-templates/side-menu.php'),
(2509, 306, '_template_layout', '2c-l'),
(2510, 306, 'sharing_disabled', '1'),
(2511, 318, '_edit_last', '2'),
(2512, 318, '_wp_page_template', 'page-templates/side-menu.php'),
(2513, 318, '_template_layout', '2c-l'),
(2514, 318, 'sharing_disabled', '1'),
(2656, 608, '_edit_last', '2'),
(2657, 608, '_wp_page_template', 'page-templates/side-menu.php'),
(2658, 608, '_template_layout', '2c-l'),
(2659, 608, 'sharing_disabled', '1'),
(2660, 797, '_edit_last', '2');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2661, 797, '_wp_page_template', 'page-templates/side-menu.php'),
(2662, 797, '_template_layout', '2c-l'),
(2663, 806, '_edit_last', '2'),
(2664, 806, '_wp_page_template', 'page-templates/side-menu.php'),
(2665, 806, '_template_layout', '2c-l'),
(3006, 31, '_edit_last', '1'),
(3007, 31, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3008, 31, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3009, 31, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Gimnàs";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Aules polivalents";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Breu descripció";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"33";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:12:"Sala d''actes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(3010, 107, '_edit_last', '2'),
(3011, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3012, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3013, 107, 'slides', 'a:5:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:10:"Benvinguts";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"1225";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"Formació";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Oferta formativa";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"656";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:19:"Foto taller alumnes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"141";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:108:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Prova a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}i:9;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=sLOyKqtF-vs";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
(3014, 107, 'picasa_album', ''),
(3015, 107, 'googlephotos_album', ''),
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
(3204, 306, '_edit_lock', '1488877166:2'),
(3228, 1038, '_edit_lock', '1448882126:2'),
(3231, 60, 'gce_paging_widget', '1'),
(3232, 60, 'gce_widget_paging_interval', '604800'),
(3233, 60, 'gce_paging', ''),
(3234, 602, '_edit_lock', '1448882599:2'),
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
(3571, 956, '_edit_last', '1'),
(3665, 1224, '_wp_attached_file', '2015/12/favicon.ico'),
(3666, 1225, '_wp_attached_file', '2015/12/SEAltPenedes.jpg'),
(3667, 1225, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:359;s:6:"height";i:269;s:4:"file";s:24:"2015/12/SEAltPenedes.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"SEAltPenedes-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"SEAltPenedes-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"SEAltPenedes-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"SEAltPenedes-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3688, 456, '_edit_lock', '1448989057:1'),
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
(3755, 608, '_edit_lock', '1488877168:2'),
(3756, 797, '_edit_lock', '1488877128:2'),
(3757, 318, '_edit_lock', '1488877170:2'),
(3833, 1307, '_menu_item_type', 'custom'),
(3834, 1307, '_menu_item_menu_item_parent', '1046'),
(3835, 1307, '_menu_item_object_id', '1307'),
(3836, 1307, '_menu_item_object', 'custom'),
(3837, 1307, '_menu_item_target', ''),
(3838, 1307, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3839, 1307, '_menu_item_xfn', ''),
(3840, 1307, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/masterpro/docs'),
(4307, 1157, '_bbp_pre_spammed_replies', 'a:1:{i:0;i:1159;}'),
(4308, 1157, '_bbp_spam_meta_status', 'publish'),
(4309, 1156, '_bbp_spam_meta_status', 'publish'),
(4310, 8111, '_edit_lock', '1459252108:2'),
(4311, 8111, '_edit_last', '1'),
(4312, 8111, '_wp_page_template', 'default'),
(4313, 8111, 'sharing_disabled', '1'),
(4314, 8111, '_template_layout', '2c-l'),
(4315, 8113, '_edit_last', '2'),
(4316, 8113, '_wp_page_template', 'default'),
(4317, 8113, '_template_layout', '2c-l'),
(4318, 8113, '_edit_lock', '1459252136:2'),
(4319, 8113, 'sharing_disabled', '1'),
(4320, 882, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(4321, 882, '_default_calendar_list_range_type', 'events'),
(4322, 882, '_default_calendar_list_range_span', '1'),
(4323, 882, '_calendar_begins', 'today'),
(4324, 882, '_feed_earliest_event_date', 'calendar_start'),
(4325, 882, '_feed_earliest_event_date_range', '1'),
(4326, 882, '_feed_latest_event_date', 'calendar_start'),
(4327, 882, '_feed_latest_event_date_range', '1'),
(4328, 882, '_default_calendar_event_bubble_trigger', 'hover'),
(4329, 882, '_default_calendar_expand_multi_day_events', 'no'),
(4330, 882, '_google_calendar_id', 'eHRlYy5jYXRfdjdxcXVodHVwZGpyaDM4MTJyczFpZ2czZmNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(4331, 882, '_google_events_max_results', '2500'),
(4332, 882, '_google_events_recurring', 'show'),
(4333, 882, '_calendar_date_format_setting', 'use_site'),
(4334, 882, '_calendar_time_format_setting', 'use_site'),
(4335, 882, '_calendar_datetime_separator', '@'),
(4336, 882, '_calendar_week_starts_on_setting', 'use_site'),
(4337, 882, '_feed_cache_user_unit', '60'),
(4338, 882, '_feed_cache_user_amount', '5'),
(4339, 882, '_feed_cache', '300'),
(4340, 882, '_calendar_version', '3.0.0'),
(4341, 748, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(4342, 748, '_default_calendar_list_range_type', 'events'),
(4343, 748, '_default_calendar_list_range_span', '1'),
(4344, 748, '_calendar_begins', 'today'),
(4345, 748, '_feed_earliest_event_date', 'calendar_start'),
(4346, 748, '_feed_earliest_event_date_range', '1'),
(4347, 748, '_feed_latest_event_date', 'calendar_start'),
(4348, 748, '_feed_latest_event_date_range', '1'),
(4349, 748, '_default_calendar_event_bubble_trigger', 'hover'),
(4350, 748, '_default_calendar_expand_multi_day_events', 'no'),
(4351, 748, '_google_calendar_id', 'eHRlYy5jYXRfM291bTNsaDZ0cW84NTE5c3ZtN3JuZXA4YmdAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(4352, 748, '_google_events_max_results', '2500'),
(4353, 748, '_google_events_recurring', 'show'),
(4354, 748, '_calendar_date_format_setting', 'use_site'),
(4355, 748, '_calendar_time_format_setting', 'use_site'),
(4356, 748, '_calendar_datetime_separator', '@'),
(4357, 748, '_calendar_week_starts_on_setting', 'use_site'),
(4358, 748, '_feed_cache_user_unit', '60'),
(4359, 748, '_feed_cache_user_amount', '5'),
(4360, 748, '_feed_cache', '300'),
(4361, 748, '_calendar_version', '3.0.0'),
(4362, 602, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(4363, 602, '_default_calendar_list_range_type', 'daily'),
(4364, 602, '_default_calendar_list_range_span', '7'),
(4365, 602, '_calendar_begins', 'today'),
(4366, 602, '_feed_earliest_event_date', 'calendar_start'),
(4367, 602, '_feed_earliest_event_date_range', '1'),
(4368, 602, '_feed_latest_event_date', 'calendar_start'),
(4369, 602, '_feed_latest_event_date_range', '1'),
(4370, 602, '_default_calendar_event_bubble_trigger', 'hover'),
(4371, 602, '_default_calendar_expand_multi_day_events', 'no'),
(4372, 602, '_google_calendar_id', 'eHRlYy5jYXRfcXQzMzlnZDg2ZTU2czU3Nmo4N2lpcjUwaDhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(4373, 602, '_google_events_max_results', '2500'),
(4374, 602, '_google_events_recurring', 'show'),
(4375, 602, '_calendar_date_format_setting', 'use_site'),
(4376, 602, '_calendar_time_format_setting', 'use_site'),
(4377, 602, '_calendar_datetime_separator', '@'),
(4378, 602, '_calendar_week_starts_on_setting', 'use_site'),
(4379, 602, '_feed_cache_user_unit', '60'),
(4380, 602, '_feed_cache_user_amount', '5'),
(4381, 602, '_feed_cache', '300'),
(4382, 602, '_calendar_version', '3.0.0'),
(4383, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(4384, 248, '_default_calendar_list_range_type', 'daily'),
(4385, 248, '_default_calendar_list_range_span', '7'),
(4386, 248, '_calendar_begins', 'today'),
(4387, 248, '_feed_earliest_event_date', 'calendar_start'),
(4388, 248, '_feed_earliest_event_date_range', '1'),
(4389, 248, '_feed_latest_event_date', 'calendar_start'),
(4390, 248, '_feed_latest_event_date_range', '1'),
(4391, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(4392, 248, '_default_calendar_expand_multi_day_events', 'no'),
(4393, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(4394, 248, '_google_events_max_results', '2500'),
(4395, 248, '_google_events_recurring', 'show'),
(4396, 248, '_calendar_date_format_setting', 'use_site'),
(4397, 248, '_calendar_time_format_setting', 'use_site'),
(4398, 248, '_calendar_datetime_separator', '@'),
(4399, 248, '_calendar_week_starts_on_setting', 'use_site'),
(4400, 248, '_feed_cache_user_unit', '3600'),
(4401, 248, '_feed_cache_user_amount', '1'),
(4402, 248, '_feed_cache', '3600'),
(4403, 248, '_calendar_version', '3.0.0'),
(4404, 1038, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(4405, 1038, '_default_calendar_list_range_type', 'events'),
(4406, 1038, '_default_calendar_list_range_span', '1'),
(4407, 1038, '_calendar_begins', 'today'),
(4408, 1038, '_feed_earliest_event_date', 'calendar_start'),
(4409, 1038, '_feed_earliest_event_date_range', '1'),
(4410, 1038, '_feed_latest_event_date', 'calendar_start'),
(4411, 1038, '_feed_latest_event_date_range', '1'),
(4412, 1038, '_default_calendar_event_bubble_trigger', 'hover'),
(4413, 1038, '_default_calendar_expand_multi_day_events', 'no'),
(4414, 1038, '_google_calendar_id', 'aW5mb0ByZXBvcnRlZHVjYWNpby5jYXQ='),
(4415, 1038, '_google_events_max_results', '2500'),
(4416, 1038, '_google_events_recurring', 'show'),
(4417, 1038, '_calendar_date_format_setting', 'use_site'),
(4418, 1038, '_calendar_time_format_setting', 'use_site'),
(4419, 1038, '_calendar_datetime_separator', '@'),
(4420, 1038, '_calendar_week_starts_on_setting', 'use_site'),
(4421, 1038, '_feed_cache_user_unit', '60'),
(4422, 1038, '_feed_cache_user_amount', '5'),
(4423, 1038, '_feed_cache', '300'),
(4424, 1038, '_calendar_version', '3.0.0'),
(4425, 806, '_edit_lock', '1488877099:2'),
(4426, 806, 'sharing_disabled', '1'),
(4427, 797, 'sharing_disabled', '1'),
(4636, 647, '_wp_trash_meta_status', 'publish'),
(4637, 647, '_wp_trash_meta_time', '1488877485'),
(4638, 647, '_wp_desired_post_slug', 'scjuguem-sense-barreres'),
(4639, 456, '_wp_trash_meta_status', 'publish'),
(4640, 456, '_wp_trash_meta_time', '1488877489'),
(4641, 456, '_wp_desired_post_slug', 'activitats-de-zona-destacades'),
(4642, 364, '_wp_trash_meta_status', 'publish'),
(4643, 364, '_wp_trash_meta_time', '1488877496'),
(4644, 364, '_wp_desired_post_slug', 'noticies'),
(4645, 202, '_wp_trash_meta_status', 'publish'),
(4646, 202, '_wp_trash_meta_time', '1488877500'),
(4647, 202, '_wp_desired_post_slug', 'destacat-nodes'),
(4648, 148, '_wp_trash_meta_status', 'publish'),
(4649, 148, '_wp_trash_meta_time', '1488877506'),
(4650, 148, '_wp_desired_post_slug', 'exemple'),
(4651, 31, '_wp_trash_meta_status', 'publish'),
(4652, 31, '_wp_trash_meta_time', '1488877509'),
(4653, 31, '_wp_desired_post_slug', 'instal%c2%b7lacions'),
(4654, 748, '_wp_trash_meta_status', 'publish'),
(4655, 748, '_wp_trash_meta_time', '1488877522'),
(4656, 748, '_wp_desired_post_slug', 'se-tancat'),
(4657, 602, '_wp_trash_meta_status', 'publish'),
(4658, 602, '_wp_trash_meta_time', '1488877525'),
(4659, 602, '_wp_desired_post_slug', 'maletes-pedagogiques'),
(4660, 1038, '_wp_trash_meta_status', 'publish'),
(4661, 1038, '_wp_trash_meta_time', '1488877528'),
(4662, 1038, '_wp_desired_post_slug', 'se'),
(4663, 882, '_wp_trash_meta_status', 'publish'),
(4664, 882, '_wp_trash_meta_time', '1488877530'),
(4665, 882, '_wp_desired_post_slug', 'reserva-daparells'),
(4775, 8186, '_wp_attached_file', '2017/03/logo.png'),
(4776, 8186, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:519;s:6:"height";i:300;s:4:"file";s:16:"2017/03/logo.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"logo-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:16:"logo-300x173.png";s:5:"width";i:300;s:6:"height";i:173;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"logo-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"logo-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4777, 107, 'album_extension', ''),
(4783, 8189, '_edit_lock', '1489576953:1'),
(4784, 8189, '_edit_last', '1'),
(4785, 8189, '_pingme', '1'),
(4786, 8189, '_encloseme', '1'),
(4787, 8189, '_amaga_titol', ''),
(4788, 8189, '_amaga_metadata', ''),
(4789, 8189, '_bloc_html', ''),
(4790, 8189, '_original_size', ''),
(4791, 8189, '_entry_icon', 'noicon'),
(4792, 8191, '_wp_attached_file', '2017/03/rocket4-300x150.png'),
(4793, 8191, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:300;s:6:"height";i:150;s:4:"file";s:27:"2017/03/rocket4-300x150.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"rocket4-300x150-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"rocket4-300x150-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"rocket4-300x150-300x150.png";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"rocket4-300x150-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4794, 8189, '_thumbnail_id', '8191'),
(4795, 8189, '_pingme', '1'),
(4796, 8189, '_encloseme', '1'),
(4797, 8193, 'es_template_type', 'post_notification'),
(4798, 8194, 'es_template_type', 'post_notification'),
(4799, 8195, 'es_template_type', 'Newsletter');

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
) ENGINE=InnoDB AUTO_INCREMENT=8200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-12 10:15:01', '2014-09-12 10:15:01', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=9', 0, 'page', '', 0),
(13, 1, '2014-09-12 11:05:02', '2014-09-12 11:05:02', 'Pàgina d''avís', 'Avís', '', 'publish', 'closed', 'closed', '', 'avis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=13', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/nodes/', 0, 'page', '', 0),
(31, 1, '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 'Instal·lacions', '', 'trash', 'closed', 'closed', '', 'instal%c2%b7lacions__trashed', '', '', '2017-03-07 10:05:09', '2017-03-07 09:05:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=31', 0, 'slideshow', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2017-03-15 12:16:41', '2017-03-15 11:16:41', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-socials', 0, 'forum', '', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(146, 1, '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 'gimnas', '', 'inherit', 'open', 'open', '', 'gimnas', '', '', '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/gimnas.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple', '', 'trash', 'closed', 'closed', '', 'exemple__trashed', '', '', '2017-03-07 10:05:06', '2017-03-07 09:05:06', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(154, 1, '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 'Xesc_Arbona', '', 'inherit', 'open', 'open', '', 'xesc_arbona', '', '', '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/Xesc_Arbona.png', 0, 'attachment', 'image/png', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/dep-informatica', 0, 'forum', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'trash', 'closed', 'closed', '', 'destacat-nodes__trashed', '', '', '2017-03-07 10:05:00', '2017-03-07 09:05:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/fotografia', 0, 'forum', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/papiroflexia', 0, 'forum', '', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2015-12-02 15:39:31', '2015-12-02 14:39:31', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(239, 1, '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 'Selecció_713', '', 'inherit', 'open', 'open', '', 'seleccio_713', '', '', '2015-12-02 15:41:08', '2015-12-02 14:41:08', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/bp-attachments/238/Selecció_713.png', 0, 'attachment', 'image/png', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\r\n[if-not-all-day]\r\n[if-single-day]\r\n<div>Quan: [start-time]-[end-time]</div>\r\n[/if-single-day]\r\n[/if-not-all-day]\r\n[if-multi-day]\r\n<div>Del [start-date] fins al [end-date]</div>\r\n[/if-multi-day]\r\n[if-location]\r\n<div>On: [location]</div>\r\n[/if-location]\r\n[if-description]\r\n<div>[description]</div>\r\n[/if-description]\r\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'Agenda d''exemple', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2015-11-30 12:02:26', '2015-11-30 11:02:26', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(255, 1, '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(289, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', '', 'Mur general', '', 'publish', 'open', 'open', '', '289', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?p=289', 1, 'nav_menu_item', '', 0),
(306, 1, '2015-11-24 18:02:44', '2015-11-24 17:02:44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut bibendum libero. Donec lectus purus, pellentesque et volutpat non, euismod id erat. Aliquam vitae tincidunt lacus. Vivamus aliquet ornare tellus, quis varius nisl suscipit posuere. Aliquam interdum at neque et feugiat. Nullam odio orci, condimentum eu lobortis eu, feugiat sit amet sapien. Cras vitae condimentum risus. Aliquam erat volutpat. Nullam cursus justo nec purus elementum condimentum.\r\n\r\nSuspendisse in enim sed diam mattis fermentum a vitae tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sed ligula tortor. Vestibulum at odio a turpis sollicitudin feugiat ut vel dolor. Donec venenatis, est ullamcorper tincidunt congue, risus neque bibendum lorem, id vulputate metus elit vitae mi. Sed sit amet magna faucibus, tempor est ut, porta felis. In hac habitasse platea dictumst. Ut posuere neque quis metus suscipit, ac congue mi rutrum. Nulla facilisi. Duis eleifend diam ac lectus mollis, quis tempor felis egestas. Donec laoreet elit non magna blandit, sed mollis arcu faucibus.\r\n', 'Equip', '', 'publish', 'closed', 'closed', '', 'equip', '', '', '2017-03-07 10:01:26', '2017-03-07 09:01:26', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=306', 20, 'page', '', 0),
(318, 1, '2015-11-24 18:18:24', '2015-11-24 17:18:24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut bibendum libero. Donec lectus purus, pellentesque et volutpat non, euismod id erat. Aliquam vitae tincidunt lacus. Vivamus aliquet ornare tellus, quis varius nisl suscipit posuere. Aliquam interdum at neque et feugiat. Nullam odio orci, condimentum eu lobortis eu, feugiat sit amet sapien. Cras vitae condimentum risus. Aliquam erat volutpat. Nullam cursus justo nec purus elementum condimentum.\r\n\r\nSuspendisse in enim sed diam mattis fermentum a vitae tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sed ligula tortor. Vestibulum at odio a turpis sollicitudin feugiat ut vel dolor. Donec venenatis, est ullamcorper tincidunt congue, risus neque bibendum lorem, id vulputate metus elit vitae mi. Sed sit amet magna faucibus, tempor est ut, porta felis. In hac habitasse platea dictumst. Ut posuere neque quis metus suscipit, ac congue mi rutrum. Nulla facilisi. Duis eleifend diam ac lectus mollis, quis tempor felis egestas. Donec laoreet elit non magna blandit, sed mollis arcu faucibus.\r\n', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2017-03-07 10:01:40', '2017-03-07 09:01:40', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=318', 50, 'page', '', 0),
(328, 1, '2015-11-20 13:32:14', '2015-11-20 12:32:14', '', 'BN_SE', '', 'inherit', 'open', 'open', '', 'bn_se-2', '', '', '2015-11-20 13:32:14', '2015-11-20 12:32:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/11/BN_SE1.png', 0, 'attachment', 'image/png', 0),
(364, 1, '2015-11-25 09:25:29', '2015-11-25 08:25:29', '', 'Notícies', '', 'trash', 'closed', 'closed', '', 'noticies__trashed', '', '', '2017-03-07 10:04:56', '2017-03-07 09:04:56', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=364', 0, 'slideshow', '', 0),
(456, 1, '2015-11-25 17:36:08', '2015-11-25 16:36:08', '', 'Activitats de zona destacades', '', 'trash', 'closed', 'closed', '', 'activitats-de-zona-destacades__trashed', '', '', '2017-03-07 10:04:49', '2017-03-07 09:04:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=456', 0, 'slideshow', '', 0),
(510, 1, '2015-11-26 14:22:25', '2015-11-26 13:22:25', 'Criteris, instruccions i orientacions, 2015-16', 'Formació del professorat. Criteris, instruccions i orientacions (2015-16)', '', 'publish', 'open', 'open', '', 'formacio-del-professorat', '', '', '2015-12-02 14:16:11', '2015-12-02 13:16:11', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(515, 1, '2015-11-26 16:36:06', '2015-11-26 15:36:06', 'Orientacions als centres educatius per a desenvolupar un projecte de servei comunitari', 'Orientacions per projecte de servei comunitari', '', 'publish', 'open', 'open', '', 'orientacions-per-projecte-de-servei-comunitari', '', '', '2015-12-02 14:13:15', '2015-12-02 13:13:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(518, 1, '2015-11-26 16:44:29', '2015-11-26 15:44:29', 'Exemple d''una bona experiència: La participació dels joves en el municipi de Vilanova i Vallromanes', 'Experiència d’aprenentatge servei comunitari', '', 'publish', 'open', 'open', '', 'experiencia-daprenentatge-servei-comunitari', '', '', '2015-12-02 14:15:27', '2015-12-02 13:15:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(521, 1, '2015-11-26 16:45:58', '2015-11-26 15:45:58', '', 'Model de document de compromís', '', 'publish', 'open', 'open', '', 'model-de-document-de-compromis', '', '', '2015-12-02 14:18:53', '2015-12-02 13:18:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(524, 1, '2015-11-26 16:49:11', '2015-11-26 15:49:11', '', 'Model d’autorització de prestació del servei comunitari', '', 'publish', 'open', 'open', '', 'model-dautoritzacio-de-prestacio-del-servei-comunitari', '', '', '2015-12-02 14:14:44', '2015-12-02 13:14:44', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(528, 1, '2015-11-26 16:59:44', '2015-11-26 15:59:44', '', 'Esquema del projecte de servei comunitari', '', 'publish', 'open', 'open', '', 'esquema-del-projecte-de-servei-comunitari', '', '', '2015-12-02 14:13:54', '2015-12-02 13:13:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(531, 1, '2015-11-26 17:00:37', '2015-11-26 16:00:37', 'Document model per fer el conveni amb les entitats', 'Conveni amb entitats pel servei comunitari', '', 'publish', 'open', 'open', '', 'conveni-entitats-2', '', '', '2015-12-02 14:12:21', '2015-12-02 13:12:21', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(602, 1, '2015-11-27 00:01:13', '2015-11-26 23:01:13', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\r\n[if-not-all-day]\r\n[if-single-day]\r\n<div>Quan: [start-time]-[end-time]</div>\r\n[/if-single-day]\r\n[/if-not-all-day]\r\n[if-multi-day]\r\n<div>Del [start-date] fins al [end-date]</div>\r\n[/if-multi-day]\r\n[if-location]\r\n<div>Ubicació: [location]</div>\r\n[/if-location]\r\n[if-description]\r\n<div>Descripció: [description]</div>\r\n[/if-description]\r\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'Reserva Maletes pedagògiques', '', 'trash', 'closed', 'closed', '', 'maletes-pedagogiques__trashed', '', '', '2017-03-07 10:05:25', '2017-03-07 09:05:25', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=gce_feed&#038;p=602', 0, 'calendar', '', 0),
(608, 1, '2015-11-27 10:04:51', '2015-11-27 09:04:51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut bibendum libero. Donec lectus purus, pellentesque et volutpat non, euismod id erat. Aliquam vitae tincidunt lacus. Vivamus aliquet ornare tellus, quis varius nisl suscipit posuere. Aliquam interdum at neque et feugiat. Nullam odio orci, condimentum eu lobortis eu, feugiat sit amet sapien. Cras vitae condimentum risus. Aliquam erat volutpat. Nullam cursus justo nec purus elementum condimentum.\r\n\r\nSuspendisse in enim sed diam mattis fermentum a vitae tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sed ligula tortor. Vestibulum at odio a turpis sollicitudin feugiat ut vel dolor. Donec venenatis, est ullamcorper tincidunt congue, risus neque bibendum lorem, id vulputate metus elit vitae mi. Sed sit amet magna faucibus, tempor est ut, porta felis. In hac habitasse platea dictumst. Ut posuere neque quis metus suscipit, ac congue mi rutrum. Nulla facilisi. Duis eleifend diam ac lectus mollis, quis tempor felis egestas. Donec laoreet elit non magna blandit, sed mollis arcu faucibus.\r\n', 'Horari i calendari', '', 'publish', 'closed', 'closed', '', 'horari-i-calendari', '', '', '2017-03-07 10:01:32', '2017-03-07 09:01:32', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=608', 30, 'page', '', 0),
(647, 1, '2015-11-27 15:08:32', '2015-11-27 14:08:32', '', 'SC:Juguem sense barreres', '', 'trash', 'closed', 'closed', '', 'scjuguem-sense-barreres__trashed', '', '', '2017-03-07 10:04:45', '2017-03-07 09:04:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=slideshow&#038;p=647', 0, 'slideshow', '', 0),
(656, 1, '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 'formador', '', 'inherit', 'open', 'open', '', 'formador', '', '', '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/11/formador.png', 0, 'attachment', 'image/png', 0),
(659, 1, '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 'calendari', '', 'inherit', 'open', 'open', '', 'calendari', '', '', '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 608, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/11/calendari.jpg', 0, 'attachment', 'image/jpeg', 0),
(684, 1, '2015-11-27 20:38:18', '2015-11-27 19:38:18', 'Informació sobre documentació, tràmits i avaluació de les activitats del pla de zona\r\nAssessoraments – Cursos – Seminaris – Tallers', 'Informació sobre documentació, tràmits i avaluació de les activitats', '', 'publish', 'open', 'open', '', 'informacio-sobre-documentacio-tramits-i-avaluacio-de-les-activitats', '', '', '2015-12-02 14:11:28', '2015-12-02 13:11:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(687, 1, '2015-11-27 20:52:29', '2015-11-27 19:52:29', 'Informació sobre tràmits i avaluació de grups de treball i seminaris de coordinació', 'Informació sobre tràmits i avaluació de grups de treball i seminaris de coordinació', '', 'publish', 'open', 'open', '', 'informacio-sobre-tramits-i-avaluacio-de-grups-de-treball-i-seminaris-de-coordinacio', '', '', '2015-12-02 14:06:51', '2015-12-02 13:06:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(689, 1, '2015-11-27 21:00:22', '2015-11-27 20:00:22', '<a href="https://docs.google.com/presentation/d/1-NfAcPhrZwRCyggaWeBlCPdOfOjqalpOlw9uoHk-g40/edit?usp=sharing">Enllaç a la presentació (Google drive)</a>', 'Criteris, instruccions i orientacions 2015-16', '', 'publish', 'open', 'open', '', 'criteris-instruccions-i-orientacions-2015-16', '', '', '2015-11-27 21:00:22', '2015-11-27 20:00:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(693, 1, '2015-11-27 21:02:28', '2015-11-27 20:02:28', '', 'Guia d’ús del GTAF', '', 'publish', 'open', 'open', '', 'guia-dus-del-gtaf', '', '', '2015-12-02 11:58:32', '2015-12-02 10:58:32', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(697, 1, '2015-11-27 21:08:18', '2015-11-27 20:08:18', 'Diferent al que se obté (diferent de l’acta d’assistència que s’obté a GTAF)', 'Acta de tancament de l’activitat', '', 'publish', 'open', 'open', '', 'acta-de-tancament-de-lactivitat', '', '', '2015-12-02 14:05:04', '2015-12-02 13:05:04', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(701, 1, '2015-11-27 21:34:16', '2015-11-27 20:34:16', '', 'Fitxa de dades del formador/a', '', 'publish', 'open', 'open', '', 'fitxa-de-dades-del-formadora', '', '', '2015-12-02 13:57:49', '2015-12-02 12:57:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(704, 1, '2015-11-27 21:43:09', '2015-11-27 20:43:09', '<ul>\r\n	<li>Qüestionari de valoració de cursos, tallers i seminaris, per part dels assistents</li>\r\n	<li>Full de valoració de grups de treball (per omplir conjuntament entre tots els participants)</li>\r\n	<li>Full de valoració de seminaris de coordinació (per omplir conjuntament entre tots els participants)</li>\r\n	<li>Full de valoració d’assessoraments (per part del centre)</li>\r\n	<li>Full de valoració del taller a centre</li>\r\n	<li>Valoració de l’activitat per part del formador/a.</li>\r\n</ul>\r\n<span style="color: #008000;"><strong>NOTA:</strong> alguns d''aquests qüestionaris es poden substituir per formularis a Google Forms.</span>', 'Qüestionaris de valoració', '', 'publish', 'open', 'open', '', 'questionaris-de-valoracio', '', '', '2015-12-02 14:03:27', '2015-12-02 13:03:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(732, 1, '2015-11-28 03:00:10', '2015-11-28 02:00:10', '&nbsp;\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td rowspan="2" width="203"><strong>CENTRE DOCENT</strong></td>\r\n<td colspan="2" width="378"><strong>EAP</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="227"><strong>Psicopedagog/a</strong></td>\r\n<td width="151"><strong>Treballador/a social</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Alpha</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Gamma</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Epsilon</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Alpha</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Beta</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Gamma</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Epsilon</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Omega</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Gamma</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Alpha</td>\r\n<td width="227">Blanca Bages</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Epsilon</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Gamma</td>\r\n<td width="227">Blanca Baiges</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Beta</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Beatriz Aleja</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Epsilon</td>\r\n<td width="227">Beatriz Aleja</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'EAP – Professionals adscrits', '', 'publish', 'open', 'open', '', 'eap-professionals-adscrits', '', '', '2015-12-01 12:13:28', '2015-12-01 11:13:28', '', 739, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(736, 1, '2015-11-28 03:11:19', '2015-11-28 02:11:19', '<table border="0" width="409" cellspacing="0" cellpadding="2">\r\n<tbody>\r\n<tr>\r\n<td style="padding-left: 30px;">Carme Ferrer (directora)</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n<tr>\r\n<td style="padding-left: 30px;">Pere Serrat</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n<tr>\r\n<td style="padding-left: 30px;">Joana Vera</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'CRP – Professionals adscrits', '', 'publish', 'open', 'open', '', 'crp-professionals-adscrits', '', '', '2015-12-01 12:14:09', '2015-12-01 11:14:09', '', 739, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(739, 1, '2015-11-28 10:44:37', '2015-11-28 09:44:37', '<table border="1" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><strong>Centre</strong></td>\r\n<td><strong>Professionals</strong></td>\r\n</tr>\r\n<tr>\r\n<td>ZER EL Solsonès</td>\r\n<td>Marta Gese (CRP), Sandra Ramiro (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Vall de Lord</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP), Toni Cas (LIC), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>SI Sant Llorenç</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Setelsis</td>\r\n<td>Maite Gese (CRP), Yolanda Marina (EAP), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Arrels I</td>\r\n<td>Maite Gese (CRP), Montse Ram (CREDA), Elisabet Riu (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola El Vinyet</td>\r\n<td>Maite Gese (CRP), Yolanda Marina (EAP), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>Institut Francesc Ribalta</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP), Toni Cas (LIC)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Arrels II</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP)</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Distribució de professionals per centres', '', 'publish', 'open', 'open', '', 'distribucio-de-professionals-per-centres', '', '', '2015-12-01 12:16:09', '2015-12-01 11:16:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(748, 1, '2015-11-28 11:14:44', '2015-11-28 10:14:44', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\n[if-not-all-day]\n[if-single-day]\n<div>Quan: [start-time]-[end-time]</div>\n[/if-single-day]\n[/if-not-all-day]\n[if-multi-day]\n<div>Del [start-date] fins al [end-date]</div>\n[/if-multi-day]\n[if-location]\n<div>Ubicació: [location]</div>\n[/if-location]\n[if-description]\n<div>Descripció: [description]</div>\n[/if-description]\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'SE tancat', '', 'trash', 'closed', 'closed', '', 'se-tancat__trashed', '', '', '2017-03-07 10:05:22', '2017-03-07 09:05:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=gce_feed&#038;p=748', 0, 'calendar', '', 0),
(765, 1, '2015-11-28 12:07:44', '2015-11-28 11:07:44', '<strong>L''equip de direcció tècnica del Servei Educatiu del XXXXXX</strong>\r\n\r\nL’equip de direcció tècnica és una comissió de coordinació interna formada per:\r\n<ul>\r\n	<li>Joan de la Munoza, Director del CRP</li>\r\n	<li>Elisabet Bonet, Directora de l’EAP</li>\r\n	<li>Antoni Casals, representant de l’ELIC</li>\r\n	<li>Montserrat Palau, logopeda del CREDA</li>\r\n</ul>\r\nSón funcions de l’equip de direcció tècnica:\r\n<ul>\r\n	<li>Establir els objectius, identificar les necessitats, els criteris per a l’actuació interna i els indicadors d’avaluació del propi servei.</li>\r\n	<li><span style="line-height: 1.5;">Identificar les necessitats dels centres educatius (professorat, alumnat i famílies) i de la zona.</span></li>\r\n	<li><span style="line-height: 1.5;">Coordinar la integració de les actuacions dels professionals dels serveis educatius vetllant per l’eficàcia de la intervenció en els centres.</span></li>\r\n	<li><span style="line-height: 1.5;">Elaborar la proposta de pla d’actuació, indicadors d’avaluació i memòria, a partir dels objectius i actuacions prioritàries.</span></li>\r\n	<li><span style="line-height: 1.5;">Fer el seguiment del desenvolupament de les activitats.</span></li>\r\n	<li><span style="line-height: 1.5;">Elaborar el pressupost i la liquidació corresponent.</span></li>\r\n</ul>\r\nL’equip de direcció tècnica es reunirà un cop al mes.\r\n\r\n<strong>La coordinació del Servei Educatiu del XXXXXXX</strong>\r\n\r\nAnirà a càrrec del director del CRP.\r\n\r\nSón funcions del coordinador:\r\n<ul>\r\n	<li>Representar els serveis educatius de zona.</li>\r\n	<li><span style="line-height: 1.5;">Fer el seguiment dels acords presos en l’equip de direcció tècnica.</span></li>\r\n	<li><span style="line-height: 1.5;">D’acord amb les direccions respectives, establir les línies generals de coordinació i actuació entre els serveis educatius de zona i els serveis educatius específics i CdA de la zona .</span></li>\r\n	<li><span style="line-height: 1.5;">Coordinar els diferents àmbits d’organització interna.</span></li>\r\n	<li><span style="line-height: 1.5;">Presentar als serveis territorials el pla d’actuació i la memòria anual.</span></li>\r\n	<li><span style="line-height: 1.5;">Presentar als serveis territorials el pressupost anual i la liquidació corresponent.</span></li>\r\n	<li><span style="line-height: 1.5;">Convocar i presidir l’equip de direcció tècnica i la reunió plenària.</span></li>\r\n</ul>\r\n<strong> Reunió plenària del Servei Educatiu del XXXXXXX</strong>\r\n\r\nÉs l''espai de consulta i participació de tots els professionals dels serveis educatius, integrat per la totalitat dels professionals que hi presten serveis i presidit pel coordinador del Servei educatiu de zona.\r\n\r\nLes seves funcions són:\r\n<ul>\r\n	<li>Participar en l’elaboració del pla d’actuació i de la memòria.</li>\r\n	<li><span style="line-height: 1.5;">Informar i aportar propostes a l’equip de direcció tècnica sobre l’organització dels recursos humans i materials i la programació general.</span></li>\r\n	<li><span style="line-height: 1.5;">Promoure iniciatives en l’àmbit de la innovació i de la formació dels serveis educatius i de la zona.</span></li>\r\n	<li><span style="line-height: 1.5;">Es reunirà, com a mínim, una vegada per trimestre amb caràcter ordinari i sempre que el convoqui el coordinador/a o ho sol·liciti un terç, com a mínim, dels seus membres. És preceptiu celebrar una reunió a principi i a final de curs escolar. L’assistència a la reunió plenària és obligatòria per a tots els seus membres.</span></li>\r\n	<li><span style="line-height: 1.5;">Quan es tractin temes vinculats a les seves funcions, els professionals dels serveis educatius específics i dels camps d’aprenentatge que presten atenció a la zona podran participar a les reunions plenàries.</span></li>\r\n</ul>\r\n<strong>Equips de treball del Servei Educatiu del Solsonès</strong>\r\n\r\nS''han creat quatre grups de treball en funció dels centres. Els grups estan ingrats pels professionals que atenen un centre en concret:\r\n<ul>\r\n	<li>Equip dels centres de primària de XXXXXX</li>\r\n	<li><span style="line-height: 1.5;">Equip de la ZER del XXXXXX</span></li>\r\n	<li><span style="line-height: 1.5;">Equip de Sant Llorenç XXXXXX</span></li>\r\n	<li><span style="line-height: 1.5;">Equip dels centres de secundària de XXXXXX</span></li>\r\n</ul>\r\nLes tasques d''aquests equips són:\r\n<ul>\r\n	<li>Intercanviar informació entre els diferents professionals que intervenen en un centre.</li>\r\n	<li><span style="line-height: 1.5;">Detectar necessitats i mancances.</span></li>\r\n	<li><span style="line-height: 1.5;">Planificar i compartir actuacions conjuntes entre els diferents professioanls que actuen un un mateix centre.</span></li>\r\n</ul>', 'Organització interna del Servei Educatiu', '', 'publish', 'open', 'open', '', 'organitzacio-interna-del-servei-educatiu', '', '', '2015-12-02 11:57:40', '2015-12-02 10:57:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(768, 1, '2015-11-28 12:16:14', '2015-11-28 11:16:14', 'Node d&#039;organització interna', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu', '', '', '2015-11-28 12:16:14', '2015-11-28 11:16:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/servei-educatiu/', 0, 'forum', '', 0),
(769, 1, '2015-11-28 12:58:59', '2015-11-28 11:58:59', '<strong>Professionals de l''ELIC</strong>\r\n<ul>\r\n	<li>Rosa Bonet (referent equip ELIC)</li>\r\n	<li><span style="line-height: 1.5;">Anna Valls</span><span style="line-height: 1.5;"> (Pla educatiu d''entorn. XXXXXXX)</span></li>\r\n	<li>Carles Simarro (Pla educatiu d''entorn. XXXXXXXXX)</li>\r\n</ul>', 'ELIC – Professionals adscrits', '', 'publish', 'open', 'open', '', 'elic-professionals-adscrits', '', '', '2015-12-01 12:13:53', '2015-12-01 11:13:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(797, 1, '2015-11-28 21:06:57', '2015-11-28 20:06:57', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut bibendum libero. Donec lectus purus, pellentesque et volutpat non, euismod id erat. Aliquam vitae tincidunt lacus. Vivamus aliquet ornare tellus, quis varius nisl suscipit posuere. Aliquam interdum at neque et feugiat. Nullam odio orci, condimentum eu lobortis eu, feugiat sit amet sapien. Cras vitae condimentum risus. Aliquam erat volutpat. Nullam cursus justo nec purus elementum condimentum.\r\n\r\nSuspendisse in enim sed diam mattis fermentum a vitae tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sed ligula tortor. Vestibulum at odio a turpis sollicitudin feugiat ut vel dolor. Donec venenatis, est ullamcorper tincidunt congue, risus neque bibendum lorem, id vulputate metus elit vitae mi. Sed sit amet magna faucibus, tempor est ut, porta felis. In hac habitasse platea dictumst. Ut posuere neque quis metus suscipit, ac congue mi rutrum. Nulla facilisi. Duis eleifend diam ac lectus mollis, quis tempor felis egestas. Donec laoreet elit non magna blandit, sed mollis arcu faucibus.\r\n', 'Presentació', '', 'publish', 'closed', 'closed', '', 'presentacio', '', '', '2017-03-07 10:01:10', '2017-03-07 09:01:10', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=797', 10, 'page', '', 0),
(806, 1, '2015-11-28 21:29:55', '2015-11-28 20:29:55', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut bibendum libero. Donec lectus purus, pellentesque et volutpat non, euismod id erat. Aliquam vitae tincidunt lacus. Vivamus aliquet ornare tellus, quis varius nisl suscipit posuere. Aliquam interdum at neque et feugiat. Nullam odio orci, condimentum eu lobortis eu, feugiat sit amet sapien. Cras vitae condimentum risus. Aliquam erat volutpat. Nullam cursus justo nec purus elementum condimentum.\r\n\r\nSuspendisse in enim sed diam mattis fermentum a vitae tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sed ligula tortor. Vestibulum at odio a turpis sollicitudin feugiat ut vel dolor. Donec venenatis, est ullamcorper tincidunt congue, risus neque bibendum lorem, id vulputate metus elit vitae mi. Sed sit amet magna faucibus, tempor est ut, porta felis. In hac habitasse platea dictumst. Ut posuere neque quis metus suscipit, ac congue mi rutrum. Nulla facilisi. Duis eleifend diam ac lectus mollis, quis tempor felis egestas. Donec laoreet elit non magna blandit, sed mollis arcu faucibus.\r\n', 'El projecte', '', 'publish', 'closed', 'closed', '', 'el-projecte', '', '', '2017-03-07 10:00:39', '2017-03-07 09:00:39', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=806', 0, 'page', '', 0),
(879, 1, '2015-11-29 13:12:08', '2015-11-29 12:12:08', '<p>Fitxa per demanar una maleta pedagògica o un aparell</p>\r\n', 'Fitxa de petició de recursos', '', 'publish', 'open', 'open', '', 'fitxa-de-peticio-de-recursos', '', '', '2015-12-02 14:24:00', '2015-12-02 13:24:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(882, 1, '2015-11-29 13:21:12', '2015-11-29 12:21:12', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\n[if-not-all-day]\n[if-single-day]\n<div>Quan: [start-time]-[end-time]</div>\n[/if-single-day]\n[/if-not-all-day]\n[if-multi-day]\n<div>Del [start-date] fins al [end-date]</div>\n[/if-multi-day]\n[if-location]\n<div>Ubicació: [location]</div>\n[/if-location]\n[if-description]\n<div>Descripció: [description]</div>\n[/if-description]\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'Reserva d''aparells', '', 'trash', 'closed', 'closed', '', 'reserva-daparells__trashed', '', '', '2017-03-07 10:05:30', '2017-03-07 09:05:30', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?post_type=gce_feed&#038;p=882', 0, 'calendar', '', 0),
(944, 1, '2015-11-29 20:20:56', '2015-11-29 19:20:56', 'Programa Fòrum de Treballs de recerca i crèdits de síntesi', 'Programa Fòrum de Treballs de recerca 2015', '', 'publish', 'open', 'open', '', 'programa-forum-de-treballs-de-recerca', '', '', '2015-12-02 14:26:25', '2015-12-02 13:26:25', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(952, 1, '2015-11-29 20:41:28', '2015-11-29 19:41:28', '<strong>BASES PER A LA PARTICIPACIÓ:</strong>\n<ol>\n	<li>Hi pot participar l’alumnat de segon curs de batxillerat i de segon dels cicles formatius de grau superior d’FP de les àrees Científico-Tècniques que hagi estat seleccionat prèviament als diferents centres de la zona. El criteri de selecció el fixarà cada centre.</li>\n	<li><span style="line-height: 1.5;">Els treballs presentats poden ser individuals o col·lectius, de creació pròpia.</span></li>\n	<li><span style="line-height: 1.5;">Cada centre docent pot presentar un màxim de 6 treballs per cada modalitat de batxillerat o cicle formatiu i fins a un màxim de 8 per centre.</span></li>\n	<li><span style="line-height: 1.5;">Els resums dels treballs s''han de presentar en format digital seguint aquestes pautes:</span></li>\n	<li><span style="line-height: 1.5;">Resum que contingui com a mínim les següents parts: introducció, desenvolupament del tema i conclusions de la recerca (disposeu de document tipus a la web).</span></li>\n	<li><span style="line-height: 1.5;">S''han d''adjuntar els documents i materials necessaris per a la seva exposició. Per tal d''unificar format de cara a la publicació, es recomana seguir aquests models.</span></li>\n	<li><span style="line-height: 1.5;">Els abstracts (resums) dels treballs s’hauran de lliurar al CRP del Tarragonès, abans del 8 de març de 2015, preferentment per correu electrònic a l’adreça: xgranell@xtec.cat en format digital.</span></li>\n	<li><span style="line-height: 1.5;">L’acte de celebració del IX Fòrum tindrà lloc el divendres 17 d’abril de 2015.</span></li>\n	<li><span style="line-height: 1.5;">L’organització confeccionarà una llista amb l’ordre en el que s''hauran d’exposar els treballs.</span></li>\n	<li><span style="line-height: 1.5;">L’organització es reserva el dret de difondre el resum dels treballs, total o parcialment, a través de qualsevol suport o mitjà.</span></li>\n	<li><span style="line-height: 1.5;">L’organització, en funció dels espais de que es disposin per fer l’activitat, fixarà per a cada centre el nombre d’alumnes de primer curs que podran assistir. En tot cas, es procurarà, si la capacitat dels espais on es realitzi el fòrum ho permet, que hi puguin assistir el màxim nombre d’alumnes.</span></li>\n	<li><span style="line-height: 1.5;">El fet de participar en aquest Fòrum pressuposa l’acceptació de les bases. Qualsevol circumstància no prevista serà resolta per l’organització. </span></li>\n</ol>', 'Bases fòrum treballs de recerca 2015', '', 'publish', 'open', 'open', '', 'bases-forum-treballs-de-recerca-2015', '', '', '2015-11-29 20:41:28', '2015-11-29 19:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(956, 1, '2015-11-29 20:53:57', '2015-11-29 19:53:57', '<p>Cal lliurar els abstracts abans del <strong>8 de març</strong> de 2015</p>\r\n', 'Model resum de treball de recerca 2015', '', 'publish', 'open', 'open', '', 'model-resum-de-treball-de-recerca-2015', '', '', '2015-12-02 14:22:12', '2015-12-02 13:22:12', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(982, 1, '2015-11-29 23:06:40', '2015-11-29 22:06:40', '1. S’estableixen 7 categories segons el nivell educatiu, quatre per a l’educació primària i tres per a l’educació secundària obligatòria.\n<ul>\n	<li><b>A. Alumnat de cicle inicial d’educació primària</b></li>\n	<li><b>B. Alumnat de cicle mitjà d’educació primària</b></li>\n	<li><b>C. Alumnat dl cicle superior d’educació primària</b></li>\n	<li><b>D. Alumnat d’educació especial d’educació primària</b></li>\n	<li><b>E. Alumnat de 1r i 2n d’educació secundària obligatòria</b></li>\n	<li><b>F. Alumnat de 3r i 4t d’educació secundària obligatòria</b></li>\n	<li><b>G. Alumnat d’educació especial d’educació secundària obligatòria </b></li>\n</ul>\n2. La participació al certamen és voluntària.\n\n3. Els treballs presentats, un per categoria, poden ser individuals o col·lectius (màxim 6 alumnes) i sempre de creació pròpia.\n\n4. Els treballs han de ser escrits en llengua catalana o en aranès.\n\n5. La modalitat pot ser poesia o prosa. El tema és lliure.\n\n6. Característiques de la presentació:\n<ul>\n	<li>El text s’ha de presentar en DIN A4, escrit per una sola cara i a doble espai.</li>\n	<li>L’extensió no pot ser superior a 3 fulls, amb un màxim de 25 línies per full.</li>\n</ul>\n<ul>\n	<li>El cos de la lletra ha de ser arial 12.\n<ul>\n	<li>Hi ha de constar el títol de l’obra, i a baix a la dreta la categoria i el pseudònim.</li>\n	<li>És imprescindible que els treballs arribin corregits quant a l’ortografia, la sintaxi i el vocabulari.</li>\n</ul>\n</li>\n</ul>\n7. El jurat seleccionarà un text per a cadascuna de les 7 categories.\n\n8. Els treballs guardonats es penjaran al web de la XTEC <a href="http://www.xtec.cat/web/centres/alscentres/premis/jocsflorals" rel="nofollow">http://www.xtec.cat/web/centres/alscentres/premis/jocsflorals</a>\n\n9. Per poder participar en el certamen, els centres s’han d’adreçar al Servei Educatiu de Zona (CRP) i lliurar els treballs en el termini establert, en format digital i per correu electrònic.', 'Bases Jocs florals 2015', '', 'publish', 'open', 'open', '', 'bases-jocs-florals-2015', '', '', '2015-11-29 23:06:40', '2015-11-29 22:06:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/docs/', 0, 'bp_doc', '', 0),
(1038, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<div class="gce-list-event gce-tooltip-event">[event-title]</div>\n[if-not-all-day]\n[if-single-day]\n<div>Quan: [start-time]-[end-time]</div>\n[/if-single-day]\n[/if-not-all-day]\n[if-multi-day]\n<div>Del [start-date] fins el [end-date]</div>\n[/if-multi-day]\n[if-location]\n<div>On: [location]</div>\n[/if-location]\n[if-description]\n<div>[description]</div>\n[/if-description]\n<div>[link newwindow="true"]Més detalls...[/link]</div>', 'Agenda SE', '', 'trash', 'closed', 'closed', '', 'se__trashed', '', '', '2017-03-07 10:05:28', '2017-03-07 09:05:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/gce_feed/institut-larany', 0, 'calendar', '', 0),
(1046, 1, '2015-11-30 09:50:49', '2015-11-30 08:50:49', '', 'Recursos', '', 'publish', 'open', 'closed', '', 'recursos-2', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/recursos-2/', 6, 'nav_menu_item', '', 0),
(1063, 1, '2015-11-30 09:50:51', '2015-11-30 08:50:51', '', 'El projecte', '', 'publish', 'open', 'closed', '', 'el-servei-educatiu-2', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/el-servei-educatiu-2/', 1, 'nav_menu_item', '', 0),
(1077, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1077', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1077/', 3, 'nav_menu_item', '', 0),
(1078, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1078', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1078/', 2, 'nav_menu_item', '', 0),
(1079, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'closed', '', '1079', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1079/', 5, 'nav_menu_item', '', 0),
(1080, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'closed', '', '1080', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1080/', 3, 'nav_menu_item', '', 0),
(1087, 1, '2015-11-30 09:50:59', '2015-11-30 08:50:59', ' ', '', '', 'publish', 'open', 'closed', '', '1087', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1087/', 4, 'nav_menu_item', '', 0),
(1088, 1, '2015-11-30 09:50:59', '2015-11-30 08:50:59', ' ', '', '', 'publish', 'open', 'closed', '', '1088', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 806, 'https://pwc-int.educacio.intranet/agora/masterpro/general/1088/', 2, 'nav_menu_item', '', 0),
(1120, 1, '2015-11-30 13:18:34', '2015-11-30 12:18:34', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors', '', '', '2015-11-30 13:18:34', '2015-11-30 12:18:34', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/formadors/', 0, 'forum', '', 0),
(1147, 1, '2015-11-30 17:49:23', '2015-11-30 16:49:23', 'Node de coordinació dels seminaris TAC', 'TAC', '', 'publish', 'closed', 'open', '', 'tac', '', '', '2015-11-30 17:49:23', '2015-11-30 16:49:23', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/tac/', 0, 'forum', '', 0),
(1156, 1, '2015-11-30 18:04:03', '2015-11-30 17:04:03', 'Algun centre està fent servir Chromebooks? Què recomaneu? ', 'Chromebooks vs Notebooks', '', 'spam', 'closed', 'open', '', 'chromebooks-vs-notebooks', '', '', '2016-03-17 13:58:39', '2016-03-17 12:58:39', '', 1147, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/topic/chromebooks-vs-notebooks/', 0, 'topic', '', 0),
(1157, 1, '2015-11-30 18:05:19', '2015-11-30 17:05:19', 'Quin model de portàtil recomaneu? Tenim un presupost de 200 € màxim per alumne.', 'Model de portatil (ESO)', '', 'spam', 'closed', 'open', '', 'model-de-portatil-eso', '', '', '2016-03-17 13:58:29', '2016-03-17 12:58:29', '', 1147, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/topic/model-de-portatil-eso/', 0, 'topic', '', 0),
(1160, 1, '2015-11-30 18:16:41', '2015-11-30 17:16:41', 'En què consisteix exactament? Marc, em vas dir que vosaltres estaveu molt contents... pots explicar-nos una mica com funciona? És gratuït?', 'Google Apps per educació', '', 'publish', 'closed', 'open', '', 'google-apps-per-educacio', '', '', '2015-11-30 18:16:41', '2015-11-30 17:16:41', '', 1147, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/topic/google-apps-per-educacio/', 0, 'topic', '', 0),
(1161, 1, '2015-11-30 18:23:49', '2015-11-30 17:23:49', 'Especialistes d&#039;educació física: coordinació jornades esportives, jocs tradicionals (intercentres)', 'Educació física', '', 'publish', 'closed', 'open', '', 'educacio-fisica', '', '', '2015-11-30 18:23:49', '2015-11-30 17:23:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/educacio-fisica/', 0, 'forum', '', 0),
(1162, 1, '2015-11-30 18:26:44', '2015-11-30 17:26:44', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'English', '', 'publish', 'closed', 'open', '', 'english', '', '', '2015-11-30 18:26:44', '2015-11-30 17:26:44', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/english/', 0, 'forum', '', 0),
(1163, 1, '2015-11-30 18:28:51', '2015-11-30 17:28:51', 'Especialistes matemàtiques: coordinació Olimpíades, fires, jornades matemàtiques (intercentres)', 'Matemàtiques', '', 'publish', 'closed', 'open', '', 'matematiques', '', '', '2015-11-30 18:28:51', '2015-11-30 17:28:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/matematiques/', 0, 'forum', '', 0),
(1164, 1, '2015-11-30 18:32:30', '2015-11-30 17:32:30', 'Especialistes música: jornades de danses, cantates... (intercentres)', 'Música', '', 'publish', 'closed', 'open', '', 'musica', '', '', '2015-11-30 18:32:30', '2015-11-30 17:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/musica/', 0, 'forum', '', 0),
(1165, 1, '2015-11-30 18:34:03', '2015-11-30 17:34:03', 'Node intercentres de Caps d&#039;estudis', 'Caps d&#039;estudi', '', 'private', 'closed', 'open', '', 'caps-destudi', '', '', '2015-11-30 18:34:03', '2015-11-30 17:34:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/caps-destudi/', 0, 'forum', '', 0),
(1166, 1, '2015-11-30 18:38:06', '2015-11-30 17:38:06', 'Node intercentres de Directors de centre', 'Directors', '', 'publish', 'closed', 'open', '', 'directors', '', '', '2015-11-30 18:38:06', '2015-11-30 17:38:06', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/directors/', 0, 'forum', '', 0),
(1167, 1, '2015-11-30 18:40:55', '2015-11-30 17:40:55', 'Elaboració de materials, traspàs d&#039;informació...', 'Primària-secundària', '', 'private', 'closed', 'open', '', 'primaria-secundaria', '', '', '2015-11-30 18:40:55', '2015-11-30 17:40:55', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/primaria-secundaria/', 0, 'forum', '', 0),
(1168, 1, '2015-11-30 18:49:49', '2015-11-30 17:49:49', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes col·laboratius', '', 'publish', 'closed', 'open', '', 'contes-col%c2%b7laboratius', '', '', '2015-11-30 18:49:49', '2015-11-30 17:49:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/contes-col%c2%b7laboratius/', 0, 'forum', '', 0),
(1169, 1, '2015-11-30 18:55:35', '2015-11-30 17:55:35', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes intercentres', '', 'publish', 'closed', 'open', '', 'contes-intercentres', '', '', '2015-11-30 18:55:35', '2015-11-30 17:55:35', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/contes-intercentres/', 0, 'forum', '', 0),
(1170, 1, '2015-11-30 19:06:26', '2015-11-30 18:06:26', 'Necessites un domini propi però, a part d''això, no té cap cost pel centre', '', '', 'publish', 'closed', 'open', '', '1170', '', '', '2015-11-30 19:06:26', '2015-11-30 18:06:26', '', 1160, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/reply/1170/', 1, 'reply', '', 0),
(1224, 1, '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon-2', '', '', '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/12/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(1225, 1, '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 'SEAltPenedes', '', 'inherit', 'open', 'open', '', 'sealtpenedes', '', '', '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2015/12/SEAltPenedes.jpg', 0, 'attachment', 'image/jpeg', 0),
(1242, 1, '2015-12-01 18:06:25', '2015-12-01 17:06:25', 'Node per la coordinació dels serveis educatius', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu-2', '', '', '2015-12-01 18:06:25', '2015-12-01 17:06:25', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/servei-educatiu-2/', 0, 'forum', '', 0),
(1255, 1, '2015-12-02 11:54:55', '2015-12-02 10:54:55', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-2', '', '', '2015-12-02 11:54:55', '2015-12-02 10:54:55', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/formadors-2/', 0, 'forum', '', 0),
(1256, 1, '2015-12-02 11:56:45', '2015-12-02 10:56:45', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-3', '', '', '2015-12-02 11:56:45', '2015-12-02 10:56:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/forums/forum/formadors-3/', 0, 'forum', '', 0),
(1307, 1, '2015-12-02 16:08:32', '2015-12-02 15:08:32', '', 'Documents', '', 'publish', 'open', 'closed', '', 'documents', '', '', '2017-03-15 11:28:38', '2017-03-15 10:28:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?p=1307', 7, 'nav_menu_item', '', 0),
(8111, 1, '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=8111', 0, 'page', '', 0),
(8113, 1, '2016-03-29 12:37:06', '2016-03-29 11:37:06', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:51:15', '2016-03-29 11:51:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?page_id=8113', 0, 'page', '', 0),
(8115, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '{{poster.name}} ha respost a una de les teves actualitzacions:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Aneu a la discussió</a>per respondre o posar-vos al dia de la conversa.', '[{{{site.name}}}] {{poster.name}} ha respost a una de les vostres actualitzacions', '{{poster.name}} ha respost a una de les teves actualitzacions:\n\n"{{usermessage}}"\n\nAneu a la discussió per respondre o posar-vos al dia de la conversa: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-ha-respost-a-una-de-les-vostres-actualitzacions', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-poster-name-ha-respost-a-una-de-les-vostres-actualitzacions/', 0, 'bp-email', '', 0),
(8116, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '{{poster.name}} ha respost a un dels vostres comentaris:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Aneu a la discussió</a> per respondre o posar-vos al dia de la conversa.', '[{{{site.name}}}] {{poster.name}} ha respost a un dels vostres comentaris', '{{poster.name}} ha respost a un dels vostres comentaris:\n\n"{{usermessage}}"\n\nAneu a la discussió per respondre o posar-vos al dia de la conversa. {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-ha-respost-a-un-dels-vostres-comentaris', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-poster-name-ha-respost-a-un-dels-vostres-comentaris/', 0, 'bp-email', '', 0),
(8117, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '{{poster.name}} us ha mencionat en una actualització d''estat:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Aneu a la discussió</a> per respondre o posar-vos al dia de la conversa.', '[{{{site.name}}}] {{poster.name}} us ha mencionat en una actualització d''estat', '{{poster.name}} us ha menciona en una actualització d''estat:\n\n"{{usermessage}}"\n\nAneu a la discussió per a respondre o posar-vos al dia de la conversa: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-us-ha-mencionat-en-una-actualitzacio-destat', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-poster-name-us-ha-mencionat-en-una-actualitzacio-destat/', 0, 'bp-email', '', 0),
(8118, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '{{poster.name}} us ha mencionat en el node "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Aneu a la discussió</a> per a respondre o posar-vos al dia de la conversa.', '[{{{site.name}}}] {{poster.name}} us ha mencionat en una actualització', '{{poster.name}} us ha mencionat en el node "{{group.name}}":\n\n"{{usermessage}}"\n\nAneu a la discussió per a respondre o posar-vos al dia de la conversa: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-us-ha-mencionat-en-una-actualitzacio', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-poster-name-us-ha-mencionat-en-una-actualitzacio/', 0, 'bp-email', '', 0),
(8119, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', 'Gràcies per registrar-vos!\n\nPer a completar l''activació del vostre compte i lloc, aneu a l''enllaç següent: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activeu el vostre compte', 'Gràcies per registrar-vos!\n\nPer a completar l''activació del vostre compte, aneu a l''enllaç següent: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activeu-el-vostre-compte', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-activeu-el-vostre-compte/', 0, 'bp-email', '', 0),
(8120, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', 'Gràcies per registrar-vos!\n\nPer a completar l''activació del vostre compte i lloc, aneu a l''enllaç següent: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nDesprés d''activar-lo el podreu visitar a <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activar {{{user-site.url}}}', 'Gràcies per registrar-vos!\n\nPer a completar l''activació del vostre compte i lloc, feu clic a l''enllaç següent: {{{activate-site.url}}}\n\nDesprés d''activar-lo el podreu visitar a {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activar-user-site-url', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-activar-user-site-url/', 0, 'bp-email', '', 0),
(8121, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> vol afegir-te com a amic.\n\nPer acceptar aquesta sol·licitud i gestionar totes les vostres peticions pendents, visiteu: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] Nova sol·licitud d''amistat de {{initiator.name}}', '{{initiator.name}} vol afegir-te com a amic.\n\nPer acceptar aquesta sol·licitud i gestionar totes les vostres peticions pendents, visiteu: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-nova-sol%c2%b7licitud-damistat-de-initiator-name', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-nova-sol%c2%b7licitud-damistat-de-initiator-name/', 0, 'bp-email', '', 0),
(8122, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '<a href="{{{friendship.url}}}">{{friend.name}}</a> ha acceptat la vostra sol·licitud d''amistat.', '[{{{site.name}}}] {{friend.name}} a acceptat la vostra sol·licitud d''amistat.', '{{friend.name}} ha acceptat la vostra sol·licitud d''amistat.\n\nPer a obtindre més informació, visiteu el seu perfil: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-a-acceptat-la-vostra-sol%c2%b7licitud-damistat', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-friend-name-a-acceptat-la-vostra-sol%c2%b7licitud-damistat/', 0, 'bp-email', '', 0),
(8123, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', 'S''han actualitzat els detalls del node: &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Els detalls del node s''han actualitzat', 'S''han actualitzat els detalls del node: "{{group.name}}"\n\n{{changed_text}}\n\nPer veure el node, visiteu: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-els-detalls-del-node-shan-actualitzat', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-els-detalls-del-node-shan-actualitzat/', 0, 'bp-email', '', 0),
(8124, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> us ha convidat a unir-vos al node: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Aneu aquí per acceptar la seva invitació</a> o <a href="{{{group.url}}}">visiteu el node</a> per obtenir més informació.', '[{{{site.name}}}] Teniu una invitació al node: "{{group.name}}"', '{{inviter.name}} us ha convidat a unir-vos al node: "{{group.name}}".\n\nPer acceptar la invitació, visiteu: {{{invites.url}}}\n\nPer obtenir més informació sobre el node, visiteu {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-teniu-una-invitacio-al-node-group-name', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-teniu-una-invitacio-al-node-group-name/', 0, 'bp-email', '', 0),
(8125, 1, '2017-02-23 12:10:59', '2017-02-23 11:10:59', 'Heu estat promoguts a <b>{{promoted_to}}</b> en el node &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] Heu estat promoguts en el node: "{{group.name}}"', 'Heu estat promoguts a  {{promoted_to}} en el node: "{{group.name}}".\n\nPer visitar el node, aneu a: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-heu-estat-promoguts-en-el-node-group-name', '', '', '2017-02-23 12:10:59', '2017-02-23 11:10:59', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-heu-estat-promoguts-en-el-node-group-name/', 0, 'bp-email', '', 0),
(8126, 1, '2017-02-23 12:11:00', '2017-02-23 11:11:00', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> vol unir-se al node &quot;{{group.name}}&quot;. Com que sou l''administrador d''aquest node, heu d''acceptar o rebutjar la sol·licitud d''admissió.\n\n<a href="{{{group-requests.url}}}">Aneu aquí per administrar-ho</a>, així com totes les altres sol·licituds pendents.', '[{{{site.name}}}] Sol·licitud d''admissió per al node: {{group.name}}', '{{requesting-user.name}} vol unir-se al node "{{group.name}}". Com que sou l''administrador d''aquest node, heu d''acceptar o rebutjar la sol·licitud d''admissió.\n\nPer gestionar aquesta i totes les altres sol·licituds pendents, visiteu: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-sol%c2%b7licitud-dadmissio-per-al-node-group-name', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-sol%c2%b7licitud-dadmissio-per-al-node-group-name/', 0, 'bp-email', '', 0),
(8127, 1, '2017-02-23 12:11:00', '2017-02-23 11:11:00', '{{sender.name}} t''ha enviat un nou missatge: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Anar a la discussió</a> per a respondre o posar-vos al dia de la conversa.', '[{{{site.name}}}] Nou missatge de {{sender.name}}', '{{sender.name}} t''ha enviat un nou missatge: "{{usersubject}}"\n\n"{{usermessage}}"\n\nAnar a la discussió per a respondre o posar-vos al dia de la conversa: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-nou-missatge-de-sender-name', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-nou-missatge-de-sender-name/', 0, 'bp-email', '', 0),
(8128, 1, '2017-02-23 12:11:00', '2017-02-23 11:11:00', 'ecentment heu canviat l''adreça de correu electrònic associada amb el compte de ''{{site.name}}'' a {{user.email}}. Si això és correcte, <a href="{{{verify.url}}}">aneu aquí per confirmar el canvi</a>.\n\nD''altra banda, podeu ignorar i eliminar aquest missatge si heu canviat d''opinió, o si penseu que heu rebut aquest missatge per error.', '[{{{site.name}}}] Verifiqueu la vostra nova adreça de correu electrònic', 'Recentment heu canviat l''adreça de correu electrònic associada amb el compte de ''{{site.name}}'' a {{user.email}}. Si això és correcte, aneu al següent enllaç per confirmar el canvi: {{{verify.url}}}\n\nD''altra banda, si heu canviat d''opinió o si penseu que heu rebut aquest missatge per error el podeu ignorar i eliminar.', 'publish', 'closed', 'closed', '', 'site-name-verifiqueu-la-vostra-nova-adreca-de-correu-electronic', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-verifiqueu-la-vostra-nova-adreca-de-correu-electronic/', 0, 'bp-email', '', 0),
(8129, 1, '2017-02-23 12:11:00', '2017-02-23 11:11:00', 'La vostra sol·licitud d''admissió pel node &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; ha estat acceptada.', '[{{{site.name}}}] Sol·licitud d''admissió pel node "{{group.name}}" acceptada', 'La vostra sol·licitud d''admissió pel node "{{group.name}}" ha estat acceptada.\n\nPer veure el node, visiteu: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-sol%c2%b7licitud-dadmissio-pel-node-group-name-acceptada', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-sol%c2%b7licitud-dadmissio-pel-node-group-name-acceptada/', 0, 'bp-email', '', 0),
(8130, 1, '2017-02-23 12:11:00', '2017-02-23 11:11:00', 'La vostra sol·licitud d''admissió pel node &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; ha estat denegada.', '[{{{site.name}}}] Sol·licitud d''admissió pel node "{{group.name}}" denegada', 'La vostra sol·licitud d''admissió pel node "{{group.name}}" ha estat denegada.\n\nPer sol·licitar l''admissió de nou, visiteu: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-sol%c2%b7licitud-dadmissio-pel-node-group-name-denegada', '', '', '2017-02-23 12:11:00', '2017-02-23 11:11:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-sol%c2%b7licitud-dadmissio-pel-node-group-name-denegada/', 0, 'bp-email', '', 0),
(8186, 1, '2017-03-15 12:12:49', '2017-03-15 11:12:49', '', 'logo', '', 'inherit', 'open', 'closed', '', 'logo', '', '', '2017-03-15 12:12:49', '2017-03-15 11:12:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2017/03/logo.png', 0, 'attachment', 'image/png', 0),
(8188, 1, '2017-03-15 12:19:18', '0000-00-00 00:00:00', '', 'Esborrany automàtic', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-03-15 12:19:18', '0000-00-00 00:00:00', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?p=8188', 0, 'post', '', 0),
(8189, 1, '2017-03-15 12:23:15', '2017-03-15 11:23:15', 'Nodes permet implementar un espai de coordinació adient per projectes on intervinguin membres que necessitin compartir un espai de debat i documentació amb l''objectiu final de publicar periòdicament els seus avanços.\r\n\r\nSi no saps com funciona Nodes, pots començar per els <a href="https://vimeo.com/album/3772376/sort:preset/format:detail" target="_blank">videotutorials</a>.', 'Nou projecte', '', 'publish', 'open', 'open', '', 'nou-projecte', '', '', '2017-03-15 12:24:05', '2017-03-15 11:24:05', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/?p=8189', 0, 'post', '', 0),
(8191, 1, '2017-03-15 12:24:00', '2017-03-15 11:24:00', '', 'rocket4-300x150', '', 'inherit', 'open', 'closed', '', 'rocket4-300x150', '', '', '2017-03-15 12:24:00', '2017-03-15 11:24:00', '', 8189, 'https://pwc-int.educacio.intranet/agora/masterpro/wp-content/uploads/usu3/2017/03/rocket4-300x150.png', 0, 'attachment', 'image/png', 0),
(8192, 0, '2019-05-13 09:45:01', '2019-05-13 07:45:01', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:45:01', '2019-05-13 07:45:01', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(8193, 0, '2019-05-13 09:45:02', '2019-05-13 07:45:02', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle', '', '', '2019-05-13 09:45:02', '2019-05-13 07:45:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/es_template/sha-publicat-un-article-nou-posttitle/', 0, 'es_template', '', 0),
(8194, 0, '2019-05-13 09:45:02', '2019-05-13 07:45:02', 'Hola {{EMAIL}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n{{POSTFULL}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Notificació d''article nou {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'notificacio-darticle-nou-posttitle', '', '', '2019-05-13 09:45:02', '2019-05-13 07:45:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/es_template/notificacio-darticle-nou-posttitle/', 0, 'es_template', '', 0),
(8195, 0, '2019-05-13 09:45:02', '2019-05-13 07:45:02', '<strong style="color: #990000"> Subscriptors de correu</strong><p>\r\n							L''extensió subscripcions de correu de correu té diferents opcions per enviar butlletins als subscriptors.\r\n							Té una pàgina separada amb un editor HTML per crear	un butlletí amb aquest format.\r\n							L''extensió disposa d''opcions per enviar correus de notificació als subscriptors quan es publiquen articles nous al lloc web. També té una pàgina per poder afegir i eliminar les categories a les que s''enviaran les notificacions.\r\n							Utilitzant les opcions de l''extensió d''importació i exportació els administradors podran importar fàcilment els usuaris registrats.\r\n						</p> <strong style="color: #990000">Característiques de l''extensió</strong><ol> <li>Correu de notificació als subscriptors quan es publiquin articles nous.</li> <li>Giny de subscripció</li><li>Correu de subscripció amb confirmació per correu i subscripció simple per facilitar la subscripció.</li> <li>Notificació per correu electrònic a l''administrador quan els usuaris es subscriguin (Opcional)</li> <li>Correu de benvinguda automàtic als subscriptors (Opcional).</li> <li>Enllaç per donar-se de baixa del correu.</li> <li>Importació / Exportació dels correus dels subscriptors.</li> <li>Editor d''HTML per redactar el butlletí.</li> </ol> <strong>Gràcies i salutacions</strong><br>Admin', 'Butlletí Hola Món', '', 'publish', 'closed', 'closed', '', 'butlleti-hola-mon', '', '', '2019-05-13 09:45:02', '2019-05-13 07:45:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/es_template/butlleti-hola-mon/', 0, 'es_template', '', 0),
(8196, 2, '2019-05-13 12:38:16', '2019-05-13 10:38:16', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:38:16', '2019-05-13 10:38:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(8197, 2, '2019-05-13 12:38:16', '2019-05-13 10:38:16', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:38:16', '2019-05-13 10:38:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(8198, 2, '2019-05-13 12:38:16', '2019-05-13 10:38:16', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:38:16', '2019-05-13 10:38:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(8199, 2, '2019-05-13 12:38:16', '2019-05-13 10:38:16', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:38:16', '2019-05-13 10:38:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpro/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

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
  `email` varchar(100) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(29, 'Portada', 'portada', 0),
(33, 'educació emocional', 'educacio-emocional', 0),
(34, 'papiroflexia', 'papiroflexia', 0),
(35, 'granota', 'granota', 0),
(36, 'nivel senzill', 'nivel-senzill', 0),
(46, 'Professorat', 'bp_docs_associated_group_1', 0),
(47, 'bp_docs_access_anyone', 'bp_docs_access_anyone', 0),
(51, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(53, 'Fotografia', 'bp_docs_associated_group_17', 0),
(61, 'MenuNodes', 'menunodes', 0),
(64, 'Comunitat', 'comunitat', 0),
(66, 'Dinamització', 'dinamitzacio', 0),
(76, 'Recursos', 'recursos', 0),
(120, 'bp_docs_access_group_member_20', 'bp_docs_access_group_member_20', 0),
(121, 'bp_docs_access_loggedin', 'bp_docs_access_loggedin', 0),
(140, 'Servei educatiu', 'bp_docs_associated_group_20', 0),
(145, 'MenuSuperior', 'menusuperior', 0),
(149, 'Formadors', 'bp_docs_associated_group_33', 0),
(150, 'bp_docs_access_group_member_33', 'bp_docs_access_group_member_33', 0),
(151, 'Servei educatiu', 'bp_docs_associated_group_31', 0),
(152, 'bp_docs_access_group_member_31', 'bp_docs_access_group_member_31', 0),
(154, 'Formació', 'formacio', 0),
(262, 'activity-comment', 'activity-comment', 0),
(263, 'activity-comment-author', 'activity-comment-author', 0),
(264, 'activity-at-message', 'activity-at-message', 0),
(265, 'groups-at-message', 'groups-at-message', 0),
(266, 'core-user-registration', 'core-user-registration', 0),
(267, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(268, 'friends-request', 'friends-request', 0),
(269, 'friends-request-accepted', 'friends-request-accepted', 0),
(270, 'groups-details-updated', 'groups-details-updated', 0),
(271, 'groups-invitation', 'groups-invitation', 0),
(272, 'groups-member-promoted', 'groups-member-promoted', 0),
(273, 'groups-membership-request', 'groups-membership-request', 0),
(274, 'messages-unread', 'messages-unread', 0),
(275, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(276, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(277, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(278, 'google', 'google', 0),
(279, 'default-calendar', 'default-calendar', 0),
(280, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(281, 'bp-ges-single', 'bp-ges-single', 0),
(282, 'bp-ges-digest', 'bp-ges-digest', 0),
(283, 'bp-ges-notice', 'bp-ges-notice', 0),
(284, 'bp-ges-welcome', 'bp-ges-welcome', 0);

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
(248, 282, 0),
(248, 283, 0),
(289, 65, 0),
(510, 51, 0),
(515, 51, 0),
(518, 51, 0),
(521, 51, 0),
(524, 51, 0),
(528, 51, 0),
(531, 51, 0),
(602, 282, 0),
(602, 283, 0),
(684, 153, 0),
(684, 154, 0),
(687, 153, 0),
(687, 154, 0),
(689, 51, 0),
(693, 153, 0),
(693, 154, 0),
(697, 153, 0),
(697, 154, 0),
(701, 153, 0),
(701, 154, 0),
(704, 153, 0),
(704, 154, 0),
(732, 51, 0),
(736, 51, 0),
(739, 125, 0),
(748, 282, 0),
(748, 283, 0),
(765, 155, 0),
(765, 156, 0),
(769, 51, 0),
(879, 51, 0),
(882, 282, 0),
(882, 283, 0),
(944, 51, 0),
(952, 51, 0),
(956, 51, 0),
(982, 51, 0),
(1038, 282, 0),
(1038, 283, 0),
(1046, 149, 0),
(1063, 149, 0),
(1077, 65, 0),
(1078, 65, 0),
(1079, 149, 0),
(1080, 149, 0),
(1087, 149, 0),
(1088, 149, 0),
(1307, 149, 0),
(8115, 266, 0),
(8116, 267, 0),
(8117, 268, 0),
(8118, 269, 0),
(8119, 270, 0),
(8120, 271, 0),
(8121, 272, 0),
(8122, 273, 0),
(8123, 274, 0),
(8124, 275, 0),
(8125, 276, 0),
(8126, 277, 0),
(8127, 278, 0),
(8128, 279, 0),
(8129, 280, 0),
(8130, 281, 0),
(8189, 33, 0),
(8192, 284, 0),
(8196, 285, 0),
(8197, 286, 0),
(8198, 287, 0),
(8199, 288, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(33, 29, 'category', '', 0, 1),
(37, 33, 'topic-tag', '', 0, 0),
(38, 34, 'topic-tag', '', 0, 1),
(39, 35, 'topic-tag', '', 0, 1),
(40, 36, 'topic-tag', '', 0, 1),
(50, 46, 'bp_docs_associated_item', 'Document associat al node Professorat', 0, 0),
(51, 47, 'bp_docs_access', '', 0, 16),
(55, 51, 'bp_docs_access', '', 0, 0),
(57, 53, 'bp_docs_associated_item', 'Document associat al node Fotografia', 0, 0),
(65, 61, 'nav_menu', '', 0, 3),
(68, 64, 'category', '', 0, 0),
(70, 66, 'category', '', 0, 0),
(80, 76, 'category', '', 0, 0),
(124, 120, 'bp_docs_access', '', 0, 0),
(125, 121, 'bp_docs_access', '', 0, 1),
(144, 140, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(149, 145, 'nav_menu', '', 0, 7),
(153, 149, 'bp_docs_associated_item', 'Document associat al node Formadors', 0, 6),
(154, 150, 'bp_docs_access', '', 0, 6),
(155, 151, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 1),
(156, 152, 'bp_docs_access', '', 0, 1),
(158, 154, 'category', '', 0, 0),
(266, 262, 'bp-email-type', 'Un membre ha respost a una actualització d''activitat que va publicar el destinatari.', 0, 0),
(267, 263, 'bp-email-type', 'Un membre ha respost a un comentari en una actualització a l''activitat publicada pel destinatari.', 0, 0),
(268, 264, 'bp-email-type', 'S''ha mencionat al destinatari en una actualització a l''activitat.', 0, 0),
(269, 265, 'bp-email-type', 'El destinatari s''ha mencionat en una actualització de l''activitat del node.', 0, 0),
(270, 266, 'bp-email-type', 'El destinatari ha registrat un compte.', 0, 0),
(271, 267, 'bp-email-type', 'El destinatari ha registrat un compte i un lloc.', 0, 0),
(272, 268, 'bp-email-type', 'Un membre ha enviat una sol·licitud d''amistat al destinatari.', 0, 0),
(273, 269, 'bp-email-type', 'El destinatari ha acceptat una sol·licitud d''amistat d''un membre.', 0, 0),
(274, 270, 'bp-email-type', 'S''han actualitzat els detalls d''un node.', 0, 0),
(275, 271, 'bp-email-type', 'Un membre ha enviat una invitació a un node al destinatari.', 0, 0),
(276, 272, 'bp-email-type', 'L''estat del destinatari ha canviat dins del node.', 0, 0),
(277, 273, 'bp-email-type', 'Un membre ha sol·licitat permís per unir-se a un node.', 0, 0),
(278, 274, 'bp-email-type', 'El destinatari ha rebut un missatge privat.', 0, 0),
(279, 275, 'bp-email-type', 'El destinatari ha canviat la seva adreça de correu electrònic.', 0, 0),
(280, 276, 'bp-email-type', 'El destinatari ha demanat unir-se a un node, i s''ha acceptat.', 0, 0),
(281, 277, 'bp-email-type', 'El destinatari ha demanat unir-se a un node, i s''ha rebutjat', 0, 0),
(282, 278, 'calendar_feed', '', 0, 1),
(283, 279, 'calendar_type', '', 0, 1),
(284, 280, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(285, 281, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(286, 282, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(287, 283, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(288, 284, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(28, 2, 'last_activity', '2019-05-13 12:48:04'),
(29, 2, 'closedpostboxes_slideshow', 'a:1:{i:2;s:5:"style";}'),
(30, 2, 'metaboxhidden_slideshow', 'a:2:{i:3;s:7:"slugdiv";i:4;s:5:"style";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '145'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=html&libraryContent=browse&hidetb=1&wplink=1&posts_list_mode=list'),
(41, 2, 'wp_user-settings-time', '1489576764'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '0'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:2:{i:3;a:1:{i:0;i:5;}i:21;a:5:{i:0;i:66;i:1;i:67;i:2;i:69;i:3;i:70;i:4;i:79;}}}'),
(48, 1, 'last_activity', '2017-03-15 12:29:29'),
(49, 1, 'total_group_count', '12'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'libraryContent=browse&advImgDetails=show&editor=tinymce'),
(53, 1, 'wp_user-settings-time', '1489577001'),
(56, 1, 'nav_menu_recently_edited', '145'),
(57, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:27:"submitdiv,slides-list,,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
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
(76, 2, 'metaboxhidden_page', 'a:3:{i:0;s:11:"commentsdiv";i:1;s:7:"slugdiv";i:2;s:9:"authordiv";}'),
(77, 2, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(168, 2, 'closedpostboxes_post', 'a:0:{}'),
(170, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(171, 1, 'metaboxhidden_page', 'a:4:{i:0;s:16:"commentstatusdiv";i:1;s:11:"commentsdiv";i:2;s:7:"slugdiv";i:3;s:9:"authordiv";}'),
(172, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(177, 1, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(178, 1, 'metaboxhidden_post', 'a:8:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:9:"formatdiv";i:4;s:11:"layout_meta";i:5;s:12:"revisionsdiv";i:6;s:7:"slugdiv";i:7;s:11:"ping_status";}'),
(180, 1, 'bp_docs_count', '24'),
(193, 1, 'session_tokens', 'a:1:{s:64:"116005dba04f3fb65b30f569d9df1d1febb1d8c4a03e586702ffcc3ed951e61e";a:4:{s:10:"expiration";i:1489749611;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1489576811;}}'),
(194, 2, 'edit_post_per_page', '200'),
(195, 2, 'edit_page_per_page', '300'),
(198, 1, 'wp_media_library_mode', 'list'),
(199, 2, 'session_tokens', 'a:1:{s:64:"420072072a36bb38bbcc36c78ceada1a18f57d312361c2cd726a72125080d89d";a:4:{s:10:"expiration";i:1557916684;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557743884;}}');

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
(1, 'admin', '$P$BvDwniTRtcG9JMJ5RfunHhEHCMJ27M1', 'admin', 'a8000003@xtec.cat', '', '0000-00-00 00:00:00', '', 0, 'admin'),
(2, 'xtecadmin', '$P$Bn9s5/tqhv.eFv0hejt51mGhkXfAHJ/', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=241;
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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4922;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4800;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8200;
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
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=289;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=202;
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
