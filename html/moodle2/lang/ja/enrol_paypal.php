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
 * Strings for component 'enrol_paypal', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_paypal
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'ロールを割り当てる';
$string['businessemail'] = 'PayPalビジネスメール';
$string['businessemail_desc'] = 'あなたのビジネスPayPalアカウントのメールアドレスです。';
$string['cost'] = 'コストを登録する';
$string['costerror'] = '登録コストが数値ではありません。';
$string['costorkey'] = '下記の登録方法から1つを選択してください。';
$string['currency'] = '通貨';
$string['defaultrole'] = 'デフォルトロール割り当て';
$string['defaultrole_desc'] = 'PayPal登録中にユーザに割り当てるロールを選択してください。';
$string['enrolenddate'] = '終了日';
$string['enrolenddate_help'] = '有効にした場合、ユーザはこの日まで受講登録することができます。';
$string['enrolenddaterror'] = '登録終了日を開始日より早くすることはできません。';
$string['enrolperiod'] = '登録期間';
$string['enrolperiod_desc'] = '登録が有効な場合のデフォルト登録期間 (秒) です。ゼロが設定された場合、登録期間はデフォルトで無制限となります。';
$string['enrolperiod_help'] = '登録が有効な場合の登録期間です。ユーザが登録された時点で開始します。無効にされた場合、登録期間は無制限となります。';
$string['enrolstartdate'] = '開始日';
$string['enrolstartdate_help'] = '有効にした場合、ユーザはこの日以降のみ受講登録することができます。';
$string['expiredaction'] = '登録期限切れ処理';
$string['expiredaction_help'] = 'ユーザの登録期限が切れた場合、実行される処理を選択してください。コース登録解除中、一部のユーザデータおよび設定が削除されてしまうことに留意してください。';
$string['mailadmins'] = '管理者に通知する';
$string['mailstudents'] = '学生に通知する';
$string['mailteachers'] = '教師に通知する';
$string['messageprovider:paypal_enrolment'] = 'PayPal登録メッセージ';
$string['nocost'] = 'このコースの受講登録に費用が設定されていません!';
$string['paypalaccepted'] = 'PayPal支払済み';
$string['paypal:config'] = 'PayPal登録インスタンスを設定する';
$string['paypal:manage'] = '登録ユーザを管理する';
$string['paypal:unenrol'] = 'ユーザをコースから登録解除する';
$string['paypal:unenrolself'] = '自分自身をコースから登録解除する';
$string['pluginname'] = 'PayPal';
$string['pluginname_desc'] = 'PayPalモジュールでは、あなたは有料のコースを設定することができます。コースの費用がゼロの場合、学生は受講登録時に支払いを求められません。サイト全体に適用されるデフォルトの費用をここで設定します。また、コース設定にてコース個別の費用を設定することができます。コース費用はサイト全体の費用に優先されます。';
$string['sendpaymentbutton'] = 'PayPal経由で支払いを送信する';
$string['status'] = 'PayPal登録を許可する';
$string['status_desc'] = 'デフォルトでユーザのコース登録にPayPalを使用できるようにします。';
$string['unenrolselfconfirm'] = '本当にコース「 {$a} 」からあなたを登録解除してもよろしいですか?';
