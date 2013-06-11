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
 * Strings for component 'tool_xmldb', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   tool_xmldb
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actual'] = '実値';
$string['aftertable'] = '次のテーブルの後:';
$string['back'] = '戻る';
$string['backtomainview'] = 'メインに戻る';
$string['cannotuseidfield'] = '「id」フィールドは追加できません。自動作成されるカラムです。';
$string['change'] = '変更';
$string['charincorrectlength'] = 'charフィールドの長さが正しくありません。';
$string['checkbigints'] = 'integerをチェックする';
$string['check_bigints'] = '不正なDBインテジャを調査中';
$string['checkdefaults'] = 'デフォルトをチェックする';
$string['check_defaults'] = '矛盾したデフォルト値を調査中';
$string['checkforeignkeys'] = '外部キーのチェック';
$string['check_foreign_keys'] = '外部キー違反を調査中';
$string['checkindexes'] = 'インデックスをチェックする';
$string['check_indexes'] = '不明なDBインデックスを探す';
$string['checkoraclesemantics'] = 'セマンティクスをチェックする';
$string['check_oracle_semantics'] = '正しくない長さのセマンティクスを探す';
$string['completelogbelow'] = '(検索結果に関する下記の完全なログをご覧ください。)';
$string['confirmcheckbigints'] = 'この機能は、あなたのMoodleサーバで<a href="http://tracker.moodle.org/browse/MDL-11038">潜在的に不正なインテジャフィールド</a>を調査し、DB内のインテジャを適切に定義するためのSQL文を自動的に生成します (実行ではありません!)。<br /><br />SQL文の生成後、あなたはSQL文をコピーして、自分の好きなSQLインターフェースで安全に実行することができます (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />不正なインテジャの調査を実行する前に、あなたのMoodleリリース (1.8, 1.9, 2.x ...) を最新のもの (+ バージョン)  にバージョンアップすることを強くお勧めします。<br /><br />
この機能は、DBに対していかなる処理も実行しません (読むだけです)。ですから、いつでも安全に実行することが可能です。';
$string['confirmcheckdefaults'] = 'この機能はあなたのMoodleサーバで矛盾したデフォルト値を調査し、DB内のすべてのデフォルト値を適切に定義するためのSQL文を自動的に生成します (実行ではありません!)。<br /><br />SQL文の生成後、あなたはSQL文をコピーして、自分の好きなSQLインターフェースで安全に実行することができます (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />矛盾したデフォルト値の調査を実行する前、あなたのMoodleリリース (1.8, 1.9, 2.x ...) を最新のもの (+ バージョン)  にバージョンアップすることを強くお勧めします。<br /><br />
この機能はDBに対していかなる処理も実行しません (読むだけです)。そのため、いつでも安全に実行することが可能です。';
$string['confirmcheckforeignkeys'] = 'この機能はinstall.xml定義で定義された外部キーに関して潜在的な違反を調査します (現在、Moodleはデータベースに制約された外部キーを生成しないため、無効なデータが存在する可能性があります)。<br /><br />不明なインデックス調査を実行する前、あなたのMoodleリリース (1.8, 1.9, 2.x ...) を最新のもの (+ バージョン)  にバージョンアップすることを強くお勧めします。<br /><br />
この機能はDBに対していかなる処理も実行しません (読むだけです)。そのため、いつでも安全に実行することが可能です。';
$string['confirmcheckindexes'] = 'この機能は、あなたのMoodleサーバで潜在的に不明なインデックスを調査し、すべてを最新の状態にするためのSQL文を自動的に生成します (実行ではありません!)。SQL文の生成後、あなたはSQL文をコピーして、自分の好きなSQLインターフェースで安全に実行することができます (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />不明なインデックス調査を実行する前に、あなたのMoodleリリース (1.8, 1.9, 2.x ...) を最新のもの (+ バージョン)  にバージョンアップすることを強くお勧めします。<br /><br />
この機能は、DBに対していかなる処理も実行しません (読むだけです)。ですから、いつでも安全に実行することが可能です。';
$string['confirmcheckoraclesemantics'] = 'この機能は、あなたのMoodleサーバで潜在的に不明なインデックスを調査し、すべてを最新の状態にするためのSQL文を自動的に生成します (実行ではありません!)。SQL文の生成後、あなたはSQL文をコピーして、自分の好きなSQLインターフェースで安全に実行することができます (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />不明なインデックス調査を実行する前に、あなたのMoodleリリース (1.8, 1.9, 2.x ...) を最新のもの (+ バージョン)  にバージョンアップすることを強くお勧めします。<br /><br />
この機能は、DBに対していかなる処理も実行しません (読むだけです)。ですから、いつでも安全に実行することが可能です。';
$string['confirmdeletefield'] = '本当に次のフィールドを完全に削除してもよろしいですか:';
$string['confirmdeleteindex'] = '本当に次のインデックスを完全に削除してもよろしいですか:';
$string['confirmdeletekey'] = '本当に次のキーを完全に削除してもよろしいですか:';
$string['confirmdeletetable'] = '本当に次のテーブルを完全に削除してもよろしいですか:';
$string['confirmdeletexmlfile'] = '本当に次のファイルを完全に削除してもよろしいですか:';
$string['confirmrevertchanges'] = '本当に変更を元に戻してもよろしいですか:';
$string['create'] = '作成';
$string['createtable'] = 'テーブルの作成:';
$string['defaultincorrect'] = 'デフォルトが正しくありません。';
$string['delete'] = '削除';
$string['delete_field'] = 'フィールドの削除';
$string['delete_index'] = 'インデックスの削除';
$string['delete_key'] = 'キーの削除';
$string['delete_table'] = 'テーブルの削除';
$string['delete_xml_file'] = 'XMLファイルの削除';
$string['doc'] = 'Doc';
$string['docindex'] = 'ドキュメンテーションインデックス:';
$string['documentationintro'] = 'このドキュメンテーションはXMLDBデータベース定義より自動的に生成されたものです。英語のみ利用できます。';
$string['down'] = '下へ';
$string['duplicate'] = '複製';
$string['duplicatefieldname'] = '同じ名称のフィールドが登録されています。';
$string['duplicatefieldsused'] = '重複フィールドが使用されています。';
$string['duplicateindexname'] = 'インデックス名が重複しています。';
$string['duplicatekeyname'] = '同じ名称のキーが登録されています。';
$string['duplicatetablename'] = '同じ名称のテーブルが登録されています。';
$string['edit'] = '編集';
$string['edit_field'] = 'フィールドの編集';
$string['edit_field_save'] = 'フィールドを保存する';
$string['edit_index'] = 'インデックスの編集';
$string['edit_index_save'] = 'インデックスを保存する';
$string['edit_key'] = 'キーの編集';
$string['edit_key_save'] = 'キーを保存する';
$string['edit_table'] = 'テーブルの編集';
$string['edit_table_save'] = 'テーブルを保存する';
$string['edit_xml_file'] = 'XMLファイルの編集';
$string['enumvaluesincorrect'] = 'enumフィールドが正しくありません。';
$string['expected'] = '期待値';
$string['extensionrequired'] = '申し訳ございません - この処理を実行するには、PHP拡張モジュール「 {$a} 」が必要です。あなたがこの機能を使用したい場合、PHP拡張モジュールをインストールしてください。';
$string['field'] = 'フィールド';
$string['fieldnameempty'] = 'フィールド名が空です。';
$string['fields'] = 'フィールド';
$string['fieldsnotintable'] = 'フィールドがテーブル内に存在しません。';
$string['fieldsusedinindex'] = 'このフィールドはインデックスとして使用されています。';
$string['fieldsusedinkey'] = 'このフィールドはキーとして使用されています。';
$string['filemodifiedoutfromeditor'] = '警告: XMLDBエディタの使用中にファイルがローカルで修正されました。変更はローカルの変更をすべて上書きします。';
$string['filenotwriteable'] = 'ファイルに書き込み権がありません。';
$string['fkviolationdetails'] = 'テーブル {$a->tablename} の外部キー {$a->keyname} に関して、{$a->numrows} 行中 {$a->numviolations} 行が違反しています。';
$string['float2numbernote'] = '注意: XMLDBにおいて、「浮動小数」フィールドは、100%サポートされますが、代わりに「数値」フィールドへの移行をお勧めします。';
$string['floatincorrectdecimals'] = '浮動小数フィールドの小数点以下桁数が正しくありません。';
$string['floatincorrectlength'] = '浮動小数フィールドの長さが正しくありません。';
$string['generate_all_documentation'] = 'ドキュメンテーションすべて';
$string['generate_documentation'] = 'ドキュメンテーション';
$string['gotolastused'] = '最後に使用されたファイルへ移動する';
$string['incorrectfieldname'] = 'フィールド名が正しくありません。';
$string['incorrectindexname'] = '正しくないインデックス名です。';
$string['incorrectkeyname'] = 'キー名が正しくありません。';
$string['incorrecttablename'] = 'テーブル名が正しくありません。';
$string['index'] = 'インデックス';
$string['indexes'] = 'インデックス';
$string['indexnameempty'] = 'インデックス名が空白です。';
$string['integerincorrectlength'] = 'integerフィールドの長さが正しくありません。';
$string['key'] = 'キー';
$string['keynameempty'] = 'キー名を空白にすることはできません。';
$string['keys'] = 'キー';
$string['listreservedwords'] = '予約語一覧<br />(<a href="http://docs.moodle.org/en/XMLDB_reserved_words" target="_blank">XMLDB_reserved_words</a> を更新するため使用されます。)';
$string['load'] = 'ロード';
$string['main_view'] = 'メインビュー';
$string['masterprimaryuniqueordernomatch'] = 'あなたの外部キーのフィールドは、参照テーブルのユニークキーと同じ順番で記述する必要があります。';
$string['missing'] = '不明';
$string['missingindexes'] = 'インデックスが見つかりません。';
$string['mustselectonefield'] = 'フィールドに関連した処理を見るには、フィールドを選択してください!';
$string['mustselectoneindex'] = 'インデックスに関連した処理を見るには、インデックスを選択してください!';
$string['mustselectonekey'] = 'キーに関連した処理を見るには、キーを選択してください!';
$string['newfield'] = '新しいフィールド';
$string['newindex'] = '新しいインデックス';
$string['newkey'] = '新しいキー';
$string['newtable'] = '新しいテーブル';
$string['newtablefrommysql'] = 'MySQLから新しいテーブル';
$string['new_table_from_mysql'] = 'MySQLから新しいテーブル';
$string['nofieldsspecified'] = 'フィールドが指定されていません。';
$string['nomasterprimaryuniquefound'] = 'あなたの外部キーが参照するカラムは、参照テーブルのプライマリーまたはユニークキーに含まれている必要があります。ユニークインデックスに含まれているカラムでは、十分ではありませんので留意してください。';
$string['nomissingindexesfound'] = '不明なインデックスは見つかりませんでした。あなたのDBに関して、さらなる処置は不要です。';
$string['noreffieldsspecified'] = '参照フィールドが指定されていません。';
$string['noreftablespecified'] = '指定された参照テーブルが見つかりませんでした。';
$string['noviolatedforeignkeysfound'] = '外部キー違反は見つかりませんでした。';
$string['nowrongdefaultsfound'] = '矛盾したデフォルト値は見つかりませんでした。あなたのDBに関して、さらなる処置は不要です。';
$string['nowrongintsfound'] = '間違ったインテジャは見つかりませんでした。あなたのDBに関して、さらなる処置は不要です。';
$string['nowrongoraclesemanticsfound'] = 'BYTEセマンティクスを使用しているOracleカラムは見つかりませんでした。あなたのDBに関して、さらなる処置は不要です。';
$string['numberincorrectdecimals'] = 'numberフィールドの小数点以下桁数が正しくありません。';
$string['numberincorrectlength'] = 'numberフィールドの長さが正しくありません。';
$string['pendingchanges'] = 'メモ: あなたは、このファイルを変更しました。ファイルは、いつでも保存することができます。';
$string['pendingchangescannotbesaved'] = 'このファイルに変更が加えられましたが、保存できませんでした! ディレクトリおよび「install.xml」にウェブサーバからの書込み権があるかどうか確認してください。';
$string['pendingchangescannotbesavedreload'] = 'このファイルに変更が加えられましたが、保存できませんでした! ディレクトリおよび「install.xml」にウェブサーバからの書込み権があるかどうか確認してください。確認後、このページをリロードすることで、あなたは変更を保存することができます。';
$string['pluginname'] = 'XMLDBエディタ';
$string['primarykeyonlyallownotnullfields'] = '主キーをNullにすることはできません。';
$string['reserved'] = '予約済み';
$string['reservedwords'] = '予約語';
$string['revert'] = '元に戻す';
$string['revert_changes'] = '変更を元に戻す';
$string['save'] = '保存';
$string['searchresults'] = '検索結果';
$string['selectaction'] = '処理の選択:';
$string['selectdb'] = 'データベースの選択:';
$string['selectfieldkeyindex'] = 'フィールド/キー/インデックスの選択:';
$string['selectonecommand'] = 'PHPコードを表示するには、リストより処理を選択してください。';
$string['selectonefieldkeyindex'] = 'PHPコードを表示するには、リストよりフィールド/キー/インデックスを選択してください。';
$string['selecttable'] = 'テーブルの選択:';
$string['table'] = 'テーブル';
$string['tablenameempty'] = 'テーブル名を空白にすることはできません。';
$string['tables'] = 'テーブル';
$string['unload'] = 'アンロード';
$string['up'] = '上へ';
$string['view'] = '表示';
$string['viewedited'] = '編集済みの表示';
$string['vieworiginal'] = 'オリジナルの表示';
$string['viewphpcode'] = 'PHPコードの表示';
$string['view_reserved_words'] = '予約語の表示';
$string['viewsqlcode'] = 'SQLコードの表示';
$string['view_structure_php'] = 'PHPストラクチャの表示';
$string['view_structure_sql'] = 'SQLストラクチャの表示';
$string['view_table_php'] = 'PHPテーブルの表示';
$string['view_table_sql'] = 'SQLテーブルの表示';
$string['viewxml'] = 'XML';
$string['violatedforeignkeys'] = '外部キー違反';
$string['violatedforeignkeysfound'] = '外部キー違反が見つかりました。';
$string['violations'] = '違反';
$string['wrong'] = '不正';
$string['wrongdefaults'] = '不正なデフォルトが見つかりました';
$string['wrongints'] = '不正なインテジャが見つかりました';
$string['wronglengthforenum'] = 'enumフィールドの長さが正しくありません。';
$string['wrongnumberofreffields'] = '参照フィールド番号が正しくありません。';
$string['wrongoraclesemantics'] = '不正なOracle BYTEセマンティクスが見つかりました。';
$string['wrongreservedwords'] = '現在使用されている予約語<br />($CFG->prefixを使用する場合、テーブル名は重要ではありません。)';
$string['yesmissingindexesfound'] = 'あなたのDBに不明なインデックスが見つかりました。以下、詳細情報およびあなたの好きなSQLインターフェースでインデックス作成を実行するためのSQL文です (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />SQL文の実行後、これ以上不明なインデックスが見つかるかどうか、このユーティリティの再実行を強くお勧めします。';
$string['yeswrongdefaultsfound'] = 'あなたのDBに矛盾したデフォルト値が見つかりました。以下、詳細情報およびあなたの好きなSQLインターフェースでインデックス作成を実行するためのSQL文です (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />SQL文の実行後、これ以上矛盾したデフォルト値が見つかるかどうか、このユーティリティの再実行を強くお勧めします。';
$string['yeswrongintsfound'] = 'あなたのDBに不正なインテジャが見つかりました。以下、詳細情報およびあなたの好きなSQLインターフェースでインテジャ作成を実行するためのSQL文です (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />SQL文の実行後、これ以上不正なインテジャが見つかるかどうか、このユーティリティの再実行を強くお勧めします。';
$string['yeswrongoraclesemanticsfound'] = 'あなたのOracleカラムに不正なBYTEセマンティクスが見つかりました。以下、詳細情報およびあなたの好きなSQLインターフェースでOracleカラムの作成を実行するためのSQL文です (実行前にあなたのデータを忘れずにバックアップしてください)。<br /><br />SQL文の実行後、これ以上不正なOracleカラムが見つかるかどうか、このユーティリティの再実行を強くお勧めします。';
