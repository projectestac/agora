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
 * Strings for component 'cache', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   cache
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = '操作';
$string['addinstance'] = 'インスタンスを追加する';
$string['addstore'] = '{$a} ストアを追加する';
$string['addstoresuccess'] = '新しい {$a} ストアが正常に追加されました。';
$string['area'] = 'エリア';
$string['cacheadmin'] = 'キャッシュ設定';
$string['cacheconfig'] = '設定';
$string['cachedef_databasemeta'] = 'データベースメタ情報';
$string['cachedef_eventinvalidation'] = 'イベント無効化';
$string['cachedef_htmlpurifier'] = 'HTML Purifier - クリーニング済みコンテンツ';
$string['cachedef_locking'] = 'ロッキング';
$string['cachedef_questiondata'] = '問題定義';
$string['cachedef_string'] = '言語ストリングキャッシュ';
$string['cachelock_file_default'] = 'デフォルトファイルロッキング';
$string['cachestores'] = 'キャッシュストア';
$string['caching'] = 'キャッシング';
$string['component'] = 'コンポーネント';
$string['confirmstoredeletion'] = 'ストア削除確認';
$string['default_application'] = 'デフォルトアプリケーションストア';
$string['defaultmappings'] = 'マッピングが存在しない場合に使用されるストア';
$string['defaultmappings_help'] = 'あなたが1つまたはそれ以上のストアをキャッシュ定義にマップしない場合、デフォルトストアが使用されます。';
$string['default_request'] = 'デフォルトリクエストストア';
$string['default_session'] = 'デフォルトセッションストア';
$string['defaultstoreactions'] = 'デフォルトストアを編集することはできません。';
$string['definition'] = '定義';
$string['definitionsummaries'] = '既知のキャッシュ定義';
$string['delete'] = '削除';
$string['deletestore'] = 'ストアを削除する';
$string['deletestoreconfirmation'] = '本当に「 {$a} 」ストアを削除してもよろしいですか?';
$string['deletestorehasmappings'] = 'マッピングされているため、あなたはこのストアを削除することはできません。ストアを削除する前に、すべてのマッピングを削除してください。';
$string['deletestoresuccess'] = 'キャッシュストアを正常に削除しました。';
$string['editdefinitionmappings'] = '{$a} 定義ストアマッピング';
$string['editmappings'] = 'マッピングを編集する';
$string['editstore'] = 'ストアを編集する';
$string['editstoresuccess'] = 'キャッシュストアを正常に編集しました。';
$string['ex_configcannotsave'] = 'キャッシュ設定ファイルを保存できません。';
$string['ex_nodefaultlock'] = 'デフォルトロックインスタンスを見つけることができません。';
$string['ex_unabletolock'] = 'キャッシングのロックを取得できません。';
$string['ex_unmetstorerequirements'] = '現在、あなたはこのストアを使用することはできません。必要条件を決定するため、ドキュメンテーションをご覧ください。';
$string['gethit'] = 'Get - ヒット';
$string['getmiss'] = 'Get - ミス';
$string['invalidplugin'] = '無効なプラグイン';
$string['invalidstore'] = '無効なキャッシュストアが提供されました。';
$string['lockdefault'] = 'デフォルト';
$string['lockmethod'] = 'ロックメソッド';
$string['lockmethod_help'] = 'このストアが要求された場合、このメソッドはロッキングのために使用されます。';
$string['lockname'] = '名称';
$string['locksummary'] = 'キャッシュロックインスタンスの概要';
$string['lockuses'] = '利用';
$string['mappingdefault'] = '(デフォルト)';
$string['mappingfinal'] = '最終ストア';
$string['mappingprimary'] = '主ストア';
$string['mappings'] = 'ストアマッピング';
$string['mode'] = 'モード';
$string['mode_1'] = 'アプリケーション';
$string['mode_2'] = 'セッション';
$string['mode_4'] = 'リクエスト';
$string['modes'] = 'モード';
$string['nativelocking'] = 'このプラグインは自身のロッキングを処理します。';
$string['none'] = 'なし';
$string['plugin'] = 'プラグイン';
$string['pluginsummaries'] = 'インストール済みキャッシュストア';
$string['purge'] = '削除';
$string['purgestoresuccess'] = 'リクエストされたストアを正常に削除しました。';
$string['requestcount'] = '次のリクエストによりテストする: {$a}';
$string['rescandefinitions'] = '定義を再スキャンする';
$string['result'] = '結果';
$string['set'] = 'セット';
$string['storeconfiguration'] = 'ストア設定';
$string['store_default_application'] = 'アプリケーションキャッシュのデフォルトファイルストア';
$string['store_default_request'] = 'リクエストキャッシュのデフォルトスタティックストア';
$string['store_default_session'] = 'セッションキャッシュのデフォルトセッションストア';
$string['storename'] = 'ストア名';
$string['storenamealreadyused'] = 'あなたはこのストアに関してユニークな名称を選択する必要があります。';
$string['storename_help'] = 'ここではストア名を設定します。ストア名はシステム内のストアを識別します。「a-z A-Z 0-9 -_ 」およびスペースのみ使用することができます。また、ストア名はユニークである必要があります。すでに使用されている名称の使用を試みた場合、あなたはエラーメッセージを受信します。';
$string['storenameinvalid'] = '無効なストア名です。あなたは「a-z A-Z 0-9 -_ 」およびスペースのみ使用することができます。';
$string['storenotready'] = 'ストア準備未了';
$string['storeperformance'] = 'キャッシュストアパフォーマンスレポート - {$a} ユニークリクエスト/処理';
$string['storeready'] = '準備完了';
$string['storerequiresattention'] = '要注意';
$string['storerequiresattention_help'] = 'このストアインスタンスは使用準備ができていませんが、マッピングされています。この問題を修正することで、あなたのシステムのパフォーマンスを改善します。ストアバックエンドの使用準備ができて、PHP必要条件に合致していることを確認してください。';
$string['storeresults_application'] = 'アプリケーションキャッシュとして使用されるストアリクエスト';
$string['storeresults_request'] = 'リクエストキャッシュとして使用されるストアリクエスト';
$string['storeresults_session'] = 'セッションキャッシュとして使用されるストアリクエスト';
$string['stores'] = 'ストア';
$string['storesummaries'] = '設定済みストアインスタンス';
$string['supports'] = 'サポート';
$string['supports_dataguarantee'] = 'データ保証';
$string['supports_keyawareness'] = 'キー認識度';
$string['supports_multipleidentifiers'] = '複数ID';
$string['supports_nativelocking'] = 'ロッキング';
$string['supports_nativettl'] = 'TTL';
$string['supports_searchable'] = 'キー検索';
$string['tested'] = 'テスト済み';
$string['testperformance'] = 'パフォーマンステスト';
$string['unsupportedmode'] = '未サポートモード';
$string['untestable'] = 'テスト不可';
