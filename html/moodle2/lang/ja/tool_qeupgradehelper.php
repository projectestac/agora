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
 * Strings for component 'tool_qeupgradehelper', language 'ja', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_qeupgradehelper
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = '動作';
$string['alreadydone'] = 'すべての小テストはすでにコンバートされています。';
$string['areyousure'] = '本当によろしいですか';
$string['areyousuremessage'] = 'コース {$a->shortname} 内の小テスト「 {$a->name} 」の {$a->numtoconvert} 件の受験すべてのアップグレードを続けてもよろしいですか?';
$string['areyousureresetmessage'] = 'コース「 {$a->shortname} 」の小テスト「 {$a->name} 」には {$a->totalattempts} 件の受験があり、{$a->convertedattempts} 件は古いシステムからアップグレードされました。この中から {$a->resettableattempts} 件をリセットして、後で再度コンバートすることができます。この処理を続けてもよろしいですか?';
$string['attemptstoconvert'] = 'コンバージョンが必要な受験';
$string['backtoindex'] = 'メインページに戻る';
$string['conversioncomplete'] = 'コンバージョン完了';
$string['convertattempts'] = '受験をコンバートする';
$string['convertedattempts'] = 'コンバージョンされた受験';
$string['convertquiz'] = '受験をコンバートする ...';
$string['cronenabled'] = 'Cron有効化';
$string['croninstructions'] = 'あなたは次の不完全なアップグレードを自動的にアップグレード完了にするため、cronを有効にすることができます。cronは1日のうちで設定された時間に (サーバのローカル時間に基づき) 実効されます。それぞれの実行時、cronは制限時間を使ってしまうまで多くの受験を処理した後、次の実行時間まで待機します。2.1へのアップグレード未完了を検知しない限り、cronが受験を処理することはありません。';
$string['cronprocesingtime'] = 'cron実行時の処理時間';
$string['cronsetup'] = 'cronを設定する';
$string['cronsetup_desc'] = '小テスト受験データを自動的に完全にアップグレードするため、あなたはcronを設定することができます。';
$string['cronstarthour'] = '開始時間';
$string['cronstophour'] = '終了時間';
$string['extracttestcase'] = 'テストケースを抽出する';
$string['extracttestcase_desc'] = 'アップグレードテストに使用する単体テストの作成補助として、データベースのサンプルを使用します。';
$string['gotoindex'] = 'アップグレード可能な小テスト一覧に戻る';
$string['gotoquizreport'] = 'アップグレードをチェックするため、この小テストのレポートに移動する';
$string['gotoresetlink'] = 'リセット可能な小テスト一覧に戻る';
$string['includedintheupgrade'] = 'アップグレードに含みますか?';
$string['invalidquizid'] = '無効な小テストIDです。小テストが存在しないか、コンバートする受験がありません。';
$string['listpreupgrade'] = '小テストおよび受験を一覧表示する';
$string['listpreupgrade_desc'] = 'ここではシステム上でのすべての小テストおよび受験数を報告します。これにより、あなたはアップグレード範囲を把握することができます。';
$string['listpreupgradeintro'] = 'あなたのサイトのアップグレード時に処理する必要のある多くの小テスト受験があります。数万件の受験でしたら心配する必要はありません。それを超える場合、あなたはアップグレード時間を考慮する必要があります。';
$string['listtodo'] = 'まだアップグレードが必要な小テストを一覧表示する';
$string['listtodo_desc'] = 'ここではシステム上にある新しい問題エンジンにアップグレードする必要のある小テストすべてを報告します。';
$string['listtodointro'] = 'すべてのコンバートする必要のある小テスト受験です。リンクをクリックすることで、あなたは受験をコンバートすることができます。';
$string['listupgraded'] = 'すでにアップグレードされてリセット可能な小テストを一覧表示する';
$string['listupgraded_desc'] = 'ここではシステム上にある古いデータが存在してアップグレードをリセットまたは再実行できるアップグレード済み小テストすべてを報告します。';
$string['listupgradedintro'] = 'すべてのアップグレードする必要のある古いデータを含んだ小テスト受験です。リセットした後、再度アップグレードすることができます。';
$string['noquizattempts'] = 'あなたのサイトには小テスト受験がありません!';
$string['nothingupgradedyet'] = 'リセットできるアップグレード済み受験はありません。';
$string['notupgradedsiterequired'] = 'このスクリプトはサイトがアップグレードされる前のみ動作します。';
$string['numberofattempts'] = '小テスト受験数';
$string['oldsitedetected'] = '新しい問題エンジンを実装するためのアップグレードがサイトに実施されていないようです。';
$string['outof'] = '{$a->some} / {$a->total}';
$string['pluginname'] = '問題エンジンアップグレードヘルパ';
$string['pretendupgrade'] = '受験アップグレードのリハーサルを実施する';
$string['pretendupgrade_desc'] = 'アップグレードでは次の3つのことを実施します: データベースから既存のデータを読み込む。そのデータをコンバートする。そして、コンバート済みデータをデータベースに書き込む。このスクリプトは最初の2つの処理をテストします。';
$string['questionsessions'] = '問題セッション';
$string['quizid'] = '小テストID';
$string['quizupgrade'] = '小テストアップグレードステータス';
$string['quizzesthatcanbereset'] = '次の小テストはあなたがリセットすることのできる受験をコンバートしました。';
$string['quizzestobeupgraded'] = 'すべての小テスト受験';
$string['quizzeswithunconverted'] = '次の小テストにはコンバートが必要な受験があります。';
$string['resetcomplete'] = '完了をリセットする';
$string['resetquiz'] = '受験をリセットする ...';
$string['resettingquizattempts'] = '小テスト受験のリセット';
$string['resettingquizattemptsprogress'] = '受験のリセット {$a->done} / {$a->outof}';
$string['upgradedsitedetected'] = 'サイトは新しい問題エンジンを実装するためのアップグレードが完了したようです。';
$string['upgradedsiterequired'] = 'このスクリプトはサイトのアップグレード後のみ動作します。';
$string['upgradingquizattempts'] = 'コース {$a->shortname} 内の小テスト「 {$a->name} 」受験のアップグレード';
$string['veryoldattemtps'] = 'あなたのサイトにはアップグレード中に完全には更新されない  {$a} 件のMoodle 1.4からMoodle1.5の小テスト受験があります。これらの受験はメインのアップグレードの前に処理されます。あなたはこの処理に追加時間が必要なことを考慮する必要があります。';
