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
 * Strings for component 'debug', language 'zh_cn', branch 'MOODLE_26_STABLE'
 *
 * @package   debug
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['authpluginnotfound'] = '未找到身份认证插件 {$a}。';
$string['blocknotexist'] = '{$a} 版块不存在';
$string['cannotbenull'] = '{$a}不能为空！';
$string['cannotdowngrade'] = '不能将{$a->plugin}从{$a->oldversion} 降级到{$a->newversion}。';
$string['cannotfindadmin'] = '找不到具有管理员权限的用户！';
$string['cannotinitpage'] = '无法完全初始化页面：无效的{$a->name} id {$a->id}';
$string['cannotsetuptable'] = '{$a}表不能成功建立！';
$string['codingerror'] = '检测到源代码错误，必须由程序员修复：{$a}';
$string['configmoodle'] = 'Moodle尚未配置好，你需要首先编辑config.php文件。';
$string['erroroccur'] = '一个错误发生在此进程中';
$string['invalidarraysize'] = '{$a}参数中的数组大小不正确';
$string['invalideventdata'] = '提交了非法的eventadata：{$a}';
$string['invalidparameter'] = '检测到无效的参数值';
$string['invalidresponse'] = '检测到无效的响应值';
$string['missingconfigversion'] = '因配置表未包含版本号，所以不能继续，抱歉。';
$string['modulenotexist'] = '{$a}模块不存在';
$string['morethanonerecordinfetch'] = '在fetch()中找到多条记录！';
$string['mustbeoveride'] = '抽象方法{$a}必须被覆盖。';
$string['noadminrole'] = '找不到管理员角色';
$string['noblocks'] = '未安装任何包块！';
$string['nocate'] = '无分类！';
$string['nomodules'] = '未找到模块！！';
$string['nopageclass'] = '已导入{$a}，但是未找到页面类';
$string['noreports'] = '没有可访问的报告';
$string['notables'] = '无表！';
$string['phpvaroff'] = 'PHP服务器变量 \'{$a->name}\' 应设置为 Off - {$a->link}';
$string['phpvaron'] = 'PHP服务器变量”{$a->name}“未开启 - {$a->link}';
$string['sessionmissing'] = '对象{$a}在会话中丢失';
$string['sqlrelyonobsoletetable'] = 'SQL语句使用了废弃的表：{$a}！必须由开发者来修改您的代码。';
$string['withoutversion'] = '主version.php文件不存在、不可读或者损坏了。';
$string['xmlizeunavailable'] = 'xmlize功能不可用';
