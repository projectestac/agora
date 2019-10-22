-- phpMyAdmin SQL Dump
-- version 4.2.13.3
-- http://www.phpmyadmin.net
--
-- Host: pdb-int:3308
-- Generation Time: 18-10-2019 a les 11:51:44
-- Versió del servidor: 5.6.35-log
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usu6`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_bpges_subscriptions`
--

INSERT INTO `wp_bpges_subscriptions` (`id`, `user_id`, `group_id`, `type`) VALUES
(1, 2, 1, 'dig'),
(2, 2, 2, 'dig');

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
(1, 2, 'members', 'last_activity', '', '', '', 0, NULL, '2019-05-13 12:44:08', 0, 0, 0, 0),
(2, 1, 'members', 'last_activity', '', '', '', 0, NULL, '2017-02-13 10:14:59', 0, 0, 0, 0),
(4, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterpri/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterpri/nodes/educacio-emocional/">Educació emocional</a>', 'Hola noders, bon dia! Avui us portem un vídeo molt xulo sobre com fer espai als altres: \n\nhttps://www.youtube.com/watch?v=LAOICItn3MM', 'https://pwc-int.educacio.intranet/agora/masterpri/membres/admin/', 1, 0, '2014-09-22 16:45:52', 0, 0, 0, 0),
(6, 1, 'groups', 'activity_update', '<a href="https://pwc-int.educacio.intranet/agora/masterpri/membres/admin/" title="admin">admin</a> ha fet una actualització al node <a href="https://pwc-int.educacio.intranet/agora/masterpri/nodes/mestres-1124779421/">Mestres</a>', 'Hola companys, us comparteixo un vídeo sobre educació emocional que em va agradar molt!\n\nhttps://www.youtube.com/watch?v=PQE4WqQSOcQ', 'https://pwc-int.educacio.intranet/agora/masterpri/membres/admin/', 2, 0, '2014-09-22 16:52:17', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_activity_meta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_activity_meta` (
`id` bigint(20) NOT NULL,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_activity_meta`
--

INSERT INTO `wp_bp_activity_meta` (`id`, `activity_id`, `meta_key`, `meta_value`) VALUES
(1, 4, '_oembed_f53b3de240959214172fa71fad6db8c8', '<iframe width="500" height="281" src="https://www.youtube.com/embed/LAOICItn3MM?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(2, 6, '_oembed_9a9cd4314ec5c6c352acee421db4e1c2', '<iframe width="500" height="281" src="https://www.youtube.com/embed/PQE4WqQSOcQ?feature=oembed" frameborder="0" allowfullscreen></iframe>'),
(3, 4, '_oembed_7e2486a193c4b25b73685d0fb898a024', '<iframe width="500" height="281" src="https://www.youtube.com/embed/LAOICItn3MM?feature=oembed" frameborder="0" allowfullscreen></iframe>');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups`
--

INSERT INTO `wp_bp_groups` (`id`, `creator_id`, `name`, `slug`, `description`, `status`, `enable_forum`, `date_created`, `parent_id`) VALUES
(1, 1, 'Educació emocional', 'educacio-emocional', 'Node sobre educació emocional', 'public', 0, '2014-09-22 16:44:12', 0),
(2, 1, 'Mestres', 'mestres-1124779421', 'Node dels mestres', 'private', 0, '2014-09-22 16:50:08', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_bp_groups_groupmeta`
--

CREATE TABLE IF NOT EXISTS `wp_bp_groups_groupmeta` (
`id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_groupmeta`
--

INSERT INTO `wp_bp_groups_groupmeta` (`id`, `group_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'total_member_count', '1'),
(2, 1, 'last_activity', '2014-09-22 16:45:52'),
(3, 1, 'ass_default_subscription', 'dig'),
(4, 1, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(5, 1, 'invite_status', 'admins'),
(6, 1, 'bp-docs', 'a:1:{s:10:"can-create";s:6:"member";}'),
(7, 2, 'total_member_count', '1'),
(8, 2, 'last_activity', '2016-01-21 18:33:08'),
(9, 2, 'ass_default_subscription', 'dig'),
(10, 2, 'ass_subscribed_users', 'a:1:{i:2;s:3:"dig";}'),
(11, 2, 'invite_status', 'admins');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `wp_bp_groups_members`
--

INSERT INTO `wp_bp_groups_members` (`id`, `group_id`, `user_id`, `inviter_id`, `is_admin`, `is_mod`, `user_title`, `date_modified`, `comments`, `is_confirmed`, `is_banned`, `invite_sent`) VALUES
(1, 1, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 16:44:05', '', 1, 0, 0),
(2, 2, 1, 0, 1, 0, 'Administrador/a del node', '2014-09-22 16:49:49', '', 1, 0, 0);

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
(1, 1, 2, 'xtecadmin', '2015-10-27 10:48:34'),
(2, 1, 1, 'admin', '2016-03-29 11:39:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_ig_campaigns`
--

INSERT INTO `wp_ig_campaigns` (`id`, `slug`, `name`, `type`, `from_name`, `from_email`, `reply_to_name`, `reply_to_email`, `sequence_ids`, `categories`, `list_ids`, `base_template_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sha-publicat-un-article-nou-posttitle', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '####Portada## ##', '1', 459, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sha-publicat-un-article-nou-posttitle-2', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##P3## ##', '0', 460, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sha-publicat-un-article-nou-posttitle-3', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##P4## ##', '0', 461, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'sha-publicat-un-article-nou-posttitle-4', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##P5## ##', '0', 462, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sha-publicat-un-article-nou-posttitle-5', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##1r## ##', '0', 463, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'sha-publicat-un-article-nou-posttitle-6', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##2n## ##', '0', 464, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'sha-publicat-un-article-nou-posttitle-7', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##3r## ##', '0', 465, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sha-publicat-un-article-nou-posttitle-8', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##4t## ##', '0', 466, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'sha-publicat-un-article-nou-posttitle-9', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##5è## ##', '0', 467, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'sha-publicat-un-article-nou-posttitle-10', 'S''ha publicat un article nou:  {{POSTTITLE}}', 'post_notification', 'Admin', 'a8000006@xtec.cat', 'Admin', 'a8000006@xtec.cat', '', '## ##6è## ##', '0', 468, 1, '2019-05-13 07:44:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 0, 'Admin', '', 'a8000006@xtec.cat', 'Migrated', 0, 'verified', 0, 'nyboat-nrdukw-uwebnv-vkjqxt-gyfatk', '2016-04-05 11:55:56', '2019-05-13 07:44:20', 1, 0, 0, 0, 1, 1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=10593 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(2, 'blogname', 'Escola L&#039;Arany', 'yes'),
(3, 'blogdescription', 'Web en construcció', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'a8000006@xtec.cat', 'yes'),
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
(22, 'date_format', 'j \\d\\e F \\d\\e Y', 'yes'),
(23, 'time_format', 'G:i', 'yes'),
(24, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y G:i', 'yes'),
(25, 'comment_moderation', '', 'yes'),
(26, 'moderation_notify', '1', 'yes'),
(27, 'permalink_structure', '/%category%/%postname%/', 'yes'),
(29, 'hack_file', '0', 'yes'),
(30, 'blog_charset', 'UTF-8', 'yes'),
(31, 'moderation_keys', '', 'no'),
(32, 'active_plugins', 'a:33:{i:0;s:25:"add-to-any/add-to-any.php";i:1;s:42:"bbpress-enable-tinymce-visual-tab/init.php";i:2;s:19:"bbpress/bbpress.php";i:3;s:37:"blogger-importer/blogger-importer.php";i:4;s:33:"buddypress-activity-plus/bpfb.php";i:5;s:26:"buddypress-docs/loader.php";i:6;s:64:"buddypress-group-email-subscription/bp-activity-subscription.php";i:7;s:34:"buddypress-like/bp-like-loader.php";i:8;s:24:"buddypress/bp-loader.php";i:9;s:39:"disable-gutenberg/disable-gutenberg.php";i:10;s:39:"email-subscribers/email-subscribers.php";i:11;s:41:"enllacos-educatius/enllacos-educatius.php";i:12;s:43:"google-analyticator/google-analyticator.php";i:13;s:49:"google-calendar-events/google-calendar-events.php";i:14;s:27:"grup-classe/grup_classe.php";i:15;s:67:"import-users-from-csv-with-meta/import-users-from-csv-with-meta.php";i:16;s:31:"invite-anyone/invite-anyone.php";i:17;s:69:"pending-submission-notifications/pending-submission-notifications.php";i:18;s:27:"private-bp-pages/loader.php";i:19;s:25:"slideshare/slideshare.php";i:20;s:44:"slideshow-jquery-image-gallery/slideshow.php";i:21;s:27:"socialmedia/socialmedia.php";i:22;s:30:"table-of-contents-plus/toc.php";i:23;s:37:"tinymce-advanced/tinymce-advanced.php";i:24;s:71:"widget-visibility-without-jetpack/widget-visibility-without-jetpack.php";i:25;s:41:"wordpress-importer/wordpress-importer.php";i:26;s:42:"wordpress-social-login/wp-social-login.php";i:27;s:33:"wordpress-telegram/wptelegram.php";i:28;s:29:"wp-recaptcha/wp-recaptcha.php";i:29;s:29:"xtec-booking/xtec-booking.php";i:30;s:35:"xtec-ldap-login/xtec-ldap-login.php";i:31;s:23:"xtec-mail/xtec-mail.php";i:32;s:25:"xtec-stats/xtec-stats.php";}', 'yes'),
(33, 'home', 'https://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(34, 'category_base', '/categoria', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(37, 'comment_max_links', '3', 'yes'),
(38, 'gmt_offset', '', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'reactor', 'yes'),
(42, 'stylesheet', 'reactor-primaria-1', 'yes'),
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
(53, 'default_link_category', '2', 'yes'),
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
(80, 'widget_text', 'a:6:{i:1;a:0:{}i:3;a:4:{s:5:"title";s:10:"Benvinguts";s:4:"text";s:226:"En aquesta pàgina podeu trobar tota la informació referent a l''AMPA del centre.\r\n\r\nPer contactar amb l''AMPA: \r\n\r\n<strong>Correu electrònic:</strong>\r\ncorreuampa@elnostrecentre.cat\r\n\r\n<strong>Telèfon:</strong>\r\n123 45 67 89";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"7";}}}}i:4;a:4:{s:5:"title";s:5:"Ginys";s:4:"text";s:615:"<p>En aquesta barra lateral hi podeu posar tots els ginys que considereu necessaris. Els ginys es poden modificar, afegir o treure de la barra lateral des de la secció <strong>Aparença - Ginys</strong> del Tauler.</p>\r\n<p>Quan afegiu un giny a la barra, aquest es mostra per defecte a totes les pàgines de categoria. Si voleu que aparegui només en una categoria determinada, canvieu els paràmetres de "Visibilitat" fent clic al botó que trobareu a la part inferior de les propietats del giny.</p>\r\n<p><a href=http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=1302&mode=entry&hook=1941>Ajuda</a></p>";s:6:"filter";b:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:0:"";}}}}i:5;a:3:{s:5:"title";s:0:"";s:4:"text";s:425:"<a class="twitter-timeline" href="https://twitter.com/escolalarany" data-widget-id="514020442797903872">Tuits de @escolalarany</a>\r\n<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;i:7;a:4:{s:5:"title";s:18:"Menú de documents";s:4:"text";s:185:"Aquí podeu afegir un menú personalitzat amb enllaços a documents interns i externs, etiquetes de documents etc. A la visibilitat del giny, heu de posar: Pàgina / Index de Documents.";s:6:"filter";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:2:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:10:"docs-index";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:16:"post_type-bp_doc";}}}}}', 'yes'),
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
(91, 'widget_recent-posts', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:6:"number";i:5;s:7:"exclude";s:0:"";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:6:"number";i:5;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"categoria";a:14:{i:0;s:10:"nav_menu-2";i:1;s:10:"nav_menu-3";i:2;s:6:"text-3";i:3;s:20:"grup_classe_widget-5";i:4;s:20:"grup_classe_widget-6";i:5;s:20:"grup_classe_widget-7";i:6;s:20:"grup_classe_widget-8";i:7;s:20:"grup_classe_widget-9";i:8;s:21:"grup_classe_widget-10";i:9;s:20:"grup_classe_widget-2";i:10;s:20:"grup_classe_widget-3";i:11;s:20:"grup_classe_widget-4";i:12;s:6:"text-4";i:13;s:13:"xtec_widget-3";}s:7:"sidebar";a:9:{i:0;s:10:"nav_menu-5";i:1;s:17:"slideshowwidget-2";i:2;s:18:"bp_groups_widget-4";i:3;s:32:"bp_core_recently_active_widget-2";i:4;s:14:"recent-posts-2";i:5;s:17:"recent-comments-2";i:6;s:11:"tag_cloud-2";i:7;s:10:"archives-2";i:8;s:6:"text-7";}s:9:"sidebar-2";a:0:{}s:17:"sidebar-frontpage";a:5:{i:0;s:20:"logo_centre_widget-2";i:1;s:12:"gce_widget-2";i:2;s:6:"text-5";i:3;s:13:"xtec_widget-2";i:4;s:24:"email-subscribers-form-3";}s:19:"sidebar-frontpage-2";a:0:{}s:14:"sidebar-footer";a:2:{i:0;s:20:"socialmedia_widget-2";i:1;s:20:"logo_centre_widget-3";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:8:{i:1537434649;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1537434660;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537449322;a:1:{s:12:"remove_stats";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537456026;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1537498800;a:1:{s:16:"ass_digest_event";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1557733460;a:2:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}s:23:"ig_es_cron_fifteen_mins";a:1:{s:32:"3533f9d17b8da8f5010cc25ee58dc062";a:3:{s:8:"schedule";s:27:"ig_es_fifteen_mins_interval";s:4:"args";a:2:{i:0;s:4:"cron";i:1;s:34:"wyifls-ikzlmd-adwxps-vhtubl-rtkpow";}s:8:"interval";i:900;}}}i:1557742863;a:1:{s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(119, 'recently_activated', 'a:0:{}', 'yes'),
(122, '_bbp_private_forums', 'a:0:{}', 'yes'),
(123, '_bbp_hidden_forums', 'a:0:{}', 'yes'),
(124, '_bbp_db_version', '250', 'yes'),
(125, 'bp-deactivated-components', 'a:0:{}', 'yes'),
(126, 'bb-config-location', '/dades/agora/html/wordpress/bb-config.php', 'yes'),
(127, 'bp-xprofile-base-group-name', 'Base', 'yes'),
(128, 'bp-xprofile-fullname-field-name', 'Name', 'yes'),
(129, 'bp-blogs-first-install', '', 'yes'),
(130, 'bp-disable-profile-sync', '0', 'yes'),
(131, 'hide-loggedout-adminbar', '0', 'yes'),
(132, 'bp-disable-avatar-uploads', '0', 'yes'),
(133, 'bp-disable-account-deletion', '1', 'yes'),
(134, 'bp-disable-blogforum-comments', '1', 'yes'),
(135, '_bp_theme_package_id', 'legacy', 'yes'),
(136, 'bp_restrict_group_creation', '1', 'yes'),
(137, '_bp_enable_akismet', '1', 'yes'),
(138, '_bp_enable_heartbeat_refresh', '1', 'yes'),
(139, '_bp_force_buddybar', '', 'yes'),
(140, '_bp_retain_bp_default', '', 'yes'),
(141, 'widget_bp_core_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(142, 'widget_bp_core_members_widget', 'a:4:{i:1;a:0:{}s:12:"_multiwidget";i:1;i:3;a:0:{}i:5;a:0:{}}', 'yes'),
(143, 'widget_bp_core_whos_online_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(144, 'widget_bp_core_recently_active_widget', 'a:4:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:17:"Han entrat fa poc";s:11:"max_members";s:2:"50";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;i:4;a:0:{}}', 'yes'),
(145, 'widget_bp_groups_widget', 'a:2:{i:4;a:5:{s:5:"title";s:5:"Nodes";s:10:"max_groups";s:1:"5";s:13:"group_default";s:6:"active";s:10:"link_title";b:1;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(146, 'widget_bp_messages_sitewide_notices_widget', '', 'yes'),
(151, 'registration', '0', 'yes'),
(152, 'bp-active-components', 'a:8:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:7:"friends";s:1:"1";s:8:"messages";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}', 'yes'),
(153, 'bp-pages', 'a:5:{s:7:"members";i:6;s:8:"activity";i:5;s:6:"groups";i:141;s:8:"register";i:440;s:8:"activate";i:436;}', 'yes'),
(154, '_bp_db_version', '11105', 'yes'),
(156, 'bp_docs_attachment_protection', '1', 'yes'),
(157, 'ass_digest_time', 'a:2:{s:5:"hours";s:2:"05";s:7:"minutes";s:2:"00";}', 'yes'),
(158, 'ass_weekly_digest', '4', 'yes'),
(159, 'bp_like_db_version', '43', 'yes'),
(160, 'bp_like_settings', 'a:8:{s:17:"likers_visibility";N;s:23:"post_to_activity_stream";N;s:12:"show_excerpt";N;s:14:"excerpt_length";s:3:"140";s:12:"text_strings";a:29:{s:4:"like";a:2:{s:7:"default";s:8:"M''agrada";s:6:"custom";s:33:"<i class="fa fa-thumbs-o-up"></i>";}s:6:"unlike";a:2:{s:7:"default";s:11:"No m''agrada";s:6:"custom";s:31:"<i class="fa fa-thumbs-up"></i>";}s:14:"like_this_item";a:2:{s:7:"default";s:34:"Indica que aquest element m''agrada";s:6:"custom";s:34:"Indica que aquest element m''agrada";}s:16:"unlike_this_item";a:2:{s:7:"default";s:37:"Indica que aquest element no m''agrada";s:6:"custom";s:37:"Indica que aquest element no m''agrada";}s:10:"view_likes";a:2:{s:7:"default";s:19:"Mostra els m''agrada";s:6:"custom";s:19:"Mostra els m''agrada";}s:10:"hide_likes";a:2:{s:7:"default";s:18:"Amaga els m''agrada";s:6:"custom";s:18:"Amaga els m''agrada";}s:12:"update_likes";a:2:{s:7:"default";s:23:"Actualitza els m''agrada";s:6:"custom";s:23:"Actualitza els m''agrada";}s:19:"show_blogpost_likes";a:2:{s:7:"default";s:31:""M''agrada" d''enviaments de blog";s:6:"custom";s:31:""M''agrada" d''enviaments de blog";}s:17:"must_be_logged_in";a:2:{s:7:"default";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";s:6:"custom";s:53:"Heu d''estar autenticats per poder fer clic a m''agrada";}s:25:"record_activity_likes_own";a:2:{s:7:"default";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";s:6:"custom";s:79:"A %user% li ha agradat la seva pròpia <a href="%permalink%">actualització</a>";}s:24:"record_activity_likes_an";a:2:{s:7:"default";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";s:6:"custom";s:67:"A %user% li ha agradat una <a href="%permalink%">actualització</a>";}s:27:"record_activity_likes_users";a:2:{s:7:"default";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";s:6:"custom";s:90:"A %user% li ha agradat l''entrada de %author%'' al blog <a href="%permalink%">actualitza</a>";}s:34:"record_activity_likes_own_blogpost";a:2:{s:7:"default";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:88:"A %user% li ha agradat el seu propi enviament al blog, <a href="%permalink%">%title%</a>";}s:32:"record_activity_likes_a_blogpost";a:2:{s:7:"default";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:78:"A %user% li ha agradat un enviament al blog, <a href="%permalink%">%title%</a>";}s:36:"record_activity_likes_users_blogpost";a:2:{s:7:"default";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";s:6:"custom";s:89:"A %user% li ha agradat l''enviament de %author% al blog, <a href="%permalink%">%title%</a>";}s:20:"get_likes_only_liker";a:2:{s:7:"default";s:13:"T''ha agradat.";s:6:"custom";s:13:"T''ha agradat.";}s:26:"get_likes_you_and_singular";a:2:{s:7:"default";s:41:"A tu i a %count% altra persona us agrada.";s:6:"custom";s:41:"A tu i a %count% altra persona us agrada.";}s:26:"you_and_username_like_this";a:2:{s:7:"default";s:22:"A tu i a %s us agrada.";s:6:"custom";s:22:"A tu i a %s us agrada.";}s:24:"get_likes_you_and_plural";a:2:{s:7:"default";s:41:"A tu i a %count% persones més us agrada.";s:6:"custom";s:41:"A tu i a %count% persones més us agrada.";}s:31:"get_likes_count_people_singular";a:2:{s:7:"default";s:36:"%count% persona li ha agradat això.";s:6:"custom";s:36:"%count% persona li ha agradat això.";}s:29:"get_likes_count_people_plural";a:2:{s:7:"default";s:38:"%count% persones els ha agradat això.";s:6:"custom";s:38:"%count% persones els ha agradat això.";}s:29:"get_likes_and_people_singular";a:2:{s:7:"default";s:38:"i %count% persona li ha agradat això.";s:6:"custom";s:38:"i %count% persona li ha agradat això.";}s:27:"get_likes_and_people_plural";a:2:{s:7:"default";s:40:"i %count% persones els ha agradat això.";s:6:"custom";s:40:"i %count% persones els ha agradat això.";}s:13:"two_like_this";a:2:{s:7:"default";s:25:"%s i %s els agrada això.";s:6:"custom";s:25:"%s i %s els agrada això.";}s:14:"one_likes_this";a:2:{s:7:"default";s:20:"%s els agrada això.";s:6:"custom";s:20:"%s els agrada això.";}s:37:"get_likes_no_friends_you_and_singular";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% altra persona ho heu fet.";}s:35:"get_likes_no_friends_you_and_plural";a:2:{s:7:"default";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";s:6:"custom";s:86:"Cap dels teus amics ha clicat a m''agrada, però tu i %count% persones més ho heu fet.";}s:29:"get_likes_no_friends_singular";a:2:{s:7:"default";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";s:6:"custom";s:74:"Cap dels teus amics ha clicat a m''agrada, però %count% persona ho ha fet.";}s:27:"get_likes_no_friends_plural";a:2:{s:7:"default";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";s:6:"custom";s:76:"Cap dels teus amics ha clicat a m''agrada, però %count% persones ho han fet.";}}s:13:"translate_nag";N;s:14:"name_or_avatar";N;s:17:"remove_fav_button";N;}', 'yes'),
(161, 'bp_moderation_options', 'a:6:{s:14:"unflagged_text";s:9:"Inadequat";s:12:"flagged_text";s:16:"No és inadequat";s:12:"active_types";a:1:{s:16:"activity_comment";s:2:"on";}s:17:"warning_threshold";i:5;s:15:"warning_forward";s:17:"a8000006@xtec.cat";s:15:"warning_message";s:297:"Several user reported one of your content as inappropriate.\r\nYou can see the content in the page: %CONTENTURL%.\r\nYou posted this content with the account "%AUTHORNAME%".\r\n\r\nA community moderator will soon review and moderate this content if necessary.\r\n--------------------\r\n[%SITENAME%] %SITEURL%";}', 'yes'),
(162, 'bp_moderation_db_version', '-100', 'yes'),
(165, 'gce_general', 'a:7:{s:10:"stylesheet";s:0:"";s:10:"javascript";b:0;s:7:"loading";s:12:"Carregant...";s:5:"error";s:65:"El calendari no està disponible, torna a provar en uns minuts...";s:6:"fields";b:1;s:14:"old_stylesheet";b:0;s:13:"save_settings";b:1;}', 'yes'),
(166, 'invite_anyone', 'a:22:{s:11:"max_invites";i:5;s:23:"allow_email_invitations";s:3:"all";s:23:"message_is_customizable";s:3:"yes";s:23:"subject_is_customizable";s:2:"no";s:28:"can_send_group_invites_email";s:3:"yes";s:24:"bypass_registration_lock";s:3:"yes";s:7:"version";s:5:"1.4.0";s:23:"email_visibility_toggle";s:8:"no_limit";s:18:"email_since_toggle";b:0;s:10:"days_since";s:1:"0";s:17:"email_role_toggle";s:3:"yes";s:12:"minimum_role";s:13:"Administrator";s:22:"email_blacklist_toggle";b:0;s:15:"email_blacklist";s:0:"";s:23:"group_invites_can_admin";s:6:"anyone";s:29:"group_invites_can_group_admin";s:6:"anyone";s:27:"group_invites_can_group_mod";s:6:"anyone";s:30:"group_invites_can_group_member";s:5:"noone";s:32:"group_invites_enable_create_step";s:3:"yes";s:19:"cloudsponge_enabled";s:3:"off";s:26:"email_limit_invites_toggle";b:0;s:22:"limit_invites_per_user";s:2:"10";}', 'yes'),
(167, 'invite_anyone_db_version', '1.4.0', 'yes'),
(168, 'slideshow-plugin-updated-from-v1-x-x-to-v2-0-1', 'updated', 'yes'),
(169, 'slideshow-plugin-updated-from-v2-to-v2-1-20', 'updated', 'yes'),
(170, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-22', 'updated', 'yes'),
(171, 'slideshow-jquery-image-gallery-updated-from-v2-1-20-to-v2-1-23', 'updated', 'yes'),
(172, 'slideshow-jquery-image-gallery-updated-from-v2-1-23-to-v2-2-0', 'updated', 'yes'),
(173, 'slideshow-jquery-image-gallery-updated-from-v2-2-0-to-v2-2-8', 'updated', 'yes'),
(174, 'slideshow-jquery-image-gallery-updated-from-v2-2-8-to-v2-2-12', 'updated', 'yes'),
(175, 'slideshow-jquery-image-gallery-updated-from-v2-2-12-to-v2-2-16', 'updated', 'yes'),
(176, 'slideshow-jquery-image-gallery-updated-from-v2-2-16-to-v2-2-17', 'updated', 'yes'),
(177, 'slideshow-jquery-image-gallery-updated-from-v2-2-17-to-v2-2-20', 'updated', 'yes'),
(178, 'slideshow-jquery-image-gallery-plugin-version', '2.3.1', 'yes'),
(179, 'social_articles_options', 'a:6:{s:13:"post_per_page";s:2:"10";s:14:"excerpt_length";s:2:"30";s:8:"workflow";s:8:"approval";s:16:"bp_notifications";s:4:"true";s:20:"allow_author_adition";s:4:"true";s:21:"allow_author_deletion";s:4:"true";}', 'yes'),
(181, 'wsl_database_migration_version', '4', 'yes'),
(182, 'wsl_components_core_enabled', '1', 'yes'),
(183, 'wsl_components_networks_enabled', '1', 'yes'),
(184, 'wsl_components_login-widget_enabled', '1', 'yes'),
(185, 'wsl_components_bouncer_enabled', '1', 'yes'),
(186, 'wsl_components_diagnostics_enabled', '1', 'yes'),
(187, 'wsl_settings_welcome_panel_enabled', '', 'yes'),
(188, 'wsl_settings_redirect_url', 'https://pwc-int.educacio.intranet/agora/masterpri', 'yes'),
(189, 'wsl_settings_connect_with_label', 'Connect with:', 'yes'),
(190, 'wsl_settings_use_popup', '2', 'yes'),
(191, 'wsl_settings_widget_display', '1', 'yes'),
(192, 'wsl_settings_authentication_widget_css', '#wp-social-login-connect-with {font-weight: bold;}\n#wp-social-login-connect-options {padding:10px;}\n#wp-social-login-connect-options a {text-decoration: none;}\n#wp-social-login-connect-options img {border:0 none;}\n.wsl_connect_with_provider {}', 'yes'),
(193, 'wsl_settings_bouncer_registration_enabled', '1', 'yes'),
(194, 'wsl_settings_bouncer_authentication_enabled', '1', 'yes'),
(195, 'wsl_settings_bouncer_linking_accounts_enabled', '2', 'yes'),
(196, 'wsl_settings_bouncer_profile_completion_require_email', '2', 'yes'),
(197, 'wsl_settings_bouncer_profile_completion_change_email', '2', 'yes'),
(198, 'wsl_settings_bouncer_profile_completion_change_username', '2', 'yes'),
(199, 'wsl_settings_bouncer_profile_completion_text_notice', 'Almost there, we just need to check a couple of things', 'yes'),
(200, 'wsl_settings_bouncer_profile_completion_text_submit_button', 'Continue', 'yes'),
(201, 'wsl_settings_bouncer_profile_completion_text_email', 'E-mail', 'yes'),
(202, 'wsl_settings_bouncer_profile_completion_text_username', 'Username', 'yes'),
(203, 'wsl_settings_bouncer_profile_completion_text_email_invalid', 'E-mail is not valid!', 'yes'),
(204, 'wsl_settings_bouncer_profile_completion_text_username_invalid', 'Username is not valid!', 'yes'),
(205, 'wsl_settings_bouncer_profile_completion_text_email_exists', 'That E-mail is already registered!', 'yes'),
(206, 'wsl_settings_bouncer_profile_completion_text_username_exists', 'That Username is already registered!', 'yes'),
(207, 'wsl_settings_bouncer_profile_completion_text_connected_with', 'You are now connected via', 'yes'),
(208, 'wsl_settings_bouncer_new_users_moderation_level', '1', 'yes'),
(209, 'wsl_settings_bouncer_new_users_membership_default_role', 'default', 'yes'),
(210, 'wsl_settings_bouncer_new_users_restrict_domain_enabled', '2', 'yes'),
(211, 'wsl_settings_bouncer_new_users_restrict_domain_text_bounce', 'Bouncer says no.', 'yes'),
(212, 'wsl_settings_bouncer_new_users_restrict_email_enabled', '2', 'yes'),
(213, 'wsl_settings_bouncer_new_users_restrict_email_text_bounce', 'Bouncer say he refuses.', 'yes'),
(214, 'wsl_settings_bouncer_new_users_restrict_profile_enabled', '2', 'yes'),
(215, 'wsl_settings_bouncer_new_users_restrict_profile_text_bounce', 'Bouncer say only Mundo can go where he pleases!', 'yes'),
(216, 'wsl_settings_contacts_import_facebook', '2', 'yes'),
(217, 'wsl_settings_contacts_import_google', '2', 'yes'),
(218, 'wsl_settings_contacts_import_twitter', '2', 'yes'),
(219, 'wsl_settings_contacts_import_live', '2', 'yes'),
(220, 'wsl_settings_contacts_import_linkedin', '2', 'yes'),
(221, 'wsl_settings_Google_enabled', '0', 'yes'),
(222, 'wsl_settings_Moodle_enabled', '0', 'yes'),
(224, 'xtec_mail_idapp', 'AGORA', 'yes'),
(225, 'xtec_mail_replyto', 'agora-noreply@xtec.cat', 'yes'),
(226, 'xtec_mail_sender', 'educacio', 'yes'),
(227, 'xtec_mail_log', '0', 'yes'),
(228, 'xtec_mail_debug', '0', 'yes'),
(229, 'xtec_mail_logpath', '', 'yes'),
(233, 'current_theme', 'NODES', 'yes'),
(234, 'theme_mods_reactor-primaria-1', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:9:"main-menu";i:6;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
(235, 'theme_switched', '', 'yes'),
(237, 'widget_pages', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(238, 'widget_calendar', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(239, 'widget_tag_cloud', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:0:"";s:8:"taxonomy";s:8:"post_tag";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:14:"post_type-post";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(240, 'widget_nav_menu', 'a:5:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:15:"Blogs de classe";s:8:"nav_menu";i:35;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"2";s:12:"has_children";b:0;}}}}i:3;a:3:{s:5:"title";s:15:"Blogs de classe";s:8:"nav_menu";i:36;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:3:{s:5:"major";s:8:"category";s:5:"minor";s:1:"5";s:12:"has_children";b:0;}}}}i:5;a:2:{s:8:"nav_menu";i:21;s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:5:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:8:"activity";}i:1;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:5:"group";}i:2;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:6:"member";}i:3;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"6";}i:4;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:3:"141";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(241, 'widget_bbp_login_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(242, 'widget_bbp_views_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(243, 'widget_bbp_search_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'widget_bbp_forums_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(245, 'widget_bbp_topics_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(246, 'widget_bbp_replies_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(247, 'widget_bbp_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(248, 'widget_gce_widget', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:11:"calendar_id";i:145;}s:12:"_multiwidget";i:1;}', 'yes'),
(249, 'widget_slideshowwidget', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:9:"Destacats";s:11:"slideshowId";s:3:"140";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:4:"page";s:5:"minor";s:1:"5";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_invite-anyone-widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_xtec_widget', 'a:4:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:0:"";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:3:"arc";s:0:"";s:7:"odissea";s:0:"";s:4:"ampa";s:0:"";s:12:"escola-verda";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:14:"familia-escola";s:0:"";s:15:"internet-segura";s:0:"";s:6:"moodle";s:0:"";s:8:"ampa_url";s:54:"https://pwc-int.educacio.intranet/agora/masterpri/ampa";s:16:"escola-verda_url";s:127:"http://mediambient.gencat.cat/ca/05_ambits_dactuacio/educacio_i_sostenibilitat/educacio_per_a_la_sostenibilitat/escoles_verdes/";}i:3;a:13:{s:5:"title";s:19:"Enllaços educatius";s:11:"ensenyament";s:2:"on";s:4:"xtec";s:2:"on";s:6:"edu365";s:2:"on";s:4:"edu3";s:2:"on";s:12:"xarxa-docent";s:0:"";s:10:"alexandria";s:0:"";s:6:"linkat";s:0:"";s:5:"jclic";s:0:"";s:5:"merli";s:0:"";s:4:"atri";s:0:"";s:4:"saga";s:0:"";s:15:"internet-segura";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'widget_logo_centre_widget', 'a:4:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:0:"";}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(253, 'reactor_options', 'a:23:{s:15:"tamany_font_nom";s:5:"2.5vw";s:16:"imatge_capcalera";s:0:"";s:8:"carrusel";s:3:"103";s:10:"logo_image";s:97:"https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/logo-escola.png";s:16:"nomCanonicCentre";s:18:"Escola Josep Arany";s:14:"direccioCentre";s:21:"Plaça de la Vila, 14";s:8:"cpCentre";s:21:"01234 Abella de Xerta";s:9:"telCentre";s:10:"12 345 678";s:10:"googleMaps";s:25:"https://goo.gl/maps/GTGDy";s:13:"paleta_colors";s:12:"taronja-verd";s:14:"frontpage_page";s:1:"9";s:23:"frontpage_post_category";s:1:"4";s:16:"frontpage_layout";s:4:"2c-l";s:26:"frontpage_posts_per_fila_1";s:2:"33";s:26:"frontpage_posts_per_fila_2";s:1:"2";s:26:"frontpage_posts_per_fila_n";s:1:"2";s:22:"frontpage_number_posts";s:2:"20";s:21:"frontpage_link_titles";b:1;s:13:"post_readmore";s:14:"Llegeix més»";s:13:"favicon_image";s:0:"";s:11:"logo_inline";b:1;s:14:"contacteCentre";s:65:"https://pwc-int.educacio.intranet/agora/masterpri/lescola/on-som/";s:12:"correuCentre";s:0:"";}', 'yes'),
(254, 'icones_capcalera', '', 'yes'),
(281, 'tadv_settings', 'a:6:{s:7:"options";s:15:"menubar,advlist";s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(282, 'tadv_admin_settings', 'a:1:{s:7:"options";a:0:{}}', 'yes'),
(283, 'tadv_version', '4000', 'yes'),
(306, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(312, 'category_8', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(367, 'my_option_name', 'a:13:{s:6:"icon11";s:14:"format-gallery";s:11:"link_icon11";s:110:"https://picasaweb.google.com/104252377742684144682/ExempleDeGaleriaDeFotosDeLEscola?authuser=0&feat=directlink";s:12:"title_icon11";s:5:"FOTOS";s:6:"icon12";s:6:"groups";s:11:"link_icon12";s:65:"https://pwc-int.educacio.intranet/agora/masterpri/categoria/ampa/";s:12:"title_icon12";s:4:"AMPA";s:6:"icon21";s:6:"carrot";s:11:"link_icon21";s:75:"https://pwc-int.educacio.intranet/agora/masterpri/serveis/menjador-escolar/";s:12:"title_icon21";s:8:"MENJADOR";s:6:"icon22";s:11:"format-chat";s:11:"link_icon22";s:59:"https://pwc-int.educacio.intranet/agora/masterpri/activitat";s:12:"title_icon22";s:5:"NODES";s:14:"show_text_icon";s:2:"si";}', 'yes'),
(446, 'bpfb', 'a:5:{s:5:"theme";s:3:"new";s:9:"alignment";s:4:"left";s:12:"oembed_width";i:450;s:20:"thumbnail_size_width";i:450;s:21:"thumbnail_size_height";i:450;}', 'yes'),
(458, 'bphelp-my-redirect-slug', 'wp-login.php', 'yes'),
(595, 'widget_bp_core_friends_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(619, 'gce_settings_general', 'a:2:{s:13:"save_settings";i:1;s:14:"always_enqueue";i:1;}', 'yes'),
(622, 'gce_cpt_setup', '1', 'yes'),
(671, 'ga_version', '6.4.7.3', 'yes'),
(672, 'ga_status', 'disabled', 'yes'),
(673, 'ga_disable_gasites', 'disabled', 'yes'),
(674, 'ga_analytic_snippet', 'enabled', 'yes'),
(675, 'ga_uid', 'UA-XXXXXXXX-X', 'yes'),
(676, 'ga_admin_status', 'enabled', 'yes'),
(677, 'ga_admin_disable_DimentionIndex', '', 'yes'),
(678, 'ga_admin_disable', 'remove', 'yes'),
(679, 'ga_admin_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(680, 'ga_dashboard_role', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(681, 'key_ga_show_ad', '1', 'yes'),
(682, 'ga_adsense', '', 'yes'),
(683, 'ga_extra', '', 'yes'),
(684, 'ga_extra_after', '', 'yes'),
(685, 'ga_event', 'enabled', 'yes'),
(686, 'ga_outbound', 'enabled', 'yes'),
(687, 'ga_outbound_prefix', 'outgoing', 'yes'),
(688, 'ga_enhanced_link_attr', 'disabled', 'yes'),
(689, 'ga_downloads', '', 'yes'),
(690, 'ga_downloads_prefix', 'download', 'yes'),
(691, 'ga_widgets', 'enabled', 'yes'),
(692, 'ga_annon', '', 'yes'),
(693, 'ga_defaults', 'yes', 'yes'),
(694, 'ga_google_token', '', 'yes'),
(777, 'widget_socialmedia_widget', 'a:3:{i:1;a:0:{}i:2;a:21:{s:5:"title";s:12:"Segueix-nos!";s:4:"mida";s:7:"fa-2-5x";s:11:"twitter_url";s:20:"twitter de la escola";s:12:"facebook_url";s:21:"facebook de la escola";s:15:"google-plus_url";s:0:"";s:11:"youtube_url";s:20:"youtube de la escola";s:9:"vimeo_url";s:0:"";s:10:"picasa_url";s:0:"";s:10:"flickr_url";s:0:"";s:13:"pinterest_url";s:0:"";s:13:"instagram_url";s:0:"";s:10:"tumblr_url";s:0:"";s:14:"soundcloud_url";s:0:"";s:11:"dropbox_url";s:0:"";s:7:"rss_url";s:54:"https://pwc-int.educacio.intranet/agora/masterpri/feed";s:9:"email_url";s:0:"";s:10:"moodle_url";s:0:"";s:14:"xarxanodes_url";s:59:"https://pwc-int.educacio.intranet/agora/masterpri/activitat";s:8:"docs_url";s:0:"";s:9:"fotos_url";s:0:"";s:9:"video_url";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(787, 'category_10', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(791, 'category_11', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(793, 'category_12', 'a:1:{s:13:"articles_fila";s:0:"";}', 'yes'),
(840, 'WPLANG', 'ca', 'yes'),
(841, 'db_upgraded', '', 'yes'),
(843, 'wsl_settings_Google_app_scope', 'profile https://www.googleapis.com/auth/plus.profile.emails.read', 'yes'),
(848, 'widget_grup_classe_widget', 'a:10:{i:2;a:12:{s:5:"title";s:13:"El blog de P3";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p3@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"3";}}}}i:3;a:12:{s:5:"title";s:13:"El blog de P4";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p4@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"8";}}}}i:4;a:12:{s:5:"title";s:13:"El blog de P5";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.p5@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:1:"9";}}}}i:5;a:12:{s:5:"title";s:10:"Blog de 1r";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.1r@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"10";}}}}i:6;a:12:{s:5:"title";s:10:"Blog de 2n";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:0:"";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.2n@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"11";}}}}i:7;a:12:{s:5:"title";s:10:"Blog de 3r";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.3r@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"12";}}}}i:8;a:12:{s:5:"title";s:10:"Blog de 4t";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.4t@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"13";}}}}i:9;a:12:{s:5:"title";s:11:"Blog de 5è";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.5e@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"14";}}}}i:10;a:12:{s:5:"title";s:11:"Blog de 6è";s:12:"id_calendari";s:3:"145";s:13:"nom_calendari";s:6:"Agenda";s:14:"calendari_grid";b:1;s:14:"calendari_list";b:0;s:9:"nom_tutor";s:15:"Nom del tutor/a";s:11:"email_tutor";s:21:"tutor.6e@escarany.cat";s:15:"horari_families";s:15:"dl. 00:00-00:00";s:8:"nav_menu";s:2:"20";s:9:"text_open";s:107:"<img src=https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png>";s:10:"text_close";s:71:"Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum";s:10:"conditions";a:2:{s:6:"action";s:4:"show";s:5:"rules";a:1:{i:0;a:2:{s:5:"major";s:8:"category";s:5:"minor";s:2:"15";}}}}s:12:"_multiwidget";i:1;}', 'yes'),
(857, 'bpfb_plugin', 'a:1:{s:9:"installed";i:1;}', 'yes'),
(930, 'wsl_components_users_enabled', '1', 'yes'),
(957, 'bp_disable_blogforum_comments', '1', 'yes'),
(1339, 'wsl_settings_Google_app_id', '', 'yes'),
(1340, 'wsl_settings_Google_app_secret', '', 'yes'),
(1341, 'wsl_settings_Moodle_app_id', '', 'yes'),
(1342, 'wsl_settings_Moodle_app_secret', '', 'yes'),
(1343, 'wsl_settings_Moodle_url', '', 'yes'),
(1461, 'widget_xtec_stats_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1555, 'addtoany_options', 'a:37:{s:8:"position";s:6:"bottom";s:30:"display_in_posts_on_front_page";s:2:"-1";s:33:"display_in_posts_on_archive_pages";s:1:"1";s:19:"display_in_excerpts";s:2:"-1";s:16:"display_in_posts";s:1:"1";s:16:"display_in_pages";s:1:"1";s:15:"display_in_feed";s:2:"-1";s:10:"show_title";s:2:"-1";s:7:"onclick";s:2:"-1";s:9:"icon_size";s:2:"32";s:6:"button";s:10:"A2A_SVG_32";s:13:"button_custom";s:0:"";s:6:"header";s:0:"";s:23:"additional_js_variables";s:0:"";s:12:"custom_icons";s:2:"-1";s:16:"custom_icons_url";s:1:"/";s:17:"custom_icons_type";s:3:"png";s:10:"inline_css";s:1:"1";s:5:"cache";s:2:"-1";s:20:"display_in_cpt_forum";s:2:"-1";s:20:"display_in_cpt_topic";s:2:"-1";s:20:"display_in_cpt_reply";s:2:"-1";s:21:"display_in_cpt_bp_doc";s:2:"-1";s:23:"display_in_cpt_gce_feed";s:2:"-1";s:11:"button_text";s:10:"Comparteix";s:24:"special_facebook_options";a:1:{s:10:"show_count";s:2:"-1";}s:23:"special_twitter_options";a:1:{s:10:"show_count";s:2:"-1";}s:15:"active_services";a:3:{i:0;s:8:"facebook";i:1;s:7:"twitter";i:2;s:11:"google_plus";}s:29:"special_facebook_like_options";a:1:{s:4:"verb";s:4:"like";}s:29:"special_twitter_tweet_options";a:1:{s:10:"show_count";s:2:"-1";}s:30:"special_google_plusone_options";a:1:{s:10:"show_count";s:2:"-1";}s:33:"special_google_plus_share_options";a:1:{s:10:"show_count";s:2:"-1";}s:29:"special_pinterest_pin_options";a:1:{s:10:"show_count";s:2:"-1";}s:17:"button_show_count";s:2:"-1";s:14:"additional_css";s:0:"";s:18:"custom_icons_width";s:0:"";s:19:"custom_icons_height";s:0:"";}', 'yes'),
(1562, 'nodesbox_name', 'Escola L&#039;Arany', 'yes'),
(1572, 'widget_a2a_follow_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(1573, 'widget_a2a_share_save_widget', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(1627, 'common_css', '', 'yes'),
(1674, 'recaptcha_options', 'a:5:{s:8:"site_key";s:40:"6LddJgoTAAAAAFCT6LwNkKU2YR2qNMG7fQgIXse8";s:6:"secret";s:40:"6LddJgoTAAAAAKs-yBghGgTZmAB1oPLQlldWYKAh";s:14:"comments_theme";s:8:"standard";s:18:"recaptcha_language";s:2:"ca";s:17:"no_response_error";s:58:"<strong>ERROR</strong>: Please fill in the reCAPTCHA form.";}', 'yes'),
(1735, 'bp_docs_associated_item_children', 'a:0:{}', 'yes'),
(1767, 'bp-disable-group-cover-image-uploads', '1', 'yes'),
(1768, 'bp-disable-cover-image-uploads', '1', 'yes'),
(1769, 'ga_analyticator_global_notification', '1', 'yes'),
(1771, 'xtec-stats-visits', '0', 'yes'),
(1772, 'xtec-stats-include-admin', 'on', 'yes'),
(1835, '_bbp_edit_lock', '30', 'yes'),
(1836, '_bbp_throttle_time', '10', 'yes'),
(1837, '_bbp_allow_anonymous', '0', 'yes'),
(1838, '_bbp_allow_global_access', '1', 'yes'),
(1839, '_bbp_default_role', 'bbp_participant', 'yes'),
(1840, '_bbp_allow_revisions', '1', 'yes'),
(1841, '_bbp_enable_favorites', '1', 'yes'),
(1842, '_bbp_enable_subscriptions', '1', 'yes'),
(1843, '_bbp_allow_topic_tags', '1', 'yes'),
(1844, '_bbp_allow_search', '1', 'yes'),
(1845, '_bbp_use_wp_editor', '1', 'yes'),
(1846, '_bbp_use_autoembed', '1', 'yes'),
(1847, '_bbp_thread_replies_depth', '3', 'yes'),
(1848, '_bbp_allow_threaded_replies', '1', 'yes'),
(1849, '_bbp_topics_per_page', '15', 'yes'),
(1850, '_bbp_replies_per_page', '15', 'yes'),
(1851, '_bbp_topics_per_rss_page', '25', 'yes'),
(1852, '_bbp_replies_per_rss_page', '25', 'yes'),
(1853, '_bbp_root_slug', 'forums', 'yes'),
(1854, '_bbp_include_root', '1', 'yes'),
(1855, '_bbp_show_on_root', 'forums', 'yes'),
(1856, '_bbp_forum_slug', 'forum', 'yes'),
(1857, '_bbp_topic_slug', 'topic', 'yes'),
(1858, '_bbp_topic_tag_slug', 'topic-tag', 'yes'),
(1859, '_bbp_view_slug', 'view', 'yes'),
(1860, '_bbp_reply_slug', 'reply', 'yes'),
(1861, '_bbp_search_slug', 'search', 'yes'),
(1862, '_bbp_user_slug', 'users', 'yes'),
(1863, '_bbp_topic_archive_slug', 'topics', 'yes'),
(1864, '_bbp_reply_archive_slug', 'replies', 'yes'),
(1865, '_bbp_user_favs_slug', 'favorites', 'yes'),
(1866, '_bbp_user_subs_slug', 'subscriptions', 'yes'),
(1867, '_bbp_enable_group_forums', '1', 'yes'),
(1868, '_bbp_group_forums_root_id', '0', 'yes'),
(1869, 'ja_bbpress_tinymce_full', '0', 'yes'),
(1870, 'ja_bbpress_tinymce_media', '1', 'yes'),
(2186, 'email-subscribers', '2.9', 'yes'),
(2670, 'widget_email-subscribers', 'a:2:{s:12:"_multiwidget";i:1;i:3;a:4:{s:8:"es_title";s:22:"Subscripció de correu";s:7:"es_desc";s:35:"T''avisarem si hi ha notícies noves";s:7:"es_name";s:3:"YES";s:8:"es_group";s:7:"Portada";}}', 'yes'),
(2671, 'finished_splitting_shared_terms', '1', 'yes'),
(2672, 'site_icon', '0', 'yes'),
(2673, 'medium_large_size_w', '768', 'yes'),
(2674, 'medium_large_size_h', '0', 'yes'),
(2678, 'category_children', 'a:2:{i:2;a:3:{i:0;i:3;i:1;i:8;i:2;i:9;}i:5;a:6:{i:0;i:10;i:1;i:11;i:2;i:12;i:3;i:13;i:4;i:14;i:5;i:15;}}', 'yes'),
(2679, '_split_terms', 'a:2:{i:2;a:1:{s:8:"nav_menu";i:35;}i:5;a:1:{s:8:"nav_menu";i:36;}}', 'yes'),
(2696, 'rewrite_rules', 'a:396:{s:14:"docs/create/?$";s:52:"index.php?post_type=bp_doc&name=$matches[1]&create=1";s:34:"docs/my-groups/page/([0-9]{1,})/?$";s:56:"index.php?post_type=bp_doc&my-groups=1&paged=$matches[1]";s:17:"docs/my-groups/?$";s:55:"index.php?post_type=bp_doc&name=$matches[1]&my-groups=1";s:20:"docs/([^/]+)/edit/?$";s:50:"index.php?post_type=bp_doc&name=$matches[1]&edit=1";s:23:"docs/([^/]+)/history/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:22:"docs/([^/]+)/delete/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&history=1";s:23:"docs/([^/]+)/untrash/?$";s:53:"index.php?post_type=bp_doc&name=$matches[1]&untrash=1";s:33:"docs/([^/]+)/unlink-from-group/?$";s:63:"index.php?post_type=bp_doc&name=$matches[1]&unlink-from-group=1";s:9:"forums/?$";s:25:"index.php?post_type=forum";s:39:"forums/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:34:"forums/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=forum&feed=$matches[1]";s:26:"forums/page/([0-9]{1,})/?$";s:43:"index.php?post_type=forum&paged=$matches[1]";s:9:"topics/?$";s:25:"index.php?post_type=topic";s:39:"topics/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:34:"topics/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?post_type=topic&feed=$matches[1]";s:26:"topics/page/([0-9]{1,})/?$";s:43:"index.php?post_type=topic&paged=$matches[1]";s:28:"forums/forum/([^/]+)/edit/?$";s:34:"index.php?forum=$matches[1]&edit=1";s:28:"forums/topic/([^/]+)/edit/?$";s:34:"index.php?topic=$matches[1]&edit=1";s:28:"forums/reply/([^/]+)/edit/?$";s:34:"index.php?reply=$matches[1]&edit=1";s:32:"forums/topic-tag/([^/]+)/edit/?$";s:38:"index.php?topic-tag=$matches[1]&edit=1";s:48:"forums/users/([^/]+)/topics/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_tops=1&paged=$matches[2]";s:49:"forums/users/([^/]+)/replies/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_reps=1&paged=$matches[2]";s:51:"forums/users/([^/]+)/favorites/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_favs=1&paged=$matches[2]";s:55:"forums/users/([^/]+)/subscriptions/page/?([0-9]{1,})/?$";s:59:"index.php?bbp_user=$matches[1]&bbp_subs=1&paged=$matches[2]";s:30:"forums/users/([^/]+)/topics/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_tops=1";s:31:"forums/users/([^/]+)/replies/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_reps=1";s:33:"forums/users/([^/]+)/favorites/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_favs=1";s:37:"forums/users/([^/]+)/subscriptions/?$";s:41:"index.php?bbp_user=$matches[1]&bbp_subs=1";s:28:"forums/users/([^/]+)/edit/?$";s:37:"index.php?bbp_user=$matches[1]&edit=1";s:23:"forums/users/([^/]+)/?$";s:30:"index.php?bbp_user=$matches[1]";s:40:"forums/view/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?bbp_view=$matches[1]&paged=$matches[2]";s:27:"forums/view/([^/]+)/feed/?$";s:47:"index.php?bbp_view=$matches[1]&feed=$matches[2]";s:22:"forums/view/([^/]+)/?$";s:30:"index.php?bbp_view=$matches[1]";s:34:"forums/search/page/?([0-9]{1,})/?$";s:27:"index.php?paged=$matches[1]";s:16:"forums/search/?$";s:20:"index.php?bbp_search";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:7:"docs/?$";s:26:"index.php?post_type=bp_doc";s:37:"docs/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:32:"docs/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?post_type=bp_doc&feed=$matches[1]";s:24:"docs/page/([0-9]{1,})/?$";s:44:"index.php?post_type=bp_doc&paged=$matches[1]";s:12:"slideshow/?$";s:29:"index.php?post_type=slideshow";s:42:"slideshow/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:37:"slideshow/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?post_type=slideshow&feed=$matches[1]";s:29:"slideshow/page/([0-9]{1,})/?$";s:47:"index.php?post_type=slideshow&paged=$matches[1]";s:48:"categoria/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:43:"categoria/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:24:"categoria/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:36:"categoria/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:18:"categoria/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:38:"forums/forum/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"forums/forum/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"forums/forum/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"forums/forum/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"forums/forum/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"forums/forum/(.+?)/embed/?$";s:38:"index.php?forum=$matches[1]&embed=true";s:31:"forums/forum/(.+?)/trackback/?$";s:32:"index.php?forum=$matches[1]&tb=1";s:51:"forums/forum/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:46:"forums/forum/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?forum=$matches[1]&feed=$matches[2]";s:39:"forums/forum/(.+?)/page/?([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&paged=$matches[2]";s:46:"forums/forum/(.+?)/comment-page-([0-9]{1,})/?$";s:45:"index.php?forum=$matches[1]&cpage=$matches[2]";s:35:"forums/forum/(.+?)(?:/([0-9]+))?/?$";s:44:"index.php?forum=$matches[1]&page=$matches[2]";s:40:"forums/topic/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/topic/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/topic/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/topic/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/topic/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/topic/([^/]+)/embed/?$";s:38:"index.php?topic=$matches[1]&embed=true";s:33:"forums/topic/([^/]+)/trackback/?$";s:32:"index.php?topic=$matches[1]&tb=1";s:53:"forums/topic/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:48:"forums/topic/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?topic=$matches[1]&feed=$matches[2]";s:41:"forums/topic/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&paged=$matches[2]";s:48:"forums/topic/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?topic=$matches[1]&cpage=$matches[2]";s:37:"forums/topic/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?topic=$matches[1]&page=$matches[2]";s:29:"forums/topic/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/topic/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/topic/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/topic/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/topic/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"forums/reply/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"forums/reply/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"forums/reply/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"forums/reply/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"forums/reply/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"forums/reply/([^/]+)/embed/?$";s:38:"index.php?reply=$matches[1]&embed=true";s:33:"forums/reply/([^/]+)/trackback/?$";s:32:"index.php?reply=$matches[1]&tb=1";s:41:"forums/reply/([^/]+)/page/?([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&paged=$matches[2]";s:48:"forums/reply/([^/]+)/comment-page-([0-9]{1,})/?$";s:45:"index.php?reply=$matches[1]&cpage=$matches[2]";s:37:"forums/reply/([^/]+)(?:/([0-9]+))?/?$";s:44:"index.php?reply=$matches[1]&page=$matches[2]";s:29:"forums/reply/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"forums/reply/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"forums/reply/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"forums/reply/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"forums/reply/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:57:"forums/topic-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:52:"forums/topic-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?topic-tag=$matches[1]&feed=$matches[2]";s:33:"forums/topic-tag/([^/]+)/embed/?$";s:42:"index.php?topic-tag=$matches[1]&embed=true";s:45:"forums/topic-tag/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?topic-tag=$matches[1]&paged=$matches[2]";s:27:"forums/topic-tag/([^/]+)/?$";s:31:"index.php?topic-tag=$matches[1]";s:42:"forums/search/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?bbp_search=$matches[1]&paged=$matches[2]";s:24:"forums/search/([^/]+)/?$";s:32:"index.php?bbp_search=$matches[1]";s:38:"ia_invites/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"ia_invites/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"ia_invites/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"ia_invites/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"ia_invites/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"ia_invites/([^/]+)/embed/?$";s:43:"index.php?ia_invites=$matches[1]&embed=true";s:31:"ia_invites/([^/]+)/trackback/?$";s:37:"index.php?ia_invites=$matches[1]&tb=1";s:39:"ia_invites/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&paged=$matches[2]";s:46:"ia_invites/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?ia_invites=$matches[1]&cpage=$matches[2]";s:35:"ia_invites/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?ia_invites=$matches[1]&page=$matches[2]";s:27:"ia_invites/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"ia_invites/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"ia_invites/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"ia_invites/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"ia_invites/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:52:"ia_invitees/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:47:"ia_invitees/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?ia_invitees=$matches[1]&feed=$matches[2]";s:28:"ia_invitees/([^/]+)/embed/?$";s:44:"index.php?ia_invitees=$matches[1]&embed=true";s:40:"ia_invitees/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?ia_invitees=$matches[1]&paged=$matches[2]";s:22:"ia_invitees/([^/]+)/?$";s:33:"index.php?ia_invitees=$matches[1]";s:58:"ia_invited_groups/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:53:"ia_invited_groups/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?ia_invited_groups=$matches[1]&feed=$matches[2]";s:34:"ia_invited_groups/([^/]+)/embed/?$";s:50:"index.php?ia_invited_groups=$matches[1]&embed=true";s:46:"ia_invited_groups/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?ia_invited_groups=$matches[1]&paged=$matches[2]";s:28:"ia_invited_groups/([^/]+)/?$";s:39:"index.php?ia_invited_groups=$matches[1]";s:54:"calendar_feed/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:49:"calendar_feed/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_feed=$matches[1]&feed=$matches[2]";s:30:"calendar_feed/([^/]+)/embed/?$";s:46:"index.php?calendar_feed=$matches[1]&embed=true";s:42:"calendar_feed/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_feed=$matches[1]&paged=$matches[2]";s:24:"calendar_feed/([^/]+)/?$";s:35:"index.php?calendar_feed=$matches[1]";s:54:"calendar_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:49:"calendar_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?calendar_type=$matches[1]&feed=$matches[2]";s:30:"calendar_type/([^/]+)/embed/?$";s:46:"index.php?calendar_type=$matches[1]&embed=true";s:42:"calendar_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?calendar_type=$matches[1]&paged=$matches[2]";s:24:"calendar_type/([^/]+)/?$";s:35:"index.php?calendar_type=$matches[1]";s:58:"calendar_category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:53:"calendar_category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?calendar_category=$matches[1]&feed=$matches[2]";s:34:"calendar_category/([^/]+)/embed/?$";s:50:"index.php?calendar_category=$matches[1]&embed=true";s:46:"calendar_category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?calendar_category=$matches[1]&paged=$matches[2]";s:28:"calendar_category/([^/]+)/?$";s:39:"index.php?calendar_category=$matches[1]";s:36:"calendar/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"calendar/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"calendar/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"calendar/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"calendar/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"calendar/([^/]+)/embed/?$";s:41:"index.php?calendar=$matches[1]&embed=true";s:29:"calendar/([^/]+)/trackback/?$";s:35:"index.php?calendar=$matches[1]&tb=1";s:37:"calendar/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&paged=$matches[2]";s:44:"calendar/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?calendar=$matches[1]&cpage=$matches[2]";s:33:"calendar/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?calendar=$matches[1]&page=$matches[2]";s:25:"calendar/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"calendar/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"calendar/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"calendar/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"calendar/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"xtec_report/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"xtec_report/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"xtec_report/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"xtec_report/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"xtec_report/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"xtec_report/([^/]+)/embed/?$";s:44:"index.php?xtec_report=$matches[1]&embed=true";s:32:"xtec_report/([^/]+)/trackback/?$";s:38:"index.php?xtec_report=$matches[1]&tb=1";s:40:"xtec_report/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&paged=$matches[2]";s:47:"xtec_report/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?xtec_report=$matches[1]&cpage=$matches[2]";s:36:"xtec_report/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?xtec_report=$matches[1]&page=$matches[2]";s:28:"xtec_report/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"xtec_report/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"xtec_report/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"xtec_report/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"xtec_report/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:55:"bp_member_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:50:"bp_member_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:53:"index.php?bp_member_type=$matches[1]&feed=$matches[2]";s:31:"bp_member_type/([^/]+)/embed/?$";s:47:"index.php?bp_member_type=$matches[1]&embed=true";s:43:"bp_member_type/([^/]+)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_member_type=$matches[1]&paged=$matches[2]";s:25:"bp_member_type/([^/]+)/?$";s:36:"index.php?bp_member_type=$matches[1]";s:54:"bp_group_type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:49:"bp_group_type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?bp_group_type=$matches[1]&feed=$matches[2]";s:30:"bp_group_type/([^/]+)/embed/?$";s:46:"index.php?bp_group_type=$matches[1]&embed=true";s:42:"bp_group_type/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?bp_group_type=$matches[1]&paged=$matches[2]";s:24:"bp_group_type/([^/]+)/?$";s:35:"index.php?bp_group_type=$matches[1]";s:30:"docs/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:40:"docs/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:60:"docs/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:55:"docs/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:36:"docs/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:19:"docs/(.+?)/embed/?$";s:39:"index.php?bp_doc=$matches[1]&embed=true";s:23:"docs/(.+?)/trackback/?$";s:33:"index.php?bp_doc=$matches[1]&tb=1";s:43:"docs/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:38:"docs/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:45:"index.php?bp_doc=$matches[1]&feed=$matches[2]";s:31:"docs/(.+?)/page/?([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&paged=$matches[2]";s:38:"docs/(.+?)/comment-page-([0-9]{1,})/?$";s:46:"index.php?bp_doc=$matches[1]&cpage=$matches[2]";s:27:"docs/(.+?)(?:/([0-9]+))?/?$";s:45:"index.php?bp_doc=$matches[1]&page=$matches[2]";s:45:"item/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:40:"item/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?bp_docs_tag=$matches[1]&feed=$matches[2]";s:21:"item/([^/]+)/embed/?$";s:44:"index.php?bp_docs_tag=$matches[1]&embed=true";s:33:"item/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?bp_docs_tag=$matches[1]&paged=$matches[2]";s:15:"item/([^/]+)/?$";s:33:"index.php?bp_docs_tag=$matches[1]";s:55:"bp_docs_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:50:"bp_docs_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:67:"index.php?taxonomy=bp_docs_access&term=$matches[1]&feed=$matches[2]";s:31:"bp_docs_access/([^/]+)/embed/?$";s:61:"index.php?taxonomy=bp_docs_access&term=$matches[1]&embed=true";s:43:"bp_docs_access/([^/]+)/page/?([0-9]{1,})/?$";s:68:"index.php?taxonomy=bp_docs_access&term=$matches[1]&paged=$matches[2]";s:25:"bp_docs_access/([^/]+)/?$";s:50:"index.php?taxonomy=bp_docs_access&term=$matches[1]";s:63:"bp_docs_comment_access/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:58:"bp_docs_comment_access/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:75:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&feed=$matches[2]";s:39:"bp_docs_comment_access/([^/]+)/embed/?$";s:69:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&embed=true";s:51:"bp_docs_comment_access/([^/]+)/page/?([0-9]{1,})/?$";s:76:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]&paged=$matches[2]";s:33:"bp_docs_comment_access/([^/]+)/?$";s:58:"index.php?taxonomy=bp_docs_comment_access&term=$matches[1]";s:40:"bp_docs_folder/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"bp_docs_folder/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"bp_docs_folder/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"bp_docs_folder/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"bp_docs_folder/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"bp_docs_folder/(.+?)/embed/?$";s:47:"index.php?bp_docs_folder=$matches[1]&embed=true";s:33:"bp_docs_folder/(.+?)/trackback/?$";s:41:"index.php?bp_docs_folder=$matches[1]&tb=1";s:41:"bp_docs_folder/(.+?)/page/?([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&paged=$matches[2]";s:48:"bp_docs_folder/(.+?)/comment-page-([0-9]{1,})/?$";s:54:"index.php?bp_docs_folder=$matches[1]&cpage=$matches[2]";s:37:"bp_docs_folder/(.+?)(?:/([0-9]+))?/?$";s:53:"index.php?bp_docs_folder=$matches[1]&page=$matches[2]";s:62:"bp_docs_doc_in_folder/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:57:"bp_docs_doc_in_folder/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:60:"index.php?bp_docs_doc_in_folder=$matches[1]&feed=$matches[2]";s:38:"bp_docs_doc_in_folder/([^/]+)/embed/?$";s:54:"index.php?bp_docs_doc_in_folder=$matches[1]&embed=true";s:50:"bp_docs_doc_in_folder/([^/]+)/page/?([0-9]{1,})/?$";s:61:"index.php?bp_docs_doc_in_folder=$matches[1]&paged=$matches[2]";s:32:"bp_docs_doc_in_folder/([^/]+)/?$";s:43:"index.php?bp_docs_doc_in_folder=$matches[1]";s:63:"bp_docs_folder_in_user/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:58:"bp_docs_folder_in_user/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:61:"index.php?bp_docs_folder_in_user=$matches[1]&feed=$matches[2]";s:39:"bp_docs_folder_in_user/([^/]+)/embed/?$";s:55:"index.php?bp_docs_folder_in_user=$matches[1]&embed=true";s:51:"bp_docs_folder_in_user/([^/]+)/page/?([0-9]{1,})/?$";s:62:"index.php?bp_docs_folder_in_user=$matches[1]&paged=$matches[2]";s:33:"bp_docs_folder_in_user/([^/]+)/?$";s:44:"index.php?bp_docs_folder_in_user=$matches[1]";s:64:"bp_docs_folder_in_group/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:59:"bp_docs_folder_in_group/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:62:"index.php?bp_docs_folder_in_group=$matches[1]&feed=$matches[2]";s:40:"bp_docs_folder_in_group/([^/]+)/embed/?$";s:56:"index.php?bp_docs_folder_in_group=$matches[1]&embed=true";s:52:"bp_docs_folder_in_group/([^/]+)/page/?([0-9]{1,})/?$";s:63:"index.php?bp_docs_folder_in_group=$matches[1]&paged=$matches[2]";s:34:"bp_docs_folder_in_group/([^/]+)/?$";s:45:"index.php?bp_docs_folder_in_group=$matches[1]";s:39:"es_template/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"es_template/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"es_template/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"es_template/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"es_template/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"es_template/([^/]+)/embed/?$";s:44:"index.php?es_template=$matches[1]&embed=true";s:32:"es_template/([^/]+)/trackback/?$";s:38:"index.php?es_template=$matches[1]&tb=1";s:40:"es_template/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&paged=$matches[2]";s:47:"es_template/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?es_template=$matches[1]&cpage=$matches[2]";s:36:"es_template/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?es_template=$matches[1]&page=$matches[2]";s:28:"es_template/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"es_template/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"es_template/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"es_template/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"es_template/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"slideshow/.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"slideshow/.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"slideshow/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"slideshow/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"slideshow/.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"slideshow/(.+?)/embed/?$";s:42:"index.php?slideshow=$matches[1]&embed=true";s:28:"slideshow/(.+?)/trackback/?$";s:36:"index.php?slideshow=$matches[1]&tb=1";s:48:"slideshow/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:43:"slideshow/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:48:"index.php?slideshow=$matches[1]&feed=$matches[2]";s:36:"slideshow/(.+?)/page/?([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&paged=$matches[2]";s:43:"slideshow/(.+?)/comment-page-([0-9]{1,})/?$";s:49:"index.php?slideshow=$matches[1]&cpage=$matches[2]";s:32:"slideshow/(.+?)(?:/([0-9]+))?/?$";s:48:"index.php?slideshow=$matches[1]&page=$matches[2]";s:44:"calendar_booking/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:54:"calendar_booking/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:74:"calendar_booking/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:69:"calendar_booking/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:50:"calendar_booking/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:33:"calendar_booking/([^/]+)/embed/?$";s:49:"index.php?calendar_booking=$matches[1]&embed=true";s:37:"calendar_booking/([^/]+)/trackback/?$";s:43:"index.php?calendar_booking=$matches[1]&tb=1";s:45:"calendar_booking/([^/]+)/page/?([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&paged=$matches[2]";s:52:"calendar_booking/([^/]+)/comment-page-([0-9]{1,})/?$";s:56:"index.php?calendar_booking=$matches[1]&cpage=$matches[2]";s:41:"calendar_booking/([^/]+)(?:/([0-9]+))?/?$";s:55:"index.php?calendar_booking=$matches[1]&page=$matches[2]";s:33:"calendar_booking/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:43:"calendar_booking/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:63:"calendar_booking/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:58:"calendar_booking/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:39:"calendar_booking/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:46:"calendar_resources/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:56:"calendar_resources/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:76:"calendar_resources/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:71:"calendar_resources/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:52:"calendar_resources/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"calendar_resources/([^/]+)/embed/?$";s:51:"index.php?calendar_resources=$matches[1]&embed=true";s:39:"calendar_resources/([^/]+)/trackback/?$";s:45:"index.php?calendar_resources=$matches[1]&tb=1";s:47:"calendar_resources/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&paged=$matches[2]";s:54:"calendar_resources/([^/]+)/comment-page-([0-9]{1,})/?$";s:58:"index.php?calendar_resources=$matches[1]&cpage=$matches[2]";s:43:"calendar_resources/([^/]+)(?:/([0-9]+))?/?$";s:57:"index.php?calendar_resources=$matches[1]&page=$matches[2]";s:35:"calendar_resources/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"calendar_resources/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"calendar_resources/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"calendar_resources/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"calendar_resources/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=9&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:".+?/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:22:"(.+?)/([^/]+)/embed/?$";s:63:"index.php?category_name=$matches[1]&name=$matches[2]&embed=true";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:30:"(.+?)/([^/]+)(?:/([0-9]+))?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:".+?/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:14:"(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(2697, 'widget_widget_recent_bp_docs', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(3157, 'bp-plugin-enabled-post-home', '1', 'yes'),
(3754, 'calendar_feed_children', 'a:0:{}', 'yes'),
(3755, 'calendar_type_children', 'a:0:{}', 'yes'),
(3756, 'simple-calendar_settings_feeds', 'a:1:{s:6:"google";a:1:{s:7:"api_key";s:0:"";}}', 'yes'),
(3757, 'simple-calendar_settings_advanced', 'a:1:{s:6:"assets";a:1:{s:11:"disable_css";s:0:"";}}', 'yes'),
(3764, 'simple-calendar_version', '3.1.9', 'yes'),
(3777, 'simple-calendar_admin_notices', 'a:0:{}', 'yes'),
(3782, 'gce_version', '2.2.5', 'yes'),
(3783, 'gce_upgrade_has_run', '1', 'yes'),
(3846, 'calendar_category_children', 'a:0:{}', 'yes'),
(4791, 'bp-emails-unsubscribe-salt', 'QDBJVW11QS5kdUFmIWo4TSU6dTwwQkdqKjghWCtiIC5EanBrNyYxPWM2TmoqcDg7X244TVlydDJ6XnZ9RWx2bw==', 'yes'),
(4792, '_bp_ignore_deprecated_code', '', 'yes'),
(5944, 'widget_toc-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(6313, 'current_sa_email_subscribers_db_version', '3.2', 'yes'),
(6314, 'toc-options', 'a:43:{s:15:"fragment_prefix";s:1:"i";s:8:"position";i:2;s:5:"start";i:4;s:17:"show_heading_text";b:1;s:12:"heading_text";s:10:"Continguts";s:22:"auto_insert_post_types";a:1:{i:0;s:4:"page";}s:14:"show_heirarchy";b:1;s:12:"ordered_list";b:0;s:13:"smooth_scroll";b:1;s:20:"smooth_scroll_offset";i:40;s:10:"visibility";b:0;s:15:"visibility_show";s:4:"show";s:15:"visibility_hide";s:4:"hide";s:26:"visibility_hide_by_default";b:0;s:5:"width";s:4:"Auto";s:12:"width_custom";d:275;s:18:"width_custom_units";s:2:"px";s:8:"wrapping";i:2;s:9:"font_size";d:95;s:15:"font_size_units";s:1:"%";s:5:"theme";i:1;s:24:"custom_background_colour";s:7:"#f9f9f9";s:20:"custom_border_colour";s:7:"#aaaaaa";s:19:"custom_title_colour";s:1:"#";s:19:"custom_links_colour";s:1:"#";s:25:"custom_links_hover_colour";s:1:"#";s:27:"custom_links_visited_colour";s:1:"#";s:9:"lowercase";b:0;s:9:"hyphenate";b:0;s:14:"bullet_spacing";b:0;s:16:"include_homepage";b:0;s:11:"exclude_css";b:0;s:7:"exclude";s:0:"";s:14:"heading_levels";a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}s:13:"restrict_path";s:6:"/docs/";s:19:"css_container_class";s:0:"";s:25:"sitemap_show_page_listing";b:1;s:29:"sitemap_show_category_listing";b:1;s:20:"sitemap_heading_type";i:3;s:13:"sitemap_pages";s:5:"Pages";s:18:"sitemap_categories";s:10:"Categories";s:23:"show_toc_in_widget_only";b:0;s:34:"show_toc_in_widget_only_post_types";a:1:{i:0;s:4:"page";}}', 'yes'),
(10028, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10029, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10030, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10031, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10032, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(10422, 'wptelegram_ver', '2.0.9', 'yes'),
(10423, 'widget_email-subscribers-form', 'a:2:{s:12:"_multiwidget";i:1;i:3;a:2:{s:5:"title";s:22:"Subscripció de correu";s:7:"form_id";i:1;}}', 'yes'),
(10427, 'ig_es_cronurl', 'https://pwc-int.educacio.intranet/agora/masterpri?es=cron&guid=wyifls-ikzlmd-adwxps-vhtubl-rtkpow', 'yes'),
(10430, 'ig_admin_notices', 'a:0:{}', 'yes'),
(10433, 'ig_es_sync_wp_users', 's:4:"b:0;";', 'yes'),
(10435, 'ig_es_320_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10437, 'ig_es_327_db_updated_at', '2019-05-13 07:44:20', 'no'),
(10438, 'ig_es_sentreport', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(10439, 'ig_es_sentreport_subject', 'Butlletí Informe enviament', 'yes'),
(10440, 'ig_es_fromname', 'Admin', 'yes'),
(10441, 'ig_es_fromemail', 'a8000006@xtec.cat', 'yes'),
(10442, 'ig_es_emailtype', 'WP HTML MAIL', 'yes'),
(10443, 'ig_es_notifyadmin', 'YES', 'yes'),
(10444, 'ig_es_adminemail', 'a8000006@xtec.cat', 'yes'),
(10445, 'ig_es_admin_new_sub_subject', 'Escola L&#039;Arany Subscripci&oacute; nova de correu', 'yes'),
(10446, 'ig_es_admin_new_sub_content', 'Hola Administrador, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre els articles del nostre lloc web. \r\n\r\n Correu electr&ograve;nic : {{EMAIL}} \r\n Nom : {{NAME}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10447, 'ig_es_welcomeemail', 'YES', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(10448, 'ig_es_welcomesubject', 'Escola L&#039;Arany Benvingut al nostre butlletí', 'yes'),
(10449, 'ig_es_welcomecontent', 'Hola {{NAME}}, \r\n\r\n Hem rebut una sol·licitud de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic per rebre el bullet&iacute; del nostre lloc web.\r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10450, 'ig_es_optintype', 'Double Opt In', 'yes'),
(10451, 'ig_es_confirmsubject', 'Escola L&#039;Arany confirmeu la subscripció', 'yes'),
(10452, 'ig_es_confirmcontent', 'Hola {{NAME}},\r\n\r\n Hem rebut una petici&oacute; de subscripci&oacute; d''aquesta adre&ccedil;a de correu electr&ograve;nic. Confirmeu <a href=''{{LINK}}''>fent clic aqu&iacute;</a>. Si no podeu fer clic a l''enlla&ccedil; anterior, si us plau, utilitzeu l''URL seg&uuml;ent.\r\n\r\n {{LINK}} \r\n\r\nGr&agrave;cies\r\nEscola L&#039;Arany', 'yes'),
(10453, 'ig_es_optinlink', 'https://pwc-int.educacio.intranet/agora/masterpri/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10454, 'ig_es_unsublink', 'https://pwc-int.educacio.intranet/agora/masterpri/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
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
(10479, 'ig_es_sent_report_content', 'Hola Administrador,\n\nEl missatge ha estat enviat amb èxit a {{COUNT}} de correu electrònic(s). Trobareu els detalls a continuació.\n\nId únic: {{UNIQUE}} \nHora d''inici: {{STARTTIME}} \nHora de finalització: {{ENDTIME}} \nPer a més informació, accediu al tauler i aneu al menú de Correus enviats a subscriptors. \n\nGràcies \nwww.gopiplus.com \n', 'yes'),
(10480, 'ig_es_unsubscribe_link', 'https://pwc-int.educacio.intranet/agora/masterpri/?es=unsubscribe&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
(10481, 'ig_es_optin_link', 'https://pwc-int.educacio.intranet/agora/masterpri/?es=optin&db={{DBID}}&email={{EMAIL}}&guid={{GUID}}', 'yes'),
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
(10528, 'can_compress_scripts', '1', 'no'),
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
) ENGINE=InnoDB AUTO_INCREMENT=1263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 7, '_edit_lock', '1445936724:2'),
(3, 7, '_edit_last', '2'),
(4, 7, '_wp_page_template', 'page-templates/front-page.php'),
(5, 9, '_edit_lock', '1445936729:2'),
(6, 9, '_edit_last', '2'),
(7, 9, '_wp_page_template', 'page-templates/front-page.php'),
(8, 11, '_wp_attached_file', '2014/09/logo-escola.png'),
(9, 11, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:131;s:6:"height";i:131;s:4:"file";s:23:"2014/09/logo-escola.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(13, 13, '_edit_lock', '1445936464:2'),
(14, 13, '_edit_last', '2'),
(20, 13, '_amaga_titol', ''),
(21, 13, '_amaga_metadata', ''),
(22, 13, '_bloc_html', 'on'),
(31, 18, '_edit_lock', '1445936402:2'),
(32, 18, '_edit_last', '2'),
(38, 18, '_amaga_titol', ''),
(39, 18, '_amaga_metadata', ''),
(40, 18, '_bloc_html', 'on'),
(43, 22, '_edit_lock', '1445936658:2'),
(44, 22, '_edit_last', '2'),
(45, 22, '_wp_page_template', 'page-templates/side-menu.php'),
(46, 24, '_edit_lock', '1445936663:2'),
(47, 24, '_edit_last', '2'),
(48, 24, '_wp_page_template', 'page-templates/side-menu.php'),
(49, 26, '_edit_lock', '1445936672:2'),
(50, 26, '_edit_last', '2'),
(51, 26, '_wp_page_template', 'page-templates/side-menu.php'),
(52, 28, '_edit_lock', '1445936679:2'),
(53, 28, '_edit_last', '2'),
(54, 28, '_wp_page_template', 'page-templates/side-menu.php'),
(55, 30, '_edit_lock', '1445936686:2'),
(56, 30, '_edit_last', '2'),
(57, 30, '_wp_page_template', 'page-templates/side-menu.php'),
(58, 32, '_edit_lock', '1445936693:2'),
(59, 32, '_edit_last', '2'),
(60, 32, '_wp_page_template', 'page-templates/side-menu.php'),
(61, 34, '_edit_lock', '1445936699:2'),
(62, 34, '_edit_last', '2'),
(63, 34, '_wp_page_template', 'page-templates/side-menu.php'),
(64, 36, '_edit_lock', '1445936704:2'),
(65, 36, '_edit_last', '2'),
(66, 36, '_wp_page_template', 'page-templates/side-menu.php'),
(67, 38, '_edit_lock', '1445936708:2'),
(68, 38, '_edit_last', '2'),
(69, 38, '_wp_page_template', 'page-templates/side-menu.php'),
(205, 55, '_menu_item_type', 'post_type'),
(206, 55, '_menu_item_menu_item_parent', '0'),
(207, 55, '_menu_item_object_id', '22'),
(208, 55, '_menu_item_object', 'page'),
(209, 55, '_menu_item_target', ''),
(210, 55, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(211, 55, '_menu_item_xfn', ''),
(212, 55, '_menu_item_url', ''),
(214, 56, '_menu_item_type', 'post_type'),
(215, 56, '_menu_item_menu_item_parent', '55'),
(216, 56, '_menu_item_object_id', '38'),
(217, 56, '_menu_item_object', 'page'),
(218, 56, '_menu_item_target', ''),
(219, 56, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(220, 56, '_menu_item_xfn', ''),
(221, 56, '_menu_item_url', ''),
(223, 57, '_menu_item_type', 'post_type'),
(224, 57, '_menu_item_menu_item_parent', '55'),
(225, 57, '_menu_item_object_id', '36'),
(226, 57, '_menu_item_object', 'page'),
(227, 57, '_menu_item_target', ''),
(228, 57, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(229, 57, '_menu_item_xfn', ''),
(230, 57, '_menu_item_url', ''),
(232, 58, '_menu_item_type', 'post_type'),
(233, 58, '_menu_item_menu_item_parent', '55'),
(234, 58, '_menu_item_object_id', '34'),
(235, 58, '_menu_item_object', 'page'),
(236, 58, '_menu_item_target', ''),
(237, 58, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(238, 58, '_menu_item_xfn', ''),
(239, 58, '_menu_item_url', ''),
(241, 59, '_menu_item_type', 'post_type'),
(242, 59, '_menu_item_menu_item_parent', '55'),
(243, 59, '_menu_item_object_id', '32'),
(244, 59, '_menu_item_object', 'page'),
(245, 59, '_menu_item_target', ''),
(246, 59, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(247, 59, '_menu_item_xfn', ''),
(248, 59, '_menu_item_url', ''),
(250, 60, '_menu_item_type', 'post_type'),
(251, 60, '_menu_item_menu_item_parent', '55'),
(252, 60, '_menu_item_object_id', '30'),
(253, 60, '_menu_item_object', 'page'),
(254, 60, '_menu_item_target', ''),
(255, 60, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(256, 60, '_menu_item_xfn', ''),
(257, 60, '_menu_item_url', ''),
(259, 61, '_menu_item_type', 'post_type'),
(260, 61, '_menu_item_menu_item_parent', '55'),
(261, 61, '_menu_item_object_id', '28'),
(262, 61, '_menu_item_object', 'page'),
(263, 61, '_menu_item_target', ''),
(264, 61, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(265, 61, '_menu_item_xfn', ''),
(266, 61, '_menu_item_url', ''),
(268, 62, '_menu_item_type', 'post_type'),
(269, 62, '_menu_item_menu_item_parent', '55'),
(270, 62, '_menu_item_object_id', '26'),
(271, 62, '_menu_item_object', 'page'),
(272, 62, '_menu_item_target', ''),
(273, 62, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(274, 62, '_menu_item_xfn', ''),
(275, 62, '_menu_item_url', ''),
(277, 63, '_menu_item_type', 'post_type'),
(278, 63, '_menu_item_menu_item_parent', '55'),
(279, 63, '_menu_item_object_id', '24'),
(280, 63, '_menu_item_object', 'page'),
(281, 63, '_menu_item_target', ''),
(282, 63, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(283, 63, '_menu_item_xfn', ''),
(284, 63, '_menu_item_url', ''),
(286, 64, '_edit_lock', '1445936733:2'),
(287, 64, '_edit_last', '2'),
(288, 64, '_wp_page_template', 'page-templates/side-menu.php'),
(289, 66, '_edit_lock', '1445936737:2'),
(290, 66, '_edit_last', '2'),
(291, 66, '_wp_page_template', 'page-templates/side-menu.php'),
(292, 69, '_menu_item_type', 'post_type'),
(293, 69, '_menu_item_menu_item_parent', '0'),
(294, 69, '_menu_item_object_id', '66'),
(295, 69, '_menu_item_object', 'page'),
(296, 69, '_menu_item_target', ''),
(297, 69, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(298, 69, '_menu_item_xfn', ''),
(299, 69, '_menu_item_url', ''),
(301, 70, '_menu_item_type', 'post_type'),
(302, 70, '_menu_item_menu_item_parent', '0'),
(303, 70, '_menu_item_object_id', '64'),
(304, 70, '_menu_item_object', 'page'),
(305, 70, '_menu_item_target', ''),
(306, 70, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(307, 70, '_menu_item_xfn', ''),
(308, 70, '_menu_item_url', ''),
(310, 71, '_edit_lock', '1445936742:2'),
(311, 71, '_edit_last', '2'),
(312, 71, '_wp_page_template', 'page-templates/side-menu.php'),
(313, 73, '_edit_lock', '1445936753:2'),
(314, 73, '_edit_last', '2'),
(315, 73, '_wp_page_template', 'page-templates/side-menu.php'),
(316, 75, '_menu_item_type', 'post_type'),
(317, 75, '_menu_item_menu_item_parent', '69'),
(318, 75, '_menu_item_object_id', '73'),
(319, 75, '_menu_item_object', 'page'),
(320, 75, '_menu_item_target', ''),
(321, 75, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(322, 75, '_menu_item_xfn', ''),
(323, 75, '_menu_item_url', ''),
(325, 76, '_menu_item_type', 'post_type'),
(326, 76, '_menu_item_menu_item_parent', '69'),
(327, 76, '_menu_item_object_id', '71'),
(328, 76, '_menu_item_object', 'page'),
(329, 76, '_menu_item_target', ''),
(330, 76, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(331, 76, '_menu_item_xfn', ''),
(332, 76, '_menu_item_url', ''),
(334, 77, '_edit_lock', '1445936746:2'),
(335, 77, '_edit_last', '2'),
(336, 77, '_wp_page_template', 'page-templates/side-menu.php'),
(337, 79, '_menu_item_type', 'post_type'),
(338, 79, '_menu_item_menu_item_parent', '69'),
(339, 79, '_menu_item_object_id', '77'),
(340, 79, '_menu_item_object', 'page'),
(341, 79, '_menu_item_target', ''),
(342, 79, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(343, 79, '_menu_item_xfn', ''),
(344, 79, '_menu_item_url', ''),
(346, 80, '_edit_lock', '1445936757:2'),
(347, 80, '_edit_last', '2'),
(348, 80, '_wp_page_template', 'page-templates/side-menu.php'),
(349, 82, '_edit_lock', '1445936761:2'),
(350, 82, '_edit_last', '2'),
(351, 82, '_wp_page_template', 'page-templates/side-menu.php'),
(352, 84, '_edit_lock', '1445936765:2'),
(353, 84, '_edit_last', '2'),
(354, 84, '_wp_page_template', 'page-templates/side-menu.php'),
(355, 86, '_menu_item_type', 'taxonomy'),
(356, 86, '_menu_item_menu_item_parent', '0'),
(357, 86, '_menu_item_object_id', '7'),
(358, 86, '_menu_item_object', 'category'),
(359, 86, '_menu_item_target', ''),
(360, 86, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(361, 86, '_menu_item_xfn', ''),
(362, 86, '_menu_item_url', ''),
(364, 87, '_edit_lock', '1445936719:2'),
(365, 87, '_edit_last', '2'),
(366, 87, '_wp_page_template', 'page-templates/side-menu.php'),
(367, 89, '_menu_item_type', 'post_type'),
(368, 89, '_menu_item_menu_item_parent', '69'),
(369, 89, '_menu_item_object_id', '84'),
(370, 89, '_menu_item_object', 'page'),
(371, 89, '_menu_item_target', ''),
(372, 89, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(373, 89, '_menu_item_xfn', ''),
(374, 89, '_menu_item_url', ''),
(376, 90, '_menu_item_type', 'post_type'),
(377, 90, '_menu_item_menu_item_parent', '69'),
(378, 90, '_menu_item_object_id', '82'),
(379, 90, '_menu_item_object', 'page'),
(380, 90, '_menu_item_target', ''),
(381, 90, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(382, 90, '_menu_item_xfn', ''),
(383, 90, '_menu_item_url', ''),
(385, 91, '_menu_item_type', 'post_type'),
(386, 91, '_menu_item_menu_item_parent', '69'),
(387, 91, '_menu_item_object_id', '80'),
(388, 91, '_menu_item_object', 'page'),
(389, 91, '_menu_item_target', ''),
(390, 91, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(391, 91, '_menu_item_xfn', ''),
(392, 91, '_menu_item_url', ''),
(394, 92, '_menu_item_type', 'post_type'),
(395, 92, '_menu_item_menu_item_parent', '0'),
(396, 92, '_menu_item_object_id', '87'),
(397, 92, '_menu_item_object', 'page'),
(398, 92, '_menu_item_target', ''),
(399, 92, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(400, 92, '_menu_item_xfn', ''),
(401, 92, '_menu_item_url', ''),
(403, 93, '_menu_item_type', 'taxonomy'),
(404, 93, '_menu_item_menu_item_parent', '148'),
(405, 93, '_menu_item_object_id', '3'),
(406, 93, '_menu_item_object', 'category'),
(407, 93, '_menu_item_target', ''),
(408, 93, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(409, 93, '_menu_item_xfn', ''),
(410, 93, '_menu_item_url', ''),
(412, 94, '_menu_item_type', 'taxonomy'),
(413, 94, '_menu_item_menu_item_parent', '148'),
(414, 94, '_menu_item_object_id', '8'),
(415, 94, '_menu_item_object', 'category'),
(416, 94, '_menu_item_target', ''),
(417, 94, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(418, 94, '_menu_item_xfn', ''),
(419, 94, '_menu_item_url', ''),
(421, 95, '_menu_item_type', 'taxonomy'),
(422, 95, '_menu_item_menu_item_parent', '148'),
(423, 95, '_menu_item_object_id', '9'),
(424, 95, '_menu_item_object', 'category'),
(425, 95, '_menu_item_target', ''),
(426, 95, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(427, 95, '_menu_item_xfn', ''),
(428, 95, '_menu_item_url', ''),
(430, 96, '_menu_item_type', 'taxonomy'),
(431, 96, '_menu_item_menu_item_parent', '149'),
(432, 96, '_menu_item_object_id', '10'),
(433, 96, '_menu_item_object', 'category'),
(434, 96, '_menu_item_target', ''),
(435, 96, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(436, 96, '_menu_item_xfn', ''),
(437, 96, '_menu_item_url', ''),
(439, 97, '_menu_item_type', 'taxonomy'),
(440, 97, '_menu_item_menu_item_parent', '149'),
(441, 97, '_menu_item_object_id', '11'),
(442, 97, '_menu_item_object', 'category'),
(443, 97, '_menu_item_target', ''),
(444, 97, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(445, 97, '_menu_item_xfn', ''),
(446, 97, '_menu_item_url', ''),
(448, 98, '_menu_item_type', 'taxonomy'),
(449, 98, '_menu_item_menu_item_parent', '149'),
(450, 98, '_menu_item_object_id', '12'),
(451, 98, '_menu_item_object', 'category'),
(452, 98, '_menu_item_target', ''),
(453, 98, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(454, 98, '_menu_item_xfn', ''),
(455, 98, '_menu_item_url', ''),
(457, 99, '_menu_item_type', 'taxonomy'),
(458, 99, '_menu_item_menu_item_parent', '149'),
(459, 99, '_menu_item_object_id', '13'),
(460, 99, '_menu_item_object', 'category'),
(461, 99, '_menu_item_target', ''),
(462, 99, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(463, 99, '_menu_item_xfn', ''),
(464, 99, '_menu_item_url', ''),
(466, 100, '_menu_item_type', 'taxonomy'),
(467, 100, '_menu_item_menu_item_parent', '149'),
(468, 100, '_menu_item_object_id', '14'),
(469, 100, '_menu_item_object', 'category'),
(470, 100, '_menu_item_target', ''),
(471, 100, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(472, 100, '_menu_item_xfn', ''),
(473, 100, '_menu_item_url', ''),
(475, 101, '_menu_item_type', 'taxonomy'),
(476, 101, '_menu_item_menu_item_parent', '149'),
(477, 101, '_menu_item_object_id', '15'),
(478, 101, '_menu_item_object', 'category'),
(479, 101, '_menu_item_target', ''),
(480, 101, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(481, 101, '_menu_item_xfn', ''),
(482, 101, '_menu_item_url', ''),
(484, 102, '_wp_attached_file', '2014/09/exemple1b.png'),
(485, 102, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:350;s:6:"height";i:250;s:4:"file";s:21:"2014/09/exemple1b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple1b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple1b-300x214.png";s:5:"width";i:300;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple1b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple1b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(489, 103, '_edit_lock', '1411387354:2'),
(490, 103, '_edit_last', '2'),
(496, 103, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:3:"300";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"179";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:5:"false";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:5:"false";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:4:"true";s:14:"showPagination";s:5:"false";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:4:"true";s:11:"avoidFilter";s:4:"true";}'),
(497, 103, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(498, 103, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:35:"Il·lustració per Albert Bachiller";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:22:"http://www.jurjur.org/";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:35:"Il·lustració per Albert Bachiller";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"133";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:22:"Photo by Nick Amoscato";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:50:"https://www.flickr.com/photos/namoscato/8297366194";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:22:"Photo by Nick Amoscato";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"112";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"classe";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:88:"http://upload.wikimedia.org/wikipedia/commons/6/68/Boxwood_PS_kindergarten_classroom.jpg";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:62:"By ChinaFlag (Own work) [Public domain], via Wikimedia Commons";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"131";}}'),
(501, 106, '_wp_attached_file', '2014/09/joan_turu.png'),
(502, 106, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:218;s:4:"file";s:21:"2014/09/joan_turu.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"joan_turu-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"joan_turu-300x102.png";s:5:"width";i:300;s:6:"height";i:102;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"joan_turu-300x218.png";s:5:"width";i:300;s:6:"height";i:218;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"joan_turu-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(503, 107, '_wp_attached_file', '2014/09/nens2.png'),
(504, 107, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:393;s:6:"height";i:258;s:4:"file";s:17:"2014/09/nens2.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:17:"nens2-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:17:"nens2-300x196.png";s:5:"width";i:300;s:6:"height";i:196;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:17:"nens2-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:17:"nens2-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(508, 108, '_wp_attached_file', '2014/09/nensescola1.jpg'),
(509, 108, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:400;s:6:"height";i:265;s:4:"file";s:23:"2014/09/nensescola1.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"nensescola1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:23:"nensescola1-300x198.jpg";s:5:"width";i:300;s:6:"height";i:198;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"nensescola1-300x250.jpg";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"nensescola1-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(529, 112, '_wp_attached_file', '2014/09/Photo-by-Nick-Amoscato.jpg'),
(530, 112, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:638;s:6:"height";i:215;s:4:"file";s:34:"2014/09/Photo-by-Nick-Amoscato.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-300x101.jpg";s:5:"width";i:300;s:6:"height";i:101;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-300";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-300x215.jpg";s:5:"width";i:300;s:6:"height";i:215;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumb-200";a:4:{s:4:"file";s:34:"Photo-by-Nick-Amoscato-200x150.jpg";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(531, 112, '_wp_attachment_image_alt', 'Photo by Nick Amoscato'),
(532, 113, '_edit_lock', '1438070927:2'),
(533, 113, '_edit_last', '2'),
(536, 113, '_amaga_titol', ''),
(537, 113, '_amaga_metadata', ''),
(538, 113, '_bloc_html', 'on'),
(539, 115, '_edit_lock', '1438070198:2'),
(540, 115, '_edit_last', '2'),
(543, 115, '_amaga_titol', ''),
(544, 115, '_amaga_metadata', ''),
(545, 115, '_bloc_html', ''),
(550, 118, '_edit_lock', '1438070184:2'),
(551, 118, '_edit_last', '2'),
(554, 118, '_amaga_titol', ''),
(555, 118, '_amaga_metadata', ''),
(556, 118, '_bloc_html', 'on'),
(557, 120, '_edit_lock', '1467626576:2'),
(558, 120, '_edit_last', '1'),
(561, 120, '_amaga_titol', ''),
(562, 120, '_amaga_metadata', ''),
(563, 120, '_bloc_html', ''),
(573, 125, '_edit_lock', '1411139960:1'),
(574, 125, '_edit_last', '1'),
(575, 125, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:1:"5";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(576, 125, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(577, 125, 'slides', 'a:6:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 1";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"128";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:6:"Text 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:54:"Els carrusels poden incloure imatges, vídeos i textos";s:9:"textColor";s:7:"#ffffff";s:5:"color";s:7:"#1e73be";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:4:"type";s:4:"text";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 2";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"127";}i:4;a:3:{s:7:"videoId";s:11:"ygwGTiGFGi0";s:17:"showRelatedVideos";s:5:"false";s:4:"type";s:5:"video";}i:5;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 3";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 3";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"126";}i:6;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 4";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:20:"Descripció imatge 4";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"102";}}'),
(578, 126, '_wp_attached_file', '2014/09/exemple3.png'),
(579, 126, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:20:"2014/09/exemple3.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"exemple3-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:20:"exemple3-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:20:"exemple3-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:20:"exemple3-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(580, 127, '_wp_attached_file', '2014/09/imatge_recurs1.png'),
(581, 127, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:180;s:6:"height";i:90;s:4:"file";s:26:"2014/09/imatge_recurs1.png";s:5:"sizes";a:1:{s:9:"thumbnail";a:4:{s:4:"file";s:25:"imatge_recurs1-150x90.png";s:5:"width";i:150;s:6:"height";i:90;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(582, 128, '_wp_attached_file', '2014/09/exemple3b.png'),
(583, 128, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:800;s:6:"height";i:600;s:4:"file";s:21:"2014/09/exemple3b.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"exemple3b-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"exemple3b-300x225.png";s:5:"width";i:300;s:6:"height";i:225;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"exemple3b-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"exemple3b-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(588, 115, '_thumbnail_id', '107'),
(593, 107, '_edit_lock', '1411378617:2'),
(594, 131, '_wp_attached_file', '2014/09/classe.png'),
(595, 131, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1194;s:6:"height";i:427;s:4:"file";s:18:"2014/09/classe.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:18:"classe-300x107.png";s:5:"width";i:300;s:6:"height";i:107;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:19:"classe-1024x366.png";s:5:"width";i:1024;s:6:"height";i:366;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:18:"classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:18:"classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(596, 131, '_wp_attachment_image_alt', 'By ChinaFlag (Own work) [Public domain], via Wikimedia Commons'),
(605, 5, '_edit_lock', '1445936651:2'),
(609, 133, '_wp_attached_file', '2014/09/albertbachiller.png'),
(610, 133, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1244;s:6:"height";i:269;s:4:"file";s:27:"2014/09/albertbachiller.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:27:"albertbachiller-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:26:"albertbachiller-300x64.png";s:5:"width";i:300;s:6:"height";i:64;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:28:"albertbachiller-1024x221.png";s:5:"width";i:1024;s:6:"height";i:221;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:27:"albertbachiller-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:27:"albertbachiller-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(611, 133, '_wp_attachment_image_alt', 'Il·lustració per Albert Bachiller'),
(623, 139, '_wp_attached_file', '2014/09/screeshot.png'),
(624, 139, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:524;s:6:"height";i:392;s:4:"file";s:21:"2014/09/screeshot.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:21:"screeshot-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:21:"screeshot-300x224.png";s:5:"width";i:300;s:6:"height";i:224;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:21:"screeshot-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:21:"screeshot-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:10:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";}}'),
(625, 140, '_edit_lock', '1411402131:2'),
(626, 140, '_edit_last', '2'),
(627, 140, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"20";s:13:"slidesPerView";s:1:"1";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(628, 140, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(629, 140, 'slides', 'a:1:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:9:"screeshot";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"139";}}'),
(642, 13, '_oembed_a47471043cf1f80e92ecf21d41f541f0', '<iframe width="500" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F138433301&show_artwork=true&maxwidth=500&maxheight=750"></iframe>'),
(647, 142, '_edit_lock', '1464781887:2'),
(648, 142, '_edit_last', '1'),
(649, 142, 'settings', 'a:26:{s:9:"animation";s:5:"slide";s:10:"slideSpeed";s:1:"1";s:16:"descriptionSpeed";s:3:"0.4";s:13:"intervalSpeed";s:2:"10";s:13:"slidesPerView";s:1:"2";s:8:"maxWidth";s:1:"0";s:11:"aspectRatio";s:3:"3:1";s:6:"height";s:3:"200";s:14:"imageBehaviour";s:4:"crop";s:15:"showDescription";s:4:"true";s:15:"hideDescription";s:4:"true";s:27:"preserveSlideshowDimensions";s:5:"false";s:20:"enableResponsiveness";s:4:"true";s:4:"play";s:4:"true";s:4:"loop";s:4:"true";s:12:"pauseOnHover";s:4:"true";s:12:"controllable";s:4:"true";s:21:"hideNavigationButtons";s:5:"false";s:14:"showPagination";s:4:"true";s:14:"hidePagination";s:4:"true";s:12:"controlPanel";s:5:"false";s:16:"hideControlPanel";s:4:"true";s:15:"waitUntilLoaded";s:4:"true";s:15:"showLoadingIcon";s:4:"true";s:6:"random";s:5:"false";s:11:"avoidFilter";s:4:"true";}'),
(650, 142, 'styleSettings', 'a:1:{s:5:"style";s:15:"style-light.css";}'),
(651, 142, 'slides', 'a:3:{i:1;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 1";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"102";}i:2;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 2";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"126";}i:3;a:9:{s:17:"titleElementTagID";s:1:"0";s:5:"title";s:8:"Imatge 3";s:23:"descriptionElementTagID";s:1:"0";s:11:"description";s:0:"";s:3:"url";s:0:"";s:9:"urlTarget";s:5:"_self";s:15:"alternativeText";s:0:"";s:4:"type";s:10:"attachment";s:6:"postId";s:3:"128";}}'),
(669, 145, 'gce_retrieve_max', '25'),
(677, 145, 'old_gce_id', '1'),
(681, 145, 'gce_list_max_num', '7'),
(682, 145, 'gce_list_max_length', 'days'),
(691, 145, 'gce_feed_start_interval', 'months'),
(693, 145, 'gce_feed_end_interval', 'years'),
(704, 145, '_edit_lock', '1474025426:2'),
(705, 145, '_edit_last', '2'),
(709, 145, 'gce_widget_paging_interval', '604800'),
(728, 148, '_menu_item_type', 'taxonomy'),
(729, 148, '_menu_item_menu_item_parent', '92'),
(730, 148, '_menu_item_object_id', '2'),
(731, 148, '_menu_item_object', 'category'),
(732, 148, '_menu_item_target', ''),
(733, 148, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(734, 148, '_menu_item_xfn', ''),
(735, 148, '_menu_item_url', ''),
(737, 149, '_menu_item_type', 'taxonomy'),
(738, 149, '_menu_item_menu_item_parent', '92'),
(739, 149, '_menu_item_object_id', '5'),
(740, 149, '_menu_item_object', 'category'),
(741, 149, '_menu_item_target', ''),
(742, 149, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(743, 149, '_menu_item_xfn', ''),
(744, 149, '_menu_item_url', ''),
(749, 150, '_menu_item_type', 'custom'),
(750, 150, '_menu_item_menu_item_parent', '0'),
(751, 150, '_menu_item_object_id', '150'),
(752, 150, '_menu_item_object', 'custom'),
(753, 150, '_menu_item_target', ''),
(754, 150, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(755, 150, '_menu_item_xfn', ''),
(756, 150, '_menu_item_url', '#'),
(758, 151, '_menu_item_type', 'custom'),
(759, 151, '_menu_item_menu_item_parent', '0'),
(760, 151, '_menu_item_object_id', '151'),
(761, 151, '_menu_item_object', 'custom'),
(762, 151, '_menu_item_target', ''),
(763, 151, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(764, 151, '_menu_item_xfn', ''),
(765, 151, '_menu_item_url', '#'),
(767, 152, '_menu_item_type', 'custom'),
(768, 152, '_menu_item_menu_item_parent', '0'),
(769, 152, '_menu_item_object_id', '152'),
(770, 152, '_menu_item_object', 'custom'),
(771, 152, '_menu_item_target', ''),
(772, 152, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(773, 152, '_menu_item_xfn', ''),
(774, 152, '_menu_item_url', '#'),
(776, 153, '_menu_item_type', 'custom'),
(777, 153, '_menu_item_menu_item_parent', '0'),
(778, 153, '_menu_item_object_id', '153'),
(779, 153, '_menu_item_object', 'custom'),
(780, 153, '_menu_item_target', ''),
(781, 153, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(782, 153, '_menu_item_xfn', ''),
(783, 153, '_menu_item_url', '#'),
(785, 154, '_menu_item_type', 'custom'),
(786, 154, '_menu_item_menu_item_parent', '0'),
(787, 154, '_menu_item_object_id', '154'),
(788, 154, '_menu_item_object', 'custom'),
(789, 154, '_menu_item_target', ''),
(790, 154, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(791, 154, '_menu_item_xfn', ''),
(792, 154, '_menu_item_url', '#'),
(794, 155, '_menu_item_type', 'custom'),
(795, 155, '_menu_item_menu_item_parent', '0'),
(796, 155, '_menu_item_object_id', '155'),
(797, 155, '_menu_item_object', 'custom'),
(798, 155, '_menu_item_target', ''),
(799, 155, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(800, 155, '_menu_item_xfn', ''),
(801, 155, '_menu_item_url', '#'),
(803, 156, '_wp_attached_file', '2015/01/foto-classe.png'),
(804, 156, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:640;s:6:"height";i:469;s:4:"file";s:23:"2015/01/foto-classe.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:23:"foto-classe-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:23:"foto-classe-300x219.png";s:5:"width";i:300;s:6:"height";i:219;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-300";a:4:{s:4:"file";s:23:"foto-classe-300x250.png";s:5:"width";i:300;s:6:"height";i:250;s:9:"mime-type";s:9:"image/png";}s:9:"thumb-200";a:4:{s:4:"file";s:23:"foto-classe-200x150.png";s:5:"width";i:200;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(809, 157, '_menu_item_type', 'taxonomy'),
(810, 157, '_menu_item_menu_item_parent', '0'),
(811, 157, '_menu_item_object_id', '8'),
(812, 157, '_menu_item_object', 'category'),
(813, 157, '_menu_item_target', ''),
(814, 157, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(815, 157, '_menu_item_xfn', ''),
(816, 157, '_menu_item_url', ''),
(818, 158, '_menu_item_type', 'taxonomy'),
(819, 158, '_menu_item_menu_item_parent', '0'),
(820, 158, '_menu_item_object_id', '3'),
(821, 158, '_menu_item_object', 'category'),
(822, 158, '_menu_item_target', ''),
(823, 158, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(824, 158, '_menu_item_xfn', ''),
(825, 158, '_menu_item_url', ''),
(827, 159, '_menu_item_type', 'taxonomy'),
(828, 159, '_menu_item_menu_item_parent', '0'),
(829, 159, '_menu_item_object_id', '9'),
(830, 159, '_menu_item_object', 'category'),
(831, 159, '_menu_item_target', ''),
(832, 159, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(833, 159, '_menu_item_xfn', ''),
(834, 159, '_menu_item_url', ''),
(836, 160, '_menu_item_type', 'taxonomy'),
(837, 160, '_menu_item_menu_item_parent', '0'),
(838, 160, '_menu_item_object_id', '10'),
(839, 160, '_menu_item_object', 'category'),
(840, 160, '_menu_item_target', ''),
(841, 160, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(842, 160, '_menu_item_xfn', ''),
(843, 160, '_menu_item_url', ''),
(845, 161, '_menu_item_type', 'taxonomy'),
(846, 161, '_menu_item_menu_item_parent', '0'),
(847, 161, '_menu_item_object_id', '11'),
(848, 161, '_menu_item_object', 'category'),
(849, 161, '_menu_item_target', ''),
(850, 161, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(851, 161, '_menu_item_xfn', ''),
(852, 161, '_menu_item_url', ''),
(854, 162, '_menu_item_type', 'taxonomy'),
(855, 162, '_menu_item_menu_item_parent', '0'),
(856, 162, '_menu_item_object_id', '13'),
(857, 162, '_menu_item_object', 'category'),
(858, 162, '_menu_item_target', ''),
(859, 162, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(860, 162, '_menu_item_xfn', ''),
(861, 162, '_menu_item_url', ''),
(863, 163, '_menu_item_type', 'taxonomy'),
(864, 163, '_menu_item_menu_item_parent', '0'),
(865, 163, '_menu_item_object_id', '12'),
(866, 163, '_menu_item_object', 'category'),
(867, 163, '_menu_item_target', ''),
(868, 163, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(869, 163, '_menu_item_xfn', ''),
(870, 163, '_menu_item_url', ''),
(872, 164, '_menu_item_type', 'taxonomy'),
(873, 164, '_menu_item_menu_item_parent', '0'),
(874, 164, '_menu_item_object_id', '14'),
(875, 164, '_menu_item_object', 'category'),
(876, 164, '_menu_item_target', ''),
(877, 164, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(878, 164, '_menu_item_xfn', ''),
(879, 164, '_menu_item_url', ''),
(881, 165, '_menu_item_type', 'taxonomy'),
(882, 165, '_menu_item_menu_item_parent', '0'),
(883, 165, '_menu_item_object_id', '15'),
(884, 165, '_menu_item_object', 'category'),
(885, 165, '_menu_item_target', ''),
(886, 165, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(887, 165, '_menu_item_xfn', ''),
(888, 165, '_menu_item_url', ''),
(893, 38, '_template_layout', '2c-l'),
(918, 145, 'gce_paging_widget', '1'),
(926, 18, '_original_size', ''),
(927, 18, '_entry_icon', 'noicon'),
(930, 13, '_original_size', ''),
(931, 13, '_entry_icon', 'noicon'),
(932, 13, '_oembed_time_a47471043cf1f80e92ecf21d41f541f0', '1445936568'),
(933, 6, '_edit_lock', '1445936714:2'),
(934, 141, '_edit_lock', '1445936637:2'),
(935, 2, '_edit_lock', '1438070564:2'),
(936, 2, '_edit_last', '2'),
(937, 2, '_template_layout', '2c-l'),
(938, 71, '_template_layout', '2c-l'),
(939, 173, '_menu_item_type', 'post_type'),
(940, 173, '_menu_item_menu_item_parent', '0'),
(941, 173, '_menu_item_object_id', '5'),
(942, 173, '_menu_item_object', 'page'),
(943, 173, '_menu_item_target', ''),
(944, 173, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(945, 173, '_menu_item_xfn', ''),
(946, 173, '_menu_item_url', ''),
(948, 174, '_menu_item_type', 'post_type'),
(949, 174, '_menu_item_menu_item_parent', '0'),
(950, 174, '_menu_item_object_id', '6'),
(951, 174, '_menu_item_object', 'page'),
(952, 174, '_menu_item_target', ''),
(953, 174, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(954, 174, '_menu_item_xfn', ''),
(955, 174, '_menu_item_url', ''),
(957, 175, '_menu_item_type', 'post_type'),
(958, 175, '_menu_item_menu_item_parent', '0'),
(959, 175, '_menu_item_object_id', '141'),
(960, 175, '_menu_item_object', 'page'),
(961, 175, '_menu_item_target', ''),
(962, 175, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(963, 175, '_menu_item_xfn', ''),
(964, 175, '_menu_item_url', ''),
(970, 141, '_edit_last', '2'),
(971, 5, '_edit_last', '2'),
(972, 6, '_edit_last', '2'),
(975, 292, 'bp_docs_last_editor', '2'),
(976, 292, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(977, 292, 'bp_docs_revision_count', '3'),
(981, 297, 'bp_docs_last_editor', '2'),
(982, 297, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(983, 297, 'bp_docs_revision_count', '2'),
(988, 302, 'bp_docs_last_editor', '2'),
(989, 302, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(990, 302, 'bp_docs_revision_count', '3'),
(991, 304, 'bp_docs_last_editor', '2'),
(992, 304, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(993, 304, 'bp_docs_revision_count', '4'),
(997, 308, 'bp_docs_last_editor', '2'),
(998, 308, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(999, 308, 'bp_docs_revision_count', '4'),
(1000, 312, 'bp_docs_last_editor', '2'),
(1001, 312, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1002, 312, 'bp_docs_revision_count', '2'),
(1003, 314, 'bp_docs_last_editor', '2'),
(1004, 314, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1005, 314, 'bp_docs_revision_count', '2'),
(1006, 317, 'bp_docs_last_editor', '2'),
(1007, 317, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1008, 317, 'bp_docs_revision_count', '3'),
(1009, 318, 'bp_docs_last_editor', '2'),
(1010, 318, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1011, 318, 'bp_docs_revision_count', '2'),
(1013, 320, 'bp_docs_last_editor', '2'),
(1014, 320, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1015, 320, 'bp_docs_revision_count', '2'),
(1016, 323, 'bp_docs_last_editor', '2'),
(1017, 323, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1018, 323, 'bp_docs_revision_count', '4'),
(1019, 326, 'bp_docs_last_editor', '2'),
(1020, 326, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1021, 326, 'bp_docs_revision_count', '2'),
(1022, 328, 'bp_docs_last_editor', '2'),
(1023, 328, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1024, 328, 'bp_docs_revision_count', '3'),
(1025, 330, 'bp_docs_last_editor', '2'),
(1026, 330, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1027, 330, 'bp_docs_revision_count', '2'),
(1028, 332, 'bp_docs_last_editor', '2'),
(1029, 332, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1030, 332, 'bp_docs_revision_count', '2'),
(1031, 334, 'bp_docs_last_editor', '2'),
(1032, 334, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1033, 334, 'bp_docs_revision_count', '2'),
(1034, 336, 'bp_docs_last_editor', '1'),
(1035, 336, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1036, 336, 'bp_docs_revision_count', '1'),
(1037, 338, 'bp_docs_last_editor', '1'),
(1038, 338, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:8:"loggedin";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1039, 338, 'bp_docs_revision_count', '1'),
(1040, 339, 'bp_docs_last_editor', '2'),
(1041, 339, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1042, 339, 'bp_docs_revision_count', '3'),
(1049, 348, 'bp_docs_last_editor', '2'),
(1050, 348, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1051, 348, 'bp_docs_revision_count', '2'),
(1052, 350, 'bp_docs_last_editor', '2'),
(1053, 350, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1054, 350, 'bp_docs_revision_count', '2'),
(1055, 352, 'bp_docs_last_editor', '2'),
(1056, 352, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1057, 352, 'bp_docs_revision_count', '2'),
(1058, 354, 'bp_docs_last_editor', '2'),
(1059, 354, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1060, 354, 'bp_docs_revision_count', '6'),
(1061, 356, 'bp_docs_last_editor', '2'),
(1062, 356, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1063, 356, 'bp_docs_revision_count', '5'),
(1064, 358, 'bp_docs_last_editor', '2'),
(1065, 358, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1066, 358, 'bp_docs_revision_count', '7'),
(1067, 360, 'bp_docs_last_editor', '2'),
(1068, 360, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1069, 360, 'bp_docs_revision_count', '5'),
(1070, 362, 'bp_docs_last_editor', '2'),
(1071, 362, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1072, 362, 'bp_docs_revision_count', '3'),
(1073, 364, 'bp_docs_last_editor', '2'),
(1074, 364, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1075, 364, 'bp_docs_revision_count', '4'),
(1076, 366, 'bp_docs_last_editor', '2'),
(1077, 366, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1078, 366, 'bp_docs_revision_count', '2'),
(1085, 379, 'bp_docs_last_editor', '2'),
(1086, 379, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1087, 379, 'bp_docs_revision_count', '10'),
(1088, 379, '_edit_last', '1'),
(1090, 383, 'bp_docs_last_editor', '2'),
(1091, 383, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1092, 383, 'bp_docs_revision_count', '2'),
(1093, 385, 'bp_docs_last_editor', '2'),
(1094, 385, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1095, 385, 'bp_docs_revision_count', '3');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1096, 387, 'bp_docs_last_editor', '2'),
(1097, 387, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1098, 387, 'bp_docs_revision_count', '13'),
(1121, 391, 'bp_docs_last_editor', '2'),
(1122, 391, 'bp_docs_settings', 'a:5:{s:4:"read";s:13:"group-members";s:4:"edit";s:13:"group-members";s:13:"read_comments";s:13:"group-members";s:13:"post_comments";s:13:"group-members";s:12:"view_history";s:13:"group-members";}'),
(1123, 391, 'bp_docs_revision_count', '4'),
(1124, 391, '_edit_last', '1'),
(1143, 387, '_bp_docs_last_pinged', '1453400833:2'),
(1144, 385, '_bp_docs_last_pinged', '1453400836:2'),
(1145, 383, '_bp_docs_last_pinged', '1453400838:2'),
(1172, 432, 'bp_docs_last_editor', '2'),
(1173, 432, 'bp_docs_settings', 'a:5:{s:4:"read";s:6:"anyone";s:4:"edit";s:7:"creator";s:13:"read_comments";s:6:"anyone";s:13:"post_comments";s:8:"loggedin";s:12:"view_history";s:6:"anyone";}'),
(1174, 432, 'bp_docs_revision_count', '2'),
(1176, 435, '_menu_item_type', 'custom'),
(1177, 435, '_menu_item_menu_item_parent', '55'),
(1178, 435, '_menu_item_object_id', '435'),
(1179, 435, '_menu_item_object', 'custom'),
(1180, 435, '_menu_item_target', ''),
(1181, 435, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1182, 435, '_menu_item_xfn', ''),
(1183, 435, '_menu_item_url', 'https://pwc-int.educacio.intranet/agora/masterpri/docs'),
(1185, 292, '_edit_lock', '1453808277:2'),
(1186, 436, '_edit_last', '1'),
(1187, 436, '_wp_page_template', 'default'),
(1188, 436, '_template_layout', '2c-l'),
(1189, 436, '_edit_lock', '1464773524:2'),
(1190, 436, 'sharing_disabled', '1'),
(1198, 440, '_edit_last', '2'),
(1199, 440, '_wp_page_template', 'default'),
(1200, 440, '_template_layout', '2c-l'),
(1201, 440, '_edit_lock', '1459252163:2'),
(1202, 440, 'sharing_disabled', '1'),
(1204, 145, '_calendar_view', 'a:1:{s:16:"default-calendar";s:4:"grid";}'),
(1205, 145, '_default_calendar_list_range_type', 'daily'),
(1206, 145, '_default_calendar_list_range_span', '7'),
(1207, 145, '_calendar_begins', 'today'),
(1208, 145, '_feed_earliest_event_date', 'months_before'),
(1209, 145, '_feed_earliest_event_date_range', '1'),
(1210, 145, '_feed_latest_event_date', 'years_after'),
(1211, 145, '_feed_latest_event_date_range', '1'),
(1212, 145, '_default_calendar_event_bubble_trigger', 'hover'),
(1213, 145, '_default_calendar_expand_multi_day_events', 'yes'),
(1214, 145, '_google_calendar_id', 'eHRlYy5jYXRfZDhqcjBpMG4zbjlwYXRpaXEzNjFjNW9pY2NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ=='),
(1215, 145, '_google_events_max_results', '2500'),
(1216, 145, '_google_events_recurring', 'show'),
(1217, 145, '_calendar_date_format_setting', 'use_site'),
(1218, 145, '_calendar_time_format_setting', 'use_site'),
(1219, 145, '_calendar_datetime_separator', '@'),
(1220, 145, '_calendar_week_starts_on_setting', 'use_site'),
(1221, 145, '_feed_cache_user_unit', '60'),
(1222, 145, '_feed_cache_user_amount', '5'),
(1223, 145, '_feed_cache', '300'),
(1224, 145, '_calendar_version', '3.1.2'),
(1225, 145, '_calendar_begins_nth', '1'),
(1226, 145, '_calendar_begins_custom_date', ''),
(1227, 145, '_calendar_is_static', 'no'),
(1228, 145, '_no_events_message', ''),
(1229, 145, '_event_formatting', 'preserve_linebreaks'),
(1230, 145, '_poweredby', 'no'),
(1231, 145, '_feed_timezone_setting', 'use_site'),
(1232, 145, '_feed_timezone', 'Europe/Madrid'),
(1233, 145, '_calendar_date_format', 'l, d F Y'),
(1234, 145, '_calendar_date_format_php', 'd/m/Y'),
(1235, 145, '_calendar_time_format', 'G:i a'),
(1236, 145, '_calendar_time_format_php', 'G:i'),
(1237, 145, '_calendar_week_starts_on', '0'),
(1238, 145, '_google_events_search_query', ''),
(1239, 145, '_grouped_calendars_source', 'ids'),
(1240, 145, '_grouped_calendars_ids', ''),
(1241, 145, '_grouped_calendars_category', ''),
(1242, 145, '_default_calendar_style_theme', 'light'),
(1243, 145, '_default_calendar_style_today', '#1e73be'),
(1244, 145, '_default_calendar_style_days_events', '#000000'),
(1245, 145, '_default_calendar_list_header', 'no'),
(1246, 145, '_default_calendar_compact_list', 'no'),
(1247, 145, '_default_calendar_limit_visible_events', 'no'),
(1248, 145, '_default_calendar_visible_events', '3'),
(1249, 145, '_default_calendar_trim_titles', 'no'),
(1250, 145, '_default_calendar_trim_titles_chars', '20'),
(1251, 459, 'es_template_type', 'post_notification'),
(1252, 460, 'es_template_type', 'post_notification'),
(1253, 461, 'es_template_type', 'post_notification'),
(1254, 462, 'es_template_type', 'post_notification'),
(1255, 463, 'es_template_type', 'post_notification'),
(1256, 464, 'es_template_type', 'post_notification'),
(1257, 465, 'es_template_type', 'post_notification'),
(1258, 466, 'es_template_type', 'post_notification'),
(1259, 467, 'es_template_type', 'post_notification'),
(1260, 468, 'es_template_type', 'post_notification'),
(1261, 469, 'es_template_type', 'post_notification'),
(1262, 470, 'es_template_type', 'Newsletter');

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
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(2, 1, '2014-09-12 11:10:47', '2014-09-12 09:10:47', 'Aquesta és una pàgina d''exemple. És diferent d''una entrada del blog perquè romandrà sempre al mateix lloc i es mostrarà al menú de navegació de la pàgina web (a molts temes). La majoria de gent comença amb una pàgina quant a que els presenta als visitants potencials de la pàgina web. Podria ser quelcom com això:\r\n\r\n<blockquote>Hola a tothom! Treballo de missatger en bicicleta de dia, sóc un aspirant a actor de nit, i aquest és el meu bloc. Visc a Barcelona, tinc un gos meravellós que es diu Pep, i m''agraden les calçotades (i quedar atrapat per la pluja.)</blockquote>\r\n\r\n... o potser això:\r\n<blockquote>La companyia Enginys XYZ es va fundar el 1971, i ha proveït al públic d''enginys de qualitat des de llavors. Ubicada a Gotham City, XYZ dóna treball a més de 2.000 persones i fa tot tipus de coses impressionants per a la comunitat de Gotham.</blockquote>\r\n\r\nCom a blogaire nou o nova del WordPress, hauríeu d''anar al <a href="https://pwc-int.educacio.intranet/agora/masterpri/wp-admin/">tauler</a> per suprimir aquesta pàgina i crear-ne de noves amb el vostre contingut. A passar-ho bé!', 'Pàgina d''exemple', '', 'publish', 'closed', 'closed', '', 'pagina-exemple', '', '', '2015-07-28 09:04:04', '2015-07-28 08:04:04', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=2', 0, 'page', '', 0),
(5, 1, '2014-09-12 09:30:30', '2014-09-12 08:30:30', '', 'Activitat a tot el lloc web', '', 'publish', 'closed', 'closed', '', 'activitat', '', '', '2017-01-12 13:51:57', '2017-01-12 12:51:57', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=5', 0, 'page', '', 0),
(6, 1, '2014-09-12 09:30:30', '2014-09-12 08:30:30', '', 'Membres', '', 'publish', 'closed', 'closed', '', 'membres', '', '', '2015-10-27 10:05:14', '2015-10-27 09:05:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=6', 0, 'page', '', 0),
(7, 1, '2014-09-17 15:07:41', '2014-09-17 14:07:41', 'Pàgina mare de les pàgines d''inici', 'Pàgines d''inici', '', 'publish', 'closed', 'closed', '', 'pagines-dinici', '', '', '2015-10-27 10:05:24', '2015-10-27 09:05:24', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=7', 0, 'page', '', 0),
(9, 1, '2014-09-17 15:08:18', '2014-09-17 14:08:18', '', 'Pagina d''inici buida', '', 'publish', 'closed', 'closed', '', 'pagina-dinici-buida', '', '', '2015-10-27 10:05:29', '2015-10-27 09:05:29', '', 7, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=9', 0, 'page', '', 0),
(11, 1, '2014-09-18 10:50:51', '2014-09-18 10:50:51', '', 'logo-escola', '', 'inherit', 'open', 'open', '', 'logo-escola', '', '', '2014-09-18 10:50:51', '2014-09-18 10:50:51', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/logo-escola.png', 0, 'attachment', 'image/png', 0),
(13, 1, '2014-09-18 11:49:40', '2014-09-18 11:49:40', 'https://soundcloud.com/institut-sabadell/sophie-message\r\n\r\nUn exemple de fitxer d''àudio disponible directament des de la targeta resum. Dins de l''article, a la caixa "Paràmetres", heu de marcar la casella "Mostra el contingut sencer".', 'Notícia 1', '', 'publish', 'open', 'open', '', 'noticia', '', '', '2015-10-27 10:02:45', '2015-10-27 09:02:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=13', 0, 'post', '', 0),
(18, 1, '2014-09-18 11:58:18', '2014-09-18 11:58:18', '<iframe src="//www.youtube.com/embed/ygwGTiGFGi0?rel=0" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>\r\n\r\nUn exemple de vídeo disponible directament des de la targeta resum. Dins de l’article, a la caixa “Paràmetres”, heu de marcar la casella “Mostra el contingut sencer”.', 'Notícia 2', '', 'publish', 'open', 'open', '', 'noticia-2', '', '', '2015-10-27 10:02:23', '2015-10-27 09:02:23', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=18', 0, 'post', '', 0),
(22, 1, '2014-09-18 12:19:57', '2014-09-18 11:19:57', 'Aquesta secció pot contenir totes les pàgines necessàries per a oferir una descripció general de l''escola: ubicació, història, instal·lacions, equip docent, consell escolar, pla de qualitat, calendari, salut, informacions pràctiques, normativa...\r\n\r\nEn la maqueta inicial s''inclouen algunes d''aquestes pàgines amb contingut simulat. L''administrador/a pot editar-les, eliminar-les o crear-ne de noves des del tauler. És important que a la caixa <em>Atributs</em> de les pàgines hi consti com a <em>pare/mare</em> la pàgina "<em>L''escola</em>", i que tinguin seleccionada la plantilla "<em>Menú lateral</em>".', 'L''escola', '', 'publish', 'closed', 'closed', '', 'lescola', '', '', '2015-10-27 10:04:18', '2015-10-27 09:04:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=22', 0, 'page', '', 0),
(24, 1, '2014-09-18 12:23:15', '2014-09-18 11:23:15', '<p style="color: #666666;"><strong>Escola l''Arany</strong>\r\nPlaça de la Vila, 14\r\n01234 Abella de Xerta</p>\r\nTel. 901 234 567\r\nescolalarany@xtec.cat\r\n\r\n<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d95122.2542300733!2d1.53775!3d41.837547!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sca!2sus!4v1410948001907" width="600" height="450" frameborder="0"></iframe>\r\n\r\n<strong>Com arribar-hi:</strong>\r\n\r\n<strong>Tren:</strong> Estació Abella centre de la línia 1\r\n<strong>Bus:</strong> Línies L3 i L5\r\n\r\n&nbsp;', 'On som', '', 'publish', 'closed', 'closed', '', 'on-som', '', '', '2015-10-27 10:04:23', '2015-10-27 09:04:23', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=24', 10, 'page', '', 0),
(26, 1, '2014-09-18 12:24:32', '2014-09-18 11:24:32', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis vestibulum massa, ac porta dolor venenatis sit amet. Maecenas vel convallis nibh. Donec ut sem non arcu egestas viverra. Nam viverra ut eros id porttitor. Aliquam erat volutpat. Vivamus turpis magna, commodo quis ipsum sed, elementum maximus dui. Nam vulputate purus massa, in condimentum justo mattis ut. Sed efficitur finibus quam. Vestibulum ac dignissim purus. Cras placerat orci enim, eget volutpat enim ultricies non. Donec non diam sit amet nunc consequat faucibus eu ac arcu. Aliquam tempor at quam at porttitor. Vestibulum commodo mattis ligula, et viverra lectus mattis vitae. Donec luctus finibus purus non eleifend. Curabitur sit amet libero nunc.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec auctor justo id tincidunt viverra. Suspendisse potenti. Suspendisse tempor tristique lacus, sit amet imperdiet tellus porta et. Sed enim elit, ultricies vitae porta eu, dignissim ac felis. Nulla lacinia ligula suscipit consectetur vehicula. Nullam varius, nulla id facilisis tincidunt, massa lacus tincidunt velit, vitae bibendum urna nisl a arcu. Nullam tincidunt venenatis libero eu efficitur.\r\n\r\nCurabitur eget scelerisque nibh, in viverra libero. Vestibulum iaculis congue nisl ut eleifend. Fusce ultricies diam nec lobortis fringilla. Suspendisse tincidunt posuere lectus, a porttitor sem consequat ac. Pellentesque eget feugiat orci. Vivamus semper imperdiet mi a sodales. Sed posuere semper lobortis. Maecenas ut est consequat, luctus ipsum posuere, posuere tortor. Donec dictum lacus orci.\r\n\r\nNullam nunc justo, consequat non pretium id, rutrum id nisl. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis quis consectetur nulla. Curabitur pretium sollicitudin orci vitae egestas. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum nibh mattis neque tempus eleifend.', 'Història', '', 'publish', 'closed', 'closed', '', 'historia', '', '', '2015-10-27 10:04:32', '2015-10-27 09:04:32', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=26', 20, 'page', '', 0),
(28, 1, '2014-09-18 12:29:35', '2014-09-18 11:29:35', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Consell escolar', '', 'publish', 'closed', 'closed', '', 'consell-escolar', '', '', '2015-10-27 10:04:39', '2015-10-27 09:04:39', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=28', 30, 'page', '', 0),
(30, 1, '2014-09-18 12:30:23', '2014-09-18 11:30:23', 'Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.\r\n\r\n[slideshow_deploy id=''142'']\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2015-10-27 10:04:46', '2015-10-27 09:04:46', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=30', 40, 'page', '', 0),
(32, 1, '2014-09-18 12:31:33', '2014-09-18 11:31:33', '<h4><strong>Inici de curs:</strong></h4>\r\n15 de setembre de 2014\r\n<h4><strong>Vacances:</strong></h4>\r\nDel 24 de desembre de 2014 al 7 de gener de 2015  (ambdós inclosos)\r\n\r\nDel 28 de març al 6 d’abril de 2015 (ambdós inclosos)\r\n\r\nA partir del 20 de juny de 2015\r\n<h4><strong>Dies festius de lliure disposició:</strong></h4>\r\n3 de novembre de 2014\r\n\r\n16 de febrer de 2015\r\n\r\n22 de maig de 2015\r\n<h4><strong>Jornada compactada:</strong></h4>\r\n23 de desembre de 2014 i del 8 al 19 de juny de   2015 (ambdós inclosos)\r\n\r\nL’<b>horari lectiu</b> del centre és de 9 a 12,30 h i de 15,00 a 16,30 h per a tots els alumnes del centre. El dia 20 de desembre de 2013 i a partir del 9 de juny de 2014 es realitza horari compactat de 9 a 13h. (Els alumnes que utilitzen el servei de menjador surten a les 15:00h.)\r\n\r\nPer als alumnes que inicien l’escolarització a P3 s’organitza un breu període d’adaptació que suposa una certa modificació dels horaris dels dos primers dies de classe, i que es fa saber a les famílies en les reunions prèvies corresponents.', 'Calendari del curs', '', 'publish', 'closed', 'closed', '', 'calendari-del-curs', '', '', '2015-10-27 10:04:53', '2015-10-27 09:04:53', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=32', 50, 'page', '', 0),
(34, 1, '2014-09-18 12:32:18', '2014-09-18 11:32:18', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>\r\n<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in feugiat urna, a sagittis nisl. Proin fringilla turpis sed orci ultricies commodo. Morbi ac magna pulvinar lacus feugiat placerat non eu urna. Mauris laoreet nisi tellus, vel vehicula erat ornare mollis. Pellentesque justo erat, maximus a varius vitae, suscipit vel augue. Vivamus mattis sed metus sit amet auctor. Curabitur vel enim enim. Cras cursus leo lorem, ac dictum nibh bibendum non. Maecenas ac mauris felis. Phasellus euismod luctus augue ac vehicula. Sed dignissim libero vitae consequat luctus. Maecenas quis ornare tellus. Aliquam erat volutpat.</p>', 'Oferta educativa', '', 'publish', 'closed', 'closed', '', 'oferta-educativa', '', '', '2015-10-27 10:04:59', '2015-10-27 09:04:59', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=34', 60, 'page', '', 0),
(36, 1, '2014-09-18 12:33:11', '2014-09-18 11:33:11', 'Descripció i enumeració del material escolar que els alumnes i famílies necessitaran per al nivell educatiu corresponent, és recomanable diferenciar les diferents tipologies de material escolar necessari (llibres de text, lectures, dispositius digitals, material de taller, de dibuix…)', 'Material escolar', '', 'publish', 'closed', 'closed', '', 'material-escolar', '', '', '2015-10-27 10:05:04', '2015-10-27 09:05:04', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=36', 70, 'page', '', 0),
(38, 1, '2014-09-18 12:34:08', '2014-09-18 11:34:08', 'El caràcter d''aquesta pàgina ha de ser bàsicament informatiu. En aquesta secció cal fer una referència directa a qüestions de salut que afectin directament als alumnes del centre. Es pot categoritzar la informació, per exemple, entre <strong>medicaments</strong>, <strong>al·lèrgies</strong> i <strong>paràsits</strong>.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n&nbsp;', 'Salut', '', 'publish', 'closed', 'closed', '', 'salut', '', '', '2015-10-27 10:05:08', '2015-10-27 09:05:08', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=38', 80, 'page', '', 0),
(55, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', '', 'L''escola', '', 'publish', 'open', 'open', '', 'lescola-2', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=55', 1, 'nav_menu_item', '', 0),
(56, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '56', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=56', 9, 'nav_menu_item', '', 0),
(57, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '57', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=57', 8, 'nav_menu_item', '', 0),
(58, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '58', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=58', 7, 'nav_menu_item', '', 0),
(59, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '59', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=59', 6, 'nav_menu_item', '', 0),
(60, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '60', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=60', 5, 'nav_menu_item', '', 0),
(61, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '61', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=61', 4, 'nav_menu_item', '', 0),
(62, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '62', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=62', 3, 'nav_menu_item', '', 0),
(63, 1, '2014-09-18 12:36:37', '2014-09-18 12:36:37', ' ', '', '', 'publish', 'open', 'open', '', '63', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 22, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=63', 2, 'nav_menu_item', '', 0),
(64, 1, '2014-09-18 12:39:08', '2014-09-18 11:39:08', 'En aquesta secció cada centre pot crear les pàgines necessàries per a descriure el seu projecte educatiu. D''acord amb la <a title="Article 91 LEC" href="http://www20.gencat.cat/portal/site/portaljuridic/menuitem.d15a4e5dfb99396dc366ec10b0c0e1a0/?vgnextoid=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextchannel=b85297b5a87d6210VgnVCM1000000b0c1e0aRCRD&amp;vgnextfmt=default&amp;action=fitxa&amp;portalId=1&amp;documentId=480169&amp;newLang=ca_ES#fragment-1182442" target="_blank">Llei d''Educació de Catalunya</a>, el projecte educatiu incorpora el caràcter propi del centre i ha de contenir com a mínim els elements següents:\r\n<ul>\r\n	<li>Criteris d''ordenació pedagògica, prioritats i plantejaments educatius, procediments d''inclusió i altres actuacions que caracteritzen el centre.</li>\r\n	<li>Indicadors de progrés.</li>\r\n	<li>Concreció i desenvolupament dels currículums.</li>\r\n	<li>Criteris que defineixen l''estructura organitzativa.</li>\r\n	<li>Projecte lingüístic.</li>\r\n	<li>Caràcter propi del centre, si n''hi ha.</li>\r\n</ul>\r\nEs poden incloure també en aquesta secció altres documents més específics que també formen part del projecte educatiu, com ara: Projecte de convivència, Pla TAC, Pla d''acollida, Projecte d''escola i família, Comunitat d''aprenentatge, etc.\r\n\r\nTambé pot ser interessant fer referència a altres projectes i activitats, com ara: Escola verda, Ràdio a l''escola, Art a l''escola, Cinema en curs, Taller de robòtica, Aprenentatge integrat de Continguts i Llengües Estrangeres (AICLE), Revista de l''escola, Agenda 21, Hort, Patis oberts...\r\n\r\nDonada la diversitat de seccions possibles, s''ha cregut oportú no crear cap pàgina específica en la maqueta inicial, deixant a criteri del centre la decisió sobre la millor manera d''estructurar la descripció del seu projecte educatiu. En crear els apartats és important que la caixa <em>Atributs de la pàgina</em> tingui com a pare/mare “<em>Projecte educatiu</em>“, i que se seleccioni com a plantilla l''opció “<em>Menú lateral</em>“.', 'Projecte educatiu', '', 'publish', 'closed', 'closed', '', 'projecte-educatiu', '', '', '2015-10-27 10:05:33', '2015-10-27 09:05:33', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=64', 0, 'page', '', 0),
(66, 1, '2014-09-18 12:40:47', '2014-09-18 11:40:47', 'Secció que ha d''informar a les famílies dels serveis que ofereix el centre. La missió educativa no es limita a l''eix curricular, per això és imprescindible que aquest apartat del web estigui en un primer nivell de navegació. És recomanable que s''introdueixi informació relacionada amb:\r\n<ul>\r\n<li>el menjador escolar</li>\r\n<li>l''acollida</li>\r\n<li>el transport escolar</li>\r\n<li>el casal d''estiu</li>\r\n<li>les activitats extraescolars</li>\r\n<li>altres serveis digitals (en cas que el centre compti amb altres serveis digitals en línia com ara Moodle, blogs, tutoria o gestió acadèmica, aplicacions mòbils...)</li>\r\n</ul>', 'Serveis', '', 'publish', 'closed', 'closed', '', 'serveis', '', '', '2015-10-27 10:05:37', '2015-10-27 09:05:37', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=66', 0, 'page', '', 0),
(69, 1, '2014-09-18 12:41:37', '2014-09-18 12:41:37', ' ', '', '', 'publish', 'open', 'open', '', '69', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=69', 24, 'nav_menu_item', '', 0),
(70, 1, '2014-09-18 12:41:37', '2014-09-18 12:41:37', ' ', '', '', 'publish', 'open', 'open', '', '70', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=70', 11, 'nav_menu_item', '', 0),
(71, 1, '2014-09-18 12:44:56', '2014-09-18 11:44:56', 'L''oferta de <strong>serveis digitals</strong> constitueix un element molt important de l''engranatge d''un centre educatiu.\r\n\r\nEn aquesta pàgina es poden referenciar altres serveis en línia que ofereix l''escola com ara Moodle, blogs externs, aplicacions de tutoria o gestió acadèmica, aplicacions mòbils, etc.\r\n\r\nSi el centre posa en funcionament la <strong>xarxa Nodes</strong>, aquest pot ser un bon lloc per referenciar els principals grups i activitats que s''hi duen a terme.', 'Serveis digitals', '', 'publish', 'closed', 'closed', '', 'serveis-digitals', '', '', '2015-10-27 10:05:42', '2015-10-27 09:05:42', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=71', 10, 'page', '', 0),
(73, 1, '2014-09-18 14:01:51', '2014-09-18 13:01:51', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Vivamus nec turpis viverra, vehicula tellus pellentesque, euismod urna.</li>\r\n	<li>Vivamus cursus neque eu erat bibendum, non ultrices enim dignissim.</li>\r\n	<li>Pellentesque consectetur lectus sit amet libero aliquam tincidunt.</li>\r\n	<li>Morbi eu purus vel mi dignissim volutpat eget nec est.</li>\r\n</ul>\r\n<ul>\r\n	<li>Curabitur vulputate purus nec orci suscipit viverra.</li>\r\n	<li>Phasellus vel lorem sit amet arcu posuere pellentesque.</li>\r\n	<li>Nam non tortor in turpis vestibulum ullamcorper id ut risus.</li>\r\n	<li>Suspendisse laoreet orci ac sodales varius.</li>\r\n	<li>Mauris laoreet eros et est hendrerit placerat.</li>\r\n</ul>', 'Menjador escolar', '', 'publish', 'closed', 'closed', '', 'menjador-escolar', '', '', '2015-10-27 10:05:53', '2015-10-27 09:05:53', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=73', 30, 'page', '', 0),
(75, 1, '2014-09-18 14:08:22', '2014-09-18 14:08:22', ' ', '', '', 'publish', 'open', 'open', '', '75', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=75', 27, 'nav_menu_item', '', 0),
(76, 1, '2014-09-18 14:08:22', '2014-09-18 14:08:22', ' ', '', '', 'publish', 'open', 'open', '', '76', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=76', 25, 'nav_menu_item', '', 0),
(77, 1, '2014-09-18 14:05:08', '2014-09-18 13:05:08', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Acollida', '', 'publish', 'closed', 'closed', '', 'acollida', '', '', '2015-10-27 10:05:46', '2015-10-27 09:05:46', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=77', 20, 'page', '', 0),
(79, 1, '2014-09-18 14:08:42', '2014-09-18 14:08:42', ' ', '', '', 'publish', 'open', 'open', '', '79', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=79', 26, 'nav_menu_item', '', 0),
(80, 1, '2014-09-18 14:09:48', '2014-09-18 13:09:48', '<p style="color: #666666;">Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p style="color: #666666;">A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>', 'Transport Escolar', '', 'publish', 'closed', 'closed', '', 'transport-escolar', '', '', '2015-10-27 10:05:57', '2015-10-27 09:05:57', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=80', 40, 'page', '', 0),
(82, 1, '2014-09-18 14:10:51', '2014-09-18 13:10:51', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Casal d''estiu', '', 'publish', 'closed', 'closed', '', 'casal-destiu', '', '', '2015-10-27 10:06:01', '2015-10-27 09:06:01', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=82', 50, 'page', '', 0),
(84, 1, '2014-09-18 14:11:31', '2014-09-18 13:11:31', '<p style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl quam, lobortis et interdum finibus, aliquam eget ligula. Donec nec ex et leo ultrices dignissim. Suspendisse quis tortor porta, rhoncus velit sit amet, convallis est. In lobortis dignissim convallis. Integer faucibus urna at magna mattis, id accumsan lacus posuere. Quisque vitae ipsum erat. Cras varius placerat justo. Vivamus maximus finibus hendrerit. Nullam accumsan quam pulvinar odio sollicitudin feugiat. Praesent vehicula dolor mauris, in semper risus gravida quis.</p>\r\n<p style="color: #444444;">Cras vitae porta turpis. Proin pharetra ac lacus in tempor. Vestibulum ullamcorper neque quis elit faucibus, at sodales est pretium. Suspendisse ac mauris in enim eleifend porttitor. Sed quis dolor laoreet, eleifend diam non, tincidunt nisl. Nulla sed venenatis eros. Ut non neque cursus, condimentum leo consequat, tempus ligula. Nulla vel orci sed sapien tincidunt fermentum.</p>', 'Activitats extraescolars', '', 'publish', 'closed', 'closed', '', 'activitats-extraescolars', '', '', '2015-10-27 10:06:05', '2015-10-27 09:06:05', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=84', 60, 'page', '', 0),
(86, 1, '2014-09-18 14:19:53', '2014-09-18 14:19:53', ' ', '', '', 'publish', 'open', 'open', '', '86', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=86', 31, 'nav_menu_item', '', 0),
(87, 1, '2014-09-18 14:28:12', '2014-09-18 13:28:12', 'De P3 a 6è cada nivell té una pàgina pròpia, que es creen mitjançant les categories.\r\n\r\nLes categories es defineixen des del menú de les entrades del blog. Paral·lelament als nivells també es poden definir més categories.\r\n\r\nJa estan definides les categories: Educació infantil, P3, P4, P5, Educació primària, 1r curs, 2n curs, 3r curs, 4t curs, 5è curs, 6è curs.', 'Nivells', '', 'publish', 'closed', 'closed', '', 'nivells', '', '', '2015-10-27 10:05:19', '2015-10-27 09:05:19', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=87', 0, 'page', '', 0),
(89, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '89', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=89', 30, 'nav_menu_item', '', 0),
(90, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', '', 'Casal d''estiu', '', 'publish', 'open', 'open', '', 'casal-destiu', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=90', 29, 'nav_menu_item', '', 0),
(91, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '91', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 66, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=91', 28, 'nav_menu_item', '', 0),
(92, 1, '2014-09-18 14:29:22', '2014-09-18 14:29:22', ' ', '', '', 'publish', 'open', 'open', '', '92', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=92', 12, 'nav_menu_item', '', 0),
(93, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '93', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=93', 14, 'nav_menu_item', '', 0),
(94, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '94', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=94', 15, 'nav_menu_item', '', 0),
(95, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '95', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=95', 16, 'nav_menu_item', '', 0),
(96, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '96', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=96', 18, 'nav_menu_item', '', 0),
(97, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '97', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=97', 19, 'nav_menu_item', '', 0),
(98, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '98', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=98', 20, 'nav_menu_item', '', 0),
(99, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '99', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=99', 21, 'nav_menu_item', '', 0),
(100, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '100', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=100', 22, 'nav_menu_item', '', 0),
(101, 1, '2014-09-18 14:30:17', '2014-09-18 14:30:17', ' ', '', '', 'publish', 'open', 'open', '', '101', '', '', '2016-01-21 19:42:19', '2016-01-21 18:42:19', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=101', 23, 'nav_menu_item', '', 0),
(102, 1, '2014-09-18 15:29:22', '2014-09-18 15:29:22', '', 'exemple1b', '', 'inherit', 'open', 'open', '', 'exemple1b', '', '', '2014-09-18 15:29:22', '2014-09-18 15:29:22', '', 18, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple1b.png', 0, 'attachment', 'image/png', 0),
(103, 1, '2014-09-18 16:32:01', '2014-09-18 16:32:01', '', 'Capçalera', '', 'publish', 'closed', 'closed', '', 'capcalera', '', '', '2014-09-22 12:04:54', '2014-09-22 12:04:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=103', 0, 'slideshow', '', 0),
(106, 1, '2014-09-18 16:39:33', '2014-09-18 16:39:33', '', 'joan_turu', '', 'inherit', 'open', 'open', '', 'joan_turu', '', '', '2014-09-18 16:39:33', '2014-09-18 16:39:33', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/joan_turu.png', 0, 'attachment', 'image/png', 0),
(107, 1, '2014-09-18 17:01:30', '2014-09-18 17:01:30', '', 'nens2', '', 'inherit', 'open', 'open', '', 'nens2', '', '', '2014-09-18 17:01:30', '2014-09-18 17:01:30', '', 13, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/nens2.png', 0, 'attachment', 'image/png', 0),
(108, 1, '2014-09-18 17:02:00', '2014-09-18 17:02:00', '', 'nensescola1', '', 'inherit', 'open', 'open', '', 'nensescola1', '', '', '2014-09-18 17:02:00', '2014-09-18 17:02:00', '', 18, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/nensescola1.jpg', 0, 'attachment', 'image/jpeg', 0),
(112, 1, '2014-09-19 11:11:44', '2014-09-19 11:11:44', '', 'Photo by Nick Amoscato', '', 'inherit', 'open', 'open', '', 'photo-by-nick-amoscato', '', '', '2014-09-19 11:11:44', '2014-09-19 11:11:44', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/Photo-by-Nick-Amoscato.jpg', 0, 'attachment', 'image/jpeg', 0),
(113, 1, '2014-09-19 11:51:13', '2014-09-19 11:51:13', '[slideshow_deploy id=''125'']\r\n\r\n<span style="color: #444444;">Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 3', '', 'publish', 'open', 'open', '', 'noticia-3', '', '', '2014-09-22 16:36:32', '2014-09-22 16:36:32', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=113', 0, 'post', '', 0),
(115, 1, '2014-09-19 11:51:44', '2014-09-19 11:51:44', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Nam semper id ipsum condimentum laoreet. Proin sollicitudin elit ut ligula hendrerit, et hendrerit ante condimentum. Aliquam suscipit feugiat velit, at vehicula lorem pharetra quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 4', '', 'publish', 'open', 'open', '', 'noticia-5', '', '', '2014-09-22 16:36:07', '2014-09-22 16:36:07', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=115', 0, 'post', '', 0),
(118, 1, '2014-09-19 11:53:11', '2014-09-19 11:53:11', '<iframe src="//player.vimeo.com/video/98712736?title=0&amp;byline=0&amp;portrait=0&amp;color=ff9933" width="550" height="309" frameborder="0" allowfullscreen="allowfullscreen"></iframe>', 'Notícia 5', '', 'publish', 'open', 'open', '', 'noticia-5-2', '', '', '2014-09-22 16:37:30', '2014-09-22 16:37:30', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=118', 0, 'post', '', 0),
(120, 1, '2014-09-19 11:53:39', '2014-09-19 11:53:39', '<span style="color: #444444;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean erat dolor, aliquet vitae ligula suscipit, bibendum malesuada augue.</span>', 'Notícia 6', '', 'publish', 'open', 'open', '', 'noticia-6', '', '', '2014-09-22 16:36:07', '2014-09-22 16:36:07', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=120', 0, 'post', '', 0),
(125, 1, '2014-09-19 15:17:52', '2014-09-19 15:17:52', '', 'Exemple', '', 'publish', 'closed', 'closed', '', 'exemple', '', '', '2014-09-19 15:21:39', '2014-09-19 15:21:39', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=125', 0, 'slideshow', '', 0),
(126, 1, '2014-09-19 15:18:28', '2014-09-19 15:18:28', '', 'exemple3', '', 'inherit', 'open', 'open', '', 'exemple3', '', '', '2014-09-19 15:18:28', '2014-09-19 15:18:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple3.png', 0, 'attachment', 'image/png', 0),
(127, 1, '2014-09-19 15:18:40', '2014-09-19 15:18:40', '', 'imatge_recurs1', '', 'inherit', 'open', 'open', '', 'imatge_recurs1', '', '', '2014-09-19 15:18:40', '2014-09-19 15:18:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/imatge_recurs1.png', 0, 'attachment', 'image/png', 0),
(128, 1, '2014-09-19 15:18:53', '2014-09-19 15:18:53', '', 'exemple3b', '', 'inherit', 'open', 'open', '', 'exemple3b', '', '', '2014-09-19 15:18:53', '2014-09-19 15:18:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/exemple3b.png', 0, 'attachment', 'image/png', 0),
(131, 1, '2014-09-22 09:46:48', '2014-09-22 09:46:48', '', 'classe', '', 'inherit', 'open', 'open', '', 'classe', '', '', '2014-09-22 09:46:48', '2014-09-22 09:46:48', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/classe.png', 0, 'attachment', 'image/png', 0),
(133, 1, '2014-09-22 10:56:17', '2014-09-22 10:56:17', '', 'albertbachiller', '', 'inherit', 'open', 'open', '', 'albertbachiller', '', '', '2014-09-22 10:56:17', '2014-09-22 10:56:17', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/albertbachiller.png', 0, 'attachment', 'image/png', 0),
(139, 1, '2014-09-22 16:10:33', '2014-09-22 16:10:33', '', 'screeshot', '', 'inherit', 'open', 'open', '', 'screeshot', '', '', '2014-09-22 16:10:33', '2014-09-22 16:10:33', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2014/09/screeshot.png', 0, 'attachment', 'image/png', 0),
(140, 1, '2014-09-22 16:11:11', '2014-09-22 16:11:11', '', 'Destacat Nodes', '', 'publish', 'closed', 'closed', '', 'destacat-nodes', '', '', '2014-09-22 16:11:11', '2014-09-22 16:11:11', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=140', 0, 'slideshow', '', 0),
(141, 1, '2014-09-22 16:15:19', '2014-09-22 15:15:19', '', 'Nodes', '', 'publish', 'closed', 'closed', '', 'nodes', '', '', '2015-10-27 10:03:57', '2015-10-27 09:03:57', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/nodes/', 0, 'page', '', 0),
(142, 1, '2014-09-22 17:09:16', '2014-09-22 17:09:16', '', 'Instal·lacions', '', 'publish', 'closed', 'closed', '', 'instal%c2%b7lacions', '', '', '2014-09-22 17:10:07', '2014-09-22 17:10:07', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?post_type=slideshow&#038;p=142', 0, 'slideshow', '', 0),
(145, 1, '2014-10-07 05:43:59', '2014-10-07 05:43:59', '<strong>[title]</strong><br />[when]<br />[location]<br /><div>[description]</div><br />[link newwindow="yes"]Més detalls...[/link]', 'Calendari d''exemple', '', 'publish', 'closed', 'closed', '', '145', '', '', '2016-09-20 11:51:14', '2016-09-20 09:51:14', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/gce_feed/145/', 0, 'calendar', '', 0),
(148, 1, '2014-12-01 12:44:32', '2014-12-01 11:44:32', ' ', '', '', 'publish', 'open', 'open', '', '148', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=148', 13, 'nav_menu_item', '', 0),
(149, 1, '2014-12-01 12:44:33', '2014-12-01 11:44:33', ' ', '', '', 'publish', 'open', 'open', '', '149', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=149', 17, 'nav_menu_item', '', 0),
(150, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Document 1', '', 'publish', 'open', 'open', '', 'document-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=150', 1, 'nav_menu_item', '', 0),
(151, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Document 2', '', 'publish', 'open', 'open', '', 'document-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=151', 2, 'nav_menu_item', '', 0),
(152, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Aplicació 1', '', 'publish', 'open', 'open', '', 'aplicacio-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=152', 3, 'nav_menu_item', '', 0),
(153, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Aplicació 2', '', 'publish', 'open', 'open', '', 'aplicacio-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=153', 4, 'nav_menu_item', '', 0),
(154, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Web 1', '', 'publish', 'open', 'open', '', 'web-1', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=154', 5, 'nav_menu_item', '', 0),
(155, 1, '2015-01-26 11:57:41', '2015-01-26 10:57:41', '', 'Web 2', '', 'publish', 'open', 'open', '', 'web-2', '', '', '2015-01-26 11:57:54', '2015-01-26 10:57:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=155', 6, 'nav_menu_item', '', 0),
(156, 1, '2015-01-26 11:59:04', '2015-01-26 10:59:04', '', 'foto-classe', '', 'inherit', 'open', 'open', '', 'foto-classe', '', '', '2015-01-26 11:59:04', '2015-01-26 10:59:04', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/wp-content/uploads/usu6/2015/01/foto-classe.png', 0, 'attachment', 'image/png', 0),
(157, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '157', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=157', 2, 'nav_menu_item', '', 0),
(158, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '158', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=158', 1, 'nav_menu_item', '', 0),
(159, 1, '2015-01-27 14:32:41', '2015-01-27 13:32:41', ' ', '', '', 'publish', 'open', 'open', '', '159', '', '', '2015-01-27 14:32:41', '2015-01-27 13:32:41', '', 2, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=159', 3, 'nav_menu_item', '', 0),
(160, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '160', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=160', 1, 'nav_menu_item', '', 0),
(161, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '161', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=161', 2, 'nav_menu_item', '', 0),
(162, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '162', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=162', 4, 'nav_menu_item', '', 0),
(163, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '163', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=163', 3, 'nav_menu_item', '', 0),
(164, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '164', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=164', 5, 'nav_menu_item', '', 0),
(165, 1, '2015-01-27 14:35:05', '2015-01-27 13:35:05', ' ', '', '', 'publish', 'open', 'open', '', '165', '', '', '2015-01-27 14:35:11', '2015-01-27 13:35:11', '', 5, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=165', 6, 'nav_menu_item', '', 0),
(173, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 'Mur general', '', 'publish', 'open', 'open', '', 'mur-general', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=173', 1, 'nav_menu_item', '', 0),
(174, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', ' ', '', '', 'publish', 'open', 'open', '', '174', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=174', 3, 'nav_menu_item', '', 0),
(175, 1, '2015-10-09 13:29:15', '2015-10-09 12:29:15', ' ', '', '', 'publish', 'open', 'open', '', '175', '', '', '2015-10-09 13:29:15', '2015-10-09 12:29:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=175', 2, 'nav_menu_item', '', 0),
(292, 1, '2016-01-21 09:53:14', '2016-01-21 08:53:14', 'Autorització relativa als alumnes: ús d''imatges, publicació de dades de caràcter personal i de material que elaboren (menors de 14 anys)\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=imatge_menors_14" target="_blank">Enllaç al document</a>', 'Autorització drets d’imatge, dades i materials (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-drets-dimatge-dades-i-materials-menors-de-14-anys', '', '', '2016-01-21 19:33:08', '2016-01-21 18:33:08', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(297, 1, '2016-01-21 09:59:27', '2016-01-21 08:59:27', 'Autorització relativa als alumnes de menys de 14 anys: ús de serveis i recursos digitals per treballar a l''aula.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=serveis_menors_14">Enllaç al document</a>', 'Autorització ús de serveis i recursos digitals a l’aula (menors de 14 anys)', '', 'publish', 'open', 'open', '', 'autoritzacio-us-de-serveis-i-recursos-digitals-a-laula-menors-de-14-anys', '', '', '2016-01-21 19:33:01', '2016-01-21 18:33:01', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(302, 1, '2016-01-21 10:07:15', '2016-01-21 09:07:15', '<a href="http://xtec.cat/monografics/nodes/links.html?id=paracetamol" target="_blank">Enllaç al document</a>', 'Autorització per a l’administració del paracetamol', '', 'publish', 'open', 'open', '', 'autoritzacio-per-a-ladministracio-del-paracetamol', '', '', '2016-01-21 19:32:54', '2016-01-21 18:32:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(304, 1, '2016-01-21 10:13:32', '2016-01-21 09:13:32', 'Declaració responsable justificativa d’absència per motius de salut d’assistència a consulta mèdica. Personal docent.\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=consulta_metge" target="_blank">Enllaç al document</a>', 'Justificant d’absència per motius de salut o consulta mèdica', '', 'publish', 'open', 'open', '', 'justificant-dabsencia-per-motius-de-salut-o-consulta-medica', '', '', '2016-01-21 19:32:46', '2016-01-21 18:32:46', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(308, 1, '2016-01-21 10:22:39', '2016-01-21 09:22:39', '<ul>\r\n	<li>Llicència per estudis (sense retribució). Màxim: un curs escolar</li>\r\n	<li>Llicència per assumptes propis</li>\r\n	<li>Llicència per accident laboral</li>\r\n	<li>Llicència per incapacitat temporal per malaltia comuna i risc durant l’embaràs</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=llicencia" target="_blank">Enllaç al document</a>\r\n\r\n&nbsp;', 'Sol·licitud de llicència', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-llicencia', '', '', '2016-01-21 19:32:38', '2016-01-21 18:32:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(312, 1, '2016-01-21 10:26:50', '2016-01-21 09:26:50', '<a href="http://xtec.cat/monografics/nodes/links.html?id=jurada_permisos_llicencies" target="_blank">Enllaç al document</a>', 'Declaració jurada o promesa per sol·licitar permisos i llicències', '', 'publish', 'open', 'open', '', 'declaracio-jurada-o-promesa-per-sol%c2%b7licitar-permisos-i-llicencies', '', '', '2016-01-21 19:32:30', '2016-01-21 18:32:30', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(314, 1, '2016-01-21 10:30:24', '2016-01-21 09:30:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reduccio_cura_fills" target="_blank">Enllaç al document</a>', 'Sol·licitud de reducció de jornada per tenir cura d’un fill o filla', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reduccio-de-jornada-per-tenir-cura-dun-fill-o-filla', '', '', '2016-01-21 19:32:16', '2016-01-21 18:32:16', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(317, 1, '2016-01-21 12:14:13', '2016-01-21 11:14:13', 'Sol·licitud de compatibilitat per a activitats públiques i/o privades\r\n<a style="line-height: 1.5;" href="http://xtec.cat/monografics/nodes/links.html?id=compatibilitat" target="_blank">Enllaç al document</a>', 'Sol·licitud de Compatibilitat', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-compatibilitat', '', '', '2016-01-21 19:31:54', '2016-01-21 18:31:54', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(318, 1, '2016-01-21 12:08:22', '2016-01-21 11:08:22', '<a href="http://xtec.cat/monografics/nodes/links.html?id=triennis" target="_blank">Enllaç al document</a>', 'Sol·licitud de reconeixement de triennis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-de-triennis', '', '', '2016-01-21 19:32:09', '2016-01-21 18:32:09', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(320, 1, '2016-01-21 12:11:38', '2016-01-21 11:11:38', 'Sol·licitud de reconeixement d’estadi de promoció docent\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=promocio">Enllaç al document</a>', 'Sol·licitud de reconeixement d’estadi de promoció docent', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-reconeixement-destadi-de-promocio-docent', '', '', '2016-01-21 19:32:01', '2016-01-21 18:32:01', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(323, 1, '2016-01-21 12:17:45', '2016-01-21 11:17:45', '<ul>\r\n	<li>Ordre del dia</li>\r\n	<li>Desenvolupament de la sessió</li>\r\n	<li>Acords</li>\r\n	<li>Temes pendents</li>\r\n</ul>\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=acta_reunio" target="_blank">Enllaç al document</a>', 'Model d’acta de reunió', '', 'publish', 'open', 'open', '', 'model-dacta-de-reunio', '', '', '2016-01-21 19:31:47', '2016-01-21 18:31:47', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(326, 1, '2016-01-21 12:20:11', '2016-01-21 11:20:11', '<a href="http://xtec.cat/monografics/nodes/links.html?id=declaracio_jurada" target="_blank">Enllaç al document</a>', 'Declaració jurada', '', 'publish', 'open', 'open', '', 'declaracio-jurada', '', '', '2016-01-21 19:31:40', '2016-01-21 18:31:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(328, 1, '2016-01-21 12:22:12', '2016-01-21 11:22:12', '<a href="http://xtec.cat/monografics/nodes/links.html?id=solicitud" target="_blank">Enllaç al document</a>', 'Sol·licitud (genèrica)', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-generica', '', '', '2016-01-21 19:31:33', '2016-01-21 18:31:33', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(330, 1, '2016-01-21 12:23:59', '2016-01-21 11:23:59', 'Model de certificat\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=certificat" target="_blank">Enllaç al document</a>', 'Certificat', '', 'publish', 'open', 'open', '', 'certificat', '', '', '2016-01-21 19:31:26', '2016-01-21 18:31:26', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(332, 1, '2016-01-21 12:25:21', '2016-01-21 11:25:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_ordinaria" target="_blank">Enllaç al document</a>', 'Model de Reunió ordinaria', '', 'publish', 'open', 'open', '', 'model-de-reunio-ordinaria', '', '', '2016-01-21 19:31:20', '2016-01-21 18:31:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(334, 1, '2016-01-21 12:32:44', '2016-01-21 11:32:44', 'Model reunió extraordinària\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=reunio_extraordinaria" target="_blank">Enllaç al document</a>', 'Reunió extraordinària', '', 'publish', 'open', 'open', '', 'reunio-extraordinaria', '', '', '2016-01-21 19:31:10', '2016-01-21 18:31:10', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(336, 1, '2016-01-21 13:05:40', '2016-01-21 12:05:40', 'Sol·licitud de control de glucosa als alumnes amb diabetis i autorització de l’administració d’insulina\n\n<a href="http://xtec.cat/monografics/nodes/links.html?id=control_diabetes" target="_blank">Enllaç al document</a>', 'Sol·licitud de control de glucosa i administració d’insulina', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-de-control-de-glucosa-i-administracio-dinsulina', '', '', '2016-01-21 13:05:40', '2016-01-21 12:05:40', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(338, 1, '2016-01-21 13:08:02', '2016-01-21 12:08:02', '<a href="http://xtec.cat/monografics/nodes/links.html?id=administracio_insulina" target="_blank">Enllaç al document</a>', 'Sol·licitud i autorització d’administració de glucagó als alumnes amb diabetis', '', 'publish', 'open', 'open', '', 'sol%c2%b7licitud-i-autoritzacio-dadministracio-de-glucago-als-alumnes-amb-diabetis', '', '', '2016-01-21 13:08:02', '2016-01-21 12:08:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(339, 1, '2016-01-21 13:08:37', '2016-01-21 12:08:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=orientacions_compromis" target="_blank">Enllaç al document</a>', 'Orientacions per elaborar la carta de compromís', '', 'publish', 'open', 'open', '', 'orientacions-per-elaborar-la-carta-de-compromis', '', '', '2016-01-21 19:31:02', '2016-01-21 18:31:02', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(348, 1, '2016-01-21 13:15:18', '2016-01-21 12:15:18', '<a href="http://xtec.cat/monografics/nodes/links.html?id=programacions_recursos" target="_blank">Enllaç al document</a>', 'Programacions i recursos didàctics', '', 'publish', 'open', 'open', '', 'programacions-i-recursos-didactics', '', '', '2016-01-21 19:30:53', '2016-01-21 18:30:53', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(350, 1, '2016-01-21 13:16:21', '2016-01-21 12:16:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=convivencia" target="_blank">Enllaç al document</a>', 'Convivència i clima escolar', '', 'publish', 'open', 'open', '', 'convivencia-i-clima-escolar', '', '', '2016-01-21 19:30:45', '2016-01-21 18:30:45', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(352, 1, '2016-01-21 13:17:24', '2016-01-21 12:17:24', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_gestio" target="_blank">Enllaç al document</a>', 'Documents de gestió de centre', '', 'publish', 'open', 'open', '', 'documents-de-gestio-de-centre', '', '', '2016-01-21 19:30:38', '2016-01-21 18:30:38', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(354, 1, '2016-01-21 13:18:28', '2016-01-21 12:18:28', 'Documents per a l''organització i la gestió dels centres\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_tac" target="_blank">Enllaç al document</a>', 'Tecnologies per a l’aprenentatge i el coneixement', '', 'publish', 'open', 'open', '', 'tecnologies-per-a-laprenentatge-i-el-coneixement', '', '', '2016-01-21 19:30:29', '2016-01-21 18:30:29', '', 387, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(356, 1, '2016-01-21 13:19:20', '2016-01-21 12:19:20', '<a href="http://xtec.cat/monografics/nodes/links.html?id=innovacio" target="_blank">Enllaç al document</a>', 'Innovació pedagògica', '', 'publish', 'open', 'open', '', 'innovacio-pedagogica', '', '', '2016-01-21 19:30:09', '2016-01-21 18:30:09', '', 387, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(358, 1, '2016-01-21 13:20:28', '2016-01-21 12:20:28', 'Objectius prioritaris del sistema educatiu i projecte educatiu de centre\r\n\r\n<a href="http://xtec.cat/monografics/nodes/links.html?id=objectius_prioritaris" target="_blank">Enllaç al document</a>', 'Orientacions projecte educatiu de centre', '', 'publish', 'open', 'open', '', 'projecte-educatiu-de-centre', '', '', '2016-01-21 19:29:05', '2016-01-21 18:29:05', '', 387, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(360, 1, '2016-01-21 13:21:29', '2016-01-21 12:21:29', '<a href="http://xtec.cat/monografics/nodes/links.html?id=participacio_comunitat" target="_blank">Enllaç al document</a>', 'Participació de la comunitat educativa', '', 'publish', 'open', 'open', '', 'participacio-de-la-comunitat-educativa', '', '', '2016-01-21 19:28:56', '2016-01-21 18:28:56', '', 387, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(362, 1, '2016-01-21 13:22:40', '2016-01-21 12:22:40', '<a href="http://xtec.cat/monografics/nodes/links.html?id=projecte_llinguistic" target="_blank">Enllaç al document</a>', 'El projecte lingüístic', '', 'publish', 'open', 'open', '', 'el-projecte-linguistic', '', '', '2016-01-21 19:28:49', '2016-01-21 18:28:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(364, 1, '2016-01-21 13:23:43', '2016-01-21 12:23:43', '<a href="http://xtec.cat/monografics/nodes/links.html?id=avaluacio_centre" target="_blank">Enllaç al document</a>', 'Avaluació de centre', '', 'publish', 'open', 'open', '', 'avaluacio-de-centre', '', '', '2016-01-21 19:28:27', '2016-01-21 18:28:27', '', 387, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(366, 1, '2016-01-21 13:55:35', '2016-01-21 12:55:35', '<a href="http://xtec.cat/monografics/nodes/links.html?id=doc_centre" target="_blank">Enllaç al document</a>', 'Document genèric de centre', '', 'publish', 'open', 'open', '', 'document-generic-de-centre', '', '', '2016-01-21 19:28:13', '2016-01-21 18:28:13', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(379, 1, '2016-01-21 16:13:07', '2016-01-21 15:13:07', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_administratius" target="_blank">Pàgina de referència</a> del portal de centres (Departament d''Ensenyament)\r\nRequereix validació amb usuari XTEC.\r\n<div class="elemento">\r\n<h4></h4>\r\n<div style="text-align: justify;">\r\n\r\nIndex dels documents que trobareu, de cada document administratiu, plantilles, esquemes, exemples, l''explicació de la seva estructura i la legislació que cal aplicar-hi.\r\n\r\n</div>\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Acta de reunió</strong> Document mitjançant el qual es deixa constància de les incidències, les deliberacions i els acords d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Certificat</strong> Document amb què es dóna fe pública i per escrit d’alguna circumstància, fet o actuació.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Comunicat intern </strong>Document no oficial amb què es fa arribar informació diversa a les unitats o al personal d’un organisme.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Contracte i conveni</strong> Document en què es recull l’acord de voluntats entre diferents persones o institucions per fer o no fer una determinada cosa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Convocatòria de reunió</strong> Document per mitjà del qual se sol·licita l’assistència d’una persona a una sessió d’un òrgan col·legiat.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Currículum </strong>Document en què es detallen el conjunt de les dades personals i els mèrits acadèmics i professionals d’una persona.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Declaració jurada</strong> Document amb què es manifesta sota jurament o promesa un fet o esdeveniment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Diligència</strong> Document mitjançant el qual l’Administració fa constar internament l’execució d’un fet o una actuació determinada.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Edicte</strong> Document que s’utilitza per acomplir una disposició legal, per citar algú o per anunciar la celebració d’un acte.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Informe</strong> Document per mitjà del qual s’exposen tots els elements tècnics i jurídics relatius a un assumpte que cal tenir en compte per resoldre un procediment.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Invitació </strong>Document amb què es convida algú a un acte públic.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici extern</strong> Document monotemàtic amb què l’Administració comunica continguts relacionats amb la tramitació d’un expedient a altres òrgans de l’Administració o bé als ciutadans.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Ofici intern</strong> Document monotemàtic que utilitza l’Administració per establir comunicació entre els diferents òrgans administratius.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Plec de clàusules administratives</strong> Document en què es recullen les bases i els referents necessaris abans de la formulació de determinats contractes.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Recurs</strong> Document per mitjà del qual una persona expressa la seva disconformitat amb una resolució administrativa.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Resolució</strong> Document per mitjà del qual es presenta la decisió d’un òrgan administratiu quan finalitza el procediment administratiu.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Saluda</strong> Document de caràcter protocol·lari amb què es trameten agraïments, felicitacions, etc.\r\n\r\n</div>\r\n<div class="elistado">\r\n<h3></h3>\r\n<strong>Sol·licitud</strong> Document per mitjà del qual l’administrat demana a l’Administració alguna cosa referent a una matèria de tramitació reglada.\r\n\r\n</div>', 'Documents administratius', '', 'publish', 'open', 'open', '', 'documents-administratius', '', '', '2016-01-21 19:27:49', '2016-01-21 18:27:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(383, 1, '2016-01-21 16:17:21', '2016-01-21 15:17:21', '<a href="http://xtec.cat/monografics/nodes/links.html?id=competencies_basiques" target="_blank">Pàgina de referència</a> al portal de centres (Departament d''Ensenyament)', 'Competències bàsiques', '', 'publish', 'open', 'open', '', 'competencies-basiques', '', '', '2016-01-21 19:26:42', '2016-01-21 18:26:42', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(385, 1, '2016-01-21 16:22:17', '2016-01-21 15:22:17', 'Consells i orientacions d''estil.\r\n<a href="http://educacio.gencat.cat/documents/IPCrecursos/Plantilles/Guia_Estil_Departament.pdf" target="_blank">Enllaç al document</a>', 'Guia d’estil del Departament d’Ensenyament', '', 'publish', 'open', 'open', '', 'guia-destil-del-departament-densenyament', '', '', '2016-01-21 19:26:22', '2016-01-21 18:26:22', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(387, 1, '2016-01-21 16:30:37', '2016-01-21 15:30:37', '<a href="http://xtec.cat/monografics/nodes/links.html?id=docs_ges_centre" target="_blank">Pàgina de referència</a> amb cercador de documents per la organització i la gestió d''un centre. Requereix validació amb usuari XTEC. Index dels documents que podeu trobar:\r\n<table border="1" summary="" width="90%" cellspacing="1" cellpadding="1" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="estil1" style="text-align: center;"><strong>Projecte educatiu de centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Currículum</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Organització del centre</strong></td>\r\n<td class="estil1" style="text-align: center;"><strong>Gestió del centre</strong></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Avaluació de centre</td>\r\n<td class="estil2">Cicles de formació professional LOGSE i LOE. Cursos per a l''accés a grau mitjà i a grau superior</td>\r\n<td class="estil2">Escoles rurals i zones escolars rurals</td>\r\n<td class="estil2">Actuacions del centre en diversos supòsits</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Convivència i clima escolar</td>\r\n<td class="estil2" bgcolor="#eeeeee">Cicles esportius LOGSE i LOE</td>\r\n<td class="estil2" bgcolor="#eeeeee">Organització de les llars d''infants</td>\r\n<td class="estil2" bgcolor="#eeeeee">Aspectes específics amb relació als alumnes dels centres d''adults</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Documents de gestió del centre</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''educació infantil i primària</td>\r\n<td class="estil2">Organització del temps escolar</td>\r\n<td class="estil2">Assegurances i assistència jurídica al personal</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">El tractament i l''ús de les llengües al sistema educatiu. El projecte lingüístic</td>\r\n<td class="estil2" bgcolor="#eeeeee">Concreció i desenvolupament del currículum del batxillerat</td>\r\n<td class="estil2" bgcolor="#eeeeee">Òrgans unipersonals de direcció i de coordinació</td>\r\n<td class="estil2" bgcolor="#eeeeee">Formació del personal dels centres educatius</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Innovació pedagògica</td>\r\n<td class="estil2">Concreció i desenvolupament del currículum de l''ESO</td>\r\n<td class="estil2">Personal d''administració i serveis i professionals d''atenció educativa</td>\r\n<td class="estil2">Gestió del personal d''administració i serveis i dels professionals d''atenció educativa</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Objectius prioritaris del sistema educatiu i projecte educatiu de centre</td>\r\n<td class="estil2" bgcolor="#eeeeee">Coordinació entre l''educació primària i l''educació secundària obligatòria</td>\r\n<td class="estil2" bgcolor="#eeeeee">Personal docent</td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió del personal de les llars d''infants</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2">Participació de la comunitat educativa</td>\r\n<td class="estil2">Currículum del primer cicle de l''educació infantil</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Gestió del personal docent</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee">Tecnologies per a l''aprenentatge i el coneixement</td>\r\n<td class="estil2" bgcolor="#eeeeee">Currículum dels ensenyaments d''idiomes</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Gestió econòmica, acadèmica i administrativa del centre</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments artístics superiors</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Protecció de dades personals, ús d''imatges, propietat intel·lectual, Internet i correu electrònic</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyament de la religió</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Recollida de dades. Registre d''alumnes (RALC), indicadors i Estadística de l''ensenyament</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments  de dansa de grau professional</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Seguretat i salut</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments  de música de grau professional</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Situacions específiques dels alumnes</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ensenyaments en els centres d’adults</td>\r\n<td class="estil2"></td>\r\n<td class="estil2">Ús social dels centres</td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Ensenyaments professionals d''arts plàstiques i disseny: aspectes curriculars</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Formació professional dual</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">L''educació bàsica als centres d''educació especial</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Orientació educativa i acció tutorial a l''ESO</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Programacions i recursos didàctics</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff">Programes de formació i inserció:desenvolupament i aplicació</td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n<td class="estil2" bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de dansa</td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n<td class="estil2" bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td class="estil2"></td>\r\n<td class="estil2">Simultaneïtat d''estudis d''ESO o de batxillerat amb estudis de música</td>\r\n<td class="estil2"></td>\r\n<td class="estil2"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Documents de organització i gestió de centre', '', 'publish', 'open', 'open', '', 'document-de-organitzacio-i-gestio-de-centre', '', '', '2016-01-21 19:25:29', '2016-01-21 18:25:29', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(391, 1, '2016-01-21 16:51:03', '2016-01-21 15:51:03', '<a href="http://xtec.cat/monografics/nodes/links.html?id=cataleg_models" target="_blank">Pàgina de referència</a> (Pot requerir validació XTEC)\r\n\r\n\r\n<table border="1" width="100%" rules="cols" cellspacing="1" cellpadding="1">\r\n<tbody>\r\n<tr>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió i documentació acadèmica</span></strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000" width="43%"><strong><span style="color: #ffffff;">Gestió administrativa</span></strong></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Primer cicle d''educació infantil (llars d''infants) <a title="Vés a Primer cicle d''educació infantil (Llars d''infants)" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Llars%20d%27infants?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td bgcolor="#eeeeee" width="43%">Certificats <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Certificats?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Segon cicle d''educació infantil <a title="Vés a Segon cicle d''educació infantil" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Segon%20cicle%20d%27educaci%F3%20infantil?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td width="4%"></td>\r\n<td width="43%">Proves per completar els estudis d''ESO <a title="Vés al Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Proves%20anuals%20per%20completar%20els%20ensenyaments%20d%27ESO?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació primària<a title="Vés a Educació primària" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20prim%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Protecció de dades personals <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Protecci%F3%20de%20dades%20personals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Educació secundària obligatòria <a title="Vés a Educació secundària obligatòria" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20secund%E0ria%20obligat%F2ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Simultaneïtat d''estudis amb música i dansa <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Simultane%EFtat%20d%27estudis%20amb%20m%FAsica%20o%20dansa?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Batxillerat <a title="Vés a Batxillerat" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Batxillerat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Títols (sol·licituds, homologació,etc.) <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/DC1CC70C18363E38E04400144F0D5CC2?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Formació Professional <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Formaci%F3%20professional?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Preinscripció i matrícula <a title="Vés a Preinscripció i matrícula" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Preinscripci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Programes de formació i inserció <a title="Vés a Programes de formació i inserció" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20formaci%F3%20i%20inserci%F3?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries centres <a href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Projecte%20de%20qualitat%20i%20millora%20cont%EDnua?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments artístics <a title="Vés a Ensenyaments artístics" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20art%EDstics?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments esportius <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20esportius?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Personal de centres\r\n</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td>Ensenyaments d''idiomes <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Ensenyaments%20d%27idiomes?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Gestió del personal <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20personal%20docent?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Educació d''adults <a title="Vés a Educació d''adults" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Educaci%F3%20d%27adults?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Tràmits del personal docent <a title="Vés a Assistència del personal docent i sol·licituds" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Assist%E8ncia%20del%20professorat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Programes de qualificació professional inicial (PQPI) <a title="Vés a Programes de qualificació professional inicial" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Programes%20de%20qualificaci%F3%20professional%20inicial?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Tràmits PAS i professionals d''atenció educativa <a title="Vés a Gestió de personal docent" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Tr%E0mits%20del%20PAS?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Convocatòries de personal docent <a title="Vés a Convocatòries de personal" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Ajuts i serveis\r\n</strong></span></td>\r\n<td></td>\r\n<td>Plantilles i provisió de llocs docents <a title="Vés a Plantilles i provisió de llocs" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Convocat%F2ries%20de%20personal1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ajuts i beques <a title="Vés a Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Beques%20i%20ajuts?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Professors de religió <a title="Vés a Professors de religió" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Plantilles%20i%20provisi%F3%20de%20llocs?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td>Atenció educativa domiciliària <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Atenci%F3%20domicili%E0ria?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td>Prevenció de riscos laborals <a title="Vés a Prevenció de riscos laborals" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Prevenci%F3%20de%20riscos%20laborals?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+] </strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Ensenyaments professionals <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Estades%20formatives?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td>Subvencions <strong>[+]</strong></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Equipaments</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Transport escolar <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Transport%20escolar?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Gestió de les TIC <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gsti%F3%20de%20les%20TIC?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Eleccions al consell escolar\r\n</strong></span></td>\r\n<td></td>\r\n<td>Gestió de les instal·lacions <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Gesti%F3%20de%20les%20instal%B7lacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Eleccions%20als%20consell%20escolars?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee"></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió econòmica </strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Seguretat i salut\r\n</strong></span></td>\r\n<td></td>\r\n<td>Pressupost i altres <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Pressupost%20i%20altres?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Autoritzacions  <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Autoritzacions?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Devolucions de taxes <a title="Vés a Devolució de taxes" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/T%EDtols%20acad%E8mics1?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td bgcolor="#ffffff"></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Gestió de serveis d''FP</strong></span></td>\r\n<td></td>\r\n<td bgcolor="#cc0000"><span style="color: #ffffff;"><strong>Contractació</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee">Models del procediment <a title="Vés als Models" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Models%20del%20procediment?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte menor <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contractes%20menors?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td></td>\r\n<td></td>\r\n<td>Contracte negociat <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20negociat?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n<tr>\r\n<td bgcolor="#eeeeee"></td>\r\n<td></td>\r\n<td bgcolor="#eeeeee">Contracte obert <a title="Vés als Contracte menor" href="http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Inici/PortalCentres/PCCatalegModels/Contracte%20obert?_template=/EducacioIntranet/IDE_ITEM_PLACEHOLDER"><strong>[+]</strong></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Catàleg de models', '', 'publish', 'open', 'open', '', 'cataleg-de-models', '', '', '2016-01-21 19:25:12', '2016-01-21 18:25:12', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(432, 1, '2016-01-21 19:36:16', '2016-01-21 18:36:16', '<a href="http://xtec.cat/monografics/nodes/links.html?id=comunicacio_diabetes" target="_blank">Enllaç al document</a>', 'Comunicació de l’escolarització d’un infant amb diabetis al centre d’atenció primària (CAP)', '', 'publish', 'open', 'open', '', 'comunicacio-de-lescolaritzacio-dun-infant-amb-diabetis-al-centre-datencio-primaria-cap', '', '', '2016-01-21 19:38:15', '2016-01-21 18:38:15', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/docs/', 0, 'bp_doc', '', 0),
(435, 1, '2016-01-21 19:41:40', '2016-01-21 18:41:40', '', 'Documents', '', 'publish', 'open', 'open', '', 'documents', '', '', '2016-01-21 19:42:18', '2016-01-21 18:42:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?p=435', 10, 'nav_menu_item', '', 0),
(436, 1, '2016-03-29 12:39:43', '2016-03-29 11:39:43', '', 'Activa', '', 'publish', 'closed', 'closed', '', 'activa', '', '', '2016-03-29 12:39:49', '2016-03-29 11:39:49', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=436', 0, 'page', '', 0),
(440, 1, '2016-03-29 12:42:09', '2016-03-29 11:42:09', '', 'Registre', '', 'publish', 'closed', 'closed', '', 'registre', '', '', '2016-03-29 12:51:43', '2016-03-29 11:51:43', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/?page_id=440', 0, 'page', '', 0),
(442, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', '{{poster.name}} replied to one of your updates:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your updates', '{{poster.name}} replied to one of your updates:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-updates', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-poster-name-replied-to-one-of-your-updates/', 0, 'bp-email', '', 0),
(443, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', '{{poster.name}} replied to one of your comments:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{thread.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} replied to one of your comments', '{{poster.name}} replied to one of your comments:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{thread.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-replied-to-one-of-your-comments', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-poster-name-replied-to-one-of-your-comments/', 0, 'bp-email', '', 0),
(444, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', '{{poster.name}} mentioned you in a status update:\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in a status update', '{{poster.name}} mentioned you in a status update:\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-a-status-update', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-poster-name-mentioned-you-in-a-status-update/', 0, 'bp-email', '', 0),
(445, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{mentioned.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] {{poster.name}} mentioned you in an update', '{{poster.name}} mentioned you in the group "{{group.name}}":\n\n"{{usermessage}}"\n\nGo to the discussion to reply or catch up on the conversation: {{{mentioned.url}}}', 'publish', 'closed', 'closed', '', 'site-name-poster-name-mentioned-you-in-an-update', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-poster-name-mentioned-you-in-an-update/', 0, 'bp-email', '', 0),
(446, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: <a href="{{{activate.url}}}">{{{activate.url}}}</a>', '[{{{site.name}}}] Activate your account', 'Thanks for registering!\n\nTo complete the activation of your account, go to the following link: {{{activate.url}}}', 'publish', 'closed', 'closed', '', 'site-name-activate-your-account', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-activate-your-account/', 0, 'bp-email', '', 0),
(447, 1, '2016-07-01 10:38:27', '2016-07-01 09:38:27', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: <a href="{{{activate-site.url}}}">{{{activate-site.url}}}</a>.\n\nAfter you activate, you can visit your site at <a href="{{{user-site.url}}}">{{{user-site.url}}}</a>.', '[{{{site.name}}}] Activate {{{user-site.url}}}', 'Thanks for registering!\n\nTo complete the activation of your account and site, go to the following link: {{{activate-site.url}}}\n\nAfter you activate, you can visit your site at {{{user-site.url}}}.', 'publish', 'closed', 'closed', '', 'site-name-activate-user-site-url', '', '', '2016-07-01 10:38:27', '2016-07-01 09:38:27', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-activate-user-site-url/', 0, 'bp-email', '', 0),
(448, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', '<a href="{{{initiator.url}}}">{{initiator.name}}</a> wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: <a href="{{{friend-requests.url}}}">{{{friend-requests.url}}}</a>', '[{{{site.name}}}] New friendship request from {{initiator.name}}', '{{initiator.name}} wants to add you as a friend.\n\nTo accept this request and manage all of your pending requests, visit: {{{friend-requests.url}}}\n\nTo view {{initiator.name}}''s profile, visit: {{{initiator.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-friendship-request-from-initiator-name', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-new-friendship-request-from-initiator-name/', 0, 'bp-email', '', 0),
(449, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', '<a href="{{{friendship.url}}}">{{friend.name}}</a> accepted your friend request.', '[{{{site.name}}}] {{friend.name}} accepted your friendship request', '{{friend.name}} accepted your friend request.\n\nTo learn more about them, visit their profile: {{{friendship.url}}}', 'publish', 'closed', 'closed', '', 'site-name-friend-name-accepted-your-friendship-request', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-friend-name-accepted-your-friendship-request/', 0, 'bp-email', '', 0),
(450, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', 'Group details for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; were updated:\n<blockquote>{{changed_text}}</blockquote>', '[{{{site.name}}}] Group details updated', 'Group details for the group &quot;{{group.name}}&quot; were updated:\n\n{{changed_text}}\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-group-details-updated', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-group-details-updated/', 0, 'bp-email', '', 0),
(451, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', '<a href="{{{inviter.url}}}">{{inviter.name}}</a> has invited you to join the group: &quot;{{group.name}}&quot;.\n<a href="{{{invites.url}}}">Go here to accept your invitation</a> or <a href="{{{group.url}}}">visit the group</a> to learn more.', '[{{{site.name}}}] You have an invitation to the group: "{{group.name}}"', '{{inviter.name}} has invited you to join the group: &quot;{{group.name}}&quot;.\n\nTo accept your invitation, visit: {{{invites.url}}}\n\nTo learn more about the group, visit {{{group.url}}}.\nTo view {{inviter.name}}''s profile, visit: {{{inviter.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-an-invitation-to-the-group-group-name', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-you-have-an-invitation-to-the-group-group-name/', 0, 'bp-email', '', 0),
(452, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', 'You have been promoted to <b>{{promoted_to}}</b> in the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot;.', '[{{{site.name}}}] You have been promoted in the group: "{{group.name}}"', 'You have been promoted to {{promoted_to}} in the group: &quot;{{group.name}}&quot;.\n\nTo visit the group, go to: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-you-have-been-promoted-in-the-group-group-name', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-you-have-been-promoted-in-the-group-group-name/', 0, 'bp-email', '', 0),
(453, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', '<a href="{{{profile.url}}}">{{requesting-user.name}}</a> wants to join the group &quot;{{group.name}}&quot;. As you are an administrator of this group, you must either accept or reject the membership request.\n\n<a href="{{{group-requests.url}}}">Go here to manage this</a> and all other pending requests.', '[{{{site.name}}}] Membership request for group: {{group.name}}', '{{requesting-user.name}} wants to join the group &quot;{{group.name}}&quot;. As you are the administrator of this group, you must either accept or reject the membership request.\n\nTo manage this and all other pending requests, visit: {{{group-requests.url}}}\n\nTo view {{requesting-user.name}}''s profile, visit: {{{profile.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-membership-request-for-group-group-name/', 0, 'bp-email', '', 0),
(454, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n<blockquote>&quot;{{usermessage}}&quot;</blockquote>\n\n<a href="{{{message.url}}}">Go to the discussion</a> to reply or catch up on the conversation.', '[{{{site.name}}}] New message from {{sender.name}}', '{{sender.name}} sent you a new message: &quot;{{usersubject}}&quot;\n\n&quot;{{usermessage}}&quot;\n\nGo to the discussion to reply or catch up on the conversation: {{{message.url}}}', 'publish', 'closed', 'closed', '', 'site-name-new-message-from-sender-name', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-new-message-from-sender-name/', 0, 'bp-email', '', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(455, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, <a href="{{{verify.url}}}">go here to confirm the change</a>.\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', '[{{{site.name}}}] Verify your new email address', 'You recently changed the email address associated with your account on {{site.name}}. If this is correct, go to the following link to confirm the change: {{{verify.url}}}\n\nOtherwise, you can safely ignore and delete this email if you have changed your mind, or if you think you have received this email in error.', 'publish', 'closed', 'closed', '', 'site-name-verify-your-new-email-address', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-verify-your-new-email-address/', 0, 'bp-email', '', 0),
(456, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been accepted.', '[{{{site.name}}}] Membership request for group "{{group.name}}" accepted', 'Your membership request for the group &quot;{{group.name}}&quot; has been accepted.\n\nTo view the group, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-accepted', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-membership-request-for-group-group-name-accepted/', 0, 'bp-email', '', 0),
(457, 1, '2016-07-01 10:38:28', '2016-07-01 09:38:28', 'Your membership request for the group &quot;<a href="{{{group.url}}}">{{group.name}}</a>&quot; has been rejected.', '[{{{site.name}}}] Membership request for group "{{group.name}}" rejected', 'Your membership request for the group &quot;{{group.name}}&quot; has been rejected.\n\nTo request membership again, visit: {{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-membership-request-for-group-group-name-rejected', '', '', '2016-07-01 10:38:28', '2016-07-01 09:38:28', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-membership-request-for-group-group-name-rejected/', 0, 'bp-email', '', 0),
(458, 0, '2019-05-13 09:44:18', '2019-05-13 07:44:18', '{{{ia.content}}}<br /><hr><a href="{{{ia.accept_url}}}">Accepteu o rebutgeu aquesta invitació</a> &middot; <a href="{{{ia.opt_out_url}}}">Desactiveu les invitacions futures</a>', '[{{{site.name}}}] {{{ia.subject}}}', '{{{ia.content_plaintext}}}', 'publish', 'closed', 'closed', '', 'site-name-ia-subject', '', '', '2019-05-13 09:44:18', '2019-05-13 07:44:18', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-ia-subject/', 0, 'bp-email', '', 0),
(459, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle/', 0, 'es_template', '', 0),
(460, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-2', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-2/', 0, 'es_template', '', 0),
(461, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-3', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-3/', 0, 'es_template', '', 0),
(462, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-4', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-4/', 0, 'es_template', '', 0),
(463, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-5', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-5/', 0, 'es_template', '', 0),
(464, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-6', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-6/', 0, 'es_template', '', 0),
(465, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-7', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-7/', 0, 'es_template', '', 0),
(466, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-8', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-8/', 0, 'es_template', '', 0),
(467, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-9', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-9/', 0, 'es_template', '', 0),
(468, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{NAME}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTDESC}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'S''ha publicat un article nou:  {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'sha-publicat-un-article-nou-posttitle-10', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/sha-publicat-un-article-nou-posttitle-10/', 0, 'es_template', '', 0),
(469, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', 'Hola {{EMAIL}},\r\n\r\nHem publicat un article nou al nostre lloc web. {{POSTTITLE}}\r\n{{POSTIMAGE}}\r\n{{POSTFULL}}\r\nPodeu veure l''últim article a {{POSTLINK}}\r\nHeu rebut aquest correu perquè vau demanar que se us notifiqués la publicació d''articles nous\r\n\r\nGràcies i salutacions\r\nAdmin', 'Notificació d''article nou {{POSTTITLE}}', '', 'publish', 'closed', 'closed', '', 'notificacio-darticle-nou-posttitle', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/notificacio-darticle-nou-posttitle/', 0, 'es_template', '', 0),
(470, 0, '2019-05-13 09:44:20', '2019-05-13 07:44:20', '<strong style="color: #990000"> Subscriptors de correu</strong><p>\r\n							L''extensió subscripcions de correu de correu té diferents opcions per enviar butlletins als subscriptors.\r\n							Té una pàgina separada amb un editor HTML per crear	un butlletí amb aquest format.\r\n							L''extensió disposa d''opcions per enviar correus de notificació als subscriptors quan es publiquen articles nous al lloc web. També té una pàgina per poder afegir i eliminar les categories a les que s''enviaran les notificacions.\r\n							Utilitzant les opcions de l''extensió d''importació i exportació els administradors podran importar fàcilment els usuaris registrats.\r\n						</p> <strong style="color: #990000">Característiques de l''extensió</strong><ol> <li>Correu de notificació als subscriptors quan es publiquin articles nous.</li> <li>Giny de subscripció</li><li>Correu de subscripció amb confirmació per correu i subscripció simple per facilitar la subscripció.</li> <li>Notificació per correu electrònic a l''administrador quan els usuaris es subscriguin (Opcional)</li> <li>Correu de benvinguda automàtic als subscriptors (Opcional).</li> <li>Enllaç per donar-se de baixa del correu.</li> <li>Importació / Exportació dels correus dels subscriptors.</li> <li>Editor d''HTML per redactar el butlletí.</li> </ol> <strong>Gràcies i salutacions</strong><br>Admin', 'Butlletí Hola Món', '', 'publish', 'closed', 'closed', '', 'butlleti-hola-mon', '', '', '2019-05-13 09:44:20', '2019-05-13 07:44:20', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/es_template/butlleti-hola-mon/', 0, 'es_template', '', 0),
(471, 2, '2019-05-13 12:21:05', '2019-05-13 10:21:05', '{{{ges.action}}}:\n\n<blockquote>{{{usermessage}}}</blockquote>\n&ndash;\n<a href="{{{thread.url}}}">Ves a la discussió</a> per respondre o posar-se al dia de la conversa.\n{{{ges.email-setting-description}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.action}}}:\n\n"{{{usermessage}}}"\n\nVes a la discussió per respondre o posar-te al dia de la conversa:\n{{{thread.url}}}\n\n----\n\n{{{ges.email-setting-description}}}\n\n{{{ges.email-setting-links}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject', '', '', '2019-05-13 12:21:05', '2019-05-13 10:21:05', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-ges-subject/', 0, 'bp-email', '', 0),
(472, 2, '2019-05-13 12:21:05', '2019-05-13 10:21:05', '{{{ges.digest-summary}}}{{{usermessage}}}\n&ndash;\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{site.name}}.', '[{{{site.name}}}] {{{ges.subject}}}', '{{{ges.digest-summary}}}\n\n{{{usermessage}}}\n\n----\n\nHeu rebut aquest missatge perquè esteu subscrit per rebre el resum de l''activitat en algun dels vostres grups a {{{site.name}}}.\n\nPer desactivar aquestes notificacions per grup, inicieu sessió i [visiteu la pàgina dels vostres grups]({{{ges.settings-link}}}) on podreu gestionar la configuració del correu per cada grup.', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-2', '', '', '2019-05-13 12:21:05', '2019-05-13 10:21:05', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-ges-subject-2/', 0, 'bp-email', '', 0),
(473, 2, '2019-05-13 12:21:05', '2019-05-13 10:21:05', 'Aquesta és una notificació del grup {{{group.link}}}:\n\n{{{usermessage}}}\n\n&ndash;\n<strong>Tingueu en compte:</strong> les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.', '[{{{site.name}}}] {{{ges.subject}}} - del node "{{{group.name}}}"', 'Aquesta és una notificació del grup "{{{group.name}}}":\n\n"{{{usermessage}}}"\n\n----\n\nTingueu en compte: les notificacions d''administració s''envien a tothom del node i no es poden deshabilitar.\n\nSi creieu que el servei s''està utilitzant malament contacteu amb l''administrador del lloc web.\n\nVisiteu la pàgina d''inici del node en aquest enllaç:\n{{{group.url}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-del-node-group-name', '', '', '2019-05-13 12:21:05', '2019-05-13 10:21:05', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-ges-subject-del-node-group-name/', 0, 'bp-email', '', 0),
(474, 2, '2019-05-13 12:21:05', '2019-05-13 10:21:05', '{{{usermessage}}}', '[{{{site.name}}}] {{{ges.subject}}}', '{{{usermessage}}}', 'publish', 'closed', 'closed', '', 'site-name-ges-subject-3', '', '', '2019-05-13 12:21:05', '2019-05-13 10:21:05', '', 0, 'https://pwc-int.educacio.intranet/agora/masterpri/general/site-name-ges-subject-3/', 0, 'bp-email', '', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'General', 'general', 0),
(2, 'Infantil', 'infantil', 0),
(3, 'P3', 'p3', 0),
(4, 'Portada', 'portada', 0),
(5, 'Primària', 'primaria', 0),
(6, 'Menú principal', 'menu-principal', 0),
(7, 'AMPA', 'ampa', 0),
(8, 'P4', 'p4', 0),
(9, 'P5', 'p5', 0),
(10, '1r', '1r', 0),
(11, '2n', '2n', 0),
(12, '3r', '3r', 0),
(13, '4t', '4t', 0),
(14, '5è', '5e', 0),
(15, '6è', '6e', 0),
(16, 'Sortides', 'sortides', 0),
(17, 'Plàstica', 'plastica', 0),
(18, 'Psicomotricitat', 'psicomotricitat', 0),
(19, 'Audiovisuals', 'audiovisuals', 0),
(20, 'Menú exemple', 'menu-exemple', 0),
(21, 'MenuNodes', 'menunodes', 0),
(22, 'autoritzacions', 'autoritzacions', 0),
(23, 'bp_docs_access_anyone', 'bp_docs_access_anyone', 0),
(24, 'LOPD', 'lopd', 0),
(25, 'secretaria', 'secretaria', 0),
(26, 'salut', 'salut', 0),
(27, 'bp_docs_access_group_member_1', 'bp_docs_access_group_member_1', 0),
(28, 'Professorat', 'bp_docs_associated_group_1', 0),
(29, 'orientació', 'orientacio', 0),
(30, 'actes', 'actes', 0),
(31, 'organització i gestió del centre', 'organitzacio-i-gestio-del-centre', 0),
(32, 'Fotografia', 'bp_docs_associated_group_17', 0),
(33, 'Mestres', 'bp_docs_associated_group_2', 0),
(34, 'bp_docs_access_group_member_2', 'bp_docs_access_group_member_2', 0),
(35, 'Infantil', 'infantil', 0),
(36, 'Primària', 'primaria', 0),
(37, 'activity-comment', 'activity-comment', 0),
(38, 'activity-comment-author', 'activity-comment-author', 0),
(39, 'activity-at-message', 'activity-at-message', 0),
(40, 'groups-at-message', 'groups-at-message', 0),
(41, 'core-user-registration', 'core-user-registration', 0),
(42, 'core-user-registration-with-blog', 'core-user-registration-with-blog', 0),
(43, 'friends-request', 'friends-request', 0),
(44, 'friends-request-accepted', 'friends-request-accepted', 0),
(45, 'groups-details-updated', 'groups-details-updated', 0),
(46, 'groups-invitation', 'groups-invitation', 0),
(47, 'groups-member-promoted', 'groups-member-promoted', 0),
(48, 'groups-membership-request', 'groups-membership-request', 0),
(49, 'messages-unread', 'messages-unread', 0),
(50, 'settings-verify-email-change', 'settings-verify-email-change', 0),
(51, 'groups-membership-request-accepted', 'groups-membership-request-accepted', 0),
(52, 'groups-membership-request-rejected', 'groups-membership-request-rejected', 0),
(53, 'google', 'google', 0),
(54, 'default-calendar', 'default-calendar', 0),
(55, 'invite-anyone-invitation', 'invite-anyone-invitation', 0),
(56, 'bp-ges-single', 'bp-ges-single', 0),
(57, 'bp-ges-digest', 'bp-ges-digest', 0),
(58, 'bp-ges-notice', 'bp-ges-notice', 0),
(59, 'bp-ges-welcome', 'bp-ges-welcome', 0);

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
(13, 3, 0),
(13, 4, 0),
(13, 8, 0),
(13, 11, 0),
(13, 13, 0),
(13, 15, 0),
(13, 19, 0),
(18, 4, 0),
(18, 7, 0),
(18, 8, 0),
(18, 10, 0),
(18, 11, 0),
(18, 12, 0),
(18, 13, 0),
(18, 14, 0),
(18, 17, 0),
(18, 18, 0),
(55, 6, 0),
(56, 6, 0),
(57, 6, 0),
(58, 6, 0),
(59, 6, 0),
(60, 6, 0),
(61, 6, 0),
(62, 6, 0),
(63, 6, 0),
(69, 6, 0),
(70, 6, 0),
(75, 6, 0),
(76, 6, 0),
(79, 6, 0),
(86, 6, 0),
(89, 6, 0),
(90, 6, 0),
(91, 6, 0),
(92, 6, 0),
(93, 6, 0),
(94, 6, 0),
(95, 6, 0),
(96, 6, 0),
(97, 6, 0),
(98, 6, 0),
(99, 6, 0),
(100, 6, 0),
(101, 6, 0),
(113, 4, 0),
(113, 5, 0),
(113, 7, 0),
(113, 8, 0),
(113, 9, 0),
(113, 13, 0),
(113, 14, 0),
(113, 15, 0),
(113, 17, 0),
(113, 18, 0),
(115, 3, 0),
(115, 4, 0),
(115, 8, 0),
(115, 9, 0),
(115, 10, 0),
(115, 16, 0),
(118, 4, 0),
(118, 10, 0),
(118, 11, 0),
(118, 12, 0),
(118, 13, 0),
(118, 16, 0),
(118, 19, 0),
(120, 4, 0),
(120, 10, 0),
(120, 11, 0),
(120, 16, 0),
(145, 53, 0),
(145, 54, 0),
(148, 6, 0),
(149, 6, 0),
(150, 20, 0),
(151, 20, 0),
(152, 20, 0),
(153, 20, 0),
(154, 20, 0),
(155, 20, 0),
(157, 21, 0),
(158, 21, 0),
(159, 21, 0),
(160, 22, 0),
(161, 22, 0),
(162, 22, 0),
(163, 22, 0),
(164, 22, 0),
(165, 22, 0),
(173, 23, 0),
(174, 23, 0),
(175, 23, 0),
(292, 24, 0),
(292, 26, 0),
(292, 27, 0),
(292, 35, 0),
(292, 36, 0),
(297, 24, 0),
(297, 26, 0),
(297, 27, 0),
(297, 35, 0),
(297, 36, 0),
(302, 24, 0),
(302, 27, 0),
(302, 28, 0),
(302, 35, 0),
(302, 36, 0),
(304, 28, 0),
(304, 35, 0),
(304, 36, 0),
(308, 35, 0),
(308, 36, 0),
(312, 35, 0),
(312, 36, 0),
(314, 35, 0),
(314, 36, 0),
(317, 35, 0),
(317, 36, 0),
(318, 35, 0),
(318, 36, 0),
(320, 35, 0),
(320, 36, 0),
(323, 32, 0),
(323, 35, 0),
(323, 36, 0),
(326, 35, 0),
(326, 36, 0),
(328, 35, 0),
(328, 36, 0),
(330, 35, 0),
(330, 36, 0),
(332, 35, 0),
(332, 36, 0),
(334, 35, 0),
(334, 36, 0),
(336, 25, 0),
(336, 27, 0),
(336, 28, 0),
(338, 25, 0),
(338, 27, 0),
(338, 28, 0),
(339, 35, 0),
(339, 36, 0),
(348, 35, 0),
(348, 36, 0),
(350, 35, 0),
(350, 36, 0),
(352, 35, 0),
(352, 36, 0),
(354, 33, 0),
(354, 35, 0),
(354, 36, 0),
(356, 33, 0),
(356, 35, 0),
(356, 36, 0),
(358, 33, 0),
(358, 35, 0),
(358, 36, 0),
(360, 33, 0),
(360, 35, 0),
(360, 36, 0),
(362, 35, 0),
(362, 36, 0),
(364, 33, 0),
(364, 35, 0),
(364, 36, 0),
(366, 35, 0),
(366, 36, 0),
(379, 35, 0),
(379, 36, 0),
(383, 35, 0),
(383, 36, 0),
(385, 35, 0),
(385, 36, 0),
(387, 33, 0),
(387, 35, 0),
(387, 36, 0),
(391, 35, 0),
(391, 36, 0),
(432, 25, 0),
(432, 27, 0),
(432, 28, 0),
(435, 6, 0),
(442, 37, 0),
(443, 38, 0),
(444, 39, 0),
(445, 40, 0),
(446, 41, 0),
(447, 42, 0),
(448, 43, 0),
(449, 44, 0),
(450, 45, 0),
(451, 46, 0),
(452, 47, 0),
(453, 48, 0),
(454, 49, 0),
(455, 50, 0),
(456, 51, 0),
(457, 52, 0),
(458, 55, 0),
(471, 56, 0),
(472, 57, 0),
(473, 58, 0),
(474, 59, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcant dades de la taula `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'category', '', 0, 0),
(3, 3, 'category', '', 2, 2),
(4, 4, 'category', '', 0, 6),
(5, 5, 'category', '', 0, 1),
(6, 6, 'nav_menu', '', 0, 31),
(7, 7, 'category', '', 0, 2),
(8, 8, 'category', '', 2, 4),
(9, 9, 'category', '', 2, 2),
(10, 10, 'category', '', 5, 4),
(11, 11, 'category', '', 5, 4),
(12, 12, 'category', '', 5, 2),
(13, 13, 'category', '', 5, 4),
(14, 14, 'category', '', 5, 2),
(15, 15, 'category', '', 5, 2),
(16, 16, 'post_tag', '', 0, 3),
(17, 17, 'post_tag', '', 0, 2),
(18, 18, 'post_tag', '', 0, 2),
(19, 19, 'post_tag', '', 0, 2),
(20, 20, 'nav_menu', '', 0, 6),
(21, 35, 'nav_menu', '', 0, 3),
(22, 36, 'nav_menu', '', 0, 6),
(23, 21, 'nav_menu', '', 0, 3),
(24, 22, 'bp_docs_tag', '', 0, 3),
(25, 23, 'bp_docs_access', '', 0, 3),
(26, 24, 'bp_docs_tag', '', 0, 2),
(27, 25, 'bp_docs_tag', '', 0, 6),
(28, 26, 'bp_docs_tag', '', 0, 5),
(29, 27, 'bp_docs_access', '', 0, 0),
(30, 28, 'bp_docs_associated_item', '', 0, 0),
(31, 29, 'bp_docs_tag', '', 0, 0),
(32, 30, 'bp_docs_tag', '', 0, 1),
(33, 31, 'bp_docs_tag', '', 0, 6),
(34, 32, 'bp_docs_associated_item', '', 0, 0),
(35, 33, 'bp_docs_associated_item', 'Document associat a group Mestres', 0, 32),
(36, 34, 'bp_docs_access', '', 0, 32),
(37, 37, 'bp-email-type', 'A member has replied to an activity update that the recipient posted.', 0, 0),
(38, 38, 'bp-email-type', 'A member has replied to a comment on an activity update that the recipient posted.', 0, 0),
(39, 39, 'bp-email-type', 'Recipient was mentioned in an activity update.', 0, 0),
(40, 40, 'bp-email-type', 'Recipient was mentioned in a group activity update.', 0, 0),
(41, 41, 'bp-email-type', 'Recipient has registered for an account.', 0, 0),
(42, 42, 'bp-email-type', 'Recipient has registered for an account and site.', 0, 0),
(43, 43, 'bp-email-type', 'A member has sent a friend request to the recipient.', 0, 0),
(44, 44, 'bp-email-type', 'Recipient has had a friend request accepted by a member.', 0, 0),
(45, 45, 'bp-email-type', 'A group''s details were updated.', 0, 0),
(46, 46, 'bp-email-type', 'A member has sent a group invitation to the recipient.', 0, 0),
(47, 47, 'bp-email-type', 'Recipient''s status within a group has changed.', 0, 0),
(48, 48, 'bp-email-type', 'A member has requested permission to join a group.', 0, 0),
(49, 49, 'bp-email-type', 'Recipient has received a private message.', 0, 0),
(50, 50, 'bp-email-type', 'Recipient has changed their email address.', 0, 0),
(51, 51, 'bp-email-type', 'Recipient had requested to join a group, which was accepted.', 0, 0),
(52, 52, 'bp-email-type', 'Recipient had requested to join a group, which was rejected.', 0, 0),
(53, 53, 'calendar_feed', '', 0, 1),
(54, 54, 'calendar_type', '', 0, 1),
(55, 55, 'bp-email-type', 'Es convida un usuari a unir-se al lloc per correu electrònic. Utilitzat pel connector Invite Anyone.', 0, 0),
(56, 56, 'bp-email-type', 'Un membre ha creat una activitat grupal. Utilitzat pel connector de Subscripció de correu electrònic del node durant enviaments immediats.', 0, 0),
(57, 57, 'bp-email-type', 'S''ha enviat un correu de resum a un membre. Utilitzat pel connector de Subscripció de correu electrònic del node durant els enviaments de resums diaris o setmanals.', 0, 0),
(58, 58, 'bp-email-type', 'L''administrador del node ha enviat una notificació a tots els membres del grup. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0),
(59, 59, 'bp-email-type', 'S''ha enviat un correu de benvinguda als nous membres del node. Utilitzat pel connector de Subscripció de correu electrònic del node.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(28, 2, 'last_activity', '2019-05-13 12:44:08'),
(29, 1, 'last_activity', '2017-02-13 10:14:59'),
(30, 2, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&widgets_access=off'),
(31, 2, 'wp_user-settings-time', '1453401582'),
(35, 2, 'screen_layout_post', '2'),
(36, 2, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(37, 2, 'metaboxhidden_nav-menus', 'a:11:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-post_tag";i:5;s:15:"add-post_format";i:6;s:15:"add-ia_invitees";i:7;s:21:"add-ia_invited_groups";i:8;s:27:"add-bp_docs_associated_item";i:9;s:18:"add-bp_docs_access";i:10;s:15:"add-bp_docs_tag";}'),
(38, 2, 'nav_menu_recently_edited', '6'),
(39, 2, 'show_welcome_panel', '1'),
(40, 2, 'meta-box-order_dashboard', 'a:4:{s:6:"normal";s:19:"dashboard_right_now";s:4:"side";s:18:"dashboard_activity";s:7:"column3";s:0:"";s:7:"column4";s:0:"";}'),
(41, 2, 'closedpostboxes_slideshow', 'a:0:{}'),
(42, 2, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(43, 2, 'meta-box-order_slideshow', 'a:3:{s:4:"side";s:26:"submitdiv,slides-list,,,,,";s:6:"normal";s:34:"information,slugdiv,style,settings";s:8:"advanced";s:0:"";}'),
(44, 2, 'screen_layout_slideshow', '2'),
(46, 1, 'screen_layout_post', '2'),
(47, 1, 'wp_user-settings', 'editor=tinymce&libraryContent=browse'),
(48, 1, 'wp_user-settings-time', '1411383268'),
(49, 1, 'closedpostboxes_slideshow', 'a:0:{}'),
(50, 1, 'metaboxhidden_slideshow', 'a:1:{i:3;s:7:"slugdiv";}'),
(53, 2, 'total_group_count', '2'),
(54, 2, 'ass_digest_items', 'a:1:{s:3:"dig";a:0:{}}'),
(55, 1, 'nav_menu_recently_edited', '6'),
(56, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(57, 1, 'metaboxhidden_nav-menus', 'a:12:{i:0;s:23:"add-buddypress-nav-menu";i:1;s:8:"add-post";i:2;s:9:"add-forum";i:3;s:10:"add-bp_doc";i:4;s:12:"add-gce_feed";i:5;s:12:"add-post_tag";i:6;s:15:"add-post_format";i:7;s:15:"add-ia_invitees";i:8;s:21:"add-ia_invited_groups";i:9;s:27:"add-bp_docs_associated_item";i:10;s:18:"add-bp_docs_access";i:11;s:15:"add-bp_docs_tag";}'),
(60, 2, 'meta-box-order_post', 'a:3:{s:4:"side";s:56:"submitdiv,postimagediv,postexcerpt,metabox1,tagsdiv-post";s:6:"normal";s:11:"categorydiv";s:8:"advanced";s:0:"";}'),
(61, 2, 'metaboxhidden_post', 'a:5:{i:0;s:12:"revisionsdiv";i:1;s:16:"commentstatusdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";}'),
(62, 2, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(63, 2, 'metaboxhidden_page', 'a:4:{i:0;s:16:"commentstatusdiv";i:1;s:11:"commentsdiv";i:2;s:7:"slugdiv";i:3;s:9:"authordiv";}'),
(64, 2, 'closedpostboxes_page', 'a:0:{}'),
(68, 2, 'closedpostboxes_post', 'a:0:{}'),
(69, 2, 'bp_liked_activities', 'a:0:{}'),
(70, 2, 'bp_docs_count', '1'),
(73, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:23:"submitdiv,pageparentdiv";s:6:"normal";s:16:"commentstatusdiv";s:8:"advanced";s:0:"";}'),
(74, 1, 'metaboxhidden_page', 'a:5:{i:0;s:9:"authordiv";i:1;s:11:"commentsdiv";i:2;s:16:"commentstatusdiv";i:3;s:12:"revisionsdiv";i:4;s:7:"slugdiv";}'),
(75, 1, 'closedpostboxes_page', 'a:1:{i:0;s:11:"layout_meta";}'),
(82, 1, 'session_tokens', 'a:1:{s:64:"2ae54e270fb4e037fc875476ebb5ad3262d794ca8c36c9291fa1d14e8e9b365c";a:4:{s:10:"expiration";i:1487150098;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0";s:5:"login";i:1486977298;}}'),
(83, 2, 'session_tokens', 'a:1:{s:64:"40b7fc45f54d6c84bd81fae4b22fb03a07963b7d8c831d6680cc532a597efbe9";a:4:{s:10:"expiration";i:1557915651;s:2:"ip";s:11:"10.155.7.35";s:2:"ua";s:76:"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0";s:5:"login";i:1557742851;}}');

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
(1, 'admin', '$P$BlgMK6mlSFoihGlqQG8VVPG1WHLS19.', 'admin', 'a8000006@xtec.cat', '', '2014-09-12 09:10:47', '', 0, 'admin'),
(2, 'xtecadmin', '$P$Bhxkk5LkgJ4JdHgLtjOeyf90PZcHm/.', 'xtecadmin', 'agora@xtec.invalid', '', '2014-09-12 09:26:41', '', 0, 'xtecadmin');

-- --------------------------------------------------------

--
-- Estructura de la taula `wp_wsluserscontacts`
--

CREATE TABLE IF NOT EXISTS `wp_wsluserscontacts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(50) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
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
  `provider` varchar(255) NOT NULL,
  `object_sha` varchar(255) NOT NULL COMMENT 'to check if hybridauth user profile object has changed from last time, if yes we update the user profile here ',
  `identifier` varchar(255) NOT NULL,
  `profileurl` varchar(255) NOT NULL,
  `websiteurl` varchar(255) NOT NULL,
  `photourl` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `birthmonth` varchar(255) NOT NULL,
  `birthyear` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailverified` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL
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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_wslusersprofiles`
--
ALTER TABLE `wp_wslusersprofiles`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_bp_activity`
--
ALTER TABLE `wp_bp_activity`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wp_bp_activity_meta`
--
ALTER TABLE `wp_bp_activity_meta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_bp_friends`
--
ALTER TABLE `wp_bp_friends`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_bp_groups`
--
ALTER TABLE `wp_bp_groups`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_bp_groups_groupmeta`
--
ALTER TABLE `wp_bp_groups_groupmeta`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wp_bp_groups_members`
--
ALTER TABLE `wp_bp_groups_members`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10593;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1263;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=475;
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
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
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
