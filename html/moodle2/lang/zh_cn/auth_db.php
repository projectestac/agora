<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'auth_db', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   auth_db
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_dbcantconnect'] = '无法连接到指定的认证数据库...';
$string['auth_dbchangepasswordurl_key'] = '更改密码 URL';
$string['auth_dbdebugauthdb'] = '调试 ADOdb';
$string['auth_dbdebugauthdbhelp'] = '调试 ADOdb 连接到外部数据库，登录时显示空页面。不符合站点要求。';
$string['auth_dbdeleteuser'] = '删除用户 {$a->name} 其 id 为 {$a->id}';
$string['auth_dbdeleteusererror'] = '删除用户 {$a} 错误';
$string['auth_dbdescription'] = '该方法使用一个外部数据库来检验用户名和密码是否有效。如果是一个新帐号，该帐号其它字段的信息将一起复制到本系统中。';
$string['auth_dbextencoding'] = '外部数据库编码方式';
$string['auth_dbextencodinghelp'] = '外部数据库使用的编码方式';
$string['auth_dbextrafields'] = '这些字段是可选的。您在此指定的<b>外部数据库字段</b>将预先填入本系统的用户数据库中。<p>如果您留空不填，将使用系统默认值。</p><p>无论以上哪种情况，用户在登录后都可以改写这些字段。</p>';
$string['auth_dbfieldpass'] = '含有密码的字段名';
$string['auth_dbfieldpass_key'] = '密码字段';
$string['auth_dbfielduser'] = '含有用户名的字段名';
$string['auth_dbfielduser_key'] = '用户名字段';
$string['auth_dbhost'] = '数据库所在的主机。';
$string['auth_dbhost_key'] = '主机';
$string['auth_dbinsertuser'] = '已插入用户 {$a->name} 其 id 为 {$a->id}';
$string['auth_dbinsertusererror'] = '插入用户 {$a} 错误';
$string['auth_dbname'] = '数据库名';
$string['auth_dbname_key'] = '数据库名';
$string['auth_dbpass'] = '与上面的用户名匹配的密码';
$string['auth_dbpass_key'] = '密码';
$string['auth_dbpasstype'] = '<p>指定密码字段所用的格式。MD5 编码是一种常见的方法，在和其它通用 WEB 应用如 PostNuke 整合时，会很方便。</p><p>如果您希望由外部程序管理用户名和 Email，而由 Moodle 来管理密码，则请选择“内部”。在使用这种方式时，您<i>必须</i>在外部数据库中提供一个 Email 字段，且需要定时运行 admin/cron.php 和 auth/db/cli/sync_users.php。Moodle 会通过 Email 向新用户发送临时密码。</p>';
$string['auth_dbpasstype_key'] = '密码格式';
$string['auth_dbreviveduser'] = '激活用户 {$a->name} 其 id 为 {$a->id}';
$string['auth_dbrevivedusererror'] = '激活用户{$a}错误';
$string['auth_dbsetupsql'] = 'SQL 设置命令';
$string['auth_dbsetupsqlhelp'] = '特定数据库设置 SQL 命令。过去常设置通信编码方式，例如 MySQL 和 PostgreSQL：<em>SET NAMES \'utf8\'</em>';
$string['auth_dbsuspenduser'] = '暂停用户 {$a->name} 其 id 为 {$a->id}';
$string['auth_dbsuspendusererror'] = '暂停用户 {$a} 错误';
$string['auth_dbsybasequoting'] = '使用 sybase 引用';
$string['auth_dbsybasequotinghelp'] = 'Sybase 风格，需要 Oracle 支持，MS SQL 和一些其他的数据库，不要使用 MySQL！';
$string['auth_dbtable'] = '数据库中的表单名';
$string['auth_dbtable_key'] = '数据表';
$string['auth_dbtype'] = '数据库类型（详情请看 <a href="http://phplens.com/adodb/supported.databases.html" target="_blank">ADOdb文档</a>）';
$string['auth_dbtype_key'] = '数据库';
$string['auth_dbupdatinguser'] = '更新用户{$a->name}，id {$a->id}';
$string['auth_dbuser'] = '对该数据库具有读权限的用户名';
$string['auth_dbuser_key'] = '数据库用户';
$string['auth_dbusernotexist'] = '不能更新不存在的用户 {$a}';
$string['auth_dbuserstoadd'] = '添加用户记录 {$a}';
$string['auth_dbuserstoremove'] = '删除用户记录 {$a}';
$string['pluginname'] = '使用外部数据库';
