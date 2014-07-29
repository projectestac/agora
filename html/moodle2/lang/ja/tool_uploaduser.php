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
 * Strings for component 'tool_uploaduser', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploaduser
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = '削除を許可する';
$string['allowrenames'] = 'リネームを許可する';
$string['allowsuspends'] = 'アカウントの利用停止および利用停止解除を許可する';
$string['csvdelimiter'] = 'CSVデリミタ';
$string['defaultvalues'] = 'デフォルト値';
$string['deleteerrors'] = '削除エラー';
$string['encoding'] = 'エンコーディング';
$string['errormnetadd'] = 'リモートユーザを追加できません。';
$string['errors'] = 'エラー';
$string['nochanges'] = '変更なし';
$string['pluginname'] = 'ユーザアップロード';
$string['renameerrors'] = 'リネームエラー';
$string['requiredtemplate'] = '必須項目です。あなたはここでテンプレート構文 (%l = 姓、%f = 名、%u = ユーザ名) を使用することができます。詳細および例に関して、ヘルプをご覧ください。';
$string['rowpreviewnum'] = 'プレビュー行';
$string['uploadpicture_baduserfield'] = '指定されたユーザ属性は有効ではありません。もう一度お試しください。';
$string['uploadpicture_cannotmovezip'] = '一時ディレクトリにZIPファイルを移動できません。';
$string['uploadpicture_cannotprocessdir'] = 'ZIP解凍されたファイルを処理できません。';
$string['uploadpicture_cannotsave'] = 'ユーザ {$a} の画像を保存できません。画像ファイルを確認してください。';
$string['uploadpicture_cannotunzip'] = '画像ファイルを解凍できません。';
$string['uploadpicture_invalidfilename'] = '画像ファイル {$a} のファイル名に無効な文字があります。スキップします。';
$string['uploadpicture_overwrite'] = '既存のユーザ画像を上書きしますか?';
$string['uploadpictures'] = 'ユーザ画像をアップロードする';
$string['uploadpictures_help'] = 'ZIP圧縮したイメージファイルをユーザ画像としてアップロードすることができます。イメージファイルは、「選択されたユーザ属性.拡張子」という形で名前付けをする必要があります。例えば、「user1234.jpg」はusernameが「user1234」のユーザ用となります。';
$string['uploadpicture_userfield'] = '画像にマッチさせるユーザ属性';
$string['uploadpicture_usernotfound'] = '「 {$a->userfield} 」の値が「 {$a->uservalue} 」のユーザは存在しません。スキップします。';
$string['uploadpicture_userskipped'] = 'ユーザ {$a} をスキップします (画像登録済みです)。';
$string['uploadpicture_userupdated'] = 'ユーザ {$a} の画像が更新されました。';
$string['uploadusers'] = 'ユーザをアップロードする';
$string['uploadusers_help'] = 'テキストファイル経由でユーザをアップロード (および任意でコース登録) することができます。

* ファイルのそれぞれの行には1レコード含みます。
* それぞれのレコードはカンマ区切り (または他のデリミタ) の一覧のデータです。
* 先頭レコードにはファイルの残りのフォーマットを定義したフィールド名を含みます。
* 必須フィールド名は次のとおりです: username, password, firstname, lastname, email';
$string['uploaduserspreview'] = 'アップロードユーザプレビュー';
$string['uploadusersresult'] = 'アップロードユーザ結果';
$string['uploaduser:uploaduserpictures'] = 'ユーザ写真をアップロードする';
$string['useraccountupdated'] = 'ユーザが更新されました。';
$string['useraccountuptodate'] = '最新ユーザ';
$string['userdeleted'] = 'ユーザが削除されました。';
$string['userrenamed'] = 'ユーザがリネームされました。';
$string['userscreated'] = 'ユーザが作成されました';
$string['usersdeleted'] = 'ユーザが削除されました';
$string['usersrenamed'] = 'ユーザがリネームされました';
$string['usersskipped'] = 'ユーザがスキップされました';
$string['usersupdated'] = 'ユーザが更新されました';
$string['usersweakpassword'] = '弱いパスワードを持ったユーザ';
$string['uubulk'] = '「バルクユーザ処理」を選択する';
$string['uubulkall'] = 'すべてのユーザ';
$string['uubulknew'] = '新しいユーザ';
$string['uubulkupdated'] = '更新されたユーザ';
$string['uucsvline'] = 'CSV行';
$string['uulegacy1role'] = '(オリジナルの学生) タイプ=1';
$string['uulegacy2role'] = '(オリジナルの教師) タイプ=2';
$string['uulegacy3role'] = '(オリジナルの編集権限のない教師) タイプ=3';
$string['uunoemailduplicates'] = 'メールアドレスの重複を避ける';
$string['uuoptype'] = 'アップロードタイプ';
$string['uuoptype_addinc'] = 'すべてを追加する、必要に応じてユーザ名に番号を付加する';
$string['uuoptype_addnew'] = '新しいユーザのみ、既存のユーザをスキップする';
$string['uuoptype_addupdate'] = '新しいユーザの追加および既存のユーザを更新する';
$string['uuoptype_update'] = '既存のユーザのみ更新する';
$string['uupasswordcron'] = 'cronにより生成';
$string['uupasswordnew'] = '新しいユーザパスワード';
$string['uupasswordold'] = '既存のユーザパスワード';
$string['uustandardusernames'] = 'ユーザ名を標準化する';
$string['uuupdateall'] = 'ファイルおよびデフォルトでオーバーライドする';
$string['uuupdatefromfile'] = 'ファイルでオーバライドする';
$string['uuupdatemissing'] = '欠けているデータをファイルおよびデフォルトで補填する';
$string['uuupdatetype'] = '既存のユーザ詳細';
$string['uuusernametemplate'] = 'ユーザ名テンプレート';
