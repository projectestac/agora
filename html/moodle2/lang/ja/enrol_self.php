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
 * Strings for component 'enrol_self', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'コーホート「 {$a} 」のメンバーのみ自己登録することができます。';
$string['cohortonly'] = 'コーホートメンバーのみ';
$string['cohortonly_help'] = '自己登録を指定されたコーホートのみに制限することができます。この設定の変更により、既存の登録が影響を受けないことに留意してください。';
$string['customwelcomemessage'] = 'カスタムウェルカムメッセージ';
$string['customwelcomemessage_help'] = 'プレインテキストまたはHTMLタグおよびmulti-langタグを含むMoodleオートフォーマットとして、カスタムウェルカムメッセージを追加することができます。

メッセージの中に次のプレースホルダを含むことができます:

* コース名 {$a->coursename}
* ユーザプロファイルページへのリンク {$a->profileurl}';
$string['defaultrole'] = 'デフォルトロール';
$string['defaultrole_desc'] = '自己登録中にユーザに割り当てるロールを選択してください。';
$string['editenrolment'] = '登録を編集する';
$string['enrolenddate'] = '終了日';
$string['enrolenddate_help'] = '有効にした場合、ユーザはこの日まで受講登録することができます。';
$string['enrolenddaterror'] = '登録終了日を開始日より早くすることはできません。';
$string['enrolme'] = '私を受講登録する';
$string['enrolperiod'] = '登録期間';
$string['enrolperiod_desc'] = '登録が有効な場合のデフォルト登録期間 (秒) です。ゼロが設定された場合、登録期間はデフォルトで無制限となります。';
$string['enrolperiod_help'] = '登録が有効な場合の登録期間です。ユーザが登録された時点で開始します。無効にされた場合、登録期間は無制限となります。';
$string['enrolstartdate'] = '開始日';
$string['enrolstartdate_help'] = '有効にした場合、ユーザはこの日以降のみ受講登録することができます。';
$string['expiredaction'] = '登録期限切れ処理';
$string['expiredaction_help'] = 'ユーザの登録期限が切れた場合に実行される処理を選択してください。コース登録解除時、コースからユーザデータおよび設定が削除されることに留意してください。';
$string['expirymessageenrolledbody'] = '{$a->user} 様

これはコース「 {$a->course} 」において、あなたの登録が {$a->timeend} に有効期限となることの通知です。

詳細は {$a->enroller} にご連絡ください。';
$string['expirymessageenrolledsubject'] = '自己登録期限切れ通知';
$string['expirymessageenrollerbody'] = '下記のユーザに関して、コース「 {$a->course} 」の自己登録は次の {$a->threshold} で有効期限切れとなります:

{$a->users}

登録期間を延期するには、{$a->extendurl}　にアクセスしてください。';
$string['expirymessageenrollersubject'] = '自己登録期限切れ通知';
$string['groupkey'] = 'グループ登録キーを使用する';
$string['groupkey_desc'] = 'デフォルトでグループ登録キーを使用します。';
$string['groupkey_help'] = 'コース登録キーを知っているユーザのみにコースアクセスを制限することに加えて、グループ登録キーを使用することでユーザは受講登録したコース内のグループに自動的に追加されます。

グループ登録キーを使用するには、グループ設定内のグループ登録キーを設定すると共に、コース設定内の登録キーを設定する必要があります。';
$string['longtimenosee'] = '次の期間活動停止の場合、登録解除する';
$string['longtimenosee_help'] = 'ユーザが長期間コースにアクセスしていない場合、自動的に登録解除されます。このパラメータでは、その制限期間を指定します。';
$string['maxenrolled'] = '最大登録ユーザ';
$string['maxenrolled_help'] = '自己登録できる最大ユーザ数を指定してください。ゼロは制限なしを意味します。';
$string['maxenrolledreached'] = 'すでに自己登録可能な最大ユーザ数に達しています。';
$string['messageprovider:expiry_notification'] = '自己登録期限切れ通知';
$string['nopassword'] = '必要な登録キーはありません。';
$string['password'] = '登録キー';
$string['password_help'] = '登録キーを使用することにより、登録キーを知っているユーザのみにコースアクセスを制限することができます。

フィールドを空白のままにした場合、すべてのユーザがコースに受講登録することができます。

登録キーが指定された場合、コースに受講登録を試みるユーザすべてに対して登録キーが要求されます。ユーザはコース受講登録時のみ1度だけ登録キーの入力が要求されることに留意してください。';
$string['passwordinvalid'] = '登録キーが正しくありません。再度お試しください。';
$string['passwordinvalidhint'] = '「登録キー」が違います。再度入力してください。<br /> (ヒント - 「 {$a} 」で始まる言葉です)';
$string['pluginname'] = '自己登録';
$string['pluginname_desc'] = '自己登録プラグインにより、ユーザは自分が参加したいコースを選択することができます。コースは登録キーにより保護することができます。内部的には、同一コースで有効にする必要のある手動登録プラグイン経由で受講登録されます。';
$string['requirepassword'] = '登録キーを要求する';
$string['requirepassword_desc'] = '新しいコースに登録キーを要求します。また、既存のコースからの登録キーの削除を防ぎます。';
$string['role'] = 'デフォルトの割り当てロール';
$string['self:config'] = '自己登録インスタンスを設定する';
$string['self:manage'] = '登録ユーザを管理する';
$string['self:unenrol'] = 'コースからユーザを登録解除する';
$string['self:unenrolself'] = 'コースから自分自身を登録解除する';
$string['sendcoursewelcomemessage'] = 'コースウェルカムメッセージを送信する';
$string['sendcoursewelcomemessage_help'] = 'この設定を有効にした場合、コースへの自己受講登録後、ユーザ宛にウェルカムメッセージがメール送信されます。';
$string['showhint'] = 'ヒントを表示する';
$string['showhint_desc'] = 'ゲストアクセスキーの最初の文字を表示します。';
$string['status'] = '自己登録を許可する';
$string['status_desc'] = 'デフォルトでユーザがコースに自己登録できるようにします。';
$string['status_help'] = 'この設定では、ユーザが自分自身でコースに受講登録 (および適切なパーミッションがあれば登録解除) できるかどうか設定します。';
$string['unenrol'] = 'ユーザを登録解除する';
$string['unenrolselfconfirm'] = '本当にコース「 {$a} 」からあなたを登録解除してもよろしいですか?';
$string['unenroluser'] = '本当に「 {$a->user} 」をコース「 {$a->course} 」から登録解除してもよろしいですか?';
$string['usepasswordpolicy'] = 'パスワードポリシーを使用する';
$string['usepasswordpolicy_desc'] = '登録キーに標準パスワードポリシーを適用します。';
$string['welcometocourse'] = '{$a} へようこそ';
$string['welcometocoursetext'] = '{$a->coursename} へようこそ!

まだプロファイルの編集が終わっていない場合は、私たちが受講している皆さんのことを知ることができるよう、あなたのプロファイルページを編集してください:

 {$a->profileurl}';
