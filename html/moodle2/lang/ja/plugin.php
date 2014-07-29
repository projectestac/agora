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
 * Strings for component 'plugin', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   plugin
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '操作';
$string['availability'] = '利用';
$string['checkforupdates'] = '利用可能な更新をチェックする';
$string['checkforupdateslast'] = '最終チェック: {$a}';
$string['detectedmisplacedplugin'] = 'プラグイン「 $a->component} 」が正しくないロケーション 「 {$a->current} 」にインストールされています。期待されるロケーションは「 {$a->expected} 」です。';
$string['displayname'] = 'プラグイン名';
$string['err_response_curl'] = '利用可能なアップデートデータを取得できません - 不明なcURLエラーです。';
$string['err_response_format_version'] = '予期しないレスポンスフォーマットのバージョンです。利用可能な更新を再度確認してください。';
$string['err_response_http_code'] = '利用可能なアップデートデータを取得できません - 不明なHTTPレスポンスコードです。';
$string['filterall'] = 'すべてを表示する';
$string['filtercontribonly'] = 'アドオンのみ表示する';
$string['filtercontribonlyactive'] = 'アドオンのみ表示中';
$string['filterupdatesonly'] = '更新可能のみ表示する';
$string['filterupdatesonlyactive'] = '更新可能のみ表示中';
$string['moodleversion'] = 'Moodle {$a}';
$string['nonehighlighted'] = '現在のところ、あなたの注意が必要なプラグインはありません。';
$string['nonehighlightedinfo'] = 'インストール済みプラグインすべてのリストを表示する';
$string['noneinstalled'] = 'このタイプのプラグインはインストールされていません。';
$string['notdownloadable'] = 'パッケージをダウンロードできません。';
$string['notdownloadable_help'] = 'アップデートのZIPパッケージを自動ダウンロードできません。詳細はドキュメンテーションページをご覧ください。';
$string['notes'] = 'ノート';
$string['notwritable'] = 'プラグインファイル書き込み不可';
$string['notwritable_help'] = 'あなたは自動更新適用を有効にしています。また、このプラグインに利用可能な更新があります。しかし、プラグインファイルに書き込み権がないため、更新を自動インストールすることができません。

