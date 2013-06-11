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
 * Strings for component 'tool_qeupgradehelper', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = '您确定吗？';
$string['areyousuremessage'] = '您想要继续升级课程{$a->shortname}中的测验“{$a->name}”里的 {$a->numtoconvert} 份答卷吗？';
$string['areyousureresetmessage'] = '课程{$a->shortname}中的测验“{$a->name}”有 {$a->totalattempts} 份答卷，其中 {$a->convertedattempts} 份是从旧系统升级而来。它们中的 {$a->resettableattempts} 份能被重置并在以后再转换。您想这样做吗？';
$string['attemptstoconvert'] = '答卷需要转换';
$string['backtoindex'] = '回到主页面';
$string['conversioncomplete'] = '转换完成';
$string['convertattempts'] = '转换答卷';
$string['convertedattempts'] = '转换过的答卷';
$string['convertquiz'] = '转换答卷……';
$string['cronenabled'] = '启用CRON';
$string['listpreupgrade'] = '列出测验和答卷';
$string['listpreupgrade_desc'] = '将显示系统里所有测验和它们的答卷数量的报告。这将使您了解您需要做的升级的范围。';
$string['listpreupgradeintro'] = '这是在升级网站时需要处理的测验答卷数量。如果此数字达到数万，也不用担心。升级需要的时间取决于更多其它因素。';
$string['listtodo'] = '列出仍要升级的测验';
$string['listtodo_desc'] = '如果有需要将答卷升级到新题目引擎的测验，会显示这些测验的报告。';
$string['listtodointro'] = '这是有答卷数据仍需要转换的所有测验。您可以通过点击这个链接转换答卷。';
$string['listupgraded'] = '列出已经升级并可以重置的测验';
$string['listupgraded_desc'] = '将显示一个报告，包含系统里所有答卷已升级的测验，还有旧数据的保存位置，以方便升级程序能够重置和重做。';
$string['noquizattempts'] = '您的网站没有任何的测验答卷！';
$string['nothingupgradedyet'] = '没有升级的答卷可以重置';
$string['notupgradedsiterequired'] = '这个脚本只能在网站升级以前运行。';
$string['numberofattempts'] = '测验答卷的数量';
$string['oldsitedetected'] = '这似乎是一个尚未升级为新试题引擎的网站。';
$string['outof'] = '{$a->total} 中的 {$a->some}';
$string['pluginname'] = '题目引擎升级助手';
$string['pretendupgrade'] = '做一次答卷升级的运行测试';
$string['pretendupgrade_desc'] = '升级做以下三件事：从数据库加载已有数据；转变它；然后将转变后的数据写入数据库。这个脚本将会测试此过程的前两部分。';
$string['quizid'] = '测验 ID';
$string['quizupgrade'] = '测验升级状态';
$string['quizzesthatcanbereset'] = '下面的测验有可以重置的转换过答卷';
$string['quizzestobeupgraded'] = '所有有答卷的测验';
$string['quizzeswithunconverted'] = '下面的测验有需要转换的答卷';
$string['resetcomplete'] = '重置完成';
$string['resetquiz'] = '重置答卷……';
$string['resettingquizattempts'] = '重置测验答卷';
$string['resettingquizattemptsprogress'] = '重置答卷 {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = '这似乎是一个已经升级为新问题引擎的网站。';
$string['upgradedsiterequired'] = '这个脚本只能在网站升级以后工作。';
$string['upgradingquizattempts'] = '升级课程{$a->shortname}里测验 \'{$a->name}\'的答卷';
$string['veryoldattemtps'] = '您的网站有 {$a} 个测验在从 Moodle 1.4 升级到  Moodle 1.5 的时间里从来没有更新过。这些答卷在主要升级前需要处理掉。您需要考虑这额外需要的时间。';
