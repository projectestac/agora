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
 * Strings for component 'tool_uploadcourse', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_uploadcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['allowdeletes'] = '削除を許可する';
$string['allowdeletes_help'] = '「delete 」フィールドを受け入れるかどうか決定します。';
$string['allowrenames'] = 'リネームを許可する';
$string['allowrenames_help'] = '「rename」フィールドを受け入れるかどうか決定します。';
$string['allowresets'] = 'リセットを許可する';
$string['allowresets_help'] = '「reset」フィールドを受け入れるかどうか決定します。';
$string['cachedef_helper'] = 'ヘルパキャッシング';
$string['cannotdeletecoursenotexist'] = '存在しないコースを削除できません。';
$string['cannotgenerateshortnameupdatemode'] = '更新が許可されている場合、省略名を生成することはできません。';
$string['cannotreadbackupfile'] = 'バックアップファイルを読めません。';
$string['cannotrenamecoursenotexist'] = '存在しないコースをリネームできません。';
$string['cannotrenameidnumberconflict'] = '既存のコースとIDナンバーが衝突しているため、コースをリネームできません。';
$string['cannotrenameshortnamealreadyinuse'] = 'すでに省略名が使用されているコースにリネームできません。';
$string['cannotupdatefrontpage'] = 'フロントページの修正は禁止されています。';
$string['canonlyrenameinupdatemode'] = '更新が許可されたコースのみリネームできます。';
$string['canonlyresetcourseinupdatemode'] = '更新モードのコースのみリセットできます。';
$string['couldnotresolvecatgorybyid'] = 'IDでカテゴリを解決できませんでした。';
$string['couldnotresolvecatgorybyidnumber'] = 'IDナンバーでカテゴリを解決できませんでした。';
$string['couldnotresolvecatgorybypath'] = 'パスでカテゴリを解決できませんでした。';
$string['coursecreated'] = 'コースが作成されました。';
$string['coursedeleted'] = 'コースが削除されました。';
$string['coursedeletionnotallowed'] = 'コース削除は許可されていません。';
$string['coursedoesnotexistandcreatenotallowed'] = 'コースがありません。また、コース作成は許可されていません。';
$string['courseexistsanduploadnotallowed'] = 'コースはありますが、更新は許可されていません。';
$string['coursefile'] = 'ファイル';
$string['coursefile_help'] = 'このファイルはCSVファイルである必要があります。';
$string['courseidnumberincremented'] = 'コースIDナンバー増分 {$a->from} -> {$a->to}';
$string['courseprocess'] = 'コース処理';
$string['courserenamed'] = 'コースがリネームされました。';
$string['courserenamingnotallowed'] = 'コースリネームは許可されていません。';
$string['coursereset'] = 'コースリセット';
$string['courseresetnotallowed'] = 'コースリセットは許可されていません。';
$string['courserestored'] = 'コースがリストアされました。';
$string['coursescreated'] = 'コースが作成されました: {$a}';
$string['coursesdeleted'] = 'コースが削除されました: {$a}';
$string['courseserrors'] = 'コースエラー: {$a}';
$string['courseshortnamegenerated'] = 'コース省略名が生成されました: {$a}';
$string['courseshortnameincremented'] = 'コース省略名がインクリメントされました {$a->from} -> {$a->to}';
$string['coursestotal'] = 'コース合計: {$a}';
$string['coursesupdated'] = 'コースが更新されました: {$a}';
$string['coursetemplatename'] = 'アップロード後にこのコースをリストアする';
$string['coursetemplatename_help'] = 'すべてのコース作成時にテンプレートとして使用するため、既存のコース省略名を入力してください。';
$string['coursetorestorefromdoesnotexist'] = 'リストア元のコースがありません。';
$string['courseupdated'] = 'コースが更新されました。';
$string['createall'] = 'すべてを作成する、必要であれば省略名を増分する';
$string['createnew'] = '新しいコースのみ作成する、既存のコースをスキップする';
$string['createorupdate'] = '新しいコースを作成する、または既存のコースを更新する';
$string['csvdelimiter'] = 'CSVデリミタ';
$string['csvdelimiter_help'] = 'CSVファイルのCSVデリミタです。';
$string['csvfileerror'] = 'CSVファイルのフォーマットに問題があります。ヘッディングの数およびカラムが合致しているか、またデリミタおよびファイルエンコーディングが正しいか確認してください: {$a}';
$string['csvline'] = '行';
$string['defaultvalues'] = 'デフォルトコース値';
$string['encoding'] = 'エンコーディング';
$string['encoding_help'] = 'CSVファイルのエンコーディングです。';
$string['errorwhiledeletingcourse'] = 'コース削除中にエラーが発生しました。';
$string['errorwhilerestoringcourse'] = 'コースリストア中にエラーが発生しました。';
$string['generatedshortnamealreadyinuse'] = '生成された省略名はすでに使用されています。';
$string['generatedshortnameinvalid'] = '生成された省略名は有効ではありません。';
$string['id'] = 'ID';
$string['idnumberalreadyinuse'] = 'IDナンバーはすでにコースで使用されています。';
$string['importoptions'] = 'インポートオプション';
$string['invalidbackupfile'] = '無効なバックアップファイル';
$string['invalidcourseformat'] = '無効なコースフォーマット';
$string['invalidcsvfile'] = '無効な入力CSVファイル';
$string['invalidencoding'] = '無効なエンコーディング';
$string['invalideupdatemode'] = '無効な更新モードが選択されました。';
$string['invalidmode'] = '無効なモードが選択されました。';
$string['invalidroles'] = '無効なロール名: {$a}';
$string['invalidshortname'] = '無効な省略名';
$string['missingmandatoryfields'] = '必須フィールドの値がありません: {$a}';
$string['missingshortnamenotemplate'] = '省略名がありません。また、省略名テンプレートが設定されていません。';
$string['mode'] = 'アップロードモード';
$string['mode_help'] = 'ここであなたはコースを作成するのか、更新するのか指定することができます。';
$string['nochanges'] = '変更なし';
$string['pluginname'] = 'コースアップロード';
$string['preview'] = 'プレビュー';
$string['reset'] = 'アップロード後にコースをリセットする';
$string['reset_help'] = '作成/アップロード後にコースをリセットするかどうか指定します。';
$string['restoreafterimport'] = 'インポート後にリストアする';
$string['result'] = '結果';
$string['rowpreviewnum'] = 'プレビュー行';
$string['rowpreviewnum_help'] = '次のページでプレビューされるCSVファイルの行数です。このオプションは次のページのページサイズを制限するためにあります。';
$string['shortnametemplate'] = '省略名を生成するテンプレート';
$string['shortnametemplate_help'] = 'コース省略名はナビゲーションに表示されます。あなたはここでテンプレート構文 (%f = フルネーム、%i = IDナンバー) または増分するための初期値を入力することができます。';
$string['templatefile'] = 'アップロード後、このファイルからリストアする';
$string['templatefile_help'] = 'すべてのコースの作成時にテンプレートとして使用するファイルを選択してください。';
$string['unknownimportmode'] = '不明なインポートモード';
$string['updatemissing'] = '欠けているデータをCSVデータおよびデフォルトで補填する';
$string['updatemode'] = '更新モード';
$string['updatemodedoessettonothing'] = '「更新モード」ではどのような更新も許可されていません。';
$string['updatemode_help'] = 'コースの更新を許可する場合、あなたは何を使ってコースを更新するのか、ツールに伝える必要があります。';
$string['updateonly'] = '既存のコースのみ更新する';
$string['updatewithdataonly'] = 'CSVデータのみで更新する';
$string['updatewithdataordefaults'] = 'CSVデータおよびデフォルトで更新する';
$string['uploadcourses'] = 'コースをアップロードする';
$string['uploadcourses_help'] = 'コースはテキストファイル経由でアップロードすることができます。ファイルのフォーマットは下記のとおりです:

* ファイルのそれぞれの行に1レコードを含みます。
* それぞれのレコードはカンマ (または他のデリミタ) で区切られた一連のデータです。
* 最初の行には少なくともファイルの残りのフォーマットを決定する一連のフィールド名を含みます。
* 必須フィールド名はshortname、fullnameおよびcategoryです。';
$string['uploadcoursespreview'] = 'アップロードコースプレビュー';
$string['uploadcoursesresult'] = 'アップロードコース結果';
