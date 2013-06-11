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
 * Strings for component 'tool_assignmentupgrade', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_assignmentupgrade
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['areyousure'] = '本当によろしいですか?';
$string['areyousuremessage'] = '本当に課題「 {$a->name} 」をアップグレードしてもよろしいですか?';
$string['assignmentid'] = '課題ID';
$string['assignmentnotfound'] = '課題が見つかりませんでした (id={$a})。';
$string['assignmentsperpage'] = '1ぺーじあたりの課題数';
$string['assignmenttype'] = '課題タイプ';
$string['backtoindex'] = 'インデックスに戻る';
$string['batchoperations'] = 'バッチ処理';
$string['batchupgrade'] = '複数課題をアップグレードする';
$string['confirmbatchupgrade'] = '課題のバッチアップグレードの確認';
$string['conversioncomplete'] = '課題がコンバートされました。';
$string['conversionfailed'] = '課題が正常にコンバートされました。アップグレードログは次のとおりです: <br />{$a}';
$string['listnotupgraded'] = 'アップグレードされなかった課題一覧';
$string['listnotupgraded_desc'] = 'あなたはここで個々の課題をアップグレードすることができます。';
$string['noassignmentsselected'] = '選択された課題はありません。';
$string['noassignmentstoupgrade'] = 'アップグレードが必要な課題はありません。';
$string['notsupported'] = '';
$string['notupgradedintro'] = 'このページでは古いバージョンのMoodleで作成され、Moodle 2.3の新しい課題モジュールにアップグレードされなかった課題を一覧表示します。すべての課題をアップグレードできるということではありません - 課題がカスタム課題サブタイプで作成されている場合、アップグレードを完了するため、サブタイプも新しい課題プラグインフォーマットにアップグレードする必要があります。';
$string['notupgradedtitle'] = 'アップグレードされなかった課題';
$string['pluginname'] = '課題アップグレードヘルパ';
$string['select'] = '選択';
$string['submissions'] = '提出';
$string['supported'] = 'アップグレード';
$string['unknown'] = '不明';
$string['updatetable'] = 'テーブルを更新する';
$string['upgradable'] = 'アップグレード可';
$string['upgradeall'] = 'すべての課題をアップグレードする';
$string['upgradeallconfirm'] = 'すべてをアップグレードしてもよろしいですか?';
$string['upgradeassignmentfailed'] = '結果: アップグレードに失敗しました。アップグレードログ: <br/><div class="tool_assignmentupgrade_upgradelog">{$a->log}</div>';
$string['upgradeassignmentsuccess'] = '結果: アップグレード成功';
$string['upgradeassignmentsummary'] = '課題をアップグレードする: {$a->name} (コース: {$a->shortname})';
$string['upgradeprogress'] = '課題をアップグレードする {$a->current} / {$a->total}';
$string['upgradeselected'] = '選択された課題をアップグレードする';
$string['upgradeselectedcount'] = '選択された {$a} 件の課題をアップグレードしてもよろしいですか?';
$string['upgradesingle'] = '単一の課題をアップグレードする';
$string['viewcourse'] = 'コンバートされた課題を含むコースを表示する';
