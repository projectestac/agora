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
 * Strings for component 'enrol_flatfile', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_flatfile
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['filelockedmail'] = 'ファイルベースのユーザ登録で使用しているテキストファイル ({$a}) は、cronプロセスにより削除することができません。通常、これはファイルパーミッションが正しくないことを意味します。Moodleが削除できるよう、ファイルのパーミッションを変更してください。変更しない場合、この処理が繰り返し実行されます。';
$string['filelockedmailsubject'] = '重大なエラー: エンロールメントファイル';
$string['location'] = 'ファイルロケーション';
$string['mailadmin'] = '管理者にメール通知する';
$string['mailstudents'] = '学生にメール通知する';
$string['mailteachers'] = '教師にメール通知する';
$string['mapping'] = 'フラットファイルマッピング';
$string['messageprovider:flatfile_enrolment'] = 'フラットファイル登録メッセージ';
$string['pluginname'] = 'フラットファイル (CSV)';
$string['pluginname_desc'] = 'この方法ではあなたが指定した場所に置いた特別にフォーマットされたテキストファイルを繰り返しチェックおよび処理します。ファイルはカンマ区切りのファイル、1行あたり4個または6個のフィールドを持つと想定されます:
<pre class="informationbox">
* 処理, ロール, IDナンバー (ユーザ), IDナンバー (コース) [, 開始日時, 終了日時]
詳細:
* 処理 = add | del
* ロール = student | teacher | teacheredit
* IDナンバー (ユーザ) = userテーブルのidnumber (idではなく)
* IDナンバー　(コース) = courseテーブルのidnumber (idではなく)
* 開始日時 = 開始日時 (UNIXエポックからの秒数) - 任意
* 終了日時 = 終了日時 (UNIXエポックからの秒数) - 任意
</pre>
ファイルのフォーマットは以下のようになります:
<pre class="informationbox">
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
