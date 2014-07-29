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
 * Strings for component 'block_quickmail', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   block_quickmail
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '操作';
$string['add_all'] = 'すべてを追加する';
$string['add_button'] = '追加';
$string['allowstudents'] = '学生のクイックメール使用を許可する';
$string['all_sections'] = 'すべてのセクション';
$string['alternate'] = '代替メール';
$string['alternate_body'] = '<p>
{$a->fullname} さんが {$a->course} の代替送信メールアドレスとして {$a->address} を追加しました。
</p>

<p>
このメールの目的はこのメールアドレスが存在して、メールアドレスの所有者がMoodle内に適切な権限があることを確認するためにあります。
</p>

<p>
確認手続きを完了したい場合、あなたのブラウザから次のURLにアクセスしてください: {$a->url}.
</p>

<p>
このメールが意味をなさない場合、あなたは間違ってメールを受信した可能性があります。このメールを破棄してください。
</p>

ありがとうございます。';
$string['alternate_from'] = 'Moodle: クイックメール';
$string['alternate_new'] = '代替メールアドレスを追加する';
$string['alternate_subject'] = '代替メールアドレス確認';
$string['approved'] = '承認';
$string['are_you_sure'] = '本当に {$a->title} を削除してもよろしいですか? この操作は元に戻すことはできません。';
$string['attachment'] = '添付';
$string['backup_history'] = 'クイックメール履歴を含む';
$string['composenew'] = '新しいメールを作成する';
$string['config'] = '設定';
$string['courseferpa'] = 'コースモードを尊重する';
$string['courselayout'] = 'コースレイアウト';
$string['courselayout_desc'] = 'クイックメールブロックページのレンダリング時に「_course_ page」レイアウトを使用します。Moodleフォームを固定幅にする場合、この設定を有効にしてください。';
$string['default_flag'] = 'デフォルト';
$string['delete_confirm'] = '本当に次の詳細メッセージを削除してもよろしいですか: {$a}';
$string['delete_failed'] = 'メールの削除に失敗しました。';
$string['download_all'] = 'すべてをダウンロードする';
$string['drafts'] = '下書きを表示する';
$string['email'] = 'メール';
$string['entry_activated'] = '代替メールアドレス「 {$a->address} を「 {$a->course} 」で使用することができます。';
$string['entry_failure'] = 'メールを {$a->address} に送信できませんでした。{$a->address} が存在するか確認した後、再度お試しください。';
$string['entry_key_not_valid'] = '{$a->address} の有効化リンクの期限が切れました。有効化リンクを再送してください。';
$string['entry_saved'] = '代替メールアドレス「 {$a->address} 」が保存されました。';
$string['entry_success'] = 'メールアドレスが有効であると確認するためのメールが {$a->address} に送信されました。メールコンテンツ内にメールアドレスを有効化するためのインストラクションが含まれています。';
$string['failed_to_send_to'] = '送信失敗';
$string['ferpa'] = 'FERPAモード';
$string['ferpa_desc'] = 'システムがコースグループモード設定に従うようにする、またはグループモード設定を無視して分離グループを使用する、またはグループモードすべてを無視するようにします。';
$string['from'] = 'From';
$string['history'] = '履歴を表示する';
$string['log'] = '履歴を表示する';
$string['message'] = 'メッセージ';
$string['message_failure'] = '一部のユーザがメッセージを受信しませんでした。';
$string['moodle_attachments'] = 'Moodle添付 ({$a})';
$string['no_alternates'] = '{$a->fullname} の代替メールアドレスがありません。続けて作成します。';
$string['no_course'] = '無効なコース (ID {$a}) です。';
$string['no_drafts'] = 'あなたにメール下書きはありません。';
$string['no_email'] = '{$a->lastname} {$a->firstname} さんにメールを送信できませんでした。';
$string['no_email_address'] = '{$a} にメールを送信できませんでした。';
$string['noferpa'] = 'グループ関係なし';
$string['no_filter'] = 'フィルタなし';
$string['no_log'] = 'あなたにはメール履歴がありません。';
$string['no_permission'] = 'あなたにはクイックメールでメールを送信するパーミッションがありません。';
$string['no_section'] = 'セクション内にはいません。';
$string['no_selected'] = 'あなたはメール送信するユーザを選択する必要があります。';
$string['no_subject'] = 'あなたは件名を入力する必要があります。';
$string['not_valid'] = 'これは有効なメールログビューアタイプではありません: {$a}';
$string['not_valid_action'] = 'あなたは有効な操作を提供する必要があります: {$a}';
$string['not_valid_typeid'] = 'あなたは {$a} に有効なメールアドレスを提供する必要があります。';
$string['not_valid_user'] = 'あなたは他のユーザのメール履歴を閲覧することはできません。';
$string['no_type'] = '{$a} は受け入れ可能なタイプのビューアではありません。アプリケーションを正しく使用してください。';
$string['no_usergroups'] = 'あなたのグループ内には、あなたがメール送信できるユーザはいません。';
$string['no_users'] = 'あなたがメール送信できるユーザはいません。';
$string['overwrite_history'] = 'クイックメール履歴を上書きする';
$string['pluginname'] = 'クイックメール';
$string['potential_sections'] = '潜在的セクション';
$string['potential_users'] = '潜在的受信者';
$string['prepend_class'] = 'コース名を先頭に追加する';
$string['prepend_class_desc'] = 'メール件名の先頭にコース省略名を追加します。';
$string['qm_contents'] = 'ファイルコンテンツをダウンロードする';
$string['quickmail:addinstance'] = '新しいクイックメールブロックを追加する';
$string['quickmail:allowalternate'] = 'ユーザが代替メールアドレスをコースに追加できるようにします。';
$string['quickmail:canconfig'] = 'ユーザがクイックメールインスタンスを設定できるようにします。';
$string['quickmail:candelete'] = 'ユーザが履歴からメールを削除できるようにします。';
$string['quickmail:canimpersonate'] = 'ユーザが他のユーザとしてログインして履歴を閲覧できるようにします。';
$string['quickmail:cansend'] = 'ユーザがクイックメール経由でメールを送信できるようにします。';
$string['receipt'] = 'コピーを受信する';
$string['receipt_help'] = '送信するメールのコピーを受信します。';
$string['remove_all'] = 'すべてを削除する';
$string['remove_button'] = '削除';
$string['required'] = '必須フィールドに入力してください。';
$string['reset'] = 'システムデフォルトをリストアする';
$string['restore_history'] = 'クイックメール履歴をリストアする';
$string['role_filter'] = 'ロールフィルタ';
$string['save_draft'] = '下書きを保存する';
$string['selected'] = '選択済み受信者';
$string['select_groups'] = 'セクションを選択する ...';
$string['select_roles'] = 'フィルタするロール';
$string['select_users'] = 'ユーザを選択する ...';
$string['send_again'] = '再度送信する';
$string['send_email'] = 'メールを送信する';
$string['sent_success'] = 'すべてのメッセージが正常に送信されました。';
$string['sig'] = '署名';
$string['signature'] = '署名';
$string['status'] = 'ステータス';
$string['strictferpa'] = '常に分離グループ';
$string['subject'] = '件名';
$string['sure'] = '本当に {$a->address} を削除してもよろしいですか? この操作は元に戻すことはできません。';
$string['title'] = 'タイトル';
$string['user'] = 'ユーザ';
$string['users'] = 'ユーザ';
$string['valid'] = '有効化ステータス';
$string['waiting'] = '待機';
