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
 * Strings for component 'enrol', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actenrolshhdr'] = '利用可能なコース登録プラグイン';
$string['addinstance'] = '登録方法を追加する';
$string['ajaxnext25'] = '次の25 ...';
$string['ajaxoneuserfound'] = '1名のユーザが見つかりました。';
$string['ajaxxusersfound'] = '{$a} 名のユーザが見つかりました。';
$string['assignnotpermitted'] = 'あなたには、このコースでロールを割り当てるパーミッションがありません。または割り当てることができません。';
$string['bulkuseroperation'] = 'バルクユーザ操作';
$string['configenrolplugins'] = '必要なプラグインすべてを選択した後、適切な順番に並べ替えてください。';
$string['custominstancename'] = 'カスタムインスタンス名';
$string['defaultenrol'] = '新しいコースにインスタンスを追加する';
$string['defaultenrol_desc'] = 'このプラグインを新しいコースすべてにデフォルトで追加することができます。';
$string['deleteinstanceconfirm'] = 'あなたは登録方法「 {$a->name} 」を削除しようとしています。この登録方法を使用して登録している {$a->users} 名のユーザすべては登録解除され、ユーザ評定、グループメンバーシップ、フォーラム購読のようなコース関連データすべてが削除されます。

本当に続けてもよろしいですか?';
$string['deleteinstancenousersconfirm'] = 'あなたは登録方法「 {$a->name} 」を削除しようとしています。本当に続けてもよろしいですか?';
$string['durationdays'] = '{$a} 日';
$string['enrol'] = '登録';
$string['enrolcandidates'] = '未登録ユーザ';
$string['enrolcandidatesmatching'] = '合致する未登録ユーザ';
$string['enrolcohort'] = 'コーホートを登録する';
$string['enrolcohortusers'] = 'ユーザを登録する';
$string['enrollednewusers'] = '新しいユーザ {$a} 名が正常に追加されました。';
$string['enrolledusers'] = '登録ユーザ';
$string['enrolledusersmatching'] = '合致する登録ユーザ';
$string['enrolme'] = 'このコースに登録する';
$string['enrolmentinstances'] = '登録方法';
$string['enrolmentnew'] = '{$a} の新規登録';
$string['enrolmentnewuser'] = '{$a->user} がコース 「 {$a->course} 」に登録しました。';
$string['enrolmentoptions'] = '登録オプション';
$string['enrolments'] = '受講登録';
$string['enrolnotpermitted'] = 'あなたにはこのコースにユーザを受講登録するパーミッションが割り当てられていないか、許可されていません。';
$string['enrolperiod'] = '利用有効期間';
$string['enroltimecreated'] = '登録作成日時';
$string['enroltimeend'] = '登録終了';
$string['enroltimestart'] = '登録開始';
$string['enrolusage'] = 'インスタンス / 登録';
$string['enrolusers'] = 'ユーザを登録する';
$string['errajaxfailedenrol'] = 'ユーザの登録に失敗しました。';
$string['errajaxsearch'] = 'ユーザの検索中にエラーが発生しました。';
$string['erroreditenrolment'] = 'ユーザ登録の編集中にエラーが発生しました。';
$string['errorenrolcohort'] = 'このコース内でのコーホート同期登録インスタンス作成中にエラーが発生しました。';
$string['errorenrolcohortusers'] = 'このコースへのコーホートメンバー登録中にエラーが発生しました。';
$string['errorthresholdlow'] = '通知閾値は少なくとも1日にする必要があります。';
$string['errorwithbulkoperation'] = 'あなたのバルク登録変更処理中にエラーが発生しました。';
$string['expirynotify'] = '登録期限切れの前に通知する';
$string['expirynotifyall'] = '登録および登録済みユーザ';
$string['expirynotifyenroller'] = '登録のみ';
$string['expirynotify_help'] = 'ここでは登録期限切れ通知メッセージを送信するかどうか設定します。';
$string['expirynotifyhour'] = '登録期限切れ通知が送信される時間';
$string['expirythreshold'] = '通知閾値';
$string['expirythreshold_help'] = 'ユーザに登録期限切れ通知が送信されるまでの期間はどのくらいにしますか?';
$string['extremovedaction'] = '外部登録解除処理';
$string['extremovedaction_help'] = '外部登録ソースからユーザ登録が削除された場合に実施する処理を選択してください。コース受講登録解除時、いくつかのユーザデータおよび設定がコースから消去されることに留意してください。';
$string['extremovedkeep'] = 'ユーザ登録状態を保持する';
$string['extremovedsuspend'] = 'コース受講登録を無効にする';
$string['extremovedsuspendnoroles'] = 'コース受講登録および登録解除ロールを無効にする';
$string['extremovedunenrol'] = 'コースからユーザを登録解除する';
$string['finishenrollingusers'] = 'ユーザ登録を終了する';
$string['invalidenrolinstance'] = '無効な登録インスタンスです。';
$string['invalidrole'] = '無効なロール';
$string['manageenrols'] = '登録プラグイン管理';
$string['manageinstance'] = '管理';
$string['nochange'] = '変更なし';
$string['noexistingparticipants'] = '参加者は登録されていません。';
$string['noguestaccess'] = 'このコースにゲストはアクセスできません。ログインしてください。';
$string['none'] = 'なし';
$string['notenrollable'] = 'あなたはこのコースに登録できません。';
$string['notenrolledusers'] = '他のユーザ';
$string['otheruserdesc'] = '以下のユーザはこのコースに登録されていませんが、コース内でのロールが継承または割り当てられています。';
$string['participationactive'] = 'アクティブ';
$string['participationstatus'] = 'ステータス';
$string['participationsuspended'] = '一時停止';
$string['periodend'] = '-> {$a}';
$string['periodnone'] = '登録日時 {$a}';
$string['periodstart'] = '{$a}';
$string['periodstartend'] = '{$a->start} -> {$a->end}';
$string['recovergrades'] = '可能であればユーザの古い評点を回復する';
$string['rolefromcategory'] = '{$a->role} (コースカテゴリより継承)';
$string['rolefrommetacourse'] = '{$a->role} (親コースより継承)';
$string['rolefromsystem'] = '{$a->role} (サイトレベルで割り当て)';
$string['rolefromthiscourse'] = '{$a->role} (コースレベルで割り当て)';
$string['startdatetoday'] = '今日';
$string['synced'] = '同期';
$string['totalenrolledusers'] = '登録ユーザ数: {$a} ';
$string['totalotherusers'] = '他のユーザ数: {$a} ';
$string['unassignnotpermitted'] = 'あなたにはこのコース内のロール割り当てを解除するパーミッションがありません。';
$string['unenrol'] = '登録抹消';
$string['unenrolconfirm'] = '本当にユーザ「 {$a->user} 」をコース「 {$a->course} 」から登録解除してもよろしいですか?';
$string['unenrolme'] = '{$a} から私を登録抹消する';
$string['unenrolnotpermitted'] = 'あなたにはこのユーザをこのコースから登録解除するパーミッションがない、または登録解除することができません。';
$string['unenrolroleusers'] = '次のユーザを登録解除する';
$string['uninstallconfirm'] = 'あなたは登録プラグイン「 {$a} 」を完全に削除しようとしています。これにより、ユーザの評点、グループメンバーシップ、フォーラム購読および他のコース関連データを含む、この登録タイプに関連するデータベース内すべてのデータが完全に削除されます。本当に続けてもよろしいですか?';
$string['uninstalldelete'] = 'すべての登録を削除してアンインストールする';
$string['uninstalldeletefiles'] = 'プラグイン「 {$a->plugin} 」に関連するすべてのデータがデータベースから削除されました。削除を完了するには (そしてプラグインの自動再インストールを防ぐには)、あなたのサーバから次のディレクトリを削除する必要があります: {$a->directory}';
$string['uninstallmigrate'] = 'すべての登録を保持したままアンインストールする';
$string['uninstallmigrating'] = '「 {$a} 」登録の移行';
$string['unknowajaxaction'] = '不明なアクションが要求されました。';
$string['unlimitedduration'] = '無制限';
$string['usersearch'] = '検索';
$string['withselectedusers'] = '選択したユーザに対して';
