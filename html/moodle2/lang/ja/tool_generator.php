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
 * Strings for component 'tool_generator', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_generator
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['bigfile'] = 'ビッグファイル {$a}';
$string['courseexplanation'] = 'こツールでは、多くのセクション、活動およびファイルを含む標準的なテストコースを作成します。

これは様々なシステムコンポーネント (バックアップおよびリスト等) の信頼性およびパフォーマンスをチェックするための測定標準を提供することを目的としています。

システムが動作しないことに直面した多くの実使用例 (例 1,000件の活動を含むコース) があるため、このテストは重要です。

この機能を使用して作成されたコースは大容量のデータベースおよびファイルシステム領域 (数十ギガバイト) を占有します。この領域を開放するには、あなたはコースを削除する (および様々なクリーンアップの実行を待つ) 必要があります。

**実運用サイトでこの機能を使用しないでください** 開発用サーバでのみ使用してください。(予想外の使用を避けるため、あなたが「DEVELOPER」デバッグレベルを選択しない限り、この機能は無効にされています。';
$string['coursesize_0'] = 'XS (~10KB; 作成 ~1秒)';
$string['coursesize_1'] = 'S (~10MB; 作成 ~30秒)';
$string['coursesize_2'] = 'M (~100MB; 作成  ~5分)';
$string['coursesize_3'] = 'L (~1GB; 作成 ~1時間)';
$string['coursesize_4'] = 'XL (~10GB; 作成 ~4時間)';
$string['coursesize_5'] = 'XXL (~20GB; 作成 ~8時間)';
$string['coursewithoutusers'] = '選択されたコースにはユーザが登録されていません。';
$string['createcourse'] = 'コースを作成する';
$string['createtestplan'] = 'テストプランを作成する';
$string['creating'] = 'コース作成中';
$string['done'] = '完了 ({$a}s)';
$string['downloadtestplan'] = 'テストプランをダウンロードする';
$string['downloadusersfile'] = 'ユーザファイルをダウンロードする';
$string['error_nocourses'] = 'テストプランを作成するコースがありません。';
$string['error_noforumdiscussions'] = '選択されたコースにはフォーラムディスカッションがありません。';
$string['error_noforuminstances'] = '選択されたコースにはフォーラムモジュールインスタンスがありません。';
$string['error_noforumreplies'] = '選択されたコースにはフォーラム返信がありません。';
$string['error_nonexistingcourse'] = '指定されたコースは存在しません。';
$string['error_nopageinstances'] = '選択されたコースにはページモジュールインスタンスがありません。';
$string['error_notdebugging'] = 'デバッグにおいて、「DEVELOPER」が設定されていないため、このサーバでは利用できません。';
$string['error_nouserspassword'] = 'テストプランを作成する場合、あなたはconfig.php内に「$CFG->tool_generator_users_password」を設定する必要があります。';
$string['firstname'] = 'テストコースユーザ';
$string['fullname'] = 'テストコース: {$a->size}';
$string['maketestcourse'] = 'テストコースを作成する';
$string['maketestplan'] = 'JMeterテストプランを作成する';
$string['notenoughusers'] = '選択されたユーザには十分なユーザが登録されていません。';
$string['pluginname'] = '開発データジェネレータ';
$string['progress_checkaccounts'] = 'ユーザアカウント確認中 ({$a})';
$string['progress_coursecompleted'] = 'コース完了 ({$a})';
$string['progress_createaccounts'] = 'ユーザアカウント作成中 ({$a->from} - {$a->to})';
$string['progress_createassignments'] = '課題を作成する ({$a})';
$string['progress_createbigfiles'] = 'ビッグファイル作成中 ({$a})';
$string['progress_createcourse'] = 'コース作成中 {$a}';
$string['progress_createforum'] = 'フォーラム作成中 ({$a} 投稿)';
$string['progress_createpages'] = 'ページ作成中 ({$a})';
$string['progress_createsmallfiles'] = 'スモールファイル作成中 ({$a})';
$string['progress_enrol'] = 'コースにユーザを登録中 ({$a})';
$string['progress_sitecompleted'] = 'サイト完了 ({$a})';
$string['shortsize_0'] = 'XS';
$string['shortsize_1'] = 'S';
$string['shortsize_2'] = 'M';
$string['shortsize_3'] = 'L';
$string['shortsize_4'] = 'XL';
$string['shortsize_5'] = 'XXL';
$string['sitesize_0'] = 'XS (~10MB / 3コース / 作成時間: ~30秒)';
$string['sitesize_1'] = 'S (~50MB / 8コース/ 作成時間: ~2分)';
$string['sitesize_2'] = 'M (~200MB / 73コース/ 作成時間: ~10分)';
$string['sitesize_3'] = 'L (~1\'5GB / 277コース / 作成時間: ~1.5時間)';
$string['sitesize_4'] = 'XL (~10GB / 1065コース / 作成時間: ~5時間)';
$string['sitesize_5'] = 'XXL (~20GB / 4177コース /作成時間: ~10時間)';
$string['size'] = 'コースサイズ';
$string['smallfiles'] = 'スモールファイル';
$string['targetcourse'] = 'テストターゲットコース';
$string['testplanexplanation'] = 'このツールはユーザ認証情報ファイルと共にJMeterテストプランファイルを作成します。

このテストプランは特定のMoodle環境でのテストプラン実行を簡単にして、実行および結果の比較に関する情報を収集するため、 {$a} で動作するよう設計されました。そのため、あなたはテストプランをダウンロードする、またはインストールおよび使用説明に従う必要があります。

あなたはコースユーザのパスワードをconfig.phpで設定する必要があります (例 $CFG->tool_generator_users_password = \'moodle\';)。意図しないツールの使用を避けるため、このパスワードのデフォルト値はありません。あなたのコースユーザに他のパスワードが割り当てられている場合、あなたはパスワード更新オプションを使用する必要があります。または「$CFG->tool_generator_users_password」の値を設定しないことにより、tool_generatorがパスワードを生成します。

tool_generatorの一部であるため、コースによるコースおよびサイトジェネレータと良く動作します。また、少なくとも下記を含むコースに使用することもできます:

* パスワードを「moodle」にリセットした十分な数の登録ユーザ (あなたが選択するテストプランのサイズに依存します)
* ページモジュールインスタンス
* 少なくとも1件のディスカッションおよび1件の返信を含むフォーラムインスタンス

特にJMeterにより生成されるロードが大きくなるため、大きなテストプランを実効する場合、あなたのサーバの性能を考慮した方が良いでしょう。この種の問題を減らすため、スレッド (ユーザ) 数に応じて起動時間は調整されますが、ロードは依然と大きなものになります。

**実運用サイトでこの機能を使用しないでください** この機能はJMeterにフィードするためのファイルのみ作成します。そのため、それ自体に危険性ありませんが、あなたはこのテストプランを実運用サイトで***決して***実行すべきではありません。';
$string['testplansize_0'] = 'XS ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['testplansize_1'] = 'S ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['testplansize_2'] = 'M ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['testplansize_3'] = 'L ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['testplansize_4'] = 'XL ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['testplansize_5'] = 'XXL ({$a->users} ユーザ / {$a->loops} ループ /  {$a->rampup} Ramp-Up期間)';
$string['updateuserspassword'] = 'コースユーザパスワードを更新する';
$string['updateuserspassword_help'] = 'JMeterではユーザとしてコースにログインする必要があります。あなたはconfig.phpの「$CFG->tool_generator_users_password」を使用して、パスワードを設定することができます。この設定は「$CFG->tool_generator_users_password」を使用してコースユーザのパスワードを更新します。あなたがtool_generatorによって作成されていないコースを使用している場合、またはテストコース作成時に「$CFG->tool_generator_users_password」が設定されている場合に有用です。';
