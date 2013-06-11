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
 * Strings for component 'enrol_manual', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_manual
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alterstatus'] = 'ステータスを変更する';
$string['altertimeend'] = '終了日を変更する';
$string['altertimestart'] = '開始日を変更する';
$string['assignrole'] = 'ロールを割り当てる';
$string['confirmbulkdeleteenrolment'] = '本当にこれらのユーザ登録を削除してもよろしいですか?';
$string['defaultperiod'] = 'デフォルト登録期間';
$string['defaultperiod_desc'] = '登録が有効な場合のデフォルト登録期間 (秒) です。ゼロが設定された場合、登録期間はデフォルトで無制限となります。';
$string['defaultperiod_help'] = '登録が有効な場合のデフォルト登録期間です。ユーザが登録された時点で開始します。無効にされた場合、登録期間はデフォルトで無制限となります。';
$string['deleteselectedusers'] = '選択されたユーザ登録を削除する';
$string['editenrolment'] = '登録を編集する';
$string['editselectedusers'] = '選択したユーザ登録を編集する';
$string['enrolledincourserole'] = '「 {$a->course} 」に「 {$a->role} 」として登録されました。';
$string['enrolusers'] = 'ユーザを登録する';
$string['expiredaction'] = '登録期限切れ処理';
$string['expiredaction_help'] = 'ユーザの登録期限が切れた場合に実行される処理を選択してください。コース登録解除時、コースからユーザデータおよび設定が削除されることに留意してください。';
$string['expirymessageenrolledbody'] = '{$a->user} さん

これはコース「 {$a->course} 」に関して、あなたの登録が {$a->timeend} に期限切れとなる通知です。

詳細は {$a->enroller} にご連絡ください。';
$string['expirymessageenrolledsubject'] = '登録期限切れ通知';
$string['expirymessageenrollerbody'] = '下記ユーザに関して、次の {$a->threshold} でコース「 {$a->course} 」への登録が期限切れとなります:

{$a->users}

登録期限を延長するには、{$a->extendurl} にアクセスしてください。';
$string['expirymessageenrollersubject'] = '登録期限切れ通知';
$string['manual:config'] = '手動登録インスタンスを設定する';
$string['manual:enrol'] = 'ユーザを登録する';
$string['manual:manage'] = 'ユーザ登録を管理する';
$string['manual:unenrol'] = 'コースからユーザを登録解除する';
$string['manual:unenrolself'] = 'コースから自分自身を登録解除する';
$string['messageprovider:expiry_notification'] = '手動登録期限切れ通知';
$string['pluginname'] = '手動登録';
$string['pluginname_desc'] = '手動登録プラグインでは、コース管理設定内のリンクを使用して、ユーザが教師等の適切なパーミッションを割り当てたユーザを手動で登録できるようにします。自己登録等の登録プラグインで必要とするため、通常、このプラグインは有効にされています。';
$string['status'] = '手動登録を有効にする';
$string['status_desc'] = '内部登録ユーザがコースにアクセスできるようにします。多くの場合、この設定は有効のままにすべきです。';
$string['statusdisabled'] = '無効';
$string['statusenabled'] = '有効';
$string['status_help'] = 'この設定では教師等の適切なパーミッションを割り当てたユーザをコース管理設定にて手動登録できるかどうか指定します。';
$string['unenrol'] = 'ユーザを登録解除する';
$string['unenrolselectedusers'] = '選択したユーザの受講登録を解除する';
$string['unenrolselfconfirm'] = '本当にコース「 {$a} 」からあなたを登録解除してもよろしいですか?';
$string['unenroluser'] = '本当に「 {$a->user} 」をコース「 {$a->course} 」から登録解除してもよろしいですか?';
$string['unenrolusers'] = 'ユーザを登録解除する';
$string['wscannotenrol'] = 'コース(id = {$a->courseid})では、プラグインインスタンスが手動でユーザを登録することはできません。';
$string['wsnoinstance'] = 'コース (id = {$a->courseid}) の手動登録プラグインインスタンスが存在しないか、無効にされています。';
$string['wsusercannotassign'] = 'あなたにはこのコース ({$a->courseid}) 内でロール ({$a->roleid}) をユーザ ({$a->userid}) に割り当てるパーミッションがありません。';
