# This file contains a complete database schema for all the 
# tables used by jclic module, written in SQL


#
# Table structure for `jclic`
#

CREATE TABLE `prefix_jclic` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `course` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text,
  `url` varchar(100) NOT NULL default '',
  `skin` varchar(20) NOT NULL default '',
  `maxattempts` int(3) default '0',
  `width` int(5) unsigned default '600',
  `height` int(5) unsigned default '400',
  `avaluation` varchar(10) default NULL,
  `maxgrade` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  KEY `course` (`course`)
) COMMENT='Main information about each jclic activity';
# --------------------------------------------------------

#
# Table structure for `jclic_sessions`
#

CREATE TABLE `prefix_jclic_sessions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `jclicid` int(10) unsigned NOT NULL default '0',
  `session_id` varchar(50) NOT NULL default '',
  `user_id` varchar(50) NOT NULL default '',
  `session_datetime` timestamp(14) NOT NULL,
  `project_name` varchar(100) NOT NULL default '',
  `session_key`varchar(50) default NULL,
  `session_code` varchar(50) default NULL,
  `session_context` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `jclicid` (`jclicid`)
) COMMENT='Main information about each jclic session';


#
# Table structure for `jclic_activities`
#

CREATE TABLE `prefix_jclic_activities` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `session_id` varchar(50) NOT NULL default '',
  `activity_id` int(5) NOT NULL default '0',
  `activity_name` varchar(50) NOT NULL default '',
  `num_actions` int(4) default NULL,
  `score` int(4) default NULL,
  `activity_solved` int(1) default NULL,
  `qualification` int(3) default NULL,
  `total_time` int(5) default NULL,
  `activity_code` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) COMMENT='Stores user information for each jclic activity';

#
# Table structure for `jclic_settings`
#

CREATE TABLE `prefix_jclic_settings` (
  `setting_key` varchar(255) NOT NULL default '',
  `setting_value` varchar(255) default NULL,
  PRIMARY KEY  (`setting_key`)
) COMMENT='Stores settings information';

-- Load data

INSERT INTO `prefix_jclic_settings` VALUES ('ALLOW_CREATE_GROUPS', 'false');
INSERT INTO `prefix_jclic_settings` VALUES ('ALLOW_CREATE_USERS', 'false');
INSERT INTO `prefix_jclic_settings` VALUES ('SHOW_GROUP_LIST', 'false');
INSERT INTO `prefix_jclic_settings` VALUES ('SHOW_USER_LIST', 'false');
INSERT INTO `prefix_jclic_settings` VALUES ('USER_TABLES', 'true');
INSERT INTO `prefix_jclic_settings` VALUES ('TIME_LAP', '10');

# --------------------------------------------------------


#
# Table structure for `jclic_groups`
#

CREATE TABLE `prefix_jclic_groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `group_id` varchar(50) NOT NULL default '',
  `group_name` varchar(80) NOT NULL default '',
  `group_description` varchar(255) default NULL,
  `group_icon` varchar(255) default NULL,
  `group_code` varchar(50) default NULL,
  `group_keywords` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
);

-- Load data

INSERT INTO `prefix_jclic_groups` (group_id, group_name) VALUES ('1', 'Moodle');

# --------------------------------------------------------


#
# Table structure for `jclic_users`
#

CREATE TABLE `prefix_jclic_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` varchar(50) NOT NULL default '',
  `group_id` varchar(50) NOT NULL default '',
  `user_name` varchar(80) NOT NULL default '',
  `user_pwd` varchar(255) default NULL,
  `user_icon` varchar(255) default NULL,
  `user_code` varchar(50) default NULL,
  `user_keywords` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
);
