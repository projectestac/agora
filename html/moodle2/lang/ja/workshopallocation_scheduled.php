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
 * Strings for component 'workshopallocation_scheduled', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   workshopallocation_scheduled
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['currentstatus'] = '現在のステータス';
$string['currentstatusexecution'] = 'ステータス';
$string['currentstatusexecution1'] = '実行日時: {$a->datetime}';
$string['currentstatusexecution2'] = '再実行日時: {$a->datetime}';
$string['currentstatusexecution3'] = '実行予定日時: {$a->datetime}';
$string['currentstatusexecution4'] = '実行待ち';
$string['currentstatusnext'] = '次の実行';
$string['currentstatusnext_help'] = '場合によっては、すでに実行された後でも割り当てが自動的にスケジュールされることがあります。例えば、提出終了日時が延長された場合にこのような処理が発生します。';
$string['currentstatusreset'] = 'リセット';
$string['currentstatusreset_help'] = 'このチェックボックスをチェックした上でフォームを保存することで、結果として現在のステータスがリセットされます。上記で有効にされている場合、再度割り当てを実行できるよう、前回の実行情報すべてが削除されます。';
$string['currentstatusresetinfo'] = '実行結果をリセットするには、チェックボックスをチェックした上でフォームを保存してください。';
$string['currentstatusresult'] = '最近の実行結果';
$string['enablescheduled'] = 'スケジュール割り当てを有効にする';
$string['enablescheduledinfo'] = '提出フェーズの後、提出を自動的に割り当てる';
$string['pluginname'] = 'スケジュール割り当て';
$string['randomallocationsettings'] = '割り当て設定';
$string['randomallocationsettings_help'] = 'ここでランダム割り当て方法のパラメータを設定します。これらの設定値は実際の提出を割り当てるランダム割り当てプラグインで使用されます。';
$string['resultdisabled'] = 'スケジュール割り当てが無効にされました。';
$string['resultenabled'] = 'スケジュール割り当てが有効にされました。';
$string['resultexecuted'] = '成功';
$string['resultfailed'] = '提出の自動割当不可';
$string['resultfailedconfig'] = 'スケジュール割り当て誤設定';
$string['resultfaileddeadline'] = 'ワークショップに提出期限が設定されていません。';
$string['resultfailedphase'] = 'ワークショップは提出フェーズではありません。';
$string['resultvoid'] = '提出が割り当てられませんでした。';
$string['resultvoiddeadline'] = '提出終了日時 - 未到来';
$string['resultvoidexecuted'] = '割り当てはすでに実行されています。';
$string['scheduledallocationsettings'] = 'スケジュール割り当て設定';
$string['scheduledallocationsettings_help'] = 'この設定を有効にした場合、提出フェーズ後、評価のためにスケジュール割り当てが提出を自動割り当てします。フェーズの終了はワークショップ設定内の「提出終了日時」にて設定することができます。

内部的には、このフォームで事前に設定された内容をもとにランダム割り当てが実行されます。これは提出フェーズの後に下記の設定をもとに教師自身がランダム割り当てを実行するかのようにスケジュール割り当てが動作することを意味します。

あなたが提出終了日時の前に手動で評価フェーズにスイッチした場合、スケジュール割り当ては「実行されない」ことに留意してください。その場合、あなた自身で提出を割り当てる必要があります。自動フェーズスイッチ機能と一緒に使用した場合、スケジュール割り当ては特に有用です。';
$string['setup'] = 'スケジュール割り当てセットアップする';
