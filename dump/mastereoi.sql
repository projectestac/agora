-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 12:55:15
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu9`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_bpges_subscriptions`
--

INSERT INTO `wp_bpges_subscriptions` (`id`, `user_id`, `group_id`, `type`) VALUES
(1, 1, 23, 'dig'),
(2, 1, 33, 'dig'),
(3, 1, 34, 'dig'),
(4, 1, 35, 'sum'),
(5, 1, 36, 'dig'),
(6, 1, 37, 'dig'),
(7, 1, 38, 'dig');

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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:45:38', 0, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2016-06-23 10:21:04', 0, 0, 0, 0),
(62, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/eap-professionals-adscrits/">EAP – Professionals adscrits</a>', '', 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/eap-professionals-adscrits/', 0, 732, '2015-11-30 15:56:03', 1, 0, 0, 0),
(83, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/distribucio-de-professionals-per-centres/">Distribució de professionals per centres</a>', '', 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/distribucio-de-professionals-per-centres/', 0, 739, '2015-12-01 11:16:09', 1, 0, 0, 0),
(109, 1, 'bp_docs', 'bp_doc_created', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha creat el document <a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/nivell-basic-general/">NIVELL BÀSIC (General)</a>', '', 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/nivell-basic-general/', 0, 8608, '2016-06-20 10:10:50', 0, 0, 0, 0),
(110, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/solicitud-canvi-dhorari/">Sol·licitud canvi d’horari</a>', '', 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/solicitud-canvi-dhorari/', 0, 8580, '2016-06-20 11:08:24', 0, 0, 0, 0),
(113, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha publicat una actualització en el node <a href="https://pwc-int.educacio.intranet/agora/mastereoi/nodes/english/">English</a>', 'Hi! How are you? \n\nhttps://www.youtube.com/watch?v=j1QBY35LdfA', 'https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/', 23, 0, '2016-06-20 11:13:01', 0, 1, 4, 0),
(114, 1, 'bp-like', 'activity_liked', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> liked their own <a href="https://pwc-int.educacio.intranet/agora/mastereoi/activitat/p/113/">activity</a>', '', 'https://pwc-int.educacio.intranet/agora/mastereoi/activitat/p/113/', 113, 0, '2016-06-20 11:13:19', 0, 0, 0, 0),
(116, 1, 'activity', 'activity_comment', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/" title="admin">admin</a> ha fet un comentari nou de l''activitat', 'Awesome!!!', 'https://pwc-int.educacio.intranet/agora/mastereoi/membres/admin/', 113, 113, '2016-06-20 11:13:37', 0, 2, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(13, 113, '_oembed_ca5de69ddc2ff1ffe196c2f30653a17d', '<iframe width="500" height="281" src="https://www.youtube.com/embed/j1QBY35LdfA?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(14, 113, 'liked_count', 'a:1:{i:1;s:10:"user_likes";}');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`, `parent_id`) VALUES
(23, 1, 'English', 'english', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'public', 1, '2015-11-30 17:26:42', 0),
(33, 1, 'Professorat', 'formadors', 'Node de comunicació entre formadors i el servei educatiu', 'private', 1, '2015-12-02 10:56:43', 0),
(34, 1, 'Alemany', 'alemany', 'Node d\\''Alemany', 'public', 1, '2016-06-16 12:20:10', 0),
(35, 1, 'Francès', 'frances', 'Node de Francès', 'public', 1, '2016-06-16 12:22:03', 0),
(36, 1, 'Italià', 'italia', 'Node d\\''italià', 'public', 1, '2016-06-16 12:23:36', 0),
(37, 1, 'Català', 'catala', 'Node de català', 'public', 1, '2016-06-16 12:26:17', 0),
(38, 1, 'Espanyol', 'espanyol', 'Node d\\''espanyol', 'public', 1, '2016-06-16 12:27:30', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_groupmeta` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(137, 1, 'last_activity', '2015-11-30 12:22:47'),
(152, 23, 'total_member_count', '1'),
(153, 23, 'last_activity', '2016-06-20 11:13:01'),
(154, 23, 'ass_default_subscription', 'dig'),
(155, 23, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(156, 23, 'invite_status', 'members'),
(157, 23, 'forum_id', 'a:1:{i:0;i:1162;}'),
(158, 23, '_bbp_forum_enabled_1162', '1'),
(222, 33, 'total_member_count', '1'),
(223, 33, 'last_activity', '2015-12-02 13:11:28'),
(224, 33, 'ass_default_subscription', 'dig'),
(225, 33, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(226, 33, 'invite_status', 'mods'),
(227, 33, 'forum_id', 'a:1:{i:0;i:1256;}'),
(228, 33, '_bbp_forum_enabled_1256', '1'),
(229, 34, 'total_member_count', '1'),
(230, 34, 'last_activity', '2016-06-16 12:20:10'),
(231, 34, 'ass_default_subscription', 'dig'),
(232, 34, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(233, 34, 'invite_status', 'members'),
(234, 34, 'forum_id', 'a:1:{i:0;i:8496;}'),
(235, 34, '_bbp_forum_enabled_8496', '1'),
(236, 35, 'total_member_count', '1'),
(237, 35, 'last_activity', '2016-06-16 12:22:03'),
(238, 35, 'invite_status', 'members'),
(239, 35, 'ass_default_subscription', 'sum'),
(240, 35, 'ass_subscribed_users', 'a:1:{i:1;s:3:"sum";}'),
(241, 35, 'forum_id', 'a:1:{i:0;i:8497;}'),
(242, 35, '_bbp_forum_enabled_8497', '1'),
(243, 36, 'total_member_count', '1'),
(244, 36, 'last_activity', '2016-06-16 12:23:36'),
(245, 36, 'ass_default_subscription', 'dig'),
(246, 36, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(247, 36, 'invite_status', 'members'),
(248, 36, 'forum_id', 'a:1:{i:0;i:8498;}'),
(249, 36, '_bbp_forum_enabled_8498', '1'),
(250, 37, 'total_member_count', '1'),
(251, 37, 'last_activity', '2016-06-16 12:26:17'),
(252, 37, 'ass_default_subscription', 'dig'),
(253, 37, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(254, 37, 'invite_status', 'members'),
(255, 37, 'forum_id', 'a:1:{i:0;i:8499;}'),
(256, 37, '_bbp_forum_enabled_8499', '1'),
(257, 38, 'total_member_count', '1'),
(258, 38, 'last_activity', '2016-06-16 12:27:30'),
(259, 38, 'ass_default_subscription', 'dig'),
(260, 38, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(261, 38, 'invite_status', 'members'),
(262, 38, 'forum_id', 'a:1:{i:0;i:8500;}'),
(263, 38, '_bbp_forum_enabled_8500', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(29, 23, 1, 0, 1, 0, 'Administrador/a del node', '2015-11-30 17:26:38', '', 1, 0, 0),
(39, 33, 1, 0, 1, 0, 'Administrador/a del node', '2015-12-02 10:56:28', '', 1, 0, 0),
(40, 34, 1, 0, 1, 0, 'Administrador del node', '2016-06-16 12:19:57', '', 1, 0, 0),
(41, 35, 1, 0, 1, 0, 'Administrador del node', '2016-06-16 12:21:53', '', 1, 0, 0),
(42, 36, 1, 0, 1, 0, 'Administrador del node', '2016-06-16 12:23:32', '', 1, 0, 0),
(43, 37, 1, 0, 1, 0, 'Administrador del node', '2016-06-16 12:26:11', '', 1, 0, 0),
(44, 38, 1, 0, 1, 0, 'Administrador del node', '2016-06-16 12:27:26', '', 1, 0, 0);

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
(2, 1, 1, 'admin', '2016-03-29 11:41:11');

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
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000009@xtec.cat', 'Admin', 'a8000009@xtec.cat', '', '####Portada## ##', '1', 8841, 1, '2019-05-13 07:43:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 0, 'Admin', '', 'a8000009@xtec.cat', 'Migrated', 0, 'verified', 0, 'vnewsd-osyjgw-tdaing-ivetlr-dhimne', '2016-03-16 11:43:07', '2019-05-13 07:43:45', 1, 0, 0, 0, 1, 1, '');

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
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-05-13 07:43:45', NULL, NULL, 0);

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
(1, 'portada', 'Portada', '2019-05-13 07:43:45', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12330 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/mastereoi/', 'yes'),
(2, 'blogname', 'Màster EOI', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000009@xtec.cat', 'yes'),
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
(33, 'home', 'https://pwc-int.educacio.intranet/agora/mastereoi/', 'yes'),
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
(80, 'widget_text', 'a:6:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:4:"text";s:188:"<a class="twitter-timeline" data-height="400" href="https://twitter.com/eoitortosa">Tweets by eoitortosa</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>";s:6:"filter";b:0;}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";s:0:"";}i:55;a:3:{s:5:"title";s:0:"";s:4:"text";s:94:"<a href="absencies-del-professorat" class="button small radius">Absències del professorat</a>";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;i:57;a:3:{s:5:"title";s:0:"";s:4:"text";s:111:"\r\n<img src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/logo-escola.png">";s:6:"filter";b:1;}}', 'yes'),
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
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:0:{}s:7:"sidebar";a:9:{i:0;s:11:"tag_cloud-4";i:1;s:10:"nav_menu-8";i:2;s:17:"slideshowwidget-2";i:3;s:18:"bp_groups_widget-2";i:4;s:14:"recent-posts-2";i:5;s:17:"recent-comments-2";i:6;s:11:"tag_cloud-3";i:7;s:10:"archives-2";i:8;s:32:"bp_core_recently_active_widget-2";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:5:{i:0;s:20:"logo_centre_widget-5";i:1;s:7:"text-55";i:2;s:12:"gce_widget-2";i:3;s:6:"text-2";i:4;s:24:"email-subscribers-form-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";i:2;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:7:{i:1537436620;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537436626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537438363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537457648;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1557733424;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"10d1f5b6e07b6dde523b61287a526a5d";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"jpukos-qfonub-bwxptm-cgtumd-qewbrx";}s:8:"interval";i:900;}}}i:1557744399;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
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
(189, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/mastereoi/', 'yes'),
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
(222, 'wsl_settings_Google_enabled', '0', 'yes'),
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
(238, 'widget_tag_cloud', 'a:4:{i:1;a:0:{}i:3;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}i:4;a:3:{s:5:"title";s:9:"Documents";s:8:"taxonomy";s:11:"bp_docs_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:3:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";s:12:"has_children";b:0;}i:1;a:3:{s:5:"major";s:9:"post_type";s:5:"minor";s:16:"post_type-bp_doc";s:12:"has_children";b:0;}i:2;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:7:"archive";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;}', 'yes'),
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
(251, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;i:5;a:0:{}}', 'yes'),
(252, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:98:"https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/eoi_badalona.png";s:16:"nomCanonicCentre";s:11:"Màster EOI";s:14:"direccioCentre";s:16:"Via Augusta, 202";s:8:"cpCentre";s:21:"08021 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:13:"paleta_colors";s:9:"turqueses";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:2:"29";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:1:"2";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";s:1:"1";s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:102:"https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png";s:11:"logo_inline";s:1:"1";s:14:"contacteCentre";s:66:"https://pwc-int.educacio.intranet/agora/mastereoi/linstitut/on-som";s:12:"correuCentre";s:0:"";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:16:{s:5:"icon1";s:10:"admin-home";s:10:"link_icon1";s:0:"";s:11:"title_icon1";s:5:"Inici";s:5:"icon2";s:9:"portfolio";s:10:"link_icon2";s:38:"secretaria/consulta-de-qualificacions/";s:11:"title_icon2";s:5:"Notes";s:5:"icon3";s:8:"calendar";s:10:"link_icon3";s:1:"#";s:11:"title_icon3";s:9:"calendari";s:5:"icon4";s:18:"welcome-learn-more";s:10:"link_icon4";s:25:"URL del Moodle del centre";s:11:"title_icon4";s:6:"moodle";s:5:"icon5";s:6:"groups";s:10:"link_icon5";s:9:"activitat";s:11:"title_icon5";s:8:"intranet";s:14:"show_text_icon";s:2:"si";}', 'yes'),
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
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:54:"https://pwc-int.educacio.intranet/agora/mastereoi/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";s:1:"1";}', 'yes'),
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
(2307, 'nodesbox_name', 'Màster EOI', 'yes'),
(2427, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2428, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2434, 'common_css', '', 'yes'),
(2486, 'theme_mods_reactor-serveis-educatius', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:262;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
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
(4601, 'rewrite_rules', 'a:396:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:44:"calendar_booking/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:54:"calendar_booking/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:74:"calendar_booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:50:"calendar_booking/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:33:"calendar_booking/([^/]+)/embed/?$";s:49:"index.php?calendar_booking=$matches[1]&embed=true";s:37:"calendar_booking/([^/]+)/trackback/?$";s:43:"index.php?calendar_booking=$matches[1]&tb=1";s:45:"calendar_booking/([^/]+)/page/?([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&paged=$matches[2]";s:52:"calendar_booking/([^/]+)/comment-page-([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&cpage=$matches[2]";s:41:"calendar_booking/([^/]+)(?:/([0-9]+))?/?$";s:55:"index.php?calendar_booking=$matches[1]&page=$matches[2]";s:33:"calendar_booking/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:43:"calendar_booking/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:63:"calendar_booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:39:"calendar_booking/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:46:"calendar_resources/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:56:"calendar_resources/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:76:"calendar_resources/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"calendar_resources/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"calendar_resources/([^/]+)/embed/?$";s:51:"index.php?calendar_resources=$matches[1]&embed=true";s:39:"calendar_resources/([^/]+)/trackback/?$";s:45:"index.php?calendar_resources=$matches[1]&tb=1";s:47:"calendar_resources/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&paged=$matches[2]";s:54:"calendar_resources/([^/]+)/comment-page-([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&cpage=$matches[2]";s:43:"calendar_resources/([^/]+)(?:/([0-9]+))?/?$";s:57:"index.php?calendar_resources=$matches[1]&page=$matches[2]";s:35:"calendar_resources/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"calendar_resources/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"calendar_resources/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"calendar_resources/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(4626, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(4954, 'category_children', 'a:0:{}', 'yes'),
(5269, '_bbp_private_forums', 'a:19:{i:0;i:1256;i:1;i:1255;i:2;i:1242;i:3;i:1167;i:4;i:1165;i:5;i:1120;i:6;i:768;i:7;i:179;i:8;i:178;i:9;i:177;i:10;i:176;i:11;i:175;i:12;i:174;i:13;i:173;i:14;i:172;i:15;i:171;i:16;i:170;i:17;i:115;i:18;i:113;}', 'yes'),
(5270, '_bbp_hidden_forums', 'a:19:{i:0;i:1256;i:1;i:1255;i:2;i:1242;i:3;i:1167;i:4;i:1165;i:5;i:1120;i:6;i:768;i:7;i:179;i:8;i:178;i:9;i:177;i:10;i:176;i:11;i:175;i:12;i:174;i:13;i:173;i:14;i:172;i:15;i:171;i:16;i:170;i:17;i:115;i:18;i:113;}', 'yes'),
(5790, 'bp-plugin-enabled-post-home', '1', 'yes'),
(6310, 'calendar_feed_children', 'a:0:{}', 'yes'),
(6311, 'calendar_type_children', 'a:0:{}', 'yes'),
(6312, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(6313, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(6318, 'simple-calendar_version', '3.1.9', 'yes'),
(6346, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(7206, 'bp-emails-unsubscribe-salt', 'JmBXVHwmfHJJVHMhfi4gQDZCaXRqQ3I3dSQgQFdlPVNqfCA7eDYgTV9Ce3plN0hWWjw9dkI3a10sZE4kaHE0bQ==', 'yes'),
(7207, '_bp_ignore_deprecated_code', '', 'yes'),
(8198, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(8526, 'current_sa_email_subscribers_db_version', '3.2', 'yes'),
(8527, 'toc-options', 'a:43:{s:15:"fragment_prefix";s:1:"i";s:8:"position";i:2;s:5:"start";i:4;s:17:"show_heading_text";b:1;s:12:"heading_text";s:10:"Continguts";s:22:"auto_insert_post_types";a:1:{i:0;s:4:"page";}s:14:"show_heirarchy";b:1;s:12:"ordered_list";b:0;s:13:"smooth_scroll";b:1;s:20:"smooth_scroll_offset";i:40;s:10:"visibility";b:0;s:15:"visibility_show";s:4:"show";s:15:"visibility_hide";s:4:"hide";s:26:"visibility_hide_by_default";b:0;s:5:"width";s:4:"Auto";s:12:"width_custom";d:275;s:18:"width_custom_units";s:2:"px";s:8:"wrapping";i:2;s:9:"font_size";d:95;s:15:"font_size_units";s:1:"%";s:5:"theme";i:1;s:24:"custom_background_colour";s:7:"#f9f9f9";s:20:"custom_border_colour";s:7:"#aaaaaa";s:19:"custom_title_colour";s:1:"#";s:19:"custom_links_colour";s:1:"#";s:25:"custom_links_hover_colour";s:1:"#";s:27:"custom_links_visited_colour";s:1:"#";s:9:"lowercase";b:0;s:9:"hyphenate";b:0;s:14:"bullet_spacing";b:0;s:16:"include_homepage";b:0;s:11:"exclude_css";b:0;s:7:"exclude";s:0:"";s:14:"heading_levels";a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}s:13:"restrict_path";s:6:"/docs/";s:19:"css_container_class";s:0:"";s:25:"sitemap_show_page_listing";b:1;s:29:"sitemap_show_category_listing";b:1;s:20:"sitemap_heading_type";i:3;s:13:"sitemap_pages";s:5:"Pages";s:18:"sitemap_categories";s:10:"Categories";s:23:"show_toc_in_widget_only";b:0;s:34:"show_toc_in_widget_only_post_types";a:1:{i:0;s:4:"page";}}', 'yes'),
(11832, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(11833, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(11834, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(11835, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(11836, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(12178, 'wptelegram_ver', '2.0.9', 'yes'),
(12179, 'widget_email-subscribers-form', 'a:3:{i:1;a:0:{}i:2;a:2:{s:5:"title";s:22:"Subscripció de correu";s:7:"form_id";i:1;}s:12:"_multiwidget";i:1;}', 'yes'),
(12183, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/mastereoi?es=cron&guid=jpukos-qfonub-bwxptm-cgtumd-qewbrx', 'yes'),
(12186, 'ig_admin_notices', 'a:0:{}', 'yes'),
(12189, 'ig_es_sync_wp_users', 's:4:"b:0;";', 'yes'),
(12191, 'ig_es_320_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12193, 'ig_es_327_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12194, 'ig_es_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(12195, 'ig_es_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(12196, 'ig_es_fromname', 'Admin', 'yes'),
(12197, 'ig_es_fromemail', 'a8000009@xtec.cat', 'yes'),
(12198, 'ig_es_emailtype', 'WP HTML MAIL', 'yes'),
(12199, 'ig_es_notifyadmin', 'YES', 'yes'),
(12200, 'ig_es_adminemail', 'a8000009@xtec.cat', 'yes'),
(12201, 'ig_es_admin_new_sub_subject', 'Màster EOI Subscripci&oacute; nova de correu', 'yes'),
(12202, 'ig_es_admin_new_sub_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12203, 'ig_es_welcomeemail', 'YES', 'yes'),
(12204, 'ig_es_welcomesubject', 'Màster EOI Benvingut al nostre butlletí', 'yes'),
(12205, 'ig_es_welcomecontent', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12206, 'ig_es_optintype', 'Double Opt In', 'yes'),
(12207, 'ig_es_confirmsubject', 'Màster EOI confirmeu la subscripció', 'yes'),
(12208, 'ig_es_confirmcontent', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12209, 'ig_es_optinlink', 'https://pwc-int.educacio.intranet/agora/mastereoi/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(12210, 'ig_es_unsublink', 'https://pwc-int.educacio.intranet/agora/mastereoi/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(12211, 'ig_es_unsubcontent', 'Si no esteu interessats en rebre correus des de Màster Serveis Educatius <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(12212, 'ig_es_unsubtext', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(12213, 'ig_es_successmsg', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(12214, 'ig_es_suberror', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(12215, 'ig_es_unsuberror', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(12217, 'ig_es_330_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12219, 'es_template_migration_done', 'yes', 'yes'),
(12221, 'ig_es_340_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12223, 'ig_es_3516_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12224, 'ig_es_from_name', 'Admin', 'yes'),
(12225, 'ig_es_from_email', 'a8000009@xtec.cat', 'yes'),
(12226, 'ig_es_admin_new_contact_email_subject', 'Màster EOI Subscripci&oacute; nova de correu', 'yes'),
(12227, 'ig_es_admin_new_contact_email_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12228, 'ig_es_admin_emails', 'a8000009@xtec.cat', 'yes'),
(12229, 'ig_es_confirmation_mail_subject', 'Màster EOI confirmeu la subscripció', 'yes'),
(12230, 'ig_es_confirmation_mail_content', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12231, 'ig_es_enable_welcome_email', 'yes', 'yes'),
(12232, 'ig_es_welcome_email_subject', 'Màster EOI Benvingut al nostre butlletí', 'yes'),
(12233, 'ig_es_welcome_email_content', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nMàster EOI', 'yes'),
(12234, 'ig_es_sent_report_subject', 'Butlletí Informe enviament', 'yes'),
(12235, 'ig_es_sent_report_content', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(12236, 'ig_es_unsubscribe_link', 'https://pwc-int.educacio.intranet/agora/mastereoi/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(12237, 'ig_es_optin_link', 'https://pwc-int.educacio.intranet/agora/mastereoi/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(12238, 'ig_es_unsubscribe_link_content', 'Si no esteu interessats en rebre correus des de Màster Serveis Educatius <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(12239, 'ig_es_email_type', 'wp_html_mail', 'yes'),
(12240, 'ig_es_notify_admin', 'yes', 'yes'),
(12241, 'ig_es_optin_type', 'double_opt_in', 'yes'),
(12242, 'ig_es_subscription_error_messsage', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(12243, 'ig_es_subscription_success_message', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(12244, 'ig_es_unsubscribe_error_message', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(12245, 'ig_es_unsubscribe_success_message', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(12247, 'ig_es_400_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12249, 'ig_es_401_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12251, 'ig_es_402_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12253, 'ig_es_403_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12255, 'ig_es_405_db_updated_at', '2019-05-13 07:43:45', 'no'),
(12256, 'ig_es_db_version', '4.0.9', 'yes'),
(12261, 'wp_page_for_privacy_policy', '0', 'yes'),
(12262, 'show_comments_cookies_opt_in', '1', 'yes'),
(12268, '_ges_installed_before_39', '1', 'yes'),
(12269, '_ges_39_subscriptions_table_created', '1', 'yes'),
(12270, '_ges_39_queued_items_table_created', '1', 'yes'),
(12271, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(12281, '_ges_39_subscriptions_migrated', '1', 'yes'),
(12283, 'can_compress_scripts', '1', 'no'),
(12284, '_ges_39_digest_queue_migrated', '1', 'yes'),
(12287, 'acui_columns', 'a:0:{}', 'yes'),
(12288, 'acui_mail_subject', 'Benvinguts a Màster EOI', 'yes'),
(12289, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(12290, 'acui_mail_template_id', '0', 'yes'),
(12291, 'acui_mail_attachment_id', '0', 'yes'),
(12292, 'acui_enable_email_templates', '', 'yes'),
(12293, 'acui_cron_activated', '', 'yes'),
(12294, 'acui_cron_send_mail', '', 'yes'),
(12295, 'acui_cron_send_mail_updated', '', 'yes'),
(12296, 'acui_cron_delete_users', '', 'yes'),
(12297, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(12298, 'acui_cron_change_role_not_present', '', 'yes'),
(12299, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(12300, 'acui_cron_path_to_file', '', 'yes'),
(12301, 'acui_cron_path_to_move', '', 'yes'),
(12302, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(12303, 'acui_cron_period', '', 'yes'),
(12304, 'acui_cron_role', '', 'yes'),
(12305, 'acui_cron_update_roles_existing_users', '', 'yes'),
(12306, 'acui_cron_log', '', 'yes'),
(12307, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(12308, 'acui_frontend_send_mail', '', 'yes'),
(12309, 'acui_frontend_send_mail_updated', '', 'yes'),
(12310, 'acui_frontend_delete_users', '', 'yes'),
(12311, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(12312, 'acui_frontend_change_role_not_present', '', 'yes'),
(12313, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(12314, 'acui_frontend_role', '', 'yes'),
(12315, 'acui_manually_send_mail', '', 'yes'),
(12316, 'acui_manually_send_mail_updated', '', 'yes'),
(12317, 'acui_automatic_wordpress_email', '', 'yes'),
(12318, 'acui_show_profile_fields', '', 'yes'),
(12319, 'acui_settings', 'wordpress', 'yes'),
(12320, 'acui_mail_from', '', 'yes'),
(12321, 'acui_mail_from_name', '', 'yes'),
(12322, 'acui_mailer', 'smtp', 'yes'),
(12323, 'acui_mail_set_return_path', 'false', 'yes'),
(12324, 'acui_smtp_host', 'localhost', 'yes'),
(12325, 'acui_smtp_port', '25', 'yes'),
(12326, 'acui_smtp_ssl', 'none', 'yes'),
(12327, 'acui_smtp_auth', '', 'yes'),
(12328, 'acui_smtp_user', '', 'yes'),
(12329, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=6309 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1438071219:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(7, 9, '_edit_lock', '1465992151:1'),
(8, 9, '_edit_last', '1'),
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
(406, 107, '_edit_lock', '1467193965:2'),
(407, 107, '_edit_last', '2'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:9:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Viatge";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8127";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Parlant";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8130";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Eiffel";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8126";}i:4;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=uuhw5flhCjI";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Talking";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8129";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"Formació";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Oferta formativa";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"656";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:4:"talk";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8128";}i:8;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:19:"Foto taller alumnes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"141";}i:9;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:109:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Proveu a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}}'),
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
(581, 148, '_edit_lock', '1466167817:1'),
(582, 148, '_edit_last', '1'),
(583, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(584, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(585, 148, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
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
(909, 203, '_bbp_group_ids', 'a:0:{}'),
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
(1126, 234, '_wp_attached_file', 'bp-attachments/233/Exemple.docx'),
(1138, 239, '_wp_attached_file', 'bp-attachments/238/Selecció_713.png'),
(1139, 239, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:310;s:6:"height";i:126;s:4:"file";s:36:"bp-attachments/238/Selecció_713.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_713-150x126.png";s:5:"width";i:150;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_713-300x121.png";s:5:"width";i:300;s:6:"height";i:121;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_713-300x126.png";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_713-200x126.png";s:5:"width";i:200;s:6:"height";i:126;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1474028756:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', ''),
(1298, 255, '_wp_attached_file', '2015/01/foto-classe.png'),
(1299, 255, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1317, 248, 'gce_paging_widget', '1'),
(1372, 5, '_edit_lock', '1466411756:1'),
(1373, 6, '_edit_lock', '1466411767:1'),
(1374, 16, '_edit_lock', '1466411784:1'),
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
(1672, 339, '_wp_attached_file', '2015/11/tartu.png'),
(1673, 339, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:511;s:6:"height";i:300;s:4:"file";s:17:"2015/11/tartu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"tartu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"tartu-300x176.png";s:5:"width";i:300;s:6:"height";i:176;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"tartu-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"tartu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1674, 352, '_wp_attached_file', '2015/11/familiaescola.png'),
(1675, 352, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1259;s:6:"height";i:888;s:4:"file";s:25:"2015/11/familiaescola.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"familiaescola-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"familiaescola-300x212.png";s:5:"width";i:300;s:6:"height";i:212;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"familiaescola-1024x722.png";s:5:"width";i:1024;s:6:"height";i:722;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"familiaescola-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"familiaescola-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1676, 354, '_wp_attached_file', '2015/11/eap1.png'),
(1677, 354, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:197;s:6:"height";i:113;s:4:"file";s:16:"2015/11/eap1.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"eap1-150x113.png";s:5:"width";i:150;s:6:"height";i:113;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1678, 355, '_wp_attached_file', '2015/11/eap2.png'),
(1679, 355, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:254;s:6:"height";i:114;s:4:"file";s:16:"2015/11/eap2.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"eap2-150x114.png";s:5:"width";i:150;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"eap2-200x114.png";s:5:"width";i:200;s:6:"height";i:114;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1690, 372, '_wp_attached_file', '2015/11/OX253EDR6R-1.jpg'),
(1691, 372, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:5086;s:6:"height";i:2779;s:4:"file";s:24:"2015/11/OX253EDR6R-1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"OX253EDR6R-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x164.jpg";s:5:"width";i:300;s:6:"height";i:164;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:25:"OX253EDR6R-1-1024x560.jpg";s:5:"width";i:1024;s:6:"height";i:560;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"OX253EDR6R-1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";d:4;s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T3i";s:7:"caption";s:0:"";s:17:"created_timestamp";i:1415245685;s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"55";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:6:"0.0125";s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1710, 507, '_wp_attached_file', '2015/11/modalitats-2015-16.pdf'),
(1734, 588, '_wp_attached_file', '2015/11/CIMG0829-300x225.jpg'),
(1735, 588, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:300;s:6:"height";i:225;s:4:"file";s:28:"2015/11/CIMG0829-300x225.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"CIMG0829-300x225-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"CIMG0829-300x225-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"CIMG0829-300x225-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"CIMG0829-300x225-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1753, 656, '_wp_attached_file', '2015/11/formador.png'),
(1754, 656, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:313;s:6:"height";i:204;s:4:"file";s:20:"2015/11/formador.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"formador-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"formador-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"formador-300x204.png";s:5:"width";i:300;s:6:"height";i:204;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"formador-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1755, 659, '_wp_attached_file', '2015/11/calendari.jpg'),
(1756, 659, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:555;s:6:"height";i:431;s:4:"file";s:21:"2015/11/calendari.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"calendari-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"calendari-300x233.jpg";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"calendari-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"calendari-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
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
(2099, 203, '_bbp_group_ids', 'a:0:{}'),
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
(2511, 318, '_edit_last', '2'),
(2512, 318, '_wp_page_template', 'page-templates/side-menu.php'),
(2513, 318, '_template_layout', '2c-l'),
(2514, 318, 'sharing_disabled', '1'),
(2635, 467, '_edit_last', '1'),
(2636, 467, '_oembed_20b80357c89fee983643f8f65e4df70c', '{{unknown}}'),
(2637, 467, '_oembed_d9437c03a6ea56752fce4763de32c8c9', '{{unknown}}'),
(2638, 467, '_wp_page_template', 'page-templates/side-menu.php'),
(2639, 467, '_template_layout', '2c-l'),
(2640, 467, 'sharing_disabled', '1'),
(2641, 541, '_edit_last', '1'),
(2642, 541, '_wp_page_template', 'default'),
(2643, 541, '_template_layout', '2c-l'),
(2656, 608, '_edit_last', '1'),
(2657, 608, '_wp_page_template', 'page-templates/side-menu.php'),
(2658, 608, '_template_layout', '2c-l'),
(2659, 608, 'sharing_disabled', '1'),
(2660, 797, '_edit_last', '2'),
(2661, 797, '_wp_page_template', 'page-templates/side-menu.php'),
(2662, 797, '_template_layout', '2c-l'),
(2663, 806, '_edit_last', '2'),
(2664, 806, '_wp_page_template', 'page-templates/side-menu.php'),
(2665, 806, '_template_layout', '2c-l'),
(2666, 889, '_edit_last', '1'),
(2667, 889, '_wp_page_template', 'default'),
(2668, 889, '_template_layout', '2c-l'),
(2669, 906, '_edit_last', '2'),
(2670, 906, '_wp_page_template', 'default'),
(2671, 906, '_template_layout', '2c-l'),
(3006, 31, '_edit_last', '1'),
(3007, 31, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3008, 31, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3009, 31, 'slides', 'a:2:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:20:"biblioteca-fons-nova";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8788";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:22:"biblioteca-fons-antiga";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8789";}}'),
(3010, 107, '_edit_last', '2');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(3011, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3012, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3013, 107, 'slides', 'a:9:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Viatge";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8127";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Parlant";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8130";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Eiffel";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8126";}i:4;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=uuhw5flhCjI";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Talking";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8129";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"Formació";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:16:"Oferta formativa";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"656";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:4:"talk";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8128";}i:8;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:19:"Foto taller alumnes";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"141";}i:9;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:109:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Proveu a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}}'),
(3014, 107, 'picasa_album', ''),
(3015, 107, 'googlephotos_album', ''),
(3016, 148, '_edit_last', '1'),
(3017, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"250";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
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
(3212, 906, '_edit_lock', '1448879200:2'),
(3215, 889, '_edit_lock', '1449055781:1'),
(3228, 1038, '_edit_lock', '1474028788:2'),
(3231, 60, 'gce_paging_widget', '1'),
(3232, 60, 'gce_widget_paging_interval', '604800'),
(3233, 60, 'gce_paging', ''),
(3251, 889, 'sharing_disabled', '1'),
(3264, 467, '_edit_lock', '1458119350:2'),
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
(3349, 1147, '_bbp_group_ids', 'a:0:{}'),
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
(3428, 1161, '_bbp_group_ids', 'a:0:{}'),
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
(3450, 1163, '_bbp_group_ids', 'a:0:{}'),
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
(3461, 1164, '_bbp_group_ids', 'a:0:{}'),
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
(3472, 1165, '_bbp_group_ids', 'a:0:{}'),
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
(3483, 1166, '_bbp_group_ids', 'a:0:{}'),
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
(3494, 1167, '_bbp_group_ids', 'a:0:{}'),
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
(3516, 1169, '_bbp_group_ids', 'a:0:{}'),
(3517, 1170, '_bbp_forum_id', '1147'),
(3518, 1170, '_bbp_topic_id', '1160'),
(3519, 1170, '_bbp_author_ip', '10.155.7.35'),
(3520, 1160, '_bbp_last_reply_id', '1170'),
(3521, 1170, '_bbp_activity_id', '79'),
(3525, 1174, '_wp_attached_file', '2015/11/gforms.png'),
(3526, 1174, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:568;s:6:"height";i:855;s:4:"file";s:18:"2015/11/gforms.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"gforms-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"gforms-199x300.png";s:5:"width";i:199;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"gforms-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"gforms-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3527, 1176, '_wp_attached_file', '2015/11/gforms2.png'),
(3528, 1176, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:574;s:6:"height";i:649;s:4:"file";s:19:"2015/11/gforms2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"gforms2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:19:"gforms2-265x300.png";s:5:"width";i:265;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"gforms2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"gforms2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(3562, 1200, '_wp_attached_file', '2015/11/biblioescolar.png'),
(3563, 1200, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:708;s:6:"height";i:415;s:4:"file";s:25:"2015/11/biblioescolar.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"biblioescolar-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"biblioescolar-300x176.png";s:5:"width";i:300;s:6:"height";i:176;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"biblioescolar-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"biblioescolar-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
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
(3707, 1242, '_bbp_group_ids', 'a:0:{}'),
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
(3755, 608, '_edit_lock', '1467193204:2'),
(3756, 797, '_edit_lock', '1467193129:2'),
(3757, 318, '_edit_lock', '1467193438:2'),
(4192, 8079, '_wp_attached_file', '2016/01/1marcllenguesvives.jpg'),
(4193, 8079, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:658;s:6:"height";i:278;s:4:"file";s:30:"2016/01/1marcllenguesvives.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:30:"1marcllenguesvives-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:30:"1marcllenguesvives-300x127.jpg";s:5:"width";i:300;s:6:"height";i:127;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:30:"1marcllenguesvives-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:30:"1marcllenguesvives-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4204, 8082, '_wp_attached_file', '2016/01/curs-educació-fisica-incl.-1-1024x338.jpg'),
(4205, 8082, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:338;s:4:"file";s:50:"2016/01/curs-educació-fisica-incl.-1-1024x338.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:49:"curs-educació-fisica-incl.-1-1024x338-300x99.jpg";s:5:"width";i:300;s:6:"height";i:99;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:51:"curs-educació-fisica-incl.-1-1024x338-1024x338.jpg";s:5:"width";i:1024;s:6:"height";i:338;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:50:"curs-educació-fisica-incl.-1-1024x338-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4225, 8086, '_wp_attached_file', '2014/06/trobadainfantil.png'),
(4226, 8086, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:520;s:6:"height";i:280;s:4:"file";s:27:"2014/06/trobadainfantil.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"trobadainfantil-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:27:"trobadainfantil-300x162.png";s:5:"width";i:300;s:6:"height";i:162;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"trobadainfantil-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"trobadainfantil-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4296, 8100, '_edit_lock', '1458218899:2'),
(4297, 8100, '_edit_last', '2'),
(4298, 8100, '_wp_page_template', 'page-templates/side-menu.php'),
(4299, 8100, '_template_layout', '2c-l'),
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
(4320, 8115, '_wp_attached_file', '2016/06/eoi.png'),
(4321, 8115, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:237;s:6:"height";i:128;s:4:"file";s:15:"2016/06/eoi.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:15:"eoi-150x128.png";s:5:"width";i:150;s:6:"height";i:128;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:15:"eoi-200x128.png";s:5:"width";i:200;s:6:"height";i:128;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4322, 8116, '_wp_attached_file', '2016/06/crp.png'),
(4323, 8116, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:978;s:6:"height";i:542;s:4:"file";s:15:"2016/06/crp.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:15:"crp-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:15:"crp-300x166.png";s:5:"width";i:300;s:6:"height";i:166;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:15:"crp-768x426.png";s:5:"width";i:768;s:6:"height";i:426;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:15:"crp-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:15:"crp-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4340, 8125, '_wp_attached_file', '2016/06/eoi_badalona.png'),
(4341, 8125, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:360;s:6:"height";i:209;s:4:"file";s:24:"2016/06/eoi_badalona.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"eoi_badalona-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"eoi_badalona-300x174.png";s:5:"width";i:300;s:6:"height";i:174;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"eoi_badalona-300x209.png";s:5:"width";i:300;s:6:"height";i:209;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"eoi_badalona-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4342, 8126, '_wp_attached_file', '2016/06/france.jpg'),
(4343, 8126, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:535;s:4:"file";s:18:"2016/06/france.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"france-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:18:"france-300x201.jpg";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:18:"france-768x514.jpg";s:5:"width";i:768;s:6:"height";i:514;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"france-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"france-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4344, 8127, '_wp_attached_file', '2016/06/friends_travel.jpg'),
(4345, 8127, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:533;s:4:"file";s:26:"2016/06/friends_travel.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"friends_travel-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"friends_travel-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:26:"friends_travel-768x512.jpg";s:5:"width";i:768;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"friends_travel-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"friends_travel-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4346, 107, 'album_extension', ''),
(4347, 8128, '_wp_attached_file', '2016/06/talk.jpg'),
(4348, 8128, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:536;s:4:"file";s:16:"2016/06/talk.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:16:"talk-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:16:"talk-300x201.jpg";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:16:"talk-768x515.jpg";s:5:"width";i:768;s:6:"height";i:515;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:16:"talk-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:16:"talk-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4349, 8129, '_wp_attached_file', '2016/06/talk2.jpg'),
(4350, 8129, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:533;s:4:"file";s:17:"2016/06/talk2.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"talk2-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:17:"talk2-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:17:"talk2-768x512.jpg";s:5:"width";i:768;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"talk2-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"talk2-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"4";s:6:"credit";s:11:"Eric Bailey";s:6:"camera";s:12:"Canon EOS 6D";s:7:"caption";s:20:"Startup Stock Photos";s:17:"created_timestamp";s:10:"1406776622";s:9:"copyright";s:11:"Sculpt, LLC";s:12:"focal_length";s:2:"84";s:3:"iso";s:4:"2000";s:13:"shutter_speed";s:5:"0.002";s:5:"title";s:20:"Startup Stock Photos";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4351, 8130, '_wp_attached_file', '2016/06/talk3.jpg'),
(4352, 8130, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:533;s:4:"file";s:17:"2016/06/talk3.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"talk3-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:17:"talk3-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:17:"talk3-768x512.jpg";s:5:"width";i:768;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"talk3-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"talk3-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"4";s:6:"credit";s:11:"Eric Bailey";s:6:"camera";s:12:"Canon EOS 6D";s:7:"caption";s:20:"Startup Stock Photos";s:17:"created_timestamp";s:10:"1406776994";s:9:"copyright";s:11:"Sculpt, LLC";s:12:"focal_length";s:3:"105";s:3:"iso";s:4:"1600";s:13:"shutter_speed";s:7:"0.00125";s:5:"title";s:20:"Startup Stock Photos";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4355, 806, '_edit_lock', '1466081885:1'),
(4365, 806, 'sharing_disabled', '1'),
(4370, 8141, '_edit_lock', '1466677190:1'),
(4371, 8141, '_edit_last', '1'),
(4372, 8141, '_wp_page_template', 'page-templates/side-menu.php'),
(4373, 8141, '_template_layout', '2c-l'),
(4376, 8141, 'sharing_disabled', '1'),
(4386, 8149, '_edit_lock', '1465979370:1'),
(4387, 8149, '_edit_last', '1'),
(4388, 8149, '_wp_page_template', 'page-templates/side-menu.php'),
(4389, 8149, '_template_layout', '2c-l'),
(4390, 8151, '_edit_lock', '1467193357:2'),
(4391, 8151, '_edit_last', '2'),
(4392, 8151, '_wp_page_template', 'page-templates/side-menu.php'),
(4393, 8151, '_template_layout', '2c-l'),
(4394, 8151, 'sharing_disabled', '1'),
(4395, 8153, '_edit_lock', '1466167798:1'),
(4396, 8153, '_edit_last', '1'),
(4397, 8153, '_wp_page_template', 'page-templates/side-menu.php'),
(4398, 8153, 'sharing_disabled', '1'),
(4399, 8153, '_template_layout', '2c-l'),
(4409, 8156, '_menu_item_type', 'post_type'),
(4410, 8156, '_menu_item_menu_item_parent', '8503'),
(4411, 8156, '_menu_item_object_id', '8151'),
(4412, 8156, '_menu_item_object', 'page'),
(4413, 8156, '_menu_item_target', ''),
(4414, 8156, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4415, 8156, '_menu_item_xfn', ''),
(4416, 8156, '_menu_item_url', ''),
(4418, 8157, '_menu_item_type', 'post_type'),
(4419, 8157, '_menu_item_menu_item_parent', '8503'),
(4420, 8157, '_menu_item_object_id', '8153'),
(4421, 8157, '_menu_item_object', 'page'),
(4422, 8157, '_menu_item_target', ''),
(4423, 8157, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4424, 8157, '_menu_item_xfn', ''),
(4425, 8157, '_menu_item_url', ''),
(4427, 8158, '_edit_lock', '1467193382:2'),
(4428, 8158, '_edit_last', '1'),
(4429, 8158, '_wp_page_template', 'page-templates/side-menu.php'),
(4430, 8158, '_template_layout', '2c-l'),
(4431, 8158, 'sharing_disabled', '1'),
(4432, 8161, '_edit_lock', '1465992252:1'),
(4433, 8161, '_edit_last', '1'),
(4434, 8161, '_wp_page_template', 'page-templates/side-menu.php'),
(4435, 8161, '_template_layout', '2c-l'),
(4436, 8161, 'sharing_disabled', '1'),
(4437, 8164, '_edit_lock', '1467192709:2'),
(4438, 8164, '_edit_last', '2'),
(4439, 8164, '_wp_page_template', 'page-templates/side-menu.php'),
(4440, 8164, 'sharing_disabled', '1'),
(4441, 8164, '_template_layout', '2c-l'),
(4442, 8166, '_edit_lock', '1467192619:2'),
(4443, 8166, '_edit_last', '2'),
(4444, 8166, '_wp_page_template', 'page-templates/side-menu.php'),
(4445, 8166, '_template_layout', '2c-l'),
(4446, 8168, '_edit_lock', '1467192790:2'),
(4447, 8168, '_edit_last', '2'),
(4448, 8168, '_wp_page_template', 'page-templates/side-menu.php'),
(4449, 8168, '_template_layout', '2c-l'),
(4450, 8170, '_edit_lock', '1467192791:2'),
(4451, 8170, '_edit_last', '2'),
(4452, 8170, '_wp_page_template', 'page-templates/side-menu.php'),
(4453, 8170, '_template_layout', '2c-l'),
(4454, 8168, 'sharing_disabled', '1'),
(4455, 8170, 'sharing_disabled', '1'),
(4456, 8166, 'sharing_disabled', '1'),
(4457, 8149, 'sharing_disabled', '1'),
(4458, 8174, '_menu_item_type', 'post_type'),
(4459, 8174, '_menu_item_menu_item_parent', '8504'),
(4460, 8174, '_menu_item_object_id', '8161'),
(4461, 8174, '_menu_item_object', 'page'),
(4462, 8174, '_menu_item_target', ''),
(4463, 8174, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4464, 8174, '_menu_item_xfn', ''),
(4465, 8174, '_menu_item_url', ''),
(4467, 8175, '_menu_item_type', 'post_type'),
(4468, 8175, '_menu_item_menu_item_parent', '8174'),
(4469, 8175, '_menu_item_object_id', '8164'),
(4470, 8175, '_menu_item_object', 'page'),
(4471, 8175, '_menu_item_target', ''),
(4472, 8175, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4473, 8175, '_menu_item_xfn', ''),
(4474, 8175, '_menu_item_url', ''),
(4476, 8176, '_menu_item_type', 'post_type'),
(4477, 8176, '_menu_item_menu_item_parent', '8174'),
(4478, 8176, '_menu_item_object_id', '8166'),
(4479, 8176, '_menu_item_object', 'page'),
(4480, 8176, '_menu_item_target', ''),
(4481, 8176, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4482, 8176, '_menu_item_xfn', ''),
(4483, 8176, '_menu_item_url', ''),
(4485, 8177, '_menu_item_type', 'post_type'),
(4486, 8177, '_menu_item_menu_item_parent', '8174'),
(4487, 8177, '_menu_item_object_id', '8168'),
(4488, 8177, '_menu_item_object', 'page'),
(4489, 8177, '_menu_item_target', ''),
(4490, 8177, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4491, 8177, '_menu_item_xfn', ''),
(4492, 8177, '_menu_item_url', ''),
(4494, 8178, '_menu_item_type', 'post_type'),
(4495, 8178, '_menu_item_menu_item_parent', '8174'),
(4496, 8178, '_menu_item_object_id', '8170'),
(4497, 8178, '_menu_item_object', 'page'),
(4498, 8178, '_menu_item_target', ''),
(4499, 8178, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4500, 8178, '_menu_item_xfn', ''),
(4501, 8178, '_menu_item_url', ''),
(4503, 8179, '_menu_item_type', 'post_type'),
(4504, 8179, '_menu_item_menu_item_parent', '0'),
(4505, 8179, '_menu_item_object_id', '8151'),
(4506, 8179, '_menu_item_object', 'page'),
(4507, 8179, '_menu_item_target', ''),
(4508, 8179, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4509, 8179, '_menu_item_xfn', ''),
(4510, 8179, '_menu_item_url', ''),
(4511, 8179, '_menu_item_orphaned', '1465477042'),
(4512, 8180, '_menu_item_type', 'post_type'),
(4513, 8180, '_menu_item_menu_item_parent', '8503'),
(4514, 8180, '_menu_item_object_id', '8158'),
(4515, 8180, '_menu_item_object', 'page'),
(4516, 8180, '_menu_item_target', ''),
(4517, 8180, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4518, 8180, '_menu_item_xfn', ''),
(4519, 8180, '_menu_item_url', ''),
(4521, 8181, '_menu_item_type', 'post_type'),
(4522, 8181, '_menu_item_menu_item_parent', '8502'),
(4523, 8181, '_menu_item_object_id', '797'),
(4524, 8181, '_menu_item_object', 'page'),
(4525, 8181, '_menu_item_target', ''),
(4526, 8181, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4527, 8181, '_menu_item_xfn', ''),
(4528, 8181, '_menu_item_url', ''),
(4530, 8182, '_menu_item_type', 'post_type'),
(4531, 8182, '_menu_item_menu_item_parent', '8502'),
(4532, 8182, '_menu_item_object_id', '608'),
(4533, 8182, '_menu_item_object', 'page'),
(4534, 8182, '_menu_item_target', ''),
(4535, 8182, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4536, 8182, '_menu_item_xfn', ''),
(4537, 8182, '_menu_item_url', ''),
(4539, 8183, '_menu_item_type', 'post_type'),
(4540, 8183, '_menu_item_menu_item_parent', '8502'),
(4541, 8183, '_menu_item_object_id', '8141'),
(4542, 8183, '_menu_item_object', 'page'),
(4543, 8183, '_menu_item_target', ''),
(4544, 8183, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4545, 8183, '_menu_item_xfn', ''),
(4546, 8183, '_menu_item_url', ''),
(4548, 8184, '_menu_item_type', 'post_type'),
(4549, 8184, '_menu_item_menu_item_parent', '8502'),
(4550, 8184, '_menu_item_object_id', '318'),
(4551, 8184, '_menu_item_object', 'page'),
(4552, 8184, '_menu_item_target', ''),
(4553, 8184, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4554, 8184, '_menu_item_xfn', ''),
(4555, 8184, '_menu_item_url', ''),
(4557, 8185, '_edit_lock', '1465903593:1'),
(4558, 8185, '_edit_last', '1'),
(4559, 8185, '_wp_page_template', 'page-templates/side-menu.php'),
(4560, 8185, '_template_layout', '2c-l'),
(4565, 8189, '_edit_lock', '1466434884:1'),
(4566, 8189, '_edit_last', '1'),
(4567, 8189, '_wp_page_template', 'page-templates/side-menu.php'),
(4568, 8189, '_template_layout', '2c-l'),
(4578, 8193, '_menu_item_type', 'post_type'),
(4579, 8193, '_menu_item_menu_item_parent', '8379'),
(4580, 8193, '_menu_item_object_id', '8185'),
(4581, 8193, '_menu_item_object', 'page'),
(4582, 8193, '_menu_item_target', ''),
(4583, 8193, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4584, 8193, '_menu_item_xfn', ''),
(4585, 8193, '_menu_item_url', ''),
(4587, 8194, '_menu_item_type', 'post_type'),
(4588, 8194, '_menu_item_menu_item_parent', '8379'),
(4589, 8194, '_menu_item_object_id', '8189'),
(4590, 8194, '_menu_item_object', 'page'),
(4591, 8194, '_menu_item_target', ''),
(4592, 8194, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4593, 8194, '_menu_item_xfn', ''),
(4594, 8194, '_menu_item_url', ''),
(4596, 8189, 'sharing_disabled', '1'),
(4597, 8185, 'sharing_disabled', '1'),
(4598, 8195, '_edit_lock', '1465905775:1'),
(4599, 8195, '_edit_last', '1'),
(4600, 8195, '_wp_page_template', 'page-templates/side-menu.php'),
(4601, 8195, '_template_layout', '2c-l'),
(4602, 8197, '_edit_lock', '1466675577:1'),
(4603, 8197, '_edit_last', '1'),
(4604, 8197, '_wp_page_template', 'page-templates/side-menu.php'),
(4605, 8197, '_template_layout', '2c-l'),
(4606, 8199, '_edit_lock', '1466434762:1'),
(4607, 8199, '_edit_last', '1'),
(4608, 8199, '_wp_page_template', 'page-templates/side-menu.php'),
(4609, 8199, '_template_layout', '2c-l'),
(4610, 8201, '_menu_item_type', 'post_type'),
(4611, 8201, '_menu_item_menu_item_parent', '8379'),
(4612, 8201, '_menu_item_object_id', '8199'),
(4613, 8201, '_menu_item_object', 'page'),
(4614, 8201, '_menu_item_target', ''),
(4615, 8201, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4616, 8201, '_menu_item_xfn', ''),
(4617, 8201, '_menu_item_url', ''),
(4619, 8202, '_menu_item_type', 'post_type'),
(4620, 8202, '_menu_item_menu_item_parent', '8379'),
(4621, 8202, '_menu_item_object_id', '8197'),
(4622, 8202, '_menu_item_object', 'page'),
(4623, 8202, '_menu_item_target', ''),
(4624, 8202, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4625, 8202, '_menu_item_xfn', ''),
(4626, 8202, '_menu_item_url', ''),
(4628, 8203, '_menu_item_type', 'post_type'),
(4629, 8203, '_menu_item_menu_item_parent', '8379'),
(4630, 8203, '_menu_item_object_id', '8195'),
(4631, 8203, '_menu_item_object', 'page'),
(4632, 8203, '_menu_item_target', ''),
(4633, 8203, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4634, 8203, '_menu_item_xfn', ''),
(4635, 8203, '_menu_item_url', ''),
(4637, 8204, '_menu_item_type', 'post_type'),
(4638, 8204, '_menu_item_menu_item_parent', '0'),
(4639, 8204, '_menu_item_object_id', '8189'),
(4640, 8204, '_menu_item_object', 'page'),
(4641, 8204, '_menu_item_target', ''),
(4642, 8204, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4643, 8204, '_menu_item_xfn', ''),
(4644, 8204, '_menu_item_url', ''),
(4645, 8204, '_menu_item_orphaned', '1465479467'),
(4646, 8205, '_menu_item_type', 'post_type'),
(4647, 8205, '_menu_item_menu_item_parent', '0'),
(4648, 8205, '_menu_item_object_id', '8185'),
(4649, 8205, '_menu_item_object', 'page'),
(4650, 8205, '_menu_item_target', ''),
(4651, 8205, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4652, 8205, '_menu_item_xfn', ''),
(4653, 8205, '_menu_item_url', ''),
(4654, 8205, '_menu_item_orphaned', '1465479467'),
(4655, 8206, '_edit_lock', '1466433668:1'),
(4656, 8206, '_edit_last', '1'),
(4657, 8206, '_wp_page_template', 'page-templates/side-menu.php'),
(4658, 8206, '_template_layout', '2c-l'),
(4659, 8210, '_edit_lock', '1466439150:1'),
(4660, 8210, '_edit_last', '1'),
(4661, 8210, '_wp_page_template', 'page-templates/side-menu.php'),
(4662, 8210, '_template_layout', '2c-l'),
(4663, 8212, '_edit_lock', '1466436052:1'),
(4664, 8212, '_edit_last', '1'),
(4665, 8212, '_wp_page_template', 'page-templates/side-menu.php'),
(4666, 8212, '_template_layout', '2c-l'),
(4667, 8214, '_edit_lock', '1466435938:1'),
(4668, 8214, '_edit_last', '1'),
(4669, 8214, '_wp_page_template', 'page-templates/side-menu.php'),
(4670, 8214, '_template_layout', '2c-l'),
(4671, 8216, '_edit_lock', '1466434408:1'),
(4672, 8216, '_edit_last', '1'),
(4673, 8216, '_wp_page_template', 'page-templates/side-menu.php'),
(4674, 8216, '_template_layout', '2c-l'),
(4681, 8222, '_menu_item_type', 'post_type'),
(4682, 8222, '_menu_item_menu_item_parent', '0'),
(4683, 8222, '_menu_item_object_id', '8185'),
(4684, 8222, '_menu_item_object', 'page'),
(4685, 8222, '_menu_item_target', ''),
(4686, 8222, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4687, 8222, '_menu_item_xfn', ''),
(4688, 8222, '_menu_item_url', '');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(4689, 8222, '_menu_item_orphaned', '1465806953'),
(4744, 8206, 'sharing_disabled', '1'),
(4746, 8229, '_edit_lock', '1466435148:1'),
(4747, 8229, '_edit_last', '1'),
(4748, 8229, '_oembed_ead416b22624b3b261b4c040a57ab8a8', '{{unknown}}'),
(4749, 8229, '_oembed_00f1f0a4de97ad38934287829e67b067', '{{unknown}}'),
(4750, 8229, '_wp_page_template', 'page-templates/side-menu.php'),
(4751, 8229, '_template_layout', '2c-l'),
(4756, 8233, '_edit_lock', '1466434421:1'),
(4757, 8233, '_edit_last', '1'),
(4758, 8233, '_wp_page_template', 'page-templates/side-menu.php'),
(4759, 8233, '_template_layout', '2c-l'),
(4760, 8235, '_edit_lock', '1466436240:1'),
(4761, 8235, '_edit_last', '1'),
(4762, 8235, '_wp_page_template', 'page-templates/side-menu.php'),
(4763, 8235, '_template_layout', '2c-l'),
(4764, 8237, '_edit_lock', '1466435394:1'),
(4765, 8237, '_edit_last', '1'),
(4766, 8237, '_wp_page_template', 'page-templates/side-menu.php'),
(4767, 8237, '_template_layout', '2c-l'),
(4768, 8237, 'sharing_disabled', '1'),
(4769, 8240, '_edit_lock', '1466435942:1'),
(4770, 8240, '_edit_last', '1'),
(4771, 8240, '_wp_page_template', 'page-templates/side-menu.php'),
(4772, 8240, '_template_layout', '2c-l'),
(4777, 8244, '_menu_item_type', 'post_type'),
(4778, 8244, '_menu_item_menu_item_parent', '0'),
(4779, 8244, '_menu_item_object_id', '8189'),
(4780, 8244, '_menu_item_object', 'page'),
(4781, 8244, '_menu_item_target', ''),
(4782, 8244, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4783, 8244, '_menu_item_xfn', ''),
(4784, 8244, '_menu_item_url', ''),
(4785, 8244, '_menu_item_orphaned', '1465810999'),
(4840, 8233, 'sharing_disabled', '1'),
(4841, 8229, 'sharing_disabled', '1'),
(4878, 8216, 'sharing_disabled', '1'),
(4879, 8210, 'sharing_disabled', '1'),
(4880, 8212, 'sharing_disabled', '1'),
(4881, 8214, 'sharing_disabled', '1'),
(4882, 8197, 'sharing_disabled', '1'),
(4883, 8260, '_edit_lock', '1466433760:1'),
(4884, 8260, '_edit_last', '1'),
(4885, 8260, '_wp_page_template', 'page-templates/side-menu.php'),
(4886, 8260, 'sharing_disabled', '1'),
(4887, 8260, '_template_layout', '2c-l'),
(4888, 8262, '_edit_lock', '1466434436:1'),
(4889, 8262, '_edit_last', '1'),
(4890, 8262, '_wp_page_template', 'page-templates/side-menu.php'),
(4891, 8262, '_template_layout', '2c-l'),
(4892, 8262, 'sharing_disabled', '1'),
(4893, 8265, '_edit_lock', '1466436222:1'),
(4894, 8265, '_edit_last', '1'),
(4895, 8265, '_wp_page_template', 'page-templates/side-menu.php'),
(4896, 8265, '_template_layout', '2c-l'),
(4897, 8267, '_edit_lock', '1466436073:1'),
(4898, 8267, '_edit_last', '1'),
(4899, 8267, '_wp_page_template', 'page-templates/side-menu.php'),
(4900, 8267, '_template_layout', '2c-l'),
(4901, 8265, 'sharing_disabled', '1'),
(4902, 8267, 'sharing_disabled', '1'),
(4903, 8269, '_edit_lock', '1466435962:1'),
(4904, 8269, '_edit_last', '1'),
(4905, 8269, '_wp_page_template', 'page-templates/side-menu.php'),
(4906, 8269, '_template_layout', '2c-l'),
(4912, 8199, 'sharing_disabled', '1'),
(4913, 8274, '_edit_lock', '1466434339:1'),
(4914, 8274, '_edit_last', '1'),
(4915, 8274, '_wp_page_template', 'page-templates/side-menu.php'),
(4916, 8274, 'sharing_disabled', '1'),
(4917, 8274, '_template_layout', '2c-l'),
(4918, 8277, '_edit_lock', '1466434453:1'),
(4919, 8277, '_edit_last', '1'),
(4920, 8277, '_wp_page_template', 'page-templates/side-menu.php'),
(4921, 8277, '_template_layout', '2c-l'),
(4922, 8277, 'sharing_disabled', '1'),
(4923, 8279, '_edit_lock', '1466436205:1'),
(4924, 8279, '_edit_last', '1'),
(4925, 8279, '_wp_page_template', 'page-templates/side-menu.php'),
(4926, 8279, '_template_layout', '2c-l'),
(4927, 8279, 'sharing_disabled', '1'),
(4928, 8282, '_edit_lock', '1466436092:1'),
(4929, 8282, '_edit_last', '1'),
(4930, 8282, '_wp_page_template', 'page-templates/side-menu.php'),
(4931, 8282, 'sharing_disabled', '1'),
(4932, 8282, '_template_layout', '2c-l'),
(4933, 8284, '_edit_lock', '1466435981:1'),
(4934, 8284, '_edit_last', '1'),
(4935, 8284, '_wp_page_template', 'page-templates/side-menu.php'),
(4936, 8284, 'sharing_disabled', '1'),
(4937, 8284, '_template_layout', '2c-l'),
(4943, 8195, 'sharing_disabled', '1'),
(4944, 8291, '_edit_lock', '1466434300:1'),
(4945, 8291, '_edit_last', '1'),
(4946, 8291, '_wp_page_template', 'page-templates/side-menu.php'),
(4947, 8291, 'sharing_disabled', '1'),
(4948, 8291, '_template_layout', '2c-l'),
(4949, 8293, '_edit_lock', '1466434467:1'),
(4950, 8293, '_edit_last', '1'),
(4951, 8293, '_wp_page_template', 'page-templates/side-menu.php'),
(4952, 8293, 'sharing_disabled', '1'),
(4953, 8293, '_template_layout', '2c-l'),
(4954, 8295, '_edit_lock', '1466436174:1'),
(4955, 8295, '_edit_last', '1'),
(4956, 8295, '_wp_page_template', 'page-templates/side-menu.php'),
(4957, 8295, 'sharing_disabled', '1'),
(4958, 8295, '_template_layout', '2c-l'),
(4959, 8297, '_edit_lock', '1466436108:1'),
(4960, 8297, '_edit_last', '1'),
(4961, 8297, '_wp_page_template', 'page-templates/side-menu.php'),
(4962, 8297, '_template_layout', '2c-l'),
(4963, 8297, 'sharing_disabled', '1'),
(4964, 8299, '_edit_lock', '1466436010:1'),
(4965, 8299, '_edit_last', '1'),
(4966, 8299, '_wp_page_template', 'page-templates/side-menu.php'),
(4967, 8299, 'sharing_disabled', '1'),
(4968, 8299, '_template_layout', '2c-l'),
(5119, 9, 'sharing_disabled', '1'),
(5120, 8347, '_edit_lock', '1467192160:2'),
(5121, 8348, '_wp_attached_file', '2016/06/parla3.jpg'),
(5122, 8348, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:259;s:6:"height";i:194;s:4:"file";s:18:"2016/06/parla3.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"parla3-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"parla3-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5123, 8347, '_thumbnail_id', '8348'),
(5124, 8347, '_edit_last', '2'),
(5127, 8347, 'sharing_disabled', '1'),
(5128, 8347, '_amaga_titol', NULL),
(5129, 8347, '_amaga_metadata', NULL),
(5130, 8347, '_bloc_html', NULL),
(5131, 8347, '_original_size', 'on'),
(5132, 8347, '_entry_icon', 'noicon'),
(5137, 8352, '_edit_lock', '1467192109:2'),
(5138, 8352, '_edit_last', '1'),
(5141, 8352, '_amaga_titol', NULL),
(5142, 8352, '_amaga_metadata', NULL),
(5143, 8352, '_bloc_html', NULL),
(5144, 8352, '_original_size', NULL),
(5145, 8352, '_entry_icon', 'noicon'),
(5150, 8354, '_wp_attached_file', '2016/06/Selecció_999310.png'),
(5151, 8354, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:734;s:6:"height";i:301;s:4:"file";s:28:"2016/06/Selecció_999310.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999310-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999310-300x123.png";s:5:"width";i:300;s:6:"height";i:123;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999310-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999310-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5152, 8352, '_thumbnail_id', '8354'),
(5155, 8355, '_edit_lock', '1465984690:1'),
(5156, 8355, '_edit_last', '1'),
(5157, 8355, '_oembed_64031431fa32caf84964cd8f43464ce2', '{{unknown}}'),
(5160, 8355, 'sharing_disabled', '1'),
(5161, 8355, '_amaga_titol', NULL),
(5162, 8355, '_amaga_metadata', NULL),
(5163, 8355, '_bloc_html', NULL),
(5164, 8355, '_original_size', NULL),
(5165, 8355, '_entry_icon', 'document'),
(5166, 8357, '_wp_attached_file', '2016/06/Selecció_999311.png'),
(5167, 8357, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:520;s:6:"height";i:341;s:4:"file";s:28:"2016/06/Selecció_999311.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999311-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999311-300x197.png";s:5:"width";i:300;s:6:"height";i:197;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999311-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999311-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5168, 8355, '_thumbnail_id', '8357'),
(5175, 8358, '_edit_lock', '1465992199:1'),
(5176, 8358, '_edit_last', '1'),
(5177, 8358, '_wp_page_template', 'page-templates/side-menu.php'),
(5178, 8358, '_template_layout', '2c-l'),
(5179, 8358, 'sharing_disabled', '1'),
(5191, 8362, '_edit_lock', '1465820557:1'),
(5192, 8362, '_edit_last', '1'),
(5196, 8362, '_amaga_titol', NULL),
(5197, 8362, '_amaga_metadata', NULL),
(5198, 8362, '_bloc_html', NULL),
(5199, 8362, '_original_size', 'on'),
(5200, 8362, '_entry_icon', 'noicon'),
(5205, 8365, '_wp_attached_file', '2016/06/guiacursosestiu2016.png'),
(5206, 8365, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:265;s:6:"height";i:106;s:4:"file";s:31:"2016/06/guiacursosestiu2016.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:31:"guiacursosestiu2016-150x106.png";s:5:"width";i:150;s:6:"height";i:106;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:31:"guiacursosestiu2016-200x106.png";s:5:"width";i:200;s:6:"height";i:106;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5207, 8362, '_thumbnail_id', '8365'),
(5214, 8366, '_edit_lock', '1467192524:2'),
(5215, 8366, '_edit_last', '1'),
(5216, 8366, '_wp_page_template', 'page-templates/side-menu.php'),
(5217, 8366, '_template_layout', '2c-l'),
(5218, 8366, 'sharing_disabled', '1'),
(5219, 8370, '_edit_lock', '1467192788:2'),
(5220, 8370, '_edit_last', '2'),
(5221, 8370, '_oembed_c906d94d862eb89d1fb9f807e76b5eb1', '{{unknown}}'),
(5222, 8370, '_oembed_f8c06219a129230af5aa66635b96c796', '<blockquote data-secret="pm2G4lz9o4" class="wp-embedded-content"><a href="http://www.eoilapau.net/secretaria/instancies-i-sol-licituds/">Instàncies i sol·licituds</a></blockquote><iframe class="wp-embedded-content" sandbox="allow-scripts" security="restricted" style="position: absolute; clip: rect(1px, 1px, 1px, 1px);" src="http://www.eoilapau.net/secretaria/instancies-i-sol-licituds/embed/#?secret=pm2G4lz9o4" data-secret="pm2G4lz9o4" width="500" height="282" title="&#8220;Instàncies i sol·licituds&#8221; &#8212; Escola Oficial d&#039;Idiomes Barcelona IV La Pau" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>'),
(5223, 8370, '_oembed_time_f8c06219a129230af5aa66635b96c796', '1465821507'),
(5224, 8370, '_wp_page_template', 'page-templates/side-menu.php'),
(5225, 8370, '_template_layout', '2c-l'),
(5226, 8370, 'sharing_disabled', '1'),
(5227, 8372, '_edit_lock', '1467193306:2'),
(5228, 8372, '_edit_last', '2'),
(5229, 8372, '_wp_page_template', 'page-templates/side-menu.php'),
(5230, 8372, '_template_layout', '2c-l'),
(5231, 8372, 'sharing_disabled', '1'),
(5237, 8377, '_edit_lock', '1467193132:2'),
(5238, 8377, '_edit_last', '2'),
(5239, 8377, '_wp_page_template', 'page-templates/side-menu.php'),
(5240, 8377, '_template_layout', '2c-l'),
(5241, 8377, 'sharing_disabled', '1'),
(5245, 8379, '_menu_item_type', 'custom'),
(5246, 8379, '_menu_item_menu_item_parent', '0'),
(5247, 8379, '_menu_item_object_id', '8379'),
(5248, 8379, '_menu_item_object', 'custom'),
(5249, 8379, '_menu_item_target', ''),
(5250, 8379, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5251, 8379, '_menu_item_xfn', ''),
(5252, 8379, '_menu_item_url', '#'),
(5254, 8382, '_menu_item_type', 'post_type'),
(5255, 8382, '_menu_item_menu_item_parent', '0'),
(5256, 8382, '_menu_item_object_id', '8358'),
(5257, 8382, '_menu_item_object', 'page'),
(5258, 8382, '_menu_item_target', ''),
(5259, 8382, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5260, 8382, '_menu_item_xfn', ''),
(5261, 8382, '_menu_item_url', ''),
(5262, 8382, '_menu_item_orphaned', '1465823628'),
(5263, 8383, '_menu_item_type', 'post_type'),
(5264, 8383, '_menu_item_menu_item_parent', '8504'),
(5265, 8383, '_menu_item_object_id', '8377'),
(5266, 8383, '_menu_item_object', 'page'),
(5267, 8383, '_menu_item_target', ''),
(5268, 8383, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5269, 8383, '_menu_item_xfn', ''),
(5270, 8383, '_menu_item_url', ''),
(5272, 8384, '_menu_item_type', 'post_type'),
(5273, 8384, '_menu_item_menu_item_parent', '8504'),
(5274, 8384, '_menu_item_object_id', '8370'),
(5275, 8384, '_menu_item_object', 'page'),
(5276, 8384, '_menu_item_target', ''),
(5277, 8384, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5278, 8384, '_menu_item_xfn', ''),
(5279, 8384, '_menu_item_url', ''),
(5281, 8385, '_menu_item_type', 'post_type'),
(5282, 8385, '_menu_item_menu_item_parent', '8504'),
(5283, 8385, '_menu_item_object_id', '8366'),
(5284, 8385, '_menu_item_object', 'page'),
(5285, 8385, '_menu_item_target', ''),
(5286, 8385, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5287, 8385, '_menu_item_xfn', ''),
(5288, 8385, '_menu_item_url', ''),
(5321, 8391, '_wp_attached_file', '2016/06/German-Hat-96.png'),
(5322, 8391, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:25:"2016/06/German-Hat-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5323, 8396, '_wp_attached_file', '2014/09/Big-Ben-96.png'),
(5324, 8396, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:22:"2014/09/Big-Ben-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5325, 8402, '_wp_attached_file', '2016/06/Sagrada-Familia-96.png'),
(5326, 8402, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:30:"2016/06/Sagrada-Familia-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5327, 8404, '_wp_attached_file', '2016/06/Eiffel-Tower-96-1.png'),
(5328, 8404, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:29:"2016/06/Eiffel-Tower-96-1.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5329, 8406, '_wp_attached_file', '2016/06/France-96.png'),
(5330, 8406, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:21:"2016/06/France-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5331, 8407, '_wp_attached_file', '2016/06/Germany-96.png'),
(5332, 8407, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:22:"2016/06/Germany-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5333, 8408, '_wp_attached_file', '2016/06/Great-Britain-96.png'),
(5334, 8408, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:28:"2016/06/Great-Britain-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5335, 8409, '_wp_attached_file', '2016/06/Spain-96.png'),
(5336, 8409, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:20:"2016/06/Spain-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5337, 8410, '_wp_attached_file', '2016/06/cataluna.png'),
(5338, 8410, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:50;s:6:"height";i:33;s:4:"file";s:20:"2016/06/cataluna.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5339, 8411, '_edit_lock', '1465912386:1'),
(5340, 8411, '_edit_last', '1'),
(5341, 8411, '_wp_page_template', 'page-templates/side-menu.php'),
(5342, 8411, '_template_layout', '2c-l'),
(5343, 8414, '_edit_lock', '1467193129:2'),
(5344, 8414, '_edit_last', '2'),
(5345, 8414, '_wp_page_template', 'page-templates/side-menu.php'),
(5346, 8414, '_template_layout', '2c-l'),
(5347, 8414, 'sharing_disabled', '1'),
(5357, 8417, '_menu_item_type', 'post_type'),
(5358, 8417, '_menu_item_menu_item_parent', '8505'),
(5359, 8417, '_menu_item_object_id', '8414'),
(5360, 8417, '_menu_item_object', 'page'),
(5361, 8417, '_menu_item_target', ''),
(5362, 8417, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5363, 8417, '_menu_item_xfn', ''),
(5364, 8417, '_menu_item_url', ''),
(5366, 8418, '_menu_item_type', 'custom'),
(5367, 8418, '_menu_item_menu_item_parent', '8505'),
(5368, 8418, '_menu_item_object_id', '8418'),
(5369, 8418, '_menu_item_object', 'custom'),
(5370, 8418, '_menu_item_target', '_blank'),
(5371, 8418, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5372, 8418, '_menu_item_xfn', ''),
(5373, 8418, '_menu_item_url', 'http://URL%20del%20Moodle%20del%20centre'),
(5395, 8425, '_menu_item_type', 'post_type'),
(5396, 8425, '_menu_item_menu_item_parent', '8502'),
(5397, 8425, '_menu_item_object_id', '8372'),
(5398, 8425, '_menu_item_object', 'page'),
(5399, 8425, '_menu_item_target', ''),
(5400, 8425, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5401, 8425, '_menu_item_xfn', ''),
(5402, 8425, '_menu_item_url', ''),
(5404, 8427, '_edit_lock', '1466437242:1'),
(5405, 8427, '_edit_last', '1'),
(5406, 8427, '_wp_page_template', 'page-templates/side-menu.php'),
(5407, 8427, 'sharing_disabled', '1'),
(5408, 8427, '_template_layout', '2c-l'),
(5409, 8429, '_menu_item_type', 'post_type'),
(5410, 8429, '_menu_item_menu_item_parent', '8505'),
(5411, 8429, '_menu_item_object_id', '8427'),
(5412, 8429, '_menu_item_object', 'page'),
(5413, 8429, '_menu_item_target', ''),
(5414, 8429, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5415, 8429, '_menu_item_xfn', ''),
(5416, 8429, '_menu_item_url', ''),
(5418, 8430, '_edit_lock', '1466438323:1'),
(5419, 8430, '_edit_last', '1'),
(5420, 8430, '_wp_page_template', 'page-templates/side-menu.php'),
(5421, 8430, '_template_layout', '2c-l'),
(5422, 8430, 'sharing_disabled', '1'),
(5423, 8432, '_edit_lock', '1466438632:1'),
(5424, 8432, '_edit_last', '1'),
(5425, 8432, '_wp_page_template', 'page-templates/side-menu.php'),
(5426, 8432, '_template_layout', '2c-l'),
(5427, 8434, '_edit_lock', '1466426041:1'),
(5428, 8434, '_edit_last', '1'),
(5429, 8434, '_wp_page_template', 'page-templates/side-menu.php'),
(5430, 8434, 'sharing_disabled', '1'),
(5431, 8434, '_template_layout', '2c-l'),
(5434, 8436, '_menu_item_type', 'post_type'),
(5435, 8436, '_menu_item_menu_item_parent', '8504'),
(5436, 8436, '_menu_item_object_id', '8434'),
(5437, 8436, '_menu_item_object', 'page'),
(5438, 8436, '_menu_item_target', ''),
(5439, 8436, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5440, 8436, '_menu_item_xfn', ''),
(5441, 8436, '_menu_item_url', ''),
(5443, 8437, '_menu_item_type', 'post_type'),
(5444, 8437, '_menu_item_menu_item_parent', '8505'),
(5445, 8437, '_menu_item_object_id', '8432'),
(5446, 8437, '_menu_item_object', 'page'),
(5447, 8437, '_menu_item_target', ''),
(5448, 8437, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5449, 8437, '_menu_item_xfn', ''),
(5450, 8437, '_menu_item_url', ''),
(5452, 8432, 'sharing_disabled', '1'),
(5453, 8439, '_oembed_4e0a2f975269b5dac4e08ec343fc8ae9', '<iframe src="https://player.vimeo.com/video/55560835" width="500" height="281" frameborder="0" title="&iexcl;Defendamos la ense&ntilde;anza p&uacute;blica de idiomas!" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),
(5454, 8439, '_oembed_time_4e0a2f975269b5dac4e08ec343fc8ae9', '1465915865'),
(5455, 8439, '_edit_lock', '1465915895:1'),
(5456, 8439, '_edit_last', '1'),
(5459, 8439, '_amaga_titol', NULL),
(5460, 8439, '_amaga_metadata', NULL),
(5461, 8439, '_bloc_html', 'on'),
(5462, 8439, '_original_size', NULL),
(5463, 8439, '_entry_icon', 'noicon'),
(5466, 797, 'sharing_disabled', '1'),
(5467, 8442, '_wp_attached_file', '2016/06/guia_eoi.pdf'),
(5468, 8444, '_edit_lock', '1467193256:2'),
(5469, 8444, '_edit_last', '2'),
(5470, 8444, '_oembed_ae00e4525b31b870f2fef706549f1c21', '{{unknown}}'),
(5471, 8444, '_oembed_b310bfe872f9834792978dba10f57eb1', '{{unknown}}'),
(5472, 8444, '_wp_page_template', 'page-templates/side-menu.php'),
(5473, 8444, '_template_layout', '2c-l'),
(5474, 8444, 'sharing_disabled', '1'),
(5484, 8448, '_edit_lock', '1467193131:2'),
(5485, 8448, '_edit_last', '2'),
(5486, 8448, '_oembed_8f75a974ea734302ab2a46557b54ffce', '{{unknown}}'),
(5487, 8448, '_oembed_ef4866d02cd2cf14002c0ca54d0378af', '{{unknown}}'),
(5488, 8448, '_wp_page_template', 'page-templates/side-menu.php'),
(5489, 8448, '_template_layout', '2c-l'),
(5490, 8448, 'sharing_disabled', '1'),
(5491, 8450, '_edit_lock', '1466425109:1'),
(5492, 8450, '_edit_last', '1'),
(5493, 8450, '_wp_page_template', 'page-templates/side-menu.php'),
(5494, 8450, 'sharing_disabled', '1'),
(5495, 8450, '_template_layout', '2c-l'),
(5510, 8455, '_edit_lock', '1466425381:1'),
(5511, 8455, '_edit_last', '1'),
(5512, 8456, '_wp_attached_file', '2016/06/Pizza-96.png'),
(5513, 8456, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:20:"2016/06/Pizza-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5514, 8455, '_wp_page_template', 'page-templates/side-menu.php'),
(5515, 8455, 'sharing_disabled', '1'),
(5516, 8455, '_template_layout', '2c-l'),
(5517, 8458, '_menu_item_type', 'post_type'),
(5518, 8458, '_menu_item_menu_item_parent', '8379'),
(5519, 8458, '_menu_item_object_id', '8455'),
(5520, 8458, '_menu_item_object', 'page'),
(5521, 8458, '_menu_item_target', ''),
(5522, 8458, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5523, 8458, '_menu_item_xfn', ''),
(5524, 8458, '_menu_item_url', ''),
(5526, 8459, '_edit_lock', '1466434374:1'),
(5527, 8459, '_edit_last', '1'),
(5528, 8459, '_wp_page_template', 'page-templates/side-menu.php'),
(5529, 8459, '_template_layout', '2c-l'),
(5530, 8459, 'sharing_disabled', '1'),
(5531, 8461, '_edit_lock', '1466434489:1'),
(5532, 8461, '_edit_last', '1'),
(5533, 8461, '_wp_page_template', 'page-templates/side-menu.php'),
(5534, 8461, 'sharing_disabled', '1'),
(5535, 8461, '_template_layout', '2c-l'),
(5536, 8463, '_edit_lock', '1466436157:1'),
(5537, 8463, '_edit_last', '1'),
(5538, 8463, '_wp_page_template', 'page-templates/side-menu.php'),
(5539, 8463, 'sharing_disabled', '1'),
(5540, 8463, '_template_layout', '2c-l'),
(5541, 8465, '_edit_lock', '1466436129:1'),
(5542, 8465, '_edit_last', '1'),
(5543, 8465, '_wp_page_template', 'page-templates/side-menu.php'),
(5544, 8465, '_template_layout', '2c-l'),
(5545, 8465, 'sharing_disabled', '1'),
(5546, 8467, '_edit_lock', '1466436030:1'),
(5547, 8467, '_edit_last', '1'),
(5548, 8467, '_wp_page_template', 'page-templates/side-menu.php'),
(5549, 8467, 'sharing_disabled', '1'),
(5550, 8467, '_template_layout', '2c-l'),
(5556, 8472, '_edit_lock', '1465982930:1'),
(5557, 8472, '_edit_last', '1'),
(5558, 8472, '_wp_page_template', 'page-templates/side-menu.php'),
(5559, 8472, 'sharing_disabled', '1'),
(5560, 8472, '_template_layout', '2c-l'),
(5561, 8475, '_edit_lock', '1466408688:1'),
(5562, 8475, '_edit_last', '1'),
(5563, 8476, '_wp_attached_file', '2016/06/PREINSCRIPCIÓ.jpg'),
(5564, 8476, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:318;s:6:"height";i:180;s:4:"file";s:26:"2016/06/PREINSCRIPCIÓ.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"PREINSCRIPCIÓ-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"PREINSCRIPCIÓ-300x170.jpg";s:5:"width";i:300;s:6:"height";i:170;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"PREINSCRIPCIÓ-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"PREINSCRIPCIÓ-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5568, 8475, '_amaga_titol', NULL),
(5569, 8475, '_amaga_metadata', NULL),
(5570, 8475, '_bloc_html', NULL),
(5571, 8475, '_original_size', 'on'),
(5572, 8475, '_entry_icon', 'noicon'),
(5575, 8475, 'sharing_disabled', '1'),
(5585, 8479, '_menu_item_type', 'post_type'),
(5586, 8479, '_menu_item_menu_item_parent', '0'),
(5587, 8479, '_menu_item_object_id', '8358'),
(5588, 8479, '_menu_item_object', 'page'),
(5589, 8479, '_menu_item_target', ''),
(5590, 8479, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5591, 8479, '_menu_item_xfn', ''),
(5592, 8479, '_menu_item_url', ''),
(5593, 8479, '_menu_item_orphaned', '1465992130'),
(5604, 8482, '_edit_lock', '1466675536:1'),
(5605, 8482, '_edit_last', '1'),
(5606, 8482, '_wp_page_template', 'page-templates/side-menu.php'),
(5607, 8482, '_template_layout', '2c-l'),
(5608, 8482, 'sharing_disabled', '1'),
(5609, 8484, '_menu_item_type', 'post_type'),
(5610, 8484, '_menu_item_menu_item_parent', '8505'),
(5611, 8484, '_menu_item_object_id', '8448'),
(5612, 8484, '_menu_item_object', 'page'),
(5613, 8484, '_menu_item_target', ''),
(5614, 8484, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5615, 8484, '_menu_item_xfn', ''),
(5616, 8484, '_menu_item_url', ''),
(5627, 8486, '_edit_lock', '1466675610:1'),
(5628, 8486, '_edit_last', '1'),
(5629, 8486, '_wp_page_template', 'page-templates/side-menu.php'),
(5630, 8486, '_template_layout', '2c-l'),
(5631, 8486, 'sharing_disabled', '1'),
(5632, 8488, '_edit_lock', '1466675653:1'),
(5633, 8488, '_edit_last', '1'),
(5634, 8488, '_wp_page_template', 'page-templates/side-menu.php'),
(5635, 8488, 'sharing_disabled', '1'),
(5636, 8488, '_template_layout', '2c-l'),
(5637, 8490, '_edit_lock', '1466675713:1'),
(5638, 8490, '_edit_last', '1'),
(5639, 8490, '_wp_page_template', 'page-templates/side-menu.php'),
(5640, 8490, 'sharing_disabled', '1'),
(5641, 8490, '_template_layout', '2c-l'),
(5642, 8492, '_edit_lock', '1466675550:1'),
(5643, 8492, '_edit_last', '1'),
(5644, 8492, '_wp_page_template', 'page-templates/side-menu.php'),
(5645, 8492, '_template_layout', '2c-l'),
(5646, 8492, 'sharing_disabled', '1'),
(5647, 8494, '_edit_lock', '1466675594:1'),
(5648, 8494, '_edit_last', '1'),
(5649, 8494, '_wp_page_template', 'page-templates/side-menu.php'),
(5650, 8494, '_template_layout', '2c-l'),
(5651, 8494, 'sharing_disabled', '1'),
(5652, 8496, '_bbp_reply_count', '0'),
(5653, 8496, '_bbp_topic_count', '0'),
(5654, 8496, '_bbp_topic_count_hidden', '0'),
(5655, 8496, '_bbp_total_reply_count', '0'),
(5656, 8496, '_bbp_total_topic_count', '0'),
(5657, 8496, '_bbp_last_topic_id', '0'),
(5658, 8496, '_bbp_last_reply_id', '0'),
(5659, 8496, '_bbp_last_active_id', '0'),
(5660, 8496, '_bbp_last_active_time', '0'),
(5661, 8496, '_bbp_forum_subforum_count', '0'),
(5662, 8496, '_bbp_group_ids', 'a:1:{i:0;i:34;}'),
(5663, 8497, '_bbp_reply_count', '0'),
(5664, 8497, '_bbp_topic_count', '0'),
(5665, 8497, '_bbp_topic_count_hidden', '0'),
(5666, 8497, '_bbp_total_reply_count', '0'),
(5667, 8497, '_bbp_total_topic_count', '0'),
(5668, 8497, '_bbp_last_topic_id', '0'),
(5669, 8497, '_bbp_last_reply_id', '0'),
(5670, 8497, '_bbp_last_active_id', '0'),
(5671, 8497, '_bbp_last_active_time', '0'),
(5672, 8497, '_bbp_forum_subforum_count', '0'),
(5673, 8497, '_bbp_group_ids', 'a:1:{i:0;i:35;}'),
(5674, 8498, '_bbp_reply_count', '0'),
(5675, 8498, '_bbp_topic_count', '0'),
(5676, 8498, '_bbp_topic_count_hidden', '0'),
(5677, 8498, '_bbp_total_reply_count', '0'),
(5678, 8498, '_bbp_total_topic_count', '0'),
(5679, 8498, '_bbp_last_topic_id', '0'),
(5680, 8498, '_bbp_last_reply_id', '0'),
(5681, 8498, '_bbp_last_active_id', '0'),
(5682, 8498, '_bbp_last_active_time', '0'),
(5683, 8498, '_bbp_forum_subforum_count', '0'),
(5684, 8498, '_bbp_group_ids', 'a:1:{i:0;i:36;}'),
(5685, 8499, '_bbp_reply_count', '0'),
(5686, 8499, '_bbp_topic_count', '0'),
(5687, 8499, '_bbp_topic_count_hidden', '0'),
(5688, 8499, '_bbp_total_reply_count', '0'),
(5689, 8499, '_bbp_total_topic_count', '0'),
(5690, 8499, '_bbp_last_topic_id', '0'),
(5691, 8499, '_bbp_last_reply_id', '0'),
(5692, 8499, '_bbp_last_active_id', '0'),
(5693, 8499, '_bbp_last_active_time', '0'),
(5694, 8499, '_bbp_forum_subforum_count', '0'),
(5695, 8499, '_bbp_group_ids', 'a:1:{i:0;i:37;}'),
(5696, 8500, '_bbp_reply_count', '0'),
(5697, 8500, '_bbp_topic_count', '0'),
(5698, 8500, '_bbp_topic_count_hidden', '0'),
(5699, 8500, '_bbp_total_reply_count', '0'),
(5700, 8500, '_bbp_total_topic_count', '0'),
(5701, 8500, '_bbp_last_topic_id', '0'),
(5702, 8500, '_bbp_last_reply_id', '0'),
(5703, 8500, '_bbp_last_active_id', '0'),
(5704, 8500, '_bbp_last_active_time', '0'),
(5705, 8500, '_bbp_forum_subforum_count', '0'),
(5706, 8500, '_bbp_group_ids', 'a:1:{i:0;i:38;}'),
(5707, 8502, '_menu_item_type', 'custom'),
(5708, 8502, '_menu_item_menu_item_parent', '0'),
(5709, 8502, '_menu_item_object_id', '8502'),
(5710, 8502, '_menu_item_object', 'custom'),
(5711, 8502, '_menu_item_target', ''),
(5712, 8502, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5713, 8502, '_menu_item_xfn', ''),
(5714, 8502, '_menu_item_url', '#'),
(5716, 8503, '_menu_item_type', 'custom'),
(5717, 8503, '_menu_item_menu_item_parent', '0'),
(5718, 8503, '_menu_item_object_id', '8503'),
(5719, 8503, '_menu_item_object', 'custom'),
(5720, 8503, '_menu_item_target', ''),
(5721, 8503, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5722, 8503, '_menu_item_xfn', ''),
(5723, 8503, '_menu_item_url', '#'),
(5725, 8504, '_menu_item_type', 'custom'),
(5726, 8504, '_menu_item_menu_item_parent', '0'),
(5727, 8504, '_menu_item_object_id', '8504'),
(5728, 8504, '_menu_item_object', 'custom'),
(5729, 8504, '_menu_item_target', ''),
(5730, 8504, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5731, 8504, '_menu_item_xfn', ''),
(5732, 8504, '_menu_item_url', '#'),
(5734, 8505, '_menu_item_type', 'custom'),
(5735, 8505, '_menu_item_menu_item_parent', '0'),
(5736, 8505, '_menu_item_object_id', '8505'),
(5737, 8505, '_menu_item_object', 'custom'),
(5738, 8505, '_menu_item_target', ''),
(5739, 8505, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5740, 8505, '_menu_item_xfn', ''),
(5741, 8505, '_menu_item_url', '#'),
(5743, 8506, '_edit_lock', '1467192074:2'),
(5744, 8506, '_edit_last', '1'),
(5745, 8506, '_wp_page_template', 'page-templates/side-menu.php'),
(5746, 8506, 'sharing_disabled', '1'),
(5747, 8506, '_template_layout', '2c-l'),
(5748, 8531, '_edit_lock', '1466411509:1'),
(5749, 8531, '_edit_last', '1'),
(5750, 8531, '_wp_page_template', 'page-templates/side-menu.php'),
(5751, 8531, '_template_layout', '2c-l'),
(5752, 8531, 'sharing_disabled', '1'),
(5753, 8166, '_oembed_d196960cba0e17bf3720178b06fe1394', '{{unknown}}'),
(5754, 8166, '_oembed_a95858d7f2d05c56739ee868ce6c4161', '{{unknown}}'),
(5803, 8550, '_wp_attached_file', 'bp-attachments/8549/Renunciar-matricula-sollicitar-reserva_NOU1.doc'),
(5804, 8549, 'bp_docs_last_editor', '1'),
(5805, 8549, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5806, 8549, 'bp_docs_revision_count', '3'),
(5808, 8552, '_wp_attached_file', '2016/06/logo-escola.png'),
(5809, 8552, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:131;s:6:"height";i:131;s:4:"file";s:23:"2016/06/logo-escola.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5810, 8552, '_edit_lock', '1466167069:1'),
(5811, 148, 'album_extension', ''),
(5812, 148, 'picasa_album', ''),
(5813, 148, 'googlephotos_album', ''),
(5818, 8561, '_wp_attached_file', 'bp-attachments/8549/Renunciar-matricula-no-sollicitar-reserva_NOU.doc'),
(5820, 8564, '_wp_attached_file', 'bp-attachments/8563/Sol-trasllat-matricula-viva.doc'),
(5821, 8563, 'bp_docs_last_editor', '1'),
(5822, 8563, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5823, 8563, 'bp_docs_revision_count', '1'),
(5825, 8568, '_wp_attached_file', 'bp-attachments/8566/SOL.LICITUD-TRASLLATS-DEXPEDIENT.pdf'),
(5826, 8566, 'bp_docs_last_editor', '1'),
(5827, 8566, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5828, 8566, 'bp_docs_revision_count', '2'),
(5831, 8571, '_wp_attached_file', 'bp-attachments/8570/Sol-revisio-qualificacions.doc'),
(5832, 8570, 'bp_docs_last_editor', '1'),
(5833, 8570, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5834, 8570, 'bp_docs_revision_count', '1'),
(5835, 8574, '_wp_attached_file', 'bp-attachments/8573/justif-faltes-menors.doc'),
(5836, 8573, 'bp_docs_last_editor', '1'),
(5837, 8573, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5838, 8573, 'bp_docs_revision_count', '1'),
(5839, 8577, '_wp_attached_file', 'bp-attachments/8576/convocatoria-addicional.doc'),
(5840, 8576, 'bp_docs_last_editor', '1'),
(5841, 8576, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5842, 8576, 'bp_docs_revision_count', '1'),
(5843, 8576, '_bp_docs_last_pinged', '1466169113:1'),
(5844, 8581, '_wp_attached_file', 'bp-attachments/8580/sol-canvi-horari.doc'),
(5845, 8580, 'bp_docs_last_editor', '1'),
(5846, 8580, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5847, 8580, 'bp_docs_revision_count', '3'),
(5848, 8584, '_wp_attached_file', 'bp-attachments/8583/sol-permuta.doc'),
(5849, 8583, 'bp_docs_last_editor', '1'),
(5850, 8583, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5851, 8583, 'bp_docs_revision_count', '1'),
(5852, 8587, '_wp_attached_file', 'bp-attachments/8586/IMPRES-MATRICULA_NOU.pdf'),
(5853, 8586, 'bp_docs_last_editor', '1'),
(5854, 8586, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5855, 8586, 'bp_docs_revision_count', '1'),
(5856, 8589, '_wp_attached_file', '2016/06/Selecció_999315.png'),
(5857, 8589, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:692;s:6:"height";i:452;s:4:"file";s:28:"2016/06/Selecció_999315.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999315-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999315-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999315-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999315-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5858, 8475, '_thumbnail_id', '8589'),
(5861, 8594, 'bp_docs_last_editor', '1'),
(5862, 8594, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5863, 8594, 'bp_docs_revision_count', '3'),
(5866, 8597, '_wp_attached_file', 'bp-attachments/8594/instancies.doc'),
(5868, 5, '_edit_last', '1'),
(5869, 5, '_wp_page_template', 'default'),
(5870, 5, 'sharing_disabled', '1'),
(5871, 5, '_template_layout', '2c-l'),
(5872, 6, '_edit_last', '1'),
(5873, 6, '_wp_page_template', 'default'),
(5874, 6, 'sharing_disabled', '1'),
(5875, 6, '_template_layout', '2c-l'),
(5876, 16, '_edit_last', '1'),
(5877, 16, '_wp_page_template', 'default'),
(5878, 16, 'sharing_disabled', '1'),
(5879, 16, '_template_layout', '2c-l'),
(5880, 8608, 'bp_docs_last_editor', '1'),
(5881, 8608, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:6:"anyone";s:12:"view_history";s:6:"anyone";}'),
(5882, 8608, 'bp_docs_revision_count', '1'),
(5883, 8610, '_edit_lock', '1466425813:1'),
(5884, 8610, '_edit_last', '1'),
(5885, 8610, '_wp_page_template', 'page-templates/side-menu.php'),
(5886, 8610, '_template_layout', '2c-l'),
(5887, 8610, 'sharing_disabled', '1'),
(5888, 8612, '_edit_lock', '1466417731:1'),
(5889, 8612, '_edit_last', '1'),
(5890, 8613, '_edit_lock', '1466423627:1'),
(5891, 8613, '_edit_last', '1'),
(5892, 8613, '_wp_page_template', 'page-templates/side-menu.php'),
(5893, 8613, '_template_layout', '2c-l'),
(5894, 8615, '_menu_item_type', 'post_type'),
(5895, 8615, '_menu_item_menu_item_parent', '8502'),
(5896, 8615, '_menu_item_object_id', '8610'),
(5897, 8615, '_menu_item_object', 'page'),
(5898, 8615, '_menu_item_target', ''),
(5899, 8615, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5900, 8615, '_menu_item_xfn', ''),
(5901, 8615, '_menu_item_url', ''),
(5903, 8616, '_menu_item_type', 'post_type'),
(5904, 8616, '_menu_item_menu_item_parent', '8615'),
(5905, 8616, '_menu_item_object_id', '8613'),
(5906, 8616, '_menu_item_object', 'page'),
(5907, 8616, '_menu_item_target', ''),
(5908, 8616, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5909, 8616, '_menu_item_xfn', ''),
(5910, 8616, '_menu_item_url', ''),
(5912, 8617, '_menu_item_type', 'post_type'),
(5913, 8617, '_menu_item_menu_item_parent', '8615'),
(5914, 8617, '_menu_item_object_id', '8444'),
(5915, 8617, '_menu_item_object', 'page'),
(5916, 8617, '_menu_item_target', ''),
(5917, 8617, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5918, 8617, '_menu_item_xfn', ''),
(5919, 8617, '_menu_item_url', ''),
(5930, 8619, '_edit_lock', '1466436580:1'),
(5931, 8619, '_edit_last', '1'),
(5932, 8619, '_wp_page_template', 'page-templates/side-menu.php'),
(5933, 8619, '_template_layout', '2c-l'),
(5934, 8621, '_edit_lock', '1466418876:1'),
(5935, 8621, '_edit_last', '1'),
(5936, 8621, '_wp_page_template', 'page-templates/side-menu.php'),
(5937, 8621, 'sharing_disabled', '1'),
(5938, 8621, '_template_layout', '2c-l'),
(5939, 8623, '_edit_lock', '1466436797:1'),
(5940, 8623, '_edit_last', '1'),
(5941, 8623, '_wp_page_template', 'page-templates/side-menu.php'),
(5942, 8623, 'sharing_disabled', '1'),
(5943, 8623, '_template_layout', '2c-l'),
(5944, 8619, 'sharing_disabled', '1'),
(5949, 8635, '_edit_lock', '1466425797:1'),
(5950, 8635, '_edit_last', '1'),
(5951, 8635, '_wp_page_template', 'page-templates/side-menu.php'),
(5952, 8635, '_template_layout', '2c-l'),
(5953, 8635, 'sharing_disabled', '1'),
(5954, 8637, '_menu_item_type', 'post_type'),
(5955, 8637, '_menu_item_menu_item_parent', '8502'),
(5956, 8637, '_menu_item_object_id', '8635'),
(5957, 8637, '_menu_item_object', 'page'),
(5958, 8637, '_menu_item_target', ''),
(5959, 8637, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5960, 8637, '_menu_item_xfn', ''),
(5961, 8637, '_menu_item_url', ''),
(5967, 8613, 'sharing_disabled', '1'),
(5968, 8651, '_edit_lock', '1466435878:1'),
(5969, 8651, '_edit_last', '1'),
(5970, 8651, '_wp_page_template', 'page-templates/side-menu.php'),
(5971, 8651, 'sharing_disabled', '1'),
(5972, 8651, '_template_layout', '2c-l'),
(5977, 8662, '_edit_lock', '1466675526:1'),
(5978, 8662, '_edit_last', '1'),
(5979, 8662, '_wp_page_template', 'page-templates/side-menu.php'),
(5980, 8662, '_template_layout', '2c-l'),
(5981, 8662, 'sharing_disabled', '1'),
(5982, 8665, '_wp_attached_file', '2016/06/Film-96.png'),
(5983, 8665, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:19:"2016/06/Film-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5984, 8666, '_wp_attached_file', '2016/06/CD-96.png'),
(5985, 8666, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:17:"2016/06/CD-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5988, 8673, '_edit_lock', '1466435813:1'),
(5989, 8673, '_edit_last', '1'),
(5990, 8673, '_wp_page_template', 'page-templates/side-menu.php'),
(5991, 8673, 'sharing_disabled', '1'),
(5992, 8673, '_template_layout', '2c-l'),
(5997, 8677, '_wp_attached_file', '2016/06/Collaboration-96.png'),
(5998, 8677, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:28:"2016/06/Collaboration-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5999, 8680, '_wp_attached_file', '2016/06/Literature-96.png'),
(6000, 8680, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:25:"2016/06/Literature-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6001, 8682, '_wp_attached_file', '2016/06/Purchase-Order-96.png'),
(6002, 8682, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:29:"2016/06/Purchase-Order-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6003, 8684, '_wp_attached_file', '2016/06/Box-Filled-96.png'),
(6004, 8684, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:25:"2016/06/Box-Filled-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6005, 8687, '_wp_attached_file', '2016/06/Diploma-1-96.png'),
(6006, 8687, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:24:"2016/06/Diploma-1-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6007, 8690, '_wp_attached_file', '2016/06/Drama-96.png'),
(6008, 8690, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:20:"2016/06/Drama-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6009, 8691, '_wp_attached_file', '2016/06/Comedy-96.png'),
(6010, 8691, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:21:"2016/06/Comedy-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6011, 8695, '_wp_attached_file', '2016/06/Clock-96.png'),
(6012, 8695, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:20:"2016/06/Clock-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6013, 8206, '_oembed_f9230289b67abff84932d2019f89f2cd', '{{unknown}}'),
(6015, 8235, 'sharing_disabled', '1'),
(6016, 8742, '_edit_lock', '1466435899:1'),
(6017, 8742, '_edit_last', '1'),
(6018, 8742, '_wp_page_template', 'page-templates/side-menu.php'),
(6019, 8742, '_template_layout', '2c-l'),
(6022, 8745, '_edit_lock', '1466435591:1'),
(6023, 8745, '_edit_last', '1'),
(6024, 8745, '_wp_page_template', 'page-templates/side-menu.php'),
(6025, 8745, 'sharing_disabled', '1'),
(6026, 8745, '_template_layout', '2c-l'),
(6029, 8747, '_edit_lock', '1466435736:1'),
(6030, 8747, '_edit_last', '1'),
(6031, 8747, '_wp_page_template', 'page-templates/side-menu.php'),
(6032, 8747, '_template_layout', '2c-l'),
(6033, 8240, 'sharing_disabled', '1'),
(6034, 8269, 'sharing_disabled', '1'),
(6037, 8777, '_wp_attached_file', '2016/06/carnet.pdf'),
(6038, 8779, '_wp_attached_file', '2016/06/carnet_eoi.png'),
(6039, 8779, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:569;s:6:"height";i:343;s:4:"file";s:22:"2016/06/carnet_eoi.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"carnet_eoi-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"carnet_eoi-300x181.png";s:5:"width";i:300;s:6:"height";i:181;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"carnet_eoi-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"carnet_eoi-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6040, 31, '_edit_lock', '1466438196:1'),
(6041, 31, 'album_extension', '');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(6042, 31, 'picasa_album', ''),
(6043, 31, 'googlephotos_album', ''),
(6044, 8788, '_wp_attached_file', '2016/06/biblioteca-fons-nova.jpg'),
(6045, 8788, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:694;s:6:"height";i:422;s:4:"file";s:32:"2016/06/biblioteca-fons-nova.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:32:"biblioteca-fons-nova-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:32:"biblioteca-fons-nova-300x182.jpg";s:5:"width";i:300;s:6:"height";i:182;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:32:"biblioteca-fons-nova-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:32:"biblioteca-fons-nova-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"8";s:6:"credit";s:0:"";s:6:"camera";s:12:"Canon EOS 5D";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1296030280";s:9:"copyright";s:13:"(C) Nino Lara";s:12:"focal_length";s:2:"28";s:3:"iso";s:3:"640";s:13:"shutter_speed";s:4:"0.04";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6046, 8789, '_wp_attached_file', '2016/06/biblioteca-fons-antiga.jpg'),
(6047, 8789, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:694;s:6:"height";i:422;s:4:"file";s:34:"2016/06/biblioteca-fons-antiga.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"biblioteca-fons-antiga-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:34:"biblioteca-fons-antiga-300x182.jpg";s:5:"width";i:300;s:6:"height";i:182;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:34:"biblioteca-fons-antiga-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:34:"biblioteca-fons-antiga-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:3:"2.8";s:6:"credit";s:0:"";s:6:"camera";s:7:"DMC-LX2";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1257267190";s:9:"copyright";s:0:"";s:12:"focal_length";s:3:"6.3";s:3:"iso";s:3:"200";s:13:"shutter_speed";s:4:"0.04";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(6048, 8795, '_wp_attached_file', '2015/11/Calendar-96.png'),
(6049, 8795, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:96;s:4:"file";s:23:"2015/11/Calendar-96.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6050, 8800, '_edit_lock', '1466676749:1'),
(6051, 8800, '_edit_last', '1'),
(6052, 8800, '_wp_page_template', 'page-templates/side-menu.php'),
(6053, 8800, 'sharing_disabled', '1'),
(6054, 8800, '_template_layout', '2c-l'),
(6055, 8802, '_menu_item_type', 'post_type'),
(6056, 8802, '_menu_item_menu_item_parent', '8503'),
(6057, 8802, '_menu_item_object_id', '8800'),
(6058, 8802, '_menu_item_object', 'page'),
(6059, 8802, '_menu_item_target', ''),
(6060, 8802, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(6061, 8802, '_menu_item_xfn', ''),
(6062, 8802, '_menu_item_url', ''),
(6064, 8803, '_wp_attached_file', '2016/06/organigrama-1.png'),
(6065, 8803, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:687;s:6:"height";i:769;s:4:"file";s:25:"2016/06/organigrama-1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"organigrama-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"organigrama-1-268x300.png";s:5:"width";i:268;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"organigrama-1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"organigrama-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(6134, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(6135, 248, '_default_calendar_list_range_type', 'daily'),
(6136, 248, '_default_calendar_list_range_span', '7'),
(6137, 248, '_calendar_begins', 'today'),
(6138, 248, '_feed_earliest_event_date', 'months_before'),
(6139, 248, '_feed_earliest_event_date_range', '1'),
(6140, 248, '_feed_latest_event_date', 'years_after'),
(6141, 248, '_feed_latest_event_date_range', '1'),
(6142, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(6143, 248, '_default_calendar_expand_multi_day_events', 'no'),
(6144, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(6145, 248, '_google_events_max_results', '2500'),
(6146, 248, '_google_events_recurring', 'show'),
(6147, 248, '_calendar_date_format_setting', 'use_site'),
(6148, 248, '_calendar_time_format_setting', 'use_site'),
(6149, 248, '_calendar_datetime_separator', '@'),
(6150, 248, '_calendar_week_starts_on_setting', 'use_site'),
(6151, 248, '_feed_cache_user_unit', '3600'),
(6152, 248, '_feed_cache_user_amount', '1'),
(6153, 248, '_feed_cache', '3600'),
(6154, 248, '_calendar_version', '3.1.2'),
(6155, 1038, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(6156, 1038, '_default_calendar_list_range_type', 'events'),
(6157, 1038, '_default_calendar_list_range_span', '1'),
(6158, 1038, '_calendar_begins', 'today'),
(6159, 1038, '_feed_earliest_event_date', 'months_before'),
(6160, 1038, '_feed_earliest_event_date_range', '1'),
(6161, 1038, '_feed_latest_event_date', 'years_after'),
(6162, 1038, '_feed_latest_event_date_range', '1'),
(6163, 1038, '_default_calendar_event_bubble_trigger', 'hover'),
(6164, 1038, '_default_calendar_expand_multi_day_events', 'no'),
(6165, 1038, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(6166, 1038, '_google_events_max_results', '2500'),
(6167, 1038, '_google_events_recurring', 'show'),
(6168, 1038, '_calendar_date_format_setting', 'use_site'),
(6169, 1038, '_calendar_time_format_setting', 'use_site'),
(6170, 1038, '_calendar_datetime_separator', '@'),
(6171, 1038, '_calendar_week_starts_on_setting', 'use_site'),
(6172, 1038, '_feed_cache_user_unit', '60'),
(6173, 1038, '_feed_cache_user_amount', '5'),
(6174, 1038, '_feed_cache', '300'),
(6175, 1038, '_calendar_version', '3.1.2'),
(6254, 248, '_calendar_begins_nth', '1'),
(6255, 248, '_calendar_begins_custom_date', ''),
(6256, 248, '_calendar_is_static', 'no'),
(6257, 248, '_no_events_message', ''),
(6258, 248, '_event_formatting', 'preserve_linebreaks'),
(6259, 248, '_poweredby', 'no'),
(6260, 248, '_feed_timezone_setting', 'use_site'),
(6261, 248, '_feed_timezone', 'Europe/Madrid'),
(6262, 248, '_calendar_date_format', 'l, d F Y'),
(6263, 248, '_calendar_date_format_php', 'd/m/Y'),
(6264, 248, '_calendar_time_format', 'G:i a'),
(6265, 248, '_calendar_time_format_php', 'G:i'),
(6266, 248, '_calendar_week_starts_on', '0'),
(6267, 248, '_google_events_search_query', ''),
(6268, 248, '_grouped_calendars_source', 'ids'),
(6269, 248, '_grouped_calendars_ids', ''),
(6270, 248, '_grouped_calendars_category', ''),
(6271, 248, '_default_calendar_style_theme', 'light'),
(6272, 248, '_default_calendar_style_today', '#1e73be'),
(6273, 248, '_default_calendar_style_days_events', '#000000'),
(6274, 248, '_default_calendar_list_header', 'no'),
(6275, 248, '_default_calendar_compact_list', 'no'),
(6276, 248, '_default_calendar_limit_visible_events', 'no'),
(6277, 248, '_default_calendar_visible_events', '3'),
(6278, 248, '_default_calendar_trim_titles', 'no'),
(6279, 248, '_default_calendar_trim_titles_chars', '20'),
(6280, 1038, '_calendar_begins_nth', '1'),
(6281, 1038, '_calendar_begins_custom_date', ''),
(6282, 1038, '_calendar_is_static', 'no'),
(6283, 1038, '_no_events_message', ''),
(6284, 1038, '_event_formatting', 'preserve_linebreaks'),
(6285, 1038, '_poweredby', 'no'),
(6286, 1038, '_feed_timezone_setting', 'use_site'),
(6287, 1038, '_feed_timezone', 'Europe/Madrid'),
(6288, 1038, '_calendar_date_format', 'l, d F Y'),
(6289, 1038, '_calendar_date_format_php', 'd/m/Y'),
(6290, 1038, '_calendar_time_format', 'G:i a'),
(6291, 1038, '_calendar_time_format_php', 'G:i'),
(6292, 1038, '_calendar_week_starts_on', '0'),
(6293, 1038, '_google_events_search_query', ''),
(6294, 1038, '_grouped_calendars_source', 'ids'),
(6295, 1038, '_grouped_calendars_ids', ''),
(6296, 1038, '_grouped_calendars_category', ''),
(6297, 1038, '_default_calendar_style_theme', 'light'),
(6298, 1038, '_default_calendar_style_today', '#1e73be'),
(6299, 1038, '_default_calendar_style_days_events', '#000000'),
(6300, 1038, '_default_calendar_list_header', 'no'),
(6301, 1038, '_default_calendar_compact_list', 'no'),
(6302, 1038, '_default_calendar_limit_visible_events', 'no'),
(6303, 1038, '_default_calendar_visible_events', '3'),
(6304, 1038, '_default_calendar_trim_titles', 'no'),
(6305, 1038, '_default_calendar_trim_titles_chars', '20'),
(6306, 8841, 'es_template_type', 'post_notification'),
(6307, 8842, 'es_template_type', 'post_notification'),
(6308, 8843, 'es_template_type', 'Newsletter');

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
) ENGINE=InnoDB AUTO_INCREMENT=8848 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-12 14:19:30', '2017-01-12 13:19:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2016-06-20 09:38:29', '2016-06-20 08:38:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-12 10:15:01', '2014-09-12 10:15:01', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2016-06-14 13:00:00', '2016-06-14 12:00:00', '', 7, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=9', 0, 'page', '', 0),
(13, 1, '2014-09-12 11:05:02', '2014-09-12 11:05:02', 'Pàgina d''avís', 'Avís', '', 'publish', 'closed', 'closed', '', 'avis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=13', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2016-06-20 09:38:47', '2016-06-20 08:38:47', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/nodes/', 0, 'page', '', 0),
(31, 1, '2014-09-17 16:26:18', '2014-09-17 16:26:18', '', 'Biblioteca', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2016-06-20 16:58:56', '2016-06-20 15:58:56', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&#038;p=31', 0, 'slideshow', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2016-06-29 10:55:05', '2016-06-29 09:55:05', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-socials', 0, 'forum', '', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2016-06-17 13:52:40', '2016-06-17 12:52:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/dep-informatica', 0, 'forum', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2015-10-09 12:57:53', '2015-10-09 11:57:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/fotografia', 0, 'forum', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/papiroflexia', 0, 'forum', '', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2015-12-02 15:39:31', '2015-12-02 14:39:31', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(234, 1, '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 'Exemple', '', 'inherit', 'open', 'open', '', 'exemple-2', '', '', '2014-10-23 15:10:34', '2014-10-23 15:10:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/233/Exemple.docx', 0, 'attachment', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0),
(239, 1, '2014-10-23 15:44:32', '2014-10-23 15:44:32', '', 'Selecció_713', '', 'inherit', 'open', 'open', '', 'seleccio_713', '', '', '2015-12-02 15:41:08', '2015-12-02 14:41:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/238/Selecció_713.png', 0, 'attachment', 'image/png', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Agenda d''exemple', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2016-09-20 11:51:18', '2016-09-20 09:51:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(255, 1, '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-23 12:50:03', '2015-01-23 11:50:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(289, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', '', 'Mur general', '', 'publish', 'open', 'open', '', '289', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=289', 1, 'nav_menu_item', '', 0),
(318, 1, '2015-11-24 18:18:24', '2015-11-24 17:18:24', '<strong>Escola Oficial d''Idiomes XXXX\r\n</strong>Plaça de la Vila, 14\r\n01234 Abella de Xerta\r\ntel. 01234567\r\neoi-larany@xtec.cat\r\n\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.999942861018!2d2.015358215430781!3d41.54759847924985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a492f758e7181b%3A0x2782c3dc7c8cd527!2sEOI+Terrassa!5e0!3m2!1sca!2ses!4v1465399276564" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\n<strong>Com arribar-hi:\r\n</strong>\r\n<ul>\r\n	<li><b>Busos</b>: V15, 19, 27, 60, 73, 76, 85 i 173.</li>\r\n	<li><b>Metro</b>: Línia verda <strong>(L3)</strong> i línia blava <strong>(L5)</strong>  parada <strong>Vall d''Hebron </strong>(sortida av. Jordà).</li>\r\n	<li><b>Cotxe</b>: Ronda de Dalt des del Besós, sortida 4. Passeu per davant de la residència i tombeu a la dreta en arribar al semàfor al costat del metro.\r\nRonda de Dalt des del Llobregat, sortida 5. Trenqueu a l''esquerra al semàfor i passeu per davant de la residència. Gireu de nou a la dreta en arribar al semàfor del metro.</li>\r\n</ul>', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2016-06-29 10:46:18', '2016-06-29 09:46:18', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=318', 70, 'page', '', 0),
(339, 1, '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 'tartu', '', 'inherit', 'open', 'open', '', 'tartu', '', '', '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/tartu.png', 0, 'attachment', 'image/png', 0),
(352, 1, '2015-11-24 18:56:17', '2015-11-24 17:56:17', '', 'familiaescola', '', 'inherit', 'open', 'open', '', 'familiaescola', '', '', '2015-11-24 18:56:17', '2015-11-24 17:56:17', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/familiaescola.png', 0, 'attachment', 'image/png', 0),
(354, 1, '2015-11-24 22:58:37', '2015-11-24 21:58:37', '', 'eap1', '', 'inherit', 'open', 'open', '', 'eap1', '', '', '2015-11-24 22:58:37', '2015-11-24 21:58:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/eap1.png', 0, 'attachment', 'image/png', 0),
(355, 1, '2015-11-24 22:58:49', '2015-11-24 21:58:49', '', 'eap2', '', 'inherit', 'open', 'open', '', 'eap2', '', '', '2015-11-24 22:58:49', '2015-11-24 21:58:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/eap2.png', 0, 'attachment', 'image/png', 0),
(364, 1, '2015-11-25 09:25:29', '2015-11-25 08:25:29', '', 'Notícies', '', 'publish', 'closed', 'closed', '', 'noticies', '', '', '2015-11-25 09:25:29', '2015-11-25 08:25:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&amp;p=364', 0, 'slideshow', '', 0),
(372, 1, '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 'OX253EDR6R (1)', '', 'inherit', 'open', 'open', '', 'ox253edr6r-1', '', '', '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/OX253EDR6R-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(456, 1, '2015-11-25 17:36:08', '2015-11-25 16:36:08', '', 'Activitats de zona destacades', '', 'publish', 'closed', 'closed', '', 'activitats-de-zona-destacades', '', '', '2015-12-01 17:59:57', '2015-12-01 16:59:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?post_type=slideshow&#038;p=456', 0, 'slideshow', '', 0),
(467, 1, '2015-11-25 18:29:59', '2015-11-25 17:29:59', '<ul>\r\n	<li><a href="http://xtec.gencat.cat/ca/formacio/">Informació general</a></li>\r\n	<li><a href="http://xtec.gencat.cat/ca/formacio/lamevaformacio/plans_formacio_zona/">Pla de formació de zona</a></li>\r\n	<li>Formació interna\r\n<ul>\r\n	<li><a href="http://xtec.gencat.cat/ca/formacio/formaciopermanentprofessorat/fecb/fic/">Formació interna </a></li>\r\n	<li><a href="http://ateneu.xtec.cat/wikiform/wikiexport/fic/dir/index">Materials FIC (Ateneu)</a></li>\r\n</ul>\r\n</li>\r\n</ul>', 'Més informació', '', 'publish', 'closed', 'closed', '', 'mes-informacio', '', '', '2015-12-01 10:37:09', '2015-12-01 09:37:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=467', 80, 'page', '', 0),
(507, 1, '2015-11-25 23:54:06', '2015-11-25 22:54:06', '', 'modalitats 2015-16', '', 'inherit', 'open', 'open', '', 'modalitats-2015-16', '', '', '2015-11-25 23:54:06', '2015-11-25 22:54:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/modalitats-2015-16.pdf', 0, 'attachment', 'application/pdf', 0),
(541, 1, '2015-11-26 17:16:00', '2015-11-26 16:16:00', '', 'Maletes pedagògiques', '', 'publish', 'closed', 'closed', '', 'maletes-pedagogiques', '', '', '2015-11-26 17:16:00', '2015-11-26 16:16:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=541', 0, 'page', '', 0),
(588, 1, '2015-11-26 22:42:10', '2015-11-26 21:42:10', '', 'CIMG0829-300x225', '', 'inherit', 'open', 'open', '', 'cimg0829-300x225', '', '', '2015-11-26 22:42:10', '2015-11-26 21:42:10', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/CIMG0829-300x225.jpg', 0, 'attachment', 'image/jpeg', 0),
(608, 1, '2015-11-27 10:04:51', '2015-11-27 09:04:51', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignright" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="67" height="67" /></a>De dilluns a divendres\r\n<ul>\r\n	<li>Matí: de<strong> 9</strong> a <strong>14 </strong>h</li>\r\n	<li>Tarda: de<strong> 15</strong> a <strong>21</strong> h</li>\r\n</ul>\r\nHorari intensiu, de <strong>9</strong> a <strong>15</strong> h:\r\n<ul>\r\n	<li>22 de desembre</li>\r\n	<li>Del 6 de juny al 15 de juliol</li>\r\n</ul>\r\nL''escola romandrà tancat al públic, a part dels períodes de vacances escolars i dels dies de festes laborals oficials a Catalunya, els següents dies de festa local i de lliure disposició, acordats pel Consell Escolar Municipal de XXXXXX:\r\n<ul>\r\n	<li>30 d''octubre de 2015 (festa de lliure disposició) <a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/Calendar-96.png" rel="attachment wp-att-8795"><img class=" wp-image-8795 alignright" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/Calendar-96.png" alt="Calendar-96" width="64" height="64" /></a></li>\r\n	<li>7 de desembre de 2015 (festa de lliure disposició)</li>\r\n	<li>5 de febrer de 2016 (festa de lliure disposició)</li>\r\n	<li>8 de febrer de 2016 (festa de lliure disposició)</li>\r\n	<li>29 d''abril de 2016 (festa de lliure disposició)</li>\r\n	<li>16 de maig de 2016 (festa local)</li>\r\n</ul>\r\n<strong>Altres horaris <a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class=" wp-image-8695 alignright" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="69" height="69" /></a></strong>\r\n<ul>\r\n	<li>Per consultar l''horari de <strong>Secretaria</strong>, aneu <a href="https://pwc-int.educacio.intranet/agora/mastereoi/secretaria/horari/">aquí</a>.</li>\r\n	<li>Per consultar l''horari de la <strong>Biblioteca</strong>, aneu <a href="https://pwc-int.educacio.intranet/agora/mastereoi/serveis/biblioteca/">aquí</a>.</li>\r\n</ul>', 'Horari i calendari', '', 'publish', 'closed', 'closed', '', 'horari-i-calendari', '', '', '2016-06-20 17:04:42', '2016-06-20 16:04:42', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=608', 30, 'page', '', 0),
(656, 1, '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 'formador', '', 'inherit', 'open', 'open', '', 'formador', '', '', '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/formador.png', 0, 'attachment', 'image/png', 0),
(659, 1, '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 'calendari', '', 'inherit', 'open', 'open', '', 'calendari', '', '', '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 608, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/calendari.jpg', 0, 'attachment', 'image/jpeg', 0),
(768, 1, '2015-11-28 12:16:14', '2015-11-28 11:16:14', 'Node d&#039;organització interna', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu', '', '', '2015-11-28 12:16:14', '2015-11-28 11:16:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/servei-educatiu/', 0, 'forum', '', 0),
(797, 1, '2015-11-28 21:06:57', '2015-11-28 20:06:57', 'L''<strong>Escola Oficial d''Idiomes de XXXX</strong> es va inaugurar el setembre de 2003 per iniciativa del Departament d''Ensenyament de la Generalitat de Catalunya. És un centre públic, no universitari, d''ensenyament d''idiomes modern que imparteix els ensenyaments especialitzats regulats per la Llei orgànica d''educació (LOE).\r\n\r\nLes escoles oficials d''idiomes també gestionen les certificacions acadèmiques corresponents a aquests ensenyaments especialitzats. <strong>Aquestes certificacions són reconegudes arreu de l''Estat espanyol, són les úniques oficials</strong>, estan validades pel Consell d''Europa per mitjà del Marc Europeu de Referència i es poden obtenir tant en convocatòria oficial, com en convocatòria lliure.\r\n\r\n<strong>Marc legal\r\n</strong>Els ensenyaments de les EOI a Catalunya s''inscriuen en el marc legal administratiu establert en els següents documents:\r\n<ul>\r\n	<li>Llei Orgànica 2/2006, de 3 de maig, d''educació (BOE 106, de 04/05/2006)</li>\r\n	<li>Reial Decret 1629/2006, de 29 de desembre, pel qual es fixen els aspectes bàsics del currículum dels ensenyaments d’idiomes de règim especial regulades per la Llei Orgànica 2/2006, de 3 de maig.</li>\r\n	<li>Decret 4/2009, de 13 de gener, pel qual s''estableix l''ordenació i el currículum dels ensenyaments d''idiomes de règim especial per a l''àmbit de Catalunya <a href="http://www.gencat.cat/diari/5297/09009001.htm" target="_blank">cliqueu aquí per veure</a></li>\r\n</ul>\r\n<strong>Marc europeu comú</strong>\r\n\r\nEl pla d''estudis a les EOI s''estructura en tres nivells segons el nou currículum dels ensenyaments d''idiomes establert a la LOE (Llei Orgànica d’Educació 2/2006, de 3 de maig). Poden comparar-se amb els nivells descrits pel Marc Europeu de Referència publicat pel Consell d''Europa.\r\n<ul>\r\n	<li><a href="http://xtec.gencat.cat/ca/curriculum/idiomes/certificats/" target="_blank">El Marc europeu comú de referència a les EOIs de Catalunya</a></li>\r\n	<li><a href="http://www.coe.int/en/web/portfolio" target="_blank">European Language Portfolio</a></li>\r\n	<li><a href="http://www.ecml.at/mtp2/fte/pdf/C3_Epostl_E.pdf" target="_blank">Portfolio per als professors d''idiomes</a></li>\r\n	<li><a href="http://www.coe.int/t/dg4/linguistic/Manuel1_EN.asp#TopOfPage" target="_blank">Manual per a relacionar exàmens amb el Marc Comú de Referència</a></li>\r\n</ul>\r\n<strong>Més informació</strong>\r\n<ul>\r\n	<li>Apartat de les <a href="http://www.xtec.cat/eoi/escoles.html" target="_blank">Escoles oficials d''idiomes a la XTEC</a></li>\r\n</ul>', 'Presentació', '', 'publish', 'closed', 'closed', '', 'presentacio', '', '', '2016-06-29 10:41:07', '2016-06-29 09:41:07', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=797', 10, 'page', '', 0),
(806, 1, '2015-11-28 21:29:55', '2015-11-28 20:29:55', 'L''<strong>Escola Oficial d''Idiomes de XXXX</strong> es va inaugurar el setembre de 2003 per iniciativa del Departament d''Ensenyament de la Generalitat de Catalunya. És un centre públic, no universitari, d''ensenyament d''idiomes modern que imparteix els ensenyaments especialitzats regulats per la Llei orgànica d''educació (LOE).\r\n\r\nLes escoles oficials d''idiomes també gestionen les certificacions acadèmiques corresponents a aquests ensenyaments especialitzats. <strong>Aquestes certificacions són reconegudes arreu de l''Estat espanyol, són les úniques oficials</strong>, estan validades pel Consell d''Europa per mitjà del Marc Europeu de Referència i es poden obtenir tant en convocatòria oficial, com en convocatòria lliure.\r\n<ul>\r\n	<li><a href="http://www.xtec.cat/eoi/escoles.html" target="_blank">Més informació</a> sobre les escoles oficials d''idiomes de Catalunya.</li>\r\n</ul>', 'L''escola', '', 'publish', 'closed', 'closed', '', 'el-servei-educatiu', '', '', '2016-06-08 16:07:41', '2016-06-08 15:07:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=806', 0, 'page', '', 0),
(888, 1, '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon', '', '', '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(889, 1, '2015-11-29 15:07:18', '2015-11-29 14:07:18', '<strong><a href="http://alambique.grao.com/">Alambique\r\n</a></strong>Didàctica de les Ciències Experimentals. Reflexions, recursos i experiències per a l’educació primària i secundària (ESO i Batxillerat). Té com a objectiu proporcionar informació útil per a la pràctica docent i per a l’autoformació del professorat.\r\n\r\n<strong><a href="http://ambitsdepsicopedagogiaiorientacio.cat/?lang=es">Àmbits de psicopedagogia\r\n</a></strong>Psicopedagogia i educació. S’adreça a professionals de la psicologia educativa, psicopedagogs, mestres i professionals vinculats al món educatiu.\r\nArticles d''accés lliure.\r\n\r\n<strong><a href="http://articles.grao.com/">Articles\r\n</a></strong>Articles de Didàctica de la Llengua i de la Literatura. Té com a objectiu ser un instrument de formació permanent dels professionals de l’ensenyament de la llengua, un espai d’intercanvi i de coneixements, opinions, recerques i experiències.\r\n\r\n<strong><a href="http://aulainfantil.grao.com/">Aula d''infantil\r\n</a></strong>Reflexions, recursos didàctics i experiències pedagògiques d’educació infantil (primer i segon cicle)\r\n\r\n<strong><a href="http://aula.grao.com/">Aula de innovación educativa</a>\r\n</strong>Didàctica general. Reflexions, recursos didàctics i experiències pedagògiques per a l’educació primària i secundària.\r\n\r\n<strong><a href="https://www.google.es/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=1&amp;cad=rja&amp;uact=8&amp;ved=0ahUKEwic45bT_7XJAhUHVRQKHWpqCNYQFgghMAA&amp;url=http%3A%2F%2Fauladesecundaria.grao.com%2F&amp;usg=AFQjCNFrjn4VaZXCLq7IXni-9RAMCmbMwg&amp;sig2=iJUEj1rWq3Wht_RAWKwVoQ">Aula de secundaria</a>\r\n</strong>Revista bimestral dirigida especialment al professorat de l''etapa de secundària. Aporta eines de tutoria i orientació, així com reflexions i recursos de didàctica.\r\n\r\n<strong><a href="http://www.cavallfort.cat/">Cavall Fort</a>\r\n</strong>Còmics, contes, articles, reportatges, jocs, propostes d''activitats... per a lectors de 9 a 15 anys.\r\n\r\n<strong><a href="http://www.revistaclij.com/">CLIJ</a></strong>\r\nRevista d’anàlisi de la literatura infantil i juvenil. Ofereix articles d’anàlisis sobre obres, autors, generes, animació a la lectura, ressenyes de novetats o llibres premiats i un apartat sobre autors i il·lustradors relativament novells.\r\n\r\n<strong><a href="http://www.cuadernosdepedagogia.com/">Cuadernos de pedagogía</a>\r\n</strong>Revista mensual que ofereix tota l’actualitat del sector de l’ensenyament en forma d’experiències, articles d’opinió, entrevistes, reportatges, legislació, propostes innovadores i ressenyes bibliogràfiques.\r\n\r\n<strong>Educat.Revista de Psicopedagogia\r\n</strong>Publicació bimensual que s’edita amb la col·laboració de professionals afins als àmbits de la psicopedagogia, psicologia, logopèdia, educació... Conté articles d’interès actual dins l’àmbit educatiu, nous recursos per a la investigació, entrevistes a professionals o formació específica per als professors.\r\n\r\n<strong>Faristol</strong>\r\nÉs la revista del Consell Català del llibre per a Infants i Joves. Dirigida als mediadors i lectors amb la finalitat d’ajudar-los a mantenir-se informats de l’actualitat del llibre en català.\r\nArticles d''accés lliure\r\n\r\n<strong>Fòrum\r\n</strong>Revista d''organització i gestió educativa, dóna pautes per lluitar contra la cultura de la improvisació, la desorganització, la burocratització i la ignorància. Pretén minimitzar el nombre d''experiències negatives que desmotiven el professorat.\r\n\r\n<strong>Guix\r\n</strong>Des de 1997, Guix es manté fidel a la tradició educativa i donant suport a la renovació educativa pedagògica a través de la reflexió i la pràctica.\r\n\r\n<strong>Íber</strong>\r\nReflexions, recursos i experiències per a educació primària i secundària (ESO i Batxillerat).\r\n\r\n<strong>Infància\r\n</strong>Revista de l’Associació de Mestres Rosa Sensat que contribueix a difondre diverses maneres d’atendre i educar els infants, des del naixement fins als 6 anys, amb articles teòrics i pràctics.\r\n\r\n<strong>Infància a Europa\r\n</strong>L''educació de zero a sis anys en l''àmbit europeu\r\n\r\n<strong>Llengua Nacional</strong>\r\nLlengua Nacional explica i defensa els valors de la llengua catalana i impulsa el seu bon coneixement, domini i ús.\r\nArticles d''accés lliure.\r\n\r\n<strong>Logopedia, Foniatría y audiología</strong>\r\nPublica articles relacionats amb els camps de la logopèdia, la foniatria i l’audiologia\r\nAccés lliure als resums dels articles.\r\n\r\n<strong>Making Of: cuadernos de cine y educación</strong>\r\nOfereix als lectors amplia informació sobre esdeveniments relacionats amb l’aplicació del cine en les activitats d’ensenyament-aprenentatge.\r\n\r\n<strong>Nou Biaix</strong>\r\nLa revista vol ser un punt de trobada per compartir experiències, reflexions i inquietuds entre els col·lectius dels diferents nivells d’educació matemàtica a Catalunya, des de la bàsica fins a la universitat.\r\n\r\n<strong>Perspectiva escolar</strong>\r\nRevista adreçada als professionals dels sistema educatiu que s''ocupa de difondre accions educatives d''innovació i promoure reflexions sobre els reptes de l''ensenyament obligatori.\r\n\r\n<strong>Revista de Educación Especial\r\n</strong>Publicació semestral amb articles sobre l’educació especial i sobre jornades d’Educació Especial.\r\n\r\n<strong>Revista Musical Catalana</strong>\r\nEl seu objecte és el tractament de l’activitat musical catalana de música culta i popular. També publica assaigs sobre aquests temes i entrevistes als intèrprets i compositors actuals.\r\nArticles d''accés lliure.\r\n\r\n<strong>Serra d''Or\r\n</strong>Iniciada el 1959 amb l''objectiu de divulgar l''alta cultura. És una revista destacable dins l''entremat cultural dels Països Catalans.\r\n\r\n<strong>Suma</strong>\r\nRevista per a l’ensenyament i l’aprenentatge de les matemàtiques.\r\nArticles d''accés lliure\r\n\r\n<strong>Tándem: Didáctica de la educación física.</strong>\r\nRevista per al professorat d’educació física. Didàctica de l’educació física i l’esport a l’escola. Ofereix unitats didàctiques d’educació física.\r\n\r\n<strong>Textos\r\n</strong>Reflexions, recursos i experiències sobre didàctica de la llengua i la literatura per educació primària i secundària (ESO i Batxillerat)\r\n\r\n<strong>Viure en família</strong>\r\nAdreçada a pares i mares de nens i nenes de 0 a 8 anys. Té un punt de vista innovador, i para atenció a les opcions més naturals.', 'Revistes', '', 'publish', 'open', 'closed', '', 'revistes', '', '', '2015-12-02 12:32:00', '2015-12-02 11:32:00', '', 906, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=889', 0, 'page', '', 0),
(906, 1, '2015-11-29 17:08:01', '2015-11-29 16:08:01', '<ul>\r\n	<li>Catàlegs temàtics</li>\r\n	<li>Maletes pedagògiques</li>\r\n	<li>Aparells</li>\r\n	<li>Revistes</li>\r\n	<li>Mediateca</li>\r\n	<li>Recursos en línia\r\n<ul>\r\n	<li>Banc de recursos</li>\r\n	<li>Merlí (XTEC)</li>\r\n</ul>\r\n</li>\r\n</ul>', 'Recursos', '', 'publish', 'closed', 'closed', '', 'recursos', '', '', '2015-11-30 11:28:31', '2015-11-30 10:28:31', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=906', 0, 'page', '', 0),
(1027, 1, '2015-11-30 01:48:29', '2015-11-30 00:48:29', '', 'ed2', '', 'inherit', 'open', 'open', '', 'ed2', '', '', '2015-11-30 01:48:29', '2015-11-30 00:48:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/ed2.png', 0, 'attachment', 'image/png', 0),
(1032, 1, '2015-11-30 02:04:24', '2015-11-30 01:04:24', '', 'films', '', 'inherit', 'open', 'open', '', 'films-2', '', '', '2015-11-30 02:04:24', '2015-11-30 01:04:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/films1.png', 0, 'attachment', 'image/png', 0),
(1038, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari d''exemple', '', 'publish', 'closed', 'closed', '', 'se', '', '', '2016-09-20 11:51:18', '2016-09-20 09:51:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/gce_feed/institut-larany', 0, 'calendar', '', 0),
(1077, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1077', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/1077/', 3, 'nav_menu_item', '', 0),
(1078, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1078', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/1078/', 2, 'nav_menu_item', '', 0),
(1120, 1, '2015-11-30 13:18:34', '2015-11-30 12:18:34', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors', '', '', '2015-11-30 13:18:34', '2015-11-30 12:18:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/formadors/', 0, 'forum', '', 0),
(1147, 1, '2015-11-30 17:49:23', '2015-11-30 16:49:23', 'Node de coordinació dels seminaris TAC', 'TAC', '', 'publish', 'closed', 'open', '', 'tac', '', '', '2015-11-30 17:49:23', '2015-11-30 16:49:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/tac/', 0, 'forum', '', 0),
(1156, 1, '2015-11-30 18:04:03', '2015-11-30 17:04:03', 'Algun centre està fent servir Chromebooks? Què recomaneu? ', 'Chromebooks vs Notebooks', '', 'spam', 'closed', 'open', '', 'chromebooks-vs-notebooks', '', '', '2016-03-17 13:58:39', '2016-03-17 12:58:39', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/topic/chromebooks-vs-notebooks/', 0, 'topic', '', 0),
(1157, 1, '2015-11-30 18:05:19', '2015-11-30 17:05:19', 'Quin model de portàtil recomaneu? Tenim un presupost de 200 € màxim per alumne.', 'Model de portatil (ESO)', '', 'spam', 'closed', 'open', '', 'model-de-portatil-eso', '', '', '2016-03-17 13:58:29', '2016-03-17 12:58:29', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/topic/model-de-portatil-eso/', 0, 'topic', '', 0),
(1160, 1, '2015-11-30 18:16:41', '2015-11-30 17:16:41', 'En què consisteix exactament? Marc, em vas dir que vosaltres estaveu molt contents... pots explicar-nos una mica com funciona? És gratuït?', 'Google Apps per educació', '', 'publish', 'closed', 'open', '', 'google-apps-per-educacio', '', '', '2015-11-30 18:16:41', '2015-11-30 17:16:41', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/topic/google-apps-per-educacio/', 0, 'topic', '', 0),
(1161, 1, '2015-11-30 18:23:49', '2015-11-30 17:23:49', 'Especialistes d&#039;educació física: coordinació jornades esportives, jocs tradicionals (intercentres)', 'Educació física', '', 'publish', 'closed', 'open', '', 'educacio-fisica', '', '', '2015-11-30 18:23:49', '2015-11-30 17:23:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/educacio-fisica/', 0, 'forum', '', 0),
(1162, 1, '2015-11-30 18:26:44', '2015-11-30 17:26:44', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'English', '', 'publish', 'closed', 'open', '', 'english', '', '', '2015-11-30 18:26:44', '2015-11-30 17:26:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/english/', 0, 'forum', '', 0),
(1163, 1, '2015-11-30 18:28:51', '2015-11-30 17:28:51', 'Especialistes matemàtiques: coordinació Olimpíades, fires, jornades matemàtiques (intercentres)', 'Matemàtiques', '', 'publish', 'closed', 'open', '', 'matematiques', '', '', '2015-11-30 18:28:51', '2015-11-30 17:28:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/matematiques/', 0, 'forum', '', 0),
(1164, 1, '2015-11-30 18:32:30', '2015-11-30 17:32:30', 'Especialistes música: jornades de danses, cantates... (intercentres)', 'Música', '', 'publish', 'closed', 'open', '', 'musica', '', '', '2015-11-30 18:32:30', '2015-11-30 17:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/musica/', 0, 'forum', '', 0),
(1165, 1, '2015-11-30 18:34:03', '2015-11-30 17:34:03', 'Node intercentres de Caps d&#039;estudis', 'Caps d&#039;estudi', '', 'private', 'closed', 'open', '', 'caps-destudi', '', '', '2015-11-30 18:34:03', '2015-11-30 17:34:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/caps-destudi/', 0, 'forum', '', 0),
(1166, 1, '2015-11-30 18:38:06', '2015-11-30 17:38:06', 'Node intercentres de Directors de centre', 'Directors', '', 'publish', 'closed', 'open', '', 'directors', '', '', '2015-11-30 18:38:06', '2015-11-30 17:38:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/directors/', 0, 'forum', '', 0),
(1167, 1, '2015-11-30 18:40:55', '2015-11-30 17:40:55', 'Elaboració de materials, traspàs d&#039;informació...', 'Primària-secundària', '', 'private', 'closed', 'open', '', 'primaria-secundaria', '', '', '2015-11-30 18:40:55', '2015-11-30 17:40:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/primaria-secundaria/', 0, 'forum', '', 0),
(1168, 1, '2015-11-30 18:49:49', '2015-11-30 17:49:49', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes col·laboratius', '', 'publish', 'closed', 'open', '', 'contes-col%c2%b7laboratius', '', '', '2015-11-30 18:49:49', '2015-11-30 17:49:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/contes-col%c2%b7laboratius/', 0, 'forum', '', 0),
(1169, 1, '2015-11-30 18:55:35', '2015-11-30 17:55:35', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes intercentres', '', 'publish', 'closed', 'open', '', 'contes-intercentres', '', '', '2015-11-30 18:55:35', '2015-11-30 17:55:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/contes-intercentres/', 0, 'forum', '', 0),
(1170, 1, '2015-11-30 19:06:26', '2015-11-30 18:06:26', 'Necessites un domini propi però, a part d''això, no té cap cost pel centre', '', '', 'publish', 'closed', 'open', '', '1170', '', '', '2015-11-30 19:06:26', '2015-11-30 18:06:26', '', 1160, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/reply/1170/', 1, 'reply', '', 0),
(1174, 1, '2015-11-30 19:23:28', '2015-11-30 18:23:28', '', 'gforms', '', 'inherit', 'open', 'open', '', 'gforms', '', '', '2015-11-30 19:23:28', '2015-11-30 18:23:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/gforms.png', 0, 'attachment', 'image/png', 0),
(1176, 1, '2015-11-30 19:24:40', '2015-11-30 18:24:40', '', 'gforms2', '', 'inherit', 'open', 'open', '', 'gforms2', '', '', '2015-11-30 19:24:40', '2015-11-30 18:24:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/gforms2.png', 0, 'attachment', 'image/png', 0),
(1200, 1, '2015-12-01 10:00:16', '2015-12-01 09:00:16', '', 'biblioescolar', '', 'inherit', 'open', 'open', '', 'biblioescolar', '', '', '2015-12-01 10:00:16', '2015-12-01 09:00:16', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/biblioescolar.png', 0, 'attachment', 'image/png', 0),
(1224, 1, '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon-2', '', '', '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/12/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(1225, 1, '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 'SEAltPenedes', '', 'inherit', 'open', 'open', '', 'sealtpenedes', '', '', '2015-12-01 11:27:53', '2015-12-01 10:27:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/12/SEAltPenedes.jpg', 0, 'attachment', 'image/jpeg', 0),
(1242, 1, '2015-12-01 18:06:25', '2015-12-01 17:06:25', 'Node per la coordinació dels serveis educatius', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu-2', '', '', '2015-12-01 18:06:25', '2015-12-01 17:06:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/servei-educatiu-2/', 0, 'forum', '', 0),
(1255, 1, '2015-12-02 11:54:55', '2015-12-02 10:54:55', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-2', '', '', '2015-12-02 11:54:55', '2015-12-02 10:54:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/formadors-2/', 0, 'forum', '', 0),
(1256, 1, '2015-12-02 11:56:45', '2015-12-02 10:56:45', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-3', '', '', '2015-12-02 11:56:45', '2015-12-02 10:56:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/formadors-3/', 0, 'forum', '', 0),
(1257, 1, '2015-12-02 12:11:37', '2015-12-02 11:11:37', '', 'mapa', '', 'inherit', 'open', 'open', '', 'mapa', '', '', '2015-12-02 12:11:37', '2015-12-02 11:11:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/mapa.png', 0, 'attachment', 'image/png', 0),
(8079, 1, '2016-03-15 18:23:33', '2016-03-15 17:23:33', '', '1marcllenguesvives', '', 'inherit', 'open', 'open', '', '1marcllenguesvives', '', '', '2016-03-15 18:23:33', '2016-03-15 17:23:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/01/1marcllenguesvives.jpg', 0, 'attachment', 'image/jpeg', 0),
(8082, 1, '2016-03-16 10:06:35', '2016-03-16 09:06:35', '', 'curs-educació-fisica-incl.-1-1024x338', '', 'inherit', 'open', 'open', '', 'curs-educacio-fisica-incl-1-1024x338', '', '', '2016-03-16 10:06:35', '2016-03-16 09:06:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/01/curs-educació-fisica-incl.-1-1024x338.jpg', 0, 'attachment', 'image/jpeg', 0),
(8086, 1, '2016-03-16 10:08:04', '2016-03-16 09:08:04', '', 'trobadainfantil', '', 'inherit', 'open', 'open', '', 'trobadainfantil', '', '', '2016-03-16 10:08:04', '2016-03-16 09:08:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/06/trobadainfantil.png', 0, 'attachment', 'image/png', 0),
(8100, 1, '2016-03-16 17:28:46', '2016-03-16 16:28:46', 'En aquesta intranet trobareu grups (nodes) temàtics on compartir les vostres experiències, resoldre dubtes i fer xarxa amb altres docents de la vostra zona.\r\n\r\n<span class="dashicons dashicons-admin-network"></span><a href="activitat">Entra a la Intranet</a>\r\n\r\n&nbsp;', 'Intranet_', '', 'publish', 'closed', 'closed', '', 'intranet', '', '', '2016-03-17 13:50:42', '2016-03-17 12:50:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8100', 50, 'page', '', 0),
(8111, 1, '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8111', 0, 'page', '', 0),
(8113, 1, '2016-03-29 12:37:06', '2016-03-29 11:37:06', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:51:15', '2016-03-29 11:51:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8113', 0, 'page', '', 0),
(8115, 1, '2016-06-07 12:30:15', '2016-06-07 11:30:15', '', 'eoi', '', 'inherit', 'open', 'closed', '', 'eoi', '', '', '2016-06-07 12:30:15', '2016-06-07 11:30:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/eoi.png', 0, 'attachment', 'image/png', 0),
(8116, 1, '2016-06-07 12:39:37', '2016-06-07 11:39:37', '', 'crp', '', 'inherit', 'open', 'closed', '', 'crp', '', '', '2016-06-07 12:39:37', '2016-06-07 11:39:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/crp.png', 0, 'attachment', 'image/png', 0),
(8125, 1, '2016-06-07 15:29:18', '2016-06-07 14:29:18', '', 'eoi_badalona', '', 'inherit', 'open', 'closed', '', 'eoi_badalona', '', '', '2016-06-07 15:29:18', '2016-06-07 14:29:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/eoi_badalona.png', 0, 'attachment', 'image/png', 0),
(8126, 1, '2016-06-07 15:47:26', '2016-06-07 14:47:26', '', 'france', '', 'inherit', 'open', 'closed', '', 'france', '', '', '2016-06-07 15:47:26', '2016-06-07 14:47:26', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/france.jpg', 0, 'attachment', 'image/jpeg', 0),
(8127, 1, '2016-06-07 15:47:40', '2016-06-07 14:47:40', '', 'friends_travel', '', 'inherit', 'open', 'closed', '', 'friends_travel', '', '', '2016-06-07 15:47:40', '2016-06-07 14:47:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/friends_travel.jpg', 0, 'attachment', 'image/jpeg', 0),
(8128, 1, '2016-06-07 15:51:54', '2016-06-07 14:51:54', '', 'talk', '', 'inherit', 'open', 'closed', '', 'talk', '', '', '2016-06-07 15:51:54', '2016-06-07 14:51:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/talk.jpg', 0, 'attachment', 'image/jpeg', 0),
(8129, 1, '2016-06-07 16:01:52', '2016-06-07 15:01:52', '', 'Startup Stock Photos', 'Startup Stock Photos', 'inherit', 'open', 'closed', '', 'startup-stock-photos', '', '', '2016-06-07 16:01:52', '2016-06-07 15:01:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/talk2.jpg', 0, 'attachment', 'image/jpeg', 0),
(8130, 1, '2016-06-07 16:06:01', '2016-06-07 15:06:01', '', 'Startup Stock Photos', 'Startup Stock Photos', 'inherit', 'open', 'closed', '', 'startup-stock-photos-2', '', '', '2016-06-07 16:06:01', '2016-06-07 15:06:01', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/talk3.jpg', 0, 'attachment', 'image/jpeg', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8141, 1, '2016-06-08 16:27:54', '2016-06-08 15:27:54', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/organigrama-1.png" rel="attachment wp-att-8803"><img class="alignnone size-full wp-image-8803" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/organigrama-1.png" alt="organigrama" width="687" height="769" /></a>', 'Organigrama', '', 'publish', 'closed', 'closed', '', 'organigrama', '', '', '2016-06-23 11:22:13', '2016-06-23 10:22:13', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8141', 30, 'page', '', 0),
(8149, 1, '2016-06-08 16:41:43', '2016-06-08 15:41:43', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget gravida nisi. Vivamus semper lacinia felis, in fermentum est porta sit amet. Morbi tincidunt, nisl ut aliquam sodales, tortor orci faucibus nibh, sed laoreet ante felis sed est. Quisque elementum turpis eu euismod consectetur. Aliquam ullamcorper dolor vel pellentesque porttitor. Morbi sagittis tristique hendrerit. Aliquam mattis risus sed interdum aliquet. Suspendisse volutpat tincidunt quam ac imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nIn quis aliquet ipsum. Ut pulvinar sit amet elit ac cursus. Duis consequat tortor eu tortor pellentesque bibendum. Sed volutpat laoreet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris imperdiet nisi felis, et molestie justo pharetra in. Fusce id est vel nulla volutpat blandit id in lacus. Donec finibus mollis rhoncus. Vivamus lacinia volutpat nulla, ac dignissim dolor. Morbi volutpat, neque ut tincidunt eleifend, ipsum ligula molestie leo, facilisis molestie purus dui nec tortor. Phasellus eu varius urna. Donec maximus fringilla malesuada. Quisque rhoncus lorem enim, eget scelerisque diam dignissim sed.', 'Cursos', '', 'publish', 'closed', 'closed', '', 'cursos', '', '', '2016-06-15 09:31:53', '2016-06-15 08:31:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8149', 0, 'page', '', 0),
(8151, 1, '2016-06-08 16:42:13', '2016-06-08 15:42:13', '<strong>DURADA DEL CURS</strong>\r\n\r\nEn aquesta EOI s''imparteixen els idiomes d''<strong>alemany,</strong> <strong>anglès</strong> i<strong> francès</strong>.\r\n\r\nModalitat d''horari: curs extensiu\r\n\r\n<strong>La matrícula oficial</strong> dóna dret a assistir com a mínim a <strong>150 hores de classe</strong> per curs i als exàmens corresponents.\r\n\r\nL''EOI XXXXX imparteix <strong>el curs oficial extensiu en horari altern</strong>, classes de dues hores en dies alterns (dilluns i dimecres o dimarts i dijous).\r\n<ul>\r\n	<li><strong>GRUPS A: </strong>dilluns i dimecres</li>\r\n	<li><strong>GRUPS B:</strong> dimarts i dijous</li>\r\n</ul>\r\n<strong>HORARI DE CLASSE</strong>\r\n\r\nTotes les classes es fan en horari de tarda-vespre.\r\nLa franja horària de classe és de 16.15 a 21.15 hores.\r\nLa tria de l’horari de classe es fa en el moment de formalitzar la matrícula, segons el torn d’horari establert en el sorteig.\r\n\r\n<strong>PROGRAMA D''ESTUDIS</strong>\r\n\r\nLa LOE (Llei Orgànica d’Educació 2/2006, de 3 de maig) estableix una nova ordenació del programa d’estudis de les escoles oficials d’idiomes, que queda dividit en tres nivells, que corresponen als nivells definits en el MECR (Marc europeu comú de referència per a les llengües).\r\n\r\nEls ensenyaments especialitzats d''idiomes s''imparteixen en 6 cursos:\r\n<ul>\r\n	<li><strong>Nivell Bàsic:</strong> de 2 cursos (1r i 2n nivell)</li>\r\n	<li><strong>Nivell Intermedi</strong><strong>:</strong> d''1 curs (3r nivell)</li>\r\n	<li><strong>Nivell Avançat</strong><strong>:</strong> de 2 cursos (4t i 5è nivell)</li>\r\n	<li><strong>Nivell C1:</strong> d''1 curs</li>\r\n</ul>\r\n<table border="1" cellspacing="1" cellpadding="1">\r\n<tbody>\r\n<tr>\r\n<td><strong>CURSOS</strong></td>\r\n<td><strong>NIVELL</strong></td>\r\n<td><strong>EQUIVALÈNCIA MECR</strong></td>\r\n</tr>\r\n<tr>\r\n<td>1r</td>\r\n<td rowspan="2">NIVELL BÀSIC</td>\r\n<td>A1</td>\r\n</tr>\r\n<tr>\r\n<td>2n</td>\r\n<td>A2</td>\r\n</tr>\r\n<tr>\r\n<td>3r</td>\r\n<td>NIVELL INTERMEDI</td>\r\n<td>B1</td>\r\n</tr>\r\n<tr>\r\n<td>4t</td>\r\n<td rowspan="2">NIVELL AVANÇAT</td>\r\n<td colspan="1" rowspan="2">B2</td>\r\n</tr>\r\n<tr>\r\n<td>5è</td>\r\n</tr>\r\n<tr>\r\n<td>C1</td>\r\n<td>C1</td>\r\n<td>C1</td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\nEls nivells dels dos certificats d''escola oficial d''idiomes poden comparar-se als nivells descrits en els documents publicats pel Consell d''Europa, en especial el Marc europeu de referència. Al final del nivell intermedi i del nivell avançat els alumnes han de superar una prova de certificat, dissenyada des del Centre de Recursos de Llengües Estrangeres del Departament d''Ensenyament de la Generalitat (Àrea de Certificacions), amb uns criteris unificats per a tota Catalunya.\r\n\r\nEls alumnes que obtenen al certificat de <strong>nivell intermedi</strong> es poden considerar dins la franja B1 del Consell d''Europa - usuari independent.\r\n\r\nEls alumnes que obtenen al certificat de <strong>nivell avançat</strong> es poden situar dins la part alta de la franja B2 del Consell d''Europa, el nivell considerat avançat dins de la definició d''usuari independent.\r\n\r\n<strong>PLA D''ESTUDIS</strong>\r\n\r\nEl pla d''estudis de les EOI desenvolupa la finalitat dels ensenyaments d''idiomes que s''hi imparteixen, que és la capacitat de l''alumnat en l''ús efectiu de l''idioma com a vehicle de comunicació general.\r\n\r\nPer assolir aquesta finalitat, a les EOI es treballa per tal que l''alumnat:\r\n<ul>\r\n	<li>Adquireixi les habilitats bàsiques receptives i productives, tant del llenguatge oral com de l''escrit;</li>\r\n	<li>Desenvolupi estratègies comunicatives en diferents àrees de comunicació;</li>\r\n	<li>Desenvolupi estratègies per a l''aprenentatge autònom i continu de llengües, que puguin facilitar l''ús de l''idioma en l''exercici d''activitats professionals i en altres àmbits de la cultura o d''interès personal;</li>\r\n	<li>Desenvolupi actituds positives envers la diversitat lingüística i el pluralisme cultural del món actual.</li>\r\n</ul>\r\n<strong>CURSOS I GRUPS PER IDIOMA I NIVELL</strong>\r\n\r\nCursos i grups per idioma i nivell - curs 2015-2016\r\n<table border="1" cellspacing="1" cellpadding="1">\r\n<tbody>\r\n<tr>\r\n<td></td>\r\n<td colspan="2"><strong>NIVELL BÀSIC</strong></td>\r\n<td><strong>NIVELL INTERMEDI</strong></td>\r\n<td colspan="2"><strong>NIVELL AVANÇAT</strong></td>\r\n<td><strong>C1</strong></td>\r\n</tr>\r\n<tr>\r\n<td><strong>CURSOS</strong></td>\r\n<td><strong>1r</strong></td>\r\n<td><strong>2n</strong></td>\r\n<td><strong>3r</strong></td>\r\n<td><strong>4t</strong></td>\r\n<td><strong>5è</strong></td>\r\n<td><strong>C1</strong></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Idioma</strong></td>\r\n<td colspan="6"><strong>Grups per nivells</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Alemany</td>\r\n<td>2</td>\r\n<td>1</td>\r\n<td>1</td>\r\n<td>-</td>\r\n<td>-</td>\r\n<td>-</td>\r\n</tr>\r\n<tr>\r\n<td>Anglès</td>\r\n<td>1</td>\r\n<td>2</td>\r\n<td>4</td>\r\n<td>2</td>\r\n<td>2</td>\r\n<td>1</td>\r\n</tr>\r\n<tr>\r\n<td>Francès</td>\r\n<td>2</td>\r\n<td>2</td>\r\n<td>2</td>\r\n<td>1</td>\r\n<td>1</td>\r\n<td>-</td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Cursos Oficials', '', 'publish', 'closed', 'closed', '', 'cursos-oficials', '', '', '2016-06-29 10:29:41', '2016-06-29 09:29:41', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8151', 10, 'page', '', 0),
(8153, 1, '2016-06-08 16:43:37', '2016-06-08 15:43:37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus erat lacus, at convallis ante pulvinar placerat.\r\n\r\n[slideshow_deploy id=''148'']\r\n\r\nPraesent scelerisque vulputate efficitur. Duis quis mauris sem. Morbi ut imperdiet metus. Vestibulum vestibulum massa elit, vel tempus nulla ullamcorper vitae. Phasellus congue, dolor quis tincidunt rhoncus, odio turpis elementum tellus, ac pellentesque sapien arcu ac eros. Aenean lobortis arcu est, in dictum libero consequat ac. Donec vitae enim eu ipsum finibus efficitur. Etiam vulputate eget ligula et imperdiet. Donec felis ante, pharetra eu elit id, auctor efficitur lectus.', 'Cursos intensius d''estiu', '', 'publish', 'closed', 'closed', '', 'cursos-intensius-destiu', '', '', '2016-06-17 13:52:20', '2016-06-17 12:52:20', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8153', 20, 'page', '', 0),
(8156, 1, '2016-06-08 16:45:58', '2016-06-08 15:45:58', ' ', '', '', 'publish', 'closed', 'closed', '', '8156', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8156', 12, 'nav_menu_item', '', 0),
(8157, 1, '2016-06-08 16:45:58', '2016-06-08 15:45:58', '', 'Cursos intensius d''estiu', '', 'publish', 'closed', 'closed', '', 'cursos-intensius-destiu', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8157', 13, 'nav_menu_item', '', 0),
(8158, 1, '2016-06-08 16:47:01', '2016-06-08 15:47:01', '<strong>CURSOS MONOGRÀFICS</strong>\r\n\r\nEs consideren cursos monogràfics els cursos de llengua d''especialitat (negocis, llenguatge jurídic, mèdic...), d''aprofundiment en el coneixement de la realitat sociocultural dels països on es parla la llengua objecte d''estudi (literatura, història, civilització, costums, institucions....), o bé de treball d''actualització lingüística o de treball específic per destreses.\r\n\r\n<strong>CURS DE LLENGUA INSTRUMENTAL</strong>\r\n\r\nEls cursos d''actualització i perfeccionament de llengua instrumental estan adreçats a qualsevol persona, des de primer fins a cinquè curs d''escola oficial d''idiomes.\r\n\r\nSón cursos intensius o bé extensius impartits al llarg de l''any o bé a l''estiu amb una durada mínima de 30 hores i màxima de 90 hores.', 'Cursos especials', '', 'publish', 'closed', 'closed', '', 'cursos-especials', '', '', '2016-06-16 16:55:15', '2016-06-16 15:55:15', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8158', 30, 'page', '', 0),
(8161, 1, '2016-06-08 16:52:40', '2016-06-08 15:52:40', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget gravida nisi. Vivamus semper lacinia felis, in fermentum est porta sit amet. Morbi tincidunt, nisl ut aliquam sodales, tortor orci faucibus nibh, sed laoreet ante felis sed est. Quisque elementum turpis eu euismod consectetur. Aliquam ullamcorper dolor vel pellentesque porttitor. Morbi sagittis tristique hendrerit. Aliquam mattis risus sed interdum aliquet. Suspendisse volutpat tincidunt quam ac imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nIn quis aliquet ipsum. Ut pulvinar sit amet elit ac cursus. Duis consequat tortor eu tortor pellentesque bibendum. Sed volutpat laoreet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris imperdiet nisi felis, et molestie justo pharetra in. Fusce id est vel nulla volutpat blandit id in lacus. Donec finibus mollis rhoncus. Vivamus lacinia volutpat nulla, ac dignissim dolor. Morbi volutpat, neque ut tincidunt eleifend, ipsum ligula molestie leo, facilisis molestie purus dui nec tortor. Phasellus eu varius urna. Donec maximus fringilla malesuada. Quisque rhoncus lorem enim, eget scelerisque diam dignissim sed.\r\n\r\n&nbsp;\r\n\r\n<strong>TAXES </strong>(segons Ordre ENS/100/2015)\r\n<ul>\r\n	<li>Matrícula oficial: 275 € taxa oficial + 30 euros taxa de serveis d’escola (*)</li>\r\n	<li>Matrícula oficial de repetidors (1a vegada): 357,50 € taxa oficial + 30 euros taxa de serveis d’escola (*)</li>\r\n	<li>Matrícula oficial de repetidors (2a vegada): <strong>495 €</strong>  taxa oficial + 30 euros taxa de serveis d’escola (*)</li>\r\n</ul>\r\n<strong>Alumnat lliure</strong>\r\n<ul>\r\n	<li>Matrícula i drets d''examen del certificat de nivell intermedi: 72,45 euros.</li>\r\n	<li>Matrícula i drets d''examen del certificat de nivell avançat: 89,25 euros.</li>\r\n	<li>Matrícula i drets d''examen del certificat de nivell C1: 100 euros.</li>\r\n</ul>\r\n<strong>Bonificacions i exempcions</strong> (prèvia acreditació documental)\r\n<ul>\r\n	<li>Bonificació del 50 % de l’import:\r\n<ul>\r\n	<li>​per als membres de família nombrosa de categoria general</li>\r\n	<li>per als membres de famílies monoparentals de categoria general i especial</li>\r\n</ul>\r\n</li>\r\n	<li>​Exempció del 100% de l''import:\r\n<ul>\r\n	<li>​per als membres de família nombrosa de categoria especial</li>\r\n	<li>per a les víctimes de terrorisme (i els seus cònjuges i els seus fills)</li>\r\n	<li>per a les persones amb dicapacitat igual o superior al 33%</li>\r\n</ul>\r\n</li>\r\n</ul>\r\nTambé queden exclosos del pagament de les taxes acadèmiques els alumnes inclosos en el pla de reserves de places per a professorat.\r\n\r\n&nbsp;\r\n\r\n(*) La taxa complementària per serveis d''escola de 30 euros és aprovada per la Junta de Directors de les EOI i autoritzada pel Departament d’Ensenyament.\r\n\r\nAquesta quota, que complementa l’assignació que la Generalitat dóna als centres per a manteniment i funcionament bàsic, possibilita el nivell de prestacions que el centre ofereix i el manteniment i millora de les instal·lacions i recursos pedagògics i tecnològics del centre.\r\n\r\nEls alumnes que es matriculen a més d''un idioma, fan una sola aportació de serveis d''escola.\r\n\r\n&nbsp;', 'Matrícula', '', 'publish', 'closed', 'closed', '', 'matricula', '', '', '2016-06-15 13:06:34', '2016-06-15 12:06:34', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8161', 20, 'page', '', 0),
(8164, 1, '2016-06-08 17:00:04', '2016-06-08 16:00:04', 'Es considera un alumne "antic" a qualsevol persona matriculada en un curs oficial d’un idioma en aquesta escola l’any acadèmic immediatament anterior.\r\n\r\n<strong>Normes i procediment abreujat</strong>\r\n<ol>\r\n	<li>Hi ha una <a href="https://www.eoidigital.com/preinscripcio/alumnes/index.php" target="_blank">preinscripció obligatòria</a> (el candidat o candidata es pot preinscriure de 1r o d’un nivell superior).</li>\r\n	<li>Per accedir a un curs superior a 1r cal:\r\n<ul>\r\n	<li>preinscriure’s a test de nivell (el nombre de places per fer el test de nivell és limitat i s’hi accedeix per un sorteig previ).</li>\r\n</ul>\r\n<ul>\r\n	<li>o preinscriure''s a un nivell determinat perquè\r\n<ul>\r\n	<li>es té un curs o certificat d’una EOI aprovat</li>\r\n	<li>es té una equivalència reconeguda a la taula que es publica abans de la matrícula. <a href="http://portaldogc.gencat.cat/utilsEADOP/PDF/6883/1428103.pdf" target="_blank">Veure enllaç aquí</a> (pàgina 4).</li>\r\n	<li>es té el títol de batxillerat (només per a la llengua que s’hagi cursat com a 1a llengua estrangera), que habilita per accedir a 3r curs.</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n</li>\r\n	<li>L’ordre de matrícula ve determinat per un sorteig d’adjudicació de places.</li>\r\n</ol>\r\nNo està permès matricular-se com a alumnat oficial i lliure del mateix idioma, dintre del mateix any acadèmic.\r\n\r\nEls candidats s’han de matricular en un horari que els vagi bé, ja que els canvis d’horari només s’acceptaran, segons la disponibilitat de places, en casos especials i justificats documentalment, per un canvi de circumstàncies vitals posteriors a la data de matrícula.\r\n\r\n<strong>Taxes</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus massa et orci congue efficitur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc egestas mi ac lectus tincidunt, eu rhoncus orci elementum. Pellentesque finibus ipsum vel est vestibulum pulvinar. Pellentesque maximus est in nunc rutrum tincidunt. Vivamus hendrerit lacus non eros dignissim sollicitudin ac egestas lacus. Etiam facilisis, justo eget laoreet dictum, turpis justo vehicula neque, a dictum neque est ut urna. Fusce ac lorem suscipit nisi commodo rhoncus at nec lacus. Nulla imperdiet, diam ut fringilla tempor, leo risus ornare erat, ut rutrum leo mauris eu sapien. In venenatis eget massa a rutrum. Aenean facilisis laoreet faucibus.', 'Antics alumnes', '', 'publish', 'closed', 'closed', '', 'alumnes-antics', '', '', '2016-06-29 10:31:40', '2016-06-29 09:31:40', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8164', 10, 'page', '', 0),
(8166, 1, '2016-06-08 17:01:17', '2016-06-08 16:01:17', 'Qualsevol persona no matriculada en un curs oficial d’un idioma en aquesta escola l’any acadèmic immediatament anterior es considera nou alumnat d’aquell idioma.\r\n\r\n<span class="arial text12 gris3"><b>PREINSCRIPCIÓ\r\n</b></span>\r\n\r\nLa preinscripció és un tràmit obligatori per entrar com alumne/a nou/va a l''EOI XXXX. Es fa telemàticament a través del web: <a href="http://www.eoidigital.com/preinscripcio/alumnes/" target="_blank">http://www.eoidigital.com/preinscripcio/alumnes/</a> o presencialment els dies indicats.\r\n<div class="editora">\r\n\r\nEs considera alumnat nou:\r\n<ul>\r\n	<li>Aquells que accedeixen per primera vegada a l’EOI XXXX.</li>\r\n	<li>Els que comencen un altre idioma.</li>\r\n	<li>Els que han perdut l’oficialitat.</li>\r\n	<li>Els que provenen d’una altra EOI.</li>\r\n	<li>Alumnes lliures que volen ser oficials.</li>\r\n</ul>\r\nLa preinscripció pot ser a:\r\n<ul>\r\n	<li><strong>Primer:</strong> Si NO es tenen coneixements de l’idioma o es vol començar des de zero.</li>\r\n	<li><strong>Test de nivell:</strong> Si es tenen coneixements de l’idioma i es vol començar des d’un nivell superior a 1r i NO es disposa d’un CERTIFICAT de l’idioma segons la taula d’exempcions. En aquest cas s’haurà de venir el dia assenyalat a fer el test de nivell.</li>\r\n	<li><strong>2n, 3r, 4t, 5è o C1:</strong> NOMÉS si té aprovat el curs anterior en qualsevol EOI o si té un CERTIFICAT de l’idioma segons la taula d’exempcions. En aquest cas en el moment de fer la matrícula presencial ha de portar una fotocòpia del certificat.</li>\r\n</ul>\r\nLa preinscripció es pot fer:\r\n<ul>\r\n	<li>Per <a href="http://www.eoidigital.com/preinscripcio/alumnes/" target="_blank">via telemàtica</a> del <strong>1 al 4 de setembre</strong> de 2015, ambdós inclosos.</li>\r\n	<li>De manera presencial (en cas de no disposar d''Internet) a l''EOI el dia <strong>4 de setembre </strong>de 2015 de 10:00 a 13:00h. L''alumnat de C1 no té aquesta opció.</li>\r\n</ul>\r\n<b>Proves de nivell</b>\r\n\r\n</div>\r\n<a class="enllas" href="http://www.eoiolot.cat/pdf/pdf_matricula_12.pdf" target="_blank">Taula d''exempcions 15-16 del test de nivell</a>\r\n<div class="editora">\r\n<ol>\r\n	<li>El test de nivell només té valor per a la formalització de la matrícula i validesa per a un any acadèmic</li>\r\n	<li>Una vegada feta la preinscripció cal consultar al web el dia i hora que es realitzarà la prova</li>\r\n	<li><strong>El dia 7 de setembre 2015 </strong>s''haurà de consultar a l''aplicatiu de preinscripció (accedint amb les dades de l''alumne) si ha estat admès per a fer el test de nivell i en cas afirmatiu consultar quin dia i quina hora es fa el test a l''Escola (consulta document adjunt). Es fa sorteig en el cas que el nombre de preinscrits sigui superior al nombre de places</li>\r\n	<li>La NO presentació al test de nivell suposa l''anul·lació de la preinscripció</li>\r\n	<li>El test de nivell consisteix en una prova escrita i oral</li>\r\n	<li><strong>El dia 17 de setembre 2015 </strong>es publicaran a l''aplicatiu de preinscripció (accedint amb les dades de l''alumne) els resultats del test de nivell i si ha obtingut plaça</li>\r\n</ol>\r\n</div>\r\n<div class="separacio10"></div>\r\n<span class="arial text12 gris3"><b>MATRÍCULA</b></span>\r\n\r\nEl dia 17 de setembre de 2015 es publicarà al web:\r\n<div class="editora">\r\n<ul>\r\n	<li>El resultat del test de nivell (accedint a l''aplicatiu de preinscripció amb les dades de l''alumne o consultant els llistats a la cartellera de l''EOI)</li>\r\n	<li>El resultat del sorteig de places (accedint a l''aplicatiu de preinscripció amb les dades de l''alumne o consultant els llistats a la cartellera de l''EOI)</li>\r\n</ul>\r\nLa matrícula és presencial a l''EOI XXXX seguint l''ordre segons el núm. de sorteig realitzat. Cal consultar els dies i l''horari de matriculació. La documentació per poder realitzar la matrícula és la següent:\r\n<ul>\r\n	<li>DNI, NIE o passaport, original i fotocòpia</li>\r\n	<li>Imprès de matrícula que us lliuraran a la consergeria o que podeu descarregar <a href="#" target="_blank">aquí</a>.</li>\r\n	<li>Resguard de preinscripció</li>\r\n	<li>Carnet de família nombrosa, família monoparental o minusvalidesa =&lt;33% en vigència, original i fotocòpia (si escau)</li>\r\n	<li>Documentació acreditativa del nivell en cas que la vostra preinscripció fos a 2n, 3r, 4t o 5è (si escau)</li>\r\n</ul>\r\n<strong>TAXES</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus massa et orci congue efficitur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc egestas mi ac lectus tincidunt, eu rhoncus orci elementum.\r\n\r\n</div>', 'Nous alumnes', '', 'publish', 'closed', 'closed', '', 'alumnes-nous', '', '', '2016-06-29 10:32:39', '2016-06-29 09:32:39', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8166', 20, 'page', '', 0),
(8168, 1, '2016-06-08 17:05:08', '2016-06-08 16:05:08', 'El Pla d’Impuls de l’anglès és un pla del Departament Ensenyament per fomentar el coneixement de l’anglès entre el professorat de primària i secundària en actiu.\r\n\r\n<a href="http://xtec.gencat.cat/ca/formacio/formaciogeneralprofessorat/llengues/accions_llengues_estrangeres_curriculars/reserva-places-eoi/" target="_blank">Més informació a la XTEC</a>', 'Professorat (Pla d’Impuls)', '', 'publish', 'closed', 'closed', '', 'pla-dimpuls-de-langles-professorat', '', '', '2016-06-29 10:34:39', '2016-06-29 09:34:39', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8168', 30, 'page', '', 0),
(8170, 1, '2016-06-08 17:06:12', '2016-06-08 16:06:12', 'El Departament d''Ensenyament organitza la convocatòria extraordinària de les proves per obtenir els certificats d''anglès següents:\r\n<ul>\r\n	<li><strong>Nivell intermedi.</strong> Corresponent al nivell B1 del Marc europeu comú de referència per a les llengües (MECR)</li>\r\n	<li><strong>Nivell avançat.</strong> Corresponent al nivell B2 del MECR</li>\r\n	<li><strong>Nivell C1</strong>. Corresponent al nivell C1 del MECR</li>\r\n</ul>\r\nPodeu trobar tota la informació necessària a la <a href="http://ensenyament.gencat.cat/ca/serveis-tramits/proves/proves-lliures-obtencio-titols/convocat-extraord-idiomes/" target="_blank">XTEC</a>', 'Candidats lliures', '', 'publish', 'closed', 'closed', '', 'candidats-lliures', '', '', '2016-06-29 10:34:20', '2016-06-29 09:34:20', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8170', 40, 'page', '', 0),
(8174, 1, '2016-06-09 13:56:41', '2016-06-09 12:56:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8174', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8174', 25, 'nav_menu_item', '', 0),
(8175, 1, '2016-06-09 13:56:41', '2016-06-09 12:56:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8175', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8175', 26, 'nav_menu_item', '', 0),
(8176, 1, '2016-06-09 13:56:41', '2016-06-09 12:56:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8176', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8176', 27, 'nav_menu_item', '', 0),
(8177, 1, '2016-06-09 13:56:41', '2016-06-09 12:56:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8177', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8177', 28, 'nav_menu_item', '', 0),
(8178, 1, '2016-06-09 13:56:41', '2016-06-09 12:56:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8178', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8178', 29, 'nav_menu_item', '', 0),
(8179, 1, '2016-06-09 13:57:22', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-09 13:57:22', '0000-00-00 00:00:00', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8179', 1, 'nav_menu_item', '', 0),
(8180, 1, '2016-06-09 14:00:16', '2016-06-09 13:00:16', ' ', '', '', 'publish', 'closed', 'closed', '', '8180', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8180', 14, 'nav_menu_item', '', 0),
(8181, 1, '2016-06-09 14:00:16', '2016-06-09 13:00:16', ' ', '', '', 'publish', 'closed', 'closed', '', '8181', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8181', 2, 'nav_menu_item', '', 0),
(8182, 1, '2016-06-09 14:00:16', '2016-06-09 13:00:16', ' ', '', '', 'publish', 'closed', 'closed', '', '8182', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8182', 3, 'nav_menu_item', '', 0),
(8183, 1, '2016-06-09 14:00:16', '2016-06-09 13:00:16', ' ', '', '', 'publish', 'closed', 'closed', '', '8183', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8183', 4, 'nav_menu_item', '', 0),
(8184, 1, '2016-06-09 14:00:16', '2016-06-09 13:00:16', ' ', '', '', 'publish', 'closed', 'closed', '', '8184', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8184', 10, 'nav_menu_item', '', 0),
(8185, 1, '2016-06-09 14:29:49', '2016-06-09 13:29:49', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/German-Hat-96.png" rel="attachment wp-att-8391"><img class="size-full wp-image-8391 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/German-Hat-96.png" alt="German Hat-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Alemany', '', 'publish', 'closed', 'closed', '', 'alemany', '', '', '2016-06-14 12:28:55', '2016-06-14 11:28:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8185', 10, 'page', '', 0),
(8189, 1, '2016-06-09 14:31:19', '2016-06-09 13:31:19', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/Big-Ben-96.png" rel="attachment wp-att-8396"><img class="size-full wp-image-8396 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/Big-Ben-96.png" alt="Big Ben-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non sagittis felis. Integer sit amet nisl porta, malesuada magna ut, vehicula tellus. In hac habitasse platea dictumst. Maecenas diam mauris, ornare nec gravida eu, imperdiet id neque. Sed et dui vel lectus finibus fringilla. Sed porta cursus est et faucibus. Morbi dapibus turpis ligula, a venenatis odio facilisis vitae. Phasellus ultricies diam ultricies ultrices sollicitudin. Suspendisse potenti. Morbi malesuada mattis dignissim. Aliquam erat volutpat. Sed ullamcorper ullamcorper vehicula. Donec at est convallis, semper odio sed, condimentum libero.', 'Anglès', '', 'publish', 'closed', 'closed', '', 'angles', '', '', '2016-06-14 13:01:55', '2016-06-14 12:01:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8189', 20, 'page', '', 0),
(8193, 1, '2016-06-09 14:33:15', '2016-06-09 13:33:15', ' ', '', '', 'publish', 'closed', 'closed', '', '8193', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8193', 17, 'nav_menu_item', '', 0),
(8194, 1, '2016-06-09 14:33:15', '2016-06-09 13:33:15', ' ', '', '', 'publish', 'closed', 'closed', '', '8194', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8194', 18, 'nav_menu_item', '', 0),
(8195, 1, '2016-06-09 14:35:19', '2016-06-09 13:35:19', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Eiffel-Tower-96-1.png" rel="attachment wp-att-8404"><img class="size-full wp-image-8404 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Eiffel-Tower-96-1.png" alt="Eiffel Tower-96 (1)" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non sagittis felis. Integer sit amet nisl porta, malesuada magna ut, vehicula tellus. In hac habitasse platea dictumst. Maecenas diam mauris, ornare nec gravida eu, imperdiet id neque. Sed et dui vel lectus finibus fringilla. Sed porta cursus est et faucibus. Morbi dapibus turpis ligula, a venenatis odio facilisis vitae. Phasellus ultricies diam ultricies ultrices sollicitudin. Suspendisse potenti. Morbi malesuada mattis dignissim. Aliquam erat volutpat. Sed ullamcorper ullamcorper vehicula. Donec at est convallis, semper odio sed, condimentum libero.', 'Francès', '', 'publish', 'closed', 'closed', '', 'frances', '', '', '2016-06-14 13:05:18', '2016-06-14 12:05:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8195', 0, 'page', '', 0),
(8197, 1, '2016-06-09 14:35:34', '2016-06-09 13:35:34', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Sagrada-Familia-96.png" rel="attachment wp-att-8402"><img class="size-full wp-image-8402 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Sagrada-Familia-96.png" alt="Sagrada Familia-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Català', '', 'publish', 'closed', 'closed', '', 'catala', '', '', '2016-06-23 10:55:20', '2016-06-23 09:55:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8197', 0, 'page', '', 0),
(8199, 1, '2016-06-09 14:35:55', '2016-06-09 13:35:55', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Spain-96.png" rel="attachment wp-att-8409"><img class="size-full wp-image-8409 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Spain-96.png" alt="Spain-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.', 'Espanyol', '', 'publish', 'closed', 'closed', '', 'espanyol', '', '', '2016-06-20 15:59:22', '2016-06-20 14:59:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8199', 0, 'page', '', 0),
(8201, 1, '2016-06-09 14:38:03', '2016-06-09 13:38:03', ' ', '', '', 'publish', 'closed', 'closed', '', '8201', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8201', 20, 'nav_menu_item', '', 0),
(8202, 1, '2016-06-09 14:38:03', '2016-06-09 13:38:03', ' ', '', '', 'publish', 'closed', 'closed', '', '8202', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8202', 19, 'nav_menu_item', '', 0),
(8203, 1, '2016-06-09 14:38:03', '2016-06-09 13:38:03', ' ', '', '', 'publish', 'closed', 'closed', '', '8203', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8203', 21, 'nav_menu_item', '', 0),
(8204, 1, '2016-06-09 14:37:47', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-09 14:37:47', '0000-00-00 00:00:00', '', 8187, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8204', 1, 'nav_menu_item', '', 0),
(8205, 1, '2016-06-09 14:37:47', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-09 14:37:47', '0000-00-00 00:00:00', '', 8187, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8205', 1, 'nav_menu_item', '', 0),
(8206, 1, '2016-06-13 09:03:11', '2016-06-13 08:03:11', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris-professorat', '', '', '2016-06-20 15:43:30', '2016-06-20 14:43:30', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8206', 10, 'page', '', 0),
(8210, 1, '2016-06-13 09:05:50', '2016-06-13 08:05:50', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectures', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectures', '', '', '2016-06-20 15:15:03', '2016-06-20 14:15:03', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8210', 20, 'page', '', 0),
(8212, 1, '2016-06-13 09:09:03', '2016-06-13 08:09:03', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="74" height="74" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 15:20:59', '2016-06-20 14:20:59', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8212', 30, 'page', '', 0),
(8214, 1, '2016-06-13 09:11:49', '2016-06-13 08:11:49', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 15:17:51', '2016-06-20 14:17:51', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8214', 40, 'page', '', 0),
(8216, 1, '2016-06-13 09:13:59', '2016-06-13 08:13:59', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:55:50', '2016-06-20 14:55:50', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8216', 15, 'page', '', 0),
(8222, 1, '2016-06-13 09:35:53', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-13 09:35:53', '0000-00-00 00:00:00', '', 8187, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8222', 1, 'nav_menu_item', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8229, 1, '2016-06-13 10:38:34', '2016-06-13 09:38:34', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2016-06-20 15:43:09', '2016-06-20 14:43:09', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8229', 0, 'page', '', 0),
(8233, 1, '2016-06-13 10:39:18', '2016-06-13 09:39:18', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:56:04', '2016-06-20 14:56:04', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8233', 20, 'page', '', 0),
(8235, 1, '2016-06-13 10:40:00', '2016-06-13 09:40:00', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectures', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectures', '', '', '2016-06-20 16:26:21', '2016-06-20 15:26:21', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8235', 30, 'page', '', 0),
(8237, 1, '2016-06-13 10:40:25', '2016-06-13 09:40:25', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus massa erat, semper vel venenatis ut, feugiat et enim. Morbi imperdiet ipsum ac mollis aliquet. Suspendisse potenti. Nam ornare feugiat nibh nec ullamcorper. Sed nec lorem vitae sapien facilisis facilisis. Nulla varius ex ut lectus aliquam, ac molestie massa vehicula. Proin vel quam at ante tempor fringilla ut sed velit.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:12:14', '2016-06-20 15:12:14', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8237', 40, 'page', '', 0),
(8240, 1, '2016-06-13 10:41:21', '2016-06-13 09:41:21', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 16:21:16', '2016-06-20 15:21:16', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8240', 50, 'page', '', 0),
(8244, 1, '2016-06-13 10:43:19', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-13 10:43:19', '0000-00-00 00:00:00', '', 8187, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8244', 1, 'nav_menu_item', '', 0),
(8260, 1, '2016-06-13 11:19:49', '2016-06-13 10:19:49', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2016-06-20 15:44:58', '2016-06-20 14:44:58', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8260', 10, 'page', '', 0),
(8262, 1, '2016-06-13 11:20:46', '2016-06-13 10:20:46', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:56:18', '2016-06-20 14:56:18', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8262', 20, 'page', '', 0),
(8265, 1, '2016-06-13 11:22:15', '2016-06-13 10:22:15', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectures', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectures', '', '', '2016-06-20 16:26:05', '2016-06-20 15:26:05', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8265', 30, 'page', '', 0),
(8267, 1, '2016-06-13 11:22:55', '2016-06-13 10:22:55', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="74" height="74" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:23:36', '2016-06-20 15:23:36', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8267', 40, 'page', '', 0),
(8269, 1, '2016-06-13 11:24:03', '2016-06-13 10:24:03', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 16:21:44', '2016-06-20 15:21:44', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8269', 50, 'page', '', 0),
(8274, 1, '2016-06-13 11:25:33', '2016-06-13 10:25:33', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2016-06-20 15:54:41', '2016-06-20 14:54:41', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8274', 0, 'page', '', 0),
(8277, 1, '2016-06-13 11:26:06', '2016-06-13 10:26:06', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:56:36', '2016-06-20 14:56:36', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8277', 20, 'page', '', 0),
(8279, 1, '2016-06-13 11:27:16', '2016-06-13 10:27:16', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectures', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectures', '', '', '2016-06-20 16:25:48', '2016-06-20 15:25:48', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8279', 30, 'page', '', 0),
(8282, 1, '2016-06-13 11:29:06', '2016-06-13 10:29:06', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="74" height="74" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:23:55', '2016-06-20 15:23:55', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8282', 40, 'page', '', 0),
(8284, 1, '2016-06-13 11:29:23', '2016-06-13 10:29:23', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 16:22:04', '2016-06-20 15:22:04', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8284', 50, 'page', '', 0),
(8291, 1, '2016-06-13 11:31:56', '2016-06-13 10:31:56', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2016-06-20 15:54:02', '2016-06-20 14:54:02', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8291', 10, 'page', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8293, 1, '2016-06-13 11:33:13', '2016-06-13 10:33:13', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:56:49', '2016-06-20 14:56:49', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8293', 20, 'page', '', 0),
(8295, 1, '2016-06-13 11:34:05', '2016-06-13 10:34:05', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectura', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectura', '', '', '2016-06-20 16:25:16', '2016-06-20 15:25:16', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8295', 30, 'page', '', 0),
(8297, 1, '2016-06-13 11:34:40', '2016-06-13 10:34:40', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="74" height="74" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:24:10', '2016-06-20 15:24:10', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8297', 40, 'page', '', 0),
(8299, 1, '2016-06-13 11:35:25', '2016-06-13 10:35:25', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 16:22:33', '2016-06-20 15:22:33', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8299', 50, 'page', '', 0),
(8347, 1, '2016-02-13 11:43:02', '2016-02-13 10:43:02', 'Està oberta la convocatòria d’ajuts del <a href="http://futurambidiomes.gencat.cat/" target="_blank">Programa Parla 3</a>, adreçat a estudiants universitaris que hagin començat a estudiar en una universitat catalana a partir del curs 2014-15, per a ajudar a cobrir despeses de matrícula d’estudis d’idiomes a les EOIs (i d''altres institucions), si estan cursant el curs per a l’obtenció del A2, B1, B2.1 i B2.2.', 'Oberta la convocatòria d’ajuts del Programa Parla 3', '', 'publish', 'open', 'open', '', 'oberta-la-convocatoria-dajuts-del-programa-parla-3', '', '', '2016-06-29 10:25:00', '2016-06-29 09:25:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8347', 0, 'post', '', 0),
(8348, 1, '2016-06-13 11:42:18', '2016-06-13 10:42:18', '', 'parla3', '', 'inherit', 'open', 'closed', '', 'parla3', '', '', '2016-06-13 11:42:18', '2016-06-13 10:42:18', '', 8347, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/parla3.jpg', 0, 'attachment', 'image/jpeg', 0),
(8352, 1, '2016-02-17 11:46:23', '2016-02-17 10:46:23', 'El Departament d’Ensenyament convoca periòdicament proves lliures per a l’obtenció de títols i certificats, mitjançant les quals se certifica la superació d’uns estudis determinats.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna.\r\n<ul>\r\n	<li>Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien.</li>\r\n	<li>Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed.</li>\r\n	<li>Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.</li>\r\n</ul>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna. Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien. Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed. Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.', 'Proves lliures per a l’obtenció de títols i certificats', '', 'publish', 'open', 'open', '', 'proves-lliures-per-a-lobtencio-de-titols-i-certificats', '', '', '2016-06-13 12:31:08', '2016-06-13 11:31:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8352', 0, 'post', '', 0),
(8354, 1, '2016-06-13 11:49:55', '2016-06-13 10:49:55', '', 'Selecció_999(310)', '', 'inherit', 'open', 'closed', '', 'seleccio_999310', '', '', '2016-06-13 11:49:55', '2016-06-13 10:49:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Selecció_999310.png', 0, 'attachment', 'image/png', 0),
(8355, 1, '2016-04-13 12:13:45', '2016-04-13 11:13:45', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna. Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien. Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed. Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.', 'Exàmens finals 2015-16', '', 'publish', 'open', 'open', '', 'examens-finals-2015-16', '', '', '2016-06-15 11:00:33', '2016-06-15 10:00:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8355', 0, 'post', '', 0),
(8357, 1, '2016-06-13 12:14:43', '2016-06-13 11:14:43', '', 'Selecció_999(311)', '', 'inherit', 'open', 'closed', '', 'seleccio_999311', '', '', '2016-06-13 12:14:43', '2016-06-13 11:14:43', '', 8355, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Selecció_999311.png', 0, 'attachment', 'image/png', 0),
(8358, 1, '2016-06-13 12:24:47', '2016-06-13 11:24:47', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna. Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien. Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed. Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.', 'Secretaria', '', 'publish', 'closed', 'closed', '', 'secretaria', '', '', '2016-06-15 13:05:42', '2016-06-15 12:05:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8358', 60, 'page', '', 0),
(8362, 1, '2016-06-13 12:30:08', '2016-06-13 11:30:08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna. Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien. Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed. Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eleifend turpis condimentum leo laoreet facilisis nec eget magna.</li>\r\n	<li>Ut dui ex, facilisis a venenatis nec, ullamcorper in tortor. Curabitur quis purus malesuada, bibendum est et, imperdiet sapien.</li>\r\n	<li>Praesent ac velit nec mi euismod ullamcorper a id metus. Fusce commodo purus ex, eget rhoncus quam maximus sed.</li>\r\n	<li>Nam eu volutpat risus, non bibendum elit. Curabitur ac lorem quis ex faucibus blandit. Duis et porta nisl. In non iaculis metus. Duis luctus ultrices nulla.</li>\r\n</ul>', 'Cursos d''estiu', '', 'publish', 'open', 'open', '', 'cursos-destiu', '', '', '2016-06-13 13:25:00', '2016-06-13 12:25:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8362', 0, 'post', '', 0),
(8365, 1, '2016-06-13 13:24:16', '2016-06-13 12:24:16', '', 'guiacursosestiu2016', '', 'inherit', 'open', 'closed', '', 'guiacursosestiu2016', '', '', '2016-06-13 13:24:16', '2016-06-13 12:24:16', '', 8362, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/guiacursosestiu2016.png', 0, 'attachment', 'image/png', 0),
(8366, 1, '2016-06-13 13:27:59', '2016-06-13 12:27:59', '<strong>DEPARTAMENT D''ALUMNAT\r\n</strong>Departament encarregat del procés de preinscripció, matrícula, certificats, títols, beques, etc.\r\n\r\nAdreça electrònica: eoi-larany@xtec.cat\r\nAdministrativa: Margarita Ipsum\r\n<ul>\r\n	<li><strong>Durant el curs escolar</strong>\r\nDe dilluns a divendres de 10 a 13h i de 16 a 19h</li>\r\n	<li><strong>Juny:</strong>\r\nDimarts, dimecres i dijous de 10 a 12h i de 17 a 19h</li>\r\n	<li><strong>Juliol:</strong>\r\nDe dilluns a dijous de 10 a 13 h</li>\r\n	<li>El mes d''agost l''Escola Oficial d''Idiomes està tancada per vacances</li>\r\n</ul>\r\n&nbsp;', 'Horari d''atenció', '', 'publish', 'closed', 'closed', '', 'horari', '', '', '2016-06-20 16:29:09', '2016-06-20 15:29:09', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8366', 10, 'page', '', 0),
(8370, 1, '2016-06-13 13:38:46', '2016-06-13 12:38:46', 'Per facilitar la realització de gestions administratives podeu <strong>descarregar-vos les instàncies i sol·licituds següents</strong>.\r\n\r\n<strong>Ompliu-les i lliureu-les a secretaria</strong>, tot <strong>aportant la documentació requerida</strong> per cada gestió.\r\n<ul>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/renunciar-als-drets-de-la-matricula-i-sol-licitar-reserva-de-placa-per-al-curs-vinent/?bp-attachment=Renunciar-matricula-sollicitar-reserva_NOU1.doc">Renunciar als drets de la matrícula i sol·licitar reserva de plaça per al curs vinent</a></li>\r\n	<li><a title="Renúncia sin reserva de plaça" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/renunciar-als-drets-de-la-matricula-i-sol-licitar-reserva-de-placa-per-al-curs-vinent/?bp-attachment=Renunciar-matricula-no-sollicitar-reserva_NOU.doc">Renunciar als drets de la matrícula i NO sol·licitar reserva de plaça per al curs vinent</a></li>\r\n	<li><a title="Matrícula viva" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/sol%c2%b7licitud-de-trasllat-dexpedient/">Sol·licitud trasllat de matrícula viva</a></li>\r\n	<li><a title="Trasllat d''expedient" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/sol%c2%b7licitud-de-trasllat-dexpedient/">Sol·licitud de trasllat d’expedient</a></li>\r\n	<li><a title="revisió qualificacions finals" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/sol-licitud-de-revisio-de-qualificacions-finals/">Sol·licitud de revisió de qualificacions finals</a></li>\r\n	<li><a title="justificació faltes alumnat menor d''edat" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/justificacio-de-faltes-dassistencia-de-menors/">Justificació de faltes d’assistència de menors</a></li>\r\n	<li><a title="convocatòria addicional" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/convocatoria-addicional/">Convocatòria addicional</a></li>\r\n	<li><a title="sol·licitud canvi horari" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/solicitud-canvi-dhorari/">Sol·licitud canvi d’horari</a></li>\r\n	<li><a title="sol·licitud permuta" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/sol%c2%b7licitud-de-permuta/">Sol·licitud de permuta</a></li>\r\n	<li><a title="imprès de matrícula" href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/impres-de-matricula/">Imprès de matrícula</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/intancies/">Altres instàncies</a></li>\r\n</ul>', 'Instàncies i sol·licituds', '', 'publish', 'closed', 'closed', '', 'instancies-i-solicituts', '', '', '2016-06-29 10:23:24', '2016-06-29 09:23:24', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8370', 35, 'page', '', 0),
(8372, 1, '2016-06-13 13:41:51', '2016-06-13 12:41:51', '<strong>ASSISTÈNCIA A CLASSE</strong>\r\n<ul>\r\n	<li>L''assistència es considera necessària per al bon aprofitament individual i del grup i per a una adequada avaluació de l''alumne.</li>\r\n	<li>En cas d''absències no justificades superiors al 35% del temps lectiu, l''alumne no podrà ser avaluat de manera contínua, i només podrà presentar-se a una prova de final de curs.</li>\r\n	<li>Si, per alguna raó, un alumne no pot assistir a classe durant un temps o definitivament, cal fer-ho saber al professor el més aviat possible.</li>\r\n</ul>\r\n<strong>AVALUACIÓ</strong>\r\n<ul>\r\n	<li>L''avaluació del procés d''aprenentatge dels alumnes oficials presencials serà contínua i sistemàtica, globalitzada, integradora i personalitzada a fi de valorar el progrés dels alumnes.</li>\r\n	<li>Es fomenta l''intercanvi d''informació sobre el procés d''aprenentatge i ensenyament entre professorat i alumnat. Es valora l''assistència a classe, la participació en les activitats proposades, la realització de les tasques encomanades per fer a casa, el resultat de les proves periòdiques que es programin. Tanmateix, a banda de l''avaluació formativa hi ha una prova d''assoliment estandaritzada per constatar que s''han complert els objectius establerts per als casos en què el professor no tingui prou elements de judici.</li>\r\n	<li>L''avaluació està elaborada amb criteris objectius de fiabilitat i validesa.</li>\r\n</ul>\r\n<strong>CANVIS D''HORARI</strong>\r\n\r\nUn cop formalitzada la matrícula, aquells alumnes que vulguin canviar l''horari de classe podran optar per un dels mecanismes següents:\r\n<ul>\r\n	<li><strong>Permuta de mutu acord</strong>. La permuta consisteix en l''intercanvi de plaça entre dues persones matriculades en dos horaris diferents del mateix idioma i curs i cal que sigui acceptat lliurement per un/a i altre/a alumne/a. S''haurà d''emplenar la "sol·licitud de permuta" que estarà penjada al tauler d''anuncis de l''EOI. Quan hi hagi dues persones interessades a fer aquest canvi, aquests s''hauran de posar en contacte entre ells i després hauran de presentar, la sol·licitud juntament amb la documentació al Departament d''alumnat (DNI i resguard de la matrícula) durant l''horari d''atenció al públic per tal de formalitzar la permuta.</li>\r\n	<li>Termini per presentar la sol·licitud permuta: un cop finalitzat el procés de matrícula i fins a finals d''octubre.</li>\r\n</ul>\r\nHi haurà un termini per fer canvis d''horari per a tots aquells alumnes que no hagin trobat el canvi desitjat en el procés de permuta. Els alumnes que vulguin un canvi d''horari hauran de presentar una instància al Departament d''alumnat durant l''horari d''atenció al públic amb les causes degudament justificades, d''acord amb les següents condicions:\r\n<ul>\r\n	<li>En tots els casos només es podran concedir canvis en els horaris sol·licitats en què hi hagi places vacants.</li>\r\n	<li>Podran demanar canvi els alumnes que un cop feta la matrícula a l''EOI, s''hagin matriculat en un altre centre docent oficial (universitat, institut, escola, etc.) i tinguin un horari incompatible, o bé alumnes als quals se''ls hagi canviat l''horari laboral, també amb posterioritat a la matriculació en aquesta EOI.</li>\r\n	<li>El canvi serà irrenunciable, oficial i definitiu per a la resta del curs.</li>\r\n	<li>No es tindrà en compte cap sol·licitud que no vagi acompanyada de justificant acreditatiu (fotocòpia de matrícula, certificat de l''empresa, etc).</li>\r\n	<li>La Cap d''estudis classificarà les sol·licituds rebudes per idioma i horari demanat en primera opció i es procedirà a concedir o denegar els canvis d''acord amb la disponibilitat de places.</li>\r\n	<li>Un cop concedides o denegades les sol·licituds els/les alumnes podran incorporar-se immediatament al grup sol·licitat si els ha estat concedit el canvi. En cas contrari hauran de romandre al grup d''origen.</li>\r\n	<li>Canvi d''horari oficial (sense permuta). Termini per presentar <a href="http://www.eoiblanes.cat/media/files/instancies-solicituds/canvi-horari_form.pdf">la sol·licitud de canvi d''horari</a>: primera i segona setmana de novembre.</li>\r\n</ul>\r\nPodeu trobar els documents relacionats amb l''horari <a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/?bpd_tag=horari">aquí</a>.\r\n\r\n<strong>DEVOLUCIÓ DE TAXES O PREUS PÚBLICS</strong>\r\nLes taxes o preus públics de la matrícula a les EOI només es poden retornar en els supòsits que s''indiquen a continuació i dins dels terminis que, quan escau, s''assenyalen:\r\n<ul type="a">\r\n	<li>Renúncia a la matrícula oficial, quan la renúncia i la sol·licitud de retorn de taxes o preus públics es produeixin fins a l''1 d''octubre, tant en els cursos extensius com en els quadrimestrals i flexibilitzats.</li>\r\n	<li>Renúncia a la inscripció a les proves lliures per a l''obtenció del certificat de nivell intermedi, del certificat de nivell avançat o del certificat de nivell C1 quan la renúncia i la sol·licitud de retorn de taxes o de preus públics es produeixin abans de la data de publicació de les llistes definitives d''admesos.</li>\r\n	<li>Pagaments duplicats o per import superior.</li>\r\n	<li>Inaplicació de bonificacions o exempcions a les quals l''alumne té dret en el moment de la matriculació, per l''import corresponent.</li>\r\n	<li>No-prestació del servei per causes no imputables a l''alumne. No es consideren supòsits de força major els canvis en l''horari laboral, ni els canvis de domicili o similars.</li>\r\n	<li>En cas de trasllat a una altra comunitat autònoma, l''alumne pot sol·licitar el retorn de taxes o preus públics abans del 30 de novembre.</li>\r\n</ul>\r\nLes sol·licituds de devolució de taxes i preus públics s''han de formular mitjançant el model "<a href="http://www.eoiblanes.cat/media/files/instancies-solicituds/devoluci%C3%B3%20taxes.pdf" target="_blank">Sol·licitud de devolució de taxa en la prestació de serveis docents de les escoles oficials d''idiomes (EOI) o per a la inscripció en les proves lliures</a>", que s''ha de presentar preferentment a la secretaria de l''EOI, la qual en registrarà l''entrada i el revisarà, a l''efecte d''orientar l''alumne respecte de la correcció de la sol·licitud i de la documentació aportada. També es podrà presentar en altres registres de l''Administració o en els altres llocs establerts per la legislació.\r\n\r\nLa renúncia a la matrícula oficial amb devolució de taxes suposa l''anul·lació de la matrícula a tots els efectes i l''exclusió de la matrícula de l''expedient acadèmic de l''alumne i, per tant, la renúncia a la plaça per part de l''alumne.\r\n\r\n<strong>EXÀMENS CURS OFICIAL</strong>\r\n<ul>\r\n	<li>Els alumnes disposaran, a banda de l''avaluació contínua, d''una única convocatòria d''examen final durant el curs acadèmic.</li>\r\n	<li>Tota persona que estigui convocada i no es presenti a aquesta prova, rebrà un No Presentat (NP) com a nota final i perdran una convocatòria.</li>\r\n</ul>\r\n<strong>MENORS</strong>\r\n\r\n<strong>Els ensenyaments que es duen a terme a les EOI són de caràcter NO REGLAT, és a dir, no obligatoris.</strong>\r\n\r\nL''Escola es compromet a fer un seguiment de l''assistència dels alumnes menors d''edat, per tal d''informar, es trucarà als pares o tutors en cas que el/la menor falti a classe, així mateix, es demanarà justificant d''absència o retard degudament emplenat i signat pel pare/mare o tutor/s.\r\n\r\nTrobareu el justificant d''absència a l''apartat d''instàncies i sol.licituds (secretaria).\r\n\r\n<strong>RENÚNCIA A LA MATRÍCULA OFICIAL</strong>\r\n<ul>\r\n	<li>Es podrà renunciar a la matrícula oficial quan l''alumne no pugui continuar assistint a classe amb regularitat. La renúncia implica que no es computi el curs a efectes de repetició i que, si ho demana, mantindrà la prioritat per matricular-se l''any acadèmic posterior com a antic alumne.</li>\r\n	<li>L''alumne oficial podrà presentar al director de l''escola la renúncia a la matriculació en un idioma en un termini que acabarà el dia 30 de novembre. Trobareu la sol·licitud en <a href="http://www.eoiblanes.cat/media/files/instancies-solicituds/renuncia_form.pdf">aquest enllaç</a>.</li>\r\n	<li>Renunciar a la matrícula no dóna dret al retorn de cap taxa.</li>\r\n</ul>\r\n<strong>PERMANÈNCIA EN ELS ESTUDIS</strong>\r\n<ul>\r\n	<li>Dins de cada nivell bàsic, intermedi i avançat, l''alumne té dret a romandre matriculat en el règim d''ensenyament oficial, modalitat presencial, durant un màxim de cursos acadèmics equivalents al doble dels cursos de què consta el nivell per a l''idioma corresponent.</li>\r\n	<li>L''alumne que cursa per tercera vegada el primer curs del nivell bàsic i no el supera o que cursa per tercera vegada el primer curs del nivell avançat i no el supera, no pot tornar a cursar aquest curs una altra vegada.</li>\r\n	<li>Per cursar per tercera vegada el primer curs del nivell bàsic o el primer curs del nivell avançat, l''alumne ha de demanar-ho al director o directora de l''escola, que haurà de valorar les circumstàncies al·legades per l''alumne en la sol·licitud, i el procés d''aprenentatge seguit per l''alumne al llarg dels dos cursos realitzats.</li>\r\n	<li>L''alumne que accedeix directament al segon curs del nivell bàsic o al segon curs del nivell avançat el pot cursar un màxim de dues vegades.</li>\r\n	<li>Dins de cada nivell C1 i C2 l''alumne té dret a romandre matriculat en el règim d''ensenyament oficial, modalitat presencial, un màxim de dos cursos acadèmics. En casos excepcionals, el director o directora podrà autoritzar la repetició o permanència d''un curs més en règim oficial presencial a l''alumne que ho sol·liciti.</li>\r\n	<li>En <strong>casos excepcionals</strong>, que ha de valorar el director o directora de l''escola i sempre que no representi fer el mateix curs per quarta vegada, el director o directora podrà autoritzar la repetició o permanència d''un curs més en règim oficial presencial a l''alumne que ho sol·liciti, quan ja hagi superat el nombre màxim de cursos de permanència autoritzats amb caràcter general per al nivell corresponent. Es podrà concedir una única convocatòria addicional per nivell.</li>\r\n</ul>\r\n<strong>TRASLLAT DE MATRÍCULA</strong>\r\n<ul>\r\n	<li>Trasllat de l''alumne durant el curs acadèmic</li>\r\n</ul>\r\nSi després de formalitzar la matrícula en un centre, un alumne demana poder continuar el curs en un altre centre, el trasllat s''anomena trasllat de <strong>matrícula viva</strong>. El termini per efectuar trasllats de matrícula viva finalitza l''últim dia lectiu del mes de febrer.\r\nLa sol·licitud de matrícula s''ha de fer al centre de destinació mitjançant el model "<a href="http://www.eoiblanes.cat/media/files/instancies-solicituds/trasllat_form.pdf" target="_blank">Sol·licitud de trasllat d''expedient</a>" i queda condicionada a la disponibilitat de places del centre. La documentació que cal aportar és el full de pagament de la matrícula efectuada en el centre d''origen. En el moment de produir-se una vacant, l''EOI de destinació ho ha de comunicar al sol·licitant. L''EOI de destinació ha de tramitar d''ofici el trasllat d''expedient de l''alumne. En cas de no haver-hi vacants en l''EOI de destinació, s''obrirà una llista d''espera on els sol·licitants han de poder indicar els grups i horaris desitjats.\r\n<ul>\r\n	<li>Trasllat de l''alumne en període no lectiu</li>\r\n</ul>\r\nEls alumnes oficials, un cop hagin formalitzat la matrícula al seu centre d''origen, poden sol·licitar un trasllat de matrícula a una altra escola <strong>del 16 al 20 de juliol</strong>. La sol·licitud de matrícula es fa presencialment a l''escola de destinació, i queda condicionada a la disponibilitat de places. L''escola de destinació es posarà en contacte amb els alumnes a través dels mitjans que estableixi, per notificar l''acceptació o la denegació del trasllat. En cas d''acceptació, el procés de trasllat ha d''haver acabat abans del 24 de juliol. La documentació que l''alumne ha d''aportar en el moment de sol·licitar el trasllat és el full de pagament de la matrícula. En cas que hi hagi places vacants, l''escola de destinació sol·licitarà el trasllat de l''expedient acadèmic de l''alumne a l''escola d''origen.\r\n\r\nEn aquest període, no es podrà sol·licitar el trasllat de matrícula del nivell C1.\r\n\r\n- L’alumne no pagarà taxa de matrícula si procedeix d’una EOI de Catalunya però sí que pagarà la taxa de matrícula si procedeix d’una EOI d’una altra comunitat autònoma.', 'Normes i funcionament', '', 'publish', 'closed', 'closed', '', 'normes-i-funcionament', '', '', '2016-06-29 10:44:06', '2016-06-29 09:44:06', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8372', 35, 'page', '', 0),
(8377, 1, '2016-06-13 13:50:10', '2016-06-13 12:50:10', '<strong>Nivells bàsic i intermedi</strong>\r\n\r\nL’alumnat que hagi superat el 2n curs obté el Certificat de nivell bàsic.\r\nL’alumnat oficial de 3r o els candidats o candidates lliures que hagin superat les proves corresponents obtenen el Certificat de nivell intermedi.\r\n<strong>Procediment:</strong>\r\n<ul>\r\n	<li>L’escola expedeix els certificats de manera automàtica sense que calgui sol·licitud prèvia ni pagament de taxes.</li>\r\n	<li>Es pot recollir personalment a partir de mitjan octubre a la secretaria del centre presentant el DNI, passaport o NIE de la persona interessada.</li>\r\n</ul>\r\n<strong>Nivells avançat i C1</strong>\r\n<ul>\r\n	<li>L’alumnat oficial de 5è o els candidats o candidates lliures que hagin superat les proves corresponents obtenen el Certificat de nivell avançat.</li>\r\n	<li>L’alumnat que superi la prova de C1 obté el certificat corresponent.</li>\r\n</ul>\r\n<strong>Procediment:</strong>\r\nEls Certificats dels nivells avançat i C1 els expedeix el Departament d’Ensenyament prèvia sol·licitud i abonament de les taxes corresponents.\r\n\r\nOmplir la sol·licitud del títol corresponent i lliurar-la presencialment al centre o per correu electrònic a l’adreça: secretaria@eoilapau.net\r\n&gt; Els aprovats al mes de juny a partir del mes d’octubre.\r\n&gt; Els aprovats al mes de febrer a partir del mes d’abril.\r\nAbonament de les taxes d’expedició amb el document de pagament emès per l’escola. En el cas que la sol·licitud s’hagi fet per correu electrònic, l’escola retornarà el document de pagament per correu electrònic a la mateixa adreça de correu.\r\n&gt; Amb el codi de barres a través dels caixers del Servicaixa de “La Caixa”\r\n&gt; O al portal de pagament de “La Caixa”\r\nRetornar a la secretaria del centre el comprovant de pagament juntament amb el document de pagament.\r\nEn el moment que l’escola rebi el títol, s’avisa per correu ordinari als interessats. (En aquests moments, triga aproximadament dos anys, però el resguard té la mateixa validesa.)\r\nEls títols s’han de recollir personalment a la secretaria del centre presentant el DNI, NIE o passaport i el resguard de pagament de les taxes.\r\n\r\n<strong>TIPUS DE TAXES</strong> (Certificats de nivell avançat i C1 – 2015/2016)\r\n<ul>\r\n	<li>Ordinària: 72,05 €</li>\r\n	<li>Famílies nombroses generals o monoparentals: 36,05 €</li>\r\n	<li>Famílies nombroses de categoria especial: Exempts</li>\r\n	<li>Discapacitat igual o superior al 33%: Exempts</li>\r\n</ul>', 'Expedició de títols', '', 'publish', 'closed', 'closed', '', 'expedicio-de-titols', '', '', '2016-06-29 10:36:11', '2016-06-29 09:36:11', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8377', 80, 'page', '', 0),
(8379, 1, '2016-06-13 13:56:13', '2016-06-13 12:56:13', '', 'Idiomes', '', 'publish', 'closed', 'closed', '', 'idiomes', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8379', 16, 'nav_menu_item', '', 0),
(8382, 1, '2016-06-13 14:13:48', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-13 14:13:48', '0000-00-00 00:00:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8382', 1, 'nav_menu_item', '', 0),
(8383, 1, '2016-06-13 14:13:59', '2016-06-13 13:13:59', ' ', '', '', 'publish', 'closed', 'closed', '', '8383', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8383', 32, 'nav_menu_item', '', 0),
(8384, 1, '2016-06-13 14:13:59', '2016-06-13 13:13:59', ' ', '', '', 'publish', 'closed', 'closed', '', '8384', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8384', 31, 'nav_menu_item', '', 0),
(8385, 1, '2016-06-13 14:14:31', '2016-06-13 13:14:31', '', 'Horari d''atenció', '', 'publish', 'closed', 'closed', '', '8385', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8385', 24, 'nav_menu_item', '', 0),
(8391, 1, '2016-06-14 12:19:46', '2016-06-14 11:19:46', '', 'German Hat-96', '', 'inherit', 'open', 'closed', '', 'german-hat-96', '', '', '2016-06-14 12:20:19', '2016-06-14 11:20:19', '', 9, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/German-Hat-96.png', 0, 'attachment', 'image/png', 0),
(8396, 1, '2016-06-14 12:56:13', '2016-06-14 11:56:13', '', 'Big Ben-96', '', 'inherit', 'open', 'closed', '', 'big-ben-96', '', '', '2016-06-14 12:56:13', '2016-06-14 11:56:13', '', 9, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2014/09/Big-Ben-96.png', 0, 'attachment', 'image/png', 0),
(8402, 1, '2016-06-14 13:03:02', '2016-06-14 12:03:02', '', 'Sagrada Familia-96', '', 'inherit', 'open', 'closed', '', 'sagrada-familia-96', '', '', '2016-06-14 13:03:02', '2016-06-14 12:03:02', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Sagrada-Familia-96.png', 0, 'attachment', 'image/png', 0),
(8404, 1, '2016-06-14 13:05:13', '2016-06-14 12:05:13', '', 'Eiffel Tower-96 (1)', '', 'inherit', 'open', 'closed', '', 'eiffel-tower-96-1', '', '', '2016-06-14 13:05:13', '2016-06-14 12:05:13', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Eiffel-Tower-96-1.png', 0, 'attachment', 'image/png', 0),
(8406, 1, '2016-06-14 13:10:11', '2016-06-14 12:10:11', '', 'France-96', '', 'inherit', 'open', 'closed', '', 'france-96', '', '', '2016-06-14 13:10:11', '2016-06-14 12:10:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/France-96.png', 0, 'attachment', 'image/png', 0),
(8407, 1, '2016-06-14 13:11:14', '2016-06-14 12:11:14', '', 'Germany-96', '', 'inherit', 'open', 'closed', '', 'germany-96', '', '', '2016-06-14 13:11:14', '2016-06-14 12:11:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Germany-96.png', 0, 'attachment', 'image/png', 0),
(8408, 1, '2016-06-14 13:11:14', '2016-06-14 12:11:14', '', 'Great Britain-96', '', 'inherit', 'open', 'closed', '', 'great-britain-96', '', '', '2016-06-14 13:11:14', '2016-06-14 12:11:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Great-Britain-96.png', 0, 'attachment', 'image/png', 0),
(8409, 1, '2016-06-14 13:11:15', '2016-06-14 12:11:15', '', 'Spain-96', '', 'inherit', 'open', 'closed', '', 'spain-96', '', '', '2016-06-20 15:59:18', '2016-06-20 14:59:18', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Spain-96.png', 0, 'attachment', 'image/png', 0),
(8410, 1, '2016-06-14 14:43:36', '2016-06-14 13:43:36', '', 'cataluna', '', 'inherit', 'open', 'closed', '', 'cataluna', '', '', '2016-06-14 14:43:36', '2016-06-14 13:43:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/cataluna.png', 0, 'attachment', 'image/png', 0),
(8411, 1, '2016-06-14 14:54:16', '2016-06-14 13:54:16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec lacus justo. Donec rutrum bibendum dolor sit amet semper. Maecenas a ex posuere, gravida nunc ac, egestas quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec eu mi vehicula, luctus magna et, maximus lorem. Morbi sollicitudin nisi id nisl consectetur interdum. Curabitur commodo, sapien et sollicitudin congue, ante ante dignissim eros, vel vulputate leo augue et elit. In viverra porta ligula. Vestibulum tincidunt diam vitae nisi consequat euismod. Nunc vitae augue eros. Suspendisse viverra, nisi id gravida maximus, libero justo ornare orci, ut facilisis enim est eu sem. Aenean eu mauris a purus hendrerit dignissim vel vel mauris.', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2016-06-14 14:55:28', '2016-06-14 13:55:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8411', 0, 'page', '', 0),
(8414, 1, '2016-06-14 14:55:48', '2016-06-14 13:55:48', '[slideshow_deploy id=''31'']\r\n\r\n&nbsp;\r\n\r\n<strong>Horari\r\n</strong>\r\n<ul>\r\n	<li>De dilluns a dijous, de 9.00 h a 21.00 h (el servei de préstec finalitza a les 20.45 h).</li>\r\n	<li>Del 20 al 30 de juny<strong>\r\n</strong>De dilluns a dijous, de 9.00 h a 14.45 h.</li>\r\n	<li>Del 4 al 29 de juliol<strong>\r\n</strong>De dilluns a divendres, de 13.30 h a 16.00 h.</li>\r\n</ul>\r\n<strong>Normativa</strong>\r\n\r\nPer tal de respectar la resta d’usuaris i els equipaments i materials de la <strong>Biblioteca</strong>, els usuaris que hi accedeixin hauran de complir amb les següents obligacions:\r\n<ul>\r\n	<li>Mantenir el silenci</li>\r\n	<li>No menjar ni beure</li>\r\n	<li>Silenciar els telèfons mòbils i no parlar-hi</li>\r\n	<li>No reservar llocs de treball a tercers</li>\r\n	<li>Utilitzar amb cura el fons documental i els equipaments del centre</li>\r\n</ul>\r\n<strong>Préstec\r\n</strong>\r\n\r\nEl servei de préstec de documents permet emportar-se conjuntament: <strong>2 llibres</strong>,<strong> 1 DVD</strong>,<strong> 1 CD-Àudio</strong>,<strong> 1 CD-ROM </strong>i<strong> 1 revista.</strong>\r\n<ul>\r\n	<li>Cal presentar el carnet d’usuari de la Biblioteca per fer-ne ús. Aquest és personal i intransferible.</li>\r\n	<li>El termini de préstec varia segons el tipus de material:\r\n<ul>\r\n	<li>Material audiovisual (DVD i CD): <strong>1 setmana </strong>(improrrogable).</li>\r\n	<li>Mètodes, gramàtiques i activitats: <strong>1 setmana </strong>(prorrogables una vegada, excepte en el cas dels llibres de lectura obligatòria).</li>\r\n	<li>Documents en general: <strong>2 setmanes</strong> (prorrogables dues vegades, excepte en el cas dels llibres de lectura obligatòria).</li>\r\n	<li>Obres de referència (diccionaris, atles i alguns llibres de consulta freqüent), número vigent de les publicacions periòdiques i mètodes obligatoris durant l’any acadèmic vigent: <strong>excloses de préstec</strong>.</li>\r\n</ul>\r\n</li>\r\n	<li>En el cas dels llibres considerats de referència (d’ús freqüent i marcats amb una etiqueta blava), només se’n podrà treure un del mateix idioma i amb la mateixa classificació.</li>\r\n	<li>Es podrà <strong>renovar</strong> el préstec dels documents, sempre que no hagin estat reservats per un altre usuari, durant els tres últims dies del seu termini de préstec al taulell de la biblioteca o a través del compte d’usuari del catàleg en línia.</li>\r\n	<li>Es podran fer <strong>reserves</strong> de documents <strong>exclusivament</strong> a través del compte d’usuari del catàleg en línia. Cada usuari podrà tenir únicament una reserva activa, que haurà de ser recollida durant els dos dies posteriors a l’avís per e-mail de la disponibilitat del document a la biblioteca; si no és així, la reserva quedarà anul·lada. Cada document podrà ésser reservat només per dos usuaris simultàniament.</li>\r\n	<li>Els retards en la devolució de documents es sancionaran excloent l’usuari del servei de préstec tants dies com dies de retard s’hagin acumulat per cada document.</li>\r\n	<li>En cas de deteriorament o pèrdua dels materials prestats, l’usuari estarà obligat a adquirir un nou exemplar (exceptuant el cas de robatori si l’usuari presenta la denúncia corresponent). En cas de no devolució d’algun document es denegarà la renovació del carnet el curs següent.</li>\r\n	<li>S’haurà de respectar la normativa vigent en matèria de propietat intel•lectual dels documents en préstec.</li>\r\n</ul>', 'Biblioteca', '', 'publish', 'closed', 'closed', '', 'biblioteca', '', '', '2016-06-29 10:39:47', '2016-06-29 09:39:47', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8414', 20, 'page', '', 0),
(8417, 1, '2016-06-14 14:56:13', '2016-06-14 13:56:13', ' ', '', '', 'publish', 'closed', 'closed', '', '8417', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8417', 36, 'nav_menu_item', '', 0),
(8418, 1, '2016-06-14 15:02:20', '2016-06-14 14:02:20', '', 'Moodle', '', 'publish', 'closed', 'closed', '', 'aula-virtual', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8418', 34, 'nav_menu_item', '', 0),
(8425, 1, '2016-06-14 15:15:09', '2016-06-14 14:15:09', '', 'Normes i funcionament (NOFC)', '', 'publish', 'closed', 'closed', '', '8425', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8425', 8, 'nav_menu_item', '', 0),
(8427, 1, '2016-06-14 15:20:45', '2016-06-14 14:20:45', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class="size-full wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="96" height="96" /></a>Apartat genèric de grups de conversa per si preferiu no afegir un grup de conversa a cada idioma.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae metus in mi egestas accumsan nec et tortor. Pellentesque sit amet convallis turpis. Nam eget imperdiet sem. Aliquam sed faucibus metus. Mauris vehicula quam lobortis, imperdiet dolor ac, tempor lacus. Morbi et porttitor tellus, et feugiat magna. Nunc sed venenatis tellus, vitae malesuada eros.\r\n\r\n&nbsp;', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:43:03', '2016-06-20 15:43:03', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8427', 30, 'page', '', 0),
(8429, 1, '2016-06-14 15:21:48', '2016-06-14 14:21:48', ' ', '', '', 'publish', 'closed', 'closed', '', '8429', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8429', 37, 'nav_menu_item', '', 0),
(8430, 1, '2016-06-14 15:22:24', '2016-06-14 14:22:24', 'L''escola disposa d''un aula virtual basada en la plataforma <a href="https://moodle.org" target="_blank">Moodle</a>.\r\n\r\n<a href="http://agora-eoi.xtec.cat/eoibdrassanes/moodle/" target="_blank">Accés a l''aula virtual</a>', 'Moodle (aula virtual)', '', 'publish', 'closed', 'closed', '', 'aula-virtual', '', '', '2016-06-20 17:01:06', '2016-06-20 16:01:06', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8430', 10, 'page', '', 0),
(8432, 1, '2016-06-14 15:36:36', '2016-06-14 14:36:36', 'Sed et enim pretium, pharetra leo ac, accumsan metus. Curabitur porta, ante sit amet consequat pulvinar, libero turpis consequat justo, non semper ligula mi aliquet tortor. Donec malesuada risus sed pharetra aliquam. Nunc at leo facilisis sapien euismod tempor. Etiam quis imperdiet nulla. Vivamus suscipit id nunc at feugiat. Nullam vulputate ac ipsum a sodales. Sed non dui id leo vehicula convallis. Aliquam id posuere lectus. Nam maximus nulla vitae urna pharetra mattis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n</ul>\r\n<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/03/1apsc932015.jpg" rel="attachment wp-att-8066"><img class="wp-image-8066 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/03/1apsc932015.jpg" alt="1apsc932015" width="397" height="297" /></a>\r\n\r\nMaecenas eu aliquam nisl, vitae sagittis tortor. Quisque at lectus id sapien gravida fermentum. Sed odio lectus, feugiat at turpis vel, commodo condimentum dolor. Curabitur ullamcorper aliquet urna. Maecenas sodales enim metus, eget hendrerit felis elementum vel. Aenean interdum, diam non bibendum pulvinar, turpis enim rhoncus sapien, aliquam consequat nisi quam quis odio. Nunc dictum ipsum felis, eget convallis orci porttitor ut.', 'Activitats culturals', '', 'publish', 'closed', 'closed', '', 'activitats-culturals', '', '', '2016-06-20 17:06:14', '2016-06-20 16:06:14', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8432', 40, 'page', '', 0),
(8434, 1, '2016-06-14 15:41:55', '2016-06-14 14:41:55', 'Podeu trobar tota la informació sobre beques, ajuts i subvencions <a href="http://web.gencat.cat/ca/tramits/tramits-temes/Beques-de-caracter-general-per-a-estudis-postobligatoris?category=7449fd1c-a82c-11e3-a972-000c29052e2c" target="_blank">aquí</a>.\r\n\r\n<strong>Important: </strong>els alumnes que vulguin beneficiar-se de beques hauran d''indicar-ho en el moment de matricular-se del curs regular al mes de setembre i presentar els impresos de sol·licitud de beca.', 'Beques', '', 'publish', 'closed', 'closed', '', 'beques', '', '', '2016-06-20 13:36:23', '2016-06-20 12:36:23', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8434', 27, 'page', '', 0),
(8436, 1, '2016-06-14 15:43:07', '2016-06-14 14:43:07', ' ', '', '', 'publish', 'closed', 'closed', '', '8436', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8358, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8436', 30, 'nav_menu_item', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8437, 1, '2016-06-14 15:44:54', '2016-06-14 14:44:54', ' ', '', '', 'publish', 'closed', 'closed', '', 'activitats-culturals', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8437', 38, 'nav_menu_item', '', 0),
(8439, 1, '2015-06-14 15:51:41', '2015-06-14 14:51:41', 'https://vimeo.com/55560835', 'Defensem l''ensenyament públic d''idiomes', '', 'publish', 'open', 'open', '', 'defensem-lensenyament-public-didiomes', '', '\nhttps://vimeo.com/55560835', '2016-06-14 15:53:56', '2016-06-14 14:53:56', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8439', 0, 'post', '', 0),
(8442, 1, '2016-06-14 16:03:43', '2016-06-14 15:03:43', '', 'guia_eoi', '', 'inherit', 'open', 'closed', '', 'guia_eoi', '', '', '2016-06-14 16:03:43', '2016-06-14 15:03:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/guia_eoi.pdf', 0, 'attachment', 'application/pdf', 0),
(8444, 1, '2016-06-14 16:06:08', '2016-06-14 15:06:08', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus erat lacus, at convallis ante pulvinar placerat. Nulla dolor justo, sagittis id faucibus eu, congue eu diam. Aenean in quam pellentesque, rutrum turpis vitae, sodales nulla. Fusce dui felis, cursus eget turpis nec, pharetra condimentum erat. Donec congue sit amet lorem a feugiat. Praesent scelerisque vulputate efficitur. Duis quis mauris sem. Morbi ut imperdiet metus.\r\n\r\n<a href="http://xtec.gencat.cat/ca/curriculum/idiomes/certificats/" target="_blank">Més informació a la XTEC</a>', 'Certificats i proves', '', 'publish', 'closed', 'closed', '', 'certificats-i-proves', '', '', '2016-06-29 10:43:16', '2016-06-29 09:43:16', '', 8610, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8444', 20, 'page', '', 0),
(8448, 1, '2016-06-14 16:22:09', '2016-06-14 15:22:09', 'Ompliu <a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/carnet.pdf" rel="">carnet</a> i aneu a secretaria perquè us posin el segell.<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/carnet.pdf" rel="attachment wp-att-8779"><img class="alignnone wp-image-8779 size-full" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/carnet_eoi.png" alt="carnet_eoi" width="569" height="343" /></a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Carnet d''estudiant', '', 'publish', 'closed', 'closed', '', 'carnet-destudiant', '', '', '2016-06-29 10:39:42', '2016-06-29 09:39:42', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8448', 25, 'page', '', 0),
(8450, 1, '2016-06-14 16:25:00', '2016-06-14 15:25:00', 'Aquí podeu enllaçar al vostre aplicatiu de gestió de qualificacions.', 'Consulta de qualificacions', '', 'publish', 'closed', 'closed', '', 'consulta-de-qualificacions', '', '', '2016-06-20 13:20:52', '2016-06-20 12:20:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8450', 60, 'page', '', 0),
(8455, 1, '2016-06-15 09:04:47', '2016-06-15 08:04:47', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Pizza-96.png" rel="attachment wp-att-8456"><img class="size-full wp-image-8456 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Pizza-96.png" alt="Pizza-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget gravida nisi. Vivamus semper lacinia felis, in fermentum est porta sit amet. Morbi tincidunt, nisl ut aliquam sodales, tortor orci faucibus nibh, sed laoreet ante felis sed est. Quisque elementum turpis eu euismod consectetur. Aliquam ullamcorper dolor vel pellentesque porttitor. Morbi sagittis tristique hendrerit. Aliquam mattis risus sed interdum aliquet. Suspendisse volutpat tincidunt quam ac imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nIn quis aliquet ipsum. Ut pulvinar sit amet elit ac cursus. Duis consequat tortor eu tortor pellentesque bibendum. Sed volutpat laoreet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris imperdiet nisi felis, et molestie justo pharetra in. Fusce id est vel nulla volutpat blandit id in lacus. Donec finibus mollis rhoncus. Vivamus lacinia volutpat nulla, ac dignissim dolor. Morbi volutpat, neque ut tincidunt eleifend, ipsum ligula molestie leo, facilisis molestie purus dui nec tortor. Phasellus eu varius urna. Donec maximus fringilla malesuada. Quisque rhoncus lorem enim, eget scelerisque diam dignissim sed.', 'Italià', '', 'publish', 'closed', 'closed', '', 'italia', '', '', '2016-06-15 09:04:47', '2016-06-15 08:04:47', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8455', 0, 'page', '', 0),
(8456, 1, '2016-06-15 09:04:41', '2016-06-15 08:04:41', '', 'Pizza-96', '', 'inherit', 'open', 'closed', '', 'pizza-96', '', '', '2016-06-15 09:04:41', '2016-06-15 08:04:41', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Pizza-96.png', 0, 'attachment', 'image/png', 0),
(8458, 1, '2016-06-15 09:05:32', '2016-06-15 08:05:32', ' ', '', '', 'publish', 'closed', 'closed', '', '8458', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8458', 22, 'nav_menu_item', '', 0),
(8459, 1, '2016-06-15 09:06:11', '2016-06-15 08:06:11', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" rel="attachment wp-att-8695"><img class="wp-image-8695 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png" alt="Clock-96" width="68" height="68" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim.\r\n<table id="taulaHorarisAlemany" class="taula">\r\n<tbody>\r\n<tr>\r\n<th></th>\r\n<th>GRUP</th>\r\n<th>HORARI</th>\r\n<th>PROFESSOR/A</th>\r\n<th>AULA</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;" rowspan="5">dilluns/dimecres\r\n\r\n(Grups A)</th>\r\n<th style="background-color: #faf1d2;">1A</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Marta Lorem</th>\r\n<th style="background-color: #faf1d2;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Jordi Ipsum</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">3B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Joan Dolor</th>\r\n<th style="background-color: #faf1d2;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5A</th>\r\n<th style="background-color: #faf1d2;">16:00-18:30</th>\r\n<th style="background-color: #faf1d2;">Cristina Estum</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #faf1d2;">5B</th>\r\n<th style="background-color: #faf1d2;">18:30-21:00</th>\r\n<th style="background-color: #faf1d2;">Sara Lorem</th>\r\n<th style="background-color: #faf1d2;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;" rowspan="6">dimarts/dijous\r\n\r\n(Grups B)</th>\r\n<th style="background-color: #f5f5f5;">2A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">2B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Lorem</th>\r\n<th style="background-color: #f5f5f5;">34</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">3C</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Claudia Lorem</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4A</th>\r\n<th style="background-color: #f5f5f5;">16:00-18:30</th>\r\n<th style="background-color: #f5f5f5;">Jordi Ipsum</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">4B</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Jordi Dolor</th>\r\n<th style="background-color: #f5f5f5;">33</th>\r\n</tr>\r\n<tr>\r\n<th style="background-color: #f5f5f5;">C1</th>\r\n<th style="background-color: #f5f5f5;">18:30-21:00</th>\r\n<th style="background-color: #f5f5f5;">Claudia Sumet</th>\r\n<th style="background-color: #f5f5f5;">31</th>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<strong>Grups A</strong>: 28 de setembre\r\n<strong>Grups B</strong>: 29 de setembre\r\n\r\n<strong>Horari d''atenció\r\n</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat.\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Marta Lorem</td>\r\n<td>Dll. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Jordi Ipsum</td>\r\n<td>Dm. 16:00-17:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Joan Dolor</td>\r\n<td>Dm. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Cristina Estum</td>\r\n<td>Dll. 18:00-19:00</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Claudia Sumet</td>\r\n<td>Dv. 17:00-18:30</td>\r\n</tr>\r\n<tr>\r\n<td><img class="alignnone" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg" alt="" width="36" height="36" /></td>\r\n<td>Sara Lorem</td>\r\n<td>Dj. 15:00-16:00</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n&nbsp;', 'Horaris i professorat', '', 'publish', 'closed', 'closed', '', 'horaris', '', '', '2016-06-20 15:55:16', '2016-06-20 14:55:16', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8459', 10, 'page', '', 0),
(8461, 1, '2016-06-15 09:07:15', '2016-06-15 08:07:15', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" rel="attachment wp-att-8682"><img class="size-full wp-image-8682 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png" alt="Purchase Order-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Programació', '', 'publish', 'closed', 'closed', '', 'programacio', '', '', '2016-06-20 15:57:11', '2016-06-20 14:57:11', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8461', 20, 'page', '', 0),
(8463, 1, '2016-06-15 09:08:10', '2016-06-15 08:08:10', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" rel="attachment wp-att-8680"><img class="size-full wp-image-8680 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png" alt="Literature-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Llibres i lectures', '', 'publish', 'closed', 'closed', '', 'llibres-i-lectures', '', '', '2016-06-20 16:24:56', '2016-06-20 15:24:56', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8463', 30, 'page', '', 0),
(8465, 1, '2016-06-15 09:18:09', '2016-06-15 08:18:09', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" rel="attachment wp-att-8677"><img class=" wp-image-8677 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png" alt="Collaboration-96" width="74" height="74" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac.\r\n\r\nNullam non vulputate elit, ac vestibulum felis. Quisque quis odio pretium, condimentum purus ut, cursus tortor. Etiam at convallis massa, et euismod felis. Suspendisse dignissim posuere aliquam. Cras luctus neque eu diam semper mattis. Donec ut tortor mi. Ut accumsan leo non tincidunt luctus.', 'Grups de conversa', '', 'publish', 'closed', 'closed', '', 'grups-de-conversa', '', '', '2016-06-20 16:24:31', '2016-06-20 15:24:31', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8465', 40, 'page', '', 0),
(8467, 1, '2016-06-15 09:19:34', '2016-06-15 08:19:34', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" rel="attachment wp-att-8691"><img class="wp-image-8691 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png" alt="Comedy-96" width="65" height="65" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel consequat mauris. Suspendisse vitae odio vitae justo suscipit tincidunt sit amet sit amet erat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a mauris et justo aliquet feugiat in et enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eleifend eu erat non fringilla. Proin hendrerit porta enim, sed ultrices sapien congue ac. Nullam non vulputate elit, ac vestibulum felis.\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Activitats', '', 'publish', 'closed', 'closed', '', 'activitats', '', '', '2016-06-20 16:22:50', '2016-06-20 15:22:50', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8467', 50, 'page', '', 0),
(8472, 1, '2016-06-15 10:31:04', '2016-06-15 09:31:04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget gravida nisi. Vivamus semper lacinia felis, in fermentum est porta sit amet. Morbi tincidunt, nisl ut aliquam sodales, tortor orci faucibus nibh, sed laoreet ante felis sed est. Quisque elementum turpis eu euismod consectetur. Aliquam ullamcorper dolor vel pellentesque porttitor. Morbi sagittis tristique hendrerit. Aliquam mattis risus sed interdum aliquet. Suspendisse volutpat tincidunt quam ac imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\nIn quis aliquet ipsum. Ut pulvinar sit amet elit ac cursus. Duis consequat tortor eu tortor pellentesque bibendum. Sed volutpat laoreet consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris imperdiet nisi felis, et molestie justo pharetra in. Fusce id est vel nulla volutpat blandit id in lacus. Donec finibus mollis rhoncus. Vivamus lacinia volutpat nulla, ac dignissim dolor. Morbi volutpat, neque ut tincidunt eleifend, ipsum ligula molestie leo, facilisis molestie purus dui nec tortor. Phasellus eu varius urna. Donec maximus fringilla malesuada. Quisque rhoncus lorem enim, eget scelerisque diam dignissim sed.', 'Preinscripció', '', 'publish', 'closed', 'closed', '', 'preinscripcio', '', '', '2016-06-15 10:31:12', '2016-06-15 09:31:12', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8472', 25, 'page', '', 0),
(8475, 1, '2016-06-15 10:42:16', '2016-06-15 09:42:16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget gravida nisi. Vivamus semper lacinia felis, in ferm.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Selecció_999315.png" rel="attachment wp-att-8589"><img class="wp-image-8589 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Selecció_999315.png" alt="Selecció_999(315)" width="392" height="256" /></a><a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/PREINSCRIPCIÓ.jpg" rel="attachment wp-att-8476">\r\n</a>Entum est porta sit amet. Morbi tincidunt, nisl ut aliquam sodales, tortor orci faucibus nibh, sed laoreet ante felis sed est. Quisque elementum turpis eu euismod consectetur. Aliquam ullamcorper dolor vel pellentesque porttitor. Morbi sagittis tristique hendrerit. Aliquam mattis risus sed interdum aliquet. Suspendisse volutpat tincidunt quam ac imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;\r\n\r\n&nbsp;', 'Preinscripció', '', 'publish', 'open', 'open', '', 'preinscripcio', '', '', '2016-06-20 08:47:10', '2016-06-20 07:47:10', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8475', 0, 'post', '', 0),
(8476, 1, '2016-06-15 10:41:56', '2016-06-15 09:41:56', '', 'PREINSCRIPCIÓ', '', 'inherit', 'open', 'closed', '', 'preinscripcio-2', '', '', '2016-06-15 10:41:56', '2016-06-15 09:41:56', '', 8475, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/PREINSCRIPCIÓ.jpg', 0, 'attachment', 'image/jpeg', 0),
(8479, 1, '2016-06-15 13:02:10', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-15 13:02:10', '0000-00-00 00:00:00', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8479', 1, 'nav_menu_item', '', 0),
(8482, 1, '2016-06-16 13:00:35', '2016-06-16 12:00:35', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in.\r\n\r\n&nbsp;\r\n\r\nPodeu consultar la taula d''equivalències <a href="http://xtec.gencat.cat/web/.content/alfresco/d/d/workspace/SpacesStore/0068/9d8483a2-5b29-4c1b-a811-8c9fdde7b6e9/equil-alemany.pdf">aquí</a>.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:54:39', '2016-06-23 09:54:39', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8482', 100, 'page', '', 0),
(8484, 1, '2016-06-16 13:03:41', '2016-06-16 12:03:41', '', 'Carnet d''estudiant', '', 'publish', 'closed', 'closed', '', 'carnet-destudiant', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8411, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8484', 35, 'nav_menu_item', '', 0),
(8486, 1, '2016-06-16 13:04:56', '2016-06-16 12:04:56', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:55:52', '2016-06-23 09:55:52', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8486', 100, 'page', '', 0),
(8488, 1, '2016-06-16 13:06:10', '2016-06-16 12:06:10', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in.\r\n\r\nPodeu consultar la taula d''equivalències <a href="http://xtec.gencat.cat/web/.content/alfresco/d/d/workspace/SpacesStore/0010/03e276d8-9791-4c88-9f9a-4dbf87b2fb97/equil-frances.pdf">aquí</a>.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:56:34', '2016-06-23 09:56:34', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8488', 100, 'page', '', 0),
(8490, 1, '2016-06-16 13:06:43', '2016-06-16 12:06:43', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in.\r\n\r\nPodeu consultar la taula d''equivalències <a href="http://xtec.gencat.cat/web/.content/alfresco/d/d/workspace/SpacesStore/0031/31edd239-3bb4-4118-97f9-2bd977cbe00e/equil-italia.pdf" target="_blank">aquí</a>.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:57:36', '2016-06-23 09:57:36', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8490', 100, 'page', '', 0),
(8492, 1, '2016-06-16 13:07:50', '2016-06-16 12:07:50', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in. Curabitur eu risus non odio sagittis rhoncus sed in velit. Sed at dapibus lorem. Donec varius, urna non fringilla pellentesque, nulla urna suscipit ipsum, eget tincidunt tellus odio et mi.\r\n\r\nPodeu consultar les taules d''equivalències <a href="http://xtec.gencat.cat/web/.content/curriculum/idiomes/certificats/documents/equivalencies-angles.pdf" target="_blank">aquí</a>.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:54:52', '2016-06-23 09:54:52', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8492', 100, 'page', '', 0),
(8494, 1, '2016-06-16 13:09:26', '2016-06-16 12:09:26', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" rel="attachment wp-att-8687"><img class="size-full wp-image-8687 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png" alt="Diploma 1-96" width="96" height="96" /></a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in. Curabitur eu risus non odio sagittis rhoncus sed in velit. Sed at dapibus lorem. Donec varius, urna non fringilla pellentesque, nulla urna suscipit ipsum, eget tincidunt tellus odio et mi. Cras efficitur efficitur augue sit amet iaculis. Quisque blandit et urna nec malesuada.', 'Equivalències', '', 'publish', 'closed', 'closed', '', 'equivalencies', '', '', '2016-06-23 10:55:36', '2016-06-23 09:55:36', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8494', 100, 'page', '', 0),
(8496, 1, '2016-06-16 13:20:13', '2016-06-16 12:20:13', 'Node d&#039;Alemany', 'Alemany', '', 'publish', 'closed', 'closed', '', 'alemany', '', '', '2016-06-16 13:20:13', '2016-06-16 12:20:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/alemany/', 0, 'forum', '', 0),
(8497, 1, '2016-06-16 13:22:06', '2016-06-16 12:22:06', 'Node de Francès', 'Francès', '', 'publish', 'closed', 'closed', '', 'frances', '', '', '2016-06-16 13:22:06', '2016-06-16 12:22:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/frances/', 0, 'forum', '', 0),
(8498, 1, '2016-06-16 13:23:39', '2016-06-16 12:23:39', 'Node d&#039;italià', 'Italià', '', 'publish', 'closed', 'closed', '', 'italia', '', '', '2016-06-16 13:23:39', '2016-06-16 12:23:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/italia/', 0, 'forum', '', 0),
(8499, 1, '2016-06-16 13:26:22', '2016-06-16 12:26:22', 'Node català', 'Català', '', 'publish', 'closed', 'closed', '', 'catala', '', '', '2016-06-16 13:26:22', '2016-06-16 12:26:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/catala/', 0, 'forum', '', 0),
(8500, 1, '2016-06-16 13:27:33', '2016-06-16 12:27:33', 'Node d&#039;espanyol', 'Espanyol', '', 'publish', 'closed', 'closed', '', 'espanyol', '', '', '2016-06-16 13:27:33', '2016-06-16 12:27:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/forums/forum/espanyol/', 0, 'forum', '', 0),
(8502, 1, '2016-06-16 14:01:30', '2016-06-16 13:01:30', '', 'L''escola', '', 'publish', 'closed', 'closed', '', 'lescola-2', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8502', 1, 'nav_menu_item', '', 0),
(8503, 1, '2016-06-16 14:04:50', '2016-06-16 13:04:50', '', 'Cursos', '', 'publish', 'closed', 'closed', '', 'cursos', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8503', 11, 'nav_menu_item', '', 0),
(8504, 1, '2016-06-16 14:04:51', '2016-06-16 13:04:51', '', 'Secretaria', '', 'publish', 'closed', 'closed', '', 'secretaria', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8504', 23, 'nav_menu_item', '', 0),
(8505, 1, '2016-06-16 14:05:53', '2016-06-16 13:05:53', '', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8505', 33, 'nav_menu_item', '', 0),
(8506, 1, '2016-06-16 14:08:30', '2016-06-16 13:08:30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel ornare elit, in porta tellus. Sed facilisis massa odio, quis hendrerit sapien finibus volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tincidunt lacus et euismod aliquet. Phasellus ornare laoreet neque, sit amet suscipit orci egestas in. Curabitur eu risus non odio sagittis rhoncus sed in velit. Sed at dapibus lorem. Donec varius, urna non fringilla pellentesque, nulla urna suscipit ipsum, eget tincidunt tellus odio et mi. Cras efficitur efficitur augue sit amet iaculis. Quisque blandit et urna nec malesuada. Integer vulputate eleifend purus id maximus. Ut consectetur accumsan enim, vitae fermentum erat porttitor vitae. Mauris vel congue leo, et porta sapien.', 'Absències del professorat', '', 'publish', 'closed', 'closed', '', 'absencies-del-professorat', '', '', '2016-06-16 15:20:48', '2016-06-16 14:20:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8506', 0, 'page', '', 0),
(8531, 1, '2016-06-17 10:45:07', '2016-06-17 09:45:07', '<strong>ACCÉS AL NIVELL C1 – CURS 2016-2017</strong>\r\n\r\nEls alumnes que es vulguin matricular al nivell C1 s''hauran de preinscriure de l''1 al 5 de setembre de 2016. Descarregueu <a href="http://www.eoiblanes.cat/media/files/matr%C3%ADcula/ACC%C3%89S%20C1_INFO%20WEB.pdf" target="_blank">aquest document</a> per veure tota la informació.', 'C1', '', 'publish', 'closed', 'closed', '', 'c1', '', '', '2016-06-20 09:34:11', '2016-06-20 08:34:11', '', 8161, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8531', 30, 'page', '', 0),
(8549, 1, '2016-06-17 13:35:17', '2016-06-17 12:35:17', '<ul>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/renunciar-als-drets-de-la-matricula-i-sol-licitar-reserva-de-placa-per-al-curs-vinent/?bp-attachment=Renunciar-matricula-sollicitar-reserva_NOU1.doc" target="_blank">Renunciar als drets de matrícula i sol·licitar reserva de plaça per al curs vinent</a></li>\r\n	<li><a href="https://pwc-int.educacio.intranet/agora/mastereoi/docs/renunciar-als-drets-de-la-matricula-i-sol-licitar-reserva-de-placa-per-al-curs-vinent/?bp-attachment=Renunciar-matricula-no-sollicitar-reserva_NOU.doc">Renunciar als drets de matrícula i NO sol·licitar reserva de plaça per al curs vinent</a></li>\r\n</ul>', 'Renunciar als drets de la matrícula', '', 'publish', 'open', 'closed', '', 'renunciar-als-drets-de-la-matricula-i-sol-licitar-reserva-de-placa-per-al-curs-vinent', '', '', '2016-06-17 14:01:34', '2016-06-17 13:01:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8550, 1, '2016-06-17 13:34:08', '2016-06-17 12:34:08', '', 'Renunciar-matricula-sollicitar-reserva_NOU1', '', 'inherit', 'open', 'closed', '', 'renunciar-matricula-sollicitar-reserva_nou1', '', '', '2016-06-17 13:34:08', '2016-06-17 12:34:08', '', 8549, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8549/Renunciar-matricula-sollicitar-reserva_NOU1.doc', 0, 'attachment', 'application/msword', 0),
(8552, 1, '2016-06-17 13:40:05', '2016-06-17 12:40:05', '', 'logo-escola', '', 'inherit', 'open', 'closed', '', 'logo-escola', '', '', '2016-06-17 13:40:05', '2016-06-17 12:40:05', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/logo-escola.png', 0, 'attachment', 'image/png', 0),
(8561, 1, '2016-06-17 14:01:08', '2016-06-17 13:01:08', '', 'Renunciar-matricula-no-sollicitar-reserva_NOU', '', 'inherit', 'open', 'closed', '', 'renunciar-matricula-no-sollicitar-reserva_nou', '', '', '2016-06-17 14:01:08', '2016-06-17 13:01:08', '', 8549, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8549/Renunciar-matricula-no-sollicitar-reserva_NOU.doc', 0, 'attachment', 'application/msword', 0),
(8563, 1, '2016-06-17 14:05:14', '2016-06-17 13:05:14', '', 'Sol·licitud trasllat de matrícula viva', '', 'publish', 'open', 'closed', '', 'sol%c2%b7licitud-trasllat-de-matricula-viva', '', '', '2016-06-17 14:05:14', '2016-06-17 13:05:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8564, 1, '2016-06-17 14:04:21', '2016-06-17 13:04:21', '', 'Sol-trasllat-matricula-viva', '', 'inherit', 'open', 'closed', '', 'sol-trasllat-matricula-viva', '', '', '2016-06-17 14:04:21', '2016-06-17 13:04:21', '', 8563, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8563/Sol-trasllat-matricula-viva.doc', 0, 'attachment', 'application/msword', 0),
(8566, 1, '2016-06-17 14:06:47', '2016-06-17 13:06:47', '', 'Sol·licitud de trasllat d’expedient', '', 'publish', 'open', 'closed', '', 'sol%c2%b7licitud-de-trasllat-dexpedient', '', '', '2016-06-17 14:07:02', '2016-06-17 13:07:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8568, 1, '2016-06-17 14:06:34', '2016-06-17 13:06:34', '', 'SOL.LICITUD-TRASLLATS-DEXPEDIENT', '', 'inherit', 'open', 'closed', '', 'sol-licitud-trasllats-dexpedient', '', '', '2016-06-17 14:06:34', '2016-06-17 13:06:34', '', 8566, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8566/SOL.LICITUD-TRASLLATS-DEXPEDIENT.pdf', 0, 'attachment', 'application/pdf', 0),
(8570, 1, '2016-06-17 14:08:18', '2016-06-17 13:08:18', '', 'Sol.licitud de revisió de qualificacions finals', '', 'publish', 'open', 'closed', '', 'sol-licitud-de-revisio-de-qualificacions-finals', '', '', '2016-06-17 14:08:18', '2016-06-17 13:08:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8571, 1, '2016-06-17 14:07:50', '2016-06-17 13:07:50', '', 'Sol-revisio-qualificacions', '', 'inherit', 'open', 'closed', '', 'sol-revisio-qualificacions', '', '', '2016-06-17 14:07:50', '2016-06-17 13:07:50', '', 8570, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8570/Sol-revisio-qualificacions.doc', 0, 'attachment', 'application/msword', 0),
(8573, 1, '2016-06-17 14:10:08', '2016-06-17 13:10:08', '', 'Justificació de faltes d’assistència de menors', '', 'publish', 'open', 'closed', '', 'justificacio-de-faltes-dassistencia-de-menors', '', '', '2016-06-17 14:10:08', '2016-06-17 13:10:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8574, 1, '2016-06-17 14:08:59', '2016-06-17 13:08:59', '', 'justif-faltes-menors', '', 'inherit', 'open', 'closed', '', 'justif-faltes-menors', '', '', '2016-06-17 14:08:59', '2016-06-17 13:08:59', '', 8573, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8573/justif-faltes-menors.doc', 0, 'attachment', 'application/msword', 0),
(8576, 1, '2016-06-17 14:11:18', '2016-06-17 13:11:18', '', 'Convocatòria addicional', '', 'publish', 'open', 'closed', '', 'convocatoria-addicional', '', '', '2016-06-17 14:11:19', '2016-06-17 13:11:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8577, 1, '2016-06-17 14:10:52', '2016-06-17 13:10:52', '', 'convocatoria-addicional', '', 'inherit', 'open', 'closed', '', 'convocatoria-addicional', '', '', '2016-06-17 14:10:52', '2016-06-17 13:10:52', '', 8576, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8576/convocatoria-addicional.doc', 0, 'attachment', 'application/msword', 0),
(8580, 1, '2016-06-17 14:13:28', '2016-06-17 13:13:28', '', 'Sol·licitud canvi d’horari', '', 'publish', 'open', 'closed', '', 'solicitud-canvi-dhorari', '', '', '2016-06-20 12:09:03', '2016-06-20 11:09:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8581, 1, '2016-06-17 14:13:12', '2016-06-17 13:13:12', '', 'sol-canvi-horari', '', 'inherit', 'open', 'closed', '', 'sol-canvi-horari', '', '', '2016-06-17 14:13:12', '2016-06-17 13:13:12', '', 8580, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8580/sol-canvi-horari.doc', 0, 'attachment', 'application/msword', 0),
(8583, 1, '2016-06-17 14:14:30', '2016-06-17 13:14:30', '', 'Sol·licitud de permuta', '', 'publish', 'open', 'closed', '', 'sol%c2%b7licitud-de-permuta', '', '', '2016-06-17 14:14:30', '2016-06-17 13:14:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8584, 1, '2016-06-17 14:14:13', '2016-06-17 13:14:13', '', 'sol-permuta', '', 'inherit', 'open', 'closed', '', 'sol-permuta', '', '', '2016-06-17 14:14:13', '2016-06-17 13:14:13', '', 8583, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8583/sol-permuta.doc', 0, 'attachment', 'application/msword', 0),
(8586, 1, '2016-06-17 14:15:23', '2016-06-17 13:15:23', '', 'Imprès de matrícula', '', 'publish', 'open', 'closed', '', 'impres-de-matricula', '', '', '2016-06-17 14:15:23', '2016-06-17 13:15:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8587, 1, '2016-06-17 14:15:07', '2016-06-17 13:15:07', '', 'IMPRES-MATRICULA_NOU', '', 'inherit', 'open', 'closed', '', 'impres-matricula_nou', '', '', '2016-06-17 14:15:07', '2016-06-17 13:15:07', '', 8586, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8586/IMPRES-MATRICULA_NOU.pdf', 0, 'attachment', 'application/pdf', 0),
(8589, 1, '2016-06-20 08:46:49', '2016-06-20 07:46:49', '', 'Selecció_999(315)', '', 'inherit', 'open', 'closed', '', 'seleccio_999315', '', '', '2016-06-20 08:46:49', '2016-06-20 07:46:49', '', 8475, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Selecció_999315.png', 0, 'attachment', 'image/png', 0),
(8594, 1, '2016-06-20 08:58:50', '2016-06-20 07:58:50', 'Document genèric per fer una instància. Abans de fer una petició amb aquest model, reviseu que no hi hagi un model més adient.', 'Instàncies', '', 'publish', 'open', 'closed', '', 'intancies', '', '', '2016-06-20 09:19:53', '2016-06-20 08:19:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8597, 1, '2016-06-20 09:19:44', '2016-06-20 08:19:44', '', 'instancies', '', 'inherit', 'open', 'closed', '', 'instancies', '', '', '2016-06-20 09:19:44', '2016-06-20 08:19:44', '', 8594, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/bp-attachments/8594/instancies.doc', 0, 'attachment', 'application/msword', 0),
(8608, 1, '2016-06-20 11:10:50', '2016-06-20 10:10:50', '<strong>OBJECTIUS GENERALS, OBJECTIUS PER DESTRESES i COMPETÈNCIES PER DESTRESES</strong>\r\n\r\n<a href="http://xtec.gencat.cat/web/.content/alfresco/d/d/workspace/SpacesStore/0076/b4d8f521-244f-4bb5-b720-45c9940b65a7/curric-eoi-comu-basic.pdf">http://xtec.gencat.cat/web/.content/alfresco/d/d/workspace/SpacesStore/0076/b4d8f521-244f-4bb5-b720-45c9940b65a7/curric-eoi-comu-basic.pdf</a>', 'NIVELL BÀSIC (General)', '', 'publish', 'open', 'closed', '', 'nivell-basic-general', '', '', '2016-06-20 11:10:50', '2016-06-20 10:10:50', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/docs/', 0, 'bp_doc', '', 0),
(8610, 1, '2016-06-20 11:15:09', '2016-06-20 10:15:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus erat lacus, at convallis ante pulvinar placerat. Nulla dolor justo, sagittis id faucibus eu, congue eu diam. Aenean in quam pellentesque, rutrum turpis vitae, sodales nulla. Fusce dui felis, cursus eget turpis nec, pharetra condimentum erat. Donec congue sit amet lorem a feugiat. Praesent scelerisque vulputate efficitur. Duis quis mauris sem. Morbi ut imperdiet metus. Vestibulum vestibulum massa elit, vel tempus nulla ullamcorper vitae. Phasellus congue, dolor quis tincidunt rhoncus, odio turpis elementum tellus, ac pellentesque sapien arcu ac eros. Aenean lobortis arcu est, in dictum libero consequat ac. Donec vitae enim eu ipsum finibus efficitur. Etiam vulputate eget ligula et imperdiet. Donec felis ante, pharetra eu elit id, auctor efficitur lectus.', 'Pla d''estudis', '', 'publish', 'closed', 'closed', '', 'pla-destudis', '', '', '2016-06-20 13:32:36', '2016-06-20 12:32:36', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8610', 40, 'page', '', 0),
(8612, 1, '2016-06-20 11:15:31', '0000-00-00 00:00:00', '', 'Normes i funcionament (NOFC)', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-20 11:15:31', '2016-06-20 10:15:31', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8612', 0, 'page', '', 0),
(8613, 1, '2016-06-20 11:17:12', '2016-06-20 10:17:12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus erat lacus, at convallis ante pulvinar placerat. Nulla dolor justo, sagittis id faucibus eu, congue eu diam. Aenean in quam pellentesque, rutrum turpis vitae, sodales nulla. Fusce dui felis, cursus eget turpis nec, pharetra condimentum erat. Donec congue sit amet lorem a feugiat. Praesent scelerisque vulputate efficitur. Duis quis mauris sem. Morbi ut imperdiet metus. Vestibulum vestibulum massa elit, vel tempus nulla ullamcorper vitae. Phasellus congue, dolor quis tincidunt rhoncus, odio turpis elementum tellus, ac pellentesque sapien arcu ac eros. Aenean lobortis arcu est, in dictum libero consequat ac. Donec vitae enim eu ipsum finibus efficitur. Etiam vulputate eget ligula et imperdiet. Donec felis ante, pharetra eu elit id, auctor efficitur lectus.', 'Currículum', '', 'publish', 'closed', 'closed', '', 'curriculum', '', '', '2016-06-20 12:56:10', '2016-06-20 11:56:10', '', 8610, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8613', 20, 'page', '', 0),
(8615, 1, '2016-06-20 11:18:41', '2016-06-20 10:18:41', '', 'Pla d''estudis', '', 'publish', 'closed', 'closed', '', '8615', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8615', 5, 'nav_menu_item', '', 0),
(8616, 1, '2016-06-20 11:18:41', '2016-06-20 10:18:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8616', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 8610, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8616', 6, 'nav_menu_item', '', 0),
(8617, 1, '2016-06-20 11:18:41', '2016-06-20 10:18:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8617', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 8610, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8617', 7, 'nav_menu_item', '', 0),
(8619, 1, '2016-06-20 11:24:25', '2016-06-20 10:24:25', '<strong><span style="text-decoration: underline;">Directora</span>\r\n</strong>Sandra Ipsum\r\nHorari d''atenció: Dimarts de 12 a 13 h\r\n\r\n<strong><span style="text-decoration: underline;">Cap d''estudis</span>\r\n</strong>Isabel Amet\r\nHorari d''atenció: Dimecres de 12 a 13 h\r\n<em>(Per a assumptes relacionats amb el funcionament de les classes, el professorat, l’avaluació, les repeticions de curs, les renúncies i els canvis d’horari)</em>\r\n\r\n<span style="text-decoration: underline;"><strong>Secretària</strong></span>\r\nMarta Lorem\r\nHorari d''atenció: Dijous de 12 a 13 h\r\n(Per a assumptes relacionats amb la matrícula, les taxes i els certificats)', 'Equip directiu', '', 'publish', 'closed', 'closed', '', 'equip-directiu', '', '', '2016-06-20 16:32:02', '2016-06-20 15:32:02', '', 8141, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8619', 10, 'page', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8621, 1, '2016-06-20 11:24:49', '2016-06-20 10:24:49', 'El Consell Escolar és l’òrgan de participació de la comunitat educativa que s’encarrega del control i gestió de l’escola, amb funcions de seguiment i avaluació de la programació i de les activitats que es duen a terme a L’EOI XXXX. El consell escolar de l’EOI XXXX està format per:\r\n\r\n<strong>Representants de l’equip directiu</strong>\r\n\r\nDirectora: Pilar Lorem\r\nSecretària: Marta Ipsum\r\nCap d''estudis: Isabel Dolor\r\n\r\n<strong>Representants del professorat</strong>\r\n\r\nSonia Lorem, Marta Ipsum i Maria Dolor Sit\r\n\r\n<strong>Representants de l''alumnat</strong>\r\n\r\nCarmen Lorem, Eva Impsum, Roser Dolor i Edgar Sit\r\n\r\n<strong>Representant del personal d’administració i serveis (PAS)</strong>\r\n\r\nAriadna Lorem Ipsum\r\n\r\n<strong>Representant de l’Ajuntament</strong>\r\n\r\nSusana Ipsum', 'Consell escolar', '', 'publish', 'closed', 'closed', '', 'consell-escolar', '', '', '2016-06-20 11:36:59', '2016-06-20 10:36:59', '', 8141, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8621', 20, 'page', '', 0),
(8623, 1, '2016-06-20 11:26:35', '2016-06-20 10:26:35', '<strong>Cap de departament d''Alemany\r\n</strong>Anna Lorem\r\ncap.alemany@eoi.cat\r\nHorari d’atenció: Dilluns de 12 a 13 h\r\n\r\n<strong>Cap de departament d''Anglès</strong>\r\nSarah Ipsum\r\ncap.alemany@eoi.cat\r\nHorari d’atenció: Dimarts de 12 a 13 h\r\n\r\n<strong>Cap departament de Català</strong>\r\nMarta Lorem\r\ncap.catala@eoi.cat\r\nHorari d’atenció: Dimecres de 12 a 13 h\r\n\r\n<strong>Cap departament de Español</strong>\r\nPedro Ipsum\r\ncap.espanyol@eoi.cat\r\nHorari d’atenció: Dimecres de 12 a 13 h\r\n\r\n<strong>Cap departament de Francès</strong>\r\nCatherine Dolor\r\ncap.frances@eoi.cat\r\nHorari d’atenció: Dimecres de 12 a 13 h\r\n\r\n<strong>Cap departament de Italià</strong>\r\nJoana Ipsum\r\ncap.italia@eoi.cat\r\nHorari d’atenció: Dimecres de 12 a 13 h', 'Càrrecs de coordinació', '', 'publish', 'closed', 'closed', '', 'carrecs-de-coordinacio', '', '', '2016-06-20 16:35:38', '2016-06-20 15:35:38', '', 8141, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8623', 15, 'page', '', 0),
(8635, 1, '2016-06-20 11:48:09', '2016-06-20 10:48:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus erat lacus, at convallis ante pulvinar placerat. Nulla dolor justo, sagittis id faucibus eu, congue eu diam. Aenean in quam pellentesque, rutrum turpis vitae, sodales nulla. Fusce dui felis, cursus eget turpis nec, pharetra condimentum erat. Donec congue sit amet lorem a feugiat. Praesent scelerisque vulputate efficitur. Duis quis mauris sem. Morbi ut imperdiet metus. Vestibulum vestibulum massa elit, vel tempus nulla ullamcorper vitae. Phasellus congue, dolor quis tincidunt rhoncus, odio turpis elementum tellus, ac pellentesque sapien arcu ac eros. Aenean lobortis arcu est, in dictum libero consequat ac. Donec vitae enim eu ipsum finibus efficitur. Etiam vulputate eget ligula et imperdiet. Donec felis ante, pharetra eu elit id, auctor efficitur lectus.', 'Projecte educatiu de centre (PEC)', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu-de-centre-pec', '', '', '2016-06-20 13:32:20', '2016-06-20 12:32:20', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8635', 60, 'page', '', 0),
(8637, 1, '2016-06-20 11:49:01', '2016-06-20 10:49:01', '', 'Projecte educatiu (PEC)', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu-pec', '', '', '2016-06-29 13:25:17', '2016-06-29 12:25:17', '', 806, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8637', 9, 'nav_menu_item', '', 0),
(8651, 1, '2016-06-20 13:27:58', '2016-06-20 12:27:58', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 16:20:21', '2016-06-20 15:20:21', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8651', 65, 'page', '', 0),
(8662, 1, '2016-06-20 14:52:46', '2016-06-20 13:52:46', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 15:13:16', '2016-06-20 14:13:16', '', 8185, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8662', 90, 'page', '', 0),
(8665, 1, '2016-06-20 14:57:57', '2016-06-20 13:57:57', '', 'Film-96', '', 'inherit', 'open', 'closed', '', 'film-96', '', '', '2016-06-20 14:57:57', '2016-06-20 13:57:57', '', 8662, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Film-96.png', 0, 'attachment', 'image/png', 0),
(8666, 1, '2016-06-20 14:58:16', '2016-06-20 13:58:16', '', 'CD-96', '', 'inherit', 'open', 'closed', '', 'cd-96', '', '', '2016-06-20 14:58:16', '2016-06-20 13:58:16', '', 8662, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/CD-96.png', 0, 'attachment', 'image/png', 0),
(8673, 1, '2016-06-20 15:03:48', '2016-06-20 14:03:48', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 16:19:15', '2016-06-20 15:19:15', '', 8455, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8673', 80, 'page', '', 0),
(8677, 1, '2016-06-20 15:07:55', '2016-06-20 14:07:55', '', 'Collaboration-96', '', 'inherit', 'open', 'closed', '', 'collaboration-96', '', '', '2016-06-20 15:07:55', '2016-06-20 14:07:55', '', 8212, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Collaboration-96.png', 0, 'attachment', 'image/png', 0),
(8680, 1, '2016-06-20 15:10:12', '2016-06-20 14:10:12', '', 'Literature-96', '', 'inherit', 'open', 'closed', '', 'literature-96', '', '', '2016-06-20 15:10:12', '2016-06-20 14:10:12', '', 8210, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Literature-96.png', 0, 'attachment', 'image/png', 0),
(8682, 1, '2016-06-20 15:11:41', '2016-06-20 14:11:41', '', 'Purchase Order-96', '', 'inherit', 'open', 'closed', '', 'purchase-order-96', '', '', '2016-06-20 15:11:41', '2016-06-20 14:11:41', '', 8216, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Purchase-Order-96.png', 0, 'attachment', 'image/png', 0),
(8684, 1, '2016-06-20 15:13:02', '2016-06-20 14:13:02', '', 'Box Filled-96', '', 'inherit', 'open', 'closed', '', 'box-filled-96', '', '', '2016-06-20 15:13:02', '2016-06-20 14:13:02', '', 8662, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png', 0, 'attachment', 'image/png', 0),
(8687, 1, '2016-06-20 15:14:11', '2016-06-20 14:14:11', '', 'Diploma 1-96', '', 'inherit', 'open', 'closed', '', 'diploma-1-96', '', '', '2016-06-20 15:14:11', '2016-06-20 14:14:11', '', 8482, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Diploma-1-96.png', 0, 'attachment', 'image/png', 0),
(8690, 1, '2016-06-20 15:16:13', '2016-06-20 14:16:13', '', 'Drama-96', '', 'inherit', 'open', 'closed', '', 'drama-96', '', '', '2016-06-20 15:16:13', '2016-06-20 14:16:13', '', 8214, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Drama-96.png', 0, 'attachment', 'image/png', 0),
(8691, 1, '2016-06-20 15:16:13', '2016-06-20 14:16:13', '', 'Comedy-96', '', 'inherit', 'open', 'closed', '', 'comedy-96', '', '', '2016-06-20 15:16:13', '2016-06-20 14:16:13', '', 8214, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Comedy-96.png', 0, 'attachment', 'image/png', 0),
(8695, 1, '2016-06-20 15:18:48', '2016-06-20 14:18:48', '', 'Clock-96', '', 'inherit', 'open', 'closed', '', 'clock-96', '', '', '2016-06-20 15:18:48', '2016-06-20 14:18:48', '', 8206, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Clock-96.png', 0, 'attachment', 'image/png', 0),
(8742, 1, '2016-06-20 16:13:14', '2016-06-20 15:13:14', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 16:13:37', '2016-06-20 15:13:37', '', 8189, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8742', 80, 'page', '', 0),
(8745, 1, '2016-06-20 16:15:33', '2016-06-20 15:15:33', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 16:15:33', '2016-06-20 15:15:33', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8745', 80, 'page', '', 0),
(8747, 1, '2016-06-20 16:17:58', '2016-06-20 15:17:58', '<a href="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" rel="attachment wp-att-8684"><img class=" wp-image-8684 alignleft" src="https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/Box-Filled-96.png" alt="Box Filled-96" width="81" height="81" /></a>Cras at magna erat. Sed eget nunc eget mi accumsan posuere sed nec est. Maecenas suscipit malesuada arcu eu fringilla. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis. Duis sollicitudin ex blandit rhoncus varius. Donec sollicitudin sapien auctor tellus porttitor, non scelerisque orci lobortis.\r\n\r\n<strong>Sed eget nunc</strong>\r\n<ul>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>\r\n<strong>Lorem ipsum\r\n</strong>\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet,<a href="#"> consectetur adipiscing elit.</a></li>\r\n	<li><a href="#">Proin vel mauris</a> ut felis euismod semper <a href="#">vitae</a> et augue.</li>\r\n	<li><a href="#">Vestibulum et lorem vitae mi feugiat porta.</a></li>\r\n	<li>Fusce ut orci sed purus egestas bibendum vel vel<a href="#"> metus</a>.</li>\r\n	<li>Aenean vehicula nunc id convallis <a href="#">vehicula</a>.</li>\r\n</ul>', 'Recursos d''autoaprenentatge', '', 'publish', 'closed', 'closed', '', 'recursos-dautoaprenentatge', '', '', '2016-06-20 16:17:58', '2016-06-20 15:17:58', '', 8195, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8747', 80, 'page', '', 0),
(8777, 1, '2016-06-20 16:46:16', '2016-06-20 15:46:16', '', 'carnet', '', 'inherit', 'open', 'closed', '', 'carnet', '', '', '2016-06-20 16:46:16', '2016-06-20 15:46:16', '', 8448, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/carnet.pdf', 0, 'attachment', 'application/pdf', 0),
(8779, 1, '2016-06-20 16:48:08', '2016-06-20 15:48:08', '', 'carnet_eoi', '', 'inherit', 'open', 'closed', '', 'carnet_eoi', '', '', '2016-06-20 16:48:08', '2016-06-20 15:48:08', '', 8448, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/carnet_eoi.png', 0, 'attachment', 'image/png', 0),
(8788, 1, '2016-06-20 16:58:07', '2016-06-20 15:58:07', '', 'biblioteca-fons-nova', '', 'inherit', 'open', 'closed', '', 'biblioteca-fons-nova', '', '', '2016-06-20 16:58:07', '2016-06-20 15:58:07', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/biblioteca-fons-nova.jpg', 0, 'attachment', 'image/jpeg', 0),
(8789, 1, '2016-06-20 16:58:34', '2016-06-20 15:58:34', '', 'biblioteca-fons-antiga', '', 'inherit', 'open', 'closed', '', 'biblioteca-fons-antiga', '', '', '2016-06-20 16:58:34', '2016-06-20 15:58:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/biblioteca-fons-antiga.jpg', 0, 'attachment', 'image/jpeg', 0),
(8795, 1, '2016-06-20 17:03:53', '2016-06-20 16:03:53', '', 'Calendar-96', '', 'inherit', 'open', 'closed', '', 'calendar-96', '', '', '2016-06-20 17:03:53', '2016-06-20 16:03:53', '', 608, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2015/11/Calendar-96.png', 0, 'attachment', 'image/png', 0),
(8800, 1, '2016-06-23 11:14:50', '2016-06-23 10:14:50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque convallis enim sit amet posuere. Vivamus gravida magna vitae neque rutrum pulvinar. Nullam vel cursus elit. Proin at massa gravida, posuere diam ac, imperdiet ipsum. Praesent consequat sodales lorem sit amet hendrerit. In dolor lorem, pharetra varius vulputate et, congue vel orci. Cras vestibulum, dui id aliquet suscipit, nulla sem efficitur enim, quis molestie ipsum nibh ac mi. Phasellus in enim auctor, ultrices libero sit amet, finibus metus. Vestibulum vitae finibus nisi. Pellentesque sapien felis, facilisis vitae pulvinar nec, sagittis vitae est. Curabitur mattis nec orci ut hendrerit. Etiam posuere, dolor vel tincidunt lobortis, tellus sem mollis augue, ac fringilla eros sapien ut sapien. Nam et lorem bibendum, vulputate massa in, mattis diam. Duis mollis urna et tellus tristique luctus. Pellentesque sit amet ullamcorper lorem. Morbi vel orci lacinia, scelerisque arcu et, pellentesque erat.\r\n\r\nSed nec lorem vel mi gravida rutrum. Nunc id neque ac odio scelerisque tempor a at felis. Donec dolor risus, facilisis vestibulum sem non, auctor imperdiet urna. Nulla gravida feugiat metus nec efficitur. Suspendisse ipsum tortor, molestie quis justo id, fermentum fringilla purus. Pellentesque quis urna quis arcu scelerisque auctor congue quis orci. Nullam lacinia pretium orci, eget suscipit enim ornare vel. Pellentesque fermentum dignissim sapien pretium consectetur. Proin volutpat fermentum nisi, eget auctor risus pellentesque id.', 'Pla d''Impuls de l''Anglès (PIA)', '', 'publish', 'closed', 'closed', '', 'pla-dimpuls-de-langles-pia', '', '', '2016-06-23 11:14:50', '2016-06-23 10:14:50', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?page_id=8800', 40, 'page', '', 0),
(8802, 1, '2016-06-23 11:15:17', '2016-06-23 10:15:17', '', 'Pla d''Impuls de l''Anglès (PIA)', '', 'publish', 'closed', 'closed', '', 'pla-dimpuls-de-langles-pia', '', '', '2016-06-29 13:25:18', '2016-06-29 12:25:18', '', 8149, 'https://pwc-int.educacio.intranet/agora/mastereoi/?p=8802', 15, 'nav_menu_item', '', 0),
(8803, 1, '2016-06-23 11:22:03', '2016-06-23 10:22:03', '', 'organigrama', '', 'inherit', 'open', 'closed', '', 'organigrama-3', '', '', '2016-06-23 11:22:03', '2016-06-23 10:22:03', '', 8141, 'https://pwc-int.educacio.intranet/agora/mastereoi/wp-content/uploads/usu9/2016/06/organigrama-1.png', 0, 'attachment', 'image/png', 0),
(8824, 1, '2016-06-29 13:34:19', '2016-06-29 12:34:19', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-06-29 13:34:19', '2016-06-29 12:34:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(8825, 1, '2016-06-29 13:34:19', '2016-06-29 12:34:19', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-06-29 13:34:19', '2016-06-29 12:34:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(8826, 1, '2016-06-29 13:34:19', '2016-06-29 12:34:19', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-06-29 13:34:19', '2016-06-29 12:34:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(8827, 1, '2016-06-29 13:34:19', '2016-06-29 12:34:19', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-06-29 13:34:19', '2016-06-29 12:34:19', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(8828, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(8829, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(8830, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(8831, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(8832, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(8833, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(8834, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(8835, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0),
(8836, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0),
(8837, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(8838, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(8839, 1, '2016-06-29 13:34:20', '2016-06-29 12:34:20', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-06-29 13:34:20', '2016-06-29 12:34:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(8840, 0, '2019-05-13 09:43:43', '2019-05-13 07:43:43', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:43:43', '2019-05-13 07:43:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(8841, 0, '2019-05-13 09:43:45', '2019-05-13 07:43:45', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle', '', '', '2019-05-13 09:43:45', '2019-05-13 07:43:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/es_template/sha-publicat-un-article-nou-posttitle/', 0, 'es_template', '', 0),
(8842, 0, '2019-05-13 09:43:45', '2019-05-13 07:43:45', 'Hola {{EMAIL}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n{{POSTFULL}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Notificació d''article nou {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'notificacio-darticle-nou-posttitle', '', '', '2019-05-13 09:43:45', '2019-05-13 07:43:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/es_template/notificacio-darticle-nou-posttitle/', 0, 'es_template', '', 0),
(8843, 0, '2019-05-13 09:43:45', '2019-05-13 07:43:45', '<strong style="color: #990000"> Subscriptors de correu</strong><p>\r\n							L''extensió subscripcions de correu de correu té diferents opcions per enviar butlletins als subscriptors.\r\n							Té una pàgina separada amb un editor HTML per crear	un butlletí amb aquest format.\r\n							L''extensió disposa d''opcions per enviar correus de notificació als subscriptors quan es publiquen articles nous al lloc web. També té una pàgina per poder afegir i eliminar les categories a les que s''enviaran les notificacions.\r\n							Utilitzant les opcions de l''extensió d''importació i exportació els administradors podran importar fàcilment els usuaris registrats.\r\n						</p> <strong style="color: #990000">Característiques de l''extensió</strong><ol> <li>Correu de notificació als subscriptors quan es publiquin articles nous.</li> <li>Giny de subscripció</li><li>Correu de subscripció amb confirmació per correu i subscripció simple per facilitar la subscripció.</li> <li>Notificació per correu electrònic a l''administrador quan els usuaris es subscriguin (Opcional)</li> <li>Correu de benvinguda automàtic als subscriptors (Opcional).</li> <li>Enllaç per donar-se de baixa del correu.</li> <li>Importació / Exportació dels correus dels subscriptors.</li> <li>Editor d''HTML per redactar el butlletí.</li> </ol> <strong>Gràcies i salutacions</strong><br>Admin', 'Butlletí Hola Món', '', 'publish', 'closed', 'closed', '', 'butlleti-hola-mon', '', '', '2019-05-13 09:43:45', '2019-05-13 07:43:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/es_template/butlleti-hola-mon/', 0, 'es_template', '', 0),
(8844, 2, '2019-05-13 12:46:42', '2019-05-13 10:46:42', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:46:42', '2019-05-13 10:46:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(8845, 2, '2019-05-13 12:46:42', '2019-05-13 10:46:42', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:46:42', '2019-05-13 10:46:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(8846, 2, '2019-05-13 12:46:42', '2019-05-13 10:46:42', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:46:42', '2019-05-13 10:46:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(8847, 2, '2019-05-13 12:46:42', '2019-05-13 10:46:42', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:46:42', '2019-05-13 10:46:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastereoi/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(120, 'bp_docs_access_group_member_20', 'bp_docs_access_group_member_20', 0),
(121, 'bp_docs_access_loggedin', 'bp_docs_access_loggedin', 0),
(140, 'Servei educatiu', 'bp_docs_associated_group_20', 0),
(149, 'Formadors', 'bp_docs_associated_group_33', 0),
(150, 'bp_docs_access_group_member_33', 'bp_docs_access_group_member_33', 0),
(151, 'Servei educatiu', 'bp_docs_associated_group_31', 0),
(152, 'bp_docs_access_group_member_31', 'bp_docs_access_group_member_31', 0),
(262, 'Menu Superior EOI', 'menu-superior-eoi', 0),
(265, 'matricula', 'matricula', 0),
(266, 'renuncia', 'renuncia', 0),
(267, 'expedient', 'expedient', 0),
(268, 'revisió', 'revisio', 0),
(269, 'justificació', 'justificacio', 0),
(270, 'absències', 'absencies', 0),
(271, 'convocatòria', 'convocatoria', 0),
(272, 'horari', 'horari', 0),
(273, 'instància', 'instancia', 0),
(274, 'Currículum', 'curriculum', 0),
(275, 'activity-comment', 'activity-comment', 0),
(276, 'activity-comment-author', 'activity-comment-author', 0),
(277, 'activity-at-message', 'activity-at-message', 0),
(278, 'groups-at-message', 'groups-at-message', 0),
(279, 'core-user-registration', 'core-user-registration', 0),
(280, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(281, 'friends-request', 'friends-request', 0),
(282, 'friends-request-accepted', 'friends-request-accepted', 0),
(283, 'groups-details-updated', 'groups-details-updated', 0),
(284, 'groups-invitation', 'groups-invitation', 0),
(285, 'groups-member-promoted', 'groups-member-promoted', 0),
(286, 'groups-membership-request', 'groups-membership-request', 0),
(287, 'messages-unread', 'messages-unread', 0),
(288, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(289, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(290, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(291, 'google', 'google', 0),
(292, 'default-calendar', 'default-calendar', 0),
(293, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(294, 'bp-ges-single', 'bp-ges-single', 0),
(295, 'bp-ges-digest', 'bp-ges-digest', 0),
(296, 'bp-ges-notice', 'bp-ges-notice', 0),
(297, 'bp-ges-welcome', 'bp-ges-welcome', 0);

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
(248, 295, 0),
(248, 296, 0),
(289, 65, 0),
(1038, 295, 0),
(1038, 296, 0),
(1077, 65, 0),
(1078, 65, 0),
(8156, 266, 0),
(8157, 266, 0),
(8174, 266, 0),
(8175, 266, 0),
(8176, 266, 0),
(8177, 266, 0),
(8178, 266, 0),
(8180, 266, 0),
(8181, 266, 0),
(8182, 266, 0),
(8183, 266, 0),
(8184, 266, 0),
(8193, 266, 0),
(8194, 266, 0),
(8201, 266, 0),
(8202, 266, 0),
(8203, 266, 0),
(8347, 33, 0),
(8352, 33, 0),
(8355, 33, 0),
(8362, 33, 0),
(8379, 266, 0),
(8383, 266, 0),
(8384, 266, 0),
(8385, 266, 0),
(8417, 266, 0),
(8418, 266, 0),
(8425, 266, 0),
(8429, 266, 0),
(8436, 266, 0),
(8437, 266, 0),
(8439, 33, 0),
(8458, 266, 0),
(8475, 33, 0),
(8484, 266, 0),
(8502, 266, 0),
(8503, 266, 0),
(8504, 266, 0),
(8505, 266, 0),
(8549, 51, 0),
(8549, 269, 0),
(8549, 270, 0),
(8563, 51, 0),
(8563, 269, 0),
(8566, 51, 0),
(8566, 271, 0),
(8570, 51, 0),
(8570, 272, 0),
(8573, 51, 0),
(8573, 273, 0),
(8573, 274, 0),
(8576, 51, 0),
(8576, 275, 0),
(8580, 51, 0),
(8580, 276, 0),
(8583, 51, 0),
(8583, 276, 0),
(8586, 51, 0),
(8586, 269, 0),
(8594, 51, 0),
(8594, 277, 0),
(8608, 51, 0),
(8608, 278, 0),
(8615, 266, 0),
(8616, 266, 0),
(8617, 266, 0),
(8637, 266, 0),
(8802, 266, 0),
(8824, 279, 0),
(8825, 280, 0),
(8826, 281, 0),
(8827, 282, 0),
(8828, 283, 0),
(8829, 284, 0),
(8830, 285, 0),
(8831, 286, 0),
(8832, 287, 0),
(8833, 288, 0),
(8834, 289, 0),
(8835, 290, 0),
(8836, 291, 0),
(8837, 292, 0),
(8838, 293, 0),
(8839, 294, 0),
(8840, 297, 0),
(8844, 298, 0),
(8845, 299, 0),
(8846, 300, 0),
(8847, 301, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(33, 29, 'category', '', 0, 6),
(37, 33, 'topic-tag', '', 0, 0),
(38, 34, 'topic-tag', '', 0, 1),
(39, 35, 'topic-tag', '', 0, 1),
(40, 36, 'topic-tag', '', 0, 1),
(50, 46, 'bp_docs_associated_item', 'Document associat al node Professorat', 0, 0),
(51, 47, 'bp_docs_access', '', 0, 11),
(55, 51, 'bp_docs_access', '', 0, 0),
(57, 53, 'bp_docs_associated_item', 'Document associat al node Fotografia', 0, 0),
(65, 61, 'nav_menu', '', 0, 3),
(124, 120, 'bp_docs_access', '', 0, 0),
(125, 121, 'bp_docs_access', '', 0, 0),
(144, 140, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(153, 149, 'bp_docs_associated_item', 'Document associat al node Formadors', 0, 0),
(154, 150, 'bp_docs_access', '', 0, 0),
(155, 151, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(156, 152, 'bp_docs_access', '', 0, 0),
(266, 262, 'nav_menu', '', 0, 38),
(269, 265, 'bp_docs_tag', '', 0, 3),
(270, 266, 'bp_docs_tag', '', 0, 1),
(271, 267, 'bp_docs_tag', '', 0, 1),
(272, 268, 'bp_docs_tag', '', 0, 1),
(273, 269, 'bp_docs_tag', '', 0, 1),
(274, 270, 'bp_docs_tag', '', 0, 1),
(275, 271, 'bp_docs_tag', '', 0, 1),
(276, 272, 'bp_docs_tag', '', 0, 2),
(277, 273, 'bp_docs_tag', '', 0, 1),
(278, 274, 'bp_docs_tag', '', 0, 1),
(279, 275, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(280, 276, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(281, 277, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(282, 278, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(283, 279, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(284, 280, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(285, 281, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(286, 282, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(287, 283, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(288, 284, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(289, 285, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(290, 286, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(291, 287, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(292, 288, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(293, 289, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(294, 290, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(295, 291, 'calendar_feed', '', 0, 2),
(296, 292, 'calendar_type', '', 0, 2),
(297, 293, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(298, 294, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(299, 295, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(300, 296, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(301, 297, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(26, 2, 'dismissed_wp_pointers', 'wp350_media,wp360_revisions,wp360_locks,wp390_widgets,wp410_dfw,addtoany_settings_pointer'),
(27, 2, 'wp_dashboard_quick_press_last_post_id', '4'),
(28, 2, 'last_activity', '2019-05-13 12:45:38'),
(29, 2, 'closedpostboxes_slideshow', 'a:0:{}'),
(30, 2, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:10:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:22:"add-post-type-gce_feed";i:2;s:12:"add-post_tag";i:3;s:15:"add-post_format";i:4;s:15:"add-ia_invitees";i:5;s:21:"add-ia_invited_groups";i:6;s:27:"add-bp_docs_associated_item";i:7;s:18:"add-bp_docs_access";i:8;s:27:"add-bp_docs_folder_in_group";i:9;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '262'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&hidetb=1'),
(41, 2, 'wp_user-settings-time', '1465399519'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '0'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:2:{i:3;a:1:{i:0;i:5;}i:21;a:5:{i:0;i:66;i:1;i:67;i:2;i:69;i:3;i:70;i:4;i:79;}}}'),
(48, 1, 'last_activity', '2016-06-23 10:21:04'),
(49, 1, 'total_group_count', '7'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'libraryContent=browse&editor=tinymce'),
(53, 1, 'wp_user-settings-time', '1466436360'),
(56, 1, 'nav_menu_recently_edited', '262'),
(57, 1, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:27:"submitdiv,slides-list,,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(63, 1, 'screen_layout_slideshow', '2'),
(64, 1, 'ass_digest_items', 'a:1:{s:3:"dig";a:13:{i:2;a:1:{i:0;i:11;}i:1;a:5:{i:0;i:12;i:1;i:49;i:2;i:50;i:3;i:52;i:4;i:54;}i:5;a:1:{i:0;i:15;}i:9;a:1:{i:0;i:20;}i:14;a:4:{i:0;i:27;i:1;i:34;i:2;i:44;i:3;i:47;}i:15;a:2:{i:0;i:29;i:1;i:43;}i:16;a:1:{i:0;i:31;}i:17;a:4:{i:0;i:33;i:1;i:42;i:2;i:45;i:3;i:55;}i:18;a:1:{i:0;i:38;}i:19;a:1:{i:0;i:41;}i:33;a:13:{i:0;i:87;i:1;i:89;i:2;i:90;i:3;i:91;i:4;i:92;i:5;i:93;i:6;i:94;i:7;i:96;i:8;i:97;i:9;i:98;i:10;i:99;i:11;i:100;i:12;i:102;}i:31;a:2:{i:0;i:88;i:1;i:95;}i:23;a:3:{i:0;i:93;i:1;i:112;i:2;i:113;}}}'),
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
(172, 1, 'closedpostboxes_page', 'a:0:{}'),
(177, 1, 'meta-box-order_post', 'a:3:{s:4:"side";s:66:"submitdiv,postimagediv,postexcerpt,formatdiv,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(178, 1, 'metaboxhidden_post', 'a:8:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:9:"formatdiv";i:4;s:11:"layout_meta";i:5;s:12:"revisionsdiv";i:6;s:7:"slugdiv";i:7;s:11:"ping_status";}'),
(180, 1, 'bp_docs_count', '0'),
(193, 2, 'closedpostboxes_nav-menus', 'a:0:{}'),
(195, 1, 'bp_liked_activities', 'a:1:{i:113;s:14:"activity_liked";}'),
(196, 2, 'session_tokens', 'a:1:{s:64:"1b2f856100d347c468aecfae1253412cec8f43741181f9d8c6bf267e62a76405";a:4:{s:10:"expiration";i:1557917138;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557744338;}}'),
(197, 2, 'wp_media_library_mode', 'list');

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
(1, 'admin', '$P$B7p1ZlIj38tclyeqi/Nx4DZ.zEZ8nj.', 'admin', 'a8000009@xtec.cat', '', '0000-00-00 00:00:00', '', 0, 'admin'),
(2, 'xtecadmin', '$P$Bz86pFtQgg8DFSOSkdPlBqC4OBHKtP/', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
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
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12330;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6309;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8848;
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
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=298;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=302;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=200;
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
