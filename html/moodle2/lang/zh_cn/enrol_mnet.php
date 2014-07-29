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
 * Strings for component 'enrol_mnet', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['error_multiplehost'] = '这个主机上已经存在某个MNet选课插件的实例。 每个主机只能允许有一个实例并且/或“所有主机”共有一个实例也是允许的。';
$string['instancename'] = '选课方法名称';
$string['instancename_help'] = '您可以选择重命名本MNet选课方法的实例。如果您保持本字段为空，则会使用默认的实例名。其中包含远程主机的名字和指派给它们的用户的角色名。';
$string['mnet_enrol_description'] = '发布该服务将允许在 {$a} 上的管理员可以选择自己服务器上已建课程中学生。<br/><ul><li><em>依赖性</em>：您必须向 {$a} <strong>发布</strong>SSO (Service Provicder) 服务。</li><li><em>依赖性</em>：您也必须<strong>订阅</strong> {$a} 的 SSO (Identity Provider) 服务。</li></ul><br/>订阅该服务将可以将 {$a} 课程中的学生注册进来。<br/><ul><li><em>依赖性</em>：您必须<strong>订阅</strong> {$a} 的 SSO (Service Provider) 服务。</li><li><em>依赖性</em>：您也必须向 {$a} <strong>发布</strong> SSO (Identity Provider) 服务。</li></ul><br/>';
$string['mnet_enrol_name'] = '远程选课服务';
$string['pluginname'] = 'MNet远程选课';
$string['pluginname_desc'] = '允许远程MNet主机把其用户加入我们的课程中。';
$string['remotesubscriber'] = '远程主机';
$string['remotesubscriber_help'] = '选择“所有主机”，会将此课程开放给所有的我们提供MNet远程选课的主机。或者选择只开放给一个主机。';
$string['remotesubscribersall'] = '所有主机';
$string['roleforremoteusers'] = '给他们用户分配的角色';
$string['roleforremoteusers_help'] = '为来自选定主机的远程用户分配的角色。';
