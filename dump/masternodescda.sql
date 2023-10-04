-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 11:45:53
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu4`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_bpges_subscriptions`
--

INSERT INTO `wp_bpges_subscriptions` (`id`, `user_id`, `group_id`, `type`) VALUES
(1, 1, 34, 'dig'),
(2, 1, 35, 'dig'),
(3, 1, 36, 'dig'),
(4, 1, 37, 'dig'),
(5, 1, 38, 'dig'),
(6, 1, 39, 'dig');

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity`
--

INSERT INTO `wp_bp_activity` (`id`, `user_id`, `component`, `type`, `action`, `content`, `primary_link`, `item_id`, `secondary_item_id`, `date_recorded`, `hide_sitewide`, `mptt_left`, `mptt_right`, `is_spam`) VALUES
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:48:06', 0, 0, 0, 0),
(6, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2016-06-22 14:00:16', 0, 0, 0, 0),
(62, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastercda/docs/eap-professionals-adscrits/">EAP – Professionals adscrits</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercda/docs/eap-professionals-adscrits/', 0, 732, '2015-11-30 15:56:03', 1, 0, 0, 0),
(83, 1, 'bp_docs', 'bp_doc_edited', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha editat el document <a href="https://pwc-int.educacio.intranet/agora/mastercda/docs/distribucio-de-professionals-per-centres/">Distribució de professionals per centres</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercda/docs/distribucio-de-professionals-per-centres/', 0, 739, '2015-12-01 11:16:09', 1, 0, 0, 0),
(89, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/escola-charles-darwin/">Escola Charles Darwin</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/', 34, 0, '2016-06-21 11:03:41', 1, 0, 0, 0),
(90, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/el-gegant-del-rec/">El gegant del rec</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/', 37, 0, '2016-06-21 11:07:48', 1, 0, 0, 0),
(91, 1, 'groups', 'created_group', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha creat el node <a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/escola-quatre-vents/">Escola Quatre Vents</a>', '', 'https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/', 39, 0, '2016-06-21 12:28:59', 1, 0, 0, 0),
(92, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha publicat una actualització en el node <a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/escola-quatre-vents/">Escola Quatre Vents</a>', 'Aquest espai és un espai privat de comunicació amb els centres educatius que visitin el vostre camp d\\''aprenentatge. Podeu compartir fotos, vídeos, documents...', 'https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/', 39, 0, '2016-06-22 10:28:42', 1, 0, 0, 0),
(93, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/" title="admin">admin</a> ha publicat una actualització en el node <a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/escola-quatre-vents/">Escola Quatre Vents</a>', 'Un parell de vídeos que explica com funciona la xarxa nodes: \nhttps://vimeo.com/album/3772376/video/158842890\nhttps://vimeo.com/album/3772376/video/158843858', 'https://pwc-int.educacio.intranet/agora/mastercda/membres/admin/', 39, 0, '2016-06-22 10:33:18', 1, 0, 0, 0);

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
(13, 93, '_oembed_4a51ddec65e505c5622b4b5d850fb8c8', '<iframe src="https://player.vimeo.com/video/158842890" width="500" height="313" frameborder="0" title="NODES. Hola Xarxa" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),
(14, 93, '_oembed_5993ac10d01aea6f24e27dda94c90cf5', '<iframe src="https://player.vimeo.com/video/158843858" width="500" height="313" frameborder="0" title="NODES. Els nodes" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`, `parent_id`) VALUES
(34, 1, 'Escola Charles Darwin', 'escola-charles-darwin', 'El Prat de Llobregat', 'private', 1, '2016-06-21 11:03:20', 0),
(35, 1, 'Institut Joaquim Bau', 'institut-joaquim-bau', 'Tortosa', 'private', 1, '2016-06-21 11:04:49', 0),
(36, 1, 'Escola Sant Jordi', 'escola-sant-jordi', 'Maçanet de la Selva', 'private', 1, '2016-06-21 11:06:05', 0),
(37, 1, 'El gegant del rec', 'el-gegant-del-rec', 'Salt', 'private', 1, '2016-06-21 11:07:29', 0),
(38, 1, 'Camp d\\''aprenentatge', 'camp-daprenentatge', 'Node de coordinació dels formadors del camp d\\''aprenentatge', 'private', 1, '2016-06-21 12:23:11', 0),
(39, 1, 'Escola Quatre Vents', 'escola-quatre-vents', 'Manlleu', 'private', 1, '2016-06-21 12:28:22', 0);

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
(229, 34, 'total_member_count', '1'),
(230, 34, 'last_activity', '2016-06-21 11:03:20'),
(231, 34, 'ass_default_subscription', 'dig'),
(232, 34, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(233, 34, 'invite_status', 'mods'),
(234, 34, 'forum_id', 'a:1:{i:0;i:8330;}'),
(235, 34, '_bbp_forum_enabled_8330', '1'),
(236, 35, 'total_member_count', '1'),
(237, 35, 'last_activity', '2016-06-21 11:04:49'),
(238, 35, 'ass_default_subscription', 'dig'),
(239, 35, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(240, 35, 'invite_status', 'members'),
(241, 35, 'forum_id', 'a:1:{i:0;i:8331;}'),
(242, 35, '_bbp_forum_enabled_8331', '1'),
(243, 36, 'total_member_count', '1'),
(244, 36, 'last_activity', '2016-06-21 11:06:05'),
(245, 36, 'ass_default_subscription', 'dig'),
(246, 36, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(247, 36, 'invite_status', 'members'),
(248, 36, 'forum_id', 'a:1:{i:0;i:8332;}'),
(249, 36, '_bbp_forum_enabled_8332', '1'),
(250, 37, 'total_member_count', '1'),
(251, 37, 'last_activity', '2016-06-21 11:07:29'),
(252, 37, 'ass_default_subscription', 'dig'),
(253, 37, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(254, 37, 'invite_status', 'members'),
(255, 37, 'forum_id', 'a:1:{i:0;i:8333;}'),
(256, 37, '_bbp_forum_enabled_8333', '1'),
(257, 38, 'total_member_count', '1'),
(258, 38, 'last_activity', '2016-06-21 12:23:11'),
(259, 38, 'ass_default_subscription', 'dig'),
(260, 38, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(261, 38, 'invite_status', 'admins'),
(262, 38, 'forum_id', 'a:1:{i:0;i:8335;}'),
(263, 38, '_bbp_forum_enabled_8335', '1'),
(264, 39, 'total_member_count', '1'),
(265, 39, 'last_activity', '2016-06-22 10:33:18'),
(266, 39, 'ass_default_subscription', 'dig'),
(267, 39, 'ass_subscribed_users', 'a:1:{i:1;s:3:"dig";}'),
(268, 39, 'invite_status', 'members'),
(269, 39, 'forum_id', 'a:1:{i:0;i:8336;}'),
(270, 39, '_bbp_forum_enabled_8336', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(40, 34, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 11:03:10', '', 1, 0, 0),
(41, 35, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 11:04:39', '', 1, 0, 0),
(42, 36, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 11:05:59', '', 1, 0, 0),
(43, 37, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 11:07:23', '', 1, 0, 0),
(44, 38, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 12:23:01', '', 1, 0, 0),
(45, 39, 1, 0, 1, 0, 'Administrador del node', '2016-06-21 12:28:15', '', 1, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '####Portada## ##', '1', 459, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 0, 'Admin', '', 'a8000004@xtec.cat', 'Migrated', 0, 'verified', 0, 'nyboat-nrdukw-uwebnv-vkjqxt-gyfatk', '2016-04-05 11:55:56', '2019-05-13 07:44:20', 1, 0, 0, 0, 1, 1, '');

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
(1, 'Widget - Subscripció de correu', 'a:4:{i:0;a:5:{s:4:"type";s:4:"text";s:4:"name";s:4:"Name";s:2:"id";s:4:"name";s:6:"params";a:3:{s:5:"label";s:4:"Name";s:4:"show";b:1;s:8:"required";b:0;}s:8:"position";i:1;}i:1;a:5:{s:4:"type";s:4:"text";s:4:"name";s:5:"Email";s:2:"id";s:5:"email";s:6:"params";a:3:{s:5:"label";s:5:"Email";s:4:"show";b:1;s:8:"required";b:1;}s:8:"position";i:2;}i:2;a:5:{s:4:"type";s:8:"checkbox";s:4:"name";s:5:"Lists";s:2:"id";s:5:"lists";s:6:"params";a:4:{s:5:"label";s:5:"Lists";s:4:"show";b:0;s:8:"required";b:1;s:6:"values";a:1:{i:0;s:1:"1";}}s:8:"position";i:3;}i:3;a:5:{s:4:"type";s:6:"submit";s:4:"name";s:6:"submit";s:2:"id";s:6:"submit";s:6:"params";a:2:{s:5:"label";s:6:"Submit";s:4:"show";b:1;}s:8:"position";i:4;}}', 'a:2:{s:5:"lists";a:1:{i:0;s:1:"1";}s:4:"desc";s:35:"T''avisarem si hi ha notícies noves";}', NULL, '2019-05-13 07:44:20', NULL, NULL, 0);

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
(1, 'portada', 'Portada', '2019-05-13 07:44:20', NULL, NULL);

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
(1, 1, 1, 'subscribed', 2, '2016-04-05 11:55:56', NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=10574 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/mastercda/', 'yes'),
(2, 'blogname', 'Màster CdA', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000004@xtec.cat', 'yes'),
(6, 'start_of_week', '1', 'yes'),
(7, 'use_balanceTags', '0', 'yes'),
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
(33, 'home', 'https://pwc-int.educacio.intranet/agora/mastercda/', 'yes'),
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
(80, 'widget_text', 'a:21:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:4:"text";s:180:"<a class="twitter-timeline" data-height="450" href="https://twitter.com/cdaboi">Tweets by cdaboi</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>";s:6:"filter";b:0;}i:19;a:3:{s:5:"title";s:0:"";s:4:"text";s:0:"";s:6:"filter";s:0:"";}i:30;a:4:{s:5:"title";s:8:"Aparells";s:4:"text";s:632:"El període de préstec habitual és de 15 dies, prorrogable. Per fer una reserva:\r\n<ul>\r\n<li> Consulteu que l''aparell està disponible a la llista de reserves.\r\n<li> Afegiu un comentari dins de l''article de l''aparell amb la data d''inici i de fi.\r\n<li> Quan acceptem la vostra demanda,  apareixerà a la llista de reserves.\r\n</ul>\r\n\r\nEn el moment de recollir els aparells cal portar una <a target="_blank" href="https://pwc-int.educacio.intranet/agora/mastercda/docs/fitxa-de-peticio-de-recursos/">autorització </a>segellada i signada per la direcció del centre. Els dies de vacances el material ha de romandre al servei educatiu.";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"80";}}}}i:31;a:4:{s:5:"title";s:29:"Fòrum de treballs de recerca";s:4:"text";s:683:"Trobada anual on l''alumnat de Batxillerat i de Cicles formatius, exposa els seus Treballs de Recerca realitzats durant el curs. \r\n<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/search.png">\r\nEn aquest acte assisteixen les seves famílies, companys i companyes, professorat i d''altres persones interessades en observar una mostra de les produccions del món educatiu.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/docs/?bpd_tag=f%C3%B2rum-recerca-2015">Documentació de referència (bases, models, programa...)</a>\r\n<a href="http://xtec.gencat.cat/ca/curriculum/batxillerat/treballrecerca/">Treballs de recerca (XTEC)</a>\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"70";}}}}i:32;a:4:{s:5:"title";s:29:"Apadrinem el nostre patrimoni";s:4:"text";s:929:"El coneixement del patrimoni local des d’un punt de vista històric, artístic, cultural, natural i científic és important per fomentar la implicació dels alumnes en el territori i la societat. El programa <strong>Apadrinem el nostre patrimoni</strong> es basa en la idea de l’apadrinament per part d’un centre educatiu d’un element del patrimoni monumental, cultural immaterial o natural.\r\n\r\n<a href="http://xtec.gencat.cat/ca/projectes/apadrinemnostrepatrimoni/">Més informació (XTEC)</a>\r\n\r\n<h4>Mobile History Map (MHM)</h4>\r\nPermet incorporar els apadrinaments en una plataforma consultable des del web i des d''una app. \r\n\r\n<a href="http://mhm.mobileworldcapital.com/">Web</a>\r\n<a href="http://blocs.xtec.cat/mhm">Blog</a>\r\n<a href="https://play.google.com/store/apps/details?id=com.itinerarium.mhm">App (Android)</a>\r\n<a href="https://itunes.apple.com/es/app/mobile-history-map/id881510667?mt=8">App (IOS)</a>\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"79";}}}}i:33;a:4:{s:5:"title";s:17:"Servei comunitari";s:4:"text";s:467:"Els alumnes protagonitzen accions de compromís cívic posant en joc els seus coneixements i capacitats al servei de la comunitat.\r\n\r\n<iframe width=100% src="https://www.youtube.com/embed/5xYU9UtO9Os?rel=0" frameborder="0" allowfullscreen></iframe>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/docs/?bpd_tag=Servei+comunitari">Documents associats </a>\r\n<a href="http://xtec.gencat.cat/ca/comunitat/serveicomunitari/">Serveis comunitaris a XTEC</a>\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"77";}}}}i:34;a:4:{s:5:"title";s:8:"Contacte";s:4:"text";s:100:"<i class="fa fa-phone"></i>   555 456 789\r\n<i class="fa fa-envelope-o"></i>    se-XXXXXXXX@xtec.cat ";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"63";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"82";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"548";}i:4;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"80";}}}}i:36;a:4:{s:5:"title";s:22:"Motxilla bioclimàtica";s:4:"text";s:514:"<img src=https://pwc-int.educacio.intranet/agora/mastercda//wp-content/uploads/usu4/2015/11/motxillabio.png>\r\n\r\nLa motxilla bioclimàtica és un programa educatiu per a ESO i Batxillerat que pretén fomentar el diàleg entre l''educació ambiental, l''educació per la salut i l''educació científica a partir d’unes propostes didàctiques.\r\n\r\nConsulteu la disponibilitat a l''apartat <a href="https://pwc-int.educacio.intranet/agora/mastercda/categoria/recursos/maletes-pedagogiques/"> Maletes pedagògiques</a>.\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"74";}}}}i:37;a:4:{s:5:"title";s:0:"";s:4:"text";s:586:"<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/jocsflorals.jpg">\r\nAmb l’objectiu de potenciar i estimular l’expressió i la producció escrites dels nois i noies i fomentar i difondre una tradició cultural pròpia i arrelada al país, el Departament d''Ensenyament convoca els II Jocs florals escolars de Catalunya.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/docs/?bpd_tag=jocs+florals">Documentació de referència</a>\r\n<a href=http://xtec.gencat.cat/ca/centres/alscentres/premis/jocsflorals>Jocs florals (XTEC)</a>\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"71";}}}}i:38;a:4:{s:5:"title";s:27:"Pla Educatiu d''Entorn (PEE)";s:4:"text";s:533:"Instrument per donar una resposta integrada i comunitària a les necessitats educatives del alumnes més enllà de l’àmbit acadèmic.<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/peelogo.jpg">\r\nEs tracta de construir una xarxa estable de suport a la comunitat educativa, que permeti un treball formatiu fora de l''entorn escolar amb la col·laboració dels diferents serveis i recursos municipals i també de les altres institucions i entitats dels àmbits social, cultural i esportiu.";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"75";}}}}i:42;a:4:{s:5:"title";s:0:"";s:4:"text";s:344:"El servei educatiu està subscrit a totes les revistes educatives que es publiquen a Catalunya.\r\n\r\nPodeu fer la reserva afegint un comentari en aquesta mateixa pàgina. El període de préstec habitual és de 15 dies, prorrogable. \r\n\r\n<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/revistes2.jpg">\r\n";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}}}}i:44;a:4:{s:5:"title";s:8:"Contacte";s:4:"text";s:100:"<i class="fa fa-phone"></i>   555 456 789\r\n<i class="fa fa-envelope-o"></i>    se-XXXXXXXX@xtec.cat ";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"889";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"906";}}}}i:46;a:4:{s:5:"title";s:3:"TAC";s:4:"text";s:1207:"Tecnologies per a l''Aprenentatge i el Coneixement\r\n<a href="https://sites.google.com/a/xtec.cat/seminaris-tac/">\r\n<img src="httpa://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/semtac.png"></a>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/?attachment_id=1140">Seminaris TAC</a>\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/nodes/tac/">Node TAC</a>\r\n\r\n<h4>Serveis i aplicacions</h4>\r\n<a href="http://agora.xtec.cat/moodle/moodle/mod/page/view.php?id=2121">Moodle</a>\r\nEntorn virtual d''aprenentatge de centre\r\n<a href="http://agora.xtec.cat/nodes">Nodes</a>\r\nEspai web i xarxa social de centre\r\n<a href="http://apliense.xtec.cat/arc/">ARC</a>\r\nAplicació de recursos al currículum\r\n<a href="http://alexandria.xtec.cat/">Alexandria</a>\r\nBiblioteca de cursos Moodle\r\n<a href="http://blocs.xtec.cat/">XTECBlocs</a>\r\nBlogs educatius\r\n<a href="http://clic.xtec.cat/ca/">JClic </a>\r\nActivitats educatives interactives\r\n<a href="http://linkat.xtec.cat/">Linkat</a>\r\nLinux educatiu en català\r\n<a href="http://toolbox.mobileworldcapital.com/">Toolbox</a>\r\nApps educatives validades per docents\r\n<a href="">Merlí</a>\r\nCatàleg de recursos educatius\r\n</ul>";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"78";}}}}i:48;a:4:{s:5:"title";s:18:"Biblioteca escolar";s:4:"text";s:610:"En aquest apartat us compartirem tot tipus de recursos relacionats amb les biblioteques escolars i la dinamització de la lectura.\r\n\r\n\r\n<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/12/biblioturu.png">\r\n\r\n<a href="http://xtec.gencat.cat/ca/projectes/biblioteca/">Biblioteca escolar (XTEC)</a>\r\n\r\n<a href="">ePergam</a>\r\nAplicació per a la gestió de llibres de la biblioteca escolar\r\n\r\n<a href="http://xtec.gencat.cat/ca/projectes/lectura/gustperlalectura/">El gust per la lectura</a>\r\nMaterial didàctic, estratègies i recursos per a la dinamització de la lectura";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"81";}}}}i:50;a:4:{s:5:"title";s:19:"Lectura en veu alta";s:4:"text";s:489:"<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/12/logoveu.png">\r\n<ul>\r\n<li>Practicar l’entonació, el ritme, les pauses i la fonètica.\r\n<li>Afavorir la comprensió lectora.\r\n<li>Treballar alguns aspectes gramaticals.\r\n<li>Afavorir l’ampliació de lèxic i vocabulari.\r\n<li>Prendre consciència de l’organització de la informació.\r\n</ul>\r\n<a href="http://www.lecturaenveualta.cat/">Lectura en veu alta (Fundació Enciclopedia Catalana)</a>";s:6:"filter";s:1:"1";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"72";}}}}i:52;a:3:{s:5:"title";s:0:"";s:4:"text";s:169:"<a target="_blank" href="http://xtec.gencat.cat/ca/serveis/cda/inscripcio/" class="button big radius" style="background:#418000;\r\ncolor:white !important">Inscripció</a>";s:6:"filter";b:0;}i:54;a:3:{s:5:"title";s:11:"Xarxa meteo";s:4:"text";s:2110:"<!--Edumet-->\r\n<a href=''https://edumet.cat'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/edumet.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Pronostic\r\n<a href=''http://edumet.cat/edumet/meto_2/dadespronostic.php?'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/pronostic.jpg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Satčl·lit\r\n<a href=''http://edumet.cat/edumet/meto_2/dadessatelit.php'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/botosatelit.jpg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Meteocat\r\n<a href=''http://edumet.cat/edumet/meto_2/dadesradar.php'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/botoradar.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<hr>\r\n<!--Meteocat\r\n<a href=''http://www.meteo.cat/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteocat.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoPirineu-->\r\n<a href=''http://www.meteopirineu.com/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteopirineu.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoPrades-->\r\n<a href=''http://www.meteoprades.net/estacions/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteoprades.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Metoclimatic-->\r\n<a href=''http://www.meteoclimatic.net/perfil/ESCAT2500000025527A'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteoclimatic.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoLillet-->\r\n<a href=''http://eltemps.lillet.net/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteollilet.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--WeatherCloud-->\r\n<a href=''https://app.weathercloud.net/map'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/weathercloud.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Clima y nieve pirineos/-->\r\n<a href=''http://www.climaynievepirineos.com/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/nieveypirineo.jpeg'' style=''margin-top: 10px''/></a>\r\n";s:6:"filter";b:0;}i:56;a:3:{s:5:"title";s:0:"";s:4:"text";s:239:"<br>\r\n<iframe src=''http://edumet.cat/edumet/meteo_2/pastilla.php?Codi_estacio=25911027&Temp&Hum&Vent&Pres&Pre&Pro&Color=f2f2f2'' height=''280px'' width=''100%'' hspace=''0'' marginheight=''0'' marginwidth=''0'' vspace=''0'' frameborder=''0'' ></iframe>\r\n";s:6:"filter";b:0;}i:58;a:4:{s:5:"title";s:21:"Xarxa de Meteorologia";s:4:"text";s:1918:"<!--Edumet-->\r\n<a href=''https://edumet.cat'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/edumet.jpeg'' style=''margin-top: 10px''/></a>\r\n<!--Pronostic -->\r\n<a href=''http://edumet.cat/edumet/meteo_2/dadespronostic.php?'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/pronostic.jpg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Satčl·lit -->\r\n<a href=''http://edumet.cat/edumet/meteo_2/dadessatelit.php'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/botosatelit.jpg'' style=''margin-top: 10px''/></a>\r\n\r\n<!-- Radar -->\r\n<a href=''http://edumet.cat/edumet/meteo_2/dadesradar.php'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/botoradar.jpg'' style=''margin-top: 10px''/></a>\r\n\r\n<hr>\r\n<!--Meteocat -->\r\n<a href=''http://www.meteo.cat/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteocat.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoPirineu-->\r\n<a href=''http://www.meteopirineu.com/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteopirineu.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoPrades-->\r\n<a href=''http://www.meteoprades.net/estacions/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteoprades.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--Metoclimatic-->\r\n<a href=''http://www.meteoclimatic.net/perfil/ESCAT2500000025527A'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteoclimatic.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--MeteoLillet-->\r\n<a href=''http://eltemps.lillet.net/'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/meteolillet.jpeg'' style=''margin-top: 10px''/></a>\r\n\r\n<!--WeatherCloud-->\r\n<a href=''https://app.weathercloud.net/map'' target=''_blank''><img src=''http://edumet.cat/edumet/meteo_2/imatges/xarxes/weathercloud.jpeg'' style=''margin-top: 10px''/></a>\r\n";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:4:"page";s:5:"minor";s:3:"433";s:12:"has_children";b:0;}}}}s:12:"_multiwidget";i:1;}', 'yes'),
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
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:16:{i:0;s:12:"gce_widget-4";i:1;s:7:"text-36";i:2;s:7:"text-30";i:3;s:12:"gce_widget-6";i:4;s:7:"text-31";i:5;s:7:"text-32";i:6;s:7:"text-33";i:7;s:7:"text-38";i:8;s:7:"text-34";i:9;s:7:"text-37";i:10;s:7:"text-46";i:11;s:7:"text-48";i:12;s:7:"text-50";i:13;s:11:"nav_menu-10";i:14;s:11:"nav_menu-16";i:15;s:13:"xtec_widget-6";}s:7:"sidebar";a:15:{i:0;s:10:"nav_menu-8";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-2";i:3;s:14:"recent-posts-2";i:4;s:17:"recent-comments-2";i:5;s:11:"tag_cloud-3";i:6;s:10:"archives-2";i:7;s:32:"bp_core_recently_active_widget-2";i:8;s:7:"text-42";i:9;s:7:"text-44";i:10;s:11:"tag_cloud-5";i:11;s:11:"nav_menu-12";i:12;s:11:"nav_menu-14";i:13;s:13:"xtec_widget-8";i:14;s:7:"text-58";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:7:{i:0;s:20:"logo_centre_widget-5";i:1;s:7:"text-52";i:2;s:12:"gce_widget-2";i:3;s:7:"text-56";i:4;s:6:"text-2";i:5;s:13:"xtec_widget-2";i:6;s:19:"email-subscribers-2";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:20:"socialmedia_widget-2";i:1;s:7:"text-19";i:2;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:8:{i:1537436620;a:3:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537436626;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537438363;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537457656;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1557733488;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"e91d5a7a882e4ebaebb135f70ee4b675";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"whdxjs-qvybwp-wkdtob-dsemzu-amknid";}s:8:"interval";i:900;}}}i:1557744085;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1571754039;a:1:{s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"3533f9d17b8da8f5010cc25ee58dc062";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"wyifls-ikzlmd-adwxps-vhtubl-rtkpow";}s:8:"interval";i:900;}}}s:7:"version";i:2;}', 'yes'),
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
(189, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/mastercda/', 'yes'),
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
(238, 'widget_tag_cloud', 'a:4:{i:1;a:0:{}i:3;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;i:5;a:3:{s:5:"title";s:9:"Etiquetes";s:8:"taxonomy";s:11:"bp_docs_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}}}}}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(239, 'widget_nav_menu', 'a:7:{i:1;a:0:{}i:8;a:2:{s:8:"nav_menu";i:61;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:6:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:2:"16";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"front";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}}}}i:10;a:3:{s:5:"title";s:9:"Formació";s:8:"nav_menu";i:155;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:3:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"153";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"156";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"235";}}}}i:12;a:3:{s:5:"title";s:9:"Formació";s:8:"nav_menu";i:155;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:7:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:4:"1314";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"434";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"572";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"420";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"548";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"448";}i:6;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"416";}}}}i:14;a:3:{s:5:"title";s:13:"Enllaços FIC";s:8:"nav_menu";i:260;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"572";}}}}i:16;a:3:{s:5:"title";s:13:"Enllaços PFZ";s:8:"nav_menu";i:261;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"153";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(240, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_gce_widget', 'a:4:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:1038;}i:4;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:602;}i:6;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:882;}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"Destacat";s:11:"slideshowId";s:3:"202";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_xtec_widget', 'a:5:{i:1;a:0:{}i:2;a:31:{s:5:"title";s:0:"";s:11:"ensenyament";s:0:"";s:4:"xtec";s:2:"on";s:6:"edu365";s:0:"";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:2:"on";s:3:"arc";s:2:"on";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:2:"on";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:16:"serveiseducatius";s:0:"";s:9:"classroom";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/mastercda/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercda/moodle";s:20:"serveiseducatius_url";s:30:"poseu-el-votre-servei-educatiu";s:13:"classroom_url";s:29:"https://classroom.google.com/";}i:6;a:28:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:0:"";s:4:"xtec";s:0:"";s:6:"edu365";s:0:"";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:2:"on";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:2:"on";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:2:"on";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/mastercda/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercda/moodle";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:4:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"154";}i:1;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"156";}i:2;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"235";}i:3;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:3:"153";}}}}i:8;a:28:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:0:"";s:4:"xtec";s:0:"";s:6:"edu365";s:0:"";s:4:"edu3";s:0:"";s:12:"xarxa-docent";s:0:"";s:6:"ateneu";s:2:"on";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:2:"on";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:2:"on";s:12:"portalcentre";s:0:"";s:8:"intraweb";s:0:"";s:7:"epergam";s:0:"";s:10:"lamevaxtec";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/mastercda/ampa";s:16:"escola-verda_url";s:44:"http://www.gencat.cat/mediamb/escolesverdes/";s:10:"moodle_url";s:56:"https://pwc-int.educacio.intranet/agora/mastercda/moodle";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:8:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"434";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"541";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:4:"1314";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"420";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"448";}i:5;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"548";}i:6;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"572";}i:7;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"416";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;i:5;a:0:{}}', 'yes'),
(252, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"107";s:10:"logo_image";s:94:"https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/garrotxa.png";s:16:"nomCanonicCentre";s:11:"Màster CdA";s:14:"direccioCentre";s:16:"Via Augusta, 202";s:8:"cpCentre";s:21:"08021 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:60:"https://www.google.com/maps/@41.605896,1.723144,10z?hl=ca-ES";s:13:"paleta_colors";s:5:"verds";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:2:"29";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:1:"2";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"15";s:21:"frontpage_link_titles";s:1:"1";s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:93:"https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/12/favicon.ico";s:11:"logo_inline";s:1:"1";s:14:"contacteCentre";s:66:"https://pwc-int.educacio.intranet/agora/mastercda/linstitut/on-som";s:12:"correuCentre";s:0:"";}', 'yes'),
(253, 'icones_capcalera', '', 'yes'),
(256, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(257, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(258, 'tadv_version', '4000', 'yes'),
(290, 'my_option_name', 'a:16:{s:5:"icon1";s:10:"admin-home";s:10:"link_icon1";s:0:"";s:11:"title_icon1";s:5:"Inici";s:5:"icon2";s:14:"format-gallery";s:10:"link_icon2";s:71:"https://pwc-int.educacio.intranet/agora/mastercda/visites/fotos-videos/";s:11:"title_icon2";s:5:"Fotos";s:5:"icon3";s:18:"welcome-write-blog";s:10:"link_icon3";s:49:"http://xtec.gencat.cat/ca/serveis/cda/inscripcio/";s:11:"title_icon3";s:11:"Inscripció";s:5:"icon4";s:5:"cloud";s:10:"link_icon4";s:12:"meteorologia";s:11:"title_icon4";s:5:"meteo";s:5:"icon5";s:6:"groups";s:10:"link_icon5";s:9:"activitat";s:11:"title_icon5";s:8:"intranet";s:14:"show_text_icon";s:2:"si";}', 'yes'),
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
(1145, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:16:"twitter institut";s:12:"facebook_url";s:17:"facebook institut";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:16:"youtube institut";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:54:"https://pwc-int.educacio.intranet/agora/mastercda/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:0:"";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
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
(2307, 'nodesbox_name', 'Màster CdA', 'yes'),
(2427, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2428, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(2434, 'common_css', '', 'yes'),
(2486, 'theme_mods_reactor-serveis-educatius', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:279;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
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
(3784, 'email-subscribers', '2.9', 'yes'),
(3791, 'widget_email-subscribers', 'a:3:{i:1;a:0:{}i:2;a:4:{s:8:"es_title";s:22:"Subscripció de correu";s:7:"es_desc";s:35:"T''avisarem si hi ha notícies noves";s:7:"es_name";s:3:"YES";s:8:"es_group";s:7:"Portada";}s:12:"_multiwidget";i:1;}', 'yes'),
(3880, 'xtec_ldap_host', 'xoidpro.educacio.intranet', 'yes'),
(3881, 'xtec_ldap_port', '389', 'yes'),
(3882, 'xtec_ldap_version', '3', 'yes'),
(3883, 'xtec_ldap_base_dn', 'cn=users,dc=xtec,dc=cat', 'yes'),
(3884, 'xtec_ldap_login_type', 'LDAP', 'yes'),
(4068, 'es_c_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(4069, 'es_c_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a ###COUNT### de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: ###UNIQUE### \nHora d''inici: ###STARTTIME### \nHora de finalització: ###ENDTIME### \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(4494, 'finished_splitting_shared_terms', '1', 'yes'),
(4495, 'site_icon', '0', 'yes'),
(4496, 'medium_large_size_w', '768', 'yes'),
(4497, 'medium_large_size_h', '0', 'yes'),
(4625, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(4738, 'bp_docs_associated_item_children', 'a:0:{}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(4739, 'rewrite_rules', 'a:396:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:44:"calendar_booking/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:54:"calendar_booking/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:74:"calendar_booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:50:"calendar_booking/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:33:"calendar_booking/([^/]+)/embed/?$";s:49:"index.php?calendar_booking=$matches[1]&embed=true";s:37:"calendar_booking/([^/]+)/trackback/?$";s:43:"index.php?calendar_booking=$matches[1]&tb=1";s:45:"calendar_booking/([^/]+)/page/?([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&paged=$matches[2]";s:52:"calendar_booking/([^/]+)/comment-page-([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&cpage=$matches[2]";s:41:"calendar_booking/([^/]+)(?:/([0-9]+))?/?$";s:55:"index.php?calendar_booking=$matches[1]&page=$matches[2]";s:33:"calendar_booking/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:43:"calendar_booking/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:63:"calendar_booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:39:"calendar_booking/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:46:"calendar_resources/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:56:"calendar_resources/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:76:"calendar_resources/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"calendar_resources/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"calendar_resources/([^/]+)/embed/?$";s:51:"index.php?calendar_resources=$matches[1]&embed=true";s:39:"calendar_resources/([^/]+)/trackback/?$";s:45:"index.php?calendar_resources=$matches[1]&tb=1";s:47:"calendar_resources/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&paged=$matches[2]";s:54:"calendar_resources/([^/]+)/comment-page-([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&cpage=$matches[2]";s:43:"calendar_resources/([^/]+)(?:/([0-9]+))?/?$";s:57:"index.php?calendar_resources=$matches[1]&page=$matches[2]";s:35:"calendar_resources/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"calendar_resources/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"calendar_resources/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"calendar_resources/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(4908, '_bbp_private_forums', 'a:25:{i:0;i:8336;i:1;i:8335;i:2;i:8333;i:3;i:8332;i:4;i:8331;i:5;i:8330;i:6;i:1256;i:7;i:1255;i:8;i:1242;i:9;i:1167;i:10;i:1165;i:11;i:1120;i:12;i:768;i:13;i:179;i:14;i:178;i:15;i:177;i:16;i:176;i:17;i:175;i:18;i:174;i:19;i:173;i:20;i:172;i:21;i:171;i:22;i:170;i:23;i:115;i:24;i:113;}', 'yes'),
(4909, '_bbp_hidden_forums', 'a:25:{i:0;i:8336;i:1;i:8335;i:2;i:8333;i:3;i:8332;i:4;i:8331;i:5;i:8330;i:6;i:1256;i:7;i:1255;i:8;i:1242;i:9;i:1167;i:10;i:1165;i:11;i:1120;i:12;i:768;i:13;i:179;i:14;i:178;i:15;i:177;i:16;i:176;i:17;i:175;i:18;i:174;i:19;i:173;i:20;i:172;i:21;i:171;i:22;i:170;i:23;i:115;i:24;i:113;}', 'yes'),
(5036, 'category_children', 'a:0:{}', 'yes'),
(5230, 'bp-plugin-enabled-post-home', '1', 'yes'),
(5278, 'can_compress_scripts', '1', 'yes'),
(5727, 'calendar_feed_children', 'a:0:{}', 'yes'),
(5728, 'calendar_type_children', 'a:0:{}', 'yes'),
(5729, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(5730, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(5735, 'simple-calendar_version', '3.1.9', 'yes'),
(5807, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(6668, 'bp-emails-unsubscribe-salt', 'P1pqVTttWEBleU0tXzp9UnoqZWt1QElGQE8uLmM2Sl5tV0tgczYqP0JhSVY1RU1XRXQgcHhmMEtOYHtmWz9VUQ==', 'yes'),
(6669, '_bp_ignore_deprecated_code', '', 'yes'),
(7500, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7501, 'current_sa_email_subscribers_db_version', '3.2', 'yes'),
(7502, 'toc-options', 'a:43:{s:15:"fragment_prefix";s:1:"i";s:8:"position";i:2;s:5:"start";i:4;s:17:"show_heading_text";b:1;s:12:"heading_text";s:10:"Continguts";s:22:"auto_insert_post_types";a:1:{i:0;s:4:"page";}s:14:"show_heirarchy";b:1;s:12:"ordered_list";b:0;s:13:"smooth_scroll";b:1;s:20:"smooth_scroll_offset";i:40;s:10:"visibility";b:0;s:15:"visibility_show";s:4:"show";s:15:"visibility_hide";s:4:"hide";s:26:"visibility_hide_by_default";b:0;s:5:"width";s:4:"Auto";s:12:"width_custom";d:275;s:18:"width_custom_units";s:2:"px";s:8:"wrapping";i:2;s:9:"font_size";d:95;s:15:"font_size_units";s:1:"%";s:5:"theme";i:1;s:24:"custom_background_colour";s:7:"#f9f9f9";s:20:"custom_border_colour";s:7:"#aaaaaa";s:19:"custom_title_colour";s:1:"#";s:19:"custom_links_colour";s:1:"#";s:25:"custom_links_hover_colour";s:1:"#";s:27:"custom_links_visited_colour";s:1:"#";s:9:"lowercase";b:0;s:9:"hyphenate";b:0;s:14:"bullet_spacing";b:0;s:16:"include_homepage";b:0;s:11:"exclude_css";b:0;s:7:"exclude";s:0:"";s:14:"heading_levels";a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}s:13:"restrict_path";s:6:"/docs/";s:19:"css_container_class";s:0:"";s:25:"sitemap_show_page_listing";b:1;s:29:"sitemap_show_category_listing";b:1;s:20:"sitemap_heading_type";i:3;s:13:"sitemap_pages";s:5:"Pages";s:18:"sitemap_categories";s:10:"Categories";s:23:"show_toc_in_widget_only";b:0;s:34:"show_toc_in_widget_only_post_types";a:1:{i:0;s:4:"page";}}', 'yes'),
(7503, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7504, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7505, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7506, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7507, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(7508, 'wptelegram_ver', '2.0.9', 'yes'),
(7509, 'widget_email-subscribers-form', 'a:2:{s:12:"_multiwidget";i:1;i:3;a:2:{s:5:"title";s:22:"Subscripció de correu";s:7:"form_id";i:1;}}', 'yes'),
(7510, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/masterpri?es=cron&guid=wyifls-ikzlmd-adwxps-vhtubl-rtkpow', 'yes'),
(7511, 'ig_admin_notices', 'a:0:{}', 'yes'),
(7512, 'ig_es_sync_wp_users', 's:4:"b:0;";', 'yes'),
(7513, 'ig_es_320_db_updated_at', '2019-05-13 07:44:20', 'no'),
(7514, 'ig_es_327_db_updated_at', '2019-05-13 07:44:20', 'no'),
(7515, 'ig_es_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(7516, 'ig_es_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(7517, 'ig_es_fromname', 'Admin', 'yes'),
(7518, 'ig_es_fromemail', 'a8000006@xtec.cat', 'yes'),
(7519, 'ig_es_emailtype', 'WP HTML MAIL', 'yes'),
(7520, 'ig_es_notifyadmin', 'YES', 'yes'),
(7521, 'ig_es_adminemail', 'a8000004@xtec.cat', 'yes'),
(7522, 'ig_es_admin_new_sub_subject', 'Escola L&#039;Arany Subscripci&oacute; nova de correu', 'yes'),
(7523, 'ig_es_admin_new_sub_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(7524, 'ig_es_welcomeemail', 'YES', 'yes'),
(10448, 'ig_es_welcomesubject', 'Escola L&#039;Arany Benvingut al nostre butlletí', 'yes'),
(10449, 'ig_es_welcomecontent', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10450, 'ig_es_optintype', 'Double Opt In', 'yes'),
(10451, 'ig_es_confirmsubject', 'Escola L&#039;Arany confirmeu la subscripció', 'yes'),
(10452, 'ig_es_confirmcontent', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10453, 'ig_es_optinlink', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10454, 'ig_es_unsublink', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10455, 'ig_es_unsubcontent', 'Si no esteu interessats en rebre correus des de Escola L&#039;Arany <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(10456, 'ig_es_unsubtext', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(10457, 'ig_es_successmsg', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(10458, 'ig_es_suberror', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(10459, 'ig_es_unsuberror', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(10461, 'ig_es_330_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10463, 'es_template_migration_done', 'yes', 'yes'),
(10465, 'ig_es_340_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10467, 'ig_es_3516_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10468, 'ig_es_from_name', 'Admin', 'yes'),
(10469, 'ig_es_from_email', 'a8000006@xtec.cat', 'yes'),
(10470, 'ig_es_admin_new_contact_email_subject', 'Escola L&#039;Arany Subscripci&oacute; nova de correu', 'yes'),
(10471, 'ig_es_admin_new_contact_email_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10472, 'ig_es_admin_emails', 'a8000006@xtec.cat', 'yes'),
(10473, 'ig_es_confirmation_mail_subject', 'Escola L&#039;Arany confirmeu la subscripció', 'yes'),
(10474, 'ig_es_confirmation_mail_content', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10475, 'ig_es_enable_welcome_email', 'yes', 'yes'),
(10476, 'ig_es_welcome_email_subject', 'Escola L&#039;Arany Benvingut al nostre butlletí', 'yes'),
(10477, 'ig_es_welcome_email_content', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10478, 'ig_es_sent_report_subject', 'Butlletí Informe enviament', 'yes'),
(10479, 'ig_es_sent_report_content', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(10480, 'ig_es_unsubscribe_link', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10481, 'ig_es_optin_link', 'http://pwc-int.educacio.intranet/agora/masterpri/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10482, 'ig_es_unsubscribe_link_content', 'Si no esteu interessats en rebre correus des de Escola L&#039;Arany <a href=''{{LINK}}''>feu clic aqu&iacute;</a> per donar-vos de baixa', 'yes'),
(10483, 'ig_es_email_type', 'wp_html_mail', 'yes'),
(10484, 'ig_es_notify_admin', 'yes', 'yes'),
(10485, 'ig_es_optin_type', 'double_opt_in', 'yes'),
(10486, 'ig_es_subscription_error_messsage', 'Vaja... Aquesta subscripci&oacute; no s''ha pogut completar, ho sentim. L''adre&ccedil;a de correu electr&ograve;nic est&agrave; bloquejada o ja est&agrave; subscrita. Gr&agrave;cies.', 'yes'),
(10487, 'ig_es_subscription_success_message', 'Gr&agrave;cies, heu estat subscrit amb &egrave;xit al nostre butllet&iacute; de not&iacute;cies.', 'yes'),
(10488, 'ig_es_unsubscribe_error_message', 'Vaja... Estem tenint algun error t&egrave;cnic. Torneu-ho a provar o contacteu amb l''administrador.', 'yes'),
(10489, 'ig_es_unsubscribe_success_message', 'Gr&agrave;cies, heu estat donat de baixa amb &egrave;xit. Ja no haur&iacute;eu de rebre not&iacute;cies nostres.', 'yes'),
(10491, 'ig_es_400_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10493, 'ig_es_401_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10495, 'ig_es_402_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10497, 'ig_es_403_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10499, 'ig_es_405_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10500, 'ig_es_db_version', '4.0.9', 'yes'),
(10505, 'wp_page_for_privacy_policy', '0', 'yes'),
(10506, 'show_comments_cookies_opt_in', '1', 'yes'),
(10512, '_ges_installed_before_39', '1', 'yes'),
(10513, '_ges_39_subscriptions_table_created', '1', 'yes'),
(10514, '_ges_39_queued_items_table_created', '1', 'yes'),
(10515, '_ges_revision_date', '2019-03-20 16:00 UTC', 'yes'),
(10525, '_ges_39_subscriptions_migrated', '1', 'yes'),
(10527, '_ges_39_digest_queue_migrated', '1', 'yes'),
(10531, 'acui_columns', 'a:0:{}', 'yes'),
(10532, 'acui_mail_subject', 'Benvinguts a Escola L&#039;Arany', 'yes'),
(10533, 'acui_mail_body', 'Benvinguts,<br/>Les vostres dades per iniciar sessió en aquest lloc són:<br/><ul><li>Adreça d''inici de sessió (URL): **loginurl**</li><li>Nom d''usuari= **username**</li><li>Password = **password**</li></ul>', 'yes'),
(10534, 'acui_mail_template_id', '0', 'yes'),
(10535, 'acui_mail_attachment_id', '0', 'yes'),
(10536, 'acui_enable_email_templates', '', 'yes'),
(10537, 'acui_cron_activated', '', 'yes'),
(10538, 'acui_cron_send_mail', '', 'yes'),
(10539, 'acui_cron_send_mail_updated', '', 'yes'),
(10540, 'acui_cron_delete_users', '', 'yes'),
(10541, 'acui_cron_delete_users_assign_posts', '0', 'yes'),
(10542, 'acui_cron_change_role_not_present', '', 'yes'),
(10543, 'acui_cron_change_role_not_present_role', '0', 'yes'),
(10544, 'acui_cron_path_to_file', '', 'yes'),
(10545, 'acui_cron_path_to_move', '', 'yes'),
(10546, 'acui_cron_path_to_move_auto_rename', '', 'yes'),
(10547, 'acui_cron_period', '', 'yes'),
(10548, 'acui_cron_role', '', 'yes'),
(10549, 'acui_cron_update_roles_existing_users', '', 'yes'),
(10550, 'acui_cron_log', '', 'yes'),
(10551, 'acui_cron_allow_multiple_accounts', 'not_allowed', 'yes'),
(10552, 'acui_frontend_send_mail', '', 'yes'),
(10553, 'acui_frontend_send_mail_updated', '', 'yes'),
(10554, 'acui_frontend_delete_users', '', 'yes'),
(10555, 'acui_frontend_delete_users_assign_posts', '0', 'yes'),
(10556, 'acui_frontend_change_role_not_present', '', 'yes'),
(10557, 'acui_frontend_change_role_not_present_role', '0', 'yes'),
(10558, 'acui_frontend_role', '', 'yes'),
(10559, 'acui_manually_send_mail', '', 'yes'),
(10560, 'acui_manually_send_mail_updated', '', 'yes'),
(10561, 'acui_automatic_wordpress_email', '', 'yes'),
(10562, 'acui_show_profile_fields', '', 'yes'),
(10563, 'acui_settings', 'wordpress', 'yes'),
(10564, 'acui_mail_from', '', 'yes'),
(10565, 'acui_mail_from_name', '', 'yes'),
(10566, 'acui_mailer', 'smtp', 'yes'),
(10567, 'acui_mail_set_return_path', 'false', 'yes'),
(10568, 'acui_smtp_host', 'localhost', 'yes'),
(10569, 'acui_smtp_port', '25', 'yes'),
(10570, 'acui_smtp_ssl', 'none', 'yes'),
(10571, 'acui_smtp_auth', '', 'yes'),
(10572, 'acui_smtp_user', '', 'yes'),
(10573, 'acui_smtp_pass', '', 'yes');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=6028 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 7, '_edit_lock', '1438071219:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'default'),
(5, 7, '_rawhtml_settings', '0,0,0,0'),
(6, 7, '_template_layout', '2c-l'),
(7, 9, '_edit_lock', '1466497549:1'),
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
(406, 107, '_edit_lock', '1466602840:1'),
(407, 107, '_edit_last', '1'),
(410, 107, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"3";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:5:"false";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(411, 107, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(412, 107, 'slides', 'a:8:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Observatori Fabra";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8295";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Activitats al riu";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8293";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Mesurant";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8296";}i:4;a:3:{s:7:"videoId";s:11:"BVHpTBC0egE";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:18:"Taller Lorem Ipsum";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:108:"Podeu afegir qualsevol text aquí. Cada diapositiva es pot vincular amb un enllaç. Prova a fer clic aquí. ";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#ffffff";s:3:"url";s:27:"http://tafanodes.skills.cat";s:9:"urlTarget";s:6:"_blank";s:4:"type";s:4:"text";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:7:"Panells";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8294";}i:7;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:17:"Mirant Montserrat";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8291";}i:8;a:3:{s:7:"videoId";s:43:"https://www.youtube.com/watch?v=sLOyKqtF-vs";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
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
(581, 148, '_edit_lock', '1466513471:1'),
(582, 148, '_edit_last', '1'),
(583, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"500";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(584, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(585, 148, 'slides', 'a:5:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
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
(897, 202, '_edit_lock', '1466601525:1'),
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
(954, 202, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"215";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:94:"<br><br>\r\nAquí podeu posar els missatges, vídeos o fotos destacades que vagin sortint al mur";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:3:{s:7:"videoId";s:11:"BVHpTBC0egE";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
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
(1222, 248, 'gce_list_max_num', '7'),
(1223, 248, 'gce_list_max_length', 'days'),
(1226, 248, 'gce_feed_start_interval', 'months'),
(1228, 248, 'gce_feed_end_interval', 'years'),
(1238, 248, '_edit_lock', '1474446703:2'),
(1239, 248, '_edit_last', '2'),
(1243, 248, 'gce_widget_paging_interval', ''),
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
(1672, 339, '_wp_attached_file', '2015/11/tartu.png'),
(1673, 339, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:511;s:6:"height";i:300;s:4:"file";s:17:"2015/11/tartu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"tartu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"tartu-300x176.png";s:5:"width";i:300;s:6:"height";i:176;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"tartu-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"tartu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1690, 372, '_wp_attached_file', '2015/11/OX253EDR6R-1.jpg'),
(1691, 372, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:5086;s:6:"height";i:2779;s:4:"file";s:24:"2015/11/OX253EDR6R-1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"OX253EDR6R-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x164.jpg";s:5:"width";i:300;s:6:"height";i:164;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:25:"OX253EDR6R-1-1024x560.jpg";s:5:"width";i:1024;s:6:"height";i:560;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"OX253EDR6R-1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"OX253EDR6R-1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";d:4;s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T3i";s:7:"caption";s:0:"";s:17:"created_timestamp";i:1415245685;s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"55";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:6:"0.0125";s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1753, 656, '_wp_attached_file', '2015/11/formador.png'),
(1754, 656, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:313;s:6:"height";i:204;s:4:"file";s:20:"2015/11/formador.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"formador-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"formador-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"formador-300x204.png";s:5:"width";i:300;s:6:"height";i:204;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"formador-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1755, 659, '_wp_attached_file', '2015/11/calendari.jpg'),
(1756, 659, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:555;s:6:"height";i:431;s:4:"file";s:21:"2015/11/calendari.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"calendari-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"calendari-300x233.jpg";s:5:"width";i:300;s:6:"height";i:233;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"calendari-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"calendari-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(1799, 888, '_wp_attached_file', '2015/11/favicon.ico'),
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
(2284, 1046, '_menu_item_type', 'custom'),
(2285, 1046, '_menu_item_menu_item_parent', '0'),
(2286, 1046, '_menu_item_object_id', '1046'),
(2287, 1046, '_menu_item_object', 'custom'),
(2288, 1046, '_menu_item_target', ''),
(2289, 1046, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2290, 1046, '_menu_item_xfn', ''),
(2291, 1046, '_menu_item_url', '#'),
(2292, 1047, '_menu_item_type', 'custom'),
(2293, 1047, '_menu_item_menu_item_parent', '0'),
(2294, 1047, '_menu_item_object_id', '1047'),
(2295, 1047, '_menu_item_object', 'custom'),
(2296, 1047, '_menu_item_target', ''),
(2297, 1047, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2298, 1047, '_menu_item_xfn', ''),
(2299, 1047, '_menu_item_url', '#'),
(2356, 1055, '_menu_item_type', 'custom'),
(2357, 1055, '_menu_item_menu_item_parent', '1068'),
(2358, 1055, '_menu_item_object_id', '1055'),
(2359, 1055, '_menu_item_object', 'custom'),
(2360, 1055, '_menu_item_target', ''),
(2361, 1055, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2362, 1055, '_menu_item_xfn', ''),
(2363, 1055, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/mastercda/activitat'),
(2396, 1060, '_menu_item_type', 'custom'),
(2397, 1060, '_menu_item_menu_item_parent', '1046'),
(2398, 1060, '_menu_item_object_id', '1060'),
(2399, 1060, '_menu_item_object', 'custom'),
(2400, 1060, '_menu_item_target', '_blank'),
(2401, 1060, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2402, 1060, '_menu_item_xfn', '');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2403, 1060, '_menu_item_url', 'http://aplitic.xtec.cat/merli'),
(2404, 1061, '_menu_item_type', 'custom'),
(2405, 1061, '_menu_item_menu_item_parent', '1046'),
(2406, 1061, '_menu_item_object_id', '1061'),
(2407, 1061, '_menu_item_object', 'custom'),
(2408, 1061, '_menu_item_target', '_blank'),
(2409, 1061, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2410, 1061, '_menu_item_xfn', ''),
(2411, 1061, '_menu_item_url', 'http://xtec.gencat.cat/ca/serveis/sez/crp/bancderecursos/'),
(2460, 1068, '_menu_item_type', 'custom'),
(2461, 1068, '_menu_item_menu_item_parent', '0'),
(2462, 1068, '_menu_item_object_id', '1068'),
(2463, 1068, '_menu_item_object', 'custom'),
(2464, 1068, '_menu_item_target', ''),
(2465, 1068, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2466, 1068, '_menu_item_xfn', ''),
(2467, 1068, '_menu_item_url', '#'),
(2468, 1069, '_menu_item_type', 'custom'),
(2469, 1069, '_menu_item_menu_item_parent', '1068'),
(2470, 1069, '_menu_item_object_id', '1069'),
(2471, 1069, '_menu_item_object', 'custom'),
(2472, 1069, '_menu_item_target', ''),
(2473, 1069, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2474, 1069, '_menu_item_xfn', ''),
(2475, 1069, '_menu_item_url', 'http://familiaiescola.gencat.cat/ca'),
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
(2520, 341, '_edit_last', '1'),
(2521, 341, '_wp_page_template', 'page-templates/side-menu.php'),
(2522, 341, '_template_layout', '2c-l'),
(2523, 341, 'sharing_disabled', '1'),
(3016, 148, '_edit_last', '1'),
(3017, 148, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"500";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3018, 148, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3019, 148, 'slides', 'a:5:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"32";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 5";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 5";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"36";}i:4;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:18:"Descripció Text 2";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#dd3333";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció Imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:2:"35";}}'),
(3020, 202, '_edit_last', '1'),
(3021, 202, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:7:"natural";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(3022, 202, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(3023, 202, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"215";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:94:"<br><br>\r\nAquí podeu posar els missatges, vídeos o fotos destacades que vagin sortint al mur";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:3:{s:7:"videoId";s:11:"BVHpTBC0egE";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}}'),
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
(3228, 1038, '_edit_lock', '1474447215:2'),
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
(3330, 1146, '_menu_item_type', 'custom'),
(3331, 1146, '_menu_item_menu_item_parent', '1046'),
(3332, 1146, '_menu_item_object_id', '1146'),
(3333, 1146, '_menu_item_object', 'custom'),
(3334, 1146, '_menu_item_target', '_blank'),
(3335, 1146, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3336, 1146, '_menu_item_xfn', ''),
(3337, 1146, '_menu_item_url', 'https://sites.google.com/a/xtec.cat/catalegs/home'),
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
(3439, 1162, '_bbp_group_ids', 'a:0:{}'),
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
(3571, 956, '_edit_last', '1'),
(3665, 1224, '_wp_attached_file', '2015/12/favicon.ico'),
(3686, 1237, '_wp_attached_file', '2015/12/fulles_p.jpg'),
(3687, 1237, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:560;s:4:"file";s:20:"2015/12/fulles_p.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"fulles_p-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"fulles_p-300x164.jpg";s:5:"width";i:300;s:6:"height";i:164;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"fulles_p-1024x560.jpg";s:5:"width";i:1024;s:6:"height";i:560;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"fulles_p-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"fulles_p-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";d:4;s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T3i";s:7:"caption";s:0:"";s:17:"created_timestamp";i:1415245685;s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"55";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:6:"0.0125";s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
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
(3740, 1256, '_bbp_group_ids', 'a:0:{}'),
(3833, 1307, '_menu_item_type', 'custom'),
(3834, 1307, '_menu_item_menu_item_parent', '1046'),
(3835, 1307, '_menu_item_object_id', '1307'),
(3836, 1307, '_menu_item_object', 'custom'),
(3837, 1307, '_menu_item_target', ''),
(3838, 1307, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(3839, 1307, '_menu_item_xfn', ''),
(3840, 1307, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/mastercda/docs'),
(4097, 8066, '_wp_attached_file', '2016/03/1apsc932015.jpg'),
(4098, 8066, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:600;s:6:"height";i:448;s:4:"file";s:23:"2016/03/1apsc932015.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"1apsc932015-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"1apsc932015-300x224.jpg";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"1apsc932015-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"1apsc932015-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(4238, 8089, '_menu_item_type', 'custom'),
(4239, 8089, '_menu_item_menu_item_parent', '0'),
(4240, 8089, '_menu_item_object_id', '8089'),
(4241, 8089, '_menu_item_object', 'custom'),
(4242, 8089, '_menu_item_target', '_blank'),
(4243, 8089, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4244, 8089, '_menu_item_xfn', ''),
(4245, 8089, '_menu_item_url', 'http://ateneu.xtec.cat/wikiform/wikiexport/fic/dir/index'),
(4247, 8090, '_menu_item_type', 'custom'),
(4248, 8090, '_menu_item_menu_item_parent', '0'),
(4249, 8090, '_menu_item_object_id', '8090'),
(4250, 8090, '_menu_item_object', 'custom'),
(4251, 8090, '_menu_item_target', '_blank'),
(4252, 8090, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4253, 8090, '_menu_item_xfn', ''),
(4254, 8090, '_menu_item_url', 'http://xtec.gencat.cat/ca/formacio/formaciopermanentprofessorat/fecb/fic/'),
(4256, 8091, '_menu_item_type', 'custom'),
(4257, 8091, '_menu_item_menu_item_parent', '0'),
(4258, 8091, '_menu_item_object_id', '8091'),
(4259, 8091, '_menu_item_object', 'custom'),
(4260, 8091, '_menu_item_target', '_blank'),
(4261, 8091, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4262, 8091, '_menu_item_xfn', ''),
(4263, 8091, '_menu_item_url', 'http://xtec.gencat.cat/ca/formacio/lamevaformacio/plans_formacio_zona/'),
(4274, 8093, '_menu_item_type', 'custom'),
(4275, 8093, '_menu_item_menu_item_parent', '0'),
(4276, 8093, '_menu_item_object_id', '8093'),
(4277, 8093, '_menu_item_object', 'custom'),
(4278, 8093, '_menu_item_target', ''),
(4279, 8093, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4280, 8093, '_menu_item_xfn', ''),
(4281, 8093, '_menu_item_url', 'http://xtec.gencat.cat/ca/formacio/'),
(4283, 8094, '_menu_item_type', 'custom'),
(4284, 8094, '_menu_item_menu_item_parent', '1116'),
(4285, 8094, '_menu_item_object_id', '8094'),
(4286, 8094, '_menu_item_object', 'custom'),
(4287, 8094, '_menu_item_target', '_blank'),
(4288, 8094, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4289, 8094, '_menu_item_xfn', ''),
(4290, 8094, '_menu_item_url', 'http://xtec.gencat.cat/ca/formacio/'),
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
(4318, 8113, '_edit_lock', '1466601614:1'),
(4319, 8113, 'sharing_disabled', '1'),
(4330, 8118, '_wp_attached_file', '2016/06/altbergueda.png'),
(4331, 8118, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:406;s:6:"height";i:136;s:4:"file";s:23:"2016/06/altbergueda.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"altbergueda-150x136.png";s:5:"width";i:150;s:6:"height";i:136;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"altbergueda-300x100.png";s:5:"width";i:300;s:6:"height";i:100;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"altbergueda-300x136.png";s:5:"width";i:300;s:6:"height";i:136;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"altbergueda-200x136.png";s:5:"width";i:200;s:6:"height";i:136;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4332, 8119, '_wp_attached_file', '2016/06/altbergueda-1.png'),
(4333, 8119, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:600;s:6:"height";i:201;s:4:"file";s:25:"2016/06/altbergueda-1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"altbergueda-1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"altbergueda-1-300x101.png";s:5:"width";i:300;s:6:"height";i:101;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"altbergueda-1-300x201.png";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"altbergueda-1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4334, 8120, '_wp_attached_file', '2016/06/altbergueda-2.png'),
(4335, 8120, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:462;s:6:"height";i:201;s:4:"file";s:25:"2016/06/altbergueda-2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"altbergueda-2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"altbergueda-2-300x131.png";s:5:"width";i:300;s:6:"height";i:131;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"altbergueda-2-300x201.png";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"altbergueda-2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4584, 8177, '_wp_attached_file', '2013/11/la-sala-tot.jpg'),
(4585, 8177, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:23:"2013/11/la-sala-tot.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"la-sala-tot-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"la-sala-tot-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:23:"la-sala-tot-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"la-sala-tot-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"la-sala-tot-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:3:"5.9";s:6:"credit";s:0:"";s:6:"camera";s:8:"DMC-TZ18";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1313913271";s:9:"copyright";s:0:"";s:12:"focal_length";s:4:"68.8";s:3:"iso";s:3:"100";s:13:"shutter_speed";s:7:"0.00625";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4586, 8177, '_wp_attachment_context', 'custom-background'),
(4587, 8177, '_wp_attachment_is_custom_background', 'twentyeleven'),
(4588, 8177, '_wp_attachment_context', 'custom-background'),
(4589, 8177, '_wp_attachment_is_custom_background', 'twentyeleven'),
(4590, 8178, '_wp_attached_file', '2013/11/la-sala-tot1.jpg'),
(4591, 8178, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:24:"2013/11/la-sala-tot1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"la-sala-tot1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:24:"la-sala-tot1-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:24:"la-sala-tot1-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"la-sala-tot1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"la-sala-tot1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:3:"5.9";s:6:"credit";s:0:"";s:6:"camera";s:8:"DMC-TZ18";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1313913271";s:9:"copyright";s:0:"";s:12:"focal_length";s:4:"68.8";s:3:"iso";s:3:"100";s:13:"shutter_speed";s:7:"0.00625";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4592, 8178, '_wp_attachment_context', 'custom-background'),
(4593, 8178, '_wp_attachment_is_custom_background', 'twentytwelve'),
(4594, 8178, '_wp_attachment_context', 'custom-background'),
(4595, 8178, '_wp_attachment_is_custom_background', 'twentytwelve'),
(4596, 8179, '_wp_attached_file', '2013/11/cropped-la-sala-tot2.jpg'),
(4597, 8179, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:287;s:4:"file";s:32:"2013/11/cropped-la-sala-tot2.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:32:"cropped-la-sala-tot2-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:31:"cropped-la-sala-tot2-300x86.jpg";s:5:"width";i:300;s:6:"height";i:86;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:32:"cropped-la-sala-tot2-768x220.jpg";s:5:"width";i:768;s:6:"height";i:220;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:32:"cropped-la-sala-tot2-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:32:"cropped-la-sala-tot2-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4598, 8179, '_wp_attachment_context', 'custom-header'),
(4599, 8179, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4600, 8179, '_wp_attachment_context', 'custom-header'),
(4601, 8179, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4602, 8180, '_wp_attached_file', '2013/11/cropped-retallat_la-sala-tot.jpg'),
(4603, 8180, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:40:"2013/11/cropped-retallat_la-sala-tot.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:40:"cropped-retallat_la-sala-tot-150x118.jpg";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:39:"cropped-retallat_la-sala-tot-300x35.jpg";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:39:"cropped-retallat_la-sala-tot-768x91.jpg";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:40:"cropped-retallat_la-sala-tot-300x118.jpg";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:40:"cropped-retallat_la-sala-tot-200x118.jpg";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4604, 8180, '_wp_attachment_context', 'custom-header'),
(4605, 8180, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4606, 8180, '_wp_attachment_context', 'custom-header'),
(4607, 8180, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4608, 8181, '_wp_attached_file', '2013/11/calendari.png'),
(4609, 8181, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:96;s:6:"height";i:104;s:4:"file";s:21:"2013/11/calendari.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4610, 62, '_wp_attached_file', '2013/11/cda-qui-som.png'),
(4611, 62, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:711;s:6:"height";i:291;s:4:"file";s:23:"2013/11/cda-qui-som.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"cda-qui-som-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"cda-qui-som-300x123.png";s:5:"width";i:300;s:6:"height";i:123;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"cda-qui-som-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"cda-qui-som-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4612, 65, '_wp_attached_file', '2013/11/cda-qui-som1.png'),
(4613, 65, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:711;s:6:"height";i:291;s:4:"file";s:24:"2013/11/cda-qui-som1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"cda-qui-som1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"cda-qui-som1-300x123.png";s:5:"width";i:300;s:6:"height";i:123;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"cda-qui-som1-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"cda-qui-som1-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4614, 118, '_wp_attached_file', '2013/11/serveis.png'),
(4615, 118, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:686;s:6:"height";i:168;s:4:"file";s:19:"2013/11/serveis.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"serveis-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"serveis-300x73.png";s:5:"width";i:300;s:6:"height";i:73;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"serveis-300x168.png";s:5:"width";i:300;s:6:"height";i:168;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"serveis-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4616, 132, '_wp_attached_file', '2013/11/ensenyament_h3.jpg'),
(4617, 132, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:454;s:6:"height";i:108;s:4:"file";s:26:"2013/11/ensenyament_h3.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"ensenyament_h3-150x108.jpg";s:5:"width";i:150;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"ensenyament_h3-300x71.jpg";s:5:"width";i:300;s:6:"height";i:71;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"ensenyament_h3-300x108.jpg";s:5:"width";i:300;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"ensenyament_h3-200x108.jpg";s:5:"width";i:200;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4618, 132, '_wp_attachment_image_alt', 'logo gencat'),
(4619, 132, '_edit_last', '1'),
(4620, 132, '_wp_attachment_image_alt', 'logo gencat'),
(4621, 132, '_edit_last', '1'),
(4646, 147, '_wp_attached_file', '2013/11/logoCDAEmporda1.png'),
(4647, 147, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:312;s:6:"height";i:69;s:4:"file";s:27:"2013/11/logoCDAEmporda1.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:26:"logoCDAEmporda1-150x69.png";s:5:"width";i:150;s:6:"height";i:69;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"logoCDAEmporda1-300x66.png";s:5:"width";i:300;s:6:"height";i:66;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:26:"logoCDAEmporda1-300x69.png";s:5:"width";i:300;s:6:"height";i:69;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:26:"logoCDAEmporda1-200x69.png";s:5:"width";i:200;s:6:"height";i:69;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4648, 8182, '_wp_attached_file', '2013/11/capcda.png'),
(4649, 8182, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:18:"2013/11/capcda.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"capcda-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"capcda-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:17:"capcda-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"capcda-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"capcda-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4650, 8182, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4651, 8182, '_wp_attachment_context', 'custom-header'),
(4652, 8182, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4653, 8182, '_wp_attachment_context', 'custom-header'),
(4654, 149, '_wp_attached_file', '2013/11/logoCDAEmporda80.png'),
(4655, 149, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:250;s:6:"height";i:55;s:4:"file";s:28:"2013/11/logoCDAEmporda80.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"logoCDAEmporda80-150x55.png";s:5:"width";i:150;s:6:"height";i:55;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"logoCDAEmporda80-200x55.png";s:5:"width";i:200;s:6:"height";i:55;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4656, 150, '_wp_attached_file', '2013/11/capcdablanc.png'),
(4657, 150, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:23:"2013/11/capcdablanc.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"capcdablanc-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:22:"capcdablanc-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:22:"capcdablanc-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"capcdablanc-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"capcdablanc-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4658, 151, '_wp_attached_file', '2013/11/capcdablanc1.png'),
(4659, 151, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:24:"2013/11/capcdablanc1.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"capcdablanc1-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"capcdablanc1-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:23:"capcdablanc1-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"capcdablanc1-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"capcdablanc1-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4660, 151, '_wp_attachment_context', 'custom-header'),
(4661, 151, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4662, 151, '_wp_attachment_context', 'custom-header'),
(4663, 151, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4664, 153, '_wp_attached_file', '2013/11/se1.png'),
(4665, 153, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:226;s:6:"height";i:78;s:4:"file";s:15:"2013/11/se1.png";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:14:"se1-150x78.png";s:5:"width";i:150;s:6:"height";i:78;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:14:"se1-200x78.png";s:5:"width";i:200;s:6:"height";i:78;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4666, 186, '_wp_attached_file', '2013/11/nivells.png'),
(4667, 186, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:719;s:6:"height";i:120;s:4:"file";s:19:"2013/11/nivells.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"nivells-150x120.png";s:5:"width";i:150;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"nivells-300x50.png";s:5:"width";i:300;s:6:"height";i:50;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"nivells-300x120.png";s:5:"width";i:300;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"nivells-200x120.png";s:5:"width";i:200;s:6:"height";i:120;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4668, 194, '_wp_attached_file', '2013/11/capcda1.png'),
(4669, 194, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:19:"2013/11/capcda1.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"capcda1-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"capcda1-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:18:"capcda1-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"capcda1-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"capcda1-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4670, 194, '_wp_attachment_context', 'custom-header'),
(4671, 194, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4672, 194, '_wp_attachment_context', 'custom-header'),
(4673, 194, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4674, 195, '_wp_attached_file', '2013/11/capcda2.png'),
(4675, 195, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:19:"2013/11/capcda2.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"capcda2-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"capcda2-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:18:"capcda2-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"capcda2-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"capcda2-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4676, 195, '_wp_attachment_context', 'custom-header'),
(4677, 195, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4678, 195, '_wp_attachment_context', 'custom-header'),
(4679, 195, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4680, 196, '_wp_attached_file', '2013/11/capcda3.png'),
(4681, 196, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:19:"2013/11/capcda3.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"capcda3-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"capcda3-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:18:"capcda3-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"capcda3-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"capcda3-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4682, 196, '_wp_attachment_context', 'custom-header'),
(4683, 196, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4684, 196, '_wp_attachment_context', 'custom-header'),
(4685, 196, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4686, 197, '_wp_attached_file', '2013/11/wallpaper-964432.jpg');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(4687, 197, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1920;s:6:"height";i:1200;s:4:"file";s:28:"2013/11/wallpaper-964432.jpg";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"wallpaper-964432-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"wallpaper-964432-300x188.jpg";s:5:"width";i:300;s:6:"height";i:188;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:28:"wallpaper-964432-768x480.jpg";s:5:"width";i:768;s:6:"height";i:480;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:29:"wallpaper-964432-1024x640.jpg";s:5:"width";i:1024;s:6:"height";i:640;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"wallpaper-964432-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"wallpaper-964432-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:24:"www.marketwallpapers.com";s:6:"camera";s:0:"";s:7:"caption";s:17:"Market Wallpapers";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:17:"Market Wallpapers";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4688, 197, '_wp_attachment_context', 'custom-background'),
(4689, 197, '_wp_attachment_is_custom_background', 'twentyeleven'),
(4690, 197, '_wp_attachment_context', 'custom-background'),
(4691, 197, '_wp_attachment_is_custom_background', 'twentyeleven'),
(4692, 198, '_wp_attached_file', '2013/11/capcda4.png'),
(4693, 198, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:19:"2013/11/capcda4.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"capcda4-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"capcda4-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:18:"capcda4-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"capcda4-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"capcda4-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4694, 198, '_wp_attachment_context', 'custom-header'),
(4695, 198, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4696, 198, '_wp_attachment_context', 'custom-header'),
(4697, 198, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4728, 4, '_wp_attached_file', '2013/12/cropped-capcda4.png'),
(4729, 4, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:27:"2013/12/cropped-capcda4.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"cropped-capcda4-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"cropped-capcda4-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:26:"cropped-capcda4-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"cropped-capcda4-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"cropped-capcda4-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4730, 4, '_wp_attachment_context', 'custom-header'),
(4731, 4, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4734, 275, '_wp_attached_file', '2013/11/2013-11-17_1231.png'),
(4735, 275, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:656;s:6:"height";i:110;s:4:"file";s:27:"2013/11/2013-11-17_1231.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"2013-11-17_1231-150x110.png";s:5:"width";i:150;s:6:"height";i:110;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"2013-11-17_1231-300x50.png";s:5:"width";i:300;s:6:"height";i:50;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"2013-11-17_1231-300x110.png";s:5:"width";i:300;s:6:"height";i:110;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"2013-11-17_1231-200x110.png";s:5:"width";i:200;s:6:"height";i:110;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4736, 299, '_wp_attached_file', '2013/11/bolet.png'),
(4737, 299, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:94;s:6:"height";i:126;s:4:"file";s:17:"2013/11/bolet.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4738, 300, '_wp_attached_file', '2013/11/bolets.png'),
(4739, 300, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:546;s:6:"height";i:151;s:4:"file";s:18:"2013/11/bolets.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"bolets-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"bolets-300x83.png";s:5:"width";i:300;s:6:"height";i:83;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"bolets-300x151.png";s:5:"width";i:300;s:6:"height";i:151;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"bolets-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4740, 320, '_wp_attached_file', '2013/11/fonts.png'),
(4741, 320, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:330;s:6:"height";i:247;s:4:"file";s:17:"2013/11/fonts.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"fonts-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"fonts-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"fonts-300x247.png";s:5:"width";i:300;s:6:"height";i:247;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"fonts-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4786, 484, '_wp_attached_file', '2013/11/cda-qui-som2.png'),
(4787, 484, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:711;s:6:"height";i:291;s:4:"file";s:24:"2013/11/cda-qui-som2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"cda-qui-som2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"cda-qui-som2-300x123.png";s:5:"width";i:300;s:6:"height";i:123;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:24:"cda-qui-som2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:24:"cda-qui-som2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4788, 8186, '_wp_attached_file', '2013/11/Selecció_062.png'),
(4789, 8186, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1234;s:6:"height";i:868;s:4:"file";s:25:"2013/11/Selecció_062.png";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_062-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_062-300x211.png";s:5:"width";i:300;s:6:"height";i:211;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:25:"Selecció_062-768x540.png";s:5:"width";i:768;s:6:"height";i:540;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"Selecció_062-1024x720.png";s:5:"width";i:1024;s:6:"height";i:720;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_062-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_062-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4790, 8187, '_wp_attached_file', '2013/11/Selecció_063.png'),
(4791, 8187, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:913;s:6:"height";i:665;s:4:"file";s:25:"2013/11/Selecció_063.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Selecció_063-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:25:"Selecció_063-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:25:"Selecció_063-768x559.png";s:5:"width";i:768;s:6:"height";i:559;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Selecció_063-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Selecció_063-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4792, 8188, '_wp_attached_file', '2013/12/camp_aprenentatge.png'),
(4793, 8188, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:29:"2013/12/camp_aprenentatge.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:29:"camp_aprenentatge-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"camp_aprenentatge-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:28:"camp_aprenentatge-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:29:"camp_aprenentatge-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:29:"camp_aprenentatge-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4794, 8188, '_wp_attachment_context', 'custom-header'),
(4795, 8188, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4796, 620, '_wp_attached_file', '2013/12/badge.png'),
(4797, 620, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:280;s:6:"height";i:280;s:4:"file";s:17:"2013/12/badge.png";s:5:"sizes";a:3:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"badge-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"badge-280x250.png";s:5:"width";i:280;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"badge-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4798, 626, '_wp_attached_file', '2013/11/Selecció_083.png'),
(4799, 626, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:141;s:6:"height";i:122;s:4:"file";s:25:"2013/11/Selecció_083.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4800, 627, '_wp_attached_file', '2013/11/Selecció_084.png'),
(4801, 627, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:124;s:6:"height";i:111;s:4:"file";s:25:"2013/11/Selecció_084.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4802, 8189, '_wp_attached_file', '2013/11/Selecció_085.png'),
(4803, 8189, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:117;s:6:"height";i:94;s:4:"file";s:25:"2013/11/Selecció_085.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4804, 629, '_wp_attached_file', '2013/11/Selecció_086.png'),
(4805, 629, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:122;s:6:"height";i:114;s:4:"file";s:25:"2013/11/Selecció_086.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4806, 8190, '_wp_attached_file', '2013/11/Selecció_087.png'),
(4807, 8190, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:129;s:6:"height";i:112;s:4:"file";s:25:"2013/11/Selecció_087.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4810, 672, '_wp_attached_file', '2013/12/capcdalogogen.png'),
(4811, 672, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:25:"2013/12/capcdalogogen.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"capcdalogogen-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"capcdalogogen-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:24:"capcdalogogen-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"capcdalogogen-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"capcdalogogen-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4812, 672, '_wp_attachment_context', 'custom-header'),
(4813, 672, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4814, 673, '_wp_attached_file', '2013/12/cdaheader.png'),
(4815, 673, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:21:"2013/12/cdaheader.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"cdaheader-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"cdaheader-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:20:"cdaheader-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"cdaheader-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"cdaheader-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4816, 673, '_wp_attachment_context', 'custom-header'),
(4817, 673, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4818, 674, '_wp_attached_file', '2013/12/logoraw.png'),
(4819, 674, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:19:"2013/12/logoraw.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"logoraw-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"logoraw-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:18:"logoraw-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"logoraw-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"logoraw-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4820, 674, '_wp_attachment_context', 'custom-header'),
(4821, 674, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4822, 675, '_wp_attached_file', '2013/12/logobn.png'),
(4823, 675, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:18:"2013/12/logobn.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"logobn-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"logobn-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:17:"logobn-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"logobn-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"logobn-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4824, 675, '_wp_attachment_context', 'custom-header'),
(4825, 675, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4826, 676, '_wp_attached_file', '2013/12/ensenyament_bn_h2.jpg'),
(4827, 676, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:804;s:6:"height";i:108;s:4:"file";s:29:"2013/12/ensenyament_bn_h2.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:29:"ensenyament_bn_h2-150x108.jpg";s:5:"width";i:150;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"ensenyament_bn_h2-300x40.jpg";s:5:"width";i:300;s:6:"height";i:40;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:29:"ensenyament_bn_h2-768x103.jpg";s:5:"width";i:768;s:6:"height";i:103;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:29:"ensenyament_bn_h2-300x108.jpg";s:5:"width";i:300;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:29:"ensenyament_bn_h2-200x108.jpg";s:5:"width";i:200;s:6:"height";i:108;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4828, 677, '_wp_attached_file', '2013/12/logopetit.png'),
(4829, 677, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:21:"2013/12/logopetit.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"logopetit-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"logopetit-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:20:"logopetit-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"logopetit-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"logopetit-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4830, 677, '_wp_attachment_context', 'custom-header'),
(4831, 677, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4832, 8192, '_menu_item_type', 'custom'),
(4833, 8192, '_menu_item_menu_item_parent', '0'),
(4834, 8192, '_menu_item_object_id', '8192'),
(4835, 8192, '_menu_item_object', 'custom'),
(4836, 8192, '_menu_item_target', ''),
(4837, 8192, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4838, 8192, '_menu_item_xfn', ''),
(4839, 8192, '_menu_item_url', 'http://blocs.xtec.cat/plantillacda'),
(4840, 678, '_wp_attached_file', '2013/12/camp_aprenentatge_ok.png'),
(4841, 678, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:32:"2013/12/camp_aprenentatge_ok.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:32:"camp_aprenentatge_ok-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:31:"camp_aprenentatge_ok-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:31:"camp_aprenentatge_ok-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:32:"camp_aprenentatge_ok-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:32:"camp_aprenentatge_ok-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4842, 678, '_wp_attachment_context', 'custom-header'),
(4843, 678, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4844, 678, '_oembed_4b8ab10c88968ebfb69c7b8f80d2a383', '{{unknown}}'),
(4845, 679, '_wp_attached_file', '2013/12/logogenbn.jpg'),
(4846, 679, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:250;s:6:"height";i:36;s:4:"file";s:21:"2013/12/logogenbn.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"logogenbn-150x36.jpg";s:5:"width";i:150;s:6:"height";i:36;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"logogenbn-200x36.jpg";s:5:"width";i:200;s:6:"height";i:36;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4847, 680, '_wp_attached_file', '2013/12/logotira.jpg'),
(4848, 680, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1200;s:6:"height";i:36;s:4:"file";s:20:"2013/12/logotira.jpg";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"logotira-150x36.jpg";s:5:"width";i:150;s:6:"height";i:36;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:18:"logotira-300x9.jpg";s:5:"width";i:300;s:6:"height";i:9;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:19:"logotira-768x23.jpg";s:5:"width";i:768;s:6:"height";i:23;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:20:"logotira-1024x31.jpg";s:5:"width";i:1024;s:6:"height";i:31;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"logotira-300x36.jpg";s:5:"width";i:300;s:6:"height";i:36;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"logotira-200x36.jpg";s:5:"width";i:200;s:6:"height";i:36;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4849, 680, '_edit_last', '1'),
(4850, 681, '_wp_attached_file', '2013/12/logotira2.jpg'),
(4851, 681, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1528;s:6:"height";i:25;s:4:"file";s:21:"2013/12/logotira2.jpg";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"logotira2-150x25.jpg";s:5:"width";i:150;s:6:"height";i:25;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"logotira2-300x5.jpg";s:5:"width";i:300;s:6:"height";i:5;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"logotira2-768x13.jpg";s:5:"width";i:768;s:6:"height";i:13;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"logotira2-1024x17.jpg";s:5:"width";i:1024;s:6:"height";i:17;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"logotira2-300x25.jpg";s:5:"width";i:300;s:6:"height";i:25;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"logotira2-200x25.jpg";s:5:"width";i:200;s:6:"height";i:25;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4852, 681, '_edit_last', '1'),
(4853, 682, '_wp_attached_file', '2013/12/logobnpetit.jpg'),
(4854, 682, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:214;s:6:"height";i:33;s:4:"file";s:23:"2013/12/logobnpetit.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"logobnpetit-150x33.jpg";s:5:"width";i:150;s:6:"height";i:33;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"logobnpetit-200x33.jpg";s:5:"width";i:200;s:6:"height";i:33;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4855, 683, '_wp_attached_file', '2013/12/logobnpetit1.jpg'),
(4856, 683, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:214;s:6:"height";i:33;s:4:"file";s:24:"2013/12/logobnpetit1.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"logobnpetit1-150x33.jpg";s:5:"width";i:150;s:6:"height";i:33;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"logobnpetit1-200x33.jpg";s:5:"width";i:200;s:6:"height";i:33;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4857, 698, '_wp_attached_file', '2014/01/capçalera.png'),
(4858, 698, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:118;s:4:"file";s:22:"2014/01/capçalera.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"capçalera-150x118.png";s:5:"width";i:150;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"capçalera-300x35.png";s:5:"width";i:300;s:6:"height";i:35;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:21:"capçalera-768x91.png";s:5:"width";i:768;s:6:"height";i:91;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"capçalera-300x118.png";s:5:"width";i:300;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"capçalera-200x118.png";s:5:"width";i:200;s:6:"height";i:118;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4859, 698, '_wp_attachment_is_custom_header', 'twentyeleven'),
(4860, 698, '_wp_attachment_context', 'custom-header'),
(4861, 699, '_wp_attached_file', '2013/11/març2010-031.jpg'),
(4862, 699, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:25:"2013/11/març2010-031.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"març2010-031-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"març2010-031-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:25:"març2010-031-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"març2010-031-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"març2010-031-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"4";s:6:"credit";s:0:"";s:6:"camera";s:20:"Canon PowerShot A540";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1268120120";s:9:"copyright";s:0:"";s:12:"focal_length";s:3:"5.8";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:5:"0.001";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(4863, 746, '_wp_attached_file', '2013/11/IMG_5811.jpg'),
(4864, 746, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:860;s:6:"height";i:645;s:4:"file";s:20:"2013/11/IMG_5811.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"IMG_5811-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"IMG_5811-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"IMG_5811-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"IMG_5811-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"IMG_5811-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:10:"Picasa 2.7";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4873, 54, '_edit_last', '1'),
(4874, 54, '_rawhtml_settings', '0,0,0,0'),
(4875, 54, '_wp_page_template', 'page-templates/side-menu.php'),
(4876, 54, '_edit_last', '1'),
(4877, 54, '_rawhtml_settings', '0,0,0,0'),
(4878, 54, '_wp_page_template', 'page-templates/side-menu.php'),
(4879, 71, '_wp_page_template', 'page-templates/side-menu.php'),
(4880, 71, '_rawhtml_settings', '0,0,0,0'),
(4881, 71, '_edit_last', '1'),
(4882, 71, 'addthis_exclude', 'true'),
(4883, 71, '_wp_page_template', 'page-templates/side-menu.php'),
(4884, 71, '_rawhtml_settings', '0,0,0,0'),
(4885, 71, '_edit_last', '1'),
(4886, 71, 'addthis_exclude', 'true'),
(4887, 80, '_wp_page_template', 'sidebar-page.php'),
(4888, 80, '_rawhtml_settings', '1,1,1,1'),
(4889, 80, '_edit_last', '1'),
(4890, 80, '_wp_page_template', 'sidebar-page.php'),
(4891, 80, '_rawhtml_settings', '1,1,1,1'),
(4892, 80, '_edit_last', '1'),
(4893, 83, '_rawhtml_settings', '0,0,0,0'),
(4894, 83, '_edit_last', '2'),
(4895, 83, '_wp_page_template', 'page-templates/side-menu.php'),
(4896, 83, '_rawhtml_settings', '0,0,0,0'),
(4897, 83, '_edit_last', '2'),
(4898, 83, '_wp_page_template', 'page-templates/side-menu.php'),
(4899, 83, 'addthis_exclude', 'true'),
(4900, 155, '_edit_last', '1'),
(4901, 155, '_rawhtml_settings', '0,0,0,0'),
(4902, 155, '_wp_page_template', 'page-templates/side-menu.php'),
(4903, 155, '_edit_last', '1'),
(4904, 155, '_rawhtml_settings', '0,0,0,0'),
(4905, 155, '_wp_page_template', 'page-templates/side-menu.php'),
(4906, 155, 'addthis_exclude', 'true'),
(4907, 157, '_edit_last', '1'),
(4908, 157, '_rawhtml_settings', '0,0,0,0'),
(4909, 157, '_wp_page_template', 'page-templates/side-menu.php'),
(4910, 157, 'addthis_exclude', 'true'),
(4911, 157, '_edit_last', '1'),
(4912, 157, '_rawhtml_settings', '0,0,0,0'),
(4913, 157, '_wp_page_template', 'page-templates/side-menu.php'),
(4914, 157, 'addthis_exclude', 'true'),
(4915, 160, '_edit_last', '1'),
(4916, 160, '_rawhtml_settings', '0,0,0,0'),
(4917, 160, '_wp_page_template', 'page-templates/side-menu.php'),
(4918, 160, 'addthis_exclude', 'true'),
(4919, 160, '_edit_last', '1'),
(4920, 160, '_rawhtml_settings', '0,0,0,0'),
(4921, 160, '_wp_page_template', 'page-templates/side-menu.php'),
(4922, 160, 'addthis_exclude', 'true'),
(4923, 443, '_wp_page_template', 'page-templates/side-menu.php'),
(4924, 443, '_edit_last', '1'),
(4925, 443, '_rawhtml_settings', '0,0,0,0'),
(4926, 443, '_thumbnail_id', '65'),
(4927, 443, '_wp_page_template', 'page-templates/side-menu.php'),
(4928, 443, '_edit_last', '1'),
(4929, 443, '_rawhtml_settings', '0,0,0,0'),
(4930, 443, '_thumbnail_id', '65'),
(4931, 443, 'addthis_exclude', 'true'),
(4932, 8194, '_menu_item_type', 'custom'),
(4933, 8194, '_menu_item_menu_item_parent', '0'),
(4934, 8194, '_menu_item_object_id', '8194'),
(4935, 8194, '_menu_item_object', 'custom'),
(4936, 8194, '_menu_item_target', ''),
(4937, 8194, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4938, 8194, '_menu_item_xfn', ''),
(4939, 8194, '_menu_item_url', 'http://blocs.xtec.cat/plantillacda/trobades-de-coordinacio/'),
(4944, 8195, '_menu_item_type', 'post_type'),
(4945, 8195, '_menu_item_menu_item_parent', '0'),
(4946, 8195, '_menu_item_object_id', '443'),
(4947, 8195, '_menu_item_object', 'page'),
(4948, 8195, '_menu_item_target', ''),
(4949, 8195, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(4950, 8195, '_menu_item_xfn', ''),
(4951, 8195, '_menu_item_url', ''),
(4952, 165, '_edit_last', '1'),
(4953, 165, '_rawhtml_settings', '0,0,0,0'),
(4954, 165, '_wp_page_template', 'page-templates/side-menu.php'),
(4955, 165, '_edit_last', '1'),
(4956, 165, '_rawhtml_settings', '0,0,0,0'),
(4957, 165, '_wp_page_template', 'page-templates/side-menu.php'),
(4964, 8197, '_edit_last', '1'),
(4965, 8197, '_rawhtml_settings', '0,0,0,0'),
(4966, 8197, '_wp_page_template', 'page-templates/side-menu.php'),
(4967, 8197, '_edit_last', '1'),
(4968, 8197, '_rawhtml_settings', '0,0,0,0'),
(4969, 8197, '_wp_page_template', 'page-templates/side-menu.php'),
(4970, 8198, '_edit_last', '1'),
(4971, 8198, '_wp_page_template', 'page-templates/side-menu.php'),
(4972, 8198, '_rawhtml_settings', '0,0,0,0'),
(4973, 8198, '_thumbnail_id', '8181'),
(4974, 8198, '_edit_last', '1'),
(4975, 8198, '_wp_page_template', 'page-templates/side-menu.php'),
(4976, 8198, '_rawhtml_settings', '0,0,0,0'),
(4977, 8198, '_thumbnail_id', '8181'),
(4978, 8199, '_rawhtml_settings', '0,0,0,0'),
(4979, 8199, '_wp_page_template', 'page-templates/side-menu.php'),
(4980, 8199, '_edit_last', '1'),
(4981, 8199, '_rawhtml_settings', '0,0,0,0'),
(4982, 8199, '_wp_page_template', 'page-templates/side-menu.php'),
(4983, 8199, '_edit_last', '1'),
(4984, 8199, 'addthis_exclude', 'true'),
(4985, 253, '_edit_last', '1'),
(4986, 253, '_rawhtml_settings', '0,0,0,0'),
(4987, 253, '_wp_page_template', 'page-templates/side-menu.php'),
(4988, 253, 'addthis_exclude', 'true'),
(4989, 253, '_edit_last', '1'),
(4990, 253, '_rawhtml_settings', '0,0,0,0'),
(4991, 253, '_wp_page_template', 'page-templates/side-menu.php'),
(4992, 253, 'addthis_exclude', 'true'),
(4993, 254, '_edit_last', '1'),
(4994, 254, '_rawhtml_settings', '0,0,0,0'),
(4995, 254, '_wp_page_template', 'sidebar-page.php'),
(4996, 254, 'addthis_exclude', 'true'),
(4997, 254, '_edit_last', '1'),
(4998, 254, '_rawhtml_settings', '0,0,0,0'),
(4999, 254, '_wp_page_template', 'sidebar-page.php'),
(5000, 254, 'addthis_exclude', 'true'),
(5001, 294, '_edit_last', '1'),
(5002, 294, '_rawhtml_settings', '0,0,0,0'),
(5003, 294, '_wp_page_template', 'page-templates/side-menu.php'),
(5004, 294, '_edit_last', '1'),
(5005, 294, '_rawhtml_settings', '0,0,0,0'),
(5006, 294, '_wp_page_template', 'page-templates/side-menu.php'),
(5007, 316, '_edit_last', '1'),
(5008, 316, '_rawhtml_settings', '0,0,0,0'),
(5009, 316, '_wp_page_template', 'page-templates/side-menu.php'),
(5010, 316, '_edit_last', '1'),
(5011, 316, '_rawhtml_settings', '0,0,0,0'),
(5012, 316, '_wp_page_template', 'page-templates/side-menu.php'),
(5013, 359, 'addthis_exclude', 'true'),
(5014, 359, '_wp_page_template', 'page-templates/side-menu.php'),
(5015, 359, '_rawhtml_settings', '0,0,0,0'),
(5016, 359, '_edit_last', '1'),
(5017, 359, 'addthis_exclude', 'true'),
(5018, 359, '_wp_page_template', 'page-templates/side-menu.php'),
(5019, 359, '_rawhtml_settings', '0,0,0,0'),
(5020, 359, '_edit_last', '1'),
(5021, 361, '_rawhtml_settings', '0,0,0,0'),
(5022, 361, '_edit_last', '1'),
(5023, 361, '_wp_page_template', 'sidebar-page.php'),
(5024, 361, 'addthis_exclude', 'true'),
(5025, 361, '_rawhtml_settings', '0,0,0,0'),
(5026, 361, '_edit_last', '1'),
(5027, 361, '_wp_page_template', 'sidebar-page.php'),
(5028, 361, 'addthis_exclude', 'true'),
(5037, 433, '_edit_last', '1'),
(5038, 433, '_rawhtml_settings', '0,0,0,0'),
(5039, 433, '_wp_page_template', 'default'),
(5040, 433, '_edit_last', '1'),
(5041, 433, '_rawhtml_settings', '0,0,0,0'),
(5042, 433, '_wp_page_template', 'default'),
(5043, 433, 'addthis_exclude', 'true'),
(5047, 549, '_edit_last', '1'),
(5048, 549, '_rawhtml_settings', '0,0,0,0'),
(5049, 549, '_wp_page_template', 'page-templates/side-menu.php'),
(5050, 549, 'addthis_exclude', 'true'),
(5054, 600, '_edit_last', '1'),
(5055, 600, '_rawhtml_settings', '0,0,0,0'),
(5056, 600, '_wp_page_template', 'page-templates/side-menu.php'),
(5057, 600, 'addthis_exclude', 'true'),
(5058, 600, '_oembed_3e54510d627e1f7530cf63d288280eec', '{{unknown}}'),
(5059, 600, '_oembed_49421e295476dbeafcd4f3c7be1122d5', '{{unknown}}'),
(5069, 8200, '_edit_last', '1'),
(5070, 8200, '_rawhtml_settings', '0,0,0,0'),
(5071, 8200, '_edit_last', '1'),
(5072, 8200, '_rawhtml_settings', '0,0,0,0'),
(5073, 207, '_edit_last', '1'),
(5074, 207, '_rawhtml_settings', '0,0,0,0'),
(5075, 207, '_edit_last', '1'),
(5076, 207, '_rawhtml_settings', '0,0,0,0'),
(5077, 8201, '_edit_last', '1'),
(5078, 8201, '_rawhtml_settings', '0,0,0,0'),
(5079, 8201, '_edit_last', '1'),
(5080, 8201, '_rawhtml_settings', '0,0,0,0'),
(5081, 249, '_edit_last', '1'),
(5082, 249, '_rawhtml_settings', '0,0,0,0'),
(5083, 249, '_edit_last', '1'),
(5084, 249, '_rawhtml_settings', '0,0,0,0'),
(5092, 8203, '_menu_item_type', 'post_type'),
(5093, 8203, '_menu_item_menu_item_parent', '0'),
(5094, 8203, '_menu_item_object_id', '83'),
(5095, 8203, '_menu_item_object', 'page'),
(5096, 8203, '_menu_item_target', ''),
(5097, 8203, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5098, 8203, '_menu_item_xfn', ''),
(5099, 8203, '_menu_item_url', ''),
(5100, 8204, '_menu_item_type', 'post_type'),
(5101, 8204, '_menu_item_menu_item_parent', '0'),
(5102, 8204, '_menu_item_object_id', '155'),
(5103, 8204, '_menu_item_object', 'page'),
(5104, 8204, '_menu_item_target', ''),
(5105, 8204, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5106, 8204, '_menu_item_xfn', ''),
(5107, 8204, '_menu_item_url', ''),
(5108, 8205, '_menu_item_type', 'post_type'),
(5109, 8205, '_menu_item_menu_item_parent', '0'),
(5110, 8205, '_menu_item_object_id', '8197'),
(5111, 8205, '_menu_item_object', 'page'),
(5112, 8205, '_menu_item_target', ''),
(5113, 8205, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5114, 8205, '_menu_item_xfn', ''),
(5115, 8205, '_menu_item_url', ''),
(5116, 8206, '_menu_item_type', 'post_type'),
(5117, 8206, '_menu_item_menu_item_parent', '0'),
(5118, 8206, '_menu_item_object_id', '165'),
(5119, 8206, '_menu_item_object', 'page'),
(5120, 8206, '_menu_item_target', ''),
(5121, 8206, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5122, 8206, '_menu_item_xfn', ''),
(5123, 8206, '_menu_item_url', ''),
(5124, 8207, '_menu_item_type', 'post_type'),
(5125, 8207, '_menu_item_menu_item_parent', '0'),
(5126, 8207, '_menu_item_object_id', '71'),
(5127, 8207, '_menu_item_object', 'page'),
(5128, 8207, '_menu_item_target', ''),
(5129, 8207, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5130, 8207, '_menu_item_xfn', ''),
(5131, 8207, '_menu_item_url', ''),
(5132, 8208, '_menu_item_type', 'post_type'),
(5133, 8208, '_menu_item_menu_item_parent', '0'),
(5134, 8208, '_menu_item_object_id', '54'),
(5135, 8208, '_menu_item_object', 'page'),
(5136, 8208, '_menu_item_target', ''),
(5137, 8208, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5138, 8208, '_menu_item_xfn', ''),
(5139, 8208, '_menu_item_url', ''),
(5140, 8209, '_menu_item_type', 'post_type'),
(5141, 8209, '_menu_item_menu_item_parent', '0'),
(5142, 8209, '_menu_item_object_id', '160'),
(5143, 8209, '_menu_item_object', 'page'),
(5144, 8209, '_menu_item_target', ''),
(5145, 8209, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5146, 8209, '_menu_item_xfn', ''),
(5147, 8209, '_menu_item_url', ''),
(5148, 8210, '_menu_item_type', 'post_type'),
(5149, 8210, '_menu_item_menu_item_parent', '0'),
(5150, 8210, '_menu_item_object_id', '157'),
(5151, 8210, '_menu_item_object', 'page'),
(5152, 8210, '_menu_item_target', ''),
(5153, 8210, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5154, 8210, '_menu_item_xfn', ''),
(5155, 8210, '_menu_item_url', ''),
(5156, 8211, '_menu_item_type', 'post_type'),
(5157, 8211, '_menu_item_menu_item_parent', '0'),
(5158, 8211, '_menu_item_object_id', '8198'),
(5159, 8211, '_menu_item_object', 'page'),
(5160, 8211, '_menu_item_target', ''),
(5161, 8211, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5162, 8211, '_menu_item_xfn', ''),
(5163, 8211, '_menu_item_url', ''),
(5164, 8212, '_menu_item_type', 'post_type'),
(5165, 8212, '_menu_item_menu_item_parent', '0'),
(5166, 8212, '_menu_item_object_id', '8199'),
(5167, 8212, '_menu_item_object', 'page'),
(5168, 8212, '_menu_item_target', ''),
(5169, 8212, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5170, 8212, '_menu_item_xfn', ''),
(5171, 8212, '_menu_item_url', ''),
(5172, 8213, '_menu_item_type', 'post_type'),
(5173, 8213, '_menu_item_menu_item_parent', '0'),
(5174, 8213, '_menu_item_object_id', '254'),
(5175, 8213, '_menu_item_object', 'page'),
(5176, 8213, '_menu_item_target', ''),
(5177, 8213, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5178, 8213, '_menu_item_xfn', ''),
(5179, 8213, '_menu_item_url', ''),
(5180, 8214, '_menu_item_type', 'post_type'),
(5181, 8214, '_menu_item_menu_item_parent', '0'),
(5182, 8214, '_menu_item_object_id', '316'),
(5183, 8214, '_menu_item_object', 'page'),
(5184, 8214, '_menu_item_target', ''),
(5185, 8214, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5186, 8214, '_menu_item_xfn', ''),
(5187, 8214, '_menu_item_url', ''),
(5188, 8215, '_menu_item_type', 'post_type'),
(5189, 8215, '_menu_item_menu_item_parent', '0'),
(5190, 8215, '_menu_item_object_id', '549'),
(5191, 8215, '_menu_item_object', 'page'),
(5192, 8215, '_menu_item_target', ''),
(5193, 8215, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5194, 8215, '_menu_item_xfn', ''),
(5195, 8215, '_menu_item_url', ''),
(5196, 8216, '_menu_item_type', 'post_type'),
(5197, 8216, '_menu_item_menu_item_parent', '0'),
(5198, 8216, '_menu_item_object_id', '253'),
(5199, 8216, '_menu_item_object', 'page'),
(5200, 8216, '_menu_item_target', ''),
(5201, 8216, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5202, 8216, '_menu_item_xfn', ''),
(5203, 8216, '_menu_item_url', ''),
(5204, 8217, '_menu_item_type', 'post_type'),
(5205, 8217, '_menu_item_menu_item_parent', '0'),
(5206, 8217, '_menu_item_object_id', '359'),
(5207, 8217, '_menu_item_object', 'page'),
(5208, 8217, '_menu_item_target', ''),
(5209, 8217, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5210, 8217, '_menu_item_xfn', ''),
(5211, 8217, '_menu_item_url', ''),
(5222, 8223, '_menu_item_type', 'post_type'),
(5223, 8223, '_menu_item_menu_item_parent', '0'),
(5224, 8223, '_menu_item_object_id', '54'),
(5225, 8223, '_menu_item_object', 'page'),
(5226, 8223, '_menu_item_target', ''),
(5227, 8223, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5228, 8223, '_menu_item_xfn', ''),
(5229, 8223, '_menu_item_url', ''),
(5230, 8223, '_menu_item_orphaned', '1466439571'),
(5231, 8224, '_menu_item_type', 'post_type'),
(5232, 8224, '_menu_item_menu_item_parent', '8229'),
(5233, 8224, '_menu_item_object_id', '54'),
(5234, 8224, '_menu_item_object', 'page'),
(5235, 8224, '_menu_item_target', ''),
(5236, 8224, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5237, 8224, '_menu_item_xfn', ''),
(5238, 8224, '_menu_item_url', ''),
(5240, 54, '_edit_lock', '1466588589:1'),
(5241, 8225, '_edit_lock', '1466439562:1'),
(5242, 8225, '_edit_last', '1'),
(5243, 8225, '_oembed_371892e62671a23dade1556e7d17ecc4', '{{unknown}}'),
(5244, 8225, '_oembed_8a7cd92ede81e5d44121b662f22c4096', '{{unknown}}'),
(5245, 8225, '_wp_page_template', 'page-templates/side-menu.php'),
(5246, 8225, 'sharing_disabled', '1'),
(5247, 8225, '_template_layout', '2c-l'),
(5248, 83, '_edit_lock', '1467036100:2'),
(5249, 83, '_template_layout', '2c-l'),
(5250, 54, '_template_layout', '2c-l'),
(5251, 8229, '_menu_item_type', 'post_type'),
(5252, 8229, '_menu_item_menu_item_parent', '0'),
(5253, 8229, '_menu_item_object_id', '8225'),
(5254, 8229, '_menu_item_object', 'page'),
(5255, 8229, '_menu_item_target', ''),
(5256, 8229, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5257, 8229, '_menu_item_xfn', ''),
(5258, 8229, '_menu_item_url', ''),
(5260, 8230, '_menu_item_type', 'post_type'),
(5261, 8230, '_menu_item_menu_item_parent', '8229'),
(5262, 8230, '_menu_item_object_id', '83'),
(5263, 8230, '_menu_item_object', 'page'),
(5264, 8230, '_menu_item_target', ''),
(5265, 8230, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5266, 8230, '_menu_item_xfn', ''),
(5267, 8230, '_menu_item_url', ''),
(5269, 8231, '_menu_item_type', 'post_type'),
(5270, 8231, '_menu_item_menu_item_parent', '8229'),
(5271, 8231, '_menu_item_object_id', '443'),
(5272, 8231, '_menu_item_object', 'page'),
(5273, 8231, '_menu_item_target', ''),
(5274, 8231, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5275, 8231, '_menu_item_xfn', ''),
(5276, 8231, '_menu_item_url', ''),
(5278, 8232, '_menu_item_type', 'post_type'),
(5279, 8232, '_menu_item_menu_item_parent', '8229'),
(5280, 8232, '_menu_item_object_id', '71'),
(5281, 8232, '_menu_item_object', 'page'),
(5282, 8232, '_menu_item_target', ''),
(5283, 8232, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5284, 8232, '_menu_item_xfn', ''),
(5285, 8232, '_menu_item_url', ''),
(5287, 71, '_edit_lock', '1466504323:1'),
(5288, 71, 'sharing_disabled', '1'),
(5289, 71, '_template_layout', '2c-l'),
(5290, 443, '_edit_lock', '1466504233:1'),
(5291, 443, '_template_layout', '2c-l'),
(5292, 8235, '_edit_lock', '1466439836:1');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(5293, 8235, '_edit_last', '1'),
(5294, 8235, '_wp_page_template', 'page-templates/side-menu.php'),
(5295, 8235, 'sharing_disabled', '1'),
(5296, 8235, '_template_layout', '2c-l'),
(5297, 8197, '_edit_lock', '1466503292:1'),
(5298, 8197, 'sharing_disabled', '1'),
(5299, 8197, '_template_layout', '2c-l'),
(5300, 8240, '_menu_item_type', 'post_type'),
(5301, 8240, '_menu_item_menu_item_parent', '0'),
(5302, 8240, '_menu_item_object_id', '8235'),
(5303, 8240, '_menu_item_object', 'page'),
(5304, 8240, '_menu_item_target', ''),
(5305, 8240, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5306, 8240, '_menu_item_xfn', ''),
(5307, 8240, '_menu_item_url', ''),
(5309, 8241, '_menu_item_type', 'post_type'),
(5310, 8241, '_menu_item_menu_item_parent', '8240'),
(5311, 8241, '_menu_item_object_id', '8198'),
(5312, 8241, '_menu_item_object', 'page'),
(5313, 8241, '_menu_item_target', ''),
(5314, 8241, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5315, 8241, '_menu_item_xfn', ''),
(5316, 8241, '_menu_item_url', ''),
(5327, 8243, '_menu_item_type', 'post_type'),
(5328, 8243, '_menu_item_menu_item_parent', '8240'),
(5329, 8243, '_menu_item_object_id', '8197'),
(5330, 8243, '_menu_item_object', 'page'),
(5331, 8243, '_menu_item_target', ''),
(5332, 8243, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5333, 8243, '_menu_item_xfn', ''),
(5334, 8243, '_menu_item_url', ''),
(5336, 8198, '_edit_lock', '1466504431:1'),
(5337, 8198, '_template_layout', '2c-l'),
(5341, 165, '_edit_lock', '1466511061:1'),
(5342, 165, '_template_layout', '2c-l'),
(5343, 165, 'sharing_disabled', '1'),
(5344, 8199, '_edit_lock', '1466440089:1'),
(5345, 8199, '_template_layout', '2c-l'),
(5346, 8199, 'sharing_disabled', '1'),
(5347, 294, '_edit_lock', '1466504627:1'),
(5348, 294, '_template_layout', '2c-l'),
(5349, 316, '_edit_lock', '1466505985:1'),
(5350, 316, '_template_layout', '2c-l'),
(5353, 8259, '_menu_item_type', 'post_type'),
(5354, 8259, '_menu_item_menu_item_parent', '8240'),
(5355, 8259, '_menu_item_object_id', '316'),
(5356, 8259, '_menu_item_object', 'page'),
(5357, 8259, '_menu_item_target', ''),
(5358, 8259, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5359, 8259, '_menu_item_xfn', ''),
(5360, 8259, '_menu_item_url', ''),
(5362, 8260, '_edit_lock', '1466441304:1'),
(5363, 8260, '_edit_last', '1'),
(5364, 8260, '_wp_page_template', 'page-templates/side-menu.php'),
(5365, 8260, 'sharing_disabled', '1'),
(5366, 8260, '_template_layout', '2c-l'),
(5367, 155, '_edit_lock', '1466505750:1'),
(5368, 155, '_template_layout', '2c-l'),
(5369, 157, '_edit_lock', '1466441387:1'),
(5370, 157, '_template_layout', '2c-l'),
(5371, 160, '_edit_lock', '1466506132:1'),
(5372, 160, '_template_layout', '2c-l'),
(5373, 8266, '_menu_item_type', 'post_type'),
(5374, 8266, '_menu_item_menu_item_parent', '0'),
(5375, 8266, '_menu_item_object_id', '8260'),
(5376, 8266, '_menu_item_object', 'page'),
(5377, 8266, '_menu_item_target', ''),
(5378, 8266, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5379, 8266, '_menu_item_xfn', ''),
(5380, 8266, '_menu_item_url', ''),
(5382, 8267, '_menu_item_type', 'post_type'),
(5383, 8267, '_menu_item_menu_item_parent', '8266'),
(5384, 8267, '_menu_item_object_id', '155'),
(5385, 8267, '_menu_item_object', 'page'),
(5386, 8267, '_menu_item_target', ''),
(5387, 8267, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5388, 8267, '_menu_item_xfn', ''),
(5389, 8267, '_menu_item_url', ''),
(5391, 8268, '_menu_item_type', 'post_type'),
(5392, 8268, '_menu_item_menu_item_parent', '8266'),
(5393, 8268, '_menu_item_object_id', '157'),
(5394, 8268, '_menu_item_object', 'page'),
(5395, 8268, '_menu_item_target', ''),
(5396, 8268, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5397, 8268, '_menu_item_xfn', ''),
(5398, 8268, '_menu_item_url', ''),
(5400, 8269, '_menu_item_type', 'post_type'),
(5401, 8269, '_menu_item_menu_item_parent', '8266'),
(5402, 8269, '_menu_item_object_id', '160'),
(5403, 8269, '_menu_item_object', 'page'),
(5404, 8269, '_menu_item_target', ''),
(5405, 8269, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5406, 8269, '_menu_item_xfn', ''),
(5407, 8269, '_menu_item_url', ''),
(5409, 8272, '_edit_lock', '1466590585:1'),
(5410, 8272, '_edit_last', '1'),
(5411, 8272, '_wp_page_template', 'page-templates/side-menu.php'),
(5412, 8272, '_template_layout', '2c-l'),
(5413, 8272, 'sharing_disabled', '1'),
(5414, 8274, '_menu_item_type', 'post_type'),
(5415, 8274, '_menu_item_menu_item_parent', '0'),
(5416, 8274, '_menu_item_object_id', '8272'),
(5417, 8274, '_menu_item_object', 'page'),
(5418, 8274, '_menu_item_target', ''),
(5419, 8274, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5420, 8274, '_menu_item_xfn', ''),
(5421, 8274, '_menu_item_url', ''),
(5426, 549, '_edit_lock', '1466506442:1'),
(5427, 549, '_template_layout', '2c-l'),
(5428, 253, '_edit_lock', '1466513426:1'),
(5429, 253, '_template_layout', '2c-l'),
(5430, 359, '_edit_lock', '1466442002:1'),
(5431, 359, '_template_layout', '2c-l'),
(5432, 249, '_edit_lock', '1466591085:1'),
(5433, 8280, '_wp_attached_file', '2013/11/març2010-031-1.jpg'),
(5434, 8280, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:27:"2013/11/març2010-031-1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"març2010-031-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:27:"març2010-031-1-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:27:"març2010-031-1-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"març2010-031-1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"març2010-031-1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"4";s:6:"credit";s:0:"";s:6:"camera";s:20:"Canon PowerShot A540";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1268120120";s:9:"copyright";s:0:"";s:12:"focal_length";s:3:"5.8";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:5:"0.001";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(5435, 249, '_thumbnail_id', '8280'),
(5438, 249, '_amaga_titol', NULL),
(5439, 249, '_amaga_metadata', NULL),
(5440, 249, '_bloc_html', NULL),
(5441, 249, '_original_size', NULL),
(5442, 249, '_entry_icon', 'noicon'),
(5443, 8201, '_edit_lock', '1466590693:1'),
(5444, 8282, '_wp_attached_file', '2013/11/Selecció_999316.png'),
(5445, 8282, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:560;s:6:"height";i:413;s:4:"file";s:28:"2013/11/Selecció_999316.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999316-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999316-300x221.png";s:5:"width";i:300;s:6:"height";i:221;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999316-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999316-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5446, 8201, '_thumbnail_id', '8282'),
(5449, 8201, '_amaga_titol', NULL),
(5450, 8201, '_amaga_metadata', NULL),
(5451, 8201, '_bloc_html', NULL),
(5452, 8201, '_original_size', NULL),
(5453, 8201, '_entry_icon', 'noicon'),
(5454, 207, '_edit_lock', '1466442237:1'),
(5455, 8284, '_wp_attached_file', '2013/11/Selecció_999317.png'),
(5456, 8284, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:555;s:6:"height";i:414;s:4:"file";s:28:"2013/11/Selecció_999317.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999317-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999317-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999317-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999317-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5457, 207, '_thumbnail_id', '8284'),
(5460, 207, '_amaga_titol', NULL),
(5461, 207, '_amaga_metadata', NULL),
(5462, 207, '_bloc_html', NULL),
(5463, 207, '_original_size', NULL),
(5464, 207, '_entry_icon', 'noicon'),
(5467, 8286, '_menu_item_type', 'post_type'),
(5468, 8286, '_menu_item_menu_item_parent', '8274'),
(5469, 8286, '_menu_item_object_id', '549'),
(5470, 8286, '_menu_item_object', 'page'),
(5471, 8286, '_menu_item_target', ''),
(5472, 8286, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5473, 8286, '_menu_item_xfn', ''),
(5474, 8286, '_menu_item_url', ''),
(5476, 8287, '_menu_item_type', 'post_type'),
(5477, 8287, '_menu_item_menu_item_parent', '8274'),
(5478, 8287, '_menu_item_object_id', '253'),
(5479, 8287, '_menu_item_object', 'page'),
(5480, 8287, '_menu_item_target', ''),
(5481, 8287, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5482, 8287, '_menu_item_xfn', ''),
(5483, 8287, '_menu_item_url', ''),
(5485, 8288, '_menu_item_type', 'post_type'),
(5486, 8288, '_menu_item_menu_item_parent', '8274'),
(5487, 8288, '_menu_item_object_id', '359'),
(5488, 8288, '_menu_item_object', 'page'),
(5489, 8288, '_menu_item_target', ''),
(5490, 8288, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5491, 8288, '_menu_item_xfn', ''),
(5492, 8288, '_menu_item_url', ''),
(5494, 8289, '_menu_item_type', 'post_type'),
(5495, 8289, '_menu_item_menu_item_parent', '8240'),
(5496, 8289, '_menu_item_object_id', '165'),
(5497, 8289, '_menu_item_object', 'page'),
(5498, 8289, '_menu_item_target', ''),
(5499, 8289, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5500, 8289, '_menu_item_xfn', ''),
(5501, 8289, '_menu_item_url', ''),
(5503, 8290, '_menu_item_type', 'post_type'),
(5504, 8290, '_menu_item_menu_item_parent', '8240'),
(5505, 8290, '_menu_item_object_id', '8199'),
(5506, 8290, '_menu_item_object', 'page'),
(5507, 8290, '_menu_item_target', ''),
(5508, 8290, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5509, 8290, '_menu_item_xfn', ''),
(5510, 8290, '_menu_item_url', ''),
(5512, 8291, '_wp_attached_file', '2016/06/Selecció_999319.png'),
(5513, 8291, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:466;s:6:"height";i:253;s:4:"file";s:28:"2016/06/Selecció_999319.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999319-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999319-300x163.png";s:5:"width";i:300;s:6:"height";i:163;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999319-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999319-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5514, 107, 'album_extension', ''),
(5515, 8292, '_wp_attached_file', '2016/06/Selecció_999320.png'),
(5516, 8292, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:452;s:6:"height";i:250;s:4:"file";s:28:"2016/06/Selecció_999320.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999320-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999320-300x166.png";s:5:"width";i:300;s:6:"height";i:166;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999320-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999320-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5517, 8293, '_wp_attached_file', '2016/06/Selecció_999321.png'),
(5518, 8293, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:352;s:6:"height";i:214;s:4:"file";s:28:"2016/06/Selecció_999321.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999321-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999321-300x182.png";s:5:"width";i:300;s:6:"height";i:182;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999321-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999321-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5519, 8294, '_wp_attached_file', '2016/06/termiques.jpg'),
(5520, 8294, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:480;s:4:"file";s:21:"2016/06/termiques.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"termiques-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"termiques-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"termiques-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"termiques-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:6:"Picasa";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5521, 8295, '_wp_attached_file', '2016/06/IMG_1673.jpg'),
(5522, 8295, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:720;s:6:"height";i:540;s:4:"file";s:20:"2016/06/IMG_1673.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"IMG_1673-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"IMG_1673-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"IMG_1673-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"IMG_1673-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:6:"Picasa";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5523, 8296, '_wp_attached_file', '2016/06/Gimcana-1-001.jpg'),
(5524, 8296, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:720;s:6:"height";i:540;s:4:"file";s:25:"2016/06/Gimcana-1-001.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"Gimcana-1-001-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:25:"Gimcana-1-001-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:25:"Gimcana-1-001-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:25:"Gimcana-1-001-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:6:"Picasa";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5525, 254, '_edit_lock', '1466494859:1'),
(5539, 8297, '_menu_item_type', 'post_type'),
(5540, 8297, '_menu_item_menu_item_parent', '8274'),
(5541, 8297, '_menu_item_object_id', '600'),
(5542, 8297, '_menu_item_object', 'page'),
(5543, 8297, '_menu_item_target', ''),
(5544, 8297, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(5545, 8297, '_menu_item_xfn', ''),
(5546, 8297, '_menu_item_url', ''),
(5548, 600, '_oembed_a591c378d3581c9b79e6665e39f4de2b', '{{unknown}}'),
(5549, 600, '_edit_lock', '1466512140:1'),
(5550, 600, '_template_layout', '2c-l'),
(5551, 9, 'sharing_disabled', '1'),
(5552, 54, 'sharing_disabled', '1'),
(5553, 8307, '_wp_attached_file', '2013/11/capc_riusalabr2.jpg'),
(5554, 8307, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:224;s:4:"file";s:27:"2013/11/capc_riusalabr2.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"capc_riusalabr2-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:26:"capc_riusalabr2-300x67.jpg";s:5:"width";i:300;s:6:"height";i:67;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:27:"capc_riusalabr2-768x172.jpg";s:5:"width";i:768;s:6:"height";i:172;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"capc_riusalabr2-300x224.jpg";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"capc_riusalabr2-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:3:"6.3";s:6:"credit";s:0:"";s:6:"camera";s:11:"COOLPIX P80";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1351686541";s:9:"copyright";s:0:"";s:12:"focal_length";s:4:"30.1";s:3:"iso";s:2:"64";s:13:"shutter_speed";s:18:"0.0038461538461538";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(5563, 443, 'sharing_disabled', '1'),
(5564, 8312, '_wp_attached_file', '2013/11/Tardor-5.jpg'),
(5565, 8312, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:360;s:4:"file";s:20:"2013/11/Tardor-5.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"Tardor-5-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"Tardor-5-300x169.jpg";s:5:"width";i:300;s:6:"height";i:169;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"Tardor-5-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"Tardor-5-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5566, 8314, '_wp_attached_file', '2013/11/Selecció_999322.png'),
(5567, 8314, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:832;s:6:"height";i:552;s:4:"file";s:28:"2013/11/Selecció_999322.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999322-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999322-300x199.png";s:5:"width";i:300;s:6:"height";i:199;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:28:"Selecció_999322-768x510.png";s:5:"width";i:768;s:6:"height";i:510;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999322-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999322-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5568, 155, 'sharing_disabled', '1'),
(5569, 8322, '_edit_lock', '1466505962:1'),
(5570, 8323, '_wp_attached_file', '2016/06/Portada.jpg'),
(5571, 8323, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:650;s:6:"height";i:488;s:4:"file";s:19:"2016/06/Portada.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"Portada-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"Portada-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:19:"Portada-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:19:"Portada-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5572, 8324, '_wp_attached_file', '2016/06/DSC_0143-636x303.jpg'),
(5573, 8324, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:636;s:6:"height";i:303;s:4:"file";s:28:"2016/06/DSC_0143-636x303.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"DSC_0143-636x303-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:28:"DSC_0143-636x303-300x143.jpg";s:5:"width";i:300;s:6:"height";i:143;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"DSC_0143-636x303-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"DSC_0143-636x303-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(5574, 8325, '_wp_attached_file', '2016/06/20.jpg'),
(5575, 8325, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1600;s:6:"height";i:1200;s:4:"file";s:14:"2016/06/20.jpg";s:5:"sizes";a:6:{s:9:"thumbnail";a:4:{s:4:"file";s:14:"20-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:14:"20-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:14:"20-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:15:"20-1024x768.jpg";s:5:"width";i:1024;s:6:"height";i:768;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:14:"20-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:14:"20-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5576, 8322, '_edit_last', '1'),
(5577, 8322, 'album_extension', ''),
(5578, 8322, 'picasa_album', ''),
(5579, 8322, 'googlephotos_album', ''),
(5580, 8322, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"8";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"300";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:4:"true";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(5581, 8322, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(5582, 8322, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8325";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8324";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:0:"";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:4:"8323";}}'),
(5583, 8327, '_wp_attached_file', '2013/11/1346327037.jpg'),
(5584, 8327, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:780;s:6:"height";i:520;s:4:"file";s:22:"2013/11/1346327037.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"1346327037-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:22:"1346327037-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:22:"1346327037-768x512.jpg";s:5:"width";i:768;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:22:"1346327037-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:22:"1346327037-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"9";s:6:"credit";s:0:"";s:6:"camera";s:20:"Canon EOS 5D Mark II";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1311874400";s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"65";s:3:"iso";s:3:"160";s:13:"shutter_speed";s:5:"0.005";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(5585, 549, '_oembed_cca6311dbfabe327a3002fc1f53ff7eb', '{{unknown}}'),
(5586, 549, 'sharing_disabled', '1'),
(5587, 8330, '_bbp_reply_count', '0'),
(5588, 8330, '_bbp_topic_count', '0'),
(5589, 8330, '_bbp_topic_count_hidden', '0'),
(5590, 8330, '_bbp_total_reply_count', '0'),
(5591, 8330, '_bbp_total_topic_count', '0'),
(5592, 8330, '_bbp_last_topic_id', '0'),
(5593, 8330, '_bbp_last_reply_id', '0'),
(5594, 8330, '_bbp_last_active_id', '0'),
(5595, 8330, '_bbp_last_active_time', '0'),
(5596, 8330, '_bbp_forum_subforum_count', '0'),
(5597, 8330, '_bbp_group_ids', 'a:1:{i:0;i:34;}'),
(5598, 8331, '_bbp_reply_count', '0'),
(5599, 8331, '_bbp_topic_count', '0'),
(5600, 8331, '_bbp_topic_count_hidden', '0'),
(5601, 8331, '_bbp_total_reply_count', '0'),
(5602, 8331, '_bbp_total_topic_count', '0'),
(5603, 8331, '_bbp_last_topic_id', '0'),
(5604, 8331, '_bbp_last_reply_id', '0'),
(5605, 8331, '_bbp_last_active_id', '0'),
(5606, 8331, '_bbp_last_active_time', '0'),
(5607, 8331, '_bbp_forum_subforum_count', '0'),
(5608, 8331, '_bbp_group_ids', 'a:1:{i:0;i:35;}'),
(5609, 8332, '_bbp_reply_count', '0'),
(5610, 8332, '_bbp_topic_count', '0'),
(5611, 8332, '_bbp_topic_count_hidden', '0'),
(5612, 8332, '_bbp_total_reply_count', '0'),
(5613, 8332, '_bbp_total_topic_count', '0'),
(5614, 8332, '_bbp_last_topic_id', '0'),
(5615, 8332, '_bbp_last_reply_id', '0'),
(5616, 8332, '_bbp_last_active_id', '0'),
(5617, 8332, '_bbp_last_active_time', '0'),
(5618, 8332, '_bbp_forum_subforum_count', '0'),
(5619, 8332, '_bbp_group_ids', 'a:1:{i:0;i:36;}'),
(5620, 8333, '_bbp_reply_count', '0'),
(5621, 8333, '_bbp_topic_count', '0'),
(5622, 8333, '_bbp_topic_count_hidden', '0'),
(5623, 8333, '_bbp_total_reply_count', '0'),
(5624, 8333, '_bbp_total_topic_count', '0'),
(5625, 8333, '_bbp_last_topic_id', '0'),
(5626, 8333, '_bbp_last_reply_id', '0'),
(5627, 8333, '_bbp_last_active_id', '0'),
(5628, 8333, '_bbp_last_active_time', '0'),
(5629, 8333, '_bbp_forum_subforum_count', '0'),
(5630, 8333, '_bbp_group_ids', 'a:1:{i:0;i:37;}'),
(5631, 8335, '_bbp_reply_count', '0'),
(5632, 8335, '_bbp_topic_count', '0'),
(5633, 8335, '_bbp_topic_count_hidden', '0'),
(5634, 8335, '_bbp_total_reply_count', '0'),
(5635, 8335, '_bbp_total_topic_count', '0'),
(5636, 8335, '_bbp_last_topic_id', '0'),
(5637, 8335, '_bbp_last_reply_id', '0'),
(5638, 8335, '_bbp_last_active_id', '0'),
(5639, 8335, '_bbp_last_active_time', '0'),
(5640, 8335, '_bbp_forum_subforum_count', '0'),
(5641, 8335, '_bbp_group_ids', 'a:1:{i:0;i:38;}'),
(5642, 8336, '_bbp_reply_count', '0'),
(5643, 8336, '_bbp_topic_count', '0'),
(5644, 8336, '_bbp_topic_count_hidden', '0'),
(5645, 8336, '_bbp_total_reply_count', '0'),
(5646, 8336, '_bbp_total_topic_count', '0'),
(5647, 8336, '_bbp_last_topic_id', '0'),
(5648, 8336, '_bbp_last_reply_id', '0'),
(5649, 8336, '_bbp_last_active_id', '0'),
(5650, 8336, '_bbp_last_active_time', '0'),
(5651, 8336, '_bbp_forum_subforum_count', '0'),
(5652, 8336, '_bbp_group_ids', 'a:1:{i:0;i:39;}'),
(5653, 600, 'sharing_disabled', '1'),
(5654, 253, 'sharing_disabled', '1'),
(5663, 253, '_oembed_0a5cd44eef5d3c9d14c0c3cafba70bd0', '<iframe width="500" height="375" src="https://www.youtube.com/embed/RoQCyu0SgDY?start=107&feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(5664, 253, '_oembed_time_0a5cd44eef5d3c9d14c0c3cafba70bd0', '1466513179'),
(5677, 148, 'album_extension', ''),
(5678, 148, 'picasa_album', ''),
(5679, 148, 'googlephotos_album', ''),
(5680, 8200, '_edit_lock', '1466591930:1'),
(5681, 8345, '_wp_attached_file', '2013/11/IMG_20150219_144547.jpg'),
(5682, 8345, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:31:"2013/11/IMG_20150219_144547.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:31:"IMG_20150219_144547-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:31:"IMG_20150219_144547-300x225.jpg";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:31:"IMG_20150219_144547-768x576.jpg";s:5:"width";i:768;s:6:"height";i:576;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:31:"IMG_20150219_144547-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:31:"IMG_20150219_144547-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:3:"2.2";s:6:"credit";s:6:"Picasa";s:6:"camera";s:14:"Aquaris E5 FHD";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1424353548";s:9:"copyright";s:0:"";s:12:"focal_length";s:4:"3.81";s:3:"iso";s:3:"217";s:13:"shutter_speed";s:8:"0.059991";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5683, 8200, '_thumbnail_id', '8345'),
(5686, 8200, '_amaga_titol', NULL),
(5687, 8200, '_amaga_metadata', NULL),
(5688, 8200, '_bloc_html', NULL),
(5689, 8200, '_original_size', NULL),
(5690, 8200, '_entry_icon', 'noicon'),
(5694, 8347, '_edit_lock', '1466591035:1'),
(5695, 8347, '_edit_last', '1'),
(5696, 8347, '_oembed_3f1770365ab512dc2b359342e4437583', '<iframe width="500" height="281" src="https://www.youtube.com/embed/8Pm1EwqDDSE?start=1058&feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(5697, 8347, '_oembed_time_3f1770365ab512dc2b359342e4437583', '1466515156'),
(5700, 8347, '_amaga_titol', NULL),
(5701, 8347, '_amaga_metadata', NULL),
(5702, 8347, '_bloc_html', NULL),
(5703, 8347, '_original_size', NULL),
(5704, 8347, '_entry_icon', 'noicon'),
(5705, 8349, '_wp_attached_file', '2016/06/Selecció_999324.png'),
(5706, 8349, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:437;s:6:"height";i:287;s:4:"file";s:28:"2016/06/Selecció_999324.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"Selecció_999324-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"Selecció_999324-300x197.png";s:5:"width";i:300;s:6:"height";i:197;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:28:"Selecció_999324-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:28:"Selecció_999324-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5707, 8347, '_thumbnail_id', '8349'),
(5722, 433, '_edit_lock', '1466601634:1'),
(5723, 433, '_template_layout', '2c-l'),
(5758, 202, 'album_extension', ''),
(5759, 8369, '_edit_lock', '1466603872:1'),
(5760, 8369, '_edit_last', '1'),
(5761, 8370, '_wp_attached_file', '2016/06/img_16_gr.jpg'),
(5762, 8370, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:450;s:6:"height";i:330;s:4:"file";s:21:"2016/06/img_16_gr.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"img_16_gr-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"img_16_gr-300x220.jpg";s:5:"width";i:300;s:6:"height";i:220;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"img_16_gr-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"img_16_gr-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5763, 8369, '_thumbnail_id', '8370'),
(5764, 8371, '_wp_attached_file', '2016/06/img_20_gr.jpg'),
(5765, 8371, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:450;s:6:"height";i:330;s:4:"file";s:21:"2016/06/img_20_gr.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"img_20_gr-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:21:"img_20_gr-300x220.jpg";s:5:"width";i:300;s:6:"height";i:220;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"img_20_gr-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"img_20_gr-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5768, 8369, '_amaga_titol', NULL),
(5769, 8369, '_amaga_metadata', NULL),
(5770, 8369, '_bloc_html', NULL),
(5771, 8369, '_original_size', NULL),
(5772, 8369, '_entry_icon', 'noicon'),
(5789, 8379, '_wp_attached_file', '2016/06/garrotxa.png'),
(5790, 8379, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:777;s:6:"height";i:400;s:4:"file";s:20:"2016/06/garrotxa.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"garrotxa-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"garrotxa-300x154.png";s:5:"width";i:300;s:6:"height";i:154;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:20:"garrotxa-768x395.png";s:5:"width";i:768;s:6:"height";i:395;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"garrotxa-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"garrotxa-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(5854, 248, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"list";}'),
(5855, 248, '_default_calendar_list_range_type', 'daily'),
(5856, 248, '_default_calendar_list_range_span', '7'),
(5857, 248, '_calendar_begins', 'today'),
(5858, 248, '_feed_earliest_event_date', 'months_before'),
(5859, 248, '_feed_earliest_event_date_range', '1'),
(5860, 248, '_feed_latest_event_date', 'years_after'),
(5861, 248, '_feed_latest_event_date_range', '1'),
(5862, 248, '_default_calendar_event_bubble_trigger', 'hover'),
(5863, 248, '_default_calendar_expand_multi_day_events', 'no'),
(5864, 248, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(5865, 248, '_google_events_max_results', '2500'),
(5866, 248, '_google_events_recurring', 'show'),
(5867, 248, '_calendar_date_format_setting', 'use_site'),
(5868, 248, '_calendar_time_format_setting', 'use_site'),
(5869, 248, '_calendar_datetime_separator', '@'),
(5870, 248, '_calendar_week_starts_on_setting', 'use_site'),
(5871, 248, '_feed_cache_user_unit', '3600'),
(5872, 248, '_feed_cache_user_amount', '1'),
(5873, 248, '_feed_cache', '3600'),
(5874, 248, '_calendar_version', '3.1.2'),
(5875, 1038, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(5876, 1038, '_default_calendar_list_range_type', 'daily'),
(5877, 1038, '_default_calendar_list_range_span', '7'),
(5878, 1038, '_calendar_begins', 'today'),
(5879, 1038, '_feed_earliest_event_date', 'months_before'),
(5880, 1038, '_feed_earliest_event_date_range', '1'),
(5881, 1038, '_feed_latest_event_date', 'years_after'),
(5882, 1038, '_feed_latest_event_date_range', '1'),
(5883, 1038, '_default_calendar_event_bubble_trigger', 'hover'),
(5884, 1038, '_default_calendar_expand_multi_day_events', 'no'),
(5885, 1038, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(5886, 1038, '_google_events_max_results', '2500'),
(5887, 1038, '_google_events_recurring', 'show'),
(5888, 1038, '_calendar_date_format_setting', 'use_site'),
(5889, 1038, '_calendar_time_format_setting', 'use_site'),
(5890, 1038, '_calendar_datetime_separator', '@'),
(5891, 1038, '_calendar_week_starts_on_setting', 'use_site'),
(5892, 1038, '_feed_cache_user_unit', '60'),
(5893, 1038, '_feed_cache_user_amount', '5'),
(5894, 1038, '_feed_cache', '300'),
(5895, 1038, '_calendar_version', '3.1.2'),
(5974, 248, '_calendar_begins_nth', '1'),
(5975, 248, '_calendar_begins_custom_date', ''),
(5976, 248, '_calendar_is_static', 'no'),
(5977, 248, '_no_events_message', ''),
(5978, 248, '_event_formatting', 'preserve_linebreaks'),
(5979, 248, '_poweredby', 'no'),
(5980, 248, '_feed_timezone_setting', 'use_site'),
(5981, 248, '_feed_timezone', 'Europe/Madrid'),
(5982, 248, '_calendar_date_format', 'l, d F Y'),
(5983, 248, '_calendar_date_format_php', 'd/m/Y'),
(5984, 248, '_calendar_time_format', 'G:i a'),
(5985, 248, '_calendar_time_format_php', 'G:i'),
(5986, 248, '_calendar_week_starts_on', '0'),
(5987, 248, '_google_events_search_query', ''),
(5988, 248, '_grouped_calendars_source', 'ids'),
(5989, 248, '_grouped_calendars_ids', ''),
(5990, 248, '_grouped_calendars_category', ''),
(5991, 248, '_default_calendar_style_theme', 'light'),
(5992, 248, '_default_calendar_style_today', '#1e73be'),
(5993, 248, '_default_calendar_style_days_events', '#000000'),
(5994, 248, '_default_calendar_list_header', 'no'),
(5995, 248, '_default_calendar_compact_list', 'no'),
(5996, 248, '_default_calendar_limit_visible_events', 'no'),
(5997, 248, '_default_calendar_visible_events', '3'),
(5998, 248, '_default_calendar_trim_titles', 'no'),
(5999, 248, '_default_calendar_trim_titles_chars', '20'),
(6000, 1038, '_calendar_begins_nth', '1'),
(6001, 1038, '_calendar_begins_custom_date', ''),
(6002, 1038, '_calendar_is_static', 'no'),
(6003, 1038, '_no_events_message', ''),
(6004, 1038, '_event_formatting', 'preserve_linebreaks'),
(6005, 1038, '_poweredby', 'no'),
(6006, 1038, '_feed_timezone_setting', 'use_site'),
(6007, 1038, '_feed_timezone', 'Europe/Madrid'),
(6008, 1038, '_calendar_date_format', 'l, d F Y'),
(6009, 1038, '_calendar_date_format_php', 'd/m/Y'),
(6010, 1038, '_calendar_time_format', 'G:i a'),
(6011, 1038, '_calendar_time_format_php', 'G:i'),
(6012, 1038, '_calendar_week_starts_on', '0'),
(6013, 1038, '_google_events_search_query', ''),
(6014, 1038, '_grouped_calendars_source', 'ids'),
(6015, 1038, '_grouped_calendars_ids', ''),
(6016, 1038, '_grouped_calendars_category', ''),
(6017, 1038, '_default_calendar_style_theme', 'light'),
(6018, 1038, '_default_calendar_style_today', '#1e73be'),
(6019, 1038, '_default_calendar_style_days_events', '#000000'),
(6020, 1038, '_default_calendar_list_header', 'no'),
(6021, 1038, '_default_calendar_compact_list', 'no'),
(6022, 1038, '_default_calendar_limit_visible_events', 'no'),
(6023, 1038, '_default_calendar_visible_events', '3'),
(6024, 1038, '_default_calendar_trim_titles', 'no'),
(6025, 1038, '_default_calendar_trim_titles_chars', '20'),
(6026, 8397, 'es_template_type', 'newsletter'),
(6027, 8398, 'es_template_type', 'post_notification');

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
) ENGINE=InnoDB AUTO_INCREMENT=8405 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(4, 1, '2013-12-09 11:57:37', '2013-12-09 11:57:37', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/cropped-capcda4.png', 'cropped-capcda4.png', '', 'inherit', 'closed', 'open', '', 'cropped-capcda4-png', '', '', '2013-12-09 11:57:37', '2013-12-09 11:57:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/cropped-capcda4.png', 0, 'attachment', 'image/png', 0),
(5, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-17 10:42:08', '2017-01-17 09:42:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:46:02', '2014-09-12 09:46:02', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-12 10:14:31', '2014-09-12 10:14:31', '', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-12 10:15:01', '2014-09-12 10:15:01', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2016-06-21 09:28:10', '2016-06-21 08:28:10', '', 7, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=9', 0, 'page', '', 0),
(13, 1, '2014-09-12 11:05:02', '2014-09-12 11:05:02', 'Pàgina d''avís', 'Avís', '', 'publish', 'closed', 'closed', '', 'avis', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 7, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=13', 0, 'page', '', 0),
(16, 1, '2014-09-12 12:40:45', '2014-09-12 12:40:45', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2014-09-22 14:13:29', '2014-09-22 14:13:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/nodes/', 0, 'page', '', 0),
(32, 1, '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 'exemple1', '', 'inherit', 'open', 'open', '', 'exemple1', '', '', '2014-09-17 16:29:37', '2014-09-17 16:29:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple1.png', 0, 'attachment', 'image/png', 0),
(33, 1, '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-17 16:29:38', '2014-09-17 16:29:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(34, 1, '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 'exemple2b', '', 'inherit', 'open', 'open', '', 'exemple2b', '', '', '2014-09-17 16:29:39', '2014-09-17 16:29:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple2b.png', 0, 'attachment', 'image/png', 0),
(35, 1, '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-17 16:29:40', '2014-09-17 16:29:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(36, 1, '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-17 16:29:41', '2014-09-17 16:29:41', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(37, 1, '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 'exemple2', '', 'inherit', 'open', 'open', '', 'exemple2', '', '', '2014-09-17 16:31:11', '2014-09-17 16:31:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/exemple2.png', 0, 'attachment', 'image/png', 0),
(54, 1, '2013-11-14 18:56:33', '2013-11-14 17:56:33', 'El <strong>Camp d’Aprenentatge<sup>1</sup> de l’Alt Berguedà</strong> està situat al Prepirineu català, en una zona de muntanya mitjana i alta, al costat del <strong>Parc Natural Cadí-Moixeró</strong> i té com a àmbits de treball més significatius:\r\n<ul>\r\n	<li><strong>el riu</strong> (morfologia, vegetació de ribera i qualitat de l''aigua)</li>\r\n	<li><strong>el bosc</strong> (vegetació i rastres animals)</li>\r\n	<li>els <strong>fongs</strong> i els <strong>bolets</strong> (morfologia i identificació)</li>\r\n	<li>l''estudi del <strong>Pedraforca</strong>, <strong>la cova de la Tuta</strong> i <strong><strong>les fonts del Llobregat</strong></strong></li>\r\n</ul>\r\n<iframe src="//www.youtube.com/embed/u7vJ1HAqYYE" width="640" height="480" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nLes activitats d''aquest camp són adequades als alumnes dels següents nivells educatius:\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/2013-11-17_1231.png"><img class="size-full wp-image-275 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/2013-11-17_1231.png" alt="graella nivells educatius" width="656" height="110" /></a>\r\n<h4><strong>Una mica d''historia</strong></h4>\r\nEl CdA Els Monestirs es va crear durant el curs 1990-1991 per una acord entre Departament d''Ensenyament i el llavors Abat de Poblet Dom Maur Esteva per a descobrir els monestirs. Actualment comparteix el Servei i ha ampliat les activitats amb el Paratge Natural d’Interès Nacional de Poblet (PNIN).\r\n<h4>Qui som</h4>\r\nActualment hi treballem tres mestres de primària (<span style="color: #000000;">Nom1</span>, Nom2, Nom3) i una professora de secundària (Nom4) del Departament d''Educació de la Generalitat.  La nostra tasca docent amb els alumnes es desenvolupa seguint l''horari escolar, aproximadament les 9 del matí fins a les 5 de la tarda.\r\n\r\nEls centres educatius que fan estada de tres a cinc dies al nostre Camp, s''allotgen i realitzen les activitats programades a <strong>la casa de La Sala</strong>, situada entre <strong>Guardiola de Berguedà</strong> i <strong>La Pobla de Lillet</strong>. Podeu trobar més informació sobre el nostre camp a les seccions de <a title="On som" href="http://blocs.xtec.cat/plantillacda/on-som/">On Som</a> i <a title="Al·lotjament" href="http://blocs.xtec.cat/plantillacda/al%c2%b7lotjament/">Allotjament</a>.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cda-qui-som2.png"><img class="size-full wp-image-484 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cda-qui-som2.png" alt="cda-qui-som" width="711" height="291" /></a>\r\n<h4>Objectius</h4>\r\n<ul>\r\n	<li>Posar a l’abast dels centres els mitjans didàctics necessaris per al coneixement i la comprensió de les restes d’una ciutat que canvia i evoluciona al llarg del temps: època romana, medieval, etc.</li>\r\n	<li>Fer conèixer als alumnes la necessitat de les relacions i la interdependència de la ciutat amb el seu territori.</li>\r\n	<li>Conèixer i comprendre l’estructura urbana d’una ciutat.</li>\r\n	<li>Entendre la ciutat com a ecosistema.</li>\r\n	<li>Potenciar el treball de camp com una eina didàctica bàsica per al coneixement de l’entorn.</li>\r\n	<li>Sensibilitzar als estudiants vers la necessitat de conèixer, respectar i estimar el medi que ens envolta.</li>\r\n	<li>Posar els nois/es en contacte amb el medi físic, econòmic, industrial i social de la ciutat i el seu camp d’influència.</li>\r\n	<li>Procurar que els alumnes desenvolupin tècniques d’investigació i de treball científic conforme les indicacions del Departament d’Educació.</li>\r\n</ul>\r\n<strong><span style="font-size: large;">Us hi esperem!</span></strong>\r\n\r\n<hr />\r\n\r\n<span style="color: #808080;"><span style="font-size: small;"><sup>1</sup></span><span style="font-size: small;">Els camps d''aprenentatge són serveis educatius del Departament d''Ensenyament que ofereixen al professorat i als centres docents la possibilitat de desenvolupar projectes de treball per a l''estudi i l''experimentació en un medi singular de Catalunya; s''adrecen principalment a alumnes d''educació primària, secundària, cicles formatius i batxillerat. Podeu trobar més informació a: <a href="http://xtec.gencat.cat/ca/serveis/cda/queson/" target="_blank">http://xtec.gencat.cat/ca/serveis/cda/queson/</a></span></span>', 'Presentació', '', 'publish', 'closed', 'closed', '', 'presentacio', '', '', '2016-06-22 10:45:31', '2016-06-22 09:45:31', '', 8225, 'http://blocs.xtec.cat/plantillacda/?page_id=54', 10, 'page', '', 0),
(62, 1, '2013-11-14 19:17:27', '2013-11-14 18:17:27', '', 'cda-qui-som', '', 'inherit', 'open', 'open', '', 'cda-qui-som', '', '', '2013-11-14 19:17:27', '2013-11-14 18:17:27', '', 54, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cda-qui-som.png', 0, 'attachment', 'image/png', 0),
(65, 1, '2013-11-14 19:20:15', '2013-11-14 18:20:15', '', 'cda-qui-som', '', 'inherit', 'open', 'open', '', 'cda-qui-som-2', '', '', '2013-11-14 19:20:15', '2013-11-14 18:20:15', '', 54, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cda-qui-som1.png', 0, 'attachment', 'image/png', 0),
(71, 1, '2013-11-14 19:47:14', '2013-11-14 18:47:14', 'La seu del CdA està ubicada a <strong>Guardiola de Berguedà</strong> i la casa on es realitzen les estades a <strong>4km</strong> de <strong>La Pobla de Lillet</strong>.\r\n\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47865.917017106796!2d2.0617567482464763!3d41.42577094572662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a490bd9b7b01ed%3A0x4535064cf8aa1b44!2sCamp+d''Aprenentatge+Can+Santoi!5e0!3m2!1sca!2ses!4v1466504449089" width="600" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n<small><a style="color: #0000ff; text-align: left;" href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=ca&amp;geocode=&amp;q=Camp+d''Aprenentatge+Alt+bergueda&amp;aq=t&amp;sll=41.39479,2.148768&amp;sspn=0.208873,0.305901&amp;ie=UTF8&amp;hq=Camp+d''Aprenentatge+Alt+bergueda&amp;hnear=&amp;radius=15000&amp;t=m&amp;cid=6859762148946524423&amp;ll=42.350425,1.950073&amp;spn=0.487159,0.878906&amp;z=10&amp;iwloc=A">Mostra un mapa més gran</a></small>\r\n<h4>Com arribar-hi</h4>\r\nAl Camp d''Aprenentatge de l''Alt Berguedà s''hi accedeix <strong>a través de l''Eix del Llobregat (C-16)</strong>, a la <strong>sortida de Guardiola de Berguedà</strong>. Les instal·lacions es troben just a l''entrada del poble, a mà dreta compartint edifici amb el CEIP Sant Llorenç.\r\n\r\n{Si aplica, explicar com arribar en transport públic}\r\n<h4>Instal·lacions</h4>\r\nDisposem de dues aules de treball i un laboratori.\r\n<h4>Al·lotjament</h4>\r\nPer anar a <strong>la casa de La Sala</strong>, on fareu l''estada, no cal entrar a Guardiola. S''ha de seguir uns 200 metres més, per la C-16, i agafar la sortida cap a La Pobla de Lillet. Al cap d''uns sis quilòmetres, a mà esquerra, es troba el trencant que porta a la casa. Més informació a la nostre secció <a title="Al·lotjament" href="https://pwc-int.educacio.intranet/agora/mastercda/el-camp/al%c2%b7lotjament/">Al·lotjament</a>.\r\n\r\n<a href="http://www.xtec.cat/cda-altbergueda/informacio/mapa/planol%20arribada.gif"> <img src="http://www.xtec.cat/cda-altbergueda/informacio/mapa/planol%20arribada.gif" alt="" width="400px" /></a>', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2016-06-21 11:21:05', '2016-06-21 10:21:05', '', 8225, 'http://blocs.xtec.cat/plantillacda/?page_id=71', 30, 'page', '', 0),
(80, 1, '2013-11-14 20:29:29', '2013-11-14 19:29:29', '   ', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2013-11-14 20:29:29', '2013-11-14 19:29:29', '', 0, 'http://blocs.xtec.cat/plantillacda/?page_id=80', 0, 'page', '', 0),
(83, 1, '2013-11-14 21:16:00', '2013-11-14 20:16:00', 'Els vostres alumnes s''allotjaran a <strong>La Casa de la Sala</strong>, a 6 km de <strong>Guardiola de Berguedà</strong>. Podeu trobar un mapa de com arribar-hi a la nostre secció <a title="On som" href="https://pwc-int.educacio.intranet/agora/mastercda/el-camp/on-som/">On Som</a>.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-la-sala-tot2.jpg"><img class="size-full wp-image-7 alignnone" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-la-sala-tot2.jpg" alt="cropped-la-sala-tot2.jpg" width="1000" height="287" /></a>\r\n\r\nA la casa hi ha tres edificis amb habitacions, un dels quals encara no està en disposició d''ésser ocupat amb alumnes del Camp.\r\n\r\nPot donar-se el cas que en un dels edificis hi hagi un altre grup de la Fundació Pere Tarrés, la qual cosa suposa compartir menjador i instal·lacions exteriors, però en cap cas les activitats del Camp d''Aprenentatge ni les habitacions.\r\n<h4>Serveis</h4>\r\n<p style="text-align: center;"><img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/serveis.png" alt="serveis" width="686" height="168" /></p>\r\n<p style="text-align: left;">El Camp d''Aprenentatge posa a disposició dels centres estadants pilotes, jocs de taula, llibres de lectura i còmics, una taula de ping-pong, un radiocasset, ordinador portàtil i DVD. A partir de les 9h del vespre i fins a les 8h del matí no hi haurà a la casa el personal de servei i, per tant, estareu sols a la casa.</p>\r\n\r\n<h4 style="text-align: left;">Organització i Funcionament</h4>\r\nEn aquest <a href="https://docs.google.com/a/xtec.cat/document/d/1B3R4drsrCVtLIOIU0Su0TtHEO5rbbWyDF9Iz0oXAD0E/edit#" target="_blank">document</a> podeu trobar indicacions, normes i consells relacionats amb l''alotjament.\r\n<h4>Com arribar-hi</h4>\r\nPer anar a <strong>la casa de La Sala</strong>, on fareu l''estada, no cal entrar a Guardiola. S''ha de seguir uns 200 metres més, per la C-16, i agafar la sortida cap a La Pobla de Lillet. Al cap d''uns sis quilòmetres, a mà esquerra, es troba el trencant que porta a la casa.\r\n\r\n<a href="http://www.xtec.cat/cda-altbergueda/informacio/mapa/planol%20arribada.gif"> <img src="http://www.xtec.cat/cda-altbergueda/informacio/mapa/planol%20arribada.gif" alt="" width="400px" /></a>\r\n<h4>Preu</h4>\r\nLa <a title="Fundació Pere Tarrés" href="http://www.peretarres.org/wps/wcm/connect/peretarres_ca/peretarres/home" target="_blank">Fundació Pere Tarrés</a> és l''entitat gestora i responsable de la casa on fareu l’estada.\r\n\r\nEl contracte el fareu directament amb la Fundació. Us l’enviaran a començaments de curs i haureu d’abonar una bestreta del 10% del cost, abans del 30 de setembre. En qualsevol reducció que superi el 10% de les places (pagament de la bestreta) caldrà pagar un 20% de l''import de les places no ocupades.\r\n\r\nEls preus són els mateixos per a tots els Camps d''Aprenentatge del Departament d''Ensenyament i els podeu trobar a la pàgina<a title="inscripcio" href="http://xtec.gencat.cat/ca/serveis/cda/inscripcio/" target="_blank"> d''inscripció</a> de XTEC.', 'Allotjament', '', 'publish', 'open', 'open', '', 'allotjament', '', '', '2016-06-27 15:03:58', '2016-06-27 14:03:58', '', 8225, 'http://blocs.xtec.cat/plantillacda/?page_id=83', 20, 'page', '', 0),
(107, 1, '2014-09-18 16:34:30', '2014-09-18 16:34:30', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera-2', '', '', '2016-06-22 14:33:52', '2016-06-22 13:33:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?post_type=slideshow&#038;p=107', 0, 'slideshow', '', 0),
(113, 1, '2014-09-18 17:21:02', '2014-09-18 17:21:02', 'Node del Departament de Ciències Naturals', 'Dep. Ciències', '', 'private', 'closed', 'open', '', 'dep-ciencies', '', '', '2014-09-18 17:21:02', '2014-09-18 17:21:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-ciencies', 0, 'forum', '', 0),
(115, 1, '2014-09-18 17:40:29', '2014-09-18 17:40:29', 'Node del departament de ciències socials (professorat)', 'Dep. Socials', '', 'private', 'closed', 'open', '', 'dep-socials', '', '', '2014-09-18 17:40:29', '2014-09-18 17:40:29', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-socials', 0, 'forum', '', 0),
(118, 1, '2013-11-14 21:54:56', '2013-11-14 20:54:56', '', 'serveis', '', 'inherit', 'open', 'open', '', 'serveis', '', '', '2013-11-14 21:54:56', '2013-11-14 20:54:56', '', 83, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/serveis.png', 0, 'attachment', 'image/png', 0),
(131, 1, '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 'primersauxilis', '', 'inherit', 'open', 'open', '', 'primersauxilis', '', '', '2014-09-19 10:42:18', '2014-09-19 10:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/primersauxilis.jpg', 0, 'attachment', 'image/jpeg', 0),
(132, 1, '2013-11-14 23:45:52', '2013-11-14 22:45:52', '', 'ensenyament_h3', '', 'inherit', 'open', 'open', '', 'ensenyament_h3', '', '', '2013-11-14 23:45:52', '2013-11-14 22:45:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/ensenyament_h3.jpg', 0, 'attachment', 'image/jpeg', 0),
(141, 1, '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 'cicles', '', 'inherit', 'open', 'open', '', 'cicles', '', '', '2014-09-19 11:18:24', '2014-09-19 11:18:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/cicles.png', 0, 'attachment', 'image/png', 0),
(146, 1, '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 'gimnas', '', 'inherit', 'open', 'open', '', 'gimnas', '', '', '2014-09-19 12:05:27', '2014-09-19 12:05:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/gimnas.png', 0, 'attachment', 'image/png', 0),
(147, 1, '2013-11-15 02:25:36', '2013-11-15 01:25:36', '', 'logoCDAEmporda', '', 'inherit', 'open', 'open', '', 'logocdaemporda-2', '', '', '2013-11-15 02:25:36', '2013-11-15 01:25:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/logoCDAEmporda1.png', 0, 'attachment', 'image/png', 0),
(148, 1, '2014-09-19 12:30:14', '2014-09-19 12:30:14', '', 'Exemple', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2016-06-21 13:53:33', '2016-06-21 12:53:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?post_type=slideshow&#038;p=148', 0, 'slideshow', '', 0),
(149, 1, '2013-11-15 02:40:28', '2013-11-15 01:40:28', '', 'logoCDAEmporda80', '', 'inherit', 'open', 'open', '', 'logocdaemporda80', '', '', '2013-11-15 02:40:28', '2013-11-15 01:40:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/logoCDAEmporda80.png', 0, 'attachment', 'image/png', 0),
(150, 1, '2013-11-15 02:54:09', '2013-11-15 01:54:09', '', 'capcdablanc', '', 'inherit', 'open', 'open', '', 'capcdablanc', '', '', '2013-11-15 02:54:09', '2013-11-15 01:54:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcdablanc.png', 0, 'attachment', 'image/png', 0),
(151, 1, '2013-11-15 02:55:40', '2013-11-15 01:55:40', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcdablanc1.png', 'capcdablanc1.png', '', 'inherit', 'closed', 'open', '', 'capcdablanc1-png', '', '', '2013-11-15 02:55:40', '2013-11-15 01:55:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcdablanc1.png', 0, 'attachment', 'image/png', 0),
(153, 1, '2013-11-15 03:09:44', '2013-11-15 02:09:44', '', 'se', '', 'inherit', 'open', 'open', '', 'se-2', '', '', '2013-11-15 03:09:44', '2013-11-15 02:09:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/se1.png', 0, 'attachment', 'image/png', 0),
(154, 1, '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 'Xesc_Arbona', '', 'inherit', 'open', 'open', '', 'xesc_arbona', '', '', '2014-09-19 14:40:48', '2014-09-19 14:40:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/Xesc_Arbona.png', 0, 'attachment', 'image/png', 0),
(155, 1, '2013-11-15 13:21:33', '2013-11-15 12:21:33', '<img class="wp-image-626 alignleft" style="border: 0px;" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_083.png" alt="Selecció_083" width="100" height="100" /> <img class="size-thumbnail wp-image-627 alignleft" style="border: 0px;" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_084.png" alt="Selecció_084" width="100" height="111" /> <img class=" wp-image-629 alignleft" style="border: 0px;" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_086.png" alt="Selecció_086" width="100" height="100" /> <img class="size-thumbnail wp-image-628 alignleft" style="border: 0px;" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_085.png" alt="Selecció_085" width="100" height="94" />\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n<ul>\r\n	<li>Les sortides son d''un dia i s''adrecen bàsicament als centres de la comarca propera. Les activitats es realitzen entre les <strong>9</strong> i les<strong> 17 </strong>h aproximadament.</li>\r\n	<li>El <strong>cost</strong> és de <strong>2€</strong> per alumne (és igual a tots els camps d''aprenentatge).</li>\r\n	<li>El centre educatiu és el responsable del desplaçament (anada i tornada) al camp d''aprenentatge.</li>\r\n	<li>Podeu triar les <strong>activitats</strong> que podeu fer durant la sortida. Aquí teniu la <a title="llista activitats" href="https://pwc-int.educacio.intranet/agora/mastercda/ambits/totes-les-activitats/">llista sencera</a>.</li>\r\n</ul>', 'Sortides', '', 'publish', 'closed', 'closed', '', 'sortides', '', '', '2016-06-21 11:44:49', '2016-06-21 10:44:49', '', 8260, 'http://blocs.xtec.cat/plantillacda/?page_id=155', 10, 'page', '', 0),
(157, 1, '2013-11-15 13:22:03', '2013-11-15 12:22:03', 'Podeu triar les activitats que vulgueu o triar una de les nostres propostes precuinades:\r\n\r\n<iframe src="https://docs.google.com/spreadsheet/pub?key=0AlWhk6C-0QRadG1zTFdFX3FzUldfS2xuMzJjOG9DeEE&amp;single=true&amp;gid=2&amp;output=html&amp;widget=true" width="700" height="600" frameborder="0"></iframe>\r\n\r\n<hr />\r\n\r\n<em><span style="color: #888888;">Aquesta taula és un <a href="https://docs.google.com/a/xtec.cat/spreadsheet/ccc?key=0AlWhk6C-0QRadG1zTFdFX3FzUldfS2xuMzJjOG9DeEE&amp;usp=drive_web#gid=2"><span style="color: #888888;">full de càlcul</span></a> de Google Drive</span></em>', 'Estades', '', 'publish', 'closed', 'closed', '', 'estades', '', '', '2016-06-20 17:52:09', '2016-06-20 16:52:09', '', 8260, 'http://blocs.xtec.cat/plantillacda/?page_id=157', 20, 'page', '', 0),
(160, 1, '2013-11-15 13:23:03', '2013-11-15 12:23:03', '<strong>Projecte l''hort escolar</strong>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_062.png"><img class="alignnone size-medium wp-image-518" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_062-300x211.png" alt="Selecció_062" width="300" height="211" /></a>\r\n\r\nAquest projecte pretén incidir a través de propostes de caire pràctic, en continguts educatius relacionats amb la vida de les plantes de forma sempre respectuosa amb el medi. Algunes de les experiències tenen com a base les suggerides a "L''Hort escolar ecològic" de la Montse Escutia.  <a href="http://hortbergueda1314.blogspot.com.es/">Enllaç</a> al projecte.\r\n\r\n&nbsp;\r\n\r\n<strong>Projecte Llobregat</strong>\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/1346327037.jpg" rel="attachment wp-att-8327"><img class="alignnone  wp-image-8327" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/1346327037.jpg" alt="1346327037" width="317" height="211" /></a>\r\n\r\nEl Projecte Llobregat és un projecte compartit entre tres escoles i els tres Camps d''Aprenentatge de la conca del Llobregat per tal de conèixer, aprendre i valorar tota una sèrie d''aspectes a l''entorn del riu Llobregat. <a href="https://sites.google.com/site/prollobregat/">Enllaç</a> al projecte.', 'Projectes', '', 'publish', 'closed', 'closed', '', 'projectes', '', '', '2016-06-21 11:51:12', '2016-06-21 10:51:12', '', 8260, 'http://blocs.xtec.cat/plantillacda/?page_id=160', 30, 'page', '', 0),
(165, 1, '2013-11-15 13:32:09', '2013-11-15 12:32:09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae sodales augue. Ut ex nisl, lobortis quis nulla vel, ultrices efficitur nulla. Donec sit amet commodo purus.\r\n<ul>\r\n	<li>Praesent accumsan nisi leo, vel finibus purus molestie id. Vestibulum sed sollicitudin mauris, sed blandit risus.</li>\r\n	<li>Etiam volutpat leo eget scelerisque auctor. Cras pretium felis at libero pellentesque volutpat.</li>\r\n	<li>Mauris et cursus elit. In a urna sit amet dui pretium efficitur. Suspendisse potenti. Aliquam volutpat maximus elit, at fringilla felis vestibulum sit amet.</li>\r\n</ul>\r\n<a style="font-family: inherit; font-size: 1em; line-height: 1.6;" href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_999322.png" rel="attachment wp-att-8314"><img class="alignnone wp-image-8314" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_999322.png" alt="Selecció_999(322)" width="487" height="323" /></a>', 'Pedraforca', '', 'publish', 'open', 'open', '', 'pedraforca', '', '', '2016-06-21 13:13:23', '2016-06-21 12:13:23', '', 8235, 'http://blocs.xtec.cat/plantillacda/?page_id=165', 40, 'page', '', 0),
(168, 1, '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-19 16:04:34', '2014-09-19 16:04:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(170, 1, '2014-09-19 16:16:22', '2014-09-19 16:16:22', 'Node del departament de Tecnologia (professorat)', 'Tecnologia', '', 'private', 'closed', 'open', '', 'tecnologia', '', '', '2014-09-19 16:16:22', '2014-09-19 16:16:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/tecnologia', 0, 'forum', '', 0),
(171, 1, '2014-09-19 16:19:15', '2014-09-19 16:19:15', 'Node del departament de Matemàtiques', 'Dep. Matemàtiques', '', 'private', 'closed', 'open', '', 'dep-matematiques', '', '', '2014-09-19 16:19:15', '2014-09-19 16:19:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-matematiques', 0, 'forum', '', 0),
(172, 1, '2014-09-19 16:26:36', '2014-09-19 16:26:36', 'Node del departament de Llengua catalana i literatura (professorat)', 'Dep. Català', '', 'private', 'closed', 'open', '', 'dep-catala', '', '', '2014-09-19 16:26:36', '2014-09-19 16:26:36', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-catala', 0, 'forum', '', 0),
(173, 1, '2014-09-19 16:29:03', '2014-09-19 16:29:03', 'Node del departament de Llengua castellana i literatura (professorat)', 'Dep. Castellà', '', 'private', 'closed', 'open', '', 'dep-castella', '', '', '2014-09-19 16:29:03', '2014-09-19 16:29:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-castella', 0, 'forum', '', 0),
(174, 1, '2014-09-19 16:31:22', '2014-09-19 16:31:22', 'Node del departament de Llengües estrangeres (professorat)', 'Dep. Llengües estrangeres', '', 'private', 'closed', 'open', '', 'dep-llengues-estrangeres', '', '', '2014-09-19 16:31:22', '2014-09-19 16:31:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-llengues-estrangeres', 0, 'forum', '', 0),
(175, 1, '2014-09-19 16:33:32', '2014-09-19 16:33:32', 'Node del departament d&#039;Educació Física (professorat)', 'Dep. Educació Física', '', 'private', 'closed', 'open', '', 'dep-educacio-fisica', '', '', '2014-09-19 16:33:32', '2014-09-19 16:33:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-educacio-fisica', 0, 'forum', '', 0),
(176, 1, '2014-09-19 16:39:42', '2014-09-19 16:39:42', 'Node del departament de Visual i Plàstica (professorat)', 'Dep. Visual i Plàstica', '', 'private', 'closed', 'open', '', 'dep-visual-i-plastica', '', '', '2014-09-19 16:39:42', '2014-09-19 16:39:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-visual-i-plastica', 0, 'forum', '', 0),
(177, 1, '2014-09-19 16:45:37', '2014-09-19 16:45:37', 'Node del departament de música (professorat)', 'Dep. Música', '', 'private', 'closed', 'open', '', 'dep-musica', '', '', '2014-09-19 16:45:37', '2014-09-19 16:45:37', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-musica', 0, 'forum', '', 0),
(178, 1, '2014-09-19 16:50:06', '2014-09-19 16:50:06', 'Node del departament d&#039;Orientació (professorat)', 'Dep. Orientació', '', 'private', 'closed', 'open', '', 'dep-orientacio', '', '', '2014-09-19 16:50:06', '2014-09-19 16:50:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-orientacio', 0, 'forum', '', 0),
(179, 1, '2014-09-19 17:00:49', '2014-09-19 17:00:49', 'Node del departament d&#039;Informàtica (professorat)', 'Dep. Informàtica', '', 'private', 'closed', 'open', '', 'dep-informatica', '', '', '2014-09-19 17:00:49', '2014-09-19 17:00:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/dep-informatica', 0, 'forum', '', 0),
(185, 1, '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 'ampa', '', 'inherit', 'open', 'open', '', 'ampa-2', '', '', '2014-09-22 10:13:06', '2014-09-22 10:13:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/ampa.png', 0, 'attachment', 'image/png', 0),
(186, 1, '2013-11-15 14:02:38', '2013-11-15 13:02:38', '', 'nivells', '', 'inherit', 'open', 'open', '', 'nivells', '', '', '2013-11-15 14:02:38', '2013-11-15 13:02:38', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/nivells.png', 0, 'attachment', 'image/png', 0),
(194, 1, '2013-11-15 18:20:38', '2013-11-15 17:20:38', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda1.png', 'capcda1.png', '', 'inherit', 'closed', 'open', '', 'capcda1-png', '', '', '2013-11-15 18:20:38', '2013-11-15 17:20:38', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda1.png', 0, 'attachment', 'image/png', 0),
(195, 1, '2013-11-15 18:29:23', '2013-11-15 17:29:23', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda2.png', 'capcda2.png', '', 'inherit', 'closed', 'open', '', 'capcda2-png', '', '', '2013-11-15 18:29:23', '2013-11-15 17:29:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda2.png', 0, 'attachment', 'image/png', 0),
(196, 1, '2013-11-15 18:36:21', '2013-11-15 17:36:21', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda3.png', 'capcda3.png', '', 'inherit', 'closed', 'open', '', 'capcda3-png', '', '', '2013-11-15 18:36:21', '2013-11-15 17:36:21', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda3.png', 0, 'attachment', 'image/png', 0),
(197, 1, '2013-11-15 18:37:20', '2013-11-15 17:37:20', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/wallpaper-964432.jpg', 'wallpaper-964432.jpg', '', 'inherit', 'open', 'open', '', 'wallpaper-964432-jpg', '', '', '2013-11-15 18:37:20', '2013-11-15 17:37:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/wallpaper-964432.jpg', 0, 'attachment', 'image/jpeg', 0),
(198, 1, '2013-11-15 18:40:20', '2013-11-15 17:40:20', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda4.png', 'capcda4.png', '', 'inherit', 'closed', 'open', '', 'capcda4-png', '', '', '2013-11-15 18:40:20', '2013-11-15 17:40:20', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda4.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2014-09-22 15:03:12', '2014-09-22 15:03:12', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2016-06-22 14:21:06', '2016-06-22 13:21:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?post_type=slideshow&#038;p=202', 0, 'slideshow', '', 0),
(203, 1, '2014-09-22 14:12:23', '2014-09-22 14:12:23', 'Node dedicat a l&#039;educació emocional', 'Educació emocional', '', 'publish', 'closed', 'open', '', 'educacio-emocional', '', '', '2014-09-22 14:12:23', '2014-09-22 14:12:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/educacio-emocional', 0, 'forum', '', 0),
(204, 1, '2014-09-22 14:20:24', '2014-09-22 14:20:24', 'Node dels aficionats al cinema', 'Cinema', '', 'publish', 'closed', 'open', '', 'cinema', '', '', '2014-09-22 14:20:24', '2014-09-22 14:20:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/cinema', 0, 'forum', '', 0),
(205, 1, '2014-09-22 14:31:55', '2014-09-22 14:31:55', 'Node dels aficionats a la fotografia', 'Fotografia', '', 'publish', 'closed', 'open', '', 'fotografia', '', '', '2014-09-22 14:31:55', '2014-09-22 14:31:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/fotografia', 0, 'forum', '', 0),
(207, 1, '2013-11-15 19:15:19', '2013-11-15 18:15:19', 'Les activitats de la indústria petroquímica de Tarragona realitzada amb conveni amb l’AEQT, han comptat aquest curs amb un total de 2065 alumnes i 183 professors participants.\r\n\r\nEn l’activitat específica de “La indústria petroquímica de Tarragona” dirigida a alumnes de segon cicle d’ESO i Batxillerat han intervingut 38 grups escoltars amb 1065 alumnes i 82 professors.\r\n\r\nHan realitzat l’activitat “Un tresor sota les xemeneies”, cicle superior d’educació primària, un total de 39 grups amb 1002 alumnes i 101 professors.\r\n\r\nLa fotografia correspon als alumnes del col·legi Mare de Déu del Carme, que varen visitar BASF el 26 d’abril d’enguany:\r\n\r\n<a href="http://cdatarragona.net/wp-content/uploads/p1010270.jpg" rel="lightbox[4907]"><img title="p1010270" src="http://cdatarragona.net/wp-content/uploads/p1010270.jpg" alt="p1010270" width="518" height="389" /></a>', 'Va de química', '', 'publish', 'open', 'open', '', 'va-de-quimica', '', '', '2016-06-21 14:24:41', '2016-06-21 13:24:41', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?p=207', 0, 'post', '', 0),
(209, 1, '2014-09-22 15:06:43', '2014-09-22 15:06:43', 'Node d&#039;aficionats a la papiroflexia', 'Papiroflexia', '', 'publish', 'closed', 'open', '', 'papiroflexia', '', '', '2014-09-22 15:06:43', '2014-09-22 15:06:43', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/papiroflexia', 0, 'forum', '', 0),
(211, 1, '2014-09-22 15:11:13', '2014-09-22 15:11:13', 'Hola Noders! Qui s''apunta a fer la granota? Aquí teniu les instruccions:\n\n[caption id="" align="alignnone" width="700"]<img src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/granota.png" alt="Instruccions Granota" width="700" height="495" /> Instruccions Granota[/caption]', 'Figura n.1: La granota ', '', 'publish', 'closed', 'open', '', 'figura-n-1-la-granota', '', '', '2014-09-22 15:11:13', '2014-09-22 15:11:13', '', 209, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/topic/figura-n-1-la-granota', 0, 'topic', '', 0),
(215, 1, '2014-09-22 16:02:36', '2014-09-22 16:02:36', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2015-12-02 15:39:31', '2015-12-02 14:39:31', '', 341, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(248, 1, '2015-01-23 12:14:15', '2015-01-23 11:14:15', '<strong>[title]</strong>\r\n[when]\r\n[location]\r\n<div>[description]</div>\r\n[link newwindow="yes"]Més detalls...[/link]', 'Agenda d''exemple', '', 'publish', 'closed', 'closed', '', 'agenda-dexemple', '', '', '2016-09-21 10:34:02', '2016-09-21 08:34:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?post_type=gce_feed&#038;p=248', 0, 'calendar', '', 0),
(249, 1, '2013-11-05 20:50:06', '2013-11-05 19:50:06', 'Article d''exemple. La foto correspon a la casa de la Culla del camp d''aprenentatge del Bages. Una casa amb més de 1000 anys!\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/març2010-031.jpg"><img class="alignnone size-medium wp-image-699" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/març2010-031-300x225.jpg" alt="març2010 031" width="300" height="225" /></a>', 'Bon nadal', '', 'publish', 'open', 'open', '', 'primera-nevada', '', '', '2016-06-22 11:27:07', '2016-06-22 10:27:07', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?p=249', 0, 'post', '', 0),
(253, 1, '2013-11-18 21:43:11', '2013-11-18 20:43:11', 'Recull de fotografies i vídeos dels diferents escoles i instituts que ens han visitat.\r\n\r\nhttps://www.youtube.com/watch?v=RoQCyu0SgDY#t=107\r\n\r\n[slideshow_deploy id=''148'']', 'Fotos i vídeos', '', 'publish', 'closed', 'closed', '', 'fotos-videos', '', '', '2016-06-21 13:52:47', '2016-06-21 12:52:47', '', 8272, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=253', 20, 'page', '', 0),
(254, 1, '2013-11-16 11:47:36', '2013-11-16 10:47:36', '<h1><strong>Inscripció</strong></h1>\nEl període d''inscripció es realitza entre el <strong>15</strong> i el<strong> 31 </strong>de<strong> maig</strong> mitjançant\naquest <a title="Formulari d''inscripció (Dep.Ensenyament)" href="http://aplitic.xtec.cat/pls/apex/f?p=151:LOGIN:1868332647323367" target="_blank">formulari d''inscripció</a> amb el codi i contrasenya que el centre té a la XTEC.\n<h1><strong style="color: #000000;">Inscripció fora de període</strong></h1>\nPer demanar sortides (un dia) o estades (més d''un dia) fora del període d''inscripció, podeu consultar la disponibilitat al nostre calendari i omplir el formulari <a title="calendari" href="http://blocs.xtec.cat/plantillacda/inscripcio-fora-termini/" target="_blank">aquí</a>.\n<h1><strong>Quotes</strong></h1>\nLes quotes són iguals per tots els camps d''aprenentatge.\n<ul>\n	<li>Activitats d''un dia (sense estada): 2 € per alumne</li>\n	<li>Activitats en el marc d''una estada: 3 € per alumne i dia</li>\n	<li>Pensió completa (allotjament i manutenció): 23,50 €</li>\n	<li>Mitja pensió: 18,25 €</li>\n	<li>Dormir i esmorzar: 11,40 €</li>\n	<li>Àpat addicional (dinar o sopar): 7,00 €</li>\n</ul>\nPodeu trobar tota l''informació actualitzada a: <a href="http://www.xtec.cat/web/serveis/serveis/cda/inscripcio">http://www.xtec.cat/web/serveis/serveis/cda/inscripcio</a>', 'Inscripció', '', 'publish', 'closed', 'closed', '', 'inscripcio', '', '', '2013-11-16 11:47:36', '2013-11-16 10:47:36', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=254', 0, 'page', '', 0),
(275, 1, '2013-11-17 12:33:25', '2013-11-17 11:33:25', '', 'graella nivells educatius', '', 'inherit', 'open', 'open', '', '2013-11-17_1231', '', '', '2013-11-17 12:33:25', '2013-11-17 11:33:25', '', 54, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/2013-11-17_1231.png', 0, 'attachment', 'image/png', 0),
(289, 1, '2015-10-09 13:38:33', '2015-10-09 12:38:33', '', 'Mur general', '', 'publish', 'open', 'open', '', '289', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=289', 1, 'nav_menu_item', '', 0),
(294, 1, '2013-11-17 18:08:59', '2013-11-17 17:08:59', '<h1><img class="size-full wp-image-300 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/bolets.png" alt="bolets" width="546" height="151" /></h1>\r\n<strong>Nivells educatius:</strong>\r\n\r\nEducació Primària, 1r cicle d''Educació Secundària\r\n\r\n<strong>Es treballaran:</strong>\r\n<ul>\r\n	<li>Els fongs i els bolets com a éssers vius: el regne dels fongs, les funcions vitals (nutrició, relació i reproducció).</li>\r\n	<li>Les parts d''un bolet, característiques.</li>\r\n	<li>L’hàbitat i formes de vida.</li>\r\n	<li>La recol·lecció de bolets .</li>\r\n	<li>La identificació i classificació dels bolets més comuns que podem trobar a la zona.</li>\r\n	<li>La funció dels fongs i el seu aprofitament.</li>\r\n</ul>\r\n<strong>Desenvolupament de l''activitat:</strong>\r\n\r\n<strong>Presentació</strong>\r\n<ul>\r\n	<li>Comentari sobre els bolets i els fongs. Els alumnes exposen què saben dels bolets. Es plantegen preguntes o dubtes del tipus: de què s''alimenten, a sobre d’on viuen, què és un fong i què és un bolet, quins beneficis aporten al bosc, com saber si són comestibles, en què s''assemblen a un animal i en què a una planta, com es reprodueixen,etc.</li>\r\n	<li>Breu explicació sobre com s’han de collir els bolets i perquè es fa així, quins es poden agafar i quants de cada tipus.</li>\r\n	<li>Distribució de cistells.</li>\r\n</ul>\r\n<strong>Treball de camp</strong>\r\n<ul>\r\n	<li>Sortida a l’entorn proper del centre per anar a buscar bolets.</li>\r\n</ul>\r\n<strong>Treball a l’aula</strong>\r\n<ul>\r\n	<li>Tria dels bolets: separar els coneguts de la resta.</li>\r\n	<li>Conversa sobre utilitats, perjudicis, funcions dels bolets i dels fongs.</li>\r\n	<li>Identificació dels bolets trobats a partir de diapositives.</li>\r\n</ul>\r\n<strong>Treball de laboratori</strong>\r\n<ul>\r\n	<li>Observació de les diferents parts del bolet amb lupa binocular.</li>\r\n	<li>Descripció d’un dels bolets trobats.</li>\r\n	<li>Preparació de l’esporada.</li>\r\n	<li>Preparació i observació microscòpica de les espores (per CS I ESO).</li>\r\n</ul>\r\n<strong>Observacions</strong>\r\n\r\nEl material per realitzar l’activitat el proporciona el Camp: quaderns de\r\npresa de dades, cistell per cada grup, safates..., de totes maneres si el centre\r\nho creu convenient els alumnes poden portar els seus propis cistells.\r\n\r\nPer al treball de laboratori es farà servir l’aula o el laboratori del centre. Els\r\ninstruments a utilitzar seran també els del centre (lupa binocular, càpsules de\r\npetri, etc.). Si aquest no en disposa, serà el Camp qui els portarà.\r\n\r\n<a title="descarregar fitxa" href="https://drive.google.com/file/d/0B1Whk6C-0QRaTmpuUF9fTjlvZXc/edit?usp=sharing">Descarregar fitxa</a>\r\n<a title="mes activitats" href="https://pwc-int.educacio.intranet/agora/mastercda/ambits/totes-les-activitats/">Veure més activitats</a>\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Activitat: Els fongs i els bolets', '', 'publish', 'open', 'closed', '', 'fongs-bolets', '', '', '2016-06-21 11:26:09', '2016-06-21 10:26:09', '', 8199, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=294', 0, 'page', '', 0),
(299, 1, '2013-11-17 18:11:34', '2013-11-17 17:11:34', '', 'bolet', '', 'inherit', 'open', 'open', '', 'bolet', '', '', '2013-11-17 18:11:34', '2013-11-17 17:11:34', '', 294, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/bolet.png', 0, 'attachment', 'image/png', 0),
(300, 1, '2013-11-17 18:12:49', '2013-11-17 17:12:49', '', 'bolets', '', 'inherit', 'open', 'open', '', 'bolets', '', '', '2013-11-17 18:12:49', '2013-11-17 17:12:49', '', 294, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/bolets.png', 0, 'attachment', 'image/png', 0),
(316, 1, '2013-11-17 19:03:07', '2013-11-17 18:03:07', '<h5> [slideshow_deploy id=''8322'']</h5>\r\n&nbsp;\r\n<h5><strong>Nivells educatius:</strong></h5>\r\n<ul>\r\n	<li>Educació Primària (CI, CM, CS)</li>\r\n	<li>Educació Secundària (1r cicle ESO)</li>\r\n</ul>\r\n<h5><strong>Es treballaran: </strong></h5>\r\n<ul>\r\n	<li>Lectura del paisatge (comparació amb el seu) </li>\r\n	<li>Formació dels Pirineus. Roca calcària. Fòssils</li>\r\n	<li> Cova, sistema càrstic.</li>\r\n	<li> Les Fonts del Llobregat. Aigües subterrànies</li>\r\n	<li> Aprofitament del riu (abans/ara). Molins, fargues, hidroelèctriques.</li>\r\n	<li> Llegenda</li>\r\n	<li> Passat històric i social/societat i economia actual.</li>\r\n	<li> El relleu de l’Alt Berguedà</li>\r\n</ul>\r\n<h5><strong>Desenvolupament de l''activitat:</strong></h5>\r\n<p style="padding-left: 30px;"><strong>Arribada a Castellar de n’Hug</strong>\r\nPresentació de l’activitat i formulació dels interrogants que s’hauran deresoldre al llarg del dia. Situació de la Tuta i presentació d’algunes unitats de relleu.</p>\r\n<p style="padding-left: 30px;"><strong>Turó prop de camp de futbol o altre indret (si es decideix no pujar a la Tuta)\r\n</strong>Lectura del paisatge i comparació amb el del seu lloc de procedència. A través dels elements del paisatge es parla de la formació dels Pirineus, s’identifica el tipus i característiques de la roca que ens envolta, l’evolució i aprofitament de l’entorn. Es treballa el relleu de l’Alt Berguedà, tot orientant-lo i situant-lo en un perfil.</p>\r\n<p style="padding-left: 30px;"><strong>Camí de la Tuta, Antic dipòsit</strong>\r\nLectura del paisatge i comparació amb el del seu lloc de procedència. A\r\ntravés dels elements del paisatge es parla de la formació dels Pirineus,\r\ns’identifica el tipus i característiques de la roca que ens envolta, l’evolució i\r\naprofitament de l’entorn.\r\nEs situa l’antic castell, i que dóna nom al poble, on ara es situa el museu del\r\npastor.</p>\r\n<p style="padding-left: 30px;"><strong>La cova de la Tuta\r\n</strong>Entrarem a la cova equipats amb casc i lots. S’observarà la part més externa tot deduint possibles usos remots i actuals. Es baixarà fins a la següent galeria on s’observaran i es parlarà del procés de formació d’estalactites i estalagmites. Una mica més endins, es parlarà dels avencs i a les fosques i amb silenci, s’escoltarà el soroll de les gotes d’aigua al caure.</p>\r\n<p style="padding-left: 30px;"><strong>Les Fonts del Llobregat</strong>\r\nPel camí de Castellar fins a les Fonts es faran un parell de parades, una per\r\nescoltar el soroll i l’altre per parlar del torrent de la Font del boix.\r\nEn la visita a Les Fonts del Llobregat ens fixarem per on surt l’aigua, quanta\r\nen surt, ... També ens aportarà informació sobre l’aprofitament de l’aigua\r\nabans i ara (canals, rescloses, molins, minicentrals hidroelèctriques.</p>\r\n<p style="padding-left: 30px;"><strong>En el Molí de les Fonts farem l’ultima parada.</strong>\r\nAquí explicarem la llegenda de “La bruixa del riu”, a partir de la qual, i de les\r\nobservacions fetes durant tot el dia, esbrinarem l’origen de les Fonts (el\r\nrecorregut de l’aigua per dins la muntanya lligant-lo amb l visita a la cova de\r\nla Tuta) i el seu comportament durant el curs de l’any.\r\nTambé parlarem de l’aprofitament del riu.</p>\r\n\r\n<h5><strong>Observacions:</strong></h5>\r\n<ul>\r\n	<li>L’activitat és d’un dia.</li>\r\n	<li>Cal portar esmorzar, dinar i aigua. També un lot si s’opta per la cova de la Tuta.</li>\r\n	<li>Cal anar preparat amb bon calçat i roba d’abric per protegir-se de lespossibles inclemències del temps.</li>\r\n	<li>L’activitat es pot adaptar segons les necessitats del centre i els aspectes curriculars que es vulguin tractar.</li>\r\n</ul>\r\n<a title="descarregar fitxa" href="https://drive.google.com/file/d/0B1Whk6C-0QRaQmJsSnVxVFI3M28/edit?usp=sharing">Descarregar fitxa\r\n</a><a title="veure mes" href="https://pwc-int.educacio.intranet/agora/mastercda/ambits/totes-les-activitats/">Veure més activitats</a>', 'Activitat: La cova de la Tuta i les fonts del Llobregat', '', 'publish', 'open', 'open', '', 'activitat-la-cova-de-la-tuta-les-fonts-del-llobregat', '', '', '2016-06-21 11:48:47', '2016-06-21 10:48:47', '', 8199, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=316', 0, 'page', '', 0),
(320, 1, '2013-11-17 19:14:55', '2013-11-17 18:14:55', '', 'fonts', '', 'inherit', 'open', 'open', '', 'fonts', '', '', '2013-11-17 19:14:55', '2013-11-17 18:14:55', '', 316, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/fonts.png', 0, 'attachment', 'image/png', 0),
(328, 1, '2015-11-20 13:32:14', '2015-11-20 12:32:14', '', 'BN_SE', '', 'inherit', 'open', 'open', '', 'bn_se-2', '', '', '2015-11-20 13:32:14', '2015-11-20 12:32:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/BN_SE1.png', 0, 'attachment', 'image/png', 0),
(339, 1, '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 'tartu', '', 'inherit', 'open', 'open', '', 'tartu', '', '', '2015-11-24 18:38:13', '2015-11-24 17:38:13', '', 341, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/tartu.png', 0, 'attachment', 'image/png', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(341, 1, '2015-11-24 18:41:15', '2015-11-24 17:41:15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut vulputate erat. Sed feugiat imperdiet elementum. Nunc posuere condimentum scelerisque. Etiam ultricies, enim ac feugiat condimentum, nibh turpis cursus libero, vel egestas ante lectus sed nisi. Vivamus mollis varius tempor. Proin vel nulla dignissim, scelerisque sem sit amet, sagittis ex. Vivamus in ipsum vel sapien dignissim pharetra in quis dolor. Duis vitae augue purus. Nulla urna leo, gravida id porttitor ut, porta aliquam elit. Fusce convallis hendrerit erat, vitae aliquet nunc egestas vel. Mauris finibus vestibulum purus sit amet vulputate. Phasellus dictum justo volutpat felis varius, a volutpat nisi suscipit. Sed vitae ipsum vitae diam aliquam posuere sit amet ac turpis.', 'Comunitat', '', 'publish', 'closed', 'closed', '', 'comunitat', '', '', '2015-11-24 18:41:15', '2015-11-24 17:41:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=341', 0, 'page', '', 0),
(359, 1, '2013-11-18 10:16:41', '2013-11-18 09:16:41', 'Les vostres opinions i els vostres suggeriments ens poden ser molt útils per a millorar les estades i la coordinació amb la tasca que dueu a terme a les escoles i els instituts. És per això que us demanem una mica de temps i la vostra col·laboració. Gràcies.\r\n<ul>\r\n	<li><a title="Enquesta sortida dia" href="https://docs.google.com/a/xtec.cat/spreadsheet/viewform?formkey=dEljV0xVNnVtMnUzMnZSRlBwQ1lKZUE6MA#gid=0">Enquesta sortida d''un dia</a></li>\r\n	<li><a href="https://docs.google.com/a/xtec.cat/spreadsheet/viewform?formkey=dG1HTUN5OWF3TWN4QnI3dVhsR3hJdHc6MA#gid=0">Enquesta estada</a></li>\r\n</ul>\r\n<strong>Resultats</strong>\r\n<ul>\r\n	<li>Sortides</li>\r\n	<li>Estades</li>\r\n</ul>', 'Valoracions', '', 'publish', 'closed', 'closed', '', 'formulari-de-valoracio', '', '', '2016-06-20 18:02:25', '2016-06-20 17:02:25', '', 8272, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=359', 30, 'page', '', 0),
(361, 1, '2013-11-18 10:17:34', '2013-11-18 09:17:34', 'Resultats de les valoracions (Google Forms)', 'Resultats', '', 'publish', 'closed', 'closed', '', 'resultats', '', '', '2013-11-18 10:17:34', '2013-11-18 09:17:34', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=361', 0, 'page', '', 0),
(372, 1, '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 'OX253EDR6R (1)', '', 'inherit', 'open', 'open', '', 'ox253edr6r-1', '', '', '2015-11-25 13:10:09', '2015-11-25 12:10:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/OX253EDR6R-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(433, 1, '2013-11-19 17:56:41', '2013-11-19 16:56:41', '<iframe src=''http://edumet.cat/edumet/meteo_2/dadesnodes.php?codEst=25911027'' height=''800px'' width=''100%'' hspace=''0'' marginheight=''0'' marginwidth=''0'' vspace=''0'' frameborder=''1'' ></iframe>\r\n<hr />', 'Meteorologia', '', 'publish', 'closed', 'closed', '', 'meteorologia', '', '', '2016-06-22 12:14:55', '2016-06-22 11:14:55', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?page_id=433', 0, 'page', '', 0),
(443, 1, '2013-11-13 12:53:08', '2013-11-13 12:53:08', 'Si voleu fer una inscripció per fer activitats al nostre camp, heu d''anar a la <a title="inscripció" href="http://xtec.gencat.cat/ca/serveis/cda/inscripcio/">secció d''incripcions</a>.\r\n\r\nSi voleu fer una altre tipus de petició o consulta, esteu a la secció adecuada. Podeu fer-nos arribar les vostres consultes:\r\n<ul>\r\n	<li><span style="line-height: 15px;">Enviant-nos un correu electrònic a <strong>cda-altbergueda@xtec.cat</strong></span></li>\r\n	<li>Trucant-nos al telèfon <strong><span style="font-family: Arial, Helvetica, sans-serif;">93 822 76 96</span></strong></li>\r\n	<li>Omplint aquest formulari:</li>\r\n</ul>\r\n<iframe src="https://docs.google.com/forms/d/1SHnveuK0VMTdZbD2XYWi5ek69v5TN5ue2NasBDLy-M4/viewform?embedded=true" width="760" height="630" frameborder="1" marginwidth="0" marginheight="0"></iframe>', 'Contacte', '', 'publish', 'closed', 'closed', '', 'contacte', '', '', '2016-06-21 11:19:34', '2016-06-21 10:19:34', '', 8225, 'http://blocs.xtec.cat/plantillacda/?page_id=2', 40, 'page', '', 0),
(484, 1, '2013-12-09 13:00:55', '2013-12-09 13:00:55', '', 'cda-qui-som', '', 'inherit', 'open', 'open', '', 'cda-qui-som-3', '', '', '2013-12-09 13:00:55', '2013-12-09 13:00:55', '', 54, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cda-qui-som2.png', 0, 'attachment', 'image/png', 0),
(510, 1, '2015-11-26 14:22:25', '2015-11-26 13:22:25', 'Criteris, instruccions i orientacions, 2015-16', 'Formació del professorat. Criteris, instruccions i orientacions (2015-16)', '', 'publish', 'open', 'open', '', 'formacio-del-professorat', '', '', '2015-12-02 14:16:11', '2015-12-02 13:16:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(515, 1, '2015-11-26 16:36:06', '2015-11-26 15:36:06', 'Orientacions als centres educatius per a desenvolupar un projecte de servei comunitari', 'Orientacions per projecte de servei comunitari', '', 'publish', 'open', 'open', '', 'orientacions-per-projecte-de-servei-comunitari', '', '', '2015-12-02 14:13:15', '2015-12-02 13:13:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(518, 1, '2015-11-26 16:44:29', '2015-11-26 15:44:29', 'Exemple d''una bona experiència: La participació dels joves en el municipi de Vilanova i Vallromanes', 'Experiència d’aprenentatge servei comunitari', '', 'publish', 'open', 'open', '', 'experiencia-daprenentatge-servei-comunitari', '', '', '2015-12-02 14:15:27', '2015-12-02 13:15:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(521, 1, '2015-11-26 16:45:58', '2015-11-26 15:45:58', '', 'Model de document de compromís', '', 'publish', 'open', 'open', '', 'model-de-document-de-compromis', '', '', '2015-12-02 14:18:53', '2015-12-02 13:18:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(524, 1, '2015-11-26 16:49:11', '2015-11-26 15:49:11', '', 'Model d’autorització de prestació del servei comunitari', '', 'publish', 'open', 'open', '', 'model-dautoritzacio-de-prestacio-del-servei-comunitari', '', '', '2015-12-02 14:14:44', '2015-12-02 13:14:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(528, 1, '2015-11-26 16:59:44', '2015-11-26 15:59:44', '', 'Esquema del projecte de servei comunitari', '', 'publish', 'open', 'open', '', 'esquema-del-projecte-de-servei-comunitari', '', '', '2015-12-02 14:13:54', '2015-12-02 13:13:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(531, 1, '2015-11-26 17:00:37', '2015-11-26 16:00:37', 'Document model per fer el conveni amb les entitats', 'Conveni amb entitats pel servei comunitari', '', 'publish', 'open', 'open', '', 'conveni-entitats-2', '', '', '2015-12-02 14:12:21', '2015-12-02 13:12:21', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(549, 1, '2013-12-12 09:25:27', '2013-12-12 09:25:27', '<strong>Organització i funcionament</strong>\r\n\r\nEn <a title="document " href="https://docs.google.com/a/xtec.cat/document/d/1B3R4drsrCVtLIOIU0Su0TtHEO5rbbWyDF9Iz0oXAD0E/edit#heading=h.fuso4d1xfgrz">aquest document</a> podeu trobar indicacions de com s''organitza una estada, les normes de convivència i consells a tenir en compte (que cal portar, com funciona el menjador, els esbarjos...).\r\n\r\n<strong>Accés al node del vostre centre</strong>\r\n\r\nDins a''aquest web, podeu trobar un espai privat per la vostra escola on trobareu materials i enllaços personalitzats pel treball previ i podreu penjar els vostres comentaris i fotos després de la visita. Busqueu el logotip de la vostra escola dins de la <a href="https://pwc-int.educacio.intranet/agora/mastercda/activitat">xarxa interna</a>.', 'Preparació', '', 'publish', 'closed', 'closed', '', 'preparacio', '', '', '2016-06-21 11:56:23', '2016-06-21 10:56:23', '', 8272, 'http://blocs.xtec.cat/plantillacda/?page_id=549', 10, 'page', '', 0),
(600, 1, '2013-12-13 12:20:59', '2013-12-13 12:20:59', '<strong>Informació i inscripcions:</strong>\r\nWeb de les trobades de coordinació a xtec (properament)', 'Trobades de coordinació', '', 'publish', 'closed', 'closed', '', 'trobades-de-coordinacio', '', '', '2016-06-21 13:31:18', '2016-06-21 12:31:18', '', 8272, 'http://blocs.xtec.cat/plantillacda/?page_id=600', 20, 'page', '', 0),
(620, 1, '2013-12-17 11:58:25', '2013-12-17 11:58:25', '', 'badge', '', 'inherit', 'open', 'open', '', 'badge', '', '', '2013-12-17 11:58:25', '2013-12-17 11:58:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/badge.png', 0, 'attachment', 'image/png', 0),
(626, 1, '2013-12-17 12:50:16', '2013-12-17 12:50:16', '', 'Selecció_083', '', 'inherit', 'open', 'open', '', 'seleccio_083', '', '', '2013-12-17 12:50:16', '2013-12-17 12:50:16', '', 155, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_083.png', 0, 'attachment', 'image/png', 0),
(627, 1, '2013-12-17 12:50:19', '2013-12-17 12:50:19', '', 'Selecció_084', '', 'inherit', 'open', 'open', '', 'seleccio_084', '', '', '2013-12-17 12:50:19', '2013-12-17 12:50:19', '', 155, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_084.png', 0, 'attachment', 'image/png', 0),
(629, 1, '2013-12-17 12:54:43', '2013-12-17 12:54:43', '', 'Selecció_086', '', 'inherit', 'open', 'open', '', 'seleccio_086', '', '', '2013-12-17 12:54:43', '2013-12-17 12:54:43', '', 155, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_086.png', 0, 'attachment', 'image/png', 0),
(656, 1, '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 'formador', '', 'inherit', 'open', 'open', '', 'formador', '', '', '2015-11-27 15:24:57', '2015-11-27 14:24:57', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/formador.png', 0, 'attachment', 'image/png', 0),
(659, 1, '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 'calendari', '', 'inherit', 'open', 'open', '', 'calendari', '', '', '2015-11-27 18:16:10', '2015-11-27 17:16:10', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/calendari.jpg', 0, 'attachment', 'image/jpeg', 0),
(672, 1, '2013-12-17 19:26:32', '2013-12-17 19:26:32', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/capcdalogogen.png', 'capcdalogogen.png', '', 'inherit', 'closed', 'open', '', 'capcdalogogen-png', '', '', '2013-12-17 19:26:32', '2013-12-17 19:26:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/capcdalogogen.png', 0, 'attachment', 'image/png', 0),
(673, 1, '2013-12-17 19:50:51', '2013-12-17 19:50:51', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/cdaheader.png', 'cdaheader.png', '', 'inherit', 'closed', 'open', '', 'cdaheader-png', '', '', '2013-12-17 19:50:51', '2013-12-17 19:50:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/cdaheader.png', 0, 'attachment', 'image/png', 0),
(674, 1, '2013-12-17 20:53:44', '2013-12-17 20:53:44', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logoraw.png', 'logoraw.png', '', 'inherit', 'closed', 'open', '', 'logoraw-png', '', '', '2013-12-17 20:53:44', '2013-12-17 20:53:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logoraw.png', 0, 'attachment', 'image/png', 0),
(675, 1, '2013-12-17 21:05:02', '2013-12-17 21:05:02', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logobn.png', 'logobn.png', '', 'inherit', 'closed', 'open', '', 'logobn-png', '', '', '2013-12-17 21:05:02', '2013-12-17 21:05:02', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logobn.png', 0, 'attachment', 'image/png', 0),
(676, 1, '2013-12-17 21:08:11', '2013-12-17 21:08:11', '', 'ensenyament_bn_h2', '', 'inherit', 'open', 'open', '', 'ensenyament_bn_h2', '', '', '2013-12-17 21:08:11', '2013-12-17 21:08:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/ensenyament_bn_h2.jpg', 0, 'attachment', 'image/jpeg', 0),
(677, 1, '2013-12-17 21:20:07', '2013-12-17 21:20:07', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logopetit.png', 'logopetit.png', '', 'inherit', 'closed', 'open', '', 'logopetit-png', '', '', '2013-12-17 21:20:07', '2013-12-17 21:20:07', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logopetit.png', 0, 'attachment', 'image/png', 0),
(678, 1, '2013-12-17 21:44:13', '2013-12-17 21:44:13', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/camp_aprenentatge_ok.png', 'camp_aprenentatge_ok.png', '', 'inherit', 'closed', 'open', '', 'camp_aprenentatge_ok-png', '', '', '2013-12-17 21:44:13', '2013-12-17 21:44:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/camp_aprenentatge_ok.png', 0, 'attachment', 'image/png', 0),
(679, 1, '2013-12-17 22:08:33', '2013-12-17 22:08:33', '', 'logogenbn', '', 'inherit', 'open', 'open', '', 'logogenbn', '', '', '2013-12-17 22:08:33', '2013-12-17 22:08:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logogenbn.jpg', 0, 'attachment', 'image/jpeg', 0),
(680, 1, '2013-12-17 22:12:24', '2013-12-17 22:12:24', '', 'logotira', '', 'inherit', 'open', 'open', '', 'logotira', '', '', '2013-12-17 22:12:24', '2013-12-17 22:12:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logotira.jpg', 0, 'attachment', 'image/jpeg', 0),
(681, 1, '2013-12-17 22:36:54', '2013-12-17 22:36:54', '', 'logotira2', '', 'inherit', 'open', 'open', '', 'logotira2', '', '', '2013-12-17 22:36:54', '2013-12-17 22:36:54', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logotira2.jpg', 0, 'attachment', 'image/jpeg', 0),
(682, 1, '2013-12-17 22:43:32', '2013-12-17 22:43:32', '', 'logobnpetit', '', 'inherit', 'open', 'open', '', 'logobnpetit', '', '', '2013-12-17 22:43:32', '2013-12-17 22:43:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logobnpetit.jpg', 0, 'attachment', 'image/jpeg', 0),
(683, 1, '2013-12-17 22:43:56', '2013-12-17 22:43:56', '', 'logobnpetit', '', 'inherit', 'open', 'open', '', 'logobnpetit-2', '', '', '2013-12-17 22:43:56', '2013-12-17 22:43:56', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/logobnpetit1.jpg', 0, 'attachment', 'image/jpeg', 0),
(684, 1, '2015-11-27 20:38:18', '2015-11-27 19:38:18', 'Informació sobre documentació, tràmits i avaluació de les activitats del pla de zona\r\nAssessoraments – Cursos – Seminaris – Tallers', 'Informació sobre documentació, tràmits i avaluació de les activitats', '', 'publish', 'open', 'open', '', 'informacio-sobre-documentacio-tramits-i-avaluacio-de-les-activitats', '', '', '2015-12-02 14:11:28', '2015-12-02 13:11:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(687, 1, '2015-11-27 20:52:29', '2015-11-27 19:52:29', 'Informació sobre tràmits i avaluació de grups de treball i seminaris de coordinació', 'Informació sobre tràmits i avaluació de grups de treball i seminaris de coordinació', '', 'publish', 'open', 'open', '', 'informacio-sobre-tramits-i-avaluacio-de-grups-de-treball-i-seminaris-de-coordinacio', '', '', '2015-12-02 14:06:51', '2015-12-02 13:06:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(689, 1, '2015-11-27 21:00:22', '2015-11-27 20:00:22', '<a href="https://docs.google.com/presentation/d/1-NfAcPhrZwRCyggaWeBlCPdOfOjqalpOlw9uoHk-g40/edit?usp=sharing">Enllaç a la presentació (Google drive)</a>', 'Criteris, instruccions i orientacions 2015-16', '', 'publish', 'open', 'open', '', 'criteris-instruccions-i-orientacions-2015-16', '', '', '2015-11-27 21:00:22', '2015-11-27 20:00:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(693, 1, '2015-11-27 21:02:28', '2015-11-27 20:02:28', '', 'Guia d’ús del GTAF', '', 'publish', 'open', 'open', '', 'guia-dus-del-gtaf', '', '', '2015-12-02 11:58:32', '2015-12-02 10:58:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(697, 1, '2015-11-27 21:08:18', '2015-11-27 20:08:18', 'Diferent al que se obté (diferent de l’acta d’assistència que s’obté a GTAF)', 'Acta de tancament de l’activitat', '', 'publish', 'open', 'open', '', 'acta-de-tancament-de-lactivitat', '', '', '2015-12-02 14:05:04', '2015-12-02 13:05:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(698, 1, '2014-01-02 20:59:58', '2014-01-02 20:59:58', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/01/capçalera.png', 'capçalera.png', '', 'inherit', 'closed', 'open', '', 'capcalera-png', '', '', '2014-01-02 20:59:58', '2014-01-02 20:59:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2014/01/capçalera.png', 0, 'attachment', 'image/png', 0),
(699, 1, '2014-01-08 08:46:19', '2014-01-08 08:46:19', '', 'març2010 031', '', 'inherit', 'open', 'open', '', 'marc2010-031', '', '', '2014-01-08 08:46:19', '2014-01-08 08:46:19', '', 249, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/març2010-031.jpg', 0, 'attachment', 'image/jpeg', 0),
(701, 1, '2015-11-27 21:34:16', '2015-11-27 20:34:16', '', 'Fitxa de dades del formador/a', '', 'publish', 'open', 'open', '', 'fitxa-de-dades-del-formadora', '', '', '2015-12-02 13:57:49', '2015-12-02 12:57:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(704, 1, '2015-11-27 21:43:09', '2015-11-27 20:43:09', '<ul>\r\n	<li>Qüestionari de valoració de cursos, tallers i seminaris, per part dels assistents</li>\r\n	<li>Full de valoració de grups de treball (per omplir conjuntament entre tots els participants)</li>\r\n	<li>Full de valoració de seminaris de coordinació (per omplir conjuntament entre tots els participants)</li>\r\n	<li>Full de valoració d’assessoraments (per part del centre)</li>\r\n	<li>Full de valoració del taller a centre</li>\r\n	<li>Valoració de l’activitat per part del formador/a.</li>\r\n</ul>\r\n<span style="color: #008000;"><strong>NOTA:</strong> alguns d''aquests qüestionaris es poden substituir per formularis a Google Forms.</span>', 'Qüestionaris de valoració', '', 'publish', 'open', 'open', '', 'questionaris-de-valoracio', '', '', '2015-12-02 14:03:27', '2015-12-02 13:03:27', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(732, 1, '2015-11-28 03:00:10', '2015-11-28 02:00:10', '&nbsp;\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td rowspan="2" width="203"><strong>CENTRE DOCENT</strong></td>\r\n<td colspan="2" width="378"><strong>EAP</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="227"><strong>Psicopedagog/a</strong></td>\r\n<td width="151"><strong>Treballador/a social</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Alpha</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Gamma</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Epsilon</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Alpha</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Beta</td>\r\n<td width="227">Beatriz Alejandre</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Gamma</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Epsilon</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Omega</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Gamma</td>\r\n<td width="227">Andreu Ora</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Beta</td>\r\n<td width="227">Montserrat Farulla</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Alpha</td>\r\n<td width="227">Blanca Bages</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">ESC Omega</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Epsilon</td>\r\n<td width="227">Miquel Torico</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">INS Gamma</td>\r\n<td width="227">Blanca Baiges</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Beta</td>\r\n<td width="227">Marta Pascual</td>\r\n<td width="151">Sandra Soria</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Alpha</td>\r\n<td width="227">Beatriz Aleja</td>\r\n<td width="151">Neus Martín</td>\r\n</tr>\r\n<tr>\r\n<td width="203">Escola Epsilon</td>\r\n<td width="227">Beatriz Aleja</td>\r\n<td width="151">Caridad Vilar</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'EAP – Professionals adscrits', '', 'publish', 'open', 'open', '', 'eap-professionals-adscrits', '', '', '2015-12-01 12:13:28', '2015-12-01 11:13:28', '', 739, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(736, 1, '2015-11-28 03:11:19', '2015-11-28 02:11:19', '<table border="0" width="409" cellspacing="0" cellpadding="2">\r\n<tbody>\r\n<tr>\r\n<td style="padding-left: 30px;">Carme Ferrer (directora)</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n<tr>\r\n<td style="padding-left: 30px;">Pere Serrat</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n<tr>\r\n<td style="padding-left: 30px;">Joana Vera</td>\r\n<td><a href="http://xxxxxxxx@xtec.cat">xxxxxxxx@xtec.cat</a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'CRP – Professionals adscrits', '', 'publish', 'open', 'open', '', 'crp-professionals-adscrits', '', '', '2015-12-01 12:14:09', '2015-12-01 11:14:09', '', 739, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(739, 1, '2015-11-28 10:44:37', '2015-11-28 09:44:37', '<table border="1" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><strong>Centre</strong></td>\r\n<td><strong>Professionals</strong></td>\r\n</tr>\r\n<tr>\r\n<td>ZER EL Solsonès</td>\r\n<td>Marta Gese (CRP), Sandra Ramiro (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Vall de Lord</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP), Toni Cas (LIC), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>SI Sant Llorenç</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Setelsis</td>\r\n<td>Maite Gese (CRP), Yolanda Marina (EAP), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Arrels I</td>\r\n<td>Maite Gese (CRP), Montse Ram (CREDA), Elisabet Riu (EAP)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola El Vinyet</td>\r\n<td>Maite Gese (CRP), Yolanda Marina (EAP), Montse Ram (CREDA)</td>\r\n</tr>\r\n<tr>\r\n<td>Institut Francesc Ribalta</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP), Toni Cas (LIC)</td>\r\n</tr>\r\n<tr>\r\n<td>Escola Arrels II</td>\r\n<td>Joan Coromines (CRP), Elisabet Riu (EAP)</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Distribució de professionals per centres', '', 'publish', 'open', 'open', '', 'distribucio-de-professionals-per-centres', '', '', '2015-12-01 12:16:09', '2015-12-01 11:16:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(746, 1, '2014-01-09 10:42:54', '2014-01-09 10:42:54', '', 'IMG_5811', '', 'inherit', 'open', 'open', '', 'img_5811', '', '', '2014-01-09 10:42:54', '2014-01-09 10:42:54', '', 249, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/IMG_5811.jpg', 0, 'attachment', 'image/jpeg', 0),
(765, 1, '2015-11-28 12:07:44', '2015-11-28 11:07:44', '<strong>L''equip de direcció tècnica del Servei Educatiu del XXXXXX</strong>\r\n\r\nL’equip de direcció tècnica és una comissió de coordinació interna formada per:\r\n<ul>\r\n	<li>Joan de la Munoza, Director del CRP</li>\r\n	<li>Elisabet Bonet, Directora de l’EAP</li>\r\n	<li>Antoni Casals, representant de l’ELIC</li>\r\n	<li>Montserrat Palau, logopeda del CREDA</li>\r\n</ul>\r\nSón funcions de l’equip de direcció tècnica:\r\n<ul>\r\n	<li>Establir els objectius, identificar les necessitats, els criteris per a l’actuació interna i els indicadors d’avaluació del propi servei.</li>\r\n	<li><span style="line-height: 1.5;">Identificar les necessitats dels centres educatius (professorat, alumnat i famílies) i de la zona.</span></li>\r\n	<li><span style="line-height: 1.5;">Coordinar la integració de les actuacions dels professionals dels serveis educatius vetllant per l’eficàcia de la intervenció en els centres.</span></li>\r\n	<li><span style="line-height: 1.5;">Elaborar la proposta de pla d’actuació, indicadors d’avaluació i memòria, a partir dels objectius i actuacions prioritàries.</span></li>\r\n	<li><span style="line-height: 1.5;">Fer el seguiment del desenvolupament de les activitats.</span></li>\r\n	<li><span style="line-height: 1.5;">Elaborar el pressupost i la liquidació corresponent.</span></li>\r\n</ul>\r\nL’equip de direcció tècnica es reunirà un cop al mes.\r\n\r\n<strong>La coordinació del Servei Educatiu del XXXXXXX</strong>\r\n\r\nAnirà a càrrec del director del CRP.\r\n\r\nSón funcions del coordinador:\r\n<ul>\r\n	<li>Representar els serveis educatius de zona.</li>\r\n	<li><span style="line-height: 1.5;">Fer el seguiment dels acords presos en l’equip de direcció tècnica.</span></li>\r\n	<li><span style="line-height: 1.5;">D’acord amb les direccions respectives, establir les línies generals de coordinació i actuació entre els serveis educatius de zona i els serveis educatius específics i CdA de la zona .</span></li>\r\n	<li><span style="line-height: 1.5;">Coordinar els diferents àmbits d’organització interna.</span></li>\r\n	<li><span style="line-height: 1.5;">Presentar als serveis territorials el pla d’actuació i la memòria anual.</span></li>\r\n	<li><span style="line-height: 1.5;">Presentar als serveis territorials el pressupost anual i la liquidació corresponent.</span></li>\r\n	<li><span style="line-height: 1.5;">Convocar i presidir l’equip de direcció tècnica i la reunió plenària.</span></li>\r\n</ul>\r\n<strong> Reunió plenària del Servei Educatiu del XXXXXXX</strong>\r\n\r\nÉs l''espai de consulta i participació de tots els professionals dels serveis educatius, integrat per la totalitat dels professionals que hi presten serveis i presidit pel coordinador del Servei educatiu de zona.\r\n\r\nLes seves funcions són:\r\n<ul>\r\n	<li>Participar en l’elaboració del pla d’actuació i de la memòria.</li>\r\n	<li><span style="line-height: 1.5;">Informar i aportar propostes a l’equip de direcció tècnica sobre l’organització dels recursos humans i materials i la programació general.</span></li>\r\n	<li><span style="line-height: 1.5;">Promoure iniciatives en l’àmbit de la innovació i de la formació dels serveis educatius i de la zona.</span></li>\r\n	<li><span style="line-height: 1.5;">Es reunirà, com a mínim, una vegada per trimestre amb caràcter ordinari i sempre que el convoqui el coordinador/a o ho sol·liciti un terç, com a mínim, dels seus membres. És preceptiu celebrar una reunió a principi i a final de curs escolar. L’assistència a la reunió plenària és obligatòria per a tots els seus membres.</span></li>\r\n	<li><span style="line-height: 1.5;">Quan es tractin temes vinculats a les seves funcions, els professionals dels serveis educatius específics i dels camps d’aprenentatge que presten atenció a la zona podran participar a les reunions plenàries.</span></li>\r\n</ul>\r\n<strong>Equips de treball del Servei Educatiu del Solsonès</strong>\r\n\r\nS''han creat quatre grups de treball en funció dels centres. Els grups estan ingrats pels professionals que atenen un centre en concret:\r\n<ul>\r\n	<li>Equip dels centres de primària de XXXXXX</li>\r\n	<li><span style="line-height: 1.5;">Equip de la ZER del XXXXXX</span></li>\r\n	<li><span style="line-height: 1.5;">Equip de Sant Llorenç XXXXXX</span></li>\r\n	<li><span style="line-height: 1.5;">Equip dels centres de secundària de XXXXXX</span></li>\r\n</ul>\r\nLes tasques d''aquests equips són:\r\n<ul>\r\n	<li>Intercanviar informació entre els diferents professionals que intervenen en un centre.</li>\r\n	<li><span style="line-height: 1.5;">Detectar necessitats i mancances.</span></li>\r\n	<li><span style="line-height: 1.5;">Planificar i compartir actuacions conjuntes entre els diferents professioanls que actuen un un mateix centre.</span></li>\r\n</ul>', 'Organització interna del Servei Educatiu', '', 'publish', 'open', 'open', '', 'organitzacio-interna-del-servei-educatiu', '', '', '2015-12-02 11:57:40', '2015-12-02 10:57:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(768, 1, '2015-11-28 12:16:14', '2015-11-28 11:16:14', 'Node d&#039;organització interna', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu', '', '', '2015-11-28 12:16:14', '2015-11-28 11:16:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/servei-educatiu/', 0, 'forum', '', 0),
(769, 1, '2015-11-28 12:58:59', '2015-11-28 11:58:59', '<strong>Professionals de l''ELIC</strong>\r\n<ul>\r\n	<li>Rosa Bonet (referent equip ELIC)</li>\r\n	<li><span style="line-height: 1.5;">Anna Valls</span><span style="line-height: 1.5;"> (Pla educatiu d''entorn. XXXXXXX)</span></li>\r\n	<li>Carles Simarro (Pla educatiu d''entorn. XXXXXXXXX)</li>\r\n</ul>', 'ELIC – Professionals adscrits', '', 'publish', 'open', 'open', '', 'elic-professionals-adscrits', '', '', '2015-12-01 12:13:53', '2015-12-01 11:13:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(879, 1, '2015-11-29 13:12:08', '2015-11-29 12:12:08', '<p>Fitxa per demanar una maleta pedagògica o un aparell</p>\r\n', 'Fitxa de petició de recursos', '', 'publish', 'open', 'open', '', 'fitxa-de-peticio-de-recursos', '', '', '2015-12-02 14:24:00', '2015-12-02 13:24:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(888, 1, '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon', '', '', '2015-11-29 14:43:34', '2015-11-29 13:43:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/11/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(944, 1, '2015-11-29 20:20:56', '2015-11-29 19:20:56', 'Programa Fòrum de Treballs de recerca i crèdits de síntesi', 'Programa Fòrum de Treballs de recerca 2015', '', 'publish', 'open', 'open', '', 'programa-forum-de-treballs-de-recerca', '', '', '2015-12-02 14:26:25', '2015-12-02 13:26:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(952, 1, '2015-11-29 20:41:28', '2015-11-29 19:41:28', '<strong>BASES PER A LA PARTICIPACIÓ:</strong>\n<ol>\n	<li>Hi pot participar l’alumnat de segon curs de batxillerat i de segon dels cicles formatius de grau superior d’FP de les àrees Científico-Tècniques que hagi estat seleccionat prèviament als diferents centres de la zona. El criteri de selecció el fixarà cada centre.</li>\n	<li><span style="line-height: 1.5;">Els treballs presentats poden ser individuals o col·lectius, de creació pròpia.</span></li>\n	<li><span style="line-height: 1.5;">Cada centre docent pot presentar un màxim de 6 treballs per cada modalitat de batxillerat o cicle formatiu i fins a un màxim de 8 per centre.</span></li>\n	<li><span style="line-height: 1.5;">Els resums dels treballs s''han de presentar en format digital seguint aquestes pautes:</span></li>\n	<li><span style="line-height: 1.5;">Resum que contingui com a mínim les següents parts: introducció, desenvolupament del tema i conclusions de la recerca (disposeu de document tipus a la web).</span></li>\n	<li><span style="line-height: 1.5;">S''han d''adjuntar els documents i materials necessaris per a la seva exposició. Per tal d''unificar format de cara a la publicació, es recomana seguir aquests models.</span></li>\n	<li><span style="line-height: 1.5;">Els abstracts (resums) dels treballs s’hauran de lliurar al CRP del Tarragonès, abans del 8 de març de 2015, preferentment per correu electrònic a l’adreça: xgranell@xtec.cat en format digital.</span></li>\n	<li><span style="line-height: 1.5;">L’acte de celebració del IX Fòrum tindrà lloc el divendres 17 d’abril de 2015.</span></li>\n	<li><span style="line-height: 1.5;">L’organització confeccionarà una llista amb l’ordre en el que s''hauran d’exposar els treballs.</span></li>\n	<li><span style="line-height: 1.5;">L’organització es reserva el dret de difondre el resum dels treballs, total o parcialment, a través de qualsevol suport o mitjà.</span></li>\n	<li><span style="line-height: 1.5;">L’organització, en funció dels espais de que es disposin per fer l’activitat, fixarà per a cada centre el nombre d’alumnes de primer curs que podran assistir. En tot cas, es procurarà, si la capacitat dels espais on es realitzi el fòrum ho permet, que hi puguin assistir el màxim nombre d’alumnes.</span></li>\n	<li><span style="line-height: 1.5;">El fet de participar en aquest Fòrum pressuposa l’acceptació de les bases. Qualsevol circumstància no prevista serà resolta per l’organització. </span></li>\n</ol>', 'Bases fòrum treballs de recerca 2015', '', 'publish', 'open', 'open', '', 'bases-forum-treballs-de-recerca-2015', '', '', '2015-11-29 20:41:28', '2015-11-29 19:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(956, 1, '2015-11-29 20:53:57', '2015-11-29 19:53:57', '<p>Cal lliurar els abstracts abans del <strong>8 de març</strong> de 2015</p>\r\n', 'Model resum de treball de recerca 2015', '', 'publish', 'open', 'open', '', 'model-resum-de-treball-de-recerca-2015', '', '', '2015-12-02 14:22:12', '2015-12-02 13:22:12', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(982, 1, '2015-11-29 23:06:40', '2015-11-29 22:06:40', '1. S’estableixen 7 categories segons el nivell educatiu, quatre per a l’educació primària i tres per a l’educació secundària obligatòria.\n<ul>\n	<li><b>A. Alumnat de cicle inicial d’educació primària</b></li>\n	<li><b>B. Alumnat de cicle mitjà d’educació primària</b></li>\n	<li><b>C. Alumnat dl cicle superior d’educació primària</b></li>\n	<li><b>D. Alumnat d’educació especial d’educació primària</b></li>\n	<li><b>E. Alumnat de 1r i 2n d’educació secundària obligatòria</b></li>\n	<li><b>F. Alumnat de 3r i 4t d’educació secundària obligatòria</b></li>\n	<li><b>G. Alumnat d’educació especial d’educació secundària obligatòria </b></li>\n</ul>\n2. La participació al certamen és voluntària.\n\n3. Els treballs presentats, un per categoria, poden ser individuals o col·lectius (màxim 6 alumnes) i sempre de creació pròpia.\n\n4. Els treballs han de ser escrits en llengua catalana o en aranès.\n\n5. La modalitat pot ser poesia o prosa. El tema és lliure.\n\n6. Característiques de la presentació:\n<ul>\n	<li>El text s’ha de presentar en DIN A4, escrit per una sola cara i a doble espai.</li>\n	<li>L’extensió no pot ser superior a 3 fulls, amb un màxim de 25 línies per full.</li>\n</ul>\n<ul>\n	<li>El cos de la lletra ha de ser arial 12.\n<ul>\n	<li>Hi ha de constar el títol de l’obra, i a baix a la dreta la categoria i el pseudònim.</li>\n	<li>És imprescindible que els treballs arribin corregits quant a l’ortografia, la sintaxi i el vocabulari.</li>\n</ul>\n</li>\n</ul>\n7. El jurat seleccionarà un text per a cadascuna de les 7 categories.\n\n8. Els treballs guardonats es penjaran al web de la XTEC <a href="http://www.xtec.cat/web/centres/alscentres/premis/jocsflorals" rel="nofollow">http://www.xtec.cat/web/centres/alscentres/premis/jocsflorals</a>\n\n9. Per poder participar en el certamen, els centres s’han d’adreçar al Servei Educatiu de Zona (CRP) i lliurar els treballs en el termini establert, en format digital i per correu electrònic.', 'Bases Jocs florals 2015', '', 'publish', 'open', 'open', '', 'bases-jocs-florals-2015', '', '', '2015-11-29 23:06:40', '2015-11-29 22:06:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/docs/', 0, 'bp_doc', '', 0),
(1038, 1, '2014-10-07 05:44:15', '2014-10-07 05:44:15', '<strong>[title]</strong>\r\n[when]\r\n[location]\r\n<div>[description]</div>\r\n[link newwindow="yes"]Més detalls...[/link]', 'Calendari d''exemple', '', 'publish', 'closed', 'closed', '', 'se', '', '', '2016-09-21 10:34:22', '2016-09-21 08:34:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/gce_feed/institut-larany', 0, 'calendar', '', 0),
(1046, 1, '2015-11-30 09:50:49', '2015-11-30 08:50:49', '', 'Modalitats', '', 'publish', 'open', 'closed', '', 'recursos-2', '', '', '2016-06-15 15:07:58', '2016-06-15 14:07:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/recursos-2/', 17, 'nav_menu_item', '', 0),
(1047, 1, '2015-11-30 09:50:49', '2015-11-30 08:50:49', '', 'Visites', '', 'publish', 'open', 'closed', '', 'dinamitzacio-2', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/dinamitzacio-2/', 26, 'nav_menu_item', '', 0),
(1055, 1, '2015-11-30 09:50:50', '2015-11-30 08:50:50', '', 'Intranet', '', 'publish', 'open', 'closed', '', 'intranet', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/intranet/', 41, 'nav_menu_item', '', 0),
(1060, 1, '2015-11-30 09:50:50', '2015-11-30 08:50:50', '', 'Catàleg Merlí', '', 'publish', 'open', 'closed', '', 'merli', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/merli/', 22, 'nav_menu_item', '', 0),
(1061, 1, '2015-11-30 09:50:51', '2015-11-30 08:50:51', '', 'Banc de recursos (BDR)', '', 'publish', 'open', 'closed', '', 'banc-de-recursos-bdr', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/banc-de-recursos-bdr/', 23, 'nav_menu_item', '', 0),
(1068, 1, '2015-11-30 09:50:51', '2015-11-30 08:50:51', '', 'Comunitat', '', 'publish', 'open', 'closed', '', 'comunitat-2', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/comunitat-2/', 35, 'nav_menu_item', '', 0),
(1069, 1, '2015-11-30 09:50:51', '2015-11-30 08:50:51', '', 'Família i escola', '', 'publish', 'open', 'closed', '', 'familia-i-escola', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/familia-i-escola/', 40, 'nav_menu_item', '', 0),
(1077, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1077', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/1077/', 3, 'nav_menu_item', '', 0),
(1078, 1, '2015-11-30 09:50:58', '2015-11-30 08:50:58', ' ', '', '', 'publish', 'open', 'open', '', '1078', '', '', '2015-11-30 10:32:51', '2015-11-30 09:32:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/1078/', 2, 'nav_menu_item', '', 0),
(1120, 1, '2015-11-30 13:18:34', '2015-11-30 12:18:34', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors', '', '', '2015-11-30 13:18:34', '2015-11-30 12:18:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/formadors/', 0, 'forum', '', 0),
(1146, 1, '2015-11-30 17:22:08', '2015-11-30 16:22:08', '', 'Recursos en línia', '', 'publish', 'open', 'closed', '', 'recursos-en-linia', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=1146', 24, 'nav_menu_item', '', 0),
(1147, 1, '2015-11-30 17:49:23', '2015-11-30 16:49:23', 'Node de coordinació dels seminaris TAC', 'TAC', '', 'publish', 'closed', 'open', '', 'tac', '', '', '2015-11-30 17:49:23', '2015-11-30 16:49:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/tac/', 0, 'forum', '', 0),
(1156, 1, '2015-11-30 18:04:03', '2015-11-30 17:04:03', 'Algun centre està fent servir Chromebooks? Què recomaneu? ', 'Chromebooks vs Notebooks', '', 'spam', 'closed', 'open', '', 'chromebooks-vs-notebooks', '', '', '2016-03-17 13:58:39', '2016-03-17 12:58:39', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/topic/chromebooks-vs-notebooks/', 0, 'topic', '', 0),
(1157, 1, '2015-11-30 18:05:19', '2015-11-30 17:05:19', 'Quin model de portàtil recomaneu? Tenim un presupost de 200 € màxim per alumne.', 'Model de portatil (ESO)', '', 'spam', 'closed', 'open', '', 'model-de-portatil-eso', '', '', '2016-03-17 13:58:29', '2016-03-17 12:58:29', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/topic/model-de-portatil-eso/', 0, 'topic', '', 0),
(1160, 1, '2015-11-30 18:16:41', '2015-11-30 17:16:41', 'En què consisteix exactament? Marc, em vas dir que vosaltres estaveu molt contents... pots explicar-nos una mica com funciona? És gratuït?', 'Google Apps per educació', '', 'publish', 'closed', 'open', '', 'google-apps-per-educacio', '', '', '2015-11-30 18:16:41', '2015-11-30 17:16:41', '', 1147, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/topic/google-apps-per-educacio/', 0, 'topic', '', 0),
(1161, 1, '2015-11-30 18:23:49', '2015-11-30 17:23:49', 'Especialistes d&#039;educació física: coordinació jornades esportives, jocs tradicionals (intercentres)', 'Educació física', '', 'publish', 'closed', 'open', '', 'educacio-fisica', '', '', '2015-11-30 18:23:49', '2015-11-30 17:23:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/educacio-fisica/', 0, 'forum', '', 0),
(1162, 1, '2015-11-30 18:26:44', '2015-11-30 17:26:44', 'Especialistes llengua anglesa: coordinació English Day (intercentres)', 'English', '', 'publish', 'closed', 'open', '', 'english', '', '', '2015-11-30 18:26:44', '2015-11-30 17:26:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/english/', 0, 'forum', '', 0),
(1163, 1, '2015-11-30 18:28:51', '2015-11-30 17:28:51', 'Especialistes matemàtiques: coordinació Olimpíades, fires, jornades matemàtiques (intercentres)', 'Matemàtiques', '', 'publish', 'closed', 'open', '', 'matematiques', '', '', '2015-11-30 18:28:51', '2015-11-30 17:28:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/matematiques/', 0, 'forum', '', 0),
(1164, 1, '2015-11-30 18:32:30', '2015-11-30 17:32:30', 'Especialistes música: jornades de danses, cantates... (intercentres)', 'Música', '', 'publish', 'closed', 'open', '', 'musica', '', '', '2015-11-30 18:32:30', '2015-11-30 17:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/musica/', 0, 'forum', '', 0),
(1165, 1, '2015-11-30 18:34:03', '2015-11-30 17:34:03', 'Node intercentres de Caps d&#039;estudis', 'Caps d&#039;estudi', '', 'private', 'closed', 'open', '', 'caps-destudi', '', '', '2015-11-30 18:34:03', '2015-11-30 17:34:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/caps-destudi/', 0, 'forum', '', 0),
(1166, 1, '2015-11-30 18:38:06', '2015-11-30 17:38:06', 'Node intercentres de Directors de centre', 'Directors', '', 'publish', 'closed', 'open', '', 'directors', '', '', '2015-11-30 18:38:06', '2015-11-30 17:38:06', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/directors/', 0, 'forum', '', 0),
(1167, 1, '2015-11-30 18:40:55', '2015-11-30 17:40:55', 'Elaboració de materials, traspàs d&#039;informació...', 'Primària-secundària', '', 'private', 'closed', 'open', '', 'primaria-secundaria', '', '', '2015-11-30 18:40:55', '2015-11-30 17:40:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/primaria-secundaria/', 0, 'forum', '', 0),
(1168, 1, '2015-11-30 18:49:49', '2015-11-30 17:49:49', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes col·laboratius', '', 'publish', 'closed', 'open', '', 'contes-col%c2%b7laboratius', '', '', '2015-11-30 18:49:49', '2015-11-30 17:49:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/contes-col%c2%b7laboratius/', 0, 'forum', '', 0),
(1169, 1, '2015-11-30 18:55:35', '2015-11-30 17:55:35', 'Contes que roden, Contes col·lectius, Contes encetats contes contats, Intercontes...', 'Contes intercentres', '', 'publish', 'closed', 'open', '', 'contes-intercentres', '', '', '2015-11-30 18:55:35', '2015-11-30 17:55:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/contes-intercentres/', 0, 'forum', '', 0),
(1170, 1, '2015-11-30 19:06:26', '2015-11-30 18:06:26', 'Necessites un domini propi però, a part d''això, no té cap cost pel centre', '', '', 'publish', 'closed', 'open', '', '1170', '', '', '2015-11-30 19:06:26', '2015-11-30 18:06:26', '', 1160, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/reply/1170/', 1, 'reply', '', 0),
(1224, 1, '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 'favicon', '', 'inherit', 'open', 'open', '', 'favicon-2', '', '', '2015-12-01 11:19:03', '2015-12-01 10:19:03', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/12/favicon.ico', 0, 'attachment', 'image/x-icon', 0),
(1237, 1, '2015-12-01 17:27:49', '2015-12-01 16:27:49', '', 'fulles_p', '', 'inherit', 'open', 'open', '', 'fulles_p', '', '', '2015-12-01 17:27:49', '2015-12-01 16:27:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2015/12/fulles_p.jpg', 0, 'attachment', 'image/jpeg', 0),
(1242, 1, '2015-12-01 18:06:25', '2015-12-01 17:06:25', 'Node per la coordinació dels serveis educatius', 'Servei educatiu', '', 'private', 'closed', 'open', '', 'servei-educatiu-2', '', '', '2015-12-01 18:06:25', '2015-12-01 17:06:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/servei-educatiu-2/', 0, 'forum', '', 0),
(1255, 1, '2015-12-02 11:54:55', '2015-12-02 10:54:55', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-2', '', '', '2015-12-02 11:54:55', '2015-12-02 10:54:55', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/formadors-2/', 0, 'forum', '', 0),
(1256, 1, '2015-12-02 11:56:45', '2015-12-02 10:56:45', 'Node de comunicació entre formadors i el servei educatiu', 'Formadors', '', 'private', 'closed', 'open', '', 'formadors-3', '', '', '2015-12-02 11:56:45', '2015-12-02 10:56:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/formadors-3/', 0, 'forum', '', 0),
(1307, 1, '2015-12-02 16:08:32', '2015-12-02 15:08:32', '', 'Documents', '', 'publish', 'open', 'closed', '', 'documents', '', '', '2016-06-15 15:07:59', '2016-06-15 14:07:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=1307', 25, 'nav_menu_item', '', 0),
(8066, 1, '2016-03-15 18:09:35', '2016-03-15 17:09:35', '', '1apsc932015', '', 'inherit', 'open', 'open', '', '1apsc932015', '', '', '2016-03-15 18:09:35', '2016-03-15 17:09:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/03/1apsc932015.jpg', 0, 'attachment', 'image/jpeg', 0),
(8089, 1, '2016-03-16 10:24:39', '2016-03-16 09:24:39', '', 'Materials a Ateneu', '', 'publish', 'open', 'open', '', 'materials-fic-a-ateneu', '', '', '2016-03-16 10:26:11', '2016-03-16 09:26:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8089', 2, 'nav_menu_item', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8090, 1, '2016-03-16 10:24:39', '2016-03-16 09:24:39', '', 'Informació a XTEC', '', 'publish', 'open', 'open', '', 'informacio-fic-a-xtec', '', '', '2016-03-16 10:26:11', '2016-03-16 09:26:11', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8090', 1, 'nav_menu_item', '', 0),
(8091, 1, '2016-03-16 11:06:52', '2016-03-16 10:06:52', '', 'Informació a XTEC', '', 'publish', 'open', 'open', '', 'informacio-a-xtec', '', '', '2016-03-16 11:42:22', '2016-03-16 10:42:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8091', 1, 'nav_menu_item', '', 0),
(8093, 1, '2016-03-16 11:10:59', '2016-03-16 10:10:59', '', 'Informació a XTEC', '', 'publish', 'open', 'open', '', 'informacio-a-xtec-2', '', '', '2016-03-16 11:11:28', '2016-03-16 10:11:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8093', 9, 'nav_menu_item', '', 0),
(8094, 1, '2016-03-16 11:23:05', '2016-03-16 10:23:05', '', 'Informació a XTEC', '', 'publish', 'open', 'closed', '', 'informacio-a-xtec-3', '', '', '2016-06-15 15:07:58', '2016-06-15 14:07:58', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8094', 15, 'nav_menu_item', '', 0),
(8100, 1, '2016-03-16 17:28:46', '2016-03-16 16:28:46', 'En aquesta intranet trobareu grups (nodes) temàtics on compartir les vostres experiències, resoldre dubtes i fer xarxa amb altres docents de la vostra zona.\r\n\r\n<span class="dashicons dashicons-admin-network"></span><a href="activitat">Entra a la Intranet</a>\r\n\r\n&nbsp;', 'Intranet_', '', 'publish', 'closed', 'closed', '', 'intranet', '', '', '2016-03-17 13:50:42', '2016-03-17 12:50:42', '', 341, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8100', 50, 'page', '', 0),
(8111, 1, '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:36:51', '2016-03-29 11:36:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8111', 0, 'page', '', 0),
(8113, 1, '2016-03-29 12:37:06', '2016-03-29 11:37:06', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:51:15', '2016-03-29 11:51:15', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8113', 0, 'page', '', 0),
(8118, 1, '2016-06-15 11:40:25', '2016-06-15 10:40:25', '', 'altbergueda', '', 'inherit', 'open', 'closed', '', 'altbergueda', '', '', '2016-06-15 11:40:25', '2016-06-15 10:40:25', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/altbergueda.png', 0, 'attachment', 'image/png', 0),
(8119, 1, '2016-06-15 12:38:45', '2016-06-15 11:38:45', '', 'altbergueda', '', 'inherit', 'open', 'closed', '', 'altbergueda-2', '', '', '2016-06-15 12:38:45', '2016-06-15 11:38:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/altbergueda-1.png', 0, 'attachment', 'image/png', 0),
(8120, 1, '2016-06-15 12:40:24', '2016-06-15 11:40:24', '', 'altbergueda', '', 'inherit', 'open', 'closed', '', 'altbergueda-3', '', '', '2016-06-15 12:40:24', '2016-06-15 11:40:24', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/altbergueda-2.png', 0, 'attachment', 'image/png', 0),
(8177, 1, '2013-11-13 13:03:32', '2013-11-13 13:03:32', '', 'la sala tot', '', 'inherit', 'open', 'open', '', 'la-sala-tot', '', '', '2013-11-13 13:03:32', '2013-11-13 13:03:32', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/la-sala-tot.jpg', 0, 'attachment', 'image/jpeg', 0),
(8178, 1, '2013-11-13 13:06:51', '2013-11-13 13:06:51', '', 'la sala tot', '', 'inherit', 'open', 'open', '', 'la-sala-tot-2', '', '', '2013-11-13 13:06:51', '2013-11-13 13:06:51', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/la-sala-tot1.jpg', 0, 'attachment', 'image/jpeg', 0),
(8179, 1, '2013-11-13 13:08:23', '2013-11-13 13:08:23', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-la-sala-tot2.jpg', 'cropped-la-sala-tot2.jpg', '', 'inherit', 'closed', 'open', '', 'cropped-la-sala-tot2-jpg', '', '', '2013-11-13 13:08:23', '2013-11-13 13:08:23', '', 80, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-la-sala-tot2.jpg', 0, 'attachment', 'image/jpeg', 0),
(8180, 1, '2013-11-13 13:11:04', '2013-11-13 13:11:04', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-retallat_la-sala-tot.jpg', 'cropped-retallat_la-sala-tot.jpg', '', 'inherit', 'closed', 'open', '', 'cropped-retallat_la-sala-tot-jpg', '', '', '2013-11-13 13:11:04', '2013-11-13 13:11:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/cropped-retallat_la-sala-tot.jpg', 0, 'attachment', 'image/jpeg', 0),
(8181, 1, '2013-11-13 18:06:33', '2013-11-13 17:06:33', '', 'calendari', '', 'inherit', 'open', 'open', '', 'calendari-2', '', '', '2013-11-13 18:06:33', '2013-11-13 17:06:33', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/calendari.png', 0, 'attachment', 'image/png', 0),
(8182, 1, '2013-11-15 02:29:42', '2013-11-15 01:29:42', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda.png', 'capcda.png', '', 'inherit', 'closed', 'open', '', 'capcda-png', '', '', '2013-11-15 02:29:42', '2013-11-15 01:29:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capcda.png', 0, 'attachment', 'image/png', 0),
(8186, 1, '2013-12-10 10:22:20', '2013-12-10 10:22:20', '', 'Selecció_062', '', 'inherit', 'open', 'open', '', 'seleccio_062', '', '', '2013-12-10 10:22:20', '2013-12-10 10:22:20', '', 160, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_062.png', 0, 'attachment', 'image/png', 0),
(8187, 1, '2013-12-10 10:25:13', '2013-12-10 10:25:13', '', 'Selecció_063', '', 'inherit', 'open', 'open', '', 'seleccio_063', '', '', '2013-12-10 10:25:13', '2013-12-10 10:25:13', '', 160, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_063.png', 0, 'attachment', 'image/png', 0),
(8188, 1, '2013-12-12 10:51:53', '2013-12-12 10:51:53', 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/camp_aprenentatge.png', 'camp_aprenentatge.png', '', 'inherit', 'closed', 'open', '', 'camp_aprenentatge-png', '', '', '2013-12-12 10:51:53', '2013-12-12 10:51:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/12/camp_aprenentatge.png', 0, 'attachment', 'image/png', 0),
(8189, 1, '2013-12-17 12:50:22', '2013-12-17 12:50:22', '', 'Selecció_085', '', 'inherit', 'open', 'open', '', 'seleccio_085', '', '', '2013-12-17 12:50:22', '2013-12-17 12:50:22', '', 155, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_085.png', 0, 'attachment', 'image/png', 0),
(8190, 1, '2013-12-17 12:54:46', '2013-12-17 12:54:46', '', 'Selecció_087', '', 'inherit', 'open', 'open', '', 'seleccio_087', '', '', '2013-12-17 12:54:46', '2013-12-17 12:54:46', '', 155, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_087.png', 0, 'attachment', 'image/png', 0),
(8192, 1, '2016-06-20 17:17:40', '2016-06-20 16:17:40', '', 'Inici', '', 'publish', 'closed', 'closed', '', 'inici', '', '', '2016-06-20 17:17:40', '2016-06-20 16:17:40', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/inici/', 1, 'nav_menu_item', '', 0),
(8194, 1, '2016-06-20 17:17:42', '2016-06-20 16:17:42', '', 'Trobades de coordinació', '', 'publish', 'closed', 'closed', '', 'trobades-de-coordinacio', '', '', '2016-06-20 17:17:42', '2016-06-20 16:17:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/trobades-de-coordinacio/', 2, 'nav_menu_item', '', 0),
(8195, 1, '2016-06-20 17:17:42', '2016-06-20 16:17:42', ' ', '', '', 'publish', 'closed', 'closed', '', '8195', '', '', '2016-06-20 17:17:42', '2016-06-20 16:17:42', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/', 5, 'nav_menu_item', '', 0),
(8197, 1, '2013-11-15 13:39:26', '2013-11-15 12:39:26', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capc_riusalabr2.jpg" rel="attachment wp-att-8307"><img class="alignnone  wp-image-8307" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capc_riusalabr2.jpg" alt="capc_riusalabr2" width="725" height="162" /></a>\r\n\r\n<strong>Activitats relacionades:</strong>\r\n<ul>\r\n	<li><a title="les fonts del llobregat" href="https://pwc-int.educacio.intranet/agora/mastercda/ambits/totes-les-activitats/fongs-bolets/"><span style="line-height: 15px;">Les fonts del Llobregat</span></a></li>\r\n	<li>Anàlisi física i química aigua riu</li>\r\n	<li>Anàlisi física i química i biològica aigua riu</li>\r\n</ul>\r\n<strong>Recursos relacionats:</strong>\r\n<ul>\r\n	<li>Activitats interactives (Webquest, etc)</li>\r\n	<li>Dossiers</li>\r\n	<li>Enllaços a pàgines externes</li>\r\n</ul>\r\n<h1></h1>', 'El riu', '', 'publish', 'open', 'open', '', 'el-riu', '', '', '2016-06-21 11:03:53', '2016-06-21 10:03:53', '', 8235, 'http://blocs.xtec.cat/plantillacda/?page_id=171', 10, 'page', '', 0),
(8198, 1, '2013-11-15 13:40:37', '2013-11-15 12:40:37', '<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Tardor-5.jpg" rel="attachment wp-att-8312"><img class="alignnone size-full wp-image-8312" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Tardor-5.jpg" alt="Tardor-5" width="640" height="360" /></a>\r\n\r\n<strong>Activitats relacionades:</strong>\r\n<ul>\r\n	<li><a title="Fongs i bolets" href="http://ambits/totes-les-activitats/fongs-bolets/"><span style="line-height: 15px;">Fongs i bolets</span></a></li>\r\n	<li>Bosc i estudi ecosistema</li>\r\n	<li>etc</li>\r\n</ul>\r\n<strong>Recursos relacionats:</strong>\r\n<ul>\r\n	<li>Activitats interactives (Webquest, etc)</li>\r\n	<li>Dossiers</li>\r\n	<li>Enllaços a pàgines externes</li>\r\n</ul>\r\n&nbsp;', 'El bosc', '', 'publish', 'open', 'open', '', 'el-bosc', '', '', '2016-06-21 11:22:54', '2016-06-21 10:22:54', '', 8235, 'http://blocs.xtec.cat/plantillacda/?page_id=173', 20, 'page', '', 0),
(8199, 1, '2013-11-15 13:43:59', '2013-11-15 12:43:59', '<iframe src="https://docs.google.com/spreadsheet/pub?key=0AlWhk6C-0QRadEhkQjFPU0hTSG1fYTV3TkxxVndqemc&amp;output=html&amp;widget=true" width="700" height="420" frameborder="0"></iframe>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#B6D7A8"> R</td>\r\n<td>Oferta recomanada especialment</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#EDDE91"> A</td>\r\n<td>Oferta adaptable o reduïda</td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#ED9F91"> RD</td>\r\n<td>Oferta recomanada només per sortides d''un dia</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n\r\n<hr />\r\n\r\n<span style="color: #808080;"><em><span style="font-size: small;">Aquesta taula és una incrustació d''un <a title="plantilla full calcul" href="https://docs.google.com/spreadsheet/ccc?key=0AlWhk6C-0QRadEhkQjFPU0hTSG1fYTV3TkxxVndqemc&amp;usp=sharing"><span style="color: #808080;">full de càlcul</span></a> de Google Drive. Podeu fer una copia del full original i editar el contingut.</span></em></span>', 'Totes les activitats', '', 'publish', 'closed', 'closed', '', 'totes-les-activitats', '', '', '2016-06-20 17:30:31', '2016-06-20 16:30:31', '', 8235, 'http://blocs.xtec.cat/plantillacda/?page_id=179', 50, 'page', '', 0),
(8200, 1, '2013-11-15 20:30:55', '2013-11-15 19:30:55', 'Entre dimecres 3 i divendres 5 d''abril, hem tingut la visita dels alumnes de 2n d''ESO de la Granadella (Les Garrigues) que han treballat el Monestir de Poblet i han fet l''activitat de fer tinta amb l''antiga fòrmula dels monjos. Divendres van visitar Montblanc per tal de descobrir els edificis més interessants que amaga aquesta ciutat medieval. Actualment Montblanc ja compta amb elements d''ambientació per la proximitat amb la diada de Sant Jordi.\r\n\r\n<a href="http://1.bp.blogspot.com/-965JUl0xxEk/UWGy5DJjgoI/AAAAAAAAADY/tQvyg3JIq0k/s1600/portada-muralla-5-4-13.jpg"><img src="http://1.bp.blogspot.com/-965JUl0xxEk/UWGy5DJjgoI/AAAAAAAAADY/tQvyg3JIq0k/s320/portada-muralla-5-4-13.jpg" alt="" border="0" /></a>\r\n\r\n&nbsp;', 'Ens han visitat la Granadella', '', 'publish', 'open', 'open', '', 'la-granadella', '', '', '2016-06-22 11:41:13', '2016-06-22 10:41:13', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?p=203', 0, 'post', '', 0),
(8201, 1, '2013-11-15 19:25:02', '2013-11-15 18:25:02', 'Els tallers familiars es celebraran els dies 24, 25 i 26 de maig i aniran dirigits a infants de 6 a 12 anys. Els tallers oferits són els següents:\r\n\r\n- <strong>Jocs romans</strong>: els nois i noies participants podran jugar, emprant rèpliques, tal i com jugaven els infants a l’època romana.\r\n\r\n<img src="http://cdatarragona.net/wp-content/uploads/dsc04734.jpg" alt="" width="462" height="347" />\r\n\r\n<img src="http://cdatarragona.net/wp-content/uploads/dsc04733.jpg" alt="" width="461" height="347" />\r\n\r\n-<strong> Joies romanes</strong>: mitjançant fusta, cuir, metall, etc. podran elaborar diferents models de joies i manipular els materials, alhora que podran posar en funcionament la seva creativitat.', 'Tallers familiars', '', 'publish', 'open', 'open', '', 'tallers-familiars', '', '', '2016-06-22 11:20:35', '2016-06-22 10:20:35', '', 0, 'http://blocs.xtec.cat/cdaaltbergueda/?p=211', 0, 'post', '', 0),
(8203, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8203', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8203/', 4, 'nav_menu_item', '', 0),
(8204, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8204', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8204/', 1, 'nav_menu_item', '', 0),
(8205, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8205', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8205/', 1, 'nav_menu_item', '', 0),
(8206, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8206', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8206/', 4, 'nav_menu_item', '', 0),
(8207, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8207', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8207/', 3, 'nav_menu_item', '', 0),
(8208, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8208', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8208/', 2, 'nav_menu_item', '', 0),
(8209, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8209', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8209/', 3, 'nav_menu_item', '', 0),
(8210, 1, '2016-06-20 17:17:44', '2016-06-20 16:17:44', ' ', '', '', 'publish', 'closed', 'closed', '', '8210', '', '', '2016-06-20 17:17:44', '2016-06-20 16:17:44', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8210/', 2, 'nav_menu_item', '', 0),
(8211, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', '', 'publish', 'closed', 'closed', '', '8211', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8211/', 2, 'nav_menu_item', '', 0),
(8212, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', '', 'publish', 'closed', 'closed', '', '8212', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8212/', 5, 'nav_menu_item', '', 0),
(8213, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', '', 'publish', 'closed', 'closed', '', '8213', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8213/', 1, 'nav_menu_item', '', 0),
(8214, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 'La cova de la Tuta', '', 'publish', 'closed', 'closed', '', 'la-cova-de-la-tuta', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastercda/general/la-cova-de-la-tuta/', 3, 'nav_menu_item', '', 0),
(8215, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', 'preparació', 'publish', 'closed', 'closed', '', '8215', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8215/', 1, 'nav_menu_item', '', 0),
(8216, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', '', 'publish', 'closed', 'closed', '', '8216', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8216/', 2, 'nav_menu_item', '', 0),
(8217, 1, '2016-06-20 17:17:45', '2016-06-20 16:17:45', ' ', '', '', 'publish', 'closed', 'closed', '', '8217', '', '', '2016-06-20 17:17:45', '2016-06-20 16:17:45', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/8217/', 3, 'nav_menu_item', '', 0),
(8223, 1, '2016-06-20 17:19:31', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-06-20 17:19:31', '0000-00-00 00:00:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8223', 1, 'nav_menu_item', '', 0),
(8224, 1, '2016-06-20 17:20:22', '2016-06-20 16:20:22', ' ', '', '', 'publish', 'closed', 'closed', '', '8224', '', '', '2016-06-21 09:07:49', '2016-06-21 08:07:49', '', 8225, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8224', 2, 'nav_menu_item', '', 0),
(8225, 1, '2016-06-20 17:21:25', '2016-06-20 16:21:25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet rhoncus nibh eu interdum. Aliquam eget viverra dolor, at consectetur sapien. Duis porta nibh urna, nec faucibus diam convallis quis. Quisque ut nisi risus. Aenean volutpat, libero ut eleifend pellentesque, ex ante imperdiet diam, ac pharetra quam justo a tortor. Curabitur egestas libero velit, a ultrices tortor molestie eget. Curabitur mi libero, efficitur sed vulputate ac, accumsan id lacus. Nulla viverra, enim vitae ultrices ornare, tellus turpis porttitor est, non porta ante augue quis neque. Fusce eu ligula tincidunt, aliquet est ac, varius orci. In pretium maximus justo, quis posuere nisi porttitor nec. Fusce tristique sem mauris, convallis commodo neque pharetra et. Duis vehicula massa nec odio elementum viverra. Vivamus cursus nulla id ornare volutpat. Cras in libero est.', 'El camp', '', 'publish', 'closed', 'closed', '', 'el-camp', '', '', '2016-06-20 17:21:39', '2016-06-20 16:21:39', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8225', 0, 'page', '', 0),
(8229, 1, '2016-06-20 17:22:41', '2016-06-20 16:22:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8229', '', '', '2016-06-21 09:07:49', '2016-06-21 08:07:49', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8229', 1, 'nav_menu_item', '', 0),
(8230, 1, '2016-06-20 17:22:41', '2016-06-20 16:22:41', ' ', '', '', 'publish', 'closed', 'closed', '', '8230', '', '', '2016-06-21 09:07:49', '2016-06-21 08:07:49', '', 8225, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8230', 3, 'nav_menu_item', '', 0),
(8231, 1, '2016-06-20 17:23:13', '2016-06-20 16:23:13', ' ', '', '', 'publish', 'closed', 'closed', '', '8231', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8225, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8231', 5, 'nav_menu_item', '', 0),
(8232, 1, '2016-06-20 17:23:13', '2016-06-20 16:23:13', ' ', '', '', 'publish', 'closed', 'closed', '', '8232', '', '', '2016-06-21 09:07:49', '2016-06-21 08:07:49', '', 8225, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8232', 4, 'nav_menu_item', '', 0),
(8235, 1, '2016-06-20 17:26:18', '2016-06-20 16:26:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet rhoncus nibh eu interdum. Aliquam eget viverra dolor, at consectetur sapien. Duis porta nibh urna, nec faucibus diam convallis quis. Quisque ut nisi risus. Aenean volutpat, libero ut eleifend pellentesque, ex ante imperdiet diam, ac pharetra quam justo a tortor. Curabitur egestas libero velit, a ultrices tortor molestie eget. Curabitur mi libero, efficitur sed vulputate ac, accumsan id lacus. Nulla viverra, enim vitae ultrices ornare, tellus turpis porttitor est, non porta ante augue quis neque. Fusce eu ligula tincidunt, aliquet est ac, varius orci. In pretium maximus justo, quis posuere nisi porttitor nec. Fusce tristique sem mauris, convallis commodo neque pharetra et. Duis vehicula massa nec odio elementum viverra. Vivamus cursus nulla id ornare volutpat. Cras in libero est.', 'Àmbits', '', 'publish', 'closed', 'closed', '', 'ambits', '', '', '2016-06-20 17:26:18', '2016-06-20 16:26:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8235', 0, 'page', '', 0),
(8240, 1, '2016-06-20 17:28:01', '2016-06-20 16:28:01', ' ', '', '', 'publish', 'closed', 'closed', '', '8240', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8240', 6, 'nav_menu_item', '', 0),
(8241, 1, '2016-06-20 17:28:01', '2016-06-20 16:28:01', ' ', '', '', 'publish', 'closed', 'closed', '', '8241', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8235, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8241', 8, 'nav_menu_item', '', 0),
(8243, 1, '2016-06-20 17:28:01', '2016-06-20 16:28:01', ' ', '', '', 'publish', 'closed', 'closed', '', '8243', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8235, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8243', 7, 'nav_menu_item', '', 0),
(8259, 1, '2016-06-20 17:49:46', '2016-06-20 16:49:46', '', 'La cova de la Tuta i les fonts del Llobregat', '', 'publish', 'closed', 'closed', '', 'la-cova-de-la-tuta-i-les-fonts-del-llobregat', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8199, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8259', 9, 'nav_menu_item', '', 0),
(8260, 1, '2016-06-20 17:50:46', '2016-06-20 16:50:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet rhoncus nibh eu interdum. Aliquam eget viverra dolor, at consectetur sapien. Duis porta nibh urna, nec faucibus diam convallis quis. Quisque ut nisi risus. Aenean volutpat, libero ut eleifend pellentesque, ex ante imperdiet diam, ac pharetra quam justo a tortor. Curabitur egestas libero velit, a ultrices tortor molestie eget. Curabitur mi libero, efficitur sed vulputate ac, accumsan id lacus. Nulla viverra, enim vitae ultrices ornare, tellus turpis porttitor est, non porta ante augue quis neque. Fusce eu ligula tincidunt, aliquet est ac, varius orci. In pretium maximus justo, quis posuere nisi porttitor nec. Fusce tristique sem mauris, convallis commodo neque pharetra et. Duis vehicula massa nec odio elementum viverra. Vivamus cursus nulla id ornare volutpat. Cras in libero est.', 'Modalitats', '', 'publish', 'closed', 'closed', '', 'modalitats', '', '', '2016-06-20 17:50:46', '2016-06-20 16:50:46', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8260', 0, 'page', '', 0),
(8266, 1, '2016-06-20 17:53:27', '2016-06-20 16:53:27', ' ', '', '', 'publish', 'closed', 'closed', '', '8266', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8266', 12, 'nav_menu_item', '', 0),
(8267, 1, '2016-06-20 17:53:27', '2016-06-20 16:53:27', ' ', '', '', 'publish', 'closed', 'closed', '', '8267', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8260, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8267', 14, 'nav_menu_item', '', 0),
(8268, 1, '2016-06-20 17:53:27', '2016-06-20 16:53:27', ' ', '', '', 'publish', 'closed', 'closed', '', '8268', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8260, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8268', 13, 'nav_menu_item', '', 0),
(8269, 1, '2016-06-20 17:53:27', '2016-06-20 16:53:27', ' ', '', '', 'publish', 'closed', 'closed', '', '8269', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8260, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8269', 15, 'nav_menu_item', '', 0),
(8272, 1, '2016-06-20 17:56:05', '2016-06-20 16:56:05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet rhoncus nibh eu interdum. Aliquam eget viverra dolor, at consectetur sapien. Duis porta nibh urna, nec faucibus diam convallis quis. Quisque ut nisi risus. Aenean volutpat, libero ut eleifend pellentesque, ex ante imperdiet diam, ac pharetra quam justo a tortor. Curabitur egestas libero velit, a ultrices tortor molestie eget. Curabitur mi libero, efficitur sed vulputate ac, accumsan id lacus. Nulla viverra, enim vitae ultrices ornare, tellus turpis porttitor est, non porta ante augue quis neque. Fusce eu ligula tincidunt, aliquet est ac, varius orci. In pretium maximus justo, quis posuere nisi porttitor nec. Fusce tristique sem mauris, convallis commodo neque pharetra et. Duis vehicula massa nec odio elementum viverra. Vivamus cursus nulla id ornare volutpat. Cras in libero est.', 'Amb els centres', '', 'publish', 'closed', 'closed', '', 'amb-els-centres', '', '', '2016-06-22 11:18:48', '2016-06-22 10:18:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?page_id=8272', 0, 'page', '', 0),
(8274, 1, '2016-06-20 17:56:37', '2016-06-20 16:56:37', '', 'Amb els centres', '', 'publish', 'closed', 'closed', '', '8274', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8274', 16, 'nav_menu_item', '', 0),
(8280, 1, '2016-06-20 18:03:51', '2016-06-20 17:03:51', '', 'març2010-031', '', 'inherit', 'open', 'closed', '', 'marc2010-031-2', '', '', '2016-06-20 18:03:51', '2016-06-20 17:03:51', '', 249, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/març2010-031-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(8282, 1, '2016-06-20 18:05:35', '2016-06-20 17:05:35', '', 'Selecció_999(316)', '', 'inherit', 'open', 'closed', '', 'seleccio_999316', '', '', '2016-06-20 18:05:35', '2016-06-20 17:05:35', '', 8201, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_999316.png', 0, 'attachment', 'image/png', 0),
(8284, 1, '2016-06-20 18:06:14', '2016-06-20 17:06:14', '', 'Selecció_999(317)', '', 'inherit', 'open', 'closed', '', 'seleccio_999317', '', '', '2016-06-20 18:06:14', '2016-06-20 17:06:14', '', 207, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_999317.png', 0, 'attachment', 'image/png', 0),
(8286, 1, '2016-06-20 18:08:18', '2016-06-20 17:08:18', ' ', '', '', 'publish', 'closed', 'closed', '', '8286', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8272, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8286', 17, 'nav_menu_item', '', 0),
(8287, 1, '2016-06-20 18:08:18', '2016-06-20 17:08:18', ' ', '', '', 'publish', 'closed', 'closed', '', '8287', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8272, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8287', 19, 'nav_menu_item', '', 0),
(8288, 1, '2016-06-20 18:08:18', '2016-06-20 17:08:18', ' ', '', '', 'publish', 'closed', 'closed', '', '8288', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8272, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8288', 20, 'nav_menu_item', '', 0),
(8289, 1, '2016-06-20 18:09:19', '2016-06-20 17:09:19', ' ', '', '', 'publish', 'closed', 'closed', '', '8289', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8235, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8289', 10, 'nav_menu_item', '', 0),
(8290, 1, '2016-06-20 18:09:19', '2016-06-20 17:09:19', ' ', '', '', 'publish', 'closed', 'closed', '', '8290', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8235, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8290', 11, 'nav_menu_item', '', 0),
(8291, 1, '2016-06-20 18:18:52', '2016-06-20 17:18:52', '', 'Selecció_999(319)', '', 'inherit', 'open', 'closed', '', 'seleccio_999319', '', '', '2016-06-20 18:18:52', '2016-06-20 17:18:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Selecció_999319.png', 0, 'attachment', 'image/png', 0),
(8292, 1, '2016-06-20 18:19:52', '2016-06-20 17:19:52', '', 'Selecció_999(320)', '', 'inherit', 'open', 'closed', '', 'seleccio_999320', '', '', '2016-06-20 18:19:52', '2016-06-20 17:19:52', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Selecció_999320.png', 0, 'attachment', 'image/png', 0),
(8293, 1, '2016-06-20 18:21:14', '2016-06-20 17:21:14', '', 'Selecció_999(321)', '', 'inherit', 'open', 'closed', '', 'seleccio_999321', '', '', '2016-06-20 18:21:14', '2016-06-20 17:21:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Selecció_999321.png', 0, 'attachment', 'image/png', 0),
(8294, 1, '2016-06-20 18:24:04', '2016-06-20 17:24:04', '', 'termiques', '', 'inherit', 'open', 'closed', '', 'termiques', '', '', '2016-06-20 18:24:04', '2016-06-20 17:24:04', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/termiques.jpg', 0, 'attachment', 'image/jpeg', 0),
(8295, 1, '2016-06-20 18:31:09', '2016-06-20 17:31:09', '', 'IMG_1673', '', 'inherit', 'open', 'closed', '', 'img_1673', '', '', '2016-06-20 18:31:09', '2016-06-20 17:31:09', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/IMG_1673.jpg', 0, 'attachment', 'image/jpeg', 0),
(8296, 1, '2016-06-20 18:32:05', '2016-06-20 17:32:05', '', 'Gimcana 1-001', '', 'inherit', 'open', 'closed', '', 'gimcana-1-001', '', '', '2016-06-20 18:32:05', '2016-06-20 17:32:05', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Gimcana-1-001.jpg', 0, 'attachment', 'image/jpeg', 0),
(8297, 1, '2016-06-21 09:00:39', '2016-06-21 08:00:39', ' ', '', '', 'publish', 'closed', 'closed', '', '8297', '', '', '2016-06-21 09:07:50', '2016-06-21 08:07:50', '', 8272, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8297', 18, 'nav_menu_item', '', 0),
(8307, 1, '2016-06-21 11:03:47', '2016-06-21 10:03:47', '', 'capc_riusalabr2', '', 'inherit', 'open', 'closed', '', 'capc_riusalabr2', '', '', '2016-06-21 11:03:47', '2016-06-21 10:03:47', '', 8197, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/capc_riusalabr2.jpg', 0, 'attachment', 'image/jpeg', 0),
(8312, 1, '2016-06-21 11:22:50', '2016-06-21 10:22:50', '', 'Tardor-5', '', 'inherit', 'open', 'closed', '', 'tardor-5', '', '', '2016-06-21 11:22:50', '2016-06-21 10:22:50', '', 8198, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Tardor-5.jpg', 0, 'attachment', 'image/jpeg', 0),
(8314, 1, '2016-06-21 11:24:22', '2016-06-21 10:24:22', '', 'Selecció_999(322)', '', 'inherit', 'open', 'closed', '', 'seleccio_999322', '', '', '2016-06-21 11:24:22', '2016-06-21 10:24:22', '', 165, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/Selecció_999322.png', 0, 'attachment', 'image/png', 0),
(8322, 1, '2016-06-21 11:48:22', '2016-06-21 10:48:22', '', 'La cova de la tuta', '', 'publish', 'closed', 'closed', '', 'la-cova-de-la-tuta', '', '', '2016-06-21 11:48:22', '2016-06-21 10:48:22', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?post_type=slideshow&#038;p=8322', 0, 'slideshow', '', 0),
(8323, 1, '2016-06-21 11:47:59', '2016-06-21 10:47:59', '', 'Portada', '', 'inherit', 'open', 'closed', '', 'portada', '', '', '2016-06-21 11:47:59', '2016-06-21 10:47:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Portada.jpg', 0, 'attachment', 'image/jpeg', 0),
(8324, 1, '2016-06-21 11:47:59', '2016-06-21 10:47:59', '', 'DSC_0143-636x303', '', 'inherit', 'open', 'closed', '', 'dsc_0143-636x303', '', '', '2016-06-21 11:47:59', '2016-06-21 10:47:59', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/DSC_0143-636x303.jpg', 0, 'attachment', 'image/jpeg', 0),
(8325, 1, '2016-06-21 11:48:00', '2016-06-21 10:48:00', '', '20', '', 'inherit', 'open', 'closed', '', '20', '', '', '2016-06-21 11:48:00', '2016-06-21 10:48:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/20.jpg', 0, 'attachment', 'image/jpeg', 0),
(8327, 1, '2016-06-21 11:50:55', '2016-06-21 10:50:55', '', '1346327037', '', 'inherit', 'open', 'closed', '', '1346327037', '', '', '2016-06-21 11:50:55', '2016-06-21 10:50:55', '', 160, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/1346327037.jpg', 0, 'attachment', 'image/jpeg', 0),
(8330, 1, '2016-06-21 12:03:23', '2016-06-21 11:03:23', 'El Prat de Llobregat', 'Escola Charles Darwin', '', 'private', 'closed', 'closed', '', 'escola-charles-darwin', '', '', '2016-06-21 12:03:23', '2016-06-21 11:03:23', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/escola-charles-darwin/', 0, 'forum', '', 0),
(8331, 1, '2016-06-21 12:04:53', '2016-06-21 11:04:53', 'Tortosa', 'Institut Joaquim Bau', '', 'private', 'closed', 'closed', '', 'institut-joaquim-bau', '', '', '2016-06-21 12:04:53', '2016-06-21 11:04:53', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/institut-joaquim-bau/', 0, 'forum', '', 0),
(8332, 1, '2016-06-21 12:06:08', '2016-06-21 11:06:08', 'Maçanet de la Selva', 'Escola Sant Jordi', '', 'private', 'closed', 'closed', '', 'escola-sant-jordi', '', '', '2016-06-21 12:06:08', '2016-06-21 11:06:08', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/escola-sant-jordi/', 0, 'forum', '', 0),
(8333, 1, '2016-06-21 12:07:31', '2016-06-21 11:07:31', 'Salt', 'El gegant del rec', '', 'private', 'closed', 'closed', '', 'el-gegant-del-rec', '', '', '2016-06-21 12:07:31', '2016-06-21 11:07:31', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/el-gegant-del-rec/', 0, 'forum', '', 0),
(8335, 1, '2016-06-21 13:23:14', '2016-06-21 12:23:14', 'Node de coordinació dels formadors del camp d&#039;aprenentatge', 'Camp d&#039;aprenentatge', '', 'private', 'closed', 'closed', '', 'camp-daprenentatge', '', '', '2016-06-21 13:23:14', '2016-06-21 12:23:14', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/camp-daprenentatge/', 0, 'forum', '', 0),
(8336, 1, '2016-06-21 13:28:26', '2016-06-21 12:28:26', 'Manlleu', 'Escola Quatre Vents', '', 'private', 'closed', 'closed', '', 'escola-quatre-vents', '', '', '2016-06-21 13:28:26', '2016-06-21 12:28:26', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/forums/forum/escola-quatre-vents/', 0, 'forum', '', 0),
(8345, 1, '2016-06-21 14:06:27', '2016-06-21 13:06:27', '', 'IMG_20150219_144547', '', 'inherit', 'open', 'closed', '', 'img_20150219_144547', '', '', '2016-06-21 14:06:27', '2016-06-21 13:06:27', '', 8200, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2013/11/IMG_20150219_144547.jpg', 0, 'attachment', 'image/jpeg', 0),
(8347, 1, '2016-06-21 14:19:52', '2016-06-21 13:19:52', 'El dilluns 13 de juny els representants de les escoles participants enguany en el projecte, juntament amb el Camp d’Aprenentatge, el Consorci i el Consell comarcal ens hem trobat a les instal.lacions del Parc Ambiental per confirmar els compromisos que hem pres per preservar el medi ambient. Enhorabona a tots per la feina feta!!! Podeu ampliar la notícia a <a href="http://El%20dilluns%2013%20de%20juny%20els%20representants%20de%20les%20escoles%20participants%20enguany%20en%20el%20projecte,%20juntament%20amb%20el%20Camp%20d%E2%80%99Aprenentatge,%20el%20Consorci%20i%20el%20Consell%20comarcal%20ens%20hem%20trobat%20a%20les%20instal.lacions%20del%20Parc%20Ambiental%20per%20confirmar%20els%20compromisos%20que%20hem%20pres%20per%20preservar%20el%20medi%20ambient.%20Enhorabona%20a%20tots%20per%20la%20feina%20feta!!!/" target="_blank">Manresainfo.</a>\r\n\r\nhttps://www.youtube.com/watch?v=8Pm1EwqDDSE#t=1058', 'Cloenda del projecte compartit de residus d’enguany', '', 'publish', 'open', 'open', '', 'cloenda-del-projecte-compartit-de-residus-denguany', '', '', '2016-06-22 11:26:18', '2016-06-22 10:26:18', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8347', 0, 'post', '', 0),
(8349, 1, '2016-06-21 14:21:28', '2016-06-21 13:21:28', '', 'Selecció_999(324)', '', 'inherit', 'open', 'closed', '', 'seleccio_999324', '', '', '2016-06-21 14:21:28', '2016-06-21 13:21:28', '', 8347, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/Selecció_999324.png', 0, 'attachment', 'image/png', 0),
(8369, 1, '2016-06-22 14:59:58', '2016-06-22 13:59:58', 'El passat dijous 19 de març amb els alumnes de sisè de l’escola Enxaneta de Valls, quan estàvem d’excursió pel Parc Nacional d’Aigüestortes i Estany de Sant Maurici vam poder gaudir d’una parella de trencalòs. Un d’ells era un individu adult ja que tenia el dors de color negre i el pit de color ataronjat com a conseqüència dels banys que realitzen en aigües ferruginoses quan ja són adults (6-7 anys). L’altre, en canvi, era més marronós del dors i més fosc del pit, trets distintius dels individus més joves. Aquest últim portava una marca a cada una de les ales; l’esquerra era de color blanc i la dreta de color vermell.\r\n\r\n<a href="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/img_20_gr.jpg" rel="attachment wp-att-8371"><img class="size-full wp-image-8371 aligncenter" src="https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/img_20_gr.jpg" alt="img_20_gr" width="450" height="330" /></a>', 'Avistament de Xoel N21', 'El passat dijous 19 de març amb els alumnes de sisè de l’escola Enxaneta de Valls, quan estàvem d’excursió pel Parc Nacional d’Aigüestortes i Estany de Sant Maurici vam poder gaudir d’una parella de trencalòs. Un d’ells era un individu adult ja que tenia el dors de color negre i el pit de color ataronjat com a conseqüència dels banys que realitzen en aigües ferruginoses quan ja són adults (6-7 anys). L’altre, en canvi, era més marronós del dors i més fosc del pit, trets distintius dels individus més joves. Aquest últim portava una marca a cada una de les ales; l’esquerra era de color blanc i la dreta de color vermell.', 'publish', 'open', 'open', '', 'avistament-de-xoel-n21', '', '', '2016-06-22 15:00:13', '2016-06-22 14:00:13', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8369', 0, 'post', '', 0),
(8370, 1, '2016-06-22 14:59:28', '2016-06-22 13:59:28', '', 'img_16_gr', '', 'inherit', 'open', 'closed', '', 'img_16_gr', '', '', '2016-06-22 14:59:28', '2016-06-22 13:59:28', '', 8369, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/img_16_gr.jpg', 0, 'attachment', 'image/jpeg', 0),
(8371, 1, '2016-06-22 14:59:46', '2016-06-22 13:59:46', '', 'img_20_gr', '', 'inherit', 'open', 'closed', '', 'img_20_gr', '', '', '2016-06-22 14:59:46', '2016-06-22 13:59:46', '', 8369, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/img_20_gr.jpg', 0, 'attachment', 'image/jpeg', 0),
(8379, 1, '2016-06-27 10:55:47', '2016-06-27 09:55:47', '', 'garrotxa', '', 'inherit', 'open', 'closed', '', 'garrotxa', '', '', '2016-06-27 10:55:47', '2016-06-27 09:55:47', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/wp-content/uploads/usu4/2016/06/garrotxa.png', 0, 'attachment', 'image/png', 0),
(8381, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(8382, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(8383, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(8384, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(8385, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(8386, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(8387, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(8388, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(8389, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(8390, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(8391, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(8392, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(8393, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0),
(8394, 1, '2016-07-04 11:32:34', '2016-07-04 10:32:34', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-07-04 11:32:34', '2016-07-04 10:32:34', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(8395, 1, '2016-07-04 11:32:35', '2016-07-04 10:32:35', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-07-04 11:32:35', '2016-07-04 10:32:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(8396, 1, '2016-07-04 11:32:35', '2016-07-04 10:32:35', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-07-04 11:32:35', '2016-07-04 10:32:35', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(8397, 0, '2019-05-13 09:44:48', '2019-05-13 07:44:48', '<strong style="color: #990000">What can you achieve using Email Subscribers?</strong><p>Add subscription forms on website, send HTML newsletters &amp; automatically notify subscribers about new blog posts once it is published. You can also Import or Export subscribers from any list to Email Subscribers.</p> <strong style="color: #990000">Plugin Features</strong><ol> <li>Send notification emails to subscribers when new blog posts are published.</li> <li>Subscribe form available with 3 options to setup.</li> <li>Double Opt-In and Single Opt-In support.</li> <li>Email notification to admin when a new user signs up (Optional).</li> <li>Automatic welcome email to subscriber.</li> <li>Auto add unsubscribe link in the email.</li> <li>Import/Export subscriber emails to migrate to any lists.</li> <li>Default WordPress editor to create emails.</li> </ol> <strong>Thanks &amp; Regards,</strong><br>Admin', 'Welcome To Email Subscribers', '', 'publish', 'closed', 'closed', '', 'welcome-to-email-subscribers', '', '', '2019-05-13 09:44:48', '2019-05-13 07:44:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/welcome-to-email-subscribers/', 0, 'es_template', '', 0),
(8398, 0, '2019-05-13 09:44:48', '2019-05-13 07:44:48', 'Hello {{NAME}},\r\n\r\nWe have published a new blog article on our website : {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n\r\nYou can view it from this link : {{POSTLINK}}\r\n\r\nThanks &amp; Regards,\r\nAdmin\r\n\r\nYou received this email because in the past you have provided us your email address : {{EMAIL}} to receive notifications when new updates are posted.', 'New Post Published - {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'new-post-published-posttitle', '', '', '2019-05-13 09:44:48', '2019-05-13 07:44:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/new-post-published-posttitle/', 0, 'es_template', '', 0),
(8399, 0, '2019-05-13 09:44:48', '2019-05-13 07:44:48', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:44:48', '2019-05-13 07:44:48', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(8400, 2, '2019-05-13 12:41:28', '2019-05-13 10:41:28', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:41:28', '2019-05-13 10:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(8401, 2, '2019-05-13 12:41:28', '2019-05-13 10:41:28', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:41:28', '2019-05-13 10:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(8402, 2, '2019-05-13 12:41:28', '2019-05-13 10:41:28', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:41:28', '2019-05-13 10:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(8403, 2, '2019-05-13 12:41:28', '2019-05-13 10:41:28', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:41:28', '2019-05-13 10:41:28', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0),
(8404, 2, '2019-05-13 12:42:43', '0000-00-00 00:00:00', '', 'Esborrany automàtic', '', 'auto-draft', 'open', 'open', '', '', '', '', '2019-05-13 12:42:43', '0000-00-00 00:00:00', '', 0, 'https://pwc-int.educacio.intranet/agora/mastercda/?p=8404', 0, 'post', '', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(118, 'acta', 'acta', 0),
(119, 'assesoraments', 'assesoraments', 0),
(120, 'bp_docs_access_group_member_20', 'bp_docs_access_group_member_20', 0),
(121, 'bp_docs_access_loggedin', 'bp_docs_access_loggedin', 0),
(122, 'creda', 'creda', 0),
(123, 'crp', 'crp', 0),
(124, 'cursos', 'cursos', 0),
(125, 'eap', 'eap', 0),
(126, 'elic', 'elic', 0),
(127, 'Equip SE', 'equip-se', 0),
(128, 'fitxa', 'fitxa', 0),
(129, 'formadors', 'formadors', 0),
(130, 'fòrum-recerca-2015', 'forum-recerca-2015', 0),
(132, 'grups de treball', 'grups-de-treball', 0),
(133, 'GTAF', 'gtaf', 0),
(134, 'jocs florals', 'jocs-florals', 0),
(135, 'PFZ', 'pfz', 0),
(136, 'qüestionaris', 'questionaris', 0),
(137, 'seminaris', 'seminaris', 0),
(138, 'servei comunitari', 'servei-comunitari', 0),
(140, 'Servei educatiu', 'bp_docs_associated_group_20', 0),
(141, 'tallers', 'tallers', 0),
(143, 'treballs de recerca', 'treballs-de-recerca', 0),
(145, 'MenuSuperior', 'menusuperior', 0),
(149, 'Formadors', 'bp_docs_associated_group_33', 0),
(150, 'bp_docs_access_group_member_33', 'bp_docs_access_group_member_33', 0),
(151, 'Servei educatiu', 'bp_docs_associated_group_31', 0),
(152, 'bp_docs_access_group_member_31', 'bp_docs_access_group_member_31', 0),
(155, 'MenuFormacio', 'menuformacio', 0),
(260, 'MenuFIC', 'menufic', 0),
(261, 'menuPFZ', 'menupfz', 0),
(262, 'Activitats', 'activitats', 0),
(265, 'Visites', 'visites', 0),
(271, 'nadal', 'nadal', 0),
(272, 'nevada', 'nevada', 0),
(274, 'Menú', 'menu', 0),
(275, 'MenuActivitats', 'menuactivitats', 0),
(276, 'MenuInscripcio', 'menuinscripcio', 0),
(277, 'MenuModalitats', 'menumodalitats', 0),
(278, 'MenuVisites', 'menuvisites', 0),
(279, 'Menu Superior', 'menu-superior', 0),
(280, 'Residus', 'residus', 0),
(281, 'MenuXarxesMeteo', 'menuxarxesmeteo', 0),
(282, 'Famílies', 'families', 0),
(283, 'Projectes', 'projectes', 0),
(284, 'Monestir de poblet', 'monestir-de-poblet', 0),
(285, 'fauna', 'fauna', 0),
(286, 'activity-comment', 'activity-comment', 0),
(287, 'activity-comment-author', 'activity-comment-author', 0),
(288, 'activity-at-message', 'activity-at-message', 0),
(289, 'groups-at-message', 'groups-at-message', 0),
(290, 'core-user-registration', 'core-user-registration', 0),
(291, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(292, 'friends-request', 'friends-request', 0),
(293, 'friends-request-accepted', 'friends-request-accepted', 0),
(294, 'groups-details-updated', 'groups-details-updated', 0),
(295, 'groups-invitation', 'groups-invitation', 0),
(296, 'groups-member-promoted', 'groups-member-promoted', 0),
(297, 'groups-membership-request', 'groups-membership-request', 0),
(298, 'messages-unread', 'messages-unread', 0),
(299, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(300, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(301, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(302, 'google', 'google', 0),
(303, 'default-calendar', 'default-calendar', 0),
(304, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(305, 'bp-ges-single', 'bp-ges-single', 0),
(306, 'bp-ges-digest', 'bp-ges-digest', 0),
(307, 'bp-ges-notice', 'bp-ges-notice', 0),
(308, 'bp-ges-welcome', 'bp-ges-welcome', 0);

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
(207, 1, 0),
(207, 33, 0),
(207, 266, 0),
(211, 38, 0),
(211, 39, 0),
(211, 40, 0),
(248, 306, 0),
(248, 307, 0),
(249, 1, 0),
(249, 33, 0),
(249, 266, 0),
(249, 275, 0),
(249, 276, 0),
(289, 65, 0),
(510, 51, 0),
(515, 51, 0),
(515, 142, 0),
(518, 51, 0),
(518, 142, 0),
(521, 51, 0),
(521, 142, 0),
(524, 51, 0),
(524, 142, 0),
(528, 51, 0),
(528, 142, 0),
(531, 51, 0),
(531, 142, 0),
(684, 123, 0),
(684, 128, 0),
(684, 133, 0),
(684, 139, 0),
(684, 141, 0),
(684, 145, 0),
(684, 153, 0),
(684, 154, 0),
(687, 133, 0),
(687, 136, 0),
(687, 139, 0),
(687, 153, 0),
(687, 154, 0),
(689, 51, 0),
(689, 139, 0),
(693, 133, 0),
(693, 137, 0),
(693, 153, 0),
(693, 154, 0),
(697, 122, 0),
(697, 133, 0),
(697, 153, 0),
(697, 154, 0),
(701, 132, 0),
(701, 133, 0),
(701, 153, 0),
(701, 154, 0),
(704, 133, 0),
(704, 140, 0),
(704, 153, 0),
(704, 154, 0),
(732, 51, 0),
(732, 129, 0),
(732, 131, 0),
(736, 51, 0),
(736, 127, 0),
(736, 131, 0),
(739, 125, 0),
(739, 131, 0),
(765, 126, 0),
(765, 127, 0),
(765, 129, 0),
(765, 130, 0),
(765, 131, 0),
(765, 155, 0),
(765, 156, 0),
(769, 51, 0),
(769, 130, 0),
(769, 131, 0),
(879, 51, 0),
(944, 51, 0),
(944, 134, 0),
(944, 147, 0),
(952, 51, 0),
(952, 134, 0),
(952, 147, 0),
(956, 51, 0),
(956, 134, 0),
(956, 147, 0),
(982, 51, 0),
(982, 138, 0),
(1038, 306, 0),
(1038, 307, 0),
(1046, 149, 0),
(1047, 149, 0),
(1055, 149, 0),
(1060, 149, 0),
(1061, 149, 0),
(1068, 149, 0),
(1069, 149, 0),
(1077, 65, 0),
(1078, 65, 0),
(1146, 149, 0),
(1307, 149, 0),
(8089, 264, 0),
(8090, 264, 0),
(8091, 265, 0),
(8093, 159, 0),
(8094, 149, 0),
(8192, 278, 0),
(8194, 280, 0),
(8195, 278, 0),
(8200, 33, 0),
(8200, 266, 0),
(8200, 269, 0),
(8200, 288, 0),
(8201, 1, 0),
(8201, 33, 0),
(8201, 266, 0),
(8201, 286, 0),
(8203, 278, 0),
(8204, 281, 0),
(8205, 279, 0),
(8206, 279, 0),
(8207, 278, 0),
(8208, 278, 0),
(8209, 281, 0),
(8210, 281, 0),
(8211, 279, 0),
(8212, 279, 0),
(8213, 280, 0),
(8214, 279, 0),
(8215, 282, 0),
(8216, 282, 0),
(8217, 282, 0),
(8224, 283, 0),
(8229, 283, 0),
(8230, 283, 0),
(8231, 283, 0),
(8232, 283, 0),
(8240, 283, 0),
(8241, 283, 0),
(8243, 283, 0),
(8259, 283, 0),
(8266, 283, 0),
(8267, 283, 0),
(8268, 283, 0),
(8269, 283, 0),
(8274, 283, 0),
(8286, 283, 0),
(8287, 283, 0),
(8288, 283, 0),
(8289, 283, 0),
(8290, 283, 0),
(8297, 283, 0),
(8347, 33, 0),
(8347, 266, 0),
(8347, 284, 0),
(8347, 287, 0),
(8369, 1, 0),
(8369, 33, 0),
(8369, 289, 0),
(8381, 290, 0),
(8382, 291, 0),
(8383, 292, 0),
(8384, 293, 0),
(8385, 294, 0),
(8386, 295, 0),
(8387, 296, 0),
(8388, 297, 0),
(8389, 298, 0),
(8390, 299, 0),
(8391, 300, 0),
(8392, 301, 0),
(8393, 302, 0),
(8394, 303, 0),
(8395, 304, 0),
(8396, 305, 0),
(8399, 308, 0),
(8400, 309, 0),
(8401, 310, 0),
(8402, 311, 0),
(8403, 312, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 4),
(33, 29, 'category', '', 0, 6),
(37, 33, 'topic-tag', '', 0, 0),
(38, 34, 'topic-tag', '', 0, 1),
(39, 35, 'topic-tag', '', 0, 1),
(40, 36, 'topic-tag', '', 0, 1),
(50, 46, 'bp_docs_associated_item', 'Document associat al node Professorat', 0, 0),
(51, 47, 'bp_docs_access', '', 0, 16),
(55, 51, 'bp_docs_access', '', 0, 0),
(57, 53, 'bp_docs_associated_item', 'Document associat al node Fotografia', 0, 0),
(65, 61, 'nav_menu', '', 0, 3),
(122, 118, 'bp_docs_tag', '', 0, 1),
(123, 119, 'bp_docs_tag', '', 0, 1),
(124, 120, 'bp_docs_access', '', 0, 0),
(125, 121, 'bp_docs_access', '', 0, 1),
(126, 122, 'bp_docs_tag', '', 0, 1),
(127, 123, 'bp_docs_tag', '', 0, 2),
(128, 124, 'bp_docs_tag', '', 0, 1),
(129, 125, 'bp_docs_tag', '', 0, 2),
(130, 126, 'bp_docs_tag', '', 0, 2),
(131, 127, 'bp_docs_tag', '', 0, 5),
(132, 128, 'bp_docs_tag', '', 0, 1),
(133, 129, 'bp_docs_tag', '', 0, 6),
(134, 130, 'bp_docs_tag', '', 0, 3),
(136, 132, 'bp_docs_tag', '', 0, 1),
(137, 133, 'bp_docs_tag', '', 0, 1),
(138, 134, 'bp_docs_tag', '', 0, 1),
(139, 135, 'bp_docs_tag', '', 0, 3),
(140, 136, 'bp_docs_tag', '', 0, 1),
(141, 137, 'bp_docs_tag', '', 0, 1),
(142, 138, 'bp_docs_tag', '', 0, 6),
(144, 140, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 0),
(145, 141, 'bp_docs_tag', '', 0, 1),
(147, 143, 'bp_docs_tag', '', 0, 3),
(149, 145, 'nav_menu', '', 0, 10),
(153, 149, 'bp_docs_associated_item', 'Document associat al node Formadors', 0, 6),
(154, 150, 'bp_docs_access', '', 0, 6),
(155, 151, 'bp_docs_associated_item', 'Document associat al node Servei educatiu', 0, 1),
(156, 152, 'bp_docs_access', '', 0, 1),
(159, 155, 'nav_menu', '', 0, 1),
(264, 260, 'nav_menu', '', 0, 2),
(265, 261, 'nav_menu', '', 0, 1),
(266, 262, 'category', 'Les activitats del nostre CdA', 0, 5),
(269, 265, 'category', '', 0, 1),
(275, 271, 'post_tag', '', 0, 1),
(276, 272, 'post_tag', '', 0, 1),
(278, 274, 'nav_menu', '', 0, 5),
(279, 275, 'nav_menu', '', 0, 5),
(280, 276, 'nav_menu', '', 0, 2),
(281, 277, 'nav_menu', '', 0, 3),
(282, 278, 'nav_menu', '', 0, 3),
(283, 279, 'nav_menu', '', 0, 20),
(284, 280, 'post_tag', '', 0, 1),
(285, 281, 'nav_menu', '', 0, 0),
(286, 282, 'post_tag', '', 0, 1),
(287, 283, 'post_tag', '', 0, 1),
(288, 284, 'post_tag', '', 0, 1),
(289, 285, 'post_tag', '', 0, 1),
(290, 286, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(291, 287, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(292, 288, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(293, 289, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(294, 290, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(295, 291, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(296, 292, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(297, 293, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(298, 294, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(299, 295, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(300, 296, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(301, 297, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(302, 298, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(303, 299, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(304, 300, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(305, 301, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(306, 302, 'calendar_feed', '', 0, 2),
(307, 303, 'calendar_type', '', 0, 2),
(308, 304, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(309, 305, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(310, 306, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(311, 307, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(312, 308, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

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
(28, 2, 'last_activity', '2017-02-23 12:24:08'),
(29, 2, 'closedpostboxes_slideshow', 'a:1:{i:2;s:5:"style";}'),
(30, 2, 'metaboxhidden_slideshow', 'a:2:{i:3;s:7:"slugdiv";i:4;s:5:"style";}'),
(31, 2, 'managenav-menuscolumnshidden', 'a:3:{i:0;s:11:"css-classes";i:1;s:3:"xfn";i:2;s:11:"description";}'),
(32, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(33, 2, 'nav_menu_recently_edited', '145'),
(34, 2, 'closedpostboxes_dashboard', 'a:0:{}'),
(35, 2, 'metaboxhidden_dashboard', 'a:0:{}'),
(36, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:43:"dashboard_right_now,bbp-dashboard-right-now";s:4:"side";s:58:"dashboard_quick_press,dashboard_activity,dashboard_primary";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&hidetb=1&wplink=1&posts_list_mode=list'),
(41, 2, 'wp_user-settings-time', '1465998882'),
(43, 2, 'screen_layout_post', '2'),
(46, 2, 'total_group_count', '0'),
(47, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:2:{i:3;a:1:{i:0;i:5;}i:21;a:5:{i:0;i:66;i:1;i:67;i:2;i:69;i:3;i:70;i:4;i:79;}}}'),
(48, 1, 'last_activity', '2016-06-22 14:00:16'),
(49, 1, 'total_group_count', '6'),
(51, 1, 'screen_layout_post', '2'),
(52, 1, 'wp_user-settings', 'libraryContent=browse&advImgDetails=show&editor=tinymce&hidetb=1'),
(53, 1, 'wp_user-settings-time', '1466601230'),
(56, 1, 'nav_menu_recently_edited', '281'),
(57, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(58, 1, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(59, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(60, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(61, 1, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(62, 1, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:27:"submitdiv,slides-list,,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(63, 1, 'screen_layout_slideshow', '2'),
(64, 1, 'ass_digest_items', 'a:1:{s:3:"dig";a:13:{i:2;a:1:{i:0;i:11;}i:1;a:5:{i:0;i:12;i:1;i:49;i:2;i:50;i:3;i:52;i:4;i:54;}i:5;a:1:{i:0;i:15;}i:9;a:1:{i:0;i:20;}i:14;a:4:{i:0;i:27;i:1;i:34;i:2;i:44;i:3;i:47;}i:15;a:2:{i:0;i:29;i:1;i:43;}i:16;a:1:{i:0;i:31;}i:17;a:4:{i:0;i:33;i:1;i:42;i:2;i:45;i:3;i:55;}i:18;a:1:{i:0;i:38;}i:19;a:1:{i:0;i:41;}i:33;a:13:{i:0;i:87;i:1;i:89;i:2;i:90;i:3;i:91;i:4;i:92;i:5;i:93;i:6;i:94;i:7;i:96;i:8;i:97;i:9;i:98;i:10;i:99;i:11;i:100;i:12;i:102;}i:31;a:2:{i:0;i:88;i:1;i:95;}i:39;a:2:{i:0;i:92;i:1;i:93;}}}'),
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
(180, 1, 'bp_docs_count', '24'),
(192, 1, 'session_tokens', 'a:4:{s:64:"82795c3aa3860d47fd3c665418da41dbf5d08f0a4d184d1724a7edb284769b6f";a:4:{s:10:"expiration";i:1466612016;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1466439216;}s:64:"c2a0697dd3ba972609ad96e426e3af8a752c2a62555df258deec11325a6e224e";a:4:{s:10:"expiration";i:1466667737;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1466494937;}s:64:"50e172edfc6165cfb063900399067858dbf0b6e071cd2334982d93ee732f25c7";a:4:{s:10:"expiration";i:1466761501;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1466588701;}s:64:"09d662ac148cefa0811aadbcbd0775b29e8dafe5d08fe4eed77f8771195a112d";a:4:{s:10:"expiration";i:1466775882;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:104:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36";s:5:"login";i:1466603082;}}'),
(193, 1, 'wp_media_library_mode', 'list'),
(194, 2, 'session_tokens', 'a:1:{s:64:"2f922a6ab5b2c3631358fa59cf4bc5edf40232144447d237513a5838f63da216";a:4:{s:10:"expiration";i:1557916874;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557744074;}}');

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
(1, 'admin', '$P$BGqrPQwpL.EcSzvYDSjoAttEb.n4kN.', 'admin', 'a8000004@xtec.cat', '', '0000-00-00 00:00:00', '', 0, 'admin'),
(2, 'xtecadmin', '$P$BpltQPrmy9rreMYjxcapAkeQS1KpP.0', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:45:10', '', 0, 'xtecadmin');

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
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
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10574;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6028;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8405;
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
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=313;
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