利用可能な更新を自動インストールできるよう、プラグインフォルダおよびコンテンツすべてに書き込めるようにしてください。';
$string['numdisabled'] = '無効: {$a}';
$string['numextension'] = 'アドオン: {$a}';
$string['numtotal'] = 'インストール: {$a}';
$string['numupdatable'] = '利用可能な更新: {$a}';
$string['otherplugin'] = '{$a->component}';
$string['otherpluginversion'] = '{$a->component}';
$string['pluginchecknotice'] = 'このページではアップグレード中、あなたが注意する必要のあるプラグインを表示しています。ハイライトされた項目にはインストールされる予定の新しいプラグイン、アップグレードされる予定の更新プラグイン、そして不明のプラグインを含みます。利用可能な更新がある場合、アドオンもハイライトされています。新しいバージョンのアドオンがあるか確認して、このMoodleアップグレードを続ける前にソースコードの更新をお勧めします。';
$string['plugindisable'] = '無効';
$string['plugindisabled'] = '無効';
$string['pluginenable'] = '有効';
$string['pluginenabled'] = '有効';
$string['requiredby'] = '次のプラグインに必要です: {$a}';
$string['requires'] = '必要条件';
$string['rootdir'] = 'ディレクトリ';
$string['settings'] = '設定';
$string['showall'] = 'すべてのプラグインをリロードおよび表示する';
$string['somehighlighted'] = 'あなたの注意が必要なプラグイン数: {$a}';
$string['somehighlightedinfo'] = 'インストール済みプラグイン詳細リストを表示する';
$string['somehighlightedonly'] = 'あなたの注意が必要なプラグインのみ表示する';
$string['source'] = 'ソース';
$string['sourceext'] = 'アドオン';
$string['sourcestd'] = '標準';
$string['status'] = '状態';
$string['status_delete'] = '削除予定';
$string['status_downgrade'] = 'すでに新しいバージョンがインストールされています!';
$string['status_missing'] = 'ディスクにありません';
$string['status_new'] = 'インストール予定';
$string['status_nodb'] = 'データベースなし';
$string['status_upgrade'] = 'アップグレード予定';
$string['status_uptodate'] = 'インストール';
$string['systemname'] = '識別子';
$string['type_auth'] = '認証方法';
$string['type_auth_plural'] = '認証プラグイン';
$string['type_block'] = 'ブロック';
$string['type_block_plural'] = 'ブロック';
$string['type_cachelock'] = 'キャッシュロックハンドラ';
$string['type_cachelock_plural'] = 'キャッシュロックハンドラ';
$string['type_cachestore'] = 'キャッシュストア';
$string['type_cachestore_plural'] = 'キャッシュストア';
$string['type_calendartype'] = 'カレンダータイプ';
$string['type_calendartype_plural'] = 'カレンダータイプ';
$string['type_coursereport'] = 'コースレポート';
$string['type_coursereport_plural'] = 'コースレポート';
$string['type_editor'] = 'エディタ';
$string['type_editor_plural'] = 'エディタ';
$string['type_enrol'] = '登録方法';
$string['type_enrol_plural'] = '登録方法';
$string['type_filter'] = 'フィルタ';
$string['type_filter_plural'] = 'テキストフィルタ';
$string['type_format'] = 'コースフォーマット';
$string['type_format_plural'] = 'コースフォーマット';
$string['type_gradeexport'] = '評定エクスポート方法';
$string['type_gradeexport_plural'] = '評定エクスポート方法';
$string['type_gradeimport'] = '評定インポート方法';
$string['type_gradeimport_plural'] = '評定インポート方法';
$string['type_gradereport'] = '評定表レポート';
$string['type_gradereport_plural'] = '評定表レポート';
$string['type_gradingform'] = '高度な評定方法';
$string['type_gradingform_plural'] = '高度な評定方法';
$string['type_local'] = 'ローカルプラグイン';
$string['type_local_plural'] = 'ローカルプラグイン';
$string['type_message'] = 'メッセージングアウトプット';
$string['type_message_plural'] = 'メッセージングアウトプット';
$string['type_mnetservice'] = 'MNetサービス';
$string['type_mnetservice_plural'] = 'MNetサービス';
$string['type_mod'] = '活動モジュール';
$string['type_mod_plural'] = '活動モジュール';
$string['type_plagiarism'] = '盗作プラグイン';
$string['type_plagiarism_plural'] = '盗作プラグイン';
$string['type_portfolio'] = 'ポートフォリオ';
$string['type_portfolio_plural'] = 'ポートフォリオ';
$string['type_profilefield'] = 'プロファイルフィールドタイプ';
$string['type_profilefield_plural'] = 'プロファイルフィールドタイプ';
$string['type_qbehaviour'] = '問題動作';
$string['type_qbehaviour_plural'] = '問題動作';
$string['type_qformat'] = '問題インポート/エクスポートフォーマット';
$string['type_qformat_plural'] = '問題インポート/エクスポートフォーマット';
$string['type_qtype'] = '問題タイプ';
$string['type_qtype_plural'] = '問題タイプ';
$string['type_report'] = 'サイトレポート';
$string['type_report_plural'] = 'レポート';
$string['type_repository'] = 'リポジトリ';
$string['type_repository_plural'] = 'リポジトリ';
$string['type_theme'] = 'テーマ';
$string['type_theme_plural'] = 'テーマ';
$string['type_tool'] = '管理ツール';
$string['type_tool_plural'] = '管理ツール';
$string['type_webservice'] = 'ウェブサービスプロトコル';
$string['type_webservice_plural'] = 'ウェブサービスプロトコル';
$string['uninstall'] = 'アンインストール';
$string['uninstallconfirm'] = 'あなたはプラグイン「 {$a->name} 」を完全にアンインストールしようとしています。これにより、設定、ログレコード、プラグイン管理のユーザファイルを含む、関連するデータベース内すべてのデータが完全に削除されます。バックアップする方法はなく、Moodle自体もリカバリバックアップを作成しません。本当に続けてもよろしいですか?';
$string['uninstalldelete'] = 'データベースからプラグイン「 {$a->name} 」に関するすべてのデータが削除されました。プラグインの再インストールを防ぐには、あなたのサーバからフォルダ「 {$a->rootdir} 」を手動削除してください。書き込み権のため、Moodleはフォルダを削除することはできません。';
$string['uninstalldeleteconfirm'] = 'データベースからプラグイン「 {$a->name} 」に関するすべてのデータが削除されました。プラグインの再インストールを防ぐには、あなたのサーバからフォルダ「 {$a->rootdir} 」を削除してください。プラグインフォルダを削除してもよろしいですか?';
$string['uninstalldeleteconfirmexternal'] = '現在のバージョンのプラグインはソースコード管理システム ({$a}) のチェックアウト経由で入手されたようです。プラグインフォルダを削除した場合、あなたはコードの重要な独自修正を失うことになります。続ける前に、あなたが本当にプラグインフォルダを削除したいのか確認してください。';
$string['uninstallextraconfirmblock'] = 'このブロックには {$a->instances} 件のインスタンスがあります。';
$string['uninstallextraconfirmenrol'] = '{$a->enrolments} 名のユーザ登録があります。';
$string['uninstallextraconfirmmod'] = 'このモジュールに関して、{$a->courses} 件のコース内に {$a->instances} 件のインスタンスがあります。';
$string['uninstalling'] = '{$a->name} のアンインストール';
$string['updateavailable'] = '利用可能な新しいバージョンの {$a} があります!';
$string['updateavailable_moreinfo'] = '詳細情報 ...';
$string['updateavailable_release'] = 'リリース {$a}';
$string['updatepluginconfirm'] = 'プラグイン更新確認';
$string['updatepluginconfirmexternal'] = '現在のバージョンのプラグインはソースコード管理システム ({$a}) のチェックアウトによって取得されたようです。この更新をインストールした場合、あなたはこれ以上ソースコード管理システム経由でプラグイン更新を取得できないようになります。続ける前に、あなたが本当にプラグインを更新したいかどうか確認してください。';
$string['updatepluginconfirminfo'] = 'あなたは新しいバージョンのプラグイン「<strong>{$a->name}</strong>」をインストールしようとしています。 プラグインのバージョン {$a->version} のZIPパッケージが <a href="{$a->url}">{$a->url}</a> からダウンロードされた後、アップグレードするため、あなたのMoodleインストレーションに解凍されます。';
$string['updatepluginconfirmwarning'] = 'アップグレード前に、あなたのデータベースをMoodleが自動的にバックアップしないことに留意してください。新しいコードに含まれるバグがあなたのサイトを利用停止にする、またはデータベースを破壊してしまうという稀なケースに対処するため、今から完全なスナップショットバックアップを実行されることを強くお勧めします。あなたの責任において、処理を進めてください。';
$string['version'] = 'バージョン';
$string['versiondb'] = '現在のバージョン';
$string['versiondisk'] = '新しいバージョン';
